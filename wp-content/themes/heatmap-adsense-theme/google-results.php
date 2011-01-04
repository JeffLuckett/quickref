<?php
/*
Template Name: Google Search Results
*/
?>

<?php 
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 20/08/2009

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
google-results.php 
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
   
<!--
Google search results code
~~~ -->

<?php
if (empty($_GET['q'])) // if there's nothing in the search box then do something sensible with it
{ 
?>
	<div id="page-body-wrapper">
		
		<div id="content">
			
			<div class="post-content">
					
				<h2 class="h2-simulate-h1-size-underline">No Results Found</h2>
			
				<p>The search box appears to be blank. 
				<br />Please enter some text and try again.</p>
			</div> <!-- class="post-content" -->
			
		</div> <!-- id="content" -->
		
		<?php get_sidebar(); ?>

	</div> <!-- id="page-body-wrapper" -->
		
	<?php get_footer(); ?>
	

<?php	
}
else
{
?>
	<div id="google-results-body-wrapper">
	   
		<div class="google-search-content">   
			<?php hmt_option('hmt_google_results'); ?>
		</div> <!-- class="google-search-content" -->

	</div> <!-- id="google-results-body-wrapper" -->
		
	<?php get_footer(); ?>
	
<?php
}
?>

<!--
End of google-results.php
~~~ -->
    