if (window.attachEvent) window.attachEvent("onload", IEhover);

window.onload = function() {
	linksExternal(); 
	defaultFocus();
 	if (document.getElementById('navt_tabs')) {
		var el = document.getElementById('navt_tabs');
		_add_show_handlers(el);
	}
 	if (document.getElementById('page_tabs')) {
		var el = document.getElementById('page_tabs');
		_add_show_handlers(el);
	}
	$("body").delegate(".rm", "click", function() {
					kuris = parseInt($("#kiekfiles").val());
					var kiek3 = kuris-1;
					$("#kiekfiles").val(kiek3)
  $(this).closest('.kolek').remove();
});
}

function IEhover() {
		if (document.getElementById('nav')) {
			cssHover('nav','LI');	
		}
	 	if (document.getElementById('navt_tabs')) {
			cssHover('navt_tabs','DIV');
		}
	 	if (document.getElementById('page_tabs')) {
			cssHover('page_tabs','DIV');
		}
}

function cssHover(tagid,tagname) {
	var sfEls = document.getElementById(tagid).getElementsByTagName(tagname);
	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" cssHover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" cssHover\\b"), "");
		}
	}
}

function change(id, newClass, oldClass) {
	identity=document.getElementById(id);
	if (identity.className == oldClass) {
		identity.className=newClass;
	} else {
		identity.className=oldClass;
	}
}

function _add_show_handlers(navbar) {
    var tabs = navbar.getElementsByTagName('div');
    for (var i = 0; i < tabs.length; i += 1) {
	tabs[i].onmousedown = function() {
	    for (var j = 0; j < tabs.length; j += 1) {
		tabs[j].className = '';
		document.getElementById(tabs[j].id + "_c").style.display = 'none';
	    }
	    this.className = 'active';
	    document.getElementById(this.id + "_c").style.display = 'block';
	    return true;
	};
    }
    var activefound=0;
    for (var i = 0; i < tabs.length; i += 1) {
    	if (tabs[i].className=='active') activefound=i;
    }
    tabs[activefound].onmousedown();
}

function activatetab(index) {
	var el=0;
	if (document.getElementById('navt_tabs')) {
		el = document.getElementById('navt_tabs');
		
	} else {
 	  if (document.getElementById('page_tabs')) {
		  el = document.getElementById('page_tabs');
	  }
	}
	if (el==0) return;
	var tabs = navbar.getElementsByTagName('div');
	tabs[index].onmousedown();
}

function linksExternal()	{
	if (document.getElementsByTagName)	{
		var anchors = document.getElementsByTagName("a");
		for (var i=0; i<anchors.length; i++)	{
			var anchor = anchors[i];
			if (anchor.getAttribute("rel") == "external")	{
				anchor.target = "_blank";
			}
		}
	}
}

//use <input class="defaultfocus" ...>
function defaultFocus() {

   if (!document.getElementsByTagName) {
        return;
   }

   var anchors = document.getElementsByTagName("input");
   for (var i=0; i<anchors.length; i++) {
      var anchor = anchors[i];
      var classvalue;

      //IE is broken! 
      if(navigator.appName == 'Microsoft Internet Explorer') {
            classvalue = anchor.getAttribute('className');
      } else {
            classvalue = anchor.getAttribute('class');
      }

      if (classvalue!=null) {
                var defaultfocuslocation = classvalue.indexOf("defaultfocus");
                if (defaultfocuslocation != -1) {
                	anchor.focus();
			var defaultfocusselect = classvalue.indexOf("selectall");
			if (defaultfocusselect != -1) {
				anchor.select();
			}
                }
        }
   }
}

function togglecollapse(cid)
{
  document.getElementById(cid).style.display=(document.getElementById(cid).style.display!="block")? "block" : "none";
}

	function editirasas(cid,url,func){
				params = {"id":cid,"act":func,"iskur":'kolekcijos'};
				if (func=='irasas'){
					kuris = parseInt($("#kiekfiles").val());
					var kiek3 = kuris-1;
					$("#kiekfiles").val(kiek3)
					$("#"+cid+">.failas>img").remove();
					$("#"+cid+">.del_file").remove();
					$.ajax({'url': url, 'type': 'post','async':false, data:params, success: function(response){}});
					$("#"+cid).remove();
					}
				else if(func=='editfile'){
					var kuris = $("#kuris"+cid).val();
					var file = $('<input />').attr({type: 'file', name: 'files['+kuris+']', 'class':'file'});
					$("#"+cid).append(file.before('#pavadinimas_'+cid));
					$("#edit_"+cid).remove();
				}
				else if(func=='file'){
					$("#"+cid+">.failas>img").remove();
					$.ajax({'url': url, 'type': 'post','async':false, data:params, success: function(response){}});
					$("#delete"+cid).remove();
					$("#edit_"+cid).addClass('del_file2');
					}
				
			}
			
	function delimg(pav,id,url){
		params = {"id":id,"act":'delimg',"pav":pav,"iskur":'galerija'};
		$.ajax({'url': url, 'type': 'post','async':false, data:params, success: function(response){
		
		console.log(response);
		
		}
		
		});
		
		$("#img"+id).remove();
	}	
function changeimage(kelintas){
					var file = $('<input />').attr({
						type: 'file', name: 'galer_image'+'['+kelintas+']', 'class':'file'
					});
				$("#img"+kelintas).append(file.before('#editimg'+kelintas));
					$("#editimg"+kelintas).remove();
}



$(function(){
				$('#add_block').click(function(e){
					var kuris = parseInt($("#kiekfiles").val());
					var kiek3 = kuris+1;
					$("#kiekfiles").val(kiek3)
					var body = $('.kolekcijos');
					var template = $('#kolek_clone');
					var item = template.clone();
					item.removeAttr('ID');
					item.find('#sekid').val('naujas');
					item.find('input:file').attr('name','files['+kiek3+']');
					item.css('display','block');
					body.append(item);
				});
			});
	


	
$(function(){
				$('#add_img').click(function(e){
					var body = $('.images');
					var kiek = parseInt($('#kiekimg').val());
					//var kiek2 = parseInt(kiek);
					var kiek3 = kiek+1;
					$("#kiekimg").val(kiek3)
					var filename = $('#img_clone').find('input:file').attr('name');
					var checkboxname = $('#img_clone').find('input:checkbox').attr('name');
					var checkboxid = $('#img_clone').find('input:checkbox').attr('id');
					var labelfor = $('#img_clone').find('label').attr('for');
					var template = $('#img_clone');
					var item = template.clone();
					item.removeAttr('ID');
					item.removeAttr('style');
					item.find('input:file').attr('name','galer_image['+kiek3+']');
					body.append(item);
				});
			});
$(function() {
		$( "#sortable" ).sortable({
   stop: function(event, ui) {
   var k = $('.kolek');
   var str='';
   $.each(k,function(index,value){
   if($(value).attr('id')!='kolek_clone')
		str = str+$(value).attr('id')+',';
   });
   }
});
		$( "#galer" ).sortable();
		//$( "#sortable" ).disableSelection();
	});
	
$(function() {
$('#gener').click(function(){
	var password = '';
	var limit = 10;
    var chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
  
    var list = chars.split('');
    var len = list.length, i = 0;
    
    do {
    
      i++;
    
      var index = Math.floor(Math.random() * len);
      
      password += list[index];
    
    } while(i < limit);
	if(password && password!=''){
		$('#m1_input_password').val(password);
		$('#m1_input_repeatpassword').val(password);
		$('#kodas').html(password);
	}
   
});
	});
