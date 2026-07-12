<?php
$lang['friendlyname'] = 'Fotoalbum';
$lang['postinstall'] = 'Modulen Album &auml;r nu installerad. <p><b>OBS! Du kan beh&ouml;va &auml;ndra Filr&auml;ttighetsmasken (umask) fr&aring;n 022 till 002 f&ouml;r att inte f&aring; felet 403: f&ouml;rbjudna fel, n&auml;r du f&ouml;rs&ouml;ker visa genererade tumnagelbilder p&aring; din webbserver.</b></p>';
$lang['postuninstall'] = 'Album &auml;r nu borttaget fr&aring;n databasen.';
$lang['uninstalled'] = 'Modulen har avinstallerats.';
$lang['installed'] = 'Version %s har installerats.';
$lang['upgraded'] = 'Modulen upgraderad till version %s.';
$lang['error_nofilesuploaded'] = 'Det blev fel vid uppladdningen. V&auml;nligen kontrollera att mappen &auml;r skrivbar.';
$lang['error'] = 'Fel!';
$lang['next_picture'] = 'N&auml;sta bild';
$lang['admindescription'] = 'Med Album-modulen kan du enkelt visa fotogallerier p&aring; din webbsida.';
$lang['accessdenied'] = '&Aring;tkomst nekad';
$lang['query_failed'] = 'En fr&aring;gek&ouml;rning misslyckades. F&ouml;rs&ouml;k g&aring; till fliken &quot;Inst&auml;llningar&quot; och klicka p&aring; l&auml;nken &quot;K&ouml;r uppgraderingsscript&quot;. Om det inte funkar, v&auml;nligen skicka en buggrapport.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 April 2006. F&ouml;rsta utg&aring;van.</li></ul>';
$lang['view_default_stylesheet'] = 'Visa standard-stilmallen';
$lang['help_albums'] = 'En lista med ett eller flera (separerade med kommatecken) ID&#039;n f&ouml;r album som ska visas.';
$lang['max_image_size'] = '<b>Maximum image size:</b> Any images larger than this will automatically be scaled down (if the template is configured to do that.) using Javascript. Note: Currently only the &quot;Tables&quot; template uses this setting.';
$lang['help_sortdesc'] = 'Sortera album i fallande ordning ist&auml;ller f&ouml;r stigande.';
$lang['help_sortpicturesdesc'] = 'Sort pictures in descending order rather than ascending. This will make new pictues that are added to an album to be listed first.<p>Example to show pictures in reverse order:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Error: Det finns redan en mall med det namnet, v&auml;lj ett annat namn.';
$lang['templateimported'] = 'Mallen importerades till databasen och &auml;r nu installerat och kan anv&auml;ndas.';
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
$lang['help_action'] = '<h4>Visa nyligen tillagda bilder</h4>
	 <p>Du kan visa en lista med tillagda bilder genom att anropa Album s&aring;h&auml;r:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<p><b>Important</b>: You must choose a &quot;<b>Default page that contains Album.</b>&quot; in order to use this feature.</p>
<div style=&quot;border:1px solid black;&quot;>
<h4>Visa slumpm&auml;ssig bild</h4>
<p>F&ouml;rst r&auml;knas alla rader i databasen (inr&auml;knat de inkluderade albumen), sedan v&auml;ljs en slumpm&auml;ssig siffra mellan &#039;0&#039; och det antal rader den hittade. Med detta nummer pekar databasen p&aring; en specifik rad och data h&auml;mtas fr&aring;n tabellen.</p>
<h5>Hur g&ouml;r jag?</h5>
<p>S&auml;tt in taggen i din mall/sida som:<code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<p>F&ouml;r att h&auml;mta ett s&auml;rskilt nummer slumpade bilder g&ouml;r du s&aring;h&auml;r:</p>
<code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039; number=&#039;10&#039;}</code>
<h5>Vilka parametrar beh&ouml;vs?</h5>
<p>
<ul>
	<li><em>(valfri)</em> <tt>bildkatalog</tt>   - Albumets katalog, standard &auml;r: &#039;root_url&#039;/uploads/images</li>
	<li><em>(valfri)</em> <tt>album</tt>      - komma-, mellanslag-, punkt- eller semicolon-separerad lista av album att visa bilder av.</li>
  <li><em>(valfri)</em> <tt>kanter</tt>      - stilmalls-stylad kant ala border=&#039;5px&#039;</li>
  <li><em>(valfril)</em> <tt>bildnamn</tt> - picturename = True/False (Sant/Falskt), s&auml;tter en titel med bildens namn</li>
