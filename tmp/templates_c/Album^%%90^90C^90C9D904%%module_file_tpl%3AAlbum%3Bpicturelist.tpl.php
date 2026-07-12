<?php /* Smarty version 2.6.25, created on 2017-04-15 20:00:51
         compiled from module_file_tpl:Album%3Bpicturelist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'module_file_tpl:Album;picturelist.tpl', 12, false),)), $this); ?>
<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>
<?php if ($this->_tpl_vars['itemcount'] > 0): ?>
	<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
	<table style="display:inline; float:left;">
		<tr style="height : 100px;">
			<td style="width:100px;border:1px white solid;text-align:center;" colspan="3"><?php echo $this->_tpl_vars['entry']->thumblink; ?>
</td>
		</tr>
		<tr>
			<td style="width:20px;text-align:left"><?php echo $this->_tpl_vars['entry']->uplink; ?>
</td>
			<td style="width:60px;text-align:center"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->name)) ? $this->_run_mod_handler('truncate', true, $_tmp, 12, "...") : smarty_modifier_truncate($_tmp, 12, "...")); ?>
 <br /> <?php echo $this->_tpl_vars['entry']->changecommentlink; ?>
 <?php echo $this->_tpl_vars['entry']->changepicturelink; ?>
 <?php echo $this->_tpl_vars['entry']->changethumblink; ?>
 <br /> <?php echo $this->_tpl_vars['entry']->deletelink; ?>
</td>
			<td style="width:20px;text-align:right"><?php echo $this->_tpl_vars['entry']->downlink; ?>
</td>
		</tr>
	</table>
	<?php endforeach; endif; unset($_from); ?>
<div style="clear:both"></div>
<?php else: ?>
<h4><?php echo $this->_tpl_vars['nopicturetext']; ?>
</h4>
<?php endif; ?>

<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>