<?php

use ExtendSite\Admin\Options\Modules\ContactOptions;
use ExtendSite\Admin\Options\Modules\FooterOptions;
use ExtendSite\Admin\Options\Modules\GeneralOptions;

$opt_number_columns = caspert_get_footer_sidebar_columns_count();
$logo_footer = caspert_opt(GeneralOptions::class)::get_logo_footer_id() ?? '';
$hotline = caspert_opt(ContactOptions::class)::get_hotline() ?? '1800 6644';

// check sidebar active
$has_footer_sidebar = false;
for ( $i = 1; $i <= 4; $i++ ) {
    if ( is_active_sidebar( PREFIX_SIDEBAR_FOOTER_COLUMN . $i ) ) {
        $has_footer_sidebar = true;
        break;
    }
}
?>
<footer class="footer">
    <?php if ( $has_footer_sidebar ) : ?>
        <div class="footer__listWrap">
            <div class="container">
                <div class="footer__list">
                    <div class="row">
                        <?php
                        for ( $i = 0; $i < $opt_number_columns; $i++ ) :
                            $j = $i + 1;
                            $cols = caspert_opt(FooterOptions::class)::get_footer_sidebar_settings($j) ?? [];

                            if ( empty( $cols ) ) {
                                $cols = [
                                    'sm' => 12,
                                    'md' => 6,
                                    'lg' => 3,
                                    'xl' => 3
                                ];
                            }

                            $classes = sprintf(
                                'col-12 col-sm-%s col-md-%s col-lg-%s col-xl-%s',
                                $cols['sm'],
                                $cols['md'],
                                $cols['lg'],
                                $cols['xl']
                            );

                            if ( is_active_sidebar( PREFIX_SIDEBAR_FOOTER_COLUMN . $j ) ):
                            ?>
                                <div class="<?php echo esc_attr( $classes ); ?>">
                                    <?php dynamic_sidebar( PREFIX_SIDEBAR_FOOTER_COLUMN . $j ); ?>
                                </div>
                            <?php
                            endif;
                        endfor;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="footer__socialWrap">
        <div class="container">
            <div class="footer__social">
                <?php caspert_get_social_url(); ?>
            </div>
        </div>
    </div>

    <div class="footer__foot">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-xl-5 order-md-2">
                    <div class="footer__info">
                        <?php
                        if ( has_nav_menu( 'footer-menu' ) ) :
                            wp_nav_menu( array(
                                'theme_location' => 'footer-menu',
                                'container' => false,
                            ) );
                        else:
                            ?>
                            <ul>
                                <li>
                                    <a href="<?php echo get_admin_url() . '/nav-menus.php'; ?>">
                                        <?php esc_html_e( 'Thêm Menu', 'basictheme' ); ?>
                                    </a>
                                </li>
                            </ul>
                        <?php endif; ?>

                        <?php if ( !empty( $logo_footer ) ) : ?>
                        <div class="f-logo">
                            <?php echo wp_get_attachment_image( $logo_footer, 'medium' ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6 col-xl-7 order-md-1">
                    <div class="footer__text">
                        <?php
                        if ( is_active_sidebar( PREFIX_SIDEBAR_FOOTER_COPYRIGHT ) ) :
                            dynamic_sidebar( PREFIX_SIDEBAR_FOOTER_COPYRIGHT );
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<a href="tel:<?php echo esc_attr( caspert_preg_replace_ony_number($hotline) ); ?>" class="phoneFixed-icon">
    <span><i class="ex-phone"></i></span>
    <p><?php echo esc_html( $hotline ); ?></p>
</a>