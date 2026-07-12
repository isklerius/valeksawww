{assign var=kiekkalbu value=$nodelist|@count}
{foreach from=$nodelist item=node name=langu}
  {if $node->depth==1}
<li class=" {if ($node->current == true) || ($node->parent) }active {assign var=kalba value=$node->alias}{/if}{if $smarty.foreach.langu.last}last{/if} {if $smarty.foreach.langu.first}first{/if}"><a href="{$node->url}">{$node->alias|upper}</a></li>
{/if}
{/foreach}