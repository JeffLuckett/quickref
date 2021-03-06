<?php 
include( dirname(__FILE__) . '/../core/core-functions.php' );

//---------------- Custom Exclude Cats Function ----------------//
function exclude_category($query) {
	$cats = wptouch_excluded_cats();
	$icats = explode( ",", $cats );
	$new_cats = array();
	foreach( $icats as $icat ) {
		$new_cats[] = "-" . $icat;
}
	$cats = implode( ",",  $new_cats );
	
	if ( $query->is_home ) {
	$query->set('cat', $cats);
	}
return $query;
}

add_filter('pre_get_posts', 'exclude_category');


//---------------- Custom Excerpts Function ----------------//
function wptouch_trim_excerpt($text) {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$text = strip_tags($text);
		$excerpt_length = apply_filters('excerpt_length', 30);
		$words = explode(' ', $text, $excerpt_length + 1);
		if (count($words) > $excerpt_length) {
			array_pop($words);
			array_push($words, '...');
			$text = implode(' ', $words);
			$text = force_balance_tags( $text );
		}
	}
	return apply_filters('wptouch_trim_excerpt', $text, $raw_excerpt);
}


//---------------- Custom Time Since Function ----------------//

function time_since($older_date, $newer_date = false)
	{
	// array of time period chunks
	$chunks = array(
//	array(60 * 60 * 24 * 365 , 'yr'),
	array(60 * 60 * 24 * 30, __('mo', 'wptouch') ),
	array(60 * 60 * 24 * 7, __('wk', 'wptouch') ),
	array(60 * 60 * 24, __('day', 'wptouch') ),
	array(60 * 60, __('hr', 'wptouch') ),
	array(60 , __('min', 'wptouch'), )
	);
	
	$newer_date = ($newer_date == false) ? (time()+(60*60*get_settings("gmt_offset"))) : $newer_date;
	
	// difference in seconds
	$since = $newer_date - $older_date;
	
	for ($i = 0, $j = count($chunks); $i < $j; $i++)
		{
		$seconds = $chunks[$i][0];
		$name = $chunks[$i][1];

		// finding the biggest chunk (if the chunk fits, break)
		if (($count = floor($since / $seconds)) != 0)
			{
			break;
			}
		}

	// set output var
	$output = ($count == 1) ? '1 '.$name : "$count {$name}s";

	// step two: the second chunk
	if ($i + 1 < $j)
		{
		$seconds2 = $chunks[$i + 1][0];
		$name2 = $chunks[$i + 1][1];
		
		if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
			{
			// add to output var
			$output .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
			}
		}
	
	return $output;
	}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wptouch_trim_excerpt');