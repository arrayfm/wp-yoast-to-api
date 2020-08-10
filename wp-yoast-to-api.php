<?php 

/*
  Plugin Name: ARY; WP Yoast to Rest API
  Description: Utility to add Yoast fields into the Rest API
  Version: 0.0.1
  Author: Array
  Author URI: https://array.design
  Text Domain: wp-yoast-to-api
*/

if(!defined('ABSPATH')){
  exit;
}

define('ARY_AFS_VERSION', '0.0.1');

$autoload_file = __DIR__ . '/vendor/autoload.php';
if(is_readable($autoload_file)){
  require_once $autoload_file;
}

function aryWpYoastToApi() {
	global $aryWpYoastToApi;
	
	if(!isset($aryWpYoastToApi)){
		$aryWpYoastToApi = new AryWPYoastToAPI\AryWPYoastToAPI();
  }
  
	return $aryWpYoastToApi;
}

aryWpYoastToApi();