<?php

if (!isset($gCms)) exit;

if(! $this->CheckPermission( 'Use Album' ) ) exit;

if (isset($params['cancel']))
{
	$params = array('active_tab' => 'categories');
	$this->Redirect($id, 'defaultadmin', '', $params);
}

echo '<h2>'.$this->Lang('editcategory').'</h2>';

$category_name = ( isset($params['category_name']) ? $params['category_name'] : '');
$category_comment = (isset($params['category_comment']) ? $params['category_comment'] : '');

$category_id = (isset($params['category_id']) ? $params['category_id'] : '');
if ($category_id == '')
{
	$this->Redirect($id, 'defaultadmin', $returnid);
}

if (isset($params['submit']))
{
	if ($category_name != '')
	{	
		$query = 'UPDATE '.cms_db_prefix().'module_album_categories SET category_name=?, category_comment=? WHERE category_id = ?';
		$db->Execute($query, array($category_name, $category_comment, $category_id));
		$params = array('tab_message' => 'categoryupdated', 'active_tab' => 'categories');
		$this->Redirect($id, 'defaultadmin', '', $params);
	}
	else
	{
		echo $this->ShowErrors($this->Lang('error_nocategorynamegiven'));	
	}
}

$db_category = $this->Getcategory($category_id);
$category_name = $db_category->name;
$category_comment = $db_category->comment;

$this->smarty->assign('nametext', $this->Lang('name'));
$this->smarty->assign('nameinput', $this->CreateInputText($id, 'category_name', $category_name, 30, 255));
$this->smarty->assign('commenttext', $this->Lang('comment'));
$this->smarty->assign('commentinput', $this->CreateTextArea(true, $id, $category_comment, 'category_comment', '', '', '', '', '80', '5'));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('submit')));
$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));
echo $this->CreateFormStart($id, 'editcategory', $returnid);
echo $this->ProcessTemplate('editcategory.tpl');
echo $this->CreateInputHidden($id, 'category_id', $category_id);
echo $this->CreateFormEnd();

?>
