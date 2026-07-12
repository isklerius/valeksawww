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

///////////////////////////////////////////////////////////////////////////
// This module is derived from CGExtensions 
$cgextensions = cms_join_path($gCms->config['root_path'],'modules',
			      'CGExtensions','CGExtensions.module.php');
if( !is_readable( $cgextensions ) )
{
  echo '<h1><font color="red">ERROR: The CGExtensions module could not be found.</font></h1>';
  return;
}
require_once($cgextensions);
///////////////////////////////////////////////////////////////////////////

define('CGCONTENTMAGIC_DTD_VERSION','1.0');

class CGContentUtils extends CGExtensions
{
  var $_dom;
  var $_template_cache;
  var $_default_template;

  /*---------------------------------------------------------
   __construct()
   ---------------------------------------------------------*/
  public function __construct()
  {
    parent::__construct();

    global $CMS_ADMIN_PAGE;
    if( $CMS_ADMIN_PAGE && (version_compare(CMS_VERSION,'1.7') >= 0) )
      {
	$this->RegisterBulkContentFunction($this->Lang('advanced_copy'),'admin_copycontent');
      }
  }

  /*---------------------------------------------------------
   GetName()
   ---------------------------------------------------------*/
  function GetName()
  {
    return 'CGContentUtils';
  }

  /*---------------------------------------------------------
   GetFriendlyName()
   ---------------------------------------------------------*/
  function GetFriendlyName()
  {
    return $this->Lang('friendlyname');
  }

	
  /*---------------------------------------------------------
   GetVersion()
   ---------------------------------------------------------*/
  function GetVersion()
  {
    return '1.2';
  }


  /*---------------------------------------------------------
   GetHelp()
   ---------------------------------------------------------*/
  function GetHelp()
  {
    return $this->Lang('help');
  }


  /*---------------------------------------------------------
   GetAuthor()
   ---------------------------------------------------------*/
  function GetAuthor()
  {
    return 'calguy1000';
  }


  /*---------------------------------------------------------
   GetAuthorEmail()
   ---------------------------------------------------------*/
  function GetAuthorEmail()
  {
    return 'calguy1000@cmsmadesimple.org';
  }


  /*---------------------------------------------------------
   GetChangeLog()
   ---------------------------------------------------------*/
  function GetChangeLog()
  {
    return $this->Lang('changelog');
  }
  
  /*---------------------------------------------------------
   IsPluginModule()
   ---------------------------------------------------------*/
  function IsPluginModule()
  {
    return false;
  }


  /*---------------------------------------------------------
   HasAdmin()
   ---------------------------------------------------------*/
  function HasAdmin()
  {
    return true;
  }


  /*---------------------------------------------------------
   IsAdminOnly()
   ---------------------------------------------------------*/
  function IsAdminOnly()
  {
    return true;
  }


  /*---------------------------------------------------------
   GetAdminSection()
   ---------------------------------------------------------*/
  function GetAdminSection()
  {
    return 'extensions';
  }


  /*---------------------------------------------------------
   GetAdminDescription()
   ---------------------------------------------------------*/
  function GetAdminDescription()
  {
    return $this->Lang('moddescription');
  }


  /*---------------------------------------------------------
   VisibleToAdminUser()
   ---------------------------------------------------------*/
  function VisibleToAdminUser()
  {
    return( $this->CheckPermission('Modify Any Page') ||
	    $this->CheckPermission('Manage All Content') ||
	    $this->CheckPermission('Modify Templates') ||
	    $this->CheckPermission('Modify User-defined Tags') ||
	    $this->CheckPermission('Modify Global Content Blocks') );
  }


  /*---------------------------------------------------------
   GetDependencies()
   ---------------------------------------------------------*/
  function GetDependencies()
  {
    return array('CGExtensions'=>'1.22.1',
		 'JQueryTools'=>'1.0.3');
  }


  /*---------------------------------------------------------
   GetHeaderHTML()
   ---------------------------------------------------------*/
  function GetHeaderHTML()
  {
    $txt = '';
    $obj =& $this->GetModuleInstance('JQueryTools');
    if( is_object($obj) )
      {
$tmpl = <<<EOT
{JQueryTools action='incjs' exclude='form'}
{JQueryTools action='ready'}
EOT;
        $txt = $this->ProcessTemplateFromData($tmpl);
      }
    return $txt;
  }	


