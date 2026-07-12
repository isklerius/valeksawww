<?php
$lang['friendlyname'] = 'Fotoalba';
$lang['postinstall'] = 'Album je nyn&iacute; nainstalov&aacute;no. Nezapomeňte pros&iacute;m přiřadit nov&yacute; styl \&quot;Album (jako přednastaven&aacute; volba, ImageGallery a Thickbox jsou dal&scaron;&iacute;mi možnostmi)\&quot; k &scaron;abloně str&aacute;nky, na kter&eacute; použ&iacute;v&aacute;te Album.

<p><b>Pozn&aacute;mka: Možn&aacute; budete muset změnit Masku pro vytv&aacute;řen&iacute; souborů (umask) z \&quot;022\&quot; na \&quot;002\&quot;, abyste zabr&aacute;nili chyb&aacute;m 403 Forbidden.</b></p>';
$lang['postuninstall'] = 'Album je nyn&iacute; odebr&aacute;no z datab&aacute;ze';
$lang['uninstalled'] = 'Modul odinstalov&aacute;n';
$lang['installed'] = 'Vyd&aacute;n&iacute; %s je nainstalov&aacute;no';
$lang['upgraded'] = 'Modul pov&yacute;&scaron;en na verzi %s.';
$lang['error_nofilesuploaded'] = 'Nastala chyba při nahr&aacute;v&aacute;n&iacute;. Pros&iacute;m zkontrolujte, že m&aacute;te nastavena dostatečn&aacute; opr&aacute;vněn&iacute; k z&aacute;pisu do adres&aacute;ře (777).';
$lang['error'] = 'Chyba!';
$lang['next_picture'] = 'Dal&scaron;&iacute; obr&aacute;zek';
$lang['admindescription'] = 'Modul Album v&aacute;m umožňuje snadno zobrazovat galerie obr&aacute;zků na webov&yacute;ch str&aacute;nk&aacute;ch.';
$lang['accessdenied'] = 'Př&iacute;stup zak&aacute;z&aacute;n';
$lang['query_failed'] = 'A query failed. Trying going to the \&quot;Options\&quot; tab and clicking the \&quot;Run Upgrade Script\&quot; link. If that does not fix the problem, then please file a bug.';
$lang['changelog'] = '<ul><li>Verze 0.0.1. 5 April 2006. Vstupn&iacute; vyd&aacute;n&iacute;.</li></ul>';
$lang['view_default_stylesheet'] = 'Zobrazit přednastaven&yacute; styl (CSS)';
$lang['help_albums'] = 'Seznam jednoho nebo v&iacute;ce ID alb, kter&aacute; maj&iacute; b&yacute;t zobrazena ( položky odděleny ';
$lang['max_image_size'] = '<b>Maximum image size:</b> Any images larger than this will automatically be scaled down (if the template is configured to do that.) using Javascript. Note: Currently only the \&quot;Tables\&quot; template uses this setting.';
$lang['help_sortdesc'] = 'Seřadit alba v sestupn&eacute;m pořad&iacute;.';
$lang['help_sortpicturesdesc'] = 'Sort pictures in descending order rather than ascending. This will make new pictues that are added to an album to be listed first.<p>Example to show pictures in reverse order:</p><pre>{cms_module module=\&#039;album\&#039; sortpicturesdesc=\&#039;true\&#039;}</pre>';
$lang['templatenameexists'] = 'Chyba: &Scaron;ablona s t&iacute;mto jm&eacute;nem již existuje. Pros&iacute;m zvolte jin&eacute; jm&eacute;no.';
$lang['templateimported'] = '&Scaron;ablona byla &uacute;spě&scaron;ně importov&aacute;na do datab&aacute;ze a nyn&iacute; je připravena k použit&iacute;.';
$lang['help'] = '<h3>Co tento modul děl&aacute;?</h3>
<p>Tento modul může b&yacute;t použit pro spr&aacute;vu galerie obr&aacute;zků ( fotografi&iacute;)</p>
<h3>Jak ho mohu použ&iacute;t?</h3>
<p>Pro zobrazen&iacute; alb na str&aacute;nce vložte do k&oacute;du toto : </p>
<p><code>{cms_module module=\&quot;album\&quot; albums=\&quot;1,3\&quot;}</code></p>
<p>Tento k&oacute;d v&aacute;m umožňuje zobrazit alba, jejichž ID jsou 1 a 3. Pokud nepoužijete parametr \&quot;albums\&quot;, zobraz&iacute; se v&scaron;echna alba.</p>
<h3>Podpora</h3>
<p>Tento modul je uvolněn pod licenc&iacute; GPL a je poskytov&aacute;n bez jak&eacute;koliv z&aacute;ruky. Pln&eacute; zřeknut&iacute; se odpovědnosti je uskutečněno podle licence GPL.</p>
<h3>Copyright a Licence</h3>
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>Tento modul byl uvolněn podle <a href=\&quot;http://www.gnu.org/licenses/licenses.html#GPL\&quot;>GNU Public License</a>. Pokud chcete modul použ&iacute;vat, mus&iacute;te s licenc&iacute; souhlasit.</p>';
$lang['help_action'] = '<h4>Uk&aacute;zat seznam naposledy přidan&yacute;ch obr&aacute;zků</h4>
	 <p>Album nyn&iacute; umožňuje zobrazit seznam naposledy přidan&yacute;ch obr&aacute;zků pomoc&iacute;:</pre>
