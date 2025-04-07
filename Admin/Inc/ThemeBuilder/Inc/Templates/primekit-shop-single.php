<?php
/*
 * WooCommerce Single Product Template
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

\Elementor\Plugin::$instance->frontend->add_body_class( 'elementor-template-full-width' );

get_header();

/**
 * Before Elementor Header-Footer content.
 */
do_action( 'elementor/page_templates/header-footer/before_content' );

echo '<main class="primekit-single-product">';

if ( ! \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
    do_action( 'primekit_shop_single_content' );
} else {
    echo '<div class="primekit-container">';
    wc_get_template_part( 'content', 'single-product' );
    echo '</div>';
}

echo '</main>';

/**
 * After Elementor Header-Footer content.
 */
do_action( 'elementor/page_templates/header-footer/after_content' );

get_footer();
