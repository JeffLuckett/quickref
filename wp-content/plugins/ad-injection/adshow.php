<?php
/*
Part of the Ad Injection plugin for WordPress
http://www.reviewmylife.co.uk/
*/

$adinj_dir = dirname(__FILE__);
if (file_exists($adinj_dir.'/ad-injection-config.php')){
	include_once($adinj_dir.'/ad-injection-config.php');
} else if (file_exists($adinj_dir.'/../../ad-injection-config.php')) {
	include_once($adinj_dir.'/../../ad-injection-config.php');
} else {
	echo '<!--ADINJ DEBUG: ad-injection-config.php could not be found. Re-save your settings to re-generate it.-->';
}

//////////////////////////////////////////////////////////////////////////////

if (!function_exists('adshow_functions_exist')){
// Used to downgrade fatal errors to printed errors to make debugging easier
// and so that a problem doesn't disable the whole website. 
function adshow_functions_exist(){
	if (!adshow_functions_exist_impl('adinj_config_add_tags_rnd')){ return false; }
	if (!adshow_functions_exist_impl('adinj_config_add_tags_top')){ return false; }
	if (!adshow_functions_exist_impl('adinj_config_add_tags_bottom')){ return false; }
	if (!adshow_functions_exist_impl('adinj_config_sevisitors_only')){ return false; }
	if (!adshow_functions_exist_impl('adinj_config_search_engine_referrers')){ return false; }
	if (!adshow_functions_exist_impl('adinj_config_blocked_ips')){ return false; }
	if (!adshow_functions_exist_impl('adinj_config_debug_mode')){ return false; }
	return true;
}
function adshow_functions_exist_impl($function){
	if (!function_exists($function)){
		echo "<!--ADINJ DEBUG:".__FILE__." Error: $function does not exist. Might be because config file is missing. Re-save settings to fix. -->";
		return false;
	}
	return true;
}
}

if (!function_exists('adshow_display_ad_file')){
function adshow_display_ad_file($adfile){
	if (!adshow_functions_exist()){ return false; }

	if (adinj_config_debug_mode()){
		echo "<!--ADINJ DEBUG: adshow_display_ad_file($adfile)-->";
	}
	$plugin_dir = dirname(__FILE__);
	$ad_path1 = $plugin_dir.'/ads/'.$adfile;
	if (file_exists($ad_path1)){
		adshow_display_ad_full_path($ad_path1);
		return;
	}
	
	$ad_path2 = dirname($plugin_dir).'/ad-injection-data/'.$adfile;
	if (file_exists($ad_path2)){
		adshow_display_ad_full_path($ad_path2);
		return;
	}
	echo "
<!--ADINJ DEBUG: could not read ad from either:
	$ad_path1
	$ad_path2
If you have just upgraded you may need to re-save your ads to regenerate the ad files.
-->";
}
}

if (!function_exists('adshow_display_ad_full_path')){
function adshow_display_ad_full_path($ad_path){
	if (!adshow_functions_exist()){ return false; }

	$showads = adshow_show_adverts();
	if ($showads !== true){
		if (adinj_config_debug_mode()){
			echo "<!--ADINJ DEBUG: ad blocked at run time reason=$showads-->";
		}
		return;
	}
	if (file_exists($ad_path)){
		$ad = file_get_contents($ad_path);
		if ($ad === false) echo "\n<!--ADINJ DEBUG: could not read ad from file: $ad_path-->";
		if (stripos($ad_path, 'random_1.txt') > 0){ // TODO something better than this
			echo adinj_config_add_tags_rnd(adshow_eval_php($ad));
		} else if (stripos($ad_path, 'top_1.txt') > 0){
			echo adinj_config_add_tags_top(adshow_eval_php($ad));
		} else if (stripos($ad_path, 'bottom_1.txt') > 0){
			echo adinj_config_add_tags_bottom(adshow_eval_php($ad));
		} else {
			echo adshow_eval_php($ad);
		}
	} else {
		echo "\n<!--ADINJ DEBUG: ad file does not exist: $ad_path.\nIf you have just upgraded you may need to re-save your ads to regenerate the ad files.\n-->";
	}
}
}

//////////////////////////////////////////////////////////////////////////////

if (!function_exists('adshow_fromasearchengine')){
function adshow_fromasearchengine(){
	if (!adshow_functions_exist()){ return false; }

	$referrer = $_SERVER['HTTP_REFERER'];
	$searchengines = adinj_config_search_engine_referrers();
	foreach ($searchengines as $se) {
		if (stripos($referrer, $se) !== false) {
			return true;
		}
	}
	// Also return true if the visitor has recently come from a search engine
	// and has the adinj cookie set.
	return ($_COOKIE["adinj"]==1);
}
}

if (!function_exists('adshow_blocked_ip')){
function adshow_blocked_ip(){
	if (!adshow_functions_exist()){ return false; }

	$visitorIP = $_SERVER['REMOTE_ADDR'];
	return in_array($visitorIP, adinj_config_blocked_ips());
}
}

if (!function_exists('adshow_show_adverts')){
function adshow_show_adverts(){
	if (!adshow_functions_exist()){ return false; }

	if (adshow_blocked_ip()) return "blockedip";
	if (adinj_config_sevisitors_only()){
		if (!adshow_fromasearchengine()) return "referrer";
	}
	return true;
}
}

// From: Exec-PHP plugin
if (!function_exists('adshow_eval_php')){
function adshow_eval_php($code)	{
	ob_start();
	eval("?>$code<?php ");
	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}
}

//////////////////////////////////////////////////////////////////////////////

?>