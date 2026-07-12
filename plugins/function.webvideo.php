<?php
#CMS - CMS Made Simple
#(c)2004 by Ted Kulp (wishy@users.sf.net)
#This project's homepage is: http://cmsmadesimple.sf.net
#
#This program is free software; you can redistribute it and/or modify
#it under the terms of the GNU General Public License as published by
#the Free Software Foundation; either version 2 of the License, or
#(at your option) any later version.
#
#This program is distributed in the hope that it will be useful,
#but WITHOUT ANY WARRANTY; without even the implied warranty of
#MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#GNU General Public License for more details.
#You should have received a copy of the GNU General Public License
#along with this program; if not, write to the Free Software
#Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

function smarty_cms_function_webvideo($params, &$smarty) {
	global $gCms;
	$config =& $gCms->GetConfig();
	
	// get and set the smarty parameters
	$movie = $params['movie'];
	$playlist = $params['playlist'];
	$url = $params['url'];
	$width = isset($params['width']) ? $params['width']:425;
	$height = isset($params['height']) ? $params['height']:355;
	$lang = isset($params['lang']) ? '&amp;hl='.$params['lang']:'';
	$c1 = $params['color1'];
	$c2 = $params['color2'];
	$class = isset($params['class']) ? 'class="'.$params['class'].'" ':'';
	$id = isset($params['id']) ? 'id="'.$params['id'].'" ':'';
	$border = $params['border'];
	$related = $params['related'];
	$fullscreen = isset($params['fullscreen']) ? $params['fullscreen']:1;
	$script = isset($params['allowscript']) ? $params['allowscript']:1;
	$wmode = isset($params['wmode']) ? $params['wmode']:1;
	$showtitle = isset($params['showtitle']) ? $params['showtitle']:0;
	$by = isset($params['showby']) ? $params['showby']:0;
	$playermode = isset($params['playermode']) ? $params['playermode']:'';
	$autoplay = isset($params['autoplay']) ? $params['autoplay']:'';
	$start = isset($params['start']) ? $params['start']:'';
	$loop = isset($params['loop']) ? $params['loop']:0;
	$share = isset($params['share']) ? $params['share']:0;
	
	// Common Embed Parameters
	if ($wmode == 1) $wmode = "<param name=\"wmode\" value=\"transparent\"/>\n";
	if ($fullscreen == 1) $fsparam = "<param name=\"allowFullScreen\" value=\"true\"/>\n";
	if ($script == 1) $script = "<param name=\"allowScriptAccess\" value=\"always\"/>\n";
	
	// Stream Source Embed URL
	if (!isset($url)) {
		if (isset($movie) || isset($playlist)) {
			switch($params['src']) {
				case 'dailymotion': // Dailymotion Player
					$url = 'http://www.dailymotion.com/swf/video/'.$movie;
					break;
				case 'google': // Google Player
					if ($fullscreen != 1) $fs = 'false'; else $fs = 'true';
					if ($playermode) $pm = '&amp;playerMode='.$playermode;
					if ($autoplay == 1) $autoplay = '&amp;autoPlay=true'; else $autoplay = '';
					if ($loop == 1) $loop = '&amp;loop=true'; else $loop = '';
					if ($share == 1) $share = '&amp;showShareButtons=true'; else $share = '';
					$url = 'http://video.google.com/googleplayer.swf?docid='.$movie.'&amp;hl='.$lang.'&amp;fs='.$fs.$pm.$autoplay.$loop.$share;
					break;
				case 'metacafe': // Metacafe Player
					$url = 'http://www.metacafe.com/fplayer/'.$movie.'/movie.swf';
					break;
				case 'myspace': // Myspace Player
					if ($autoplay == 1) $autoplay = ',ap=1'; else $autoplay = '';
					$url = 'http://mediaservices.myspace.com/services/media/embed.aspx/m='.$movie.',t=1,mt=video,searchID=,primarycolor='.$c1.',secondarycolor='.$c2.$autoplay;
					break;
				case 'vimeo': // Vimeo Player
					if ($fullscreen != 1) $fs = 0; else $fs = 1;
					if ($by != 1) $by = 0;
					if ($c1) $c1 = '&amp;color='.$c1;
					$url = 'http://vimeo.com/moogaloop.swf?clip_id='.$movie.'&amp;server=vimeo.com&amp;show_title='.$showtitle.'&amp;show_byline='.$by.'&amp;'.$c1.'&amp;fullscreen='.$fs;
					break;
				default: // YouTube Player
					if (!$lang) $lang = 'hl=en_US';
					if ($c1) $c1 = '&amp;color1=0x'.$c1;
					if ($c2) $c2 = '&amp;color2=0x'.$c2;
					if ($autoplay && $autoplay == 1) $autoplay = '&amp;autoplay=1';
					if ($start) $start = '&amp;start='.$start;
					if ($border == 1) $b = '&amp;border=1';
					elseif (!is_null($border) && $border == 0) $rel = '&amp;border=0';
					if ($related == 1) $rel = '&amp;rel=1';
					elseif (!is_null($related) && $related == 0) $rel = '&amp;rel=0';
					if ($fullscreen == 1) $fs = '&amp;fs=1';
					elseif (!is_null($fullscreen) && $fullscreen == 0) $rel = '&amp;fs=0';
					if ($playlist) {
						$type = 'p';
						$q = '?';
						$stream = $playlist;
					} else {
						$type = 'v';
						$q = '';
						$stream = $movie;
						$lang = '&amp;'.$lang;
					}
					$url = 'http://www.youtube.com/'.$type.'/'.$stream.$q.$lang.$c1.$c2.$autoplay.$start.$b.$fs.$rel;
					break;
			}
			// render valid xhtml
			echo '<object type="application/x-shockwave-flash" '.$class.$id.'style="width:'.$width.'px; height:'.$height.'px;" data="'.$url.'">'."\n".'<param name="movie" value="'.$url.'" />'."\n".$fsparam.$wmode.$script.'</object>'."\n";
			
		} else {
			// error
			echo "<p>Either the <code>movie</code> or <code>playlist</code> parameter must be defined in the <code>{webvideo}</code> tag.";
			if (!isset($params['src'])) echo "<br />\n<strong>Note:</strong> Leaving the <code>src</code> parameter empty will default to using YouTube as the video source.";
			echo "</p>";
		}
		if (isset($movie) && isset($playlist)) {
			// error
			echo "<p>The <code>movie</code> and <code>playlist</code> parameters cannot both be defined in the same <code>{webvideo}</code> tag.";
			if (!isset($params['src'])) echo "<br />\n<strong>Note:</strong> Leaving the <code>src</code> parameter empty will default to using YouTube as the video source.";
			echo "</p>";
		}
	} else {
		// render valid xhtml
		echo '<object type="application/x-shockwave-flash" '.$class.$id.'style="width:'.$width.'px; height:'.$height.'px;" data="'.$url.'">'."\n".'<param name="movie" value="'.$url.'" />'."\n".$fsparam.$wmode.$script.'</object>'."\n";
	}
	$vars = get_defined_vars();
	foreach($vars as $key=>$val) {
		unset($val);
	}
}

