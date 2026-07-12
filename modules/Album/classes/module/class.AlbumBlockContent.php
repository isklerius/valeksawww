<?php
#-------------------------------------------------------------------------
# Module: Album - This module allows you to add photo albums to your website.
# Version: 0.0.1, dam
# Version: 0.4.x, Elijah Lofgren <elijahlofgren@elijahlofgren.com>
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

  
class AlbumBlockContent extends CMSModuleBlockContentType {
	function SetProperties()
	{
		$this->mProperties->Add('string', 'albums', '');
		$this->mProperties->Add('string', 'album_template', 'default');
		
		#Turn on preview
		$this->mPreview = true;

		#Turn on caching
		$this->mCachable = false;

	}
	function FriendlyName()
	{
		return 'Album';
	}
	function ModuleName()
	{
		return 'Album';
	}

	function IsDefaultPossible()
	{
		return TRUE;
	}

	function GetTabDefinitions()
	{
		return array('Basic', 'Advanced');
	}
	function TabNames()
	{
		return array(lang('main'), lang('options'));
	}
	
	function EditAsArray($adding = false, $tab = 0, $showadmin = false)
	{
		global $gCms;
		$config = $gCms->config;

		$ret = array();
		switch ($tab)
		{
		case 0:
		  /*
			array_push($ret,array(lang('title').':','<input type="text" name="title" value="'.$this->mName.'">'));
			array_push($ret,array(lang('menutext').':','<input type="text" name="menutext" value="'.$this->mMenuText.'">'));
			array_push($ret,array(lang('parent').':',ContentManager::CreateHierarchyDropdown($this->mId, $this->mParentId)));
			array_push($ret,array(lang('template').':',TemplateOperations::TemplateDropdown('template_id', $this->mTemplateId)));
		  */
			array_push($ret,array($this->Lang('multiplealbumtemplate').':',$this->TemplateDropdown('album_template', $this->GetPropertyValue('album_template'))));
			array_push($ret,array($this->Lang('Albums').':',$this->AlbumsSelect('albums',$this->GetPropertyValue('albums'))));
			break;
		case 1:
		  /*
			array_push($ret,array(lang('pagealias').':','<input type="text" name="alias" value="'.$this->mAlias.'">'));
			
			array_push($ret,array(lang('active').':','<input type="checkbox" name="active"'.($this->mActive ? ' checked="true"':'').'>'));
			array_push($ret,array(lang('showinmenu').':','<input type="checkbox" name="showinmenu"'.($this->mShowInMenu?' checked="true"':'').'>'));
			array_push($ret, array(lang('metadata').':',create_textarea(false, $this->Metadata(), 'metadata', 'pagesmalltextarea', 'metadata', '', '', '80', '6')));
			array_push($ret, array(lang('titleattribute').':','<input type="text" name="titleattribute" maxlength="255" value="'.cms_htmlentities($this->mTitleAttribute).'" />'));
			array_push($ret, array(lang('tabindex').':','<input type="text" name="tabindex" maxlength="10" value="'.cms_htmlentities($this->mTabIndex).'" />'));
			array_push($ret, array(lang('accesskey').':','<input type="text" name="accesskey" maxlength="5" value="'.cms_htmlentities($this->mAccessKey).'" />'));
		  */
			$userops =& $gCms->GetUserOperations();
			if (!$adding && $showadmin)
				array_push($ret, array(lang('owner').':',$userops->GenerateDropdown($this->Owner())));
			if ($adding || $showadmin)
				array_push($ret, $this->ShowAdditionalEditors());
				
		}
				

		return $ret;
	}
	
