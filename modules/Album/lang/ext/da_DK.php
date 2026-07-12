<?php
$lang['friendlyname'] = 'Foto album';
$lang['postinstall'] = 'Album er nu installeret. Husk at f&oslash;je det nye stylesheet &quot;Album (for default, ImageGallery, og Thickbox skabeloner)&quot; til skabelonen for den side du vil placere Album p&aring;.

<p><b>NB: Du vil m&aring;ske f&aring; behov for at &aelig;ndre File Creation Mask (umask): fra &quot;022&quot; til &quot;002&quot; for ikke at f&aring; &#039;403 forbidden&#039; fejlmeddelelsen n&aring;r du pr&oslash;ver at se de genererede thumbnails p&aring; dit webhotel</b></p>
';
$lang['postuninstall'] = 'Album er nu fjernet fra databasen';
$lang['uninstalled'] = 'Modulet er afinstalleret';
$lang['installed'] = 'Version %s er installeret';
$lang['upgraded'] = 'Modulet er opgraderet i version %.';
$lang['error_nofilesuploaded'] = 'Der opstod en fejl under upload. Tjek at mappen du uploader til er &#039;skrivbar&#039;';
$lang['error'] = 'Fejl!';
$lang['next_picture'] = 'N&aelig;ste billede';
$lang['admindescription'] = 'Album modulet g&oslash;r det let at vise foto gallerier p&aring; dit website';
$lang['accessdenied'] = 'Adgang n&aelig;gtet';
$lang['query_failed'] = 'A query failed. Trying going to the &quot;Options&quot; tab and clicking the &quot;Run Upgrade Script&quot; link. If that does not fix the problem, then please file a bug.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 April 2006. F&oslash;rste Version.</li></ul>';
$lang['view_default_stylesheet'] = 'Vis standard stylesheet&#039;et';
$lang['help_albums'] = 'En liste p&aring; en eller flere (adskilt af kommaer) ID&acute;er af Album, der &oslash;nskes vist.';
$lang['max_image_size'] = '<b>St&oslash;rst tilladte billedst&oslash;rrelse:</b> Billeder st&oslash;rre end dette vil automatisk blive nedskaleret (hvis templaten er sat op til at g&oslash;re det.) ved brug af Javascript. Obs: I &oslash;jeblikket er det kun &quot;Tables&quot; templaten, der bruger denne ops&aelig;tning.';
$lang['help_sortdesc'] = 'Sorter Album i faldende r&aelig;kkef&oslash;lgende i stedet for stigende.';
$lang['help_sortpicturesdesc'] = 'Sorter billeder i faldende r&aelig;kkef&oslash;lge i stedet for stigende. Dette vil f&aring; nye billeder, der tilf&oslash;jes til et album til at st&aring; forrest.<p>Eksempel til at vise billeder i omvendt r&aelig;kkef&oslash;lge:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Fejl: En template med det navn eksisterer allerede. V&aelig;lg venligst et andet navn.';
$lang['templateimported'] = 'Templaten blev importeret i databasen og er nu klar til brug.';
$lang['help'] = '<h3>Hvad kan dette modul?</h3>
<p>Dette modul kan vise og administrere billedgallerier</p>
<h3>Hvordan bruges det?</h3>
<p>Denne kode viser alle album p&aring; &eacute;n side: </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>Denne kode viser kun visse album:<p>
<code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>Koden ovenfor viser f. eks. de album, der er angivet med ID-tal 1 og 3. Hvis du ikke angiver parameteren &quot;albums&quot; vises alle album.</p>

<h3>Skabeloner</h3>
<p>Et &quot;Album (for default, ImageGallery, Thickbox skabeloner)&quot; stylesheet 
til default, ImageGallery, og Thickbox skabelonerne installeres sammen med modulet. Stylesheetet bliver muligvis overskrevet, hvis du opgraderer modulet og den bliver automatisk slettet hvis modulet bliver afinstalleret, s&aring; gem en kopi af  skabelonen hvis du &aelig;ndrer den. Tilf&oslash;j stylesheetet til skabelonen for den side du vil placere Album p&aring;.</p>

