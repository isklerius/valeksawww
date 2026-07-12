<?php /* Smarty version 2.6.25, created on 2017-04-16 03:39:33
         compiled from module_db_tpl:MenuManager%3Blang */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'module_db_tpl:MenuManager;lang', 1, false),array('modifier', 'upper', 'module_db_tpl:MenuManager;lang', 4, false),)), $this); ?>
<?php $this->assign('kiekkalbu', count($this->_tpl_vars['nodelist'])); ?>
<?php $_from = $this->_tpl_vars['nodelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['langu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['langu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['langu']['iteration']++;
?>
  <?php if ($this->_tpl_vars['node']->depth == 1): ?>
<li class=" <?php if (( $this->_tpl_vars['node']->current == true ) || ( $this->_tpl_vars['node']->parent )): ?>active <?php $this->assign('kalba', $this->_tpl_vars['node']->alias); ?><?php endif; ?><?php if (($this->_foreach['langu']['iteration'] == $this->_foreach['langu']['total'])): ?>last<?php endif; ?> <?php if (($this->_foreach['langu']['iteration'] <= 1)): ?>first<?php endif; ?>"><a href="<?php echo $this->_tpl_vars['node']->url; ?>
"><?php echo ((is_array($_tmp=$this->_tpl_vars['node']->alias)) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</a></li>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>