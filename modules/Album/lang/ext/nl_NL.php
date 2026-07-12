<?php
$lang['friendlyname'] = 'Album';
$lang['postinstall'] = 'Album is nu ge&iuml;nstalleerd. <p><b>Opmerking: u moet mogelijk het bestandscreatiemasker (umask) van 022 naar 002 wijzigen om te voorkomen dat er &quot;403 forbidden&quot; fouten optreden bij het bekijken van miniaturen.</b></p>';
$lang['postuninstall'] = 'Album is uit de database verwijderd.';
$lang['uninstalled'] = 'Module gedeinstalleerd';
$lang['installed'] = 'Versie %s is ge&iuml;nstalleerd';
$lang['upgraded'] = 'Module naar versie %s bijgewerkt';
$lang['error_nofilesuploaded'] = 'Er is een fout opgetreden bij het uploaden. Controleer de map en zorg dat deze schrijfbaar is.';
$lang['error'] = 'Fout';
$lang['next_picture'] = 'Volgende foto';
$lang['admindescription'] = 'Met de Albummodule kunt u gemakkelijk foto&#039;s tonen op uw website.';
$lang['accessdenied'] = 'Toegang geweigerd';
$lang['query_failed'] = 'Een databasezoekopdracht is mislukt. Probeer onder de &quot;Opties&quot; tab op de &quot;Upgrade-script&quot; te klikken. Als dat het probleem niet verhelpt, dien dan een foutenrapport in. ';
$lang['changelog'] = '<ul><li>Versie 0.0.1. 5 April 2006. Initi&euml;le versie.</li></ul>';
$lang['view_default_stylesheet'] = 'Bekijk standaardstylesheet';
$lang['help_albums'] = 'Een lijst van een of meer (door komma&#039;s gescheiden) ID&#039;s van albums om weer te geven.';
$lang['max_image_size'] = '<b>Maximale grootte van de afbeelding:</b> alle grotere afbeeldingen worden automatisch verkleind met behulp van Javascript, mits het sjabloon zo is geconfigureerd. Opmerking: in deze versie gebruikt alleen de Tables-sjabloon deze instelling.';
$lang['help_sortdesc'] = 'Sorteer albums in aflopende volgorde in plaats van oplopend.';
$lang['help_sortpicturesdesc'] = 'Sorteer afbeeldingen in aflopende volgorde in plaats van oplopend. Zo worden nieuwe afbeeldingen als eerste getoond.<p>Voorbeeld om afbeeldingen in de omgekeerde volgorde te tonen:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Fout: een sjabloon met die naam bestaat al. Kies een andere naam.';
$lang['templateimported'] = 'De sjabloon is ge&iuml;mporteerd in de database en klaar voor gebruik.';
$lang['help'] = '<h3>Wat doet het?</h3>
<p>Deze module kan gebruikt worden voor het beheren van fotogalerijen</p>
<h3>Hoe gebruik ik het?</h3>
<p>Ga eerst naar Inhoud -> Album, maak albums en voeg foto&#039;s toe.</p>
<p>Om alle albums op een pagina te tonen gebruikt u volgende code: </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>Indien u alleen albums van een bepaalde categorie wilt tonen, gebruik dan een code zoals:</p>
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1&#039;}</code></p>
<p>De bovenstaande code stelt u in staat om op de pagina het album met het ID 1 te tonen.</p>
<p>U kunt ook meerdere categorie&euml;n tonen met:</p>
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1,3&#039;}</code></p>
<p>Als u alleen bepaalde albums wilt tonen, gebruik van de volgende code:</p>
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,4&#039;}</code></p>
<p>De bovenstaande code laat u bijvoorbeeld op een pagina de albums met ID&#039;s 1 en 4 zien. Als u de parameter \&#039;albums\&#039; weg laat, dan zullen alle albums worden weergegeven.</p>
<h3>Sjablonen</h3>

<h3>Problemen oplossen</h3>
<h4>Miniaturen werken niet</h4>
<p><b>Opmerking: U moet mogelijk het bestandscreatiemasker (umask) van 022 naar 002 wijzigen om te voorkomen dat er &quot;403 forbidden&quot; fouten optreden bij het bekijken van miniaturen.</b></p>
<h4>Miniaturen zijn verkeerd uitgerekt</h4>
<p>Een eenvoudige manier om dit op te lossen is het bestand modules/Album/css/stylesheet.css te bewerken en het volgende te vervangen:</p>
<pre>
/* Thumb width */
  height: 72px;
</pre>
<p>vervangen door:</p>
<pre>
/* Thumb width */
  /* height: 72px; */
