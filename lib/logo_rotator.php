<?PHP
header ("content-type: text/xml");
echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<banner 
		startWith = "1" 
		random = "false"
		
		backgroundColor = "0xffffff" 
		
		cellWidth = "20"
		cellHeight = "20"
		
		showMinTime = "0.2"
		showMaxTime = "1.5"
		
		blur = "50"
		netTime = "0"
		alphaNet = "0"
		netColor = "0xffffff"
		
		
		controllerVisible = "false" 
		autoPlay = "true"
		
		loaderColor = "0x000000">';


if ($handle = opendir('/home/salespartn/domains/w.texus.lt/public_html/infotrust/uploads/images/logo/en')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			echo "
				
					<item>
						<path>uploads/images/logo/en/$file</path>
						<target>_self</target>
						<link>klientai</link>
						
						<bar_color>0xffffff</bar_color>
						<bar_transparency>26</bar_transparency>
						
						<caption_color>0xffffff</caption_color>
						<caption_transparency>26</caption_transparency>
						
						<slideshowTime>3</slideshowTime>
					</item>
			\n	
			";
        }
    }
    closedir($handle);
}
echo '</banner>';
?>