<?php
$lang['add_block'] = 'Pridať nov&yacute; blok';
$lang['advanced_content_copy'] = 'Roz&scaron;&iacute;ren&eacute; kop&iacute;rovanie obsahu';
$lang['advanced_copy'] = 'Roz&scaron;&iacute;ren&eacute; kop&iacute;rovanie';
$lang['ask_delete_block'] = 'Skutočne chcete odstr&aacute;niť tento blok?';
$lang['ask_really_uninstall'] = 'Ste si ist&yacute;?';
$lang['available_items'] = 'Dostupn&eacute; položky';
$lang['available_templates'] = 'Dostupn&yacute; k&oacute;d';
$lang['blocks'] = 'Bloky';
$lang['blocktype_textinput'] = 'Testov&eacute; pole';
$lang['blocktype_textarea'] = 'Textov&aacute; oblasť';
$lang['blocktype_dropdown'] = 'V&yacute;berov&eacute; pole';
$lang['blocktype_checkbox'] = 'Za&scaron;rt&aacute;vacie pole';
$lang['blocktype_pageselector'] = 'V&yacute;ber str&aacute;nok';
$lang['blocktype_radiobuttons'] = 'Radio tlač&iacute;tka';
$lang['cancel'] = 'Zru&scaron;iť';
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
$lang['copy'] = 'Kop&iacute;rovať';
$lang['default_value'] = 'Prednastaven&aacute; hodnota';
$lang['delete'] = 'Odstr&aacute;niť';
$lang['edit'] = 'Upraviť';
$lang['error_copycontent_invalid_name'] = 'N&aacute;zov pre kop&iacute;rovanie id=%d je neplatn&yacute;';
$lang['error_copycontent_invalid_menutext'] = 'N&aacute;zov v menu pre kop&iacute;rovanie id=%d je neplatn&yacute;';
$lang['error_missing_param'] = 'Požadovan&eacute; parametre su neplatn&eacute; alebo chyb&eacute;';
$lang['error_nameexists'] = 'Položka s t&yacute;mto n&aacute;zvom už existuje';
$lang['error_nocontentselected'] = 'Nebol vybran&yacute; žiadny obsah';
$lang['error_permission_denied'] = 'Pr&iacute;stup  zamietnut&yacute;';
$lang['error_upload'] = 'Nahr&aacute;vanie s&uacute;bora s chybou';
$lang['export'] = 'Expotovať';
$lang['export_children'] = 'Exportovať podraden&eacute;';
$lang['export_code'] = 'Expportovať k&oacute;d';
$lang['export_content'] = 'Exportovať obsah';
$lang['extra'] = 'Extra ';
$lang['file'] = 'XML s&uacute;bor';
$lang['friendlyname'] = 'N&aacute;stroje pre pr&aacute;cu s obsahom';
$lang['help'] = '<h3>Čo modul rob&iacute;?</h3>
<p>Modul umožnuje pracovať s roz&scaron;&iacute;ren&yacute;mi funkciami pri pr&aacute;ci s obsahom.</p>
<h3>Funkcie</h3>
<ul>
  <li>Export obsahu do XML</li>
  <li>Import obsahu z XML</li>
  <li>Vytv&aacute;ranie obsahov&yacute; blokov do &scaron;abl&oacute;n.</li>
  <li>Hromadn&eacute; kop&iacute;rovanie str&aacute;nok.</li>
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
$lang['info_available_items'] = 'Vyberte položky niž&scaron;ie pre export &scaron;abl&oacute;n alebo k&oacute;dov';
$lang['info_blockname'] = 'Použ&iacute;vajte iba alfanumerick&eacute; znaky, podčiarovn&iacute;ky a pomlčky';
$lang['info_blockprompt'] = '&Scaron;pecifikovať popisok';
$lang['info_dropdown_options'] = 'Vyberte položky pre v&yacute;berov&eacute; pole.  Jedna položka na každ&yacute; riadok.  Pre n&aacute;zov  a hodnotu položky oddelte hodnoty znakom |.';
$lang['import'] = 'Importovať';
$lang['import_code'] = 'Importovať k&oacute;d';
$lang['import_content'] = 'Importovať obsah';
$lang['list_gcbs'] = 'HTML bloky';
$lang['list_udts'] = 'Už&iacute;vateľsk&eacute; značky';
$lang['moddescription'] = 'Modul s n&aacute;strojami pre roz&scaron;&iacute;ren&uacute; spr&aacute;vu obsahu';
$lang['modules'] = 'Moduly';
$lang['msg_blockadded'] = 'Blok pridan&yacute;';
$lang['msg_blockupdated'] = 'Hodnoty  bloku aktualizovan&eacute;';
$lang['name'] = 'N&aacute;zov';
$lang['new_alias'] = 'Nov&yacute; alia';
$lang['new_menutext'] = 'Nov&yacute; n&aacute;zov v menu ';
$lang['new_name'] = 'Nov&yacute; n&aacute;zov';
$lang['new_parent'] = 'Nov&yacute; nadraden&yacute;';
$lang['parent'] = 'Nadraden&yacute;';
$lang['postinstall'] = 'Modul bol nain&scaron;talovan&yacute;';
$lang['postuninstall'] = 'Modul odin&scaron;talovan&yacute;';
$lang['prompt'] = 'Označenie, zobrazen&eacute; na str&aacute;nke';
$lang['prompt_cols'] = 'Stĺpce';
$lang['prompt_length'] = 'Dĺžka';
$lang['prompt_maxlength'] = 'Maxim&aacute;lna dĺžka';
$lang['prompt_options'] = 'Možnosti';
$lang['prompt_page'] = 'Str&aacute;nka';
$lang['prompt_rows'] = 'Riadky';
$lang['prompt_value'] = 'Hodnota';
$lang['scan'] = 'Skenovať';
$lang['start_page'] = '&Scaron;tartovacia str&aacute;nka';
$lang['submit'] = 'Odoslať';
$lang['type'] = 'Typ';
$lang['usage'] = 'Použitie';
$lang['xml_file'] = 'XML s&uacute;bor';
$lang['utma'] = '156861353.1423109725.1280259016.1283883395.1284147995.32';
$lang['utmz'] = '156861353.1284147995.32.30.utmcsr=dev.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/project/files/873';
$lang['qca'] = 'P0-748439131-1280259017524';
$lang['utmb'] = '156861353.2.10.1284147995';
$lang['utmc'] = '156861353';
?>