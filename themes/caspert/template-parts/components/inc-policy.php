<section class="section sec-chinhsachHead">
    <div class="container">
        <div class="f-inner">
            <?php
            if ( has_nav_menu( 'secondary' ) ) :
                wp_nav_menu( array(
                    'theme_location' => 'secondary',
                    'container' => false,
                ) );
            endif;
            ?>
        </div>
    </div>
</section>