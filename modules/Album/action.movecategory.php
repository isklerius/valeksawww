<?php

if (!isset($gCms)) exit;

$category_id = (isset($params['category_id']) ? $params['category_id'] : '');
if ($category_id == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

$direction = (isset($params['direction']) ? $params['direction'] : '');
if ($direction != 'up' && $direction!='down')
	$this->Redirect($id, 'defaultadmin', $returnid);

if(! $this->CheckPermission( 'Use Album' ) ) exit;

// Get list of categories
$query = 'SELECT * FROM '.cms_db_prefix().'module_album_categories WHERE category_id = ?';
$dbresult = $db->Execute($query, array($category_id));
while (($row = $dbresult->FetchRow()))
{
	$category_number = $row['category_number'];
}

if ($direction == 'up')
	$new_category_number = $category_number-1;
else
	$new_category_number = $category_number+1;

// Reorder the categories
$query = 'UPDATE '.cms_db_prefix().'module_album_categories SET category_number=? WHERE category_number=?';
$db->Execute($query, array($category_number,$new_category_number));
$query = 'UPDATE '.cms_db_prefix().'module_album_categories SET category_number=? WHERE category_id=?';
$db->Execute($query, array($new_category_number,$category_id));

$params = array('tab_message' => 'categorymoved', 'active_tab' => 'categories');
$this->Redirect($id, 'defaultadmin', '', $params);

?>