</pre>
<h4>Vergroten van de miniaturen</h4>
<p>Bekijk deze post op het forum: <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,7844.0.html&quot;>Grotere miniaturen voor Album</a>.</p>
<h4>Plaatjes effecten (transparantie) werkt niet goed</h4>
<p>Verzeker u ervan dat alle bestanden in de sjabloon/db map 755 als permissie hebben. Zie: <a href=&quot;http://forum.cmsmadesimple.org/index.php?topic=10466.msg52526#msg52526&quot;> Re: random_image in Album. Can it be a greybox miniatuur? {SOLVED!}</a>.</p>
<h3>Ondersteuning</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>

<h3>Copyright and License</h3>

<p>Copyright &amp;copy; 2006, dam. All Rights Are Reserved.</p>

<p>This module has been released under the <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. You must agree to this license before using the module.</p>

<p>Een niet offici&euml;le vertaling kan gevonden worden op <a href=&quot;http://users.skynet.be/xterm/gpld.txt&quot;>http://users.skynet.be/xterm/gpld.txt</a></p>';
$lang['help_action'] = '<h4>Toon een lijst met recent toegevoegde plaatjes</h4>
	 <p>U kunt een lijst met toegevoegde plaatje tonen door Album als volgt aan te roepen:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<h4>Toon een willekeurig plaatje</h4>
<p>Eerst worden alle rijen in de database geteld (rekening houdend met de toegevoegde Albums). Dan wordt een willekeurig getal tussen &#039;0&#039; en het maximum aantal rijen bepaald. Met dit getal wordt de database ingesteld op de specifieke rij en wordt het overeenkomende plaatje opgehaald .</p>
<h5>Hoe gebruik ik Albums?</h5>
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
$lang['help_number'] = '<h4>Toon een aantal recent gewijzigde foto&#039;s</h4>
	 <p>U kunt een lijst met een bepaald aantal foto&#039;s tonen door Album als volgt aan te roepen</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}
