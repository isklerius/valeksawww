<?php
$lang['friendlyname'] = 'Foto Albumy';
$lang['postinstall'] = 'Album is now installed. <p><b>Note: You may have to change File Creation Mask (umask): from &quot;022&quot;
to &quot;002&quot; to keep from getting 403 forbidden errors when trying to view generated thumbnails on your webhost.</b></p>';
$lang['postuninstall'] = 'Album bol odstr&aacute;nen&yacute; z datab&aacute;zy.';
$lang['uninstalled'] = 'Modul odin&scaron;talovan&yacute;';
$lang['installed'] = 'Verzia %s nain&scaron;talovan&aacute;';
$lang['upgraded'] = 'Modul upgradovan&yacute; na verziu %s.';
$lang['error_nofilesuploaded'] = 'Vyskytla sa chyba nahr&aacute;vania. Pros&iacute;m uistite sa, že do adres&aacute;ra sa d&aacute; zapisovať';
$lang['error'] = 'Chyba!';
$lang['next_picture'] = 'Ďal&scaron;&iacute;a fotka';
$lang['admindescription'] = 'MOdul Album Vam umožn&iacute; ľahko zobrazovať fotogalerie na Va&scaron;ej webstr&aacute;nke.';
$lang['accessdenied'] = 'Zak&aacute;zan&yacute; pr&iacute;stup';
$lang['query_failed'] = 'A query failed. Trying going to the &quot;Options&quot; tab and clicking the &quot;Run Upgrade Script&quot; link. If that does not fix the problem, then please file a bug.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 April 2006. Initial Release.</li></ul>';
$lang['view_default_stylesheet'] = 'Zobraziť z&aacute;kladn&eacute; CSS &scaron;t&yacute;ly';
$lang['help_albums'] = 'Zoznam jedn&eacute;ho alebo viacer&yacute;ch (oddelen&eacute; čiarkami) IDčiek albumov k zobrazeniu.';
$lang['max_image_size'] = '<b>Maximum image size:</b> Any images larger than this will automatically be scaled down (if the template is configured to do that.) using Javascript. Note: Currently only the &quot;Tables&quot; template uses this setting.';
$lang['help_sortdesc'] = 'Triediť albumy zostupne.';
$lang['help_sortpicturesdesc'] = 'Sort pictures in descending order rather than ascending. This will make new pictues that are added to an album to be listed first.<p>Example to show pictures in reverse order:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Chyba: &Scaron;ablona s t&yacute;mto n&aacute;zvom už existuje. pros&iacute;m vyberte si in&yacute; n&aacute;zov.';
$lang['templateimported'] = '&Scaron;ablona bola nahrat&aacute; do datab&aacute;zy a je pripraven&aacute; na použitie';
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
<head> </head> tags in your page template like this:
<head>
...
{metadata}
</head>

<p>That will make CMSMS output a tag like this:
<base href=&quot;http://www.elijahlofgren.com/&quot; /></p>

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
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>This module has been released under the <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['help_action'] = '<h4>Show list of recently added pictures</h4>
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
<p>Random Image Author: Frank Prins <<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>></p>
</div>
';
$lang['help_number'] = '<h4>Show a certain number of recently updated pictures</h4>
	 <p>You can show a list of a certain number of pictures by calling Album like this:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Pridať album';
