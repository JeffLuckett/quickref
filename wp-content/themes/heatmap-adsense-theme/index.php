<?php 
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 10/03/2010

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

<?php get_header(); ?>

<!--
home.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->

<!--
Content of the page (inc comments and post details)
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
<div id="page-body-wrapper">

	<div id="content">

<!--
The Home Page 'Page Block'
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		<?php	
		$thispage = new WP_Query();
		$option = hmt_get_option(hmt_featured); 	// get the featured page option
		$thispage->query('page_id=' . $option);
		
		if (($option!="") && (!is_paged())) { 		// if a featured home page option has been specified  
													// and this is is the first page of posts, then show the featured page
			$thispage->the_post(); ?>
			
<!--
The Home Page 'Page Block' content 
~~~ -->
			
			<div class="featured-page-content">
			
<!--
Widget Area: [All Content] Above 
~~~ -->			
				<?php 
				dynamic_sidebar('[All Content] Above'); 
				$ads_already_shown = TRUE;										// this lets subsequent blog posts know that they are not the first thing on the page
																				// and therefore no ads will be shown around them. Ads only show on the first item on the page.
				echo '<h1 class="h1-underline">'; the_title(); echo '</h1>';	// This is the most important thing on the page for indexing and therefore gets a H1
				dynamic_sidebar('[Content Item] Above');
				dynamic_sidebar('[Content Item] Left'); 
				dynamic_sidebar('[Content Item] Right');
				
				if (function_exists('has_post_thumbnail')) {				
					if (has_post_thumbnail()) { //  new for 10/03/2010 - okay so if this post has a thumbnail (as per wp 2.9 thumnail features) then do something about it ?>
					
					<div class="common-page-thumbnail-left">		   
						<?php 
						the_post_thumbnail('post-image-size');
						?>
						</div>
				<?php
					}
				}
				
				the_content();
				dynamic_sidebar('[Content Item] Below');
				echo "\n"; 
				?>
	
			</div> <!-- class="featured-page-content" -->
			
			<div class="clearFloat"></div>
	
<!--
The Home Page 'Page Block' post details 
~~~ -->
	
			<div class="featured-page-details">		
	
				<p>Posted by
				
					<?php echo get_the_author(); ?>
					<?php /* the_author_posts_link(); */ /*uncomment this if you actually want a link to the authors posts - it reveals the authors username though - or am I being too security concious? */?>
					 - 
					<?php the_date(); echo ' at '; the_time(); /* changed date and time format 19/10/09 so that default system date and time is used instead of preset date and time */ ?>
				</p>
				
				<p>
				<?php edit_post_link('(Edit)', '', ''); ?>
				</p>
			
			</div> <!-- class="featured-page-details" -->
			
		<?php
		} 
		?>
		
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
End of index.php
~~~ -->