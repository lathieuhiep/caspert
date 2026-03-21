<?php

namespace ExtendSite\Helpers;

use ExtendSite\Admin\Fields\Woo\ProductMeta;

defined('ABSPATH') || exit;

class ProductHelper
{
    /**
     * Build product data for frontend render.
     */
    public static function get_featured_data(int $product_id): array
    {
        $product = wc_get_product($product_id);

        if (!$product) {
            return [];
        }

        $meta = ProductMeta::get_data($product_id);

        return [
            'id'                => $product_id,
            'title'             => get_the_title($product_id),
            'permalink'         => get_permalink($product_id),
            'price_html'        => $product->get_price_html(),
            'thumbnail_id'      => get_post_thumbnail_id($product_id),
            'secondary_image'   => !empty($meta['secondary_image']) ? (int) $meta['secondary_image'] : 0,
            'average_rating'    => (float) $product->get_average_rating(),
            'review_count'      => (int) $product->get_review_count(),
            'short_description' => $product->get_short_description(),
            'is_hot'            => !empty($meta['is_hot']),
            'is_new'            => !empty($meta['is_new']),
            'is_out_of_stock'   => !$product->is_in_stock(),
        ];
    }

    /**
     * Get multiple product data.
     */
    public static function get_featured_list(array $product_ids): array
    {
        $items = [];

        foreach ($product_ids as $product_id) {
            $item = self::get_featured_data((int) $product_id);

            if (!empty($item)) {
                $items[] = $item;
            }
        }

        return $items;
    }
}