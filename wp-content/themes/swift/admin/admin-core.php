<?php
add_action('admin_menu', 'swift_headers1');
add_action('admin_head', 'swift_headers2');

function swift_headers1(){
	if ( $_GET['page'] == "swift-options"||$_GET['page'] == "swift-design-options"||$_GET['page'] == "swift-import-export" ):
		wp_enqueue_script('jquery' ); 
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('jquery-ui-sortable');
	endif;
}

function swift_headers2(){ 
	if ( $_GET['page'] == "swift-options"||$_GET['page'] == "swift-design-options" ||$_GET['page'] == "swift-import-export"):
?>
		<script type="text/javascript">
        	jQuery(function() {
				jQuery(".tabmenu").removeClass("hidden");
				jQuery(".tabs h2").addClass("hidden");
				jQuery(".tabs").tabs();
            });
        </script> 
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url')?>/admin/admin-styles.css" media="screen" />	
<?php 
	endif;
	if ($_GET['page'] == "swift-design-options" ):
?>
		<script language="javascript" type="text/javascript" src="<?php bloginfo('template_url')?>/admin/jscolor/jscolor.js"></script> 
<?php 
	endif; 
	}//end of fucntion 
?>
<?php
//Adding adminstrative menus
add_action('admin_menu', 'swift_themes_menu');
function swift_themes_menu() {
	$favicon=get_bloginfo('template_url').'/images/favicon.ico';
	add_menu_page('Swift Theme Options', 'Swift Options', '10', 'swift-options', 'swiftOptions',$favicon,62);
	add_submenu_page( 'swift-options', 'Design Options', 'Design Options', '10', 'swift-design-options', 'swiftDesignOptions');
	add_submenu_page( 'swift-options', 'Import and Export SWIFT options','Import / Export', '10', 'swift-import-export', 'swiftImportExportMenu');
	

}
	
function swiftOptions() {
	include(ADMIN.'/swift-options.php');
}
function swiftDesignOptions() {
	include(ADMIN.'/swift-design-options.php');
}
function swiftImportExportMenu(){
	include (ADMIN.'/import-export.php');
}

// Things to do when the theme is first activated
add_action('admin_head', 'first_run_options');
function first_run_options() {
	if ( get_option('swift_activation_check')!="set" ) {
		//DO INITIALISATION STUFF
		//if (!is_dir(U_DIR)) $make = @mkdir(U_DIR,0777);
		
		$filename = U_DIR.'/swift_default.jpg';
		if (!file_exists($filename)):
		$file = TEMPLATEPATH.'/images/default.jpg';
			copy($file, $filename);
		endif;
		
		//Creates the timthumb cache folder
		$swift_custom=U_DIR.'/swift_custom';
		$cache= $swift_custom.'/cache';
		if (!is_dir($swift_custom))
			$make = @mkdir($swift_custom,0777);
		if (!is_dir($cache)) 
			$make = @mkdir($cache,0777);
	
		//Copy the timthumb.php script
		$final=U_DIR. '/swift_custom/timthumb.php';//timthumb.php will be copied to uploads/swift-custom
		$fp=fopen($final,'w');
		$base=TEMPLATEPATH.'/includes/timthumb.php';
		$fh0=fopen($base,'r');	
		$data.= fread($fh0, filesize($base));
		fwrite($fp,$data);
			
		//Copy the custom-style.css
		$final_style=U_DIR. '/swift_custom/custom-style.css';
		$fp1=fopen($final_style,'w');
		$base_style=TEMPLATEPATH.'/includes/custom-style.css';
		$fh1=fopen($base_style,'r');	
		$data2.= fread($fh1, filesize($base_style));
		fwrite($fp1,$data2);
		
		// Add marker so it doesn't run in future
		update_option('swift_activation_check', "set");

  
		if(!get_option('swift_opt')&&!get_option('swift_random')){
			global $swift_design_options;
			global $swift_options;	
			foreach ($swift_options as $value) 
					$options[$value['id']]=$value['std'];
			update_option('swift_opt',$options);
			foreach($swift_design_options as $value)
					$options[$value['id']]=$value['std'];
			update_option('swift_design_opt',$options);
			create_style_sheet('true');
		}
		
		if(!get_option('swift_design_opt')){
			global $swift_design_options;
			global $swift_options;	
			foreach ($swift_options as $value)
				$options[$value['id']]=get_option($value['id']);
			update_option('swift_opt',$options); 
	
			foreach ($swift_design_options as $value)
				$options[$value['id']]=get_option($value['id']);
			update_option('swift_design_opt',$options);	 
			create_style_sheet('true');
		}
	}
}//end of function

add_action('switch_theme', 'delete_stuff');

function delete_stuff() {
  	delete_option('swift_activation_check');
} 

/* update_option action hooks*/
add_action('update_option_swift_random', 'swift_options_array');
add_action('update_option_swift_random', 'swift_design_options_array');
add_action('update_option_swift_random', 'resetSwiftOptions');
add_action('update_option_swift_random', 'swiftImportExport');
 
function swift_options_array(){
	if(isset($_POST['swift_options'])&&!isset($_POST['general-reset'])):
		global $swift_options;
		$option = array();
		foreach ($swift_options as $value)
			$option[$value['id']]=$_POST[$value['id']];		
		update_option('swift_opt',$option);
	endif;
}


function swift_design_options_array(){
	if(isset($_POST['swift_design_options'])&&!isset($_POST['design-reset'])):
		global $swift_design_options;
		$design_options = array();
		foreach ($swift_design_options as $value)
			$design_options[$value['id']]=$_POST[$value['id']];
		update_option('swift_design_opt',$design_options);
	endif;
}	

//Reset function
function resetSwiftOptions(){
	if( 'Reset' == $_POST['general-reset'] || 'Reset' == $_POST['design-reset'] ) {
		global $swift_design_options;
		global $swift_options;
		if('Reset' == $_POST['general-reset']):
			foreach($swift_options as $value)
			$options[$value['id']]=$value['std'];
			update_option('swift_opt',$options);
		endif;
			
		if('Reset' == $_POST['design-reset']):
			foreach($swift_design_options as $value)
				$options[$value['id']]=$value['std'];
			update_option('swift_design_opt',$options);		
		endif;
		}
}

//SWIFT import and export options
function swiftImportExport(){
	if(isset($_POST['swift_importExport'])):
	
		global $swift_options;
		$data=stripslashes($_POST['swift_opt']);
		$data=unserialize($data);  
		foreach ($swift_options as $value)
			$option[$value['id']]=$data[$value['id']];
		update_option('swift_opt',$option);
		
		global $swift_design_options;	
		$data=stripslashes($_POST['swift_design_opt']);
		$data=unserialize($data);	
		foreach ($swift_design_options as $value)
			$design_options[$value['id']]=$temp[$value['id']];
		update_option('swift_design_opt',$design_options);
		
	endif;
}

add_action('update_option_swift_design_opt', 'create_style_sheet');
add_action('update_option_swift_opt', 'create_js_file');
?>
