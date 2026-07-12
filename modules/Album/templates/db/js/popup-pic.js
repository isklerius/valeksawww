<!--
function PopupPic(bigPic,title,w,h) {
var winl = (screen.width - w) / 2;
var wint = (screen.height - h) / 2;
var smarty_hack = 'head';
// nme=title.replace(/\s/g,'_'); 
nme='picture_pop';
newWindow = window.open('',nme,'height='+h+',width='+w+',top='+wint+',left='+winl+',resizable=0,scrollbars=0');
newWindow.document.write('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">');
newWindow.document.write('<html><head><title>'+title+'</title>');
newWindow.document.write('<meta http-equiv="content-type" content="text/html; charset=UTF-8" />');
newWindow.document.write('<style type="text/css"><!-- html, body {margin: 0px; background-color: #000;} --></style>');
newWindow.document.write('</'+smarty_hack+'><body onclick="self.close()">');
newWindow.document.write('<p><img src="'+bigPic+'" alt="'+title+'" /></p>');
newWindow.document.write('</body></html>');
newWindow.document.close();
newWindow.focus();
}
-->
