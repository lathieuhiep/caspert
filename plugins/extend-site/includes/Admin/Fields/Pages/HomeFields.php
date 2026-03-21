<?php
namespace ExtendSite\Admin\Fields\Pages;

use Carbon_Fields\Container;
use ExtendSite\Admin\Fields\Pages\Home\HomeCtaTab;
use ExtendSite\Admin\Fields\Pages\Home\HomeFeaturedProductTab;
use ExtendSite\Admin\Fields\Pages\Home\HomeHeroTab;
use ExtendSite\Admin\Fields\Pages\Home\HomeHighlightTab;

defined('ABSPATH') || exit;

class HomeFields {

    public static function register(): void
    {
        Container::make('post_meta', esc_html__('Thiết lập trang chủ', 'extend-site'))
            ->where('post_type', '=', 'page')
            ->where('post_template', '=', 'templates/page-home.php')
            ->add_tab(
                esc_html__('Hero', 'extend-site'),
                HomeHeroTab::fields()
            )->add_tab(
                esc_html__('Nổi Bật', 'extend-site'),
                HomeHighlightTab::fields()
            )->add_tab(
                esc_html__('Sản phẩm nổi Bật', 'extend-site'),
                HomeFeaturedProductTab::fields()
            )->add_tab(
                esc_html__('CTA', 'extend-site'),
                HomeCtaTab::fields()
            );
    }
}
