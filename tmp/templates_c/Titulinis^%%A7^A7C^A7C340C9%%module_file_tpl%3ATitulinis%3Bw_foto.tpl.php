<?php /* Smarty version 2.6.25, created on 2017-04-15 20:09:49
         compiled from module_file_tpl:Titulinis%3Bw_foto.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'root_url', 'module_file_tpl:Titulinis;w_foto.tpl', 1, false),)), $this); ?>
<?php $this->_cache_serials['/home/valeksa/public_html/tmp/templates_c/Titulinis^%%A7^A7C^A7C340C9%%module_file_tpl%3ATitulinis%3Bw_foto.tpl.inc'] = '7e5f6e5b5cc87dbfb6fb46f0a373c072'; ?><script type="text/javascript" src="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:7e5f6e5b5cc87dbfb6fb46f0a373c072#0}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('7e5f6e5b5cc87dbfb6fb46f0a373c072','0');echo smarty_function_root_url(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:7e5f6e5b5cc87dbfb6fb46f0a373c072#0}'; endif;?>
/js/jquery.cycle.all.min.js" ></script>
<?php echo '
<script>
$(document).ready(function()
{
	$(\'#cycle\').cycle({
		fx:     \'fade\', 
		speed:   1000, 
		timeout: 4000,
		before: onAfter	

	});
	
	function onAfter(curr,next,opts){
		var index = $(\'#cycle>DIV\').index(next);
		$(".navig li").removeClass(\'active\');
		$(".navig li:eq("+index+")").addClass(\'active\');
		
	}
		
	
	$(".navig li").click(function(e){
		$(".navig li").removeClass(\'active\');
		$(this).addClass(\'active\');
		index = parseInt($(this).attr("alt"));
		$(\'#cycle\').cycle(index);
		$(\'#cycle\').cycle(\'pause\');
		
	});
	
});
</script>
'; ?>

  	<div class="slider">
					<div id="cycle">
						<?php unset($this->_sections['skc']);
$this->_sections['skc']['name'] = 'skc';
$this->_sections['skc']['loop'] = is_array($_loop=$this->_tpl_vars['irasai']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['skc']['show'] = true;
$this->_sections['skc']['max'] = $this->_sections['skc']['loop'];
$this->_sections['skc']['step'] = 1;
$this->_sections['skc']['start'] = $this->_sections['skc']['step'] > 0 ? 0 : $this->_sections['skc']['loop']-1;
if ($this->_sections['skc']['show']) {
    $this->_sections['skc']['total'] = $this->_sections['skc']['loop'];
    if ($this->_sections['skc']['total'] == 0)
        $this->_sections['skc']['show'] = false;
} else
    $this->_sections['skc']['total'] = 0;
if ($this->_sections['skc']['show']):

            for ($this->_sections['skc']['index'] = $this->_sections['skc']['start'], $this->_sections['skc']['iteration'] = 1;
                 $this->_sections['skc']['iteration'] <= $this->_sections['skc']['total'];
                 $this->_sections['skc']['index'] += $this->_sections['skc']['step'], $this->_sections['skc']['iteration']++):
$this->_sections['skc']['rownum'] = $this->_sections['skc']['iteration'];
$this->_sections['skc']['index_prev'] = $this->_sections['skc']['index'] - $this->_sections['skc']['step'];
$this->_sections['skc']['index_next'] = $this->_sections['skc']['index'] + $this->_sections['skc']['step'];
$this->_sections['skc']['first']      = ($this->_sections['skc']['iteration'] == 1);
$this->_sections['skc']['last']       = ($this->_sections['skc']['iteration'] == $this->_sections['skc']['total']);
?>
							<div class="container">
								<?php if ($this->_tpl_vars['irasai'][$this->_sections['skc']['index']]['tekstas']): ?>
									<div class="sukis">
										<?php echo $this->_tpl_vars['irasai'][$this->_sections['skc']['index']]['tekstas']; ?>

									</div>
								<?php endif; ?>
								<img src="<?php if ($this->caching && !$this->_cache_including): echo '{nocache:7e5f6e5b5cc87dbfb6fb46f0a373c072#1}'; endif;$_cache_attrs =& $this->_smarty_cache_attrs('7e5f6e5b5cc87dbfb6fb46f0a373c072','1');echo smarty_function_root_url(array(), $this);if ($this->caching && !$this->_cache_including): echo '{/nocache:7e5f6e5b5cc87dbfb6fb46f0a373c072#1}'; endif;?>
/uploads/images/titulinis/<?php echo $this->_tpl_vars['irasai'][$this->_sections['skc']['index']]['paveiksliukas']; ?>
"/>
							</div>
						<?php endfor; endif; ?>
					</div>
					<div class="navig">
						<ul>
							<?php unset($this->_sections['skc1']);
$this->_sections['skc1']['name'] = 'skc1';
$this->_sections['skc1']['loop'] = is_array($_loop=$this->_tpl_vars['irasai']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['skc1']['show'] = true;
$this->_sections['skc1']['max'] = $this->_sections['skc1']['loop'];
$this->_sections['skc1']['step'] = 1;
$this->_sections['skc1']['start'] = $this->_sections['skc1']['step'] > 0 ? 0 : $this->_sections['skc1']['loop']-1;
if ($this->_sections['skc1']['show']) {
    $this->_sections['skc1']['total'] = $this->_sections['skc1']['loop'];
    if ($this->_sections['skc1']['total'] == 0)
        $this->_sections['skc1']['show'] = false;
} else
    $this->_sections['skc1']['total'] = 0;
if ($this->_sections['skc1']['show']):

            for ($this->_sections['skc1']['index'] = $this->_sections['skc1']['start'], $this->_sections['skc1']['iteration'] = 1;
                 $this->_sections['skc1']['iteration'] <= $this->_sections['skc1']['total'];
                 $this->_sections['skc1']['index'] += $this->_sections['skc1']['step'], $this->_sections['skc1']['iteration']++):
$this->_sections['skc1']['rownum'] = $this->_sections['skc1']['iteration'];
$this->_sections['skc1']['index_prev'] = $this->_sections['skc1']['index'] - $this->_sections['skc1']['step'];
$this->_sections['skc1']['index_next'] = $this->_sections['skc1']['index'] + $this->_sections['skc1']['step'];
$this->_sections['skc1']['first']      = ($this->_sections['skc1']['iteration'] == 1);
$this->_sections['skc1']['last']       = ($this->_sections['skc1']['iteration'] == $this->_sections['skc1']['total']);
?>
										<li alt="<?php echo $this->_sections['skc1']['index']; ?>
"><a href="javascript:void(0)"><!----></a></li>
							<?php endfor; endif; ?>
						</ul>
					</div>
				</div>
				
				
				