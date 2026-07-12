<?php
$lang['changelog'] = '<ul>
  <li>1.0.4 - October 2009
    <p>Adds json support.</p>
  </li>
  <li>1.0.5 - November 2009
    <p>Adds no_css and no_js options to the incjs action.</p>
  </li>
  <li>1.0.6 - April 2010
    <p>Adds calguys date utils plugin.</p>
  </li>
</ul>';
$lang['friendlyname'] = 'JQuery Toolbox ';
$lang['help'] = '<h3>What is this?</h3>
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
<p>-- To allow sorting your tables, give the follwing classes to the table definition: cms_sortable tablesorter. i.e: <code>&amp;lt;table class=&quot;cms_sortable tablesorter&quot;&amp;gt;...&amp;lt;/table&amp;gt;</code></p>
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
$lang['moddescription'] = 'En verkt&oslash;ykasse med Jquery verkt&oslash;y som bist&aring;r i opprettelse av dynamiske og fancy CMS Made Simple moduler go nettsteder';
$lang['param_action'] = 'Spesifiser handlingen som skal kalles. Mulige verdier er:<ul><li>incjs - Include required javascript files.</li><li>ready - Output default ready function.</li></ul>';
$lang['param_exclude'] = 'Kun gyldig til incjs handlingen. Denne parameteren tillater &aring; utelukke bestemte jquery programtillegg fra visningen som genereres. Mulige verdier er: tablesorter,cluetip,form.';
$lang['param_include'] = 'Kun gyldig til incjs handlingen. Denne parameteren tilalter &aring; eksplisitt inkludere bestemte jquery programtillegg og utelukke alle andre. Om denne parameteren er spesifisert, vil eksluder parameteren bli ignorert.  Mulige verdier er tablesorter,cluetip,form.';
$lang['param_no_css'] = 'Gjelder kun til incjs handlingen, dette vil ekskludere css koder fra &aring; bli sendt ut';
$lang['param_no_js'] = 'Gjelder kun til incjs handlingen, dette vil ekskludere scro[t koder fra &aring; bli sendt ut';
$lang['postinstall'] = 'JQueryTools modulen ahr blitt installert.... pr&oslash;v den';
$lang['postuninstall'] = 'JQueryTools modulen har blitt avinstallert';
$lang['preuninstall'] = '&Aring; fjerne denne modulen kan skade oppf&oslash;rselen og funksjonaliteten p&aring; ditt nettsted. Er du sikker p&aring; at du vil fortsette avinstallasjonen?';
$lang['utmz'] = '156861353.1279922282.3039.70.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php';
$lang['utma'] = '156861353.179052623084110100.1210423577.1280091346.1280174240.3055';
$lang['qca'] = '1210971690-27308073-81952832';
$lang['utmb'] = '156861353.1.10.1280174240';
$lang['utmc'] = '156861353';
?>