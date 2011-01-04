<?php 
//================= Popular Posts ================================
function popular_widget($number,$thumb,$excerpt_enable){?>
	
<ul class="popular-widget"><?php
global $wpdb;
(int) $number;
if(!absint($number) )$number=5;

$now = gmdate("Y-m-d H:i:s",time());
$lastmonth = gmdate("Y-m-d H:i:s",gmmktime(date("H"), date("i"), date("s"), date("m")-24,date("d"),date("Y")));
$popularposts = "SELECT ID, post_title,SUBSTRING(post_content,1,200) AS post_content,post_excerpt, COUNT($wpdb->comments.comment_post_ID) AS 'stammy' FROM $wpdb->posts, $wpdb->comments WHERE comment_approved = '1' AND $wpdb->posts.ID=$wpdb->comments.comment_post_ID AND post_status = 'publish' AND post_date < '$now' AND post_date > '$lastmonth' AND comment_status = 'open' GROUP BY $wpdb->comments.comment_post_ID ORDER BY stammy DESC LIMIT ".$number;
$posts = $wpdb->get_results($popularposts);
$popular = '';

if($posts){
	
	foreach($posts as $post){
		$post_title = wp_kses($post->post_title,'','');
		$guid = get_permalink($post->ID);
		if(!$post->post_excerpt)$post->post_excerpt=$post->post_content;
		$excerpt= wp_kses($post->post_excerpt,'','');
		if($excerpt_enable!="true")$excerpt=$post_title ;
		$custom_field = get_post_meta($post->ID, "image", true);
?>
		<li>
			<?php if($custom_field&&$thumb=="true") { ?>
				<a title="<?php echo $post_title; ?>" href="<?php echo $guid; ?>"><img src="<?php echo U_URL.'/swift_custom';?>/timthumb.php?src=<?php echo $custom_field; ?>&amp;h=35&amp;w=60&amp;zc=1&amp;" alt="<?php echo $post_title; ?>" class="thumbnail alignleft" /></a>            
            <?php } ?>                
            
            <a href="<?php echo $guid; ?>" title="<?php echo $excerpt; ?>"><?php echo $post_title; ?></a>
    		<div style="clear:both"></div>
		</li>
<?php 

	}
}
?></ul>
<?php } //End of Popular posts Function?>
<?php
//===================== Banner ADS fucntion =======================
function ads_widget($one,$two,$three,$four){
	if($one=="true"&&get_option('swift_banner1image')&&get_option('swift_banner1destination')): ?>
    
	<a href="<?php echo get_option('swift_banner1destination');?>" ><img src="<?php echo get_option('swift_banner1image'); ?>" class="banner125"  alt="" /></a>
    <?php endif;?>
    
    <?php	if($two=="true"&&get_option('swift_banner2image')&&get_option('swift_banner2destination')): ?>
    
	<a href="<?php echo get_option('swift_banner2destination');?>" ><img src="<?php echo get_option('swift_banner2image'); ?>" class="banner125" alt="" /></a>
    <?php endif;?>
    
    <?php	if($three=="true"&&get_option('swift_banner3image')&&get_option('swift_banner3destination')): ?>
    
	<a href="<?php echo get_option('swift_banner3destination');?>" ><img src="<?php echo get_option('swift_banner3image'); ?>" class="banner125" alt="" /></a>
    <?php endif;?>
    
    
    <?php	if($four=="true"&&get_option('swift_banner4image')&&get_option('swift_banner4destination')): ?>
    
	<a href="<?php echo get_option('swift_banner4destination');?>" ><img src="<?php echo get_option('swift_banner4image'); ?>" class="banner125" alt="" /></a>
    <?php endif;?>
    <div class="clear"></div>
<?php }?>
