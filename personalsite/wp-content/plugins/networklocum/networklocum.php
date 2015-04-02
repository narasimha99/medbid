<?php
/*
Plugin Name: Network Locum Connect
Plugin URI: http://wordpress.org/extend/plugins/wp-mvc/
Description: An example application that uses the WP MVC plugin.
Author: Tom Benner
Version: 1.0
Author URI: 
*/
register_activation_hook(__FILE__, 'networklocum_activate');
register_deactivation_hook(__FILE__, 'networklocum_deactivate');

function networklocum_activate() {
	require_once dirname(__FILE__).'/networklocum_loader.php';
	$loader = new networklocumLoader();
	$loader->activate();
}

function networklocum_deactivate() {
	require_once dirname(__FILE__).'/networklocum_loader.php';
	$loader = new networklocumLoader();
	$loader->deactivate();  
}

?>
