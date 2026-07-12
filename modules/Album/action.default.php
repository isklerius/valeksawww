<?php
// $gCms should always exist. If it doesn't, exit to be safe.
if (!isset($gCms))
{
	exit;
}



// Used for AlbumBlockContent. @TODO Do in a more elegant way
$AlbumCalled = 1;

// Get our CMS DB and config options.
global $gCms;
$db = $this->GetDb();
$query_var = $gCms->config['query_var'];

// == parameters == // 
// The detailpage parameter is used to allow Album pictures to be displayed in a different page from the album list
$detailpage = '';

if(isset($params['mazi'])){$this->smarty->assign_by_ref('mazi', $params['mazi']);}
if(isset($params['m'])){$this->smarty->assign_by_ref('m', $params['m']);}

if (isset($params['detailpage']))
{
	$manager =& $gCms->GetHierarchyManager();
	$node =& $manager->sureGetNodeByAlias($params['detailpage']);
	if (isset($node))
	{
		$content =& $node->GetContent();	
		if (isset($content))
		{
			$returnid = $content->Id();
		}
	}
	else
	{
		$node =& $manager->sureGetNodeById($params['detailpage']);
		if (isset($node))
		{
			$returnid = $params['detailpage'];
		}
	}
}
$sortdesc = (isset($params['sortdesc']) ? $params['sortdesc'] : false);
$albumids = (isset($params['albums']) ? $params['albums'] : false);

$albumid = '';
if (substr_count($albumids, ',')==0)
{
	$albumid = $albumids;
}
$albumid = (isset($params['albumid']) ? $params['albumid'] : $albumid);
$categories = (isset($params['categories']) ? $params['categories'] : false);
// == end parameters == //


// Get page hiearchy path of the page from which Album is being called.
// This is used to make URLs prettier
$q = "SELECT hierarchy_path FROM ".cms_db_prefix()."content WHERE content_id='".$returnid."'";
$dbresult = $db->Execute( $q );
if (!$dbresult)
{
	echo 'DB error: '. $db->ErrorMsg()."<br/>";
}
else
{
	$call_page = $dbresult->FetchRow();
	$hierarchy_path = $call_page['hierarchy_path']; // TODO Move this to be a pref that is overwriddable by a param.
}

// If the categories parameter has been passed. i.e. {cms_module module='album' categories='1'}
// but only if we are not viewing an album
if ($categories && TRUE == empty($albumid))
{
	// Get an array of album ids that belong to this category
	$category_album_ids = $this->GetAlbumsInCategory($categories, $sortdesc);
	// If there are no albums in this category
	if (empty($category_album_ids))
	{
		// Display an error
		echo $this->Lang('noalbumstext');
	}
	else
	{
		// Get the information about all the categories that have been requested. i.e.: {cms_module module='album' categories='1,3'}
		$db_categories = $this->GetCategories($categories, $sortdesc);
		$categories = array();
		// Loop through each of the categories
		foreach ($db_categories as $db_category)
		{
			// Get an array containing the data of all the albums in this category
			$this->albums = $this->GetAlbums($category_album_ids[$db_category->id], $sortdesc, $db_category->id);
	
			// Get the content of these albums
			$albums_content = '';

			// If the 'auto' option for 'Album List Template' is selected, then go through each
			// album one by one, and list it using the template that is assigned to it
			if ('auto' == $this->GetPreference('template','default'))
			{
				for ($i = 0 ; $i < count($this->albums) ; $i++)
				{
					$albums_content .= $this->ShowFrontendAlbumList($i, $hierarchy_path, $albumid, $id, $returnid, $params);
				}
			}
			else
			{
				$albums_content = $this->ShowFrontendAlbumList(0, $hierarchy_path, $albumid, $id, $returnid, $params);
			}

			// Add the output of these albums to a categories array
			$categories[] = array ('albums_content' =>  $albums_content, 'category' => $db_category);
		}
			// Make the array of album content available as an array to smarty
			
			$this->smarty->assign_by_ref('categories', $categories);
			// Get the 'categories' template
			$db_templatecontent = $this->GetTemplate('categories');
			// Use the database 'categories' template if it exists
			if (FALSE == empty($db_templatecontent))
			{
				$output = $this->ProcessTemplateFromDatabase('categories');
			}
			else // Otherwise just use the file categories template
			{
				$output = $this->ProcessTemplate('db/categories.tpl');
			}
			echo $output;
	}
}
else // Categories are not in use
{


	// This is very important to make both the album list and thumbnail list work correctly
	if (TRUE == empty($albumid))
	{
	
		$this->albums = $this->GetAlbums($albumids, $sortdesc);
	}
	else
	{
		// Get only pictures in a specific album?
		$this->albums = $this->GetAlbums($albumid, $sortdesc);
	}
	// If the 'auto' option for 'Album List Template' is selected, then go through each
	// album one by one, and list it using the template that is assigned to it
	if ('auto' == $this->GetPreference('template','default'))
	{
		// Loop through each album and get its content
		for ($i = 0 ; $i < count($this->albums) ; $i++)
		{
		
			echo $this->ShowFrontendAlbumList($i, $hierarchy_path, $albumid, $id, $returnid, $params);
		}
	}
	else
	{
		echo $this->ShowFrontendAlbumList(0, $hierarchy_path, $albumid, $id, $returnid, $params);
	}
}

?>
