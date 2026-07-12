<?php

if (!isset($gCms)) exit;
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$fieldName=$id.'input_browse';

$themeObject = $gCms->variables['admintheme'];	


if (!isset ($_FILES[$fieldName]) || !isset ($_FILES)
	|| !is_array ($_FILES[$fieldName]) || !$_FILES[$fieldName]['name'])
{
	// echo $themeObject->ShowErrors($this->Lang('error_nofilesuploaded'));
	echo '<div class="pageerrorcontainer">'.$this->Lang('error_nofilesuploaded').'</div>';
//	$this->DisplayErrorPage( $id, $params, $returnid, 
//		$this->Ling('error_nofilesuploaded'));
	return;
}
else
{
	$file = $_FILES[$fieldName];
	$curdir = (isset($params['curdir']) ? $params['curdir'] : '');
	$uploaddir = $config['image_uploads_path'].$curdir;
	$uploadfile = $uploaddir.'/'. $file['name'];
	
	if (!@move_uploaded_file($file['tmp_name'], $uploadfile))
	{
		// echo $themeObject->ShowErrors('<p class="error">'.$this->Lang('error_nofilesuploaded').'</p>');
		echo '<div class="pageerrorcontainer">'.$this->Lang('error_nofilesuploaded').'</div>';
		//$this->DisplayErrorPage( $id, $params, $returnid,$this->Lang('error_nofilesuploaded'));
		return;
	}
	else
	{
		chmod($uploadfile, 0644);
		$params = array('tab_message' => 'pictureuploaded', 'albumid' => $params['albumid'], 'curdir' => $params['curdir'], 'dir' => $params['dir']);
		$this->Redirect($id, 'addpicture', '', $params);	
			//	header ('Location: '.$params['url']);
			//	$this->Redirect( $id, 'defaultadmin', $returnid );
//	echo $params['url'];
	}
	
}


//$this->Redirect($id, 'defaultadmin', $returnid);
?>
