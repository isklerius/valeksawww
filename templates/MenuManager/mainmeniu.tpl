{foreach from=$nodelist item=node name=top}
  {if $node->depth>=2} 
  
  {if $node->prevdepth==3 && $node->depth==2}</tr></table></div></div></td>{/if}
  
  <td class="{if ($node->current || $node->parent) } active ac {/if} {if $smarty.foreach.top.last} last {/if} {if $smarty.foreach.top.index==1} first {/if} {if $node->haschildren} has {/if}"> 
 <div class="txt"> <a href="{$node->url}">{$node->menutext}</a>
  {if $node->haschildren}
  <div class="submenu">
  <table ><tr>
  

  {else} {if $node->depth==3}</td></tr>{else}
 
 </div> </td>{/if}
  {/if}
  
  {/if}
{/foreach} 