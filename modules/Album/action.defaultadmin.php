<?php

if (!isset($gCms)) exit;
if(! $this->CheckAccess($id, $params, $returnid) ) exit;

$config = $gCms->config;
$themeObject = &$gCms->variables['admintheme'];

// Create Album Admin object
// open_basedir restriction fix
// require 'classes/module/class.AlbumAdmin.php';
require '../modules/Album/classes/module/class.AlbumAdmin.php';
$albumAdmin = new AlbumAdmin;

// The tabs
echo $this->StartTabHeaders();
$active_tab = isset($params['active_tab']) ? $params['active_tab'] : FALSE;
// Tab headers
echo $this->SetTabHeader('albums', $this->Lang('Albums'), ('albums' == $active_tab));
echo $this->SetTabHeader('categories', $this->Lang('categories'), ('categories' == $active_tab));
echo $this->SetTabHeader('templates',$this->Lang('Templates'), ('templates' == $active_tab));
echo $this->SetTabHeader('file_templates',$this->Lang('file_templates'), ('file_templates' == $active_tab));
if($this->CheckPermission('Modify Site Preferences'))
{
	echo $this->SetTabHeader('options', $this->Lang('options'), ('options' == $active_tab));
}
echo $this->EndTabHeaders();


echo $this->StartTabContent();
echo $this->StartTab('albums', $params);

$categories = array();

// Get albums that are not in a category
// To understand this query see: http://www.informit.com/articles/article.asp?p=30875&seqNum=5
$query = 'SELECT '.cms_db_prefix().'module_album_albums.album_id FROM '.cms_db_prefix().'module_album_albums LEFT JOIN '.cms_db_prefix().'module_album_category_listings ON '.cms_db_prefix().'module_album_albums.album_id = '.cms_db_prefix().'module_album_category_listings.listing_album_id WHERE '.cms_db_prefix().'module_album_category_listings.listing_album_id IS NULL';
$dbresult = $db->Execute($query);
if (false == $dbresult)
{
	echo $this->ShowErrors( $this->Lang('query_failed') );
}
while( $dbresult && ($row = $dbresult->FetchRow()) )
{
	if (TRUE == empty($unlisted_ids))
	{
		$unlisted_ids = $row['album_id'];
	}
	else
	{
		$unlisted_ids .= ','.$row['album_id'];
	}
}
if (FALSE == empty($unlisted_ids))
{
	$albums = $albumAdmin->getAlbumsFromIds(0, $unlisted_ids, $id, $returnid); 
	$categories[] = array ('albums' =>  $albums, 'category_name' => $this->Lang('uncategorized'));
}

// Get categories and list all Albums in them
$db_categories = $this->GetCategories();
foreach ($db_categories as $db_category)
{
	$album_ids = $this->GetAlbumsInCategory($db_category->id);
	if (TRUE == empty($album_ids[$db_category->id]))
	{
		$albums = '';
	}
	else
	{
		$albums = $albumAdmin->getAlbumsFromIds($db_category->id, $album_ids[$db_category->id], $id, $returnid);
	}
	$categories[] = array ('albums' =>  $albums, 'category_name' => $db_category->name);
}

