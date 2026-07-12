<?php

if (!isset($gCms)) exit;
include('dom.php');
$db = &$gCms->GetDb();


//pasiimam 
if ($params['kategorija'] == "nuotraukos"){$addi = " and nuotrauka !='' ";}else{$addi="";}
if ($params['kalba'])
	$adk = " and kalba='".$params[kalba]."'";
$query = 'SELECT * FROM '.cms_db_prefix().$lentele.' WHERE nerodyti=0 '.$addi.' and kategorija="'.$params[kategorija].'"  and del=0 '.$adk.' ORDER BY eiliskumas ASC';

$result = $db->Execute($query);   
print mysql_error();
$records = array();

while ($result != false && $row=$result->FetchRow()){
   //print_r($row);
   array_push($records,$row);
}

$this->smarty->assign_by_ref('irasai',$records);
$this->smarty->assign_by_ref('root_url',$config['root_url']);
$this->smarty->assign_by_ref('image_uploads_url',$config['image_uploads_url']);
switch ($params['kategorija']){
		/*case "blokai":
		echo $this->ProcessTemplate('w_blokai.tpl');
	break;
case "tekstas":
		echo $this->ProcessTemplate('w_tekstas.tpl');
	break;
	
	case "darb":
		echo $this->ProcessTemplate('w_darb.tpl');
	break;*/
	case "foto":
		echo $this->ProcessTemplate('w_foto.tpl');
	break;	
		
}	
?>