<h3>Fejlfinding</h3>
<p><b>NB: Du vil m&aring;ske f&aring; behov for at &aelig;ndre File Creation Mask (umask): fra &quot;022&quot; til &quot;002&quot; for ikke at f&aring; &#039;403 forbidden&#039; fejlmeddelelsen n&aring;r du pr&oslash;ver at se de genererede thumbnails p&aring; dit webhotel</b></p>

<h3>Support</h3>
<p>Modulet er udgivet under GPL og bruges p&aring; eget ansvar, uden garantier. L&aelig;s licens-teksten for den fulde ordlyd. </p>

<h3>Copyright og Licens</h3>
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>Dette modul er udgivet under <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. Du skal f&oslash;lge licensen for at bruge modulet</p>';
$lang['help_action'] = '<h4>Vise oversigt at senest tilf&oslash;jede billeder</h4>
	 <p>Du kan f&aring; vist en oversigt over seneste tilf&oslash;jede billeder ved at bruge f&oslash;lgende:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<p><b>Vigtigt</b>: Du skal v&aelig;lge en &quot;<b>Default page that contains Album.</b>&quot; for at bruge denne egenskab.</p>
<div style=&quot;border:1px solid black;&quot;>
<h4>Vis tilf&aelig;ldigt billede</h4>
<p>F&oslash;rst t&aelig;ller den alle r&aelig;kker i databasen (opg&oslash;rer de inkluderede albums), finder et tilf&aelig;ldigt nummer mellem &#039;0&#039; og det &acute;maximale antal af r&aelig;kker. Databasen bruger dette nummer til at bestemme, hvilken r&aelig;kke den skal bruge og henter dataene fra tabellen.</p>
<h5>Hvordan bruger jeg det?</h5>
<p>Inds&aelig;t tag&#039;en i din template eller p&aring; din side s&aring;dan her: <code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<p>For at vise et bestemt antal af tilf&aelig;ldige billeder skriv s&aring;dan her:</p>
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
<p>Random Image Author: Frank Prins <<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>></p>
</div>
';
$lang['help_number'] = '<h4>Vis et bestemt antal af nyligt opdaterede billeder</h4>
	 <p>Du kan vise en liste over over et antal billeder ved at kalde Album s&aring;ledes::</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Tilf&oslash;j album';
