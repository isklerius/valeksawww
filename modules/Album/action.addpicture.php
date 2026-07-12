<?php
require_once(dirname(__FILE__).'/../../lib/filemanager/ImageManager/Classes/GD.php');
global $config;
if (!isset($gCms)) exit;
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$currentpic='';


$dbalbum = $this->GetAlbum($params[albumid]);
$tplotis = $dbalbum->tw;
$taukstis = $dbalbum->th;

if (!$tplotis)
	$tplotis = 170;

if (!$taukstis)
	$taukstis = 101;

if($dbalbum->template == 'default'){
	$tplotis = 170;
	$taukstis = 101;
}
if($dbalbum->template == 'maps'){
	$tplotis = 280;
	$taukstis = 200;
}


$albumid = (isset($params['albumid']) ? $params['albumid'] : '');
if ($albumid == '')
	$this->Redirect($id, 'defaultadmin', $returnid);

if (isset($params['cancel'])) 
	$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));


if (isset($params['filename']))
	$images = array($params['filename']);
else
{
	$images = array();
	foreach ($params as $key=>$value)
	{
		if (substr($key,0,4)=='img_')
			$images[] = $value;
	}
}

if (isset($params['submit']) || isset($params['filename'])) 
{	
	$dbpictures = $this->GetPictures($albumid);
	$oldimages = array();
	foreach ($dbpictures as $dbpicture)
	{
		$img_name = $dbpicture->picture;
		$pattern = array(' ');
		$replacement = array('%20');
		$img_name_true = str_replace($pattern, $replacement, $img_name);
		
		$img = new Image_Transform_Driver_GD;
		$dir_name = str_replace(basename($dbpicture->picture),"",$dbpicture->picture);
		$dir_name = str_replace($_SERVER["SERVER_NAME"],"",$dir_name);
		$dir_name = str_replace('/uploads/images/',"",$dir_name);
		$dir_name = str_replace('http:',"",$dir_name);
		$dir_name = str_replace('/',"",$dir_name);
		$file_name_load=$config[root_path].'/uploads/images/'.$dir_name.'/'.basename($dbpicture->picture);
		$file_name_save=$config[root_path].'/uploads/images/'.$dir_name.'/thumb_'.basename($dbpicture->picture);
		
		$img->load($file_name_load);
		$img->resizeANDcrop($tplotis, $taukstis);	
		$img->save($file_name_save);
		$img->free();
		
		if($tplotis2 && $taukstis2){
		$file_name_load='';
		$file_name_save = '';
		$file_name_load=$config[root_path].'/uploads/images/'.$dir_name.'/'.$pic_name;
		$file_name_save=$config[root_path].'/uploads/images/'.$dir_name.'/thumb2_'.$pic_name ;
		
		$img->load($file_name_load);
		$img->resizeANDcrop($tplotis2, $taukstis2);	
		$img->save($file_name_save);
		$img->free();
		}
		$oldimages[] = substr($dbpicture->picture,strlen($config['image_uploads_url']));
	}
	$picturenumber = count($oldimages);
	
	foreach($images as $imagename)
	{
		$imagepath = &$imagename;
		
		//$dir_name = str_replace("","",dirname($imagepath));
		$dir_name = substr(dirname($imagepath), 1);
		$pic_name = str_replace(dirname($imagepath), "", $imagename);
		$pic_name = str_replace("/", "", $pic_name);
		$img = new Image_Transform_Driver_GD;
		
		$file_name_load=$config[root_path].'/uploads/images/'.$dir_name.'/'.$pic_name;
		$file_name_save=$config[root_path].'/uploads/images/'.$dir_name.'/thumb_'.$pic_name ;
		
		$img->load($file_name_load);
		$img->resizeANDcrop($tplotis, $taukstis);	
		$img->save($file_name_save);
		$img->free();
		if($tplotis2 && $taukstis2){
		$file_name_load='';
		$file_name_save = '';
		$file_name_load=$config[root_path].'/uploads/images/'.$dir_name.'/'.$pic_name;
		$file_name_save=$config[root_path].'/uploads/images/'.$dir_name.'/thumb2_'.$pic_name ;
		
		$img->load($file_name_load);
		$img->resizeANDcrop($tplotis2, $taukstis2);	
		$img->save($file_name_save);
		$img->free();
		}
		
	}
	
	 

	
	
	sort($images);
	foreach($images as $imagename)
	{

		$imagepath = &$imagename;
		if (in_array($imagepath,$oldimages)) continue;
		$the_path = dirname($imagepath);
		$pos = strpos ($the_path, '/', strlen($the_path) - 1);
		if ($pos === false)
		{
			$thumbpath = $the_path.'/thumb_'.basename($imagepath);
		}
		if ($pos !== false)
		{
			$thumbpath = $the_path.'thumb_'.basename($imagepath);
		}

		if (TRUE == is_file($config['image_uploads_path'].$thumbpath))
		{
			list($width, $height, $type, $attr) = getimagesize($config['image_uploads_path'].$thumbpath);
			$thumbnailwidth = $width;
			$thumbnailheight = $height;

		}
		else
		{
			$thumbpath = '';
			$thumbnailwidth = 701;
			$thumbnailheight = '';
		}

		$picturenumber++;
		// Remove any back slashes
		$thumbpath =  str_replace('\\', '', $thumbpath); // A quick hacky fix for XAMPP on Windows
		$pictureid = $db->GenID(cms_db_prefix()."module_album_pictures_seq");
		$query = 'INSERT INTO '.cms_db_prefix().'module_album_pictures (picture_id, picture_name, picture_album_id, thumbnail_path, picture_path,  picture_number, thumbnail_width, thumbnail_height) VALUES (?,?,?,?,?,?,?,?)';
		$db->Execute($query, array($pictureid, basename($imagename), $albumid, $thumbpath, $imagepath, $picturenumber, $thumbnailwidth, $thumbnailheight));
		
		//Update search index
		$module =& $this->GetModuleInstance('Search');
		if ($module != FALSE)
		  {
		    $module->AddWords($this->GetName(), $pictureid, 'album_picture', $imagename);
		  }

		if ($picturenumber==1)
		{
			$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET thumbnail_path=? WHERE (album_id = ? AND thumbnail_path IS NULL)';
			$db->Execute($query, array($thumbpath,$albumid));
		}
	}
	$this->Redirect($id, 'editalbum', $returnid,array('albumid'=>$albumid));
}
	
include dirname(__FILE__).'/lib.browsepictures.php';


?>