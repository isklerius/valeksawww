<?php

if (!isset($gCms)) exit;

$category_id = (isset($params['category_id']) ? $params['category_id'] : '');
if ($category_id == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

if(! $this->CheckPermission( 'Use Album' ) ) exit;

// Get the category number
$db_category = $this->GetCategory($category_id);
$category_number = $db_category->number;

// Delete the category
$query = "DELETE FROM ".cms_db_prefix()."module_album_categories WHERE category_id = ?";
$db->Execute($query, array($category_id));

// Delete category listings
$query = "DELETE FROM ".cms_db_prefix()."module_album_category_listings WHERE listing_category_id = ?";
$db->Execute($query, array($category_id));

// Update Category numbers
$query = 'UPDATE '.cms_db_prefix().'module_album_categories SET category_number=category_number-1 WHERE category_number > ?';
$db->Execute($query, array($category_number));

$params = array('tab_message' => 'categorydeleted', 'active_tab' => 'categories');
$this->Redirect($id, 'defaultadmin', $returnid, $params);
?>
