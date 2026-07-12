<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://cmsmadesimple.sf.net
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
#
#$Id$

/**
 * @see Album.module.php
 * @see class Album
*/
// Typical Database Initialization
$db = &$this->cms->GetDb();

// mysql-specific, but ignored by other database
$taboptarray = array('mysql' => 'TYPE=MyISAM');
$dict = NewDataDictionary($db);

// table schema description
$flds = "
	album_id I KEY,
	album_name C(80),
	album_number I,
	thumbnail_path C(255),
	comment X,
	column_number I,
	row_number I,
	template C(50),
	nsk I(10),
	th I(10),
	tw I(10)
	";

// create it. This should do error checking, but I'm a lazy sod.
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_album_albums",
		$flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

// create a sequence
$db->CreateSequence(cms_db_prefix()."module_album_albums_seq");

//create Index on albumtable
$flds = "
	album_number
	";
$sqlarray = $dict->CreateIndexSQL(cms_db_prefix()."module_album_albums_index", cms_db_prefix()."module_album_albums",$flds);
$dict->ExecuteSQLArray($sqlarray);

$flds = "
	picture_id I KEY,
	picture_name C(80),
	picture_album_id I,
	picture_number I,
	thumbnail_path C(255),
	picture_path C(255),
	comment X,
	comment2 X,
	comment3 X,
      	thumbnail_width C(20),
      	thumbnail_height C(20)
	";

// create it. This should do error checking
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_album_pictures",
		$flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

// create a sequence
$db->CreateSequence(cms_db_prefix()."module_album_pictures_seq");

//create Index on picture table
$flds = "
	picture_album_id,
	picture_number
	";
$sqlarray = $dict->CreateIndexSQL(cms_db_prefix()."module_album_pictures_index", cms_db_prefix()."module_album_pictures",$flds);
$dict->ExecuteSQLArray($sqlarray);

// permissions
$this->CreatePermission('Use Album','Use Album');

// give Admin and Editor group rights to 'Use Album'
// There is a function request to put this all in one function like:
// $this->SetPermission('Use Album', 'Admin', true);
// $this->SetPermission('Use Album', 'Editor', true);
$perm_id = $db->GetOne("SELECT permission_id FROM ".cms_db_prefix()."permissions WHERE permission_name = 'Use Album'");
$group_id = $db->GetOne("SELECT group_id FROM ".cms_db_prefix()."groups WHERE group_name = 'Admin'");

$count = $db->GetOne("SELECT count(*) FROM " . cms_db_prefix() . "group_perms WHERE group_id = ? AND permission_id = ?", array($group_id, $perm_id));
if (isset($count) && intval($count) == 0)
{
	$new_id = $db->GenID(cms_db_prefix()."group_perms_seq");
	$query = "INSERT INTO " . cms_db_prefix() . "group_perms (group_perm_id, group_id, permission_id, create_date, modified_date) VALUES (".$new_id.", ".$group_id.", ".$perm_id.", ". $db->DBTimeStamp(time()) . ", " . $db->DBTimeStamp(time()) . ")";
	$db->Execute($query);
}

$group_id = $db->GetOne("SELECT group_id FROM ".cms_db_prefix()."groups WHERE group_name = 'Editor'");

$count = $db->GetOne("SELECT count(*) FROM " . cms_db_prefix() . "group_perms WHERE group_id = ? AND permission_id = ?", array($group_id, $perm_id));
if (isset($count) && intval($count) == 0)
{
	$new_id = $db->GenID(cms_db_prefix()."group_perms_seq");
	$query = "INSERT INTO " . cms_db_prefix() . "group_perms (group_perm_id, group_id, permission_id, create_date, modified_date) VALUES (".$new_id.", ".$group_id.", ".$perm_id.", ". $db->DBTimeStamp(time()) . ", " . $db->DBTimeStamp(time()) . ")";
	$db->Execute($query);
}

$this->SetPreference('template','default');
$this->SetPreference('defaultcolumns', 5);
$this->SetPreference('defaultrows', 0);
$this->SetPreference('defaulttemplate', 'default');
 // Turn inline links on by default since they cause less problems (i.e. Album will work when called in additional content blocks).
// Doing this does disable pretty URLs, but functionality is more important.
$this->SetPreference('useinlinelinks', 1);

$this->SetTemplate('default', $this->GetDefaultAlbumTemplate('default'));
$this->SetTemplate('recently_updated', $this->GetDefaultAlbumTemplate('recently_updated'));
$this->SetTemplate('random_image', $this->GetDefaultAlbumTemplate('random_image'));
$this->SetTemplate('categories', $this->GetDefaultAlbumTemplate('categories'));

// Categories
$dict = NewDataDictionary($db);

// table schema description
$flds = "
	category_id I KEY,
	category_name C(80),
	category_number I,
	category_comment X
	";

// create it. 
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_album_categories",
		$flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

// create a sequence
$db->CreateSequence(cms_db_prefix()."module_album_categories_seq");



// Category Listings
$flds = "
	listing_id I KEY,
	listing_album_id I,
	listing_category_id I,
	listing_number I
	";

// create it. This should do error checking
$sqlarray = $dict->CreateTableSQL(cms_db_prefix()."module_album_category_listings",
		$flds, $taboptarray);
$dict->ExecuteSQLArray($sqlarray);

// create a sequence
$db->CreateSequence(cms_db_prefix()."module_album_category_listings_seq");



// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('installed',$this->GetVersion()));
?>
