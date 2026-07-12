<?php
$lang['friendlyname'] = 'Foto Albumy';
$lang['postinstall'] = 'Album jest zainstalowany. Nie zapomnij przyłączyć nowego arkusza styl&oacute;w &quot;Album (for default, ImageGallery, and Thickbox templates)&quot; do szblonu strony na kt&oacute;rej będziesz użwać Albumu. (Więcej szczeg&oacute;ł&oacute;w w Pomocy)

<p><b>Informacja: Możesz musieć zmienić maskę praw dla nowo tworzonych plik&oacute;w (File Creation Mask umask - w zakładce Administracja serwisu - globalne ustawienia): z &quot;022&quot;
na &quot;002&quot; aby pozbyć się błędu &quot;403 forbidden&quot; kiedy pr&oacute;bujesz wygenerowane miniaturki na twojej stronie.</b></p>
';
$lang['postuninstall'] = 'Album został usunięty z bazy.';
$lang['uninstalled'] = 'Moduł odinstalowany';
$lang['installed'] = 'Moduł %s zainstalowany';
$lang['upgraded'] = 'Moduł zaktualizowany do wersji %s.';
$lang['error_nofilesuploaded'] = 'Wystąpił błąd podczas przesyłania. Upewnij się że folder jest zapisywalny.';
$lang['error'] = 'Błąd!';
$lang['next_picture'] = 'Następne zdjęcie';
$lang['admindescription'] = 'Moduł Albumu pozwala umieszczać galerie na twojej stronie.';
$lang['accessdenied'] = 'Dostęp zabroniony';
$lang['query_failed'] = 'Zapytanie nie powiodło się. Spr&oacute;buj wejść do zakładki &quot;Opcje&quot; i kliknij w link &quot;Uruchom skrypt upgrade-u&quot;. Jeśli to nie rozwiąże problemu, zgłoś błąd modułu!';
$lang['changelog'] = '<ul><li>Wersja 0.0.1. 5 kwietnia 2006. Pierwsza Realizacja.</li></ul>';
$lang['view_default_stylesheet'] = 'Obejrzyj domyślny arkusz styl&oacute;w';
$lang['help_albums'] = 'Lista jednego lub więcej (oddzielonych przecinkami) ID (identyfikator&oacute;w) Album&oacute;w do wyświetlenia.';
$lang['max_image_size'] = '<b>Maksymalny rozmiar obraza:</b> Każdy obrazek większy niż ta wartość zostanie automatycznie przeskalowany w d&oacute;ł (jeśli szablon jest odpowiednio skonfigurowany) - przy użyciu Javascript.';
$lang['help_sortdesc'] = 'Sortowanie album&oacute;w w kolejności malejącej.';
$lang['templatenameexists'] = 'Błąd: Szablon o takiej nazwie już istnieje. Proszę zmień nazwę na inną.';
$lang['templateimported'] = 'Szablon poprawnie zaimportowany do bazy, od teraz jest dostępny do użytku.';
$lang['help'] = '<h3>Do czego to służy?</h3>
<p>Ten moduł może być użyty do zarządzania galerią zdjęć</p>
<h3>Jak się tego używa</h3>
<p>Aby pokazać wszystie albumy na stronie, poprostu umieść ten kod : </p>
<p><code>{cms_module module=\&#039;album\&#039;}</code></p>
<p>Jeśli chcesz pokazać tylko niekt&oacute;re albumy użyj kodu jak poniżej:
<p><code>{cms_module module=\&#039;album\&#039; albums=\&#039;1,3\&#039;}</code></p>
<p>Powyższy kod pozwoli Ci pokazać na stronie albumy kt&oacute;rych ID są r&oacute;wne 1 i 3. Jeżli nie zamieścisz parametru &quot;albums&quot;, zostaną pokazane wszystkie albumy.</p>
<h3>Szablony</h3>
<p>Arkusz styli &quot;Album (for default, ImageGallery, Thickbox templates)&quot; dla szablon&oacute;w układ&oacute;w: default, ImageGallery, and Thickbox jest instalowany razem z modułem. Ten szablon styli jest usuwany wraz z modułem oraz może być nadpisany podczas aktualizacji, lepiej utw&oacute;rz kopię jeśli chcesz go modyfikować. Dodaj ten arkusz styli do szablonu strony na kt&oacute;rej chcesz używać galerii.</p>

<h3>Usuwanie problem&oacute;w</h3>
<p><b>Informacja:</b> Możesz musieć zmienić maskę praw dla nowo tworzonych plik&oacute;w (File Creation Mask umask): z &quot;022&quot;
na &quot;002&quot; aby pozbyć się błędu &quot;403 forbidden&quot; kiedy pr&oacute;bujesz wygenerowane miniaturki na twojej stronie.</p>

<h3>Wsparcie</h3>
<p>Zgodnie z GPL, to oprogramowanie zamieszczone jest tak jak jest. Przeczytaj teks licencji aby rozwiać wszelkie wątpliwości.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>Ten moduł został zrealizowany na licencji <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. Musisz zgodzić się na warunki licencji przed użytkowaniem modułu.</p>';
$lang['help_action'] = '<h4>Pokaż listę najczęściej dodawanych zdjęć</h4>
	 <p>Możesz pokazać listę najczęściej dodawanych zdjęć generując  Album jak tutaj:</pre>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}';
$lang['help_number'] = '<h4>Show a certain number of recently updated pictures</h4>
	 <p>You can show a list of a certain number of pictures by calling Album like this:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Dodaj album';
$lang['error_nonamegiven'] = 'Muszisz nadać nazwę nowemu albumowi.';
$lang['albumadded'] = 'Album dodany poprawnie. Zdjęcia mogą być dodawane poniżej.';
$lang['albumdeleted'] = 'Album poprawnie usunięty z bazy.';
$lang['noalbumstext'] = 'Jeszcze nie utworzyłeś żadnego albumu.';
$lang['addpicture'] = 'Dodaj zdjęcia';
$lang['addtemplate'] = 'Dodzaj szablon';
$lang['albumidtext'] = 'ID';
$lang['albumnametext'] = 'Albumy';
$lang['albumthumbtext'] = 'Reprezentacja albumu';
$lang['albumnumpicturestext'] = 'Liczba zdjęć';
$lang['albumreordertext'] = 'Kolejność';
$lang['albumactionstext'] = 'Operacje';
$lang['Albums'] = 'Albumy';
$lang['areyousure'] = 'Jesteś pewien ?';
$lang['browsepictures'] = 'Zmień';
$lang['cancel'] = 'Przerwij';
$lang['changecomment'] = 'Edytuj komentarz';
$lang['changepicture'] = 'Zmień zdjęcie';
$lang['changethumb'] = 'Zmień';
$lang['changethumbnail'] = 'Zmień miniaturkę';
$lang['columns'] = 'Maksymalna liczba kolumn miniaturek (0 znaczy bez ograniczań. Używane tylko przez szablon: Tables)';
$lang['comment'] = 'Komentarz';
$lang['currenttemplate'] = 'Lista szablon&oacute;w';
$lang['currentpicture'] = 'Aktualne zdjęcie';
$lang['currentthumbnail'] = 'Aktualna miniaturka';
$lang['deletealbum'] = 'Usuń';
$lang['deletepicture'] = 'Usuń';
$lang['Help'] = 'Pomoc';
$lang['modify'] = 'Zmień';
$lang['moveleft'] = 'Przesuń w lewo';
$lang['moveright'] = 'Przesuń w prawo';
$lang['multiplealbumtemplate'] = 'Szablon wielu album&oacute;w';
$lang['name'] = 'Nazwa';
$lang['nocomment'] = '(brak komentarza)';
$lang['nothumbnail'] = '(brak miniaturek)';
$lang['picture'] = 'Zdjęcie';
$lang['parentdir'] = '(Katalog nadrzędny)';
$lang['pictures'] = 'szt.';
$lang['nopicturetext'] = 'Nie ma zdjęć w tym albumie.';
$lang['Picture'] = 'Zdjęcie';
$lang['Pictures'] = 'Zdjęcia';
$lang['Properties'] = 'Ustawienia';
$lang['propertiesupdated'] = 'Ustawienia albumu poprawnie zapisane.';
$lang['resetthumb'] = 'Reset miniaturek';
$lang['return'] = 'Powr&oacute;t';
$lang['rows'] = 'Maksymalna liczba wierszy miniaturek (0 znaczy bez ograniczeń. Używane tylko przez szablon: Tables)';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album&#039;s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Check this box to automatically insert the link to the Album stylesheet in head of your page. This should usually be left enabled.';
$lang['selectall'] = 'Wybierz wszystko';
$lang['selectpicture'] = 'Użyj tego zdjęcia';
$lang['selectthumb'] = 'Użyj miniaturki tego zdjęcia';
$lang['submit'] = 'Zapisz';
$lang['file_templates_help'] = '<b>These are templates that you must install to the database before you can use them.</b>';
$lang['template'] = 'Szablon';
$lang['deletetemplate'] = 'Usuń szablon';
$lang['Template'] = 'Szablon';
$lang['templatenametext'] = 'Szablony';
$lang['Templates'] = 'Szablony zainstalowane';
$lang['edittemplate'] = 'Edytuj szablon';
$lang['templatesaved'] = 'Szablon zapisany poprawnie.';
$lang['errortemplatenameexists'] = 'Szablon o tej samej nazwie już istnieje, proszę wybierz inną nazwę.';
$lang['error_filenotfound_defaulttemplate'] = 'Nie znaleziono pliku z opisem dla tego szablonu.';
$lang['thumbnail'] = 'Miniaturka';
$lang['title'] = 'Tytuł';
$lang['uploadpicture'] = 'Dodaj zdjęcie';
$lang['upload'] = 'Wyślij';
$lang['view'] = 'Podgląd';
$lang['options'] = 'Opcje';
$lang['optionsupdated'] = 'Opcje zaktualizowane.';
$lang['defaultrows'] = 'Domyślna maksymalna liczba wierszy miniaturek dla nowego albumu (0 znaczy bez ograniczeń. Używane tylko przez szablon: Tables)';
$lang['defaultcolumns'] = 'Domyślna maksymalna liczba kolumn miniaturek dla nowego albumu (0 znaczy bez ograniczeń. Używane tylko przez szablon: Tables)';
$lang['defaulttemplate'] = 'Szablon domyślny';
$lang['file_templates'] = 'Pliki szablon&oacute;w';
$lang['filename'] = 'Nazwa pliku';
$lang['importtemplate'] = 'Importuj szablon';
$lang['newtemplate'] = 'Nazwa dla nowego szablonu';
$lang['defaultalbumpage'] = 'Strona domyślna, na kt&oacute;rej jest album. Ta strona musi być typu &quot;Album&quot; lub musi zawierać znacznik wywołania modułu albumu. Ta opcja jest wymagana, gdy używasz opcji recently_updated (wyświetlanie ostatnio aktualizowanych zdjęć).';
$lang['album_comment_updated'] = 'Komentarz albumu został pomyślnie aktualizowany.';
$lang['picture_comment_updated'] = 'Komentarz zdjęcia został pomyślnie aktualizowany.';
$lang['template_deleted'] = 'Szablon został skasowany z bazy danych.';
$lang['error_empty_template'] = 'Błąd: Szablon o nazwie &quot;%s&quot;, kt&oacute;ry ustawiony jest dla obecnego albumu, nie istnieje. Wejdź w panel administratora modułu Foto-Albumy i przywiąż inny szablon do tego albumu.';
$lang['run_upgrade_script'] = 'Uruchom skrypt upgrade-u';
$lang['addcategory'] = 'Dodaj kategorię';
$lang['categories'] = 'Kategorie';
$lang['nocategories'] = 'Brak kategorii.';
$lang['categorynametext'] = 'Nazwa kategorii';
$lang['categoryidtext'] = 'Id kategorii';
$lang['categoryreordertext'] = 'Uporządkuj kategorie';
$lang['categoryactionstext'] = 'Akcje';
$lang['categoryadded'] = 'Kategoria została dodana do bazy danych';
$lang['categorymoved'] = 'Kategoria została przeniesiona';
$lang['categoryupdated'] = 'Kategoria została zaktualizowana';
$lang['editcategory'] = 'Edytuj kategorię';
$lang['categorydeleted'] = 'Kategoria została usunięta';
$lang['error_nocategorynamegiven'] = 'Musisz nadać nazwę kategorii';
$lang['category_listings'] = 'Lista kategorii';
$lang['album_updated'] = 'Album został aktualizowany';
$lang['uncategorized'] = 'Albumy bez kategorii';
$lang['automatic_album_list_template'] = 'Automatycznie (używa szablon&oacute;w przywiązanych do każdego albumu)';
$lang['albummoved'] = 'Album został przeniesiony';
$lang['helpdetailpage'] = '<p>Strona, na kt&oacute;rej wyświetla się Album. Może to być alias strony lub id strony. Używa się tej opcji, by zdjęcia albumu były wyświetlane na innej stronie, niż lista zdjęć. </p> 

<p>Przykład użycia:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<p>Arkusz styli &quot;Album (for default, ImageGallery, Thickbox templates)&quot; dla szablon&oacute;w układ&oacute;w: default, ImageGallery, and Thickbox jest instalowany razem z modułem. Ten szablon styli jest usuwany wraz z modułem oraz może być nadpisany podczas aktualizacji, lepiej utw&oacute;rz kopię jeśli chcesz go modyfikować. Dodaj ten arkusz styli do szablonu strony na kt&oacute;rej chcesz używać galerii.</p>

<p>Możesz używać skr&oacute;conego tagu {$albums} kt&oacute;ry jest tablicą. Każdy z jej element&oacute;w jest jednym z wybranych album&oacute;w.
Struktura albumu jest opisana w następnym rozdziale.
Aby pokazać albumy, użyj pętli <code>{foreach from=$albums item=album}{/foreach}</code></p>
<h3>Album</h3>
<p>Jśli jest tylko jeden album lub jeśli dany album jest wybrany, możesz użyć tagu {$album}. To da dostęp do następujących rzeczy:</p>
<ul>
	<li>{$album->name} : nazwa</li>
	<li>{$album->comment} : komentarz</li>
	<li>{$album->columns} : numer kolumny</li>
	<li>{$album->rows} : numer wiersza</li>
	<li>{$album->thumbnail} : adres (url) miniaturki</li>
	<li>{$album->link} : link do albumu</li>
	<li>{$album->picturecount} : liczba zdjęć w albumie</li>
</ul>
<h3>Liczba zdjęć</h3>
<p>Jeśli album jest wybrany, możesz użyć tagu {$pictures} kt&oacute;ry jest tablicą tablic: zawiera wiersze kt&oacute;re zawierają zdjęcia.
Struktura zdjęcia jest opisana w następnym rozdziale.
Aby pokazać listę zdjęć, użyj następującej pętli :
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>
<h3>Zdjęcie</h3>
<p>Jeśli zdjęcie jest wybrane, możesz użyć tagu {$picture}. Automatycznie ustawiany jest na pierwsze zdjęcie albumu jeśli zdjęcie nie jest wybrane.</p>
<ul>
	<li>{$picture->name} : nazwa</li>
	<li>{$picture->comment} : komentarz</li>
	<li>{$picture->thumbnail} : adres (url) miniaturki</li>
	<li>{$picture->picture} : adres (url) zdjęcia</li>
	<li>{$picture->link} : link do zdjęcia</li>
	<li>{$picture->number} : numer zdjęcia</li>
</ul>
<h3>Inne</h3>
<p>Możesz r&oacute;wnież używać następujących tag&oacute;w:</p>
<ul>
	<li>{$returnlink} : powr&oacute;t do poprzedniej strony</li>
	<li>{$albumnumber} : aktualny numer albumu</li>
	<li>{$albumcount} : liczba album&oacute;w</li>
	<li>{$picturenumber} : aktualny numer zdjęcia</li>
	<li>{$picturecount} : liczba zdjęć</li>
	<li>{$pagenumber} : aktualny numer strony</li>
	<li>{$pagecount} : liczba stron</li>
	<li>{$link.album.1} : link do pierwszego albumu. Możesz r&oacute;wnież wskazać inny numer</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : link do pierwszego zdjęcia. Możesz r&oacute;wnież wskazać inny numer</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : link do pierwszej strony.  Możesz r&oacute;wnież wskazać inny numer</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>';
$lang['utma'] = '156861353.531216200.1148077539.1181559382.1181562838.128';
$lang['utmz'] = '156861353.1180950984.124.12.utmccn=(referral)|utmcsr=silvercoders.com|utmcct=/~jacek/admin/index.php|utmcmd=referral';
?>