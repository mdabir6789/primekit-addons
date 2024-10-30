<?php 
/**
 * Assets.php
 *
 * This file contains the Assets class, which handles the initialization and configuration of the PrimeKit Elementor Assets.
 * It ensures the proper loading of required assets such as CSS and JavaScript files for the PrimeKit Elementor plugin.
 *
 * @package PrimeKit\Public\Elementor\Assets
 * @since 1.0.0
 */
namespace PrimeKit\Public\Elementor\Assets;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Handles the initialization and configuration of the PrimeKit Elementor Assets.
 * This class ensures the proper loading of required assets such as CSS and JavaScript files.
 *
 * @package PrimeKit\Public\Elementor\Assets
 * @since 1.0.0
 */
class Assets{   

   
    /**
     * Constructor for the Assets class.
     *
     * Initializes the assets for the PrimeKit Elementor plugin by
     * calling the init() method.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->init();
    }
   
    /**
     * Initializes the assets for the PrimeKit Elementor plugin.
     *
     * This method hooks into the WordPress 'wp_enqueue_scripts' action
     * to enqueue necessary scripts and styles for the plugin.
     *
     * @return void
     */
    public function init()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
    }    


    
    /**
     * Registers JavaScript files for the PrimeKit Elementor plugin.
     *
     * This function registers various JavaScript files required
     *
     * @since 1.0.0
     */
    public function enqueue_scripts()
    {
         //script
         wp_register_script('primekit-anim-text-main', PRIMEKIT_ELEMENTOR_ASSETS . "/js/anim-text-script.js", array('jquery'), PRIMEKIT_VERSION, true);
         wp_register_script('primekit-back-to-top', PRIMEKIT_ELEMENTOR_ASSETS . "/js/back-to-top.js", array('jquery'), PRIMEKIT_VERSION, true);
         wp_register_script('jquery-event-move', PRIMEKIT_ELEMENTOR_ASSETS . "/js/jquery.event.move.js", array('jquery'), PRIMEKIT_VERSION, true);
         wp_register_script('jquery-twentytwenty', PRIMEKIT_ELEMENTOR_ASSETS . "/js/jquery.twentytwenty.js", array('jquery'), PRIMEKIT_VERSION, true);
    }

   
    /**
     * Enqueues and registers CSS styles for the PrimeKit Elementor plugin.
     *
     * This function enqueues the main stylesheet and the responsive stylesheet
     * for the PrimeKit Elementor plugin. Additionally, it registers the 
     * animation text style and the twentytwenty styles if not already registered.
     *
     * @since 1.0.0
     */
    public function enqueue_styles()
    {
        wp_enqueue_style('primekit-elementor-style', PRIMEKIT_ELEMENTOR_ASSETS . "/css/style.css", array(), PRIMEKIT_VERSION);
        wp_enqueue_style('primekit-elementor-responsive', PRIMEKIT_ELEMENTOR_ASSETS . "/css/responsive.css", array(), PRIMEKIT_VERSION);
        wp_register_style('primekit-anim-text-style', PRIMEKIT_ELEMENTOR_ASSETS . "/css/anim-text-style.css", array(), PRIMEKIT_VERSION);
        if (!wp_style_is('twentytwenty')) {
            wp_register_style('twentytwenty', PRIMEKIT_ELEMENTOR_ASSETS . "/css/twentytwenty.css", array(), PRIMEKIT_VERSION);
        }

    }

}