<?php
$lang['friendlyname'] = 'Fot&oacute; albumok';
$lang['postinstall'] = 'Az Album modult telep&iacute;tett&uuml;k. <p><b>Figyelem: lehet, hogy a file l&eacute;trehoz&aacute;si maszkot (umask): &quot;022&quot;-ről &quot;002&quot;-re kell m&oacute;dos&iacute;tanod, hogy elker&uuml;ld a &#039;403 forbidden error&#039; hib&aacute;kat, amikor a gener&aacute;lt miniatűr k&eacute;peket akarod megn&eacute;zni.</b></p>';
$lang['postuninstall'] = 'Az Albumot elt&aacute;vol&iacute;tottuk az adatb&aacute;zisb&oacute;l.';
$lang['uninstalled'] = 'A modult elt&aacute;vol&iacute;tottuk.';
$lang['installed'] = '%s kiad&aacute;s van install&aacute;lva';
$lang['upgraded'] = 'A modul friss&uuml;lt a(z) %s kiad&aacute;sban';
$lang['error_nofilesuploaded'] = 'Hiba t&ouml;rt&eacute;nt a felt&ouml;lt&eacute;skor. K&eacute;rem, hogy ellenőrizd, hogy &iacute;rhat&oacute;-e a c&eacute;lk&ouml;nyvt&aacute;r.';
$lang['error'] = 'Hiba!';
$lang['next_picture'] = 'K&ouml;vetkező k&eacute;p';
$lang['admindescription'] = 'Az Album modul lehetőv&eacute; teszi, hogy egyszerűen tegy&eacute;l fel gal&eacute;ri&aacute;kat a weboldaladra.';
$lang['accessdenied'] = 'Hozz&aacute;f&eacute;r&eacute;s megtagadva. Ellenőrizd a jogosults&aacute;gokat.';
$lang['query_failed'] = 'Egy lek&eacute;rdez&eacute;s nem siker&uuml;lt. Pr&oacute;b&aacute;lj meg r&aacute;menni az &#039;Opci&oacute;k&#039; f&uuml;lre &eacute;s kattints &quot;friss&iacute;tő script futtat&aacute;sa&#039; linkre. Ha ez sem seg&iacute;t, akkor jelentsd a hib&aacute;t, l&eacute;gy sz&iacute;ves.';
$lang['changelog'] = '<ul><li>Verzi&oacute; 0.0.1. 2006. &aacute;prilis 5. Első kiad&aacute;s.</li></ul>';
$lang['view_default_stylesheet'] = 'Alap&eacute;rtelmezett st&iacute;luslap megtekint&eacute;se';
$lang['help_albums'] = 'A megmutatand&oacute; albumok azonos&iacute;t&oacute;i (vesszőkkel elv&aacute;lasztva).';
$lang['max_image_size'] = '<b>Maxim&aacute;lis k&eacute;pm&eacute;ret:</b> Az ezen m&eacute;retn&eacute;l nagyobb k&eacute;peket a rendszer automatikusan a megadott m&eacute;retűre &aacute;ll&iacute;tja be (m&aacute;r ha a sablon &iacute;gy van konfigur&aacute;lva) Javascript alkalmaz&aacute;s&aacute;val.';
$lang['help_sortdesc'] = 'Az albumok n&ouml;vekvő helyett cs&ouml;kkenő sorrendbe rendez&eacute;se.';
$lang['help_sortpicturesdesc'] = 'K&eacute;pek cs&ouml;kkenő sorrendben t&ouml;rt&eacute;nő megjelen&iacute;t&eacute;se. Ez azt eredm&eacute;nyezi, hogy a k&eacute;sőbb hozz&aacute;adott k&eacute;pek előr&eacute;bb jelennek meg.<p>P&eacute;ld&aacute;ul:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Hiba: ilyen nevű sablon m&aacute;r van. K&eacute;rlek, v&aacute;lassz m&aacute;s nevet.';
$lang['templateimported'] = 'A sablont sikeresen import&aacute;ltuk az adatb&aacute;zisba, &iacute;gy m&aacute;r k&eacute;sz a haszn&aacute;latra.';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module can be used to manage picture gallery</p>
<h3>How Do I Use It</h3>
<p>First go to Content -> Photo Albums and create Albums and add pictures to them.</p>
<p>To show all albums on a page, just put this code in your page content: </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>If you only want to show albums from a specific category then use use code like this:
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1&#039;}</code></p>
<p>The code above allows you to show in a page albums who belong to a category whose ID is 1.</p>
<p>You can also show multiple categories like this:
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1,3&#039;}</code></p>
<p>If you only want certain albums shown then use code like this:
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>The code above allows you to show in a page albums whose IDs are 1 and 3 for example. If you do not provide paramater &quot;albums&quot;, it will show all the albums.</p>
<h3>Templates</h3>

