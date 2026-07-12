<?php /* Smarty version 2.6.25, created on 2021-07-26 14:24:52
         compiled from module_file_tpl:Album%3Balbumlist.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'module_file_tpl:Album;albumlist.tpl', 25, false),)), $this); ?>
<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>

<?php unset($this->_sections['album']);
$this->_sections['album']['name'] = 'album';
$this->_sections['album']['loop'] = is_array($_loop=$this->_tpl_vars['categories']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['album']['show'] = true;
$this->_sections['album']['max'] = $this->_sections['album']['loop'];
$this->_sections['album']['step'] = 1;
$this->_sections['album']['start'] = $this->_sections['album']['step'] > 0 ? 0 : $this->_sections['album']['loop']-1;
if ($this->_sections['album']['show']) {
    $this->_sections['album']['total'] = $this->_sections['album']['loop'];
    if ($this->_sections['album']['total'] == 0)
        $this->_sections['album']['show'] = false;
} else
    $this->_sections['album']['total'] = 0;
if ($this->_sections['album']['show']):

            for ($this->_sections['album']['index'] = $this->_sections['album']['start'], $this->_sections['album']['iteration'] = 1;
                 $this->_sections['album']['iteration'] <= $this->_sections['album']['total'];
                 $this->_sections['album']['index'] += $this->_sections['album']['step'], $this->_sections['album']['iteration']++):
$this->_sections['album']['rownum'] = $this->_sections['album']['iteration'];
$this->_sections['album']['index_prev'] = $this->_sections['album']['index'] - $this->_sections['album']['step'];
$this->_sections['album']['index_next'] = $this->_sections['album']['index'] + $this->_sections['album']['step'];
$this->_sections['album']['first']      = ($this->_sections['album']['iteration'] == 1);
$this->_sections['album']['last']       = ($this->_sections['album']['iteration'] == $this->_sections['album']['total']);
?>
	<h2><?php echo $this->_tpl_vars['categories'][$this->_sections['album']['index']]['category_name']; ?>
</h2>
	<?php if (empty ( $this->_tpl_vars['categories'][$this->_sections['album']['index']]['albums'] )): ?>
		<h4><?php echo $this->_tpl_vars['noalbumstext']; ?>
</h4>
	<?php else: ?>
		<table cellspacing="0" class="pagetable">
		<thead>
			<tr>
				<th><?php echo $this->_tpl_vars['albumnametext']; ?>
</th>
				<th style="text-align:center"><?php echo $this->_tpl_vars['albumthumbtext']; ?>
</th>
				<th style="text-align:center"><?php echo $this->_tpl_vars['albumidtext']; ?>
</th>
				<th><?php echo $this->_tpl_vars['albumnumpicturestext']; ?>
</th>
				<th><?php echo $this->_tpl_vars['albumtemplatetext']; ?>
</th>
				<th class="pagepos"><?php echo $this->_tpl_vars['albumreordertext']; ?>
</th>
				<th class="pageicon">&nbsp;</th>
				<th class="pageicon"><?php echo $this->_tpl_vars['albumactionstext']; ?>
</th>
			</tr>
		</thead>
		<tbody>
			<?php $_from = $this->_tpl_vars['categories'][$this->_sections['album']['index']]['albums']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
			<?php echo smarty_function_cycle(array('values' => "row1,row2",'assign' => 'rowclass'), $this);?>

				<tr class="<?php echo $this->_tpl_vars['rowclass']; ?>
" onmouseover="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
hover';" onmouseout="this.className='<?php echo $this->_tpl_vars['rowclass']; ?>
';">
					<td><?php echo $this->_tpl_vars['entry']->name; ?>
</td>
					<td style="text-align:center;height:100px"><?php echo $this->_tpl_vars['entry']->thumb; ?>
</td>
					<td style="text-align:center"><?php echo $this->_tpl_vars['entry']->id; ?>
</td>
					<td><?php echo $this->_tpl_vars['entry']->picturenumber; ?>
 <?php echo $this->_tpl_vars['picturestext']; ?>
</td>
					<td><?php echo $this->_tpl_vars['entry']->template; ?>
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
	<?php endif; ?>
<?php endfor; endif; ?>

<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>