  /*---------------------------------------------------------
   MinimumCMSVersion()
   ---------------------------------------------------------*/
  function MinimumCMSVersion()
  {
    return "1.8.2";
  }
	
	
  /*---------------------------------------------------------
   SetParameters()
   ---------------------------------------------------------*/
  function SetParameters()
  {
	// nothing here
  }


  /*---------------------------------------------------------
   InstallPostMessage()
   ---------------------------------------------------------*/
  function InstallPostMessage()
  {
    return $this->Lang('postinstall');
  }


  /*---------------------------------------------------------
   UninstallPostMessage()
   ---------------------------------------------------------*/
  function UninstallPostMessage()
  {
    return $this->Lang('postuninstall');
  }


  /*---------------------------------------------------------
   UninstallPreMessage()
   ---------------------------------------------------------*/
  function UninstallPreMessage()
  {
    return $this->Lang('ask_really_uninstall');
  }	


  /*---------------------------------------------------------
   SuppressAdminOutput()
   ---------------------------------------------------------*/
  function SuppressAdminOutput(&$request)
  {
    if( isset($_REQUEST['mact']) )
      {
	$ary = explode(',', cms_htmlentities($_REQUEST['mact']), 4);
	$module = (isset($ary[0])?$ary[0]:'');
	$id = (isset($ary[1])?$ary[1]:'');
	$action = (isset($ary[2])?$ary[2]:'');

	if( $action == 'do_export' ) return TRUE;
      }

    return FALSE;
  }


  /*---------------------------------------------------------
   _exportContent($start_id,$children)
   ---------------------------------------------------------*/
  function _exportContent($start_id,$children)
  {
    global $gCms;
    $hm =& $gCms->GetHierarchyManager();

    $this->_dom = new DOMDocument("1.0","UTF8");
    $root = $this->_dom->createElement('cms_export');

    $node =& $hm->sureGetNodeByID($start_id);
    $parent_domnode = $this->_exportContentObj($node,$children);

    $root->appendChild($parent_domnode);
    $this->_dom->appendChild($root);
    return $this->_dom->saveXML();
  }


  /*---------------------------------------------------------
   _exportContentObj($content_obj,$children)
   ---------------------------------------------------------*/
  function _exportContentObj(&$node,$children)
  {
    $content_obj =& $node->getContent();    
    $domnode = $this->_createDomContentObj($content_obj);

    if( $node->hasChildren() && $children )
      {
	$tmp = $node->getChildren();
	foreach( $tmp as $child )
	  {
	    $child_domnode = $this->_exportContentObj($child,$children);
	    $domnode->appendChild($child_domnode);
	  }
      }

    return $domnode;
  }


  /*---------------------------------------------------------
   _getDefaultTemplateId()
   ---------------------------------------------------------*/
  function _getDefaultTemplateId()
  {
    if( !$this->_default_template )
      {
	global $gCms;
	$templateops =& $gCms->GetTemplateOperations();
	$this->_default_template = $templateops->LoadDefaultTemplate();
      }
    return $this->_default_template->id;
  }


  /*---------------------------------------------------------
   _getTemplateNameFromId()
   ---------------------------------------------------------*/
  function _getTemplateNameFromId($tplid)
  {
    if( !$this->_template_cache )
      {
	global $gCms;
	$db =& $gCms->GetDb();
	$query = 'SELECT template_id,template_name FROM '.cms_db_prefix().'templates ';
	$tmp = $db->GetArray($query);
	$this->_template_cache = cge_array::to_hash($tmp,'template_id');
      }

    if( isset($this->_template_cache[$tplid]) )
      {
	return $this->_template_cache[$tplid]['template_name'];
      }
    return NULL;
  }


