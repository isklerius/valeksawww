<?php

function smarty_cms_modifier_file_check($alias){

	global $gCms;
	$config = &$gCms->GetConfig();
	if (is_file(trim($config[root_path].'/uploads/images/catalog/'.$alias.'_thumb_1'.'.jpg'))){
	
		return true;}
	else
		return false;

    
}
?>
