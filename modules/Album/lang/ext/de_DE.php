<?php
$lang['friendlyname'] = 'Fotoalbum';
$lang['postinstall'] = '<p>Das Modul Album wurde installiert.</p><p><b>Hinweis: Wenn Sie bei dem Versuch, die Vorschaubilder zu generieren, die Fehlermeldung 403 erhalten, m&uuml;ssen Sie den umask-Wert von &quot;022&quot; auf &quot;002&quot; &auml;ndern (Administration, Men&uuml; Administrator > Globale Einstellungen).</b></p>';
$lang['postuninstall'] = 'Die Album-Daten wurden aus der Datenbank entfernt.';
$lang['uninstalled'] = 'Das Modul wurde deinstalliert.';
$lang['installed'] = 'Die Version %s wurde installiert.';
$lang['upgraded'] = 'Das Modul wurde auf Version %s aktualisiert.';
$lang['error_nofilesuploaded'] = 'Beim Hochladen gab es einen Fehler. Bitte pr&uuml;fen Sie, ob der Ordner beschreibbar ist.';
$lang['error'] = 'Fehler!';
$lang['next_picture'] = 'N&auml;chstes Bild';
$lang['admindescription'] = 'Mit dem Album-Modul k&ouml;nnen Sie auf Ihrer Webseite Fotogalerien anzeigen lassen.';
$lang['accessdenied'] = 'Zugriff verweigert!';
$lang['query_failed'] = 'Eine Abfrage ist fehlgeschlagen. Versuchen Sie, im Reiter &quot;Optionen&quot; den Link &quot;Run Upgrade Script&quot; zu klicken. Falls dies das Problem nicht behebt, schicken Sie bitte eine Fehlermeldung.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 April 2006. Erstes Release.</li></ul>';
$lang['view_default_stylesheet'] = 'Standard-Stylesheet anzeigen';
$lang['help_albums'] = 'Eine Liste mit einer oder mehreren (durch Komma getrennten) IDs der Alben, die angezeigt werden sollen.';
$lang['max_image_size'] = '<b>Maximale Bildgr&ouml;&szlig;e:</b> Jedes Bild, was diese Gr&ouml;&szlig;e &uuml;berschreitet, wird automatisch &uuml;ber ein Javascript auf diesen Wert skaliert. Hinweis: Aktuell verwendet nur das &quot;Tables&quot;-Template diese Einstellung.';
$lang['help_sortdesc'] = 'Alben lieber in absteigender als aufsteigender Reihenfolge sortieren';
$lang['help_sortpicturesdesc'] = 'Bilder in absteigender statt in aufsteigender Reihenfolge sortieren. Dies bewirkt, dass neu hinzugef&uuml;gte Bilder zu erst angezeigt werden. <p>Beispiel f&uuml;r absteigende Sortierung:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Fehler: Ein Template mit diesem Namen existiert bereits. Bitte vergeben Sie einen anderen Namen.';
$lang['templateimported'] = 'Das Template wurde in die Datenbank importiert und kann jetzt verwendet werden.';
$lang['help'] = '<h3>Was macht dieses Modul?</h3>
<p>Mit diesem Modul k&ouml;nnen Sie Bildergalerien verwalten.</p>
<h3>Wie wird es eingesetzt?</h3>
<p>Gehen Sie zun&auml;chst zu Inhalte -> Fotoalbum, erstellen die gew&uuml;nschten Alben und f&uuml;gen dann die Bilder hinzu.</p>
<p>Um alle Alben auf einer Seite anzuzeigen, f&uuml;gen Sie den folgenden Code in Ihre Seite ein: </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>Um ein Album einer bestimmten Kategorie auf einer Seite anzuzeigen, f&uuml;gen Sie diesen Code ein: </p>
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1&#039;}</code></p>
<p>Mit diesem Code k&ouml;nnen Sie das Album einer Kategorie anzeigen, dessen ID 1 ist.</p>
<p>Mehrere Kategorien k&ouml;nnen Sie wie folgt anzeigen lassen:</p>
<p><code>{cms_module module=&quot;album&quot; categories=&quot;1,3&quot;}</code></p>
<p>Wenn Sie nur bestimmte Alben anzeigen lassen wollen, verwenden Sie diesen Code:
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>Dieser Code zeigt die Alben mit der ID-Nummer 1 und 3 an. Wenn Sie keine albums-Parameter angeben, werden alle Alben angezeigt.</p>
<h3>Templates</h3>
<h4>Wie werden die R&auml;nder der Vorschaubilder entfernt</h4>
<p>F&uuml;gen Sie das folgende am Ende der Datei modules/Album/css/stylesheet.css ein:</p>
<pre>.thumb a { background-color:transparent; border:0; }</pre>
<h4>Wie schlie&szlig;e ich die L&uuml;cke, die durch clear:both entsteht</h4>
<p>Siehe: <a href=&quot;RE: Cannot seem to get categories working&quot;>RE: Cannot seem to get categories working</a></p>
<p>Kurze Antwort, f&uuml;gen Sie das folgende Ihrem Stylesheet hinzu:</p>
<pre>
#main {
float: left;
}
</pre>
<h3>Fehlersuche</h3>
<p>Sprechen Sie mit Ihrem Entwickler, ob Sie nicht besser ImageMagick anstatt GD verwenden sollten, es funktioniert besser.</p>
<h4>Es werden keine Vorschaubilder angezeigt</h4>
<p><b>Hinweis: Wenn Sie bei dem Versuch, die Vorschaubilder zu generieren, die Fehlermeldung 403 erhalten, m&uuml;ssen Sie den umask-Wert von &quot;022&quot; auf &quot;002&quot; &auml;ndern (Administration, Men&uuml; Administrator > Globale Einstellungen).</b></p>
<a href=&quot;http://dev.cmsmadesimple.org/forum/message.php?msg_id=1181&quot;>A possible workaround to thumbnail problems</a>
<h4>Die Vorschaubilder werden nicht gr&ouml;&szlig;er als 72px hoch dargestellt</h4>
<p>Siehe <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,14125.msg69907.html#msg69907&quot;>

