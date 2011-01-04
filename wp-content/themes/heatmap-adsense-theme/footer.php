<?php 
/*
HeatMap Theme 2
Author: Stuart Wider
Copyright: Stuart Wider 2009
Website: HeatMapTheme.com
This file last updated: 20/10/2009

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

global $preset_mode;
?>

<!--
footer.php
~~~~~~~~~~~~~~~~~~~~~~~~ ~~~ -->
<div class="clearFloat"></div>


<!-- 
Footers Left and Right
~~~ -->
	<div id="footer">
		<div id="footer-content">
			<div id="footer-content-left">	
				<?php hmt_footer_left(); ?>
			</div> <!-- id="footer-content-left" -->
			<div id="footer-content-right">	
				<?php hmt_footer_right(); ?>
			</div> <!-- id="footer-content-right" -->
		</div> <!-- "footer-content" -->
	</div> <!-- id="footer" -->
	
	<div class="clearFloat"></div>
      
<!-- 
Sub Footers Left and Right
~~~ -->  
	<div id="sub-footer">
		<div id="sub-footer-content">
			<div id="sub-footer-content-left">	
				<?php hmt_subfooter_left();?>
			</div> <!-- id="sub-footer-content-left" -->
			<div id="sub-footer-content-right">	
				<?php hmt_subfooter_right();?>
			</div> <!-- id="sub-footer-content-right" -->
 		</div> <!-- id="sub-footer-content" -->  
	</div> <!-- id="sub-footer" -->
	
	<div class="clearFloat"></div>

</div> <!-- id="sub-footer" -->
<div id="copyright" style="text-align:center">
	Copyright &copy; 
	<?php $the_year = date("Y"); echo ($the_year > 2011 ? '2011 - '.$the_year : $the_year); ?>
	quickreference.info.
	All Rights Reserved.
</div>
		
<!-- 
Google Analytics
~~~ -->	
	<?php hmt_option('hmt_google_analytics'); ?>
	<?php wp_footer(); ?>
	<?php echo '<!-- Number of Queries:'; echo (get_num_queries()); echo '   Seconds: '; timer_stop(1); echo '-->'; echo "\n"; ?>
	
</body>

</html>

<!--
End of footer.php
~~~ -->
