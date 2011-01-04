<?php 
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 7/12/2009

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
search.php
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
			$all_content_above_already_shown = TRUE; //so the ads don't get shown twice when the results are returned
			?>
				
			<?php 
			if (have_posts()) : /* updated 7/12/09 - changed code to sanitise search results text */
								/* Now html codes entered in the search box will pass through but not be translated as html */
								/* *Thanks* for the tip Joseph Scott */ ?>
				<h2 class="h2-simulate-h1-size-underline">Search Results for <?php echo wp_specialchars(get_search_query(),1); // this is the search term ?> </h2> 
			<?php
			else: ?>
				<h2 class="h2-simulate-h1-size-underline">No Search Results for <?php echo wp_specialchars(get_search_query(),1); // this is the search term ?> </h2> 
				<p><strong>Maybe</strong> you can find what you are looking for in one of these places...</p>
				
				<?php include(TEMPLATEPATH."/common-sitemap.php");
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
End of search.php
~~~ -->