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

# This file holds the Album class which extends the CMSModule class
// open_basedir restriction  fix
$obd = ini_get('open_basedir');
// If open_basedir is set
if ($obd != null) {
	require dirname(__FILE__).'/classes/module/class.Album.php';
} else {
	require 'classes/module/class.Album.php';
}
?>
