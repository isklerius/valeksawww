<?php /* Smarty version 2.6.25, created on 2017-04-15 22:00:13
         compiled from module_db_tpl:News%3BsummarySample */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'cms_date_format', 'module_db_tpl:News;summarySample', 5, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
								
							<div class="news" style="padding-bottom:20px;">
							<?php if ($this->_tpl_vars['entry']->postdate): ?>
										<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']->postdate)) ? $this->_run_mod_handler('cms_date_format', true, $_tmp, "%d-%m-%Y") : smarty_cms_modifier_cms_date_format($_tmp, "%d-%m-%Y")); ?>

								<?php endif; ?>
								<div class="clear"></div>
								<?php if ($this->_tpl_vars['entry']->nuotrauka1): ?>
							<div style="float:left;padding-right:10px;text-align:center;">
									<a href="<?php echo $this->_tpl_vars['entry']->moreurl; ?>
"><img src="<?php echo $this->_tpl_vars['entry']->file_location; ?>
/thumb_<?php echo $this->_tpl_vars['entry']->nuotrauka1; ?>
"/></a>
							</div>
							<?php endif; ?>
								
							<a href="<?php echo $this->_tpl_vars['entry']->moreurl; ?>
" class="title" style="display:block;"><?php echo $this->_tpl_vars['entry']->title; ?>
</a>
								<?php if ($this->_tpl_vars['entry']->summary): ?>
										<?php echo $this->_tpl_vars['entry']->summary; ?>

								<?php endif; ?>
								<a class="more" href="<?php echo $this->_tpl_vars['entry']->moreurl; ?>
"><?php echo $this->_config[0]['vars']['placiau']; ?>
</a>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
<?php endforeach; endif; unset($_from); ?>
<!-- End News Display Template -->
	<?php if ($this->_tpl_vars['pagecount'] > 1): ?>
<div class="NewPage" style="float:left;">
		<?php if ($this->_tpl_vars['prevurl']): ?>
			<a class="page_pirmyn" href="<?php echo $this->_tpl_vars['prevurl']; ?>
">< Ankstesnis</a> 
		<?php else: ?>
			<span class="page_pirmyn">< Ankstesnis</span> 
		<?php endif; ?>
		<?php $_from = $this->_tpl_vars['linkai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link']):
?>
			<a class="page_nr <?php if ($this->_tpl_vars['link']['aktyvus']): ?>page_nr_a<?php endif; ?>" href="<?php echo $this->_tpl_vars['link']['nuoroda']; ?>
"><?php echo $this->_tpl_vars['link']['numeris']; ?>
</a>
		<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['nexturl']): ?>
			<a class="page_atgal" href="<?php echo $this->_tpl_vars['nexturl']; ?>
">Kitas ></a> 
		<?php else: ?>
			<span class="page_atgal" >Kitas ></span> 
			
		<?php endif; ?>
</div>
	<?php endif; ?>
	
<div style="float:left;padding-left:10px;">
<?php if ($this->_tpl_vars['itemcount'] > 3 || $this->_tpl_vars['pagecount'] > 1): ?>
	<?php if ($this->_tpl_vars['number'] > 3): ?>
		<?php echo $this->_tpl_vars['suskleisti']; ?>

	<?php else: ?>
		<?php echo $this->_tpl_vars['isskleisti']; ?>

	<?php endif; ?>
<?php endif; ?>
</div>
