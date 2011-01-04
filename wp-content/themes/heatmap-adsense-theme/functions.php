<?php
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 24/03/2010

This file is part of HeatMap Theme 2
	
HeatMap Theme 2 is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
any later version.

HeatMap Theme 2 is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.	
*/

/* 	The starting points and inspiration for the options page code in HeatMap Theme 2.0 can be found at the following locations:
	* Thomas Silkjear (blog page now defunct but locatable via the WayBack Machine): 
		http://web.archive.org/web/20080213181237/http://theundersigned.net/2006/06/wordpress-how-to-theme-options/
	* Dan Harper: http://blog.themeforest.net/wordpress/create-an-options-page-for-your-wordpress-theme/
	* Ralph Damiano: http://forthelose.org/how-to-create-a-theme-options-page-for-your-wordpress-theme
	* Brian Gardner - Allure Theme - functions.php: http://www.studiopress.com/
	My version of this code (July 2009) fixes a few wee bugettes and substantially modifies, enhances the above by adding
	 - Adsense-Combo type 
	 - Link to a user guide for each option
	 - Extra information boxes and variables
	 - CSS theming from WordPress 2.7 to make it all look much more snazzy. 
	 - Allowing the code to save and retrieve html entities such as &amp; properly */
	
	$stylesheetfile = STYLESHEETPATH . '/preset.php'; 
	if (function_exists('hmt_child_theme') && (file_exists($stylesheetfile)))
		include(STYLESHEETPATH."/preset.php");
	else 
		include(TEMPLATEPATH."/preset.php");
	
	/* end of update */ 

