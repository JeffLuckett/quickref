<?php 
//Access the WordPress Categories via an Array
$swift_categories = array();  
$swift_categories_obj = get_categories('hide_empty=0');
foreach ($swift_categories_obj as $swift_cat) 
{$swift_categories[$swift_cat->cat_ID] = $swift_cat->cat_name;}
$categories_tmp = array_unshift($swift_categories, "Show recent posts");   
       
//Access the WordPress Pages via an Array
$swift_pages = array();
$swift_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($swift_pages_obj as $swift_page) 
{$swift_pages[$swift_page->ID] = $swift_page->post_name; }
$swift_pages_tmp = array_unshift($swift_pages, "Select a page:");  


$themename = "Swift";
$shortname = "swift";
$GLOBALS['template_path'] = get_bloginfo('template_directory');
global $themename, $shortname, $swift_options;
////////////////////////
$swift_options[] = array(); 
$swift_options[] =array("type" => "open-options-div");

$swift_options[] = array( "name" => "General-Settings",
                    "type" => "heading");


$swift_options[] = array( "name" => "Custom Favicon",
					"desc" => "Enter the URL of a 16px x 16px PNG/GIG image that will be used as your website's favicon.",
					"id" => $shortname."_favicon",
					"std" => "",
					"type" => "text"); 

$swift_options[] = array( "name" => "Header Scripts",
					"desc" => "If you need to add scripts to your header (like Mint tracking code, perhaps), you should enter them in the box below. They will be added before &lt;/head&gt; tag",
					"id" => $shortname."_header_scripts",
					"std" => "",
					"type" => "textarea"); 

$swift_options[] = array( "name" => "Footer Scripts",
					"desc" => "Paste your Google Analytics (or other) tracking code here. They will be added before &lt;/body&gt; tag",
					"id" => $shortname."_footer_scripts",
					"std" => "",
					"type" => "textarea"); 


$swift_options[] = array(	"name" => "Feedburner ID",
						"desc" => "Enter your Feedburner ID here. This is required for the RSS widget and subscribe by email box on the single post page.",
			    		"id" => $shortname."_feedburner_id",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] =array("type" => "close");

//Header Options Start

$swift_options[] = array( "name" => "Header-Options",
                    "type" => "heading");

$swift_options[] = array( "name" => "Custom Logo",
					"desc" => "Enter the URL of your logo (http://yoursite.com/logo.png)",
					"id" => $shortname."_logo",
					"std" => "",
					"type" => "text");    


$swift_options[] = array( "name" => "Top Navigation Bar",
					"desc" => "Select what you want to display in top navigation, select none if you dont want to have navigation links above logo/sitename.",
					"id" => $shortname."_nav1",
					"std" => "Disable",
					"type" => "radio",
					"options" => array('Disable','Pages','Categories'));

$swift_options[] = array( "name" => "Bottom Navigation Bar",
					"desc" => "Select what you want to display in top navigation, select none if you dont want to have navigation links below logo/sitename.",
					"id" => $shortname."_nav2",
					"std" => "Disable",
					"type" => "radio",
					"options" => array('Disable','Pages','Categories'));

$swift_options[] = array(    "name" => "Links to be appended to the navigation bar showing the list of pages",
        "desc" => 'Add your links in the following format &lt;li&gt;&lt;a href="http://yourURL.com"&gt; SwiftThems&lt;/a&gt;&lt;/li&gt;',
        "id" => $shortname."_pagenav_links",
        "type" => "textarea");

$swift_options[] = array(    "name" => "Links to be appended to the navigation bar showing the list of categories",
        "desc" => 'Add your links in the following format &lt;li&gt;&lt;a href="http://yourURL.com"&gt; SwiftThems&lt;/a&gt;&lt;/li&gt;',
        "id" => $shortname."_catnav_links",
        "type" => "textarea");

$swift_options[] = array(    "name" => "Enter you custom search code",
        "desc" => 'If you have a custom search code, such as <strong>Adsense for Search</strong>, add it here',
        "id" => $shortname."_search_code",
        "type" => "textarea");

$swift_options[] = array(  "name" => "Disable RSS links",
        			"desc" => "Check this box if you don't want to display your RSS links in the top navigation bar.",
        			"id" => $shortname."_rsslinks_disable",
        			"type" => "checkbox",
        			"std" => "false");

$swift_options[] = array(  "name" => "Disable search box",
        			"desc" => "Check this box if you don't want to display the search box in the bottom navigation bar.",
        			"id" => $shortname."_searchbox_disable",
        			"type" => "checkbox",
        			"std" => "false"); 
 
$swift_options[] =array("type" => "ordering");
$swift_options[] =array("type" => "close");

//Home Page Options
$swift_options[] = array( "name" => "Homepage",
                    "type" => "heading");

$swift_options[] = array(  "name" => "ENABLE featured posts slider",
        "desc" => "Check this box if you would like to enabke featured posts slider.",
        "id" => $shortname."_featured_enable",
        "type" => "checkbox",
        "std" => "false");

