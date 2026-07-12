<?php
$lang['changelog'] = '<ul>
  <li>1.0.4 - October 2009
    <p>Adds json support.</p>
  </li>
  <li>1.0.5 - November 2009
    <p>Adds no_css and no_js options to the incjs action.</p>
  </li>
</ul>';
$lang['friendlyname'] = 'JQuery Tools';
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>Dieses Modul f&uuml;gt einer CMS made simple Webseite und Modulen (insbesondere der Administration) <a href="http://www.jquery.com">jQuery</a>-Funktionalit&auml;ten hinzu, bequem und einfach. Damit werden Funktionen wie etwa Ajax, Tooltips, sortierbare Tabellen und alles andere, was Sie sonst noch mit jQuery tun k&ouml;nnen, in einem einfach zu verwendenden Paket bereitgestellt.</p>
<h3>Wie wird es eingesetzt?</h3>
<p>Um die JQueryTools zu aktivieren, m&uuml;ssen Sie mindestens einen Tag in den head-Bereich Ihrer Templates oder in den Metadaten-Bereich der Seiten, in denen jQuery ben&ouml;tigt wird, einf&uuml;gen. Verwenden Sie daf&uuml;r diesen Tag: <code>{JQueryTools action=incjs}</code></p>
<p>Zus&auml;tzlich k&ouml;nnen Sie einen zweiten Tag einf&uuml;gen, der das Javascript f&uuml;r die voreingestellte Funktion verlinkt. <code>{JQueryTools action=ready}</code></p>
<p>Dieses Modul enth&auml;lt keine Beispiele und Anleitungen, wie Sie jQuery oder die verschiedenen mitgelieferten Plugins verwenden k&ouml;nnen. Um mehr &uuml;ber die Verwendung zu erfahren, lesen Sie bitte die Dokumentation auf deren Webseiten.</p>
<h3>Welche jquery-Version wird mitgeliefert?</h3>
<p>Das aktuelle JQueryTools-Modul verwendet jquery 1.2.5</p>
<h3>Welche JQuery-Plugins werden mitgeliefert?</h3>
<ul>
  <li>dimensions</li>
  <li>hoverIntent</li>
  <li>metadata</li>
<li>tablesorter <em>(weitere Informationen dazu unter <a href="http://tablesorter.com">http://tablesorter.com</a>)</em>
<p>-- Um das Sortieren von Tabellen zu erm&ouml;glichen, m&uuml;ssen Sie Ihren Tabellen die CSS-Klasse &quot;cms_sortable tablesorter&quot; zuordnen. Z.Bsp.: <code><table class=&quot;cms_sortable tablesorter&quot;>...</table></code></p>
  </li>
  <li>cluetip <em>(weitere Informationen dazu unter <a href="http://plugins.learningjquery.com/cluetip/">http://plugins.learningjquery.com/cluetip/</a>)</em></li>
  <li>form <em>(weitere Informationen dazu unter <a href="http://malsup.com/jquery/form/">http://malsup.com/jquery/form/</a>)</em></li>
  <li>lightbox <em>(weitere Informationen dazu unter <a href="http://leandrovieira.com/projects/jquery/lightbox/">http://leandrovieira.com/projects/jquery/lightbox/</a>)</em></li>
  <li>fancybox <em>(weitere Informationen dazu unter <a href="http://fancy.klade.lv/">http://fancy.klade.lv/</a>)</em></li>
</ul>
<h3>Support</h3>
<p>Dieses Modul beinhaltet keinen kommerziellen Support. Sie k&ouml;nnen jedoch &uuml;ber folgende M&ouml;glichkeiten Hilfe zu dem Modul erhalten:</p>
<ul>
<li><li>F&uuml;r die letzte Version dieses Moduls, FAQs, dem Versand eines Fehlerreports oder dem Kauf kommerziellen Support besuchen Sie bitte die <a href="http://calguy1000.com">Projektseite</a> des Moduls.</li>
<li>Weitere Diskussionen zu diesem Modul sind auch in den Foren von <a href="http://forum.cmsmadesimple.org">CMS Made Simple</a> zu finden.</li>
<li>Der Autor calguy1000, ist h&auml;ufig im <a href="irc://irc.freenode.net/#cms">CMS IRC Channel</a> zu finden.</li>
<li>Letztlich erreichen Sie den Autor auch &uuml;ber eine direkte Email.</li>  
</ul>
<p>Nach der GPL wird diese Software so ver&ouml;ffentlicht, wie sie ist. Bitte lesen Sie den Lizenztext f&uuml;r den vollen Haftungsausschluss.</p>
<h3>Copyright und Lizenz</h3>
<p>Copyright &copy; 2008, Robert Campbell <a href="mailto:calguy1000@cmsmadesimple.org">calguy1000@cmsmadesimple.org</a>. Alle Rechte vorbehalten.</p>
<p>Dieses Modul wurde unter der <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a> ver&ouml;ffentlicht. Sie m&uuml;ssen dieser Lizenz zustimmen, bevor Sie das Modul verwenden.</p>
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
$lang['moddescription'] = 'Ein Werkzeugkasten mit jQuery-Hilfsmitteln, um dynamische und raffinierte Module und Webseiten zu erstellen.';
$lang['param_action'] = 'Geben Sie eine Aktion an, die aufgerufen werden soll. M&ouml;gliche Werte sind:
<ul>
  <li>incjs &ndash; bindet die ben&ouml;tigten JavaScript-Dateien ein</li>
  <li>ready &ndash; Standard-Bereitschaftsfunktion ausgeben</li>
</ul>';
$lang['param_exclude'] = 'Kann nur mit der Aktion &quot;incjs&quot; verwendet werden, damit k&ouml;nnen bestimmte jquery-Plugins von der Ausgabe ausgeschlossen werden. M&ouml;gliche Werte sind: tablesorter, cluetip, form.';
$lang['param_include'] = 'Kann nur mit der Aktion &quot;incjs&quot; verwendet werden, damit k&ouml;nnen bestimmte jquery-Plugins eingeschlossen werden, w&auml;hrenddessen alle anderen ausgeschlossen sind. Ist dieser Parameter angegeben, wird der exclude-Parameter ignoriert. M&ouml;gliche Werte sind: tablesorter, cluetip, form.';
$lang['param_no_css'] = 'Kann nur mit der Aktion &quot;incjs&quot; verwendet werden, damit werden die CSS-Tags von der Ausgabe ausgeschlossen';
$lang['param_no_js'] = 'Kann nur mit der Aktion &quot;incjs&quot; verwendet werden, damit werden die scro[t-Tags von der Ausgabe ausgeschlossen';
$lang['postinstall'] = 'Die jQuery-Tools wurden installiert ... los geht&#039;s!';
$lang['postuninstall'] = 'Die jQuery-Tools wurden deinstalliert.';
$lang['preuninstall'] = 'Die Entfernung dieses Moduls kann das Erscheinungsbild und die Funktionsweise Ihrer Website erheblich beeintr&auml;chtigen. Wollen Sie wirklich weitermachen?';
$lang['utma'] = '156861353.717462736.1147511856.1262591531.1262602891.396';
$lang['utmz'] = '156861353.1262560100.393.7.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/projects/gallery|utmcmd=referral';
$lang['qca'] = '1246469815-37371011-11931623';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>