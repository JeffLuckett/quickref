<?php
/*
Template Name: Site Map
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
sitemap.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		
<div id="page-body-wrapper">	
	<div id="content">
		<div class="post-content">

<!--
Widget Area: [All Content] Above 
~~~ -->	
			<?php 
			dynamic_sidebar('[All Content] Above'); 
			$ads_already_shown = TRUE;
			?>
			
			<h2 class="h2-simulate-h1-size-underline">Site Map</h2>
			
			<?php include(TEMPLATEPATH."/common-sitemap.php");?>
		
<!--
Widget Area: [All Content] Below
~~~ -->
			<?php dynamic_sidebar('[All Content] Below'); ?>

		</div> <!-- class="post-content" -->
	</div> <!-- id="content" -->

	<?php get_sidebar(); ?>

</div> <!-- id="page-body-wrapper" -->

<?php get_footer(); ?>



<!--
End of sitemap.php
~~~ -->