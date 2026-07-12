<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>	
		{metadata}
		<title>{sitename}-{title}</title>
		<link rel="icon" href="{root_url}/images/va-icon.ico" type="image/x-icon" /> 
		<link rel="shortcut icon" href="{root_url}/images/va-icon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		 <link rel="stylesheet" href="{root_url}/styles/reset.css" type="text/css" media="screen">
		<link rel="stylesheet" href="{root_url}/styles/style.css" type="text/css" media="screen">
		<script type="text/javascript" src="{root_url}/js/jquery-1.7.1.min.js" ></script>
		<script type="text/javascript" src="{root_url}/js/scripts.js" ></script>
		<!--[if lt IE 7]>
			<div style=' clear: both; text-align:center; position: relative;'> 
				<a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
			</div> 
		<![endif]-->
		{capture assign="kalbumeniu"}{menu template="lang" number_of_levels="1"}{/capture}
		{literal}
			<script type="text/javascript">

			  var _gaq = _gaq || [];
			  _gaq.push(['_setAccount', 'UA-35763750-1']);
			  _gaq.push(['_trackPageview']);

			  (function() {
				var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
				ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			  })();

			</script>
		{/literal}
	</head>
	<body>
		{config_load file=/../../languages/$kalba.conf section = "strings" scope="global"}
			<div class="main">
				<div class="header">
				<div class="logo fl">
					<a href="/{$kalba}"><img src="images/logo.png"/></a>
				</div>
				<div class="fr">
					<div class="lang">
						<ul>
							{$kalbumeniu}
						</ul>
					</div>
						<a class="fr" href="/{$kalba}" style="color: #fff;padding-right:10px;">{#ipradzia#}</a>
					<div class="clear"></div>
					<div class="search fr">
						{search resultpage=$smarty.config.paieska_link search_method='POST'}
					</div>
				</div>
				<div class="clear"></div>
				<div class="mainmenu">
					<table>
						<tr>
							{menu template="mainmeniu" start_element=$smarty.config.mainmenu number_of_levels="2"}
							{*}<td class="first">
								<a href="javascript:void(0)">apie mus</a>
							</td>
							<td>
								<a href="javascript:void(0)">paslaugos</a>
							</td>
							<td>
								<a href="javascript:void(0)">darbuotojai</a>
							</td>
							<td>
								<a href="javascript:void(0)">naudingos nuorodos</a>
							</td>
							<td>
								<a href="javascript:void(0)">mūsų partneriai</a>
							</td>
							<td>
								<a href="javascript:void(0)">kontaktai</a>
							</td>{*}
						</tr>
					</table>
				</div>
			</div>
