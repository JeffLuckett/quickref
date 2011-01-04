// <![CDATA[

/* Copyright (c) 2008 Kean Loong Tan http://www.gimiti.com/kltan
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 * jFlow
 * Version: 1.2 (July 7, 2008)
 * Requires: jQuery 1.2+
 */
 
(function($){$.fn.jFlow=function(options){var opts=$.extend({},$.fn.jFlow.defaults,options);var randNum=Math.floor(Math.random()*11);var jFC=opts.controller;var jFS=opts.slideWrapper;var jSel=opts.selectedWrapper;var cur=0;var timer;var maxi=$(jFC).length;var slide=function(dur,i){$(opts.slides).children().css({overflow:"hidden"});$(opts.slides+" iframe").hide().addClass("temp_hide");$(opts.slides).animate({marginLeft:"-"+(i*$(opts.slides).find(":first-child").width()+"px")},opts.duration*(dur),opts.easing,function(){$(opts.slides).children().css({overflow:"hidden"});$(".temp_hide").show();});}
$(this).find(jFC).each(function(i){$(this).click(function(){dotimer();if($(opts.slides).is(":not(:animated)")){$(jFC).removeClass(jSel);$(this).addClass(jSel);var dur=Math.abs(cur-i);slide(dur,i);cur=i;}});});$(opts.slides).before('<div id="'+jFS.substring(1,jFS.length)+'"></div>').appendTo(jFS);$(opts.slides).find("div").each(function(){$(this).before('<div class="jFlowSlideContainer"></div>').appendTo($(this).prev());});$(jFC).eq(cur).addClass(jSel);var resize=function(x){$(jFS).css({position:"relative",width:opts.width,height:opts.height,overflow:"hidden"});$(opts.slides).css({position:"relative",width:$(jFS).width()*$(jFC).length+"px",height:$(jFS).height()+"px",overflow:"hidden"});$(opts.slides).children().css({position:"relative",width:$(jFS).width()+"px",height:$(jFS).height()+"px","float":"left",overflow:"hidden"});$(opts.slides).css({marginLeft:"-"+(cur*$(opts.slides).find(":eq(0)").width()+"px")});}
resize();$(window).resize(function(){resize();});$(opts.prev).click(function(){dotimer();doprev();});$(opts.next).click(function(){dotimer();donext();});var doprev=function(x){if($(opts.slides).is(":not(:animated)")){var dur=1;if(cur>0)
cur--;else{cur=maxi-1;dur=cur;}
$(jFC).removeClass(jSel);slide(dur,cur);$(jFC).eq(cur).addClass(jSel);}}
var donext=function(x){if($(opts.slides).is(":not(:animated)")){var dur=1;if(cur<maxi-1)
cur++;else{cur=0;dur=maxi-1;}
$(jFC).removeClass(jSel);slide(dur,cur);$(jFC).eq(cur).addClass(jSel);}}
var dotimer=function(x){if((opts.auto)==true){if(timer!=null)
clearInterval(timer);timer=setInterval(function(){$(opts.next).click();},3000);}}
dotimer();};$.fn.jFlow.defaults={controller:".jFlowControl",slideWrapper:"#jFlowSlide",selectedWrapper:"jFlowSelected",auto:true,easing:"swing",duration:2000,width:"100%",prev:".jFlowPrev",next:".jFlowNext"};})(jQuery);

 
jQuery(document).ready(function(){
    jQuery("#myController").jFlow({
        slides: "#slides",  // the div where all your sliding divs are nested in
        controller: ".jFlowControl", // must be class, use . sign
        slideWrapper : "#jFlowSlide", // must be id, use # sign
        selectedWrapper: "jFlowSelected",  // just pure text, no sign
        width: "",  // this is the width for the content-slider
        height: "220px",  // this is the height for the content-slider
        duration: 000,  // time in miliseconds to transition one slide
        prev: ".jFlowPrev", // must be class, use . sign
        next: ".jFlowNext" // must be class, use . sign
    });
}); 

/*Toggles the widgets*/
function toggleWidgets() {
    jQuery('h4.widget-title').addClass('plus');

    jQuery('h4.widget-title').click(function()
        {jQuery(this).toggleClass('plus').toggleClass('minus').next().toggle(180);
    });

}

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

/*tool tip*/
this.tooltip = function(){	
	/* CONFIG */		
		xOffset = 10;
		yOffset = 20;		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result		
	/* END CONFIG */		
	jQuery("#sb-container a").hover(function(e){											  
		this.t = this.title;
		this.title = "";	
		
		jQuery("body").append("<p id='tooltip'>"+ this.t +"</p>");
		jQuery("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px")
			.fadeIn("fast");		
    },
	function(){
		this.title = this.t;		
		jQuery("#tooltip").fadeOut("slow").remove();
    });	
	        
	jQuery("a.tooltip").mousemove(function(e){
		jQuery("#tooltip")
			.css("top",(e.pageY - xOffset) + "px")
			.css("left",(e.pageX + yOffset) + "px");
	});			
};



// starting the script on page load
jQuery(function(){
	tooltip();
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