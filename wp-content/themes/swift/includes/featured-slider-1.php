
<div class="jflow-content-slider" >
<div id="slides">

<?php if(get_option('swift_featured_category')&&get_option('swift_featured_category')!='Show recent posts') {
$query='category_name="'.get_option('swift_featured_category').'"&showposts='.get_option('swift_featured_posts_number');}
else
$query='&showposts='.get_option('swift_featured_posts_number');
 

?>
<?php
	$count=0;
    $recentPosts = new WP_Query();
    $recentPosts->query($query);
    while ($recentPosts->have_posts()) : $recentPosts->the_post();
	 $do_not_duplicate[$count] = $post->ID;
	 $count++;
?> 
                
	<div class="slide-wrapper">
				<div class="slide-details">

					<h2 class="title"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
<?php if(get_option('swift_thumbs_slider_disable')!="true"&&thumb(get_the_ID(),get_the_content())) { ?>
<img src="<?php echo U_URL.'/swift_custom';?>/timthumb.php?src=<?php echo thumb(get_the_ID(),get_the_content());?>&amp;h=130&amp;w=250&amp;zc=1"  alt="" class="slide-thumbnail" />
<?php } ?>
					<?php the_excerpt(); ?> 
					
				</div>
				<div class="clear"></div>
	</div>
<?php endwhile; ?>
</div><!--End of Slides -->
		<div id="myController">
			<span class="jFlowPrev">Prev</span>
<?php for($i=0;$i<$count;$i++){ ?>
			<span class="jFlowControl"><?php echo ($i+1); ?></span>
<?php }?>
			<span class="jFlowNext">Next</span>

		</div>
		<div class="clear"></div>
</div><!-- End of jflow content slider -->