<h3>Throubleshooting</h3>
<h4>Thumbnails not working</h4>
<p><b>Note: You may have to change File Creation Mask (umask): from &quot;022&quot;
to &quot;002&quot;
to keep from getting 403 forbidden errors when trying to view
generated thumbnails
on your webhost.</b></p>
<h4>Thumbnails stretched incorrectly</h4>
<p>An easy way to fix this is to just edit modules/Album/css/stylesheet.css</p>
<p>And replace this:</p>
<pre>
/* Thumb width*/ 
	height:72px;
</pre>
<p>with this:</p>
<pre>
/* Thumb width*/ 
	/* height:72px; */
</pre>
<h4>Increasing the size of the thumbnails</h4>
<p>See this post on the forums: <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,7844.0.html&quot;>Larger Thumbnails for Album</a>.</p>
<h4>Image Effects (Transparancy) not quite working</h4>
<p>Make sure all the files in the templates/db folder have chmod 755. See: <a href=&quot;http://forum.cmsmadesimple.org/index.php?topic=10466.msg52526#msg52526&quot;> 	
Re: random_image in Album. Can it be a greybox thumbnail? {SOLVED!}</a>.</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>This module has been released under the <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['help_action'] = '<h4>Show list of recently added pictures</h4>
	 <p>You can show a list of added pictures calling Album like this:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<h4>Show random image</h4>
<p>First it counts all rows in the database (accounting the included Albums), finds a random number between &#039;0&#039; and the maximum number of rows. With this number the database pointer is being set to a specific row and the data is retrieved from the table and returned.</p>
<h5>How do I use it?</h5>
<p>Just insert the tag into your template/page like: <code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<p>To show a certain number of random images call it like this:</p>
<code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039; number=&#039;10&#039;}</code>
<h5>What parameters does it take?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>   - Album directory, default is: &#039;root_url&#039;/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>      - comma, space, dash or semicolon separated list of albums to show images of.</li>
  <li><em>(optional)</em> <tt>border</tt>      - stylesheetstyled border ala border=&#039;5px&#039;</li>
  <li><em>(optional)</em> <tt>picturename</tt> - picturename = True/False, sets a title with the picture name</li>