$lang['error_nonamegiven'] = 'Du skal give albummet et navn';
$lang['albumadded'] = 'Albummet er tilf&oslash;jet. Billeder kan tilf&oslash;jes herunder';
$lang['albumdeleted'] = 'Albummet er fjernet fra databasen';
$lang['noalbumstext'] = 'Du har ikke oprettet nogen billedalbum endnu';
$lang['addpicture'] = 'Tilf&oslash;j billede';
$lang['addtemplate'] = 'Tilf&oslash;j template';
$lang['albumidtext'] = 'ID&acute;er';
$lang['albumnametext'] = 'Album';
$lang['albumthumbtext'] = 'Thumbnails';
$lang['albumnumpicturestext'] = 'Antal billeder';
$lang['albumreordertext'] = 'Sort&eacute;r';
$lang['albumactionstext'] = 'Handlinger';
$lang['Albums'] = 'Albummer';
$lang['areyousure'] = 'Er du sikker?';
$lang['browsepictures'] = '&AElig;ndre';
$lang['cancel'] = 'Annull&eacute;r';
$lang['changecomment'] = '&AElig;ndre kommentar';
$lang['changepicture'] = '&AElig;ndre billede';
$lang['changethumb'] = '&AElig;ndre';
$lang['changethumbnail'] = '&AElig;ndre thumbnail';
$lang['columns'] = 'Maks antal thumbnail kolonner (0 = ingen gr&aelig;nse. Kun brugt ved Table template)';
$lang['comment'] = 'Kommentar';
$lang['currenttemplate'] = 'Skabelon til album liste';
$lang['currentpicture'] = 'Nuv&aelig;rende billede';
$lang['currentthumbnail'] = 'Nuv&aelig;rende thumbnail';
$lang['deletealbum'] = 'Slet';
$lang['deletepicture'] = 'Slet';
$lang['Help'] = 'Hj&aelig;lp';
$lang['modify'] = '&AElig;ndre';
$lang['moveleft'] = 'Flyt til venste';
$lang['moveright'] = 'Flyt til h&oslash;jre';
$lang['multiplealbumtemplate'] = 'Skabelon til flere album ad gangen';
$lang['name'] = 'Navn';
$lang['nocomment'] = '(ingen kommentar)';
$lang['nothumbnail'] = '(ingen thumbnail)';
$lang['picture'] = 'Billede';
$lang['parentdir'] = '(Parent directory)';
$lang['pictures'] = 'Billeder';
$lang['nopicturetext'] = 'Der er ingen billeder i dette album';
$lang['Picture'] = 'Billede';
$lang['Pictures'] = 'Billeder';
$lang['Properties'] = 'Egenskaber';
$lang['propertiesupdated'] = 'Egenskaber er gemt.';
$lang['resetthumb'] = 'Nulstil thumbnail';
$lang['return'] = 'Tilbage';
$lang['rows'] = 'Maks antal thumbnail r&aelig;kker (0 = ingen gr&aelig;nse. Kun brugt ved Tables template)';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album&#039;s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Check this box to automatically insert the link to the Album stylesheet in head of your page. This should usually be left enabled.';
$lang['selectall'] = 'V&aelig;lg alle';
$lang['selectpicture'] = 'Brug dette billede';
$lang['selectthumb'] = 'Brug Thumbnail fra dette billede';
$lang['submit'] = 'Gem';
$lang['file_templates_help'] = '<b>Dette er templates som du skal installere i databasen f&oslash;r du kan bruge dem.</b>';
$lang['template'] = 'Skabelon';
$lang['deletetemplate'] = 'Slet Skabelon';
$lang['Template'] = 'Skabelon';
$lang['templatenametext'] = 'Skabeloner';
$lang['Templates'] = 'Skabeloner';
$lang['edittemplate'] = 'Rediger skabelon';
$lang['templatesaved'] = 'Skabelonen er gemt';
$lang['errortemplatenameexists'] = 'En skabelon med dette navn eksisterer allerede, v&aelig;lg venligst et andet navn';
$lang['error_filenotfound_defaulttemplate'] = 'Skabelon filen for denne skabelon blev ikke fundet';
$lang['thumbnail'] = 'Thumbnail';
$lang['title'] = 'Titel';
$lang['uploadpicture'] = 'Send et billede';
$lang['upload'] = 'Send';
$lang['view'] = 'Se';
$lang['options'] = 'Egenskaber';
$lang['optionsupdated'] = 'Egenskaber e opdateret';
$lang['defaultrows'] = 'De';
$lang['defaultcolumns'] = 'Standard antal thumbnail kolloner for et ny album (o = ingen gr&aelig;nse. Kun brugt ved Tables template)';
$lang['defaulttemplate'] = 'Standard Template';
$lang['file_templates'] = 'Tilg&aelig;ngelige Templates';
$lang['filename'] = 'Filnavn';
$lang['importtemplate'] = 'Importer Template';
$lang['newtemplate'] = 'Navn for den nye template';
$lang['defaultalbumpage'] = 'Standard side, der indeholder albums. Denne side skal v&aelig;re af typen &quot;Album&quot; eller indeholde Album tag&#039;en.  N&oslash;dvendig hvis du bruger egenskaben &#039;recently_updated&#039;.';
$lang['album_comment_updated'] = 'Albummet blev opdateret.';
$lang['picture_comment_updated'] = 'Kommentaren til billedet blev opdateret.';
$lang['template_deleted'] = 'Templaten blev slettet fra databasen.';
$lang['error_empty_template'] = 'Error: The template named &quot;%s&quot; that this Album is set to use does not exist. Please go to the Album Admin Panel and assign a different template to this Album.';
$lang['run_upgrade_script'] = 'K&oslash;r opgraderings script';
$lang['addcategory'] = 'Tilf&oslash;j kategori';
$lang['categories'] = 'Kategorier';
$lang['nocategories'] = 'Du har ikke tilf&oslash;jet nogen kategorier endnu.';
$lang['categorynametext'] = 'Kategorinavn';
$lang['categoryidtext'] = 'Kategori id';
$lang['categoryreordertext'] = 'Sort&eacute;r kategorier';
$lang['categoryactionstext'] = 'Handlinger';
$lang['categoryadded'] = 'Kategorien blev tilf&oslash;jet til databasen.';
$lang['categorymoved'] = 'Kategorien blev flyttet.';
$lang['categoryupdated'] = 'Kategorien blev opdateret.';
$lang['editcategory'] = 'Rediger kategori.';
$lang['categorydeleted'] = 'Kategorien blev slettet.';
$lang['error_nocategorynamegiven'] = 'Du skal give kategorien et navn.';
$lang['category_listings'] = 'Oversigt over kategorier';
$lang['album_updated'] = 'Albummet blev opdateret';
$lang['uncategorized'] = 'Albums uden kategori';
$lang['automatic_album_list_template'] = 'Automatisk (brug skabelonen der er valgt for hvert album)';
$lang['albummoved'] = 'Albummet blev flyttet';
$lang['helpdetailpage'] = '<p>Page to display Albums in.  This can either be a page alias or an id. Used to allow Album pictures 
to be displayed in a different page from the album list.</p> <p>Example of use:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Album liste</h3>
<p>Et &quot;Album (for default, ImageGallery, Thickbox skabeloner)&quot; stylesheet 
til default, ImageGallery, og Thickbox skabelonerne installeres sammen med modulet. Stylesheetet bliver muligvis overskrevet, hvis du opgraderer modulet og det bliver automatisk slettet, hvis modulet bliver afinstalleret, s&aring; gem en kopi af skabelonen hvis du &aelig;ndrer den. Tilf&oslash;j stylesheetet til skabelonen for den side, du vil placere Album p&aring;.</p>

