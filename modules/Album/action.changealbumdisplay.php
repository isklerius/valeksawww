<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid);
if(! $this->CheckPermission( 'Use Album' ) ) exit;
$albumtemplate = (isset($params['albumtemplate']) ? $params['albumtemplate'] : 'default');
$albumcolumns = (isset($params['albumcolumns']) ? $params['albumcolumns'] : '0');
$albumrows = (isset($params['albumrows']) ? $params['albumrows'] : '0');
$nsk = (isset($params['nsk']) ? $params['nsk'] : '10');
$th = (isset($params['th']) ? $params['th'] : '180');
$tw = (isset($params['tw']) ? $params['tw'] : '240');

$albumid = (isset($params['albumid']) ? $params['albumid'] : '');
if ($albumid == '') exit;
// Clear the site cache
global $gCms;
$contentops =& $gCms->GetContentOperations();
$contentops->ClearCache();



$query = 'UPDATE '.cms_db_prefix().'module_album_albums SET template=?,column_number=?,row_number=?,nsk=?,tw=?,th=? WHERE album_id = ?';
$res = $db->Execute($query, array($albumtemplate,$albumcolumns,$albumrows,$nsk,$tw,$th,$albumid));

$params = array('albumid' => $albumid, 'tab_message' => 'propertiesupdated', 'active_tab' => 'properties');
$this->Redirect($id, 'editalbum', $returnid, $params);

?>