$this->smarty->assign_by_ref('categories', $categories);
$this->smarty->assign('noalbumstext', $this->Lang('noalbumstext'));
$this->smarty->assign('albumnametext', $this->Lang('albumnametext'));
$this->smarty->assign('albumtemplatetext', $this->Lang('template'));
$this->smarty->assign('albumthumbtext', $this->Lang('albumthumbtext'));
$this->smarty->assign('albumidtext', $this->Lang('albumidtext'));
$this->smarty->assign('albumreordertext', $this->Lang('albumreordertext'));
$this->smarty->assign('albumactionstext', $this->Lang('albumactionstext'));
$this->smarty->assign('picturestext', $this->Lang('pictures'));
$this->smarty->assign('albumnumpicturestext', $this->Lang('albumnumpicturestext'));
$this->smarty->assign('addlink', $this->CreateLink($id, 'addalbum', $returnid, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang('addalbum'),'','','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'addalbum', $returnid, $this->Lang('addalbum'), array(), '', false, false, 'class="pageoptions"'));
echo $this->ProcessTemplate('albumlist.tpl');

echo $this->EndTab();


echo $this->StartTab('categories', $params);

$db_categories = $this->GetCategories();
if (TRUE == empty($db_categories)) {
	$this->smarty->assign('nocategoriestext', $this->Lang('nocategories'));
}
$categories = array();
foreach ($db_categories as $db_category)
{
	$onerow = new stdClass();
	$onerow->name = $this->CreateLink($id, 'editcategory', $returnid, $db_category->name, array('category_id'=>$db_category->id));
	$onerow->id = $db_category->id;
	$onerow->deletelink = $this->CreateLink($id, 'deletecategory', $returnid, 
						$themeObject->DisplayImage('icons/system/delete.gif', $this->Lang('deletealbum'),'','','systemicon'),
									   array('category_id' => $db_category->id), $this->Lang('areyousure'));
	if (count($categories) > 0)
	{
		$onerow->uplink = $this->CreateLink($id, 'movecategory', $returnid,
						    $themeObject->DisplayImage('icons/system/arrow-u.gif', lang('up'),'','','systemicon'), 
									       array('category_id' => $db_category->id, 'direction'=>'up'));
	} else {
		$onerow->uplink = '';
	}
	if (count($albums) < count($db_categories)-1)
	{
		$onerow->downlink = $this->CreateLink($id, 'movecategory', $returnid,
						      $themeObject->DisplayImage('icons/system/arrow-d.gif', lang('down'),'','','systemicon'), 
										 array('category_id' => $db_category->id, 'direction'=>'down'));
	} else {
		$onerow->downlink = '';
	}

	// $onerow->picturenumber = $this->PictureCount($dbalbum->id);

	array_push($categories, $onerow);
}

$this->smarty->assign_by_ref('items', $categories);
$this->smarty->assign('itemcount', count($categories));

$this->smarty->assign('categorynametext', $this->Lang('categorynametext'));
$this->smarty->assign('categorytemplatetext', $this->Lang('template'));
$this->smarty->assign('categorythumbtext', $this->Lang('categorythumbtext'));
$this->smarty->assign('categoryidtext', $this->Lang('categoryidtext'));
$this->smarty->assign('categoryreordertext', $this->Lang('categoryreordertext'));
$this->smarty->assign('categoryactionstext', $this->Lang('categoryactionstext'));
$this->smarty->assign('categoriestext', $this->Lang('categories'));
$this->smarty->assign('categorynumpicturestext', $this->Lang('categorynumpicturestext'));
$this->smarty->assign('addlink', $this->CreateLink($id, 'addcategory', $returnid, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang('addcategory'),'','','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'addcategory', $returnid, $this->Lang('addcategory'), array(), '', false, false, 'class="pageoptions"'));
echo $this->ProcessTemplate('categorylist.tpl');

echo $this->EndTab();




echo $this->StartTab('templates', $params);
$templates = array();
$templates2 = array();
$templates2[$this->Lang('automatic_album_list_template')] = 'auto';
$dbtemplates = $this->ListTemplates ();
$rowclass = 'row1';
foreach ($dbtemplates as $template)
{
	$onerow = new stdClass();
	$onerow->rowclass = $rowclass;
	$onerow->name = $this->CreateLink($id, 'edittemplate', $returnid, $template, array('templatename'=>$template));
	$onerow->editlink = $this->CreateLink($id, 'edittemplate', $returnid, $themeObject->DisplayImage('icons/system/edit.gif', $this->Lang('edittemplate'),'','','systemicon'), array('templatename' => $template));
	if ($template!='default')
	{
		$onerow->deletelink = $this->CreateLink($id, 'deletetemplate', $returnid, $themeObject->DisplayImage('icons/system/delete.gif', $this->Lang('deletetemplate'),'','','systemicon'), array('templatename' => $template), $this->Lang('areyousure'));
	} else {
		$onerow->deletelink = '';
	}
	$templates2[$template]=$template;
	$templates[] = $onerow;
	($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
}

$this->smarty->assign('formstart', $this->CreateFormStart($id, 'changetemplate', $returnid));
$this->smarty->assign('templatetext', $this->Lang('currenttemplate'));
$this->smarty->assign('templateinput', $this->CreateInputDropdown($id, 'templatename', $templates2, -1, $this->GetPreference('template','default')));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('submit')));
$this->smarty->assign('formend', $this->CreateFormEnd());

$this->smarty->assign_by_ref('items', $templates);

$this->smarty->assign('templatenametext', $this->Lang('templatenametext'));

$this->smarty->assign('addlink', $this->CreateLink($id, 'edittemplate', $returnid, $themeObject->DisplayImage('icons/system/newobject.gif', $this->Lang('addtemplate'),'','','systemicon'), array(), '', false, false, '') .' '. $this->CreateLink($id, 'edittemplate', $returnid, $this->Lang('addtemplate'), array(), '', false, false, 'class="pageoptions"'));
echo $this->ProcessTemplate('templatelist.tpl');

echo $this->EndTab();




/*****************************************
 * Handle the File Tab
 ****************************************/
echo $this->StartTab('file_templates');
echo $this->Lang('file_templates_help');
$dir = dirname(__FILE__) . '/templates/db';
$dh  = opendir($dir);
$files = array();
while (false !== ($filename = readdir($dh)))
{
	$files[] = $filename;
}
if (isset($dh))
	closedir($dh);

$rowclass = 'row1';
$entryarray = array();

foreach ($files as $onefile)
{
	//If this is not a .tpl file, skip it
	if (!endswith($onefile, '.tpl')) continue;

	//If this is in badfiles, skip it
	// if (in_array($onefile, $badfiles)) continue;

	$onerow = new stdClass();

	$onerow->filename = $onefile;
	$onerow->rowclass = $rowclass;

	$onerow->importlink = $this->CreateLink($id, 'importtemplate', $returnid, $themeObject->DisplayImage('icons/system/import.gif', $this->Lang('importtemplate'),'','','systemicon').' '.$this->Lang('importtemplate'), array('tplname' => $onefile));

	$entryarray[] = $onerow;

	($rowclass=="row1"?$rowclass="row2":$rowclass="row1");
}

$this->smarty->assign_by_ref('items', $entryarray);
$this->smarty->assign('itemcount', count($entryarray));

$this->smarty->assign('filenametext', $this->Lang('filename'));
$this->smarty->assign('nofilestext', $this->Lang('notemplatefiles', dirname(__FILE__) . '/templates/db'));

#Display template
echo $this->ProcessTemplate('filetpllist.tpl');

echo $this->EndTab();
/*****************************************
 * Finished File Tab
 ****************************************/


if ($this->CheckPermission('Modify Site Preferences'))
{
	echo $this->StartTab('options', $params);
	echo '<p><a href="'.$config['root_url'].'/'.$config['admin_dir'] .'/listmodules.php?action=upgrade&module=Album&oldversion='.$this->GetVersion().'&newversion='.$this->GetVersion().'">'.$this->lang('run_upgrade_script').'</a></p>';
	$this->smarty->assign('startform', $this->CreateFormStart($id, 'updateoptions'));
	$this->smarty->assign('endform', $this->CreateFormEnd());

	$contentops =& $gCms->GetContentOperations();
	$this->smarty->assign('defaultalbumpage_text', $this->Lang('defaultalbumpage'));
	$this->smarty->assign('defaultalbumpage_input', $contentops->CreateHierarchyDropdown('', $this->GetPreference('defaultalbumpage','')));

	$this->smarty->assign('defaulttemplatetext', $this->Lang('defaulttemplate'));
	$this->smarty->assign('defaulttemplateinput', $this->CreateInputDropdown($id, 'defaulttemplate', $templates2, -1, $this->GetPreference('defaulttemplate','')));

	$this->smarty->assign('autolinkstylesheet_text', $this->Lang('autolinkstylesheet'));
	$this->smarty->assign('autolinkstylesheet_input', $this->CreateInputCheckbox($id, 'autolinkstylesheet', 1, $this->GetPreference('autolinkstylesheet', 1)));
	

	$stylesheet_link =  '<a href="'.$config['root_url'].'/modules/Album/css/stylesheet.css">'.$themeObject->DisplayImage('icons/system/css.gif', $this->lang('view_default_stylesheet'),'','','systemicon').'</a> ';
	$stylesheet_link .= '<a href="'.$config['root_url'].'/modules/Album/css/stylesheet.css">'.$this->lang('view_default_stylesheet').'</a>';
	$this->smarty->assign('stylesheet_link', $stylesheet_link);

	$this->smarty->assign('useinlinelinkstext', $this->Lang('useinlinelinks'));
	$this->smarty->assign('useinlinelinksinput', $this->CreateInputCheckbox($id, 'useinlinelinks', 1, $this->GetPreference('useinlinelinks', 1)));

	$this->smarty->assign('max_image_size_text', $this->Lang('max_image_size'));
	$this->smarty->assign('max_image_size_input', $this->CreateInputText($id, 'max_image_size', $this->GetPreference('max_image_size', 800), '10', '255'));

	$this->smarty->assign('defaultcolumnstext', $this->Lang('defaultcolumns'));
	$this->smarty->assign('defaultcolumnsinput', $this->CreateInputText($id, 'defaultcolumns', $this->GetPreference('defaultcolumns', ''), '10', '255'));

	$this->smarty->assign('defaultrowstext', $this->Lang('defaultrows'));
	$this->smarty->assign('defaultrowsinput', $this->CreateInputText($id, 'defaultrows', $this->GetPreference('defaultrows', ''), '10', '255'));

	$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', $this->Lang('submit')));

	echo $this->ProcessTemplate('options.tpl');
	echo $this->CreateFormEnd();
	echo $this->EndTab();
}

echo $this->EndTabContent();
?>
