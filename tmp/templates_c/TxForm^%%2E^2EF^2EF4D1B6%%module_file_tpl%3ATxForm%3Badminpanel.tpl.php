<?php /* Smarty version 2.6.25, created on 2018-03-12 13:15:26
         compiled from module_file_tpl:TxForm%3Badminpanel.tpl */ ?>
<?php echo $this->_tpl_vars['tabs_start']; ?>

   <?php echo $this->_tpl_vars['start_general_tab']; ?>

      <?php echo $this->_tpl_vars['welcome_text']; ?>

   <?php echo $this->_tpl_vars['tab_end']; ?>

   <?php echo $this->_tpl_vars['start_prefs_tab']; ?>

      <?php if ($this->_tpl_vars['start_prefs_tab'] != ''): ?>
      <?php echo $this->_tpl_vars['start_form']; ?>

      	<div class="pageoverflow">
      		<p class="pagetext"><?php echo $this->_tpl_vars['title_allow_add']; ?>
:</p>
      		<p class="pageinput"><?php echo $this->_tpl_vars['input_allow_add']; ?>
</p>
      	</div>
      	<div class="pageoverflow">
      		<p class="pagetext">&nbsp;</p>
      		<p class="pageinput"><?php echo $this->_tpl_vars['submit']; ?>
</p>
      	</div>
      <?php echo $this->_tpl_vars['end_form']; ?>

      <?php endif; ?>
   <?php echo $this->_tpl_vars['tab_end']; ?>

<?php echo $this->_tpl_vars['tabs_end']; ?>