</ul>till exempel: {cms_module module=&#039;album&#039; action=&#039;random_image&#039; albums=&#039;1,3,4,6&#039; border=&#039;3px&#039; picturename=&#039;True&#039;}
</p>
<h5>Att g&ouml;ra</h5>
<p>
<ul>
	<li>arrangera klassnamnen av div-taggarna, och specifiera m&ouml;jlig anv&auml;ndning i stilmall.<br />
		(ta bort border (kant-) parametern)</li>
  <li>f&aring; albumnamn fr&aring;n tabell album_albums, och g&ouml;r det m&ouml;jligt att best&auml;mma det i utdatan.</li>
  <li>g&ouml;ra det m&ouml;jlig att l&auml;nka fr&aring;n bilden till det specifierade albumet? Bild?</li>
  <li>anv&auml;ndning av max h&ouml;jd-/bredd- parameter och anpassa tumnagelns storlek om n&ouml;dv&auml;ndigt.</li>
</ul>
</p>
<p>Random Image-f&ouml;rfattare: Frank Prins <<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>></p>
</&amp;div>';
$lang['help_number'] = '<h4>Visa ett speciellt nummer nyligen uppdaterade bilder</h4>
	 <p>Du kan visa ett specielt nummer bilder genom att anropa Album s&aring;h&auml;r:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'L&auml;gg till ett album';
$lang['error_nonamegiven'] = 'Du m&aring;ste ge ett namn till ditt nya album.';
$lang['albumadded'] = 'Albumet har lagts till. Bilder kan l&auml;ggas till i albumet nedan.';
$lang['albumdeleted'] = 'Albumet har tagits bort fr&aring;n databasen.';
$lang['noalbumstext'] = 'Du har inte skapat n&aring;got fotoalbum &auml;nnu.';
$lang['addpicture'] = 'L&auml;gg till bilder';
$lang['addtemplate'] = 'L&auml;gg till en mall';
$lang['albumidtext'] = 'ID-nummer';
$lang['albumnametext'] = 'Album';
$lang['albumthumbtext'] = 'Tumnagelbilder';
$lang['albumnumpicturestext'] = 'Antal bilder';
$lang['albumreordertext'] = 'Omsortera';
$lang['albumactionstext'] = 'Handlingar';
$lang['Albums'] = 'Album';
$lang['areyousure'] = '&Auml;r du s&auml;ker?';
$lang['browsepictures'] = '&Auml;ndra';
$lang['cancel'] = '&Aring;ngra';
$lang['changecomment'] = 'Redigera kommentar';
$lang['changepicture'] = '&Auml;ndra bild';
$lang['changethumb'] = '&Auml;ndra';
$lang['changethumbnail'] = '&Auml;ndra tumnagelbild';
$lang['columns'] = 'Max antal kolumner f&ouml;r tumnagelbilder (0 betyder obegr&auml;nsade. Anv&auml;nds bara i mallen Tables)';
$lang['comment'] = 'Kommentera';
$lang['currenttemplate'] = 'Aktuell mall';
$lang['currentpicture'] = 'Aktuell bild';
$lang['currentthumbnail'] = 'Aktuell tumnagelbild';
$lang['deletealbum'] = 'Ta bort';
$lang['deletepicture'] = 'Ta bort';
$lang['Help'] = 'Hj&auml;lp';
$lang['modify'] = '&Auml;ndra';
$lang['moveleft'] = 'Flytta &aring;t v&auml;nster';
$lang['moveright'] = 'Flytta &aring;t h&ouml;ger';
$lang['multiplealbumtemplate'] = 'Mall f&ouml;r flera album';
$lang['name'] = 'Namn';
$lang['nocomment'] = '(inga kommentarer)';
$lang['nothumbnail'] = '(ingen tumnagelbild)';
$lang['picture'] = 'Bild';
$lang['parentdir'] = '(F&ouml;r&auml;lderkatalog)';
$lang['pictures'] = 'bilder';
$lang['nopicturetext'] = 'Det finns inga bilder i det h&auml;r albumet.';
$lang['Picture'] = 'Bild';
$lang['Pictures'] = 'Bilder';
$lang['Properties'] = 'Egenskaper';
$lang['propertiesupdated'] = 'Albumegenskaperna har sparats';
$lang['resetthumb'] = '&Aring;terst&auml;ll tumnagelbild';
$lang['return'] = 'Tillbaka';
$lang['rows'] = 'Max antal rader f&ouml;r tumnagelbilder (0 betyder obegr&auml;nsade. Anv&auml;nds bara i mallen Tables=';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album&#039;s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Check this box to automatically insert the link to the Album stylesheet in head of your page. This should usually be left enabled.';
$lang['selectall'] = 'V&auml;lj alla';
$lang['selectpicture'] = 'Anv&auml;nd den h&auml;r bilden';
$lang['selectthumb'] = 'Anv&auml;nd den h&auml;r bildens tumnagelbild';
$lang['submit'] = 'Spara';
$lang['file_templates_help'] = '<b>These are templates that you must install to the database before you can use them.</b>';
$lang['template'] = 'Mall';
$lang['deletetemplate'] = 'Ta bort mall';
$lang['Template'] = 'Mall';
$lang['templatenametext'] = 'Mallar';
$lang['Templates'] = 'Mallar';
$lang['edittemplate'] = 'Redigera mall';
$lang['templatesaved'] = 'Mallen har sparats i databasen.';
$lang['errortemplatenameexists'] = 'En mall med det namnet finns redan, v&auml;nligen v&auml;lj ett annat namn.';
$lang['error_filenotfound_defaulttemplate'] = 'Mallfilen f&ouml;r den h&auml;r mallen hittades inte.';
$lang['thumbnail'] = 'Tumnagelbild';
$lang['title'] = 'Titel';
$lang['uploadpicture'] = 'Ladda upp en bild';
$lang['upload'] = 'Ladda upp';
$lang['view'] = 'Visa';
$lang['options'] = 'Inst&auml;llningar';
$lang['optionsupdated'] = 'Inst&auml;llningarna har uppdaterats.';
$lang['defaultrows'] = 'Maximala antalet rader f&ouml;r tumnagelbilder som &auml;r standard f&ouml;r nya album (0 betyder obegr&auml;nsade. Anv&auml;nds bara i mallen Tables)';
$lang['defaultcolumns'] = 'Maximala antalet kolumner f&ouml;r tumnagelbilder som &auml;r standard f&ouml;r nya album (0 betyder obegr&auml;nsade. Anv&auml;nds bara i mallen Tables)';
$lang['defaulttemplate'] = 'Standardmall';
$lang['file_templates'] = 'Filmall';
$lang['filename'] = 'Filnamn';
$lang['importtemplate'] = 'Importera mall';
$lang['newtemplate'] = 'Namn f&ouml;r den nya mallen';
$lang['defaultalbumpage'] = 'Standardsidan som inneh&aring;ller Album. Denna sida m&aring;ste vara av typen &quot;Album&quot; eller inneh&aring;lla Album-taggen. Viktigt om du anv&auml;nder &#039;recently_updated&#039;-funktionen.';
$lang['album_comment_updated'] = 'Albumskommentaren uppdaterades.';
$lang['picture_comment_updated'] = 'Bildkommentaren uppdaterades.';
$lang['template_deleted'] = 'Mallen togs bort fr&aring;n databasen.';
$lang['error_empty_template'] = 'Error: Mallen &quot;%s&quot; som detta album &auml;r inst&auml;llt att anv&auml;nda finns inte. G&aring; till Album Admin Panel och v&auml;lj en annan mall till albumet.';
$lang['run_upgrade_script'] = 'K&ouml;r uppgraderingsskriptet.';
$lang['addcategory'] = 'L&auml;gg till kategori';
$lang['categories'] = 'Kategorier';
$lang['nocategories'] = 'Du har inte lagt till n&aring;gra kategorier &auml;nnu.';
$lang['categorynametext'] = 'Kategorinamn';
$lang['categoryidtext'] = 'Kategori-id';
$lang['categoryreordertext'] = 'Ordna om kategori';
$lang['categoryactionstext'] = '&Aring;tg&auml;rder';
$lang['categoryadded'] = 'Kategorin lades till i databasen.';
$lang['categorymoved'] = 'Kategorin flyttades.';
$lang['categoryupdated'] = 'Kategori uppdaterades.';
$lang['editcategory'] = '&Auml;ndra kategori';
$lang['categorydeleted'] = 'Kategori togs bort.';
$lang['error_nocategorynamegiven'] = 'Du m&aring;ste namnge kategorin.';
$lang['category_listings'] = 'Lista kategorier';
$lang['album_updated'] = 'Albumet uppdaterades';
$lang['uncategorized'] = 'Okategoriserade album';
$lang['automatic_album_list_template'] = 'Automatisk (anv&auml;nd mallar som &auml;r kopplade till varje album)';
$lang['albummoved'] = 'Albumet flyttades.';
$lang['helpdetailpage'] = '<p>Sida att visa Album i. Det kan antingen vara ett sid-alias, eller ett id. Anv&auml;nds f&ouml;r att till&aring;ta Album-bilder att visas p&aring; andra sidor fr&aring;n album-listan.</p> <p>Till exempel:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Album list</h3>

En stilmall med namnet &quot;Album (f&ouml;r mallarna default, ImageGallery och Thickbox) f&ouml;r mallarna default, ImageGallery och Thickbox installeras med modulen.<br />
Den stilmallen tas bort n&auml;r modulen avinstalleras och kan skrivas &ouml;ver vid en uppgradering, s&aring; du kan vilja ta en kopia om du ska &auml;ndra den.<br />
Koppla stilmallen till den sidmall som anv&auml;nds.

<p>Du kan anv&auml;nda smartytaggen {$albums} som &auml;r en array. Vart och ett av elementen i arrayen &auml;r ett av de valda albumen.
Strukturen f&ouml;r ett album beskrivs i n&auml;sta kapitel.
F&ouml;r att visa album, anv&auml;nd loopen <code>{foreach from=$albums item=album}{/foreach}</code></p>

<h3>Album</h3>
<p>Om det bara finns ett album, eller om ett specifikt album &auml;r valt, kan du anv&auml;nda taggen {$album}. Den ger tillg&aring;ng till f&ouml;ljande poster :</p>
<ul>
	<li>{$album->name} : namn</li>
	<li>{$album->comment} : kommentar</li>
	<li>{$album->columns} : kolumnnummer</li>
	<li>{$album->rows} : radnummer</li>
	<li>{$album->thumbnail} : adress (url) f&ouml;r tumnagelbilden</li>
	<li>{$album->link} : l&auml;nk till album</li>
	<li>{$album->picturecount} : antal bilder i ett album</li>
</ul>
<h3>Bildlista</h3>
<p>Om ett album &auml;r valt kan du anv&auml;nda taggen {$pictures} som &auml;r en array med arrayer - den inneh&aring;ller rader som inneh&aring;ller bilder.
Strukturen f&ouml;r en bild beskrivs i f&ouml;ljande kapitel.
F&ouml;r att visa en lista med bilder, anv&auml;nd f&ouml;ljande loop:
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>

<h3>Bild</h3>
<p>Om en bild &auml;r vald kan du anv&auml;nda taggen {$picture}. Den s&auml;tts automatiskt till f&ouml;rsta bilden i albumet om ingen bild &auml;r vald.</p>
<ul>
	<li>{$picture->name} : namn</li>
	<li>{$picture->comment} : kommentar</li>
	<li>{$picture->thumbnail} : adress (url) f&ouml;r tumnagelbilden</li>
	<li>{$picture->picture} : adress (url) f&ouml;r bilden</li>
	<li>{$picture->link} : l&auml;nk till bilden</li>
	<li>{$picture->number} : bildnummer</li>
</ul>
<h3>Annat</h3>
<p>Du kan &auml;ven anv&auml;nda f&ouml;ljande taggar :</p>
<ul>
	<li>{$returnlink} : tillbaka till f&ouml;reg&aring;ende sida</li>
	<li>{$albumnumber} : nummer f&ouml;r aktuellt album</li>
	<li>{$albumcount} : antal album</li>
	<li>{$picturenumber} : nummer f&ouml;r aktuell bild</li>
	<li>{$picturecount} : antal bilder</li>
	<li>{$pagenumber} : nummer f&ouml;r aktuell sida</li>
	<li>{$pagecount} : antal sidor</li>
	<li>{$link.album.1} : l&auml;nk till f&ouml;rsta albumet. Du kan &auml;ven indikera ett annat nummer</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : l&auml;nk till f&ouml;rsta bilden. Du kan &auml;ven indikera ett annat nummer. </li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : l&auml;nk till f&ouml;rsta sidan. Du kan &auml;ven indikera ett annat nummer</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>';
$lang['utmz'] = '156861353.1187303065.16.8.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/scm/|utmcmd=referral';
$lang['utma'] = '156861353.36946172.1185841953.1187303065.1187385254.17';
$lang['utmc'] = '156861353';
?>