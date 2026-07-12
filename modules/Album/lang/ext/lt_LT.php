<?php
$lang['friendlyname'] = 'Foto albumai';
$lang['postinstall'] = 'Albumas įdiegtas. Nepamir&scaron;kite prisegti naujo stiliaus &quot;Album&quot; &scaron;ablonui kurį naudosite Albumui';
$lang['postuninstall'] = 'Albumas pa&scaron;alintas i&scaron; duombazės';
$lang['uninstalled'] = 'Modulis pa&scaron;alintas';
$lang['installed'] = 'Įdiegta %s versija';
$lang['upgraded'] = 'Modulio versija atnaujinta į %s.';
$lang['error_nofilesuploaded'] = 'Klaida įkeliant failą. Įsitikinkite ar katalogui suteiktos ra&scaron;ymo teisės.';
$lang['error'] = 'Klaida!';
$lang['tw'] = 'Mažo paveiksl. plotis';
$lang['th'] = 'Mažo paveiksl. aukštis';
$lang['nsk'] = 'Kiek paveikslėlių rodyti';

$lang['next_picture'] = 'Kitas paveikslėlis';
$lang['admindescription'] = 'Albumo modulis suteikia galimybę lengvai rodyti nuotarukų albumus jūsų puslapyje';
$lang['accessdenied'] = 'Priėjimas uždraustas';
$lang['query_failed'] = 'Užklausa nepavyko. Bandykite nustatymuose spausti nuorodą &quot;Pradėti atnaujinimą&quot;. Jei tai nepadės, prane&scaron;kite mums apie klaidą.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 April 2006. Initial Release.</li></ul>';
$lang['view_default_stylesheet'] = 'Peržiūrėti pagrindinį &scaron;abloną.';
$lang['help_albums'] = 'Vieno ar kelių norimų rodyti albumų ID sąra&scaron;as (atskirtas kableliais).';
$lang['max_image_size'] = '<b>Maksimalus paveikslėlių dydis:</b> Bet kurie paveikslėliai, kurių i&scaron;matavimai bus didesni nei nurodyta, bus automati&scaron;kai sumažinti (jei &scaron;ablone taip nustatyta) naudojant JavaScript.';
$lang['help_sortdesc'] = 'Ru&scaron;iuoti albumus mažėjančia tvarka vietoje didėjančios.';
$lang['templatenameexists'] = 'Klaida: &Scaron;ablonas tokiu pavadinimu jau egzistuoja. Pasirinkite kitą pavadinimą.';
$lang['templateimported'] = '&Scaron;ablonas buvo sėkmingai importuotas į sistemą ir yra paruo&scaron;tas naudojimui.';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module can be used to manage picture gallery</p>
<h3>How Do I Use It</h3>
<p>To show albums in a page, just put this code : </p>
<p><code>{cms_module module=&quot;album&quot; albums=&quot;1,3&quot;}</code></p>
<p>The code above allows you to show in a page albums whose IDs are 1 and 3 for example. If you do not provide paramater &quot;albums&quot;, it will show all the albums.</p>
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
$lang['addalbum'] = 'Pridėti albumą';
$lang['error_nonamegiven'] = 'Turite suteikti pavadinimą naujam albumui.';
$lang['albumadded'] = 'Albumas sėkmingai sukurtas. Paveikslėliai gali būti pridedami žemiau.';
$lang['albumdeleted'] = 'Albumas sėkmingai pa&scaron;alintas i&scaron; duomenų bazės.';
$lang['noalbumstext'] = 'Jūs dar nesukūrėte albumų.';
$lang['addpicture'] = 'Pridėti paveikslėlius';
$lang['addtemplate'] = 'Pridėti &scaron;abloną';
$lang['albumidtext'] = 'ID';
$lang['albumnametext'] = 'Albumai';
$lang['albumthumbtext'] = 'Mažas paveikslėlis';
$lang['albumnumpicturestext'] = 'Paveikslėlių skaičius';
$lang['albumreordertext'] = 'Perrū&scaron;iuoti';
$lang['albumactionstext'] = 'Veiksmai';
$lang['Albums'] = 'Albumai';
$lang['areyousure'] = 'Ar esate įsitikinęs ?';
$lang['browsepictures'] = 'Pakeisti';
$lang['cancel'] = 'At&scaron;aukti';
$lang['changecomment'] = 'Redaguoti komentarą';
$lang['changepicture'] = 'Pakeisti paveikslėlį';
$lang['changethumb'] = 'Pakeisti';
$lang['changethumbnail'] = 'Pakeisti mažą paveikslėlį';
$lang['columns'] = 'Maksimalus mažų paveikslėlių stulpelių skaičius. (0 rei&scaron;kia neribotą kiekį. Naudojamas tik lentelių &scaron;ablone)';
$lang['comment'] = 'Komentaras';
$lang['currenttemplate'] = '&Scaron;ablonas pagal nutylėjimą';
$lang['currentpicture'] = 'Dabartinis paveikslėlis';
$lang['currentthumbnail'] = 'Dabartinis mažas paveikslėlis';
$lang['deletealbum'] = 'I&scaron;trinti';
$lang['deletepicture'] = 'I&scaron;trinti';
$lang['Help'] = 'Pagalba';
$lang['modify'] = 'Pakeisti';
$lang['moveleft'] = 'Stumti į kairę';
$lang['moveright'] = 'Stumti į de&scaron;inę';
$lang['multiplealbumtemplate'] = 'Sudėtinių albumų &scaron;ablonas';
$lang['name'] = 'Pavadinimas';
$lang['nocomment'] = '(komentarų nėra)';
$lang['nothumbnail'] = '(mažo paveikslėlio nėra)';
$lang['picture'] = 'Paveikslėlis';
$lang['parentdir'] = '(Tėvinė direktorija)';
$lang['pictures'] = 'paveikslėliai';
$lang['nopicturetext'] = '&Scaron;iame albume paveikslėlių nėra.';
$lang['Picture'] = 'Paveikslėlis';
$lang['Pictures'] = 'paveikslėliai';
$lang['Properties'] = 'Savybės';
$lang['propertiesupdated'] = 'Albumo savybės sėkmingai i&scaron;saugotos.';
$lang['resetthumb'] = 'Atnaujinti mažą paveikslėlį';
$lang['return'] = 'Atgal';
$lang['rows'] = 'Eilutės numeris';
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album&#039;s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Automatinė stilių puslapio nuoroda</b>: Pažymėkite &scaron;į lauką jei norite, kad puslapio &scaron;ablono head dalyje atsirastų nuoroda į albumo stilių puslapį. Patartina palikti &scaron;ią funkciją įjungtą.';
$lang['selectall'] = 'Pasirinkti visus';
$lang['selectpicture'] = 'Naudoti &scaron;į paveikslėlį';
$lang['selectthumb'] = 'Naudoti &scaron;io paveikslėlio mažą paveikslėlį';
$lang['submit'] = 'I&scaron;saugoti';
$lang['file_templates_help'] = '<b>Tai yra &scaron;ablonai, kuriuos turite įdiegti prie&scaron; juos naudojant.</b>';
$lang['template'] = '&Scaron;ablonas';
$lang['deletetemplate'] = 'Pa&scaron;alinti &scaron;abloną';
$lang['Template'] = '&Scaron;ablonas';
$lang['templatenametext'] = '&Scaron;ablonai';
$lang['Templates'] = '&Scaron;ablonai';
$lang['edittemplate'] = 'Redaguoti &scaron;abloną';
$lang['templatesaved'] = '&Scaron;ablonas sėkmingai i&scaron;saugotas duomenų bazėje.';
$lang['errortemplatenameexists'] = '&Scaron;ablonas tokiu pavadinimu jau egzistuoja. Pasirinkite kitą pavadinimą.';
$lang['error_filenotfound_defaulttemplate'] = '&Scaron;io &scaron;ablono failas nerastas.';
$lang['thumbnail'] = 'Mažas paveiksllis';
$lang['title'] = 'Pavadinimas';
$lang['uploadpicture'] = 'Įkelti paveikslėlį';
$lang['upload'] = 'Įkelti';
$lang['view'] = 'Peržiūrėti';
$lang['options'] = 'Pasirinkimai';
$lang['optionsupdated'] = 'Parinktys sėkmingai atnaujintos.';
$lang['defaultrows'] = 'Maksimalus mažų paveikslėlių eilučių skaičius naujuose albumuose (0 rei&scaron;kia neribotą skaičių. Naudojama tik lentelių &scaron;ablone)';
$lang['defaultcolumns'] = 'Maksimalus mažų paveikslėlių stulpelių skaičius naujuose albumuose (0 rei&scaron;kia neribotą skaičių. Naudojama tik lentelių &scaron;ablone)';
$lang['defaulttemplate'] = '&Scaron;ablonas pagal nutylėjimą';
$lang['file_templates'] = 'Sukurti &scaron;ablonai';
$lang['filename'] = 'Failo pavadinimas';
$lang['importtemplate'] = 'Importuoti &scaron;abloną';
$lang['newtemplate'] = 'Naujo &scaron;ablono pavadinimas';
$lang['defaultalbumpage'] = 'Pagrindinis puslapis kuriame bus albumas. &Scaron;io puslapio &#039;Turinio tipas&#039; turi būti nustatyta į &#039;Album&#039; arba jei &#039;Turinio tipas&#039; yra &#039;Content&#039;, turinio dalyje turi būti albumo modulio i&scaron;kvietimo kodas.
Reikalinga, jei naudojate funkciją &#039;recently_updated&#039; (neseniai atnaujinta)';
$lang['album_comment_updated'] = 'Albumo komentaras sėkmingai atnaujintas.';
$lang['picture_comment_updated'] = 'Paveikslėlio komentaras sėkmingai atnaujintas.';
$lang['template_deleted'] = '&Scaron;ablonas buvo sėkmingai pa&scaron;alintas i&scaron; duomenų bazės.';
$lang['error_empty_template'] = 'Klaida: &Scaron;ablonas %s, kuris nustatytas &scaron;iam albumui, neegzistuoja. Priskirkite &scaron;iam albumui kitą &scaron;abloną.';
$lang['run_upgrade_script'] = 'Pradėti atnaujinimą';
$lang['addcategory'] = 'Pridėti kategoriją';
$lang['categories'] = 'Kategorijos';
$lang['nocategories'] = 'Kol kas nesukūrėte kategorijų.';
$lang['categorynametext'] = 'Kategorijos pavadinimas';
$lang['categoryidtext'] = 'kategorijos ID';
$lang['categoryreordertext'] = 'Perrū&scaron;iuoti kategoriją';
$lang['categoryactionstext'] = 'Veiksmai';
$lang['categoryadded'] = 'Kategorija sėkmingai i&scaron;saugota';
$lang['categorymoved'] = 'kategorija sėkmingai perkelta';
$lang['categoryupdated'] = 'Kategorija sėkmingai atnaujinta';
$lang['editcategory'] = 'Redaguoti kategoriją';
$lang['categorydeleted'] = 'Kategorija sėkmingai pa&scaron;alinta';
$lang['error_nocategorynamegiven'] = 'Turite nurodyti kategorijos pavadinimą';
$lang['category_listings'] = 'Kategorijų sąra&scaron;as';
$lang['album_updated'] = 'Albumas sėkmingai atnaujintas';
$lang['uncategorized'] = 'Albumai nepriklausantys kategorijoms';
$lang['automatic_album_list_template'] = 'Automatinis (naudoti &scaron;abloną priskirtą atskiram albumui)';
$lang['albummoved'] = 'Albumas sėkmingai perkeltas';
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
	<li>{$picture->thumbnail} : adress (url) of thumbnail</li>
	<li>{$picture->picture} : adress (url) of picture</li>
	<li>{$picture->link} : link to picture</li>
	<li>{$picture->number} : picture number</li>
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
$lang['utma'] = '156861353.129749261.1176897750.1180072856.1180077917.28';
$lang['utmz'] = '156861353.1180077917.28.2.utmccn=(referral)|utmcsr=cmsmadesimple.org|utmcct=/home.shtml|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>