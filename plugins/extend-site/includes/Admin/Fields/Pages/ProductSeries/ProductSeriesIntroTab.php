<?php
namespace ExtendSite\Admin\Fields\Pages\ProductSeries;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class ProductSeriesIntroTab implements FieldTabIF
{
    private const KEY = 'es_product_series_intro_';

    private const HEADING = self::KEY . 'heading';
    private const DESCRIPTION = self::KEY . 'description';
    private const ITEMS = self::KEY . 'items';

    // item fields
    private const IMAGE = 'image';
    private const TITLE = 'title';
    private const TEXT  = 'text';
    private const LINK  = 'link';

    public static function fields(): array
    {
        return [

            Field::make('text', self::HEADING, esc_html__('Tiêu đề', 'extend-site')),

            Field::make('rich_text', self::DESCRIPTION, esc_html__('Mô tả', 'extend-site')),

            Field::make('complex', self::ITEMS, esc_html__('Danh sách block', 'extend-site'))
                ->set_layout('tabbed-horizontal')
                ->add_fields('item', [

                    Field::make('image', self::IMAGE, esc_html__('Ảnh', 'extend-site'))
                        ->set_width(50),

                    Field::make('text', self::TITLE, esc_html__('Tiêu đề', 'extend-site'))
                        ->set_width(50),

                    Field::make('textarea', self::TEXT, esc_html__('Mô tả', 'extend-site'))
                        ->set_width(50),

                    Field::make('text', self::LINK, esc_html__('Link', 'extend-site'))
                        ->set_default_value('#')
                        ->set_width(50),

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
            'heading'     => carbon_get_post_meta($post_id, self::HEADING),
            'description' => carbon_get_post_meta($post_id, self::DESCRIPTION),

            'items' => array_map(function ($item) {
                return [
                    'image' => !empty($item[self::IMAGE])
                        ? wp_get_attachment_image_url($item[self::IMAGE], 'full')
                        : '',

                    'title' => $item[self::TITLE] ?? '',
                    'text'  => $item[self::TEXT] ?? '',
                    'link'  => $item[self::LINK] ?? '',
                ];
            }, $items ?: []),
        ];
    }
}