

<?php if(get_option('swift_featured_category')&&get_option('swift_featured_category')!='Show recent posts') {
$query='category_name="'.get_option('swift_featured_category').'"&showposts='.get_option('swift_featured_posts_number');}
else
$query='&showposts='.get_option('swift_featured_posts_number');
 

?>
<div id="slider-wrapper">
<div id="slider">
<?php
	$count=0;
    $recentPosts = new WP_Query();
    $recentPosts->query($query);
    while ($recentPosts->have_posts()) : $recentPosts->the_post();
	 $do_not_duplicate[$count] = $post->ID;
	 $count++;
?> 

	<a href="<?php the_permalink() ?>" rel="bookmark"><img src="<?php echo U_URL.'/swift_custom';?>/timthumb.php?src=<?php echo thumb(get_the_ID(),get_the_content());?>&amp;h=240&amp;w=576&amp;zc=1"  alt="" title="<?php the_title(); ?>" /></a>

<?php endwhile; ?>
 </div>             
</div>