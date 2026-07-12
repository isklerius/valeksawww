<?php /* Smarty version 2.6.25, created on 2021-07-26 14:24:52
         compiled from module_file_tpl:Album%3Bfiletpllist.tpl */ ?>
<?php if ($this->_tpl_vars['itemcount'] > 0): ?>

<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th><?php echo $this->_tpl_vars['filenametext']; ?>
</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<tr class="<?php echo $this->_tpl_vars['entry']->rowclass; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['entry']->rowclass; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['entry']->rowclass; ?>
';">
			<td style="width:50%"><?php echo $this->_tpl_vars['entry']->filename; ?>
</td>
			<td style="width:50%; text-align:right"><?php echo $this->_tpl_vars['entry']->importlink; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php else: ?>
<h4><?php echo $this->_tpl_vars['nofilestext']; ?>
</h4>
<?php endif; ?>