{if $itemcount > 0}

<table cellspacing="0" class="pagetable">
	<thead>
		<tr>
			<th>{$categorynametext}</th>
			<th style="text-align:center">{$categoryidtext}</th>
			<th class="pagepos">{$categoryreordertext}</th>
			<th class="pageicon">&nbsp;</th>
			<th class="pageicon">{$categoryactionstext}</th>
		</tr>
	</thead>
	<tbody>
	{foreach from=$items item=entry}
	{cycle values="row1,row2" assign=rowclass}
		<tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
			<td>{$entry->name}</td>
			<td style="text-align:center">{$entry->id}</td>
			<td style="text-align:center">{$entry->uplink}{$entry->downlink}</td>
			<td>&nbsp;</td>
			<td>{$entry->deletelink}</td>
		</tr>
	{/foreach}
	</tbody>
</table>
{else}
<h4>{$nocategoriestext}</h4>
{/if}

<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>
