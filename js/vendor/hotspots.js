// onScreen jQuery plugin v0.2.1
// (c) 2011-2013 Ben Pickles
//
// http://benpickles.github.io/onScreen
//
// Released under MIT license.
(function(a){a.expr[":"].onScreen=function(b){var c=a(window),d=c.scrollTop(),e=c.height(),f=d+e,g=a(b),h=g.offset().top,i=g.height(),j=h+i;return h>=d&&h<f||j>d&&j<=f||i>e&&h<=d&&j>=f}})(jQuery);


jQuery( document ).ready(function($) {
     //JS TOOLTIP
	$("#ihotspot1_1").LiteTooltip({location:"bottom",title:'<div class="info_div">'+$("#ihotspot1_1").children(".hidden").html()+"</div>"});
	$("#ihotspot1_2").LiteTooltip({location:"top",title:'<div class="info_div">'+$("#ihotspot1_2").children(".hidden").html()+"</div>"});
	$("#ihotspot1_3").LiteTooltip({location:"right",title:'<div class="info_div">'+$("#ihotspot1_3").children(".hidden").html()+"</div>"});
	$("#ihotspot1_4").LiteTooltip({location:"bottom",title:'<div class="info_div">'+$("#ihotspot1_4").children(".hidden").html()+"</div>"});
	$("#ihotspot1_5").LiteTooltip({location:"left",title:'<div class="info_div">'+$("#ihotspot1_5").children(".hidden").html()+"</div>"});
	$("#ihotspot1_6").LiteTooltip({location:"left",title:'<div class="info_div">'+$("#ihotspot1_6").children(".hidden").html()+"</div>"});
	$("#ihotspot2_1").LiteTooltip({location:"top",title:'<div class="info_div">'+$("#ihotspot2_1").children(".hidden").html()+"</div>"});
	$("#ihotspot2_2").LiteTooltip({location:"bottom",title:'<div class="info_div">'+$("#ihotspot2_2").children(".hidden").html()+"</div>"});
	$("#ihotspot2_3").LiteTooltip({location:"top",title:'<div class="info_div">'+$("#ihotspot2_3").children(".hidden").html()+"</div>"});
	$("#ihotspot2_4").LiteTooltip({location:"bottom",title:'<div class="info_div">'+$("#ihotspot2_4").children(".hidden").html()+"</div>"});
	$("#ihotspot2_5").LiteTooltip({location:"bottom",title:'<div class="info_div">'+$("#ihotspot2_5").children(".hidden").html()+"</div>"});
	$("#ihotspot3_1").LiteTooltip({location:"top",title:'<div class="info_div">'+$("#ihotspot3_1").children(".hidden").html()+"</div>"});
	$("#ihotspot3_2").LiteTooltip({location:"top",title:'<div class="info_div">'+$("#ihotspot3_2").children(".hidden").html()+"</div>"});
	$("#ihotspot3_3").LiteTooltip({location:"bottom",title:'<div class="info_div">'+$("#ihotspot3_3").children(".hidden").html()+"</div>"});
	$("#ihotspot3_4").LiteTooltip({location:"top",title:'<div class="info_div">'+$("#ihotspot3_4").children(".hidden").html()+"</div>"});
	
});