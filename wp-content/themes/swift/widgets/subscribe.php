<?php /**
 * FooWidget Class
 */
class FooWidget extends WP_Widget {
    /** constructor */
    function FooWidget() {
        parent::WP_Widget(false, $name = 'FooWidget');	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $title = apply_filters('widget_title', $instance['title']);
		$feedId=esc_attr($instance['feedId']);
        ?>
              <?php echo $before_widget; ?>
                  <?php if ( 0) {echo  $title; }
				  		else {echo 'Subscribe to'.get_bloginfo('name');} 
					?> 
<form action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $feedId ?>', 'popupwindow', 'scrollbars=yes, width=550,height=520 ');return true">
        <input style="padding: 0.2em 0pt; width: 170px;" name="email" value="Enter your e-mail address" onfocus="if (this.value == 'Enter your e-mail address') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your e-mail address';}" type="text" />
        <input value="<?php echo $feedId ?>" name="uri" type="hidden" />
        <input name="loc" value="en_US" type="hidden" />
        <input value="Subscribe" type="submit" />
        </form>

              <?php echo $after_widget; ?>
        <?php
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {				
        return $new_instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {				
        $title = esc_attr($instance['title']);
		$feedId = esc_attr($instance['feedId']);
        ?>
            <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label>
            
            <label for="<?php echo $this->get_field_id('feedId'); ?>"><?php _e('Feedburner ID:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('feedId'); ?>" name="<?php echo $this->get_field_name('feedId'); ?>" type="text" value="<?php echo $feedId; ?>" /></label>
            </p>
        <?php     }}?>
