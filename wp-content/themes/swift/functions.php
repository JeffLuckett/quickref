<?php
 $opt = get_option('swift_opt');
 $design_opt = get_option('swift_design_opt');
/**
 * Loads all the core files
 * Initializes widgets
 * Add action hooks and filters
 */


// Directory constants
define('INCLUDES', TEMPLATEPATH . '/includes');
define('ADMIN', TEMPLATEPATH . '/admin');
define('WIDGETS', TEMPLATEPATH . '/widgets');
define('FUNCTIONS', TEMPLATEPATH . '/functions');
define('LAYOUTS', TEMPLATEPATH . '/layouts');

// Defining uploads directory parameters
$wud = wp_upload_dir();
define('U_DIR', $wud['basedir']);
define('U_URL', $wud['baseurl']);


//require_once (ADMIN. '/testing.php');

require_once (INCLUDES . '/sidebar-init.php'); 	// Initializes the sidebars
require_once (INCLUDES . '/navigation.php');   	// Core for the navigation above and below header
require_once (INCLUDES . '/thumb.php');        	// Add's thumbnails to the post and fetches them when called for
require_once (INCLUDES . '/wp-pagenavi.php');  	// Add's wp page nav support, script by Lester Chann

require_once (ADMIN. '/admin-header.php');     
require_once (ADMIN. '/admin-core.php');       	// Work horse for SWIFT admin options.
require_once (ADMIN. '/swift-options-init.php');	// SWIFT options array
require_once (ADMIN. '/swift-design-options-init.php');	//SWIFT design options array
require_once (ADMIN. '/pageorder.php');			// Work horse for page selection
require_once (ADMIN. '/categoryorder.php');		// Work horse for page selection
require_once (ADMIN. '/create-styles.php');		// Generates custom-styles.css files
require_once (ADMIN. '/create-js-file.php');	

require_once (FUNCTIONS. '/custom-functions.php');	// Some MISC functions

// Wordpress loops, used on home page and archives.
require_once (LAYOUTS. '/blog-loop.php');
require_once (LAYOUTS. '/mag-loop.php');

require_once (WIDGETS . '/widgets.php'); // Adds widgets
require_once (WIDGETS . '/widget-functions.php');	// Functions for the above loaded widgets


/**
 * Initializing our widgets
 */
add_action('widgets_init', create_function('', 'return register_widget("swiftTabs");'));
add_action('widgets_init', create_function('', 'return register_widget("swiftPopularPosts");')); 
add_action('widgets_init', create_function('', 'return register_widget("swiftAdsWidget");')); 
add_action('widgets_init', create_function('', 'return register_widget("SubscribeBox");')); 
add_action('widgets_init', create_function('', 'return register_widget("HomePageOnlyText");')); 
add_action('widgets_init', create_function('', 'return register_widget("SwiftLite");')); 
 

/**
 * WPMU fix by edelwater @ farmvillie.org
 */
add_action('admin_init', 'swift_design_options_init' );
function swift_design_options_init(){
	register_setting( '', 'swift_opt' );
}

add_action('init', 'wdp_ajaxcomments_load_js', 10);
function wdp_ajaxcomments_load_js(){
		wp_enqueue_script('ajaxValidate', get_stylesheet_directory_uri().'/wdp-ajaxed-comments/js/jquery.validate.min.js', array('jquery'), '1.5.5');
		wp_enqueue_script('ajaxcomments', get_stylesheet_directory_uri().'/wdp-ajaxed-comments/js/ajax-comments.js',	array('jquery', 'ajaxValidate'), '1.1');
}
add_action('comment_post', 'wdp_ajaxcomments_stop_for_ajax',20, 2);
function wdp_ajaxcomments_stop_for_ajax($comment_ID, $comment_status){
	if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
	//If AJAX Request Then
		switch($comment_status){
			case '0':
				//notify moderator of unapproved comment
				wp_notify_moderator($comment_ID);
			case '1': //Approved comment
				echo "success";
				$commentdata=&get_comment($comment_ID, ARRAY_A);
				$post=&get_post($commentdata['comment_post_ID']); //Notify post author of comment
				if ( get_option('comments_notify') && $commentdata['comment_approved'] && $post->post_author != $commentdata['user_ID'] )
					wp_notify_postauthor($comment_ID, $commentdata['comment_type']);
				break;
			default:
				echo "error";
		}
		exit;
	}
}


?>