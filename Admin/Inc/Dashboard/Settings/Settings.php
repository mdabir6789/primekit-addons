<?php
namespace PrimeKit\Admin\Inc\Dashboard\Settings;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


use PrimeKit\Admin\Inc\Dashboard\Settings\SettingsTabs\General;
use PrimeKit\Admin\Inc\Dashboard\Settings\SettingsTabs\Mailchimp;
use PrimeKit\Admin\Inc\Dashboard\Settings\SettingsTabs\CostEstimation;

class Settings
{
    protected $general;
    protected $mailchimp;
    protected $cost_estimation;

    public function __construct()
    {
        add_action('admin_menu', [$this, 'register_submenu_page'], 99);

        $this->classes_initalize();
    }

    public function register_submenu_page()
    {
        add_submenu_page(
            'primekit_home',
            esc_html__('PrimeKit Addons Settings', 'primekit-addons'),
            esc_html__('Settings', 'primekit-addons'),
            'manage_options',
            'primekit_settings',
            [$this, 'render_settings_page'],
        );
    }

    public function render_settings_page()
    {

        // Display tab navigation
        ?>
        <div class="wrap">
            <?php settings_errors(); ?>
            <h1><?php echo esc_html__('PrimeKit Addons Settings', 'primekit-addons'); ?></h1>
            <nav class="nav-tab-wrapper">
                <a href="?page=primekit_settings&tab=general"
                    class="nav-tab <?php echo $this->get_active_tab() === 'general' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('General', 'primekit-addons'); ?></a>
                <a href="?page=primekit_settings&tab=mailchimp"
                    class="nav-tab <?php echo $this->get_active_tab() === 'mailchimp' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Mailchimp', 'primekit-addons'); ?></a>
                <a href="?page=primekit_settings&tab=cost_estimation"
                    class="nav-tab <?php echo $this->get_active_tab() === 'cost_estimation' ? 'nav-tab-active' : ''; ?>"><?php echo esc_html__('Cost Estimation', 'primekit-addons'); ?></a>
            </nav>
            <div class="tab-content">
                <form method="post" action="options.php">
                    <?php
                    $active_tab = $this->get_active_tab();

                    if ($active_tab == 'general') {
                        settings_fields('primekit_general_options');
                        do_settings_sections('primekit_general_settings');
                    } elseif ($active_tab == 'mailchimp') {
                        settings_fields('primekit_mailchimp_options');
                        do_settings_sections('primekit_mailchimp_settings');
                    } elseif ($active_tab == 'cost_estimation') {
                        settings_fields('primekit_cost_estimation_options');
                        do_settings_sections('primekit_cost_estimation_settings');
                    }

                    wp_nonce_field('primekit_save_settings', 'primekit_nonce');
                    submit_button();
                    ?>
                </form>
            </div>
        </div>
        <?php
    }

    private function get_active_tab()
    {
        return isset($_GET['tab']) ? sanitize_text_field($_GET['tab']) : 'general';
    }

    public function classes_initalize()
    {
        $this->general = new General();
        $this->mailchimp = new Mailchimp();
        $this->cost_estimation = new CostEstimation();
    }
}