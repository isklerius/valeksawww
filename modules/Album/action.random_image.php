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

# Author of Random Image:  Frank Prins <webmaster@frank-fem.com>

global $gCms;
global $showedRandomArray;
$config = &$gCms->GetConfig();
$db = $this->GetDb();

# Check the contents of $GLOBALS['showedRandomArray'];
  $output .= "\n<!-- show the contents of the global array -->\n";
	if (isset($GLOBALS['showedRandomArray'])) {
		foreach ($GLOBALS['showedRandomArray'] as $elem) {
			$output .=  "<!--" . $elem . "-->\n";  
		}
	}
  $output .= "<!-- end of global array -->\n";

$album_page_id = $this->GetPreference('defaultalbumpage','');
// Get page content of the page from which Album is being called.
$q = "SELECT * FROM ".cms_db_prefix()."content WHERE content_id='".$album_page_id."'";
$dbresult = $db->Execute( $q );
if (!$dbresult)
  {
    echo 'DB error: '. $db->ErrorMsg()."<br/>";
  }
 else
  {
     $call_page = $dbresult->FetchRow();
     $hierarchy_path = $call_page['hierarchy_path']; // TODO Move this to be a pref that is overwriddable by a param.
  }

  if(empty($params['number']))
    {
      $number = 1;
    }
  else
    {
      $number = $params['number'];
    }

# Check if the user specified a different main Album folder, else use default:
  if (isset($params['imagesurl'])) {
    $imagesurl = $params['root_directory'];
  } else {
    $imagesurl = $config['root_url']."/uploads/images";
  }
	# Check if the user has specified albums to show from, if not, all albums will be used:
	if (isset($params['albums']))
  {
    #$albums = $params['albums'];
    $albums = strtr($params['albums'], ";-# ", ",,,,");
    $specificalbums = True;

  }
/*
	# Check if user has specified a border around the thumbnail
	if (isset($params['border']))
	{
	  $border = $params['border'];
	} else {
	  $border = "0px";
	}
	# Check if user want the picture title to be printed
	if (isset($params['picturename']))
	{
	  $picturename = $params['picturename'];
	} else {
		$picturename = False;
	}
*/
	
	# no lets get going, first get the number of rows in the database for the specified albums:
	if (FALSE == empty($specificalbums)) {
	  $qry = "SELECT * FROM ".cms_db_prefix()."module_album_pictures WHERE picture_album_id IN (".$albums.")";
	} else {
	  $qry = "SELECT * FROM ".cms_db_prefix()."module_album_pictures";
	}
	$dbresult = $db->Execute($qry);
	if( !$dbresult )
	{
	  echo 'DB error: '. $db->ErrorMsg()."<br/>";
	}
	$numrows = $dbresult->RecordCount();
	# ok, now we have the number of rows, lets create a random number in between zero and the found number of rows:

for ($i = 0; $i < $number; $i++)
{
	# check if the image returned is unique:
        $key = 1;
	$tries = 0;
        while (strlen($key) > 0 && $key >= 0 && $tries < 100) {
		# ok, now we have the number of rows, lets create a random number in between zero and the found number of rows:
		$randomnum = rand(1, $numrows);
		# and move the recordpointer to the random choosen row: (minus 1, Move() starts at zero)
		$dbresult->Move($randomnum -1);
		$randomrow = $dbresult->FetchRow();
		if (isset($GLOBALS['showedRandomArray'])) {
			$key = array_search($randomrow['thumbnail_path'],$GLOBALS['showedRandomArray'] );
		}
		// Only try up to 100 times to prevent possible endless loop
		$tries++;
        }
	// $row = $dbresult->FetchRow();
	// print_r($row);
	// echo 'end';
	// Add to global showedRandomArray to prevent it from being shown again
  	$GLOBALS['showedRandomArray'][] = $randomrow['thumbnail_path'];
	$picture=$this->row2picture_class($randomrow);
	$this->setThumbDimensions($randomrow, $picture);
	$albumid = $randomrow['picture_album_id'];
	$picture->link =   $this->CreateLink($id, 'default', $returnid, '', array('albumid'=>$albumid,'pictureid'=>$randomrow['picture_id']), '', true, '', '', '', $hierarchy_path.'/album-'.$albumid.'/'.$randomrow['picture_id'].'/'.$returnid);

// $this->CreateLink($id, 'default', $album_page_id, '', array('albumid'=>$row['picture_album_id'],'pictureid'=>$row['picture_id']), '', true, '', '', '', $hierarchy_path.'/album-'.$row['picture_album_id'].'/'.$row['picture_id'].'/'.$album_page_id);
	$pictures[] = $picture;
}


$this->smarty->assign_by_ref('pictures', $pictures);
// $this->smarty->assign('picturenumber', 10);
$db_templatecontent = $this->GetTemplate('random_image');
if (FALSE == empty($db_templatecontent))
{
	$output = $this->ProcessTemplateFromDatabase('random_image');
}
else
{
	$output = $this->ProcessTemplate('db/random_image.tpl');
}


    # Check the contents of $GLOBALS['showedRandomArray'];
    $output .= "\n<!-- show the contents of the global array -->\n";
    foreach ($GLOBALS['showedRandomArray'] as $elem) {
	  $output .= "<!--" . $elem . "-->\n";  
    }
    $output .= "<!-- end of global array -->\n";

echo $output;



/*

	# show the details:
	if ($picturename == "True") {
	  echo "<div align=\"center\"><p>".$randomrow['picture_name']."</p><img style=\"border: "
	         .$border." solid black;\" src=\"".$imagesurl.$randomrow['thumbnail_path']."\"  alt=\""
	         .$randomrow['picture_name']."\"></div>";
	} else {
		echo "<div align=\"center\"><img style=\"border: ".$border." solid black;\" src=\""
		       .$imagesurl.$randomrow['thumbnail_path']."\" alt=\"".$randomrow['picture_name']."\"><div align=\"center\">";
	}
*/
?>