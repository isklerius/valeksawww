<?php
$lang['friendlyname'] = 'Photo Albums';
$lang['postinstall'] = 'Album is now installed. <p><b>Note: You may have to change File Creation Mask (umask): from "022"
to "002" to keep from getting 403 forbidden errors when trying to view generated thumbnails on your webhost.</b></p>';
$lang['postuninstall'] = 'Album is now removed from the database.';
$lang['uninstalled'] = 'Module uninstalled';
$lang['installed'] = 'Release %s is installed';
$lang['upgraded'] = 'Module upgraded in release %s.';
$lang['error_nofilesuploaded'] = 'There was an error uploading. Please check and make sure the folder is writable.';
$lang['error'] = 'Error!';

$lang['tw'] = 'Thumbnail width';
$lang['th'] = 'Thumbnail height';
$lang['nsk'] = 'How many thumbnails to show';


$lang['next_picture'] = 'Next Picture';
$land['admin_title'] = 'Photo album manager';
$lang['admindescription'] = 'The Album module allows you to easily display photo galleries on your website.';
$lang['accessdenied'] = 'Access denied';
$lang['query_failed'] = 'A query failed. Trying going to the "Options" tab and clicking the "Run Upgrade Script" link. If that does not fix the problem, then please file a bug.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 April 2006. Initial Release.</li></ul>';
$lang['view_default_stylesheet'] = 'View Default Stylesheet';
$lang['help_albums'] = 'A list of one or more (separated by commas) IDs of Albums to be shown.';
$lang['max_image_size'] = '<b>Maximum image size:</b> Any images larger than this will automatically be scaled down (if the template is configured to do that.) using Javascript. Note: Currently only the "Tables" template uses this setting.';
$lang['help_sortdesc'] = 'Sort albums in descending order rather than ascending.';
$lang['help_sortpicturesdesc'] = 'Sort pictures in descending order rather than ascending. This will make new pictues that are added to an album to be listed first.<p>Example to show pictures in reverse order:</p><pre>{cms_module module=\'album\' sortpicturesdesc=\'true\'}</pre>';
$lang['templatenameexists'] = 'Error: A template with that name already exists. Please choose a different name.';
$lang['templateimported'] = 'The template was sucessfully imported into the database and is now installed for use.';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module can be used to manage picture gallery</p>
<h3>How Do I Use It</h3>
<p>First go to Content -> Photo Albums and create Albums and add pictures to them.</p>
<p>To show all albums on a page, just put this code in your page content: </p>
<p><code>{cms_module module=\'album\'}</code></p>
<p>If you only want to show albums from a specific category then use use code like this:
<p><code>{cms_module module=\'album\' categories=\'1\'}</code></p>
<p>The code above allows you to show in a page albums who belong to a category whose ID is 1.</p>
<p>You can also show multiple categories like this:
<p><code>{cms_module module=\'album\' categories=\'1,3\'}</code></p>
<p>If you only want certain albums shown then use code like this:
<p><code>{cms_module module=\'album\' albums=\'1,3\'}</code></p>
<p>The code above allows you to show in a page albums whose IDs are 1 and 3 for example. If you do not provide paramater "albums", it will show all the albums.</p>
<h3>Templates</h3>
<h4>How to remove border around thumbnails</h4>
<p>Add this to the end of modules/Album/css/stylesheet.css:</p>
<pre>.thumb a { background-color:transparent; border:0; }</pre>
<h4>Fix large gap problems caused by clear:both</h4>
<p>See: <a href="RE: Cannot seem to get categories working">RE: Cannot seem to get categories working</a></p>
<p>Short answer, add this to your Stylesheet:</p>
<pre>
#main {
float: left;
}
</pre>
<h3>Troubleshooting</h3>
<p>Talk to your developer about using ImageMagick instead of GD, it performs better.</p>
<h4>Thumbnails not working</h4>
<p><b>Note: You may have to change File Creation Mask (umask): from "022"
to "002"
to keep from getting 403 forbidden errors when trying to view
generated thumbnails
on your webhost.</b></p>
<a href="http://dev.cmsmadesimple.org/forum/message.php?msg_id=1181">A possible workaround to thumbnail problems</a>
<h4>Thumbnails will not increase height above 72px</h4>
<p>See <a href="http://forum.cmsmadesimple.org/index.php/topic,14125.msg69907.html#msg69907"> 	
Re: Album module and thumbnails in IE [SOLVED]</a>. Basically delete this part from your template:
{$onepicture->autothumbnailsize} and {$album->autothumbnailsize} to fix the album thumbnails size.</p>
<p>The "autothumbnailsize" feature was added to make all thumbnails stay at height=72. Perhaps this feature is more of a problem than a help.</p>

<h4>Thumbnails don\'t line up correctly</h4>
<p>You may need to shorten the titles of your Albums. Or try using the Tables template.</p>
<p>See <a href="http://forum.cmsmadesimple.org/index.php/topic,11996.0.html">Topic: Album Thumbnail layout [solved]</a>.</p>
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
<h4>Fix: Javascript doesn\'t load when pretty urls with hierarchy enabled - big picture doesn\'t show</h4>
Everything should work if you put this tag in between your
&lt;head&gt; &lt;/head&gt; tags in your page template like this:
&lt;head&gt;
...
{metadata}
&lt;/head&gt;

<p>That will make CMSMS output a tag like this:
&lt;base href="http://www.elijahlofgren.com/" /&gt;</p>

<p>which should make all relative links work fine, even if hierarchy
is enabled.</p>


<p>The other option would be for me to change the template to include
a full URL to the JS so that it should always work, even if the
metadata tag is not used.</p>
<h4>Increasing the size of the thumbnails</h4>
<p>See this post on the forums: <a href="http://forum.cmsmadesimple.org/index.php/topic,7844.0.html">Larger Thumbnails for Album</a>.</p>
<h4>Image Effects (Transparancy) not quite working</h4>
<p>Make sure all the files in the templates/db folder have chmod 755. See: <a href="http://forum.cmsmadesimple.org/index.php?topic=10466.msg52526#msg52526"> 	
Re: random_image in Album. Can it be a greybox thumbnail? {SOLVED!}</a>.</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';

$lang['help_action'] = '
<h4>Show list of recently added pictures</h4>
	 <p>You can show a list of added pictures calling Album like this:</p>
<pre>{cms_module module=\'album\' action=\'recently_updated\'}</pre>
<p>If you want to show recent pictures from a specific Album (e.g. album id 1) you can call Album like this:</p>
<pre>{cms_module module=\'album\' albums=\'1\' action=\'recently_updated\' number=\'2\'}</pre>
<p><b>Important</b>: You must choose a "<b>Default page that contains Album.</b>" in order to use this feature.</p>
<div style="border:1px solid black;">
<h4>Show random image</h4>
<p>First it counts all rows in the database (accounting the included Albums), finds a random number between \'0\' and the maximum number of rows. With this number the database pointer is being set to a specific row and the data is retrieved from the table and returned.</p>
<h5>How do I use it?</h5>
<p>Just insert the tag into your template/page like: <code>{cms_module module=\'album\' action=\'random_image\'}</code></p>
<p>To show a certain number of random images call it like this:</p>
<code>{cms_module module=\'album\' action=\'random_image\' number=\'10\'}</code>
<h5>What parameters the random_image action take?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>   - Album directory, default is: \'root_url\'/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>      - comma, space, dash or semicolon separated list of albums to show images of.</li>
  <li><em>(optional)</em> <tt>border</tt>      - stylesheetstyled border ala border=\'5px\'</li>
  <li><em>(optional)</em> <tt>picturename</tt> - picturename = True/False, sets a title with the picture name</li>
</ul>
<p><b>Note: These parameters are only available when calling Album with {cms_module module=\'album\' action=\'random_image\'}</b></p>
<p>so for example: {cms_module module=\'album\' action=\'random_image\' albums=\'1,3,4,6\' border=\'3px\' picturename=\'True\'}</p>
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
<p>Random Image Author: Frank Prins &lt;<a href="mailto:webmaster@frank-fem.com">webmaster@frank-fem.com</a>&gt;</p>
</div>
';
$lang['help_number'] = '
<h4>Show a certain number of recently updated pictures</h4>
	 <p>You can show a list of a certain number of pictures by calling Album like this:</pre> <pre>{cms_module module=\'album\' action=\'recently_updated\' number=\'15\'}
';
$lang['addalbum'] = 'Add an album';
$lang['error_nonamegiven'] = 'You must give a name to your new album.';
$lang['albumadded'] = 'The Album was successfully added. Pictures can be added to it below.';
$lang['albumdeleted'] = 'The album was successfully removed from the database.';
$lang['noalbumstext'] = 'You have not created any photo albums in this category.';
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
$lang['changethumb'] = 'Change thumbnail';
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
$lang['useinlinelinks'] = '<b>Use Inline Links</b> - This will make the content of the page always be shown with the Album tag above all pictures. In addition <strong>this will make Album work correctly when placed in additional page content blocks</strong>. <strong>NOTE: Enabling this option will disable Album\'s use of pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Auto Link Stylesheet</b>: Check this box to automatically insert the link to the Album stylesheet in head of your page. This should usually be left enabled.';
$lang['selectall'] = 'Select all';
$lang['selectpicture'] = 'Use this picture';
$lang['selectthumb'] = 'Use the thumbnail of this picture';
$lang['submit'] = 'Save';
$lang['file_templates_help'] = '<b>These are templates that you must install to the database before you can use them.</b>';
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
$lang['title'] = 'Title';
$lang['uploadpicture'] = 'Upload a picture';
$lang['upload'] = 'Upload';
$lang['view'] = 'View';
$lang['options'] = 'Options';
$lang['optionsupdated'] = 'The options were successfully updated.';
$lang['defaultrows'] = 'Default max number of thumbnail rows for new albums (0 means unlimited. Only used on Tables template)';
$lang['defaultcolumns'] = 'Default max number of thumbnail columns for new albums (0 means unlimited. Only used on Tables template)';
$lang['defaulttemplate'] = 'Default Template';
$lang['file_templates'] = 'Available Templates';
$lang['filename'] = 'File Name';
$lang['importtemplate'] = 'Import Template';
$lang['newtemplate'] = 'Name for the new template';
$lang['defaultalbumpage'] = 'Default page that contains Album. This page must be an "Album" type page or contain the Album tag. Required if you use the recently_updated feature.';
$lang['album_comment_updated'] = 'The album comment was successfully updated.';
$lang['picture_comment_updated'] = 'The picture comment was successfully updated.';
$lang['template_deleted'] = 'The template was successfully deleted from the database';
$lang['error_empty_template'] = 'Error: The template named "%s" that this Album is set to use does not exist. Please go to the Album Admin Panel and assign a different template to this Album.';
$lang['run_upgrade_script'] = 'Run Upgrade Script';
$lang['addcategory'] = 'Add Category';
$lang['categories'] = 'Categories';
$lang['nocategories'] = 'You have not added any categories yet.';
$lang['categorynametext'] = 'Category Name';
$lang['categoryidtext'] = 'Category id';
$lang['categoryreordertext'] = 'Reorder Category';
$lang['categoryactionstext'] = 'Actions';
$lang['categoryadded'] = 'The category was successfully added to the database.';
$lang['categorymoved'] = 'The category was successfully moved.';
$lang['categoryupdated'] = 'The category was successfully updated.';
$lang['editcategory'] = 'Edit Category';
$lang['categorydeleted']  = 'The category was successfully deleted.';
$lang['error_nocategorynamegiven'] = 'You must give a name to your category.';
$lang['category_listings'] = 'Category Listings';
$lang['album_updated'] = 'The album was successfully updated.';
$lang['uncategorized'] = 'Uncategorized Albums';
$lang['automatic_album_list_template'] = 'Automatic (use template assigned to each album)';
$lang['albummoved'] = 'The album was successfully moved.';
$lang['helpdetailpage'] = '<p>Page to display Albums in.  This can either be a page alias or an id. Used to allow Album pictures 
to be displayed in a different page from the album list.</p> <p>Example of use:</p><pre>{cms_module module=\'album\' detailpage=\'album\'}</pre>';
$lang['help_template'] = '
<h3>Important tips for modifying templates</h3>
<h4>Enable debug mode!</h4>
<p>Unless you enable debug mode, important errors about undefined template variables will be hidden, making debugging templates very difficult!</p>
<p>You can enable debug mode by opening config.php and setting:</p>
<code>$config[\'debug\'] = true;<code>

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
	<li>{$picture->autothumbnailsize}: outputs something like \'height="76"\' to make tall thumbnails fit in a box</li>
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
