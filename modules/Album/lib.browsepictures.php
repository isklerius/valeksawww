<?php

if (!isset($gCms)) exit;
if(! $this->CheckAccess($id, $params, $returnid) ) exit;
global $gCms;
$config = $gCms->config;
$newparams = array();
if (FALSE == empty($albumid))
{
	$dbalbum = $this->GetAlbum($albumid);
	$currentthumb = substr($dbalbum->thumbnail,strlen($config['image_uploads_url']));
	$currentpic = '';
}
if (FALSE == empty($pictureid))
{
	$albumid = '';
	$dbpicture = $this->GetPicture($pictureid);
	$currentpic = substr($dbpicture->picture,strlen($config['image_uploads_url']));
	$currentthumb = substr($dbpicture->thumbnail,strlen($config['image_uploads_url']));
}
switch ($params['action'])
{
	case 'addpicture':
		$curdir = (isset($params['dir']) ? $this->Clearpath($params['dir']) : '') ;break;
	case 'changethumb':
		$curdir = (isset($params['dir']) ? $this->Clearpath($params['dir']) : dirname($currentthumb)) ;break;
	case 'changepicture':
		$curdir = (isset($params['dir']) ? $this->Clearpath($params['dir']) : dirname($currentpic)) ;break;
}

if ($curdir=='/') $curdir = '';
$dir = $this->ClearPath($config['image_uploads_path'].$curdir);
// If an album is assigned the default 'No Thumbnail' image, and a new thumbnail is being chosen, just use the default dir
if (FALSE == is_dir($dir))
{
	$dir = $config['image_uploads_path'];
	$curdir = '';
}
$dirlist = array();
$filelist = array();
$imagecount = 0;
$dh  = opendir($dir);

while (false !== ($filename = readdir($dh)))
{
	if ($filename=='.') continue;
	if ($filename=='..' && ($curdir=='' || $curdir=='/')) continue;
	// Check if this file is an image or a dir
	$extension = strtolower(substr(strrchr($filename, "."), 1));
	if ('jpeg' == $extension || 'jpg' == $extension || 'png' == $extension || 'gif' == $extension || is_dir($dir.'/'.$filename))
	{
		// keep going
	}
	else
	{
		continue;
	}
	$file = new stdClass();
	if (is_dir($dir.'/'.$filename))
	{
		if ($filename=='..')
		{
			$newparams = array_merge($params, array('dir' => dirname($curdir)));
			$file->icon = $this->CreateLink($id, $params['action'], $returnid, $this->DisplayImage('upfolder.gif', $this->Lang('browsedir'),'','systemicon'), $newparams);
			$file->name = $this->CreateLink($id, $params['action'], $returnid, $this->Lang('parentdir'), $newparams);
		}
		else
		{
			$newparams = array_merge($params, array('dir' => $this->ClearPath($curdir.'/'.$filename)));
			$file->icon = $this->CreateLink($id, $params['action'], $returnid, $this->DisplayImage('folder.gif', $this->Lang('browsedir'),'','systemicon'), $newparams);
			$file->name = $this->CreateLink($id, $params['action'], $returnid, $filename, $newparams);
		}

		$dirlist[$filename] = $file;
	}
	else
	{
		if (substr($filename,0,6) == 'thumb_') continue;
		$thumbname = 'thumb_'.$filename;
		
		$file->name =  $filename;//$this->CreateLink($id, $params['action'], $returnid, $filename, array_merge($params,array('filename'=>$filename)));
		$file->style = '';// ($currentpic == $curdir.'/'.$filename ? 'background-color : #9bda9b;'  : '');
		if ($currentpic == $curdir.'/'.$filename || $currentthumb == $curdir.'/'.$filename)
		{
			$file->current = $this->lang('currentpicture');
		}
		else
		{
			$file->current = '';
		}
		if ($currentpic == $curdir.'/'.$thumbname || $currentthumb == $curdir.'/'.$thumbname)
			$file->current .=($file->current!='' ? ', ' : '').$this->lang('currentthumbnail');
		
		$imagecount++;
		$imageid = 'image'.$imagecount;
		$file->onmouseover =  "document.getElementById('".$imageid."').style.display='block'";
		$file->onmouseout =  "document.getElementById('".$imageid."').style.display='none'";

		// Check if this file is an image
		$extension = strtolower(substr(strrchr($filename, "."), 1));
		if ('jpeg' == $extension || 'jpg' == $extension || 'png' == $extension || 'gif' == $extension) {
			$is_image = TRUE;
		} else {
			$is_image = FALSE;
		}
			
		if (TRUE == $is_image && file_exists($dir.'/'.$thumbname))
		{
			$file->thumbpath = $config['image_uploads_url'].$curdir.'/'.$thumbname;
			$size = getimagesize($dir.'/'.$thumbname);
			$height = min($size[1], floor($size[1] * 20 / $size[0]),20);
			$width = min($size[0], floor($size[0] * 20 / $size[1]),20);
			$file->icon = '<img src="'.$file->thumbpath.'" alt="" class="systemicon" width="'.$width.'" height="'.$height.'"/>';
		}
		else
		{
			$file->thumbpath = $config['root_url'].'/lib/filemanager/ImageManager/thumbs.php?img='.urlencode($curdir.'/'.$filename);
			if (TRUE == $is_image && 0 != filesize($dir.'/'.$filename)) {
				$size = getimagesize($dir.'/'.$filename);
				// echo $filename;
				if ($size[0] != 0 && $size[1] != 0) {
					$height = min($size[1], floor($size[1] * 20 / $size[0]),20);
					$width = min($size[0], floor($size[0] * 20 / $size[1]),20);
					$file->icon = '<img src="'.$file->thumbpath.'" alt="" class="systemicon" width="'.$width.'" height="'.$height.'"/>';
				} else {
					$file->icon = $this->lang('nothumbnail');
				}
			} else {
				$file->icon = $this->lang('nothumbnail');
			}
		}
		$file->imagepath = $config['image_uploads_url'].$curdir.'/'.$filename;
		$file->id = $imageid;
		
		$file->select = '';
		$file->usepicture = '';
		$file->usethumb = '';
		switch ($params['action'])
		{
			case 'addpicture' :
				$file->select = $this->CreateInputCheckbox($id, 'img_'.$imagecount, $curdir.'/'.$filename);
				break;
			case 'changethumb' :
				$file->usethumb =  $this->CreateLink($id, $params['action'], $returnid, $this->DisplayImage('fpaint2.gif', $this->Lang('selectthumb'),$this->Lang('selectthumb'),'systemicon'), array('pictureid'=>$pictureid,'albumid'=>$albumid,'filename'=>$curdir.'/'.$thumbname));
			default :
				$file->usepicture =  $this->CreateLink($id, $params['action'], $returnid, $this->DisplayImage('fpaint.gif', $this->Lang('selectpicture'),$this->Lang('selectpicture'),'systemicon'), array('pictureid'=>$pictureid,'albumid'=>$albumid,'filename'=>$curdir.'/'.$filename));
		}
		$filelist[$filename] = $file;
	}
	
}
if (isset($dh))
	closedir($dh);


