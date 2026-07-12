{if !$album}
{if $returnlink}<br /><a href="{$returnlink}">Back</a>{/if}
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

{elseif $pictureid != 0}
<p><a href="{$albumbacklink}">Back to thumbnails</a></p>
<br />
<a href="{$link.picture.first}" title="first picture">&lt;&lt;&nbsp;</a>
{if $link.picture.previous}<a href="{$link.picture.previous}" title="previous picture">&lt;&nbsp;</a>{/if}
picture {$picturenumber}/{$picturecount}
{if $link.picture.next}<a href="{$link.picture.next}" title="next picture">&nbsp;&gt;</a>{/if}
<a href="{$link.picture.last}" title="last picture">&nbsp;&gt;&gt;</a>
<br />
<img src="{$picture->picture}" alt="{$picture->name|escape:'html'}" />
<h3>{$picture->name}</h3>
<div>{$picture->comment}</div>
{else}
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
			<a href="{$onepicture->link}"> <img src="{$onepicture->thumbnail}" alt="{$onepicture->thumbnail}" /> </a>
		</td>
		{if ($onepicture->number==$picturenumber and !$picture)}{assign var=picture value=$onepicture}{/if}
		{/foreach}
	</tr>
	{/foreach}
</table>

{if $picturecount==0}No image{/if}
{/if}