  /*---------------------------------------------------------
   _getTemplateNameFromId()
   ---------------------------------------------------------*/
  function _getTemplateIdFromName($name)
  {
    // force cache to load.
    $this->_getTemplateNameFromId(-1);
    
    foreach( $this->_template_cache as $id => $rec )
      {
	if( $rec['template_name'] == $name ) return $id;
      }

    return NULL;
  }

  
  /*---------------------------------------------------------
   _createDomContentObj()
   ---------------------------------------------------------*/
  function _createDomContentObj(&$content_obj)
  {
    $root = $this->_dom->createElement('cms_content');
    $root->setAttribute('name',$content_obj->Name());

//     $sub = $this->_dom->createElement('name',$content_obj->Name());
//     $root->appendChild($sub);

    $sub = $this->_dom->createElement('type',$content_obj->Type());
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('alias',$content_obj->Alias());
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('template',
				      $this->_getTemplateNameFromId($content_obj->TemplateID()));
    $root->appendChild($sub);

    $cdata = $this->_dom->createCDATAsection($content_obj->MetaData());
    $sub = $this->_dom->createElement('metadata');
    $sub->appendChild($cdata);
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('accesskey',$content_obj->AccessKey());
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('tabindex',$content_obj->TabIndex());
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('menutext',$content_obj->MenuText());
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('active',$content_obj->Active());
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('cachable',$content_obj->Cachable());
    $root->appendChild($sub);

    $sub = $this->_dom->createElement('showinmenu',$content_obj->ShowInMenu());
    $root->appendChild($sub);

    $props = $content_obj->Properties();
    foreach( $props->mPropertyNames as $name )
      {
	if( !isset($props->mPropertyValues[$name]) ) continue;
	if( !$props->mPropertyValues[$name] ) continue;

	$sub = $this->_dom->createElement('property');
	$sub->setAttribute('name',$name);
	$sub->setAttribute('type',$props->mPropertyTypes[$name]);
	$cdata = $this->_dom->createCDATAsection($props->mPropertyValues[$name]);
	$sub->appendChild($cdata);

// 	$sub2 = $this->_dom->createElement('propname',$name);
// 	$sub->appendChild($sub2);

// 	$sub2 = $this->_dom->createElement('proptype',$props->mPropertyTypes[$name]);
// 	$sub->appendChild($sub2);

// 	$sub2 = $this->_dom->createElement('propvalue');
// 	$sub2->appendChild($cdata);

	$root->appendChild($sub);
      }

    return $root;
  }


  function _get_childnode_value(&$parent,$nodename)
  {
    $children = $parent->childNodes;
    foreach( $children as $childnode )
      {
	if( $childnode->nodeName == $nodename )
	  {
	    return $childnode->nodeValue;
	  }
      }
    return NULL;
  }


  function _get_childnode(&$parent,$nodename)
  {
    $children = $parent->childNodes;
    foreach( $children as $childnode )
      {
	if( $childnode->nodeName == $nodename )
	  {
	    return $childnode;
	  }
      }
    return NULL;
  }


  function _get_node_attribute(&$node,$attrname)
  {
    $attr = $node->attributes->getNamedItem($attrname);
    if( $attr ) return $attr->nodeValue;
    return NULL;
  }


  /*---------------------------------------------------------
   _scanContent()
   ---------------------------------------------------------*/
  function _scanContent(&$node,$parent_id = 0)
  {
    while( $node != NULL )
      {
	if( $node->nodeName != 'cms_content' ) break;
      
	$content_obj =& $this->_extractDomContentObj($node);
	if( $content_obj )
	  {
	    echo "DEBGUG: FOUND ".$content_obj->Name().' with parent '.$parent_id.'<br/>';
	    //see if there are more.
	    scan_content($node->firstChild,$parent_id++);
	  }
      
	// go to the next
	$node = $node->nextSibling;
      }
  }


  /*---------------------------------------------------------
   _importContent()
   ---------------------------------------------------------*/
  function _importContent(&$node,$parent_id)
  {
    while( $node != NULL )
      {
	if( $node->nodeName == 'cms_content' )
	  {
	    $content_obj =& $this->_extractDomContentObj($node);
	    if( $content_obj )
	      {
		//save it
		$content_obj->SetParentId($parent_id);
		$content_obj->SetOwner(get_userid());
		$content_obj->Save();
		$new_parent_id = $content_obj->Id();
		echo "DEBGUG: Added ".$content_obj->Name().' with id '.$parent_id.'<br/>';
		//see if there are more.
		$this->_importContent($node->firstChild,$new_parent_id);
	      }
	  }
      
	// go to the next
	$node = $node->nextSibling;
      }
  }