Re: Album module and thumbnails in IE [SOLVED]</a>. Allgemein gesagt sollten Sie folgende Eintr&auml;ge aus Ihrem Template entfernen, um das Problem mit der Gr&ouml;&szlig;e der Vorschaubilder zu beheben:
{$onepicture->autothumbnailsize} und {$album->autothumbnailsize} .</p>
<p>Das &quot;autothumbnailsize&quot; Feature wurde hinzugef&uuml;gt, um alle Vorschaubilder mit einer H&ouml;he von 72px anzuzeigen. Vielleicht ist dieses Feature eher ein Problem als eine Hilfe.</p>

<h4>Die Vorschaubilder werden nicht genau auf einer Zeile angezeigt</h4>
<p>Entweder Sie k&uuml;rzen die Titel Ihrer Alben oder Sie versuchen, die Tabellen-Templates zu verwenden.</p>
<p>Siehe <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,11996.0.html&quot;>Topic: Album Thumbnail layout [solved]</a>.</p>
<h4>Die Vorschaubilder werden falsch gestreckt</h4>
<p>Der einfachste Weg, dies zu beheben, ist, die Datei modules/Album/css/stylesheet.css zu bearbeiten</p>
<p>Ersetzen Sie:</p>
<pre>
/* Thumb width*/ 
	height:72px;
</pre>
<p>durch:</p>
<pre>
/* Thumb width*/ 
	/* height:72px; */
