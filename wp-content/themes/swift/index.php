<?php 
global $opt;
global $design_opt;
get_header();
?>
<div id="content" class="grid_10">
<?php 
	if($opt['swift_featured_enable']=="true"):
		if($opt['swift_slider_style']=="Lite"):
			include(INCLUDES . '/featured-slider-1.php');
		else:
			include(INCLUDES . '/featured-slider-2.php');
		endif;
	endif;
?>
<?php 
	/*Checks If featured posts are to be displayed or not, 
	  and sets the width of the column accrodingly using grids.	*/
	  if($opt['swift_popular_enable']=="true"&&$opt['swift_magzine']!="magzine"):
		$grid="grid_6 alpha";
	  else:
	  	$grid="grid_10 alpha";
	  endif;
?>

    <div class="<?php echo $grid;?>">
    <?php
        if($design_opt['swift_magzine']=="magzine")
            magloop($opt['swift_full_posts_number']);
        else
            blogloop($opt['swift_excerpts_enable'],$opt['swift_thumbs_disable'],$opt['swift_full_posts_number']);
    ?>
    </div>

    <!--Insert popular posts-->
<?php 
		if($opt['swift_popular_enable']=="true"&&$opt['swift_magzine']!="magzine"):?>
            <div class="grid_4 omega">
            <?php 	include(INCLUDES . '/popular-posts-home.php'); ?>
            </div>
<?php 	endif;?>

</div><!--/content-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
