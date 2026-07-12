<?php

if (!isset($gCms)) exit;

$albumid = (isset($params['albumid']) ? $params['albumid'] : '');
if ($albumid == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

if (isset($params['cancel'])) 
	$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$dbalbum = $this->GetAlbum($albumid);
$albumnumber = $dbalbum->number;

// Delete pictures
$query = "DELETE FROM ".cms_db_prefix()."module_album_pictures WHERE picture_album_id = ?";
$db->Execute($query, array($albumid));
// Delete category listings
$query = "DELETE FROM ".cms_db_prefix()."module_album_category_listings WHERE listing_album_id = ?";
$db->Execute($query, array($albumid));
// Delete Album
$query = "DELETE FROM ".cms_db_prefix()."module_album_albums WHERE album_id = ?";
$db->Execute($query, array($albumid));

//Update search index
$module =& $this->GetModuleInstance('Search');
if ($module != FALSE)
  {
    $module->DeleteWords($this->GetName(), $albumid, 'album');
  }


// Update Album numbers
$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET album_number=album_number-1 WHERE album_number > ?';
$db->Execute($query, array($albumnumber));

$params = array('tab_message' => 'albumdeleted', 'active_tab' => 'albums');
$this->Redirect($id, 'defaultadmin', $returnid, $params);
?>
