<?php
$lang['friendlyname'] = 'Фотоальбомы';
$lang['postinstall'] = 'Альбом установлен. Не забудьте присоединить новую таблицу "Альбом (с предустановленными шаблонами ImageGallery и Thickbox)" стилей к шаблону страницы на которой будет размещен альбом.';
$lang['postuninstall'] = 'Альбом удалён из базы данных.';
$lang['uninstalled'] = 'Модуль удалён';
$lang['installed'] = 'Версия % установлена';
$lang['upgraded'] = 'Модуль обновлён до версии %';
$lang['error_nofilesuploaded'] = 'Ошибка при загрузке данных. Пожалуйста, убедитесь в том, что запись в указанную папку возможна.';
$lang['error'] = 'Ошибка!';
$lang['next_picture'] = 'Следующее изображение';
$lang['admindescription'] = 'Альбомный модуль позволяет вам размещать фотогалереи на вашем вебсайте.';
$lang['accessdenied'] = 'Нет доступа';
$lang['query_failed'] = 'Ошибка при выполнении запроса. Попробуйте запустить скрипт обновления  (вкладка "Опции"). Если это не поможет решить проблему, напишите нам об ошибке.';
$lang['changelog'] = '<ul><li>Версия 0.0.1. 5 Апрель 2006. Исходный вариант.</li></ul>';
$lang['view_default_stylesheet'] = 'Посмотреть таблицу стилей по-умолчанию';
$lang['help_albums'] = 'В этом списке содержатся идентификаторы доступных для просмотра альбомов (если в списке несколько идентификаторов, то они разделяются запятыми).';
$lang['max_image_size'] = '<b>Максимальный размер изображения:</b> Любое изображение больше чем это, будет автоматически уменьшено (если так установлено в шаблоне) с использованием Javascript.';
$lang['help_sortdesc'] = 'Сортировку альбомов лучше производить в убывающем порядке.';
$lang['help_sortpicturesdesc'] = 'Sort pictures in descending order rather than ascending. This will make new pictues that are added to an album to be listed first.<p>Example to show pictures in reverse order:</p><pre>{cms_module module=\'album\' sortpicturesdesc=\'true\'}</pre>';
$lang['templatenameexists'] = 'Ошибка: Шаблон с этим именем уже существует. Пожалуйста выберите другое имя.';
$lang['templateimported'] = 'Шаблон был успешно импортирован в базу данных и готов к использованию.';
$lang['help'] = '<h3>Каково назначение этого элемента?</h3>
<p>Для того, чтобы организовать галерею изображений вы можете использовать этот модуль</p>
<h3>Как мне следует этим воспользоваться?</h3>
<p>Для того, чтобы разместить все альбомы на одной странице, просто введите этот код : </p>
<p><code>{cms_module module=\'album\'}</code></p>
<p>Если вы хотите разместить только некоторые альбомы, используйте такой код:
<p><code>{cms_module module=\'album\' albums=\'1,3\'}</code></p>
<p>Код, указанный выше позволяет вам размещать на странице альбомы, идентификаторы которых соответствуют например 1 и 3. Если поле "альбомы" оставить незаполненным, будут показаны все альбомы.</p>
<h3>Шаблоны</h3>
<p>Таблица стилей, устанавливаемая вместе с модулем имеет предустановленные шаблоны ImageGallery и ThickBox. При удалении модуля данная таблица удаляется автоматически, при обновлении модуля она может быть переписана. Поэтому, если вы хотите редактировать данную таблицу, вам следует создать резервную копию. Присоедините данную таблицу к используемому макету страницы.</p>
<h3>Техническая поддержка</h3>
<p>В соответствии с порядком, установленным общедоступной лицензией данное программное обеспечение поставляется как оно есть. Для получения более полной информации обратитесь к тексту лицензионного соглашения.</p>
<h3>Copyright and License</h3>
<p>Copyright © 2006, dam. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['help_action'] = '<h4>Показать список недавно добавленных изображений</h4>
	 <p>You can show a list of added pictures calling Album like this:</p>
<pre>{cms_module module=\'album\' action=\'recently_updated\'}</pre>
<p><b>Important</b>: You must choose a "<b>Default page that contains Album.</b>" in order to use this feature.</p>
<div style="border:1px solid black;">
<h4>Show random image</h4>
<p>First it counts all rows in the database (accounting the included Albums), finds a random number between \'0\' and the maximum number of rows. With this number the database pointer is being set to a specific row and the data is retrieved from the table and returned.</p>
<h5>How do I use it?</h5>
<p>Just insert the tag into your template/page like: <code>{cms_module module=\'album\' action=\'random_image\'}</code></p>
<p>To show a certain number of random images call it like this:</p>
<code>{cms_module module=\'album\' action=\'random_image\' number=\'10\'}</code>
<h5>What parameters the random_image action take?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>   - Album directory, default is: \'root_url\'/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>      - comma, space, dash or semicolon separated list of albums to show images of.</li>
  <li><em>(optional)</em> <tt>border</tt>      - stylesheetstyled border ala border=\'5px\'</li>
  <li><em>(optional)</em> <tt>picturename</tt> - picturename = True/False, sets a title with the picture name</li>
</ul>
<p><b>Note: These parameters are only available when calling Album with {cms_module module=\'album\' action=\'random_image\'}</b></p>
<p>so for example: {cms_module module=\'album\' action=\'random_image\' albums=\'1,3,4,6\' border=\'3px\' picturename=\'True\'}</p>
</p>
<h5>To Do</h5>
<p>
<ul>
	<li>arrange the classnames of the div tags, and specify the possible use in stylesheets.<br />
		(get rid of the border parameter)</li>
  <li>get the album name from the table album_albums, and make it possible to state it in the output.</li>
  <li>make it possible to link from the picture to the specific album? picture?</li>
  <li>usage of a maximum height/width parameter and size the thumbnail if necessary.</li>
</ul>
</p>
<p>Random Image Author: Frank Prins <<a href="mailto:webmaster@frank-fem.com">webmaster@frank-fem.com</a>></p>
</div>
';
$lang['help_number'] = '<h4>Show a certain number of recently updated pictures</h4>
	 <p>You can show a list of a certain number of pictures by calling Album like this:</pre> <pre>{cms_module module=\'album\' action=\'recently_updated\' number=\'15\'}
';
$lang['addalbum'] = 'Добавить альбом';
$lang['error_nonamegiven'] = 'Новый альбом нужно озаглавить.';
$lang['albumadded'] = 'Альбом внесен в базу данных. Теперь вы можете разместить в нем изображения.';
$lang['albumdeleted'] = 'Удаление альбома из базы данных прошло успешно.';
$lang['noalbumstext'] = 'Вы еще не создали ни одного альбома.';
$lang['addpicture'] = 'Добавить изображения';
$lang['addtemplate'] = 'Добавить шаблон';
$lang['albumidtext'] = 'Идентификаторы';
$lang['albumnametext'] = 'Альбомы';
$lang['albumthumbtext'] = 'Эскизы страниц';
$lang['albumnumpicturestext'] = 'Количество изображений';
$lang['albumreordertext'] = 'Переупорядочить';
$lang['albumactionstext'] = 'Действия';
$lang['Albums'] = 'Альбомы';
$lang['areyousure'] = 'Вы уверены?';
$lang['browsepictures'] = 'Изменить';
$lang['cancel'] = 'Отмена';
$lang['changecomment'] = 'Редактировать комментарий';
$lang['changepicture'] = 'Сменить картинку';
$lang['changethumb'] = 'Изменить';
$lang['changethumbnail'] = 'Сменить эскиз';
$lang['columns'] = 'Максимальное количество колонок эскизов (0 означает неограниченное количество. Используется только в шаблонах таблиц).';
$lang['comment'] = 'Комментарий';
$lang['currenttemplate'] = 'Шаблон списка альбомов';
$lang['currentpicture'] = 'Текущая картинка';
$lang['currentthumbnail'] = 'Текущий эскиз';
$lang['deletealbum'] = 'Удалить';
$lang['deletepicture'] = 'Удалить';
$lang['Help'] = 'Помощь';
$lang['modify'] = 'Изменить';
$lang['moveleft'] = 'Сдвинуть влево';
$lang['moveright'] = 'Сдвинуть вправо';
$lang['multiplealbumtemplate'] = 'Шаблон альбомов, имеющих иерархическую структуру.';
$lang['name'] = 'Имя';
$lang['nocomment'] = '(нет комментариев)';
$lang['nothumbnail'] = '(нет эскизов)';
$lang['picture'] = 'Изображение';
$lang['parentdir'] = '(Исходная папка)';
$lang['pictures'] = 'изображения';
$lang['nopicturetext'] = 'В этом альбоме нет картинок.';
$lang['Picture'] = 'Изображение';
$lang['Pictures'] = 'Изображения';
$lang['Properties'] = 'Установки';
$lang['propertiesupdated'] = 'Установки альбома успешно сохранены.';
$lang['resetthumb'] = 'Сброс эскиза';
$lang['return'] = 'Назад';
$lang['rows'] = 'Максимальное количество рядов эскизов (0 означает неограниченное количество. Используется только в шабонах таблиц).';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album\'s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Check this box to automatically insert the link to the Album stylesheet in head of your page. This should usually be left enabled.';
$lang['selectall'] = 'Выбрать все';
$lang['selectpicture'] = 'Использовать это изображение';
$lang['selectthumb'] = 'Использовать эскиз этого изображения';
$lang['submit'] = 'Сохранить';
$lang['file_templates_help'] = '<b>Это шаблоны которые вы должны инсталлировать в базу данных перед их использованием</b>';
$lang['template'] = 'Шаблон';
$lang['deletetemplate'] = 'Удалить шаблон';
$lang['Template'] = 'Шаблон';
$lang['templatenametext'] = 'Шаблоны';
$lang['Templates'] = 'Шаблоны';
$lang['edittemplate'] = 'Редактировать шаблон';
$lang['templatesaved'] = 'Шаблон успешно занесен в базу данных.';
$lang['errortemplatenameexists'] = 'Шаблон с таким именем уже существует, пожалуйста, подберите другое.';
$lang['error_filenotfound_defaulttemplate'] = 'Не найден файл для этого шаблона.';
$lang['thumbnail'] = 'Эскиз';
$lang['title'] = 'Заголовок';
$lang['uploadpicture'] = 'Загрузить изображение';
$lang['upload'] = 'Загрузить';
$lang['view'] = 'Вид';
$lang['options'] = 'Настройки';
$lang['optionsupdated'] = 'Настройки сохранены.';
$lang['defaultrows'] = 'Максимальное число рядов эскизов для новых альбомов, выставляемое по умолчанию (0 означает неограниченное количество. Используется только в шаблонах таблиц).';
$lang['defaultcolumns'] = 'Максимальное число колонок эскизов, выставляемое по умолчанию (0 означает неограниченное количество. Используется только в шаблонах таблиц).';
$lang['defaulttemplate'] = 'Предустановленный шаблон';
$lang['file_templates'] = 'Доступные шаблоны';
$lang['filename'] = 'Имя файла';
$lang['importtemplate'] = 'Импорт шаблона';
$lang['newtemplate'] = 'Имя для нового шаблона';
$lang['defaultalbumpage'] = 'Страница по-умолчанию, содержащая Альбом. Эта страница должна быть типа "Альбом" или содержать тэг альбома. Требуется если вы и используете recently_updated ';
$lang['album_comment_updated'] = 'Комментарий к альбому был успешно обновлен';
$lang['picture_comment_updated'] = 'Комментарий к изображению был успешно обновлен';
$lang['template_deleted'] = 'The template was successfully deleted from the database';
$lang['error_empty_template'] = 'Error: The template named "%s" that this Album is set to use does not exist. Please go to the Album Admin Panel and assign a different template to this Album.';
$lang['run_upgrade_script'] = 'Run Upgrade Script';
$lang['addcategory'] = 'Добавить категорию';
$lang['categories'] = 'Категории';
$lang['nocategories'] = 'You have not added any categories yet.';
$lang['categorynametext'] = 'Название категории';
$lang['categoryidtext'] = 'Id категории';
$lang['categoryreordertext'] = 'Reorder Category';
$lang['categoryactionstext'] = 'Действия';
$lang['categoryadded'] = 'The category was successfully added to the database.';
$lang['categorymoved'] = 'The category was successfully moved.';
$lang['categoryupdated'] = 'The category was successfully updated.';
$lang['editcategory'] = 'Редактировать категорию';
$lang['categorydeleted'] = 'The category was successfully deleted.';
$lang['error_nocategorynamegiven'] = 'You must give a name to your category.';
$lang['category_listings'] = 'Category Listings';
$lang['album_updated'] = 'The album was successfully updated.';
$lang['uncategorized'] = 'Uncategorized Albums';
$lang['automatic_album_list_template'] = 'Automatic (use template assigned to each album)';
$lang['albummoved'] = 'The album was successfully moved.';
$lang['helpdetailpage'] = '<p>Page to display Albums in.  This can either be a page alias or an id. Used to allow Album pictures 
to be displayed in a different page from the album list.</p> <p>Example of use:</p><pre>{cms_module module=\'album\' detailpage=\'album\'}</pre>';
$lang['help_template'] = '<h3>Список альбомов</h3>

<p>Таблица стилей стандартного альбома имеет предустановленные шаблоны ImageGallery и ThickBox. При удалении модуля данная таблица удаляется автоматически, при его обновлении - автоматически обновляется. Поэтому если вы хотите редактировать данную таблицу, вам следует создать резервную копию. Присоедините данную таблицу к используемому шаблону страницы.</p>

<p>Вы можете воспользоваться "умным тегом"{$albums}, представляющим из себя таблицу. Элементами данной таблицы являются выбранные альбомы.
Структуре альбома посвящена следующий раздел.
Для демонстрации альбомов используйте следующий цикл <code>{foreach from=$albums item=album}{/foreach}</code></p>
<h3>Альбом</h3>
<p>Если в вашем распоряжении находится только один альбом, или же вы выбрали какой-либо особый альбом, вы можете использовать следующий тег {$album}. Данный тег открывает доступ к следующим элементам :</p>
<ul>
	<li>{$album->name} : name</li>
	<li>{$album->comment} : comment</li>
	<li>{$album->columns} : column number</li>
	<li>{$album->rows} : row number</li>
	<li>{$album->thumbnail} : adress (url) of thumbnail</li>
	<li>{$album->link} : link to album</li>
	<li>{$album->picturecount} : number of pictures of an albuv</li>
</ul>
<h3>Список изображений</h3>
<p>Выбрав альбом, вы можете воспользоваться тегом {$pictures} который представляет собой ряды картинок.
Структура изображения описывается в следующем разделе.
Для того, чтобы вызвать список изображений, используйте следующий цикл :
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>
<h3>Изображение</h3>
<p>Выбрав изображение, вы можете воспользоваться тегом  {$picture}. В тех случаях, когда не выбрана ни одна картинка, тег автоматически приписывается к первой.</p>
<ul>
	<li>{$picture->name} : name</li>
	<li>{$picture->comment} : comment</li>
	<li>{$picture->thumbnail} : adress (url) of thumbnail</li>
	<li>{$picture->picture} : adress (url) of picture</li>
	<li>{$picture->link} : link to picture</li>
	<li>{$picture->number} : picture number</li>
</ul>
<h3>Другое</h3>
<p>Вы также можете воспользоваться следующими тегами :</p>
<ul>
	<li>{$returnlink} : back to previous page</li>
	<li>{$albumnumber} : current album number</li>
	<li>{$albumcount} : album count</li>
	<li>{$picturenumber} : current picture number</li>
	<li>{$picturecount} : picture count</li>
	<li>{$pagenumber} : current page number</li>
	<li>{$pagecount} : page count</li>
	<li>{$link.album.1} : link to first album. You can also indicate another number</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : link to first picture. You can also indicate another number</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : link to first page. You can also indicate another number</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>
';
$lang['utmz'] = '156861353.1199273691.20.7.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/forum/forum.php|utmcmd=referral';
$lang['utma'] = '156861353.1045566600.1193164440.1199423969.1199479094.25';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>