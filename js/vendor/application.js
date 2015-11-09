////////////////////////////////////////////////
// 100% Height Off-Canvas Foundation 5
// http://stackoverflow.com/questions/20484240/100-height-off-canvas-foundation-5/20941659#20941659
////////////////////////////////////////////////
$(function () {
    var timer;
    $(window).resize(function () {
        clearTimeout(timer);
        timer = setTimeout(function () {
            $('.inner-wrap').css("min-height", $(window).height() + "px");
        }, 40);
    }).resize();
});

////////////////////////////////////////////////
// smooth scroll to any anchor points
// http://www.abeautifulsite.net/smoothly-scroll-to-an-element-without-a-jquery-plugin-2/
////////////////////////////////////////////////
$(function () {
    $('a[href^="#"]').on('click', function (event) {
            var target = $($(this).attr('href'));
            if (target.length) {
                event.preventDefault();
                $('html, body').animate({ scrollTop: target.offset().top }, 500);
            }
        });
});

////////////////////////////////////////////////
// back to top
////////////////////////////////////////////////
/* learn how here >> http://brandaid.it/16kSKCu */
var offset = 220;
var duration = 500;
jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() > offset) {
        jQuery('#to-top').fadeIn(duration);
    } else {
        jQuery('#to-top').fadeOut(duration);
    }
});
jQuery('#to-top').click(function (event) {
    event.preventDefault();
    jQuery('html, body').animate({
        scrollTop: 0
    }, duration);
    return false;
});

$(document).ready(function () { // BEGIN DOCUMENT READY FUNCTION //

    ////////////////////////////////////////////////
    // hero bxslider
    ////////////////////////////////////////////////
    $('.hero-slider').bxSlider({
        //adaptiveHeight: true,
        mode: 'fade',
        auto: true,
        speed: 1000,
        pause: 8000,
        adaptiveHeight: true,
        autoHover: true,
    });

}); // END DOCUMENT READY FUNCTION //


////////////////////////////////////////////////
// custom MENU / FORM
////////////////////////////////////////////////

// onScreen jQuery plugin v0.2.1
// (c) 2011-2013 Ben Pickles
//
// http://benpickles.github.io/onScreen
//
// Released under MIT license.
(function(a){a.expr[":"].onScreen=function(b){var c=a(window),d=c.scrollTop(),e=c.height(),f=d+e,g=a(b),h=g.offset().top,i=g.height(),j=h+i;return h>=d&&h<f||j>d&&j<=f||i>e&&h<=d&&j>=f}})(jQuery);

jQuery( document ).ready(function($) {
	// MENU
    $("body").on('click', "ul.sidebar-list li a", function(){
    	$("ul.sidebar-list li a.current").removeClass('current');
    	$(this).addClass('current');
    });

    // FORM
    $("body").on('submit', "form#form_contact", function(event){
		event.preventDefault();
		var error=0;
		var f_first_name=$('#field_first_name').val();
		var f_last_name=$('#field_last_name').val();
		var f_email=$('#field_email').val();
		var f_company=$('#field_company').val();
		var f_comment=$('#field_comments').val();
		
		$('.error.error_message').hide().css( "display", "none!important");	

		if(f_first_name==""){ $('#first_name_error').show().css( "display", "block"); error=1; }
		if(f_last_name==""){ $('#last_name_error').show().css( "display", "block"); error=1; }
		if(f_email==""){ $('#email_error').show().css( "display", "block"); error=1; }
		if(error==0){
			$.post(
				"contact.php", 
				{
					action: 'send_form',
					first_name: f_first_name,
					last_name: f_last_name,
					email: f_email,
					company: f_company,
					comment: f_comment
				},
				function( data ) {
					if(data.status==true){
						$('#contactok').foundation('reveal', 'open');
						var modal=$('#contactok');
						var pos=$("#contact").position();
	  					modal.css('top',pos.top+'px');
	  					$('#form_contact input, #form_contact textarea').val('');
					}
					else{
						$('#contactnok .text').html('Error submitting form. '+data.message);
						$('#contactnok').foundation('reveal', 'open');
					}
				},
				'json'
			);
		}
    });
    
    $("body").on('click', "#submit_button", function(event){ event.preventDefault(); $("form#form_contact").trigger('submit'); });
    
    // MODAL HACK
    $(document).on('opened.fndtn.reveal', '[data-reveal]', function () {
	  var modal = $(this);
	  var pos=$("#careers").position();
	  modal.css('top',pos.top+'px');
	});
	
	$(document).on('opened.fndtn.reveal', '#contactok[data-reveal]', function () {
		var modal=$('#contactok');
		var pos=$("#contact").position();
		modal.css('top',(pos.top+($("#contact").height()/2))+'px');
	});
	
	$(document).on('opened.fndtn.reveal', '#contactnok[data-reveal]', function () {
		var modal=$('#contactnok');
		var pos=$("#contact").position();
		modal.css('top',(pos.top+($("#contact").height()/2))+'px');
	});
	
});

// CHANGE MENU STATE ON SCROLL
jQuery(window).scroll(function (event) {
	$=jQuery;
	change_menu_active();            
});

function change_menu_active(){
	$=jQuery;
	$("ul.sidebar-list li a.current").removeClass('current');
	var found=0;
	$("ul.sidebar-list li a").each(function(){
		var elemen_id=$(this).attr('href');
		if( $(elemen_id).is(':onScreen')==true && found==0 && elemen_id!="#top" ){ $(this).addClass('current'); found=1; };
	});	
}