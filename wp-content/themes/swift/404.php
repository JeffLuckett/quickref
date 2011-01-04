<?php 
global $opt;
get_header();
?>
<div id="content" class="error grid_10">
	<h2 class="archive-title">Oops..  404 Error</h2>
	<p style="font-size:1.3em; line-height:1.8em">
		It seems the page you were trying to find on my site isn't around anymore (or at least around here).<br />
        Report it missing using my contact form and I'll see what I can do about it.<br />
        Whilst your here why not use the resources below? You never know, you may just find what you were looking for.<br />
	</p>
<?php include(INCLUDES .'/archive-listing.php');?>
</div><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>