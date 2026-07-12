<?php /* Smarty version 2.6.25, created on 2017-04-15 19:56:13
         compiled from module_db_tpl:News%3BdetailSample */

$this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/News^%%E8^E85^E85D59E8%%module_db_tpl%3ANews%3BdetailSample.inc'] = '0d9c08189efc38df23a340edcd2b54f6';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cms_date_format', 'module_db_tpl:News;detailSample', 8, false),array('modifier', 'cms_escape', 'module_db_tpl:News;detailSample', 11, false),array('function', 'eval', 'module_db_tpl:News;detailSample', 19, false),array('function', 'cms_module', 'module_db_tpl:News;detailSample', 21, false),)), $this); ?>
<?php
function _smarty_tplfunc_0d9c08189efc38df23a340edcd2b54f6_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('0d9c08189efc38df23a340edcd2b54f6','0');echo smarty_cms_function_cms_module(array('module' => 'album','albums' => $_smarty->_tpl_vars['entry']->albumo_id), $_smarty);
}



?>
