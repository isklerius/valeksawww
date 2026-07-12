<?php

#-------------------------------------------------------------------------
# TemplateExternalizer - edit templates & stylesheets externally
#-------------------------------------------------------------------------
# CMS - CMS Made Simple is (c) 2005 by Ted Kulp (wishy@cmsmadesimple.org)
# This project's homepage is: http://www.cmsmadesimple.org
#-------------------------------------------------------------------------
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
#-------------------------------------------------------------------------

class TemplateExternalizer extends CMSModule
{
  var $_tools_loaded;

  //module constructor
  function TemplateExternalizer()
  {
    //call parent constructor
    $this->CMSModule();

    // initialization
    $this->_tools_loaded = false;

    //import the templates
    if($this->GetPreference("dev_mode"))
      {
	$this->ImportTemplates();
      }
  }

  function LazyLoadTools()
  {
    if( $this->_tools_loaded == false )
      {
	require_once(dirname(__FILE__).'/functions.externalizer.php');
	$this->_tools_loaded = true;
      }
  }

  function GetName()
  {
    return 'TemplateExternalizer';
  }

  function GetFriendlyName()
  {
    return $this->Lang('friendlyname');
  }

  function GetVersion()
  {
    return '1.2';
  }

  function GetHelp()
  {
    return $this->Lang('help');
  }

  function GetAuthor()
  {
    return 'tamlyn';
  }

  function GetAuthorEmail()
  {
    return 'tam@zenology.co.uk';
  }

  function GetChangeLog()
  {
    return $this->Lang('changelog');
  }

  function IsPluginModule()
  {
    return false;
  }

  function HasAdmin()
  {
    return true;
  }

  function GetAdminSection()
  {
    return 'layout';
  }


  function GetAdminDescription()
  {
    return $this->Lang('moddescription');
  }


  function VisibleToAdminUser()
  {
    return $this->CheckPermission('Template Externalizer');
  }

  function MinimumCMSVersion()
  {
    return "1.4.1";
  }


  function InstallPostMessage()
  {
    return $this->Lang('postinstall');
  }

  /**
   * Export any newly created templates if dev_mode is on
   */  
  function AddTemplatePost(&$template) {
    if($this->GetPreference("dev_mode"))
      $this->ExportTemplates();
  }
  
  /**
   * Export the changes to templates if dev_mode is on
   */  
  function EditTemplatePost(&$template) {
    if($this->GetPreference("dev_mode"))
      $this->ExportTemplates();
  }


  function DisplayErrorPage($id, &$params, $returnid, $message='')
  {
    $this->smarty->assign('title_error', $this->Lang('error'));
    if ($message != '')
      $this->smarty->assign_by_ref('message', $message);

    // Display the populated template
    echo $this->ProcessTemplate('error.tpl');
  }

  
  function escapeFilename($fname)
  {
    return strtr($fname, ":/?\\", "----");
  }


  /**
   * Export to files all the templates and stylesheets found in the database
   */
  function ExportTemplates()
  {
    $this->LazyLoadTools();
    return externalizer_ExportTemplates($this);
  }

  
  /**
   * Import from files all the templates and stylesheets found in the database
   */
  function ImportTemplates()
  {
    $this->LazyLoadTools();
    return externalizer_ImportTemplates($this);
  }

  
  /**
   * Delete all files in the cache_path directory
   */
  function DeleteTemplateCache()
  {
    $this->LazyLoadTools();
    return externalizer_DeleteTemplateCache($this);
  }
  
}

?>
