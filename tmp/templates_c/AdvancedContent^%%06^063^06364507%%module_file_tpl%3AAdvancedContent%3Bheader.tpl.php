<?php /* Smarty version 2.6.25, created on 2018-03-12 13:18:32
         compiled from module_file_tpl:AdvancedContent%3Bheader.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'root_url', 'module_file_tpl:AdvancedContent;header.tpl', 14, false),array('modifier', 'count', 'module_file_tpl:AdvancedContent;header.tpl', 15, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/AdvancedContent^%%06^063^06364507%%module_file_tpl%3AAdvancedContent%3Bheader.tpl.inc'] = '0f704c29a713ef8f8cc59ead2b367453'; ?>
<link rel="stylesheet" media="screen" type="text/css" href="<?php echo smarty_function_root_url(array(), $this);?>
/modules/AdvancedContent/css/style.css" />
<?php if (isset ( $this->_tpl_vars['colorpicker_blocks'] ) && ((is_array($_tmp=$this->_tpl_vars['colorpicker_blocks'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
<link rel=stylesheet href="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:0f704c29a713ef8f8cc59ead2b367453#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('0f704c29a713ef8f8cc59ead2b367453','0');echo smarty_function_root_url(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:0f704c29a713ef8f8cc59ead2b367453#0}'; endif;?>
/modules/AdvancedContent/css/jpicker.css" type="text/css" />
<?php endif; ?>
<script language="javascript" type="text/javascript" src="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:0f704c29a713ef8f8cc59ead2b367453#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('0f704c29a713ef8f8cc59ead2b367453','1');echo smarty_function_root_url(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:0f704c29a713ef8f8cc59ead2b367453#1}'; endif;?>
/modules/AdvancedContent/js/main.js"></script>
<script language="javascript" type="text/javascript">
//<![CDATA[
<?php echo '
jQuery(document).ready(function() {
	//jQuery.noConflict();
	jQuery(\'.sortable_wrapper\').sortable({
		items: \'.sortable\',
		handle: \'.sortable_handler\',
		axis: \'y\'
	});
	jQuery(\'.sortable_handler\').disableSelection();
	jQuery(\'#AdvancedContentStartDatePickerDisplay\').calendar({
		triggerElement: \'#AdvancedContentStartDatePickerTrigger\',
		dateFormat: \'%x\',
		closeHandler: function (calendar) {
			jQuery(\'#AdvancedContentStartDate\').val(eval(calendar.date.getTime()/1000));
			calendar.container.hide();
		}
	});
	jQuery(\'#AdvancedContentEndDatePickerDisplay\').calendar({
		triggerElement: \'#AdvancedContentEndDatePickerTrigger\',
		dateFormat: \'%x\',
		closeHandler: function (calendar) {
			jQuery(\'#AdvancedContentEndDate\').val(eval(calendar.date.getTime()/1000));
			calendar.container.hide();
		}
	});
'; ?>

<?php if (isset ( $this->_tpl_vars['date_blocks'] ) && count($this->_tpl_vars['date_blocks']) > 0): ?>
	<?php $_from = $this->_tpl_vars['date_blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content_block_id']):
?>
		<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['mode'] == 'calendar'): ?>
			<?php echo '
		jQuery(\'#'; ?>
<?php echo $this->_tpl_vars['content_block_id']; ?>
<?php echo '_AdvancedContentDatePickerDisplay\').calendar({
			triggerElement: \'#'; ?>
<?php echo $this->_tpl_vars['content_block_id']; ?>
<?php echo '_AdvancedContentDatePickerTrigger\',
			dateFormat: \'%x\',
			closeHandler: function (calendar) {
				jQuery(\'#'; ?>
<?php echo $this->_tpl_vars['content_block_id']; ?>
<?php echo '_AdvancedContentDate\').val(eval(calendar.date.getTime()/1000));
				calendar.container.hide();
			}
		});
			'; ?>

		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
<?php echo '}'; ?>
);
<?php if (isset ( $this->_tpl_vars['colorpicker_blocks'] ) && ((is_array($_tmp=$this->_tpl_vars['colorpicker_blocks'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
jQuery(document).ready(function() <?php echo '{'; ?>

	jQuery.fn.jPicker.defaults.images.clientPath="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:0f704c29a713ef8f8cc59ead2b367453#2}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('0f704c29a713ef8f8cc59ead2b367453','2');echo smarty_function_root_url(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:0f704c29a713ef8f8cc59ead2b367453#2}'; endif;?>
/modules/AdvancedContent/images/jpicker/";
	<?php $_from = $this->_tpl_vars['colorpicker_blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['colorpicker']):
?>
	jQuery("#<?php echo $this->_tpl_vars['colorpicker']; ?>
").jPicker();
	<?php endforeach; endif; unset($_from); ?>
<?php echo '}'; ?>
);
<?php endif; ?>
<?php if (isset ( $this->_tpl_vars['slider_blocks'] ) && ((is_array($_tmp=$this->_tpl_vars['slider_blocks'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?>
jQuery(document).ready(function() <?php echo '{'; ?>

	<?php $_from = $this->_tpl_vars['slider_blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['slider']):
?>
	jQuery("#<?php echo $this->_tpl_vars['slider']; ?>
").slider(<?php if (((is_array($_tmp=$this->_tpl_vars['content_blocks'][$this->_tpl_vars['slider']]['params'])) ? $this->_run_mod_handler('count', true, $_tmp) : count($_tmp))): ?><?php echo '{'; ?>

		<?php $_from = $this->_tpl_vars['content_blocks'][$this->_tpl_vars['slider']]['params']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['slider_params'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['slider_params']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['param_name'] => $this->_tpl_vars['param_value']):
        $this->_foreach['slider_params']['iteration']++;
?>
		<?php echo $this->_tpl_vars['param_name']; ?>
: <?php echo $this->_tpl_vars['param_value']; ?>
<?php if (! ($this->_foreach['slider_params']['iteration'] == $this->_foreach['slider_params']['total'])): ?>,<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	<?php echo '}'; ?>
<?php endif; ?>);
	<?php endforeach; endif; unset($_from); ?>
});
<?php endif; ?>
<?php echo '
AdvancedContent = {
	toggleBlock: function (tabId, navbar_id) {
		var navbar = document.getElementById(navbar_id);
		var tabs   = navbar.getElementsByTagName(\'div\');
		
		for (var i = 0; i < tabs.length; i += 1) {
			//tabs[i].onmousedown = function() {
			for (var j = 0; j < tabs.length; j += 1) {
				tabs[j].className                                        = \'\';
				document.getElementById(tabs[j].id + "_c").style.display = \'none\';
			}
			document.getElementById(tabId).className            = \'active\';
			document.getElementById(tabId + "_c").style.display = \'block\';
			return true;
			//}
		}
	},
	submitForm: function (button, targetId) {
		var form = jQuery(button).parents(\'form:first\');
		jQuery(\'.AdvancedContent_AjaxFields\').remove();
		if(form.length) {
			if(targetId != \'\' && !form.parents(\'#\'+targetId).length) {
				jQuery(\'#\'+targetId).html(\'\');
			}
			var options = {
				success: function(responseText) {
					if(responseText != \'\' && targetId != \'\') {
						jQuery(\'#\'+targetId).html(responseText);
					}
					return false;
				}
			}
			form.append(\'<input type="hidden" class="AdvancedContent_AjaxFields" name="disable_theme" value="1" />\');
			form.append(\'<input type="hidden" class="AdvancedContent_AjaxFields" name="\'+button.name+\'" value="\'+button.value+\'" />\');
			form.append(\'<input type="hidden" class="AdvancedContent_AjaxFields" name="'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo 'ajax" value="1" />\');
			form.ajaxSubmit(options);
		}
		return false;
	},
	selectAll: function (obj) {
		if (obj.value == 1) {
			jQuery(\'input[name^="\'+obj.id+\'-"]\').attr(\'checked\',\'checked\');
			obj.value = 0;
		}
		else {
			jQuery(\'input[name^="\'+obj.id+\'-"]\').removeAttr(\'checked\');
			obj.value = 1;
		}
	},
	importPages: function(href) {
		jQuery.get(href + \'&'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo 'disable_theme=1&'; ?>
<?php echo $this->_tpl_vars['module_id']; ?>
<?php echo 'ajax=1\', function(data) {
			jQuery(\'#AdvancedContentResult\').html(data);
		});
		return false;
	},
	
	options: {
		title:\'AdvancedContent\',
		moduleId:\'m1_\',
		draggable:true,
		dragAxis:\'x\',
		resizable:true,
		resizableHandles:\'e,w\',
		cancelText:\'Cancel\',
		applyText:\'Apply\',
		fadeSpeed:300,
		animateSpeed:300,
		debug:false
	},
	multiContents: {},
	tmp: {
		currentblockId:\'\',
		height:0,
		innerHeight:0,
		blocks:{},
		template:{}
	},
	registerMultiContent: function(blockInfo) {
		this.multiContents[blockInfo[\'id\']] = blockInfo;
	},
	registerMultiContentBlock: function(multiContentId, blockInfo) {
		this.multiContents[multiContentId].content_blocks[blockInfo[\'id\']] = blockInfo;
		this.multiContents[multiContentId].content_blocks_count++;
	},
	displayContentBlock: function(blockInfo) {
		//AJAX?
		
	},
	addBlock: function() {
		this.openPanel();
	},
	editBlock: function(blockId) {
		//?
	},
	deleteBlock: function() {
		
	},
	openPanel: function(multiContentId) {
		/**
		 * open filepicker
		 */
		
		var blockId = (arguments[1] ? arguments[1] : \'block_\' + this.multiContents[multiContentId].content_blocks_count);
		this.getPanel(multiContentId,blockId);
		this.tmp.template[\'#AdvancedContent_background\'].css(\'display\',\'block\').fadeTo(AdvancedContent.options.fadeSpeed, 0.65, function () {
			
			if(AdvancedContent.options.debug) {
				alert(\'faded in background\');
			}
			
			AdvancedContent.tmp.template[\'#AdvancedContent\'].css(\'display\',\'block\').fadeTo(AdvancedContent.options.fadeSpeed, 1, function() {
				AdvancedContent.tmp.template[\'#AdvancedContent_loading_img\'].css(\'display\',\'block\');
					
				if(AdvancedContent.options.debug) {
					alert(\'loading from server\');
				}
				
				// var url = this.getBlockUrl + blockparams ???;
				/*
				jQuery.get(url + \'&\' + AdvancedContent.options.moduleId + \'showtemplate=false&\'  + AdvancedContent.options.moduleId + \'disable_theme=1&\' + AdvancedContent.options.moduleId + \'ajax=1\', function(data) {
					
					if(AdvancedContent.options.debug) {
						alert(\'content loaded\');
					}
					
					AdvancedContent.tmp.template[\'#AdvancedContent\'].css(\'height\',AdvancedContent.tmp.template[\'#AdvancedContent\'].height() + \'px\');
					AdvancedContent.tmp.template[\'#AdvancedContent_content\'].html(data);
					
					if(AdvancedContent.options.debug) {
						alert(\'replaced content with loaded data\');
					}
					
					AdvancedContent.tmp.template[\'#AdvancedContent_header\']   = jQuery("#AdvancedContent_header");
					AdvancedContent.ajaxForm();
					AdvancedContent.tmp.template[\'#AdvancedContent_filelist\'] = jQuery("#AdvancedContent_filelist");
					if(typeof AdvancedContent.tmp.template[\'#AdvancedContent_filelist\'].attr(\'id\') != \'undefined\') {
						AdvancedContent.tmp.template[\'#AdvancedContent_fileoperations\']        = jQuery(\'#AdvancedContent_fileoperations\');
						AdvancedContent.tmp.template[\'#AdvancedContent_toggle_fileoperations\'] = jQuery(\'#AdvancedContent_toggle_fileoperations\');
						AdvancedContent.tmp.template[\'#AdvancedContent_filelist\'].css(\'max-height\',\'\').css(\'opacity\',1);;
						
						if(AdvancedContent.options.debug) {
							alert(\'set max-height to "" + faded in filelist\');
						}
					}
					
					if(jQuery(\'#AdvancedContent_content img\').length) {
						AdvancedContent.tmp.template[\'#AdvancedContent_content\'].onImagesLoad({
							selectorCallback: function (elm) {
								
								if(AdvancedContent.options.debug) {
									alert(\'images loaded; AdvancedContent.tmp.height:\' + AdvancedContent.tmp.height);
								}
								
								AdvancedContent.getHeight();
								if(typeof AdvancedContent.tmp.template[\'#AdvancedContent_filelist\'].attr(\'id\') != \'undefined\') {
									AdvancedContent.tmp.template[\'#AdvancedContent_filelist\'].css(\'max-height\', AdvancedContent.tmp.fileListHeight + \'px\');
									
									if(AdvancedContent.options.debug) {
										alert(\'set max-height to \' + AdvancedContent.tmp.fileListHeight + \'; AdvancedContent.tmp.height:\' + AdvancedContent.tmp.height);
									}
								}
								if(AdvancedContent.ieVersion() < 8) {
									AdvancedContent.tmp.template[\'#AdvancedContent\'].css(\'height\',\'auto\');
								}
								AdvancedContent.tmp.template[\'#AdvancedContent\'].animate({height: AdvancedContent.tmp.height + (AdvancedContent.tmp.height != \'auto\' ? \'px\' : \'\')}, AdvancedContent.options.animateSpeed , \'swing\', function() {
									
									if(AdvancedContent.options.debug) {
										alert(\'animated height; AdvancedContent.tmp.height:\' + AdvancedContent.tmp.height);
									}
									
									AdvancedContent.tmp.template[\'#AdvancedContent_content\'].fadeTo(AdvancedContent.options.fadeSpeed, 1, function() {
										AdvancedContent.tmp.template[\'#AdvancedContent_loading_img\'].css(\'display\',\'none\');
										
										if(AdvancedContent.options.debug) {
											alert(\'faded in content\');
										}
										
									});
								});
							}
						});
					}
					else {
						AdvancedContent.getHeight();
						if(typeof AdvancedContent.tmp.template[\'#AdvancedContent_filelist\'].attr(\'id\') != \'undefined\') {
							AdvancedContent.tmp.template[\'#AdvancedContent_filelist\'].css(\'max-height\', AdvancedContent.tmp.fileListHeight + \'px\');
							
							if(AdvancedContent.options.debug) {
								alert(\'set max-height to \' + AdvancedContent.tmp.fileListHeight);
							}
						}
						if(AdvancedContent.ieVersion() < 8) {
							AdvancedContent.tmp.template[\'#AdvancedContent\'].css(\'height\',\'auto\');
						}
						AdvancedContent.tmp.template[\'#AdvancedContent\'].animate({height: AdvancedContent.tmp.height + (AdvancedContent.tmp.height != \'auto\' ? \'px\' : \'\')}, AdvancedContent.options.animateSpeed , \'swing\', function() {
							
							if(AdvancedContent.options.debug) {
								alert(\'animated height\');
							}
							
							AdvancedContent.tmp.template[\'#AdvancedContent_content\'].fadeTo(AdvancedContent.options.fadeSpeed, 1, function() {
								AdvancedContent.tmp.template[\'#AdvancedContent_loading_img\'].css(\'display\',\'none\');
								
								if(AdvancedContent.options.debug) {
									alert(\'faded in content\');
								}
								
							});
						});
					}
				});
				*/
			});
		});
	},
	getPanel: function(multiContentId) {
		
		var blockId = (arguments[1] ? arguments[1] : \'block_\' + this.multiContents[multiContentId].content_blocks_count);
		
		if(document.getElementById(\'AdvancedContent_content\') == null) {
			
			jQuery(\'body\').append(\'<div id="AdvancedContent_wrapper"><div id="AdvancedContent_background" onclick="AdvancedContent.cancel(AdvancedContent.getCurrentBlockId())"></div><div id="AdvancedContent"><div id="AdvancedContent_titlebar"><span id="AdvancedContent_loading_img_wrapper"><img id="AdvancedContent_loading_img" alt="" src="../modules/AdvancedContent/images/loading.gif" /></span><h3 id="AdvancedContent_title">\' + AdvancedContent.options.title + \'</h3><div id="AdvancedContent_menu"><a id="AdvancedContent_apply" title="\' + AdvancedContent.options.applyText + \'" href="#" onclick="AdvancedContent.apply(AdvancedContent.getCurrentBlockId());return false;">\'+ AdvancedContent.options.applyText +\'</a><a id="AdvancedContent_cancel" title="\' + AdvancedContent.options.cancelText + \'" href="#" onclick="AdvancedContent.close(AdvancedContent.getCurrentBlockId());return false;">\' + AdvancedContent.options.cancelText + \'</a><div class="clearb"></div></div><div class="clearb"></div></div><div id="AdvancedContent_content">\'+this.displayContentBlock(multiContentId,blockId)+\'</div></div></div>\');
			
			if(this.options.debug) {
				alert(\'appended wrapper to body\');
			}
			
			this.tmp.template[\'#AdvancedContent_wrapper\']    = jQuery(\'#AdvancedContent_wrapper\');
			this.tmp.template[\'#AdvancedContent\']            = jQuery("#AdvancedContent");
			this.tmp.template[\'#AdvancedContent_content\']    = jQuery("#AdvancedContent_content");
			this.tmp.template[\'#AdvancedContent_titlebar\']   = jQuery("#AdvancedContent_titlebar");
			this.tmp.template[\'#AdvancedContent_background\'] = jQuery(\'#AdvancedContent_background\');
		}
		
		this.tmp.template[\'#AdvancedContent_loading_img\'] = jQuery("#AdvancedContent_loading_img");
		/*
		jQuery(window).resize(function() {
			this.resize();
		});
		*/
		this.tmp.template[\'#AdvancedContent_wrapper\'].css(\'display\',\'block\').css(\'z-index\',9999).css(\'opacity\',1);
		if(this.options.draggable) {
			this.tmp.template[\'#AdvancedContent\'].draggable({handle: \'#AdvancedContent_titlebar\', containment: "parent", cursor: "move", axis:this.options.dragAxis});
		}
		if(this.options.resizable) {
			this.tmp.template[\'#AdvancedContent\'].resizable({handles: this.options.resizableHandles});
		}
		return;
	},
	ieVersion: function() {
		var version = 999;
		if (navigator.appVersion.indexOf("MSIE") != -1) {
			version = parseFloat(navigator.appVersion.split("MSIE")[1]);
		}
		return version;
	}
};
//]]>
</script>
'; ?>