  /*---------------------------------------------------------
   _extractDomContentObj()
   ---------------------------------------------------------*/
  function &_extractDomContentObj(&$node)
    {
      /////////////////////////////////////////////////////////////////
      global $gCms;
      $contentops =& $gCms->getContentOperations();

      // a. get the content type
      $contenttype = $this->_get_childnode_value($node,'type');

      // b. create the new content object for filling.
      $content_obj =& $contentops->CreateNewContent($contenttype);
      if( !$content_obj ) return NULL;

      $content_obj->SetName($this->_get_node_attribute($node,'name'));
      $content_obj->SetMenuText($this->_get_childnode_value($node,'menutext'));
      $content_obj->SetActive($this->_get_childnode_value($node,'active'));
      $content_obj->SetAccessKey($this->_get_childnode_value($node,'accesskey'));
      $content_obj->SetTabIndex($this->_get_childnode_value($node,'tabindex'));
      $content_obj->SetMetaData($this->_get_childnode_value($node,'metadata'));
      $content_obj->SetCachable($this->_get_childnode_value($node,'cachable'));
      $content_obj->SetShowInMenu($this->_get_childnode_value($node,'showinmenu'));

      $alias = $this->_get_childnode_value($node,'alias');
      $tmp = $contentops->CheckAliasError($alias);
      if( $tmp )
	{
	  $alias = '';
	}
      $content_obj->SetAlias($alias);
      
      // todo, handle null.
      $tpl_id = $this->_getTemplateIdFromName($this->_get_childnode_value($node,'template'));
      if( !$tpl_id )
	{
	  $tpl_id = $this->_getDefaultTemplateId();
	}
      $content_obj->SetTemplateId($tpl_id);
  
      // now to get the properties.
      $children = $node->childNodes;
      foreach( $children as $childnode )
	{
	  if( $childnode->nodeName != 'property' ) continue;
	  $propname = $this->_get_node_attribute($childnode,'name');
	  $proptype = $this->_get_node_attribute($childnode,'type');
	  $propval  = $childnode->nodeValue;
      
	  $content_obj->setPropertyValue($propname,$propval);
	}

      return $content_obj;
    }


