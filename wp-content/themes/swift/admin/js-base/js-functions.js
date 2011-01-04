// <![CDATA[

/*Drop down navigation*/
function dropdown() {
jQuery(".navigation ul").css({display: "none"}); // Opera Fix
jQuery(".navigation li").hover(function(){
		jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268);
		},function(){
		jQuery(this).find('ul:first').css({visibility: "hidden"});
		});
toggleWidgets();
};
/*Tabs*/
jQuery(function() {
	jQuery(".tabmenu").removeClass("hidden");
	jQuery(".tabs h2").addClass("hidden");
	jQuery(".tabs").tabs();
});

/* Image width in the posts can be max 550px */
 
	jQuery(window).load(function() {
		jQuery('div.entry img').each(function() {
			jQuery(this).removeAttr('width');
			jQuery(this).removeAttr('height');
			current_width = jQuery(this).width();
			current_height = jQuery(this).height();
			aspect_ratio = current_width/current_height;
			if(current_width > 566) {
				new_height = 566/aspect_ratio;
				jQuery(this).width('566px');
				jQuery(this).height(new_height);
			}
		});
	});
 /* Image width in the posts can be max 550px */
	jQuery(window).load(function() {
		jQuery('div.wp-caption').each(function() {
			jQuery(this).removeAttr('width');
			current_width = jQuery(this).width();
			current_height = jQuery(this).height();
			aspect_ratio = current_width/current_height;
			if(current_width > 576) {
				new_height = 576/aspect_ratio;
				jQuery(this).width('576px');
			}
		});
	});	
		// ]]>