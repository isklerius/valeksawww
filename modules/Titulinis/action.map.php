<?php


	require_once("include.php");

	//check_login();

	global $gCms;
	$db =& $gCms->GetDb();
	$smarty =& $gCms->GetSmarty();

	$config = $gCms->GetConfig();
	$pid = $_GET['id'];
	$mid = explode(',', $pid);	
	$kalba = $params['lang'];
	if (!$kalba)
		$kalba = "lt";
	
	//$mod =& $gCms->GetModuleInstance('Products');
	//$smarty->assign('dealers', product_ops::get_dealers('Vilnius'));
	$kalba = strtolower($kalba);
	//echo $kalba;
	//exit;
	if($kalba=='lt'){
	$zemelapis=new stdClass;
	$zemelapis->id='712';
	$zemelapis->lon='54.685204';
	$zemelapis->lat='25.258319';
	$zemelapis->text='<b>UAB ILSANTA</b><br/>A. Goštauto g. 40A, LT-01112 Vilnius, Lietuva';
	$zemelapiai[]=$zemelapis;
	}
	elseif($kalba=='en'){
	$zemelapis=new stdClass;
	$zemelapis->id='768';
	$zemelapis->lon='54.685204';
	$zemelapis->lat='25.258319';
	$zemelapis->text='<b>UAB ILSANTA</b><br/>A. Goštauto g. 40A, LT-01112 Vilnius, Lithuania';
	$zemelapiai[]=$zemelapis;
	}
	elseif($kalba=='lv'){
	$zemelapis=new stdClass;
	$zemelapis->id='774';
	$zemelapis->lon='56.917003';
	$zemelapis->lat='24.119217';
	$zemelapis->text='<b>AS ILSANTA FILIALE</b><br/>Mukusalas iela 72 , LV-1004 Riga, Latvija';
	$zemelapiai[]=$zemelapis;
	}
	elseif($kalba=='est'){
	$zemelapis=new stdClass;
	$zemelapis->id='780';
	$zemelapis->lon='59.408119';
	$zemelapis->lat='24.734087';
	$zemelapis->text='<b>ILSANTA EESTI FILIAAL</b><br/>Pärnu mnt 130-13 Tallinn 11317, Estija (Estonia) ';
	$zemelapiai[]=$zemelapis;
	}
	//print_r($zemelapiai);
	$smarty->assign('kalba', $kalba);
	$smarty->assign('zemelapiai', $zemelapiai);
	$smarty->assign('gookey', 'ABQIAAAAdMjawHlqR7M7Fv4aGljwYRRA8Tb6qhIskASVlso4dSoHvMXhBhRtMfXtESAhExZ65IAymhJN0XcFAw'); 
	echo $this->ProcessTemplate('zemelapis.tpl');

?>
