<?php

if (!isset($gCms)) exit;


include('dom.php');
$kalbospre = explode(',', $kalbos);
$kalbos = Array();
foreach ($kalbospre as $kalba){
 $kalbos[$kalba] = $kalba;
}


function GetProps ($special, $kategorija='', $kalba='')
{
	include('dom.php');
	global $gCms;
	
	($kategorija)?$kati="and kategorija='".$kategorija."'":$kati="";
	$kalbi = "and kalba='".$kalba."'";
	
	
	$db = $gCms->GetDb();
	$config = $gCms->config;
	
	$query = "SELECT * FROM ".cms_db_prefix().$lentele." WHERE del = '0' $kati $kalbi ORDER BY $sortinti ASC";
	$dbresult = $db->Execute($query);
		
	
	if (false == $dbresult)
	{
		echo $this->ShowErrors( $this->Lang('query_failed') );
	}
	$props = array();
	while ( $dbresult && ($row = $dbresult->FetchRow()) )
	{
		$vardai = array_keys($row);
		$v=0;
		$prop = new StdClass();
		while ($vardai[$v]){
			$prop->$vardai[$v] = $row[$vardai[$v]];
			$v++;
			
		}
		$props[] = $prop;
	}
	return $props;
	
}




/** 
 * For separated methods, you won't be able to do permission checks in
 * the DoAction method, so you'll need to do them as needed in your
 * method:
*/ 
if (! $this->CheckPermission($pavad.' Use')) {
  echo "Nera teisiu";
  return;
}
$themeObject = &$gCms->variables['admintheme'];
/**
 * After this, the code is identical to the code that would otherwise be
 * wrapped in the DisplayAdminPanel() method in the module body.
 */
 
// Tab Infrastructure for Admin Area -- create two tabs, one of which
// is only accessible if permissions are right
if (FALSE == empty($params['active_tab']))
  {
    $tab = $params['active_tab'];
  } else {
  $tab = '';
 }



// Content defines and Form stuff for the admin

//$this->smarty->assign('welcome_text','<b>tst</b>');


	$expandImg = $themeObject->DisplayImage('icons/system/expand.gif', lang('expand'),'','','systemicon');
	$contractImg = $themeObject->DisplayImage('icons/system/contract.gif', lang('contract'),'','','systemicon');
	$image_set_false = $themeObject->DisplayImage('icons/system/true.gif', lang('setfalse'),'','','systemicon');
	$image_set_true = $themeObject->DisplayImage('icons/system/false.gif', lang('settrue'),'','','systemicon');
	$downImg = $themeObject->DisplayImage('icons/system/arrow-d.gif', lang('down'),'','','systemicon');
	$upImg = $themeObject->DisplayImage('icons/system/arrow-u.gif', lang('up'),'','','systemicon');

$this->smarty->assign('isskleisti', $expandImg);
$this->smarty->assign('suskleisti', $contractImg);
$this->smarty->assign('setfalse', $image_set_false);
$this->smarty->assign('settrue', $image_set_true);

$special = $this->CheckPermission($pavad.' Special');



if ($this->CheckPermission($pavad.' Delete')) {
	$smarty->assign('allow_del', 'yes');
}



check_login();
$smarty->assign('cuser', get_userid());

$smarty->assign('mod_w', $pavad);	
$smarty->assign('allow_edit', $this->CheckPermission($pavad.' Edit'));
$smarty->assign('allow_more', $this->CheckPermission($pavad.' More'));


$smarty->assign('start_form', $this->CreateFormStart($id, 'save_admin_prefs', $returnid));
$smarty->assign('title_allow_add',$this->Lang('title_allow_add'));
$smarty->assign('input_allow_add',$this->CreateInputCheckbox($id, 'allow_add', 1,
$this->GetPreference('allow_add','0')). $this->Lang('title_allow_add_help'));
$smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$smarty->assign('end_form', $this->CreateFormEnd());


