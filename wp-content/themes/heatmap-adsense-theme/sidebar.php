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
sidebar.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
<?php
global $preset_mode;
if ($preset_mode) {hmt_preset_sidebar();} // if this is preset mode then show the preset sidebar
else
{ ?>

<!-- 
top-widebar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
	
	<div id="sidebar-wrapper">
	
		<div id="top-widebar">
			
			<ul>
			<?php dynamic_sidebar('[Widebar] Top'); ?>
			</ul>
		
		</div> <!-- id="top-widebar" -->
	
<!-- 
left sidebar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
	
		<div id="left-sidebar">
			
			<ul>				
			<?php dynamic_sidebar('[Sidebar] Left'); ?>
			</ul>
		
		</div> <!-- id="left-sidebar" -->
	
<!-- 
right sidebar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
	
		<div id="right-sidebar">
			
			<ul>
			<?php dynamic_sidebar('[Sidebar] Right'); ?>
			</ul>
			
		</div> <!-- id="right-sidebar" -->
		
<!-- 
bottom widebar
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
	
		<div id="bottom-widebar">
			
			<ul>
			<?php dynamic_sidebar('[Widebar] Bottom'); ?>
			</ul>
			
		</div> <!-- id="bottom-widebar" -->
	 
	</div> <!-- id="sidebar-wrapper" -->
	
	<div class="clearFloat"></div>
<?php
}
?>

<!--
End of sidebar.php
~~~ -->
		