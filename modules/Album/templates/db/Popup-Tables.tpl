{* This template lists thumbnails in a table and the full size versions are shown in a popup *}
<script type="text/javascript" src="modules/Album/templates/db/js/popup-pic.js"></script>
{if $returnlink}<p><a href="{$returnlink}">Back</a></p>{/if}
{if !$album}
<table>
	{foreach from=$albums item=album}
	<tr style="height:100px;vertical-align:middle">
		<td style="border:1px solid #ECECEC;width:100px;text-align:center">
			<a href="{$album->link}"><img src="{$album->thumbnail}" alt="{$album->name|escape:'html'}" /></a>
		</td>
		<td style="border:none;width:500px;text-align:left">
			{$album->name} <em>({$album->picturecount} images)</em><br />
			{$album->comment}
		</td>
	</tr>
	{/foreach}
</table>

{else}
{if $album->comment}<p>{$album->comment}</p>{/if}
<table>
	{if $pagecount>1}
	<caption style="text-align:center">
		<a href="{$link.page.first}" title="first page">&lt;&lt;&nbsp;</a>
		{if $link.page.previous}<a href="{$link.page.previous}" title="previous page">&lt;&nbsp;</a>{/if}
		page {$pagenumber}/{$pagecount}
		{if $link.page.next}<a href="{$link.page.next}" title="next page">&nbsp;&gt;</a>{/if}
		<a href="{$link.page.last}" title="last page">&nbsp;&gt;&gt;</a>
	</caption>
	{/if}
	{foreach from=$pictures item=picturesrow}
	<tr style="height:100px;vertical-align:middle">
		{foreach from=$picturesrow item=onepicture}
		<td style="border:1px solid #ECECEC;width:100px;text-align:center">
			<a href="javascript:PopupPic('{$onepicture->picture}','{$onepicture->name|replace:'\'':'\\\''}','{$onepicture->width}','{$onepicture->height}')"> <img src="{$onepicture->thumbnail}" title="Click for a bigger
image..." alt="{$onepicture->name|escape:'html'}" /></a>
		</td>
		{if ($onepicture->number==$picturenumber and !$picture)}{assign var=picture value=$onepicture}{/if}
		{/foreach}
	</tr>
	{/foreach}
</table>
{if $picturecount==0}No image{/if}
{/if}
