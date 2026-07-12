<?php /* Smarty version 2.6.25, created on 2017-04-15 19:56:13
         compiled from module_db_tpl:Album%3Bdefault */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'root_url', 'module_db_tpl:Album;default', 1, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/Album^%%B9^B9B^B9B62FDB%%module_db_tpl%3AAlbum%3Bdefault.inc'] = '4990d3a90ba0069d2e9c685132cbce8d'; ?><script type="text/javascript" src="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:4990d3a90ba0069d2e9c685132cbce8d#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4990d3a90ba0069d2e9c685132cbce8d','0');echo smarty_function_root_url(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4990d3a90ba0069d2e9c685132cbce8d#0}'; endif;?>
/js/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:4990d3a90ba0069d2e9c685132cbce8d#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('4990d3a90ba0069d2e9c685132cbce8d','1');echo smarty_function_root_url(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:4990d3a90ba0069d2e9c685132cbce8d#1}'; endif;?>
/styles/jquery.fancybox-1.3.4.css" media="all" /> 
<script type="text/javascript"> 

<?php echo '
					$(document).ready(function(){

						  $("a[rel='; ?>
<?php echo $this->_tpl_vars['album']->id; ?>
<?php echo ']").fancybox();

					  });
'; ?>

</script> 
<div class="gallery">
<?php $this->assign('sk', 0); ?>
			<?php $_from = $this->_tpl_vars['pictures']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['picturesrow']):
?>
				<?php $_from = $this->_tpl_vars['picturesrow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['picname'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['picname']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['onepicture']):
        $this->_foreach['picname']['iteration']++;
?>
					<?php $this->assign('sk', $this->_tpl_vars['sk']+1); ?>
								<a <?php if ($this->_tpl_vars['sk'] > $this->_tpl_vars['album']->nsk): ?>style="display:none;"<?php endif; ?> class="itemfo" rel="<?php echo $this->_tpl_vars['album']->id; ?>
" href="<?php echo $this->_tpl_vars['onepicture']->picture; ?>
" onclick="return false" >
									<img id="item_image" name="item_image"  src="<?php echo $this->_tpl_vars['onepicture']->thumbnail; ?>
" alt="<?php echo $this->_tpl_vars['album']->name; ?>
" title="<?php echo $this->_tpl_vars['album']->name; ?>
" rel="<?php echo $this->_tpl_vars['album']->id; ?>
" />
								  <div class="clear"><!-- --></div> 
								</a>
			<?php endforeach; endif; unset($_from); ?>
		<?php endforeach; endif; unset($_from); ?>
</div>