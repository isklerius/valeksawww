<?php

if (!isset($gCms)) exit;

if (isset($params['cancel'])) 
	$this->Redirect($id, 'defaultadmin', $returnid);
if(! $this->CheckPermission( 'Use Album' ) ) exit;
$themeObject = &$gCms->variables['admintheme'];

$templatename = (isset($params['templatename']) ? $params['templatename'] : '');
$newtemplatename = (isset($params['newtemplatename']) ? $params['newtemplatename'] : '');
$templatecontent = (isset($params['templatecontent']) ? $params['templatecontent'] : '');

if (isset($params['submit']) || isset($params['apply']))
{
	if ($newtemplatename != "")
	{
		$error = false;
		if ($newtemplatename != $templatename)
		{
			if ($this->GetTemplate($newtemplatename) != '')
			{
				$themeObject = $gCms->variables['admintheme'];
				echo $themeObject->ShowErrors($this->Lang('errortemplatenameexists'));
				$newtemplatename = $templatename;
				$error = true;
			}
			else
			{
				// Seems as though this line was causing adding a template 
				//  to delete the template that already existed
				// $this->DeleteTemplate($templatename);
			}
		}
		
		if (!$error)
		{
			$this->SetTemplate($newtemplatename, $templatecontent);
			if (isset($params['submit']))
			{
				$params = array('tab_message' => 'templatesaved', 'active_tab' => 'templates');
				$this->Redirect($id, 'defaultadmin', $returnid, $params);
			} else {
				$templatename = $newtemplatename;
			}
		}

	}
	else
	{
		echo $this->lang('noname');
	}
}
else
	$templatecontent = $this->GetTemplate($templatename);

echo $this->StartTabHeaders();
echo $this->SetTabHeader('template',$this->Lang('Template'));
echo $this->SetTabHeader('help',$this->Lang('Help'));
echo $this->EndTabHeaders();
echo $this->StartTabContent();
echo $this->StartTab("template");

echo $this->CreateFormStart($id, 'edittemplate', $returnid);

echo $this->CreateInputHidden($id, 'templatename', $templatename);

$this->smarty->assign('nametext', $this->Lang('name'));
$this->smarty->assign('nameinput', $this->CreateInputText($id, 'newtemplatename', $templatename, 30, 255));

$this->smarty->assign('contenttext', $this->Lang('template'));
$this->smarty->assign('contentinput', $this->CreateTextArea(false, $id, $templatecontent, 'templatecontent', '', '', '', '', '80', '20', '', 'html'));
$this->smarty->assign('submit', $this->CreateInputSubmit($id, 'submit', lang('submit')));
$this->smarty->assign('cancel', $this->CreateInputSubmit($id, 'cancel', lang('cancel')));

echo $this->ProcessTemplate('edittemplate.tpl');

echo $this->CreateFormEnd();
echo $this->EndTab();
echo $this->StartTab("help");
echo $this->Lang('help_template');
echo $this->EndTab();
echo $this->EndTabContent();
?>
