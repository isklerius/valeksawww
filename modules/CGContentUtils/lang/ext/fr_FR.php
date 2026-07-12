<?php
$lang['add_block'] = 'Ajouter un nouveau bloc';
$lang['advanced_content_copy'] = 'Copie &eacute;volu&eacute;e du contenu';
$lang['advanced_copy'] = 'Copie &eacute;volu&eacute;e';
$lang['ask_delete_block'] = 'Voulez-vous vraiment supprimer ce bloc ?';
$lang['ask_really_uninstall'] = '&Ecirc;tes-vous certain de vouloir faire cela ?';
$lang['available_items'] = '&Eacute;l&eacute;ment disponible';
$lang['available_templates'] = 'Code disponible';
$lang['blocks'] = 'Blocs';
$lang['blocktype_textinput'] = 'Saisie de texte';
$lang['blocktype_textarea'] = 'Zone de Texte';
$lang['blocktype_dropdown'] = 'Liste d&eacute;roulante';
$lang['blocktype_checkbox'] = 'Bo&icirc;te &agrave; cocher';
$lang['blocktype_file_selector'] = 'S&eacute;lecteur de fichier';
$lang['blocktype_pageselector'] = 'S&eacute;lecteur de page';
$lang['blocktype_radiobuttons'] = 'Boutons radio';
$lang['cancel'] = 'Annuler';
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
$lang['copy'] = 'Copier';
$lang['default_value'] = 'Valeur par d&eacute;faut';
$lang['delete'] = 'Supprimer';
$lang['edit'] = 'Editer';
$lang['error_copycontent_invalid_name'] = 'Le titre sp&eacute;cifi&eacute; pour la copie id =%d est invalide';
$lang['error_copycontent_invalid_menutext'] = 'Le text du menu sp&eacute;cifi&eacute; pour la copie id =% d est invalide';
$lang['error_missing_param'] = 'Un param&egrave;tre requis est manquant ou non valide';
$lang['error_nameexists'] = 'Un &eacute;l&eacute;ment portant ce nom existe d&eacute;j&agrave;';
$lang['error_nocontentselected'] = 'Aucun contenu n&#039;a &eacute;t&eacute; s&eacute;lectionn&eacute;';
$lang['error_permission_denied'] = 'Permission refus&eacute;e';
$lang['error_upload'] = '&Eacute;chec d&#039;envoi de fichiers';
$lang['export'] = 'Exporter';
$lang['export_children'] = 'Exporter les fichiers enfants';
$lang['export_code'] = 'Exporter le code';
$lang['export_content'] = 'Exporter le contenu';
$lang['extra'] = 'Extra ';
$lang['file'] = 'Fichier XML';
$lang['file_selector'] = 'S&eacute;lecteur de fichiers';
$lang['friendlyname'] = 'Utilitaires de contenu (CGContentUtils)';
$lang['help'] = '<h3>Que fait ce module ?</h3>
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
$lang['info_available_items'] = 'S&eacute;lectionner un &eacute;l&eacute;ment ci-dessous pour voir les gabarits ou le code exportables ';
$lang['info_blockname'] = 'Utiliser uniquement des caract&egrave;res alphanum&eacute;riques, des &amp;quot;_&amp;quot; et des tirets';
$lang['info_blockprompt'] = 'Sp&eacute;cifier un prompt lisible';
$lang['info_dropdown_options'] = 'Sp&eacute;cifier les options pour l&#039;affichage en dropdown. Une option par ligne. Sp&eacute;cifier les valeurs possibles pour chacune des options en les s&eacute;parant par un caract&egrave;re &quot;|&quot;.';
$lang['info_filetypes'] = 'Fournir une liste d&#039;extensions de fichiers s&eacute;par&eacute;e par des virgules. p.ex. pdf,jpg,doc';
$lang['info_excludeprefix'] = 'Exclure les fichiers contenant ces pr&eacute;fixes (liste d&#039;extensions de fichiers s&eacute;par&eacute;e par des virgules)';
$lang['import'] = 'Importer';
$lang['import_code'] = 'Importer le Code';
$lang['import_content'] = 'Importer le Contenu';
$lang['list_gcbs'] = 'Bloc de contenu global';
$lang['list_udts'] = 'Balise Utilisateur';
$lang['moddescription'] = 'Un module offrant des outils et utilitaires pour aider &agrave; la gestion de contenu';
$lang['modules'] = 'Modules&nbsp;';
$lang['msg_blockadded'] = 'Bloc ajout&eacute; avec succ&egrave;s';
$lang['msg_blockupdated'] = 'Valeurs du bloc mises &agrave; jour';
$lang['name'] = 'Nom';
$lang['new_alias'] = 'Nouvel alias';
$lang['new_menutext'] = 'Nouveau texte de menu';
$lang['new_name'] = 'Nouveau nom';
$lang['new_parent'] = 'Nouveau Parent';
$lang['parent'] = 'Parent ';
$lang['postinstall'] = 'Le module CGContentUtils a &eacute;t&eacute; install&eacute;';
$lang['postuninstall'] = 'Le module CGContentUtils a &eacute;t&eacute; d&eacute;sinstall&eacute;';
$lang['prompt'] = 'Prompt ';
$lang['prompt_cols'] = 'Colonnes';
$lang['prompt_dir'] = 'R&eacute;pertoire <em>(relatif au r&eacute;pertoire de chargement)</em>';
$lang['prompt_excludeprefix'] = 'Exclure les fichiers avec ces pr&eacute;fixes';
$lang['prompt_filetypes'] = 'Types de fichiers permis';
$lang['prompt_length'] = 'Longueur';
$lang['prompt_maxlength'] = 'Longueur maximum';
$lang['prompt_options'] = 'Options ';
$lang['prompt_page'] = 'Page ';
$lang['prompt_recurse'] = 'Parcourir en r&eacute;cursion les sous-r&eacute;pertoires';
$lang['prompt_rows'] = 'Rang&eacute;es';
$lang['prompt_sortfiles'] = 'Trier les fichiers par nom';
$lang['prompt_value'] = 'Valeur';
$lang['scan'] = 'Scanner';
$lang['start_page'] = 'Page de d&eacute;part';
$lang['submit'] = 'Envoyer';
$lang['type'] = 'Type ';
$lang['usage'] = 'Utilisation';
$lang['xml_file'] = 'Fichier XML';
$lang['qca'] = 'P0-1868798862-1289915740206';
$lang['utmz'] = '156861353.1290510537.13.10.utmcsr=google|utmccn=(organic)|utmcmd=organic|utmctr=cmsms';
$lang['utma'] = '156861353.1598479872.1289915740.1290510537.1290517279.14';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>