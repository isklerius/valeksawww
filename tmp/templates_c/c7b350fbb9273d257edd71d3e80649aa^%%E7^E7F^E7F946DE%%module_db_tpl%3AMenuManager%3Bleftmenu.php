<?php /* Smarty version 2.6.25, created on 2017-04-16 03:36:27
         compiled from module_db_tpl:MenuManager%3Bleftmenu */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'module_db_tpl:MenuManager;leftmenu', 1, false),array('function', 'repeat', 'module_db_tpl:MenuManager;leftmenu', 18, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/c7b350fbb9273d257edd71d3e80649aa^%%E7^E7F^E7F946DE%%module_db_tpl%3AMenuManager%3Bleftmenu.inc'] = '103428733b3e7d9704818ea5993b899e'; ?><?php if (count($this->_tpl_vars['nodelist']) > 0): ?>
<?php $this->assign('leftm', '1'); ?>
<?php $this->assign('depth2', 0); ?>
<?php $this->assign('depth2now', 0); ?>
<?php $_from = $this->_tpl_vars['nodelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['top'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['top']['iteration']++;
?>
	<?php if ($this->_tpl_vars['node']->depth == 2): ?>
		<?php $this->assign('depth2', $this->_tpl_vars['depth2']+1); ?>
	<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php $this->assign('number_of_levels', 10000); ?>
<?php if (isset ( $this->_tpl_vars['menuparams']['number_of_levels'] )): ?>
  <?php $this->assign('number_of_levels', $this->_tpl_vars['menuparams']['number_of_levels']); ?>
<?php endif; ?>

<?php $_from = $this->_tpl_vars['nodelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['top'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['top']['iteration']++;
?>
  <?php if ($this->_tpl_vars['node']->depth >= 2): ?>
<?php if ($this->_tpl_vars['node']->depth > $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:103428733b3e7d9704818ea5993b899e#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('103428733b3e7d9704818ea5993b899e','0');echo smarty_cms_function_repeat(array('string' => "<ul>",'times' => $this->_tpl_vars['node']->depth-$this->_tpl_vars['node']->prevdepth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:103428733b3e7d9704818ea5993b899e#0}'; endif;?>

<?php elseif ($this->_tpl_vars['node']->depth < $this->_tpl_vars['node']->prevdepth): ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:103428733b3e7d9704818ea5993b899e#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('103428733b3e7d9704818ea5993b899e','1');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $this->_tpl_vars['node']->prevdepth-$this->_tpl_vars['node']->depth), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:103428733b3e7d9704818ea5993b899e#1}'; endif;?>

</li>
<?php elseif ($this->_tpl_vars['node']->index > 0): ?></li>
<?php endif; ?>
<?php if (( $this->_tpl_vars['node']->depth == 1 && $this->_tpl_vars['depth2now'] == $this->_tpl_vars['depth2']-1 ) && ( $this->_tpl_vars['node']->current || $this->_tpl_vars['node']->parent )): ?>
	<?php $this->assign('lastact', 1); ?>
<?php endif; ?>
  <li class="<?php if ($this->_tpl_vars['node']->haschildren): ?> child <?php endif; ?><?php if ($this->_tpl_vars['node']->depth == 1 && ($this->_foreach['top']['iteration'] <= 1)): ?> first <?php endif; ?> <?php if (( $this->_tpl_vars['node']->depth == 2 && $this->_tpl_vars['depth2now'] == $this->_tpl_vars['depth2']-1 ) || ($this->_foreach['top']['iteration'] == $this->_foreach['top']['total'])): ?> last <?php endif; ?><?php if (( $this->_tpl_vars['node']->current || $this->_tpl_vars['node']->parent )): ?> active ac<?php endif; ?> <?php if ($this->_tpl_vars['node']->depth > $this->_tpl_vars['node']->prevdepth): ?>first<?php endif; ?> <?php if ($this->_tpl_vars['node']->depth == 3 && $this->_tpl_vars['node']->haschildren): ?> tabpar<?php endif; ?>"><a class="<?php echo $this->_tpl_vars['classes']; ?>
" href="<?php echo $this->_tpl_vars['node']->url; ?>
"><?php echo $this->_tpl_vars['node']->menutext; ?>
</a>

 <?php if ($this->_tpl_vars['node']->depth == 2): ?>
<?php $this->assign('depth2now', $this->_tpl_vars['depth2now']+1); ?>
<?php endif; ?>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:103428733b3e7d9704818ea5993b899e#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('103428733b3e7d9704818ea5993b899e','2');echo smarty_cms_function_repeat(array('string' => "</li></ul>",'times' => $this->_tpl_vars['node']->depth-1), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:103428733b3e7d9704818ea5993b899e#2}'; endif;?>
</li>
<?php else: ?>
<?php $this->assign('leftm', '2'); ?>
<?php endif; ?>
				
					