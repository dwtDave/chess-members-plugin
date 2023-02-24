<?php

/*
Plugin Name: Chess Members
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: A brief description of the Plugin.
Version: 1.0
Author: david
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

if ( ! defined( 'ABSPATH' ) ) exit;


if ( file_exists( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' ) ) {
	require_once( plugin_dir_path( __FILE__ ) . 'vendor/autoload.php' );
}

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();




if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::register_services();
}

function activate_chess_members_plugin() {
	// check if activation class exists
	if ( class_exists( 'Inc\\Base\\Activation' ) ) {
		Inc\Base\Activation::activate();
	}
}

register_activation_hook( plugin_basename( __FILE__ ), 'activate_chess_members_plugin' );


