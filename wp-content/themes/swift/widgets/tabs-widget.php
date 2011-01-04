<?php 

class swiftTabs extends WP_Widget {
    /** constructor */
    function swiftTabs() {
        parent::WP_Widget(false, $name = 'swiftTabs');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
        ?>
               
                 <?php include(INCLUDES . '/tabs.php');?>
               
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
        ?>
            
            
        <?php 
    }

} // class swiftTabs
?>