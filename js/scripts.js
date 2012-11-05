$(document).ready(function(){
	//Set opacity on each span to 0%
    $(".hoverimage").css({'opacity':'0'});
	$('.fade a').hover(
		function() {
			$(this).find('.hoverimage').stop().fadeTo(400, 0.6);
		},
		function() {
			$(this).find('.hoverimage').stop().fadeTo(300, 0);
		}
	)
});
$(document).ready(function(){
	//Set opacity on each span to 0%
    $(".hovervideo").css({'opacity':'0'});
	$('.fade a').hover(
		function() {
			$(this).find('.hovervideo').stop().fadeTo(400, 0.6);
		},
		function() {
			$(this).find('.hovervideo').stop().fadeTo(300, 0);
		}
	)
});
$(document).ready(function() {
	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});

// Menu
$(document).ready(function() {
	$("#navigation ul li").mouseover(function() {
		var the_width = $(this).find("a").width();
		var child_width = $(this).find("ul").width();
		var width = parseInt((child_width - the_width)/2);
		$(this).find("ul").css('left', -width);
	
	});
});
	
$(document).ready(function(){
	//Hide SubLevel Menus
	$('#navigation ul li ul').hide();
	//OnHover Show SubLevel Menus
	$('#navigation ul li').hover(
		//OnHover
		function(){
			//Hide Other Menus
			$('#navigation ul li').not($('ul', this)).stop();
			//Add the Arrow
			$('ul li:first-child', this).before(
				'<li class="arrow">arrow</li>'
			);
			//Remove the Border
			$('ul li.arrow', this).css('border-bottom', '0');
			// Show Hoved Menu
			$('ul', this).stop('true', 'true').slideDown("fast");
		},
		//OnOut
		function(){
			// Hide Other Menus
			$('ul', this).slideUp();
			//Remove the Arrow
			$('ul li.arrow', this).remove();
		}
	);
});

Cufon.replace('h4, span.block-title, span.subtitle', { fontFamily: 'Aller' });
Cufon.replace('h1, h3', { fontFamily: 'Aller' });

//Sequential List
$(document).ready(function(){
   $("#step li").each(function (i) {
		i = i+1;
		$(this).addClass("item"+i);
	 });
   $("#number li").each(function (i) {
		i = i+1;
		$(this).addClass("item"+i);
	   });
	$("#commentlist li").each(function (i) {
		i = i+1;
	$(this).prepend('<span class="commentnumber"> #'+i+'</span>');
 });
});