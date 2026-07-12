<?php
#-------------------------------------------------------------------------------
#
# Module : AdvancedContent (c) 2010-2011 by Georg Busch (georg.busch@gmx.net)
#          a content management tool for CMS Made Simple
#          The projects homepage is http://dev.cmsmadesimple.org/projects/content2/
#          CMS Made Simple is (c) 2004-2011 by Ted Kulp
#          The projects homepage is: http://www.cmsmadesimple.org
# Version: 0.8
# File   : contenttype.Content2.php
#          This file is a modification of the default content type "Content"
# Purpose: the content object
# License: GPL
#
#-------------------------------------------------------------------------------

class Content2 extends CMSModuleContentType
{
	/**
	 * @access private
	 * @var string
	 */
	var $_stylesheet;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_contentBlocks;
	
	/**
	 * @access private
	 * @var boolean
	 */
	var $_contentBlocksLoaded;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_tabIds;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_pageTabs;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_blockTabs;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_blockGroups;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_userGroups;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_dateBlocks;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_colorPickerBlocks;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_sliderBlocks;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_multiInputs;
	
	/**
	 * @access private
	 * @var boolean
	 */
	var $_isAdmin;
	
	/**
	 * @access private
	 * @var boolean
	 */
	var $_feuAction;
	
	/**
	 * @access private
	 * @var boolean
	 */
	var $_feuAccess;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_feuGroups;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_allUsers;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_allGroups;
	
	/**
	 * @access private
	 * @var array
	 */
	var $_inheritables;
	#var $_loadedProps;
	
	/**
	 * MLE support
	 * @access public
	 * @var boolean
	 */
	var $mle = false;
	
	/**
	 * MLE support
	 * @access public
	 * @var string
	 */
	var $lang;
	
	/**
	 * MLE support
	 * @access public
	 * @var string
	 */
	var $blockLang;
	
	/**
	 * MLE support
	 * @access public
	 * @var string
	 */
	var $defaultBlockLang;
	
	
	/**
	 * Constructor
	 */
	function Content2()
	{
		parent::ContentBase();
		$this->_contentBlocks       = array();
		$this->_contentBlocksLoaded = false;
		$this->_feuAction           = false;
		$this->_feuAccess           = -1;
		$this->_feuGroups           = false;
		$this->_multiInputs         = array();
		
		global $CMS_ADMIN_PAGE;
		if(isset($CMS_ADMIN_PAGE) && $CMS_ADMIN_PAGE == 1)
		{
			$AdvancedContent          =& cms_utils::get_module('AdvancedContent');
			$this->_tabIds            = array();
			$this->_dateBlocks        = array();
			$this->_colorPickerBlocks = array();
			$this->_blockTabs         = array();
			$this->_blockGroups       = array();
			
			$this->_pageTabs = array(
				'main' => array(
					'tab_id'         => 'main',
					'tab_name'       => lang('main'),
					'block_tabs'     => array(),
					'block_groups'   => array(),
					'content_blocks' => array()));
			$this->_tabIds[] = 'main';
			
			if( check_permission(get_userid(), 'Manage All Content') )
			{
				$this->_pageTabs['options'] = array(
					'tab_id'         => 'options',
					'tab_name'       => lang('options'),
					'block_tabs'     => array(),
					'block_groups'   => array(),
					'content_blocks' => array());
				$this->_tabIds[] = 'options';
			}
			
			if( check_permission(get_userid(), 'Manage AdvancedContent Options') && $AdvancedContent->GetPreference('use_advanced_pageoptions',1) )
			{
				$this->_pageTabs['AdvancedContent'] = array(
					'tab_id'         => 'AdvancedContent',
					'tab_name'       => $AdvancedContent->lang('advancedcontent_tabname'),
					'block_tabs'     => array(),
					'block_groups'   => array(),
					'content_blocks' => array());
				$this->_tabIds[] = 'AdvancedContent';
			}
		}
		
		# MLE support
		global $hls, $mleblock, $mleblockfallback;
		if(isset($hls))
		{
			$this->mle              = true;
			$this->lang             = $hls;
			$this->blockLang        = $mleblock;
			$this->defaultBlockLang = $mleblockfallback;
		}
		#---
	}
	
	function ModuleName()
	{
		return 'AdvancedContent';
	}
	
	function IsDefaultPossible()
	{
		return TRUE;
	}
	
	function IsCopyable()
	{
		return TRUE;
	}
	
	function FriendlyName()
	{
		if(basename($_SERVER['PHP_SELF']) == 'listcontent.php')
		{
			$addTxt = array();
			if($this->mCachable)
			{
				$addTxt[] = '-&nbsp;'.lang('cachable');
			}
			else
			{
				$addTxt[] = '-&nbsp;'.lang('noncachable');
			}
			if($this->mSecure)
			{
				$addTxt[] = '-&nbsp;SSL';
			}
			if(!$this->mShowInMenu)
			{
				$addTxt[] = '-&nbsp;'.lang('hidefrommenu');
			}
			else
			{
				$addTxt[] = '-&nbsp;'.lang('showinmenu');
			}
			if(cms_utils::get_module('AdvancedContent')->GetPreference('use_advanced_pageoptions',1))
			{
				if($feusers =& cms_utils::get_module('FrontEndUsers'))
				{
					$selectedGroups = $this->GetProperty('feu_access');
					if(count($selectedGroups))
					{
						$addTxt[] = '-&nbsp;'.$this->lang('frontendaccess').': <ul><li>' . implode('</li><li>',array_keys(array_intersect($feusers->GetGroupList(), $selectedGroups))).'</li></ul>';
						$redirectPage = $this->GetProperty('redirect_page');
						if($redirectPage)
						{
							$addTxt[] = '-&nbsp;' . $this->lang('redirectpage') . ': '.$redirectPage;
						}
						$redirectParams = $this->GetProperty('redirect_params');
						if($redirectParams)
						{
							$addTxt[] = '-&nbsp;' . $this->lang('redirectparams') . ': '.$redirectParams;
						}
					}
					$hide_menu_item = $this->GetProperty('hide_menu_item');
					if($hide_menu_item == 2 || ($hide_menu_item == 1 && count($selectedGroups)))
					{
						$addTxt[] = '-&nbsp;' . $this->lang('hide_menu_item') . ': '. ($hide_menu_item == 1 ? $this->lang('loggedout') : $this->lang('loggedin'));
					}
				}
				if($this->GetProperty('use_expire_date'))
				{
					$addTxt[]   = '-&nbsp;'.$this->lang('startdate').': '.strftime('%x %H:%M',$this->GetProperty('start_date'));
					$addTxt[]   = '-&nbsp;'.$this->lang('enddate').': '.strftime('%x %H:%M',$this->GetProperty('end_date'));
				}
			}
			if(count($addTxt))
			{
				return '<span style="position:relative;text-decoration:underline;cursor:pointer;display:block" onmouseover="document.getElementById(\''.$this->mId.'_info\').style.display = \'block\';" onmouseout="document.getElementById(\''.$this->mId.'_info\').style.display = \'none\';">' . $this->lang('AdvancedContent') . '<span id="'.$this->mId.'_info" style="text-decoration:none;background-color:#FFF;border:1px solid #000;position:absolute;padding:5px;display:none;-moz-box-shadow:1px 1px 10px #666666;-webkit-box-shadow:1px 1px 10px #666666;box-shadow:1px 1px 10px #666666;z-index:999">' . implode('<br />',$addTxt) . '</span></span>';
			}
		}
		
		return $this->lang('AdvancedContent');
	}
	
	function GetProperty($propName)
	{
		#if($this->mId == cms_utils::get_current_pageid())
		#{
		#	$propValue = $this->GetPropertyValue($propName);
		#}
		#else 
		#{
		#	if(!$this->_loadedProps)
		#	{
		#		$this->_loadedProps =& cms_utils::get_module('AdvancedContent')->LoadedProps($this->mId);
		#	}
		#	if(isset($this->_loadedProps[$propName]))
		#	{
		#		$propValue = $this->_loadedProps[$propName];
		#	}
		#	else
		#	{
		#		$prop = cms_utils::get_module('AdvancedContent')->LoadContentProps($this->mId, $propName, '', $this->mType, 1);
		#		$propValue = $prop[$this->mId][$propName];
		#		#$this->mProperties->SetValue($propName, $propValue);
		#		$this->_loadedProps[$propName] = $propValue;
		#	}
		#}
		
		$propValue = $this->GetPropertyValue($propName);
		if(cms_utils::get_module('AdvancedContent')->GetPreference('use_advanced_pageoptions',1))
		{
			if(!$this->_inheritables)
			{
				$this->_inheritables =& cms_utils::get_module('AdvancedContent')->Inheritables($this->mId);
			}
			if(!isset($this->_inheritables[$propName]))
			{
				return $propValue;
			}
			$inherit = false;
			if($propName == 'feu_access')
			{
				$delim     = strpos($propValue,',') === FALSE ? ';' : ',';
				$propValue = $this->CleanArray(explode($delim,$propValue));
				if(in_array(-1,$propValue))
				{
					$inherit = true;
				}
			}
			else if($propValue == -1)
			{
				$inherit = true;
			}
			if($inherit)
			{
				$propValue = $this->InheritParentProp($propName,$propValue);
			}
			
			#if($propName == 'feu_access')
			#{
			#	#$this->mProperties->SetValue($propName, implode(',',$propValue));
			#	$this->_loadedProps[$propName] = implode(',',$propValue);
			#}
			#else
			#{
			#	#$this->mProperties->SetValue($propName, $propValue);
			#	$this->_loadedProps[$propName] = $propValue;
			#}
			
			#echo "<pre>";
			#echo "<code>";
			#print_r($this->mProperties->mPropertyValues);
			#echo "</code>";
			#echo "</pre>";
		}
		return $propValue;
	}
	
	function &get_content_blocks()
	{
		$this->parse_content_blocks();
		return $this->_contentBlocks;
	}
	
	function &get_block_groups()
	{
		$this->parse_content_blocks();
		return $this->_blockGroups;
	}
	
	function &get_multi_inputs()
	{
		$this->parse_content_blocks();
		return $this->_multiInputs;
	}
	
	function &get_multi_contents($blockName)
	{
		# ToDo
	}
	
	function ShowInMenu()
	{
		if(cms_utils::get_module('AdvancedContent')->GetPreference('use_advanced_pageoptions',1))
		{
			if($this->GetProperty('use_expire_date'))
			{
				$start_date = $this->GetProperty('start_date');
				$end_date   = $this->GetProperty('end_date');
				if(($start_date > time() || $end_date < time()) && $this->mActive)
				{
					#cmsms()->GetSmarty()->clear_all_cache(); #???
					$this->mActive = false;
					$this->mShowInMenu = false;
				}
				else if($start_date < time() && $end_date > time() && !$this->mActive)
				{
					#cmsms()->GetSmarty()->clear_all_cache(); #???
					$this->mActive = true;
				}
			}
			global $CMS_ADMIN_PAGE;
			if(!isset($CMS_ADMIN_PAGE) || $CMS_ADMIN_PAGE !== 1)
			{
				if($this->GetProperty('hide_menu_item'))
				{
					if($this->GetProperty('hide_menu_item') == 1)
					{
						$this->mShowInMenu = $this->CheckFrontendPageAccess();
					}
					else if($this->GetProperty('hide_menu_item') == 2 && $feusers =& cms_utils::get_module('FrontEndUsers'))
					{
						$this->mShowInMenu = !$feusers->LoggedIn();
					}
				}
			}
		}
		return $this->mShowInMenu;
	}
	
	function Active()
	{
		if(cms_utils::get_module('AdvancedContent')->GetPreference('use_advanced_pageoptions',1))
		{
			if($this->GetProperty('use_expire_date'))
			{
				$start_date = $this->GetProperty('start_date');
				$end_date   = $this->GetProperty('end_date');
				if(($start_date > time() || $end_date < time()) && $this->mActive)
				{
					#cmsms()->GetSmarty()->clear_all_cache(); #???
					$this->mActive = false;
					$this->mShowInMenu = false;
					// ToDo: Set page in DB to inactive?
				}
				else if($start_date < time() && $end_date > time() && !$this->mActive)
				{
					#cmsms()->GetSmarty()->clear_all_cache(); #???
					$this->mActive = true;
				}
			}
		}
		return $this->mActive;
	}
	
