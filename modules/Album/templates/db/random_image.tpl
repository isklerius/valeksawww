{* Include JS files. You can move this to the head of your page template if you want *}
<!--Greybox-->
<script type="text/javascript">
    var GB_ROOT_DIR = "modules/Album/templates/db/greybox/";
</script>

<script type="text/javascript" src="modules/Album/templates/db/greybox/AJS.js"></script>
<script type="text/javascript" src="modules/Album/templates/db/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="modules/Album/templates/db/greybox/gb_scripts.js"></script>




<ul class="picturelist">
	{foreach from=$pictures item=onepicture}
	    <li class="thumb"><a href="{$onepicture->picture}" rel="gb_imageset[random]" title="{$onepicture->name|escape:'html'} {if ($onepicture->comment != "")}- {$onepicture->comment|escape:'html'}{/if}"> <img src="{$onepicture->thumbnail}" alt="{$onepicture->name|escape:'html'} {if ($onepicture->comment != "")}- {$onepicture->comment|escape:'html'}{/if}" title="{$onepicture->name|escape:'html'} {if ($onepicture->comment != "")}- {$onepicture->comment|escape:'html'}{/if}"{$onepicture->autothumbnailsize} /></a>
   	   </li>
	{/foreach}
</ul>

<div style="clear:both"></div>