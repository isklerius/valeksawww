<?php

if (!isset($gCms)) exit;

if(! $this->CheckPermission( 'Use Album' ) ) exit;

if (isset($params['cancel']))
{
	$params = array('active_tab' => 'categories');
	$this->Redirect($id, 'defaultadmin', '', $params);
}

$categoryname = (isset($params['categoryname']) ? $params['categoryname'] : '');
$category_comment = (isset($params['category_comment']) ? $params['category_comment'] : '');


if (isset($params['submit']))
{
	if ($categoryname != "")
	{
		$categoryid = $db->GenID(cms_db_prefix()."module_album_categories_seq");
		$categorynumber = $this->categoryCount()+1;
		
		$query = 'INSERT INTO '.cms_db_prefix().'module_album_categories (category_id,category_name,category_comment,category_number) VALUES (?,?,?,?)';
		$db->Execute($query, array($categoryid,$categoryname,$category_comment,$categorynumber));

		$params = array('tab_message' => 'categoryadded', 'active_tab' => 'categories');
		$this->Redirect($id, 'defaultadmin', '', $params);
	}
	else
	{
		echo $this->ShowErrors($this->Lang('error_nocategorynamegiven'));	
	}
}


$this->smarty->assign('nametext', $this->Lang('name'));
$this->smarty->assign('nameinput', $this->CreateInputText($id, 'categoryname', $categoryname, 30, 255));
$this->smarty->assign('commenttext', $this->Lang('comment'));
$this->smarty->assign('commentinput', $this->CreateTextArea(true, $id, $category_comment, 'category_comment', '', '', '', '', '80', '5'));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('submit')));
$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', $this->Lang('cancel')));

echo $this->CreateFormStart($id, 'addcategory', $returnid);
echo $this->ProcessTemplate('editcategory.tpl');
echo $this->CreateFormEnd();

?>