  function HasCapability($capability,$params = array())
  {
    switch( $capability )
      {
      case 'contentblocks':
	return TRUE;
      case 'bulkcontentoption':
	return TRUE;
      default:
	return FALSE;
      }
  }
	
		
  function GetContentBlockInput($blockName,$value,$params,$adding = false)
  {
    $gCms = cmsms();
    $db = $gCms->GetDb();
    $config = $gCms->GetConfig();

    if( empty($blockName) ) return FALSE;
    if( !isset($params['name']) ) return FALSE;
    $name = trim($params['name']);
    $query = 'SELECT * FROM '.cms_db_prefix().'module_cgcontentutils WHERE name = ?';
    $row = $db->GetRow($query,array($name));
    if( !$row ) return FALSE;
    $row['attribs'] = unserialize($row['attribs']);

    $txt = '';
    switch( $row['type'] )
      {
      case 'textinput':
	$tmp = '<input type="text" name="%s" size="%d" maxlength="%d" value="%s"/>';
	$txt = sprintf($tmp,$blockName,$row['attribs']['length'],$row['attribs']['maxlength'],
		       ($adding)?$row['value']:$value);
	break;

      case 'textarea':
	$tmp = '<textarea name="%s" rows="%d" cols="%d">%s</textarea>';
	$txt = sprintf($tmp,$blockName,$row['attribs']['rows'],$row['attribs']['cols'],
		       ($adding)?$row['value']:$value);
	break;

      case 'pageselector':
	$contentops = $gCms->GetContentOperations();
	if( $value == '' ) $value = $row['value'];
	$txt = $contentops->CreateHierarchyDropdown('',$value,$blockName,1,1);
	break;

      case 'dropdown':
	{
	  // get the options
	  if( $value == '' ) $value = $row['value'];
	  $tmp = explode("\n",$row['attribs']['options']);
	  $opts = array();
	  for( $i = 0; $i < count($tmp); $i++ )
	    {
	      if(empty($tmp[$i])) continue;
	      $tmp2 = explode('|',trim($tmp[$i]),2);
	      if( is_array($tmp2) && count($tmp2) == 2 )
		{
		  $opts[$tmp2[0]] = $tmp2[1];
		}
	      else
		{
		  $opts[$tmp2[0]] = $tmp2[0];
		}
	    }

	  // build the field.
	  $txt = $this->CreateInputDropdown('',$blockName,$opts,-1,$value);
	}
	break;

      case 'checkbox':
	{
	  if( $value == '' ) $value = $row['value'];
	  $txt = $this->CreateInputCheckbox('',$blockName,$row['attribs']['value'],$value);
	}
	break;

      case 'radiobuttons':
	{
	  // get the options.
	  if( $value == '' ) $value = $row['value'];
	  $tmp = explode("\n",$row['attribs']['options']);
	  $opts = array();
	  for( $i = 0; $i < count($tmp); $i++ )
	    {
	      if(empty($tmp[$i])) continue;
	      $tmp2 = explode('|',trim($tmp[$i]),2);
	      if( is_array($tmp2) && count($tmp2) == 2 )
		{
		  $opts[$tmp2[0]] = $tmp2[1];
		}
	      else
		{
		  $opts[$tmp2[0]] = $tmp2[0];
		}
	    }

	  // build the field.
	  $txt = $this->CreateInputRadioGroup('',$blockName,$opts,$value,'','<br/>');
	}
	break;

      case 'file_selector':
	{
	  // 1.  Get the directory contents
	  $dir = cms_join_path($config['uploads_path'],$row['attribs']['dir']);
	  $filetypes = $row['attribs']['filetypes'];
	  if( $filetypes != '' )
	    {
	      $filetypes = explode(',',$filetypes);
	      for( $i = 0; $i < count($filetypes); $i++ )
		{
		  $filetypes[$i] = '*.'.$filetypes[$i];
		}
	    }
	  $excludes = $row['attribs']['excludeprefix'];
	  if( $excludes != '' )
	    {
	      $excludes = explode(',',$excludes);
	      for( $i = 0; $i < count($excludes); $i++ )
		{
		  $excludes[$i] = $excludes[$i].'*';
		}
	    }
	  $fl = cge_dir::recursive_glob($dir,$filetypes,'FILES',$excludes,
					$row['attribs']['recurse']);
	  
	  // 2.  Remove prefix
	  for( $i = 0; $i < count($fl); $i++ )
	    {
	      $fl[$i] = str_replace($dir,'',$fl[$i]);
	    }

	  // 2.  Sort
	  if( is_array($fl) && $row['attribs']['sortfiles'] )
	    {
	      sort($fl);
	    }

	  $opts = array();
	  $url_prefix = $config['uploads_url'].$row['attribs']['dir'].'/';
	  for( $i = 0; $i < count($fl); $i++ )
	    {
	      $opts[$fl[$i]] = $url_prefix.$fl[$i];
	    }
	  $txt = $this->CreateInputDropdown('',$blockName,$opts,-1,$value);
	}
	break;
      }

    return $txt;
  }


  function GetContentBlockValue($blockName,$blockParams,$inputParams)
  {
    if( isset($inputParams[$blockName]) )
      {
	return $inputParams[$blockName];
      }
  }

  function ValidateContentBlockValue($blockName,$value,$blockparams)
  {
    global $gCms;
    $db =& $gCms->GetDb();

    if( empty($blockName) ) return FALSE;
    if( !isset($params['name']) ) return FALSE;
    $name = trim($params['name']);
    $query = 'SELECT * FROM '.cms_db_prefix().'module_cgcontentutils WHERE name = ?';
    $row = $db->GetRow($query,array($name));
    if( !$row ) return FALSE;
    $row['attribs'] = unserialize($row['attribs']);

    if( isset($blockParams['required']) && $blockParams['required'] && empty($value) )
      {
	echo lang('nofieldgiven',array($blockName));
      }
  }

  function GetBulkContentOptions($userid)
  {
    $result = array();
    if( $this->CheckPermission('Manage All Content') )
      {
	$result['copy'] = $this->Lang('copy');
      }

    if( !count($result) ) return FALSE;
    return $result;
  }

} // class

?>
