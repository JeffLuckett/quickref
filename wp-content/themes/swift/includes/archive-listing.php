<?php
$dateformat = get_option('date_format');
$timeformat = get_option('time_format');
?>
<div class="archive_options clearfix">
	<div class="grid_3 alpha">
                <h4>Categories</h4>
            			<?php wp_dropdown_categories('show_option_none=Select category'); ?>
							<script type="text/javascript"><!--
   							 var dropdown = document.getElementById("cat");
							function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
							location.href = "<?php echo get_option('home');
							?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
   							}
   							dropdown.onchange = onCatChange;
							--></script>
	</div>	
    <div class="grid_3">   
           		<h4>Monthly Archives</h4>
            			<select name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=\"\"><?php echo attribute_escape(__('Select Month')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
    </div>
    <div class="grid_4 error omega">
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </div>
</div>
<div class="clear"></div>

<div class="grid_5 alpha">
<h2 class="archive-title">Popular Posts</h2>
	<ol>
	<?php 
	global $wpdb;
	
	$result = $wpdb->get_results("SELECT comment_count,ID,post_title FROM $wpdb->posts ORDER BY comment_count DESC LIMIT 0 , 20");
	foreach ($result as $post) {
	setup_postdata($post);
	$postid = $post->ID;
	$title = $post->post_title;
	$commentcount = $post->comment_count;
	?>
		<li>        	
        	<h3 class="ep-listing"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<span class="post-meta alignleft">Filed under <?php swift_list_cats(2); ?> on <?php the_time("$dateformat"); ?></span>
    		<div class="clear"></div>
		</li>
	<?php }  ?>
	</ol>
</div>
      
<div class="grid_5 omega">          
	<h2 class="archive-title">Last 20 posts</h2>
 	<div class="post">
    <ol>           
	<?php query_posts('showposts=20'); ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<li>
        	<h3 class="ep-listing"> <a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
			<span class="post-meta alignleft">Filed under <?php swift_list_cats(2); ?> on <?php the_time("$dateformat"); ?></span>
    		<div class="clear"></div>
		</li>
                            
     <?php endwhile; endif; ?>
     </ol>
     </div>
</div>

<div class="clear"></div>
<div class="archive_options clearfix">
	<div class="grid_3 alpha">
                <h4>Categories</h4>
            			<?php wp_dropdown_categories('show_option_none=Select category'); ?>
							<script type="text/javascript"><!--
   							 var dropdown = document.getElementById("cat");
							function onCatChange() {
							if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
							location.href = "<?php echo get_option('home');
							?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
							}
   							}
   							dropdown.onchange = onCatChange;
							--></script>
	</div>	
    <div class="grid_3">   
           		<h4>Monthly Archives</h4>
            			<select name=\"archive-dropdown\" onChange='document.location.href=this.options[this.selectedIndex].value;'> 
  <option value=\"\"><?php echo attribute_escape(__('Select Month')); ?></option> 
  <?php wp_get_archives('type=monthly&format=option&show_post_count=1'); ?> </select>
    </div>
    <div class="grid_4 error omega">
	<?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </div>
</div>
<div class="clear"></div>
 