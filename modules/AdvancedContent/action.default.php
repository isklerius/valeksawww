<?php
#-------------------------------------------------------------------------------
#
# Module : AdvancedContent (c) 2010-2011 by Georg Busch (georg.busch@gmx.net)
#          a content management tool for CMS Made Simple
#          The projects homepage is dev.cmsmadesimple.org/projects/content2/
#          CMS Made Simple is (c) 2004-2011 by Ted Kulp
#          The projects homepage is: cmsmadesimple.org
# Version: 0.8
# File   : action.default.php
#          This file is a modification of the default plugin {content}
# Purpose: performs the default frontend action if {AdvancedContent} is used.
# License: GPL
#
#-------------------------------------------------------------------------------

/**
 *
 * @todo: check if this can be done in contenttype in function Show()
 *
 */

if(!is_object(cmsms())) exit;

if(isset($params['active']) && $this->IsFalse($params['active']))
{
	return; # don't process inactive blocks
}

$result   = '';

$block = 'content_en';
$mainContent = true;

# MLE support
$mle = false;
global $hls, $mleblock, $mleblockfallback;
if(isset($hls))
{
	$mle = true;
}

if($mle && $mleblock != '')
{
	$block = 'content'.$mleblock;
}
#---

if(isset($params['block']) && $params['block'] != $block)
{
	$mainContent = false;
	$_block = preg_replace('/-+/','_',munge_string_to_url($params['block']));
	$block = $_block;
	# MLE support
	if($mle)
	{
		$block .= $mleblock;
	}
	#---
}

$defaultValue = '';
if(isset($params['default']))
{
	$defaultValue = trim($params['default']);
}

$doSmarty = false;
if(isset($params['smarty']) && $this->IsTrue($params['smarty']) && cms_utils::get_current_content()->Type() == 'content2')
{
	$doSmarty = true;
}

if($doSmarty && cms_utils::get_current_content()->Type() == 'content2')
{
	$defaultValue = cms_utils::get_current_content()->DoSmarty(cms_utils::get_current_content()->_contentBlocks[$block]['default_value']);
}

$allowNone = true;
if(isset($params['allow_none']) && $this->IsFalse($params['allow_none']))
{
	$allowNone = false;
}

if (is_object(cms_utils::get_current_content()) && method_exists(cms_utils::get_current_content(),'Id') )
{
	$id         = '';
	$modulename = '';
	$action     = '';
	$inline     = false;
	if (isset($_REQUEST['module']))
	{
		$modulename = $_REQUEST['module'];
	}
	
	if (isset($_REQUEST['id']))
	{
		$id = $_REQUEST['id'];
	}
	elseif (isset($_REQUEST['mact']))
	{
		$ary        = explode(',', cms_htmlentities($_REQUEST['mact']), 4);
		$modulename = (isset($ary[0])?$ary[0]:'');
		$id         = (isset($ary[1])?$ary[1]:'');
		$action     = (isset($ary[2])?$ary[2]:'');
		$inline     = (isset($ary[3]) && $ary[3] == 1?true:false);
	}
	
	if (isset($_REQUEST[$id.'action']))
	{
		$action = $_REQUEST[$id.'action'];
	}
	else if (isset($_REQUEST['action']))
	{
		$action = $_REQUEST['action'];
	}
	
	if (!isset($params['block']) && ($id == 'cntnt01' || ($id != '' && $inline == false)))
	{
		$cmsmodules = &cmsms()->modules;
		
		if (isset($cmsmodules))
		{
			foreach ($cmsmodules as $key=>$value)
			{
				if (strtolower($modulename) == strtolower($key))
				{
					$modulename = $key;
				}
			}
			
			if (isset($modulename))
			{
				if (isset($cmsmodules[$modulename]))
				{
					if (isset($cmsmodules[$modulename]['object'])
						&& $cmsmodules[$modulename]['installed'] == true
						&& $cmsmodules[$modulename]['active'] == true
						&& $cmsmodules[$modulename]['object']->IsPluginModule())
					{
						@ob_start();
						foreach($this->GetAllowedParameters() as $k => $v) {
							unset($params[$k]);
						}
						
						$params = array_merge($params, GetModuleParameters($id));
						
						# calguy1000 ... increment the modulenum
						#if we're not in inlined mode.
						#if( $id != 'cntnt01' )
						#{
						# ToDo: do not modify CMSms internals here!
						#	++cmsms()->variables["modulenum"];
						#}
						
						$returnid = '';
						if (isset($params['returnid']))
						{
							$returnid = $params['returnid'];
						}
						else
						{
							$returnid = cms_utils::get_current_content()->Id();
						}
						$result = $cmsmodules[$modulename]['object']->DoActionBase($action, $id, $params, $returnid);
						if ($result !== FALSE)
						{
							echo $result;
						}
						$modresult = @ob_get_contents();
						@ob_end_clean();
						$result = $modresult;
					}
					else
					{
					  $result = "<!-- Not a tag module -->\n";
					  @trigger_error('Attempt to access module '.$key.' which could not be foune (is it properly installed and configured?');
					}
				}
			}
		}
	}
	else
	{
		$oldvalue                     = cmsms()->GetSmarty()->caching;
		cmsms()->GetSmarty()->caching = false;
		$contentId                    = cms_utils::get_current_content()->Id();
		
		# MLE support
		if($mle)
		{
			$contentId .= '-'.$hls;
		}
		#---
		
		$result = cmsms()->GetSmarty()->fetch(str_replace(' ', '_', 'content:' . $block), '', $contentId);
		
		# MLE support
		if($mle
			&& $result == '' && $mleblockfallback != ''
			&& $mleblockfallback != $mleblock)
		{
			if($block != 'content'.$mleblock)
			{
				$block  = $_block . $mleblockfallback;
				$result = cmsms()->GetSmarty()->fetch(str_replace(' ', '_', 'content:' . $block), '', $contentId);
			}
			else
			{
				$block  = 'content' . $mleblockfallback;
				$result = cmsms()->GetSmarty()->fetch(str_replace(' ', '_', 'content:' . $block), '', $contentId);
			}
		}
		#---
		
		cmsms()->GetSmarty()->caching = $oldvalue;
		
		if($result == '' && !$allowNone)
		{
			$result = $defaultValue;
		}
	}
	echo trim($result);
}

?>
