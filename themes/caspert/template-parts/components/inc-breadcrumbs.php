<?php
if ( !function_exists('bcn_display') ) return;
?>

<!--<div class="section sec-breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">-->
<!--    <div class="container">-->
<!--        --><?php //bcn_display(); ?>
<!--    </div>-->
<!--</div>-->

<section class="section sec-breadcrumb">
    <div class="container">
        <ul class="breadcrumbs">
            <li><a href="<?php echo esc_url( get_home_url( '/' ) ); ?>">Trang chủ</a></li>
            <li><?php the_title() ?></li>
        </ul>
    </div>
</section>