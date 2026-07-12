<?php
#A
$lang['add_block'] = 'Add a New Block';
$lang['advanced_content_copy'] = 'Advanced Copy of Content';
$lang['advanced_copy'] = 'Advanced Copy';
$lang['ask_delete_block'] = 'Do you really want to delete this block?';
$lang['ask_really_import'] = 'Are you sure you want to import this code, considering the warnings above';
$lang['ask_really_uninstall'] = 'Are you sure you want to do this?';
$lang['available_items'] = 'Available Items';
$lang['available_templates'] = 'Available Code';

#B
$lang['blocks'] = 'Blocks';
$lang['blocktype_textinput'] = 'Text Input';
$lang['blocktype_textarea'] = 'Text Area';
$lang['blocktype_dropdown'] = 'Dropdown';
$lang['blocktype_checkbox'] = 'Checkbox';
$lang['blocktype_file_selector'] = 'File Selector';
$lang['blocktype_pageselector'] = 'Page Selector';
$lang['blocktype_radiobuttons'] = 'Radio Buttons';

#C
$lang['cancel'] = 'Cancel';
$lang['changelog'] = <<<EOT
<ul>
  <li>v1.0 - June 2009
    <ul>
      <li>Initial Relase</li>
    </ul>
  </li>
  <li>v1.0.2 - July 2010
    <ul>
      <li>Ability to perserve hierarchy when copying parents and children (Ted)</li>
      <li>Added check for prop copying to keep E_NOTICE happy (Ted)></li>
      <li>Minor change to sample tag info.</li>
      <li>Adds the page selector field type.</li>
    </ul>
  </li>
  <li>v1.2 - December 2010
    <ul> 
      <li>Adds the export and import code functionality.</li>
    </ul>
  </li>
</ul>
TODO
EOT;
$lang['content'] = 'Content';
$lang['contents_of_file'] = 'Scanned Contents of File';
$lang['copy'] = 'Copy';

#D
$lang['default_value'] = 'Default Value';
$lang['delete'] = 'Delete';

#E
$lang['edit'] = 'Edit';
$lang['error_broken_xml'] = 'The XML file specified is invalid';
$lang['error_copycontent_invalid_name'] = 'The title specified for copying id=%d is invalid';
$lang['error_copycontent_invalid_menutext'] = 'The menutext specified for copying id=%d is invalid';
$lang['error_missing_param'] = 'A required parameter was missing or invalid';
$lang['error_nameexists'] = 'An item by that name alreaady exists';
$lang['error_nocontentselected'] = 'No content was selected';
$lang['error_notfound'] = 'Item not found';
$lang['error_nothingtoimport'] = 'The XML file specified did not contain any information that could be imported into this installation (no compatible modules, or GCBs or UDTs)';
$lang['error_nothingselected'] = 'No items were selected';
$lang['error_permission_denied'] = 'Permission Denied';
$lang['error_upload'] = 'File upload failed';
$lang['error_uploadnotfound'] = 'Uploaded file cound not be found';
$lang['export'] = 'Export';
$lang['export_children'] = 'Export Children';
$lang['export_code'] = 'Export Code';
$lang['export_content'] = 'Export Content';
$lang['extra'] = 'Extra';

#F
$lang['file'] = 'XML File';
$lang['file_selector'] = 'File Selector';
$lang['friendlyname'] = 'Calguys Content Utlities';

#G
$lang['global_content_block'] = 'Global Content Block (GCB)';

#H
$lang['help'] = <<<EOT
<h3>What Does This Do?</h3>
<p>This module works in the CMS Made Simple administration console and provides various aditional functions and utilities for working with CMS Made Simple's content pages.</p>
<h3>Features</h3>
<ul>
  <li>Export content pages to XML</li>
  <li>Import content pages from XML</li>
  <li>Allows Creating and managing various different content blocks for embedding into CMSMS page templates.</li>
  <li>Provides bulk page copy capability.</li>
</ul>
<h3>How do I use it</h3>
<p>If you are an authorized CMS Made Simple web site administrator, and have sufficient privilege to manage all content, then the &quit;Calguys Content Utilities&quot; menu item should appear in the CMS Made Simple administration panel.  You will see a number of tabs, including:</p>
<ul>
  <li><u>Blocks</u>
  <p>This tab provides functionality for creating &quot;named&quot; and managing content blocks of various types.  Tags for these content blocks can then be inserted into CMSMS page templates.  This provides functionality to put additonal content blocks into your page template to allow the user to enter or choose different data which may have a result on the appearance of the page.</p>
  <p>For example, a content block of type &quot;checkbox&quot; could be used to indicate wether an image is to be displayed or not.</p>
  <p>This is an advanced feature, and utilizing this feature requires that you be familiar with the smarty templating engine that is used througout CMSMS.</p>
  </li>
  <li><u>Import</u>
  <p>This tab provides the ability to import one or more content pages from an XML file that was created by the export functionality.   Using this functionality you can easily migrate information from one website to another.<p>
  </li>
  <li><u>Export</u>
  <p>This tab provides the ability to choose a single page from a dropdown to export to XML format.  You can also indicate wether the children of the selected page should be exported.  Clicking on the export button will prompt you to download the XML file.</p>
  <p>The generated XML file does not contain images, or page templates, or global content blocks, etc.  It only contains the contents of the various content objects, and their values.</p>
  </li>