$swift_options[] = array( "name" => "Featured post slider style",
					"desc" => "Choose between the two sliders in SWIFT",
					"id" => $shortname."_slider_style",
					"std" => "Large Image",
					"type" => "radio",
					"options" => array('Lite','Large Image'));

$swift_options[] = array( "name" => "Featured Category",
					"desc" => "Select the category whose posts you want to have displayed in the Featured Posts slider on your home page.",
					"id" => $shortname."_featured_category",
					"std" => "Show recent posts",
					"type" => "select",
					"options" => $swift_categories);

$swift_options[] = array( "name" => "Number of featured posts",
					"desc" => "Select the number of featured posts to display in the slider.",
					"id" => $shortname."_featured_posts_number",
					"std" => 3,
					"type" => "select",
					"options" => array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20));
$swift_options[] = array(  "name" => "DISABLE thumbnails in slider",
        "desc" => "Check this box if you would like to disable thumbnails in the slider.",
        "id" => $shortname."_thumbs_slider_disable",
        "type" => "checkbox",
        "std" => "false");


$swift_options[] = array(  "name" => "DISABLE thumbnails on home page",
        "desc" => "Check this box if you would like to disable thumbnails on the home page. Applies to all except the slider thumbnails.",
        "id" => $shortname."_thumbs_disable",
        "type" => "checkbox",
        "std" => "false");

$swift_options[] = array(  "name" => "Display excerpts on home page",
        "desc" => "Check this box if you would like to display excerpts rather than full posts on the home page. Excerpts are summaries or descriptions of a post. This option doesn't affect the <strong>more</strong> WordPress function.",
        "id" => $shortname."_excerpts_enable",
        "type" => "checkbox",
        "std" => "false");

$swift_options[] = array(  "name" => "Display excerpts on archive pages",
        "desc" => "Check this box if you would like to display excerpts rather than full posts on archive pages. Excerpts are summaries or descriptions of a post. This option doesn't affect the <strong>more</strong> WordPress function.",
        "id" => $shortname."_archive_excerpts_enable",
        "type" => "checkbox",
        "std" => "false");

$swift_options[] = array( "name" => "Home page full content posts:",
					"desc" => "If you set the home page to show excerpts, select here the number of posts you still want to be shown in their entirety.",
					"id" => $shortname."_full_posts_number",
					"std" => "2",
					"type" => "select",
					"options" => array(0,1,2,3,4,5));

$swift_options[] = array(  "name" => "ENABLE popular posts on home page",
        "desc" => "Check this box if you would like to enable showing popular posts on the home page. Note: this feature doesn't work in magazine layout.",
        "id" => $shortname."_popular_enable",
        "type" => "checkbox",
        "std" => "false");

$swift_options[] = array( "name" => "Number of popular posts",
					"desc" => "Select the number of popular posts you want to display on the home page.",
					"id" => $shortname."_popular_posts_number",
					"std" => "6",
					"type" => "select",
					"options" => array(1,2,3,4,5,6,7,8,9,10));


$swift_options[] =array("type" => "close");

//Single Page

$swift_options[] = array( "name" => "SinglePage",
                    "type" => "heading");

$swift_options[] = array(  "name" => "Display the Subscribe by E-mail box",
        "desc" => "Check this box if you'd like to display the Subscribe by E-Mail Subscription box at the post's end. You have to enter your Feedburner ID in the General settings page for this to work.",
        "id" => $shortname."_email_subscription_enable",
        "type" => "checkbox",
        "std" => "true");

$swift_options[] = array(  "name" => "Display social bookmarking icons",
        "desc" => "Check this box if you'd like to display social bookmarking icons at the post's end.",
        "id" => $shortname."_socialmedia_enable",
        "type" => "checkbox",
        "std" => "true");

$swift_options[] = array(  "name" => "Display author biography",
        "desc" => "Check this box if you'd like to display the author biography at the post's end.",
        "id" => $shortname."_author_info_enable",
        "type" => "checkbox",
        "std" => "true");

$swift_options[] =array("type" => "close");

//SocialMedia
$swift_options[] = array( "name" => "SocialMedia",
                    "type" => "heading");
$swift_options[] = array(	"name" => "Feedburner ID",
						"desc" => "Enter your Feedburner ID here. This is required for the RSS widget and subscribe by email box on the single post page.",
			    		"id" => $shortname."_feedburner_id",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] = array(	"name" => "Twitter handle",
						"desc" => "Enter your twitter username, example: swiftthemes",
			    		"id" => $shortname."_twitter_handle",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] = array(	"name" => "Facebook alias",
						"desc" => "Enter your facebook profile alias, if your facebook profile url is http://www.facebook.com/SatishGandham, then SatishGandham is your profile alias.",
			    		"id" => $shortname."_facebook_alias",
			    		"std" => "",
			    		"type" => "text");

