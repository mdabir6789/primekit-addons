<?php

namespace PrimeKit\Admin\Inc\Templates\Markup;

class Modal {
    public function __construct() {        
        add_action('elementor/editor/after_enqueue_scripts', [$this, 'enqueue_modal']);
    }

    public function enqueue_modal() {       
        add_action('wp_footer', [$this, 'render']);
    }

    public function render() {
        ?>
            <div class="modal micromodal-slide primekit-template-modal-area" id="primekit-template-modal" aria-hidden="true">
                <div class="modal__overlay" tabindex="-1">
                    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="primekit-tb-modal-title">

                        <!--Header-->
                        <header class="modal__header primekit-modal-header">
                            <h2 class="modal__title primekit-modal-heading" id="primekit-tb-modal-title">
                                <img src="<?php echo PRIMEKIT_ADMIN_ASSETS . '/img/primekit-icon.svg'; ?>"
                                    alt="">
                                <?php esc_html_e('PrimeKit Templates', 'primekit-addons'); ?>
                            </h2>
                            <button class="modal__close primekit-template-modal-close" aria-label="Close modal" data-micromodal-close>

                            <svg id="fi_2961937" height="512" viewBox="0 0 64 64" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m4.59 59.41a2 2 0 0 0 2.83 0l24.58-24.58 24.59 24.58a2 2 0 0 0 2.83-2.83l-24.59-24.58 24.58-24.59a2 2 0 0 0 -2.83-2.83l-24.58 24.59-24.59-24.58a2 2 0 0 0 -2.82 2.82l24.58 24.59-24.58 24.59a2 2 0 0 0 0 2.82z"></path></svg>
                            
                            </button>
                        </header><!--/ Header-->

                        <!--Body-->
                        <main class="modal__content" id="primekit-tb-modal-content">
                            <div class="primekit-tb-modal-content-area">
                                <h2>test</h2>                          
                       
                            </div>
                        </main><!--/ Body-->
                    </div>
                </div>
            </div>
        <?php
    }
}
