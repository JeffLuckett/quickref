<div class="tabs">
  <ul class="tabmenu clearfix">
    <li><a href="#recent">Recent</a></li>
    <li><a href="#comments">Comments</a></li>
    <li><a href="#tags">Tags</a></li>
  </ul>
  
  <div id="recent" class="tab-content">
    <ul>
 	<?php wp_get_archives('title_li=&type=postbypost&limit=9'); ?>
    </ul>
  </div>
  
  <div id="comments" class="tab-content"> 
<?php 
global $wpdb;
$number=9; // number of recent comments desired
$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_approved = '1' ORDER BY comment_date_gmt DESC LIMIT $number");
?>
<ul>
<?php
if ( $comments ) : foreach ( (array) $comments as $comment) :
$author=wp_kses($comment->comment_author,'','');
$content=wp_kses($comment->comment_content,'','');

echo  '<li>' . sprintf(__('%1$s on %2$s'), $author, '<a href="'. get_comment_link($comment->comment_ID) . '"  title="'.$content.'">' . get_the_title($comment->comment_post_ID) . '</a>') . '</li>';
endforeach; endif;?></ul>
  </div>
  
  <div id="tags" class="tab-content"> 
    <?php wp_tag_cloud('smallest=8&largest=22'); ?>
  </div>
  
</div>
