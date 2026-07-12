<?php
$lang['add_block'] = 'Een nieuw blok toevoegen';
$lang['advanced_content_copy'] = 'Geavanceerde Kopie van de Inhoud';
$lang['advanced_copy'] = 'Geavanceerde Kopie';
$lang['ask_delete_block'] = 'Wilt u dit blok echt verwijderen?';
$lang['ask_really_uninstall'] = 'Weet u zeker dat u dit wilt doen?';
$lang['available_items'] = 'Beschikbare Items';
$lang['available_templates'] = 'Beschikbare Code';
$lang['blocks'] = 'Blokken';
$lang['blocktype_textinput'] = 'Tekst Invoer';
$lang['blocktype_textarea'] = 'Tekstruimte';
$lang['blocktype_dropdown'] = 'Dropdown ';
$lang['blocktype_checkbox'] = 'Vinkvakje';
$lang['blocktype_file_selector'] = 'Bestand Selectie';
$lang['blocktype_pageselector'] = 'Pagina Selectie';
$lang['blocktype_radiobuttons'] = 'Radio Buttons ';
$lang['cancel'] = 'Annuleer';
$lang['changelog'] = '<ul>
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
</ul>
TODO';
$lang['copy'] = 'Kopieer';
$lang['default_value'] = 'Standaard waarde';
$lang['delete'] = 'Verwijder';
$lang['edit'] = 'Wijzig';
$lang['error_copycontent_invalid_name'] = 'De benoemde titel voor het kopi&euml;ren id=%d is niet correct';
$lang['error_copycontent_invalid_menutext'] = 'De benoemde menutekst voor het kopi&euml;ren id=%d is niet correct';
$lang['error_missing_param'] = 'Een verplichte parameter is verkeerd of is niet aanwezig';
$lang['error_nameexists'] = 'Een item met deze naam bestaat al';
$lang['error_nocontentselected'] = 'Er is geen inhoud geselecteerd';
$lang['error_permission_denied'] = 'Niet toegestaan';
$lang['error_upload'] = 'Bestandsupload mislukt';
$lang['export'] = 'Export ';
$lang['export_children'] = 'Exporteer onderliggende pagina&#039;s';
$lang['export_code'] = 'Exporteer Code';
$lang['export_content'] = 'Exporteer Content';
$lang['extra'] = 'Extra ';
$lang['file'] = 'XML Bestand';
$lang['file_selector'] = 'Bestand Selectie ';
$lang['friendlyname'] = 'Calguys Content Utilities ';
$lang['help'] = '<h3>What Does This Do? </h3>
<p>This module works in the CMS Made Simple administration console and provides various aditional functions and utilities for working with CMS Made Simple&#039;s content pages.</p>
<h3>Features</h3>
<ul>
  <li>Export content pages to XML</li>
  <li>Import content pages from XML</li>
  <li>Allows Creating and managing various different content blocks for embedding into CMSMS page templates.</li>
  <li>Provides bulk page copy capability.</li>
</ul>
<h3>How do I use it</h3>
<p>If you are an authorized CMS Made Simple web site administrator, and have sufficient privilege to manage all content, then the &amp;quit;Calguys Content Utilities&quot; menu item should appear in the CMS Made Simple administration panel.  You will see a number of tabs, including:</p>
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
<li>For the latest version of this module, FAQs, or to file a Bug Report or buy commercial support, please visit calguy\&#039;s
module homepage at <a href="http://calguy1000.com">calguy1000.com</a>.</li>
<li>Additional discussion of this module may also be found in the <a href="http://forum.cmsmadesimple.org">CMS Made Simple Forums</a>.</li>
<li>The author, calguy1000, can often be found in the <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a>.</li>
<li>Lastly, you may have some success emailing the author directly.</li>  
</ul>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org"><calguy1000@cmsmadesimple.org></a>. All Rights Are Reserved.</p>
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
Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>';
$lang['info_available_items'] = 'Select an item below to see the exportable templates or code that can be exported';
$lang['info_blockname'] = 'Gebruik alleen alphanumerieke karakters, underscores en dashes';
$lang['info_blockprompt'] = 'Benoem een leesbare tekst';
$lang['info_dropdown_options'] = 'Benoem de opties voor de dropdown.  Een optie per regel.  Benoem waarden voor iedere optie door het te scheiden met de pipe karakter';
$lang['info_filetypes'] = 'Specificeer een komma gescheiden lijst van extenties, bijv.: pdf,jpg,doc';
$lang['info_excludeprefix'] = 'Negeer bestanden met deze prefix (komma gescheiden lijst)';
$lang['import'] = 'Importeer';
$lang['import_code'] = 'Importeer Code';
$lang['import_content'] = 'Importeer Content';
$lang['list_gcbs'] = 'HTML-blokken';
$lang['list_udts'] = 'Gebruikersgedefinieerde Tags';
$lang['moddescription'] = 'Een module met utilities en tools die ondersteunen bij het bewerken van paginainhoud';
$lang['modules'] = 'Modules ';
$lang['msg_blockadded'] = 'Blok toegevoegd';
$lang['msg_blockupdated'] = 'Blokwaarden aangepast';
$lang['name'] = 'Naam';
$lang['new_alias'] = 'Nieuwe Alias';
$lang['new_menutext'] = 'Nieuwe MenuTekst';
$lang['new_name'] = 'Nieuwe Naam';
$lang['new_parent'] = 'Nieuwe Parent';
$lang['parent'] = 'Bovenliggend';
$lang['postinstall'] = 'De CGContentUtils module is ge&iuml;nstalleerd';
$lang['postuninstall'] = 'De CGContentUtils module is gede&iuml;nstalleerd';
$lang['prompt'] = 'Tekst';
$lang['prompt_cols'] = 'Kolommen';
$lang['prompt_dir'] = 'Directory <em>(relatief aan de uploads directory)</em>';
$lang['prompt_excludeprefix'] = 'Negeer bestanden met deze prefix';
$lang['prompt_filetypes'] = 'Toegestane bestandtypen';
$lang['prompt_length'] = 'Lengte';
$lang['prompt_maxlength'] = 'Maximale Lengte';
$lang['prompt_options'] = 'Opties';
$lang['prompt_page'] = 'Pagina';
$lang['prompt_recurse'] = 'Recursief in de Subdirectories';
$lang['prompt_rows'] = 'Regels';
$lang['prompt_sortfiles'] = 'Sorteer bestanden bij naam';
$lang['prompt_value'] = 'Waarde';
$lang['scan'] = 'Scan ';
$lang['start_page'] = 'Start Pagina';
$lang['submit'] = 'Toevoegen';
$lang['type'] = 'Type ';
$lang['usage'] = 'Gebruik';
$lang['xml_file'] = 'XML Bestand';
$lang['utma'] = '156861353.1335698708.1284586217.1292160105.1292170905.558';
$lang['utmz'] = '156861353.1292104452.553.49.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['qca'] = 'P0-1551306179-1284586216711';
$lang['utmb'] = '156861353.1.10.1292170905';
$lang['utmc'] = '156861353';
?>