</ul>
so for example: {cms_module module=&#039;album&#039; action=&#039;random_image&#039; albums=&#039;1,3,4,6&#039; border=&#039;3px&#039; picturename=&#039;True&#039;}
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
<p>Random Image Author: Frank Prins <<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>></p>';
$lang['help_number'] = '<h4>Show a certain number of recently updated pictures</h4>
	 <p>You can show a list of a certain number of pictures by calling Album like this:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Album hozz&aacute;ad&aacute;sa';
$lang['error_nonamegiven'] = 'K&ouml;telező elkeresztelned az &uacute;j albumot.';
$lang['albumadded'] = 'Az albumot sikeresen hozz&aacute;adtuk. K&eacute;peket alant lehet hozz&aacute;adni.';
$lang['albumdeleted'] = 'AZ albumot sikeresen elt&aacute;vol&iacute;tottuk az adatb&aacute;zisb&oacute;l.';
$lang['noalbumstext'] = 'M&eacute;g nem csin&aacute;lt&aacute;l egy fot&oacute;albumot sem ebben a kateg&oacute;ri&aacute;ban.';
$lang['addpicture'] = 'K&eacute;pek hozz&aacute;ad&aacute;sa.';
$lang['addtemplate'] = 'Sablon hozz&aacute;ad&aacute;sa';
$lang['albumidtext'] = 'ID-k';
$lang['albumnametext'] = 'Albumok';
$lang['albumthumbtext'] = 'Miniatűr&ouml;k';
$lang['albumnumpicturestext'] = 'K&eacute;pek sz&aacute;ma';
$lang['albumreordertext'] = '&Uacute;jrarendez&eacute;s';
$lang['albumactionstext'] = 'Akci&oacute;k';
$lang['Albums'] = 'Albumok';
$lang['areyousure'] = 'Biztos vagy benne?';
$lang['browsepictures'] = 'V&aacute;ltoztat&aacute;s';
$lang['cancel'] = 'M&eacute;gsem';
$lang['changecomment'] = 'Komment szerkeszt&eacute;se';
$lang['changepicture'] = 'K&eacute;p megv&aacute;ltoztat&aacute;sa';
$lang['changethumb'] = 'Miniatűr megv&aacute;ltoztat&aacute;sa';
$lang['changethumbnail'] = 'Miniatűr megv&aacute;ltoztat&aacute;sa';
$lang['columns'] = 'A miniatűr&ouml;k oszlopainak maxim&aacute;lis sz&aacute;ma (0 eset&eacute;n nincs kor&aacute;lt. Csak a T&aacute;bl&aacute;zatok sablonn&aacute;l haszn&aacute;latos)';
$lang['comment'] = 'Komment';
$lang['currenttemplate'] = 'Album lista sablon';
$lang['currentpicture'] = 'Aktu&aacute;lis k&eacute;p';
$lang['currentthumbnail'] = 'Aktu&aacute;lis miniatűr';
$lang['deletealbum'] = 'T&ouml;rl&eacute;s';
$lang['deletepicture'] = 'T&ouml;rl&eacute;s';
$lang['Help'] = 'S&uacute;g&oacute;';
$lang['modify'] = 'V&aacute;ltoztat&aacute;s';
$lang['moveleft'] = 'Mozgat&aacute;s balra';
$lang['moveright'] = 'Mozgat&aacute;s jobbra';
$lang['multiplealbumtemplate'] = 'T&ouml;bb albumos sablon';
$lang['name'] = 'N&eacute;v';
$lang['nocomment'] = '(nincs komment)';
$lang['nothumbnail'] = '(nincs miniatűr)';
$lang['picture'] = 'K&eacute;p';
$lang['parentdir'] = '(Sz&uuml;lő k&ouml;nyvt&aacute;r)';
$lang['pictures'] = 'k&eacute;pek';
$lang['nopicturetext'] = 'Nincsenek k&eacute;pek ebben az albumban';
$lang['Picture'] = 'K&eacute;p';
$lang['Pictures'] = 'K&eacute;pek';
$lang['Properties'] = 'Tulajdons&aacute;gok';
$lang['propertiesupdated'] = 'Az album tulajdons&aacute;gait sikeresen mentett&uuml;k.';
$lang['resetthumb'] = 'Miniatűr reset-el&eacute;se';
$lang['return'] = 'Vissza';
$lang['rows'] = 'A miniatűr&ouml;k sorainak maxim&aacute;lis sz&aacute;ma (0 eset&eacute;n nincs kor&aacute;lt. Csak a T&aacute;bl&aacute;zatok sablonn&aacute;l haszn&aacute;latos)';
$lang['useinlinelinks'] = '<b>Belső linkek haszn&aacute;lata</b> - &Iacute;gy az oldalon megjelenő k&eacute;pek f&ouml;l&ouml;tt mindig lesz egy Album tag. Pluszban <strong>ez lehetőv&eacute; teszi, hogy az Album akkor is j&oacute;l műk&ouml;dj&ouml;n, amikor tov&aacute;bbi oldal blokkok r&eacute;szek&eacute;nt jelenik meg</strong>. <strong>Figyelj: ha ezt enged&eacute;lyezed, akkor ezzel elveszted az Albumra n&eacute;zve a pretty URL-ek haszn&aacute;lat&aacute;nak lehetős&eacute;g&eacute;t.</strong>';
$lang['autolinkstylesheet'] = '<b>St&iacute;luslap automatikus linkel&eacute;se</b>: Ez a checkbox arra j&oacute;, hogy az oldalba fejl&eacute;c&eacute;be automatikusan ker&uuml;lj&ouml;n egy, az album st&iacute;luslapj&aacute;ra mutat&oacute; link. Ezt &aacute;ltal&aacute;ban jobb bekapcsolva hagyni.';
$lang['selectall'] = '&Ouml;sszes kiv&aacute;laszt&aacute;sa';
$lang['selectpicture'] = 'Ezen k&eacute;p haszn&aacute;lata';
$lang['selectthumb'] = 'A k&eacute;p miniatűr v&aacute;ltozat&aacute;nak haszn&aacute;lata';
$lang['submit'] = 'Ment&eacute;s';
$lang['file_templates_help'] = '<b>Ezek olyan sablonok, amiket a haszn&aacute;latba v&eacute;tel előtt az adatb&aacute;zisba kell telep&iacute;teni.</b>';
$lang['template'] = 'Sablon';
$lang['deletetemplate'] = 'Sablon t&ouml;rl&eacute;se';
$lang['Template'] = 'Sablon';
$lang['templatenametext'] = 'Sablonok';
$lang['Templates'] = 'Telep&iacute;tett sablonok';
$lang['edittemplate'] = 'Sablon szerkeszt&eacute;se';
$lang['templatesaved'] = 'A sablont sikeresen menetett&uuml;k az adatb&aacute;zisba.';
$lang['errortemplatenameexists'] = 'Ilyen nevű sablon m&aacute;r van, k&eacute;rlek, v&aacute;lassz m&aacute;s nevet.';
$lang['error_filenotfound_defaulttemplate'] = 'Az ehhez a sablonhoz tartoz&oacute; file nem tal&aacute;lhat&oacute;.';
$lang['thumbnail'] = 'Miniatűr';
$lang['title'] = 'C&iacute;m';
$lang['uploadpicture'] = 'K&eacute;p felt&ouml;lt&eacute;se';
$lang['upload'] = 'Felt&ouml;lt&eacute;s';
$lang['view'] = 'N&eacute;zet';
$lang['options'] = 'Opci&oacute;k';
$lang['optionsupdated'] = 'Az opci&oacute;kat sikeresen friss&iacute;tett&uuml;k.';
$lang['defaultrows'] = 'A miniatűr&ouml;k sorainak maxim&aacute;lis sz&aacute;ma (0 eset&eacute;n nincs kor&aacute;lt. Csak a T&aacute;bl&aacute;zatok sablonn&aacute;l haszn&aacute;latos)';
$lang['defaultcolumns'] = 'A miniatűr&ouml;k oszlopainak maxim&aacute;lis sz&aacute;ma (0 eset&eacute;n nincs kor&aacute;lt. Csak a T&aacute;bl&aacute;zatok sablonn&aacute;l haszn&aacute;latos)';
$lang['defaulttemplate'] = 'Alap&eacute;rtelmezett sablon';
$lang['file_templates'] = 'File sablonok';
$lang['filename'] = 'Filen&eacute;v';
$lang['importtemplate'] = 'Sablon import&aacute;l&aacute;sa';
$lang['newtemplate'] = 'Az &uacute;j sablon neve';
$lang['defaultalbumpage'] = 'AZ alap&eacute;rtelmezett oldal, ami az albumot haszn&aacute;lja. Ennek az oldalnak k&ouml;telezően &quot;Album&quot; t&iacute;pus&uacute;nak kell lennie, vagy tartalmaznia kell az Album tag-et. Ez sz&uuml;ks&eacute;ges, ha haszn&aacute;lni szeretn&eacute;d a recently_updated lehetős&eacute;get.';
$lang['album_comment_updated'] = 'Az album kommentet sikeresen friss&iacute;tett&uuml;k.';
$lang['picture_comment_updated'] = 'A k&eacute;p kommentet sikeresen friss&iacute;tett&uuml;k.';
$lang['template_deleted'] = 'A sablont sikeresen t&ouml;r&ouml;lt&uuml;k az adatb&aacute;zisb&oacute;l';
$lang['error_empty_template'] = 'Hiba: a(z) %s nevű sablon, amit ez az album is haszn&aacute;lna, nem l&eacute;tezik. K&eacute;rlek, hogy az Album admin panelen rendelj hozz&aacute; egy l&eacute;tező sablont.';
$lang['run_upgrade_script'] = 'Friss&iacute;tő script futtat&aacute;sa';
$lang['addcategory'] = 'Kateg&oacute;ria hozz&aacute;ad&aacute;sa';
$lang['categories'] = 'Kateg&oacute;ri&aacute;k';
$lang['nocategories'] = 'M&eacute;g nem adt&aacute;l hozz&aacute; egy kateg&oacute;ri&aacute;t sem';
$lang['categorynametext'] = 'Kateg&oacute;ria neve';
$lang['categoryidtext'] = 'Kateg&oacute;ria azonos&iacute;t&oacute;ja';
$lang['categoryreordertext'] = 'Kateg&oacute;ria &uacute;jrarendez&eacute;se';
$lang['categoryactionstext'] = 'Akci&oacute;k';
$lang['categoryadded'] = 'A kateg&oacute;ri&aacute;t sikeresen mentett&uuml;k az adatb&aacute;zisba.';
$lang['categorymoved'] = 'A kateg&oacute;ri&aacute;t sikeresen &aacute;tmozgattuk.';
$lang['categoryupdated'] = 'A kateg&oacute;ri&aacute;t sikeresen friss&iacute;tett&uuml;k.';
$lang['editcategory'] = 'Kateg&oacute;ria szerkeszt&eacute;se';
$lang['categorydeleted'] = 'A kateg&oacute;ri&aacute;t sikeresen t&ouml;r&ouml;lt&uuml;k.';
$lang['error_nocategorynamegiven'] = 'K&ouml;telező elkeresztelned a kateg&oacute;ri&aacute;t.';
$lang['category_listings'] = 'Kateg&oacute;ria list&aacute;z&aacute;s';
$lang['album_updated'] = 'Az albumot sikeresen friss&iacute;tett&uuml;k';
$lang['uncategorized'] = 'Kategoriz&aacute;latlan albumok';
$lang['automatic_album_list_template'] = 'Automatikus (haszn&aacute;ld az egyes albumokhoz rendelt sablont)';
$lang['albummoved'] = 'Az albumot sikeresen &aacute;tmozgattuk.';
$lang['helpdetailpage'] = '<p>Page to display Albums in.  This can either be a page alias or an id. Used to allow Album pictures 
to be displayed in a different page from the album list.</p> <p>Example of use:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Album list</h3>

<p>You can use smarty tag {$albums} which is an array. Each of its elements is one of the selected albums.
The structure of an album is described in next chapter.
To show the albums, use loop <code>{foreach from=$albums item=album}{/foreach}</code></p>
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
	<li>{$picture->comment2} : comment2</li>
	<li>{$picture->comment3} : comment3</li>
	<li>{$picture->thumbnail} : adress (url) of thumbnail</li>
	<li>{$picture->picture} : adress (url) of picture</li>
	<li>{$picture->link} : link to picture</li>
	<li>{$picture->number} : picture number</li>
	<li>{$picture->thumbnailwidth}: width of thumbnail</li>
	<li>{$picture->thumbnailheight}: height of thumbnail</li>
	<li>{$picture->autothumbnailsize}: outputs something like &#039;height=&quot;76&quot;&#039; to make tall thumbnails fit in a box</li>
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
$lang['utma'] = '156861353.171847622.1175495376.1197285527.1200822285.96';
$lang['utmz'] = '156861353.1192984258.72.3.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>