<?php
namespace ExtendSite\Admin\Fields\Pages\Home;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class HomeCtaTab implements FieldTabIF
{
    private const KEY = 'es_home_page_cta_tab_';

    private const ITEMS = self::KEY . 'items';

    // child fields
    private const IMAGE       = 'image';
    private const TITLE       = 'title';
    private const DESCRIPTION = 'description';
    private const BUTTON_TEXT = 'button_text';
    private const BUTTON_LINK = 'button_link';

    /**
     * Define fields
     */
    public static function fields(): array
    {
        return [
            Field::make('complex', self::ITEMS, esc_html__('CTA Items', 'extend-site'))
                ->set_layout('tabbed-horizontal')
                ->add_fields('item', [

                    Field::make('image', self::IMAGE, esc_html__('Ảnh nền', 'extend-site'))
                        ->set_width(50),

                    Field::make('text', self::TITLE, esc_html__('Tiêu đề', 'extend-site'))
                        ->set_width(50),

                    Field::make('textarea', self::DESCRIPTION, esc_html__('Mô tả', 'extend-site'))
                        ->set_width(100),

                    Field::make('text', self::BUTTON_TEXT, esc_html__('Text nút', 'extend-site'))
                        ->set_width(50),

                    Field::make('text', self::BUTTON_LINK, esc_html__('Link nút', 'extend-site'))
                        ->set_default_value('#')
                        ->set_width(50),

                ])
                ->set_header_template('
                    <% if (title) { %>
                        <%- title %>
                    <% } else { %>
                        CTA Item
                    <% } %>
                ')
        ];
    }

    /**
     * Get data
     */
    public static function get_data(int $post_id): array
    {
        $items = carbon_get_post_meta($post_id, self::ITEMS);

        if (empty($items)) {
            return [];
        }

        return [
            'items' => array_map(function ($item) {
                return [
                    'image' => !empty($item[self::IMAGE])
                        ? wp_get_attachment_image_url($item[self::IMAGE], 'full')
                        : '',

                    'title'       => $item[self::TITLE] ?? '',
                    'description' => $item[self::DESCRIPTION] ?? '',

                    'button' => [
                        'text' => $item[self::BUTTON_TEXT] ?? '',
                        'link' => $item[self::BUTTON_LINK] ?? '',
                    ],
                ];
            }, $items),
        ];
    }
}