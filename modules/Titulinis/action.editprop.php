<?php
if (!isset($gCms)) exit;
include('dom.php');
$kalbospre = explode(',', $kalbos);
$kalbos = Array();
foreach ($kalbospre as $kalba){
 $kalbos[$kalba] = $kalba;
}

if (isset($params['cancel'])) 
 $this->Redirect($id, 'defaultadmin', $returnid);

if ((isset($params['submit'])) || (isset($params['change'])))
{
 
 $excl['mact'] = 1;
 $excl['sp_'] = 1;
 $excl['m1_hid'] = 1;
 $excl['m1_submit'] = 1;
 $excl['m1_change'] = 1;
 $excl['m1_kat'] = 1;
 

 
 $failai = array_keys($_FILES); 
 $f=0;

 while ($failai[$f]){
  $excl["m1_".$failai[$f]] = 1;
  $excl["m1_d_".$failai[$f]] = 1;
  $file = $_FILES[$failai[$f]];
 
     $fi = str_replace("m1_", "", $failai[$f]);
 
 
 echo $file['name'];
  if ($file['name']){
     /* $ad = time()."-"; $fupload = $config['root_path'].'/uploads/images/'.$ad.$file['name']; 
    @move_uploaded_file($file['tmp_name'], $fupload);   
  if ($_POST['m1_kategorija'] == 'laikrastis'){
   require_once(dirname(__FILE__).'/../../lib/filemanager/ImageManager/Classes/GD.php');
   $file_name_thumb = $config['root_path'].'/uploads/images/'.'thumb_'.$ad.$file['name']; 
   $img = new Image_Transform_Driver_GD;
   $img->load($fupload);
   $img->resizeANDcrop(80, 50);
   $img->save($file_name_thumb);
   $img->free();*/
   
$fnam = str_replace('-', '_', $file['name']);
		  $fnam = str_replace(' ', '_', $fnam);
		  $fnam = str_replace('%20', '_', $fnam);
		  
		  $ad = time()."_"; $fupload = $config['root_path'].'/uploads/images/titulinis/'.$ad.$fnam; 
		  @move_uploaded_file($file['tmp_name'], $fupload);	  
			require_once(dirname(__FILE__).'/../../lib/filemanager/ImageManager/Classes/GD.php');
	
			if($params['kat']=='blokai'){
				$width=214;
				$height=124;
			}
			else{
				$width=950;
				$height=415;
			}
		
			$file_name_thumb = $config['root_path'].'/uploads/images/titulinis/'.''.$ad.$fnam; 
			$img = new Image_Transform_Driver_GD;
			$img->load($fupload);
			$img->resizeANDcrop($width, $height);
			$img->save($file_name_thumb);
			$img->free();
		
			
		
		
		  $_POST[$failai[$f]] = $ad.$fnam;
    
   
    
     }        
 $delkey=str_replace('m1_', 'm1_d_', $failai[$f]);
     if ($_POST[$failai[$f]] || $_POST[$delkey]){      
      $query = 'UPDATE '.cms_db_prefix().$lentele.'  SET '.$fi.'="'.$_POST[$failai[$f]].'" WHERE id='.$_POST['m1_hid'];
      $db->Execute($query);

  }
     $f++;
 }
 

 
 $vardai = array_keys($_POST);
 $vardai[] = 'm1_nerodyti';
    
 
 $v=0;
 while($vardai[$v]){
     if (!$excl[$vardai[$v]]){
  $kint[] = str_replace('m1_','',$vardai[$v])."='".str_replace("'","`",$_POST[$vardai[$v]])."'";
  }
   
   $v++;
 }
 

 
     $kint_list = join(', ',$kint);
     $query = 'UPDATE '.cms_db_prefix().$lentele.'  SET '.$kint_list.' WHERE id='.$_POST['m1_hid'];  
     

//     echo $query." ".$_POST["m1_spec"];
     
     $db->Execute($query);
    
    
    print_r(mysql_error());

 audit($_POST['m1_hid'], $propname, 'Edited '.$pavad);


if (isset($params['change'])) {
   echo "Atnaujinta";
 $par[prop_id]=$_POST['m1_hid'];
 $par[kat]=$_POST['m1_kat'];

 $this->Redirect($id, 'editprop', $returnid, $par);
}else{
 $par[kat]=$_POST['m1_kat'];
 $this->Redirect($id, 'defaultadmin', $returnid, $par);
}


}

if ($_GET['prop_id'] == "") {$_GET['prop_id'] = $_GET['m1_prop_id'];}

$phid = $_GET['prop_id'];
$query = 'SELECT * FROM '.cms_db_prefix().$lentele.' WHERE id=?';
$dbresult = $db->Execute($query, array($phid));
$curr = $dbresult->FetchRow();
check_login();
$userid = get_userid();

 
 
if (!$this->CheckPermission($pavad.' Edit') && ($curr[userid] != $userid)) {
  return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
}


if (!$this->CheckPermission($pavad.' Special') && $curr[spec]){
 return $this->DisplayErrorPage($id, $params, $returnid,$this->Lang('accessdenied'));
}



if ( isset($phid))
{


    $query = 'SELECT * FROM '.cms_db_prefix().$lentele.' WHERE id=?';
    $dbr = mysql_query('SELECT * FROM '.cms_db_prefix().$lentele);
    
   $dbresult = $db->Execute($query, array($phid));
   if ( $row = $dbresult->FetchRow())
 {
  
  
  $vardai = array_keys($row);
  $v=0;
  $prop = new StdClass();
  while ($vardai[$v]){
   $prop->$vardai[$v] = $row[$vardai[$v]];
   $propt[$vardai[$v]]= mysql_field_type($dbr, $v);
   $propl[$vardai[$v]]= mysql_field_len($dbr, $v);
   $v++;
   
  }
  $props[] = $prop;
  
  
 }

}
$this->smarty->assign('hid', $this->CreateInputHidden($id, 'hid', $phid));


include("laukeliai.php");
$smarty->assign($this->GetName(),$this);
$this->smarty->assign('change', $this->CreateInputSubmit($id, 'change', $this->lang('change')));
$this->smarty->assign('kalbos', $kalbos);

echo $this->CreateFormStart($id, 'editprop', $returnid, 'post', 'multipart/form-data');
echo $this->ProcessTemplate('add_edit.tpl');
echo $this->CreateFormEnd();
?>