<?php
$lang['friendlyname'] = 'Fotoalbum';
$lang['postinstall'] = 'Album er n&aring; installert. 
<p><b>Note: Du m&aring; kanskje endre Fil Opprettelse masken (umask): fra &quot;022&quot; til &quot;002&quot; for &aring; ikke f&aring; &#039;403 forbidden&#039; feil n&aring;r du fors&oslash;ker &aring; se p&aring; genererte miniatyrbilde p&aring; ditt nettsted.</b></p>';
$lang['postuninstall'] = 'Album er n&aring; fjernet fra databasen.';
$lang['uninstalled'] = 'Modulen er avinstallert';
$lang['installed'] = 'Utgave %s er installert';
$lang['upgraded'] = 'Modul oppgradert i utgave %s.';
$lang['error_nofilesuploaded'] = 'Det oppstod en feil ved opplasting. Vennligst sjekk at mappen er skrivbar.';
$lang['error'] = 'Feil!';
$lang['next_picture'] = 'Neste bilde';
$lang['admindescription'] = 'Album modulen tillater deg &aring; enkelt vise fotoalbum p&aring; din nettside.';
$lang['accessdenied'] = 'Ingen tilgang';
$lang['query_failed'] = 'En sp&oslash;rring feilet. Fors&oslash;k &aring; g&aring; til &quot;Innstillinger&quot; fliken og klikk &quot;Kj&oslash;r oppgraderingskript&quot; lenken. Om dette ikke fungerer, vennligst meld inn feil/bug.';
$lang['changelog'] = '<ul><li>Versjon 0.0.1. 5 April 2006. F&oslash;rste utgave. ???</li></ul>';
$lang['view_default_stylesheet'] = 'Vis Standard Stilark';
$lang['help_albums'] = 'En liste med en eller flere (separert med komma) IDer av Album &aring; vise.';
$lang['max_image_size'] = '<b>Maksimum bildest&oslash;rrelse:</b> Ethvert bilde st&oslash;rre enn dette vil automagisk bli nedskalert (om malen er konfigurert til &aring; gj&oslash;re dette) ved bruk av Javascript.';
$lang['help_sortdesc'] = 'Sorter album i synkende i stedet for stigende retning.';
$lang['help_sortpicturesdesc'] = 'Sorter bi8lder i synkende rekkef&oslash;lge i stedet for stigende. Dette medf&oslash;rer at nye bilder som legges til et album listes f&oslash;rst.<p>Eksempel p&aring; &aring; vise bilder i synkende rekkef&oslash;lge:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Feil: En mal med det navnet eksisterer allerede. Vennligst velg et annet navn.';
$lang['templateimported'] = 'Malen ble importert til databasen og er n&aring; klar til bruk.';
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
<h4>How to remove border around thumbnails</h4>
<p>Add this to the end of modules/Album/css/stylesheet.css:</p>
<pre>.thumb a { background-color:transparent; border:0; }</pre>
<h4>Fix large gap problems caused by clear:both</h4>
<p>See: <a href=&quot;RE: Cannot seem to get categories working&quot;>RE: Cannot seem to get categories working</a></p>
<p>Short answer, add this to your Stylesheet:</p>
<pre>
#main {
float: left;
}
</pre>
<h3>Troubleshooting</h3>
<p>Talk to your developer about using ImageMagick instead of GD, it performs better.</p>
<h4>Thumbnails not working</h4>
<p><b>Note: You may have to change File Creation Mask (umask): from &quot;022&quot;
to &quot;002&quot;
to keep from getting 403 forbidden errors when trying to view
generated thumbnails
on your webhost.</b></p>
<a href=&quot;http://dev.cmsmadesimple.org/forum/message.php?msg_id=1181&quot;>A possible workaround to thumbnail problems</a>
<h4>Thumbnails will not increase height above 72px</h4>
<p>See <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,14125.msg69907.html#msg69907&quot;> 	
Re: Album module and thumbnails in IE [SOLVED]</a>. Basically delete this part from your template:
{$onepicture->autothumbnailsize} and {$album->autothumbnailsize} to fix the album thumbnails size.</p>
<p>The &quot;autothumbnailsize&quot; feature was added to make all thumbnails stay at height=72. Perhaps this feature is more of a problem than a help.</p>

