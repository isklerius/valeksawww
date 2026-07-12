<script type="text/javascript" src="{root_url}/js/jquery.cycle.all.min.js" ></script>
{literal}
<script>
$(document).ready(function()
{
	$('#cycle').cycle({
		fx:     'fade', 
		speed:   1000, 
		timeout: 4000,
		before: onAfter	

	});
	
	function onAfter(curr,next,opts){
		var index = $('#cycle>DIV').index(next);
		$(".navig li").removeClass('active');
		$(".navig li:eq("+index+")").addClass('active');
		
	}
		
	
	$(".navig li").click(function(e){
		$(".navig li").removeClass('active');
		$(this).addClass('active');
		index = parseInt($(this).attr("alt"));
		$('#cycle').cycle(index);
		$('#cycle').cycle('pause');
		
	});
	
});
</script>
{/literal}
  	<div class="slider">
					<div id="cycle">
						{section name=skc loop=$irasai}
							<div class="container">
								{if $irasai[skc].tekstas}
									<div class="sukis">
										{$irasai[skc].tekstas}
									</div>
								{/if}
								<img src="{root_url}/uploads/images/titulinis/{$irasai[skc].paveiksliukas}"/>
							</div>
						{/section}
					</div>
					<div class="navig">
						<ul>
							{section name=skc1 loop=$irasai}
										<li alt="{$smarty.section.skc1.index}"><a href="javascript:void(0)"><!----></a></li>
							{/section}
						</ul>
					</div>
				</div>
				
				
				
