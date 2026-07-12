{foreach from=$items item=entry}
								
							<div class="news" style="padding-bottom:20px;">
							{if $entry->postdate}
										{$entry->postdate|cms_date_format:"%d-%m-%Y"}
								{/if}
								<div class="clear"></div>
								{if $entry->nuotrauka1}
							<div style="float:left;padding-right:10px;text-align:center;">
									<a href="{$entry->moreurl}"><img src="{$entry->file_location}/thumb_{$entry->nuotrauka1}"/></a>
							</div>
							{/if}
								
							<a href="{$entry->moreurl}" class="title" style="display:block;">{$entry->title}</a>
								{if $entry->summary}
										{$entry->summary}
								{/if}
								<a class="more" href="{$entry->moreurl}">{#placiau#}</a>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
{/foreach}
<!-- End News Display Template -->
	{if $pagecount > 1}
<div class="NewPage" style="float:left;">
		{if $prevurl}
			<a class="page_pirmyn" href="{$prevurl}">< Ankstesnis</a> 
		{else}
			<span class="page_pirmyn">< Ankstesnis</span> 
		{/if}
		{foreach from=$linkai item=link}
			<a class="page_nr {if $link.aktyvus}page_nr_a{/if}" href="{$link.nuoroda}">{$link.numeris}</a>
		{/foreach}
		{if $nexturl}
			<a class="page_atgal" href="{$nexturl}">Kitas ></a> 
		{else}
			<span class="page_atgal" >Kitas ></span> 
			
		{/if}
</div>
	{/if}
	
<div style="float:left;padding-left:10px;">
{if $itemcount>3 || $pagecount > 1}
	{if $number>3}
		{$suskleisti}
	{else}
		{$isskleisti}
	{/if}
{/if}
</div>

