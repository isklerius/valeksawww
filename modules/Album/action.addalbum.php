<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid);
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$albumname = (isset($params['albumname']) ? $params['albumname'] : '');


if (isset($params['submit']))
{
	if ($albumname != "")
	{
		$albumid = $db->GenID(cms_db_prefix()."module_album_albums_seq");
		$albumnumber = $this->AlbumCount()+1;
		
		$query = 'INSERT INTO '.cms_db_prefix().'module_album_albums (album_id,album_name,album_number,column_number,row_number,template) VALUES (?,?,?,?,?,?)';
		 $db->Execute($query, array($albumid,$albumname,$albumnumber,$this->GetPreference('defaultcolumns', ''),$this->GetPreference('defaultrows', ''),$this->GetPreference('defaulttemplate', '')));

		 //Update search index
		 $module =& $this->GetModuleInstance('Search');
		 if ($module != FALSE)
		   {
		     $module->AddWords($this->GetName(), $albumid, 'album', $albumname);
		   }

		$params = array('albumid' => $albumid, 'module_message' => $this->lang('albumadded'));
		$this->Redirect($id, 'editalbum', $returnid, $params);
	}
	else
	{
		echo $this->ShowErrors($this->Lang('error_nonamegiven'));	
	}
}


$this->smarty->assign('nametext', $this->Lang('name'));
$this->smarty->assign('nameinput', $this->CreateInputText($id, 'albumname', $albumname, 30, 255));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->CreateFormStart($id, 'addalbum', $returnid);
echo $this->ProcessTemplate('newalbum.tpl');
echo $this->CreateFormEnd();

?>
