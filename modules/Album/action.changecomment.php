<?php

if (!isset($gCms)) exit;
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$pictureid = (isset($params['pictureid']) ? $params['pictureid'] : '');
$albumid = (isset($params['albumid']) ? $params['albumid'] : '');



if ((isset($params['submit']) || isset($params['cancel'])) && $albumid=='')
{
	$albumid = $this->GetAlbumId($pictureid);
}

if (isset($params['cancel']))
	$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));


if (isset($params['submit']))
{
	// Clear the site cache
	global $gCms;
	$contentops =& $gCms->GetContentOperations();
	$contentops->ClearCache();
	if ($pictureid!='')
	{
		$query = 'UPDATE '.cms_db_prefix().'module_album_pictures SET comment=?, comment2=?, comment3=?, picture_name=? WHERE picture_id = ?';
		$db->Execute($query, array($params['comment'], $params['comment2'], $params['comment3'], $params['title'],$pictureid));
		//Update search index
		$module =& $this->GetModuleInstance('Search');
		if ($module != FALSE)
		  {
		    $module->AddWords($this->GetName(), $pictureid, 'album_picture', $params['title']. ' '.$params['comment']);
		  }
		$params = array('albumid' => $albumid, 'tab_message' => 'picture_comment_updated', 'active_tab' => 'pictures');
		$this->Redirect($id, 'editalbum', $returnid, $params);
	}
	elseif ($albumid!='')
	{
		$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET comment=? WHERE album_id = ?';
		$db->Execute($query, array($params['comment'],$albumid));
		//Update search index
		$module =& $this->GetModuleInstance('Search');
		if ($module != FALSE)
		  {
		    $module->AddWords($this->GetName(), $albumid, 'album', $params['comment']);
		  }
		$params = array('albumid' => $albumid, 'tab_message' => 'album_comment_updated', 'active_tab' => 'pictures');
		$this->Redirect($id, 'editalbum', $returnid, $params);
	}
}

if ($pictureid != '')
{
	$dbpicture = $this->GetPicture($pictureid);
	$title = $dbpicture->name;	
	$albumcomment = $dbpicture->comment;
	$albumcomment2 = $dbpicture->comment2;
	$albumcomment3 = $dbpicture->comment3;
	$thumbnailpath = $dbpicture->thumbnail;
	$albumid = $dbpicture->albumid;
	$this->smarty->assign('showtitle', 1);
	$comment2 = '<div class="pageoverflow">
		<p class="pagetext">'.$this->Lang('comment').' 2:</p>
		<p class="pageinput">'.$this->CreateTextArea(true, $id, $albumcomment2, 'comment2', '', '', '', '', '80', '5').'</p>
	</div>';
	$this->smarty->assign('comment2', $comment2);
	$comment3 = '<div class="pageoverflow">
		<p class="pagetext">'.$this->Lang('comment').' 3:</p>
		<p class="pageinput">'.$this->CreateTextArea(true, $id, $albumcomment3, 'comment3', '', '', '', '', '80', '5').'</p>
	</div>';
	$this->smarty->assign('comment3', $comment3);


}
elseif ($albumid != '')
{
	$title = '';
	$dbalbum = $this->GetAlbum($albumid);
        $albumname = $dbalbum->name;
        $albumcomment = $dbalbum->comment;
        $thumbnailpath = $dbalbum->thumbnail;
	$this->smarty->assign('showtitle', 0);
	$this->smarty->assign('comment2', '');
	$this->smarty->assign('comment3', '');
}
$this->smarty->assign('thumbnail', '<img alt="" src="'.$thumbnailpath. '" />');
$this->smarty->assign('texttitle', $this->Lang('title'));
$this->smarty->assign('inputtitle', $this->CreateInputText($id, 'title', $title, 50, 255));
$this->smarty->assign('textcomment', $this->Lang('comment'));
$this->smarty->assign('inputcomment', $this->CreateTextArea(true, $id, $albumcomment, 'comment', '', '', '', '', '80', '5'));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit',$this->Lang('submit')));
$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel',$this->Lang('cancel')));


echo $this->CreateFormStart($id, $params['action'], $returnid);
echo $this->ProcessTemplate('changecomment.tpl');
echo $this->CreateInputHidden($id, 'albumid',$albumid);
echo $this->CreateInputHidden($id, 'pictureid',$pictureid);
echo $this->CreateFormEnd();

?>
