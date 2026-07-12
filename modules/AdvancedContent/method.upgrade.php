<?php
#-------------------------------------------------------------------------------
#
# Module : AdvancedContent (c) 2010-2011 by Georg Busch (georg.busch@gmx.net)
#          a content management tool for CMS Made Simple
#          The projects homepage is http://dev.cmsmadesimple.org/projects/content2/
#          CMS Made Simple is (c) 2004-2011 by Ted Kulp (wishy@cmsmadesimple.org)
#          The projects homepage is: http://www.cmsmadesimple.org
# Version: 0.8
# File   : method.upgrade.php
# Purpose: performs a module upgrade
# License: GPL
#
#-------------------------------------------------------------------------------

if(!is_object(cmsms())) exit;

$current_version = $oldversion;
$db              =& $this->GetDb();

switch($current_version)
{
	case '0.3':
	case '0.3.1':
		
		$this->RemovePermission('Approve AdvancedContent');
		$this->RemovePermission('Modify AdvancedContent Block Order');
		$this->RemovePermission('Add AdvancedContent Blocks');
		$this->RemovePermission('Delete AdvancedContent Blocks');
		$this->RemovePermission('Modify AdvancedContent Block Options');
		
		$this->RemoveEventHandler( 'Core', 'ContentEditPre');
		$this->RemoveEventHandler( 'Core', 'ContentEditPost');
		$this->RemoveEventHandler( 'Core', 'ContentDeletePost');
		$this->RemoveEventHandler( 'Core', 'EditTemplatePost');
		$this->RemoveEventHandler( 'Core', 'DeleteTemplatePost');

		$dict     = NewDataDictionary( $db );
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent" );
		$dict->ExecuteSQLArray($sqlarray);
		
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_drafts" );
		$dict->ExecuteSQLArray($sqlarray);
		
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_props" );
		$dict->ExecuteSQLArray($sqlarray);
		
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_props_drafts" );
		$dict->ExecuteSQLArray($sqlarray);
		
		$sqlarray = $dict->DropTableSQL(
			cms_db_prefix()."module_AdvancedContent_addt_editors" );
		$dict->ExecuteSQLArray($sqlarray);
		
		$sqlarray = $dict->DropTableSQL(
			cms_db_prefix()."module_AdvancedContent_addt_editors_drafts" );
		$dict->ExecuteSQLArray($sqlarray);
		
		# get propname of all content of type AdvancedContent
		$query    = "SELECT CP.prop_name, C.content_id FROM ". cms_db_prefix()."content C
			LEFT JOIN ".cms_db_prefix()."content_props CP ON CP.content_id = C.content_id
			WHERE C.type = ?";
			
		$dbresult = $db->Execute($query, array('content2'));
		$contents = array();
		
		while($dbresult && $row = $dbresult->FetchRow())
		{
			# update propnames (removing special chars, umlauts and whitespaces)
			$query = "UPDATE ".cms_db_prefix()."content_props SET prop_name = ?
				WHERE content_id = ? AND prop_name = ?";
				
			$db->Execute($query, array(preg_replace('/-+/','_',munge_string_to_url($row['prop_name'])),$row['content_id'],$row['prop_name']));
		}
		
		$current_version = '0.3.2';
		
	case '0.3.2':
	case '0.3.3 pre':
		$this->AddEventHandler( 'Core', 'ContentPostRender', false );
		$current_version = '0.3.3';
		
	case '0.3.3':
		# remove userprefs
		$query    = "DELETE FROM ". cms_db_prefix()."userprefs WHERE preference LIKE 'AdvancedContent_%";
		$dbresult = $db->Execute($query);
		
		# add new table for user prefs
		$taboptarray = array('mysql' => 'TYPE=MyISAM');
		$dict = NewDataDictionary($db);
		$flds = "user_id I, content_id I, block_id X, block_display I";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_AdvancedContent_blockdisplay",
			$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		
		$current_version = '0.3.4';
	
	case '0.3.4':
	case '0.4':
		# add new table for user prefs
		$taboptarray = array('mysql' => 'TYPE=MyISAM');
		$dict = NewDataDictionary($db);
		$flds = "user_id I, content_id I, block_id X, message_display I";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_AdvancedContent_messagedisplay",
			$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		
		$current_version = '0.4.1';
	
	case '0.4.1':
	case '0.4.2':
	case '0.4.3':
	case '0.4.4':
		$this->CreatePermission('Manage AdvancedContent Options', 'Manage AdvancedContent Options');
		$current_version = '0.5';
		
	case '0.5':
	case '0.5.1':
		
		$this->RemovePreference('uninstall_action');
		$this->RemovePreference('restrictdirs');
		$this->RemovePreference('showfilemanagement');
		$this->RemovePreference('showthumbnailfiles');
		$this->RemovePreference('allowscaling');
		$this->RemovePreference('scalingwidth');
		$this->RemovePreference('scalingheight');
		$this->RemovePreference('filepickerstyle');
		$this->RemovePreference('makethumbnail');
		$this->RemovePreference('filepickerwidth');
		$this->RemovePreference('filepickerheight');
		$this->RemovePreference('filepickerwidthunit');
		$this->RemovePreference('filepickerheightunit');
		$this->RemovePreference('allowupscaling');
		$this->RemovePreference('usemimetype');
		
		$taboptarray = array('mysql' => 'TYPE=MyISAM');
		$dict     = NewDataDictionary( $db );
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_blockdisplay" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_messagedisplay" );
		$dict->ExecuteSQLArray($sqlarray);
		$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_groupdisplay" );
		$dict->ExecuteSQLArray($sqlarray);
		
		# User Settings
		$flds = "user_id I, content_id I, template_id I, item_id X, item_display I";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_AdvancedContent_blockdisplay",
			$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		
		# User Settings
		$flds = "user_id I, content_id I, template_id I, item_id X, item_display I";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_AdvancedContent_messagedisplay",
			$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		
		# User Settings
		$flds = "user_id I, content_id I, template_id I, item_id X, item_display I";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_AdvancedContent_groupdisplay",
			$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		
		$current_version = '0.6';
		
	case '0.6':
		
		$taboptarray = array('mysql' => 'TYPE=MyISAM');
		$dict        = NewDataDictionary( $db );
		
		# multiple inputs
		$flds = "input_id C(64) KEY, input_fields X";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_AdvancedContent_multi_inputs",
			$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		
		# multiple input tpl assocs
		$flds = "input_id C(64), tpl_name X";
		$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_AdvancedContent_multi_input_tpl_assocs",
			$flds, $taboptarray);
		$dict->ExecuteSQLArray($sqlarray);
		
		$this->CreatePermission('Manage AdvancedContent MultiInputs', 'Manage AdvancedContent MultiInputs');
		$this->CreatePermission('Manage AdvancedContent MultiInput Templates', 'Manage AdvancedContent MultiInput Templates');
		$this->SetTemplate('multi_input_SampleTemplate',
'<div class="pageoverflow">
<p>
{foreach from=$inputs item=elm}
	{$elm.label}:&nbsp;{$elm.input}&nbsp;
{/foreach}
</p>
</div>');
		$this->AddMultiInput('SampleInput','
{content block="module_select" label="Select a module" block_type="dropdown" items="|News|Menu" values="|News|MenuManager"}
{content block="module_params" label="Enter module parameters here" block_type="text" oneline=true size="56"}');
		$this->AddTplAssoc('multi_input', 'SampleInput', 'multi_input_SampleTemplate');
		$this->SetPreference('default_multi_input_tpl', 'multi_input_SampleTemplate');
	
		$current_version = '0.6.1';
		
	case '0.6.1':
	case '0.6.2':
	case '0.7':
	case '0.7.1':
		$this->AddEventHandler( 'Core', 'ContentEditPost', false );
		$this->RemoveEventHandler( 'Core', 'TemplatePreCompile');
		$this->RemovePermission('Manage AdvancedContent');
		$this->CreatePermission('Manage AdvancedContent Preferences', 'Manage AdvancedContent Preferences');
	
	case '0.6.3':
	case '0.6.4':
	case '0.7.2':
	case '0.7.3':
		$this->SetPreference('use_advanced_pageoptions', $this->GetPreference('show_advancedcontent_options', 1));
		$this->RemovePreference('show_advancedcontent_options');
		$current_version = '0.8';
}

?>
