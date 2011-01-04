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
404.php
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
			<?php dynamic_sidebar('[All Content] Above'); ?>
				
			<h2 class="h2-simulate-h1-size-underline">404 Not Found</h2>
		
			<p>Maybe you can find what you are looking for in one of these places...</p>
				
			<?php include(TEMPLATEPATH."/common-sitemap.php");?>
		  
		</div> <!-- class="post-content" -->
		
	</div> <!-- id="content" -->
	
	<?php get_sidebar(); ?>

</div> <!-- id="page-body-wrapper" -->
	
<?php get_footer(); ?>

<!--
End of 404.php
~~~ -->