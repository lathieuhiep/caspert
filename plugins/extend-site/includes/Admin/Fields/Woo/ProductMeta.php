<?php

namespace ExtendSite\Admin\Fields\Woo;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class ProductMeta implements FieldTabIF
{
    // key meta box
    private const KEY = 'es_product_meta_tab_';
    private const IS_HOT = self::KEY . 'is_hot';
    private const IS_NEW = self::KEY . 'is_new';
    private const SECONDARY_IMAGE = self::KEY . 'secondary_image';

    /**
     * return array fields
     */
    public static function fields(): array
    {
        return [
            Field::make('checkbox', self::IS_HOT, esc_html__('Sản phẩm hot', 'extend-site'))
                ->set_option_value('yes'),

            Field::make('checkbox', self::IS_NEW, esc_html__('Sản phẩm mới', 'extend-site'))
                ->set_option_value('yes'),

            Field::make('image', self::SECONDARY_IMAGE, esc_html__('Ảnh phụ', 'extend-site')),
        ];
    }

    // get product is hot
    public static function get_is_hot(int $post_id): string
    {
        return carbon_get_post_meta($post_id, self::IS_HOT);
    }

    // get product is new
    public static function get_is_new(int $post_id): string
    {
        return carbon_get_post_meta($post_id, self::IS_NEW);
    }

    // get product secondary image
    public static function get_secondary_image(int $post_id): int
    {
        return (int) carbon_get_post_meta($post_id, self::SECONDARY_IMAGE);
    }

    /**
     * get data fields
     */
    public static function get_data(int $post_id): array
    {
        return [
            'is_hot' => self::get_is_hot($post_id),
            'is_new' => self::get_is_new($post_id),
            'secondary_image' => self::get_secondary_image($post_id),
        ];
    }
}