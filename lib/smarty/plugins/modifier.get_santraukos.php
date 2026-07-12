<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty escape modifier plugin
 *
 * Type:     modifier<br>
 * Name:     escape<br>
 * Purpose:  Escape the string according to escapement type
 * @link http://smarty.php.net/manual/en/language.modifier.escape.php
 *          escape (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param html|htmlall|url|quotes|hex|hexentity|javascript
 * @return string
 */
function smarty_modifier_get_santraukos($id)
{
$cont_id='';
$pradzia = 'http://localhost/freor/index.php?page='; 
$arr = array();
	global $gCms; $db = $gCms->GetDB();
	$q1 =$db->GetCol("SELECT content_id FROM cms_content WHERE parent_id=$id ");
	$kab = implode(',',$q1);

	$q = $db->GetAll("SELECT cms_content.content_id,cms_content.content_name,cms_content.content_alias,cms_content_props.content,cms_content_props.content_id,cms_content_props.prop_name FROM cms_content LEFT JOIN cms_content_props ON cms_content.content_id=cms_content_props.content_id WHERE cms_content_props.content_id IN ($kab) AND prop_name='santrauka' OR prop_name='files' AND cms_content.parent_id=$id" );
	
	$ret = array();
	foreach($q as $cont){
		$ret[$cont['content_id']][$cont['prop_name']] = $cont['content'];
		$ret[$cont['content_id']] ['content_name']= $cont['content_name'];
		$ret[$cont['content_id']] ['alias'] = $pradzia.$cont['content_alias'];
	}
	
	return $ret;
}

/* vim: set expandtab: */

?>