	function Show()
	{
			global $gCms;
			$variables = &$gCms->variables;

			$params = array();
			$params['albums'] = $this->GetPropertyValue('albums');
			$params['template'] = $this->GetPropertyValue('album_template');
			// $album = $this->GetModuleInstance('Album');
			global $id;
			$params = GetModuleParameters($id);
			global $AlbumCalled;
			
			if (TRUE == empty($params['returnid']))
			  {
			    $newalbum = new Album();
			    
			    //Buffer all this crap spit out by the News module and return it
			    @ob_start();
			    $newalbum->DoAction('default', 'album', $params, $variables['content_id']);
			    $text = @ob_get_contents();
			    @ob_end_clean();
			    return $text;
			  }
			else
			  {
			    return '';
			  }
			# return '{literal}'.$text.'{/literal}';
	}
	function FillParams(&$params)
	{
		global $gCms;
		$config = $gCms->config;

		if (isset($params))
		{
		  /*
			if (isset($params['title']))
				$this->mName = $params['title'];
			if (isset($params['menutext']))
				$this->mMenuText = $params['menutext'];
			if (isset($params['template_id']))
				$this->mTemplateId = $params['template_id'];
			if (isset($params['alias']))
				$this->SetAlias((isset($params['alias']) ? $params['alias'] : ''));
		  */
			/*
			if (isset($params['parent_id']))
			{
				if ($this->mParentId != $params['parent_id'])
				{
					$this->mHierarchy = '';
					$this->mItemOrder = -1;
				}
				$this->mParentId = $params['parent_id'];
			}
			*/
			$this->mParentId = -1;
			$this->mActive = 1;
			
			$this->mShowInMenu = 1;
			
			/*
			if (isset($params['metadata']))
				$this->mMetadata = $params['metadata'];
			if (isset($params['accesskey']))
				$this->mAccessKey = $params['accesskey'];
			if (isset($params['titleattribute']))
				$this->mTitleAttribute = $params['titleattribute'];
			if (isset($params['tabindex']))
				$this->mTabIndex = $params['tabindex'];
			*/
			
			if (isset($params['albums']))
				$this->SetPropertyValue('albums', implode(',',$params['albums']));
			if (isset($params['album_template']))
				$this->SetPropertyValue('album_template', $params['album_template']);
		}
	}
	
	function ValidateData()
	{
		$errors = array();
		/*
		if ($this->mName == '')
		{
			array_push($errors, lang('nofieldgiven',array(lang('title'))));
			$result = false;
		}

		if ($this->mMenuText == '')
		{
			array_push($errors, lang('nofieldgiven',array(lang('menutext'))));
			$result = false;
		}
		
		if ($this->mAlias != $this->mOldAlias)
		{
			$error = @ContentManager::CheckAliasError($this->mAlias, $this->mId);
			if ($error !== FALSE)
			{
				array_push($errors, $error);
				$result = false;
			}
		}

		if ($this->mTemplateId == '')
		{
			array_push($errors, lang('nofieldgiven',array(lang('template'))));
			$result = false;
		}
		*/
		if ($this->GetPropertyValue('album_template') == '')
		{
			array_push($errors, lang('nofieldgiven',array($this->Lang('album_template'))));
			$result = false;
		}

		return (count($errors) > 0?$errors:FALSE);
	}

	function AlbumsSelect($name,$ids)
	{
		global $db;
		
		$query = 'SELECT * FROM '.cms_db_prefix().'module_album_albums ORDER BY album_number';
		$ids_array = explode(',', $ids);
		$dbresult = $db->Execute($query);

		$text = '<select name="'.$name.'[]" size="5" multiple>';
		while ($row = $dbresult->FetchRow())
		{
			$text .= '<option value="'.$row['album_id'].'"';
			if ($ids=='' || in_array($row['album_id'],$ids_array))
				$text .= ' selected="selected"';
			$text .= '>'.$row['album_name'].'</option>';
		}
		$text .='</select>';
		return $text;
	}
	function TemplateDropdown($name, $selected = -1)
	{
		$result = "";
		$newalbum = new Album();
		$alltemplates = $newalbum->ListTemplates();
		
		if (count($alltemplates) > 0)
		{
			$result .= '<select name="'.$name.'"';
			$result .= '>';
			foreach ($alltemplates as $onetemplate)
			{
					$result .= '<option value="'.$onetemplate.'"';
					if ($onetemplate==$selected || ($selected == -1 && $onetemplate=='default'))
						$result .= ' selected="selected"';
					$result .= '>'.$onetemplate.'</option>';
			}
			$result .= '</select>';
		}
		
		return $result;
	}
}