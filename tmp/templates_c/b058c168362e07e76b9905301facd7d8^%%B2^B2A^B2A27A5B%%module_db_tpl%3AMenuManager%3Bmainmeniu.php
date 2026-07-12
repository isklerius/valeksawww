<?php /* Smarty version 2.6.25, created on 2017-04-16 00:44:21
         compiled from module_db_tpl:MenuManager%3Bmainmeniu */ ?>
<?php $_from = $this->_tpl_vars['nodelist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['top'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['top']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['node']):
        $this->_foreach['top']['iteration']++;
?>
  <?php if ($this->_tpl_vars['node']->depth >= 2): ?> 
  
  <?php if ($this->_tpl_vars['node']->prevdepth == 3 && $this->_tpl_vars['node']->depth == 2): ?></tr></table></div></div></td><?php endif; ?>
  
  <td class="<?php if (( $this->_tpl_vars['node']->current || $this->_tpl_vars['node']->parent )): ?> active ac <?php endif; ?> <?php if (($this->_foreach['top']['iteration'] == $this->_foreach['top']['total'])): ?> last <?php endif; ?> <?php if (($this->_foreach['top']['iteration']-1) == 1): ?> first <?php endif; ?> <?php if ($this->_tpl_vars['node']->haschildren): ?> has <?php endif; ?>"> 
 <div class="txt"> <a href="<?php echo $this->_tpl_vars['node']->url; ?>
"><?php echo $this->_tpl_vars['node']->menutext; ?>
</a>
  <?php if ($this->_tpl_vars['node']->haschildren): ?>
  <div class="submenu">
  <table ><tr>
  

  <?php else: ?> <?php if ($this->_tpl_vars['node']->depth == 3): ?></td></tr><?php else: ?>
 
 </div> </td><?php endif; ?>
  <?php endif; ?>
  
  <?php endif; ?>
<?php endforeach; endif; unset($_from); ?> 