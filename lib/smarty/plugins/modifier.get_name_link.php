<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty upper modifier plugin
 *
 * Type:     modifier<br>
 * Name:     upper<br>
 * Purpose:  convert string to uppercase
 * @link http://smarty.php.net/manual/en/language.modifier.upper.php
 *          upper (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @return string
 */
function smarty_modifier_get_name_link($id)
{
    global $gCms; 
	$db = $gCms->GetDB();
	$q = $db->GetRow("SELECT content_alias as alias,menu_text as text FROM cms_content WHERE content_id=$id");
	return $q;
}

?>
