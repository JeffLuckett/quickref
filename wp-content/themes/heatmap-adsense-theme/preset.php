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

/* Functions for the Preset Mode */

/* 
You Only need to hack these files if you prefer to manually place things such as ad code into the template.
We would recommend that you actually use the widget mode instead, but if you really prefer to hack code
then here it is. The preset mode doesn't allow you to place ads within the content area though. 
Its just for the header and sidebars at this stage. You do have to remember though that Adsense limits
the number of ad unit blocks you can have on any one page, so add code to only three of the units below and
delete the image code for the other ones.

Default Logo - To replace the default preset logo just copy a new one to /wp-content/themes/heatmaptheme/images/preset-images/logo.png
*/

/* 
Note: As of version 2.4 all of these functions below are not coded called in preset.php by default but are here just in case you want to play with the code and use it yourself,
or if you want to manually ad your ads to the theme.
Preset.php now uses the_widget to call the standard wordpress widgets.
*/

/* Preset ad (728 x 90)- Preset for the [Header High] position
-------------------------------------------------------------- */

function hmt_preset_ad_728x90() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->	
	</div>
<?php
}

/* Preset ad (468 x 60) - Preset for the [Header] Right position
-------------------------------------------------------------- */

function hmt_preset_ad_468x60() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->		</div>
<?php
}

/* Preset ad (300 x 250) - Preset for the [Widebar] Top position
-------------------------------------------------------------- */

function hmt_preset_ad_300x250_1() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->	
	</div>
<?php
}

/* Preset ad (300 x 250) - Preset for the [Widebar] Bottom position
-------------------------------------------------------------- */

function hmt_preset_ad_300x250_2() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->	
	</div>
<?php
}


/* Preset ad (160 x 600)  - Preset for the [Sidebar] Left position
-------------------------------------------------------------- */

function hmt_preset_ad_160x600() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->	
	</div>
<?php
}


/* Preset ad (120 x 600) - Not used in this sidebar but its here if you feel the need to pop it in there
-------------------------------------------------------------- */

function hmt_preset_ad_120x600() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->	
	</div>
<?php
}


/* Preset ad (125 x 125) 
-------------------------------------------------------------- */

function hmt_preset_ad_125x125_1() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->	
	</div>
<?php
}

/* Preset ad (125 x 125) 
-------------------------------------------------------------- */

function hmt_preset_ad_125x125_2() {
?>
	<div class="widget">
<!-- POP YOUR ADSENSE CODE BETWEEN HERE -->	
<!-- AND HERE -->	
	</div>
<?php
}

/* Show the preset title - Preset Title is not actually preset at all - it just shows the title and tag line from the WordPress Settings
-------------------------------------------------------------- */

function hmt_preset_title() { ?>

	<div id="header-bar-content">
		<div class="blog-title"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></div>
		<div class="blog-tagline"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('description'); ?></a></div>
	</div> <!-- id="header-bar-content" -->
<?php
}

/* Show the preset logo
-------------------------------------------------------------- */
function hmt_preset_logo() { ?>

	<div id="header-bar-logo">
<!-- CHANGE THE IMAGE CODE BELOW AND PUT IN YOUR LOGO IMAGE INSTEAD BETWEEN HERE -->
	<a href="<?php bloginfo('url'); ?>/"><img src="<?php echo bloginfo('template_url'); ?>/images/preset-images/logo.png" alt="Pop your logo right here" /></a>
<!-- AND HERE -->
	</div> <!-- id="header-bar-logo" -->
<?php
}

/* Categories
-------------------------------------------------------------- */
function hmt_preset_archives() { ?>

<li id="archives-3" class="widget widget_archive"><h4 class="widgettitle">Archives</h4>		
	<ul>
		<?php wp_get_archives('type=monthly&limit=12'); ?>
	</ul>
</li>	

<?php	
}

/* Categories
-------------------------------------------------------------- */

function hmt_preset_recent_posts() { ?>

<li class="widget">		
	<h4 class="widgettitle">Recent Posts</h4>		
	<ul>
		<?php wp_get_archives('title_li=&type=postbypost&limit=10'); ?>
	</ul>
</li>



<?php	
}

/* Categories
-------------------------------------------------------------- */

