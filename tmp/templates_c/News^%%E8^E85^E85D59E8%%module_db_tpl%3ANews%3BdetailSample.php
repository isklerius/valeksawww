<?php /* Smarty version 2.6.25, created on 2017-04-15 19:56:13
         compiled from module_db_tpl:News%3BdetailSample */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cms_date_format', 'module_db_tpl:News;detailSample', 8, false),array('modifier', 'cms_escape', 'module_db_tpl:News;detailSample', 11, false),array('function', 'eval', 'module_db_tpl:News;detailSample', 19, false),array('function', 'cms_module', 'module_db_tpl:News;detailSample', 21, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/News^%%E8^E85^E85D59E8%%module_db_tpl%3ANews%3BdetailSample.inc'] = '0d9c08189efc38df23a340edcd2b54f6'; ?><?php if (isset ( $this->_tpl_vars['entry']->canonical )): ?>
  <?php $this->assign('canonical', $this->_tpl_vars['entry']->canonical); ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['entry']->postdate): ?>
	<div id="NewsPostDetailDate">
		<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->postdate)) ? $this->_run_mod_handler('cms_date_format', true, $_tmp, "%d-%m-%Y") : smarty_cms_modifier_cms_date_format($_tmp, "%d-%m-%Y")); ?>

	</div>
<?php endif; ?>
<h3 id="NewsPostDetailTitle"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->title)) ? $this->_run_mod_handler('cms_escape', true, $_tmp, 'htmlall') : smarty_cms_modifier_cms_escape($_tmp, 'htmlall')); ?>
</h3>

<hr id="NewsPostDetailHorizRule" />

<div id="NewsPostDetailContent">
<?php if ($this->_tpl_vars['entry']->nuotrauka1): ?>
	<img src="<?php echo $this->_tpl_vars['entry']->file_location; ?>
/thumb_<?php echo $this->_tpl_vars['entry']->nuotrauka1; ?>
"/>
<?php endif; ?>
	<?php echo smarty_function_eval(array('var' => $this->_tpl_vars['entry']->content), $this);?>

	<?php if ($this->_tpl_vars['entry']->albumo_id): ?>
	<?php if ($this->caching && !$this->_cache_including): echo '{nocache:0d9c08189efc38df23a340edcd2b54f6#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('0d9c08189efc38df23a340edcd2b54f6','0');echo smarty_cms_function_cms_module(array('module' => 'album','albums' => $this->_tpl_vars['entry']->albumo_id), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:0d9c08189efc38df23a340edcd2b54f6#0}'; endif;?>

	<?php endif; ?>
</div>

<?php if ($this->_tpl_vars['entry']->extra): ?>
	<div id="NewsPostDetailExtra">
		<?php echo $this->_tpl_vars['extra_label']; ?>
 <?php echo $this->_tpl_vars['entry']->extra; ?>

	</div>
<?php endif; ?>