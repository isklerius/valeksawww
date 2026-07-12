<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty spacify modifier plugin
 *
 * Type:     modifier<br>
 * Name:     spacify<br>
 * Purpose:  add spaces between characters in a string
 * @link http://smarty.php.net/manual/en/language.modifier.spacify.php
 *          spacify (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_counter($string,$sk,$kiek)
{
    $len = strlen($string);
	if ($len>$sk){
		$new_str = substr($string,0,$kiek);
		$new_str = $new_str . '...';
	}
	else{
		$new_str = $string;
	}
	return $new_str;
	//return implode($spacify_char,
                   //preg_split('//', $string, -1, PREG_SPLIT_NO_EMPTY));
}

/* vim: set expandtab: */

?>