$swift_options[] = array(	"name" => "Digg",
						"desc" => "Enter your digg username",
			    		"id" => $shortname."_digg",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] = array(	"name" => "Stumbleupon",
						"desc" => "Enter your Stumbleupon username",
			    		"id" => $shortname."_stumbleupon",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] = array(	"name" => "LinkedIn",
						"desc" => "Enter your LinkedIn username",
			    		"id" => $shortname."_linkedin",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] = array(	"name" => "delicious",
						"desc" => "Enter your delicious username",
			    		"id" => $shortname."_delicious",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] = array(	"name" => "Flickr",
						"desc" => "Enter your flickr username",
			    		"id" => $shortname."_flickr",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] = array(	"name" => "youtube",
						"desc" => "Enter your youtube username",
			    		"id" => $shortname."_youtube",
			    		"std" => "",
			    		"type" => "text");	

$swift_options[] =array("type" => "close");
//Ad Management

$swift_options[] = array( "name" => "Ad-Management",
                    "type" => "heading");
$swift_options[] = array(  "name" => "ENABLE the header ad area",
        "desc" => "Check this box if you'd like to display an advertisement on the empty header area to the right of the blog name or logo.",
        "id" => $shortname."_header_ad_enable",
        "type" => "checkbox",
        "std" => "false");
$swift_options[] = array(    "name" => "Ad Code",
        "desc" => "Enter your ad code here, preferably 468*60 ad",
        "id" => $shortname."_header_adcode",
        "type" => "textarea");

$swift_options[] = array(  "name" => "ENABLE the ad area below the bottom navigation bar",
        "desc" => "Check this box if you'd like to display an advertisement below the bottom navigation bar.",
        "id" => $shortname."_nav_adsense_enable",
        "type" => "checkbox",
        "std" => "false");
$swift_options[] = array(    "name" => "Ad Code",
        "desc" => "Enter on the box to the left the ad code you received from your ad-network, preferably a 728*15 link list unit, or a 728*90 lead-board ad.",
        "id" => $shortname."_nav_adcode",
        "type" => "textarea");

$swift_options[] = array(  "name" => "ENABLE ad's below title on single post page",
        "desc" => "Check this box if you'd like to display an advertisement below the post title on single post pages.",
        "id" => $shortname."_adsense_enable",
        "type" => "checkbox",
        "std" => "false");
$swift_options[] = array(    "name" => "Ad Code",
        "desc" => "Enter on the box to the left the ad code you received from your ad-network, preferably a 468*60 ad to be displayed between the post's title and text, or a 120*600 skyscraper ad to be float-positioned to the left or the right of the post text. To float a skyscraper ad surround the ad code like this: &lt;div style=\"float: left; clear: left; margin: 0px 10px 10px 0px;\"&gt;AD CODE HERE&lt;/div&gt; or &lt;div style=\"float: right; clear: right; margin: 0px 0px 10px 10px;\"&gt;AD CODE HERE&lt;/div&gt;",
        "id" => $shortname."_adcode",
        "type" => "textarea");

$swift_options[] = array(  "name" => "ENABLE the ad area below the post text",
        "desc" => "Check this box if you'd like to display an advertisement after the post contents on single post pages.",
        "id" => $shortname."_adsense_afterpost_enable",
        "type" => "checkbox",
        "std" => "false");
$swift_options[] = array(    "name" => "Ad Code",
        "desc" => "Enter on the box to the left the ad code you received from your ad-network, preferably a 468*60 ad to be displayed after the post's content. For best results clear and center it surrounding the ad code like this: &lt;div style=\"clear: both; text-align: center; margin: 10px 0px 0px 0px;\"&gt;AD CODE HERE&lt;/div&gt;",
        "id" => $shortname."_adsense_afterpost",
        "type" => "textarea");


$swift_options[] = array(    "name" => "Banner-1",
        "desc" => "Enter your image url here",
        "id" => $shortname."_banner1image",
        "type" => "text");
$swift_options[] = array(    "name" => "Banner destination",
        "desc" => "Enter destination url (link) here",
        "id" => $shortname."_banner1destination",
        "type" => "text");
$swift_options[] = array(    "name" => "Banner-2",
        "desc" => "Enter your image url here",
        "id" => $shortname."_banner2image",
        "type" => "text");
$swift_options[] = array(    "name" => "Banner destination",
        "desc" => "Enter destination url (link) here",
        "id" => $shortname."_banner2destination",
        "type" => "text");

$swift_options[] = array(    "name" => "Banner-3",
        "desc" => "Enter your image url here",
        "id" => $shortname."_banner3image",
        "type" => "text");
$swift_options[] = array(    "name" => "Banner destination",
        "desc" => "Enter destination url (link) here",
        "id" => $shortname."_banner3destination",
        "type" => "text");

$swift_options[] = array(    "name" => "Banner-4",
        "desc" => "Enter your image url here",
        "id" => $shortname."_banner4image",
        "type" => "text");
$swift_options[] = array(    "name" => "Banner destination",
        "desc" => "Enter destination url (link) here",
        "id" => $shortname."_banner4destination",
        "type" => "text");
$swift_options[] =array("type" => "clear");
$swift_options[] =array("type" => "close");



//never remove this option (it will reset theme options)
$swift_options[] = array( "name" => "",
					"desc" => "this is a random variable just to know that the options have been changed, it wont be displayed any where",
					"id" => $shortname."_random",
					"std" => "FFF",
					"type" => "hidden");



                    
?>