<h4>Thumbnails don&#039;t line up correctly</h4>
<p>You may need to shorten the titles of your Albums. Or try using the Tables template.</p>
<p>See <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,11996.0.html&quot;>Topic: Album Thumbnail layout [solved]</a>.</p>
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
<h4>Fix: Javascript doesn&#039;t load when pretty urls with hierarchy enabled - big picture doesn&#039;t show</h4>
Everything should work if you put this tag in between your
&amp;lt;head&amp;gt; &amp;lt;/head&amp;gt; tags in your page template like this:
&amp;lt;head&amp;gt;
...
{metadata}
&amp;lt;/head&amp;gt;

<p>That will make CMSMS output a tag like this:
&amp;lt;base href=&quot;http://www.elijahlofgren.com/&quot; /&amp;gt;</p>

<p>which should make all relative links work fine, even if hierarchy
is enabled.</p>


<p>The other option would be for me to change the template to include
a full URL to the JS so that it should always work, even if the
metadata tag is not used.</p>
<h4>Increasing the size of the thumbnails</h4>
<p>See this post on the forums: <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,7844.0.html&quot;>Larger Thumbnails for Album</a>.</p>
<h4>Image Effects (Transparancy) not quite working</h4>
<p>Make sure all the files in the templates/db folder have chmod 755. See: <a href=&quot;http://forum.cmsmadesimple.org/index.php?topic=10466.msg52526#msg52526&quot;> 	
Re: random_image in Album. Can it be a greybox thumbnail? {SOLVED!}</a>.</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &amp;copy; 2006, dam. All Rights Are Reserved.</p>
<p>This module has been released under the <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['help_action'] = '
<h4>Show list of recently added pictures</h4>
	 <p>You can show a list of added pictures calling Album like this:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<p><b>Important</b>: You must choose a &quot;<b>Default page that contains Album.</b>&quot; in order to use this feature.</p>
<div style=&quot;border:1px solid black;&quot;>
<h4>Show random image</h4>
<p>First it counts all rows in the database (accounting the included Albums), finds a random number between &#039;0&#039; and the maximum number of rows. With this number the database pointer is being set to a specific row and the data is retrieved from the table and returned.</p>
<h5>How do I use it?</h5>
<p>Just insert the tag into your template/page like: <code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<p>To show a certain number of random images call it like this:</p>
<code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039; number=&#039;10&#039;}</code>
<h5>What parameters the random_image action take?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>   - Album directory, default is: &#039;root_url&#039;/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>      - comma, space, dash or semicolon separated list of albums to show images of.</li>
  <li><em>(optional)</em> <tt>border</tt>      - stylesheetstyled border ala border=&#039;5px&#039;</li>
  <li><em>(optional)</em> <tt>picturename</tt> - picturename = True/False, sets a title with the picture name</li>