<p>Du har mulighed for at bruge smarty taggen {$albums} som er en array. 
Hvert af elementerne er et af de valgte album. Et albums struktur er vist i det n&aelig;ste afsnit. Brug dette loop <code>{foreach from=$albums item=album}{/foreach}</code> for at vise albummene. 

<h3>Album</h3>
<p>Hvis der kun er &eacute;t album, eller hvis et specifikt album er valgt, kan du bruge taggen {$album}. Det giver adgang til at bruge f&oslash;lgende:</p>
<ul>
	<li>{$album->name} : name</li>
	<li>{$album->comment} : comment</li>
	<li>{$album->columns} : column number</li>
	<li>{$album->rows} : row number</li>
	<li>{$album->thumbnail} : adress (url) of thumbnail</li>
	<li>{$album->link} : link to album</li>
	<li>{$album->picturecount} : number of pictures of an album</li>
</ul>

<h3>Billede liste</h3>
<p>Hvis et album er valgt, kan du bruge taggen {$pictures} som er en array af arrays : den indeholder r&aelig;kker som indeholder billeder.
Et billedes struktur er beskrevet i det n&aelig;ste afsnit.

Brug dette loop: <code>{foreach from=$pictures item=picturesrow}
{foreach from=$picturesrow item=onepicture}{/foreach}{/foreach}</code> for at vise billede listen.</p>

<h3>Billede</h3>
<p>Hvis et billede er valgt kan du bruge taggen {$picture}. Den tager automatisk det f&oslash;rste billede i et album, hvis intet billede er valgt. </p>
<ul>
	<li>{$picture->name} : name</li>
	<li>{$picture->comment} : comment</li>
	<li>{$picture->thumbnail} : adress (url) of thumbnail</li>
	<li>{$picture->picture} : adress (url) of picture</li>
	<li>{$picture->link} : link to picture</li>
	<li>{$picture->number} : picture number</li>
</ul>
<h3>Andet</h3>
<p>Du kan ogs&aring; bruge f&oslash;lgende tags:</p>
<ul>
	<li>{$returnlink} : retur til forg&aring;ende side</li>
	<li>{$albumnumber} : nummer p&aring; det viste album</li>
	<li>{$albumcount} : antal album</li>
	<li>{$picturenumber} : nummer p&aring; det viste billede</li>
	<li>{$picturecount} : antal billeder</li>
	<li>{$pagenumber} : nummer p&aring; den viste side</li>
	<li>{$pagecount} : antal sider</li>
	<li>{$link.album.1} : link til det f&oslash;rste album. Du kan ogs&aring; linke til et andet album-nummer</li>

	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>

	<li>{$link.picture.1} : link til f&oslash;rste billede. Du kan ogs&aring; linke til andet billede nummer</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : link til f&oslash;rste side. Du kan ogs&aring; linke til et andet sidenummer</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>
';
$lang['utma'] = '156861353.819513027.1186664218.1189495616.1189748057.15';
$lang['utmz'] = '156861353.1189495616.14.4.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>