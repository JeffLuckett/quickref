<?php 
global $opt;
get_header();
?>
<div id="content" class="grid_10">
<?php 
	if($opt['swift_archives_magzine']=="magzine")
		magloop(0);
	else
		blogloop($opt['swift_archive_excerpts_enable'],$opt['swift_thumbs_disable'],0);
?>
</div><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
