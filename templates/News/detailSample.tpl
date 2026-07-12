{* set a canonical variable that can be used in the head section if process_whole_template is false in the config.php *}
{if isset($entry->canonical)}
  {assign var='canonical' value=$entry->canonical}
{/if}

{if $entry->postdate}
	<div id="NewsPostDetailDate">
		{$entry->postdate|cms_date_format:"%d-%m-%Y"}
	</div>
{/if}
<h3 id="NewsPostDetailTitle">{$entry->title|cms_escape:htmlall}</h3>

<hr id="NewsPostDetailHorizRule" />

<div id="NewsPostDetailContent">
{if $entry->nuotrauka1}
	<img src="{$entry->file_location}/thumb_{$entry->nuotrauka1}"/>
{/if}
	{eval var=$entry->content}
	{if $entry->albumo_id}
	{cms_module module="album" albums=$entry->albumo_id}
	{/if}
</div>

{if $entry->extra}
	<div id="NewsPostDetailExtra">
		{$extra_label} {$entry->extra}
	</div>
{/if}