	private function _get_block_info($wholetag)
	{
		$pattern   = '/([\w]+)=(["][^"]*["]|[\'][^\']*[\']|[^\'"\s]*)/';
		$blockInfo = array();
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		
		# get the arguments.
		$matches = array();
		$result  = preg_match_all($pattern, $wholetag, $matches);
		
		$keyval = array();
		for ($i = 0; $i < count($matches[1]); $i++)
		{
			if(startswith($matches[2][$i],'\''))
			{
				$matches[2][$i] = trim($matches[2][$i],'\'');
			}
			else if(startswith($matches[2][$i],'"'))
			{
				$matches[2][$i] = trim($matches[2][$i],'"');
			}
			
			$keyval[strtolower($matches[1][$i])] = $matches[2][$i];
		}
		
		if(isset($keyval['active']) && $this->IsFalse($keyval['active']))
		{
			return false;
		}
		
		$blockInfo['name'] = 'content_en';
		
		# MLE support
		if($this->mle && $this->blockLang != '')
		{
			$blockInfo['name'] = 'content'.$this->blockLang;
		}
		#---
		
		if(isset($keyval['block']) && $keyval['block'] != '')
		{
			$blockInfo['name'] = trim($keyval['block']);
		}
		
		# block id
		$blockInfo['id'] = preg_replace('/-+/','_',munge_string_to_url($blockInfo['name']));
		
		# additional editors
		$blockInfo['editor_groups'] = '';
		if(isset($keyval['editor_groups']) && $keyval['editor_groups'] != '')
		{
			$blockInfo['editor_groups'] = trim($keyval['editor_groups']);
		}
		$blockInfo['editor_users'] = '';
		if(isset($keyval['editor_users']) && $keyval['editor_users'] != '')
		{
			$blockInfo['editor_users'] = trim($keyval['editor_users']);
		}
		
		global $CMS_ADMIN_PAGE;
		if(isset($CMS_ADMIN_PAGE) && $CMS_ADMIN_PAGE == 1 
			&& ($blockInfo['editor_users'] || $blockInfo['editor_groups'])
			&& !$this->CheckBlockPermission($blockInfo))
		{
			return false; # don't process blocks without permission to edit
		}
		
		$blockInfo['multiple']  = false;
		$blockInfo['new_block'] = false;
		
		# blocktype
		$blockInfo['block_type'] = $blockInfo['type'] = 'text';
		if(startswith($wholetag, 'content_image'))
		{
			$blockInfo['block_type'] = $blockInfo['type'] = 'image';
		}
		elseif(startswith($wholetag, 'content_module'))
		{
			$blockInfo['block_type'] = $blockInfo['type'] = 'module';
		}
		elseif(isset($keyval['block_type']) && $keyval['block_type'] != '')
		{
			$blockInfo['block_type'] = $blockInfo['type'] = strtolower($keyval['block_type']);
		}
		
		$blockInfo['smarty'] = false;
		if(isset($keyval['smarty']) && $this->IsTrue($keyval['smarty']))
		{
			$blockInfo['smarty'] = true;
		}
		
		$blockInfo['translate_labels'] = false;
		if(isset($keyval['translate_labels']) && $this->IsTrue($keyval['translate_labels']))
		{
			$blockInfo['translate_labels'] = true;
		}
		
		$blockInfo['translate_values'] = false;
		if(isset($keyval['translate_values']) && $this->IsTrue($keyval['translate_values']))
		{
			$blockInfo['translate_values'] = true;
		}
		
		$blockInfo['label'] = ucwords($blockInfo['name']);
		if(isset($keyval['label']) && $keyval['label'] != '')
		{
			$blockInfo['label'] = trim($keyval['label']);
		}
		
		$blockInfo['required'] = false;
		if(isset($keyval['required']) && $this->IsTrue($keyval['required']))
		{
			$blockInfo['required'] = true;
		}
		
		# default content/value
		$blockInfo['default'] 	= '';
		if(isset($keyval['default']) && $keyval['default'] != '')
		{
			$blockInfo['default'] = $keyval['default'];
		}
		
		# backend style (e.g. to mark required fields...)
		# deprecated
		$blockInfo['style'] = '';
		if(isset($keyval['style']))
		{
			$blockInfo['style'] = $keyval['style'];
		}
		
		# size of the input field
		$blockInfo['size'] = '';
		if(isset($keyval['size']))
		{
			$blockInfo['size'] = intval($keyval['size']);
		}
		
		$blockInfo['page_tab'] = 'main';
		if(isset($keyval['page_tab']) && trim($keyval['page_tab'] != ''))
		{
			$blockInfo['page_tab'] = trim($keyval['page_tab']);
		}
		
		$blockInfo['block_tab'] = '';
		if(isset($keyval['block_tab']) && trim($keyval['block_tab'] != ''))
		{
			$blockInfo['block_tab'] = trim($keyval['block_tab']);
		}
		
		$blockInfo['block_group'] = '';
		if(isset($keyval['block_group']) && trim($keyval['block_group'] != ''))
		{
			$blockInfo['block_group'] = trim($keyval['block_group']);
		}
		
		$blockInfo['allow_none'] = true;
		if(isset($keyval['allow_none']) && $this->IsFalse($keyval['allow_none']))
		{
			$blockInfo['allow_none'] = false;
		}
		
		$blockInfo['description'] = '';
		if(isset($keyval['description']))
		{
			$blockInfo['description'] = trim($keyval['description']);
		}
		
		$blockInfo['collapse'] = $AdvancedContent->GetPreference('collapse_block_default',1);
		if(isset($keyval['collapse']) && ($this->IsTrue($keyval['collapse']) || $this->IsFalse($keyval['collapse'])))
		{
			$blockInfo['collapse'] = $this->IsTrue($keyval['collapse']);
		}
		
		$blockInfo['no_collapse'] = false;
		if(isset($keyval['no_collapse']) && $this->IsTrue($keyval['no_collapse']))
		{
			$blockInfo['no_collapse'] = true;
		}
		
		$blockInfo['feu_access'] = '';
		if(isset($keyval['feu_access']))
		{
			$blockInfo['feu_access'] = trim($keyval['feu_access']);
		}
		
		$blockInfo['feu_action'] = false;
		if(isset($keyval['feu_action']) && $this->IsTrue($keyval['feu_action']))
		{
			$blockInfo['feu_action'] = true;
		}
		
		if($blockInfo['type'] == 'text')
		{
			$blockInfo['maxlength'] = '';
			if(isset($keyval['maxlength']))
			{
				$blockInfo['maxlength'] = $keyval['maxlength'];
			}
			
			$blockInfo['usewysiwyg'] = true;
			if(isset($keyval['wysiwyg']) && $this->IsFalse($keyval['wysiwyg']))
			{
				$blockInfo['usewysiwyg'] = false;
			}
			
			$blockInfo['oneline'] = false;
			if(isset($keyval['oneline']) && $this->IsTrue($keyval['oneline']))
			{
				$blockInfo['oneline'] = true;
			}
		}
		else if ($blockInfo['type'] == 'date')
		{
			$this->_dateBlocks[] = $blockInfo['id'];
			
			$showClock = true;
			if(isset($keyval['show_clock']) && $this->IsFalse($keyval['show_clock']))
			{
				$showClock = false;
			}
			
			$mode = 'calendar';
			if(isset($keyval['mode']) && strtolower($keyval['mode']) == 'dropdown')
			{
				$mode = 'dropdown';
			}
			
			$show24h = true;
			if(isset($keyval['show24h']) && $this->IsFalse($keyval['show24h']))
			{
				$show24h = false;
			}
			
			$startHour = 0;
			$endHour   = 23;
			if(isset($keyval['start_hour']))
			{
				if(endswith($keyval['start_hour'],'pm'))
				{
					$keyval['start_hour'] = trim(str_ireplace('pm','',$keyval['start_hour'])) + 12;
				}
				else
				{
					$keyval['start_hour'] = trim(str_ireplace(array('am','pm'),'',$keyval['start_hour']));
				}
				if($keyval['start_hour'] > 0 && $keyval['start_hour'] <= $endHour)
				{
					$startHour = trim($keyval['start_hour']);
				}
			}
			if(isset($keyval['end_hour']))
			{
				if(endswith($keyval['end_hour'],'pm'))
				{
					$keyval['end_hour'] = trim(str_ireplace('pm','',$keyval['end_hour'])) + 12;
				}
				else
				{
					$keyval['end_hour'] = trim(str_ireplace(array('am','pm'),'',$keyval['end_hour']));
				}
				if($keyval['end_hour'] >= 0 && $keyval['end_hour'] < $endHour)
				{
					$endHour = trim($keyval['end_hour']);
				}
			}
			if($endHour < $startHour)
			{
				$endHour = $startHour;
			}
			$startMinute = 0;
			if(isset($keyval['start_minute']) && $keyval['start_minute'] > 0 && $keyval['start_minute'] <= 59)
			{
				$startMinute = trim($keyval['start_minute']);
			}
			$endMinute = 59;
			if(isset($keyval['end_minute']) && $keyval['end_minute'] >= 0 && $keyval['end_minute'] < 59)
			{
				$endMinute = trim($keyval['end_minute']);
			}
			if($endMinute < $startMinute)
			{
				$endMinute = $startMinute;
			}
			$startSecond = 0;
			if(isset($keyval['start_second']) && $keyval['start_second'] > 0 && $keyval['start_second'] <= 59)
			{
				$startSecond = trim($keyval['start_second']);
			}
			$endSecond = 59;
			if(isset($keyval['end_second']) && $keyval['end_second'] >= 0 && $keyval['end_second'] < 59)
			{
				$endSecond = trim($keyval['end_second']);
			}
			if($endSecond < $startSecond)
			{
				$endSecond = $startSecond;
			}
			$stepHours = 1;
			if(isset($keyval['step_hours']) && $keyval['step_hours'] > 0 && $keyval['step_hours'] <= ($endHour-$startHour))
			{
				$stepHours = trim($keyval['step_hours']);
			}
			else if(isset($keyval['step_hours']) && $keyval['step_hours'] > 0 && $keyval['step_hours'] >= ($endHour-$startHour))
			{
				$stepHours = $endHour-$startHour;
			}
			$stepMinutes = 10;
			if(isset($keyval['step_minutes']) && $keyval['step_minutes'] > 0 && $keyval['step_minutes'] <= ($endMinute-$startMinute))
			{
				$stepMinutes = trim($keyval['step_minutes']);
			}
			else if(isset($keyval['step_minutes']) && $keyval['step_minutes'] > 0 && $keyval['step_minutes'] >= ($endMinute-$startMinute))
			{
				$stepMinutes = $endMinute-$startMinute;
			}
			$stepSeconds = 1;
			if(isset($keyval['step_seconds']) && $keyval['step_seconds'] > 0 && $keyval['step_seconds'] <= ($endSecond-$startSeconds))
			{
				$stepSeconds = trim($keyval['step_seconds']);
			}
			else if(isset($keyval['step_seconds']) && $keyval['step_seconds'] > 0 && $keyval['step_seconds'] >= ($endSecond-$startSeconds))
			{
				$stepSeconds = $endSecond-$startSeconds;
			}
			$blockInfo['show24h']      = $show24h;
			$blockInfo['mode']         = $mode;
			$blockInfo['start_hour']   = $startHour;
			$blockInfo['end_hour']     = $endHour;
			$blockInfo['start_minute'] = $startMinute;
			$blockInfo['end_minute']   = $endMinute;
			$blockInfo['start_second'] = $startSecond;
			$blockInfo['end_second']   = $endSecond;
			$blockInfo['step_hours']   = $stepHours;
			$blockInfo['step_minutes'] = $stepMinutes;
			$blockInfo['step_seconds'] = $stepSeconds;
			$blockInfo['show_clock']   = $showClock;
		}
		else if ($blockInfo['type'] == 'colorpicker')
		{
			$this->_colorPickerBlocks[] = $blockInfo['id'];
		}
		else if ($blockInfo['type'] == 'slider')
		{
			$this->_sliderBlocks[] = $blockInfo['id'];
			$blockInfo['params'] = array();
			if(isset($keyval['from']))
			{
				$blockInfo['params']['from'] = intval($keyval['from']);
			}
			if(isset($keyval['to']))
			{
				$blockInfo['params']['to'] = intval($keyval['to']);
			}
			if(isset($keyval['step']))
			{
				$blockInfo['params']['step'] = intval($keyval['step']);
			}
			if(isset($keyval['round']))
			{
				$blockInfo['params']['round'] = intval($keyval['round']);
			}
			if(isset($keyval['heterogeneity']))
			{
				$blockInfo['params']['heterogeneity'] = $keyval['heterogeneity'];
			}
			if(isset($keyval['dimension']))
			{
				$blockInfo['params']['dimension'] = "'".$keyval['dimension']."'" ;
			}
			if(isset($keyval['limits']))
			{
				$blockInfo['params']['limits'] = "'".$keyval['limits']."'";
			}
			if(isset($keyval['scale']))
			{
				$blockInfo['params']['scale'] = $keyval['scale'];
			}
			if(isset($keyval['skin']))
			{
				$blockInfo['params']['skin'] = "'".$keyval['skin']."'";
			}
			if(isset($keyval['calculate']))
			{
				$blockInfo['params']['calculate'] = $keyval['calculate'];
			}
			if(isset($keyval['onstatechange']))
			{
				$blockInfo['params']['onstatechange'] = $keyval['onstatechange'];
			}
			if(isset($keyval['callback']))
			{
				$blockInfo['params']['callback'] = $keyval['callback'];
			}
		}
		else if($blockInfo['type'] == 'dropdown' || $blockInfo['type'] == 'select_multiple')
		{
			if($blockInfo['type'] == 'select_multiple')
			{
				$blockInfo['sortable'] = false;
				# deprecated
				if(isset($keyval['sortable_items']) && $this->IsTrue($keyval['sortable_items']))
				{
					$blockInfo['sortable'] = true;
				}
				if(isset($keyval['sortable']) && $this->IsTrue($keyval['sortable']))
				{
					$blockInfo['sortable'] = true;
				}
			}
			
			$blockInfo['delimiter'] = '|';
			if(isset($keyval['delimiter']) && $keyval['delimiter'] != '')
			{
				$blockInfo['delimiter'] = $keyval['delimiter'];
			}
			$blockInfo['items'] = '';
			if(isset($keyval['items']) && $keyval['items'] != '')
			{
				$blockInfo['items'] = trim($keyval['items']);
			}
			$blockInfo['values'] = '';
			if(isset($keyval['values']) && $keyval['values'] != '')
			{
				$blockInfo['values'] = trim($keyval['values']);
			}
		}
		else if($blockInfo['type'] == 'module')
		{
			$blockInfo['module'] = '';
			if(isset($keyval['module']))
			{
				$blockInfo['module'] = trim($keyval['module']);
			}
			$blockInfo['params'] = $keyval;
		}
		else if($blockInfo['type'] == 'image')
		{
			$blockInfo['prefix'] = 'thumb_';
			if(isset($keyval['prefix'])) {
				$blockInfo['prefix'] = $keyval['prefix'];
			}
			$blockInfo['exclude'] = true;
			if(isset($keyval['exclude']) && $this->IsFalse($keyval['exclude'])) {
				$blockInfo['exclude'] = false;
			}
			$blockInfo['dir'] = '';
			if(isset($keyval['dir'])) {
				$blockInfo['dir'] = $keyval['dir'];
			}
		}
		else if($blockInfo['type'] == 'multi_input')
		{
			$inputs = '';
			if(isset($keyval['inputs']))
			{
				$inputs = trim($keyval['inputs']);
			}
			
			$valueDelim = '<!-- multi_input_value_delimiter -->';
			if(isset($keyval['value_delimiter']))
			{
				$valueDelim = trim($keyval['value_delimiter']);
			}
			
			$inputDelim = '<!-- multi_input_delimiter -->';
			if(isset($keyval['input_delimiter']))
			{
				$inputDelim = trim($keyval['input_delimiter']);
			}
			$blockInfo['inputs']          = $inputs;
			$blockInfo['value_delimiter'] = $valueDelim;
			$blockInfo['input_delimiter'] = $inputDelim;
		}
		else if($blockInfo['type'] == 'multi_content')
		{
			$allowed_block_types = '';
			if(isset($keyval['allowed_block_types']))
			{
				$allowed_block_types = trim($keyval['allowed_block_types']);
			}
			$allowed_multi_inputs = '';
			if(isset($keyval['allowed_multi_inputs']))
			{
				$allowed_multi_inputs = trim($keyval['allowed_multi_inputs']);
			}
			$allowed_modules = '';
			if(isset($keyval['allowed_modules']))
			{
				$allowed_modules = trim($keyval['allowed_modules']);
			}
			$allowed_block_params = '';
			if(isset($keyval['allowed_block_params']))
			{
				$allowed_block_params = trim($keyval['allowed_block_params']);
			}
			$allowed_module_params = '';
			if(isset($keyval['allowed_module_params']))
			{
				$allowed_module_params = trim($keyval['allowed_module_params']);
			}
			$blockInfo['allowed_block_types']   = $allowed_block_types;
			$blockInfo['allowed_multi_inputs']  = $allowed_multi_inputs;
			$blockInfo['allowed_modules']       = $allowed_modules;
			$blockInfo['allowed_block_params']  = $allowed_block_params;
			$blockInfo['allowed_module_params'] = $allowed_module_params;
		}
		else if($blockInfo['type'] == 'files'){
			
			$dir = '';
			if(isset($keyval['dir']))
			{
				$dir = trim($keyval['dir']);
			}
			$blockInfo['dir'] = $dir;
			
		}
		
		return array_merge($keyval,$blockInfo);
	}
	
