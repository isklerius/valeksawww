<?php
$lang['friendlyname'] = 'Albume Foto';
$lang['postinstall'] = 'Album este instalat acum. <p><b>Nota: Ar putea fi nevoie sa modificati Masca Creare Fisier (umask): de la &quot;022&quot;
la &quot;002&quot; pentru prevenirea erorilor <i>403 interzis</i> cand se incearca afisarea pictogramelor generate de catre gazda web a dumneavoastra.</b></p>';
$lang['postuninstall'] = 'Album-ul este acum eliminat din baza de date.';
$lang['uninstalled'] = 'Modul dezinstalat.';
$lang['installed'] = 'Versiunea %s este instalata';
$lang['upgraded'] = 'Modul actualizat in versiunea %s.';
$lang['error_nofilesuploaded'] = 'A aparut o eroare la incarcare. Va rog sa verificati si sa fiti sigur(a) ca exista permisiunea de scriere in director.';
$lang['error'] = 'Eroare!';
$lang['next_picture'] = 'Urmatoarea poza';
$lang['admindescription'] = 'Modulul Album va permite usor afisarea galeriilor foto pe site-urile web ale dumneavoastra.';
$lang['accessdenied'] = 'Acces interzis';
$lang['query_failed'] = 'O interogare a cedat. Incercati sa ajungeti la &quot;Optiuni&quot; si sa selectati &quot;Ruleaza actualizare script&quot;. Daca aceasta nu rezolva problema, va rog sa raportati bug-ul.';
$lang['changelog'] = '<ul><li>Versiunea 0.0.1. 5 Aprilie 2006. Livrare initiala.</li></ul>';
$lang['view_default_stylesheet'] = 'Vizualizeaza foaia de stil implicita';
$lang['help_albums'] = 'O lista de unul sau mai multe (separate prin virgula) ID-uri de albume care vor fi afisate.';
$lang['max_image_size'] = '<b>Dimensiunea maxima a imaginii:</b> Orice imagine mai mare decat aceasta va fi automat scalata in jos (daca sablonul este configurat sa efectueze acest lucru) folosind Javascript. Nota: In acest moment doar sablonul &quot;Tabele&quot; foloseste aceasta setare.';
$lang['help_sortdesc'] = 'Sorteaza albumele mai degraba in ordine descrescatoare decat crescatoare.';
$lang['help_sortpicturesdesc'] = 'Sorteaza albumele mai degraba in ordine descrescatoare decat crescatoare. Aceasta va cauza ca pozele nou adaugate in album sa fie listate primele.<p>Exemplu pentru afisarea pozelor in ordine inversa:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Eroare: Un sablon cu acel nume exista deja. Va rog sa alegeti un nume diferit.';
$lang['templateimported'] = 'Sablonul a fost importat cu succes in baza de date si acum este instalat pentru utilizare.';
$lang['help'] = '<h3>Ce face acest modul?</h3>
<p>Acest modul poate fi folosit pentru a gestiona galerii de imagini</p>
<h3>Cum il pot folosi?</h3>
<p>Pentru inceput mergei la Continut -> Albume Foto si creati albume dupa care adaugati-le poze.</p>
<p>Pentru a afisa toate albumele intr-o pagina, trebuie doar sa puneti acest cod in continutul paginii voastre: </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>Daca doar doriti sa afisati albumele dintr-o categorie specifica, atunci folositi un cod ca acesta:
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1&#039;}</code></p>
<p>Codul anterior va permite sa afisati in pagina albumele care fac parte din categoria cu ID-ul 1.</p>
<p>De asemenea, puteti sa afisati categorii multiple precum:
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1,3&#039;}</code></p>
<p>Daca doriti sa fie afisate doar anumite albume atunci folositi un cod ca acesta:
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>Codul anterior va permite sa afisati intr-o pagina albumele a caror ID este 1 si 3. Daca nu specificati parametrul &quot;albums&quot;, se vor afisa toate albumele.</p>
<h3>Sabloane</h3>
<h4>Cum sa inlaturati conturul pictogramelor</h4>
<p>Adaugati aceasta la sfarsitul modules/Album/css/stylesheet.css:</p>
<pre>.thumb a { background-color:transparent; border:0; }</pre>
<h4>Rezolva o serie de probleme majore cauzate de  clear:both</h4>
<p>See: <a href=&quot;RE: Cannot seem to get categories working&quot;>RE: Cannot seem to get categories working</a></p>
<p>Raspuns pe scurt, adauga aceasta la foaia de stil:</p>
<pre>
#main {
float: left;
}
</pre>
<h3>Depanare</h3>
<p>Discutati cu developer-ul despre folosirea ImageMagick in loc de GD, executa mai repede.</p>
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
$lang['help_number'] = '<h4>Afiseaza un anumit numar de poze recent actualizate</h4>
	 <p>Puteti afisa un anumit numar de poze apeland Album in felul urmator:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Adauga un album';
