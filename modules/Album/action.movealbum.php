<?php

if (!isset($gCms)) exit;

$albumid = (isset($params['albumid']) ? $params['albumid'] : '');
$category_id = (isset($params['category_id']) ? $params['category_id'] : '');
if ($albumid == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

$direction = (isset($params['direction']) ? $params['direction'] : '');
if ($direction != 'up' && $direction!='down')
	$this->Redirect($id, 'defaultadmin', $returnid);

if(! $this->CheckPermission( 'Use Album' ) ) exit;


if (FALSE == empty($category_id))
{
	// Get number of this album listing
	$query = 'SELECT * FROM '.cms_db_prefix().'module_album_category_listings WHERE listing_album_id = ? AND listing_category_id = ?';
	$dbresult = $db->Execute($query, array($albumid,$category_id));
	while (($row = $dbresult->FetchRow()))
	{
		$listing_number = $row['listing_number'];
	}
	// TODO: Make listing numbers be swapped instead of only changing by 1?
	if ($direction == 'up')
		$new_listing_number = $listing_number-1;
	else
		$new_listing_number = $listing_number+1;
	
	// Reorder the albums
	$query = 'UPDATE '.cms_db_prefix().'module_album_category_listings SET listing_number=? WHERE listing_number=? AND listing_category_id = ?';
	$db->Execute($query, array($listing_number,$new_listing_number,$category_id));
	$query = 'UPDATE '.cms_db_prefix().'module_album_category_listings SET listing_number=? WHERE listing_album_id=? AND listing_category_id = ?';
	$db->Execute($query, array($new_listing_number,$albumid,$category_id));
}
else
{
	// Get number of this Album
	$query = 'SELECT * FROM '.cms_db_prefix().'module_album_albums WHERE album_id = ?';
	$dbresult = $db->Execute($query, array($albumid));
	while (($row = $dbresult->FetchRow()))
	{
		$albumnumber = $row['album_number'];
	}
	
	if ($direction == 'up')
		$newalbumnumber = $albumnumber-1;
	else
		$newalbumnumber = $albumnumber+1;
	
	// Reorder the albums
	$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET album_number=? WHERE album_number=?';
	$db->Execute($query, array($albumnumber,$newalbumnumber));
	$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET album_number=? WHERE album_id=?';
	$db->Execute($query, array($newalbumnumber,$albumid));
}

$params = array('tab_message' => 'albummoved', 'active_tab' => 'albums');
$this->Redirect($id, 'defaultadmin', '', $params);
?>