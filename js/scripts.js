$(document).ready(function(){
	if($('.nav').length>0){
		var left = (1002/2)-($('.nav').width()/2);
		$('.nav').css({'left':left});
	}
	 	var didziaus2 = '';
	 $(".blocks .block .top h2").each(function(){
			var aukstis = $(this).height();
			if(aukstis>didziaus2)
				didziaus2 = aukstis;
	  });
	  $(".blocks .block .top h2").css("height",didziaus2+'px' );
		var didziaus = '';
	 $(".blocks .block .top").each(function(){
			var aukstis = $(this).height();
			if(aukstis>didziaus)
				didziaus = aukstis;
	  });
	  $('.blocks').css("background-position-y",didziaus+20+'px' );
	 
	/*$('.mainmenu td').mouseenter(function(){
		$(this).addClass('active');
		var width = $(this).find('.subm').width();
		if($(this).hasClass('last'))
			$(this).find('.subm').css({'left':'auto','right':'0'})
		$(this).find('.subm').width(width+30);
		$(this).find('.subm').show();
	});
	
	$('.mainmenu td').mouseleave(function(){
		$(this).removeClass('active');
		var width = $(this).find('.subm').width();
		$(this).find('.subm').width(width-30);
		$(this).find('.subm').hide();
	});*/
});