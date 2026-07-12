<?php
if (!isset($gCms)) exit;

  if(empty($params['number']))
    {
      $number = 10;
    }
  else
    {
      $number = $params['number'];
    }
// Allow picture from a specific album to be chosen via: {cms_module module='album' albums='1' action='recently_updated' number='2'}
if(empty($params['albums'])) {
	$ids = FALSE;
} else {
	$ids = $params['albums'];
}
$album_page_id = $this->GetPreference('defaultalbumpage','');
// Get page content of the page from which Album is being called.
$q = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id='".$album_page_id."'";
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

$output = '<ul class="picturelist">';
global $gCms;

$db = &$gCms->db;

// Get list of most recently add pictures
	if ($ids===false || $ids=='')
		$query = "SELECT * FROM ".cms_db_prefix()."module_album_pictures ORDER BY picture_id DESC LIMIT ".$number;
	else
	{
		$ids = explode(',', $ids);
		$query = '';
		foreach ($ids as $id)
			$query .= ($query!='' ? ' OR ': '').'picture_album_id='.$id;
		$query = "SELECT * FROM ".cms_db_prefix()."module_album_pictures WHERE (".$query.") ORDER BY picture_id DESC LIMIT ".$number;
	}


$dbresult = $db->Execute( $query );
if( !$dbresult )
{
    echo 'DB error: '. $db->ErrorMsg()."<br/>";
}
$pictures = array();
while ($row = $dbresult->FetchRow())
{	
	$picture=$this->row2picture_class($row);
	$this->setThumbDimensions($row, $picture);
	$picture->link = $this->CreateLink($id, 'default', $album_page_id, '', array('albumid'=>$row['picture_album_id'],'pictureid'=>$row['picture_id']), '', true, '', '', '', $hierarchy_path.'/album-'.$row['picture_album_id'].'/'.$row['picture_id'].'/'.$album_page_id);
	$pictures[] = $picture;
}

$this->smarty->assign_by_ref('pictures', $pictures);
$this->smarty->assign('picturenumber', 10);
$db_templatecontent = $this->GetTemplate('recently_updated');
if (FALSE == empty($db_templatecontent))
{
	$output = $this->ProcessTemplateFromDatabase('recently_updated');
}
else
{
	$output = $this->ProcessTemplate('db/recently_updated.tpl');
}
echo $output;


?> 
