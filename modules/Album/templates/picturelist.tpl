<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>
{if $itemcount > 0}
	{foreach from=$items item=entry}
	<table style="display:inline; float:left;">
		<tr style="height : 100px;">
			<td style="width:100px;border:1px white solid;text-align:center;" colspan="3">{$entry->thumblink}</td>
		</tr>
		<tr>
			<td style="width:20px;text-align:left">{$entry->uplink}</td>
			<td style="width:60px;text-align:center">{$entry->name|truncate:12:"..."} <br /> {$entry->changecommentlink} {$entry->changepicturelink} {$entry->changethumblink} <br /> {$entry->deletelink}</td>
			<td style="width:20px;text-align:right">{$entry->downlink}</td>
		</tr>
	</table>
	{/foreach}
<div style="clear:both"></div>
{else}
<h4>{$nopicturetext}</h4>
{/if}

<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>