ksort($dirlist);
ksort($filelist);


$this->smarty->assign_by_ref('dirs', $dirlist);
$this->smarty->assign_by_ref('files', $filelist);

$this->smarty->assign('titlename', $this->Lang('name'));
// Fix bug [#718] missing lang strings cause crash
// $this->smarty->assign_by_ref('titlehasthumb', $this->Lang('hasthumb'));
// $this->smarty->assign_by_ref('titleview', $this->Lang('view'));

if ($params['action']=='addpicture')
{
	$link = '<a href="" onclick="selectall(); return false;">';
	$link .= '<img src="'.$config['root_url'].'/modules/Album/images/newfolder.gif" alt="" class="systemicon"/>';
	$link .= $this->Lang('selectall');
	$link .= '</a>';
	
	$script = '<script type="text/javascript">
/*<![CDATA[*/
function selectall()
{
	checkboxes = document.getElementsByTagName("input");
	for (i=0; i<checkboxes.length ; i++)
	{
		if (checkboxes[i].type == "checkbox") checkboxes[i].checked=true;
	}
}
/*]]>*/

</script>';
} else {
	$script = '';
	$link = '';
}
$this->smarty->assign('selectall',$link);
$this->smarty->assign('selectallscript',$script);

if ($params['action']=='addpicture')
{
	$submit_button = $this->CreateInputSubmit($id, 'submit',$this->Lang('submit'));
} else {
	$submit_button = '';
}
$this->smarty->assign('submit',$submit_button);
$this->smarty->assign('cancel',$this->CreateInputSubmit($id, 'cancel',$this->Lang('cancel')));

echo '<p class="pagemessage">'.$this->Lang($params['action']).'</p>';
echo $curdir;
echo $this->CreateFormStart($id, $params['action'], $returnid);
echo $this->ProcessTemplate('browsepictures.tpl');

if (isset($albumid)) echo $this->CreateInputHidden($id, 'albumid',$albumid);
if (isset($pictureid)) echo $this->CreateInputHidden($id, 'pictureid',$pictureid);
if (isset($curdir)) echo $this->CreateInputHidden($id, 'curdir', $curdir);
echo $this->CreateFormEnd();

$this->smarty->assign('startform', $this->CreateFormStart($id,'uploadpicture',$returnid,'post', 'multipart/form-data'));
$this->smarty->assign('prompt_browse', $this->Lang('uploadpicture'));
$this->smarty->assign('input_browse', $this->CreateFileUploadInput($id,'input_browse'));
$this->smarty->assign('submit', $this->CreateInputSubmit($id,'submit',$this->Lang('upload')));
// $this->smarty->assign('hidden',$this->CreateInputHidden($id, 'curdir', $curdir).$this->CreateInputHidden($id, 'url', urlencode($_SERVER['REQUEST_URI'])));
$this->smarty->assign('hidden',$this->CreateInputHidden($id, 'curdir', $curdir).$this->CreateInputHidden($id, 'albumid', $params['albumid']).$this->CreateInputHidden($id, 'dir', $curdir));
$this->smarty->assign('endform',$this->CreateFormEnd());
echo $this->ProcessTemplate('import.tpl');
?>
