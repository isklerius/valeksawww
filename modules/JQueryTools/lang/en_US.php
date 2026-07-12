<?php
#A


#B


#C
$lang['changelog'] = <<<EOT
<ul>
  <li>1.0.4 - October 2009
    <p>Adds json support.</p>
  </li>
  <li>1.0.5 - November 2009
    <p>Adds no_css and no_js options to the incjs action.</p>
  </li>
  <li>1.0.6 - April 2010
    <p>Adds calguys date utils plugin.</p>
  </li>
  <li>1.0.9 - September 2010
    <p>Adds no_jquery option to the incjs action.</p>
    <P>Do not output jquery tags for any module actions or admin actions if CMS Version is >= CMS 1.9-beta1</p>
  </li>
  <li>1.0.10 - November 2010
    <p>Fixes for CMSMS 1.9 where JQuery is installed by default.</p>
  </li>
</ul>
EOT;

#D


#E


#F
$lang['friendlyname'] = 'JQuery Toolbox';


#G


#H
$lang['help'] = <<<EOT
<h3>What is this?</h3>
<p>This module provides <a href="http://www.jquery.com">jQuery</a> functionality to CMS Made Simple page, and modules (even in the admin section), conveniently and easily.  It provides functionality like ajax, tooltips, sortable tables, and anything else you can do with jquery in one nice, easy to use package.</p>
<h3>How do I use it?</h3>
<p>To enable JQueryTools you must include at least one tag in the head section of your page template, or in the metadata section of each required page.  Use this tag: <code>{JQueryTools action=incjs}</code></p>
<p>Additionally, you can include a second tag to include the javascript that provides the default ready function. <code>{JQueryTools action=ready}</code></p>
<p>This module does not provide samples and instructions as to how to use jquery or the various addon libraries that we include.  to learn how to use these libraries you will need to read the documentation for the plugins at their respective home page.</p>
<h3>What jquery version is included?</h3>
<p>Currently JQueryTools uses jquery 1.3.2</p>
<h3>What JQuery plugins are included</h3>
<ul>
  <li>dimensions</li>
  <li>hoverIntent</li>
  <li>metadata</li>
<li>tablesorter <em>(see <a href="http://tablesorter.com">http://tablesorter.com</a> for usage instructions)</em>
<p>-- To allow sorting your tables, give the follwing classes to the table definition: cms_sortable tablesorter. i.e: <code>&lt;table class="cms_sortable tablesorter"&gt;...&lt;/table&gt;</code></p>
  </li>
  <li>cluetip <em>(see <a href="http://plugins.learningjquery.com/cluetip/">http://plugins.learningjquery.com/cluetip/</a> for usage instructions)</em></li>
  <li>form <em>(see <a href="http://malsup.com/jquery/form/">http://malsup.com/jquery/form/</a> for usage instructions)</em></li>
  <li>fancybox <em>(see <a href="http://fancy.klade.lv/">http://fancy.klade.lv/</a> for usage instructions)</em></li>
</ul>
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


#J


#K


#L


#M
$lang['moddescription'] = 'A toolbox of Jquery utilities to aide in creating dynamic and fancy CMS Made Simple modules and websites';

#N


#O


#P
$lang['param_action'] = 'Specify the action to be called.  Possible values are:<ul><li>incjs - Include required javascript files.</li><li>ready - Output default ready function.</li></ul>';
$lang['param_exclude'] = 'Applicable only to the incjs action, this parameter allows excluding certain jquery plugins from the output generated.  Possible values are: tablesorter,cluetip,form.';
$lang['param_include'] = 'Applicable only to the incjs action, this parameter allows explicitly including certain jquery plugins whilst excluding all others.  If this parameter is specified, the exclude parameter will be ignored.  Possible values are tablesorter,cluetip,form.';
$lang['param_no_css'] = 'Applicable only to the incjs action, this will exclude css tags from being output';
$lang['param_no_js'] = 'Applicable only to the incjs action, this will exclude script tags from being output';
$lang['param_no_query'] = 'Applicable only to the incjs action, this will exclude jquery from being included';
$lang['postinstall'] = 'The JQueryTools module has been installed.... get crackin';
$lang['postuninstall'] = 'The JQueryTools module has been uninstalled';
$lang['preuninstall'] = 'Removing this module could damage the appearance and functionality of your website.  Are you sure you want to continue?';

#Q


#R


#S


#T


#U


#V


#W


#X


#Y


#Z


?>
