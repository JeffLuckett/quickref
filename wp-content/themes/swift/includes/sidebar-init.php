<?php

function the_widgets_init() {
    if ( !function_exists('register_sidebars') )
        return;
 
	 
	
//Sidebars for right wide layout
    	register_sidebar(array('name' => 'Wide SB Top','id' => 'wrt','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
	    register_sidebar(array('name' => 'Narrow SB, Left','id' => 'nrl','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));

	    register_sidebar(array('name' => 'Narrow SB, Right','id' => 'nrr','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
		register_sidebar(array('name' => 'Wide SB, Right Bottom','id' => 'wrb','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
		
		register_sidebar(array('name' => 'Single SB Rright','id' => 'sr','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		register_sidebar(array('name' => 'Single SB Left','id' => 'sl','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
		
		
	  
		
	    register_sidebar(array('name' => 'Footer-1','id' => 'Footer-1','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	
	    register_sidebar(array('name' => 'Footer-2','id' => 'Footer-2','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	
	    register_sidebar(array('name' => 'Footer-3','id' => 'Footer-3','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	
	    register_sidebar(array('name' => 'Footer-4','id' => 'Footer-4','before_widget' => '<div id="%1$s" class="block widget %2$s">','after_widget' => '</div>','before_title' => '<h4 class="widget-title">','after_title' => '</h4>'));
	}

add_action( 'init', 'the_widgets_init' );

?>