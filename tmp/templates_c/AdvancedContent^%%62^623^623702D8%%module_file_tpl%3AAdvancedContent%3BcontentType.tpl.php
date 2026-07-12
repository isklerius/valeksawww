<?php /* Smarty version 2.6.25, created on 2018-03-12 13:18:32
         compiled from module_file_tpl:AdvancedContent%3BcontentType.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'count', 'module_file_tpl:AdvancedContent;contentType.tpl', 16, false),)), $this); ?>

<!-- START PAGE_TAB <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->

<?php if (count($this->_tpl_vars['page_tabs'][$this->_tpl_vars['page_tab_id']]['block_tabs']) > 0): ?>

<!-- start block_tabs in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<!-- start block_tabs tabheaders in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<div id="page_tabs">
	<div id="block_tabs_<?php echo $this->_tpl_vars['page_tab_nr']; ?>
" class="SubTabWrapper">
		
	<?php $_from = $this->_tpl_vars['page_tabs'][$this->_tpl_vars['page_tab_id']]['block_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['current_tab'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['current_tab']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block_tab_id']):
        $this->_foreach['current_tab']['iteration']++;
?>
		
		<div id="editab<?php echo $this->_tpl_vars['page_tab_nr']; ?>
_<?php echo $this->_tpl_vars['block_tab_id']; ?>
" <?php if (($this->_foreach['current_tab']['iteration'] <= 1)): ?>class="active"<?php endif; ?> onclick="AdvancedContent.toggleBlock(this.id, 'block_tabs_<?php echo $this->_tpl_vars['page_tab_nr']; ?>
')">
			
			<?php echo $this->_tpl_vars['block_tabs'][$this->_tpl_vars['block_tab_id']]['tab_name']; ?>

			
		</div>
		
	<?php endforeach; endif; unset($_from); ?>
		
	</div>
</div>
<!-- end block_tabs tabheaders in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<!-- start block_tabs tabcontent in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<div id="page_content" style="padding-bottom:0;margin-bottom:20px;">
	
	<?php $_from = $this->_tpl_vars['page_tabs'][$this->_tpl_vars['page_tab_id']]['block_tabs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['current_tab'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['current_tab']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['block_tab_id']):
        $this->_foreach['current_tab']['iteration']++;
?>
	
	<!-- start block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
	<div id="editab<?php echo $this->_tpl_vars['page_tab_nr']; ?>
_<?php echo $this->_tpl_vars['block_tab_id']; ?>
_c"<?php if (($this->_foreach['current_tab']['iteration'] <= 1)): ?> style="display:block"<?php else: ?> style="display:none"<?php endif; ?>>
		
		<?php if (count($this->_tpl_vars['block_tabs'][$this->_tpl_vars['block_tab_id']]['block_groups']) > 0): ?>
		<!-- start block_groups in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
			<?php $_from = $this->_tpl_vars['block_tabs'][$this->_tpl_vars['block_tab_id']]['block_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block_group_id']):
?>
		
		<!-- start block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		<div class="pageoverflow">
			<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
				<legend class="AdvancedContent_BlockGroup">
					<?php echo $this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['group_name']; ?>
:
				</legend>
				<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#<?php echo $this->_tpl_vars['block_group_id']; ?>
_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('<?php echo $this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['pref_url']; ?>
&<?php echo $this->_tpl_vars['module_id']; ?>
item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="<?php if ($this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['display'] == 0): ?>notifications-show<?php else: ?>notifications-hide<?php endif; ?>" id="toggle-<?php echo $this->_tpl_vars['block_group_id']; ?>
"></div>
				<!-- start blocks in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
				<div id="<?php echo $this->_tpl_vars['block_group_id']; ?>
_wrapper" class="<?php if ($this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['display'] == 0): ?>invisible<?php else: ?>visible<?php endif; ?>">
					
				<?php $_from = $this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['content_blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content_block_id']):
?>
					
					<!-- start block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
					<div class="pageoverflow">
						<div class="pageoverflow">
							<strong><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['label']; ?>
:</strong>
						</div>
						
						<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']): ?>
						
						<div class="pageoverflow">
							
							<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']; ?>

							
						</div>
						
						<?php endif; ?>
						
						<div style="padding: 5px 0 0 0;">
							
						<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['block_type'] != ''): ?>
							
							<p><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['input']; ?>
</p>
							
						<?php else: ?>
							
							<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['content']; ?>

							
						<?php endif; ?>
							
						</div>
					</div>
					<!-- end block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
				
				<?php endforeach; endif; unset($_from); ?>
				
				</div>
				<!-- end blocks in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
			</fieldset>
		</div>
		<!-- end block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		
			<?php endforeach; endif; unset($_from); ?>
		<!-- end block_groups in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		<?php endif; ?>
		
		<?php if (count($this->_tpl_vars['block_tabs'][$this->_tpl_vars['block_tab_id']]['content_blocks']) > 0): ?>
		<!-- start blocks in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
			<?php $_from = $this->_tpl_vars['block_tabs'][$this->_tpl_vars['block_tab_id']]['content_blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content_block_id']):
?>
		
		<!-- start block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		<div class="pageoverflow">
			<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
				<legend class="AdvancedContent_ContentBlock"><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['label']; ?>
:</legend>
				
				<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['block_type'] && ! $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['no_collapse']): ?>
				
				<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#<?php echo $this->_tpl_vars['content_block_id']; ?>
_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['pref_url']; ?>
&<?php echo $this->_tpl_vars['module_id']; ?>
item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['display'] == 0): ?>notifications-show<?php else: ?>notifications-hide<?php endif; ?>" id="toggle-<?php echo $this->_tpl_vars['content_block_id']; ?>
"></div>
				
				<?php endif; ?>
				
				<div id="<?php echo $this->_tpl_vars['content_block_id']; ?>
_wrapper" class="<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['display'] == 0 && ! $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['no_collapse']): ?>invisible<?php else: ?>visible<?php endif; ?>">
					
				<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']): ?>
					
					<div class="pageoverflow">
						
					<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']; ?>

						
					</div>
					
				<?php endif; ?>
					
					<div style="padding: 5px 0 0 0;">
						
				<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['block_type'] != ''): ?>
						
						<p><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['input']; ?>
</p>
						
				<?php else: ?>
						
					<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['content']; ?>

						
				<?php endif; ?>
						
					</div>
				</div>
			</fieldset>
		</div>
		<!-- end block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		
			<?php endforeach; endif; unset($_from); ?>
		<!-- end blocks in block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		<?php endif; ?>
		
	</div>
	<!-- end block_tab <?php echo $this->_tpl_vars['block_tab_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
	
	<?php endforeach; endif; unset($_from); ?>
	
</div>
<!-- end block_tabs tabcontent in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<!-- end block_tabs in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->

<?php endif; ?>

<?php if (count($this->_tpl_vars['page_tabs'][$this->_tpl_vars['page_tab_id']]['block_groups']) > 0): ?>

<!-- start block_groups in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->

	<?php $_from = $this->_tpl_vars['page_tabs'][$this->_tpl_vars['page_tab_id']]['block_groups']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['block_group_id']):
?>
	
<!-- start block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<div class="pageoverflow">
	<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
		<legend class="AdvancedContent_BlockGroup">
			<?php echo $this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['group_name']; ?>
:
		</legend>
		<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#<?php echo $this->_tpl_vars['block_group_id']; ?>
_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('<?php echo $this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['pref_url']; ?>
&<?php echo $this->_tpl_vars['module_id']; ?>
item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="<?php if ($this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['display'] == 0): ?>notifications-show<?php else: ?>notifications-hide<?php endif; ?>" id="toggle-<?php echo $this->_tpl_vars['block_group_id']; ?>
"></div>
		<!-- start blocks in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		<div id="<?php echo $this->_tpl_vars['block_group_id']; ?>
_wrapper" class="<?php if ($this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['display'] == 0): ?>invisible<?php else: ?>visible<?php endif; ?>">
			
		<?php $_from = $this->_tpl_vars['block_groups'][$this->_tpl_vars['block_group_id']]['content_blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content_block_id']):
?>
			
			<!-- start block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
			<div class="pageoverflow">
				
				<div class="pageoverflow">
					<strong><?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['label'] != 'empty'): ?><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['label']; ?>
:<?php endif; ?></strong>
				</div>
				
			<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']): ?>
				
				<div class="pageoverflow">
					
				<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']; ?>

					
				</div>
				
				<?php endif; ?>
				
				<div style="padding: 5px 0 0 0;">
					
			<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['block_type'] != ''): ?>
					
					<p><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['input']; ?>
</p>
					
			<?php else: ?>
					
				<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['content']; ?>

					
			<?php endif; ?>
					
				</div>
					
			</div>
			<!-- end block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
		
		<?php endforeach; endif; unset($_from); ?>
		
		</div>
		<!-- end blocks in block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
	</fieldset>
</div>
<!-- end block_group <?php echo $this->_tpl_vars['block_group_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<?php endforeach; endif; unset($_from); ?>
<!-- end block_groups in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<?php endif; ?>


<?php if (count($this->_tpl_vars['page_tabs'][$this->_tpl_vars['page_tab_id']]['content_blocks']) > 0): ?>

<!-- start blocks in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->

	<?php $_from = $this->_tpl_vars['page_tabs'][$this->_tpl_vars['page_tab_id']]['content_blocks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['content_block_id']):
?>
	
<!-- start block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->
<div class="pageoverflow">
	<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
		<legend class="AdvancedContent_ContentBlock"><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['label']; ?>
:</legend>
		
		<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['block_type'] && ! $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['no_collapse']): ?>
		
		<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#<?php echo $this->_tpl_vars['content_block_id']; ?>
_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['pref_url']; ?>
&<?php echo $this->_tpl_vars['module_id']; ?>
item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['display'] == 0): ?>notifications-show<?php else: ?>notifications-hide<?php endif; ?>" id="toggle-<?php echo $this->_tpl_vars['content_block_id']; ?>
"></div>
		
		<?php endif; ?>
		
		<div id="<?php echo $this->_tpl_vars['content_block_id']; ?>
_wrapper" class="<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['display'] == 0 && ! $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['no_collapse']): ?>invisible<?php else: ?>visible<?php endif; ?>">
			
		<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']): ?>
			
			<div class="pageoverflow">
				
				<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['description']; ?>

				
			</div>
			
		<?php endif; ?>
			
			<div style="padding: 5px 0 0 0;">
				
		<?php if ($this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['block_type'] != ''): ?>
				
				<p><?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['input']; ?>
</p>
				
		<?php else: ?>
				
				<?php echo $this->_tpl_vars['content_blocks'][$this->_tpl_vars['content_block_id']]['content']; ?>

				
		<?php endif; ?>
				
			</div>
			
		</div>
	</fieldset>
</div>
<!-- end block <?php echo $this->_tpl_vars['content_block_id']; ?>
 in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->

	<?php endforeach; endif; unset($_from); ?>

<!-- start blocks in page_tab <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->

<?php endif; ?>

<!-- END PAGE_TAB <?php echo $this->_tpl_vars['page_tab_id']; ?>
 -->