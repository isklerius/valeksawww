{* Include JS files. You can move this to the head of your page template if you want *}
<!--Greybox-->
<script type="text/javascript">
    var GB_ROOT_DIR = "modules/Album/templates/db/greybox/";
</script>

<script type="text/javascript" src="modules/Album/templates/db/greybox/AJS.js"></script>
<script type="text/javascript" src="modules/Album/templates/db/greybox/AJS_fx.js"></script>
<script type="text/javascript" src="modules/Album/templates/db/greybox/gb_scripts.js"></script>


{if $pictureid !=0}

{* Big Picture *}
<div style="text-align:center">
<p class="bigpicturecaption"><strong>{$picture->name}</strong><br />
{$picture->comment}<br />
<span class="bigpicturenav">
{if $link.picture.previous}<a href="{$link.picture.previous}" title="Previous picture">&lt; Previous</a>{/if}
 <span class= "albumpicturecount">( Picture {$picturenumber}/{$picturecount} )</span> 
{if $link.picture.next}<a href="{$link.picture.next}" title="Next picture">Next &gt;</a></span>{/if}
</p>
<img src="{$picture->picture}" alt="{$picture->name|escape:'html'} - {$picture->comment|escape:'html'}"  title="{$picture->name|escape:'html'}  - {$picture->comment|escape:'html'}" />
</div>
{/if}

{* Album List *}
{if !$album}
<ul class="albumlist">
	{foreach from=$albums item=album}
	<li class="thumb">
 	<a href="{$album->link}">
<img src="{$album->thumbnail}" alt="{$album->name|escape:'html'}" title="{$album->name|escape:'html'} - {$album->comment|escape:'html'}"{$album->autothumbnailsize} /></a>

<p class="albumname"><a href="{$album->link}">{$album->name}</a><br />
<span class="albumpicturecount">({$album->picturecount} images)</span><br />
{if !empty($album->comment)}<span class="albumcomment">{$album->comment}</span>{/if}</p>
</li>
	{/foreach}
</ul>

{else}

{* Photo List *}
<p><strong>{$album->name}</strong><br />
{$album->comment}<br />
<span class="instructiontext">Click on a thumbnail to view a larger image. Click on the close button to close it. {if $returnlink}<a href="{$returnlink}">Return to the album index page</a>{/if}</span></p>

	{if $pagecount>1}
	<p class="albumnav">
		<a href="{$link.page.first}" title="first page">&lt;&lt;&nbsp;</a>
		{if $link.page.previous}<a href="{$link.page.previous}" title="previous page">&lt;&nbsp;</a>{/if}
		page {$pagenumber}/{$pagecount}
		{if $link.page.next}<a href="{$link.page.next}" title="next page">&nbsp;&gt;</a>{/if}
		<a href="{$link.page.last}" title="last page">&nbsp;&gt;&gt;</a>
	</p>
	{/if}

<ul class="picturelist">
	{foreach from=$pictures item=picturesrow}
	    {foreach from=$picturesrow item=onepicture}
	    <li class="thumb"><a href="{$onepicture->picture}" rel="gb_imageset[{$album->name|escape:'html'}]" title="{$onepicture->name|escape:'html'} {if ($onepicture->comment != "")}- {$onepicture->comment|escape:'html'}{/if}"> <img src="{$onepicture->thumbnail}" alt="{$onepicture->name|escape:'html'} {if ($onepicture->comment != "")}- {$onepicture->comment|escape:'html'}{/if}" title="{$onepicture->name|escape:'html'} {if ($onepicture->comment != "")}- {$onepicture->comment|escape:'html'}{/if}"{$onepicture->autothumbnailsize} /></a>
   	   </li>

      {if ($onepicture->number==$picturenumber and !$picture)}{assign var=picture value=$onepicture}{/if}
	    {/foreach}
	{/foreach}
</ul>

{if $picturecount==0}No image{/if}
{/if}

{if $picture->id>0}
{/if}
<div style="clear:both"></div> 