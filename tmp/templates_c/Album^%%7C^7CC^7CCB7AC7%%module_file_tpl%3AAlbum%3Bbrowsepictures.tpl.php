<?php /* Smarty version 2.6.25, created on 2017-04-15 20:00:09
         compiled from module_file_tpl:Album%3Bbrowsepictures.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module_file_tpl:Album;browsepictures.tpl', 16, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/Album^%%7C^7CC^7CCB7AC7%%module_file_tpl%3AAlbum%3Bbrowsepictures.tpl.inc'] = '8cdbb95249eaffe305a2472bfd0efe9f'; ?>
<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th><?php echo $this->_tpl_vars['titlename']; ?>
&nbsp;</th>
			<th>&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	<?php $_from = $this->_tpl_vars['dirs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
	
		<tr class="row<?php echo smarty_function_cycle(array('values' => '1,2','advance' => false), $this);?>
" onmouseover="this.className='row<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8cdbb95249eaffe305a2472bfd0efe9f#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8cdbb95249eaffe305a2472bfd0efe9f','0');echo smarty_function_cycle(array('values' => '1,2','advance' => false), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8cdbb95249eaffe305a2472bfd0efe9f#0}'; endif;?>
hover';" onmouseout="this.className='row<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8cdbb95249eaffe305a2472bfd0efe9f#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8cdbb95249eaffe305a2472bfd0efe9f','1');echo smarty_function_cycle(array('values' => '1,2'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8cdbb95249eaffe305a2472bfd0efe9f#1}'; endif;?>
';">
			<td class="pageicon">&nbsp;</td>
		<td><?php echo $this->_tpl_vars['entry']->icon; ?>
</td>
			<td><?php echo $this->_tpl_vars['entry']->name; ?>
</td>
			<td>&nbsp;</td>
			<td class="pageicon">&nbsp;</td>
			<td class="pageicon">&nbsp;</td>

		</tr>
	<?php endforeach; endif; unset($_from); ?>
	<?php $_from = $this->_tpl_vars['files']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<tr class="row<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8cdbb95249eaffe305a2472bfd0efe9f#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8cdbb95249eaffe305a2472bfd0efe9f','2');echo smarty_function_cycle(array('values' => '1,2','advance' => false), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8cdbb95249eaffe305a2472bfd0efe9f#2}'; endif;?>
" onmouseover="this.className='row<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8cdbb95249eaffe305a2472bfd0efe9f#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8cdbb95249eaffe305a2472bfd0efe9f','3');echo smarty_function_cycle(array('values' => '1,2','advance' => false), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8cdbb95249eaffe305a2472bfd0efe9f#3}'; endif;?>
hover';" onmouseout="this.className='row<?php if ($this->caching && !$this->_cache_including): echo '{nocache:8cdbb95249eaffe305a2472bfd0efe9f#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('8cdbb95249eaffe305a2472bfd0efe9f','4');echo smarty_function_cycle(array('values' => '1,2'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:8cdbb95249eaffe305a2472bfd0efe9f#4}'; endif;?>
';" style="<?php echo $this->_tpl_vars['entry']->style; ?>
">
			<td class="pageicon"><?php echo $this->_tpl_vars['entry']->select; ?>
</td>
			<td style="text-align: left;" onmouseover="<?php echo $this->_tpl_vars['entry']->onmouseover; ?>
" onmouseout="<?php echo $this->_tpl_vars['entry']->onmouseout; ?>
">
				<a href="<?php echo $this->_tpl_vars['entry']->imagepath; ?>
" target="_blank"><?php echo $this->_tpl_vars['entry']->icon; ?>
</a>
				<div style="display:none;position:absolute;margin-top:20px;background-color:white;padding:5px;border:1px solid black" id="<?php echo $this->_tpl_vars['entry']->id; ?>
"><img alt="" src="<?php echo $this->_tpl_vars['entry']->thumbpath; ?>
" /></div>
			</td>
			<td><?php echo $this->_tpl_vars['entry']->name; ?>
</td>
			<td><strong><?php echo $this->_tpl_vars['entry']->current; ?>
</strong></td>
			<td class="pageicon"><?php echo $this->_tpl_vars['entry']->usepicture; ?>
</td>
			<td class="pageicon"><?php echo $this->_tpl_vars['entry']->usethumb; ?>
</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
	</tbody>
</table>
<?php echo $this->_tpl_vars['selectallscript']; ?>

<div style="float:right;"><?php echo $this->_tpl_vars['submit']; ?>
<?php echo $this->_tpl_vars['cancel']; ?>
</div>
<?php echo $this->_tpl_vars['selectall']; ?>

