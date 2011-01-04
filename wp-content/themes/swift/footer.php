<?php global $opt;?>
<!--End of main-container started in header.php-->
</div><!--/main-container-->

<div id="footer-container">
	<div  class="grid_960 clearfix">	
		<div id="footer" class="grid_16 alpha">

            <div class="grid_4 footer-widgets alpha">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-1') ) ?>
            </div><!--End of footer-1 -->
    
            <div class="grid_4 footer-widgets">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-2') ) ?>
            </div><!--End of footer-2 -->

            <div class="grid_4 footer-widgets">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-3') ) ?>
            </div><!--End of footer-3 -->
        
            <div class="grid_4 footer-widgets omega">
            <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Footer-4') ) ?>
            </div><!--End of footer-4 -->
    
		</div><!--/footer-->
	</div><!--/grid_960-->
	<div class="clear"></div>
</div><!--/footer-container-->

<div id="copyright">
<div id="copyright-container">
       <span class="alignleft">Copyright &copy; <a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a> | <a href="<?php bloginfo('url'); ?>/feed/">Entries (RSS)</a> and <a href="<?php bloginfo('url'); ?>/comments/feed/">Comments (RSS)</a></span>
    
        <span class="alignright">Theme SWIFT by <a href="http://GeniusHackers.Com"><strong>Satish Gandham</strong></a>, a product of <a href="http://swiftthemes.com"><strong>SwiftThemes.Com</strong></a></span>
        
    <div class="clear"</div>
<span class="alignleft">powered by <a href="http://wordpress.org/" rel="nofollow">WordPress</a></span> 
<span class="alignright"><a href="#top">[Back to top &uarr; ]</a></span>
    <div class="clear"></div>
</div><!--copyright-container-->
</div><!--/copyright -->

<?php wp_footer(); ?>
<?php 
if ($footer_code=$opt['swift_footer_scripts']) echo stripslashes($footer_code);?>
<!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
</body>
</html>