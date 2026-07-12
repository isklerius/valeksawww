<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: JQueryTools (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  A toolbox of conveniences to provide dynamic javascripty functionality
#  for CMS modules and website designers.
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
if( !isset($gCms) ) exit;

$config = cmsms()->GetConfig();

$baseurl = $config['root_url'].'/modules/'.$this->GetName().'/lib/';
$fmt = '<script type="text/javascript" src="%s"></script>'."\n";
$do_css=1;
$do_js=1;

$all_libs = array('base','tablesorter','cluetip','form','fancybox','form','cgform','lightbox');
$std_libs = array('base','tablesorter','cluetip','form','fancybox','form','cgform');
$base_files = array('deps'=>'jquery-1.4.2.min.js',
		    'css'=>$this->GetName().'.css');

// all the extra libraries.
$json_files = array('main'=>'jquery.json-1.3.min.js');
$tablesorter_files = array('main'=>'jquery.tablesorter.js',
			   'deps'=>'jquery.metadata.js');
$cluetip_files = array('main'=>'jquery.cluetip.js',
		       'deps'=>'jquery.dimensions.js,jquery.hoverIntent.js',
		       'css'=>'jquery.cluetip.css');
$lightbox_files = array('main'=>'jquery.lightbox-0.5.js',
			'css'=>'jquery.lightbox-0.5.css');
$thickbox_files = array('main'=>'thickbox-compressed.js',
			'css'=>'thickbox.css');
$fancybox_files = array('main'=>'jquery.fancybox/jquery.fancybox-1.3.1.pack.js',
		 	'deps'=>'jquery.fancybox/jquery.easing-1.3.pack.js,jquery.fancybox/jquery.mousewheel-3.0.2.pack.js',
			'css'=>'../jquery.fancybox/jquery.fancybox-1.3.1.css');
$cgform_files = array('main'=>'jquery.cgform.js');
$form_files = array('main'=>'jquery.form.js');

global $CMS_ADMIN_PAGE;
global $CMS_MODULE_PAGE;
if( isset($CMS_MODULE_PAGE) && $CMS_MODULE_PAGE = 1 && version_compare(CMS_VERSION,'1.9-beta1') >= 0 )
  {
    $params['no_jquery'] = 1;
  }
if( isset($params['no_jquery']) )
  {
    unset($base_files['deps']);
  }
if( isset($params['no_css']) )
  {
    $do_css = 0;
  }
if( isset($params['no_js']) )
  {
    $do_js = 0;
  }

$include = array();
if( isset($params['include']) )
  {
    $include = explode(',',$params['include']);
  }
$exclude = array();
if( isset($params['exclude']) )
  {
    $exclude = explode(',',$params['exclude']);
  }


// assemble the list of libraries and css files.
$this->_libs = array();
$libs = array();
$css = array();
$the_libs = $std_libs;
if( count($include) )
  {
    $the_libs = array_merge($std_libs,$include);
  }
for( $pass = 0; $pass < 2; $pass++ )
  {
    foreach( $the_libs as $one )
      {
	$tmp2 = "{$one}_files";
	$arr = $$tmp2;
	if( !is_array($arr) )
	  {
	    die('could not find array $tmp2');
	  }

	if( $one != 'base' && in_array($one,$exclude) ) continue;

	if( !in_array($one,$this->_libs) )
	  {
	    $this->_libs[] = $one;
	  }

	if( $pass == 0 && isset($arr['deps']) )
	  {
	    $libs = array_merge($libs,explode(',',$arr['deps']));
	  }

	if( $pass == 1 && isset($arr['main']) )
	  {
	    $libs = array_merge($libs,explode(',',$arr['main']));
	  }

	if( $pass == 1 && isset($arr['css']) )
	  {
	    $css = array_merge($css,explode(',',$arr['css']));
	  }
      }

    $libs = array_unique($libs);
    $css = array_unique($css);
}

$smarty->assign('base_url',$baseurl);
if( count($libs) && $do_js )
  {
    $smarty->assign('libs',$libs);
  }
if( count($css) && $do_css )
  {
    $smarty->assign('css',$css);
  }

$ret = $this->ProcessTemplate('incjs.tpl');
echo $ret;

#
# EOF
#
?>