</pre>
<h4>Javascripte werden nicht geladen, wenn Pretty URLs mit hierarchischer Anzeige aktiviert sind - die gro&szlig;en Bilder werden nicht angezeigt</h4>
Es sollte funktionieren, wenn Sie im &amp;lt;head&amp;gt; &amp;lt;/head&amp;gt; Bereich Ihrer Seitentemplates das folgende einf&uuml;gen:
&amp;lt;head&amp;gt;
...
{metadata}
&amp;lt;/head&amp;gt;

<p>Damit wird CMSms folgendes in die Ausgabe einf&uuml;gen:
&amp;lt;base href=&quot;http://www.elijahlofgren.com/&quot; /&amp;gt;</p>

<p>womit alle relativen Links funktionieren sollten, auch, wenn die hierarchische Anzeige aktiviert ist.</p>

<p>Wenn Sie den metadata Tag nicht verwenden m&ouml;chten, k&ouml;nnen Sie auch die vollst&auml;ndige URL zu dem Javascript in Ihrem Template eintragen.</p>
<h4>Increasing the size of the thumbnails</h4>
<p>Sehen Sie sich diesen Forum-Post an: <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,7844.0.html&quot;>Larger Thumbnails for Album</a>.</p>
<h4>Bildeffekte (Transparenz) funktionieren nicht</h4>
<p>Stellen Sie sicher, dass alle Dateien im Verzeichnis templates/db die Berechtigung 755 haben. Siehe: <a href=&quot;http://forum.cmsmadesimple.org/index.php?topic=10466.msg52526#msg52526&quot;> 	
Re: random_image in Album. Can it be a greybox thumbnail? {SOLVED!}</a>.</p>
<h3>Support</h3>
<p>Gem&auml;&szlig; der GPL-Lizenz wird diese Software so zur Verf&uuml;gung gestellt, wie sie ist. Den vollst&auml;ndigen Haftungsausschluss finden Sie im Lizenztext.</p>
<h3>Copyright und Lizenz</h3>
<p>&copy; 2006, dam. Alle Rechte vorbehalten.</p>
<p>Dieses Modul wurde unter der <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a> ver&ouml;ffentlicht. Sie m&uuml;ssen dieser Lizenz zustimmen, bevor Sie das Modul einsetzen.</p>';
$lang['help_action'] = '<h4>Zeigt eine Liste der zuletzt hinzugef&uuml;gten Bilder</h4>
	 <p>Sie k&ouml;nnen eine Liste der neu hinzugef&uuml;gten Bilder anzeigen lassen, indem Sie Album wie folgt aufrufen:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<p><b>Wichtig</b>: Um dieses Feature zu verwenden, m&uuml;ssen Sie eine &quot;<b>eine Seite ausw&auml;hlen, auf der ein Album dargestellt wird.</b>&quot;.</p>
