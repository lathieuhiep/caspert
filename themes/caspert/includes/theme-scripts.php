<?php
// Remove jquery migrate
function caspert_remove_jquery_migrate($scripts): void
{
    if (!is_admin() && isset($scripts->registered['jquery'])) {
        $script = $scripts->registered['jquery'];
        if ($script->deps) {
            $script->deps = array_diff($script->deps, array('jquery-migrate'));
        }
    }
}

add_action('wp_default_scripts', 'caspert_remove_jquery_migrate');

// Remove WordPress block library CSS from loading on the front-end
function caspert_remove_wp_block_library_css(): void
{
    // remove style gutenberg
    wp_dequeue_style('wp-block-library');
    wp_dequeue_style('wp-block-library-theme');
    wp_dequeue_style('classic-theme-styles');

    wp_dequeue_style('wc-blocks-style');
    wp_dequeue_style('storefront-gutenberg-blocks');
}

add_action('wp_enqueue_scripts', 'caspert_remove_wp_block_library_css', 100);

// custom enqueue jQuery first
function caspert_custom_enqueue_jquery_first(): void
{
    if (!is_admin()) {
        // deregister the default jQuery
        wp_deregister_script('jquery');

        // register and enqueue the jQuery script
        wp_register_script('jquery', includes_url('/js/jquery/jquery.min.js'), array(), null, true);
        wp_enqueue_script('jquery');
    }
}

add_action('wp_enqueue_scripts', 'caspert_custom_enqueue_jquery_first', 1);

// load front-end styles
function caspert_front_end_scripts(): void
{
    //
    wp_enqueue_style('ex-icon', get_theme_file_uri('/assets/fonts/Ex-icon-v1.0/style.css'), array(), caspert_get_version_theme());

    // swiper
    wp_enqueue_style('swiper', get_theme_file_uri('/assets/libs/swiper/swiper.min.css'), array(), '11.0.6');
    wp_enqueue_script('swiper', get_theme_file_uri('/assets/libs/swiper/swiper.min.js'), array(), '11.0.6', true);

    // slimselect
    wp_enqueue_style('slimselect', get_theme_file_uri('/assets/libs/slimselect/slimselect.css'), array(), caspert_get_version_theme());
    wp_enqueue_script('slimselect', get_theme_file_uri('/assets/libs/slimselect/slimselect.min.js'), array(), caspert_get_version_theme(), true);

    // fancyBox
    wp_enqueue_style('fancybox', get_theme_file_uri('/assets/libs/fancyBox/fancybox.css'), array(), caspert_get_version_theme());
    wp_enqueue_script('fancybox', get_theme_file_uri('/assets/libs/fancyBox/fancybox.umd.js'), array('jquery'), caspert_get_version_theme(), true);

    // load main style
    wp_enqueue_style('caspert-style', get_theme_file_uri('/assets/css/main.css'), array(), caspert_get_version_theme());

    // load style page 404
    if (is_404()) {
        wp_enqueue_style('caspert-page-404', get_theme_file_uri('/assets/css/page-templates/page-404.min.css'), array(), caspert_get_version_theme());
    }

    // load comment reply
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    // current-device
    wp_enqueue_script('current-device', get_theme_file_uri('/assets/libs/device-js/current-device.min.js'), array('jquery'), '0.10.1', true);

    // wow
    wp_enqueue_script('wow', get_theme_file_uri('/assets/libs/wow/wow.min.js'), array('jquery'), caspert_get_version_theme(), true);

    // greensock
    wp_enqueue_script('GSAP', get_theme_file_uri('/assets/libs/greensock/GSAP.min.js'), array(), caspert_get_version_theme(), true);
    wp_enqueue_script('ScrollTrigger', get_theme_file_uri('/assets/libs/greensock/ScrollTrigger.min.js'), array('GSAP'), caspert_get_version_theme(), true);

    // headroom
    wp_enqueue_script('headroom', get_theme_file_uri('/assets/libs/headroom/headroom.js'), array('jquery'), '0.9.4', true);

    // load main js
    wp_enqueue_script('caspert-main', get_theme_file_uri('/assets/js/functions.js'), array('jquery'), caspert_get_version_theme(), true);
}

add_action('wp_enqueue_scripts', 'caspert_front_end_scripts', 22);