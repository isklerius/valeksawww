<?php
$lang['friendlyname'] = 'Albums photo';
$lang['postinstall'] = 'L&#039;Album est maintenant install&eacute;. N&#039;oubliez pas d&#039;attacher la nouvelle feuille de style &quot;Album (pour le gabarit par d&eacute;faut, le gabarit ImageGallery, et le gabarit Thickbox)&quot; au gabarit de la page sur laquelle vous allez utiliser l&#039;album.';
$lang['postuninstall'] = 'L&#039;album a &eacute;t&eacute; supprim&eacute; de la base de donn&eacute;es.';
$lang['uninstalled'] = 'Le module a &eacute;t&eacute; d&eacute;sinstall&eacute;.';
$lang['installed'] = 'La version %s du module est install&eacute;e.';
$lang['upgraded'] = 'Le module a &eacute;t&eacute; mis &agrave; jour &agrave; la version %s.';
$lang['error_nofilesuploaded'] = 'Il y a eu une erreur lors du t&eacute;l&eacute;chargement. Veuillez v&eacute;rifier que le dossier est inscriptible.';
$lang['error'] = 'Erreur!';
$lang['next_picture'] = 'Image suivante';
$lang['admindescription'] = 'Le module Album vous permet d&#039;afficher des galeries photo sur votre site.';
$lang['accessdenied'] = 'Acc&egrave;s refus&eacute;. Veuillez v&eacute;rifier vos droits d&#039;acc&egrave;s';
$lang['query_failed'] = 'Une requ&ecirc;te a &eacute;chou&eacute;. Essayez d&#039;aller dans l&#039;onglet &quot;Options&quot; et de cliquer le lien &quot;Mise &agrave; jour&quot;. Si cela ne r&eacute;sout pas le probl&egrave;me, veuillez remplir un rapport de bug.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 Avril 2006. Version initiale.</li></ul>';
$lang['view_default_stylesheet'] = 'Voir la feuille de style par d&eacute;faut';
$lang['help_albums'] = 'Une liste (champs s&eacute;par&eacute; par des virgules) de un ou plusieurs IDs d&#039;album &agrave; afficher.';
$lang['max_image_size'] = '<b>Taille d&#039;image maximale:</b> Toutes les images plus grandes que cela seront automatiquement rapetiss&eacute;es en utilisant javascript (si le gabarit est configur&eacute; pour le faire). Note: pour le moment, seulement le gabarit &quot;Tables&quot; utilise cette fonction.';
$lang['help_sortdesc'] = 'Trier les albums dans l&#039;ordre descendant plut&ocirc;t qu&#039;ascendant.';
$lang['help_sortpicturesdesc'] = 'Trier les albums dans l&#039;ordre descendant plut&ocirc;t qu&#039;ascendant. Ceci classera les nouvelles images ajout&eacute;es &agrave; l&#039;album en premi&egrave;re position.<p>Exemple de balise pour afficher le classement en ordre descendant:</p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Erreur&nbsp;: un gabarit avec ce nom existe d&eacute;j&agrave;. Veuillez choisir un autre nom.';
$lang['templateimported'] = 'Le gabarit a &eacute;t&eacute; import&eacute; dans la base de donn&eacute;es avec succ&egrave;s et est maintenant install&eacute; et pr&ecirc;t &agrave; &ecirc;tre utilis&eacute;.';
$lang['help'] = '<h3>Que fait ce module?</h3>
<p>Ce module est utilis&eacute; pour g&eacute;rer des galeries d&#039;images</p>
<h3>Comment l&#039;utiliser</h3>
<p>Allez &agrave; Contenu -> Album et cr&eacute;ez des albums et ajoutez-y des images.</p>
<p>Pour afficher tous les albums sur une page, utilisez simplement ce code dans votre contenu&nbsp;: </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>Si vous voulez afficher seulement les albums d&#039;une cat&eacute;gorie sp&eacute;cifique, utilisez un code tel que celui-l&agrave;&nbsp;:
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1&#039;}</code></p>
<p>Le code ci-dessus vous permet d&#039;afficher dans une page les albums qui appartiennent &agrave; la cat&eacute;gorie dont l&#039;ID est 1.</p>
<p>Vous pouvez aussi afficher des cat&eacute;gories multiples comme ceci&nbsp;:
<p><code>{cms_module module=&#039;album&#039; categories=&#039;1,3&#039;}</code></p>
<p>Si vous ne voulez afficher que certains albums, utilisez un code tel que&nbsp;:
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>Le code ci-dessus vous permet d&#039;afficher dans une page les albums dont les ID sont 1 et 3 par exemple. Si vous ne d&eacute;finissez pas le param&egrave;tre &quot;albums&quot;, tous les albums seront affich&eacute;s.</p>

<h3>Gabarits</h3>

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

<h3>R&eacute;solution de probl&egrave;mes</h3>
<p>Parlez &agrave; votre &eacute;dveloppeur pour utiliser ImageMagick au lieu de GD, &ccedil;a marche mieux.</p>
<h4>Les vignettes ne fonctionnent pas</h4>
<p><b>Note&nbsp;: Vous pouvez changer le masque de cr&eacute;ation de fichier (umask): de &quot;022&quot; &agrave; &quot;002&quot; dans les param&egrave;tres globaux, pour &eacute;viter les erreurs 403 quand vous essayez de voir les vignettes g&eacute;n&eacute;r&eacute;es sur le serveur.</b></p>
<a href=&quot;http://dev.cmsmadesimple.org/forum/message.php?msg_id=1181&quot; target=&quot;_blank&quot;>A possible workaround to thumbnail problems</a> (une solution possible pour les probl&egrave;mes de vignettes, message en anglais)
<h4>Les vignettes ne s&#039;agrandissent pas plus que 72px</h4>
<p>Voir <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,14125.msg69907.html#msg69907&quot; target=&quot;_blank&quot;> 	
Re: Album module and thumbnails in IE [SOLVED]</a> (Module Album et vignettes dans IE (RESOLU), message en anglais. En r&eacute;sum&eacute;, supprimez ceci de votre gabarit&nbsp;:
{$onepicture->autothumbnailsize} et {$album->autothumbnailsize} pour corriger la taille des vignettes des albums.</p>
<p>La fonction &quot;autothumbnailsize&quot; a &eacute;t&eacute; ajout&eacute;e pour faire que toutes les vignettes restent &agrave; une hauteur de 72. Mais c&#039;est probablement g&eacute;n&eacute;rateur de probl&egrave;me plut&ocirc;t que de solution.</p>

<h4>Les vignettes ne s&#039;alignent pas correctement</h4>
<p>Vous devrez &eacute;ventuellement raccourcir les titres de vos albums. Ou utiliser le gabarit Tables.</p>
<p>Voir <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,11996.0.html&quot; target=&quot;_blank&quot;>Topic: Album Thumbnail layout [solved]</a> (Disposition des vignettes de l&#039;album [r&eacute;solu], message en anglais).</p>
<h4>Les vignettes ne s&#039;affichent pas  la bonne taille</h4>
<p>Une solution facile est de simplement &eacute;diter modules/Album/css/stylesheet.css</p>
<p>et de remplacer ceci&nbsp;:</p>
<pre>
/* Thumb width*/ 
	height:72px;
</pre>
<p>par ceci&nbsp;:</p>
<pre>
/* Thumb width*/ 
	/* height:72px; */
</pre>
<h4>Correction: Le javascript ne charge pas quand les &quot;pretty urls&quot; (urls propres) en conjonction avec la hi&eacute;rarchie sont activ&eacute;s. Les grandes images ne s&#039;affichent pas</h4>
Tout devrait fonctionner si vous ins&eacute;rer cette balise dans entrer les balises &amp;lt;head&amp;gt; &amp;lt;/head&amp;gt; de votre gabarit, de cette fa&ccedil;on&nbsp;:
&amp;lt;head&amp;gt;
...
{metadata}
&amp;lt;/head&amp;gt;

<p>Ceci fera que CMSMS g&eacute;n&egrave;re une balise telle que&nbsp;:
&amp;lt;base href=&quot;http://www.elijahlofgren.com/&quot; /&amp;gt;</p>

<p>ceci devrait faire que tous les liens relatifs fonctionnent correctement, m&ecirc;me quand la hi&eacute;rarchie est activ&eacute;e.</p>


<p>L&#039;autre option serait de modifier le gabarit pour inclure l&#039;URL complet au javascript, afin que cela fonctionne en tout temps, m&ecirc;me si la balise metadata n&#039;est pas utilis&eacute;e.</p>
<h4>Augmenter la taille des vignettes</h4>
<p>Voir ce message dans le forum: <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,7844.0.html&quot; target=&quot;_blank&quot;>Vignettes plus grandes pour l&#039;album</a> (message en anglais).</p>
<h4>Les effets sur image (Transparence) ne fonctionnent pas vraiment</h4>
<p>Assurez-vous que tous les fichiers dans le dossier templates/db folder ont les permissions chmod 755. Voir: <a href=&quot;http://forum.cmsmadesimple.org/index.php?topic=10466.msg52526#msg52526&quot; target=&quot;_blank&quot;> 	
Re: random_image dans l&#039;album. cela peut-il &ecirc;tre une vignette greybox? {RESOLU!}</a> (message en anglais).</p>

<h3>Support</h3>
<p>Conform&eacute;ment &agrave; la licence GPL, ce module est distribu&eacute; tel quel. Veuillez vous r&eacute;f&eacute;rer directement &agrave; la licence pour tout avis de non responsabilit&eacute;.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2006, dam. Tous droits r&eacute;serv&eacute;s.</p>
<p>Ce module est distribu&eacute; sous la licence <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot; target=&quot;_blank&quot;>GNU Public License</a>. Vous devez agr&eacute;er aux termes de cette licence pour pouvoir utiliser ce module.</p>';
$lang['help_action'] = '<h4>Afficher une liste des images r&eacute;cemment ajout&eacute;es</h4>
	 <p>Vous pouvez afficher une liste des images r&eacute;cemment ajout&eacute;es appelant un album ainsi&nbsp;:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<p><b>Important</b>: Vous devez choisir &quot;<b>une page par d&eacute;faut qui contient la balise album</b>&quot; afin d&#039;utiliser cette fonction.</p>
<h4>Afficher une image au hasard</h4>
<p>D&#039;abord, le script compte toutes les entr&eacute;es dans la base de donn&eacute;es (y compris les albums), trouve un chiffre au hasard entre &#039;0&#039; et le nombre maximal d&#039;entr&eacute;es. Avec ce chiffre, le pointeur de la base de donn&eacute;es et d&eacute;fini &agrave; une entr&eacute;e sp&eacute;cifique et les donn&eacute;es  sont r&eacute;cup&eacute;r&eacute;es de la table et retourn&eacute;es au script..</p>
<h5>Comment l&#039;utiliser?</h5>
<p>Ins&eacute;rer simplement la balise dans votre gabarit ou page ainsi&nbsp;: <code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<p>Pour afficher un certain nombre d&#039;images au hasard, appelez le module ainsi:</p>
<code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039; number=&#039;10&#039;}</code>
<h5>Quels sont les param&egrave;tres disponibles pour l&#039;affichage d&#039;images au hasard?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>   - Dossier de l&#039;album, par d&eacute;faut est &#039;root_url&#039;/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>      - liste d&#039;albums entr&eacute;es s&eacute;par&eacute;es par virgule, espace, tiret ou deux-points.</li>
  <li><em>(optional)</em> <tt>border</tt>      - bordure fa&ccedil;on feuille de style, tel que&nbsp;: border=&#039;5px&#039;</li>
  <li><em>(optional)</em> <tt>picturename</tt> - nom des images = True/False, d&eacute;fini un titre avec le nom de l&#039;image</li>
</ul>
<p><b>Note: Ces param&egrave;tres ne sont disponibles que lorsque le module Album est appell&eacute; de cette mani&egrave;re{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</b></p>
par exemple: {cms_module module=&#039;album&#039; action=&#039;random_image&#039; albums=&#039;1,3,4,6&#039; border=&#039;3px&#039; picturename=&#039;True&#039;}
</p>
<h5>&Agrave; faire</h5>
<p>
<ul>
	<li>arranger les noms des classes des balises div, et sp&eacute;cifier leur utilisation possible dans les feuilles de style.<br />
		(et se d&eacute;barraser du param&egrave;tre border)</li>
  <li>d&eacute;finir le nom de l&#039;album &agrave; partir de la tablealbum_albums, et rendre possible son affichage dans le code g&eacute;n&eacute;r&eacute;.</li>
  <li>rendre possible le fait de lier d&#039;une image &agrave; un album? &agrave; une autre image?</li>
  <li>utilisation d&#039;un param&egrave;tre hauteur et largeur maximum et redimensionnement de la vignette si n&eacute;cessaire.</li>
</ul>
</p>
<p>Auteur image au hasard: Frank Prins <<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>></p>';
$lang['help_number'] = '<h4>Afficher un certain nombre d&#039;images r&eacute;cemment ajout&eacute;es</h4>
	 <p>Vous pouvez afficher un certain nombre d&#039;images en appelant le module ainsi&nbsp;:<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}</pre> 
';
$lang['addalbum'] = 'Ajouter un album';
$lang['error_nonamegiven'] = 'Veuillez donner un nom &agrave; votre nouvel album.';
$lang['albumadded'] = 'L&#039;album a &eacute;t&eacute; ajout&eacute; avec succ&egrave;s. Des images peuvent &ecirc;tre ajout&eacute;es ci-dessous.';
$lang['albumdeleted'] = 'L&#039;album a &eacute;t&eacute; supprim&eacute; de la base de donn&eacute;es avec succ&egrave;s';
$lang['noalbumstext'] = 'Vous n&#039;avez cr&eacute;&eacute; aucun album photo.';
$lang['addpicture'] = 'Ajouter des images';
$lang['addtemplate'] = 'Ajouter un gabarit';
$lang['albumidtext'] = 'IDs ';
$lang['albumnametext'] = 'Albums ';
$lang['albumthumbtext'] = 'Vignettes';
$lang['albumnumpicturestext'] = 'Nombre d&#039;images';
$lang['albumreordertext'] = 'R&eacute;ordonner';
$lang['albumactionstext'] = 'Actions ';
$lang['Albums'] = 'Albums ';
$lang['areyousure'] = '&Ecirc;tes-vous s&ucirc;r&nbsp;?';
$lang['browsepictures'] = 'Modifier';
$lang['cancel'] = 'Annuler';
$lang['changecomment'] = 'Modifier le commentaire';
$lang['changepicture'] = 'Modifier l&rsquo;image';
$lang['changethumb'] = 'Modifier';
$lang['changethumbnail'] = 'Modifier la vignette';
$lang['columns'] = 'Nombre maximal de colonnes de vignettes (0 = illimit&eacute;. Seulement utilis&eacute; dans le gabarit Tables)';
$lang['comment'] = 'Commentaire';
$lang['currenttemplate'] = 'Gabarit standard';
$lang['currentpicture'] = 'Image s&eacute;lectionn&eacute;e';
$lang['currentthumbnail'] = 'Vignette s&eacute;lectionn&eacute;e';
$lang['deletealbum'] = 'Supprimer';
$lang['deletepicture'] = 'Supprimer';
$lang['Help'] = 'Aide';
$lang['modify'] = 'Modifier';
$lang['moveleft'] = 'D&eacute;placer &agrave; gauche';
$lang['moveright'] = 'D&eacute;placer &agrave; droite';
$lang['multiplealbumtemplate'] = 'Gabarit pour albums multiples';
$lang['name'] = 'Nom';
$lang['nocomment'] = '(pas de commentaire)';
$lang['nothumbnail'] = '(pas de vignette)';
$lang['picture'] = 'Image';
$lang['parentdir'] = '(Dossier parent)';
$lang['pictures'] = 'images';
$lang['nopicturetext'] = 'Il n&#039;y a pas d&#039;images dans cet album.';
$lang['Picture'] = 'Image';
$lang['Pictures'] = 'Images';
$lang['Properties'] = 'Propri&eacute;t&eacute;s';
$lang['propertiesupdated'] = 'Les propri&eacute;t&eacute;s de l&#039;album ont &eacute;t&eacute; sauvegard&eacute;es avec succ&egrave;s';
$lang['resetthumb'] = 'R&eacute;initialiser';
$lang['return'] = 'Retour';
$lang['rows'] = 'Nombre maximal de lignes de vignettes (0 = illimit&eacute;. Seulement utilis&eacute; dans le gabarit Tables)';
$lang['useinlinelinks'] = '<b>Utilisation des liens inline</b> - Ceci rendra le contenu de la page toujours visible avec la balise Album en dessus de toutes les images. De plus, <strong>ceci permettra &agrave; l&#039;album de fonctionner correctement quand il est plac&eacute; dans un bloc de contenu additionnel</strong>. <strong>NOTE: Activer cette fonction d&eacute;sactive l&#039;utilisation des URL propres (pretty URLs) de l&#039;album.</strong>';
$lang['autolinkstylesheet'] = '<b>Feuille de style &quot;autolink&quot;</b>: Cochez cette case afin que le lien &agrave; la feuille de style de l&#039;album soit automatiquement ins&eacute;r&eacute; dans l&#039;ent&ecirc;te de votre page. Ceci devrait normalement &ecirc;tre laiss&eacute; d&eacute;fini.';
$lang['selectall'] = 'Tout s&eacute;lectionner';
$lang['selectpicture'] = 'Utiliser cette image en taille r&eacute;elle';
$lang['selectthumb'] = 'Utiliser la vignette de cette image';
$lang['submit'] = 'Enregistrer';
$lang['file_templates_help'] = '<b>Ce sont les gabarits que vous devez installer dans la base de donn&eacute;es avant de pouvoir les utiliser.</b>';
$lang['template'] = 'Gabarit';
$lang['deletetemplate'] = 'Supprimer le gabarit';
$lang['Template'] = 'Gabarit';
$lang['templatenametext'] = 'Gabarits';
$lang['Templates'] = 'Gabarits';
$lang['edittemplate'] = '&Eacute;diter le gabarit';
$lang['templatesaved'] = 'Ce gabarit a &eacute;t&eacute; enregistr&eacute; avec succ&egrave;s dans la base de donn&eacute;es.';
$lang['errortemplatenameexists'] = 'Un gabarit avec le m&ecirc;me nom existe d&eacute;j&agrave;, veuillez choisir un autre nom.';
$lang['error_filenotfound_defaulttemplate'] = 'Le fichier de gabarit pour ce gabarit n&#039;a pas &eacute;t&eacute; trouv&eacute;';
$lang['thumbnail'] = 'Vignette';
$lang['title'] = 'Titre';
$lang['uploadpicture'] = 'T&eacute;l&eacute;charger une image';
$lang['upload'] = 'Envoyer';
$lang['view'] = 'Voir';
$lang['options'] = 'Options ';
$lang['optionsupdated'] = 'Les options ont &eacute;t&eacute; mises &agrave; jour avec succ&egrave;s';
$lang['defaultrows'] = 'Nombre maximal de lignes de vignettes pour les nouveaux albums (0 = illimit&eacute;. Seulement utilis&eacute; dans le gabarit Table)';
$lang['defaultcolumns'] = 'Nombre maximal de colonnes de vignettes pour les nouveaux albums (0 = illimit&eacute;. Seulement utilis&eacute; dans le gabarit Tables)';
$lang['defaulttemplate'] = 'Gabarit par d&eacute;faut';
$lang['file_templates'] = 'Gabarits sous forme de fichiers';
$lang['filename'] = 'Nom de fichier';
$lang['importtemplate'] = 'Importation de gabarit';
$lang['newtemplate'] = 'Nom du nouveau gabarit';
$lang['defaultalbumpage'] = 'Page par d&eacute;faut qui contient les albums. Ceci doit &ecirc;tre une page de type &quot;Album&quot; ou contenir la balise d&#039;appel du module Albums. Requis is vous utilisez la fonction &quot;recently_updated&quot;';
$lang['album_comment_updated'] = 'L&#039;album a &eacute;t&eacute; mis &agrave; jour avec succ&egrave;s.';
$lang['picture_comment_updated'] = 'Le commentaire de l&#039;image a &eacute;t&eacute; mis &agrave; jour avec succ&egrave;s.';
$lang['template_deleted'] = 'Le gabarit a &eacute;t&eacute; supprim&eacute; de la base de donn&eacute;es avec succ&egrave;s.';
$lang['error_empty_template'] = 'Erreur&nbsp;: le gabarit nomm&eacute; &quot;%s&quot; d&eacute;fini dans cet album n&#039;existe pas. Veuillez vous rendre dans le panneau d&#039;administration et assigner un autre gabarit pour cet album.';
$lang['run_upgrade_script'] = 'Lancer le script de mise &agrave; jour';
$lang['addcategory'] = 'Ajout de cat&eacute;gorie';
$lang['categories'] = 'Cat&eacute;gories';
$lang['nocategories'] = 'Vous n&#039;avez pas encore ajout&eacute; de cat&eacute;gories.';
$lang['categorynametext'] = 'Nom de la cat&eacute;gorie';
$lang['categoryidtext'] = 'ID de la cat&eacute;gorie';
$lang['categoryreordertext'] = 'Trier les cat&eacute;gories';
$lang['categoryactionstext'] = 'Actions ';
$lang['categoryadded'] = 'La cat&eacute;gorie a &eacute;t&eacute; ajout&eacute;e &agrave; la base de donn&eacute;es avec succ&egrave;s.';
$lang['categorymoved'] = 'La cat&eacute;gorie a &eacute;t&eacute; d&eacute;plac&eacute;e avec succ&egrave;s.';
$lang['categoryupdated'] = 'La cat&eacute;gorie a &eacute;t&eacute; mise &agrave; jour avec succ&egrave;s.';
$lang['editcategory'] = '&Eacute;diter la cat&eacute;gorie';
$lang['categorydeleted'] = 'La cat&eacute;gorie a &eacute;t&eacute; supprim&eacute;e avec succ&egrave;s.';
$lang['error_nocategorynamegiven'] = 'Vous devez donner un nom &agrave; la cat&eacute;gorie.';
$lang['category_listings'] = 'Liste des cat&eacute;gories';
$lang['album_updated'] = 'L&#039;album a &eacute;t&eacute; mis &agrave; jour avec succ&egrave;s.';
$lang['uncategorized'] = 'Album non-cat&eacute;goris&eacute;s';
$lang['automatic_album_list_template'] = 'Automatique (utilise le gabarit assign&eacute; &agrave; chaque album)';
$lang['albummoved'] = 'L&#039;album a &eacute;t&eacute; d&eacute;plac&eacute; avec succ&egrave;s.';
$lang['helpdetailpage'] = '<p>Page pour l&#039;affichage de l&#039;album.  Ceci peut &ecirc;tre soi un alias soit un ID de page. Utilis&eacute; pour permettre aux albums d&#039;&ecirc;tre affich&eacute;s dans diff&eacute;rentes pages, depuis la liste des albums.</p> <p>Exemple d&#039;utilisation&nbsp;:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Note importante lors de la modification des gabarits</h3>
<h4>Activer temporairement le mode debug!</h4>
<p>Si vous n&#039;activez pas le mode debug, des erreurs importants &agrave; propos de variables non d&eacute;finies seront cach&eacute;es, rendant le d&eacute;boguage difficile!</p>
<p>Vous pouvez activer le mode d&eacute;boguage en ouvrant config.php et en d&eacute;finissant:</p>
<code>$config[&#039;debug&#039;] = true;<code>

<h3>Liste des albums</h3>


<p>Vous disposez de la balise smarty {$albums} qui est un tableau dont chaque &eacute;l&eacute;ment est un des albums s&eacute;lectionn&eacute;s.
La structure d&#039;un album est d&eacute;crite dans le chapitre suivant.
Pour les afficher, utilisez la boucle<code>{foreach from=$albums item=album}{/foreach}</code></p>
<h3>Album s&eacute;lectionn&eacute;</h3>
<p>S&#039;il n&rsquo;y a qu&rsquo;un seul album, ou qu&rsquo;un seul album a &eacute;t&eacute; s&eacute;lectionn&eacute;, vous disposez de la balise smarty {$album}. Elle permet d&rsquo;acc&eacute;der aux &eacute;l&eacute;ments suivants&nbsp;:</p>
<ul>
	<li>{$album->name} : nom</li>
	<li>{$album->comment} : commentaire</li>
	<li>{$album->columns} : nombre de colonnes</li>
	<li>{$album->rows} : nombre de lignes</li>
	<li>{$album->thumbnail} : adresse de la miniature</li>
	<li>{$album->link} : lien vers l&rsquo;album</li>
	<li>{$album->picturecount} : nombre d&rsquo;images</li>
</ul>
<h3>Liste des images</h3>
<p>Si un album est s&eacute;lectionn&eacute;, vous disposez de la balise {$pictures} qui est un tableau &agrave; deux dimensions, contenant des lignes qui contiennent chacune des images.
La structure des images est d&eacute;crite dans le chapitre suivant.
Pour les afficher, utilisez la boucle :
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>
<h3>Image</h3>
<p>Si une image est s&eacute;lectionn&eacute;e, vous disposez de la balise {$picture}. Ceci est automatiquement d&eacute;fini sur la premi&egrave;re image d&#039;un album si rien n&#039;est s&eacute;lectionn&eacute;.</p>
<ul>
	<li>{$picture->name} : nom</li>
	<li>{$picture->comment} : commentaire</li>
	<li>{$picture->comment2} : commentaire 2</li>
	<li>{$picture->comment3} : commentaire 3</li>
	<li>{$picture->thumbnail} : adresse (url) de la vignette</li>
	<li>{$picture->picture} : adresse (url) de l&rsquo;image</li>
	<li>{$picture->link} : lien vers l&rsquo;image</li>
	<li>{$picture->number} : num&eacute;ro de l&rsquo;image</li>
	<li>{$picture->thumbnailwidth}: largeur de la vignette</li>
	<li>{$picture->thumbnailheight}: hauteur de la vignette</li>
	<li>{$picture->autothumbnailsize}: g&eacute;n&egrave;re quelque chose comme &#039;height=&quot;76&quot;&#039; pour que l&#039;affichage de vignettes plus grandes entrent dans un espace donn&eacute;</li>
<li>{$max_image_size}: La valeur de la pr&eacute;f&eacute;rence &#039;max_image_size&#039;. Utilis&eacute; dans le gabarit par d&eacute;faut pour redimensionner automatiquement les images trop larges.</li>
</ul>
<h3>Divers</h3>
<p>Vous pouvez aussi utiliser les balises suivantes :</p>
<ul>
	<li>{$returnlink} : retour vers la page pr&eacute;c&eacute;dente</li>
	<li>{$albumnumber} : num&eacute;ro de l&rsquo;album s&eacute;lectionn&eacute;</li>
	<li>{$albumcount} : nombre d&rsquo;albums</li>
	<li>{$picturenumber} : num&eacute;ro de l&rsquo;image s&eacute;lectionn&eacute;e</li>
	<li>{$picturecount} : nombre d&rsquo;images</li>
	<li>{$pagenumber} : num&eacute;ro de la page s&eacute;lectionn&eacute;e</li>
	<li>{$pagecount} : nombre de pages</li>
	<li>{$link.album.1} : lien vers la premi&egrave;re image. Vous pouvez indiquer un autre num&eacute;ro d&rsquo;album d&eacute;sir&eacute;</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : lien vers la premi&egrave;re image. Vous pouvez indiquer un autre num&eacute;ro d&rsquo;image d&eacute;sir&eacute;</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : lien vers la premi&egrave;re page. Vous pouvez indiquer un autre num&eacute;ro de page d&eacute;sir&eacute;</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>
';
$lang['utmz'] = '156861353.1198074922.186.34.utmccn=(referral)|utmcsr=forum.cmsmadesimple.org|utmcct=/index.php/topic,17761.0.html|utmcmd=referral';
$lang['utma'] = '156861353.311918390.1168773036.1199180381.1199183346.200';
$lang['utmc'] = '156861353';
?>