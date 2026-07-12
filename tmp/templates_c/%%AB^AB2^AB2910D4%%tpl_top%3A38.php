<?php /* Smarty version 2.6.25, created on 2017-04-15 19:56:13
         compiled from tpl_top:38 */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cms_include', 'tpl_top:38', 1, false),array('function', 'menu', 'tpl_top:38', 14, false),array('function', 'title', 'tpl_top:38', 17, false),array('function', 'content', 'tpl_top:38', 18, false),array('modifier', 'check_headimg', 'tpl_top:38', 4, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/%%AB^AB2^AB2910D4%%tpl_top%3A38.inc'] = '7ef2347c023cda6de7ad076774765a6d'; ?><?php if ($this->caching && !$this->_cache_including): echo '{nocache:7ef2347c023cda6de7ad076774765a6d#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('7ef2347c023cda6de7ad076774765a6d','0');echo cms_tmp_cms_include_userplugin_function(array('tpl' => 'header'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:7ef2347c023cda6de7ad076774765a6d#0}'; endif;?>

	<div class="content">
				<div class="vidus">
					<?php $this->assign('mainimg', ((is_array($_tmp=$this->_tpl_vars['content_obj']->mId)) ? $this->_run_mod_handler('check_headimg', true, $_tmp) : smarty_modifier_check_headimg($_tmp))); ?>
					<?php if ($this->_tpl_vars['mainimg']): ?>
						<div class="slider">
							<div class="container">
										<img src="<?php echo $this->_tpl_vars['mainimg']; ?>
"/>
							</div>
						</div>
					<?php endif; ?>
					<div class="vidcnt" <?php if ($this->_tpl_vars['mainimg']): ?> style="top:-20px;" <?php elseif (! $this->_tpl_vars['mainimg']): ?> style="top:20px;" <?php endif; ?>>
					<div class="leftmenu">
						<?php if ($this->caching && !$this->_cache_including): echo '{nocache:7ef2347c023cda6de7ad076774765a6d#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('7ef2347c023cda6de7ad076774765a6d','1');echo smarty_cms_function_menu(array('template' => 'leftmenu','collapse' => '1','start_level' => 3,'number_of_levels' => 3), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:7ef2347c023cda6de7ad076774765a6d#1}'; endif;?>

					</div>
					<div class="middle">
						<h1><?php if ($this->caching && !$this->_cache_including): echo '{nocache:7ef2347c023cda6de7ad076774765a6d#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('7ef2347c023cda6de7ad076774765a6d','2');echo smarty_cms_function_title(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:7ef2347c023cda6de7ad076774765a6d#2}'; endif;?>
</h1>
						<?php if ($this->caching && !$this->_cache_including): echo '{nocache:7ef2347c023cda6de7ad076774765a6d#3}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('7ef2347c023cda6de7ad076774765a6d','3');echo smarty_cms_function_content(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:7ef2347c023cda6de7ad076774765a6d#3}'; endif;?>

					</div>
				<div class="clear"></div>
					</div>
				<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
<?php if ($this->caching && !$this->_cache_including): echo '{nocache:7ef2347c023cda6de7ad076774765a6d#4}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('7ef2347c023cda6de7ad076774765a6d','4');echo cms_tmp_cms_include_userplugin_function(array('tpl' => 'footer'), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:7ef2347c023cda6de7ad076774765a6d#4}'; endif;?>