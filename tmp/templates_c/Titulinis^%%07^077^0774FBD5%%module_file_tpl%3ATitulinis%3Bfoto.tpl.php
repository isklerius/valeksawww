<?php /* Smarty version 2.6.25, created on 2018-03-12 13:15:33
         compiled from module_file_tpl:Titulinis%3Bfoto.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'upper', 'module_file_tpl:Titulinis;foto.tpl', 19, false),)), $this); ?>
﻿<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>
<tbody>
<table cellspacing="0" class="pagetable">
		<thead>
			<tr>
				<th width="10px"><div>&nbsp;</div></th>
				<th  width="20px"><div><?php echo $this->_tpl_vars['Titulinis']->Lang('sq'); ?>
</div></th>
				<th width="20px" style="text-align:center"><div><?php echo $this->_tpl_vars['Titulinis']->Lang('paveiksliukas'); ?>
</div></th>
				<th width="200px" style="text-align:center"><div><?php echo $this->_tpl_vars['Titulinis']->Lang('tekstas'); ?>
</div></th>
				<th  width="30px"><div><?php echo $this->_tpl_vars['Titulinis']->Lang('state'); ?>
</div></th>
				<th  width="10px" class="pageicon"><div><?php echo $this->_tpl_vars['Titulinis']->Lang('istrinti'); ?>
</div></th>
			</tr>
		</thead>
</tbody>
<?php $_from = $this->_tpl_vars['kalbos']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['kl'] => $this->_tpl_vars['kalba']):
?>
	<tbody id='<?php echo $this->_tpl_vars['kalba']; ?>
'>
			<tr><td colspan='7' style="background-color: #e5e5e5"><b><?php echo ((is_array($_tmp=$this->_tpl_vars['kalba'])) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>
</b></td></tr>
			<?php $this->assign('nmb', '0'); ?>
			<?php $_from = $this->_tpl_vars['prop_array'][$this->_tpl_vars['kl']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
				<?php $this->assign('nmb', $this->_tpl_vars['nmb']+1); ?>
				<tr class="row1" onmouseover="this.className='row1hover';" onmouseout="this.className='row1';" id='lt-<?php echo $this->_tpl_vars['nmb']; ?>
'>
					<td><div></div></td>
					<td style="text-align:center"><div><?php echo $this->_tpl_vars['entry']->eiliskumas; ?>
</div></td>
					<td><?php if ($this->_tpl_vars['entry']->paveiksliukas): ?><div><?php if ($this->_tpl_vars['allow_more'] || ( $this->_tpl_vars['cuser'] == $this->_tpl_vars['entry']->userid )): ?><a href="moduleinterface.php?sp_=<?php echo $this->_supers['get']['sp_']; ?>
&mact=<?php echo $this->_tpl_vars['mod_w']; ?>
,m1_,editprop,0&prop_id=<?php echo $this->_tpl_vars['entry']->id; ?>
&m1_kat=<?php echo $this->_tpl_vars['kateg']; ?>
" class="roo" id="r-<?php echo $this->_tpl_vars['entry']->kategorija; ?>
-<?php echo $this->_tpl_vars['nmb']; ?>
"><img style="width: 100px" src="<?php echo $this->_tpl_vars['root_url']; ?>
/uploads/images/titulinis/<?php echo $this->_tpl_vars['entry']->paveiksliukas; ?>
"/></a><?php else: ?><?php echo $this->_tpl_vars['entry']->paveiksliulas; ?>
<?php endif; ?></div><?php endif; ?></td>	
					<td><div><?php echo $this->_tpl_vars['entry']->tekstas; ?>
</div></td>					
					<td><div><?php if ($this->_tpl_vars['entry']->nerodyti): ?><?php echo $this->_tpl_vars['Titulinis']->Lang('pasleptas'); ?>
<?php else: ?><?php echo $this->_tpl_vars['Titulinis']->Lang('rodomas'); ?>
<?php endif; ?></div></td>					
					<td><div><?php if ($this->_tpl_vars['allow_edit'] || ( $this->_tpl_vars['cuser'] == $this->_tpl_vars['entry']->userid )): ?><a href="moduleinterface.php?sp_=<?php echo $this->_supers['get']['sp_']; ?>
&mact=<?php echo $this->_tpl_vars['mod_w']; ?>
,m1_,editprop,0&prop_id=<?php echo $this->_tpl_vars['entry']->id; ?>
&m1_kat=<?php echo $this->_tpl_vars['kateg']; ?>
">edit</a><?php endif; ?>&nbsp;<?php if ($this->_tpl_vars['allow_del'] == 'yes' || ( $this->_tpl_vars['cuser'] == $this->_tpl_vars['entry']->userid )): ?>|&nbsp;<a onclick="if(!confirm('ar tikrai?')) return false;" href="moduleinterface.php?sp_=<?php echo $this->_supers['get']['sp_']; ?>
&mact=<?php echo $this->_tpl_vars['mod_w']; ?>
,m1_,deleteprop,0&prop_id=<?php echo $this->_tpl_vars['entry']->id; ?>
">delete</a><?php endif; ?></div></td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
	</tbody>
<?php endforeach; endif; unset($_from); ?>	

<tbody>
<tr>
<td></td><td></td>
</tr>
		</tbody>

</table>

<div class="pageoptions">
	<p class="pageoptions"><?php echo $this->_tpl_vars['addlink']; ?>
</p>
</div>