<pre>{cms_module module=\&#039;album\&#039; action=\&#039;recently_updated\&#039;}';
$lang['help_number'] = '<h4>Uk&aacute;zat určit&yacute; počet naposledy přidan&yacute;ch obr&aacute;zků</h4>
	 <p>Album nyn&iacute; umožňuje uk&aacute;zat určit&yacute; počet naposledy přidan&yacute;ch obr&aacute;zků pomoc&iacute;:</pre> <pre>{cms_module module=\&#039;album\&#039; action=\&#039;recently_updated\&#039; number=\&#039;15\&#039;}
';
$lang['addalbum'] = 'Přidat album';
$lang['error_nonamegiven'] = 'Nov&eacute; album je třeba pojmenovat.';
$lang['albumadded'] = 'Album bylo &uacute;spě&scaron;ně přid&aacute;no. Obr&aacute;zku můžete přidat dole.';
$lang['albumdeleted'] = 'Album bylo &uacute;spě&scaron;ně odebr&aacute;no z datab&aacute;ze.';
$lang['noalbumstext'] = 'Je&scaron;tě jste nevytvořili ž&aacute;dn&eacute; album.';
$lang['addpicture'] = 'Přidat obr&aacute;zky';
$lang['addtemplate'] = 'Přidat &scaron;ablonu';
$lang['albumidtext'] = 'IDs';
$lang['albumnametext'] = 'Alba';
$lang['albumthumbtext'] = 'Miniatury';
$lang['albumnumpicturestext'] = 'Počet obr&aacute;zků';
$lang['albumreordertext'] = 'Změnit pořad&iacute;';
$lang['albumactionstext'] = 'Akce';
$lang['Albums'] = 'Alba';
$lang['areyousure'] = 'Jste si jist/a ?';
$lang['browsepictures'] = 'Změnit';
$lang['cancel'] = 'Zru&scaron;it';
$lang['changecomment'] = 'Editovat koment&aacute;ř';
$lang['changepicture'] = 'Změnit obr&aacute;zek';
$lang['changethumb'] = 'Změnit';
$lang['changethumbnail'] = 'Změnit miniaturu';
$lang['columns'] = 'Č&iacute;slo sloupce';
$lang['comment'] = 'Koment&aacute;ř';
$lang['currenttemplate'] = 'Současn&yacute; koment&aacute;ř';
$lang['currentpicture'] = 'Současn&yacute; obr&aacute;zek';
$lang['currentthumbnail'] = 'Současn&aacute; miniatura';
$lang['deletealbum'] = 'Smazat';
$lang['deletepicture'] = 'Smazat';
$lang['Help'] = 'Napověda';
$lang['modify'] = 'Změnit';
$lang['moveleft'] = 'Přesunout vlevo';
$lang['moveright'] = 'Přesunout vpravo';
$lang['multiplealbumtemplate'] = '&Scaron;ablona v&iacute;ce alb';
$lang['name'] = 'Jm&eacute;no';
$lang['nocomment'] = '(bez koment&aacute;ře)';
$lang['nothumbnail'] = '(bez miniatury)';
$lang['picture'] = 'Obr&aacute;zek';
$lang['parentdir'] = '(Rodičovsk&yacute; adres&aacute;ř)';
$lang['pictures'] = 'obr&aacute;zky';
$lang['nopicturetext'] = 'V albu nejsou ž&aacute;dn&eacute; obr&aacute;zky.';
$lang['Picture'] = 'Obr&aacute;zek';
$lang['Pictures'] = 'Obr&aacute;zek';
$lang['Properties'] = 'Vlastnosti';
$lang['propertiesupdated'] = 'Vlastnosti alba byly &uacute;spě&scaron;ně uloženy.';
$lang['resetthumb'] = 'Vynulovat miniaturu';
$lang['return'] = 'Zpět';
$lang['rows'] = 'Č&iacute;slo ř&aacute;dku';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album\&#039;s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Check this box to automatically insert the link to the Album stylesheet in head of your page. This should usually be left enabled.';
$lang['selectall'] = 'Vybrat v&scaron;e';
$lang['selectpicture'] = 'Použ&iacute;t tento obr&aacute;zek';
$lang['selectthumb'] = 'Použ&iacute;t miniaturu tohoto obr&aacute;zku';
$lang['submit'] = 'Uložit';
$lang['file_templates_help'] = '<b>Toto jsou &scaron;ablony, kter&eacute; mus&iacute;te před použit&iacute;m naistalovat do datab&aacute;ze.</b>';
$lang['template'] = '&Scaron;ablona';
$lang['deletetemplate'] = 'Smazat &scaron;ablonu';
$lang['Template'] = '&Scaron;ablona';
$lang['templatenametext'] = '&Scaron;ablony';
$lang['Templates'] = '&Scaron;ablony';
$lang['edittemplate'] = 'Upravit &scaron;ablonu';
$lang['templatesaved'] = '&Scaron;ablona byla &uacute;spě&scaron;ně uložena do datab&aacute;ze.';
$lang['errortemplatenameexists'] = '&Scaron;ablona s t&iacute;mto jm&eacute;nem již existuje, pros&iacute;m zvolte jin&eacute; jm&eacute;no.';
$lang['error_filenotfound_defaulttemplate'] = 'Soubor &scaron;ablony pro tuto &scaron;ablonu nebyl nalezen.';
$lang['thumbnail'] = 'Miniatura';
$lang['title'] = 'Titulek';
$lang['uploadpicture'] = 'Nahr&aacute;t obr&aacute;zek';
$lang['upload'] = 'Nahr&aacute;t';
$lang['view'] = 'Zobrazit';
$lang['options'] = 'Možnosti';
$lang['optionsupdated'] = 'Možnosti byly &uacute;spě&scaron;ně aktualizov&aacute;ny.';
$lang['defaultrows'] = 'Implicitn&iacute; č&iacute;slo ř&aacute;dku';
$lang['defaultcolumns'] = 'Implicitn&iacute; č&iacute;slo sloupce';
$lang['defaulttemplate'] = 'Přednastaven&aacute; &scaron;ablona';
$lang['file_templates'] = '&Scaron;ablony souboru';
$lang['filename'] = 'Jm&eacute;no souboru';
$lang['importtemplate'] = 'Importovat &scaron;ablonu';
$lang['newtemplate'] = 'Jm&eacute;no nov&eacute; &scaron;ablony';
$lang['defaultalbumpage'] = '&Uacute;vodn&iacute; str&aacute;nka, kter&aacute; obsahuje Album. Tato str&aacute;nka mus&iacute; m&iacute;t nastaven typ \&quot;Album\&quot;, nebo obsahovat př&iacute;slu&scaron;n&yacute; tag. Toto nastaven&iacute; je vyžadov&aacute;no, pokud chcete použ&iacute;vat funkci recently_updated.';
$lang['album_comment_updated'] = 'Koment&aacute;ř k albu byl &uacute;spě&scaron;ně změněn.';
$lang['picture_comment_updated'] = 'Koment&aacute;ř k obr&aacute;zku byl &uacute;spě&scaron;ně změněn.';
$lang['template_deleted'] = '&Scaron;ablona byla &uacute;spě&scaron;ně vymaz&aacute;na z datab&aacute;ze.';
$lang['error_empty_template'] = 'Chyba: &Scaron;ablona pojmenovan&aacute; \&quot;%s\&quot; , kterou použ&iacute;v&aacute; toto album neexistuje. Pros&iacute;m vyberte jinou &scaron;ablonu v administračn&iacute;m rozhran&iacute; Alba.';
$lang['run_upgrade_script'] = 'Provede skript uprgrade.';
$lang['addcategory'] = 'Přidat kategorii';
$lang['categories'] = 'Kategorie';
$lang['nocategories'] = 'Je&scaron;tě jste nepčidali ž&aacute;dn&eacute; kategorie.';
$lang['categorynametext'] = 'Jm&eacute;no kategorie';
$lang['categoryidtext'] = 'Id kategorie';
$lang['categoryreordertext'] = 'Znovuseřadit kategorie';
$lang['categoryactionstext'] = 'Akce';
$lang['categoryadded'] = 'Kategorie byla &uacute;soě&scaron;ně přid&aacute;na do datab&aacute;ze';
$lang['categorymoved'] = 'Kategorie byla &uacute;spě&scaron;ně přesunuta.';
$lang['categoryupdated'] = 'Kategorie byla &uacute;spě&scaron;ně aktualizov&aacute;na.';
$lang['editcategory'] = 'Editovat kategorii';
$lang['categorydeleted'] = 'Kategorie byla &uacute;spě&scaron;ně smaz&aacute;na.';
$lang['error_nocategorynamegiven'] = 'Va&scaron;i kategorii je třeba nějak pojmenovat.';
$lang['category_listings'] = 'V&yacute;pis kategori&iacute;';
$lang['album_updated'] = 'Album bylo &uacute;spě&scaron;ně aktualizov&aacute;no.';
$lang['uncategorized'] = 'Nezařazen&aacute; alba';
$lang['automatic_album_list_template'] = 'Automatic (use template assigned to each album)';
$lang['albummoved'] = 'Album bylo &uacute;spě&scaron;ně přesunuto.';
$lang['helpdetailpage'] = '<p>Page to display Albums in.  This can either be a page alias or an id. Used to allow Album pictures 
to be displayed in a different page from the album list.</p> <p>Example of use:</p><pre>{cms_module module=\&#039;album\&#039; detailpage=\&#039;album\&#039;}</pre>';
$lang['help_template'] = '<h3>Important tips for modifying templates</h3>
<h4>Enable debug mode!</h4>
<p>Unless you enable debug mode, important errors about undefined template variables will be hidden, making debugging templates very difficult!</p>
<p>You can enable debug mode by opening config.php and setting:</p>
<code>$config[&#039;debug&#039;] = true;<code>


<h3>Seznam alb</h3>
<p>Můžete použ&iacute;t smarty tag {$albums} což je pole. Každ&yacute; z jeho prvků je jedn&iacute;m z vybran&yacute;ch alb.
Struktura alba je pops&aacute;na v dal&scaron;&iacute; kapitole.
Pro zobrazen&iacute; alb použijte programovou smyčku <code>{foreach from=$albums item=album}{/foreach}</code></p>
<h3>Album</h3>
<p>If there is only one album, or if a specific album is selected, you can use tag {$album}. It allows to access following items :</p>
<ul>
	<li>{$album->name} : name</li>
	<li>{$album->comment} : comment</li>
	<li>{$album->columns} : column number</li>
	<li>{$album->rows} : row number</li>
	<li>{$album->thumbnail} : adress (url) of thumbnail</li>
	<li>{$album->link} : link to album</li>
	<li>{$album->picturecount} : number of pictures of an album</li>
</ul>
<h3>Image list</h3>
<p>If an album is selected, you can use tag {$pictures} which is an array of arrays : it contains rows that contain pictures.
The structure of an image is described in following chapter.
To show image list, use the following loop :
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>
<h3>Picture</h3>
<p>If a picture is selected, you can use tag  {$picture}. It is automatically set to first picture of album if no picture is selected.</p>
<ul>
	<li>{$picture->name} : name</li>
	<li>{$picture->comment} : comment</li>
	<li>{$picture->thumbnail} : adress (url) of thumbnail</li>
	<li>{$picture->picture} : adress (url) of picture</li>
	<li>{$picture->link} : link to picture</li>
	<li>{$picture->number} : picture number</li>
	<li>{$picture->thumbnailwidth}: width of thumbnail</li>
	<li>{$picture->thumbnailheight}: height of thumbnail</li>
	<li>{$picture->autothumbnailsize}: outputs something like &#039;height=&quot;76&quot;&#039; to make tall thumbnails fit in a box</li>
	<li>{$max_image_size}: The value of the max_image_size preference. Used in the default template to automatically resize images that are too large.</li>
</ul>
<h3>Other</h3>
<p>You can also use following tags :</p>
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
$lang['utma'] = '156861353.1164120856.1187941896.1191065148.1191067709.27';
$lang['utmz'] = '156861353.1191065148.26.5.utmccn=(referral)|utmcsr=ski-adventure.cz|utmcct=/2008/admin/listcontent.php|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>