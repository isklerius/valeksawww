<?php

if (!isset($gCms)) exit;

$pictureid = (isset($params['pictureid']) ? $params['pictureid'] : '');
if ($pictureid == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

if (isset($params['cancel'])) 
	$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$pictureid = (isset($params['pictureid']) ? $params['pictureid'] : '');

// récupération des informations sur l'album
$query = 'SELECT * FROM '.cms_db_prefix().'module_album_pictures WHERE picture_id = ?';
$dbresult = $db->Execute($query, array($pictureid));

while (($row = $dbresult->FetchRow()))
{
	$picturenumber = $row['picture_number'];
	$albumid = $row['picture_album_id'];
}

$query = "DELETE FROM ".cms_db_prefix()."module_album_pictures WHERE picture_id = ?";
$db->Execute($query, array($pictureid));

//Update search index
$module =& $this->GetModuleInstance('Search');
if ($module != FALSE)
  {
    $module->DeleteWords($this->GetName(), $pictureid, 'album_picture');
  }

//Renumérotation des images si besoin
$query = 'UPDATE '.cms_db_prefix().'module_album_pictures SET picture_number=picture_number-1 WHERE (picture_number > ? AND picture_album_id=?)';
$db->Execute($query, array($picturenumber,$albumid));

$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));


?>