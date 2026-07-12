<?php /* Smarty version 2.6.25, created on 2017-04-16 00:44:21
         compiled from module_db_tpl:MenuManager%3Bleftmenu */

$this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/25c89671746d26410ef7989b536748bd^%%E7^E7F^E7F946DE%%module_db_tpl%3AMenuManager%3Bleftmenu.inc'] = '172fe9d6e47fb1f333daf06b7eae51de';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'module_db_tpl:MenuManager;leftmenu', 1, false),array('function', 'repeat', 'module_db_tpl:MenuManager;leftmenu', 18, false),)), $this); ?>
<?php
function _smarty_tplfunc_172fe9d6e47fb1f333daf06b7eae51de_0(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('172fe9d6e47fb1f333daf06b7eae51de','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $_smarty->_tpl_vars['node']->depth-$_smarty->_tpl_vars['node']->prevdepth), $_smarty);
}


function _smarty_tplfunc_172fe9d6e47fb1f333daf06b7eae51de_1(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('172fe9d6e47fb1f333daf06b7eae51de','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->prevdepth-$_smarty->_tpl_vars['node']->depth), $_smarty);
}


function _smarty_tplfunc_172fe9d6e47fb1f333daf06b7eae51de_2(&$_smarty)
{
$_cache_attrs =& $_smarty->_smarty_cache_attrs('172fe9d6e47fb1f333daf06b7eae51de','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $_smarty->_tpl_vars['node']->depth-1), $_smarty);
}



?>
