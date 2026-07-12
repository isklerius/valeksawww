<?php

$db = &$gCms->GetDb();
include('dom.php');
global $langfile;
//$degalines = $this->getDegalines();			
$formos_id = $params['form'];
if (!is_int($formos_id)) $formos_alias = $formos_id;
if ($formos_id)
	$row = $this->adb->getRow("SELECT * FROM ".cms_db_prefix().$lentele." WHERE id=?", array($formos_id));
elseif($formos_alias)	
	$row = $this->adb->getRow("SELECT * FROM ".cms_db_prefix().$lentele." WHERE formalias=?", array($formos_alias));
	
$tbl = $row['formalias'];

$prefix_len = strlen($id.$this->prefix); 

foreach ($_POST as $k=>$v){
	if(substr($k, 0, $prefix_len)== $id.$this->prefix) {
		 $key = substr($k,$prefix_len);
		 $params[$key] = $v;
	}
}
$in = array('\'','"');
$out = array('&#34;','&#39;');

$params = str_replace($in,$out,$params);
$fields = $this->prepare_input($params);

$kalba = $this->smarty->get_template_vars('kalba');
$path = $gCms->config['root_path'].'/languages/'.$kalba.'.conf';

if(is_file ($path)){
	$this->smarty->config_load($path);
	$langfile = $smarty->get_config_vars();
}

$this->smarty->assign("fields", $fields);
$this->smarty->assign("formstart", $this->CreateFormStart($id, 'default',$returnid,'post','multipart/form-data',false, '',array('pid'=>$params['pid'],'form'=>$params['form'],'form_id'=>$params['form'])));

$validator = new validation;
$form_errors=array();
if(isset($fields['form_id'])){


  if($fields['form_id']=='1'){ 
			if ($validator->required($fields['elpastas'])===false) $form_errors['elpastas']=$langfile['ne_elpastas'];
		elseif ($validator->valid_email($fields['elpastas'])===false)  $form_errors['bad_elpastas']=$langfile['bad_elpastas'];
 }
	
 if (sizeof($form_errors) || !sizeof($fields)){
	$this->smarty->assign("form_errors", $form_errors);
 }
 else{
 
	if ($row['sendbyemail']){
				$row['sendbyemail'] = str_replace(";", ",", $row['sendbyemail']);
				$emails = explode(",", $row['sendbyemail']);

				$mail = new PHPMailer();
				$mail->CharSet = 'utf-8';
				
					foreach ($emails as $email){
						$mail->AddAddress($email);
					}	
				
				$mail->From = $fields['elpastas'];
				$mail->FromName = $langfile['uzklausa'];
				$mail->Subject = "{$langfile['uzklausa']}";
				
					$msg .= "<H1>{$langfile['uzklausa_is']}</H1>";
					
				foreach ($fields as $k=>$field){
							$in = array('\r\n','<','>');
							$out = array('','&#60;','&#62;');
							$field = str_replace($in,$out,$field);
						if($k!='returnid' && $k!='pid' && $k!='form' && $k!='action' && $k!='form_id' && $k!='module'){
							if($k=='miestai')
								$field =str_replace($inauto,$outauto,$field);
							$msg .= "<b>$langfile[$k]</b>" . " - {$field}<br/>";
						}
				}
				$mail->MsgHTML($msg);
				$mail->Send();	
	}
	
	if ($row['storedb']){ 
				$this->params['table'] = cms_db_prefix().$tbl;
				$this->tempfields = $fields;
				$this->tempfields['irasyta'] = date("Y-m-d H:i:s");
				$this->save();
	}
	

	
		$template =  $langfile['issiusta_sekmingai']; 
	
	
	
 } 
}

/*$vie_tipas = array();
$vie_tipas['1'] = $langfile['vie_tipas_a'];
$vie_tipas['2'] = $langfile['vie_tipas_b'];
$vie_tipas['3'] = $langfile['vie_tipas_c'];*/

if($fields['form']=='1'){
	$stogo_apibudinimas = array();
	$stogo_apibudinimas['1'] = $langfile['dvi_stogas'];
	$stogo_apibudinimas['2'] = $langfile['skl_stogas'];
	$stogo_apibudinimas['3'] = $langfile['zen_stogas'];
	$this->smarty->assign("stogo_apibudinimas", $stogo_apibudinimas);

	$sandarumas = array();
	$sandarumas['1'] = $langfile['san_pastatas'];
	$sandarumas['2'] = $langfile['nesan_pastatas'];
	$this->smarty->assign("sandarumas", $sandarumas);

	$pastato_aukstis = isset($fields['pastato_aukstis'])?$fields['pastato_aukstis']:'';
	$stiprs = isset($fields['stiprs'])?$fields['stiprs']:'';

	$this->smarty->assign("pastato_aukstis", $pastato_aukstis);
	$this->smarty->assign("stiprs", $stiprs);
	$this->smarty->assign("stiprs", $stiprs);
	$ats1 = $this->formula_stogas($fields);
	$this->smarty->assign("c_zonos", $ats1['c_zonos']);
	$this->smarty->assign("b_zonos", $ats1['b_zonos']);
	$this->smarty->assign("k_zonos", $ats1['k_zonos']);
}

if($fields['form']=='2' || $fields['form']=='3'){
	if($fields['form']=='2'){
		$t_svoris = array();
		$t_svoris['1'] = $langfile['suminis_ne'];
		$t_svoris['2'] = $langfile['suminis_su'];
	}
	elseif($fields['form']=='3'){
		$t_svoris = array();
		$t_svoris['1'] = $langfile['suminis_ne2'];
		$t_svoris['2'] = $langfile['suminis_su2'];
	}
	$this->smarty->assign("t_svoris", $t_svoris);
	$ats2 = $this->formula_sienos($fields);
	
	$this->smarty->assign("scz", $ats2['c_zonos']);
	$this->smarty->assign("spz", $ats2['b_zonos']);
	$this->smarty->assign("skz", $ats2['k_zonos']);
}




$this->smarty->assign("prefix", $id.$this->prefix);
if(!isset($template))
	$template =  $this->ProcessTemplate($row['formtpl'].".tpl");
echo $template;
 
?>