</ul>
<p>Additionally, this module adds a bulk action to the content management page, which should be visible if you have the appropriate permission.  This bulk action allows selecting multiple pages, and creating a single copy of each of the selected pages,</p>
<h3>Support</h3>
<p>This module does not include commercial support. However, there are a number of resources available to help you with it:</p>
<ul>
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit calguy\'s
module homepage at <a href="http://calguy1000.com">calguy1000.com</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000, can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author directly.</li>  
</ul>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&lt;calguy1000@cmsmadesimple.org&gt;</a>. All Rights Are Reserved.</p>
<p>This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.</p>
<p>However, as a special exception to the GPL, this software is distributed
as an addon module to CMS Made Simple.  You may not use this software
in any Non GPL version of CMS Made simple, or in any version of CMS
Made simple that does not indicate clearly and obviously in its admin 
section that the site was built with CMS Made simple.</p>
<p>This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>
EOT;

#I
$lang['info_available_items'] = 'Select an item below to see the exportable templates or code that can be exported';
$lang['info_blockname'] = 'Use only alphanumeric characters, underscores and dashes';
$lang['info_blockprompt'] = 'Specify a human readable prompt';
$lang['info_dropdown_options'] = 'Specify the options for the dropdown.  One option per line.  Specify values for each option by separating them with a pipe character';
$lang['info_excludeprefix'] = 'Exclude files with these prefixes (comma separated list)';
$lang['info_export_code'] = 'Export selected module templates, global content blocks, and module templates to an XML file for use on another web site';
$lang['info_filetypes'] = 'Specify a comma separated list of file extensions. i.e: pdf,jpg,doc';
$lang['info_final_import_code'] = 'The items selected for import  are be displayed below.  Items that represent an overwrite are hilighted in <span style="color: yellow;">yellow</span>. Please confirm that you really want to do this.<br/><strong>Note:</strong> It is possible by continuing that you may overwrite valid working templates.<br/>
<strong>Note:</strong> Some modules do not support multiple templates for each template type, therefore it may be necessary to overwrite some templates for them to have any effect.<br/>
<strong>Note:</strong> This module does not perform any modifications to the imported templates to check for references to pages, or existing module calls.  You may have to visit each template individually to customize its behavior for your site.';
$lang['info_import_code'] = 'Allows importing selected GBBs, UDTs and Module templates from an XML file.<br/><strong>Note:</strong> This is an advanced tool.  This feature allows overwriting templates into an existing syte.  Use with caution!';
$lang['info_scanned_file'] = 'Below are the scanned contents of the XML file supplied.  You may preview the items listed and select some for import.  You may optionally specify a new name for imported templates.';
$lang['import'] = 'Import';
$lang['import_code'] = 'Import Code';
$lang['import_content'] = 'Import Content';
$lang['import_name'] = 'Import Name';

#J

#K

#L
$lang['list_gcbs'] = 'Global Content Blocks';
$lang['list_udts'] = 'User Defined Tags';

#M
$lang['moddescription'] = 'A module with utilities and tools to aide in content management';
$lang['module'] = 'Module';
$lang['modules'] = 'Modules';
$lang['module_template'] = 'Module Template';
$lang['msg_blockadded'] = 'Block Successfully Added';
$lang['msg_blockupdated'] = 'Block values updated';
$lang['msg_cancelled'] = 'Operation cancelled';
$lang['msg_imported'] = '%d items imported from XML';

#N
$lang['name'] = 'Name';
$lang['new_alias'] = 'New Alias';
$lang['new_menutext'] = 'New MenuText';
$lang['new_name'] = 'New Name';
$lang['new_parent'] = 'New Parent';
$lang['next'] = 'Next';

#O

#P
$lang['parent'] = 'Parent';
$lang['postinstall'] = 'The CGContentUtils module has been installed';
$lang['postuninstall'] = 'The CGContentUtils module has been uninstalled';
$lang['preview'] = 'Preview';
$lang['prompt'] = 'Prompt';
$lang['prompt_cols'] = 'Columns';
$lang['prompt_dir'] = 'Directory <em>(relative to the uploads directory)</em>';
$lang['prompt_excludeprefix'] = 'Exclude files with these prefixes';
$lang['prompt_filetypes'] = 'Allowed File Types';
$lang['prompt_length'] = 'Length';
$lang['prompt_maxlength'] = 'Maximum Length';
$lang['prompt_options'] = 'Options';
$lang['prompt_page'] = 'Page';
$lang['prompt_recurse'] = 'Recurse into Subdirectories';
$lang['prompt_rows'] = 'Rows';
$lang['prompt_sortfiles'] = 'Sort Files by Name';
$lang['prompt_value'] = 'Value';

#Q

#R

#S
$lang['scan'] = 'Scan';
$lang['select_all'] = 'Select All';
$lang['start_page'] = 'Start Page';
$lang['submit'] = 'Submit';

#T
$lang['type'] = 'Type';

#U
$lang['usage'] = 'Usage';
$lang['userdefined_tag'] = 'User Defined Tag (UDT)';

#V

#W

#X
$lang['xml_file'] = 'XML File';

#Y

#Z

?>
