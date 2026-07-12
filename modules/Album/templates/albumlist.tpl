<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>

{section name=album loop=$categories}
	<h2>{$categories[album].category_name}</h2>
	{if empty($categories[album].albums)}
		<h4>{$noalbumstext}</h4>
	{else}
		<table cellspacing="0" class="pagetable">
		<thead>
			<tr>
				<th>{$albumnametext}</th>
				<th style="text-align:center">{$albumthumbtext}</th>
				<th style="text-align:center">{$albumidtext}</th>
				<th>{$albumnumpicturestext}</th>
				<th>{$albumtemplatetext}</th>
				<th class="pagepos">{$albumreordertext}</th>
				<th class="pageicon">&nbsp;</th>
				<th class="pageicon">{$albumactionstext}</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$categories[album].albums item=entry}
			{cycle values="row1,row2" assign=rowclass}
				<tr class="{$rowclass}" onmouseover="this.className='{$rowclass}hover';" onmouseout="this.className='{$rowclass}';">
					<td>{$entry->name}</td>
					<td style="text-align:center;height:100px">{$entry->thumb}</td>
					<td style="text-align:center">{$entry->id}</td>
					<td>{$entry->picturenumber} {$picturestext}</td>
					<td>{$entry->template}</td>
					<td style="text-align:center">{$entry->uplink}{$entry->downlink}</td>
					<td>&nbsp;</td>
					<td>{$entry->deletelink}</td>
				</tr>
			{/foreach}
		</tbody>
		</table>
	{/if}
{/section}

<div class="pageoptions">
	<p class="pageoptions">{$addlink}</p>
</div>