/* Set up Variables, Sidebars and Widgets
-------------------------------------------------------------- */
function hmt_set_up_vars() {
	
	global $themename, $shortname, $options, $baseversion, $thisversion, $subtitle, $preset_mode;

/* Admin Page Variables
-------------------------------------------------------------- */

	$themename = "HeatMap";
	$subtitle = "adsense-theme-for-wordpress";
	$baseversion = "2";
	$thisversion = "2.5.4";
	$shortname = "hmt";
	
	$options = array (
					  			  
/* Preset Mode
-------------------------------------------------------------- */
	
		array(	"name" => "Activate Preset Mode",
				"desc" => "",
				"id" => $shortname."_preset_mode_activated",
				"std" => "ON",
				"userguide" => "preset-mode",
				"options" => array("ON", "OFF"),
				"type" => "select"),

/* Adsense Ad Units (Max 3 Google Ad Units Per Page)
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "Ad Units",
				"type" => "title"),
									
		array(	"name" => "Adsense Unit 1",
				"desc" => "",
				"id" => $shortname."_ad_unit_1",
				"slug" => $shortname."-widget-ad-unit-1",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_ad_unit_1",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),
		
		array(	"name" => "Adsense Unit 2",
				"desc" => "",
				"id" => $shortname."_ad_unit_2",
				"slug" => $shortname."-widget-ad-unit-2",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_ad_unit_2",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
		
		array(	"name" => "Adsense Unit 3",
				"desc" => "",
				"id" => $shortname."_ad_unit_3",
				"slug" => $shortname."-widget-ad-unit-3",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_ad_unit_3",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
		
		array( "type" => "close"),
				

/* Adsense Link Units (Max 3 Google Link Units Per Page)
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "Link Units",
				"type" => "title"),
		
		array(	"name" => "Adsense Link Unit 1",
				"desc" => "",
				"id" => $shortname."_link_unit_1",
				"slug" => $shortname."-widget-link-unit-1",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_link_unit_1",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
	
		array(	"name" => "Adsense Link Unit 2",
				"desc" => "",
				"id" => $shortname."_link_unit_2",
				"slug" => $shortname."-widget-link-unit-2",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_link_unit_2",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
		
		array(	"name" => "Adsense Link Unit 3",
				"desc" => "",
				"id" => $shortname."_link_unit_3",
				"slug" => $shortname."-widget-link-unit-3",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_link_unit_3",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
		
		array( "type" => "close"),
				
				
/* Addtional Ad Units 
-------------------------------------------------------------- */
				
		array( "type" => "open"),
		
		array(	"name" => "Addtional Ad Units",
				"type" => "title"),
		
		array(	"name" => "Addtional Ad Unit 1",
				"desc" => "",
				"id" => $shortname."_additional_unit_1",
				"slug" => $shortname."-widget-additional-unit-1",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_additional_unit_1",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
	
		array(	"name" => "Addtional Ad Unit 2",
				"desc" => "",
				"id" => $shortname."_additional_unit_2",
				"slug" => $shortname."-widget-additional-unit-2",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_additional_unit_2",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
		
		array(	"name" => "Addtional Ad Unit 3",
				"desc" => "",
				"id" => $shortname."_additional_unit_3",
				"slug" => $shortname."-widget-additional-unit-3",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_additional_unit_3",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
		
		array(	"name" => "Addtional Ad Unit 4",
				"desc" => "",
				"id" => $shortname."_additional_unit_4",
				"slug" => $shortname."-widget-additional-unit-4",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_additional_unit_4",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	

		array(	"name" => "Addtional Ad Unit 5",
				"desc" => "",
				"id" => $shortname."_additional_unit_5",
				"slug" => $shortname."-widget-additional-unit-5",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_additional_unit_5",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	
		
		array(	"name" => "Addtional Ad Unit 6",
				"desc" => "",
				"id" => $shortname."_additional_unit_6",
				"slug" => $shortname."-widget-additional-unit-6",
				"widgetdesc" => "Ad Unit (HeatMap Theme v" . $baseversion . ")",
				"function" => $shortname. "_widget_additional_unit_6",
				"std" => "",
				"userguide" => "adsense-ad-and-link-units",
				"checkbox" => array("Home" => "",
									"Page" => "",
									"Post" => "",
									"Category" => "",
									"Search" => "",
									"Archive" => ""),
				"type" => "ad-combo"),	

		
		array( "type" => "close"),
				

/* Header Bar
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "Header Bar options",
				"type" => "title"),
				
		array(	"name" => "Logo URL",
				"desc" => "",
				"id" => $shortname."_logo_url",
				"std" => "",
				"userguide" => "logo-url",
				"type" => "text"),
		
		array(	"name" => "Logo ALT text description",
				"desc" => "",
				"id" => $shortname."_alt_text",
				"std" => "",
				"userguide" => "logo-alt",
				"type" => "text"),
		
		array(	"name" => "Hide Title and Tagline?",
				"desc" => "",
				"id" => $shortname."_show_title_and_tagline",
				"std" => "checked",
				"userguide" => "title-and-tagline",
				"type" => "checkbox"),
		
		array( "type" => "close"),
				
/* Home Page
-------------------------------------------------------------- */

		array( "type" => "open"),
	
		array(	"name" => "Home Page options",
				"type" => "title"),
		
		array(	"name" => "Featured Page ID",
				"desc" => "",
				"id" => $shortname."_featured",
				"std" => "",
				"userguide" => "featured-page-id",
				"type" => "text"),
		
		array( "type" => "close"),


/* Pages to Exclude from Pages Nav Bar
-------------------------------------------------------------- */

		array( "type" => "open"),
	
		array(	"name" => "Navigation Options",
				"type" => "title"),
		
		array(	"name" => "Navigation ID exclusion",
				"type" => "heading"),
	
		
		array(	"name" => "Page IDs to exclude",
				"desc" => "",

				"id" => $shortname."_exclude_pages",
				"std" => "",
				"userguide" => "page-id-exclusion",
				"type" => "text"),
				
				
/* Pages to Exclude from Categories Nav Bar
-------------------------------------------------------------- */

				
		array(	"name" => "Category IDs to exclude",
				"desc" => "",
				"id" => $shortname."_exclude_categories",
				"std" => "",
				"userguide" => "category-id-exclusion",
				"type" => "text"),
		
		array( "type" => "close"),

/* Metadata
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "Home Page Meta Description and Keywords",
				"type" => "title"),
		
		array(	"name" => "Meta Description",
				"desc" => "",
				"id" => $shortname."_meta_description",
				"std" => "",
				"userguide" => "meta-description",
				"type" => "textarea"),
		
		array(	"name" => "Meta Keywords",
				"desc" => "",
				"id" => $shortname."_meta_keywords",
				"std" => "",
				"userguide" => "meta-keywords",
				"type" => "textarea"),	
		
		array( "type" => "close"),
		

/* Feedburner
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "<em>Google Feedburner</em><sup>TM</sup> RSS Subscription",
				"type" => "title"),
				
		array(	"name" => "FeedBurner ID",
				"desc" => "",
				"id" => $shortname."_feedburner_id",
				"std" => "",
				"userguide" => "feedburner-subscription",
				"type" => "text"),
		
		array(	"name" => "FeedBurner Comments ID",
				"desc" => "",
				"id" => $shortname."_feedburner_comments_id",
				"std" => "",
				"userguide" => "feedburner-subscription",
				"type" => "text"),
		
		array( "type" => "close"),
				
				
/* Google Analytics
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "<em>Google Analytics</em><sup>TM</sup>",
				"type" => "title"),
		
		array(	"name" => "Tracker Code",
				"desc" => "",
				"id" => $shortname."_google_analytics",
				"std" => "",
				"userguide" => "google-analytics",
				"type" => "textarea"),	
		
		array( "type" => "close"),
				

/* Adsense Search
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "<em>Google Custom Search</em><sup>TM</sup>",
				"type" => "title"),
	
		array(	"name" => "Search Code",
				"desc" => "",
				"id" => $shortname."_google_search",
				"std" => "",
				"userguide" => "google-adsense-custom-search",
				"type" => "textarea"),
		
		array(	"name" => "Results Code",
				"desc" => "",
				"id" => $shortname."_google_results",
				"std" => "",
				"userguide" => "google-adsense-custom-search",
				"type" => "textarea"),
		
		array( "type" => "close"),
		
		
/* Additional <HEAD> Scripts
-------------------------------------------------------------- */

		array( "type" => "open"),
		
		array(	"name" => "Additional Page Code",
				"type" => "title"),
		
		array(	"name" => "Head Scripts",
				"desc" => "",
				"id" => $shortname."_head_scripts",
				"std" => "",
				"userguide" => "head-scripts",
				"type" => "textarea"),	
		
		array( "type" => "close"),
				
							
/* HeatMap Theme Footers
-------------------------------------------------------------- */	

		array( "type" => "open"),
	
		array(	"name" => "Footer Bar options",
				"type" => "title"),
		
		array(	"name" => "Footer Left",
				"desc" => "",
				"id" => $shortname."_footer_left",
				"std" => "",
				"userguide" => "footer-bar",
				"type" => "textarea"),	
		
		array(	"name" => "Footer Right",
				"desc" => "",
				"id" => $shortname."_footer_right",
				"std" => "",
				"userguide" => "footer-bar",
				"type" => "textarea"),	
		
		array(	"name" => "Subfooter Left",
				"desc" => "",
				"id" => $shortname."_subfooter_left",
				"std" => "",
				"userguide" => "footer-bar",
				"type" => "textarea"),	
		
		array(	"name" => "Subfooter Right",
				"desc" => "You can change this credit link to something else. If you decide to retain it we say thanks! :)",
				"id" => $shortname."_subfooter_right",
				"std" => "WordPress Theme by <a href=\"http://heatmaptheme.com\">HeatMapTheme.com</a>",
				"userguide" => "footer-bar",
				"type" => "textarea"),			
		
		array( "type" => "close"),

/* Preset Mode
-------------------------------------------------------------- */
		
		array(	"name" => "Activate Preset Mode",
				"desc" => "",
				"id" => $shortname."_preset_mode_activated",
				"std" => "ON",
				"userguide" => "preset-mode",
				"options" => array("ON", "OFF"),
				"type" => "select")
				
	);


/* Register Widgets
-------------------------------------------------------------- */
	
		if (function_exists('wp_register_sidebar_widget')) {
			
		foreach ($options as $value) { 		// Loop through the options array looking for ad widgets.
			switch ( $value['type'] ) {		// When the details of an ad widget is found then grab its name and description and register it.
				case "ad-combo":
					
					$this_option = get_option($value['id']);
					
					if ($this_option != "") {
						
						$this_name = get_option($value['id'] . '_name');
						if ($this_name=="") $this_name=$value['name'];
					
						$widget_ops = array('description' => $value['widgetdesc']);	
						wp_register_sidebar_widget($value['slug'], $this_name, $value['function'], $widget_ops);  
					}
			}
		}  
		
		// Now register a couple of custom HeatMap Theme widgets
		
		$widget_ops = array('description' => "FeedBurner Email Subscription (HeatMap Theme v" . $baseversion . ")");
		wp_register_sidebar_widget($shortname.'-feedburner-subscription','FeedBurner', $shortname.'_widget_feedburner', $widget_ops);
		
		$widget_ops = array('description' => "Recent Posts PLUS Thumbnails (HeatMap Theme v" . $baseversion . ")");
		wp_register_sidebar_widget($shortname.'-recent-posts-plus','Recent Posts PLUS', $shortname.'_widget_recent_posts_plus', $widget_ops); 
	
		// .. and here comes the registration of the 'sidebars' into which all those lovely widgets will be placed	
			
		register_sidebar(
			array(
			'name' => '[Widebar] Top',
			'before_widget' => '<!-- %2$s --><li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
			)
		);
		
		register_sidebar(
			array(
			'name' => '[Widebar] Bottom',
			'before_widget' => '<!-- %2$s --><li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
			)
		);
		
		register_sidebar(
			array(
			'name' => '[Sidebar] Left',
			'before_widget' => '<!-- %2$s --><li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>'
			)
		); 
		
		register_sidebar(
			array(
			'name' => '[Sidebar] Right',
			'before_widget' => '<!-- %2$s --><li id="%1$s" class="widget %2$s">',
			'after_widget' => '</li>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
			)	
		);
		
		
		register_sidebar(
			array(
			'name' => '[Header] High',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
		
		register_sidebar(
			array(
			'name' => '[Header] Right',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
		
		register_sidebar(
			array(
			'name' => '[All Content] Above',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="all-content-above %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
		
		register_sidebar(
			array(
			'name' => '[All Content] Below',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="all-content-below %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
			
		register_sidebar(
			array(
			'name' => '[Content Item] Above',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="content-item-above %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
			
		register_sidebar(
			array(
			'name' => '[Content Item] Below',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="content-item-below  %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
			
		register_sidebar(
			array(
			'name' => '[Content Item] Left',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="content-item-left %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
			
		register_sidebar(
			array(
			'name' => '[Content Item] Right',
			'before_widget' => '<!-- %2$s --><div id="%1$s" class="content-item-right %2$s">',
			'after_widget' => '</div>',
			'before_title' => '',
			'after_title' => '',
			)
		);
	}
}


/* Feedburner Widget
-------------------------------------------------------------- */

function hmt_widget_feedburner ($args) {
	
	extract($args);
	$output = get_option('hmt_feedburner_id');
	if ($output!='') 
	{
	echo $before_widget;
	echo $before_title; echo 'Subscribe by Email'; echo $after_title; 
	echo '<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open(\'http://feedburner.google.com/fb/a/mailverify?uri=';
	echo stripslashes($output); 
	echo '\', \'popupwindow\', \'scrollbars=yes,width=550,height=520\');return true"><input type="text" id="fbinput" name="email"/><input type="hidden" value="'; echo stripslashes($output); echo '" name="uri"/><input type="hidden" name="loc" value="en_US"/><input id="fbsubmit" type="submit" value="Subscribe" /></form>';
	echo $after_widget;
	echo "\n";	
	}
}


/* Recent Posts Widget PLUS (includes excerpt and thumbnail images)
-------------------------------------------------------------- */

function hmt_widget_recent_posts_plus ($args) {
	
	extract($args);
	global $post; 
	global $more;
	global $ids;

	echo $before_widget;
	echo $before_title; echo 'Further Reading'; echo $after_title;

	$recent = new WP_Query(array('post__not_in' => $ids, 'showposts' => 10)); 	// Only get the query for posts that are NOT already showing on the page
		
	echo '<ul><li>';
	
	$first_time_through = TRUE;		// This allows us to do something sensible with spacing the first time through the loop
	
	while($recent->have_posts()) : $recent->the_post();
		
		if (!$first_time_through) echo '<div class="clearFloat-spacer">&nbsp;</div>';
		
		$first_time_through = FALSE;
		
		echo '<h5><a href="'; the_permalink(); echo '" rel="bookmark">'; the_title(); echo '</a></h5>';

		if (function_exists('has_post_thumbnail')) {
			if (has_post_thumbnail()) :	// Get the thumbnail - added wp auto thumbnail features 25/02/2010
				echo '<div class="thumbnail">';
					echo '<a href="'; the_permalink(); echo '" rel="bookmark">';
					the_post_thumbnail();
					echo '</a>';
				echo '</div>';
				echo "\n";	
			endif; 	
		}

		if( get_post_meta($post->ID, "thumbnail", true) ):	// Get the thumbnail image from a custom field if it is defined, and then show it
			echo '<div class="thumbnail">';
				echo '<a href="'; the_permalink(); echo '" rel="bookmark">';
				echo '<img src="'; echo get_post_meta($post->ID, "thumbnail", true); echo '" alt="'; echo get_post_meta($post->ID, "thumbnail-alt", true); echo '" border="0"/>';
				echo '</a>';
			echo '</div>';
			echo "\n";	
		endif; 		
		
		if( get_post_meta($post->ID, "short-excerpt", true)) 		// Get a short excerpt from a custom field if it is defined, and then show it
			echo '<p>' . get_post_meta($post->ID, "short-excerpt", true) . '</p>';
			echo "\n";	
		
		if (get_post_meta($post->ID, "short-more-text", true)) {	// Get the 'short more text' from a custom field if it is defined, and then show it
			echo '<p class="more-link"><a href="'; the_permalink(); echo '" rel="bookmark">';
			echo get_post_meta($post->ID, "short-more-text", true) . '</a></p>';
			echo "\n";	
		}	
		
	endwhile;
	
	echo '</li></ul>';

	echo $after_widget;
	echo "\n";	
}


/* Function to echo code configured in the options admin and output error if not configured
-------------------------------------------------------------- */

function hmt_option($option_id) {
	$output = get_option($option_id);
	if ($output!='')  echo stripslashes($output); 
}

/* Function to return code configured in the options admin
-------------------------------------------------------------- */

function hmt_get_option($option_id) {
	$output = get_option($option_id); 
	$returned_string = stripslashes($output); 
	return $returned_string;
}

/* Show ad on this page
-------------------------------------------------------------- */

function hmt_show_ad ($this_ad, $args) {
	
	extract($args);
	
	$output = get_option($this_ad);
	// Only show an ad if it is ticked in the options admin
	if ((is_home() and get_option($this_ad . '_Home')) ||	// 1/02/2010 changed is_front_page() to is_home() for consistency and hopefully to clear out a few odd bugs	
		(is_page() and get_option($this_ad . '_Page')) ||
		(is_single() and get_option($this_ad . '_Post')) ||
		(is_category() and get_option($this_ad . '_Category')) ||
		(is_search() and get_option($this_ad . '_Search')) ||
		(is_archive() and get_option($this_ad . '_Archive')))
		{ 
		if ($output!='') {
			echo $before_widget;
			echo stripslashes($output);
			echo $after_widget;
		}
	}
	
}

/* Adsense Ad Units
-------------------------------------------------------------- */

function hmt_widget_ad_unit_1($args) {
	hmt_show_ad('hmt_ad_unit_1', $args);
}

function hmt_widget_ad_unit_2($args) {
	hmt_show_ad('hmt_ad_unit_2', $args);
}

function hmt_widget_ad_unit_3($args) {
	hmt_show_ad('hmt_ad_unit_3', $args);
}


/* Adsense Link Units
-------------------------------------------------------------- */

function hmt_widget_link_unit_1($args) {
	hmt_show_ad('hmt_link_unit_1', $args);
}

function hmt_widget_link_unit_2($args) {
	hmt_show_ad('hmt_link_unit_2', $args);
}

function hmt_widget_link_unit_3($args) {
	hmt_show_ad('hmt_link_unit_3', $args);
}


/* Addtional Ad Units
-------------------------------------------------------------- */

function hmt_widget_additional_unit_1($args) {
	hmt_show_ad('hmt_additional_unit_1', $args);
}

function hmt_widget_additional_unit_2($args) {
	hmt_show_ad('hmt_additional_unit_2', $args);
}

function hmt_widget_additional_unit_3($args) {
	hmt_show_ad('hmt_additional_unit_3', $args);
}

function hmt_widget_additional_unit_4($args) {
	hmt_show_ad('hmt_additional_unit_4', $args);
}

function hmt_widget_additional_unit_5($args) {
	hmt_show_ad('hmt_additional_unit_5', $args);
}

function hmt_widget_additional_unit_6($args) {
	hmt_show_ad('hmt_additional_unit_6', $args);
}


/* HeatMap Theme Footer Functions
-------------------------------------------------------------- */

/* Left Footer
---------------------------------- */

function hmt_footer_left() {
	$output = get_option('hmt_footer_left');
	if ($output!='') 
	{
		echo '<p>'; 
		echo stripslashes($output);
		echo '</p>'; 
	}
}


/* Right Footer
---------------------------------- */

function hmt_footer_right() {
	
	$output = get_option('hmt_footer_right');
	if ($output!='') 
	{
		echo '<p>'; 
		echo stripslashes($output);
		echo '</p>'; 
	}
}



/* Left Subfooter
---------------------------------- */

function hmt_subfooter_left() {
	$output = get_option('hmt_subfooter_left');
	if ($output!='') 
	{
		echo '<p>'; 
		echo stripslashes($output);
		echo '</p>'; 
	}
}


/* Right Subfooter
---------------------------------- */

function hmt_subfooter_right() {
	$output = get_option('hmt_subfooter_right');
	if ($output!='') 
	{
		echo '<p>'; 
		echo stripslashes($output);
		echo '</p>'; 
	}
	else
	{
		echo '<p>WordPress Theme by <a href="http://heatmaptheme.com">HeatMapTheme.com</a></p>';
	}
}



/* Google Search
(which defaults to wordpress blog search 
if Google Search Code is not configured in the admin) 
---------------------------------- */

function hmt_google_search() {
	$output = get_option('hmt_google_search');	//output the Google Search
	if ($output!='') 
	{
		echo stripslashes($output);
	}
	else		
	{
		echo '<form method="get" id="searchform" action="';echo bloginfo('url');  // ...and if you don't have one then the WordPress Search will just have to do
		echo '"><input type="text" value="" name="s" id="s" size="20" />
				<input type="submit" id="searchsubmit" value="Search" />
				</form>';
	}
}



/* Add Admin
-------------------------------------------------------------- */
function hmt_add_admin() {
 
	global $themename, $shortname, $options;
	 
	if ( $_GET['page'] == basename(__FILE__) ) {
		
		if ( 'save' == $_REQUEST['action'] ) {	// Okay, someone has pressed the save button in the Options page
	
				foreach ($options as $value) {														// Loop through the options array and write settings to options table
					if($value['type'] != 'ad-combo'){								
						update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 					// if its not an ad combo then just update the options table
					}else{
						update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 					// Otherwise update the option...
						update_option( $value['id'] .'_name', $_REQUEST[ $value['id'] . '_name'] ); // ..the name of each ad widget
						foreach($value['checkbox'] as $checkbox_name => $checkbox_setting){			// ...and then loop through the array of checkboxes associated with it
							$this_option = $value['id'].'_'.$checkbox_name;
							update_option($this_option, $_REQUEST[$this_option] );					// ... updating the options table as you go.
						}
					}
				} 
	
				foreach ($options as $value) {														// do a bit of housekeeping deleting any empty options in the options table
					if($value['type'] != 'ad-combo'){
						if ($_REQUEST[$value['id']]=='') delete_option( $value['id'] );  
					}else{
						if ($_REQUEST[ $value['id']]=='') delete_option( $value['id'] ); 
						if ($_REQUEST[ $value['id'] .'_name' ] =='') delete_option( $value['id'] .'_name'); 
						foreach($value['checkbox'] as $checkbox_name => $checkbox_setting){
							$this_option = $value['id'].'_'.$checkbox_name;						
							if ($_REQUEST[$this_option ] == '') delete_option( $this_option ); 
						}
					}
				}
				header("Location: themes.php?page=functions.php&saved=true");
				die;
	
		} else if( 'reset' == $_REQUEST['action'] ) {
	
			foreach ($options as $value) {				// If someone has pressed the Reset button then loop through and delete all the options for this theme
				if($value['type'] != 'ad-combo'){
					delete_option( $value['id'] ); 
				}else{
					delete_option( $value['id'] );
					delete_option( $value['id'] .'_name');
					foreach($value['checkbox'] as $checkbox_name => $checkbox_setting){   //...including all the check boxes for each ad
						$delete_this_option = $value['id'].'_'.$checkbox_name;
						delete_option($delete_this_option);
					}
				}
			}
			header("Location: themes.php?page=functions.php&reset=true");
			die;
		}
	} 
	add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'hmt_admin');
}


/* Admin Page
-------------------------------------------------------------- */

function hmt_admin() {
 
	global $themename, $shortname, $options, $baseversion, $thisversion, $subtitle;
	 
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' Theme settings saved.</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' Theme settings reset.</strong></p></div>';
	 
	?>
	
	<div class="wrap">
	
	<h2><img src="<?php echo bloginfo('template_url'); ?>/images/mappy-wp-bw-45-web.png" align="absbottom" width="47px" height="45px" />&nbsp;<?php echo $themename; ?> Options</h2>
	
		<div style="width:965px;"> 
	
			<div style="float:left">
			<form method="post">
			
				<?php // if we are in preset mode then we have to do some fancy footwork to bring the preset mode turner-off-er up to the top of the options page
				$preset_mode_already_shown=FALSE;
				$this_mode = hmt_get_option(hmt_preset_mode_activated);
				if (($this_mode=="ON")||($this_mode=="")) {
					$preset_mode=TRUE; 
					$show_next_time=FALSE;
				?>
					
				<div id="message" class="updated fade">
					<p><span style="color:#F00"><strong>Preset Mode</strong></span> is activated. To activate <strong>Full Widget Mode</strong> (recommended) and activate all Widget Positions turn off Preset Mode below :)
				</div>
				
				<?php } ?>	
					
				<?php 
				foreach ($options as $value) {			// Loop through the options array and display all the options in a form for editing.
					switch ( $value['type'] ) {			
			
/* This is the left column of the options page
-------------------------------------------------------------- */

/* Open
-------------------------------------------------------------- */	
	
					case "open": ?>
						<table class="widefat" cellspacing="0" style="width:600px;"><tbody>
			 
					<?php break;
				 
/* Close
-------------------------------------------------------------- */	
				 
					case "close": ?>
						</tbody></table>
						<br />
					<?php break;
	
/* Title
-------------------------------------------------------------- */	
				 
					case "title": ?>
						<thead>
							<tr>
								<th colspan="2" scope="col">
									<?php echo $value['name']; ?> 
									<div style="float:right">
										<input name="save" type="submit" value="Save" class="button-primary"/>
										<input type="hidden" name="action" value="save" />
									</div>
								</th>
							</tr>
						</thead>
					<?php break;

/* Text
-------------------------------------------------------------- */
					
					case 'text': ?>
						<tr>
							<td width="250px"><strong><?php echo $value['name']; ?></strong><br />
								<small><a href="http://heatmaptheme.com/<?php echo $subtitle; ?>/version-<?php echo $baseversion; ?>/<?php echo $value['userguide']; ?>/"><strong>[User Guide]</strong></a></small><br /><br />
								<?php echo $value['desc']; ?>
							</td>
							<td width="350px">
								<input style="width:340px; font-size:11px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_option( $value['id'] ) != "") { echo htmlspecialchars(stripslashes(get_option( $value['id']))); } else { echo $value['std']; } ?>" />
							</td>
						</tr>
			
					<?php break;
				 
/* Text Area
-------------------------------------------------------------- */	
				 
					case 'textarea': ?> 
						<tr>
							<td width="250px"><strong><?php echo $value['name']; ?></strong><br />
								<small><a href="http://heatmaptheme.com/<?php echo $subtitle; ?>/version-<?php echo $baseversion; ?>/<?php echo $value['userguide']; ?>/"><strong>[User Guide]</strong></a></small><br /><br />
								<?php echo $value['desc']; ?>
							</td>
							<td width="350px">
							<textarea name="<?php echo $value['id']; ?>" style="width:340px; height:120px; font-size:11px;" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_option($value['id']))); } else { echo $value['std']; } ?></textarea>
							</td> 
						</tr>
						
					<?php break;
					
/* Checkbox
-------------------------------------------------------------- */
					
					case 'checkbox': ?>
						<tr>
							<td width="250px"><strong><?php echo $value['name']; ?></strong><br />
								<small><a href="http://heatmaptheme.com/<?php echo $subtitle; ?>/version-<?php echo $baseversion; ?>/<?php echo $value['userguide']; ?>/"><strong>[User Guide]</strong></a></small><br /><br />
								<?php echo $value['desc']; ?>
							</td>
							<td width="350px">
								<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
								<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
							</td>
						</tr>
			
					<?php break;
						
					
/* Selection - a bit of a hack on this one - just using the select for preset mode in this case... I'll neaten this whole area of code up later I promise ;)
-------------------------------------------------------------- */

					case 'select':
					
					if ((($preset_mode==TRUE) && (!$preset_mode_already_shown)) || ($show_next_time==TRUE)) {
					?>
			
					<table class="widefat" cellspacing="0" style="width:600px;"><tbody>
					
					<thead>
						<tr>
							<th colspan="2" scope="col">
								<?php echo 'Preset Mode'; ?> 
								<div style="float:right">
									<input name="save" type="submit" value="Save" class="button-primary"/>
									<input type="hidden" name="action" value="save" />
								</div>
							</th>
						</tr>
					</thead>
					
					<tr>
						<td width="250px"><strong><?php echo $value['name']; ?></strong><br />
						<small><a href="http://heatmaptheme.com/<?php echo $subtitle; ?>/version-<?php echo $baseversion; ?>/<?php echo $value['userguide']; ?>/"><strong>[User Guide]</strong></a></small><br /><br />
						<?php echo $value['desc']; ?>
						
						</td>
						
						<td width="350px"><select style="width:100px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
					</tr>
					
					</tbody></table>
					<br />
					
					<?php
					}
					$preset_mode_already_shown=TRUE;
					if ($preset_mode==FALSE) {$show_next_time=TRUE;}
					break;
						
/* Ad Combo box
-------------------------------------------------------------- */	
	
					case 'ad-combo': ?> 
						<tr>
							<td width="250px">
							

							<input style="width:200px; font-size:11px; font-weight:bold;" name="<?php echo $value['id'] .'_name'; ?>" id="<?php echo $value['id']  .'_name'; ?>" type="text" value="<?php 
							if ( get_option( $value['id'] . '_name') != "") 
								{ echo get_option( $value['id'] . '_name'); } 
								else { echo $value['name']; } ?>" /><br />
							
								<?php  
								foreach ($value['checkbox'] as $checkbox_name=>$checkbox_setting) {
	
									$this_key = $value['id'] . '_' . $checkbox_name;
									$this_setting = get_option($this_key);
									
									if ($this_setting == '') $checked = "";
									else $checked = "checked=\"checked\""; 
								?>
									
									<input type="checkbox" name="<?php echo $this_key; ?>" id="<?php echo $this_key; ?>" value="true" <?php echo $checked; ?> /> <label for="<?php echo $this_key; ?>"><?php echo $checkbox_name; ?></label><br />
								<?php 	
								} 
								 ?>
								<small><a href="http://heatmaptheme.com/<?php echo $subtitle; ?>/version-<?php echo $baseversion; ?>/<?php echo $value['userguide']; ?>/"><strong>[User Guide]</strong></a></small><br />	
							</td>
							<td width="350px">
							
							<textarea name="<?php echo $value['id']; ?>" style="width:340px; height:120px; font-size:11px;" cols="" rows=""><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(htmlspecialchars(get_option( $value['id']))); } else { echo $value['std']; } ?></textarea>
							</td> 
						</tr>
						
					<?php break;
				 
					}
				}
				?>
	
<?php			
/* Submit and Reset Buttons
-------------------------------------------------------------- */
?>
			 
				<p class="submit">
					<input name="save" type="submit" value="Save changes" class="button-primary"/>
					<input type="hidden" name="action" value="save" />
				</p>
			</form>
			
			<form method="post">
				<p class="submit">
				<input name="reset" type="submit" value="Reset" class="button-secondary" />
				<input type="hidden" name="action" value="reset" />
			</p>
			</form>
			
			</div>
			
			
			<div style="float:left">
			

				
<?php			
/* This is the right column of the options page
-------------------------------------------------------------- */
?>
				
				<table class="widefat" cellspacing="0" style="width:350px; margin-left:15px;">
				
					<tbody> 
						<thead>
							<tr>
								<th colspan="2" scope="col">
									Latest News from <a href="http://heatmaptheme.com">HeatMapTheme.com</a>
								</th>
							</tr>
						</thead>
					
							<tr>
								<td width="350px">
									<?php
									include_once(ABSPATH . WPINC . '/rss.php'); 
									wp_rss('http://heatmaptheme.com/feed', 3);
									?>	
								</td>
							</tr>
					
					</tbody>
				</table>
				
				<br />
				
				<table class="widefat" cellspacing="0" style="width:350px; margin-left:15px;">
				
					<tbody> 
						<thead>
							<tr>
								<th colspan="2" scope="col">
									HeatMap Theme <a href="http://heatmaptheme.com/adsense-theme-for-wordpress/version-2/positioning-adsense-widgets-on-your-blog/" target="_blank">Widget Positions</a>
								</th>
							</tr>
						</thead>
					
							<tr>
								<td width="350px">
								
									<center><a href="http://heatmaptheme.com/adsense-theme-for-wordpress/version-2/positioning-adsense-widgets-on-your-blog/" target="_blank"><img src="<?php echo bloginfo('template_url'); ?>/images/preset-images/widget-layout-small.gif" align="absbottom" width="150px" height="173px"  alt="View Widget Positions User Guide"/></a></center> 
								
						<?php /*		<center><a href="http://heatmaptheme.com"><img src="<?php echo bloginfo('template_url'); ?>/images/mappy-wp-bw-250-web.png" align="absbottom" width="250px" height="181px" /></a></center> */ ?>
								</td>
							</tr>
					
					</tbody>
				</table>
				
				
				<br />
			
				<table class="widefat" cellspacing="0" style="width:350px; margin-left:15px;">
				
					<tbody> 
						<thead>
							<tr>
								<th colspan="2" scope="col">
									Base Theme Info
								</th>
							</tr>
						</thead>
					
							<tr>
								<td width="150px">
									Author:<br />
									Theme Name:<br />
									Base Version:<br />
									This Version:
								</td>
								<td width="200px">
									<a href="http://stuartwider.com">Stuart Wider</a><br />
									<?php echo $themename; ?><br />
									<?php echo $baseversion; ?><br />
									<?php echo $thisversion; ?>
								</td>
							</tr>
					
					</tbody>
				</table>
				
				<br />
			
				<?php 
				$ct = current_theme_info(); 
				if ($ct->parent_theme != '') {    // if the current theme is a child theme then display extra details form the current theme array.
				?>
				
				<table class="widefat" cellspacing="0" style="width:350px; margin-left:15px;">
				
					<tbody> 
						<thead>
							<tr>
								<th colspan="2" scope="col">
									Child Theme Info
								</th>
							</tr>
						</thead>
					
							<tr>
								<td width="150px">
									Author:<br />
									Theme Name:<br />
									Version:
								</td>
								<td width="200px">
									<?php 
									echo $ct->author . '<br />'; 
									echo $ct->name .'<br />';
									echo $ct->version; 
									?>
								</td>
							</tr>
					
					</tbody>
				</table>
				<br />
				
				<?php 
				} 
				?>
				
				<table class="widefat" cellspacing="0" style="width:350px; margin-left:15px;">
				
					<tbody> 
						<thead>
							<tr>
								<th colspan="2" scope="col">
									&copy; Copyright, Licensing and Trademarks
								</th>
							</tr>
						</thead>
					
							<tr>
								<td width="350px">
									<p><a href="http://heatmaptheme.com">HeatMap Theme</a> is copyright <a href="http://stuartwider.com">Stuart Wider</a> 2009 and distributed under the GPL3 License.</p>
									<?php if ($ct->parent_theme != '') { ?><p>Child Themes are copyright of their respective Authors.</p><?php } ?>
									<p>Google Adsense, Analytics, FeedBurner and Custom Search are trademarks of Google Inc.</p>
								</td>
							</tr>
					
					</tbody>
				
					
				</table>
				
			</div>
			
		
		</div>
		
<?php
}

/* It all starts here!
-------------------------------------------------------------- */

hmt_set_up_vars();
if (function_exists('hmt_child_theme'))hmt_child_theme();	// If there a child theme is active then initialise any special functions within it.
add_action('admin_menu', 'hmt_add_admin');
if (function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );	 					// this adds in the 'new for 2.9' Auto Thumbnail feature - 10/03/2010
	set_post_thumbnail_size( 75, 75, true);  					//  sets the pixel width and height for the recent posts plus widget
	add_image_size( 'post-image-size', 290, 9999);				// sets the pixel width for posts and pages of the Auto Thumbnail - in this case 290 wide by any width high.
	add_image_size( 'archive-image-size', 150, 150);
}
?>