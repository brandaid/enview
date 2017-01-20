$(document).ready(function() {

	//NAV BAR
	$( "#toggle" ).on( "click", function() {
		$('#navbar').slideToggle(500,'easeInOutQuart');
		$(this).toggleClass('fa-times');
	});

	$( "#open-nav" ).on( "click", function() {
		$('#navbar').slideToggle(500,'easeInOutQuart');
		$('#toggle').toggleClass('fa-times');
	});

	//SCROLL ANIMATED

	$(window).scroll(function(){
		if ($(this).scrollTop() > 10) {
			$('.scrollToTop').fadeIn();
		} else {
			$('.scrollToTop').fadeOut();
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});

	//CUSTOMIZE SELECT

	$('#tags').niceSelect();
	
});