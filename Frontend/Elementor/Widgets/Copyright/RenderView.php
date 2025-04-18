<?php
/**
 * Render View file for Copyright
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly
$settings = $this->get_settings_for_display();
$before_text = $settings['primekit_before_text'] ? $settings['primekit_before_text'] : '';
$year_format = $settings['primekit_copyright_year_format'] ? $settings['primekit_copyright_year_format'] : '';
$after_text = $settings['primekit_after_text'] ? $settings['primekit_after_text'] : '';
$tag = $settings['primekit_copyright_tag'] ? $settings['primekit_copyright_tag'] : 'p';
?>

<!-- Copyright Area-->
<div class="primekit-copyright-area">
    <div class="primekit-copyright">
    
        <<?php echo esc_attr($tag); ?> class="primekit-copyright-text"><?php if(!empty($before_text)): echo esc_html($before_text) . ' '; endif; if('yes' == $settings['primekit_copyright_year']) : echo esc_html(date($year_format)) . ' '; endif; if(!empty($after_text)): echo esc_html($after_text); endif; ?></<?php echo esc_attr($tag); ?>>
      
    </div>
</div><!--/ Copyright Area-->