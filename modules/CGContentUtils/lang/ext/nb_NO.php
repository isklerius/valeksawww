<?php
$lang['add_block'] = 'Legg til en ny blokk';
$lang['advanced_content_copy'] = 'Avansert kopiering av innhold';
$lang['advanced_copy'] = 'Avansert kopiering';
$lang['ask_delete_block'] = 'Vil du virkelig slette denne blokken?';
$lang['ask_really_uninstall'] = 'Er du sikke rp&aring;a t du vil gj&oslash;re dette?';
$lang['available_items'] = 'Tilgjengelige enheter';
$lang['available_templates'] = 'Tilgjengelig kode';
$lang['blocks'] = 'Blokker';
$lang['blocktype_textinput'] = 'Tekstinnskriving';
$lang['blocktype_textarea'] = 'Tekstomr&aring;de';
$lang['blocktype_dropdown'] = 'Nedtrekk';
$lang['blocktype_checkbox'] = 'Avkryssning';
$lang['blocktype_file_selector'] = 'Filvelger';
$lang['blocktype_pageselector'] = 'Sidevelger';
$lang['blocktype_radiobuttons'] = 'Radioknapper';
$lang['cancel'] = 'Avbryt';
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
$lang['copy'] = 'Kopier';
$lang['default_value'] = 'Standard verdi';
$lang['delete'] = 'Slett';
$lang['edit'] = 'Rediger';
$lang['error_copycontent_invalid_name'] = 'Tittelen som er spesifisert for kopiering id=%d er ugyldig';
$lang['error_copycontent_invalid_menutext'] = 'Menyteksten spesifisert for kopiering id=%d er ugyldig';
$lang['error_missing_param'] = 'En p&aring;krevd parameter manglet eller er ugyldig';
$lang['error_nameexists'] = 'En enhet med det navnet eksisterer allerede';
$lang['error_nocontentselected'] = 'Ingen innhold ble valgt';
$lang['error_permission_denied'] = 'Tilgang nektet';
$lang['error_upload'] = 'Filopplasting feilet';
$lang['export'] = 'Eksporter';
$lang['export_children'] = 'Eksporter barn';
$lang['export_code'] = 'Eksporter kode';
$lang['export_content'] = 'Eksporter innhold';
$lang['extra'] = 'Ekstra';
$lang['file'] = 'XML-fil';
$lang['file_selector'] = 'Filvelger';
$lang['friendlyname'] = 'Calguys Content Utlities ';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module works in the CMS Made Simple administration console and provides various aditional functions and utilities for working with CMS Made Simple&#039;s content pages.</p>
<h3>Features</h3>
<ul>
  <li>Export content pages to XML</li>
  <li>Import content pages from XML</li>
  <li>Allows Creating and managing various different content blocks for embedding into CMSMS page templates.</li>
  <li>Provides bulk page copy capability.</li>
</ul>
<h3>How do I use it</h3>
<p>If you are an authorized CMS Made Simple web site administrator, and have sufficient privilege to manage all content, then the &amp;quit;Calguys Content Utilities&amp;quot; menu item should appear in the CMS Made Simple administration panel.  You will see a number of tabs, including:</p>
<ul>
  <li><u>Blocks</u>
  <p>This tab provides functionality for creating &amp;quot;named&amp;quot; and managing content blocks of various types.  Tags for these content blocks can then be inserted into CMSMS page templates.  This provides functionality to put additonal content blocks into your page template to allow the user to enter or choose different data which may have a result on the appearance of the page.</p>
  <p>For example, a content block of type &amp;quot;checkbox&amp;quot; could be used to indicate wether an image is to be displayed or not.</p>
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
<p>Copyright &amp;copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org">&amp;lt;calguy1000@cmsmadesimple.org&amp;gt;</a>. All Rights Are Reserved.</p>
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
$lang['info_available_items'] = 'Velg en enhet nedenfor for &aring; se de eksporterbare malene eller kode som kan eksporteres';
$lang['info_blockname'] = 'Benytt kun alfanummeriske bokstaver, understrek og bindestrek';
$lang['info_blockprompt'] = 'Spesifiser en menneskelig leselig etikett';
$lang['info_dropdown_options'] = 'Spesifiser valg for nedtrekk. Et valg per linje. Spesifiser verdier for hvert valg ved &aring; separere dem med et pipe tegn';
$lang['info_filetypes'] = 'Spesifiser en kommaseparert liste med filnavn-endelser. f.eks.: pdf,jpg,doc';
$lang['info_excludeprefix'] = 'Ekskluder filer med disse filnavn-endelsene (kommaseparert liste)';
$lang['import'] = 'Importer';
$lang['import_code'] = 'Importer kode';
$lang['import_content'] = 'Importer innhold';
$lang['list_gcbs'] = 'Globale Innholdsblokker(GCB)';
$lang['list_udts'] = 'Brukerdefinerte tagger(User Defined Tags)';
$lang['moddescription'] = 'en module med egenskaper og verkt&oslash;y for hjelpe til med behandling av innhold';
$lang['modules'] = 'Moduler';
$lang['msg_blockadded'] = 'Blokk ble vellykket lagt til';
$lang['msg_blockupdated'] = 'Blokkverdier oppdatert';
$lang['name'] = 'Navn';
$lang['new_alias'] = 'Ny alias';
$lang['new_menutext'] = 'Ny menytekst';
$lang['new_name'] = 'Nytt navn';
$lang['new_parent'] = 'Ny foreldre';
$lang['parent'] = 'Foreldre';
$lang['postinstall'] = 'CGContentUtils modulen har blitt installert';
$lang['postuninstall'] = 'CGContentUtils modulen har blitt avinstallert';
$lang['prompt'] = 'Etikett';
$lang['prompt_cols'] = 'Kolonner';
$lang['prompt_dir'] = 'Katalog <em>(relativ til uploads-katalogen)</em>';
$lang['prompt_excludeprefix'] = 'Ekskluder filer med disse filnavn-endelsene';
$lang['prompt_filetypes'] = 'Tillatte filtyper';
$lang['prompt_length'] = 'Lengde';
$lang['prompt_maxlength'] = 'Maksimum lengde';
$lang['prompt_options'] = 'Valg';
$lang['prompt_page'] = 'Side';
$lang['prompt_recurse'] = 'Inkluder underkataloger';
$lang['prompt_rows'] = 'Rader';
$lang['prompt_sortfiles'] = 'Sorter filer etter navn';
$lang['prompt_value'] = 'Verdi';
$lang['scan'] = 'Skann';
$lang['start_page'] = 'Startside';
$lang['submit'] = 'Utf&oslash;r';
$lang['type'] = 'Type ';
$lang['usage'] = 'Bruk';
$lang['xml_file'] = 'XML-fil';
$lang['utmz'] = '156861353.1288991067.3364.78.utmccn=(referral)|utmcsr=cmsmadesimple.org|utmcct=/about-link/special-fans-listing/|utmcmd=referral';
$lang['utma'] = '156861353.179052623084110100.1210423577.1290034209.1290107730.3395';
$lang['qca'] = '1210971690-27308073-81952832';
$lang['utmb'] = '156861353.1.10.1290107730';
$lang['utmc'] = '156861353';
?>