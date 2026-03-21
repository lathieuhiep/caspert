<?php

namespace ExtendSite\Admin\Fields\Pages\Home;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class HomeFeaturedProductTab implements FieldTabIF
{
    // key meta box
    private const KEY = 'es_home_featured_product_tab_';

    private const HEADING = self::KEY . 'heading';
    private const PRODUCTS = self::KEY . 'products';
    private const MAIN_CTA_LINK = self::KEY . 'main_cta_link';
    private const VIEW_ALL_LINK = self::KEY . 'view_all_link';

    /**
     * Return array fields.
     */
    public static function fields(): array
    {
        return [
            Field::make('text', self::HEADING, esc_html__('Tiêu đề', 'extend-site'))
                ->set_default_value(esc_html__('Sản phẩm nổi bật', 'extend-site')),

            Field::make('association', self::PRODUCTS, esc_html__('Sản phẩm nổi bật', 'extend-site'))
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'product',
                    ],
                ])
                ->set_max(3)
                ->set_help_text(
                    esc_html__('Chọn tối đa 3 sản phẩm và sắp xếp theo thứ tự hiển thị: 1 lớn → 2 nhỏ.', 'extend-site')
                ),

            Field::make('text', self::MAIN_CTA_LINK, esc_html__('Link nút mua ngay', 'extend-site'))
                ->set_attribute('type', 'url')
                ->set_default_value('https://example.com')
                ->set_width(50),

            Field::make('text', self::VIEW_ALL_LINK, esc_html__('Link nút xem tất cả', 'extend-site'))
                ->set_attribute('type', 'url')
                ->set_default_value('https://example.com')
                ->set_width(50),
        ];
    }

    /**
     * Get data fields.
     */
    public static function get_data(int $post_id): array
    {
        $products = carbon_get_post_meta($post_id, self::PRODUCTS);
        $product_ids = [];

        if (!empty($products) && is_array($products)) {
            foreach ($products as $product) {
                if (!empty($product['id'])) {
                    $product_ids[] = (int)$product['id'];
                }
            }
        }

        // đảm bảo tối đa 3
        $product_ids = array_slice($product_ids, 0, 3);

        return [
            'heading' => carbon_get_post_meta($post_id, self::HEADING),
            'product_ids' => $product_ids,

            'main_cta' => [
                'link' => carbon_get_post_meta($post_id, self::MAIN_CTA_LINK),
            ],

            'view_all' => [
                'link' => carbon_get_post_meta($post_id, self::VIEW_ALL_LINK),
            ],
        ];
    }
}