<?php

if (!isset($gCms)) exit;

$pictureid = (isset($params['pictureid']) ? $params['pictureid'] : '');
if ($pictureid == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

$direction = (isset($params['direction']) ? $params['direction'] : '');
if ($direction != 'up' && $direction!='down')
	$this->Redirect($id, 'defaultadmin', $returnid);

if(! $this->CheckPermission( 'Use Album' ) ) exit;

// récupération des informations sur l'album
$query = 'SELECT * FROM '.cms_db_prefix().'module_album_pictures WHERE picture_id = ?';
$dbresult = $db->Execute($query, array($pictureid));
while (($row = $dbresult->FetchRow()))
{
	$picturenumber = $row['picture_number'];
	$albumid = $row['picture_album_id'];
}

if ($direction == 'up')
	$newpicturenumber = $picturenumber-1;
else
	$newpicturenumber = $picturenumber+1;

//Renumérotation des albums si besoin
$query = 'UPDATE '.cms_db_prefix().'module_album_pictures SET picture_number=? WHERE (picture_number=? AND picture_album_id=?)';
$db->Execute($query, array($picturenumber,$newpicturenumber,$albumid));
$query = 'UPDATE '.cms_db_prefix().'module_album_pictures SET picture_number=? WHERE picture_id=?';
$db->Execute($query, array($newpicturenumber,$pictureid));

$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));


?>