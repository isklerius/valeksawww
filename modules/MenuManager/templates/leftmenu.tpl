
{if $nodelist|@count > 0}
<ul class="leftmenu">
{foreach from=$nodelist item=node name=top}
  {if $node->depth>=1} 
  {if $node->prevdepth==2 && $node->depth==1}</ul></li>{/if}
  <li class="{if ($node->current || $node->parent) } active{/if}"> <a href="{$node->url}">{$node->menutext}<span class="leftmenubl"><!-- --></a></li>
  {/if}
{/foreach}
</ul>
{if $node->depth==2}
</ul></li>{/if}
{/if}
			