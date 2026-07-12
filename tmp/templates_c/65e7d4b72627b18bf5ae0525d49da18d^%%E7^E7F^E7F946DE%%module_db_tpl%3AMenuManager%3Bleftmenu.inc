<?php /* Smarty version 2.6.25, created on 2017-04-16 03:39:04
         compiled from module_db_tpl:MenuManager%3Bleftmenu */

$this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/65e7d4b72627b18bf5ae0525d49da18d^%%E7^E7F^E7F946DE%%module_db_tpl%3AMenuManager%3Bleftmenu.inc'] = '8ff66e721b3b575830242ae917457a3b';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'module_db_tpl:MenuManager;leftmenu', 1, false),array('function', 'repeat', 'module_db_tpl:MenuManager;leftmenu', 18, false),)), $this); ?>
<?php
function _smarty_tplfunc_8ff66e721b3b575830242ae917457a3b_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8ff66e721b3b575830242ae917457a3b','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_8ff66e721b3b575830242ae917457a3b_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8ff66e721b3b575830242ae917457a3b','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_8ff66e721b3b575830242ae917457a3b_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('8ff66e721b3b575830242ae917457a3b','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
