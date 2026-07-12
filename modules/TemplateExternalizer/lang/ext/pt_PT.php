<?php
$lang['friendlyname'] = 'Template Externalizer';
$lang['postinstall'] = 'Este m&oacute;dulo n&atilde;o vai fazer nada at&eacute; <em>Desenvolvimento Mode </ em> for ligado. Veja a se&ccedil;&atilde;o Ajuda para mais informa&ccedil;&otilde;es.';
$lang['uninstalled'] = 'M&oacute;dulo Desinstalado.';
$lang['installed'] = 'M&oacute;dulo vers&atilde;o %s instalado.';
$lang['prefsupdated'] = 'Prefer&ecirc;ncias do M&oacute;dulo Actualizadas.';
$lang['accessdenied'] = 'Accesso negado. Confira as suas permiss&otilde;es.';
$lang['error'] = 'Erro!';
$lang['upgraded'] = 'M&oacute;dulo actualizado para a vers&atilde;o  %s.';
$lang['moddescription'] = 'Permite que qualquer FTP-habilitado editores texto ou HTML para editar CMS templates e stylesheets.';
$lang['dev_mode_enabled'] = 'Modo de Desenvolvimento  habilitado.';
$lang['dev_mode_disabled'] = 'Modo de Desenvolvimento  desabilitado.';
$lang['dev_mode_timedout'] = 'Modo de Desenvolvimento  timed out.';
$lang['title_dev_mode'] = 'Modo de Desenvolvimento';
$lang['title_timeout'] = 'Dev Mode Timeout';
$lang['title_timeout_units'] = 'minutos';
$lang['title_cache_path'] = 'Cache Caminho';
$lang['title_template_extension'] = 'Template arquivo extens&atilde;o';
$lang['title_stylesheet_extension'] = 'Stylesheet arquivo extens&atilde;o';
$lang['on'] = 'On';
$lang['off'] = 'Off';
$lang['submit'] = 'Submeter';
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
$lang['utmz'] = '156861353.1206008935.7.3.utmccn=(organic)|utmcsr=google|utmctr=force all access to /admin to SSL|utmcmd=organic';
$lang['utma'] = '156861353.819086544.1205945054.1206049679.1206054385.12';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>