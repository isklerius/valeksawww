<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid);
if(! $this->CheckPermission( 'Use Album' ) ) exit;

$templatename = (isset($params['templatename']) ? $params['templatename'] : '');
$this->DeleteTemplate($templatename);
$params = array('tab_message' => 'template_deleted', 'active_tab' => 'templates');
$this->Redirect($id, 'defaultadmin', $returnid, $params);

?>