	private function parse_content_blocks()
	{
		if($this->_contentBlocksLoaded)
		{
			return true;
		}
		
		if($this->mType != 'content2' && $this->mType != 'content')
		{
			return true;
		}
		
		$this->_contentBlocks = array();
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		global $CMS_ADMIN_PAGE;
		if(isset($CMS_ADMIN_PAGE) && $CMS_ADMIN_PAGE == 1)
		{
			$this->_tabIds      = array();
			$this->_dateBlocks  = array();
			$this->_blockTabs   = array();
			$this->_blockGroups = array();
			
			$this->_pageTabs = array(
				'main' => array(
					'tab_id'         => 'main',
					'tab_name'       => lang('main'),
					'block_tabs'     => array(),
					'block_groups'   => array(),
					'content_blocks' => array()));
			$this->_tabIds[] = 'main';
			
			if( check_permission(get_userid(), 'Manage All Content') )
			{
				$this->_pageTabs['options'] = array(
					'tab_id'         => 'options',
					'tab_name'       => lang('options'),
					'block_tabs'     => array(),
					'block_groups'   => array(),
					'content_blocks' => array());
				$this->_tabIds[] = 'options';
			}
			
			if( check_permission(get_userid(), 'Manage AdvancedContent Options') && $AdvancedContent->GetPreference('use_advanced_pageoptions',1) )
			{
				$this->_pageTabs['AdvancedContent'] = array(
					'tab_id'         => 'AdvancedContent',
					'tab_name'       => $AdvancedContent->lang('advancedcontent_tabname'),
					'block_tabs'     => array(),
					'block_groups'   => array(),
					'content_blocks' => array());
				$this->_tabIds[] = 'AdvancedContent';
			}
		}
		else if(!$this->CheckFrontendPageAccess())
		{
			#cmsms()->GetSmarty()->clear_all_cache();
			return true;
		}
		
		$templateops =& cmsms()->GetTemplateOperations();
		
		if ($this->mTemplateId && $this->mTemplateId > -1)
		{
			$template = $templateops->LoadTemplateByID($this->mTemplateId);
			$this->_stylesheet = '../stylesheet.php?templateid='.$this->mTemplateId;
		}
		else
		{
			$template = $templateops->LoadDefaultTemplate();
		}
		
		if($template !== false)
		{
			# read content blocks
			# this will search for {content} {content_image} {content_module} and {AdvancedContent} with or without params (case insensitive)
			$pattern = '/{((AdvancedContent|content(_image|_module)?)((?!_)[^}]*))}/i';
			
			$matches = array();
			# get all the tags
			$result = preg_match_all($pattern, $template->content, $matches);
			
			if ($result && count($matches[1]) > 0)
			{
				
				# get the basic content properties
				$basicAttribs = array();
				foreach( $this->_attributes as $oneAttrib )
				{
					$basicAttribs[] = $oneAttrib[0];
				}
				
				$j = 0;
				# foreach tag
				foreach ($matches[1] as $key=>$wholetag)
				{
					$j++;
					
					if(!$blockInfo = $this->_get_block_info($wholetag))
					{
						continue;
					}
					
					# block = active?
					if(isset($blockInfo['active']) && $this->IsFalse($blockInfo['active']))
					{
						continue; # don't process inactive blocks
					}
					
					if(isset($this->_contentBlocks[$blockInfo['id']]))
					{
						$this->_contentBlocks[$blockInfo['id']]['multiple'] = true;
						continue;
					}
					
					# if this block has been added to the template after page has been created
					if(!in_array($blockInfo['id'],$this->mProperties->mPropertyNames))
					{
						$blockInfo['new_block'] = true;
					}
					
					$pageTab = preg_replace('/-+/','_',munge_string_to_url(strtolower(trim($blockInfo['page_tab']))));
					if(!isset($this->_pageTabs[$pageTab]))
					{
						$this->_pageTabs[$pageTab]['tab_id']       = $pageTab;
						$this->_pageTabs[$pageTab]['tab_name']     = $blockInfo['page_tab'];
						$this->_pageTabs[$pageTab]['block_tabs']   = array();
						$this->_pageTabs[$pageTab]['block_groups'] = array();
						$blockInfo['page_tab'] = $pageTab;
					}
					$this->_pageTabs[$pageTab]['content_blocks'][$blockInfo['id']] = $blockInfo['id'];
					
					$blockTab = '';
					if($blockInfo['block_tab'] != '')
					{
						$blockTab = $pageTab . '_' . preg_replace('/-+/','_',munge_string_to_url(strtolower(trim($blockInfo['block_tab']))));
						if(!isset($this->_blockTabs[$blockTab]))
						{
							$this->_blockTabs[$blockTab]['tab_id']       = $blockTab;
							$this->_blockTabs[$blockTab]['tab_name']     = $blockInfo['block_tab'];
							$this->_blockTabs[$blockTab]['block_groups'] = array();
						}
						$this->_blockTabs[$blockTab]['content_blocks'][$blockInfo['id']] = $blockInfo['id'];
						$this->_pageTabs[$pageTab]['block_tabs'][$blockTab]              = $blockTab;
						$blockInfo['block_tab'] = $blockTab;
					}
					
					$blockGroup = '';
					if($blockInfo['block_group'] != '')
					{
						$blockGroup = ($blockTab?$blockTab:$pageTab) . '_' . preg_replace('/-+/','_',munge_string_to_url(strtolower(trim($blockInfo['block_group']))));
						if(!isset($this->_blockGroups[$blockGroup]))
						{
							$this->_blockGroups[$blockGroup]['group_id']   = $blockGroup;
							$this->_blockGroups[$blockGroup]['group_name'] = $blockInfo['block_group'];
							$this->_pageTabs[$pageTab]['block_groups'][$blockGroup] = $blockGroup;
						}
						$this->_blockGroups[$blockGroup]['content_blocks'][$blockInfo['id']] = $blockInfo['id'];
						unset($this->_blockTabs[$blockTab]['content_blocks'][$blockInfo['id']]);
						if($blockTab)
						{
							$this->_blockTabs[$blockTab]['block_groups'][$blockGroup] = $blockGroup;
						}
						else
						{
							unset($this->_blockTabs[$blockTab]['block_groups'][$blockGroup]);
						}
						$blockInfo['block_group'] = $blockGroup;
					}
					
					# this will create an invalid block type to print out a
					# message when using a basic content property as block name
					if(in_array($blockInfo['id'], $basicAttribs)
					|| $blockInfo['id'] == $blockInfo['id'] . '_feu_action'
					|| $blockInfo['id'] == $blockInfo['id'] . '_feu_action[]'
					|| $blockInfo['id'] == $blockInfo['id'] . '_feu_access'
					|| $blockInfo['id'] == $blockInfo['id'] . '_feu_access[]'
					|| $blockInfo['id'] == 'AdvancedContentStartDate'
					|| $blockInfo['id'] == 'AdvancedContentEndDate'
					|| $blockInfo['id'] == 'AdvancedContentStartTime'
					|| $blockInfo['id'] == 'AdvancedContentEndTime'
					|| $blockInfo['id'] == 'start_date'
					|| $blockInfo['id'] == 'end_date'
					|| $blockInfo['id'] == $blockInfo['id'] . '_AdvancedContentTime'
					|| $blockInfo['id'] == $blockInfo['id'] . '_AdvancedContentDate')
					{
						$blockInfo['id'] = md5($blockInfo['id'] . $j);
						$this->_contentBlocks[$blockInfo['id']] = $blockInfo;
						$this->_contentBlocks[$blockInfo['id']]['block_type']    = '';
						$this->_contentBlocks[$blockInfo['id']]['default'] = $this->lang('error_basicattrib', $blockInfo['name']);
						
						continue;
					}
					
					$this->_contentBlocks[$blockInfo['id']] = $blockInfo;
					$this->AddExtraProperty($blockInfo['id']);
					
					if($blockInfo['block_type'] == 'multi_input' && $blockInfo['inputs'])
					{
						# get multi inputs
						$multi_input_ids = $this->CleanArray(explode(',',$blockInfo['inputs']));
						foreach($multi_input_ids as $k1=>$multi_input_id)
						{
							if(!isset($this->_multiInputs[$multi_input_id]))
							{
								$this->_multiInputs = array_merge($this->_multiInputs, $AdvancedContent->GetMultiInputFull($multi_input_ids));
								if(!isset($this->_multiInputs[$multi_input_id]))
								{
									continue;
								}
								#$this->_multiInputs[$input_id]['template'] = $AdvancedContent->GetTemplate($this->_multiInputs[$input_id]['tpl_name']);
								$pattern = '/{((AdvancedContent|content(_image|_module)?)((?!_)[^}]*))}/i';
								$matches = array();
								# get all the tags
								$result = preg_match_all($pattern, $this->_multiInputs[$multi_input_id]['input_fields'], $matches);
								
								if ($result && count($matches[1]) > 0)
								{
									# foreach tag
									foreach ($matches[1] as $k2=>$wholetag)
									{
										if(!$inputInfo = $this->_get_block_info($wholetag))
										{
											continue;
										}
										if($inputInfo['block_type'] == 'multi_input')
										{
											continue; # ToDo: display message?
										}
										#$_input_id = $inputInfo['id'];
										#$inputInfo['id'] = 'multiInput-' . $blockInfo['id'] . '-' . $multi_input_id . '-' . $k1 . '-' . $inputInfo['id'];
										$this->_multiInputs[$multi_input_id]['elements'][$k2] = $inputInfo;
									}
								}
							}
						}
					}
				}
			}
			# force a load
			$this->mProperties->Load($this->mId);
			$this->_contentBlocksLoaded = true;
		}
		return $this->_contentBlocksLoaded;
	}
	
	
	
	function display_content_block($blockInfo,$value = '',$adding = false)
	{	
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		if(method_exists($this,'_display_'.$blockInfo['block_type'].'_block'))
		{
	
			return call_user_func(array($this,'_display_'.$blockInfo['block_type'].'_block'), $blockInfo, $value, $adding);
		}
		return $AdvancedContent->lang('invalid_blocktype',$blockInfo['block_type'],$blockInfo['name']);
	}
	
	function SetProperties()
	{
		parent::SetProperties();
		
		$this->AddBaseProperty('template', 4, 0, 'int');
		$this->AddBaseProperty('pagemetadata', 20);
		
		$this->AddContentProperty('searchable', 8, 0, 'int');
		$this->AddContentProperty('pagedata', 25);
		$this->AddContentProperty('disable_wysiwyg', 60, 0, 'int');
		
		if(cms_utils::get_module('AdvancedContent')->GetPreference('use_advanced_pageoptions',1))
		{
			$this->AddContentProperty('use_expire_date', 99, 0, 'int');
			$this->AddContentProperty('start_date', 100, 0, 'int');
			$this->AddContentProperty('end_date', 101, 0, 'int');
			
			$this->AddContentProperty('feu_access', 102);
			$this->AddContentProperty('redirect_page', 103, 0, 'int');
			$this->AddContentProperty('inherit_redirect_params', 104, 0,'int');
			$this->AddContentProperty('redirect_params', 105, 0);
			$this->AddContentProperty('evaluate_smarty', 106, 0, 'int');
			$this->AddContentProperty('feu_action', 107, 0, 'int');
			$this->AddContentProperty('hide_menu_item', 108, 0, 'int');
		}
		$this->mPreview = true;
	}
	
	function ReadyForEdit()
	{
		$this->parse_content_blocks();
	}
	
	function Show($param = 'content_en')
	{
		global $CMS_ADMIN_PAGE;
		if(cms_utils::get_module('AdvancedContent')->GetPreference('use_advanced_pageoptions',1) && (!isset($CMS_ADMIN_PAGE) || $CMS_ADMIN_PAGE !== 1))
		{
			if(!$this->CheckFrontendPageAccess())
			{
				#cmsms()->GetSmarty()->clear_all_cache(); # ???
				return $this->DoFrontendPageAction();
			}
			# ToDo: hide content/redirect if page should be hidden if logged in?
		}
		
		$this->parse_content_blocks();
		$param = preg_replace('/-+/','_',munge_string_to_url($param));
		
		if(!isset($CMS_ADMIN_PAGE) || $CMS_ADMIN_PAGE !== 1)
		{
			foreach($this->_contentBlocks as $blockInfo)
			{
				if($feusers =& cms_utils::get_module('FrontEndUsers'))
				{
					if($blockInfo['feu_access'] && !$this->CheckFrontendAccess($blockInfo['feu_access']))
					{
						if($blockInfo['feu_action'] && !$this->_feuAction)
						{
							$this->_feuAction = true;
							$this->SetPropertyValue($blockInfo['id'],$feusers->DoAction('default', 'cntnt01', array('form'=>'login'), $this->mId));
						}
						else
						{
							$this->SetPropertyValue($blockInfo['id'],'');
						}
					}
				}
				if($blockInfo['block_type'] == 'date' && $blockInfo['date_format'] != '')
				{
					$this->SetPropertyValue($blockInfo['id'],strftime($blockInfo['date_format'],$this->GetPropertyValue($blockInfo['id'])));
				}
			}
		}
		
		# MLE support
		if($this->mle && $this->blockLang != '')
		{
			if($param == 'content_en')
			{
				$param = 'content'.$this->blockLang;
			}
			else if(!endswith($param,$this->blockLang))
			{
				$param .= $this->blockLang;
			}
		}
		#---
		
		$result = $this->GetPropertyValue($param);
		
		# MLE support
		if($this->mle && $this->blockLang != '')
		{
			if($result == '' && $this->defaultBlockLang != '' && $this->defaultBlockLang != $this->blockLang)
			{
				$param = str_replace($this->blockLang, $this->defaultBlockLang, $param);
				$result = $this->GetPropertyValue($param);
			}
		}
		#---
		
		return $result;
	}
	