$lang['error_nonamegiven'] = 'Nov&eacute;mu albumu mus&iacute;te dať n&aacute;zov';
$lang['albumadded'] = 'Album bol pridan&yacute;. Tu pod m&ocirc;žte prid&aacute;vať fotky';
$lang['albumdeleted'] = 'Album bol odst&aacute;nen&yacute; z datab&aacute;zy';
$lang['noalbumstext'] = 'Nem&aacute;te vytvoren&eacute; žiadne fotoalbumy v tejto kategorii';
$lang['addpicture'] = 'Pridať fotky';
$lang['addtemplate'] = 'Pridať &scaron;ablonu';
$lang['albumidtext'] = 'ID albumu';
$lang['albumnametext'] = 'Albumy';
$lang['albumthumbtext'] = 'N&aacute;hľady';
$lang['albumnumpicturestext'] = 'Počet fotiek';
$lang['albumreordertext'] = 'Preusporiadať';
$lang['albumactionstext'] = 'Akcie';
$lang['Albums'] = 'Albumy';
$lang['areyousure'] = 'Ste si ist&yacute;?';
$lang['browsepictures'] = 'Zmeniť';
$lang['cancel'] = 'Zru&scaron;iť';
$lang['changecomment'] = 'Editovať koment&aacute;r';
$lang['changepicture'] = 'Zmeniť fotku';
$lang['changethumb'] = 'Zmeniť n&aacute;hľad';
$lang['changethumbnail'] = 'Zmeniť n&aacute;hľad';
$lang['columns'] = 'Maxim&aacute;lny počet n&aacute;hľadov&yacute;ch stĺpcov (0 znamen&aacute; neobmedzene. Použit&eacute; iba pri tabuľkov&yacute;ch &scaron;ablonach)';
$lang['comment'] = 'Koment&aacute;r';
$lang['currenttemplate'] = '&Scaron;ablona zoznamu albumov';
$lang['currentpicture'] = 'Aktu&aacute;lna fotka';
$lang['currentthumbnail'] = 'Aktu&aacute;lny n&aacute;hľad';
$lang['deletealbum'] = 'Zmazať';
$lang['deletepicture'] = 'Zmazať';
$lang['Help'] = 'Pomoc';
$lang['modify'] = 'Zmeniť';
$lang['moveleft'] = 'Posun&uacute;ť doľava';
$lang['moveright'] = 'Posun&uacute;ť doprava';
$lang['multiplealbumtemplate'] = 'Viacn&aacute;sobn&aacute; &scaron;ablona albumov';
$lang['name'] = 'N&aacute;zov';
$lang['nocomment'] = '(bez koment&aacute;ra)';
$lang['nothumbnail'] = '(bez n&aacute;hľadu)';
$lang['picture'] = 'Fotka';
$lang['parentdir'] = '(Nadraden&yacute; adres&aacute;r)';
$lang['pictures'] = 'fotky';
$lang['nopicturetext'] = 'Tento album neobsahuje fotky.';
$lang['Picture'] = 'Fotka';
$lang['Pictures'] = 'Fotky';
$lang['Properties'] = 'Vlastnosti';
$lang['propertiesupdated'] = 'Vlastnosti albumu boli nahrat&eacute;.';
$lang['resetthumb'] = 'Zru&scaron;iť/obnoviť n&aacute;hľad';
$lang['return'] = 'Sp&auml;ť';
$lang['rows'] = 'Maxim&aacute;lny počet n&aacute;hľadov&yacute;ch riadkov (0 znamen&aacute; neobmedzene. Použit&eacute; iba pri tabuľkov&yacute;ch &scaron;ablonach)';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album&#039;s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Check this box to automatically insert the link to the Album stylesheet in head of your page. This should usually be left enabled.';
$lang['selectall'] = 'Vybreť v&scaron;etky';
$lang['selectpicture'] = 'Použiť t&uacute;to fotku';
$lang['selectthumb'] = 'Použiť n&aacute;hľad tejto fotky';
$lang['submit'] = 'Potvrdiť';
$lang['file_templates_help'] = '<b>These are templates that you must install to the database before you can use them.</b>';
$lang['template'] = '&Scaron;ablona';
$lang['deletetemplate'] = 'Zmayať &scaron;ablonu';
$lang['Template'] = '&Scaron;ablona';
$lang['templatenametext'] = '&Scaron;ablony';
$lang['Templates'] = '&Scaron;ablony';
$lang['edittemplate'] = 'Editovať &scaron;ablonu';
$lang['templatesaved'] = '&scaron;ablona bola nahrat&aacute; do datab&aacute;zy.';
$lang['errortemplatenameexists'] = '&scaron;ablona s t&yacute;mto n&aacute;zvom už existuje. Pros&iacute;m vyberte si in&yacute; n&aacute;zov.';
$lang['error_filenotfound_defaulttemplate'] = 'S&uacute;bor &scaron;ablony pre t&uacute;to &scaron;ablonu nebol najden&yacute;.';
$lang['thumbnail'] = 'N&aacute;hľad';
$lang['title'] = 'Titulok';
$lang['uploadpicture'] = 'Nahrať fotku';
$lang['upload'] = 'Nahrať';
$lang['view'] = 'Zobraziť';
$lang['options'] = 'Voľby';
$lang['optionsupdated'] = 'Voľby boli uložen&eacute;.';
$lang['defaultrows'] = 'Z&aacute;kladn&yacute; maxim&aacute;lny počet n&aacute;hľadov&yacute;ch riadkov pre nov&eacute; albumy (0 znamen&aacute; neobmedzene. Použit&eacute; iba pri tabuľkov&yacute;ch &scaron;ablonach)';
$lang['defaultcolumns'] = 'Z&aacute;kladn&yacute; maxim&aacute;lny počet n&aacute;hľadov&yacute;ch stĺpcov pre nov&eacute; albumy (0 znamen&aacute; neobmedzene. Použit&eacute; iba pri tabuľkov&yacute;ch &scaron;ablonach)';
$lang['defaulttemplate'] = 'Z&aacute;kladn&aacute; &scaron;ablona';
$lang['file_templates'] = 'Dostupn&eacute; &scaron;ablony';
$lang['filename'] = 'N&aacute;zov s&uacute;boru';
$lang['importtemplate'] = 'Importovať &scaron;ablonu';
$lang['newtemplate'] = 'N&aacute;zov pre nov&uacute; &scaron;ablonu';
$lang['defaultalbumpage'] = 'Default page that contains Album. This page must be an &quot;Album&quot; type page or contain the Album tag. Required if you use the recently_updated feature.';
$lang['album_comment_updated'] = 'Koment&aacute;r k albumu bol upraven&yacute;.';
$lang['picture_comment_updated'] = 'Koment&aacute;r k fotke bol upraven&yacute;.';
$lang['template_deleted'] = '&Scaron;ablona bola zmazan&aacute; z datab&aacute;zy';
$lang['error_empty_template'] = 'Error: The template named &quot;%s&quot; that this Album is set to use does not exist. Please go to the Album Admin Panel and assign a different template to this Album.';
$lang['run_upgrade_script'] = 'Spustiť upgradovaci skript';
$lang['addcategory'] = 'Pridať kategoriu';
$lang['categories'] = 'Kategorie';
$lang['nocategories'] = 'Eśte nem&aacute;te pridan&eacute; kategorie.';
$lang['categorynametext'] = 'N&aacute;zov kategorie';
$lang['categoryidtext'] = 'ID kategorie';
$lang['categoryreordertext'] = 'Preusporiadať kategoriu';
$lang['categoryactionstext'] = 'Akcie';
$lang['categoryadded'] = 'Kategoria bola pridan&aacute; do datab&aacute;zy.';
$lang['categorymoved'] = 'Kategoria bola premiestnen&aacute;.';
$lang['categoryupdated'] = 'Kategoria bola upraven&aacute;.';
$lang['editcategory'] = 'Editovať kategoriu';
$lang['categorydeleted'] = 'Kategoria bola zmazan&aacute;.';
$lang['error_nocategorynamegiven'] = 'Mus&iacute;te dať n&aacute;zov kategorii.';
$lang['category_listings'] = 'Prezeranie kategorii';
$lang['album_updated'] = 'Album bol upraven&yacute;.';
$lang['uncategorized'] = 'Albumy bez kategorie';
$lang['automatic_album_list_template'] = 'Automaticky (použije &scaron;ablonu priraden&uacute; ku každ&eacute;mu albumu)';
$lang['albummoved'] = 'Album bol premiestnen&yacute;.';
$lang['helpdetailpage'] = '<p>Page to display Albums in.  This can either be a page alias or an id. Used to allow Album pictures 
to be displayed in a different page from the album list.</p> <p>Example of use:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
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
?>