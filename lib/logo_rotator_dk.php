<?PHP
header ("content-type: text/xml");
echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<options>';
echo '<PHOTOSNUMBER>';

if ($handle = opendir('/home/salespartn/domains/w.texus.lt/public_html/infotrust/uploads/images/logo/dk')) {
    while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != "..") {
			echo "<imageName link=\"klientai\">uploads/images/logo/dk/$file</imageName>\n";
        }
    }
    closedir($handle);
}
echo '
</PHOTOSNUMBER>
<TIME>
      <time>3</time>             
      <color>f7f7f7</color>   
      <effect>effect2</effect>   
      <random>false</random>   	  
</TIME>
</options>';
?>