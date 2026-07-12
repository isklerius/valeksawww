<?php
$lang['friendlyname'] = 'Album Immagini';
$lang['postinstall'] = 'Album &egrave; installato.<p><b>Nota: dovete cambiare la maschera di creazione file (umask) da &quot;022&quot; a &quot;002&quot; per evitare l&#039;errore 403 quando si tenta di visualizzare le miniature (thumb).';
$lang['postuninstall'] = 'Album &egrave; ora rimosso dal database.';
$lang['uninstalled'] = 'Modulo disinstallato';
$lang['installed'] = 'Versione %s installata';
$lang['upgraded'] = 'Modulo aggiornato alla versione %s.';
$lang['error_nofilesuploaded'] = 'Si &egrave; verificato un errore nell&#039;uploading. Verificare che la cartella sia scrivibile.';
$lang['error'] = 'Errore!';
$lang['next_picture'] = 'Prossima Immagine';
$lang['admindescription'] = 'Il modulo Album vi permette di visualizzare facilmente delle gallerie immagini sul vostro sito';
$lang['accessdenied'] = 'Accesso negato';
$lang['query_failed'] = 'A query failed. Trying going to the &quot;Options&quot; tab and clicking the &quot;Run Upgrade Script&quot; link. If that does not fix the problem, then please file a bug.';
$lang['changelog'] = '<ul><li>Versione 0.0.1. 5 Aprile 2006. Versione iniziale.</li></ul>';
$lang['view_default_stylesheet'] = 'Visualizza lo Stile CSS predefinito';
$lang['help_albums'] = 'Una lista di uno o pi&ugrave; (separati da virgole) ID di Album da mostrare.';
$lang['max_image_size'] = '<b>Dimensioni massime immagine:</b> Qualsiasi immagine pi&ugrave; larga della dimensione impostata sar&agrave; automaticamente ridotta (se il Modello &egrave; configurato correttamente per eseguire questa funzione) utilizzando Javascript. Nota: al momento, solo il Modello con tabelle usa questa configurazione.';
$lang['help_sortdesc'] = 'Ordina gli album in modo discendente piuttosto che ascendente.';
$lang['help_sortpicturesdesc'] = 'Ordina le immagini in modo discendente piuttosto che ascendente. Questo implica che le nuove immagini aggiunte saranno visualizzare per prime.<p>Esempio per mostrare in ordine inverso:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Errore: E&#039; gi&agrave; presente un Modello con lo stesso nome. Scegliete un nome diverso.';
$lang['templateimported'] = 'Il modello &egrave; stato importato con successo nel database e ora &egrave; installato per l&#039;uso.';
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
<base href=&quot;http://www.elijahlofgren.com/&quot; ></p>

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
$lang['help_action'] = '<h4>Visualizza lista delle immagini aggiunte di recente</h4>
	 <p>Potete aggiungere una lista di immagini recenti chiamando il modulo Album in questo modo:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<p><b>Importante</b>: Dovete scegliere un &quot;<b>Default page that contains Album.</b>&quot; per utilizzare questa opportunit&agrave;.</p>
<div style=&quot;border:1px solid black;&quot;>
<h4>Visualizza immagini casuali</h4>
<p>Prima di tutto conteggia le righe nel database (indicizza gli album inclusi), trova un numero casuale tra &#039;0&#039; e il numero massimo di righe. Con questo numero viene impostato il puntatore del database alla riga corrispondente e i dati vengono recuperati dalla tabella e riportati.</p>
<h5>Come si usa?</h5>
<p>Inserite il tag nel vostro Modello/pagina in questo modo: <code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<p>Per mostrare un certo numero di immagini random chiamate il modulo in questo modo:</p>
<code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039; number=&#039;10&#039;}</code>
<h5>Quali parametri servono?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>  - cartella degli Album, la predefinita &egrave;: &#039;root_url&#039;/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>  - lista di album da visualizzare separata da virgola, spazio, trattino o punto e virgola.</li>
  <li><em>(optional)</em> <tt>border</tt>  - bordo con stile CSS, es. border=&#039;5px&#039;</li>
  <li><em>(optional)</em> <tt>picturename</tt> - picturename = True/False, imposta un titolo con il nome dell&#039;immagine</li>
