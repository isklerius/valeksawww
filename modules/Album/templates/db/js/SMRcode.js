/*
Code modified from: http://www.phpbb.com/community/viewtopic.php?t=341099
##############################################################
## MOD Title: Simple Mod Resize Post's Images
## MOD Author: Sancious <sancious@chatoristano.it> (Giuseppe Chiesa) http://gchiesa.no-ip.org
## MOD Description: This simple MOD autoresize images too large in post and add a link to view
##                  images in original size in new window.
## MOD Version: 0.1.0
##
## Installation Level: Easy
## Installation Time: 5 Minutes
## Files To Edit: templates/SubSilver/bbcode.tpl,
##      templates/SubSilver/overall_header.tpl
##     
## Included Files: SMRcode.js
## License: http://opensource.org/licenses/gpl-license.php GNU General Public License v2
##############################################################
## For security purposes, please check: http://www.phpbb.com/mods/
## for the latest version of this MOD. Although MODs are checked
## before being allowed in the MODs Database there is no guarantee
## that there are no security problems within the MOD. No support
## will be given for MODs not found within the MODs Database which
## can be found at http://www.phpbb.com/mods/
##############################################################
## Author Notes:
##
## This simple MOD autoresize images too large in post and add a link to view images in original
## size in new window.
##
##############################################################
## MOD History:
##
## 2005-11-13 - Version 0.1.0
##            - Initial Release
##
##############################################################
## Before Adding This MOD To Your Forum, You Should Back Up All Files Related To This MOD
##############################################################

#
#-----[ COPY ]------------------------------------------
#
copy SMRcode.js to templates/SMRcode.js

#
#-----[ OPEN ]------------------------------------------
#
templates/subSilver/bbcode.tpl

#
#-----[ FIND ]------------------------------------------
#
<!-- BEGIN img --><img src="{URL}" border="0" /><!-- END img -->

#
#-----[ REPLACE WITH ]------------------------------------------
#
<!-- BEGIN img --><a href="" onMouseOver="SMR_setLink(this);" target="_blank"><img src="{URL}" border="0" onLoad="SMR_resize(this);" title="click to open in a new window" /></a><!-- END img -->

#
#-----[ OPEN ]------------------------------------------
#
templates/subSilver/overall_header.tpl

#
#-----[ FIND ]------------------------------------------
#
</head>

#
#-----[ BEFORE, ADD ]------------------------------------------
#
<!-- SMR_RESIZE_MOD:START -->
<script language="javascript" type="text/javascript" src="templates/SMRcode.js"></script>
<!-- SMR_RESIZE_MOD:END -->

#
#-----[ SAVE/CLOSE ALL FILES ]------------------------------------------
#
# EoM
*/

//*******************************************************************
//** SMR_RESIZE_MOD: CONFIGURATION **********************************
//*******************************************************************
// SMR_confMaxDim = 400; // pixels

//*******************************************************************
//** SMR_RESIZE_MOD: START CODE *************************************
//*******************************************************************
function SMR_resize(obj, SMR_confMaxDim) {

   thisWidth = obj.width;
   thisHeight = obj.height;
   
   if(thisWidth > thisHeight) thisMaxDim = thisWidth;
   else thisMaxDim = thisHeight;
   
   if(thisMaxDim > SMR_confMaxDim) {
      thisMinDim = Math.round((((thisWidth > thisHeight)?thisHeight:thisWidth) * SMR_confMaxDim) / thisMaxDim); 
      
      if(thisWidth > thisHeight) {
         thisWidth = SMR_confMaxDim;
         thisHeight = thisMinDim;
      } else {
         thisHeight = SMR_confMaxDim;
         thisWidth = thisMinDim;
      }
   } // if(thisMaxDim > SMR_confMaxDim)

   obj.height = thisHeight;
   obj.width = thisWidth;
}
function SMR_setLink(obj) {
   thisInnerHtml = obj.innerHTML;
   tmpArray = thisInnerHtml.split(' src=\"');
   tmpArray = tmpArray[1].split('"');
   obj.href = tmpArray[0];
}
//*******************************************************************
//** SMR_RESIZE_MOD: END ********************************************
//*******************************************************************
