<ul class="picturelist">
	{foreach from=$pictures item=onepicture}
   		<li class="thumb"><a href="{$onepicture->link}" title="{$onepicture->name|escape:'html'}"> <img src="{$onepicture->thumbnail}" alt="{$onepicture->name|escape:'html'}" title="{$onepicture->name|escape:'html'}"{$onepicture->autothumbnailsize} /></a>
		</li>
	{/foreach}
</ul>
<div style="clear:both"></div>