</ul>
<p><b>Note: These parameters are only available when calling Album with {cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</b></p>
<p>so for example: {cms_module module=&#039;album&#039; action=&#039;random_image&#039; albums=&#039;1,3,4,6&#039; border=&#039;3px&#039; picturename=&#039;True&#039;}</p>
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
<p>Random Image Author: Frank Prins &amp;lt;<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>&amp;gt;</p>
</div>';
$lang['help_number'] = '<h4>Viser et visst antall med nye bilder</h4>
	 <p>Du kan vise en liste med et visst antall bilder ved &aring; hente Album som dette:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Legg til album';
$lang['error_nonamegiven'] = 'Du m&aring; sette et navn p&aring; ditt nye album.';
$lang['albumadded'] = 'Albumet ble lagt til. Bilder kan legges til albumet nedenfor.';
$lang['albumdeleted'] = 'Albumet ble fjernet fra databasen.';
$lang['noalbumstext'] = 'Du har enn&aring; ikke laget noe fotoalbum i denne kategorien.';
$lang['addpicture'] = 'Legg til bilder';
$lang['addtemplate'] = 'Legg til mal';
$lang['albumidtext'] = 'ID&#039;er';
$lang['albumnametext'] = 'Album';
$lang['albumthumbtext'] = 'Miniatyrbilde';
$lang['albumnumpicturestext'] = 'Antall bilder';
$lang['albumreordertext'] = 'Omsorter';
$lang['albumactionstext'] = 'Handlinger';
$lang['Albums'] = 'Album';
$lang['areyousure'] = 'Er du sikker ?';
$lang['browsepictures'] = 'Endre';
$lang['cancel'] = 'Avbryt';
$lang['changecomment'] = 'Rediger kommentar';
$lang['changepicture'] = 'Endre bilde';
$lang['changethumb'] = 'Endre miniatyrbilde';
$lang['changethumbnail'] = 'Endre miniatyrbilde';
$lang['columns'] = 'Max antall miniatyrbilde kolonner (0 er ubegrenset. Kun brukt i tabell malene)';
$lang['comment'] = 'Kommentar';
$lang['currenttemplate'] = 'Album liste mal';
$lang['currentpicture'] = 'Gjeldende bilde';
$lang['currentthumbnail'] = 'Gjeldende miniatyrbilde';
$lang['deletealbum'] = 'Slett';
$lang['deletepicture'] = 'Slett';
$lang['Help'] = 'Hjelp';
$lang['modify'] = 'Endre';
$lang['moveleft'] = 'Flytt venstre';
$lang['moveright'] = 'Flytt h&oslash;yre';
$lang['multiplealbumtemplate'] = 'Multiple album mal';
$lang['name'] = 'Navn';
$lang['nocomment'] = '(ingen kommentar)';
$lang['nothumbnail'] = '(ingen miniatyrbilde)';
$lang['picture'] = 'Bilde';
$lang['parentdir'] = '(Foreldrekatalog)';
$lang['pictures'] = 'bilder';
$lang['nopicturetext'] = 'Det er ingen bilder i dette album.';
$lang['Picture'] = 'Bilde';
$lang['Pictures'] = 'Bilder';
$lang['Properties'] = 'Egenskaper';
$lang['propertiesupdated'] = 'Album egenskapene ble lagret.';
$lang['resetthumb'] = 'Tilbakestill miniatyrbilde';
$lang['return'] = 'Tilbake';
$lang['rows'] = 'Maksimalt antall miniatyrbilde rader (0 er ubegrenset. Kun brukt i tabell malene)';
$lang['useinlinelinks'] = '<b>Bruk Inline Lenker</b> - Dette vil gj&oslash;re at innholdet p&aring; siden alltid vil vises med Album taggen overfor alle bilder. I tillegg <strong>vil dette gj&oslash;re at Album fungerer korrekt n&aring;r det plasseres i ekstra side innholds blokker</strong>. <strong>OBS: &Aring; sl&aring; p&aring; denne funksjon vil sl&aring; av Album sin bruk av vakre URL&#039;er.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Linke Stilark</b>: Hak av i denne boksen for &aring; automatisk sette inn lenke til Album stilarket i hodet p&aring; siden. Dette b&oslash;r normal v&aelig;re sl&aring;tt p&aring;.';
$lang['selectall'] = 'Velg alle';
$lang['selectpicture'] = 'Bruk dette bildet';
$lang['selectthumb'] = 'Bruk miniatyrbilde av dette bildet';
$lang['submit'] = 'Lagre';
$lang['file_templates_help'] = '<b>Dette er maler du m&aring; installere i databasen f&oslash;r du kan benytte dem.</b>';
$lang['template'] = 'Mal';
$lang['deletetemplate'] = 'Slett mal';
$lang['Template'] = 'Mal';
$lang['templatenametext'] = 'Maler';
$lang['Templates'] = 'Maler';
$lang['edittemplate'] = 'Rediger mal';
$lang['templatesaved'] = 'Malen ble lagret i databasen.';
$lang['errortemplatenameexists'] = 'En mal med det navnet eksisterer allerede, vennligst velg et annet navn.';
$lang['error_filenotfound_defaulttemplate'] = 'Mal-filen for denne malen ble ikke funnet.';
$lang['thumbnail'] = 'Miniatyrbilde ';
$lang['title'] = 'Tittel';
$lang['uploadpicture'] = 'Last opp et bilde';
$lang['upload'] = 'Last opp';
$lang['view'] = 'Vis';
$lang['options'] = 'Valg';
$lang['optionsupdated'] = 'Valgene ble oppdatert.';
$lang['defaultrows'] = 'Standard maks. antall miniatyrbilde rader for nye album (0 er ubegrenset. Kun brukt p&aring; Tabell malen)';
$lang['defaultcolumns'] = 'Standard maks. antall miniatyrbilde kolonner for nye album (0 er ubegrenset. Bare brukt p&aring; Tabell malen)';
$lang['defaulttemplate'] = 'Standard mal';
$lang['file_templates'] = 'Fil-maler(kontra database-maler)';
$lang['filename'] = 'Fil navn';
$lang['importtemplate'] = 'Importer mal';
$lang['newtemplate'] = 'Navn p&aring; den nye malen';
$lang['defaultalbumpage'] = 'Standard side som inneholder Album. Denne siden m&aring; v&aelig;re en Album-type side eller inneholde Album taggen. N&oslash;dvendig om du bruker recently_updated muligheten.';
$lang['album_comment_updated'] = 'Album kommentaren ble oppdatert.';
$lang['picture_comment_updated'] = 'Bilde kommentaren ble oppdatert.';
$lang['template_deleted'] = 'Malen ble slettet fra databasen.';
$lang['error_empty_template'] = 'Feil: Malen med navn &quot;%s&quot; som dette Album er satt til &aring; bruke eksisterer ikke. Vennligst g&aring; til Album Admin Panelet og tilknytt en annen mal til dette Album.';
$lang['run_upgrade_script'] = 'Kj&oslash;r oppgraderings skript';
$lang['addcategory'] = 'Legg til kategori';
$lang['categories'] = 'Kategorier';
$lang['nocategories'] = 'Du har ikke lagt til noen kategorier enn&aring;.';
$lang['categorynametext'] = 'Kategori navn';
$lang['categoryidtext'] = 'Kategori id';
$lang['categoryreordertext'] = 'Omsorter kategori';
$lang['categoryactionstext'] = 'Hendelser';
$lang['categoryadded'] = 'Kategorien ble lagt til databasen.';
$lang['categorymoved'] = 'Kategorien ble flyttet.';
$lang['categoryupdated'] = 'Kategorien ble oppdatert.';
$lang['editcategory'] = 'Rediger Kategori';
$lang['categorydeleted'] = 'Kategorien ble slettet.';
$lang['error_nocategorynamegiven'] = 'Du m&aring; gi din Kategori et navn.';
$lang['category_listings'] = 'Kategori liste';
$lang['album_updated'] = 'Albumet ble oppdatert.';
$lang['uncategorized'] = 'Ukategoriserte Album';
$lang['automatic_album_list_template'] = 'Automatisk (benytt mal tilknyttet til hvert album)';
$lang['albummoved'] = 'Albumet ble flyttet.';
$lang['helpdetailpage'] = '<p>Side &aring; vise Album&#039;er p&aring;.  Dette kan enten v&aelig;re en side-alias eller en id. Brukt for &aring; tillate Album bilder &aring; bli vist p&aring; en annen side enn Album listen.</p> <p>Eksempel p&aring; bruk:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Important tips for modifying templates</h3>
<h4>Enable debug mode!</h4>
<p>Unless you enable debug mode, important errors about undefined template variables will be hidden, making debugging templates very difficult!</p>
<p>You can enable debug mode by opening config.php and setting:</p>
<code>$config[&#039;debug&#039;] = true;<code>

<h3>Album list</h3>

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
	<li>{$picture->autothumbnailsize}: outputs something like &#039;height=&quot;76&quot; to make tall thumbnails fit in a box</li>
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
</ul>';
$lang['utmz'] = '156861353.1187449870.214.6.utmccn=(referral)|utmcsr=swik.net|utmcct=/opensource/del.icio.us tag/opensource/CMS Made Simple - Welcome to CMS Made Simple/bizm0|utmcmd=referral';
$lang['utma'] = '156861353.1005976546.1181941632.1187521041.1187527547.217';
$lang['utmc'] = '156861353';
?>