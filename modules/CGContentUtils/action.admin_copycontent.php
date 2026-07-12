<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGContentUtils (c) 2009 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide various additional utilities
#  for dealing with content pages.
#
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#
#-------------------------------------------------------------------------
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 2 of the License, or
# (at your option) any later version.
#
# However, as a special exception to the GPL, this software is distributed
# as an addon module to CMS Made Simple.  You may not use this software
# in any Non GPL version of CMS Made simple, or in any version of CMS
# Made simple that does not indicate clearly and obviously in its admin 
# section that the site was built with CMS Made simple.
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
#END_LICENSE
if( !isset($gCms) ) exit();
if( !$this->CheckPermission('Manage All Content') )
  {
    $this->RedirectToAdmin('listcontent.php',
			  array('error'=>$this->Lang('error_permission_denied')));
  }
if( !isset($params['contentlist']) )
  {
    $this->RedirectToAdmin('listcontent.php',
			  array('error'=>$this->Lang('error_nocontentselected')));
  }

//
// initialize
//
$templates = array();
$contents = array();
$newdata = array();
$addblocks = array();
$contentops =& $gCms->GetContentOperations();
$templateops =& $gCms->GetTemplateOperations();
$copiedcontent = array();


//
// setup
//
if( isset($params['cancel']) )
  {
    $this->RedirectToAdmin('listcontent.php');
  }

//
// get the data
//
$contentlist = explode(',',$params['contentlist']);
foreach( $contentlist as $oneid )
{
  // get the content object for this page.
  $content =& $contentops->LoadContentFromId($oneid,true);
  $contents[$oneid] = $content;
	$newdata[$oneid] = array();

	// get a proposed new alias for this content block
	{
		$num = 2;
		$newalias = $content->Alias().'_'.$num;
		while ($contentops->CheckAliasError($newalias) !== FALSE)
		{
			$num++;
			$newalias = $content->Alias().'_'.$num;
		}
		$newdata[$oneid]['new_alias'] = $newalias;
	}

  // see if we have this template
  if( !isset($templates[$content->TemplateId()]) )
    {
      // if not, load it too.
      $template =& $templateops->LoadTemplateById($content->TemplateId());
      $templates[$content->TemplateId()] = $template;
    }
}

if (!function_exists('sort_by_hierarchy'))
{
	function sort_by_hierarchy($a, $b)
	{
		if (!is_subclass_of($a, 'ContentBase'))
			return 0;

		if (!is_subclass_of($b, 'ContentBase'))
			return 0;

		return strcmp($a->mHierarchy, $b->mHierarchy);
		//return strcmp($b->mHierarchy, $a->mHierarchy);
	}
}

uasort($contents, 'sort_by_hierarchy');

if (!function_exists('parent_in_list'))
{
	function parent_in_list($list, $child)
	{
		if (!is_subclass_of($child, 'ContentBase'))
			return false;

		foreach ($list as $id => $obj)
		{
			if ($obj->mId == $child->mParentId)
			{
				return true;
			}
		}
		
		return false;
	}
}

$parent_dropdowns = array();

// now parse each template object... and see if the content blocks have the promptoncopy attribute
// and if it's valid.
foreach( $contents as $content_id => &$obj )
{
  if (parent_in_list($contents, $obj))
	{
		$result = $contentops->CreateHierarchyDropdown('', '', "{$id}new_parent_id[{$content_id}]", 1, 0, 0, true);
		$result = str_replace('<option value="-1">none</option>', '<option value="0">Preserve Hierarchy</option><option value="-1">None</option>', $result);
		$parent_dropdowns[$content_id] = $result;
	}
	else
	{
		$result = $contentops->CreateHierarchyDropdown('', $obj->mParentId, "{$id}new_parent_id[{$content_id}]", 1, 0, 0, true);
		$result = str_replace('<option value="-1">none</option>', '<option value="-1">None</option>', $result);
		$parent_dropdowns[$content_id] = $result;
	}
	
  if( !is_a($obj,'Content') ) continue;

  $blocks = $obj->get_content_blocks();
  if( !$blocks || !is_array($blocks) ) continue;

  foreach( $blocks as $blockName => $blockInfo )
    {
      if( !isset($blockInfo['params']['promptoncopy']) || !$blockInfo['params']['promptoncopy'] ) continue;

      // found a promptoncopy block
      if( !isset($addblocks[$content_id]) )
	{
	  $addblocks[$content_id] = array();
	}

      $value = $obj->GetPropertyValue($blockInfo['id']);
      $blockInfo['inputname'] = "{$id}block_{$content_id}_{$blockName}";
      $fld = $obj->display_content_block($blockName,$blockInfo,$value,true);
      if( $fld )
	{
	  $blockInfo['fld_label'] = $fld[0];
	  $blockInfo['fld_input'] = $fld[1];
	  $addblocks[$content_id][$blockName] = $blockInfo;
	}
    }
}