function hmt_preset_blogroll() { ?>

<li class="widget"><h4 class="widgettitle">Blogroll</h4>
	<ul class='xoxo blogroll'>
		<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
	</ul>
</li>

<?php	
}

/* Meta
-------------------------------------------------------------- */

function hmt_preset_meta() { ?>

<li class="widget"><h4 class="widgettitle">Meta</h4>			
	<ul>
			<li><?php wp_register(); ?></li>
			<li><?php wp_loginout(); ?></li>
			<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php echo esc_attr(__('Syndicate this site using RSS 2.0')); ?>"><?php _e('Entries <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php echo esc_attr(__('The latest comments to all posts in RSS')); ?>"><?php _e('Comments <abbr title="Really Simple Syndication">RSS</abbr>'); ?></a></li>
			<li><a href="http://wordpress.org/" title="<?php echo esc_attr(__('Powered by WordPress, state-of-the-art semantic personal publishing platform.')); ?>">WordPress.org</a></li>
			<li><?php wp_meta(); ?></li>
	</ul>
</li>

<?php	
}


/* Recent Comments - not used in the preset sidebar right now but you can add it in if you want!
-------------------------------------------------------------- */

function hmt_preset_recent_comments() { 

	/* updated 7/12/09 - changed recent comments code over from a database query to use get_comments instead */
	/* *Thanks* for the tip Joseph Scott */ 
	$comments = get_comments('status=approve&number=10'); 
		
 ?>
	
<li class="widget"><h4 class="widgettitle">Recent Comments</h4>	
	<ul id="recentcomments">
	<?php 
		foreach($comments as $comm) :

			$comm_author = $comm->comment_author;
			$comm_title = get_the_title($comm->comment_post_ID);
			$comm_link = get_comment_link($comm->comment_ID);
		
			echo  '<li>' . $comm_author . ' on ' . '<a href="' . esc_url($comm_link) . '">' . $comm_title . '</a></li>' . "\n";

  		endforeach;		
	?>
	</ul>

<?php	
}


/* Show the preset sidebar
-------------------------------------------------------------- */

/* uncomment the demo ads if you want to use them! */

function hmt_preset_sidebar() { ?>

	<!-- 
	top-widebar
	~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		<?php
		$preset_before_widget = '<li class="widget">';
		$preset_after_widget = '</li>';
		$preset_before_title = '<h4 class="widgettitle">';
		$preset_after_title = '</h4>';
		$preset_args = 'before_widget=' . $preset_before_widget . '&after_widget=' . $preset_after_widget . '&before_title=' . $preset_before_title . '&after_title=' . $preset_after_title;
		?>
		
		<div id="sidebar-wrapper">
		
			<div id="top-widebar">
				
				<ul>
					<?php if (function_exists('the_widget')) the_widget('WP_Widget_Recent_Posts','', $preset_args); ?> 
				</ul>
			
			</div> <!-- id="top-widebar" -->
		
	<!-- 
	left sidebar
	~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		
			<div id="left-sidebar">
				
				<ul>			
					<?php if (function_exists('the_widget')) the_widget('WP_Widget_Archives', '', $preset_args); ?> 
					<?php if (function_exists('the_widget')) the_widget( 'WP_Widget_Tag_Cloud', '', $preset_args); ?> 
				</ul>
			
			</div> <!-- id="left-sidebar" -->
		
	<!-- 
	right sidebar
	~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		
			<div id="right-sidebar">
				
				<ul>
					<?php if (function_exists('the_widget')) the_widget('WP_Widget_Links', '', $preset_args); ?> 
					<?php if (function_exists('the_widget')) the_widget('WP_Widget_Meta', '', $preset_args); ?> 
				</ul>
				
			</div> <!-- id="right-sidebar" -->
			
	<!-- 
	bottom widebar
	~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		
			<div id="bottom-widebar">
				
				<ul>
					<?php if (function_exists('the_widget')) the_widget('WP_Widget_Recent_Comments', '', $preset_args); ?>
				</ul>
				
			</div> <!-- id="bottom-widebar" -->
		 
		</div> <!-- id="sidebar-wrapper" -->
		
		<div class="clearFloat"></div>
<?php
}	
?>