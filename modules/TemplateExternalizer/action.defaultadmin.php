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

$smarty->assign('startform',
		$this->CreateFormStart($id, 'save_admin_prefs', $returnid));
$smarty->assign('endform', $this->CreateFormEnd());
$smarty->assign('submit',
		$this->CreateInputSubmit($id, 'submit', 
					 $this->Lang('submit')));

$smarty->assign('title_dev_mode', $this->Lang('title_dev_mode'));
$smarty->assign('title_timeout', $this->Lang('title_timeout'));
$smarty->assign('title_cache_path', $this->Lang('title_cache_path'));
$smarty->assign('title_template_extension', 
		$this->Lang('title_template_extension'));
$smarty->assign('title_stylesheet_extension', 
		$this->Lang('title_stylesheet_extension'));

$cache_path = $this->GetPreference('cache_path');
if( @file_exists($cache_path) )
  {
    $smarty->assign('info_devmode_on',$this->Lang('dev_mode_enabled'));
  }

$smarty->assign('input_dev_mode', 
      $this->CreateInputRadioGroup($id, 'dev_mode', 
				   array($this->Lang('off').'&nbsp;'=>0, 
					 $this->Lang('on').'&nbsp;'=>1), 
				   $this->GetPreference('dev_mode', '1')));
$smarty->assign('input_timeout', 
		$this->CreateInputText($id, 'timeout',
				       $this->GetPreference('timeout')).' '.
		$this->Lang('title_timeout_units'));

$smarty->assign('input_cache_path', 
		$this->CreateInputText($id, 'cache_path',
				       $this->GetPreference('cache_path'), 40));

$smarty->assign('input_template_extension',
		$this->CreateInputText($id, 'template_extension',
				       $this->GetPreference('template_extension')));

$smarty->assign('input_stylesheet_extension', 
		$this->CreateInputText($id, 'stylesheet_extension',
				       $this->GetPreference('stylesheet_extension')));

// Display the populated template
echo $this->ProcessTemplate('adminprefs.tpl');

# EOF
?>