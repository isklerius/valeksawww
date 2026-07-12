<?php
$lang['changelog'] = 'Todo';
$lang['friendlyname'] = 'JQuery Eszk&ouml;zt&aacute;r';
$lang['help'] = '<h3>What is this ?</h3>
<p>This module provides <a href="http://www.jquery.com">jQuery</a> functionality to CMS Made Simple page, and modules (even in the admin section), conveniently and easily.  It provides functionality like ajax, tooltips, sortable tables, and anything else you can do with jquery in one nice, easy to use package.</p>
<h3>How do I use it?</h3>
<p>To enable JQueryTools you must include at least one tag in the head section of your page template, or in the metadata section of each required page.  Use this tag: <code>{JQueryTools action=incjs}</code></p>
<p>Additionally, you can include a second tag to include the javascript that provides the default ready function. <code>{JQueryTools action=ready}</code></p>
<p>This module does not provide samples and instructions as to how to use jquery or the various addon libraries that we include.  to learn how to use these libraries you will need to read the documentation for the plugins at their respective home page.</p>
<h3>What jquery version is included?</h3>
<p>Currently JQueryTools uses jquery 1.2.5</p>
<h3>What JQuery plugins are included</h3>
<ul>
  <li>dimensions</li>
  <li>hoverIntent</li>
  <li>metadata</li>
<li>tablesorter <em>(see <a href="http://tablesorter.com">http://tablesorter.com</a> for usage instructions)</em>
<p>-- To allow sorting your tables, give the follwing classes to the table definition: cms_sortable tablesorter. i.e: <code><table class=&quot;cms_sortable tablesorter&quot;>...</table></code></p>
  </li>
  <li>cluetip <em>(see <a href="http://plugins.learningjquery.com/cluetip/">http://plugins.learningjquery.com/cluetip/</a> for usage instructions)</em></li>
  <li>form <em>(see <a href="http://malsup.com/jquery/form/">http://malsup.com/jquery/form/</a> for usage instructions)</em></li>
  <li>lightbox <em>(see <a href="http://leandrovieira.com/projects/jquery/lightbox/">http://leandrovieira.com/projects/jquery/lightbox/</a> for usage instructions)</em></li>
  <li>fancybox <em>(see <a href="http://fancy.klade.lv/">http://fancy.klade.lv/</a> for usage instructions)</em></li>
</ul>
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
$lang['moddescription'] = 'Jquery eszk&ouml;z&ouml;k t&aacute;rh&aacute;za, ami seg&iacute;t vonz&oacute; &eacute;s dinamikus CMS Made Simple modulok &eacute;s site-ok k&eacute;sz&iacute;t&eacute;s&eacute;ben.';
$lang['param_action'] = 'Add meg a megh&iacute;vand&oacute; akci&oacute;t. Lehets&eacute;ges &eacute;rt&eacute;kek:<ul><li>incjs - Sz&uuml;ks&eacute;ges javascript f&aacute;jlok include-ol&aacute;sa.</li><li>ready - Alap&eacute;rtelmezett ready f&uuml;ggv&eacute;ny v&eacute;grehajt&aacute;sa.</li></ul>';
$lang['param_exclude'] = 'Applicable only to the incjs action, this parameter allows excluding certain jquery plugins from the output generated.  Possible values are: tablesorter,cluetip,form.';
$lang['param_include'] = 'Applicable only to the incjs action, this parameter allows explicitly including certain jquery plugins whilst excluding all others.  If this parameter is specified, the exclude parameter will be ignored.  Possible values are tablesorter,cluetip,form.';
$lang['postinstall'] = 'A JQueryTools modult sikeresen telep&iacute;tett&uuml;k... kezdődhet a crack-el&eacute;s!';
$lang['postuninstall'] = 'A JQueryTools modult sikeresen elt&aacute;vol&iacute;tottuk';
$lang['preuninstall'] = 'Ennek a modulnak az elt&aacute;vol&iacute;t&aacute;sa t&ouml;nkreteheti a site megjelen&eacute;s&eacute;t / funkcionalit&aacute;s&aacute;t. Biztos folytatod?';
$lang['utma'] = '156861353.1533605959.1224742544.1241159145.1241169959.16';
$lang['utmz'] = '156861353.1239430985.12.4.utmcsr=themes.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>