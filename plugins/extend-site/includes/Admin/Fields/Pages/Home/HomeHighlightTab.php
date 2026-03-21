<?php
namespace ExtendSite\Admin\Fields\Pages\Home;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class HomeHighlightTab implements FieldTabIF
{
    private const KEY = 'es_home_page_highlight_tab_';

    private const ITEMS = self::KEY . 'items';

    // child fields
    private const IMAGE       = 'image';
    private const TITLE       = 'title';
    private const DESCRIPTION = 'description';
    private const LINK        = 'link';
    private const BUTTON_TEXT = 'button_text';

    public static function fields(): array
    {
        return [
            Field::make('complex', self::ITEMS, esc_html__('Highlights', 'paint'))
                ->set_layout('tabbed-horizontal')
                ->add_fields('item', [

                    Field::make('image', self::IMAGE, esc_html__('Hình ảnh', 'paint'))
                        ->set_width(50),

                    Field::make('text', self::TITLE, esc_html__('Tiêu đề', 'paint'))
                        ->set_width(50),

                    Field::make('textarea', self::DESCRIPTION, esc_html__('Mô tả', 'paint'))
                        ->set_width(50),

                    Field::make('text', self::LINK, esc_html__('Link', 'paint'))
                        ->set_attribute('type', 'url')
                        ->set_default_value('https://example.com')
                        ->set_width(50),

                    Field::make('text', self::BUTTON_TEXT, esc_html__('Text nút', 'paint'))
                        ->set_default_value('KHÁM PHÁ NGAY')
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

                    'link' => esc_url_raw($item[self::LINK] ?? ''),

                    'button_text' => $item[self::BUTTON_TEXT] ?? '',
                ];

            }, $items),
        ];
    }
}