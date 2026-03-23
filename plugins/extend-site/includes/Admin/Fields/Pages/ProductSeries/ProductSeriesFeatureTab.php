<?php
namespace ExtendSite\Admin\Fields\Pages\ProductSeries;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class ProductSeriesFeatureTab implements FieldTabIF
{
    private const KEY = 'es_product_series_feature_';

    private const ITEMS = self::KEY . 'items';

    // item fields
    private const IMAGE = 'image';
    private const TITLE = 'title';
    private const TEXT  = 'text';

    public static function fields(): array
    {
        return [
            Field::make('complex', self::ITEMS, esc_html__('Danh sách nội dung', 'extend-site'))
                ->set_layout('tabbed-horizontal')
                ->add_fields('item', [

                    Field::make('image', self::IMAGE, esc_html__('Ảnh', 'extend-site'))
                        ->set_width(50),

                    Field::make('text', self::TITLE, esc_html__('Tiêu đề', 'extend-site'))
                        ->set_width(50),

                    Field::make('rich_text', self::TEXT, esc_html__('Nội dung', 'extend-site'))
                        ->set_width(100),

                ])
                ->set_header_template('
                    <% if (title) { %>
                        <%- title %>
                    <% } else { %>
                        Item
                    <% } %>
                ')
        ];
    }

    public static function get_data(int $post_id): array
    {
        $items = carbon_get_post_meta($post_id, self::ITEMS);

        return [
            'items' => array_map(function ($item) {
                return [
                    'image' => !empty($item[self::IMAGE])
                        ? wp_get_attachment_image_url($item[self::IMAGE], 'full')
                        : '',

                    'title' => $item[self::TITLE] ?? '',
                    'text'  => $item[self::TEXT] ?? '',
                ];
            }, $items ?: []),
        ];
    }
}