';
$lang['addalbum'] = 'Album toevoegen';
$lang['error_nonamegiven'] = 'Een nieuwe album moet een naam krijgen.';
$lang['albumadded'] = 'Het album is toegevoegd. Hieronder kunnen foto&#039;s toegevoegd worden.';
$lang['albumdeleted'] = 'Het album uit de database verwijderd.';
$lang['noalbumstext'] = 'Er zijn nog geen albums in deze categorie aangemaakt.';
$lang['addpicture'] = 'Foto&#039;s toevoegen';
$lang['addtemplate'] = 'Een sjabloon toevoegen';
$lang['albumidtext'] = 'ID&#039;s';
$lang['albumnametext'] = 'Albums ';
$lang['albumthumbtext'] = 'Miniaturen';
$lang['albumnumpicturestext'] = 'Aantal foto&#039;s';
$lang['albumreordertext'] = 'Herschikken';
$lang['albumactionstext'] = 'Acties';
$lang['Albums'] = 'Albums ';
$lang['areyousure'] = 'Zeker weten?';
$lang['browsepictures'] = 'Wijzigen';
$lang['cancel'] = 'Annuleren';
$lang['changecomment'] = 'Commentaar wijzigen';
$lang['changepicture'] = 'Foto wijzigen';
$lang['changethumb'] = 'Miniatuur wijzigen';
$lang['changethumbnail'] = 'Miniatuur wijzigen';
$lang['columns'] = 'Maximaal aantal miniatuurkolommen (0 betekent onbeperkt). Alleen in gebruik bij Tables-sjabloon.';
$lang['comment'] = 'Commentaar';
$lang['currenttemplate'] = 'Albumlijstsjabloon';
$lang['currentpicture'] = 'Huidige foto';
$lang['currentthumbnail'] = 'Huidig miniatuur';
$lang['deletealbum'] = 'Verwijderen';
$lang['deletepicture'] = 'Verwijderen';
$lang['Help'] = 'Help ';
$lang['modify'] = 'Wijzigen';
$lang['moveleft'] = 'Naar links';
$lang['moveright'] = 'Naar rechts';
$lang['multiplealbumtemplate'] = 'Meerdere-albumssjabloon';
$lang['name'] = 'Naam';
$lang['nocomment'] = '(geen commentaar)';
$lang['nothumbnail'] = '(geen miniatuur)';
$lang['picture'] = 'Foto';
$lang['parentdir'] = '(Bovenliggende map)';
$lang['pictures'] = 'foto&#039;s';
$lang['nopicturetext'] = 'Er zijn geen foto&#039;s in dit album.';
$lang['Picture'] = 'Foto';
$lang['Pictures'] = 'Foto&#039;s';
$lang['Properties'] = 'Eigenschap';
$lang['propertiesupdated'] = 'De albumeigenschappen zijn opgeslagen';
$lang['resetthumb'] = 'Miniatuur herstellen';
$lang['return'] = 'Terug';
$lang['rows'] = 'Maximum aantal miniatuurrijen (0 betekent onbeperkt. Wordt alleen gebruikt in de Tables-sjabloon)';
$lang['useinlinelinks'] = '<b>Gebruik Inline Links</b> - Dit toont altijd de inhoud van de pagina, samen met het Albumlabel, boven alle afbeeldingen. Aanvullend <strong>zorgt dit ervoor dat Album altijd correct werkt als het in extra paginainhoudsblokken wordt opgenomen</strong>. <strong>NB: door deze optie in te schakelen, wordt het gebruik van pretty URLs in het Album uitgezet.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link stylesheet</b>: vink dit aan om de link naar het Album-stylesheet automatisch aan de kop van de pagina toe te voegen. Meestal moet dit aangevinkt zijn.';
$lang['selectall'] = 'Alles selecteren';
$lang['selectpicture'] = 'Deze foto gebruiken';
$lang['selectthumb'] = 'De miniatuur van deze foto gebruiken';
$lang['submit'] = 'Opslaan';
$lang['file_templates_help'] = '<b>Dit zijn sjablonen die u in de database moet installeren voordat ze gebruikt kunnen worden.</b>';
$lang['template'] = 'Sjabloon';
$lang['deletetemplate'] = 'Sjabloon verwijderen';
$lang['Template'] = 'Sjabloon';
$lang['templatenametext'] = 'Sjablonen';
$lang['Templates'] = 'Sjablonen';
$lang['edittemplate'] = 'Sjabloon bewerken';
$lang['templatesaved'] = 'Het sjabloon is in de database opgeslagen.';
$lang['errortemplatenameexists'] = 'Er bestaat al een sjabloon met deze naam, kies een andere naam.';
$lang['error_filenotfound_defaulttemplate'] = 'Het sjabloonbestand voor dit sjabloon is niet gevonden.';
$lang['thumbnail'] = 'Miniatuur';
$lang['title'] = 'Titel';
$lang['uploadpicture'] = 'Upload een foto';
$lang['upload'] = 'Upload ';
$lang['view'] = 'Bekijk';
$lang['options'] = 'Opties';
$lang['optionsupdated'] = 'De opties zijn bijgewerkt.';
$lang['defaultrows'] = 'Standaard maximum aantal miniatuurrijen voor nieuwe albums (0 betekent onbeperkt. Wordt alleen gebruikt in het Tables-sjabloon)';
$lang['defaultcolumns'] = 'Standaard maximum aantal miniatuurkolommen voor nieuwe albums (0 betekent onbeperkt. Wordt alleen gebruikt in de Tables-sjabloon)';
$lang['defaulttemplate'] = 'Standaardsjabloon';
$lang['file_templates'] = 'Bestandssjabloon';
$lang['filename'] = 'Bestandsnaam';
$lang['importtemplate'] = 'Sjabloon importeren';
$lang['newtemplate'] = 'Naam voor de nieuwe sjabloon';
$lang['defaultalbumpage'] = 'Standaardpagina die Album bevat. Deze pagina moet een Albumtypepagina zijn of de Albumtag bevatten. Verplicht als u de recent_updated functionaliteit gebruikt.';
$lang['album_comment_updated'] = 'Het albumcommentaar is bijgewerkt.';
$lang['picture_comment_updated'] = 'Het fotocommentaar is bijgewerkt.';
$lang['template_deleted'] = 'Het sjabloon uit de databaseis verwijderd';
$lang['error_empty_template'] = 'Fout: het sjabloon genaamd &quot;%s&quot;, dat dit Album dient te gebruiken, bestaat niet. Ga naar het Albumbeheerpaneel en koppel een andere sjabloon aan dit Album.';
$lang['run_upgrade_script'] = 'Upgradescript uitvoeren';
$lang['addcategory'] = 'Categorie toevoegen';
$lang['categories'] = 'Categorie&euml;n';
$lang['nocategories'] = 'U heeft nog geen categorie&euml;n toegevoegd';
$lang['categorynametext'] = 'Categorienaam';
$lang['categoryidtext'] = 'Categorie id';
$lang['categoryreordertext'] = 'Categorie herschikken';
$lang['categoryactionstext'] = 'Acties';
$lang['categoryadded'] = 'Deze categorie is aan de database toegevoegd.';
$lang['categorymoved'] = 'De categorie is verplaatst.';
$lang['categoryupdated'] = 'De categorie is bijgewerkt.';
$lang['editcategory'] = 'Categorie bewerken';
$lang['categorydeleted'] = 'De categorie is verwijderd';
$lang['error_nocategorynamegiven'] = 'U moet de categorie een naam geven.';
$lang['category_listings'] = 'Categorielijsten';
$lang['album_updated'] = 'Het album is bijgewerkt.';
$lang['uncategorized'] = 'Ongecategoriseerde albums';
$lang['automatic_album_list_template'] = 'Automatisch (gebruik het sjabloon dat ingesteld is voor gebruik bij ieder album)';
$lang['albummoved'] = 'Het album is verplaatst';
$lang['helpdetailpage'] = '<p>Pagina om Albums in te tonen.  Dit kan zowel een pagina-alias als een id zijn. Wordt gebruikt om albumfoto&#039;s te tonen in verschillende pagina&#039;s van de albumlijst.</p> <p>Gebruiksvoorbeeld:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Belangrijke tips om sjablonen te bewerken</h3>
<h4>Schakel de debug-modus in!</h4>
<p>Behalve als u de debug-modus ingeschakeld blijven belangrijke fouten over ongedefinieerde sjabloonvariabelen verborgen, wat het opsporen van fouten zeer lastig maakt!</p>
<p>U kunt de debug-modus inschakelen door in config.php het volgende in te stellen:</p>
<code>$config[&#039;debug&#039;] = true;<code>

<h3>Albumlijst</h3>

<p>U kunt gebruik maken van de smarty tag {$albums} dat een array is. Elk van deze elementen is een van de geselecteerde albums.
De structuur van een album is beschreven in het volgende hoofdstuk.
Om een album weer te geven, gebruikt u een lus <code>{foreach from=$albums item=album}{/foreach}</code></p>
<h3>Album</h3>
<p>Als er maar &eacute;&eacute;n album is, of als een specifiek album is geselecteerd, gebruik dan de tag {$album}. Het geeft de mogelijkheid om volgende items te benaderen :</p>
<ul>
	<li>{$album->name} : naam</li>
	<li>{$album->comment} : commentaar</li>
	<li>{$album->columns} : kolomnummer</li>
	<li>{$album->rows} : rijnummer</li>
	<li>{$album->thumbnail} : adres (url) van miniatuur</li>
	<li>{$album->link} : link naar album</li>
	<li>{$album->picturecount} : aantal foto\&#039;s in het album</li>
</ul>
<h3>Afbeeldingenlijst</h3>
<p>Als een album is geselecteerd dan kunt u {$pictures} gebruiken. Dit geeft een array van arrays: het bevat rijen met foto&#039;s. De structuur van een afbeelding vindt u in het volgende deel. Om afbeeldingen weer te geven, gebruikt u de volgende lusstructuur:
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>
<h3>Afbeelding</h3>
<p>Als een afbeelding is geselecteerd, dan kunt u de volgende tag gebruiken: {$picture}. Het verwijst automatisch naar de eerste afbeelding als er geen geselecteerd is.</p>
<ul>
	<li>{$picture->name} : naam</li>
	<li>{$picture->comment} : commentaar</li>
	<li>{$picture->thumbnail} : adres (url) van miniatuur</li>
	<li>{$picture->picture} : adres (url) van foto</li>
	<li>{$picture->link} : link naar foto</li>
	<li>{$picture->number} : fotonummer</li>
</ul>
<h3>Overige</h3>
<p>U kunt ook &eacute;&eacute;n van de volgende tags gebruiken :</p>
<ul>
	<li>{$returnlink} : terug naar vorige pagina</li>
	<li>{$albumnumber} : huidig albumnummer</li>
	<li>{$albumcount} : album teller</li>
	<li>{$picturenumber} : huidig fotonummer</li>
	<li>{$picturecount} : fototeller</li>
	<li>{$pagenumber} : huidige paginanummer</li>
	<li>{$pagecount} : paginateller</li>
	<li>{$link.album.1} : link naar het eerste album. U kunt ook een ander nummer opgeven.</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : link naar de eerste foto. U kunt ook een ander nummer opgeven.</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : link naar de eerste pagina. U kunt ook een ander nummer opgeven.</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>';
$lang['utma'] = '156861353.437423124.1198250593.1200506952.1202201362.17';
$lang['utmz'] = '156861353.1199378014.7.5.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php/topic,18263.0.html|utmcmd=referral';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>