</ul>
<p><b>Nota: questi parametri sono solo utilizzabili chiamando Album in questo modo {cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</b></p>
Quindi ad esempio: {cms_module module=&#039;album&#039; action=&#039;random_image&#039; albums=&#039;1,3,4,6&#039; border=&#039;3px&#039; picturename=&#039;True&#039;}
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
<p>Random Image Author: Frank Prins <a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a></p>
</div>';
$lang['help_number'] = '<h4>Visualizza un determinato numero di immagini aggiornate di recente</h4>
	 <p>Potete visualizzare un determinato numero di immagini richiamando il modulo Album in questo modo:</pre>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Aggiungi un album';
$lang['error_nonamegiven'] = 'Dovete dare un nome al vostro nuovo album.';
$lang['albumadded'] = 'L&#039;album &egrave; stato aggiunto con successo. Le immagini possono essere aggiunte sotto.';
$lang['albumdeleted'] = 'L&#039;album &egrave; stato rimosso con successo dal database.';
$lang['noalbumstext'] = 'Non hai ancora creato un album di foto.';
$lang['addpicture'] = 'Aggiungi immagini';
$lang['addtemplate'] = 'Aggiungi un Modello';
$lang['albumidtext'] = 'ID';
$lang['albumnametext'] = 'Album';
$lang['albumthumbtext'] = 'Miniature';
$lang['albumnumpicturestext'] = 'Numero di immagini';
$lang['albumreordertext'] = 'Riordina';
$lang['albumactionstext'] = 'Azioni';
$lang['Albums'] = 'Album';
$lang['areyousure'] = 'Sei sicuro?';
$lang['browsepictures'] = 'Cambia';
$lang['cancel'] = 'Annulla';
$lang['changecomment'] = 'Modifica commenti';
$lang['changepicture'] = 'Cambia immagine';
$lang['changethumb'] = 'Cambia miniatura';
$lang['changethumbnail'] = 'Cambia miniatura';
$lang['columns'] = 'Massimo numero di colonne di miniature (0 significa non limitato. Usato solo nel Modello a tabelle)';
$lang['comment'] = 'Commento';
$lang['currenttemplate'] = 'Modello lista album';
$lang['currentpicture'] = 'Immagine corrente';
$lang['currentthumbnail'] = 'Miniatura corrente';
$lang['deletealbum'] = 'Elimina';
$lang['deletepicture'] = 'Elimina';
$lang['Help'] = 'Aiuto';
$lang['modify'] = 'Cambia';
$lang['moveleft'] = 'Muovi a sinistra';
$lang['moveright'] = 'Muovi a destra';
$lang['multiplealbumtemplate'] = 'Modello di album multipli';
$lang['name'] = 'Nome';
$lang['nocomment'] = '(nessun commento)';
$lang['nothumbnail'] = '(nessuna miniatura)';
$lang['picture'] = 'Immagine';
$lang['parentdir'] = '(Cartella superiore)';
$lang['pictures'] = 'immagini';
$lang['nopicturetext'] = 'Non ci sono immagini in questo album.';
$lang['Picture'] = 'Immagine';
$lang['Pictures'] = 'Immagini';
$lang['Properties'] = 'Propriet&agrave;';
$lang['propertiesupdated'] = 'Le propriet&agrave; dell&#039;album sono state salvate con successo.';
$lang['resetthumb'] = 'Azzera le miniature';
$lang['return'] = 'Indietro';
$lang['rows'] = 'Massimo numero di righe di miniature (0 significa non limitate. Usato solo nella tabella del Modello)';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album&#039;s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Stile Auto Link</b>: Segnando questo box, automaticamente inserisce il link agli stili dell&#039;Album nel head della pagina. Dovrebbe essere lasciato abilitato.';
$lang['selectall'] = 'Seleziona tutto';
$lang['selectpicture'] = 'Usa questa immagine';
$lang['selectthumb'] = 'Usa la miniatura di questa immagine';
$lang['submit'] = 'Salva';
$lang['file_templates_help'] = '<b>Questi sono modelli che devono essere installati nel database prima di poter essere utilizzati.</b>';
$lang['template'] = 'Modello';
$lang['deletetemplate'] = 'Cancella Modello';
$lang['Template'] = 'Modello';
$lang['templatenametext'] = 'Modelli';
$lang['Templates'] = 'Modelli installati';
$lang['edittemplate'] = 'Modifica Modello';
$lang['templatesaved'] = 'Il Modello &egrave; stato salvato con successo nel database.';
$lang['errortemplatenameexists'] = 'Un Modello con questo nome &egrave; gi&agrave; presente, si prega di sceglierne uno diverso.';
$lang['error_filenotfound_defaulttemplate'] = 'Il file corrispondente a questo Modello non &egrave; stato trovato.';
$lang['thumbnail'] = 'Miniatura';
$lang['title'] = 'Titolo';
$lang['uploadpicture'] = 'Carica una immagine';
$lang['upload'] = 'Carica';
$lang['view'] = 'Visualizza';
$lang['options'] = 'Opzioni';
$lang['optionsupdated'] = 'Le opzioni sono state aggiornate con successo.';
$lang['defaultrows'] = 'Numero massimo predefinito di righe di miniature per i nuovi album (0 significa non limitato)';
$lang['defaultcolumns'] = 'Numero massimo predefinito di colonne di miniature per i nuovi album (0 significa non limitato)';
$lang['defaulttemplate'] = 'Modello predefinito';
$lang['file_templates'] = 'Modello del file';
$lang['filename'] = 'Nome del File';
$lang['importtemplate'] = 'Importa Modello';
$lang['newtemplate'] = 'Nome per i nuovo modello';
$lang['defaultalbumpage'] = 'Pagina predefinita che contiene il modulo Album. Questa pagina deve necessariamente essere di tipo &quot;Album&quot; o contenere il tag Album. Obbligatorio se usate l&#039;opzione &quot;recently_updated&quot;.';
$lang['album_comment_updated'] = 'Il commento all&#039;album &egrave; stato aggiornato correttamente.';
$lang['picture_comment_updated'] = 'Il commento all&#039;immagine &egrave; stato aggiornato correttamente.';
$lang['template_deleted'] = 'Il modello &egrave; stato cancellato dal database in maniera corretta.';
$lang['error_empty_template'] = 'Errore: Il Modello &quot;%s&quot; utilizzato da questo Album non esiste. Accedete al Pannello di Amministrazione Album e assegnate un modello differente per questo Album.';
$lang['run_upgrade_script'] = 'Esegui Script di Aggiornamento';
$lang['addcategory'] = 'Aggiungi categoria';
$lang['categories'] = 'Categorie';
$lang['nocategories'] = 'Non avete ancora aggiunto categorie.';
$lang['categorynametext'] = 'Nome categoria';
$lang['categoryidtext'] = 'ID categoria';
$lang['categoryreordertext'] = 'Riordina categorie';
$lang['categoryactionstext'] = 'Azioni';
$lang['categoryadded'] = 'La categoria &egrave; stata aggiunta con successo al database.';
$lang['categorymoved'] = 'La categoria &egrave; stata mossa con successo.';
$lang['categoryupdated'] = 'La categoria &egrave; stata aggiornata con successo.';
$lang['editcategory'] = 'Modifica categoria';
$lang['categorydeleted'] = 'La categoria &egrave; stata cancellata con successo.';
$lang['error_nocategorynamegiven'] = 'Dovete dare un nome alla vostra categoria.';
$lang['category_listings'] = 'Lista delle categorie';
$lang['album_updated'] = 'L&#039;album &egrave; stato aggiornata con successo.';
$lang['uncategorized'] = 'Album non categorizzati';
$lang['automatic_album_list_template'] = 'Automatico (usa il template assegnato ad ogni album)';
$lang['albummoved'] = 'L&#039;album &egrave; stata mosso con successo.';
$lang['helpdetailpage'] = '<p>Pagina in cui visualizzare gli Album.  Pu&ograve; essere un alias di pagina o un ID. Viene utilizzato per permettere la visualizzazione delle immagini dell&#039;Album in una pagina differente dalla lista degli album.</p> <p>Esempio:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
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
</ul>';
$lang['utmz'] = '156861353.1189603002.11.11.utmccn=(referral)|utmcsr=onecms.it|utmcct=/07/09/2007/cmsmadesimple-siti-dinamici-senza-database/|utmcmd=referral';
$lang['utma'] = '156861353.916584110.1152549583.1191339025.1191396648.66';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>