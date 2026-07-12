<?php
#-------------------------------------------------------------------------
# Module: Album - This module allows you to add photo albums to your website.
# Version: 0.0.1, dam
# Versions: 0.4.x - present, Elijah Lofgren <elijahlofgren@elijahlofgren.com>
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2006 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
# This file originally created by ModuleMaker module, version 0.2
# Copyright (c) 2006 by Samuel Goldstein (sjg@cmsmadesimple.org) 
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
# Or read it online: http://www.gnu.org/licenses/licenses.html#GPL
#
#-------------------------------------------------------------------------

class AlbumAdmin extends Album
{
	function getAlbumsFromIds($category_id, $album_ids, $id, $returnid)
	{
		global $gCms;
		$config = $gCms->config;
		$themeObject = &$gCms->variables['admintheme'];

		$dbalbums = $this->GetAlbums($album_ids,false,$category_id);
		$albums = array();
		foreach ($dbalbums as $dbalbum)
		{
			$onerow = new stdClass();
	
			$onerow->name = $this->CreateLink($id, 'editalbum', $returnid, $dbalbum->name, array('albumid'=>$dbalbum->id));
			$onerow->template = $this->CreateLink($id, 'editalbum', $returnid, $dbalbum->template, array('albumid'=>$dbalbum->id, 'active_tab' => 'properties'));
			$onerow->id = $dbalbum->id;
			if (FALSE == empty($dbalbum->thumbnail))
			{
				$onerow->thumb = '<img src="'.$dbalbum->thumbnail.'" alt="'.$this->Lang('nothumbnail').'"/>';
			}
			else
			{
				$onerow->thumb = $this->Lang('nothumbnail');
			}
			$onerow->deletelink = $this->CreateLink($id, 'deletealbum', $returnid,
								$themeObject->DisplayImage('icons/system/delete.gif', $this->Lang('deletealbum'),'',
											  '','systemicon'),
								array('albumid' => $dbalbum->id), $this->Lang('areyousure'));
			if (count($albums)>0)
			{
				$onerow->uplink = $this->CreateLink($id, 'movealbum', $returnid,
								    $themeObject->DisplayImage('icons/system/arrow-u.gif', lang('up'),'','','systemicon'),
								    array('albumid' => $dbalbum->id, 'direction'=>'up', 'category_id'=>$category_id));
			} else {
				$onerow->uplink = '';
			}
			if (count($albums)<count($dbalbums)-1)
			{
				$onerow->downlink = $this->CreateLink($id, 'movealbum', $returnid,
								      $themeObject->DisplayImage('icons/system/arrow-d.gif', lang('down'),'','',
												 'systemicon'),
								      array('albumid' => $dbalbum->id, 'direction'=>'down', 'category_id'=>$category_id));
			} else {
				$onerow->downlink = '';
			}
		
			$onerow->picturenumber = $this->PictureCount($dbalbum->id);
			
			array_push($albums, $onerow);
		}
		return $albums;
	}
}
?>