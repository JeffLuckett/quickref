<?php global $opt;?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<title>

<?php if ( is_home() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;<?php bloginfo('description'); ?><?php } ?>
<?php if ( is_search() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Search Results<?php } ?>
<?php if ( is_author() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Author Archives<?php } ?>
<?php if ( is_single() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_page() ) { ?><?php wp_title(''); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_category() ) { ?>Archive&nbsp;|&nbsp;<?php single_cat_title(); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if ( is_month() ) { ?>Archive&nbsp;|&nbsp;<?php the_time('F'); ?>&nbsp;|&nbsp;<?php bloginfo('name'); ?><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><?php bloginfo('name'); ?>&nbsp;|&nbsp;Tag Archive&nbsp;|&nbsp;<?php  single_tag_title("", true); } } ?>
</title>
<?php if(!$temp=$opt['swift_favicon'])$temp=get_bloginfo('template_url').'/images/favicon.ico';?>
<link rel="shortcut icon" href="<?php echo $temp;?>"  />

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" media="screen" />  
<link rel="stylesheet" type="text/css" href="<?php echo U_URL.'/swift_custom';?>/custom-style.css" media="screen" />

<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('woo_feedburner_url') <> "" ) { echo get_option('woo_feedburner_url'); } else { echo get_bloginfo_rss('rss2_url'); } ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php 
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
?>
<?php if ( is_single() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script language="javascript" type="text/javascript" src="<?php echo U_URL.'/swift_custom';?>/swift-js-functions.js"></script>

<?php if ($header_scripts=$opt['swift_header_scripts']) { echo stripslashes($header_scripts);}?> 


</head>
<body>
<div id="top"></div>
<?php navigation($opt['swift_nav1'],1);?>
<div id="header-container">
	<div id="header" class="grid_960 clearfix">
    	<div class="grid_16">
        
			<?php if($opt['swift_logo']): ?>
            <div id="logo" class="alignleft">
                <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>">
                <img src="<?php echo $opt['swift_logo']?>" alt="<?php bloginfo('name'); ?>"  /></a>
            </div><!--/logo-->
            
            <?php else:?>   
                    <div id="blogname" class="alignleft">
                    <h2 class="blogname"><a href="<?php bloginfo('url'); ?>/"><?php bloginfo('name'); ?></a></h2>
                    <h2 class="blog-title"><?php bloginfo('description'); ?></h2>
                    </div>
            <?php endif;?>
            
            
             
            <?php //Inserts the header ad code ?>
            <?php if ( $opt['swift_header_ad_enable'] == "true" && $headerad=$opt['swift_header_adcode'] ){ ?>
            <div id="header-ad" class="alignright">
            <?php echo stripslashes($headerad);?>
            </div><!--/header-ad"-->
            <?php }//End of if ?>
            
            <div class="clear"></div>
        
        </div>
    </div><!--/header-->
</div><!--/header-container-->


<?php navigation($opt['swift_nav2'],2); ?>


<?php //Inserts adcode below navigation
	if ($opt['swift_nav_adsense_enable'] == "true" && $adcode=$opt['swift_nav_adcode']){ ?>
		<div id="nav-ad-container" class="clearfix">
			<div id="nav-ad" class="grid_960">
                <div class="grid_16">
                <?php echo stripslashes($adcode); ?>
                </div>
			</div>
		</div>
<?php }//end of if ?>

<!--Contains content area and sidebar, closing div in footer.php-->
<div id="main-container" class="grid_960 clearfix">
<div id="right-container">