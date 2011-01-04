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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!--
<?php bloginfo('name')?> uses HeatMap Theme 2.5.4 (http://heatmaptheme.com)
by Stuart Wider (http://stuartwider.com) copyright 2010
-->

<!-- 
header.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />

<?php // Suggest to search engines that they only index pages, posts and the home page
if(is_home() || is_single() || is_page()) { echo '<meta name="robots" content="index,follow" />'; } else { echo '<meta name="robots" content="noindex,follow" />'; } ?>

<meta name="language" content="en" />

<!-- 
Meta Description and KeyWords for Home Page
~~~ -->

<?php if (is_home()) { 	// Get the meta information from the options and echo it  - but only for the home page - pages and posts use custom fields to hold this info. ?>

	<?php if (hmt_get_option(hmt_meta_description)): ?> 
		<meta name="description" content="<?php hmt_option('hmt_meta_description') ?>" />
	<?php endif; ?>

	<?php if (hmt_get_option(hmt_meta_keywords)): ?> 	
		<meta name="keywords" content="<?php hmt_option('hmt_meta_keywords') ?>" />
	<?php endif; ?>

<?php } ?>

<!-- 
Meta Description and KeyWords for a Post or a Page
~~~ -->

<?php 
if (is_single()||is_page()):	// ...If this is a page or a post, grab the meta information and echo it.
    $temp_post = get_post($post->ID, ARRAY_A);
	if (get_post_meta($post->ID, "meta-description", true)) 
		echo '<meta name="description" content="'. get_post_meta($post->ID, "meta-description", true) . '" />' . "\n";
	if (get_post_meta($post->ID, "meta-keywords", true)) 
		echo '<meta name="keywords" content="'. get_post_meta($post->ID, "meta-keywords", true) . '" />' . "\n";
endif; 
?>

<!-- 
HTML Title
~~~ -->

<title><?php wp_title('');if(wp_title('',false)){echo' - ';}bloginfo('description');echo' - ';bloginfo('name');?></title>

<!--
Favicon
~~~ -->

<link rel="Shortcut Icon" href="<?php echo bloginfo('stylesheet_directory'); ?>/images/favicon.ico" type="image/x-icon" />

<!--
Stylesheet
~~~ -->

<?php if (function_exists('hmt_extras')) { 				// Extras plugin? Then go get the css ?>
	<link rel="stylesheet" href="<?php bloginfo('wpurl'); ?>/wp-content/plugins/heatmap-extras/menu.css" type="text/css" media="screen" />
<?php } ?>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php if (!function_exists('hmt_child_theme')) { 				// If there is no child theme then grab the default.css instead ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/default.css" type="text/css" media="screen" />
<?php } ?>


<!--
RSS Feeds
~~~ -->

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />

<!--
Pingback URL
~~~ -->

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<!--
Javascript for the Suckerfish Menu plugin
~~~ -->

<?php if (function_exists('hmt_extras')) { 				// Extras plugin? Then go get the suckerfish Javascript 
	hmt_suckerfish_script();
 } 
 ?>

<!--
Additional Head Scripts
~~~ -->

<?php 				
if (hmt_get_option(hmt_head_scripts)):			// Any scripts that you want to pop in the <head> get pulled from the options into here 
	hmt_option('hmt_head_scripts');
endif;
?>

<!--
wp_head()
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

<?php wp_head(); ?>

<!--
End of wp_head()
~~~ -->

</head>

<body>

<?php
// If this is an old version of Wordpress show a warning - styled inline 'just in case' so that the message will be seen - dont want to take any chances! -added 24/03/10 //
if (get_bloginfo('version') < 2.9) { 
	print '<div style="background-color:#fff; color:#000; font-weight:bold; padding: 5px;">';
	print '<p align="center" style="margin-bottom: 3px;">HeatMap Theme requires WordPress 2.9 or greater - You are currently running ';
	print bloginfo('version'); 
   	print '<br/>Please deactivate this theme, upgrade WordPress, and then reactivate HeatMap Theme</p>';
	print '</div>';
}
?>

<!--
Find out if this theme has the preset mode deactivated. If its not deactivated then lets show off a bit. Party time!
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

	<?php
	global $preset_mode;
	$preset_mode = FALSE;
	$this_mode = hmt_get_option(hmt_preset_mode_activated);
	if ($this_mode=='ON'){$preset_mode = TRUE;}
	if ($this_mode==''){$preset_mode = TRUE;}
	?>

<!--
The High Bar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

	<div id="high-bar">
	
		<?php /* If you want to activate the preset mode ads in the high bar then uncomment the code block immediately below, and then comment out the code block below that */ ?>
		
		<?php 
		/*
		if ($preset_mode){hmt_preset_ad_728x90();}		// show the preset ad if preset mode is activated
		else {dynamic_sidebar('[Header] High');} 	// The High bar only expands out when there is an ad in it
		*/
		?>
		
		<?php dynamic_sidebar('[Header] High'); ?>
		
	</div> <!-- id="high-bar" -->
		
	<div class="clearFloat"></div>
 
    <div id="main">
	
<!--
The Header Bar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

        <div id="header-bar">
		
<!--
The Logo
~~~ -->
        	
			<?php 
			if ($preset_mode) {hmt_preset_logo();}	// show the preset logo if preset mode is activated
			else
			{
			if (hmt_get_option(hmt_logo_url)) {  // if there is a logo url in the options then  display the logo and alt text ?>
				<div id="header-bar-logo">
					<a href="<?php bloginfo('url'); ?>/"><img src="<?php hmt_option('hmt_logo_url') ?>" alt="<?php hmt_option('hmt_alt_text') ?>" /></a>
				</div> <!-- id="header-bar-logo" -->
			<?php
				}
			} ?>
					
<!--
The Name of the Blog and the Tagline
~~~ -->
			
			<?php 
				if (!hmt_get_option(hmt_show_title_and_tagline)) { //alternatively, if you want the title and tag line you can show that too ?>
				<div id="header-bar-content">
					<div class="blog-title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></div>
					<div class="blog-tagline"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('description'); ?></a></div>
				</div> <!-- id="header-bar-content" -->
				<?php
				}
				?>
            
<!--
Widget Area: Header Right
~~~ -->
			
            <div id="header-bar-right">
				
				<?php /* If you want to activate the preset mode ads in header right then uncomment the code block immediately below, and then comment out the code block below that */ ?>
				
				<?php 
				/*
				if ($preset_mode) {hmt_preset_ad_468x60();} // show the preset ad if preset mode is activated
				else {dynamic_sidebar('[Header] Right');}
				*/
				?>
				
				<?php dynamic_sidebar('[Header] Right');?>
					
            </div> <!-- id="header-bar-right" -->
			
        </div> <!-- id="header-bar" -->
        
        <div class="clearFloat"></div>
        
<!--
The Nav Bar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

        <div id="nav-bar">
        	
			<?php 
			if (function_exists('hmt_extras')) { 				// Extras plugin? Then go get the suckerfish Javascript 
				hmt_suckerfish_navbar();
			} 
			else
			{
			?>	
				<div id="nav-bar-content">
					<ul>
					<li><a href="<?php bloginfo('url'); ?>">Home</a></li>
					<?php $exclude = hmt_get_option(hmt_exclude_pages); 	// if there pages to be excluded specified in the options then that gets done here ?>
					<?php wp_list_pages('sort_column=menu_order&title_li=&depth=1&exclude=' . $exclude); ?>
					</ul>
				</div> <!-- id="nav-bar-content" -->
			<?php
			}
			?>
        
        </div> <!-- id="nav-bar" -->
		
<!--
The Search Bar
~~~ -->
        
		<div id="search-bar">
		
			<div id="search-bar-content">
				<?php hmt_google_search(); // hmt_google search will output the google search code, but if there is none, you just get the wordpress search instead ?>
			</div> <!-- id="search-bar-content" -->

		</div> <!-- id="search-bar" -->
		
        <div class="clearFloat"></div>

<!--
The Categories Bar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
 
        <div id="cat-bar">
        	
			<?php 
			if (function_exists('hmt_extras')) { 				// Extras plugin? Then go get the suckerfish Javascript 
				hmt_suckerfish_catbar();
			} 
			else
			{
			?>	
				<div id="cat-bar-content">
					<ul>
					<?php 
						$exclude = hmt_get_option(hmt_exclude_categories); 
						$clean_cats = wp_list_categories('sort_column=menu_order&title_li=&depth=1&exclude=' . $exclude);	//...again, categories can be excluded here as specified in the options page
						$clean_cats = str_replace('No categories', '', $clean_cats); // added 31/1/10 - strip out the 'No Categories' message when there are no categories - to leave just a blank line 
						echo $clean_cats;
					?>
					</ul>
				</div> <!-- id="cat-bar-content" -->
			<?php
			}
			?>
        
        </div> <!-- id="cat-bar" -->
  
<!--
The RSS Bar (inc Feedburner)
~~~ -->    
        <div id="rss-bar">
        
        	<div id="rss-bar-content">
<!--
Feedburner Email Link
~~~ --> 	
				<?php
				
				$feedburner_output = get_option('hmt_feedburner_id');						// get the feedburner id from the options page (for both comments and posts)
				$feedburner_comments_output = get_option('hmt_feedburner_comments_id');
				?>
			
				<?php if ($feedburner_output!='') { // if you've specified an id then show the email subscription link. Don't forget to configure this in the feedburner admin though! ?>
					<div class="rss-feedburner">
						<a href="http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedburner_output; ?>&amp;loc=en_US" target="_blank">Email Subscription</a>
					</div> <!-- class="rss-feedburner" -->
				<?php 
				} 
				?>
				

<!--
RSS Comments Link
~~~ -->	
				<div class="rss-comments">
				
					<?php 	
					if ($feedburner_comments_output!='') { ?>
						<a href="http://feeds2.feedburner.com/<?php echo $feedburner_comments_output;?>">Comments</a>
					<?php
					} 
					else 
					{
					// If you haven't specified a feedburner id then you just get the direct links to the feed ?>
						<a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a>
					<?php 
					} 
					?>
	
				</div> <!-- class="rss-comments" -->

<!--
RSS Posts Link
~~~ -->
				<div class="rss-posts">
				
					<?php 	
					if ($feedburner_output!='') { ?>
						<a href="http://feeds2.feedburner.com/<?php echo $feedburner_output;?>">Posts</a>
					<?php
					} 
					else 
					{
					// If you haven't specified a feedburner id then you just get the direct links to the feed ?>
						<a href="<?php bloginfo('rss2_url'); ?>">Posts</a>
					<?php 
					} 
					?>
	
				</div> <!-- class="rss-posts" -->
				
            </div> <!-- id="rss-bar-content" -->

        </div> <!-- id="rss-bar" -->
        
        <div class="clearFloat"></div>
				
		<?php 
		/* reset widgets - when you visit the page again the ad widgets will show */
		$ads_already_shown = FALSE; 
		$all_content_above_already_shown = FALSE;
		?>
		
<!--
End of header.php
~~~ -->
