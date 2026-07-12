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

global $config;
$db = &$this->cms->db;
$dict = NewDataDictionary($db);
// mysql-specific, but ignored by other database
$taboptarray = array('mysql' => 'TYPE=MyISAM');

$current_version = $oldversion;
switch($current_version)
  {
  case '0.0.1':case '0.1.0':case '0.1.1':case '0.1.2': case '0.2.0':
    $path = $config['image_uploads_url'];
    $query = 'UPDATE '. cms_db_prefix().'module_album_pictures SET picture_path=SUBSTR(picture_path, '.(strlen($path)+1).') WHERE LEFT(picture_path, '.strlen($path).')="'.$path.'"';
    $dbresult = $db->Execute($query);
    $query = 'UPDATE '. cms_db_prefix().'module_album_pictures SET thumbnail_path=SUBSTR(thumbnail_path, '.(strlen($path)+1).') WHERE LEFT(thumbnail_path, '.strlen($path).')="'.$path.'"';
    $dbresult = $db->Execute($query);
  }

// Add categories tables if needed
$table = "module_album_categories";
$query = "SHOW TABLES LIKE '".$table."'";
$dbresult = $db->Execute($query);
if($dbresult->RecordCount() == 0)
{
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
}

if (FALSE == $this->table_column_exists($db, cms_db_prefix().'module_album_pictures', 'thumbnail_width'))
{
        $dict = NewDataDictionary($db);
        $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_album_pictures", "thumbnail_width C(20)");
        $dict->ExecuteSQLArray($sqlarray);
}
if (FALSE == $this->table_column_exists($db, cms_db_prefix().'module_album_pictures', 'thumbnail_height'))
{
        $dict = NewDataDictionary($db);
        $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_album_pictures", "thumbnail_height C(20)");
        $dict->ExecuteSQLArray($sqlarray);
}
if (FALSE == $this->table_column_exists($db, cms_db_prefix().'module_album_pictures', 'comment2'))
{
        $dict = NewDataDictionary($db);
        $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_album_pictures", "comment2 X");
        $dict->ExecuteSQLArray($sqlarray);
}
if (FALSE == $this->table_column_exists($db, cms_db_prefix().'module_album_pictures', 'comment3'))
{
        $dict = NewDataDictionary($db);
        $sqlarray = $dict->AddColumnSQL(cms_db_prefix()."module_album_pictures", "comment3 X");
        $dict->ExecuteSQLArray($sqlarray);
}
$db_templatecontent = $this->GetTemplate('recently_updated');
if (TRUE == empty($db_templatecontent))
{
	$this->SetTemplate('recently_updated', $this->GetDefaultAlbumTemplate('recently_updated'));
}
// Add categories template if needed
$db_templatecontent = $this->GetTemplate('categories');
if (TRUE == empty($db_templatecontent))
{
	$this->SetTemplate('categories', $this->GetDefaultAlbumTemplate('categories'));
}
// put mention into the admin log
$this->Audit( 0, $this->Lang('friendlyname'), $this->Lang('upgraded',$this->GetVersion()));

?>