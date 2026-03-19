<?php

use ExtendSite\Admin\Options\Modules\CopyrightOptions;

$show_copyright = caspert_opt(CopyrightOptions::class)::get_show_copyright() ?? true;

if ( $show_copyright ) :
    $copyright = caspert_opt(CopyrightOptions::class)::get_content_copyright() ?? esc_html__('Copyright &copy; DiepLK', 'caspert');
?>
    <div class="footer__bottom text-center">
        <div class="container">
            <div class="copyright">
                <?php echo wpautop( $copyright ); ?>
            </div>
        </div>
    </div>
<?php endif; ?>