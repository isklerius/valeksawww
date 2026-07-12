<?php /* Smarty version 2.6.25, created on 2017-09-06 11:14:22
         compiled from module_file_tpl:News%3Beditarticle.tpl */

$this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/News^%%AC^ACB^ACB8292B%%module_file_tpl%3ANews%3Beditarticle.tpl.inc'] = '4d9daea7cff3bb0b504dd6aa39447ffd';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'html_select_date', 'module_file_tpl:News;editarticle.tpl', 48, false),array('function', 'html_select_time', 'module_file_tpl:News;editarticle.tpl', 48, false),)), $this); ?>
<?php
function _smarty_tplfunc_4d9daea7cff3bb0b504dd6aa39447ffd_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('4d9daea7cff3bb0b504dd6aa39447ffd','0');echo smarty_function_html_select_date(array('prefix' => $_smarty->_tpl_vars['startdateprefix'],'time' => $_smarty->_tpl_vars['startdate'],'start_year' => "-10",'end_year' => "+15"), $_smarty);
}


function _smarty_tplfunc_4d9daea7cff3bb0b504dd6aa39447ffd_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('4d9daea7cff3bb0b504dd6aa39447ffd','1');echo smarty_function_html_select_time(array('prefix' => $_smarty->_tpl_vars['startdateprefix'],'time' => $_smarty->_tpl_vars['startdate']), $_smarty);
}


function _smarty_tplfunc_4d9daea7cff3bb0b504dd6aa39447ffd_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('4d9daea7cff3bb0b504dd6aa39447ffd','2');echo smarty_function_html_select_date(array('prefix' => $_smarty->_tpl_vars['enddateprefix'],'time' => $_smarty->_tpl_vars['enddate'],'start_year' => "-10",'end_year' => "+15"), $_smarty);
}


function _smarty_tplfunc_4d9daea7cff3bb0b504dd6aa39447ffd_3(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('4d9daea7cff3bb0b504dd6aa39447ffd','3');echo smarty_function_html_select_time(array('prefix' => $_smarty->_tpl_vars['enddateprefix'],'time' => $_smarty->_tpl_vars['enddate']), $_smarty);
}



?>
