<?php
/*
Template Name: Full Width
*/
?>
<?php 
global $opt;
get_header();
?>
<div id="content" class="grid_16 alpha">
<?php 
	if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <!-- Display the Title as a link to the Post's permalink. -->
        <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
        <span class="border"></span>
        
        <div class="entry">
            <?php the_content(); ?>
            <?php wp_link_pages(array('before' => '<div class="page-navigation"><p><strong>Pages: </strong> ', 'after' => '</p></div>', 'next_or_number' => 'number')); ?>
        </div>
        
        <!-- Calling comments template -->
            <?php comments_template(); ?>
        <!-- <?php trackback_rdf(); ?> -->
        <!-- Stop The Loop (but note the "else:" - see next line). -->
        <?php endwhile; else: ?>
        
        <!-- The very first "if" tested to see if there were any Posts to -->
        <!-- display.  This "else" part tells what do if there weren't any. -->
        <p>Sorry, no posts matched your criteria.</p>
    
        <!-- REALLY stop The Loop. -->
<?php 
	endif;
?>
</div><!--/content-->
<?php get_footer(); ?>