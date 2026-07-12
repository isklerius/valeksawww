{* CMotion gallery template *}

{* Include JS files. You can move this to the head of your page template if you want *}
{literal}
<script type="text/javascript" src="modules/Album/templates/db/js/motiongallery.js">

/***********************************************
* CMotion Image Gallery- Â© Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
* This notice must stay intact for legal use
* Modified by Jscheuer1 for autowidth and optional starting positions
***********************************************/

</script>

<script type="text/javascript">

/***********************************************
* Dynamic Ajax Content- Â© Dynamic Drive DHTML code library (www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit Dynamic Drive at http://www.dynamicdrive.com/ for full source code
***********************************************/

var bustcachevar=1 //bust potential caching of external pages after initial request? (1=yes, 0=no)
var loadedobjects=""
var rootdomain="http://"+window.location.hostname
var bustcacheparameter=""

function ajaxpage(url, containerid){
var page_request = false
if (window.XMLHttpRequest) // if Mozilla, Safari etc
page_request = new XMLHttpRequest()
else if (window.ActiveXObject){ // if IE
try {
page_request = new ActiveXObject("Msxml2.XMLHTTP")
} 
catch (e){
try{
page_request = new ActiveXObject("Microsoft.XMLHTTP")
}
catch (e){}
}
}
else
return false
page_request.onreadystatechange=function(){
loadpage(page_request, containerid)
}
if (bustcachevar) //if bust caching of external page
bustcacheparameter=(url.indexOf("?")!=-1)? "&"+new Date().getTime() : "?"+new Date().getTime()
page_request.open('GET', url+bustcacheparameter, true)
page_request.send(null)
}

function loadpage(page_request, containerid){
if (page_request.readyState == 4 && (page_request.status==200 || window.location.href.indexOf("http")==-1))
document.getElementById(containerid).innerHTML=page_request.responseText
}

function loadobjs(){
if (!document.getElementById)
return
for (i=0; i<arguments.length; i++){
var file=arguments[i]
var fileref=""
if (loadedobjects.indexOf(file)==-1){ //Check to see if this object has not already been added to page before proceeding
if (file.indexOf(".js")!=-1){ //If object is a js file
fileref=document.createElement('script')
fileref.setAttribute("type","text/javascript");
fileref.setAttribute("src", file);
}
else if (file.indexOf(".css")!=-1){ //If object is a css file
fileref=document.createElement("link")
fileref.setAttribute("rel", "stylesheet");
fileref.setAttribute("type", "text/css");
fileref.setAttribute("href", file);
}
}
if (fileref!=""){
document.getElementsByTagName("head").item(0).appendChild(fileref)
loadedobjects+=file+" " //Remember this object as being already added to page
}
}
}

</script>

<!-- End gallery script -->
{/literal}


{* Album List *}
{if !$album}
<ul class="albumlist">
	{foreach from=$albums item=album}
	<li class="thumb">
 	<a href="{$album->link}">
<img src="{$album->thumbnail}" alt="{$album->name|escape:'html'}" title="{$album->name|escape:'html'}"{$album->autothumbnailsize} /></a>

<p class="albumname">{$album->name|escape:'html'}<br />
<span class="albumpicturecount">({$album->picturecount} images)</span><br />
<span class="albumcomment">{$album->comment}</span></p>
</li>
	{/foreach}
</ul>

{else}



{* Big Picture *}



<div class="largeview">

{* The image alt/title-attribute uses the sitename-tag with a copyright-symbol. You can also use other tags from this album template. *}

<img id="maincmotionpic" src="{$picture->picture}" alt="&copy; {sitename}" title="&copy; {sitename}"/>

</div>



{* End Big Picture *}





{*CMotion gallery with thumbnail list*}



<div id="motioncontainer" style="position:relative;overflow:hidden;">

 <div id="motiongallery" style="position:absolute;left:0;top:0;white-space: nowrap;">

   <div id="trueContainer">

	{foreach from=$pictures item=picturesrow}

	    {foreach from=$picturesrow item=onepicture}

{* Change alt/title-tag to what you need. *}

	    <a href="{$onepicture->link}"  title="{$onepicture->name|escape:'html'} | {$picture->comment|escape:'html'}" onclick="document.getElementById('maincmotionpic').setAttribute('src', '{$onepicture->picture}');return false;"> <img src="{$onepicture->thumbnail}" alt="{$onepicture->name|escape:'html'}"/></a>



      {if ($onepicture->number==$picturenumber and !$picture)}{assign var=picture value=$onepicture}{/if}



	    {/foreach}

	{/foreach}

   </div>

 </div>

</div>



{/if}


<div style="clear:both"></div>