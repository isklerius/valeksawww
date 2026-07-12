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

function externalizer_ExportTemplates(&$mod)
{
  global $gCms;
  $db =& $gCms->GetDb();
  
  $cache_path = $mod->GetPreference('cache_path');
  $stylesheet_extension = $mod->GetPreference('stylesheet_extension');
  $template_extension = $mod->GetPreference('template_extension');
  
  //check that the save path exists and if not, attempt to create it
  if(!file_exists($cache_path))
    if(mkdir($cache_path))
      chmod($cache_path, 0777);
    else {
      $mod->DisplayErrorPage("Unable to find or create cache path: ".$cache_path);
      return false;
    }
  //check that the save path is writable
  elseif(!is_writable($cache_path)) {
    $mod->DisplayErrorPage("Unable to write to cache path: ".$cache_path);
    return false;
  }
  
  //update timestamp on cache dir to 'reset' timeout
  touch($cache_path);
  
  //load all the templates and save them to files
  $to =& $gCms->getTemplateOperations();
  $templates = $to->LoadTemplates();  
  foreach($templates as $template) {
    $fname = $cache_path.'/'.$mod->escapeFilename($template->name).'.'.$template_extension;
    $fp = fopen($fname, 'w');
    //we convert CRLF to LF for unix compatibility
    fwrite($fp, str_replace("\r\n", "\n", $template->content));
    fclose($fp);
    //make sure template files are writable
    chmod($fname, 0666);
    //set the modified date to the template modified date
    touch($fname, $template->modified_date);
  }
  
  //load all the stylesheets and save them to files
  $so =& $gCms->getStylesheetOperations();
  $stylesheets = $so->LoadStylesheets();  
  foreach($stylesheets as $stylesheet) {
    $fname = $cache_path.'/'.$mod->escapeFilename($stylesheet->name).'.'.$stylesheet_extension;
    $fp = fopen($fname, 'w');
    //we convert CRLF to LF for unix compatibility
    fwrite($fp, str_replace("\r\n", "\n", $stylesheet->value));
    fclose($fp);
    //make sure stylesheet files are writable
    chmod($fname, 0666);
    //set the file modified date to the stylesheet modified date
    touch($fname, $stylesheet->modified_date);
  }

  // test for a dummy index.html file
  // and create one if necessary.
  $dummy = $cache_path.'/index.html';
  if( !file_exists($dummy) )
    {
      touch($dummy);
    }

  // load all module templates and save them to files
  $modulenames = array_keys($gCms->modules);
  foreach( $modulenames as $onename )
    {
      $query = 'SELECT * FROM '.cms_db_prefix().'module_templates
                WHERE module_name = ?';
      $alltemplates = $db->GetArray($query,array($onename));
      if( !count($alltemplates) ) continue;

      // Create the directory for this modules templates.
      $dir = $cache_path.'/'.$onename;
      if( !file_exists($dir) )
	{
	  @mkdir($dir);
	  @chmod($dir,0777);
	}
      elseif(!is_writable($dir)) {
	$mod->DisplayErrorPage("Unable to write to directory: ".$dir);
	return false;
      }

      foreach( $alltemplates as $onetemplate )
	{
	  $fname = $dir.'/'.$mod->escapeFilename($onetemplate['template_name']).'.'.
	    $template_extension;

	  $fp = fopen($fname, 'w');
	  fwrite($fp, str_replace("\r\n", "\n", $onetemplate['content']));
	  fclose($fp);
	  chmod($fname, 0666);

	  //set the file modified date to the stylesheet modified date
	  touch($fname, $db->UnixTimeStamp($onetemplate['modified_date']));
	}

      // test for a dummy index.html file
      // and create one if necessary.
      $dummy = $dir.'/index.html';
      if( !file_exists($dummy) )
	{
	  touch($dummy);
	}
    }
}


