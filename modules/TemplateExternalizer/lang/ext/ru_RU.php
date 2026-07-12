<?php
$lang['friendlyname'] = 'Template Externalizer';
$lang['postinstall'] = 'Этот модуль не будет ничего делать до тех пор, пока <em>Режим разработки</ em> не включен. Смотрите раздел Помощь для получения более подробной информации.';
$lang['uninstalled'] = 'Модуль удалён.';
$lang['installed'] = 'Версия % установлена.';
$lang['prefsupdated'] = 'Настройки модуля обновлены.';
$lang['accessdenied'] = 'Нет доступа. Проверьте права пользователя.';
$lang['error'] = 'Ошибка!';
$lang['upgraded'] = 'Модуль обновлён до версии %.';
$lang['moddescription'] = 'Позволяет использовать любой html редактор с поддержкой FTP для редактирования CMS шаблонов и стилей.';
$lang['dev_mode_enabled'] = 'Режим разработки включен.';
$lang['dev_mode_disabled'] = 'Режим разработки выключен.';
$lang['dev_mode_timedout'] = 'Время действия режим разработки закончено.';
$lang['title_dev_mode'] = 'Режим разработки';
$lang['title_timeout'] = 'Время действия режима';
$lang['title_timeout_units'] = 'минут';
$lang['title_cache_path'] = 'Путь к кэш-директории';
$lang['title_template_extension'] = 'Файловые расширение шаблонов';
$lang['title_stylesheet_extension'] = 'Файловые расширение стилей';
$lang['on'] = 'Включен';
$lang['off'] = 'Выключен';
$lang['submit'] = 'Отправить';
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
<p>Copyright © 2006, Tamlyn Rhodes <<a href="http://tamlyn.org">tamlyn.org</a>>. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. 
You must agree to this license before using the module.</p>
';
$lang['utmz'] = '156861353.1210686901.76.26.utmcsr=forum.cmsmadesimple.org|utmccn=(referral)|utmcmd=referral|utmcct=/index.php/board,8.0.html';
$lang['utma'] = '156861353.1046687432.1205149796.1210954385.1211019508.79';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>