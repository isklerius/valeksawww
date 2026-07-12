<?php
#BEGIN_LICENSE
#-------------------------------------------------------------------------
# Module: CGExtensions (c) 2008 by Robert Campbell 
#         (calguy1000@cmsmadesimple.org)
#  An addon module for CMS Made Simple to provide useful functions
#  and commonly used gui capabilities to other modules.
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

class cge_userdate extends DateTime
{
  private static $_global;

  public function __construct($time = '')
  {
    if( $time instanceof CmsSystemDate )
      {
	parent::__construct($time->format('U'));
      }
    else
      {
	$config = cmsms()->GetConfig();
	$tz = null;
	if( isset($config['user_timezone']) )
	  {
	    $tz = new DateTimeZone($config['user_timezone']);
	  }
	else
	  {
	    $tz = new DateTimeZone($config['timezone']);
	  }
	parent::__construct($time,$tz);
      }
  }


  public function getSystemFormat($fmt = '')
  {
    $config = cmsms()->GetConfig();
    $stz = new DateTimeZone($config['timezone']);
    $utz = new DateTimeZone($config['user_timezone']);

    // this calls the cms_date_format stuff.
    if( empty($fmt) )
      {
	$fmt = get_site_preference('defaultdateformat','%b %e, %Y');
	global $gCms;
	if( !isset($gCms->variables['page_id']) )
	  {
	    $uid = get_userid(FALSE);
	    if( $uid )
	      {
		$fmt = get_preference($uid,'date_format_string',$fmt);
	      }
	  }
      }

    $this->setTimeZone($stz);
    $db = cmsms()->GetDb();
    $when = $db->DbTimeStamp($this->format('U'));
    $this->setTimeZone($utz);
    return $when;
  }


  public function getDate($timestamp = '')
  {
    if( !$timestamp ) $timestamp = time();
    $fmt = 's||i||H||j||w||n||Y||z||l||F';
    $map = array('seconds','minutes','hours','mday','wday','mon','year','yday','weekday','month');

    $ts = $this->getTimeStamp();
    $this->setTimeStamp($timestamp);
    $tmp1 = $this->format($fmt);
    $this->setTimeStamp($ts);
    $tmp2 = explode('||',$tmp1);

    $res = array();
    for( $i = 0; $i < count($map); $i++ )
      {
	$res[$map[$i]] = $tmp2[$i];
      }
    $res[0] = $timestamp;

    return $res;
  }


  public function makeTime($hour = '',$minute = '',$second = '',$month = '',$day = '',$year = '')
  {
    $time = time();
    if( $hour === '' ) $hour = $this->format('H');
    if( $minute === '' ) $minute = $this->format('i');
    if( $second === '' ) $second = $this->format('s');
    if( $month === '' ) $month = $this->format('n');
    if( $day === '' ) $day = $this->format('j');
    if( $year === '' ) $year = $this->format('Y');

    $this->setDate($year,$month,$day);
    $this->setTime($hour,$minute,$second);
    return $this->getTimeStamp();
  }


  public static function get_timestamp($string)
  {
    $class= get_class();
    $obj = new $class($string);
    return $obj->getTimeStamp();
  }


  public static function get_dbtimestamp($time)
  {
    $class= get_class();
    $obj = new $class();
    $obj->setTimeStamp($time);
    return $obj->getSystemFormat();
  }

} // end of class

#
# EOF
#
?>