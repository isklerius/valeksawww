<?php

if (!isset($gCms)) exit;
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$pictureid = (isset($params['pictureid']) ? $params['pictureid'] : '');
$albumid = (isset($params['albumid']) ? $params['albumid'] : '');

if ($pictureid == '' && $albumid=='')
	$this->Redirect($id, 'defaultadmin', $returnid);

if ($albumid=='' && (isset($params['cancel']) || isset($params['filename'])))
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
	$newthumb = $params['filename'];

	if ($pictureid!='')
	{
		$query = 'UPDATE '.cms_db_prefix().'module_album_pictures SET thumbnail_path=? WHERE picture_id = ?';
		$db->Execute($query, array($newthumb,$pictureid));
	}
	elseif ($albumid!='')
	{
		if ($params['filename']!='')
		{
			$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET thumbnail_path=? WHERE album_id = ?';
			$db->Execute($query, array($newthumb,$albumid));
		}
		else
		{
			$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET thumbnail_path=NULL WHERE album_id = ?';
			$db->Execute($query, array($albumid));
		}
	}

	if (isset($albumid))
		$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));
	else
		$this->Redirect($id, 'defaultadmin', $returnid);
}
	
include dirname(__FILE__).'/lib.browsepictures.php';


?>