	function TabNames()
	{
		$tabs = array(lang('main'));
		if( check_permission(get_userid(), 'Manage All Content') )
		{
			$tabs[] = lang('options');
		}
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		if( check_permission(get_userid(), 'Manage AdvancedContent Options') && $AdvancedContent->GetPreference('use_advanced_pageoptions',1))
		{
			$tabs[] = $AdvancedContent->lang('advancedcontent_tabname');
		}
		
		$this->parse_content_blocks();
		
		foreach($this->_pageTabs as $tab)
		{
			if(!in_array($tab['tab_name'], $tabs))
			{
				$tabs[] = ($tab['tab_id'] == 'options' ? lang('options') : $tab['tab_name']);
			}
			if(!in_array($tab['tab_id'], $this->_tabIds))
			{
				$this->_tabIds[] = $tab['tab_id'];
			}
		}
		return $tabs;
	}
	
	function FillParams($params, $editing = false)
	{
		if(count($_FILES))
			foreach($_FILES as $key=>$file)
				$params[$key] = $file;
		
		if(isset($params['content_type']))
		{
			$AdvancedContent =& cms_utils::get_module('AdvancedContent');
			
			$parameters = array('pagedata', 'searchable', 'disable_wysiwyg', 'feu_access', 'redirect_page', 'redirect_params', 'evaluate_smarty', 'feu_action', 'start_date', 'end_date', 'use_expire_date','hide_menu_item','inherit_redirect_params');
			
			$this->_contentBlocksLoaded = false;
			$this->mTemplateId          = isset($params['template_id']) ? $params['template_id'] : $this->mTemplateId;
			$this->mType                = isset($params['content_type']) ? $params['content_type'] : $this->mType;
			
			if($this->mType == 'content2' || $this->mType == 'content')
			{
				# add content blocks
				$this->parse_content_blocks();
				
				# added by NaN:
				$this->mParentId = isset($params['parent_id']) ? $params['parent_id'] : $this->mParentId;
				
				if(check_permission(get_userid(), 'Manage AdvancedContent Options') && cms_utils::get_module('AdvancedContent')->GetPreference('use_advanced_pageoptions',1))
				{
					$params['feu_access'] = isset($params['feu_access']) && is_array($params['feu_access']) ? $params['feu_access'] : ($editing ? $this->CleanArray(explode(',',$this->GetPropertyValue('feu_access'))) : $this->CleanArray(explode(',',$AdvancedContent->GetPreference('feu_access'))));
					# if page has no parents but wants to inherit -> remove inheritance
					if($this->mParentId <= 0 && in_array(-1, $params['feu_access']))
					{
						foreach($params['feu_access'] as $k=>$v)
						{
							if($v == -1)
							{
								unset($params['feu_access'][$k]);
							}
						}
					}
					# if there is still inheritance -> check if there actually is any feu group selected by parents
					$_feuAccess = array();
					if(in_array(-1, $params['feu_access']))
					{
						# $_feuAccess contains all feu groups (of current page as well as of all parent pages)
						$_feuAccess = $this->InheritParentProp('feu_access', $params['feu_access']);
					}
					
					# if we have selected any feu group -> disable caching and search
					if(count($_feuAccess) || (count($params['feu_access']) && !in_array(-1, $params['feu_access'])))
					{
						$params['cachable']   = false;
						$this->mCachable      = false;
						$params['searchable'] = false;
					}
					$params['feu_access'] = implode(',', $params['feu_access']);
					
					$params['redirect_page'] = isset($params['redirect_page']) ? $params['redirect_page'] : ($editing ? $this->GetPropertyValue('redirect_page') : $AdvancedContent->GetPreference('redirect_page'));
					if($this->mParentId <= 0 && $params['redirect_page'] == -1)
					{
						$params['redirect_page'] = '';
					}
					
					$params['feu_action'] = isset($params['feu_action']) ? $params['feu_action'] : ($editing ? $this->GetPropertyValue('feu_action') : $AdvancedContent->GetPreference('feu_action',1));
					if($this->mParentId <= 0 && $params['feu_action'] == -1)
					{
						$params['feu_action'] = 1;
					}
					
					$params['hide_menu_item'] = isset($params['hide_menu_item']) ? $params['hide_menu_item'] : ($editing ? $this->GetPropertyValue('hide_menu_item') : $AdvancedContent->GetPreference('hide_menu_item',0));
					if($this->mParentId <= 0 && $params['hide_menu_item'] == -1)
					{
						$params['hide_menu_item'] = 0;
					}
					
					$params['inherit_redirect_params'] = isset($params['inherit_redirect_params']) ? true : ($editing ? $this->GetPropertyValue('inherit_redirect_params') : $AdvancedContent->GetPreference('inherit_redirect_params'));
					if($this->mParentId <= 0 && $params['inherit_redirect_params'])
					{
						$params['inherit_redirect_params'] = false;
					}
					
					if($params['inherit_redirect_params']) {
						$params['redirect_params'] = -1;
						$params['evaluate_smarty'] = -1;
					}
					
					$params['use_expire_date'] = isset($params['use_expire_date']) ? $params['use_expire_date'] : ($editing ? $this->GetPropertyValue('use_expire_date') : $AdvancedContent->GetPreference('use_expire_date'));
					if($this->mParentId <= 0 && $params['use_expire_date'] == -1)
					{
						$params['use_expire_date'] = 0;
					}
					if($params['use_expire_date'] == -1)
					{
						$params['start_date'] = -1;
						$params['end_date']   = -1;
					}
					else if($params['use_expire_date'] == 0)
					{
						$params['start_date'] = '';
						$params['end_date']   = '';
					}
					else {
						if(isset($params['AdvancedContentStartTime']) && isset($params['AdvancedContentStartDate']))
						{
							$params['start_date'] = $params['AdvancedContentStartTime'] + $params['AdvancedContentStartDate'];
						}
						else
						{
							$params['start_date'] = ($editing && $this->GetPropertyValue('start_date') ? $this->GetPropertyValue('start_date') : strtotime('+' . $AdvancedContent->GetPreference("start_date",'1 week')));
						}
						if(isset($params['AdvancedContentEndTime']) && isset($params['AdvancedContentEndDate']))
						{
							$params['end_date'] = $params['AdvancedContentEndTime'] + $params['AdvancedContentEndDate'];
						}
						else
						{
							$params['end_date'] = ($editing && $this->GetPropertyValue('end_date') ? $this->GetPropertyValue('end_date') : strtotime('+' . $AdvancedContent->GetPreference("end_date",'1 week'), $params['start_date']));
						}
					}
				}
				
				# do the content property parameters
				foreach ($parameters as $oneparam)
				{
					if (isset($params[$oneparam]))
					{
						$this->SetPropertyValue($oneparam, $params[$oneparam]);
					}
				}
				if($AdvancedContent->GetPreference('use_advanced_pageoptions',1) && $this->GetPropertyValue('use_expire_date') && ($this->GetProperty('start_date') > time() || $this->GetProperty('end_date') < time()) && check_permission(get_userid(), 'Manage AdvancedContent Options'))
				{
					$params['active'] = false;
					$this->mActive    = false;
				}
				
				# metadata
				$this->mMetadata = isset($params['metadata']) ? $params['metadata'] : $this->mMetadata;
				
				# content blocks
				$i = 0;
				foreach($params as $paramName => $paramValue)
				{
					$paramName = str_replace('_AdvancedContentDate', '', $paramName);
					
					if(!isset($this->_contentBlocks[$paramName]))
					{
						continue;
					}
					
					$i++;
					$value = '';
					if($this->_contentBlocks[$paramName]['block_type'] == 'select_multiple')
					{
						if(is_array($paramValue))
						{
							$value = implode($this->_contentBlocks[$paramName]['delimiter'], $paramValue);
						}
						else if ($this->_contentBlocks[$paramName]['sortable'])
						{
							$items = array();
							foreach($params as $itemName => $itemValue) # ToDo: create function to loop only through the items not through all params!
							{
								if(startswith($itemName,$paramName.'_AdvancedContentSortableItem_'))
								{
									$items[] = $itemValue;
								}
							}
							$value = implode($this->_contentBlocks[$paramName]['delimiter'], $items);
						}
					}
					else if($this->_contentBlocks[$paramName]['block_type'] == 'date'
						&& $this->_contentBlocks[$paramName]['mode'] == 'calendar'
						&& isset($params[$paramName . '_AdvancedContentDate']))
					{
						$time = 0;
						if(isset($params[$paramName . '_AdvancedContentTime']))
						{
							$time = $params[$paramName . '_AdvancedContentTime'];
						}
						#$_tmp         = explode(':', $params[$paramName . '_AdvancedContentTime']);
						#$time_seconds = (($_tmp[0] * 3600) + ($_tmp[1] * 60));
						#$value       = $time_seconds + $params[$paramName . '_AdvancedContentDate'];
						$value        = $time + $params[$paramName . '_AdvancedContentDate'];
					}
					else if($this->_contentBlocks[$paramName]['block_type'] == 'multi_input')
					{
						$multi_inputs = array();
						foreach($this->CleanArray(explode(',',$this->_contentBlocks[$paramName]['inputs'])) as $k1=>$multi_input_id)
						{
							$multi_input_values = array();
							foreach($this->_multiInputs[$multi_input_id]['elements'] as $k2=>$inputInfo)
							{
								$inputInfo['id'] = 'multiInput-' . $paramName . '-' . $multi_input_id . '-' . $k1 . '-' . $inputInfo['id'];
								if(isset($params[$inputInfo['id']]))
								{
									$multi_input_values[] = $params[$inputInfo['id']];
								}
							}
							$multi_inputs[] = implode($this->_contentBlocks[$paramName]['value_delimiter'],$multi_input_values);
						}
						if(!$this->IsVarEmpty($multi_inputs))
						{
							$value = implode($this->_contentBlocks[$paramName]['input_delimiter'], $multi_inputs);
						}
					}
					else if($this->_contentBlocks[$paramName]['block_type'] == 'multi_content')
					{
						# ToDo
					}
					else if($this->_contentBlocks[$paramName]['block_type'] == 'addmulti'){
						
						
						$option = $this->_contentBlocks[$paramName];
						$block = $this->_contentBlocks[$paramName]['block'];
						$text = $params['multi_text_'.$block];
						
						$linkas = $params['multi_linkas_'.$block];
						$vardas = $params['multi_vardas_'.$block];
						//echo print_r($text2);
						//exit;
						$file = $params['multi_file_'.$block];
						$delete = $params['files_delete_multi_'.$block];
						$apar = array();
						$mPV = unserialize(str_replace(array('&ldelim','&rdelim'),array('{','}'),$this->mProperties->mPropertyValues[$this->_contentBlocks[$paramName]['block']]));

						for($i=1;$i<count($text);$i++){
							$z = $i - 1;
							$apar[$z]['text'] = $text[$i];
							$apar[$z]['linkas'] = $linkas[$i];
							$apar[$z]['vardas'] = $vardas[$i];
							
							debug_display($mPV);
							$data['url'] = '';
							if(is_array($mPV[$z])) $data['url'] = $mPV[$z]['file'];
							
							$data['delete'] = '0';
							if(is_array($delete)) $data['delete']=in_array($z,$delete);
							$data['dir'] = $this->_contentBlocks[$paramName]['dir'];
							$data['file'] = array('name'=>$file['name'][$i],'type'=>$file['type'][$i],'tmp_name'=>$file['tmp_name'][$i],'error'=>$file['error'][$i]);
							$apar[$z]['file'] = $this->manageFile($data);	
						}
						
						//$value = $apar;
						;
						$value = str_replace(array('{','}'),array('&ldelim','&rdelim'),serialize($apar));
						//exit;
						
					}
					else if($this->_contentBlocks[$paramName]['block_type'] == 'files'){
						global $config;
						$data['url'] = $this->mProperties->mPropertyValues[$this->_contentBlocks[$paramName]['block']];
						$data['delete']=$params['files_delete_files'];
						$data['dir'] = $this->_contentBlocks[$paramName]['dir'];
						$data['file'] = $params[$this->_contentBlocks[$paramName]['block']];
						$value = $this->manageFile($data);
					//	if(substr($value,strlen($config['uploads_url']))!='0')
					//	$value= substr($value,strlen($config['uploads_url']));
						//print_r ($params);
						//echo 'asdasd';
						//exit;
					}
					else
					{
						$value = trim($paramValue);
					}
					if($value == '' && !$this->_contentBlocks[$paramName]['allow_none'])
					{
						$value = $this->_contentBlocks[$paramName]['default'];
						if($this->_contentBlocks[$paramName]['smarty'])
						{
							$value = $this->DoSmarty($value);
						}
					}
					
					# MLE support
					if($this->mle && $this->blockLang != '' && $paramName != 'content' . $this->blockLang)
					{
						$paramName .= $this->blockLang;
					}
					#---
					
					$this->AddExtraProperty($paramName);
					$this->SetPropertyValue($paramName, $value);
				}
			}
		}
		//debug_display($params);
		//exit;
		
		#echo "<pre>";
		#echo "<code>";
		#print_r($params);
		#echo "</code>";
		#echo "</pre>";
		parent::FillParams($params, $editing);
	}
	
