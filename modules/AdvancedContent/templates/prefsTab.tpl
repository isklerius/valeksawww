{*------------------------------------------------------------------------------

Module : AdvancedContent (c) 2010-2011 by Georg Busch (georg.busch@gmx.net)
         a content management tool for CMS Made Simple
         The projects homepage is http://dev.cmsmadesimple.org/projects/content2
         CMS Made Simple is (c) 2004-2011 by Ted Kulp (wishy@cmsmadesimple.org)
         The projects homepage is: http://www.cmsmadesimple.org
Version: 0.8
File   : prefsTab.tpl
License: GPL

------------------------------------------------------------------------------*}

<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$importcontent_input}<br /></p>
</div>
<div class="pageoverflow">
	<p class="pagetext">&nbsp;</p>
	<p class="pageinput">{$importcontent2_input}<br /></p>
</div>
{$startform}
<div class="pageoverflow">
	<p class="pagetext">{$uninstallaction_text}:</p>
	<p class="pageinput">{$uninstallaction_input}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$block_display_settings_text}:</p>
	<p class="pageinput">{$block_display_settings_input}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$collapse_block_default_text}:</p>
	<p class="pageinput">{$collapse_block_default_input}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$message_display_settings_text}:</p>
	<p class="pageinput">{$message_display_settings_input}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$group_display_settings_text}:</p>
	<p class="pageinput">{$group_display_settings_input}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$collapse_group_default_text}:</p>
	<p class="pageinput">{$collapse_group_default_input}</p>
</div>
<div class="pageoverflow">
	<p class="pagetext">{$use_advanced_pageoptions_text}:</p>
	<p class="pageinput">{$use_advanced_pageoptions_input}</p>
</div>
<br />
<div class="pageoverflow" id="advanced_default_options" {$advanced_default_options_style}>
	<fieldset>
		<legend>{$contentsettings_text}</legend>
		<div class="pageoverflow">
			<p class="pagetext">{$use_expire_date_text}:</p>
			<p class="pageinput">{$use_expire_date_input}</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">{$start_date_text}:</p>
			<p class="pageinput">{$start_date_input}</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">{$end_date_text}:</p>
			<p class="pageinput">{$end_date_input}</p>
		</div>
	{if isset($feuaccess_text)}
		<div class="pageoverflow">
			<p class="pagetext">{$feuaccess_text}:</p>
			<p class="pageinput">{$feuaccess_input}</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">{$redirectpage_text}:</p>
			<p class="pageinput">{$redirectpage_input}</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">{$redirectparams_text}:</p>
			<p class="pageinput">
				{$inherit_redirectparams_text} : {$inherit_redirectparams_input}<br /><br />
				{$redirectparams_input}&nbsp;<em>(param1=value1 param2=value2 ...)</em><br /><br />
				{$evaluatesmarty_text}:&nbsp;{$evaluatesmarty_input}
			</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">{$feuaction_text}:</p>
			<p class="pageinput">{$feuaction_input}</p>
		</div>
		<div class="pageoverflow">
			<p class="pagetext">{$hide_menu_item_text}:</p>
			<p class="pageinput">{$hide_menu_item_input}</p>
		</div>
	{/if}
	</fieldset>
</div>
<div class="pageoverflow">
	<p class="pagetext"></p>
	<p class="pageinput">{$submit_prefs}</p>
</div>
{$endform}
