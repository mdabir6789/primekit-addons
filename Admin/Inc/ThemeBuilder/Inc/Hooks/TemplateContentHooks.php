<?php
/**
 * TemplateContentHooks.php
 *
 * This file contains the TemplateContentHooks class, which is responsible for handling
 * the display of Elementor templates in the page templates.
 *
 * @package PrimeKit\Admin\Inc\ThemeBuilder\Inc\Hooks
 * @since 1.0.0
 */

namespace PrimeKit\Admin\Inc\ThemeBuilder\Inc\Hooks;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

use PrimeKit\Admin\Inc\ThemeBuilder\ThemeBuilder;

/**
 * Class TemplateContentHooks
 * 
 * Handles the display of Elementor templates in the page templates.
 * 
 * @package PrimeKit\Admin\Inc\ThemeBuilder\Inc\Hooks
 * @since 1.0.0
 */
class TemplateContentHooks
{

    /**
     * Initializes the class and registers the hooks.
     *
     * @since 1.0.0
     */
    public function __construct()
    {
        $this->register_hooks();
    }


    /**
     * Registers the hooks for displaying the content of Elementor templates
     * in the page templates.
     *
     * @since 1.0.0
     */
    public function register_hooks()
    {
        add_action('primekit_single_post_content', array($this, 'single_post_content_elementor'), 999);
        add_action('primekit_single_page_content', array($this, 'single_page_content_elementor'), 999);
        add_action('primekit_404_page_content', array($this, 'single_404_page_content_elementor'), 999);
        add_action('primekit_search_page_content', array($this, 'search_page_content_elementor'), 999);
        add_action('primekit_archive_page_content', array($this, 'archive_page_content_elementor'), 999);
        add_action('primekit_shop_single_content', array($this, 'shop_single_content_elementor'), 999);
        add_action('primekit_shop_archive_content', array($this, 'shop_archive_content_elementor'), 999);
    }

    /**
     * Single post content hook for Elementor template.
     * 
     * If an Elementor template exists for the 'single_post' type, it will be rendered.
     * Otherwise, the post content will be rendered using the_content().
     * 
     * @param WP_Post $post The post object.
     */
    public function single_post_content_elementor($post)
    {
        $template_id = ThemeBuilder::get_template_id('single_post');
        if (!empty($template_id)) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- \Elementor\Plugin::instance()->frontend->get_builder_content_for_display() Already escaped by elementor
        } else {
            the_content();
        }
    }

    /**
     * Single page content hook for Elementor template.
     * 
     * If an Elementor template exists for the 'single_page' type, it will be rendered.
     * Otherwise, the page content will be rendered using the_content().
     * 
     * @param WP_Post $page The page object.
     * 
     * @since 1.0.0
     */
    public function single_page_content_elementor($page)
    {
        $template_id = ThemeBuilder::get_template_id('single_page');
        if (!empty($template_id)) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- \Elementor\Plugin::instance()->frontend->get_builder_content_for_display() Already escaped by elementor
        } else {
            the_content();
        }
    }
    /**
     * Hook for rendering the 404 page content for Elementor template.
     * 
     * If an Elementor template exists for the '404_page' type, it will be rendered.
     * Otherwise, a fallback content will be rendered including the search title, search form, and a list of search results.
     * 
     * @param WP_Query $error The error query object.
     */
    public function single_404_page_content_elementor($error)
    {
        $template_id = ThemeBuilder::get_template_id('404_page');
        if (!empty($template_id)) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- \Elementor\Plugin::instance()->frontend->get_builder_content_for_display() Already escaped by elementor
        } else {
            '<h1 class="error-code">404</h1>';
            '<h1 class="error-title>' . esc_html__('Page Not Found', 'primekit-addons') . '</h1>';
            get_search_form();
        }
    }
    /**
     * Hook for rendering the search page content for Elementor template.
     * 
     * If an Elementor template exists for the 'search_page' type, it will be rendered.
     * Otherwise, a fallback content will be rendered including the search title, search form, and a list of search results.
     * 
     * @param WP_Query $search The search query object.
     */
    public function search_page_content_elementor($search)
    {
        $template_id = ThemeBuilder::get_template_id('search_page');
        if (!empty($template_id)) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- \Elementor\Plugin::instance()->frontend->get_builder_content_for_display() Already escaped by elementor
        } else {
            '<h2 class="search-title">' . esc_html__('Search Results', 'primekit-addons') . '</h2>';
            get_search_form();

            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo '<a href="' . esc_url(get_the_permalink()) . '">' . esc_html(get_the_title()) . '</a>';
                }
            }
        }
    }

    /**
     * Renders the content for archive page using Elementor template if available.
     * 
     * @param array $archive Archive data.
     * 
     * @since 1.0.0
     */
    public function archive_page_content_elementor($archive)
    {
        $template_id = ThemeBuilder::get_template_id('archive_page');

        // Check if a template exists in Elementor for 'archive_page'
        if (!empty($template_id)) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- \Elementor\Plugin::instance()->frontend->get_builder_content_for_display() Already escaped by elementor
        } else {
            // Fallback if no Elementor template is found
            echo '<h2 class="archive-title">' . esc_html(get_the_archive_title()) . '</h2>';

            // Check if there are posts in the archive
            if (have_posts()) {
                echo '<div class="primekit-archive-post-list">';
                while (have_posts()) {
                    the_post();
                    echo '<div class="primekit-archive-post-item">';
                    echo '<h3><a href="' . esc_url(get_the_permalink()) . '">' . esc_html(get_the_title()) . '</a></h3>';
                    echo '<div class="primekit-archive-post-excerpt">' . wp_kses_post(get_the_excerpt()) . '</div>';
                    echo '</div>';
                }
                echo '</div>';

                // Add pagination
                echo '<div class="primekit-archive-pagination">';
                the_posts_pagination(array(
                    'prev_text' => esc_html__('Previous', 'primekit-addons'),
                    'next_text' => esc_html__('Next', 'primekit-addons'),
                ));
                echo '</div>';
            } else {
                // Message if no posts are found
                echo '<p>' . esc_html__('No posts found in this archive.', 'primekit-addons') . '</p>';
            }
        }
    }

    /**
     * Shop single content hook for Elementor template.
     * 
     * If an Elementor template exists for the 'shop_single' type, it will be rendered.
     * Otherwise, the WooCommerce single product template will be rendered.
     * 
     * @param WC_Product $product The product object.
     * 
     * @since 1.0.6
     */
    public function shop_single_content_elementor($product)
    {
        $template_id = ThemeBuilder::get_template_id('shop_single');
        if (!empty($template_id)) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id);
        } else {
            wc_get_template_part('content', 'single-product');
        }
    }

    /**
     * Shop archive content hook for Elementor template.
     * 
     * If an Elementor template exists for the 'shop_archive' type, it will be rendered.
     * Otherwise, the WooCommerce shop archive template will be rendered.
     * 
     * @param WP_Query $query The query object.
     * 
     * @since 1.0.6
     */
    public function shop_archive_content_elementor($query)
    {
        $template_id = ThemeBuilder::get_template_id('shop_archive');
        if (!empty($template_id)) {
            echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display($template_id);
        } else {
            woocommerce_content();
        }
    }

}