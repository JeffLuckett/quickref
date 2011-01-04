<?php 
function magloop($fullpost_number){
	global $opt;
	$dateformat = get_option('date_format');
	$timeformat = get_option('time_format');
	$count=1;$i=0;
	if ( have_posts() ) : while ( have_posts() ) : the_post();
    	global $do_not_duplicate;
		if(!$do_not_duplicate)$do_not_duplicate[dummy]='dummy';
		if (!in_array(get_the_ID(),$do_not_duplicate)):
			//This if loop echoes the full length posts
			if($i++<$fullpost_number):?>
				<!-- Display the Title as a link to the Post's permalink. -->
 				<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
    			<!-- Display the date (November 16th, 2009 format) and a link to other posts by this posts author. -->
 				<span class="post-meta alignleft">Filed under <?php swift_list_cats(2); ?> by <?php the_author_posts_link(); ?> on <?php the_time("$dateformat \a\\t $timeformat"); ?></span>
    
    			<span class="post-meta alignright"><a href="<?php the_permalink() ?>#commentlist"><?php comments_number('no comments','one comment','% comments'); ?></a></span>
    
    			<div class="clear"></div>
    
    			<span class="border"></span>
	
    			<div class="entry"><?php the_content();?></div>

    			<?php if($i==$fullpost_number) echo '<div class="fullpost-margin"></div>';?>
 
    
<?php 		else:    ?>

     			<!-- Display the Title as a link to the Post's permalink. -->
				<div class="mag-box <?php if($count%3==0) echo"m-right";?>">
    				<a href="<?php the_permalink() ?>" rel="bookmark">
						<img src="<?php echo U_URL.'/swift_custom';?>/timthumb.php?src=<?php echo thumb(get_the_ID(),get_the_content());?>&amp;h=90&amp;w=176&amp;zc=1"  alt="" class="mag-thumb" />
					</a>
    
					<div class="mag-content">
    					<span class="catname"><?php swift_list_cats(1); ?></span>
 						<h2 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title();?></a></h2>
    
	 					<div class="entry">
   							<?php the_excerpt(); $count++;?>
	 					</div>
					</div><!--/mag-content-->

                    <div class="mag-meta clearfix">
                        <a href="<?php the_permalink() ?>" class="read-more">Full Story &raquo;</a>
                    </div>  
      
            	</div><!-- /mag-box-->

<?php 		endif; ////End's the if checking number of full posts. ?>
    <!-- Stop The Loop (but note the "else:" - see next line). -->
<?php 
		endif; //Ends the if making sure there is no duplicate content.
		endwhile; else: ?>
    
 	<!-- The very first "if" tested to see if there were any Posts to -->
 	<!-- display.  This "else" part tells what do if there weren't any. -->
 	<p>Sorry, no posts matched your criteria.</p>

 	<!-- REALLY stop The Loop. -->
<?php 
	endif; 
?>

<div class="clear"></div>
 
<?php	if(function_exists('swift_pagenavi')) swift_pagenavi(); ?>

<?php }//End of magloop fucntion ?>