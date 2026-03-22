<?php

use ExtendSite\Admin\Options\Modules\ContactOptions;

$cf7_form_id = caspert_opt(ContactOptions::class)::get_cf7_form_id();

?>
<section class="section sec-homeLienHe">
    <div class="container">
        <div class="row align-items-xl-center">
            <div class="col-md-5 col-xl-5">
                <div class="item-title wow fadeInUp">
                    <h2 class="titlebox__title">
                        <?php esc_html_e('Liên hệ với chúng tôi', 'caspert'); ?>
                    </h2>

                    <p class="titlebox__text">
                        <?php esc_html_e('Nếu bạn có bất kỳ câu hỏi nào, hãy gửi email cho chúng tôi', 'caspert'); ?>
                    </p>
                </div>
            </div>

            <div class="col-md-7 col-xl-6 offset-xl-1">
                <div class="item-content">
                    <div class="contact-form">
                        <?php
                        if ( !empty( $cf7_form_id ) ) {
                            echo do_shortcode('[contact-form-7 id="' . (int) $cf7_form_id . '"]');
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>