$mapped_ids = array();
//
// handle form submit
//
if( isset($params['submit']) )
  {
    //
    // validate form contents
    //
    $error = '';
    /*
    if( !isset($params['parent_id']) )
      {
	$error = $this->Lang('error_missing_param');
      }
      */

    if( empty($error) )
      {
	// check out the names.
	foreach($params['new_name'] as $cid => $value )
	  {
	    $value = trim($value);
	    if( empty($value) )
	      {
		$error = $this->Lang('error_copycontent_invalid_name',$cid);
		break;
	      }
	  }
      }

    if( empty($error) )
      {
	// check out the menutext.
	foreach($params['new_menutext'] as $cid => $value )
	  {
	    $value = trim($value);
	    if( empty($value) )
	      {
		$error = $this->Lang('error_copycontent_invalid_menutext',$cid);
		break;
	      }
	  }
      }

    if( empty($error) )
      {
	// check out the aliases.
	foreach($params['new_alias'] as $cid => $value )
	  {
	    $value = trim($value);
	    if( !empty($value) ) // empty aliases are okay (we'll auto generate them)
	      {
		$tmp = $contentops->CheckAliasError($value);
		if( $tmp ) 
		  {
		    $error = $tmp;
		    break;
		  }
	      }
	  }
      }
    
    if( empty($error) )
      {
	// validate the blocks and collect values
	foreach($params as $key => $value) 
	  {
	    if( !startswith($key,'block_') ) continue;

	    $tmp = explode('_',$key,3);
	    $content_id = $tmp[1];
	    $blockname = $tmp[2];
	    if( !isset($addblocks[$content_id][$blockname]) )
	      {
		continue;
	      }

	    // found the block... now we validate it.
	    // todo.

	    // and store the value
	    $addblocks[$content_id][$blockname]['value'] = $value;	    
	  }
      }

    if( empty($error) )
      {
	// done validation... now start copying content objects.
	foreach( $contents as $content_id => $source )
	  {
	    $dest = clone($source);

	    $dest->SetId(-1); // force new object
	    $dest->SetItemOrder(-1);
	    $dest->SetOldItemOrder(-1);
	    $dest->mOldAlias = '';

	    $dest->SetAlias($params['new_alias'][$content_id]);
	    $dest->SetName($params['new_name'][$content_id]);
			if ($params['new_parent_id'][$content_id] != 0) //We'll set it later...  scout's honor
			{
				$dest->SetParentId($params['new_parent_id'][$content_id]);
				$dest->SetOldParentId($params['new_parent_id'][$content_id]);
			}
	    $dest->SetMenuText($params['new_menutext'][$content_id]);
	    $dest->SetDefaultContent(0);
	    $dest->SetOwner(get_userid());
	    $dest->SetLastModifiedBy(get_userid());

	    // set properties
		if (isset($addblocks[$content_id]))
		{
	    foreach($addblocks[$content_id] as $blockname => $blockinfo )
	      {
		if( !isset($blockinfo['value']) ) continue;
		$dest->SetPropertyValue($blockname,$blockinfo['value']);
	      }
		}

	    $res = $dest->ValidateData();
	    if( $res !== FALSE )
	      {
		$erro = $res;
		break;
	      }
	    $copiedcontent[$content_id] = $dest;
	  }
      }

    if( empty($error) && (count($copiedcontent) > 0) )
      {
	// have array of copied content objects
	// now ready to save them.
	foreach( $copiedcontent as $key => &$dest )
	  {
			if ($params['new_parent_id'][$key] == '0')
			{
				$old_id = $dest->ParentId();
				//var_dump('new id', $key, $old_id);
				$dest->SetParentId($mapped_ids[$old_id]);
				$dest->SetOldParentId($mapped_ids[$old_id]);
			}
	    $dest->Save();
			$mapped_ids[$key] = $dest->mId;
	  }
	$contentops->SetAllHierarchyPositions();
	
	// something for the audit log
	audit('','','Advanced Copy of Content');

	// and redirect
	$this->RedirectToAdmin('listcontent.php',
			       array('message'=>'bulk_success'));
      }

    echo $this->ShowErrors($error);
  }

//
// build our form
//
$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_copycontent','',$params));
$smarty->assign('formend',$this->CreateFormEnd());
$smarty->assign('prompt_parent',lang('parent'));
$smarty->assign('parent_dropdown',$contentops->CreateHierarchyDropdown('','',$id.'parent_id', 1, 0, 0, true));
$smarty->assign('parent_dropdowns', $parent_dropdowns);
$smarty->assign('contents',$contents);
$smarty->assign('addblocks',$addblocks);
$smarty->assign('newdata', $newdata);



//
// process the template
//
echo $this->ProcessTemplate('admin_copycontent.tpl');

#
# EOF
#
?>