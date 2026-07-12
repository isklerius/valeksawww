<?php

if (!isset($gCms)) exit;
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$pictureid = (isset($params['pictureid']) ? $params['pictureid'] : '');

if ($pictureid == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

if (isset($params['cancel']) || isset($params['filename']))
{
	$albumid = $this->GetAlbumId($pictureid);
}

if (isset($params['cancel']))
{
	if (isset($albumid))
		$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));
	else
		$this->Redirect($id, 'defaultadmin', $returnid);
}


if (isset($params['filename'])) 
{
	$newpic = $params['filename']; //$config['image_uploads_url'].$curdir.'/'.$params['filename'];
	$newthumb = dirname($newpic).'/thumb_'.basename($newpic);
	if (!file_exists($config['image_uploads_path'].$newthumb))
		$newthumb = '';
	$query = 'UPDATE '.cms_db_prefix().'module_album_pictures SET picture_path=?, thumbnail_path=? WHERE picture_id = ?';
	$db->Execute($query, array($newpic, $newthumb,$pictureid));

	if (isset($albumid))
		$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));
	else
		$this->Redirect($id, 'defaultadmin', $returnid);
}
	
include dirname(__FILE__).'/lib.browsepictures.php';


?>