	function EditAsArray($adding = false, $tab = 0, $showadmin = false)
	{
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		$this->parse_content_blocks();
		$ret = array();
		$tmp = array();
		if(isset($this->_tabIds[$tab]))
		{
			$tab_id = $this->_tabIds[$tab];
		}
		else
		{
			return array();
		}
		if($tab_id == 'main' || ($tab_id == 'options' && check_permission(get_userid(), 'Manage All Content')))
		{
			$tmp = $this->CleanArray($this->display_attributes($adding, $tab));
		}
		else if($tab_id == 'AdvancedContent' && check_permission(get_userid(), 'Manage AdvancedContent Options') && $AdvancedContent->GetPreference('use_advanced_pageoptions',1))
		{
			$tmp = $this->DisplayAdvancedOptions($adding);
		}
		
		foreach( $tmp as $one )
		{
			$ret[] = $one;
		}
		
		$j = 0;
		foreach($this->_pageTabs[$tab_id]['block_groups'] as $blockGroup)
		{
			$this->_blockGroups[$blockGroup]['display'] = $AdvancedContent->GetItemDisplay('group', $blockGroup, $this->mId, $this->mTemplateId, !$AdvancedContent->GetPreference('collapse_group_default',1));
				$this->_blockGroups[$blockGroup]['pref_url'] = str_replace('&amp;','&',
					$AdvancedContent->CreateLink('m1_', 'savePrefs', '', $this->lang('toggle_group'),
						array('item_type'=>'group',
							'disable_theme'=>true,
							'ajax'=>true,
							'content_id'=>$this->mId,
							'template_id'=>$this->mTemplateId,
							'item_id'=>$blockGroup),
						'', true));
		}
		foreach($this->_pageTabs[$tab_id]['content_blocks'] as $blockId)
		{
			$j++;
			
			if($this->_contentBlocks[$blockId]['block_type'] != '' && $this->_contentBlocks[$blockId]['smarty'])
			{
				foreach($this->_contentBlocks[$blockId] as $propName=>$propValue)
				{
					$this->_contentBlocks[$blockId][$propName] = $this->DoSmarty($propValue);
				}
			}
			# MLE support
			if($this->mle && $this->blockLang != '' && $blockId != 'content' . $this->blockLang)
			{
				$value = $this->GetPropertyValue($blockId . $this->blockLang);
			}
			else #---
			{
				$value = $this->GetPropertyValue($blockId);
			}
			# MLE support
			if($this->mle && $value == '' && $this->defaultBlockLang != '' && $this->defaultBlockLang != $this->blockLang)
			{
				if($blockId != 'content' . $this->blockLang)
				{
					$value = $this->GetPropertyValue($blockId . $this->defaultBlockLang);
				}
				else
				{
					$value = $this->GetPropertyValue('content' . $this->defaultBlockLang);
				}
			}
			#---
			
			if(($adding && $value == '')
			|| ($value == '' && !$this->_contentBlocks[$blockId]['allow_none']) || $this->_contentBlocks[$blockId]['new_block'])
			{
				$value = $this->_contentBlocks[$blockId]['default'];
			}
			
			$this->_contentBlocks[$blockId]['content'] = cms_htmlentities($value, ENT_NOQUOTES, get_encoding(''));
			$this->_contentBlocks[$blockId]['input']   = $this->display_content_block($this->_contentBlocks[$blockId], $value, $adding);
			
			if($this->_contentBlocks[$blockId]['label'] == ucwords($this->_contentBlocks[$blockId]['name'])
			&& ($blockId == md5('content_en'.$j)
			|| $blockId == 'content_en'
			|| ($this->mle && $this->blockLang != ''
			&& ($blockId == 'content' . $this->blockLang
			|| $blockId == md5('content' . $this->blockLang.$j)))))
			{
				$this->_contentBlocks[$blockId]['label'] = lang('content');
			}
			
			if($this->_contentBlocks[$blockId]['translate_labels'])
			{
				$this->_contentBlocks[$blockId]['label'] = $AdvancedContent->lang($this->_contentBlocks[$blockId]['label']);
			}
			
			$blockDisplay = $AdvancedContent->GetItemDisplay('block', $blockId, $this->mId, $this->mTemplateId, !$this->_contentBlocks[$blockId]['collapse']);
			$this->_contentBlocks[$blockId]['display']  = $blockDisplay;
			$this->_contentBlocks[$blockId]['pref_url'] = str_replace('&amp;','&',
				$AdvancedContent->CreateLink('m1_', 'savePrefs', '', $AdvancedContent->lang('toggle_block'),
					array('item_type'=>'block',
						'disable_theme'=>true,
						'ajax'=>true,
						'content_id'=>$this->mId,
						'template_id'=>$this->mTemplateId,
						'item_id'=>$blockId),
					'', true));
			
			if($this->_contentBlocks[$blockId]['multiple'] && $AdvancedContent->GetItemDisplay('message', $blockId, $this->mId, $this->mTemplateId))
			{
				$hideLink = str_replace('&amp;','&',
					$AdvancedContent->CreateLink('m1_', 'savePrefs', '', $AdvancedContent->lang('toggle_message'),
						array('item_type'=>'message',
							'disable_theme'=>true,
							'ajax'=>true,
							'content_id'=>$this->mId,
							'template_id'=>$this->mTemplateId,
							'item_id'=>$blockId,
							'item_display'=>0),
						'', false,'','onclick="jQuery.get(this.href); jQuery(this).parent().toggle(\'fast\'); return false;"'));
					$this->_contentBlocks[$blockId]['description'] = '<p>'.$AdvancedContent->lang('notice_duplicatecontent', $this->_contentBlocks[$blockId]['name']).' ('. $hideLink .')</p>'.$this->_contentBlocks[$blockId]['description'];
			}
			
			if($this->_contentBlocks[$blockId]['block_tab'] != '' || $this->_contentBlocks[$blockId]['block_group'] != '')
			{
				unset($this->_pageTabs[$tab_id]['content_blocks'][$blockId]);
			}
			if($this->_contentBlocks[$blockId]['block_tab'] != '' && $this->_contentBlocks[$blockId]['block_group'] != '')
			{
				unset($this->_pageTabs[$tab_id]['block_groups'][$this->_contentBlocks[$blockId]['block_group']]);
			}
		}
		
		$AdvancedContent->smarty->assign('module_id', 'm1_');
		$AdvancedContent->smarty->assign_by_ref('page_tab_nr', $tab);
		$AdvancedContent->smarty->assign_by_ref('page_tab_id', $tab_id);
		$AdvancedContent->smarty->assign_by_ref('page_tabs', $this->_pageTabs);
		$AdvancedContent->smarty->assign_by_ref('block_tabs', $this->_blockTabs);
		$AdvancedContent->smarty->assign_by_ref('block_groups', $this->_blockGroups);
		$AdvancedContent->smarty->assign_by_ref('date_blocks', $this->_dateBlocks);
		$AdvancedContent->smarty->assign_by_ref('colorpicker_blocks', $this->_colorPickerBlocks);
		$AdvancedContent->smarty->assign_by_ref('slider_blocks', $this->_sliderBlocks);
		$AdvancedContent->smarty->assign_by_ref('content_blocks', $this->_contentBlocks);
		
		if($tab == 0)
		{
			#debug_buffer($this->_tabIds,'AdvancedContent _tabIds');
			#debug_buffer($this->_pageTabs,'AdvancedContent _pageTabs');
			#debug_buffer($this->_blockTabs,'AdvancedContent _blockTabs');
			#debug_buffer($this->_blockGroups,'AdvancedContent _blockGroups');
			#debug_buffer($this->_contentBlocks,'AdvancedContent _contentBlocks');
			
			# ugly hack!
			$headers_list = headers_list();
			$output = str_replace('</head>', $AdvancedContent->GetHeaderHTML() . '</head>', ob_get_contents());
			@ob_end_clean();
			@ob_start();
			foreach($headers_list as $header)
			{
				header($header);
			}
			echo $output;
			#--- but works :D
		}
		
		$ret[] = array('', $AdvancedContent->ProcessTemplate('contentType.tpl'));
		return $ret;
	}
	
	private function _display_text_block($blockInfo,$value = '',$adding = false)
	{
		$usewysiwyg = !$this->GetPropertyValue('disable_wysiwyg');
		if(!$usewysiwyg)
		{
			$blockInfo['usewysiwyg'] = false;
		}
		if ($blockInfo['oneline'] == false)
		{
			return create_textarea($blockInfo['usewysiwyg'], $value, $blockInfo['id'], '', $blockInfo['id'], '', $this->_stylesheet);
		}
		else
		{
			return '<input id="'.$blockInfo['id'].'" type="text"' . ($blockInfo['style'] != ''?'style="' . $blockInfo['style'] . ' "':'') . ($blockInfo['maxlength'] != ''?' maxlength="' . $blockInfo['maxlength'] . ' "':'') . ($blockInfo['size'] != ''?' size="' . $blockInfo['size'] . ' "':'') . ' name="' . $blockInfo['id'] . '" value="' . htmlspecialchars($value) . '" />';
		}
	}
	
	private function _display_colorpicker_block($blockInfo,$value = '', $adding = false)
	{
		return '# <input id="'.$blockInfo['id'].'" type="text"' . ($blockInfo['style'] != ''?'style="' . $blockInfo['style'] . ' "':'') . ' maxlength="6" size="7" name="' . $blockInfo['id'] . '" value="' . htmlspecialchars($value) . '" />';
	}
	
	private function _display_slider_block($blockInfo,$value = '', $adding = false)
	{
		return '<input id="'.$blockInfo['id'].'" type="hidden" name="' . $blockInfo['id'] . '" value="' . ($value ? $value : intval($value)) . '" />';
	}
	
	/*
	 * return the HTML to create an image dropdown in the admin console.
	 * does not include a label.
	 * taken from default contenttype (author: Calguy)
	 */
	private function _display_image_block($blockInfo,$value = '',$adding = false)
	{
		global $config;
		$adddir = get_site_preference('contentimage_path');
		if( $blockInfo['dir'] != '' )
		{
			$adddir = $blockInfo['dir'];
		}
		$dir = cms_join_path($config['uploads_path'],$adddir);
		$optprefix = '';
		#$optprefix = 'uploads';
		#if( !empty($blockInfo['dir']) ) $optprefix .= '/'.$blockInfo['dir'];
		$inputname = $blockInfo['id'];
		if( isset($blockInfo['inputname']) )
		{
			$inputname = $blockInfo['inputname'];
		}
		# mod by NaN to filter files by prefix and set "allow none"
		#$dropdown = create_file_dropdown($inputname,$dir,$value,'jpg,jpeg,png,gif',$optprefix,true);
		$dropdown = create_file_dropdown($inputname,$dir,$value,'jpg,jpeg,png,gif',$optprefix,$blockInfo['allow_none'],'',$blockInfo['prefix'],$blockInfo['exclude']);
		
		if( $dropdown === false )
		{
			$dropdown = lang('error_retrieving_file_list');
		}
		return $dropdown;
	}
	
	private function _display_addmulti_block($blockInfo,$value = '',$adding = false){
//	echo print_r($blockInfo);
		function table($val=''){
			global $config;
			$path = substr($val['file'],strlen($config['uploads_url']));
			$path = cms_join_path($config['uploads_path'],$path);
			$table .= '<table style="margin-top:10px;margin-bottom:10px" id="'.$val['table_id'].'" class="'.$val['table_class'].'">';
			$table .= '<tr><td style="vertical-align:top;"><strong>Vardas Pavardė:</strong><br /><input type="text" size="60" value="'. $val['vardas'] .'" name="multi_vardas_'. $val['val_name'] .'[]"/></td></tr>';
			if (is_file($path)) $table .= '<tr><td style="vertical-align:top;"><a target="_blank" href="'.$val['file'].'" style="text-decoration: none"><img src="'.$val['file'].'" height=200 /></a></td></tr>';	
			$table .= '<tr><td style="vertical-align:top;">&nbsp;<input type="file" name="multi_file_'.$val['val_name'].'[]" />';
			$table .= '<input type="checkbox" name="files_delete_multi_'.$val['val_name'].'[]" value="'.$val['i'].'"/><label for="rm_header_image">'.lang('deleteimage').'</label>';
			$table .= '</td></tr>';
			$table .= '<tr><td style="vertical-align:top;"><strong>Apie konsultantą:</strong><br />'.create_textarea(0, $val['text'], 'multi_text_'.$val['val_name'].'[]', '', time()).'</td></tr>';
			$table .= '<tr><td style="vertical-align:top;"><strong>Nuoroda:</strong><br /><input type="text" size="30" value="'. $val['linkas'] .'" name="multi_linkas_'. $val['val_name'] .'[]"/></td></tr>';
			$table .= '</table> <hr/>';
			
			return $table;
		}
		$javascript .= "
			<script>
			$(function(){
				$('#add_multi_new').click(function(e){
					var body = $('#addmulti_body');
					var template = $('#add_multi_template');
					var item = template.clone();
					item.removeAttr('ID');
					item.css('display','block');
					body.append(item);
				});
			});
			</script>
			";
		$value = unserialize(str_replace(array('&ldelim','&rdelim'),array('{','}'),$value));
		$table .= table(array('table_id'=>'add_multi_template', 'table_class'=>'invisible', 'val_name'=>$blockInfo['block']));
		
		if(is_array($value)){
			$i = 0;
			foreach($value as $val){
				$val['val_name'] = $blockInfo['block'];
				$val['i'] = $i++;
				$main .= table($val);
			}
		}
		
		$main .= '<input name='.$blockInfo['block'].' value="1" type="hidden"/>';
		$main .= '<div id="addmulti_body"></div>';
		$add .= '<div style="margin: 10px 0 0 0"><div style="float:left;position:relative; margin: 0 20px 0 0" class="notifications-show" id="add_multi_new" ></div><span style="line-height:20px">Prideti nauja konsultanta</span></div>';
		return $javascript.$table.$main.$add;
	}
	
	
	
	private function _display_files_block($blockInfo,$value = '',$adding = false){
		
$out .= '<table>';
		global $config;
		$path = substr($value,strlen($config['uploads_url']));
		$path = cms_join_path($config['uploads_path'],$path);
		
		if (is_file($path))
			$out .= '<tr><td style="vertical-align:top;"><a target="_blank" href="'.$value.'" style="text-decoration: none"><img src="'.$value.'" height=200 /></a></td></tr>';	
	    $out .= '<tr><td style="vertical-align:top;">&nbsp;<input type="file" name="'.$blockInfo['block'].'" />';
	    $out .= '<input type="checkbox" name="files_delete_'.$blockInfo['block'].'" value="1"/><label for="rm_header_image">'.lang('deleteimage').'</label>';
	    $out .= '</td></tr>';

		$out .= '</table>';
		return $out;
	}
	
	private function _display_module_block($blockInfo,$value = '',$adding = false)
	{
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		if($blockInfo['module'] == '')
		{
			return $AdvancedContent->lang('error_insufficient_blockparams','module',$blockInfo['name']);
		}
		if( !$module =& $AdvancedContent->GetModuleInstance($blockInfo['module']))
		{
			return $AdvancedContent->lang('error_loading_module',$blockInfo['module'],$blockInfo['name']);
		}
		if( !$module->HasCapability('contentblocks') )
		{
			return $AdvancedContent->lang('error_contentblock_support',$blockInfo['module'],$blockInfo['name']);
		}
		return $module->GetContentBlockInput($blockInfo['id'],$value,$blockInfo['params'],$adding);
	}
	
