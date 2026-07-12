<?php
//zemelapio klase 'maps' 


function smarty_modifier_map($lng)
{	
	$lang = 'lt';
	$lon = '54.721026';
	$lat = '25.288124';
	$text = '<b>Centrinis biuras</b> Kalvarijų g. 143a, Vilnius';
	if($lng=="en"){
		$lang1 = 'Enter Your departure address';
		$lang2 = '(eg. Street 1, City)';
		$lang3 = 'Get my route';
		$lang4 = 'Address';
		$lang5 = 'How to go';
	}
	else{
		$lang1 = 'Įveskite adresą, iš kur važiuosite';
		$lang2 = '(pvz.: gatvė 1, Miestas)';
		$lang3 = 'Sudaryti maršrutą';
		$lang4 = 'Adresas';
		$lang5 = 'Kaip važiuoti';  
	}
	
	$zoom  = '7';
	//key yra - http://code.google.com/intl/lt/apis/maps/signup.html	
	$key = "";
	//http://www.powerhut.co.uk/googlemaps/custom_markers.php; paveiksleleio plotis ~130px
	$image = '/images/image.png';
	$shadow = '/images/shadow.png';
	
	
	list($iwidth, $iheight, $itype, $iattr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$image);
	list($swidth, $sheight, $stype, $sattr) = getimagesize($_SERVER['DOCUMENT_ROOT'].$shadow);
	
	//default sttings
	//$default_class = "_tmp_maps";
	//$default_height = "300";
	//$default_width = "400";
	//$ret .= "<style>.{$default_class}{width: {$default_width}px; height: {$default_height}px}</style>";
	$ret .= "<div id='gmap2010030223144' class='{$default_class} maps' ></div>";
	$ret .= "<script>
	function koo(name){	  
	name = name.replace(/[\[]/,\"\\\[\").replace(/[\]]/,\"\\\]\");	  
	var regexS = \"[\\?&]\"+name+\"=([^&#]*)\";	  
	var regex = new RegExp( regexS );	  
	var results = regex.exec( window.location.href );	  
	if( results == null )		return \"\";	  else		return results[1];	
	}
	function CreateGMap2010030223144(){		
		if(!GBrowserIsCompatible()) return;		
		var allMapTypes = [G_NORMAL_MAP, G_HYBRID_MAP] ;		
		var map = new GMap2(document.getElementById('gmap2010030223144'), {mapTypes:allMapTypes});		
		var vieta=new Array(); 		
		vieta[0]= new Array();		
		vieta[0]['lon']=55.397831;		
		vieta[0]['lat']=23.741455;		
		vieta[0]['text']='';		
		vieta[0]['zoom']=mapi.zoom;		
		vieta[1]= new Array();		
		vieta[1]['lon']=mapi.lon;		
		vieta[1]['lat']=mapi.lat;		
		vieta[1]['text']=mapi.text;		
		vieta[1]['zoom']=mapi.zoom;		
		map.setCenter(new GLatLng(vieta[0]['lon'],vieta[0]['lat']),vieta[0]['zoom']);		
		map.setMapType( allMapTypes[0] );		
		map.addControl(new GSmallMapControl());		
		map.addControl(new GMapTypeControl());		
		AddMarkers(map, [{lat:vieta[1]['lon'], lon:vieta[1]['lat'], text:vieta[1]['text'], kuris:'1'}] ) ;	
		AddMarkers(map, [{lat:54.896256, lon:23.911614, text:'<b>Kauno skyrius</b> - Kęstučio g. 62 LT-44303', kuris:'1'}] ) ;	
		AddMarkers(map, [{lat:55.738709, lon:21.133575, text:'<b>Klaipėdos skyrius</b> – S.  Daukanto g. 22A', kuris:'1'}] ) ;	
		AddMarkers(map, [{lat:54.399548, lon:24.049072, text:'<b>Alytaus skyrius</b> - Dariaus ir Girėno g. 4 a', kuris:'1'}] ) ;	
		AddMarkers(map, [{lat:55.741414, lon:24.357719, text:'<b>Panevėžio skyrius</b> - Anykščių g. 4', kuris:'1'}] ) ;	
		AddMarkers(map, [{lat:55.939587, lon:23.299255, text:'<b>Šiaulių skyrius</b> – M. Valančiaus g. 4a', kuris:'1'}] ) ;	
		AddMarkers(map, [{lat:54.574052, lon:23.3638, text:'<b>Marijampolės skyrius</b> – Sporto g. 14 – 43', kuris:'1'}] ) ;	
	}
	function AddMarkers( map, aPoints ){
		var myIcon = new GIcon();		
		myIcon.image = '".$image."';		
		myIcon.shadow = '".$shadow."';		
		myIcon.iconSize = new GSize(".$iwidth.",".$iheight.");		
		myIcon.shadowSize = new GSize(".$swidth.",".$sheight.");		
		myIcon.iconAnchor = new GPoint(0,41);		
		myIcon.infoWindowAnchor = new GPoint(0,41);		
		myIcon.imageMap = [79,0,79,1,79,2,78,3,77,4,77,5,76,6,76,7,75,8,75,9,75,10,74,11,73,12,73,13,72,14,72,15,71,16,71,17,71,18,70,19,69,20,69,21,68,22,68,23,67,24,67,25,66,26,66,27,65,28,65,29,64,30,64,31,63,32,63,33,62,34,62,35,61,36,61,37,60,38,60,39,59,40,0,40,0,39,0,38,0,37,0,36,50,35,48,34,47,33,45,32,44,31,43,30,41,29,40,28,38,27,37,26,35,25,34,24,32,23,31,22,30,21,28,20,27,19,25,18,24,17,22,16,21,15,20,14,18,13,17,12,15,11,14,10,12,9,11,8,9,7,8,6,7,5,5,4,4,3,2,2,1,1,0,0,79,0];		
		var markerOptions = {icon:myIcon};		
		for (var i=0; i<aPoints.length ; i++){			
			var point = aPoints[i] ;			
			map.addOverlay( createMarker(new GLatLng(point.lat, point.lon), point.text, point.kuris, markerOptions) );		}	
	}
	function createMarker( point, html, kuris, markerOptions ){		
		var marker = new GMarker(point,markerOptions );		
		var db=koo('m');	
		var tb=koo('t');		
		if (tb == '') tb=0;			
		var from_html = mapi.lang1+'<form action=\"http://maps.google.com/maps\" method=\"get\" target=\"_blank\">' + '<input type=\"text\"  MAXLENGTH=48 name=\"saddr\" id=\"daddr\" value=\"\"  style=\"font-size:10px; width: 180px\" /><br>' + '<INPUT value=\"'+mapi.lang2+'\" TYPE=\"SUBMIT\" style=\"font-size:10px\">' + '<input type=\"hidden\" name=\"hl\" value=\"lt\"><input type=\"hidden\" name=\"daddr\" value=\"' + point.lat() + ',' + point.lng() + '\" /></form>';		
		var aurl = window.location.protocol + \"//\" + window.location.host + \"\" + window.location.pathname+\"?\";		
		var turl = mapi.lang4+\"?\";		
		html = html+'<br /><br /><a href=\"'+aurl+'m='+kuris+'&t=1\">'+turl+'</a>';		
		var tab1 = new GInfoWindowTab(mapi.lang3, html);		
		var tab2 = new GInfoWindowTab(mapi.lang4, from_html);		
		GEvent.addListener(marker, 'click', function() {			
			marker.openInfoWindowHtml(html, {maxWidth:200});			
			marker.openInfoWindowTabsHtml([tab1,tab2]);		
		});		
		if (db == kuris){		
			marker.openInfoWindowHtml(html, {maxWidth:200});			
			marker.openInfoWindowTabsHtml([tab1,tab2], {selectedTab:tb});		
		}		
		return marker;	
	}
	</script>";
	
	$ret .= "<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key={$key}&amp;hl={$lang}' type='text/javascript'></script>
		<script type='text/javascript'>
		var mapi = {'lon':{$lon}, 'lat':{$lat},'zoom':{$zoom}, 'text':'<b>{$text}</b>', 'lang1':'<br>{$lang1}:<br /><span style=\'font-size:10px\'>{$lang2}</span><br />', 'lang2':'{$lang3}', 'lang3':'{$lang4}', 'lang4':'{$lang5}'};
		if (window.addEventListener) {
			window.addEventListener('load', CreateGMap2010030223144, false);
		} else {
			window.attachEvent('onload', CreateGMap2010030223144);
		}
	</script>
	";
	
	

		
	return $ret;
}

?>
