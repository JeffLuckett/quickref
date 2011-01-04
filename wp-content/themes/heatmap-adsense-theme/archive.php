<?php 
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 19/10/2009

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
	
The 'Format the Title of the Archive' portion of this code is based upon
code from Kubrick Theme Version 1/6 by Michael Heilemann URI: http://binarybonsai.com/
released under GPL and was modified to suit HeatMap Theme May 2009
*/
?>

<?php get_header(); ?>

<!-- 
archive.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		
<!--
Content of the page (inc comments and post details)
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
<div id="page-body-wrapper">

	<div id="content">
		
		<div class="post-content">
<!--
Widget Area: [All Content] Above 
~~~ -->	
			<?php 
			dynamic_sidebar('[All Content] Above'); 
			$all_content_above_already_shown = TRUE;	// Set the ads above the content to 'already shown' so that common.php doesnt double up and show the ad again
			?>
		
			<?php if (have_posts()) : ?>

<!--
Format the title of the Archive
~~~ -->

			  <?php /* If this is a category archive */ if (is_category()) { ?>
				<h2 class="h2-simulate-h1-size-underline"><?php single_cat_title(); ?></h2>
			  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<h2 class="h2-simulate-h1-size-underline ">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
			  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<h2 class="h2-simulate-h1-size-underline">Archive for <?php the_time('F jS, Y'); ?></h2>
			  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<h2 class="h2-simulate-h1-size-underline">Archive for <?php the_time('F, Y'); ?></h2>
			  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<h2 class="h2-simulate-h1-size-underline">Archive for <?php the_time('Y'); ?></h2>
			  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<h2 class="h2-simulate-h1-size-underline">Author Archive</h2>
			  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<h2 class="h2-simulate-h1-size-underline">Blog Archives</h2>
			  <?php } ?>
		  
			<?php else :
	
				if ( is_category() ) { // If this is a category archive
					printf("<h2 class='h2-simulate-h1-size'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
				} else if ( is_date() ) { // If this is a date archive
					echo("<h2 class='h2-simulate-h1-size'>Sorry, but there aren't any posts with this date.</h2>");
				} else if ( is_author() ) { // If this is a category archive
					$userdata = get_userdatabylogin(get_query_var('author_name'));
					printf("<h2 class='h2-simulate-h1-size'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
				} else {
					echo("<h2 class='h2-simulate-h1-size'>No posts found.</h2>");
				}
				get_search_form();
	
			endif; ?> 
		  
		</div> <!-- class="post-content" -->
		
		<?php 
		/* Update for v2.3 19/10/09 
		In 2.2 common.php did not override properly in child themes.
		This new code checks to see if a child theme is installed, 
		and then checks to see if common.php exists in the child theme.
		If if does exist in the child theme then the child theme version of 
		common.php is included. 
		If not, then the common.php from the parent theme is included.
		*/
		
		$stylesheetfile = STYLESHEETPATH . '/common.php'; 
		if (function_exists('hmt_child_theme') && (file_exists($stylesheetfile)))
			include(STYLESHEETPATH."/common.php");
		else 
			include(TEMPLATEPATH."/common.php");
		
		/* end of update */ 
		?>
		
	</div> <!-- id="content" -->
	
	<?php get_sidebar(); ?>
	
</div> <!-- id="page-body-wrapper" -->

<?php get_footer(); ?>
	

	
<!--
End of archive.php
~~~ -->