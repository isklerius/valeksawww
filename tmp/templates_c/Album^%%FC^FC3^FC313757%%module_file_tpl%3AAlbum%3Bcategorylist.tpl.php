<?php /* Smarty version 2.6.25, created on 2021-07-26 14:24:52
         compiled from module_file_tpl:Album%3Bcategorylist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module_file_tpl:Album;categorylist.tpl', 15, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/Album^%%FC^FC3^FC313757%%module_file_tpl%3AAlbum%3Bcategorylist.tpl.inc'] = 'be4611c7102ac3cbcdfbf76b59697fd3'; ?><?php if ($this->_tpl_vars['itemcount'] > 0): ?>

<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th><?php echo $this->_tpl_vars['categorynametext']; ?>
</th>
			<th style="text-align:center"><?php echo $this->_tpl_vars['categoryidtext']; ?>
</th>
			<th class="pagepos"><?php echo $this->_tpl_vars['categoryreordertext']; ?>
</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon"><?php echo $this->_tpl_vars['categoryactionstext']; ?>
</th>
		</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
	<?php if ($this->caching && !$this->_cache_including): echo '{nocache:be4611c7102ac3cbcdfbf76b59697fd3#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('be4611c7102ac3cbcdfbf76b59697fd3','0');echo smarty_function_cycle(array('values' => "row1,row2",'assign' => 'rowclass'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:be4611c7102ac3cbcdfbf76b59697fd3#0}'; endif;?>

		<tr class="<?php echo $this->_tpl_vars['rowclass']; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
';">
			<td><?php echo $this->_tpl_vars['entry']->name; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['entry']->id; ?>
</td>
			<td style="text-align:center"><?php echo $this->_tpl_vars['entry']->uplink; ?>
<?php echo $this->_tpl_vars['entry']->downlink; ?>
</td>
			<td>&nbsp;</td>
			<td><?php echo $this->_tpl_vars['entry']->deletelink; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php else: ?>
<h4><?php echo $this->_tpl_vars['nocategoriestext']; ?>
</h4>
<?php endif; ?>

<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>