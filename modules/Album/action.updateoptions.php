<?php
if (!isset($gCms)) exit;

if( !$this->CheckPermission( 'Modify Site Preferences' ) )
{
  return;
}
$this->SetPreference('max_image_size', $params['max_image_size']);
$this->SetPreference('defaultcolumns', $params['defaultcolumns']);
$this->SetPreference('defaultrows', $params['defaultrows']);
$this->SetPreference('defaulttemplate', $params['defaulttemplate']);
$this->SetPreference('nsk', $params['nsk']);
$this->SetPreference('tw', $params['tw']);
$this->SetPreference('th', $params['th']);
$this->SetPreference('defaultalbumpage', $_POST['parent_id']);
$useinlinelinks = (isset($params['useinlinelinks']) ? $params['useinlinelinks'] : 0);
$this->SetPreference('useinlinelinks', $useinlinelinks);
$autolinkstylesheet = (isset($params['autolinkstylesheet']) ? $params['autolinkstylesheet'] : 0);
$this->SetPreference('autolinkstylesheet', $autolinkstylesheet);
$params = array('tab_message' => 'optionsupdated', 'active_tab' => 'options');
$this->Redirect($id, 'defaultadmin', '', $params);
?>
