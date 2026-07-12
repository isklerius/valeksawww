<?php

function smarty_cms_modifier_fex($id, $type, $extn=''){

	global $gCms;
	$config = &$gCms->GetConfig();
	
	if (!$extn)
		$extn = 'png';	
	
	
	if (file_exists($config[root_path]."/uploads/images/pages/".$id."/".$type.".".$extn))
		return true;
	else
		return false;

    
}
?>
