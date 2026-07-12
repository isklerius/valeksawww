{foreach from=$items item=entry}
					<div class="infoblock">
						{if $entry->nuotrauka1}
						<div class="foto">
							<a href="{$entry->moreurl}"><img src="{$entry->file_location}/thumb2_{$entry->nuotrauka1}"/></a>
						</div>
						{/if}
						<div class="infcnt">
							<a href="{$entry->moreurl}">{$entry->postdate|cms_date_format:"%d-%m-%Y"}</a>
							{eval var=$entry->summary}
						</div>
						<div class="clear"></div>
					</div>
{/foreach}
