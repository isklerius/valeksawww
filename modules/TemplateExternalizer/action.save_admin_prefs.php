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
if( !isset($gCms) ) exit;
if( !$this->CheckPermission('Template Externalizer') )
  {
    $this->DisplayErrorPage($this->Lang('accessdenied'));
    return;
  }


$oldmode = $this->GetPreference('dev_mode');
$newmode = $params['dev_mode'];
    
$this->SetPreference('dev_mode', $params['dev_mode']);
$this->SetPreference('timeout', $params['timeout']);
$this->SetPreference('cache_path', $params['cache_path']);
$this->SetPreference('template_extension', $params['template_extension']);
$this->SetPreference('stylesheet_extension', $params['stylesheet_extension']);

$message = $this->Lang('prefsupdated');

if(!$oldmode && $newmode) {
  $this->ExportTemplates();
  $this->Audit(0, $this->Lang('friendlyname'), $this->Lang('dev_mode_enabled'));
  $message .= ' '.$this->Lang('dev_mode_enabled');
 } elseif($oldmode && !$newmode) {
   $this->DeleteTemplateCache();
   $this->Audit(0, $this->Lang('friendlyname'), $this->Lang('dev_mode_disabled'));
   $message .= ' '.$this->Lang('dev_mode_disabled');
 }

$this->Redirect($id, 'defaultadmin', $returnid, array('message' => $message));

# EOF
?>