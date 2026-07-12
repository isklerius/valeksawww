{*------------------------------------------------------------------------------

Module : AdvancedContent (c) 2010-2011 by Georg Busch (georg.busch@gmx.net)
         a content management tool for CMS Made Simple
         The projects homepage is http://dev.cmsmadesimple.org/projects/content2
         CMS Made Simple is (c) 2004-2011 by Ted Kulp (wishy@cmsmadesimple.org)
         The projects homepage is: http://www.cmsmadesimple.org
Version: 0.8
File   : contentType.tpl
License: GPL

------------------------------------------------------------------------------*}

<!-- START PAGE_TAB {$page_tab_id} -->

{if $page_tabs.$page_tab_id.block_tabs|@count > 0}

<!-- start block_tabs in page_tab {$page_tab_id} -->
<!-- start block_tabs tabheaders in page_tab {$page_tab_id} -->
<div id="page_tabs">
	<div id="block_tabs_{$page_tab_nr}" class="SubTabWrapper">
		
	{foreach from=$page_tabs.$page_tab_id.block_tabs item=block_tab_id name=current_tab}
		
		<div id="editab{$page_tab_nr}_{$block_tab_id}" {if $smarty.foreach.current_tab.first}class="active"{/if} onclick="AdvancedContent.toggleBlock(this.id, 'block_tabs_{$page_tab_nr}')">
			
			{$block_tabs.$block_tab_id.tab_name}
			
		</div>
		
	{/foreach}
		
	</div>
