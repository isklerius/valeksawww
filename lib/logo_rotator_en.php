<?PHP
header ("content-type: text/xml");
echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<options>';
echo '<PHOTOSNUMBER>';

if ($handle = opendir('/home/salespartn/domains/w.texus.lt/public_html/infotrust/uploads/images/logo/en')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			echo "<imageName link=\"klientai\">uploads/images/logo/en/$file</imageName>\n";
        }
    }
    closedir($handle);
}
echo '
</PHOTOSNUMBER>
<TIME>
      <time>3</time>             
      <color>ffffff</color>   
      <effect>effect2</effect>   
      <random>false</random>   	  
</TIME>
</options>';
?>