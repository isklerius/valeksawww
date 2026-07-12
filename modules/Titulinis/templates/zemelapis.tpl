<html> 
    <head> 
	   {config_load file=../../languages/$kalba.conf section = "strings" scope="global"}
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
       <title>{#zemelapis#}</title> 
     </head> 
<body style="height: 100%; width: 100%; margin: 0; padding: 0">
<script>
{literal}
function koo(name){	  
		name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");	  
		var regexS = "[\\?&]"+name+"=([^&#]*)";	  
		var regex = new RegExp( regexS );	  
		var results = regex.exec( window.location.href );	  
		if( results == null )		return "";	  else		return results[1];	
		}	
	function CreateGMap2010030223144(){		
		if(!GBrowserIsCompatible()) return;		
		var allMapTypes = [G_NORMAL_MAP, G_HYBRID_MAP] ;		
		var map = new GMap2(document.getElementById("gmap2010030223144"), {mapTypes:allMapTypes});		
		var vieta=new Array(); 		
		vieta[0]= new Array();		
		vieta[0]['lon']=mapi.lon;		
		vieta[0]['lat']=mapi.lat;		
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
		}
		function AddMarkers( map, aPoints ){
			var myIcon = new GIcon();		
			myIcon.image = '/images/image.png';		
			myIcon.shadow = '/images/shadow.png';		
			myIcon.iconSize = new GSize(110,47);		
			myIcon.shadowSize = new GSize(138,47);		
			myIcon.iconAnchor = new GPoint(55,47);		
			myIcon.infoWindowAnchor = new GPoint(55,47);		
			myIcon.imageMap = [96,0,100,1,103,2,105,3,106,4,107,5,108,6,109,7,109,8,109,9,109,10,109,11,109,12,109,13,109,14,108,15,108,16,107,17,106,18,105,19,104,20,102,21,101,22,99,23,97,24,95,25,93,26,90,27,88,28,85,29,82,30,78,31,75,32,70,33,66,34,60,35,55,36,0,40,1,41,2,42,3,43,4,44,5,45,6,46,0,46,0,45,0,44,0,43,0,42,0,41,0,40,33,36,29,35,26,34,24,33,22,32,21,31,20,30,20,29,20,28,20,27,20,26,20,25,20,24,20,23,21,22,22,21,22,20,23,19,24,18,26,17,27,16,28,15,30,14,32,13,26,12,25,11,24,10,24,9,24,8,24,7,25,6,26,5,55,4,59,3,64,2,69,1,75,0,96,0];		
			var markerOptions = {icon:myIcon};		
			for (var i=0; i<aPoints.length ; i++){			
				var point = aPoints[i] ;			
				map.addOverlay( createMarker(new GLatLng(point.lat, point.lon), point.text, point.kuris, markerOptions) );		}	
			}
			function createMarker( point, html, kuris, markerOptions ){		
				var marker = new GMarker(point,markerOptions );		
				var db=koo('m');		
				var from_html = mapi.lang1+'<form action="http://maps.google.com/maps" method="get" target="_blank">' + '<input type="text"  MAXLENGTH=48 name="saddr" id="daddr" value=""  style="font-size:10px; width: 180px" /><br>' + '<INPUT value="'+mapi.lang2+'" TYPE="SUBMIT" style="font-size:10px">' + '<input type="hidden" name="hl" value="lt"><input type="hidden" name="daddr" value="' + point.lat() + ',' + point.lng() + '" /></form>';		
				var tb=koo('t');		
				if (tb == "") tb=0;		
				var aurl = window.location.protocol + "//" + window.location.host + "" + window.location.pathname+"?";		
				var turl = mapi.lang4+"?";		
				html = html+'<br /><br /><a href="'+aurl+'m='+kuris+'&t=1">'+turl+'</a>';		
				var tab1 = new GInfoWindowTab(mapi.lang3, html);		
				var tab2 = new GInfoWindowTab(mapi.lang4, from_html);		
				GEvent.addListener(marker, "click", function() {			
					marker.openInfoWindowHtml(html, {maxWidth:200});			
					marker.openInfoWindowTabsHtml([tab1,tab2]);		
				});		
				if (db == kuris){		
					marker.openInfoWindowHtml(html, {maxWidth:200});			
					marker.openInfoWindowTabsHtml([tab1,tab2], {selectedTab:tb});		
				}		
				return marker;	
			}

</script>

	
			
		
		<script src='http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAdMjawHlqR7M7Fv4aGljwYRRA8Tb6qhIskASVlso4dSoHvMXhBhRtMfXtESAhExZ65IAymhJN0XcFAw&amp;hl=en' type='text/javascript'></script> 
			<script type='text/javascript'> 
			var mapi = 	{/literal}{foreach from=$zemelapiai item=zemelapis}{literal}{'lon':{/literal}{$zemelapis->lon}{literal}, 'lat':{/literal}{$zemelapis->lat}{literal},'zoom':15, 'text':'<b>{/literal}{$zemelapis->text}{literal}</b>', 'lang1':'<br>{/literal}{#iveskiteadresa#}{literal}<br /><span style=\'font-size:10px\'>{/literal}{#adresoinfo#}{literal}</span><br />', 'lang2':'{/literal}{#sudarytimarsruta#}{literal}', 'lang3':'{/literal}{#adresas#}{literal}', 'lang4':'{/literal}{#kaipvaziuoti#}{literal}'};	
			{/literal}{/foreach}{literal}
			if (window.addEventListener) {
				window.addEventListener('load', CreateGMap2010030223144, false);
			} else {
				window.attachEvent('onload', CreateGMap2010030223144);
			}
		</script> 
{/literal}
<div id='gmap2010030223144' class='maps' style="width: 480px; height: 400px;float:right;"></div> 
</body>
</html>
