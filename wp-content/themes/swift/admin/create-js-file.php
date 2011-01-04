<?php

function create_js_file(){
	$swift_opt=get_option('swift_opt');
	if($_POST['swift_options']=="set"){
		define('JSB', ADMIN . '/js-base');
		$final=U_DIR. '/swift_custom/swift-js-functions.js';//This is where our javascript file will be saved
		$fp=fopen($final,'w');
		
		//Includes the CSS that controls the layout.
		switch ($swift_opt['swift_slider_style']) {
    	case "Lite":
        		$base=JSB . '/slider-lite'; break;
    	case "Large Image":
        		$base=JSB . '/nivo-slider.js'; break;
		default:
				$base=JSB . '/nivo-slider.js';
		}
		$filehandle=fopen($base,'r');	//Reads the necessary file into fh.
		$data.= fread($filehandle, filesize($base)); //Writes the data in fh to data.
		
		$base=JSB . '/js-functions.js';
		$filehandle=fopen($base,'r');	//Reads the necessary file into fh.
		$data.= fread($filehandle, filesize($base)); //Writes the data in fh to data.
			
fwrite($fp,$data);
			
}}
?>