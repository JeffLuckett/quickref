<?php 
global $opt;
get_header();
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>
<div id="content" class="grid_10">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
?>
        <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
        <span class="post-meta alignleft">Written on <?php the_time("$dateformat \a\\t $timeformat"); ?> by <?php the_author_posts_link(); ?></span>
        <div class="clear"></div>
         <!-- Display the Title as a link to the Post's permalink. -->
        <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <span class="post-meta alignleft">Filed under <?php swift_list_cats(3); ?></span>
        <span class="post-meta alignright"><a href="<?php the_permalink() ?>#commentlist"><?php comments_number('no comments','one comment','% comments'); ?></a><?php edit_post_link('Edit Post', ' [', ']'); ?></span>
        <div class="clear"></div>
        <span class="border"></span>
        
        <div class="entry">
		<?php
			//Inserts the adcode 
			if ($opt['swift_adsense_enable'] == "true"){ 
			if ($adcode=$opt['swift_adcode'])  
			echo stripslashes($adcode);} 
		?>
    
    <!-- Your post is displayed by this function -->
<?php 		the_content(); ?>
        
<?php 		wp_link_pages(array('before' => '<div class="page-navigation"><p><strong>Pages: </strong> ', 'after' => '</p></div>', 'next_or_number' => 'number')); 
?>
        
<?php
			//Inserts the adcode 
			if ($opt['swift_adsense_afterpost_enable'] == "true"){ 
			if ($adcode=$opt['swift_adsense_afterpost'])  
			echo stripslashes($adcode);} 
?>
 		</div><!--/entry-->
    
    <?php include(INCLUDES.'/related-posts-n-author-info.php');?>
    
    <!-- Calling comments template -->
    	<?php comments_template(); ?>
	<!-- <?php trackback_rdf(); ?> -->
    <!-- Stop The Loop (but note the "else:" - see next line). -->
 	<?php endwhile; else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p>Sorry, no posts matched your criteria.</p>

 	<!-- REALLY stop The Loop. -->
 	<?php endif; ?>

</div><!--/content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>