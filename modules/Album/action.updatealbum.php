<?php

if (!isset($gCms)) exit;
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$albumname = (isset($params['albumname']) ? $params['albumname'] : '');
$album_id = (isset($params['albumid']) ? $params['albumid'] : '');
$category_listings = (isset($params['category_listings']) ? $params['category_listings'] : '');

if (!isset($album_id))
	$this->Redirect($id, 'defaultadmin', $returnid);


if ($albumname != "")
{	
	$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET album_name=? WHERE album_id = ?';
	$db->Execute($query, array($albumname, $album_id));
	//Update search index
	$module =& $this->GetModuleInstance('Search');
	if ($module != FALSE)
	  {
	    $module->AddWords($this->GetName(), $album_id, 'album', $albumname);
	  }
}

// Update category listings

if(is_array($category_listings) && (count($category_listings) > 0) )
{
	// To prevent bug where editing an Album makes it become the last Album listed:
	// 1. Get a list of all album categories this Album is listed in.
	// Get which categories this Album is currently in
	$query = 'SELECT listing_category_id FROM '.cms_db_prefix().'module_album_category_listings WHERE listing_album_id='.intval($album_id);
	$dbresult = $db->Execute($query);
	while ($row = $dbresult->FetchRow())
	{
		$used_to_be_listed_in[$row['listing_category_id']] = true;
	
		// If an album is no longer selected to be listed in a category, deleted its listing in that category from the database
		if( false == in_array($row['listing_category_id'], $category_listings) ) {
			$query = 'DELETE FROM '.cms_db_prefix().'module_album_category_listings WHERE listing_album_id = ? AND listing_category_id = ?';
			$db->Execute($query, array($album_id, $row['listing_category_id']));
		}
	
	}

	foreach($category_listings as $category_id)
	{
		
		$category_id = intval($category_id);
		if($category_id > 0)
		{
			// If this album is not already listed in this category, then add list it in this category
			if( true == empty($used_to_be_listed_in[$category_id]) ) {
				$listing_id = $db->GenID(cms_db_prefix()."module_album_category_listings_seq");
				// When listing an Album in a new category put it at the end of the Albums already in that category
				$listing_number = $this->MaxListingNumber($category_id)+1;
				$query = 'INSERT INTO '.cms_db_prefix().'module_album_category_listings (listing_id, listing_album_id, listing_category_id, listing_number) VALUES (?,?,?,?)';
				$db->Execute($query, array($listing_id,$album_id,$category_id,$listing_number));
			}
		}
	}
}


$params = array('albumid' => $album_id, 'tab_message' => 'album_updated', 'active_tab' => 'pictures');
$this->Redirect($id, 'editalbum', $returnid, $params);

?>
