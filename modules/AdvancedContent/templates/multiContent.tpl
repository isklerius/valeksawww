{*------------------------------------------------------------------------------

Module : AdvancedContent (c) 2010-2011 by Georg Busch (georg.busch@gmx.net)
         a content management tool for CMS Made Simple
         The projects homepage is http://dev.cmsmadesimple.org/projects/content2
         CMS Made Simple is (c) 2004-2011 by Ted Kulp (wishy@cmsmadesimple.org)
         The projects homepage is: http://www.cmsmadesimple.org
Version: 0.8
File   : multiContent.tpl
License: GPL

------------------------------------------------------------------------------*}

{literal}
<script language="javascript" type="text/javascript">
//<![CDATA[
jQuery(document).ready(function(){AdvancedContent.registerMultiContent({{/literal}{foreach from=$block_info key="key" item="block_param" name="block_info"}{$key}:{if $block_param|is_array}[{foreach from="$block_param" item="param_item" name="param_array"}"{$param_item}"{if !$smarty.foreach.param_array.last},{/if}{/foreach}]{else}'{$block_param}'{/if}{if !$smarty.foreach.block_info.last},{/if}{/foreach}{literal}});});
//]]>
</script>
{/literal}
<div class="pageoverflow">
	{$add_content_block}
</div>

{if $block_info.content_blocks|@count > 0}

<!-- start multi content blocks -->

	{foreach from=$block_info.content_blocks item=block}
	
{literal}
<script language="javascript" type="text/javascript">
//<![CDATA[
jQuery(document).ready(function(){AdvancedContent.registerMultiContentBlock('{/literal}{$multicontent_id}{literal}',{{/literal}{foreach from=$block key="key" item="block_param" name="block_info"}{$key}:{if $block_param|is_array}[{foreach from="$block_param" item="param_item" name="param_array"}"{$param_item}"{if !$smarty.foreach.param_array.last},{/if}{/foreach}]{else}'{$block_param}'{/if}{if !$smarty.foreach.block_info.last},{/if}{/foreach}{literal}});});
//]]>
</script>
{/literal}

<!-- start block {$block.id} -->
<div class="pageoverflow">
	<div id="{$block.id}_wrapper"{if $block.sortable} class="sortable"{/if}>
		
		<div class="pageoverflow">
			<strong>{$block.label}:</strong><span style="float:right">{$remove_content_block}</span
		</div>
		
	{if $block.description}
		
		<div class="pageoverflow">
			
			{$block.description}
			
		</div>
		
	{/if}
		
		<div style="padding: 5px 0 0 0;">
			
			<p>{$block.input}</p>
			
		</div>
		
	</div>
</div>
<!-- end block {$block.id} -->

	{/foreach}

<!-- end multi content blocks -->

<div class="pageoverflow">
	{$add_content_block}
</div>

{/if}