<div style=&quot;border:1px solid black;&quot;>
<h4>Zufallsbild anzeigen</h4>
<p>Zun&auml;chst werden alle Zeilen der Datenbank gez&auml;hlt (alle Zeilen der enthaltenen Alben), und dann eine Zufallszahl zwischen &#039;0&#039; und der Summe der Zeilen erzeugt. Mit dieser Zahl wird auf eine bestimmte Zeile in der Datenbank verweisen. Dieser Datensatz wird aus der Tabelle ausgelesen und zur&uuml;ckgegeben.</p>
<h5>Wie wird es eingesetzt?</h5>
<p>F&uuml;gen Sie den Tag wie folgt in Ihr Template/Seite ein: <code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<h5>Welche Parameter werden unterst&uuml;tzt?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>   - Verzeichnis des Albums, Standard ist: &#039;root_url&#039;/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>      - Komma-, Leerzeichen- oder Semikolon-getrennte Liste, deren Alben f&uuml;r die Anzeige verwendet werden sollen.</li>
  <li><em>(optional)</em> <tt>border</tt>      - Rahmen, wie er in Stylesheets festgelegt wird (z.Bsp. border=&#039;5px&#039;)</li>
  <li><em>(optional)</em> <tt>picturename</tt> - picturename = True/False, bei true wird der Bildname als Titel festgelegt</li>
</ul>
<p><b>Hinweis: Diese Parameter sind nur dann verf&uuml;gbar, wenn das Album-Modul mit {cms_module module=&#039;album&#039; action=&#039;random_image&#039;} aufgerufen wird</b></p>
Ein Beispiel: {cms_module module=&#039;album&#039; action=&#039;random_image&#039; albums=&#039;1,3,4,6&#039; border=&#039;3px&#039; picturename=&#039;True&#039;}
</p>
<h5>Noch zu erledigen</h5>
<p>
<ul>
	<li>Zuordnung von Klassen-Namen zu den div-Tags und die Festlegung der m&ouml;glichen Verwendung in den Stylesheets.<br />
		(der border-Parameter entf&auml;llt dann)</li>
  <li>die Ermittlung des Alben-Namens aus der Tabelle album_albums, und die M&ouml;glichkeit, diesen auszugeben.</li>
  <li>die M&ouml;glichkeit, von einem Bild auf ein bestimmtes Album? Bild? zu verlinken</li>
  <li>die Verwendung eines Parameters der maximalen H&ouml;he/Breite und eine Anpassung der Vorschaubilder (falls erforderlich).</li>
</ul>
</p>
<p>Autor von Random Image: Frank Prins <<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>></p>';
$lang['help_number'] = '<h4>Zeigt eine bestimmte Anzahl der zuletzt hinzugef&uuml;gten Bilder</h4>
	 <p>Sie k&ouml;nnen eine Liste mit einer festzulegenden Anzahl von Bildern anzeigen lassen, indem Sie folgenden Aufruf eingeben:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Ein Album hinzuf&uuml;gen';
$lang['error_nonamegiven'] = 'Sie m&uuml;ssen dem neue Album einen Namen geben.';
$lang['albumadded'] = 'Das Album wurde hinzugef&uuml;gt. Sie k&ouml;nnen nun weiter unten Bilder hinzuf&uuml;gen.';
$lang['albumdeleted'] = 'Das Album wurde aus der Datenbank entfernt.';
$lang['noalbumstext'] = 'In dieser Kategorie haben Sie bislang noch keine Alben angelegt.';
$lang['addpicture'] = 'Bilder hinzuf&uuml;gen';
$lang['addtemplate'] = 'Template hinzuf&uuml;gen';
$lang['albumidtext'] = 'IDs';
$lang['albumnametext'] = 'Alben';
$lang['albumthumbtext'] = 'Vorschaubilder';
$lang['albumnumpicturestext'] = 'Anzahl der Bilder';
$lang['albumreordertext'] = 'Reihenfolge';
$lang['albumactionstext'] = 'Aktionen';
$lang['Albums'] = 'Alben';
$lang['areyousure'] = 'Sind Sie Sicher?';
$lang['browsepictures'] = '&Auml;ndern';
$lang['cancel'] = 'Abbrechen';
$lang['changecomment'] = 'Kommentar bearbeiten';
$lang['changepicture'] = 'Bild &auml;ndern';
$lang['changethumb'] = 'Vorschaubild &auml;ndern';
$lang['changethumbnail'] = 'Vorschaubild &auml;ndern';
$lang['columns'] = 'Maximale Anzahl von Spalten mit Vorschaubildern (0 = unbegrenzt. Wird nur in den Tabellen-Templates verwendet.)';
$lang['comment'] = 'Kommentar';
$lang['currenttemplate'] = 'Albenlisten-Template ';
$lang['currentpicture'] = 'Aktuelles Bild';
$lang['currentthumbnail'] = 'Aktuelles Vorschaubild';
$lang['deletealbum'] = 'L&ouml;schen';
$lang['deletepicture'] = 'L&ouml;schen';
$lang['Help'] = 'Hilfe';
$lang['modify'] = '&Auml;ndern';
$lang['moveleft'] = 'Nach links';
$lang['moveright'] = 'Nach rechts';
$lang['multiplealbumtemplate'] = 'Template f&uuml;r mehrere Alben';
$lang['name'] = 'Name';
$lang['nocomment'] = '(Kein Kommentar)';
$lang['nothumbnail'] = '(Kein Vorschaubild)';
$lang['picture'] = 'Bild';
$lang['parentdir'] = '(&Uuml;bergeordnetes Verzeichnis)';
$lang['pictures'] = 'Bilder';
$lang['nopicturetext'] = 'In diesem Album sind keine Bilder.';
$lang['Picture'] = 'Bild';
$lang['Pictures'] = 'Bilder';
$lang['Properties'] = 'Eigenschaften';
$lang['propertiesupdated'] = 'Die Eigenschaften des Albums wurden erfolgreich gespeichert.';
$lang['resetthumb'] = 'Vorschaubild zur&uuml;cksetzen';
$lang['return'] = 'Zur&uuml;ck';
$lang['rows'] = 'Maximale Anzahl von Reihen mit Vorschaubildern (0 = unbegrenzt. Wird nur im Tables-Template verwendet.)';
$lang['useinlinelinks'] = '<b>Verwenden von Inline-Links</b>: Diese Option sorgt daf&uuml;r, dass der eigentliche Inhalt einer Seite &uuml;ber dem Album angezeigt wird. <strong>Falls das Album per Smarty-Tag in Seiteninhalte eingef&uuml;gt wird, sollte diese Option aktiviert sein, damit das Album korrekt funktioniert.</strong> Hinweis: Ist diese Option aktiviert, kann das Album keine Pretty URLs verwenden.';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Ist diese Option gesetzt, wird das Album-Stylesheet automatisch im HTML-Kopf der Seite eingebunden. Diese Option sollte im Normalfall aktiviert bleiben.';
$lang['selectall'] = 'Alle ausw&auml;hlen';
$lang['selectpicture'] = 'Dieses Bild verwenden';
$lang['selectthumb'] = 'Vorschaubild dieses Bildes verwenden';
$lang['submit'] = 'Speichern';
$lang['file_templates_help'] = '<b>Bevor Sie diese Templates verwenden k&ouml;nnen, m&uuml;ssen sie zuvor in der Datenbank installiert werden.</b>';
$lang['template'] = 'Template';
$lang['deletetemplate'] = 'Template l&ouml;schen';
$lang['Template'] = 'Template';
$lang['templatenametext'] = 'Templates';
$lang['Templates'] = 'Templates';
$lang['edittemplate'] = 'Template bearbeiten';
$lang['templatesaved'] = 'Das Template wurde in der Datenbank gespeichert.';
$lang['errortemplatenameexists'] = 'Ein Template mit diesem Namen existiert bereits. Bitte vergeben Sie einen anderen Namen.';
$lang['error_filenotfound_defaulttemplate'] = 'Die Template-Datei f&uuml;r dieses Template wurde nicht gefunden.';
$lang['thumbnail'] = 'Vorschaubild';
$lang['title'] = 'Titel';
$lang['uploadpicture'] = 'Ein Bild hochladen';
$lang['upload'] = 'Hochladen';
$lang['view'] = 'Ansicht';
$lang['options'] = 'Optionen';
$lang['optionsupdated'] = 'Die Optionen wurden aktualisiert.';
$lang['defaultrows'] = 'Standard f&uuml;r maximale Anzahl an Reihen von Vorschaubildern f&uuml;r neue Alben (0 = unbegrenzt. Wird nur im Tables-Template verwendet.)';
$lang['defaultcolumns'] = 'Standard f&uuml;r maximale Anzahl an Spalten von Vorschaubildern f&uuml;r neue Alben (0 = unbegrenzt. Wird nur in der Tables-Template verwendet.)';
$lang['defaulttemplate'] = 'Standard-Template';
$lang['file_templates'] = 'Verf&uuml;gbare Templates';
$lang['filename'] = 'Datei-Name';
$lang['importtemplate'] = 'Template importieren';
$lang['newtemplate'] = 'Name des neuen Templates';
$lang['defaultalbumpage'] = 'Standardseite, auf der das Album angezeigt wird. Diese Seite muss eine Seite vom Inhaltstyp &quot;Album&quot; sein oder den Album-Tag enthalten. Dies ist erforderlich, wenn Sie das recently_updated-Feature verwenden.';
$lang['album_comment_updated'] = 'Der Alben-Kommentar wurde erfolgreich aktualisiert.';
$lang['picture_comment_updated'] = 'Der Bild-Kommentar wurde erfolgreich aktualisiert.';
$lang['template_deleted'] = 'Das Template wurde erfolgreich aus der Datenbank gel&ouml;scht.';
$lang['error_empty_template'] = 'Fehler: Das Template mit dem Namen &quot;%s&quot;, welches Album verwenden soll, existiert nicht. Bitte gehen Sie in die Album-Administration und weisen diesem Album ein anderes Template zu.';
$lang['run_upgrade_script'] = 'Aktualisierungs-Script starten';
$lang['addcategory'] = 'Kategorie hinzuf&uuml;gen';
$lang['categories'] = 'Kategorien';
$lang['nocategories'] = 'Es wurden noch keine Kategorien erstellt.';
$lang['categorynametext'] = 'Kategorie-Name';
$lang['categoryidtext'] = 'Kategorie-ID';
$lang['categoryreordertext'] = 'Kategorien neu ordnen';
$lang['categoryactionstext'] = 'Aktionen';
$lang['categoryadded'] = 'Die Kategorie wurde der Datenbank hinzugef&uuml;gt.';
$lang['categorymoved'] = 'Die Kategorie wurde verschoben.';
$lang['categoryupdated'] = 'Die Kategorie wurde aktualisiert.';
$lang['editcategory'] = 'Kategorie bearbeiten';
$lang['categorydeleted'] = 'Die Kategorie wurde gel&ouml;scht.';
$lang['error_nocategorynamegiven'] = 'Sie m&uuml;ssen einen Namen f&uuml;r die Kategorie eingeben.';
$lang['category_listings'] = 'Kategorien-&Uuml;bersicht';
$lang['album_updated'] = 'Das Album wurde aktualisiert.';
$lang['uncategorized'] = 'Nicht kategorisierte Alben';
$lang['automatic_album_list_template'] = 'Automatisch (jeweiliges Albentemplate verwenden)';
$lang['albummoved'] = 'Das Album wurde verschoben.';
$lang['helpdetailpage'] = '<p>Seite, auf der die Alben angezeigt werden sollen. Dies kann entweder ein Seiten-Alias oder eine Seiten-ID sein. Kann verwendet werden, um die Bilder eines Albums auf einer anderen Seite als das Album anzuzeigen.</p> 
<p>Beispiel:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Wichtiger Tipp f&uuml;r die Ver&auml;nderung von Templates</h3>
<h4>Aktivieren Sie den debug-Modus!</h4>
<p>Wenn Sie diesen Modus nicht aktivieren, werden Fehlermeldungen wie zum Beispiel der Hinweis auf nicht definierte Templatevariablen nicht angezeigt, was die Fehlersuche in den Templates unn&ouml;tig erschwert.</p>
<p>Der debug-Modus wird aktiviert, indem Sie in der Datei config.php den nachfolgenden Eintrag auf den angegebenen Wert setzen:</p>
<code>$config[&#039;debug&#039;] = true;<code>

<h3>Albenliste</h3>

<p>Sie k&ouml;nnen den Smarty-Tag {$albums} benutzen, der ein Array ist. Jedes seiner Elemente ist eins der ausgew&auml;hlten Alben. Die Struktur eines Albums wird im n&auml;chsten Abschnitt beschrieben. Um Alben anzuzeigen, benutzen Sie den Schleifenbefehl <code>{foreach from=$albums item=album}{/foreach}</code></p>
<h3>Album</h3>
<p>Wenn es nur ein Album gibt oder nur eines ausgew&auml;hlt ist, dann k&ouml;nnen Sie den Tag {$album} verwenden. Damit haben Sie Zugriff auf folgende Elemente :</p>
<ul>
	<li>{$album->name} : Name</li>
	<li>{$album->comment} : Kommentar</li>
	<li>{$album->columns} : Spaltenanzahl</li>
	<li>{$album->rows} : Reihenanzahl</li>
	<li>{$album->thumbnail} : Adresse (URL) des Vorschaubilds</li>
	<li>{$album->link} : Link zum Album</li>
	<li>{$album->picturecount} : Anzahl der Bilder eines Albums</li>
</ul>
<h3>Bilderliste</h3>
<p>Ist ein Album ausgew&auml;hlt, dann k&ouml;nnen Sie den Tag {$pictures} verwenden, der ein Array von Arrays ist: er enth&auml;lt Reihen, die Bilder enthalten. Die Struktur eines Bildes wird im folgenden Abschnitt beschrieben. Um eine Bilderliste anzuzeigen, verwenden Sie die folgende Schleife:<br />
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>
<h3>Bild</h3>
<p>Ist ein Bild ausgew&auml;hlt, k&ouml;nnen Sie den Tag {$picture} verwenden. Wenn kein Bild ausgew&auml;hlt ist, wird ihm automatisch das erste Bild des Albums zugewiesen.</p>
<ul>
	<li>{$picture->name} : Name</li>
	<li>{$picture->comment} : Kommentar</li>
	<li>{$picture->comment2} : Kommentar2</li>
	<li>{$picture->comment3} : Kommentar3</li>
	<li>{$picture->thumbnail} : Adresse (URL) des Vorschaubilds</li>
	<li>{$picture->picture} : Adresse (URL) des Bildes</li>
	<li>{$picture->link} : Link zum Bild</li>
	<li>{$picture->number} : Bildnummer</li>
	<li>{$picture->thumbnailwidth}: Breite des Vorschaubildes</li>
	<li>{$picture->thumbnailheight}: H&ouml;he des Vorschaubildes</li>
	<li>{$picture->autothumbnailsize}: Ausgabe wie zum Beispiel &#039;height=&quot;76&quot;&#039;, um alle Vorschaubilder in einer Box anzuzeigen</li>
</ul>
<h3>Andere</h3>
<p>Sie k&ouml;nnen auch die folgenden Tags verwenden :</p>
<ul>
	<li>{$returnlink} : Zur&uuml;ck zur vorherigen Seite</li>
	<li>{$albumnumber} : Nummer des aktuellen Albums</li>
	<li>{$albumcount} : Albenanzahl</li>
	<li>{$picturenumber} : Nummer des aktuellen Bildes</li>
	<li>{$picturecount} : Bilderanzahl</li>
	<li>{$pagenumber} : Nummer der aktuellen Seite</li>
	<li>{$pagecount} : Seitenanzahl</li>
	<li>{$link.album.1} : Link zum ersten Album. Sie k&ouml;nnen auch eine andere Nummer angeben.</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : Link zum ersten Bild. Sie k&ouml;nnen auch eine andere Nummer angeben.</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : Link zur ersten Seite. Sie k&ouml;nnen auch eine andere Nummer angeben.</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>';
$lang['utmz'] = '156861353.1194284715.245.114.utmccn=(referral)|utmcsr=google.de|utmcct=/ig|utmcmd=referral';
$lang['utma'] = '156861353.717462736.1147511856.1200542915.1200604929.289';
?>