$lang['error_nonamegiven'] = 'Trebuie sa denumiti noul dumneavoastra album.';
$lang['albumadded'] = 'Albumul a fost adaugat cu succes. Puteti sa-i adaugati poze mai jos.';
$lang['albumdeleted'] = 'Albumul a fost eliminat cu succes din baza de date.';
$lang['noalbumstext'] = 'Nu ati creat nici un album foto in aceasta categorie.';
$lang['addpicture'] = 'Adauga poze';
$lang['addtemplate'] = 'Adauga un sablon';
$lang['albumidtext'] = 'ID-uri';
$lang['albumnametext'] = 'Albume';
$lang['albumthumbtext'] = 'Pictograme';
$lang['albumnumpicturestext'] = 'Numar poze';
$lang['albumreordertext'] = 'Reordoneaza';
$lang['albumactionstext'] = 'Actiuni';
$lang['Albums'] = 'Albume';
$lang['areyousure'] = 'Sunteti sigur(a)?';
$lang['browsepictures'] = 'Schimba';
$lang['cancel'] = 'Anuleaza';
$lang['changecomment'] = 'Editeaza comentariu';
$lang['changepicture'] = 'Schimba poza';
$lang['changethumb'] = 'Schimba pictograma';
$lang['changethumbnail'] = 'Schimba pictograma';
$lang['columns'] = 'Numar maxim de coloane pictograme (0 inseamna nelimitat. Folosit doar in sablonul Tabele)';
$lang['comment'] = 'Comentariu';
$lang['currenttemplate'] = 'Sablon Lista albume';
$lang['currentpicture'] = 'Poza curenta';
$lang['currentthumbnail'] = 'Pictograma curenta';
$lang['deletealbum'] = 'Sterge';
$lang['deletepicture'] = 'Sterge';
$lang['Help'] = 'Ajutor';
$lang['modify'] = 'Schimba';
$lang['moveleft'] = 'Muta la stanga';
$lang['moveright'] = 'Muta la dreapta';
$lang['multiplealbumtemplate'] = 'Sablon Albume multiple';
$lang['name'] = 'Nume';
$lang['nocomment'] = '(fara comentariu)';
$lang['nothumbnail'] = '(fara pictograma)';
$lang['picture'] = 'Poza';
$lang['parentdir'] = '(Director parinte)';
$lang['pictures'] = 'poze';
$lang['nopicturetext'] = 'Nu exista poze in acest album.';
$lang['Picture'] = 'Poza';
$lang['Pictures'] = 'Poze';
$lang['Properties'] = 'Proprietati';
$lang['propertiesupdated'] = 'Proprietatile albumului au fost salvate cu succes.';
$lang['resetthumb'] = 'Reseteaza pictograma';
$lang['return'] = 'Inapoi';
$lang['rows'] = 'Numar maxim de linii pictograme (0 inseamna nelimitat. Folosit doar in sablonul Tabele)';
$lang['useinlinelinks'] = '<b>Foloseste Link-uri Inline</b> - Prin aceasta, continutul paginii intotdeauna va fi afisat cu eticheta Album deasupra tuturor pozelor. In plus <strong>aceasta va asigura functionarea corecta a Album-ului cand este plasat in blocuri continut de pagina aditionale.</strong>. <strong>NOTA: Activand aceasta optiune se va dezactiva folosirea de URL-uri dragute a albumului.</strong>';
$lang['autolinkstylesheet'] = '<b>Legatura automata foaie de stil</b>: Bifeaza aceasta casuta pentru inserarea automata a legaturii foii de stil a albumului in capul paginii dumneavoastra. Uzual aceasta ramane activata.';
$lang['selectall'] = 'Selecteaza tot';
$lang['selectpicture'] = 'Foloseste aceasta poza';
$lang['selectthumb'] = 'Foloseste pictograma acestei poze.';
$lang['submit'] = 'Salveaza';
$lang['file_templates_help'] = '<b>Acestea sunt sabloane pe care trebuie sa le instalati in baza de date inainte ca sa le puteti folosi.</b>';
$lang['template'] = 'Sablon';
$lang['deletetemplate'] = 'Sterge sablon';
$lang['Template'] = 'Sablon';
$lang['templatenametext'] = 'Sabloane';
$lang['Templates'] = 'Sabloane';
$lang['edittemplate'] = 'Editeaza sablon';
$lang['templatesaved'] = 'Sablonul a fost salvat cu succes in baza de date.';
$lang['errortemplatenameexists'] = 'Un sablon cu acest nume exista deja, va rog sa alegeti un nume diferit.';
$lang['error_filenotfound_defaulttemplate'] = 'Fisierul sablon aferent acestui sablon nu a fost gasit.';
$lang['thumbnail'] = 'Pictograma';
$lang['title'] = 'Titlu';
$lang['uploadpicture'] = 'Incarca o poza';
$lang['upload'] = 'Incarca';
$lang['view'] = 'Vizualizeaza';
$lang['options'] = 'Optiuni';
$lang['optionsupdated'] = 'Optiunile au fost actualizate cu succes.';
$lang['defaultrows'] = 'Numar maxim de randuri pictograme (0 inseamna nelimitat. Folosit doar in sablonul Tabele)';
$lang['defaultcolumns'] = 'Numar maxim de coloane pictograme (0 inseamna nelimitat. Folosit doar in sablonul Tabele)';
$lang['defaulttemplate'] = 'Sablon implicit';
$lang['file_templates'] = 'Sabloane disponibile';
$lang['filename'] = 'Nume fisier';
$lang['importtemplate'] = 'Importa sablon';
$lang['newtemplate'] = 'Nume pentru noul sablon';
$lang['defaultalbumpage'] = 'Pagina implicita care contine albumul. Aceasta pagina trebuie sa fie de tipul &quot;Album&quot; sau sa contina eticheta Album. Necesar daca folositi facilitatea recently_updated.';
$lang['album_comment_updated'] = 'Comentariul albumului a fost actualizat cu succes.';
$lang['picture_comment_updated'] = 'Comentariul pozei a fost actualizat cu succes.';
$lang['template_deleted'] = 'Sablonul a fost sters cu succes din baza de date.';
$lang['error_empty_template'] = 'Eroare: Sablonul denumit &quot;%s&quot; pe care acest album trebuie sa-l foloseasca nu exista. Va rog sa mergeti la panul de administrare albume si sa asociati un sablon diferit pentru acest album.';
$lang['run_upgrade_script'] = 'Ruleaza script actualizare';
$lang['addcategory'] = 'Adauga categorie';
$lang['categories'] = 'Categorii';
$lang['nocategories'] = 'Nu ati adaugat nici o categorie inca.';
$lang['categorynametext'] = 'Nume categorie';
$lang['categoryidtext'] = 'ID categorie';
$lang['categoryreordertext'] = 'Reordoneaza categoria';
$lang['categoryactionstext'] = 'Actiuni';
$lang['categoryadded'] = 'Categoria a fost adaugata cu succes in baza de date.';
$lang['categorymoved'] = 'Categoria a fost mutata cu succes.';
$lang['categoryupdated'] = 'Categoria a fost actualizata cu succes.';
$lang['editcategory'] = 'Editeaza categoria';
$lang['categorydeleted'] = 'Categoria fost stearsa cu succes.';
$lang['error_nocategorynamegiven'] = 'Trebuie sa va denumiti categoria.';
$lang['category_listings'] = 'Lista categorii';
$lang['album_updated'] = 'Albumul a fost actualizat cu succes.';
$lang['uncategorized'] = 'Albume neclasificate';
$lang['automatic_album_list_template'] = 'Automat (foloseste sablon asociat la fiecare album)';
$lang['albummoved'] = 'Albumul a fost mutat cu succes.';
$lang['helpdetailpage'] = '<p>Pagina in care va fi afisat albumul.  Aceasta poate fi un alias al paginii sau un id. Folosit pentru a permite ca pozele albumului sa fie afisate intr-o pagina diferita din lista albumului.</p> <p>Exemplu de utilizare:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
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
$lang['utma'] = '156861353.1422824650.1193244506.1193626713.1193628758.7';
$lang['utmb'] = '156861353';
$lang['utmz'] = '156861353.1193251702.3.2.utmccn=(referral)|utmcsr=localhost|utmcct=/cmsmadesimple/admin/moduleinterface.php|utmcmd=referral';
$lang['utmc'] = '156861353';
?>