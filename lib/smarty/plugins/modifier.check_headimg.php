<?php
function smarty_modifier_check_headimg($id)
{
	global $gCms;
	$config = $gCms->config;
$path = $config['image_uploads_path'].'/pages/'.$id;
$url = $config['image_uploads_url'].'/pages/'.$id;
$file = 'header_image.png';
$filer = $path.'/'.$file;
$filepath = $url.'/'.$file;
		
if(is_file($filer)) 
	return $filepath;
else
	return 0;
}

?>