</div>
<!-- end block_tabs tabheaders in page_tab {$page_tab_id} -->
<!-- start block_tabs tabcontent in page_tab {$page_tab_id} -->
<div id="page_content" style="padding-bottom:0;margin-bottom:20px;">
	
	{foreach from=$page_tabs.$page_tab_id.block_tabs item=block_tab_id name=current_tab}
	
	<!-- start block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
	<div id="editab{$page_tab_nr}_{$block_tab_id}_c"{if $smarty.foreach.current_tab.first} style="display:block"{else} style="display:none"{/if}>
		
		{if $block_tabs.$block_tab_id.block_groups|@count > 0}
		<!-- start block_groups in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
			{foreach from=$block_tabs.$block_tab_id.block_groups item=block_group_id}
		
		<!-- start block_group {$block_group_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
		<div class="pageoverflow">
			<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
				<legend class="AdvancedContent_BlockGroup">
					{$block_groups.$block_group_id.group_name}:
				</legend>
				<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#{$block_group_id}_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('{$block_groups.$block_group_id.pref_url}&{$module_id}item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="{if $block_groups.$block_group_id.display == 0}notifications-show{else}notifications-hide{/if}" id="toggle-{$block_group_id}"></div>
				<!-- start blocks in block_group {$block_group_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
				<div id="{$block_group_id}_wrapper" class="{if $block_groups.$block_group_id.display == 0}invisible{else}visible{/if}">
					
				{foreach from=$block_groups.$block_group_id.content_blocks item=content_block_id}
					
					<!-- start block {$content_block_id} in block_group {$block_group_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
					<div class="pageoverflow">
						<div class="pageoverflow">
							<strong>{$content_blocks.$content_block_id.label}:</strong>
						</div>
						
						{if $content_blocks.$content_block_id.description}
						
						<div class="pageoverflow">
							
							{$content_blocks.$content_block_id.description}
							
						</div>
						
						{/if}
						
						<div style="padding: 5px 0 0 0;">
							
						{if $content_blocks.$content_block_id.block_type != ''}
							
							<p>{$content_blocks.$content_block_id.input}</p>
							
						{else}
							
							{$content_blocks.$content_block_id.content}
							
						{/if}
							
						</div>
					</div>
					<!-- end block {$content_block_id} in block_group {$block_group_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
				
				{/foreach}
				
				</div>
				<!-- end blocks in block_group {$block_group_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
			</fieldset>
		</div>
		<!-- end block_group {$block_group_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
		
			{/foreach}
		<!-- end block_groups in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
		{/if}
		
		{if $block_tabs.$block_tab_id.content_blocks|@count > 0}
		<!-- start blocks in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
			{foreach from=$block_tabs.$block_tab_id.content_blocks item=content_block_id}
		
		<!-- start block {$content_block_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
		<div class="pageoverflow">
			<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
				<legend class="AdvancedContent_ContentBlock">{$content_blocks.$content_block_id.label}:</legend>
				
				{if $content_blocks.$content_block_id.block_type && !$content_blocks.$content_block_id.no_collapse}
				
				<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#{$content_block_id}_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('{$content_blocks.$content_block_id.pref_url}&{$module_id}item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="{if $content_blocks.$content_block_id.display == 0}notifications-show{else}notifications-hide{/if}" id="toggle-{$content_block_id}"></div>
				
				{/if}
				
				<div id="{$content_block_id}_wrapper" class="{if $content_blocks.$content_block_id.display == 0 && !$content_blocks.$content_block_id.no_collapse}invisible{else}visible{/if}">
					
				{if $content_blocks.$content_block_id.description}
					
					<div class="pageoverflow">
						
					{$content_blocks.$content_block_id.description}
						
					</div>
					
				{/if}
					
					<div style="padding: 5px 0 0 0;">
						
				{if $content_blocks.$content_block_id.block_type != ''}
						
						<p>{$content_blocks.$content_block_id.input}</p>
						
				{else}
						
					{$content_blocks.$content_block_id.content}
						
				{/if}
						
					</div>
				</div>
			</fieldset>
		</div>
		<!-- end block {$content_block_id} in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
		
			{/foreach}
		<!-- end blocks in block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
		{/if}
		
	</div>
	<!-- end block_tab {$block_tab_id} in page_tab {$page_tab_id} -->
	
	{/foreach}
	
</div>
<!-- end block_tabs tabcontent in page_tab {$page_tab_id} -->
<!-- end block_tabs in page_tab {$page_tab_id} -->

{/if}

{if $page_tabs.$page_tab_id.block_groups|@count > 0}

<!-- start block_groups in page_tab {$page_tab_id} -->

	{foreach from=$page_tabs.$page_tab_id.block_groups item=block_group_id}
	
<!-- start block_group {$block_group_id} in page_tab {$page_tab_id} -->
<div class="pageoverflow">
	<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
		<legend class="AdvancedContent_BlockGroup">
			{$block_groups.$block_group_id.group_name}:
		</legend>
		<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#{$block_group_id}_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('{$block_groups.$block_group_id.pref_url}&{$module_id}item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="{if $block_groups.$block_group_id.display == 0}notifications-show{else}notifications-hide{/if}" id="toggle-{$block_group_id}"></div>
		<!-- start blocks in block_group {$block_group_id} in page_tab {$page_tab_id} -->
		<div id="{$block_group_id}_wrapper" class="{if $block_groups.$block_group_id.display == 0}invisible{else}visible{/if}">
			
		{foreach from=$block_groups.$block_group_id.content_blocks item=content_block_id}
			
			<!-- start block {$content_block_id} in block_group {$block_group_id} in page_tab {$page_tab_id} -->
			<div class="pageoverflow">
				
				<div class="pageoverflow">
					<strong>{if $content_blocks.$content_block_id.label!='empty'}{$content_blocks.$content_block_id.label}:{/if}</strong>
				</div>
				
			{if $content_blocks.$content_block_id.description}
				
				<div class="pageoverflow">
					
				{$content_blocks.$content_block_id.description}
					
				</div>
				
				{/if}
				
				<div style="padding: 5px 0 0 0;">
					
			{if $content_blocks.$content_block_id.block_type != ''}
					
					<p>{$content_blocks.$content_block_id.input}</p>
					
			{else}
					
				{$content_blocks.$content_block_id.content}
					
			{/if}
					
				</div>
					
			</div>
			<!-- end block {$content_block_id} in block_group {$block_group_id} in page_tab {$page_tab_id} -->
		
		{/foreach}
		
		</div>
		<!-- end blocks in block_group {$block_group_id} in page_tab {$page_tab_id} -->
	</fieldset>
</div>
<!-- end block_group {$block_group_id} in page_tab {$page_tab_id} -->
{/foreach}
<!-- end block_groups in page_tab {$page_tab_id} -->
{/if}


{if $page_tabs.$page_tab_id.content_blocks|@count > 0}

<!-- start blocks in page_tab {$page_tab_id} -->

	{foreach from=$page_tabs.$page_tab_id.content_blocks item=content_block_id}
	
<!-- start block {$content_block_id} in page_tab {$page_tab_id} -->
<div class="pageoverflow">
	<fieldset style="margin:5px 3% 15px 0;position:relative;padding-right: 30px;">
		<legend class="AdvancedContent_ContentBlock">{$content_blocks.$content_block_id.label}:</legend>
		
		{if $content_blocks.$content_block_id.block_type && !$content_blocks.$content_block_id.no_collapse}
		
		<div style="float:right;margin:-23px -23px 0 0;position:relative" onclick="jQuery('#{$content_block_id}_wrapper').toggle('fast'); this.className = (this.className == 'notifications-hide' ? 'notifications-show' : 'notifications-hide'); jQuery.get('{$content_blocks.$content_block_id.pref_url}&{$module_id}item_display='+(this.className == 'notifications-hide' ? 1 : 0));" class="{if $content_blocks.$content_block_id.display == 0}notifications-show{else}notifications-hide{/if}" id="toggle-{$content_block_id}"></div>
		
		{/if}
		
		<div id="{$content_block_id}_wrapper" class="{if $content_blocks.$content_block_id.display == 0 && !$content_blocks.$content_block_id.no_collapse}invisible{else}visible{/if}">
			
		{if $content_blocks.$content_block_id.description}
			
			<div class="pageoverflow">
				
				{$content_blocks.$content_block_id.description}
				
			</div>
			
		{/if}
			
			<div style="padding: 5px 0 0 0;">
				
		{if $content_blocks.$content_block_id.block_type != ''}
				
				<p>{$content_blocks.$content_block_id.input}</p>
				
		{else}
				
				{$content_blocks.$content_block_id.content}
				
		{/if}
				
			</div>
			
		</div>
	</fieldset>
</div>
<!-- end block {$content_block_id} in page_tab {$page_tab_id} -->

	{/foreach}

<!-- start blocks in page_tab {$page_tab_id} -->

{/if}

<!-- END PAGE_TAB {$page_tab_id} -->
