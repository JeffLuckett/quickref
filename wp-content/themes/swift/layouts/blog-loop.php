<?php 
function blogloop($excerpt,$thumb_disable,$fullpost_number){
	global $opt;
	$dateformat = get_option('date_format');
	$timeformat = get_option('time_format');
	$i=0;
	if ( have_posts() ) : while ( have_posts() ) : the_post();
		global $do_not_duplicate;
    	if(!$do_not_duplicate)$do_not_duplicate[dummy]='dummy';
		if (!in_array(get_the_ID(),$do_not_duplicate)):
?>
    
     <!-- Display the Title as a link to the Post's permalink. -->
 		<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    
        <!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
        <span class="post-meta alignleft">Filed under <?php swift_list_cats(2); ?> by <?php the_author_posts_link(); ?> on <?php the_time("$dateformat \a\\t $timeformat"); ?></span>
        <span class="post-meta alignright"><a href="<?php the_permalink() ?>#commentlist"><?php comments_number('no comments','one comment','% comments'); ?></a></span>
        <div class="clear"></div>
        <span class="border"></span>
        
        <div class="entry">
<?php 
			if($i<$fullpost_number): {the_content();
		  		$i++; //Keeping track of number of full posts echoed.
		  		if($i+1==$fullpost_number) echo '<div class="fullpost-margin"></div>';}
		  	else:	
?>
<?php 	//Display Excerpts or full post based on option selected.
				if($excerpt=="true"):?>
<?php 				if($thumb_disable!="true"): ?>
						<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo U_URL.'/swift_custom';?>/timthumb.php?src=<?php echo thumb(get_the_ID(),get_the_content());?>&amp;h=90&amp;w=176&amp;zc=1" alt="" class="mag-thumb" /></a>
<?php 				endif; //Ends the if checking the thumbails.?>
<?php 				the_excerpt(); ?>
					<a href="<?php the_permalink() ?>" class="read-more">Full Story &raquo;</a>
<?php 			else:
					the_content();
				endif; //End's the if checking excerpts vs fullpost
			endif; //End's the if checking number of full posts.
			?>
		</div>
    <div class="clear"></div>
    <!-- Stop The Loop (but note the "else:" - see next line). -->
 	<?php endif;endwhile; else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p style="font-size:1.3em; line-height:1.8em">Sorry, no posts matched your criteria.</p>
    
	
 	<!-- REALLY stop The Loop. -->
 	<?php endif; ?>
    
    <div class="clear"></div>
 
	<?php	if(function_exists('swift_pagenavi')) swift_pagenavi(); ?>

 <?php }//End of blogloop fucntion ?>