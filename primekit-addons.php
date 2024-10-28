<?php
/*
Plugin Name: PrimeKit Addons and Templates
Plugin URI: https://primekitaddons.com/
Description: The Elementor Custom Widgets plugin is built to enhance your website’s look and performance.
Version: 1.0.0
Author: supreoxltd
Author URI: https://supreox.com/
License: GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: primekit-addons
Domain Path: /languages
Elementor tested up to: 3.24.7
Elementor Pro tested up to: 3.24.7
Requires Plugins: elementor
*/

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Define Plugin Version.
define('PRIMEKIT_VERSION', '1.0.0');

// Define Plugin Path.
define('PRIMEKIT_PATH', plugin_dir_path(__FILE__));

// Define Plugin URL.
define('PRIMEKIT_URL', plugin_dir_url(__FILE__));

//Define Plugin Name.
define('PRIMEKIT_NAME', esc_html__('PrimeKit Addons and Templates for Elementor', 'primekit-addons'));


// Include the autoloader.
if ( file_exists( PRIMEKIT_PATH . 'vendor/autoload.php' ) ) {
	require_once PRIMEKIT_PATH . 'vendor/autoload.php';
}

/**
 * Initializes the PrimeKit Addons plugin by registering all classes and services.
 */
function primekit_initialize() {

	if ( class_exists( 'PrimeKit\Manager' ) ) {
		new \PrimeKit\Manager();
	}
}

add_action( 'plugins_loaded', 'primekit_initialize' );