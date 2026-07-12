<?php
#-------------------------------------------------------------------------------
#
# Module : AdvancedContent (c) 2010-2011 by Georg Busch (georg.busch@gmx.net)
#          a content management tool for CMS Made Simple
#          The projects homepage is http://dev.cmsmadesimple.org/projects/content2/
#          CMS Made Simple is (c) 2004-2011 by Ted Kulp (wishy@cmsmadesimple.org)
#          The projects homepage is: http://www.cmsmadesimple.org
# Version: 0.8
# File   : method.uninstall.php
# Purpose: uninstalls the module, removes tables, preferences, permissions...
# License: GPL
#
#-------------------------------------------------------------------------------

if(!is_object(cmsms())) exit;

$db       =& $this->GetDb();
$dict     = NewDataDictionary( $db );
$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_blockdisplay" );
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_messagedisplay" );
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_groupdisplay" );
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_multi_inputs" );
$dict->ExecuteSQLArray($sqlarray);
$sqlarray = $dict->DropTableSQL( cms_db_prefix()."module_AdvancedContent_multi_input_tpl_assocs" );
$dict->ExecuteSQLArray($sqlarray);

if($this->GetPreference('uninstall_action') != '') {
	switch($this->GetPreference('uninstall_action')) {
		case 1:
			# Delete
			# get id of all content of type AdvancedContent
			$query    = "SELECT content_id FROM ". cms_db_prefix()."content WHERE type = ?";
			$dbresult = $db->Execute($query, array('content2'));
			$contents = array();
			while($dbresult && $row = $dbresult->FetchRow()) {
				$contents[] = $row['content_id'];
			}
			# delete all content of type AdvancedContent
			$query    = "DELETE FROM ". cms_db_prefix()."content WHERE type = ?";
			$dbresult = $db->Execute($query, array('content2'));
			
			# delete content props
			$query    = "DELETE FROM ". cms_db_prefix()."content_props WHERE content_id IN (".implode(',',$contents).")";
			$dbresult = $db->Execute($query);
			
			break;
			
		case 2:
			# Set to content
			$query    = "UPDATE ".cms_db_prefix()."content SET type = ? WHERE type = ?";
			$dbresult = $db->Execute($query, array('content','content2'));
			break;
			
		case 3:
			# get id of all content of type AdvancedContent
			$query    = "SELECT content_id FROM ". cms_db_prefix()."content WHERE type = ?";
			$dbresult = $db->Execute($query, array('content2'));
			$contents = array();
			while($dbresult && $row = $dbresult->FetchRow()) {
				$contents[] = $row['content_id'];
			}
			# set to content
			$query    = "UPDATE ".cms_db_prefix()."content SET type = ? WHERE type = ?";
			$dbresult = $db->Execute($query, array('content','content2'));
			
			# delete content props
			$query    = "DELETE FROM ". cms_db_prefix()."content_props
				WHERE content_id IN (".implode(',',$contents).") AND prop_name != 'content_en'";
			$dbresult = $db->Execute($query);
			
			break;
			
		default: break;
		
	}
}

# remove permissions
$this->RemovePermission('Manage AdvancedContent');
$this->RemovePermission('Manage AdvancedContent Preferences');
$this->RemovePermission('Manage All AdvancedContent Blocks');
$this->RemovePermission('Manage AdvancedContent Options');
$this->RemovePermission('Manage AdvancedContent MultiInputs');
$this->RemovePermission('Manage AdvancedContent MultiInput Templates');

$this->RemoveEventHandler( 'Core', 'ContentPostRender');
$this->RemoveEventHandler( 'Core', 'ContentEditPost');

$this->DeleteTemplate();

# remove preferences
$this->RemovePreference();

$this->Audit( 0, $this->Lang('AdvancedContent'),
	$this->Lang('uninstalled',$this->GetVersion()));

?>
