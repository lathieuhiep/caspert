<?php
namespace ExtendSite\Admin\Fields\Pages;

use Carbon_Fields\Container;
use ExtendSite\Admin\Fields\Pages\ProductSeries\ProductSeriesFeatureTab;
use ExtendSite\Admin\Fields\Pages\ProductSeries\ProductSeriesHeroTab;
use ExtendSite\Admin\Fields\Pages\ProductSeries\ProductSeriesIntroTab;

defined('ABSPATH') || exit;

class ProductSeriesFields {

    public static function register(): void
    {
        Container::make('post_meta', esc_html__('Thiết lập trang danh sách sản phẩm', 'extend-site'))
            ->where('post_type', '=', 'page')
            ->where('post_template', '=', 'templates/page-product-series.php')
            ->add_tab(
                esc_html__('Hero', 'extend-site'),
                ProductSeriesHeroTab::fields()
            )->add_tab(
                esc_html__('Giới thiệu', 'extend-site'),
                ProductSeriesIntroTab::fields()
            )->add_tab(
                esc_html__('Thông tin nổi bật', 'extend-site'),
                ProductSeriesFeatureTab::fields()
            );
    }
}
