<?php /* Smarty version 2.6.25, created on 2017-04-16 00:44:21
         compiled from module_file_tpl:TxForm%3Buzklausa.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'field', 'module_file_tpl:TxForm;uzklausa.tpl', 11, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/TxForm^%%FC^FCE^FCEAD581%%module_file_tpl%3ATxForm%3Buzklausa.tpl.inc'] = '88b6cae96ba4fb657d639f555ce05414'; ?>
<?php echo $this->_tpl_vars['formstart']; ?>

<?php if ($this->_tpl_vars['form_errors']): ?>
<ul class="err">
<?php $_from = $this->_tpl_vars['form_errors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
   <?php if ($this->_tpl_vars['v']): ?><li ><?php echo $this->_tpl_vars['v']; ?>
</li><?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</ul>
<?php endif; ?>
<div class="forma">
<?php echo smarty_function_field(array('type' => 'hidden','prefix' => $this->_tpl_vars['prefix'],'name' => 'form_id','value' => '1'), $this);?>

<label>
<?php echo $this->_config[0]['vars']['vardas']; ?>

</label><br />
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:88b6cae96ba4fb657d639f555ce05414#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('88b6cae96ba4fb657d639f555ce05414','0');echo smarty_function_field(array('type' => 'text','name' => 'vardas','label' => '0','prefix' => $this->_tpl_vars['prefix'],'defval' => $this->_tpl_vars['vardas']), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:88b6cae96ba4fb657d639f555ce05414#0}'; endif;?>

<div class="clear clear1"><!----></div>
<label>
<?php echo $this->_config[0]['vars']['elpastas']; ?>

</label><br />
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:88b6cae96ba4fb657d639f555ce05414#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('88b6cae96ba4fb657d639f555ce05414','1');echo smarty_function_field(array('type' => 'text','name' => 'elpastas','prefix' => $this->_tpl_vars['prefix'],'label' => '0','required' => 1,'defval' => $this->_tpl_vars['elpastas']), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:88b6cae96ba4fb657d639f555ce05414#1}'; endif;?>

<div class="clear clear1"><!----></div>
<label>
<?php echo $this->_config[0]['vars']['zinute']; ?>

</label><br />
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:88b6cae96ba4fb657d639f555ce05414#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('88b6cae96ba4fb657d639f555ce05414','2');echo smarty_function_field(array('type' => 'textarea','name' => 'zinute','prefix' => $this->_tpl_vars['prefix'],'label' => '0','defval' => $this->_tpl_vars['zinute'],'rows' => '30','cols' => '5'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:88b6cae96ba4fb657d639f555ce05414#2}'; endif;?>

<div class="clear clear1"><!----></div>

<div class="clear clear1"><!----></div>
</div>
<br/>
<div class="butt"><button type="submit"><?php echo $this->_config[0]['vars']['siusti']; ?>
</button><span class="arr"><!----></span>
<div class="clear"><!----></div></div>
</form>