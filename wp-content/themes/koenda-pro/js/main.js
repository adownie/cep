jQuery(document).ready(function(){
	// Dropdown Menu
	jQuery('.menu li').hover(function(){
		jQuery(this).children('a').addClass('hover');
		jQuery(this).children('.sub-menu').css({'display':'block'});
	}, function(){
		jQuery(this).children('a').removeClass('hover');
		jQuery(this).children('.sub-menu').css({'display':'none'});
	});
	
	jQuery('.widget .menu').addClass('menuwidget');
	jQuery('.widget .menuwidget').removeClass('menu');
	
	jQuery('.widget-footer .menu').addClass('menuwidget');
	jQuery('.widget-footer .menuwidget').removeClass('menu');	
	

	jQuery('.menu li.current').children('a').addClass('currentpag');
	jQuery('.sub-menu li:first-child').css({'border-top':'none'});
	// Mobile
	jQuery('.mobilemenu_toggle').click(function(eventObject) {
		eventObject.preventDefault();
	}).toggle(function(){
		jQuery(this).parents('.menuwrapp_mobile').find('.menu_mobile').slideDown(200);
	}, function(){
		jQuery(this).parents('.menuwrapp_mobile').find('.menu_mobile').slideUp(200);
	});
	
	// Input Focus
	jQuery("#search").focus(function(){
		var value = jQuery(this).attr("value");
		if (value == "")
		jQuery("#topsearch label").css({"display":"none"});
	});
	jQuery("#search").blur(function(){
		var value = jQuery(this).attr("value");
		if (value == "")
		jQuery("#topsearch label").css({"display":"block"});
	});	
	jQuery(".newsletter :text").focus(function(){
		var value = jQuery(this).attr("value");
		if (value == "")
		jQuery(this).parents('.newsletter').children('label').css({"display":"none"});
	});
	jQuery(".newsletter :text").blur(function(){
		var value = jQuery(this).attr("value");
		if (value == "")
		jQuery(this).parents('.newsletter').children('label').css({"display":"block"});
	});				
	// Css
	jQuery('.topbarnav li:first-child').css({'border-left':'none'});
	
}); //Final Ready