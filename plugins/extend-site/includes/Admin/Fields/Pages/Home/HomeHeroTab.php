<?php
namespace ExtendSite\Admin\Fields\Pages\Home;

use Carbon_Fields\Field;
use ExtendSite\Admin\Fields\FieldTabIF;

defined('ABSPATH') || exit;

class HomeHeroTab implements FieldTabIF
{
    private const KEY = 'es_home_page_hero_tab_';

    private const SLIDES = self::KEY . 'slides';

    // child fields
    private const BG_IMAGE     = 'bg_image';
    private const SUB_TITLE    = 'sub_title';
    private const TITLE        = 'title';
    private const DESCRIPTION  = 'description';
    private const BUTTON_TEXT  = 'button_text';
    private const BUTTON_LINK  = 'button_link';
    private const STYLE        = 'style';

    /**
     * Define Carbon Fields
     */
    public static function fields(): array
    {
        return [
            Field::make('complex', self::SLIDES, esc_html__('Hero Slides', 'paint'))
                ->set_layout('tabbed-horizontal')
                ->add_fields('slide', [

                    Field::make('image', self::BG_IMAGE, esc_html__('Ảnh nền', 'paint'))
                        ->set_width(50),

                    Field::make('text', self::SUB_TITLE, esc_html__('Tiêu đề phụ', 'paint'))
                        ->set_width(50),

                    Field::make('text', self::TITLE, esc_html__('Tiêu đề', 'paint'))
                        ->set_width(50),

                    Field::make('textarea', self::DESCRIPTION, esc_html__('Mô tả', 'paint'))
                        ->set_width(50),

                    Field::make('text', self::BUTTON_TEXT, esc_html__('Text nút', 'paint'))
                        ->set_width(50),

                    Field::make('text', self::BUTTON_LINK, esc_html__('Link nút', 'paint'))
                        ->set_attribute('type', 'url')
                        ->set_default_value('https://example.com')
                        ->set_width(50),

                    Field::make('select', self::STYLE, esc_html__('Style', 'paint'))
                        ->add_options([
                            ''        => 'Default',
                            'style-2' => 'Style 2',
                        ])
                        ->set_default_value('')
                        ->set_width(50),

                ])
                ->set_header_template('
                    <% if (title) { %>
                        <%- title %>
                    <% } else { %>
                        Slide
                    <% } %>
                ')
        ];
    }

    /**
     * Get data for frontend
     */
    public static function get_data(int $post_id): array
    {
        $slides = carbon_get_post_meta($post_id, self::SLIDES);

        if (empty($slides)) {
            return [];
        }

        return [
            'slides' => array_map(function ($item) {
                return [
                    'bg' => !empty($item[self::BG_IMAGE])
                        ? wp_get_attachment_image_url($item[self::BG_IMAGE], 'full')
                        : '',

                    'sub_title'   => $item[self::SUB_TITLE] ?? '',
                    'title'       => $item[self::TITLE] ?? '',
                    'description' => $item[self::DESCRIPTION] ?? '',

                    'button' => [
                        'text' => $item[self::BUTTON_TEXT] ?? '',
                        'link' => $item[self::BUTTON_LINK] ?? '',
                    ],

                    'style' => $item[self::STYLE] ?? '',
                ];
            }, $slides),
        ];
    }
}