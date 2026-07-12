<?php
function smarty_modifier_get_file($id)
{
	if(!is_dir($path)) return 0;
	$ret = 0;
	$handle=opendir($path);
	while (($file = readdir($handle))!==false) {
		$filer = $path.'/'.$file;
		if(is_file($filer)) 
		$ret = $upload.'/catalogerfiles/'.$id . '/'.$file;
			
			//echo "$file <br>";
	}

	closedir($handle);
	return $ret;
}

/* vim: set expandtab: */

?>
