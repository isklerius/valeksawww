
{assign var=depth2 value=0}
{assign var=depth2now value=0}
{foreach from=$nodelist item=node name=top}
	{if $node->depth==2}
		{assign var=depth2 value=$depth2+1}
	{/if}
{/foreach}
{assign var='number_of_levels' value=10000}
{if isset($menuparams.number_of_levels)}
  {assign var='number_of_levels' value=$menuparams.number_of_levels}
{/if}

{if $count > 0}
{foreach from=$nodelist item=node name="top"}
  {if $node->depth>=2}
{if $node->depth > $node->prevdepth}
{repeat string="<ul>" times=$node->depth-$node->prevdepth}
{elseif $node->depth < $node->prevdepth}
{repeat string="</li></ul>" times=$node->prevdepth-$node->depth}
</li>
{elseif $node->index > 0}</li>
{/if}
{if ($node->depth==1 && $depth2now==$depth2-1) && ($node->current || $node->parent)}
	{assign var=lastact value=1}
{/if}
  <li class="{if $node->haschildren} child {/if}{if $node->depth==1 && $smarty.foreach.top.first} first {/if} {if ($node->depth==2 && $depth2now==$depth2-1) || $smarty.foreach.top.last} last {/if}{if ($node->current || $node->parent) } active ac{/if} {if $node->depth > $node->prevdepth}first{/if}"><a class="{$classes}" href="{$node->url}">{$node->menutext}</a>

 {if $node->depth==2}
{assign var=depth2now value=$depth2now+1}
{/if}
{/if}
{/foreach}
{repeat string="</li></ul>" times=$node->depth-1}</li>
{/if}