	private function _display_date_block($blockInfo,$value = '',$adding = false)
	{
		if(!$value)
		{
			$value = time();
		}
		
		$date = strftime('%x', intval($value));
		$time = '0:0';
		if($blockInfo['show_clock'])
		{
			$time = strftime('%H:%M', intval($value));
		}
		
		$_tmp        = $this->CleanArray(explode(':',$time));
		$timeSeconds = (($_tmp[0] * 3600) + ($_tmp[1] * 60));
		$dateSeconds = $value - $timeSeconds;
		
		$dateInput = '<img id="'.$blockInfo['id'].'_AdvancedContentDatePickerTrigger" src="../modules/AdvancedContent/images/calendar.png" class="calendarTrigger" />&nbsp;
			<span id="'.$blockInfo['id'].'_AdvancedContentDatePickerDisplay">'.$date.'</span>
			<input id="'.$blockInfo['id'].'_AdvancedContentDate" type="hidden" name="'.$blockInfo['id'].'_AdvancedContentDate" value="'.$dateSeconds.'" />';
			
		$suffix    = '';
		$timeInput = '';
		if($blockInfo['show_clock'])
		{
			$timeInput = '&nbsp;&nbsp;-&nbsp;&nbsp;<select name="'.$blockInfo['id'].'_AdvancedContentTime">';
			$_i        = 0;
			for($i=$blockInfo['start_hour']; $i<=$blockInfo['end_hour']; $i += $blockInfo['step_hours'])
			{
				if($i<12 && !$blockInfo['show24h'])
				{
					$suffix = ' am';
				}
				else if(!$blockInfo['show24h'])
				{
					$suffix = ' pm';
				}
				for($j=$blockInfo['start_minute']; $j<=$blockInfo['end_minute']; $j += $blockInfo['step_minutes'])
				{
					$value = ($i*3600) + ($j*60);
					if(($blockInfo['end_hour'] < 23 && $value <= ($blockInfo['end_hour'] * 3600)) || $blockInfo['end_hour'] == 23)
					{
						$timeInput .= '<option value="'. $value .'"'. ($value == $timeSeconds? ' selected="selected"':'') .'>'. ($i<10?'0'.$i:(!$blockInfo['show24h'] && $i>12?$i-12:$i)) .':'. ($j<10?'0'.$j:$j) . $suffix . '</option>';
					}
				}
				$j = $blockInfo['start_minute'];
			}
			$timeInput .= '</select>';
		}
		return $dateInput.$timeInput;
	}
	
	private function _display_checkbox_block($blockInfo,$value = '',$adding = false)
	{
		return '<input type="hidden" name="' . $blockInfo['id'] . '" value="0" />
			<input id="'.$blockInfo['id'].'" class="pagecheckbox"' . ($blockInfo['style'] != ''?' style="' . $blockInfo['style'] . ' "':'') . ' type="checkbox" value="1" name="' . $blockInfo['id'] . '"' . ($value == 1 ? ' checked="checked"':'') . ' />';
	}
	
	private function _display_dropdown_block($blockInfo,$value = '',$adding = false)
	{
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		$items = array();
		if($blockInfo['items']=='quirdzz'){
			$ar = array(1,2,3,4);
			    global $gCms;
				$db = $gCms->getDB();
				$ret = $db->GetCol('SELECT name FROM cms_module_qz_quizzes'); 				
			$blockInfo['items'] = implode('|',$ret);	
		}
		if($blockInfo['items']=='su' || $blockInfo['items']=='be'){
			//$ar = array(1,2,3,4);
				//$contentops = $gCms->GetContentOperations();
				//$mod->smarty->assign('input_redirect_page',$contentops->CreateHierarchyDropdown('',$this->GetAttr('redirect_page','0'), $id.'fbrp_forma_redirect_page'));
			    global $gCms;
				$db = $gCms->getDB();
				$ret = $db->GetCol('SELECT hierarchy_path  FROM cms_content'); 				
			$blockInfo['items'] = implode('|',$ret);	
		}
		if($blockInfo['items'] != '')
		{
			foreach(explode($blockInfo['delimiter'], $blockInfo['items']) as $key => $val)
			{
				$items[$key]['label'] = trim($val);
				if($blockInfo['translate_labels'])
				{
					$items[$key]['label'] = $AdvancedContent->lang($items[$key]['label']);
				}
				
				$items[$key]['value']    = $items[$key]['label'];
				$items[$key]['selected'] = (trim($value) === $items[$key]['value']);
			}
		}
		if($blockInfo['values'] != '')
		{
			foreach(explode($blockInfo['delimiter'], $blockInfo['values']) as $key => $val)
			{
				$items[$key]['value'] = trim($val);
				if($blockInfo['translate_values'])
				{
					$items[$key]['value'] = $AdvancedContent->lang($items[$key]['value']);
				}
				
				$items[$key]['selected'] = (trim($value) === $items[$key]['value']);
				
				if(!isset($items[$key]['label']))
				{
					$items[$key]['label'] = $items[$key]['value'];
				}
			}
		}
		
		$input = '<select name="' . $blockInfo['id'] . '" ' . ($blockInfo['style'] != ''?'style="' . $blockInfo['style'] . ' "':'') . ' >';
		foreach($items as $item)
		{
			$input .= '<option value="' . $item['value'] . '"';
			if($item['selected'])
			{
				$input .= ' selected="selected"';
			}
			$input .= '>' . $item['label'] . '</option>';
		}
		$input .= '</select>';
		return $input;
	}
	
	private function _display_select_multiple_block($blockInfo, $value = '',$adding = false)
	{
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		$selItems = array();
		foreach(explode($blockInfo['delimiter'], $value) as $key => $val)
		{
			$selItems[$key] = trim($val);
		}
		$items = array();
		if($blockInfo['items'] != '')
		{
			foreach(explode($blockInfo['delimiter'], $blockInfo['items']) as $key => $val)
			{
				$items[$key]['label'] = trim($val);
				if($blockInfo['translate_labels'])
				{
					$items[$key]['label'] = $AdvancedContent->lang($items[$key]['label']);
				}
				
				$items[$key]['value']    = $items[$key]['label'];
				$items[$key]['selected'] = in_array($items[$key]['label'],$selItems);
			}
		}
		if($blockInfo['values'] != '')
		{
			foreach(explode($blockInfo['delimiter'], $blockInfo['values']) as $key => $val)
			{
				$items[$key]['value'] = trim($val);
				if($blockInfo['translate_values'])
				{
					$items[$key]['value'] = $AdvancedContent->lang($items[$key]['value']);
				}
				
				$items[$key]['selected'] = in_array($items[$key]['value'],$selItems);
				if(!isset($items[$key]['label']))
				{
					$items[$key]['label'] = $items[$key]['value'];
				}
			}
		}
		
		$input = '<input type="hidden" value="" name="' . $blockInfo['id'] . '" />';
		
		if(!$blockInfo['sortable'])
		{
			$size = count($items);
			if(isset($blockInfo['size']))
			{
				$size = $blockInfo['size'];
			}
			$input .= '
				<select name="' . $blockInfo['id'] . '[]"' . ($blockInfo['style'] != ''?' style="' . $blockInfo['style'] . ' "':'') . '  multiple="multiple" size="'.$size.'">';
			foreach($items as $item)
			{
				$input .= '<option value="' . $item['value'] . '"';
				if($item['selected'])
				{
					$input .= ' selected="selected"';
				}
				$input .= '>' . $item['label'] . '</option>';
			}
			$input .= '</select>';
		}
		else
		{
			# sort the items
			$_items = array();
			foreach($selItems as $selKey => $selItem)
			{
				reset($items);
				foreach($items as $itemKey => $item)
				{
					if($item['value'] === $selItem)
					{
						$_items[] = $item;
						unset($items[$itemKey]);
						unset($selItems[$selKey]);
						break;
					}
				}
			}
			
			$items = array_merge($_items,$items);
			$input .= '<div class="sortable_wrapper">';
			foreach($items as $item)
			{
				$input .=
				'<div class="sortable">
					<img class="sortable_handler" src="../modules/AdvancedContent/images/sort.png" />
					<input class="pagecheckbox"' . ($blockInfo['style'] != ''?' style="' . $blockInfo['style'] . ' "':'') . ' type="checkbox" value="'.$item['value'].'" name="' . $blockInfo['id'] . '_AdvancedContentSortableItem_' . munge_string_to_url($item['label']) . '"' . ($item['selected']? ' checked="checked"':'') . ' />
					'.$item['label'].'
				</div>';
			}
			$input .= '</div>';
		}
		return $input;
	}
	
	private function _display_multi_input_block($blockInfo, $value = '',$adding = false)
	{
	
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		$multi_input_ids = $this->CleanArray(explode(',',$blockInfo['inputs']));
		$input_values    = array();
		$multi_input     = '<input type="hidden" value="" name="' . $blockInfo['id'] . '" />';
		foreach(explode($blockInfo['input_delimiter'],$value) as $input_data)
		{
			$input_values[] = explode($blockInfo['value_delimiter'],$input_data);
		}
		foreach($multi_input_ids as $k1=>$multi_input_id)
		{
			if(isset($this->_multiInputs[$multi_input_id]))
			{
				if(!isset($this->_multiInputs[$multi_input_id]['template']))
				{
					$this->_multiInputs[$multi_input_id]['template'] = $AdvancedContent->GetTemplate($this->_multiInputs[$multi_input_id]['tpl_name']);
				}
				$inputs = array();
				# foreach tag
				foreach ($this->_multiInputs[$multi_input_id]['elements'] as $k2=>$inputInfo)
				{
					if($inputInfo['smarty'])
					{
						foreach($inputInfo as $propName=>$propValue)
						{
							$inputInfo[$propName] = $this->DoSmarty($propValue);
						}
					}
					$inputInfo['id'] = 'multiInput-' . $blockInfo['id'] . '-' . $multi_input_id . '-' . $k1 . '-' . $inputInfo['id'];
					$inputs[$inputInfo['id']] = $inputInfo;
					$inputs[$inputInfo['id']]['input'] = $this->display_content_block($inputInfo, (isset($input_values[$k1][$k2]) ?$input_values[$k1][$k2]:''), $adding);
				}
				$AdvancedContent->smarty->assign_by_ref('inputs', $inputs);
				$multi_input .= $AdvancedContent->ProcessTemplateFromData($this->_multiInputs[$multi_input_id]['template']);
			}
		}
		return $multi_input;
	}
	
	#ToDo:...
	private function _display_multi_content_block($blockInfo, $value = '',$adding = false)
	{
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		$blockInfo['content_blocks'] = unserialize($value);
		if(is_array($blockInfo['content_blocks']))
		{
			foreach($multi_content_blocks as $_blockInfo)
			{
				# MLE support
				$_value = $this->GetPropertyValue($_blockInfo['id'] . $this->blockLang);
				if($this->mle && $_value == '' && $this->defaultBlockLang != '' && $this->defaultBlockLang != $this->blockLang)
				{
					$_value = $this->GetPropertyValue($_blockInfo['id'] . $this->defaultBlockLang);
				}
				#---
				
				if(($adding && $_value == '')
				|| ($_value == '' && !$_blockInfo['allow_none']))
				{
					$_value = $_blockInfo['default_value'];
				}
				
				$multi_content_blocks[$_blockInfo['id']]['content'] = cms_htmlentities($_value, ENT_NOQUOTES, get_encoding(''));
				$multi_content_blocks[$_blockInfo['id']]['input']   = $this->display_content_block($_blockInfo, $_value, $adding);
				
				$this->AddExtraProperty($_blockInfo['id']);
				$this->SetPropertyValue($_blockInfo['id'], $_value); # ???
			}
			#$this->mProperties->Load($this->mId); # ???
		}
		else
		{
			$blockInfo['content_blocks'] = array();
		}
		$blockInfo['content_blocks_count'] = count($blockInfo['content_blocks']);
		$AdvancedContent->smarty->assign_by_ref('multicontent_id', $blockInfo['id']);
		$AdvancedContent->smarty->assign_by_ref('block_info', $blockInfo);
		$AdvancedContent->smarty->assign('add_content_block', '<a href="#" onclick="AdvancedContent.openPanel(\''.$blockInfo['id'].'\'); return false;">'.
			cmsms()->variables['admintheme']->DisplayImage('icons/system/newobject.gif', '','','','systemicon') .
			'&nbsp;' . $this->lang('add_content_block') . '</a>');
		
		$AdvancedContent->smarty->assign('remove_content_block', '<a href="#" onclick="AdvancedContent.deleteBlock(\''.$blockInfo['id'].'\'); return false;">'.
			cmsms()->variables['admintheme']->DisplayImage('icons/system/delete.gif', '','','','systemicon') .
			'&nbsp;' . $this->lang('remove_content_block') . '</a>');
		
		return $AdvancedContent->ProcessTemplate('multiContent.tpl');
	}
	
	function ValidateData()
	{
		$errors = parent::ValidateData();
		if( $errors === FALSE )
		{
			$errors = array();
		}
		
		if ($this->mTemplateId <= 0 )
		{
			$errors[] = lang('nofieldgiven', array(lang('template')));
			$result   = false;
		}
		
		foreach($this->_contentBlocks as $blockInfo)
		{
			if($blockInfo['required'] && $this->GetProperty($blockInfo['id']) == '')
			{
				$errors[] = lang('nofieldgiven', array($blockInfo['name']));
				$result   = false;
			}
		}
		if($this->GetPropertyValue('use_expire_date') && check_permission(get_userid(), 'Manage AdvancedContent Options') && $this->GetProperty('end_date') <= $this->GetProperty('start_date'))
		{
			$AdvancedContent =& cms_utils::get_module('AdvancedContent');
			$errors[] = $AdvancedContent->lang('error_expiredate');
			$result   = false;
		}
		return (count($errors) > 0?$errors:FALSE);
	}
	
	function ContentPreRender($tplSource)
	{
		$this->parse_content_blocks();
		return $tplSource;
	}
	
