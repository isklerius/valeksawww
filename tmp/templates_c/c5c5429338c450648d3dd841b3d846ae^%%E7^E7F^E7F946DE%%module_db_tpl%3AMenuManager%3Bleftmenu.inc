<?php /* Smarty version 2.6.25, created on 2017-04-16 03:40:13
         compiled from module_db_tpl:MenuManager%3Bleftmenu */

$this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/c5c5429338c450648d3dd841b3d846ae^%%E7^E7F^E7F946DE%%module_db_tpl%3AMenuManager%3Bleftmenu.inc'] = '97b665f9089843e48b1b59f5581dd0b3';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'module_db_tpl:MenuManager;leftmenu', 1, false),array('function', 'repeat', 'module_db_tpl:MenuManager;leftmenu', 18, false),)), $this); ?>
<?php
function _smarty_tplfunc_97b665f9089843e48b1b59f5581dd0b3_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('97b665f9089843e48b1b59f5581dd0b3','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_97b665f9089843e48b1b59f5581dd0b3_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('97b665f9089843e48b1b59f5581dd0b3','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_97b665f9089843e48b1b59f5581dd0b3_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('97b665f9089843e48b1b59f5581dd0b3','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
