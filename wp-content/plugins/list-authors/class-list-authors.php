<?php
/**
 * ListAuthorsWidget - A widget to list WordPress authors
 *
 * @package ListAuthors
 * @since 1.2
 *
 * @version 2.0
 * @copyright Matthew Toso
 * @author Matthew Toso
 * @link http://www.takaitra.com/projects/list-authors
 * @license GPL License http://www.opensource.org/licenses/gpl-license.html
 */
class ListAuthorsWidget extends WP_Widget {
    /** constructor */
    function ListAuthorsWidget() {
        $widget_ops = array( 'classname' => 'widget_list_authors', 'description' => 'A list of WordPress authors and their respective RSS feeds.' );
        parent::WP_Widget('authors', 'List Authors', $widget_ops);	
    }

    /** @see WP_Widget::widget */
    function widget($args, $instance) {		
        extract( $args );
        $options = array_merge( $this->_get_default_options(), $instance );
        // Create feed image parameter
        $feed_image = $options['show_feedimage'] ? '&feed_image='.LISTAUTHORS_URL.'feed-icon-14x14.png&feed=RSS feed' : '';
        echo $before_widget;
        echo $before_title;
        echo $options['title'];
        echo $after_title;
        if ( $options['style'] == 'list' )
            echo '<ul>';
        ?>
        <!-- List Authors -->
          <?php wp_list_authors2('optioncount='.$options['optioncount'].'&exclude_admin='.$options['exclude_admin'].'&show_fullname='.$options['show_fullname'].'&hide_empty='.$options['hide_empty'].$feed_image.'&style='.$options['style'].'&orderby='.$options['orderby'].'&order='.$options['order'].'&min_count='.$options['min_count'].'&number='.$options['number']); ?>
        <!-- /List Authors -->
        <?php
        if ( $options['style'] == 'list' )
            echo '</ul>';
        echo $after_widget;
    }

    /** @see WP_Widget::update */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        $instance['title'] = esc_attr($new_instance['title']);
        $instance['optioncount'] = isset($new_instance['optioncount']);
        $instance['exclude_admin'] = isset($new_instance['exclude_admin']);
        $instance['show_fullname'] = isset($new_instance['show_fullname']);
        $instance['hide_empty'] = false;
        $instance['show_feedimage'] = isset($new_instance['show_feedimage']);
        $instance['style'] = $new_instance['style'];
		$instance['orderby'] = $new_instance['orderby'];
		$instance['order'] = $instance['orderby'] == 'name' ? 'ASC' : 'DESC';
		$instance['number'] = intval($new_instance['number']) > 0 ? intval($new_instance['number']) : NULL;
		$instance['min_count'] = intval($new_instance['min_count']) > 0 ? intval($new_instance['min_count']) : NULL;

        return $instance;
    }

    /** @see WP_Widget::form */
    function form($instance) {
        $options = array_merge( $this->_get_default_options(), $instance );	
        $title = esc_attr($options['title']);
        $optioncount = $options['optioncount'] ? 'checked="checked"' : '';
        $exclude_admin = $options['exclude_admin'] ? 'checked="checked"' : '';
        $show_fullname = $options['show_fullname'] ? 'checked="checked"' : '';
        $hide_empty = $options['hide_empty'] ? 'checked="checked"' : '';
        $feed_image = $options['show_feedimage'] ? 'checked="checked"' : '';
        $list_selected = $options['style'] == 'list' ? 'selected' : '';
        $none_selected = $options['style'] == 'none' ? 'selected' : '';
        $sort_by_name_selected = $options['orderby'] == 'name' ? 'selected' : '';
        $sort_by_count_selected = $options['orderby'] == 'count' ? 'selected' : '';
		$number = $options['number'];
		$min_count = $options['min_count'];

        // Warning for Bug #10328
        if ( version_compare( $GLOBALS['wp_version'], '2.8.3', '<' ) ) {
            if ( $options['hide_empty'] && $options['style'] == 'none' ) {
                echo '<p><strong>Warning:</strong> Due to a bug in WordPress 2.8, there is no output when "Hide authors with 0 posts" is selected along with the comma-separated style.</p>';
            }
        }

        ?>
        <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
	    <p>
            <label for="<?php echo $this->get_field_id('style'); ?>" class="screen-reader-text"><?php _e('Display Style:'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('style'); ?>" name="<?php echo $this->get_field_name('style'); ?>">
                <option value="list" <?php echo $list_selected; ?>>List Style</option>
		        <option value="none" <?php echo $none_selected; ?>>Comma-Separated Style</option>
            </select>
        </p>
	    <p>
            <label for="<?php echo $this->get_field_id('orderby'); ?>" class="screen-reader-text"><?php _e('Sort:'); ?></label>
            <select class="widefat" id="<?php echo $this->get_field_id('orderby'); ?>" name="<?php echo $this->get_field_name('orderby'); ?>">
                <option value="name" <?php echo $sort_by_name_selected; ?>>Sort by Name</option>
		        <option value="count" <?php echo $sort_by_count_selected; ?>>Sort by Post Count</option>
            </select>
        </p>
        <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Maximum displayed:'); ?></label> <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" size="3" value="<?php echo $number; ?>" /></p>
        <p><label for="<?php echo $this->get_field_id('min_count'); ?>"><?php _e('Minimum author posts:'); ?></label> <input id="<?php echo $this->get_field_id('min_count'); ?>" name="<?php echo $this->get_field_name('min_count'); ?>" type="text" size="3" value="<?php echo $min_count; ?>" /></p>
		<p>
            <label for="<?php echo $this->get_field_id('optioncount'); ?>"><input class="checkbox" type="checkbox" <?php echo $optioncount; ?> id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('optioncount'); ?>" /> <?php _e('Show number of published posts'); ?></label><br />
            <label for="<?php echo $this->get_field_id('exclude_admin'); ?>"><input class="checkbox" type="checkbox" <?php echo $exclude_admin; ?> id="<?php echo $this->get_field_id('exclude_admin'); ?>" name="<?php echo $this->get_field_name('exclude_admin'); ?>" /> <?php _e('Exclude administrator'); ?></label><br />
            <label for="<?php echo $this->get_field_id('show_fullname'); ?>"><input class="checkbox" type="checkbox" <?php echo $show_fullname; ?> id="<?php echo $this->get_field_id('show_fullname'); ?>" name="<?php echo $this->get_field_name('show_fullname'); ?>" /> <?php _e('Show full name'); ?></label><br />
			<label for="<?php echo $this->get_field_id('show_feedimage'); ?>"><input class="checkbox" type="checkbox" <?php echo $feed_image; ?> id="<?php echo $this->get_field_id('show_feedimage'); ?>" name="<?php echo $this->get_field_name('show_feedimage'); ?>" /> <?php _e('Show an RSS feed image and link'); ?></label>
        </p>
        <?php 
    }

    /** Options and default values for this widget */
    function _get_default_options() {
        return array(
            'title' => 'Authors',
            'optioncount' => false,
            'exclude_admin' => false,
            'show_fullname' => false,
            'hide_empty' => false,
            'show_feedimage' => true,
			'style' => 'list',
			'orderby' => 'name',
			'order' => 'ASC',
			'number' => 10,
			'min_count' => NULL
        );
    }


} // class ListAuthorsWidget

// register ListAuthorsWidget widget
add_action('widgets_init', create_function('', 'return register_widget("ListAuthorsWidget");'));

?>