function externalizer_ImportTemplates(&$mod)
{
  global $gCms;
  $db =& $gCms->GetDb();
    
  $cache_path = $mod->GetPreference('cache_path');
  $timeout = $mod->GetPreference('timeout');
  $stylesheet_extension = $mod->GetPreference('stylesheet_extension');
  $template_extension = $mod->GetPreference('template_extension');
  $most_recent_edit = @filemtime($cache_path);

  //don't raise an error as this could be called from the frontend
  if(!file_exists($cache_path))
    return false;
    
  //load all the templates from the database and update them from the files
  $to =& $gCms->getTemplateOperations();
  $templates = $to->LoadTemplates();
    
  foreach($templates as $key => $template) {
    $fname = $cache_path.'/'.$mod->escapeFilename($template->name).'.'.$template_extension;
    $ftime = @filemtime($fname);
    $most_recent_edit = max($most_recent_edit, $ftime);
      
    //only load the file if it has been modified (existence is implicit)
    //and filesize!=0 
    if($ftime > $template->modified_date && ($fsize = filesize($fname)) != 0) {
      $fp = fopen($fname, 'r');
      $templates[$key]->content = fread($fp, $fsize);
      $templates[$key]->Save();
      fclose($fp);
    }
  }
    
  //load all the stylesheets from the database and update them from the files
  $so =& $gCms->getStylesheetOperations();
  $stylesheets = $so->LoadStylesheets();

  foreach($stylesheets as $key => $stylesheet) {
    $fname = $cache_path.'/'.$mod->escapeFilename($stylesheet->name).'.'.$stylesheet_extension;
    $ftime = @filemtime($fname);
    $most_recent_edit = max($most_recent_edit, $ftime);
      
    //only load the file if it has been modified (existence is implicit)
    if($ftime > @$stylesheet->modified_date && ($fsize = filesize($fname)) != 0) {
      $fp = fopen($fname, 'r');
      $stylesheets[$key]->value = fread($fp, $fsize);
      $stylesheets[$key]->Save();
      fclose($fp);
    }
  }

  // Load module templates from database
  // and compare them with files.
  $modulenames = array_keys($gCms->modules);
  foreach( $modulenames as $onemodulename )
    {
      $query = 'SELECT * FROM '.cms_db_prefix().'module_templates
                WHERE module_name = ?';
      $alltemplates = $db->GetArray($query,array($onemodulename));
      if( !count($alltemplates) ) continue;

      // Create the directory for this modules templates.
      $dir = $cache_path.'/'.$onemodulename;
      foreach( $alltemplates as $onetemplate )
	{
	  $fname = $dir.'/'.$onetemplate['template_name'].'.'.$template_extension;
	  if( !@file_exists($fname) ) continue;

	  $ftime = filemtime($fname);
	  $fsize = filesize($fname);
	  $most_recent_edit = max($most_recent_edit, $ftime);
	  $dbmtime = $db->UnixTimeStamp($onetemplate['modified_date']);
	  $fdbtime = $db->DbTimeStamp($ftime);

	  if( $ftime > $dbmtime && $fsize != 0 )
	    {
	      $fp = fopen($fname,'r');
	      $onetemplate['content'] = fread($fp,$fsize);
	      fclose($fp);

	      $query = 'UPDATE '.cms_db_prefix()."module_templates SET content = ?, modified_date = $fdbtime
                        WHERE module_name = ? AND template_name = ?";  
	      $dbr = $db->Execute($query,
				  array($onetemplate['content'],
					$onemodulename, $onetemplate['template_name']));
	    }
	}
    }

  //turn off dev_mode if timeout is reached
  if($timeout != 0 && time() - $most_recent_edit > $timeout*60) {
    $mod->SetPreference('dev_mode', false);
    $mod->Audit(0, $mod->Lang('friendlyname'), $mod->Lang('dev_mode_timedout'));
  }
}


function externalizer_DeleteTemplateCache(&$mod)
{
  $cache_path = $mod->GetPreference('cache_path');
  recursive_delete($cache_path);
}

# EOF
?>