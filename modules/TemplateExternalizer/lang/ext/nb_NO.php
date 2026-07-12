<?php
$lang['friendlyname'] = 'Template Externalizer ';
$lang['postinstall'] = 'Denne modulen vil ikke gj&oslash;re noe f&oslash;r <em>Development Mode</em> er p&aring;sl&aring;tt. Se i hjelp seksjonen for mer informasjon.';
$lang['uninstalled'] = 'Modul avinstallert.';
$lang['installed'] = 'Modul versjon %s installert.';
$lang['prefsupdated'] = 'Modulinnstillinger oppdatert.';
$lang['accessdenied'] = 'Tilgang nektet. Vennligst sjekk dine rettigheter.';
$lang['error'] = 'Feil!';
$lang['upgraded'] = 'Modul oppgradert til versjon %s.';
$lang['moddescription'] = 'Tillater enhver tekst eller HTML editor med FTP st&oslash;tte &aring; redigere CMS maler og stilark.';
$lang['dev_mode_enabled'] = 'Development Mode p&aring;sl&aring;tt.';
$lang['dev_mode_disabled'] = 'Development Mode avsl&aring;tt.';
$lang['dev_mode_timedout'] = 'Development Mode timet ut.';
$lang['title_dev_mode'] = 'Development Modus';
$lang['title_timeout'] = 'Dev Mode timet ut';
$lang['title_timeout_units'] = 'minutter';
$lang['title_cache_path'] = 'Cache sti';
$lang['title_template_extension'] = 'Mal filendelse';
$lang['title_stylesheet_extension'] = 'Stilark filendelse';
$lang['on'] = 'P&aring;';
$lang['off'] = 'Av';
$lang['submit'] = 'Utf&oslash;r';
$lang['changelog'] = '<ul>
<li>Version 1.0.4 13 December 2006. Added german translation, fixed some untranslatable text</li>
<li>Version 1.0.3 27 September 2006. Added redirect after save, muted E_NOTICE error</li>
<li>Version 1.0.2 29 August 2006. Fixed lazy loading for CMS 1.0beta6</li>
<li>Version 1.0.1 9 June 2006. Special characters in filenames are escaped. Fixed another bug.</li>
<li>Version 1.0 28 May 2006. Initial Release.</li>
</ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>It allows you to use any external editor to edit your templates and stylesheets.</p>
<h3>How Do I Use It</h3>
<p>First configure the path where you would like the template files to be saved. 
The default is tmp/externalizer/ which should work for most people. Next turn on
<em>Development Mode</em> which exports each template and stylesheet from the 
database to files. You may now edit the files however you like and any changes are 
automatically detected, imported to the database and take effect immediately.</p>

<p>If you edit or add new templates or stylesheets using the normal web interface 
while <em>Development Mode</em> is on, these changes will be exported to the files. 
Any files in the template path whose names do not correspond to existing templates
will be ignored.</p>

<p>When you have finished 
editing the files you should turn <em>Development Mode</em> off otherwise it 
will affect performance. However, if no changes are made to any of the files for 
<em>Timeout</em> minutes, <em>Development Mode</em> will turn itself off 
automatically. Set <em>Timeout</em> to 0 to disable this feature.</p>

<h3>Copyright and License</h3>
<p>Copyright &copy; 2006, Tamlyn Rhodes <<a href=&quot;http://tamlyn.org&quot;>tamlyn.org</a>>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. 
You must agree to this license before using the module.</p>
';
$lang['utma'] = '156861353.525406812.1188077417.1200082866.1200085538.341';
$lang['utmz'] = '156861353.1198323983.331.19.utmccn=(referral)|utmcsr=cmsmadesimple.org|utmcct=/|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>