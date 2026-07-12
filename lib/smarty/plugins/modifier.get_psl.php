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
function smarty_modifier_get_psl($id)
{
	//echo $id;
	global $gCms; $db = $gCms->GetDB();
	$q = 'SELECT content_alias, content_id, type FROM cms_content WHERE parent_id = (SELECT parent_id FROM cms_content WHERE content_id = ? ) AND type="catalogitem" ORDER BY item_order	ASC';
	
	$ats = $db->GetAll($q, array($id));
	$pradzia = 'http://localhost/freor/index.php?page='; 
	$i = 0;
	if (is_array($ats)){
	foreach($ats as $links){
		$ret['prekes'][$i]['alias'] = $pradzia.$links['content_alias'];
		$ret['prekes'][$i]['id'] = $links['content_id'];
		$ret['prekes'][$i]['active'] = '0';
		if($links['content_id'] == $id) {
			$ret['prekes'][$i]['active'] = '1';
			if ($ret['prekes'][($i-1)]['alias']=='')
			$ret['prev'] = 'javascript:void(0)';
			else
			$ret['prev'] = $ret['prekes'][($i-1)]['alias'];
			if ($ats[($i+1)]['content_alias']=='')
			$ret['next'] = 'javascript:void(0)';
			else
			$ret['next'] = $pradzia.$ats[($i+1)]['content_alias'];
		}
		$i++;
	}
	}
	if (count($ret['prekes'])>1)
		return $ret;
	else
		return 0;
	
}

/* vim: set expandtab: */

?>
