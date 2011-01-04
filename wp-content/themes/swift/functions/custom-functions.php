<?php 
/*
A custom fucntion to echo specified number of categories a
post is filed in. 
(Takes number of categories to be displayed as argument)
Written by Satish Gandham
Author URL: http://swiftthemes.com
Contact: http://swiftthemes.com/contact-me/
*/
function swift_list_cats($num){
	$temp=get_the_category(); 
	$count=count($temp);// Getting the total number of categories the post is filed in.
	for($i=0;$i<$num&&$i<$count;$i++){
		//Formatting our output.
		$cat_string.='<a href="'.get_category_link( $temp[$i]->cat_ID  ).'">'.$temp[$i]->cat_name.'</a>';
		if($i!=$num-1&&$i+1<$count)
		//Adding a ',' if it's not the last category.
		//You can add your own seperator here.
		$cat_string.=', ';
	}
	echo $cat_string;
} 

//Access the WordPress Categories via an Array
$swift_categories = array();  
$swift_categories_obj = get_categories('hide_empty=0');
foreach ($swift_categories_obj as $swift_cat) 
{$swift_categories[$swift_cat->cat_ID] = $swift_cat->cat_name;}
$categories_tmp = array_unshift($swift_categories, "Select-a-category:");    
       
//Access the WordPress Pages via an Array
$swift_pages = array();
$swift_pages_obj = get_pages('sort_column=post_parent,menu_order');    
foreach ($swift_pages_obj as $swift_page) 
{$swift_pages[$swift_page->ID] = $swift_page->post_name; }
$swift_pages_tmp = array_unshift($swift_pages, "Select a page:");  


function get_tiny_url($url) {
 
 if (function_exists('curl_init')) {
   $url = 'http://tinyurl.com/api-create.php?url=' . $url;
 
   $ch = curl_init();
   curl_setopt($ch, CURLOPT_HEADER, 0);
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_URL, $url);
   $tinyurl = curl_exec($ch);
   curl_close($ch);
 
   return $tinyurl;
 }
 
 else {
   # cURL disabled on server; Can't shorten URL
   # Return long URL instead.
   return $url;
 }
 
}
?>