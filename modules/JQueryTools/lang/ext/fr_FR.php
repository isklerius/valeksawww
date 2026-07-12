<?php
$lang['changelog'] = '<ul>
  <li>1.0.4 - Octobre 2009
    <p>Ajout du support pour json.</p>
  </li>
  <li>1.0.5 - Novembre 2009
    <p>Ajout des options no_css et no_js &agrave; l&#039;action incjs.</p>
  </li>
  <li>1.0.6 - Avril 2010
    <p>Ajout du plugin utilitaire date de Calguys.</p>
  </li>
<li>1.0.9 - Septembre 2010
    <p>Ajout du param&egrave;tre no_jquery &agrave; l&#039;action incjs..</p>
    <P>ne g&eacute;n&egrave;re pas de tag jquery pour aucun module (action ou admin_action) so la version du module est >= CMS 1.9-beta1</p>
  </li>

</ul>';
$lang['friendlyname'] = 'Bo&icirc;te &agrave; outils JQuery';
$lang['help'] = '<h3>Qu&#039;est-ce que c&#039;est?</h3>
<p>Ce module permet d&#039;utiliser les fonctionnalit&eacute;s <a href="http://www.jquery.com">jQuery</a> sur la page CMS Made Simple et ses modules (m&ecirc;me dans la section admin) de fa&ccedil;on pratique et facile.  Il permet d&#039;utiliser des fonctionnalit&eacute;s comme ajax, tooltips, des tables triables et toutes les autres op&eacute;rations que l&#039;on peut faire avec jquery en un seul module pratique et facile.</p>
<h3>Comment l&#039;utiliser?</h3>
<p>Pour activer JQueryTools, on doit inclure au moins une balise dans la section head de votre gabarit, ou dans la section metadata de chaque page o&ugrave; cela est requis.  Utilisez cette balise : <code>{JQueryTools action=incjs}</code></p>
<p>De plus, vous pouvez inclure un seconde balise pour inclure le javascript qui fournit la fonction pr&ecirc;te par d&eacute;faut. <code>{JQueryTools action=ready}</code></p>
<p>Ce module ne fournit pas d&#039;&eacute;chantillons et d&#039;instructions sur la fa&ccedil;on d&#039;utiliser jquery ou sur les nombreux plugiciels de la librairie que nous avons incluse. Pour savoir comment utiliser ces libraries vous devez lire la documentation pour les plugiciels sur leur site web respectif.</p>
<h3>Quelle version jquery est incluse?</h3>
<p>JQueryTools fonctionne avec jquery 1.2.5</p>
<h3>Quels JQuery plugiciuels sont inclus</h3>
<ul>
  <li>dimensions</li>
  <li>hoverIntent</li>
  <li>metadata</li>
