<?php
function navigation($option,$position){
	global $opt;
	switch ($option) {
    
	case 'Disable':break;
    
	case 'Pages': ?>
 
<div id="nav<?php echo $position;?>-container" class="clearfix">
	<div id="nav<?php echo $position;?>" class="grid_960">
    <ul class="navigation top" >
    	<?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
		<li class="<?php echo $highlight; ?> first"><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <?php $query='&title_li=&include='.get_option('swift_page_inc'); wp_list_pages($query); ?>
        <?php if($links=$opt['swift_pagenav_links']) echo $links;?>
    </ul>
    
     <?php if($position==1&&$opt['swift_rsslinks_disable']!="true") include (INCLUDES . '/rss-links.php');?>
     <?php if($position==2&&$opt['swift_searchbox_disable']!="true") include (TEMPLATEPATH . '/searchform-nav.php');?>
     
	</div><!--/nav1-->
</div><!--/nav1-container-->

<?php    break;case 'Categories': ?>
 <div id="nav<?php echo $position;?>-container" class="clearfix">
	<div id="nav<?php echo $position;?>" class="grid_960">
    <ul class="navigation bottom" id="dropmenu">
    	<?php if (is_page()) { $highlight = "page_item"; } else {$highlight = "page_item current_page_item"; } ?>
		<li class="<?php echo $highlight; ?> first"><a href="<?php bloginfo('url'); ?>">Home</a></li>
        <?php 
		if(function_exists('mycategoryorder_applyorderfilter'))
		$query='&orderby=order&title_li=&include='.get_option('swift_cat_inc'); 
		else
			if(get_option('swift_cat_inc'))
			$query='title_li=&include='.get_option('swift_cat_inc'); 
			else
			$query='&order_by=count&title_li=';
		wp_list_categories($query); ?>
        <?php if($links=$opt['swift_catnav_links']) echo $links;?>
    </ul>  
     <?php if($position==1&&$opt['swift_rsslinks_disable']!="true") include (INCLUDES . '/rss-links.php');?>
     <?php if($position==2&&$opt['swift_searchbox_disable']!="true") include (TEMPLATEPATH . '/searchform-nav.php');?>
	</div><!--/nav1-->
</div><!--/nav1-container-->
        <?php break;
}
}
?>