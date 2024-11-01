<?php
namespace PrimeKit\Admin\Inc\ThemeBuilder\Admin;

if (!defined('ABSPATH'))
    exit;

class Menus
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'modify_theme_builder_menu'), 11);
    }


    public function modify_theme_builder_menu()
    {
        global $submenu;


        remove_menu_page('edit.php?post_type=primekit_library');

        add_submenu_page(
            'primekit_settings',
            __('Theme Builder', 'primekit-addons'),
            __('Theme Builder', 'primekit-addons'),
            'manage_options',
            'edit.php?post_type=primekit_library'
        );


        if (isset($submenu['primekit_home'])) {
            foreach ($submenu['primekit_home'] as $key => $menu_item) {
                if ($menu_item[2] === 'edit.php?post_type=primekit_library') {
                    $current_file = basename($_SERVER['PHP_SELF']);
                    if ($current_file === 'post-new.php' && isset($_GET['post_type']) === 'primekit_library') {
                        // Highlight the new submenu as active when adding a new post
                        $submenu['primekit_home'][$key][4] = 'current';
                    } elseif ($current_file === 'edit.php' && isset($_GET['post_type']) && $_GET['post_type'] === 'primekit_library') {
                        // Highlight the new submenu as active when on the edit posts screen
                        $submenu['primekit_home'][$key][4] = 'current';
                    }
                }
            }
        }
    }
}