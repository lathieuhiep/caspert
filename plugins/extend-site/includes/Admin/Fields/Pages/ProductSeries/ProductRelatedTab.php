<?php

namespace ExtendSite\Admin\Fields\Pages\ProductSeries;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class ProductRelatedTab implements FieldTabIF
{
    private const KEY = 'es_product_related_';

    private const HEADING = self::KEY . 'heading';
    private const NUMBER = self::KEY . 'number';
    private const ORDER_BY = self::KEY . 'order_by';
    private const ORDER = self::KEY . 'order';
    private const CATEGORY = self::KEY . 'category';

    private const BUTTON_TEXT = self::KEY . 'button_text';
    private const BUTTON_LINK = self::KEY . 'button_link';

    /**
     * Define fields
     */
    public static function fields(): array
    {
        return [

            Field::make('text', self::HEADING, esc_html__('Tiêu đề', 'extend-site'))
                ->set_default_value('Sản phẩm liên quan'),

            Field::make('number', self::NUMBER, esc_html__('Số lượng sản phẩm', 'extend-site'))
                ->set_default_value(6)
                ->set_attribute('min', 1)
                ->set_attribute('max', 20),

            Field::make('select', self::ORDER_BY, esc_html__('Sắp xếp theo', 'extend-site'))
                ->add_options([
                    'date' => esc_html__('Ngày đăng', 'extend-site'),
                    'title' => esc_html__('Tiêu đề', 'extend-site'),
                    'menu_order' => esc_html__('Thứ tự menu', 'extend-site'),
                    'rand' => esc_html__('Ngẫu nhiên', 'extend-site'),
                ])
                ->set_default_value('date'),

            Field::make('select', self::ORDER, esc_html__('Thứ tự', 'extend-site'))
                ->add_options([
                    'DESC' => esc_html__('Giảm dần', 'extend-site'),
                    'ASC' => esc_html__('Tăng dần', 'extend-site'),
                ])
                ->set_default_value('DESC'),

            Field::make('association', self::CATEGORY, esc_html__('Danh mục sản phẩm', 'extend-site'))
                ->set_types([
                    [
                        'type' => 'term',
                        'taxonomy' => 'product_cat',
                    ]
                ])
                ->set_max(1)
                ->help_text('Chọn danh mục để lọc (optional)'),


            Field::make('separator', 'sep_btn', esc_html__('Nút xem thêm', 'extend-site')),

            Field::make('text', self::BUTTON_TEXT, esc_html__('Text nút', 'extend-site'))
                ->set_default_value('XEM THÊM'),

            Field::make('association', self::BUTTON_LINK, esc_html__('Link nút', 'extend-site'))
                ->set_types([
                    [
                        'type' => 'post',
                        'post_type' => 'page',
                    ]
                ])
                ->set_max(1),
        ];
    }

    /**
     * Get data
     */
    public static function get_data(int $post_id): array
    {
        $category = carbon_get_post_meta($post_id, self::CATEGORY);
        $button   = carbon_get_post_meta($post_id, self::BUTTON_LINK);

        // validate orderby
        $orderby = carbon_get_post_meta($post_id, self::ORDER_BY);
        $allowed_orderby = ['date', 'title', 'menu_order', 'rand'];
        $orderby = in_array($orderby, $allowed_orderby, true) ? $orderby : 'date';

        // validate order
        $order = carbon_get_post_meta($post_id, self::ORDER);
        $allowed_order = ['ASC', 'DESC'];
        $order = in_array($order, $allowed_order, true) ? $order : 'DESC';

        // number fallback
        $number = (int) carbon_get_post_meta($post_id, self::NUMBER);
        $number = $number > 0 ? $number : 6;

        return [
            'heading' => carbon_get_post_meta($post_id, self::HEADING),

            'number'  => $number,
            'order_by'=> $orderby,
            'order'   => $order,

            'category_id' => !empty($category[0]['id']) ? (int) $category[0]['id'] : 0,

            'button' => [
                'text' => carbon_get_post_meta($post_id, self::BUTTON_TEXT),
                'link' => !empty($button[0]['id'])
                    ? get_permalink($button[0]['id'])
                    : '',
            ],
        ];
    }
}