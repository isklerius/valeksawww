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
if (!isset($gCms)) exit;

//
// initialization
//
$this->SetCurrentTab('blocks');
$blockid = '';
$data = array();
$data['name'] = '';
$data['prompt'] = '';
$data['type'] = 'textinput';
$data['value'] = '';
$data['attribs'] = array();
$data['attribs']['length'] = '80';
$data['attribs']['maxlength'] = '255';
$data['attribs']['rows'] = '8';
$data['attribs']['cols'] = '50';
$data['attribs']['options'] = '';
$data['attribs']['value'] = 1;

//
// setup
//
if( isset($params['blockid']) )
  {
    $blockid = (int)$params['blockid'];
    $query = 'SELECT * FROM '.cms_db_prefix().'module_cgcontentutils
               WHERE id = ?';
    $row = $db->GetRow($query,array($blockid));
    if( $row )
      {
	$row['attribs'] = unserialize($row['attribs']);
	$data = $row;
      }
  }

//
// process form data
//
if( isset($params['cancel']) )
  {
    $this->RedirectToTab($id);
  }
else if( isset($params['submit']) )
  {
    $data['name'] = munge_string_to_url(trim($params['name']));
    $data['prompt'] = trim($params['prompt']);
    $data['type'] = $params['type'];
    $data['value'] = trim($params['dfltvalue']);

    $attribs = array();
    switch( $data['type'] )
      {
      case 'textinput':
	$attribs['length'] = (int)$params['length'];
	$attribs['maxlength'] = (int)$params['maxlength'];
	break;

      case 'textarea':
	$attribs['rows'] = (int)$params['rows'];
	$attribs['cols'] = (int)$params['cols'];
	break;

      case 'dropdown':
	$attribs['options'] = trim($params['options']);
	break;

      case 'checkbox':
	$attribs['value'] = trim($params['value']);
	break;

      case 'radiobuttons':
	$attribs['options'] = trim($params['radiooptions']);
	break;

      case 'file_selector':
	if( (int)$params['directory'] == 0 || $params['directory'] == '0' )
	  {
	    $params['directory'] = '';
	  }
	$attribs['dir'] = trim($params['directory']);
	$attribs['excludeprefix'] = trim($params['excludeprefix']);
	$attribs['filetypes'] = trim($params['filetypes']);
	$attribs['recurse'] = (int)$params['recurse'];
	$attribs['sortfiles'] = (int)$params['sortfiles'];
	break;
      }
    $data['attribs'] = serialize($attribs);

    // and store it.
    $now = $db->DbTimeStamp(time());
    if( $blockid != '' )
      {
	$query = 'SELECT id FROM '.cms_db_prefix().'module_cgcontentutils
                   WHERE name = ? AND id != ?';
	$tmp = $db->GetOne($query,array($data['name'],$blockid));
	if( $tmp )
	  {
	    echo $this->ShowErrors($this->Lang('error_namexists'));
	  }
	else
	  {
	    // it's an update
	    $query = 'UPDATE '.cms_db_prefix()."module_cgcontentutils
                      SET name = ?, prompt = ?, value = ?, type = ?,
                         attribs = ?, modified_date = $now
                      WHERE id = ?";
	    $dbr = $db->Execute($query,
				array($data['name'],$data['prompt'],$data['value'],
				      $data['type'],$data['attribs'],$blockid));
	    if( !$dbr )
	      {
		echo "ERROR: ".$db->sql.'<br/>'.$db->ErrorMsg();
	      }

	    $this->SetMessage($this->Lang('msg_blockupdated'));
	    $this->RedirectToTab($id);
	  }
      }
    else
      {
	// it's an insert
	// check for a duplicate name first
	$query = 'SELECT id FROM '.cms_db_prefix().'module_cgcontentutils
                   WHERE name = ?';
	$tmp = $db->GetOne($query,array($data['name']));
	if( $tmp )
	  {
	    echo $this->ShowErrors($this->Lang('error_nameexists'));
	  }
	else
	  {
	    $query = 'INSERT INTO '.cms_db_prefix()."module_cgcontentutils
                     (name,prompt,value,type,attribs,create_date,modified_date)
                     VALUES (?,?,?,?,?,$now,$now)";
	    $dbr = $db->Execute($query,
				array($data['name'],$data['prompt'],$data['value'],
				      $data['type'],$data['attribs']));
	    
	    if( !$dbr )
	      {
		echo "ERROR: ".$db->sql.'<br/>'.$db->ErrorMsg();
	      }

	    $this->SetMessage($this->Lang('msg_blockadded'));
	    $this->RedirectToTab($id);
	  }
      } // insert
  }

//
// give everything to smarty
//
$dirs = array('/');
$tmp = glob($config['uploads_path'].'/*',GLOB_ONLYDIR);
if( is_array($tmp) )
  {
    for( $i = 0; $i < count($tmp); $i++ )
      {
	$tmps = str_replace($config['uploads_path'].'/','',$tmp[$i]);
	$dirs[$tmps] = $tmps;
	$smarty->assign('directories',$dirs);
      }
  }
$smarty->assign('formstart',$this->CGCreateFormStart($id,'admin_edit_block',$returnid,$params));
$smarty->assign('formend',$this->CreateFormEnd());
$blocktypes = array('pageselector'=>$this->Lang('blocktype_pageselector'),
		    'textinput'=>$this->Lang('blocktype_textinput'),
		    'textarea'=>$this->Lang('blocktype_textarea'),
		    'dropdown'=>$this->Lang('blocktype_dropdown'),
		    'checkbox'=>$this->Lang('blocktype_checkbox'),
		    'radiobuttons'=>$this->Lang('blocktype_radiobuttons'),
		    'file_selector'=>$this->Lang('file_selector'));
$smarty->assign('blocktypes',$blocktypes);
$smarty->assign('one',$data);
//
// display the template
//
echo $this->ProcessTemplate('admin_edit_block.tpl');
#
# EOF
#
?>