	function display_single_element($one, $adding)
	{
		switch($one)
		{
			case 'template':
				$templateops =& cmsms()->GetTemplateOperations();
				return array(lang('template') . ':', $templateops->TemplateDropdown('template_id', $this->mTemplateId, 'onchange="document.Edit_Content.submit()"'));
			
			case 'pagemetadata':
				return array(lang('page_metadata') . ':', create_textarea(false, $this->mMetadata, 'metadata', 'pagesmalltextarea', 'metadata', '', '', '80', '6'));
			
			case 'pagedata':
				return array(lang('pagedata_codeblock') . ':', create_textarea(false, $this->GetPropertyValue('pagedata'), 'pagedata', 'pagesmalltextarea', 'pagedata', '', '', '80', '6'));
			
			case 'searchable':
				$searchable = $this->GetPropertyValue('searchable');
				if( $searchable == '' )
				{
					$searchable = 1;
				}
				return array(lang('searchable') . ':',
					'<div class="hidden" ><input type="hidden" name="searchable" value="0" /></div>
					<input type="checkbox" name="searchable" value="1" ' . ($searchable == 1?'checked="checked"':'') . ' />');
			
			case 'disable_wysiwyg':
				$disableWysiwyg = $this->GetPropertyValue('disable_wysiwyg');
				if( $disableWysiwyg == '' )
				{
					$disableWysiwyg = 0;
				}
				return array(lang('disable_wysiwyg') . ':',
					'<div class="hidden" ><input type="hidden" name="disable_wysiwyg" value="0" /></div>
					<input type="checkbox" name="disable_wysiwyg" value="1"  ' . ($disableWysiwyg == 1?'checked="checked"':'') . ' onclick="this.form.submit()" />');
			
			default:
				if($one != 'feu_access'
				&& $one != 'redirect_page'
				&& $one != 'redirect_params'
				&& $one != 'evaluate_smarty'
				&& $one != 'feu_action'
				&& $one != 'start_date'
				&& $one != 'end_date'
				&& $one != 'use_expire_date'
				&& $one != 'hide_menu_item'
				&& $one != 'inherit_redirect_params')
				{
					return parent::display_single_element($one, $adding); # ToDo: here we can hook in to add MLE features for title and menutext etc.)
				}
				break;
		}
	}

/**
 * -----------------------------------------------------------------------------
 * Custom functions
 * -----------------------------------------------------------------------------
 */
 
	/**
	 * Display the advanced options
	 * @param boolean $adding - true if page is added, false if edited
	 * @return array - array(array(prompt,imput))
	 */
	private function DisplayAdvancedOptions($adding)
	{
		$AdvancedContent =& cms_utils::get_module('AdvancedContent');
		$ret = array();
		foreach( $this->_attributes as $oneAttrib )
		{
			switch($oneAttrib[0])
			{
				case 'feu_access':
					if($feusers =& cms_utils::get_module('FrontEndUsers'))
					{
						if($adding)
						{
							$selectedGroups = $AdvancedContent->GetPreference('feu_access');
						}
						else
						{
							$selectedGroups = $this->GetPropertyValue('feu_access');
						}
						$delim          = strpos($selectedGroups,',') === FALSE ? ';' : ',';
						$selectedGroups = $this->CleanArray(explode($delim,$selectedGroups));
						
						$feuAccess = array($AdvancedContent->lang('inherit_from_parent')=>-1);
						$feuAccess = array_merge($feuAccess,$feusers->GetGroupList());
						$ret[] = array($AdvancedContent->lang('frontendaccess').' : ',
							'<input type="hidden" value="" name="feu_access" />'.
							$AdvancedContent->CreateInputSelectList('','feu_access[]',$feuAccess,$selectedGroups,count($feuAccess),'',1));
					}
					break;
				
				case 'redirect_page':
					if($feusers =& cms_utils::get_module('FrontEndUsers'))
					{
						if($adding)
						{
							$this->SetPropertyValue("redirect_page",$AdvancedContent->GetPreference('redirect_page',''));
						}
						$ret[] = array($AdvancedContent->lang('redirectpage').' : ',
							$AdvancedContent->CreateRedirectDropdown('', 'redirect_page',$this->GetPropertyValue("redirect_page"), $this->mId));
					}
					break;
				
				case 'redirect_params':
					if($feusers =& cms_utils::get_module('FrontEndUsers'))
					{
						if($adding)
						{
							$this->SetPropertyValue('inherit_redirect_params',$AdvancedContent->GetPreference('inherit_redirect_params',''));
							$this->SetPropertyValue("redirect_params",$AdvancedContent->GetPreference('redirect_params',''));
							$this->SetPropertyValue("evaluate_smarty",$AdvancedContent->GetPreference('evaluate_smarty',''));
						}
						$inheritParams  = $this->GetPropertyValue('inherit_redirect_params');
						$redirectParams = $this->GetPropertyValue("redirect_params");
						$evaluateSmarty = $this->GetPropertyValue("evaluate_smarty");
						$ret[] = array('<span class="AdvancedContent_redirect_params" style="overflow:hidden;white-space:nowrap;'.(!$this->GetPropertyValue("redirect_page") ? 'display:none' :'').'">' . $AdvancedContent->lang('redirectparams').' : </span>',
							'<span class="AdvancedContent_redirect_params" style="overflow:hidden;white-space:nowrap;'.(!$this->GetPropertyValue("redirect_page") ? 'display:none' :'').'">'.$AdvancedContent->lang('inherit_from_parent') . ' : ' .
							'<input type="checkbox" name="inherit_redirect_params" value="1" ' . ($inheritParams ? 'checked="checked"':'') . ' onchange="if(this.checked){jQuery(\'#AdvancedContent_redirect_params_wrapper input\').attr(\'disabled\',\'disabled\');if(jQuery(\'#AdvancedContent_redirect_params_wrapper\').css(\'display\') != \'none\'){jQuery(\'#AdvancedContent_redirect_params_wrapper\').slideUp();}}else{jQuery(\'#AdvancedContent_redirect_params_wrapper input\').removeAttr(\'disabled\');if(jQuery(\'#AdvancedContent_redirect_params_wrapper\').css(\'display\') == \'none\'){jQuery(\'#AdvancedContent_redirect_params_wrapper\').slideDown();}}"/><br /><br />
							<span id="AdvancedContent_redirect_params_wrapper" style="overflow:hidden;white-space:nowrap;'.($inheritParams ? 'display:none' :'').'"><input class="AdvancedContent_redirect_params" type="text" size="32" maxlength="128" name="redirect_params" value="'.($inheritParams ? '' : $redirectParams).'" '.($inheritParams ? 'disabled="disabled" ' : '').'/>&nbsp;<em>(param1=value1 param2=value2 ...)</em><br /><br />'.
							$AdvancedContent->lang('evaluatesmarty') . ' : '.
							'<input type="hidden" name="evaluate_smarty" value="0" '.($inheritParams ? 'disabled="disabled" ' : '').'/>
							<input type="checkbox" name="evaluate_smarty" value="1"  ' . ($evaluateSmarty == 1 && !$inheritParams ? 'checked="checked" ':'') . ($inheritParams ? 'disabled="disabled" ' : '').'/></span></span>');
					}
					break;
				
				case 'feu_action':
					if($feusers =& cms_utils::get_module('FrontEndUsers'))
					{
						if($adding)
						{
							$this->SetPropertyValue('feu_action', $AdvancedContent->GetPreference('feu_action',1));
						}
						$ret[] = array($AdvancedContent->lang('showloginform').' : ',
							$AdvancedContent->CreateInputDropdown('','feu_action',
								array($AdvancedContent->lang('yes')=>1,
									$AdvancedContent->lang('no')=>0,
									$AdvancedContent->lang('inherit_from_parent')=>-1),
								0,$this->GetPropertyValue('feu_action')));
					}
					break;
				
				case 'use_expire_date':
					if($adding)
					{
						$useExp    = $AdvancedContent->GetPreference('use_expire_date',false);
						$startDate = strtotime('+' . $AdvancedContent->GetPreference("start_date",'1 week'));
						$endDate   = strtotime('+' . $AdvancedContent->GetPreference("end_date",'1 week'), $startDate);
					}
					else
					{
						$useExp    = $this->GetPropertyValue('use_expire_date');
						$startDate = $this->GetPropertyValue('start_date') ? $this->GetPropertyValue('start_date') : strtotime('+' . $AdvancedContent->GetPreference("start_date",'1 week'));
						$endDate   = $this->GetPropertyValue('end_date') ? $this->GetPropertyValue('end_date') : strtotime('+' . $AdvancedContent->GetPreference("end_date",'1 week'), $startDate);
					}
					$date        = strftime('%x', intval($startDate));
					$time        = strftime('%H:%M', intval($startDate));
					$_tmp        = $this->CleanArray(explode(':',$time));
					$timeSeconds = (($_tmp[0] * 3600) + ($_tmp[1] * 60));
					$dateSeconds = $startDate - $timeSeconds;
					
					$dateInput = '<br /><br />
						<span id="AdvancedContent_expire_date_wrapper" style="overflow:hidden;white-space:nowrap;'.($useExp <= 0 ? 'display:none' : '').'"><strong>'.
						$AdvancedContent->lang('startdate').' : </strong><br />
						<img id="AdvancedContentStartDatePickerTrigger" src="../modules/AdvancedContent/images/calendar.png" class="calendarTrigger" />&nbsp;
						<span id="AdvancedContentStartDatePickerDisplay">'.$date.'</span>&nbsp;&nbsp;-&nbsp;&nbsp;
						<input id="AdvancedContentStartDate" type="hidden" '.($useExp <= 0 ? 'disabled="disabled"' : '').' name="AdvancedContentStartDate" value="'.($useExp > 0 ? $dateSeconds : $useExp).'" />
						<select name="AdvancedContentStartTime" '.($useExp <= 0 ? 'disabled="disabled"' : '').'>';
						
					for($i=0; $i<=23; $i++)
					{
						for($j=0; $j<=59; $j++)
						{
							$value = ($i*3600) + ($j*60);
							$dateInput .= '<option value="'. $value .'"'. ($value == $timeSeconds && $useExp > 0 ? ' selected="selected" ':'') . '>'. ($i<10?'0'.$i:$i) .':'. ($j<10?'0'.$j:$j) .'</option>';
						}
						$j = 0;
					}
					$dateInput .= '</select><br /><br />';
					
					$date        = strftime('%x', intval($endDate));
					$time        = strftime('%H:%M', intval($endDate));
					$_tmp        = $this->CleanArray(explode(':',$time));
					$timeSeconds = (($_tmp[0] * 3600) + ($_tmp[1] * 60));
					$dateSeconds = $endDate - $timeSeconds;
					
					$dateInput .= '<strong>' . $AdvancedContent->lang('enddate').' : </strong><br />
						<img id="AdvancedContentEndDatePickerTrigger" src="../modules/AdvancedContent/images/calendar.png" class="calendarTrigger" />&nbsp;
						<span id="AdvancedContentEndDatePickerDisplay">'.$date.'</span>&nbsp;&nbsp;-&nbsp;&nbsp;
						<input id="AdvancedContentEndDate" type="hidden" '.($useExp <= 0 ? 'disabled="disabled"' : '').' name="AdvancedContentEndDate" value="'.($useExp > 0 ? $dateSeconds : $useExp).'" />
						<select name="AdvancedContentEndTime" '.($useExp <= 0 ? 'disabled="disabled"' : '').'>';
						
					for($i=0; $i<=23; $i++)
					{
						for($j=0; $j<=59; $j++)
						{
							$value = ($i*3600) + ($j*60);
							$dateInput .= '<option value="'. $value .'"'. ($value == $timeSeconds && $useExp > 0 ? ' selected="selected"':'') .'>'. ($i<10?'0'.$i:$i) .':'. ($j<10?'0'.$j:$j) .'</option>';
						}
						$j = 0;
					}
					$dateInput .= '</select></span>';
					
					$ret[] = array($AdvancedContent->lang('useexpiredate') . ':',
						$AdvancedContent->CreateInputDropdown('','use_expire_date',
								array($AdvancedContent->lang('yes')=>1,
									$AdvancedContent->lang('no')=>0,
									$AdvancedContent->lang('inherit_from_parent')=>-1),
								-1,$useExp,'onchange="if(this.value != \'1\'){jQuery(\'#AdvancedContent_expire_date_wrapper input, #AdvancedContent_expire_date_wrapper select, #AdvancedContent_expire_date_wrapper textarea\').attr(\'disabled\',\'disabled\');if(jQuery(\'#AdvancedContent_expire_date_wrapper\').css(\'display\') != \'none\'){jQuery(\'#AdvancedContent_expire_date_wrapper\').slideUp();}}else{jQuery(\'#AdvancedContent_expire_date_wrapper input, #AdvancedContent_expire_date_wrapper select, #AdvancedContent_expire_date_wrapper textarea\').removeAttr(\'disabled\');if(jQuery(\'#AdvancedContent_expire_date_wrapper\').css(\'display\') == \'none\'){jQuery(\'#AdvancedContent_expire_date_wrapper\').slideDown();}}"') . $dateInput);
					
					break;
					
				case 'hide_menu_item':
					if($feusers =& cms_utils::get_module('FrontEndUsers'))
					{
						if($adding)
						{
							$hide = $AdvancedContent->GetPreference('hide_menu_item',0);
						}
						else
						{
							$hide = $this->GetPropertyValue('hide_menu_item');
						}
						$ret[] = array($AdvancedContent->lang('hide_menu_item') . ':',
							$AdvancedContent->CreateInputDropdown('','hide_menu_item',
								array($AdvancedContent->lang('no')=>0,
									$AdvancedContent->lang('loggedout')=>1,
									$AdvancedContent->lang('loggedin')=>2,
									$AdvancedContent->lang('inherit_from_parent')=>-1),
								0,$hide));
					}
					break;
				
				default:break;
			}
		}
		return $ret;
	}
	
	
	/**
	 * This is just a wrapper to process a template from data
	 * @param string $data - The template content to process
	 * @return string - The processed template data
	 */
	function DoSmarty($data)
	{
		if(is_array($data))
		{
			foreach($data as $k => $v)
			{
				$data[$k] = $this->DoSmarty($v);
			}
		}
		if(!is_array($data) && !is_object($data) && preg_match_all('/:::([^:]+):::/', $data, $matches))
		{
			$AdvancedContent =& cms_utils::get_module('AdvancedContent');
			$AdvancedContent->smarty->assign_by_ref('content_obj', $this);
			$AdvancedContent->smarty->assign_by_ref('content_id', $this->mId);
			$AdvancedContent->smarty->assign_by_ref('content_alias', $this->mAlias);
			$AdvancedContent->smarty->assign_by_ref('page', $this->mAlias);
			$AdvancedContent->smarty->assign_by_ref('page_id', $this->mAlias);
			$AdvancedContent->smarty->assign_by_ref('page_alias', $this->mAlias);
			$AdvancedContent->smarty->assign_by_ref('page_name', $this->mAlias);
			$AdvancedContent->smarty->assign_by_ref('position', $this->mHierarchy);
			$AdvancedContent->smarty->assign('friendly_position', cmsms()->GetContentOperations()->CreateFriendlyHierarchyPosition($this->mHierarchy));
			$data = $AdvancedContent->ProcessTemplateFromData(preg_replace('/:::([^:]+):::/', '{$1}', $data));
		}
		return $data;
	}
	
	function InheritParentProp($propName, $currentProp = array())
	{
		return cms_utils::get_module('AdvancedContent')->InheritParentProp($this->mId, $this->mParentId, $propName, $currentProp);
	}
	
	/**
	 * Get the groups of the backend user
	 * @return array
	 * @access private
	 */
	private function &GetUserGroups()
	{
		if(!$this->_userGroups)
		{
			$db =& cmsms()->GetDb();
			$this->_userGroups = array();
			$query = "SELECT group_id FROM ".cms_db_prefix()."user_groups WHERE user_id = ?";
			$dbresult = $db->Execute($query, array(get_userid()));
			while( $dbresult && $row = $dbresult->FetchRow() )
			{
				$this->_userGroups[] = $row['group_id'] * -1;
			}
		}
		return $this->_userGroups;
	}
	
	
	/**
	 * Get all backend groups
	 * @return array
	 * @access private
	 */
	private function &GetAllGroups()
	{
		if(!$this->_allGroups)
		{
			$groupOps         =& cmsms()->GetGroupOperations();
			$this->_allGroups = $groupOps->LoadGroups();
		}
		return $this->_allGroups;
	}
	
	
	/**
	 * Get all backend users
	 * @return array
	 * @access private
	 */
	private function &GetAllUsers()
	{
		if(!$this->_allUsers)
		{
			$userOps         =& cmsms()->GetUserOperations();
			$this->_allUsers =& $userOps->LoadUsers();
		}
		return $this->_allUsers;
	}
	
	
	/**
	 * Checks if a backend user has sufficient permission to edit a block
	 * @param array $blockInfo - the block to check the persmission
	 * @return boolean
	 * @access private
	 */
	private function CheckBlockPermission(&$blockInfo)
	{
		$addt_editors = array();
		# check if user has permission to edit this block
		if(($blockInfo['editor_users'] != '' || $blockInfo['editor_groups'] != '')
			&& !check_permission(get_userid(), 'Manage All AdvancedContent Blocks'))
		{
			$editorGroups =  $this->CleanArray(explode(',',$blockInfo['editor_groups']));
			$editorUsers  =  $this->CleanArray(explode(',',$blockInfo['editor_users']));
			foreach ($this->_allGroups as $oneGroup)
			{
				if(in_array($oneGroup->name,$editorGroups))
				{
					$addt_editors[] = $oneGroup->id*-1;
				}
			}
			
			foreach ($this->_allUsers as $oneUser)
			{
				if(in_array($oneUser->username,$editorUsers))
				{
					$addt_editors[] = $oneUser->id;
				}
			}
			
			if(!in_array(get_userid(),$addt_editors)
				&& !count(array_intersect($this->GetUserGroups(),$addt_editors)))
			{
				return false;
			}
		}
		return true;
	}
	
	
	/**
	 * checks if a var is really empty. 
	 * if var is an array it recursivley checks all elements
	 *
	 * @param mixed $var - the var to check for empty value(s)
	 * @param boolean $trim - true to trim off spaces
	 * @param boolean $unsetEmptyIndexes - true to delete empty elements from array
	 * @return boolean - true if empty, false if not
	 */
	function IsVarEmpty(&$var, $trim = true, $unsetEmptyIndexes = false)
	{
		if (is_array($var))
		{
			foreach ($var as $k=>$v)
			{
				if (!$this->IsVarEmpty($v))
				{
					return false;
				}
				else
				{
					if($unsetEmptyIndexes)
					{
						unset($var[$k]);
					}
					return true;
				}
			}
		}
		else if($trim && trim($var) == '')
		{
			return true;
		}
		else if($var == '')
		{
			return true;
		}
		return false;
	}
	
	
	/**
	 * function CleanArray($array)
	 * not part of the module api
	 * removes empty elements from an array
	 * (can be useful when using function explode to create the array of a csv)
	 *
	 * @param array $array - the array to clean up
	 * @return array - an array without empty elements or an empty array
	 */
	function CleanArray($array)
	{
		if (!is_array($array))
		{
			return array();
		}
		foreach ($array as $k=>$v)
		{
			if ($this->IsVarEmpty($v,true,true))
			{
				unset($array[$k]);
			}
			else if(is_array($v))
			{
				$v = $this->CleanArray($v);
				if($this->IsVarEmpty($v,true,true))
				{
					unset($array[$k]);
				}
				else
				{
					$array[$k] = $v;
				}
			}
		}
		return $array;
	}
	
	
	/**
	 * checks if a value is really meant to be "true"
	 *
	 * @param mixed $value - the value to check
	 * @return bool
	 */
	function IsTrue($value)
	{
		return (strtolower($value) === 'true' || $value === 1 || $value === '1' || $value === true);
	}
	
	
	/**
	 * checks if a value is really meant to be "false"
	 *
	 * @param mixed $value - the value to check
	 * @return bool
	 */
	function IsFalse($value)
	{
		return (strtolower($value) === 'false' || $value === '0' || $value === 0 || $value === false || $value === '');
	}
	
	
	/**
	 * Checks if a frontend user is logged in and belongs to a certain group
	 *
	 * @param array|string $feu_groups - the allowed frontend user groups the user should belong to (array or csv)
	 * @return bool
	 */
	function CheckFrontendAccess($feu_groups)
	{
		$access = true;
		if(!is_array($feu_groups))
		{
			$feu_groups = $this->CleanArray(explode(',',$feu_groups));
		}
		if( $feusers =& cms_utils::get_module('FrontEndUsers') && !empty($feu_groups))
		{
			$access = false;
			$userid = $feusers->LoggedInId();
			if($userid && $groups =& $this->GetFeuGroups($userid))
			{
				foreach($groups as $onegroup)
				{
					#if(in_array($onegroup['groupid'],$feu_groups) || in_array($onegroup['groupname'],$feu_groups))
					if(in_array($onegroup['groupid'],$feu_groups))
					{
						$access = true;
						break;
					}
				}
			}
		}
		return $access;
	}
	
	
	/**
	 * Just gets all frontend user groups a frontend user belongs to
	 * and caches them in a member variable
	 *
	 * @param int $userid - the id of the user
	 * @return array
	 */
	private function &GetFeuGroups($userid)
	{
		if(!$userid)
		{
			return false;
		}
		if( $feusers =& cms_utils::get_module('FrontEndUsers') && !$this->_feuGroups)
		{
			$this->_feuGroups = $feusers->GetMemberGroupsArray($userid);
		}
		return $this->_feuGroups;
	}
	
	
	/**
	 * Checks if a frontend user has access to a page
	 *
	 * @return boolean
	 */
	function CheckFrontendPageAccess()
	{
		if($this->_feuAccess == -1)
		{
			$this->_feuAccess = $this->CheckFrontendAccess($this->GetProperty('feu_access'));
		}
		return $this->_feuAccess;
	}
	
	
	/**
	 * Perform the selected action if a page is accessed where the user has no access
	 */
	function DoFrontendPageAction()
	{
		if( $feusers =& cms_utils::get_module('FrontEndUsers' ))
		{
			$redirectPage = $this->GetProperty('redirect_page');
			if($redirectPage == $this->mId || $redirectPage == $this->mAlias)
			{
				$redirectPage = '';
			}
			$feuAction = $this->GetProperty('feu_action');
			if(!$redirectPage)
			{
				if($feuAction && !$this->_feuAction)
				{
					$this->_feuAction = true;
					return $feusers->DoAction('default', 'cntnt01', array('form'=>'login'), $this->mId);
				}
				return;
			}
			$pattern = '/([\w]+)=(["][^"]*["]|[\'][^\']*[\']|[^\'"\s]*)/';
			if(!$this->GetPropertyValue('inherit_redirect_params'))
			{
				$redirectParams = $this->GetPropertyValue('redirect_params');
				$evaluateSmarty = $this->GetPropertyValue('evaluate_smarty');
			}
			else
			{
				$redirectParams = $this->InheritParentProp('redirect_params');
				$evaluateSmarty = $this->InheritParentProp('evaluate_smarty');
			}
			if($evaluateSmarty)
			{
				$redirectParams = $feusers->ProcessTemplateFromData($redirectParams);
			}
			
			$matches  = array();
			$result   = preg_match_all($pattern, $redirectParams, $matches);
			$_params1 = array();
			$_params2 = array();
			for ($i = 0; $i < count($matches[1]); $i++)
			{
				if(startswith($matches[2][$i],'\''))
				{
					$matches[2][$i] = trim($matches[2][$i],'\'');
				}
				else if(startswith($matches[2][$i],'"'))
				{
					$matches[2][$i] = trim($matches[2][$i],'"');
				}
				$_params1[$matches[1][$i]] = $matches[2][$i];
				$_params2[]                = $matches[1][$i] . '=' . $matches[2][$i];
			}
			if($feuAction)
			{
				return $feusers->RedirectForFrontEnd('cntnt01', $redirectPage, 'default', $_params1, false);
			}
			else
			{
				$manager =& cmsms()->GetHierarchyManager();
				$node    = $manager->sureGetNodeByAlias($redirectPage);
				if(!is_object($node))
				{
					return;
				}
				$content =& $node->GetContent();
				if (!is_object($content) || !$url = $content->GetURL())
				{
					return;
				}
				global $config;
				$url = trim(str_replace(
					array($config['root_url'] . '/index.php',
						$config['ssl_url'] . '/index.php',
						$config['root_url'],
						$config['ssl_url']),
					'', $url),'/?');
				
				if(!empty($_params1) && !empty($_params2))
				{
					if($config['url_rewriting'] == 'none')
					{
						if($content->Secure())
						{
							$url = $config['ssl_url'] . '/index.php?' . implode('&',$_params2) . '&' . $url;
						}
						else
						{
							$url = $config['root_url'] . '/index.php?' . implode('&',$_params2) . '&' . $url;
						}
					}
					else if($config['url_rewriting'] == 'internal')
					{
						if($content->Secure())
						{
							$url = $config['ssl_url'] . '/index.php/' . implode('/',$_params1) . '/' . $url;
						}
						else
						{
							$url = $config['root_url'] . '/index.php/' . implode('/',$_params1) . '/' . $url;
						}
						if($content->DefaultContent())
						{
							$url .= $content->Alias() . $config['page_extension'];
						}
					}
					else if($config['url_rewriting'] == 'mod_rewrite')
					{
						if($content->Secure())
						{
							$url = $config['ssl_url'] . '/' . implode('/',$_params1) . '/' . $url;
						}
						else
						{
							$url = $config['root_url'] . '/' . implode('/',$_params1) . '/' . $url;
						}
						if($content->DefaultContent())
						{
							$url .= $content->Alias() . $config['page_extension'];
						}
					}
				}
				return redirect($url);
			}
		}
	}
	
	
	/**
	* Just a wrapper to get a module instance in the template
	 *
	 * @param string $module_name - the exact name of the module (case sensitive)
	 * @param string $module_version (optional) - the minimum version of the module
	 * @return object
	 */
	function &get_module($module_name,$module_version = '')
	{
		return cms_utils::get_module($module_name, $module_version);
	}
	
	
	private	function manageFile($data){

	//print_r($data);
	//exit;
	
	global $config;
		$path = substr($data['url'],strlen($config['uploads_url']));
		$path = cms_join_path($config['uploads_path'],$path);
		if($data['delete']=='1'){
			@unlink($path);
			$$data['url']='';
		}
	if ($data['file']['name']){
		$path = substr($data['url'],strlen($config['uploads_url']));
		$path = cms_join_path($config['uploads_path'],$path);
		if(file_exists($path)){
			@unlink($path);
			$$data['url']='';
		}
	
	
		$fnam = str_replace('-', '_', $data['file']['name']);
		  $fnam = str_replace(' ', '_', $fnam);
		  $fnam = str_replace('%20', '_', $fnam);
		  $ad = time()."_";
		  $fupload = $config['root_path'].'/uploads/'.$data['dir'] .'/'.$ad.$fnam; 
	
			@move_uploaded_file($data['file']['tmp_name'], $fupload);
			require_once(dirname(__FILE__).'/../../lib/filemanager/ImageManager/Classes/GD.php');
			$fupload2 =  $config['root_path'].'/uploads/'.$data['dir'] .'/'.'thumb_'.$ad.$fnam;
			$fupload3 =  $config['uploads_url'].'/'.$data['dir'] .'/'.'thumb_'.$ad.$fnam;
			$width=150;
			$height=150;
			$img = new Image_Transform_Driver_GD;
			$img->load($fupload);
			$img->resizeANDcrop($width, $height);
			$img->save($fupload2);
			$img->free();
			//echo $fupload3;
			//print_r ($config);
		//exit;
	}
	else
	$fupload3 = $data['url'];
		return $fupload3;
		
		
		
							
							
	}
	
	
	/*private	function manageFile($data){
		global $config;
		print_r($data);
		exit;
		$resp = 0;
		$path = substr($data['url'],strlen($config['uploads_url']));
		$path = cms_join_path($config['uploads_path'],$path);
		if($data['delete']=='1'){
			@unlink($path);
			$$data['url']='';
		}
		else{
			//debug_display($file);
			$adddir = get_site_preference('contentimage_path');
			if( $data['dir'] != '' )
			{
				$adddir = $data['dir'];
			}
		$dir = cms_join_path($config['uploads_path'],$adddir);		
			if(is_dir($dir)){
				if(substr($dir,-1) != '/') {
					$dir=$dir.'/';
				}
				 $name = $dir.time().$data['file']['name'];
				$url = $config['uploads_url'].substr($name,strlen($config['uploads_path']));
				$resp = @move_uploaded_file($data['file']['tmp_name'], $name);
				if($resp) @unlink($path);
			}
			return $resp?$url:$data['url'];
		}					
							
							
	}*/
}
?>
