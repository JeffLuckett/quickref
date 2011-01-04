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

<!-- 
common-sitemap.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
		
		<div id="left-content">
		
			<h3>Posts</h3>
			<ul>
				<?php wp_get_archives('type=postbypost'); ?> 
			</ul>
		
		</div> <!-- id="left-content" -->
		
		<div id="right-content">
		
			<h3>Pages</h3>
			<ul>
				<?php $exclude = hmt_get_option(hmt_exclude_pages); ?>
				<?php wp_list_pages('title_li=&exclude='.$exclude); ?>
			</ul>
		
			<h3>Categories</h3>
			<ul>
				<?php $exclude = hmt_get_option(hmt_exclude_categories); ?>
				<?php wp_list_categories('sort_column=name&title_li=&exclude='.$exclude); ?>
			</ul>
				
			<h3>Monthly Archives</h3>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>
		
		</div> <!-- id="right-content" -->
		
<!--
common-sitemap.php
~~~ -->