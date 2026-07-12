<script type="text/javascript" src="modules/Album/templates/db/js/popup-pic.js"></script>
{if $returnlink}<br /><a href="{$returnlink}" >Back</a>{/if} 
{if !$album} 
<div id="imagegallery"> 
    {foreach from=$albums item=album} 
    <div class="thumb"> 
    <a href="{$album->link}"><img src="{$album->thumbnail}" /></a> <br /> 
    {$album->name} <em>({$album->picturecount} images)</em><br /> 
    {$album->comment} 
    </div> 
    {/foreach} 
</div> 
 
{else} 
 
<div id="imagegallery"> 
    {if $pagecount>1} 
    <p> 
        <a href="{$link.page.first}" alt="first" title="first page">&lt;&lt;&nbsp;</a> 
        {if $link.page.previous}<a href="{$link.page.previous}" alt="previous" title="previous page">&lt;&nbsp;</a>{/if} 
        page {$pagenumber}/{$pagecount} 
        {if $link.page.next}<a href="{$link.page.next}" alt="next" title="next page">&nbsp;&gt;</a>{/if} 
        <a href="{$link.page.last}" alt="last" title="last page">&nbsp;&gt;&gt;</a> 
    </p> 
    {/if} 
    {foreach from=$pictures item=picturesrow} 
     
        {foreach from=$picturesrow item=onepicture} 
<div class="thumb">
        <a href="javascript:PopupPic('{$onepicture->picture}','{$onepicture->name|escape:'html'}','{$onepicture->width}','{$onepicture->height}')"> <img src="{$onepicture->thumbnail}" title="Click for a bigger
image..." alt="{$onepicture->name|escape:'html'}" /></a> 
         </div>
        {if ($onepicture->number==$picturenumber and !$picture)}{assign var=picture value=$onepicture}{/if} 
        {/foreach} 
     
    {/foreach} 
</div> 
 
{if $picturecount==0}No image{/if} 
{/if}
<div style="clear:both"></div>