<li>tablesorter <em>(voir <a href="http://tablesorter.com">http://tablesorter.com</a> pour les instructions d&#039;utilisation)</em>
<p>-- Pour permettre le tri de vos tables, assignez les classes suivantes &agrave; la d&eacute;finition des tables : cms_sortable tablesorter. p.ex. : <code><table class=&quot;cms_sortable tablesorter&quot;>...</table></code></p>
  </li>
  <li>cluetip <em>(voir <a href="http://plugins.learningjquery.com/cluetip/">http://plugins.learningjquery.com/cluetip/</a> pour les instructions d&#039;utilisation)</em></li>
  <li>form <em>(voir <a href="http://malsup.com/jquery/form/">http://malsup.com/jquery/form/</a> pour les instructions d&#039;utilisation)</em></li>
  <li>lightbox <em>(voir <a href="http://leandrovieira.com/projects/jquery/lightbox/">http://leandrovieira.com/projects/jquery/lightbox/</a> pour les instructions d&#039;utilisation)</em></li>
  <li>fancybox <em>(voir <a href="http://fancy.klade.lv/">http://fancy.klade.lv/</a> fpour les instructions d&#039;utilisation)</em></li>
</ul>
<h3>Soutien technique</h3>
<p>Ce module ne comprend pas de soutien technique commercial. Toutefois, plusieurs ressources sont disponibles pour vous aider :</p>
<ul>
<li>Pour la derni&egrave;re version de ce module, la FAQ, ou pour envoyer un rapport de bogue ou pour payer pour du soutien technique, veuillez consulter le site du module calguy\&#039;s
&agrave; l&#039;adresse <a href="http://calguy1000.com">calguy1000.com</a>.</li>
<li>On peut aussi consulter des discussions additionnelles pour ce module &agrave; l&#039;adresse <a href="http://forum.cmsmadesimple.org">Forums CMS Made Simple</a>.</li>
<li>On peut rejoindre l&#039;auteur, calguy1000, sur le<a href="irc://irc.freenode.net/#cms">Canal IRC CMS</a>.</li>
<li>Finalement, vous pouvez aussi tenter de rejoindre l&#039;auteur directement par courriel.</li>  
</ul>
<h3>Droits d&#039;auteur et license</h3>
<p>Copyright &copy; 2008, Robert Campbel <a href="mailto:calguy1000@cmsmadesimple.org"><calguy1000@cmsmadesimple.org></a>. Tous droits r&eacute;serv&eacute;s.</p>
<p>This program is free software; you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation; either version 2 of the License, or (at your option) any later version.</p>
<p>However, as a special exception to the GPL, this software is distributed as an addon module to CMS Made Simple.  You may not use this software in any Non GPL version of CMS Made simple, or in any version of CMS Made simple that does not indicate clearly and obviously in its admin  section that the site was built with CMS Made simple.</p>
<p>This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.
You should have received a copy of the GNU General Public License along with this program; if not, write to the Free Software Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA Or read it <a href="http://www.gnu.org/licenses/licenses.html#GPL">online</a></p>';
$lang['moddescription'] = 'Une bo&icirc;te &agrave; outils des utilitaires Jquery pour aider &agrave; la cr&eacute;ation de modules et de sites web dynamiques et sophistiqu&eacute;s CMS Made Simple';
$lang['param_action'] = 'Sp&eacute;cifier l&#039;action &agrave; s&eacute;lectionner.  Les valeurs possibles sont :<ul><li>incjs - Inclut les fichiers javascript requis.</li><li>pr&ecirc;t - fonction pr&ecirc;te pour le contenu g&eacute;n&eacute;r&eacute; par d&eacute;faut.</li></ul>';
$lang['param_exclude'] = 'Valable seulement pour l&#039;action incjs, ce param&egrave;tre permet l&#039;exclusion de certains plugiciels jquery du contenu g&eacute;n&eacute;r&eacute;.  Les valeurs possibles sont : tablesorter, cluetip, form.';
$lang['param_include'] = 'Valable seulement pour l&#039;action incjs, ce param&egrave;tre permet l&#039;inclusion explicite de certains plugiciels jquery tout en excluant tous les autres. Si ce param&egrave;tre est r&eacute;f&eacute;renc&eacute;, le param&egrave;tre d&#039;exclusion sera ignor&eacute;.  Les valeurs possibles sont tablesorter, cluetip, form.';
$lang['param_no_css'] = 'Valable seulement pour l&#039;action incjs, ceci emp&ecirc;che les balises css d&#039;&ecirc;tre g&eacute;n&eacute;r&eacute;es';
$lang['param_no_js'] = 'Valable seulement pour l&#039;action incjs, ceci emp&ecirc;che les balises scripts d&#039;&ecirc;tre g&eacute;n&eacute;r&eacute;es';
$lang['param_no_query'] = 'Valable seulement pour l&#039;action incjs, ceci emp&ecirc;che Jquery d&#039;&ecirc;tre inclut';
$lang['postinstall'] = 'Le module JQueryTools a &eacute;t&eacute; install&eacute;.... passez &agrave; l&#039;action';
$lang['postuninstall'] = 'Le module JQueryTools a &eacute;t&eacute; d&eacute;sintall&eacute;';
$lang['preuninstall'] = 'Supprimer ce module pourrait endommager l&#039;apparence et la fonctionnalit&eacute; de votre site web.  &Ecirc;tes-vous certaine de vouloir poursuivre?';
$lang['utma'] = '156861353.825179197.1282414335.1286109386.1286113172.38';
$lang['utmz'] = '156861353.1285707361.33.8.utmcsr=feedburner|utmccn=Feed: cmsmadesimple/blog (CMS Made Simple)|utmcmd=feed|utmcct=Google Reader';
$lang['qca'] = 'P0-1665669797-1282414335573';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>