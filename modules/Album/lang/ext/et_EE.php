<?php
$lang['friendlyname'] = 'Fotoalbumid';
$lang['postinstall'] = 'Album is now installed. Don&#039;t forget to attach the new stylesheet &quot;Album (for default, ImageGallery, and Thickbox templates)&quot; to the template of the page on which you will be using Album.';
$lang['postuninstall'] = 'Album on n&uuml;&uuml;d andmebaasist eemaldatud';
$lang['uninstalled'] = 'Moodul deinstalleeritud.';
$lang['installed'] = 'Release %s is installed';
$lang['upgraded'] = 'Module upgraded in release %s.';
$lang['error_nofilesuploaded'] = 'There was an error uploading. Please check and make sure the folder is writable.';
$lang['error'] = 'Error!';
$lang['admindescription'] = 'The Album module allows you to easily display photo galleries on your website.';
$lang['accessdenied'] = 'Access denied';
$lang['module_example_stylesheet'] = 'Album (for default, ImageGallery, and Thickbox templates)';
$lang['module_example_stylesheet_intro'] = 'This template is needed if you use the default, ImageGallery, or Thickbox templates in the Album module.
This may be overwritten when the module is upgraded and it will be deleted when 
the module is uninstalled, so make a copy if you want to modify it.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 April 2006. Initial Release.</li></ul>';
$lang['help_albums'] = 'A list of one or more (separated by commas) IDs of Albums to be shown.';
$lang['help_sortdesc'] = 'Sort albums in descending order rather than ascending.';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module can be used to manage picture gallery</p>
<h3>How Do I Use It</h3>
<p>To show all albums on a page, just put this code : </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>If you only want certain albums shown then use use code like this:
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>The code above allows you to show in a page albums whose IDs are 1 and 3 for example. If you do not provide paramater &quot;albums&quot;, it will show all the albums.</p>
<h3>Templates</h3>
<p>An &quot;Album (for default, ImageGallery, Thickbox templates)&quot; stylesheet for the default, ImageGallery, and Thickbox templates is installed with the module. This stylesheet is deleted when the module is uninstalled and may be overwitten by an upgrade, so you might want to use a copy if you modify it. Attach the stylesheet to the page template used.</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>This module has been released under the <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['addalbum'] = 'Add an album';
$lang['error_nonamegiven'] = 'You must give a name to your new album.';
$lang['albumadded'] = 'The Album was successfully added. Pictures can be added to it below.';
$lang['albumdeleted'] = 'The album was successfully removed from the database.';
$lang['noalbumstext'] = 'You have not created any photo albums yet.';
$lang['addpicture'] = 'Add pictures';
$lang['addtemplate'] = 'Add a template';
$lang['albumidtext'] = 'IDs';
$lang['albumnametext'] = 'Albums';
$lang['albumthumbtext'] = 'Thumbnails';
$lang['albumnumpicturestext'] = 'Number of pictures';
$lang['albumreordertext'] = 'Reorder';
$lang['albumactionstext'] = 'Actions';
$lang['Albums'] = 'Albums';
$lang['areyousure'] = 'Are you sure ?';
$lang['browsepictures'] = 'Change';
$lang['cancel'] = 'Cancel';
$lang['changecomment'] = 'Edit comment';
$lang['changepicture'] = 'Change picture';
$lang['changethumb'] = 'Change';
$lang['changethumbnail'] = 'Change thumbnail';
$lang['columns'] = 'Max number of thumbnail columns (0 means unlimited. Only used on Tables template)';
$lang['comment'] = 'Comment';
$lang['currenttemplate'] = 'Album List Template';
$lang['currentpicture'] = 'Current picture';
$lang['currentthumbnail'] = 'Current thumbnail';
$lang['deletealbum'] = 'Delete';
$lang['deletepicture'] = 'Delete';
$lang['Help'] = 'Help';
$lang['modify'] = 'Change';
$lang['moveleft'] = 'Move left';
$lang['moveright'] = 'Move right';
$lang['multiplealbumtemplate'] = 'Multiple albums template';
$lang['name'] = 'Name';
$lang['albumrenamed'] = 'The album was successfully renamed.';
$lang['nocomment'] = '(no comment)';
$lang['nothumbnail'] = '(no thumbnail)';
$lang['picture'] = 'Picture';
$lang['parentdir'] = '(Parent directory)';
$lang['pictures'] = 'pictures';
$lang['nopicturetext'] = 'There are no pictures in this album.';
$lang['Picture'] = 'Picture';
$lang['Pictures'] = 'Pictures';
$lang['Properties'] = 'Properties';
$lang['propertiesupdated'] = 'The album properties were successfully saved.';
$lang['resetthumb'] = 'Reset thumbnail';
$lang['return'] = 'Back';
$lang['rows'] = 'Max number of thumbnail rows (0 means unlimited. Only used on Tables template)';
$lang['showcallpagecontent'] = 'Check this box to show the content of the page with the Album tag above all pictures';
$lang['selectall'] = 'Select all';
$lang['selectpicture'] = 'Use this picture';
$lang['selectthumb'] = 'Use the thumbnail of this picture';
$lang['submit'] = 'Save';
$lang['template'] = 'Template';
$lang['deletetemplate'] = 'Delete Template';
$lang['Template'] = 'Template';
$lang['templatenametext'] = 'Templates';
$lang['Templates'] = 'Templates';
$lang['edittemplate'] = 'Edit Template';
$lang['templatesaved'] = 'The template was successfully saved to the database.';
$lang['errortemplatenameexists'] = 'A template with that name already exists, please choose a different name.';
$lang['error_filenotfound_defaulttemplate'] = 'The template file for this template was not found.';
$lang['thumbnail'] = 'Thumbnail';
$lang['title'] = 'Tiitel';
$lang['uploadpicture'] = 'Upload a picture';
$lang['upload'] = 'Upload';
$lang['view'] = 'Vaata';
$lang['options'] = 'Valikud';
$lang['optionsupdated'] = 'Valikud uuendatud.';
$lang['defaultrows'] = 'Default max number of thumbnail rows for new albums (0 means unlimited. Only used on Tables template)';
$lang['defaultcolumns'] = 'Default max number of thumbnail columns for new albums (0 means unlimited. Only used on Tables template)';
$lang['defaulttemplate'] = 'Default Template';
$lang['help_template'] = '<h3>Album list</h3>

<p>An &quot;Album (for default, ImageGallery, and Thickbox templates)&quot; stylesheet for the default, ImageGallery, and Thickbox templates is installed with the module. This stylesheet is deleted when the module is uninstalled and may be overwitten by an upgrade, so you might want to use a copy if you modify it. Attach the stylesheet to the page template used.</p>

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
$lang['utmz'] = '156861353.1155481003.9.4.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/softwaremap/trove_list.php|utmcmd=referral';
$lang['utma'] = '156861353.1108024396.1154265612.1156685108.1156784227.20';
$lang['utmb'] = '156861353';
$lang['utmc'] = '156861353';
?>