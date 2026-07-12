	<div class="blocks">
{section name=skc loop=$irasai}		
{if $smarty.section.skc.index<=3}		
				<div class="block {if $smarty.section.skc.index==3}last{/if}" {if $smarty.section.skc.index>3}style="display:none"{/if}">
						<div class="top">
							<h2>{$irasai[skc].antraste}</h2>
							{if $irasai[skc].paveiksliukas}
								<div class="foto">
									<div class="ft">
										<img src="{root_url}/uploads/images/titulinis/{$irasai[skc].paveiksliukas}"/>
									</div>
								</div>
							{/if}
						</div>
						{if $irasai[skc].tekstas}
							{$irasai[skc].tekstas}
						{/if}
						{if $irasai[skc].nuoroda}<a href="{$irasai[skc].nuoroda}">{#placiau#}</a>{/if}
					</div>
{/if}
{/section}
</div>