function smarty_cms_help_function_webvideo() {
	?>
<h3>What does this do?</h3>
    <p>Embeds a <em><strong>valid</strong></em> xhtml streaming video player on your page. This plugin offers multiple video streaming services as well as an open <code>url</code> parameter that will allow you to embed any streaming media service that supports url parameters. See the <code>url</code> and <code>src</code> parameter descriptions below for more details.</p>
<h3>How do I use it?</h3>
<p>Just insert the tag <code>{webvideo <em>[parameters]</em>}</code> into your template or page.
 See the <strong>Parameters</strong> section below for more information.
<h3>Examples:</h3>
 <p><strong>To embed a single YouTube video stream:</strong><br />
 http://www.youtube.com/watch?v=<span style="color:#F00">Ax3OOnMJff8</span></p>
 <p><em>Use the video id (shown above in <span style="color:#F00">red</span>) in the <code>movie</code> parameter on your page:</em><br />
 <code><strong>{webvideo <span style="color: rgb(0, 0, 102);">movie</span>='<span style="color:#F00">Ax3OOnMJff8</span>' width='480' height='385'}</strong></code></p>
 <p><em><strong>Note:
 </strong>YouTube is the default streaming video source so there's no need to declare it in the </em><code>src</code><em> parameter when embedding a stream from YouTube. </em></p>
 <p><strong>To embed a single Metacafe video stream:</strong><br />
   Use the <code>src</code> parameter to stream from another source:<br />
 <code><strong>{webvideo <span style="color: rgb(0, 0, 102);">src</span>='metacafe' movie='yt-BN5sYBTg4cQ'}</strong></code></p>
<p><strong>To embed a YouTube Playlist:</strong><br />
http://www.youtube.com/my_playlists?p=<span style="color:#00F">F8F899D238798193</span></p>
<p><em>Use the video id (shown above in <span style="color:#00F">blue</span>) in the <code>movie</code> parameter on your page:</em><br />
<code><strong>{webvideo <span style="color: rgb(0, 0, 102);">playlist</span>='<span style="color:#00F">F8F899D238798193</span>' width='480' height='385'}</strong></code></p>
<p><strong>To embed a Vimeo Widget:</strong><br />
<code>&lt;object type=&quot;application/x-shockwave-flash&quot; width=&quot;400&quot; height=&quot;300&quot; data=&quot;<span style="color:#0C0">http://vimeo.com/hubnut/?user_id=user6241168&amp;amp;color=00adef&amp;amp;background=000000&amp;amp;fullscreen=1&amp;amp;slideshow=0&amp;amp;stream=likes&amp;amp;id=&amp;amp;server=vimeo.com</span>&quot;&gt;&lt;param name=&quot;quality&quot; value=&quot;best&quot; /&gt;&lt;param name=&quot;allowfullscreen&quot; value=&quot;true&quot; /&gt;&lt;param name=&quot;allowscriptaccess&quot; value=&quot;always&quot; /&gt;&lt;param name=&quot;scale&quot; value=&quot;showAll&quot; /&gt;&lt;param name=&quot;movie&quot; value=&quot;http://vimeo.com/hubnut/?user_id=user6241168&amp;amp;color=00adef&amp;amp;background=000000&amp;amp;fullscreen=1&amp;amp;slideshow=0&amp;amp;stream=likes&amp;amp;id=&amp;amp;server=vimeo.com&quot; /&gt;&lt;/object&gt;</code></p>
<p><em>Copy the url (shown above in <span style="color:#0C0">green</span>) out of the provided embed code:</em><br />
<code><strong>{webvideo <span style="color: rgb(0, 0, 102);">url</span>='<span style="color:#0C0">http://vimeo.com/hubnut/?user_id=user6241168&amp;amp;color=00adef&amp;amp;background=000000&amp;amp;fullscreen=1&amp;amp;slideshow=0&amp;amp;stream=likes&amp;amp;id=&amp;amp;server=vimeo.com</span>' width='480' height='385'}</strong></code></p>
<p><em><strong>Note: </strong>Technically, the <code style="color: rgb(0, 0, 102);">url</code> parameter will allow you to embed any media supported by the HTML <code>&lt;object&gt;</code> tag. This means that you aren't limited to the external streaming media services supported by the <code style="color: rgb(0, 0, 102);">src</code> parameter.</em></p>
<h3>Parameters</h3>
<p>The following smarty parameters are available in all video players. One of the following parameters are required in order to embed streaming media.</p>
<ul>
  <li><code style="color: rgb(0, 0, 102); font-weight:bold;">movie</code> - Movie ID.</li>
  <li><code style="color: rgb(0, 0, 102); font-weight:bold;">playlist</code> - Playlist ID (Currently only supports Youtube).</li>
  <li><code style="color: rgb(0, 0, 102); font-weight:bold;">url</code> - The full url of the video stream. Overrides the <code>movie</code>, <code>playlist</code>, and any other source-specific parameters.</li>
</ul>
<br />
<h4>Formatting Parameters <em>(Optional)</em></h4>
<ul>
  <li><code>width</code><em> </em>- Width of the video player. (Default width is <strong>425</strong>)</li>
  <li><code>height</code><em> </em> - Height of the video player (Default height is <strong>355</strong>)</li>
  <li><code>fullscreen</code><em> </em>- Controls full screen viewing of movies. (Disable by changing value to '<strong>0</strong>')</li>
  <li><code>scriptaccess</code><em> </em>- Controls script access. (Disable by changing value to '<strong>0</strong>')</li>
  <li><code>wmode</code><em> </em>- Controls the background transparency. (Disable by changing value to '<strong>0</strong>')</li>
  <li><code>class</code><em> </em>- CSS class. Use commas to separate multiple classes.</li>
  <li><code>id</code><em> </em>- CSS ID. </li>
</ul>
<br />
<h4>Source-Specific Parameters <em>(Optional)</em></h4>
<ul>
  <li><code>src</code><em> </em>- The video stream provider. Each source supports different parameters. Possible values are:
    <ul>
      <li><a href="http://www.dailymotion.com/" target="_blank">dailymotion</a> - Source-specific parameters: <em>none</em></li>
      <li><a href="http://video.google.com/" target="_blank">google</a> - Source-specific parameters: <code>autoplay, playermode, loop, share</code></li>
      <li><a href="http://www.metacafe.com/" target="_blank">metacafe</a> - Source-specific parameters: <em>none</em></li>
      <li><a href="http://vids.myspace.com/" target="_blank">myspace</a> - Source-specific parameters: <code>autoplay, color1, color2</code></li>
      <li><a href="http://vimeo.com/" target="_blank">vimeo</a> - Source-specific parameters: <code>color1, showby, showtitle</code></li>
      <li><a href="http://www.youtube.com/" target="_blank">youtube</a> <em style="color:#006">(default)</em> - Source-specific parameters: <code>playlist, autoplay, border, color1, color2, lang, related, start</code></li>
    </ul>
  </li>
  <li><code>autoplay</code><em> </em>- Allows video to start upon page load (Enable by changing value to '<strong>1</strong>')</li>
  <li><code>border</code><em> </em>- Add a border to the player. (Enable by changing value to '<strong>1</strong>')</li>
  
  <li><code>color1</code><em> </em>- Defines the primary player color as a hex value.</li>
  <li><code>color2</code><em> </em>- Defines the secondary player color as a hex value.</li>
  <li><code>lang</code><em> </em>- Change the player language.</li>
  <li><code>loop</code><em> </em>- Allows you to repeat the video indefinitely (Enable by changing value to '<strong>1</strong>')</li>
  <li><code>playermode</code><em> </em>- Allows you to change the player skin options
    <ul>
      <li><strong>simple</strong> - Basic player version without progress bar and volume control.</li>
      <li><strong>mini</strong> - Even more basic player version</li>
      <li><strong>clickToPlay</strong> - Used for video ads.</li>
      <li><strong>embedded</strong> - standard skin.</li>
    </ul>
  </li>
  <li><code>related</code><em> </em>- Controls the related videos feature. (Disable by changing value to '<strong>0</strong>')</li>
  <li><code>share</code><em> </em>- Adds a button that will &quot;Send link to a friend.&quot; (Enable by changing value to '<strong>1</strong>')</li>
  <li><code>showby</code><em> </em>- Shows whom the movie was uploaded by. (Enable by changing value to '<strong>1</strong>')</li>
  <li><code>showtitle</code><em> </em>- Shows the movie title. (Enable by changing value to '<strong>1</strong>')</li>
  <li><code>start</code><em> </em>- Starts the movie at a the given <em>number</em> of seconds.</li>
</ul>
    <h3>Release Notes</h3>
<p>Version: <strong>1.1</strong>, 3.8.2011<br />
Added backwards compatibility <em>(CMSMS versions prior to 1.9)</em>.<br />
Added support for playlists in YouTube.<br />
Added the <code>url</code> parameter.
</p>
<h3>Links</h3>
<ul>
  <li><a href="http://dev.cmsmadesimple.org/projects/webvideo">Summary</a></li>
  <li><a href="http://dev.cmsmadesimple.org/project/files/839">Release history</a></li>
  <li><a href="http://dev.cmsmadesimple.org/bug/list/839">Report bugs</a></li>
  <li><a href="http://dev.cmsmadesimple.org/feature_request/list/839">Request features</a></li>
</ul>
	<?php
}

function smarty_cms_about_function_webvideo() {
	?>
	<p>Author: Bryan Buxton &lt;me@bryanbuxton.com&gt;<br />
	Version: 1.1<br />
    Release Date: 3.8.2011
</p>
	<?php
}
?>