echo $this->StartTabHeaders();

if (FALSE == empty($_GET['m1_kat']))
  {
	$tab = $_GET['m1_kat'];
  } else {
  $tab = '';
 }
$this->smarty->assign('root_url', $config[root_url]);

$smarty->assign($this->GetName(),$this);  



$this->smarty->assign('kalbos', $kalbos);
//echo $this->SetTabHeader('tekstas',$this->Lang('tekstas'), ('tekstas' == $tab)?true:false);
echo $this->SetTabHeader('foto',$this->Lang('foto'), ('foto' == $tab)?true:false);
// echo $this->SetTabHeader('blokai',$this->Lang('blokai'), ('blokai' == $tab)?true:false);
//echo $this->SetTabHeader('darb',$this->Lang('darb'), ('darb' == $tab)?true:false);
echo $this->EndTabHeaders();


/*echo $this->StartTab('tekstas', $params);
 if ($this->CheckPermission($pavad.' Add')) {
  $par['kat']="tekstas"; 
  $this->smarty->assign('addlink', $this->CreateLink($id, 'addprop', $returnid, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang('addprop'),$par,'','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'addprop', $returnid, $this->Lang('addprop'), $par, '', false, false, 'class="pageoptions"'));
 }

  foreach ($kalbos as $key=>$kalba){
	$prop_list[$key] = GetProps($special, "tekstas", $key); 
  }	 
	$this->smarty->assign("prop_array", $prop_list);
  
 $this->smarty->assign('kateg', 'tekstas');  
 echo $this->ProcessTemplate('tekstas.tpl');
echo $this->EndTab();

echo $this->StartTab('blokai', $params);
 if ($this->CheckPermission($pavad.' Add')) {
  $par['kat']="blokai"; 
  $this->smarty->assign('addlink', $this->CreateLink($id, 'addprop', $returnid, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang('addprop'),$par,'','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'addprop', $returnid, $this->Lang('addprop'), $par, '', false, false, 'class="pageoptions"'));
 }

 foreach ($kalbos as $key=>$kalba){
	$prop_list[$key] = GetProps($special, "blokai", $key); 
  }	 
	$this->smarty->assign("prop_array", $prop_list);
  
 $this->smarty->assign('kateg', 'blokai');  
 echo $this->ProcessTemplate('blokai.tpl');
echo $this->EndTab();*/

echo $this->StartTab('foto', $params);
 if ($this->CheckPermission($pavad.' Add')) {
  $par['kat']="foto"; 
  $this->smarty->assign('addlink', $this->CreateLink($id, 'addprop', $returnid, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang('addprop'),$par,'','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'addprop', $returnid, $this->Lang('addprop'), $par, '', false, false, 'class="pageoptions"'));
 }

  foreach ($kalbos as $key=>$kalba){
	$prop_list[$key] = GetProps($special, "foto", $key); 
  }	 
	$this->smarty->assign("prop_array", $prop_list);
  
 $this->smarty->assign('kateg', 'foto');  
 echo $this->ProcessTemplate('foto.tpl');
echo $this->EndTab();

/*echo $this->StartTab('darb', $params);
 if ($this->CheckPermission($pavad.' Add')) {
  $par['kat']="darb"; 
  $this->smarty->assign('addlink', $this->CreateLink($id, 'addprop', $returnid, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang('addprop'),$par,'','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'addprop', $returnid, $this->Lang('addprop'), $par, '', false, false, 'class="pageoptions"'));
 }

  foreach ($kalbos as $key=>$kalba){
	$prop_list[$key] = GetProps($special, "darb", $key); 
  }	 
	$this->smarty->assign("prop_array", $prop_list);
  
 $this->smarty->assign('kateg', 'darb');  
 echo $this->ProcessTemplate('darb.tpl');
echo $this->EndTab();*/


echo $this->EndTabContent();



?>