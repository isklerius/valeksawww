<?php

if (!isset($gCms)) exit;

if(! $this->CheckPermission( 'Use Album' ) ) exit;

$templatename = (isset($params['templatename']) ? $params['templatename'] : 'default');
$this->SetPreference('template',$templatename);

$this->Redirect($id, 'defaultadmin', $returnid);

?>
