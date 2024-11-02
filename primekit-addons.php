<?php
/**
 * Plugin Name: PrimeKit Addons and Templates
 * Plugin URI: https://primekitaddons.com/
 * Description: The Elementor Custom Widgets plugin is built to enhance your website’s look and performance.
 * Version: 1.0.0
 * Author: supreoxltd
 * Author URI: https://supreox.com/
 * License: GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: primekit-addons
 * Domain Path: /languages
 * namespace: PrimeKit
 * Elementor tested up to: 3.25.1
 * Elementor Pro tested up to: 3.25.1
 * Requires Plugins: elementor
 */


// Exit if accessed directly.
if (!defined('ABSPATH')) {
	exit;
}

// Define Plugin Version.
define('PRIMEKIT_VERSION', '1.0.0');

// Define Plugin Path.
define('PRIMEKIT_PATH', plugin_dir_path(__FILE__));

// Define Plugin URL.
define('PRIMEKIT_URL', plugin_dir_url(__FILE__));

//Define Plugin Name.
define('PRIMEKIT_NAME', esc_html__('PrimeKit Addons and Templates', 'primekit-addons'));


// Include the autoloader.
if (file_exists(PRIMEKIT_PATH . 'vendor/autoload.php')) {
	require_once PRIMEKIT_PATH . 'vendor/autoload.php';
}

/**
 * Initializes the PrimeKit Addons plugin by registering all classes and services.
 */

if (!function_exists('primekit_initialize')) {
	function primekit_initialize()
	{

		if (class_exists('PrimeKit\Manager')) {
			new \PrimeKit\Manager();
		}
	}

	add_action('plugins_loaded', 'primekit_initialize');

}

//Menu walker functions
class primekit_custom_walker extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        parent::start_el($output, $item, $depth, $args, $id);
        if ($depth === 0 && in_array('menu-item-has-children', $item->classes)) {
            $svg_icon = '<svg id="fi_2985150" enable-background="new 0 0 128 128" height="512" viewBox="0 0 128 128" width="512" xmlns="http://www.w3.org/2000/svg"><path id="Down_Arrow_3_" d="m64 88c-1.023 0-2.047-.391-2.828-1.172l-40-40c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l37.172 37.172 37.172-37.172c1.563-1.563 4.094-1.563 5.656 0s1.563 4.094 0 5.656l-40 40c-.781.781-1.805 1.172-2.828 1.172z"></path></svg>';
            $output .= '<span class="primekit-submenu-icon">' . $svg_icon . '</span>';
        }

        if ($depth > 0 && in_array('menu-item-has-children', $item->classes)) {
            $svg_icon = '<svg id="fi_2985179" enable-background="new 0 0 128 128" height="512" viewBox="0 0 128 128" width="512" xmlns="http://www.w3.org/2000/svg"><path id="Right_Arrow_4_" d="m44 108c-1.023 0-2.047-.391-2.828-1.172-1.563-1.563-1.563-4.094 0-5.656l37.172-37.172-37.172-37.172c-1.563-1.563-1.563-4.094 0-5.656s4.094-1.563 5.656 0l40 40c1.563 1.563 1.563 4.094 0 5.656l-40 40c-.781.781-1.805 1.172-2.828 1.172z"></path></svg>';
            $output .= '<span class="primekit-submenu-icon">' . $svg_icon . '</span>';
        }
    }
}