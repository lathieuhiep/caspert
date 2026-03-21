<?php

namespace ExtendSite\Admin\Fields;

use Carbon_Fields\Container;
use ExtendSite\Admin\Fields\Woo\ProductMeta;

defined('ABSPATH') || exit;

class ProductFields
{
    /**
     * Boot product fields.
     */
    public static function boot(): void
    {
        add_action('carbon_fields_register_fields', [self::class, 'register']);
    }

    /**
     * Register product extra fields.
     */
    public static function register(): void
    {
        Container::make('post_meta', esc_html__('Thông tin bổ sung', 'extend-site'))
            ->where('post_type', '=', 'product')
            ->set_priority('high')
            ->add_tab(
                esc_html__('Thiết lập bổ sung', 'extend-site'),
                ProductMeta::fields()
            );
    }
}