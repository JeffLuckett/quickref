<?php
/*
Part of the Ad Injection plugin for WordPress
http://www.reviewmylife.co.uk/
*/

class Ad_Injection_Widget extends WP_Widget {
	function Ad_Injection_Widget() {
		$widget_ops = array( 'classname' => 'adinjwidget', 'description' => 'Insert Ad Injection adverts into your sidebars/widget areas.' );
		$control_ops = array( 'width' => 400, 'height' => 300, 'id_base' => 'adinj' );
		$this->WP_Widget( 'adinj', 'Ad Injection', $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		if (adinj_ads_completely_disabled_from_page()) return;
		$options = adinj_options();
		
		if ((is_home() && adinj_ticked('widget_exclude_home')) ||
			(is_page() && adinj_ticked('widget_exclude_page')) ||
			(is_single() && adinj_ticked('widget_exclude_single')) ||
			(is_archive() && adinj_ticked('widget_exclude_archive'))){
			return;
		}

		if ($options['ad_insertion_mode'] == 'direct_dynamic'){
			if (adinj_show_adverts() !== true){
				return;
			}
		}
		
		extract( $args );

		$title = apply_filters('widget_title', $instance['title'] );
		$advert = $instance['advert'];

		echo $before_widget;
		if ( $title ) {
			echo $before_title . $title . $after_title;
		}

		$adcode = "";
		$include = "";
		if ($options['ad_insertion_mode'] == 'mfunc'){
			$include = adinj_ad_code_include();
			$adcode = adinj_get_mfunc_code($this->get_ad_file_name());
		} else {
			$adcode = $advert;
		}
		$adcode = adinj_ad_code_eval($adcode);			
			
		if ( $advert ){
			echo $include;
			echo $adcode;
		}

		echo $after_widget;
	}
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;

		/* Strip tags (if needed) and update the widget settings. */
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['advert'] = $new_instance['advert'];
		
		$options = adinj_options();
		write_ad_to_file($instance['advert'], $this->get_ad_file_path2());
		
		return $instance;
	}
	
	function form( $instance ) {

		/* Set up some default widget settings. */
		$defaults = array('title' => '', 'advert' => '');
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" style="width:100%;" />
		<br />
			<span style="font-size:10px;">Make sure any label complies with your ad provider's TOS. More info for <a href="http://adsense.blogspot.com/2007/04/encouraging-clicks.html" target="_new">AdSense</a> users.</span>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('advert'); ?>">Ad code:</label>
			<textarea class="widefat" rows="12" cols="20" id="<?php echo $this->get_field_id('advert'); ?>" name="<?php echo $this->get_field_name('advert'); ?>"><?php echo $instance['advert']; ?></textarea>
		</p>
		
		<p>The following dynamic options to define who sees these adverts are on the main <a href='options-general.php?page=ad-injection.php'>Ad Injection settings page</a>. The title will however always be displayed. If you want the title to be dynamic as well you should embed it in the ad code text box.</p>
		
		<blockquote>
		<ul>
		<li>Ads on pages older than...</li>
		<li>Ads for search engine visitors only.</li>
		<li>Block ads by IP.</li>
		</ul>
		</blockquote>
		
		<p>You can also set which <a href='options-general.php?page=ad-injection.php#widgets'>page types</a> the widgets appear on.</p>
		
		<?php
	}
	
	function get_ad_file_path2(){
		return ADINJ_AD_PATH.'/'.$this->get_ad_file_name();
	}
	
	function get_ad_file_name(){
		return 'ad_widget_'.$this->get_id().'.txt';
	}
	
	function get_id(){
		$field = $this->get_field_id('advert');
		preg_match('/-(\d+)-/', $field, $matches);
		return $matches[1];
	}
}

?>