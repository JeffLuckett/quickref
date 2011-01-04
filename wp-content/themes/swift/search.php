<?php 
global $opt;
global $design_opt;
get_header();
?>
<div id="content" class="grid_10">
	<h2 class="archive-title">Search results for "<?php the_search_query(); ?>"</h2>
<?php 
	include(TEMPLATEPATH.'/searchform.php');	
	if($design_opt['swift_archives_magzine']=="magzine")
		magloop(0);
	else
		blogloop($opt['swift_archive_excerpts_enable'],$opt['swift_thumbs_disable'],0);
	include(TEMPLATEPATH.'/searchform.php');		
?>
</div><!--/content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
