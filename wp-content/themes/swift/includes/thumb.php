<?php 
function image_domain($image_url){
	$url_1=get_bloginfo('url');
	$url_2=$image_url;
	 $url_stuff1 = parse_url($url_1);
	$url_stuff2 = parse_url($url_2);
	if($url_stuff1['host']==$url_stuff2['host'])
	return 1;
	else 
	return 0;
	}

function http_get_file($url,$pID)    {

   	$url_stuff = parse_url($url);
   	$port = isset($url_stuff['port']) ? $url_stuff['port']:80;

   	$fp = fsockopen($url_stuff['host'], $port);

   	$query  = 'GET ' . $url_stuff['path'] . " HTTP/1.0\n";
   	$query .= 'Host: ' . $url_stuff['host'];
   	$query .= "\n\n";

   	fwrite($fp, $query);

  	while ($line = fread($fp, 1024)) {
       $buffer .= $line;
   	}

   	preg_match('/Content-Length: ([0-9]+)/', $buffer, $parts);
   	$data= substr($buffer, - $parts[1]);
	
	$wud = wp_upload_dir();
	$uploaddir=U_DIR.'/swift_custom';
	if(!is_dir($uploaddir)){
   	$make = @mkdir($uploaddir,0777);
                }
	$path=$uploaddir.'/'.$pID.'.jpg';
   	$fp=fopen($path,'w');
   	fwrite($fp,$data);
	$loc = U_URL.'/swift_custom/'.$pID.'.jpg';
	return $loc;
}
function thumb($id,$content){
	
	//Getting the image url from custom field
	$img = get_post_meta($id, 'image', $single = true);
	//If there is no image specified in custom fields, get image from the content.
		if($img==NULL ||$img==''){			
			//Extracting the content of the post to do a pattern match
			//A simple regular expression to identify image urls.
			$searchimages = '~http://[^>]*.(jpg|jpeg|gif|png|PNG)~';
			preg_match( $searchimages, $content, $pics );
			$iNumberOfPics = count($pics[0]);
			if ( $iNumberOfPics > 0 ) 
			{$img=$pics[0];
			if(!image_domain($img)) $img=http_get_file($img,$id);
			add_post_meta($id, 'image', $img,true) or update_post_meta($id, 'image', $img);
			}
		}
	
	if($img==NULL ||$img=='') 
	{
	if(!get_option( 'upload_url_path' ))
	$img=WP_CONTENT_URL.'/uploads/swift_default.jpg';
	else
	$img=get_option( 'upload_url_path' ).'/swift_default.jpg';
	
	add_post_meta($id, 'image', $img,true) or update_post_meta($id, 'image', $img);}
	return $img;
	
}
?>