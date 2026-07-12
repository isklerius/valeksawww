<?php /* Smarty version 2.6.25, created on 2017-04-16 03:39:46
         compiled from module_db_tpl:MenuManager%3Bleftmenu */

$this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/94c6f0f45e391863f41d666a411754d7^%%E7^E7F^E7F946DE%%module_db_tpl%3AMenuManager%3Bleftmenu.inc'] = '1d616c89cf0a77d2550328f52eb3829b';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'module_db_tpl:MenuManager;leftmenu', 1, false),array('function', 'repeat', 'module_db_tpl:MenuManager;leftmenu', 18, false),)), $this); ?>
<?php
function _smarty_tplfunc_1d616c89cf0a77d2550328f52eb3829b_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1d616c89cf0a77d2550328f52eb3829b','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_1d616c89cf0a77d2550328f52eb3829b_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1d616c89cf0a77d2550328f52eb3829b','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_1d616c89cf0a77d2550328f52eb3829b_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('1d616c89cf0a77d2550328f52eb3829b','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
