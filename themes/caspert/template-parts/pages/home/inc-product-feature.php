<?php

use ExtendSite\Admin\Fields\Pages\Home\HomeFeaturedProductTab;
use ExtendSite\Admin\Fields\Woo\ProductMeta;
use ExtendSite\Helpers\ProductHelper;

defined('ABSPATH') || exit;

$data = caspert_get_field_tab_data(HomeFeaturedProductTab::class);

if (empty($data['product_ids']) || !is_array($data['product_ids'])) {
    return;
}

$product_ids = array_slice(array_map('intval', $data['product_ids']), 0, 3);

if (empty($product_ids)) {
    return;
}

/**
 * Build featured product item data for frontend render.
 */
$items = [];

if (class_exists(ProductHelper::class)) {
    $items = ProductHelper::get_featured_list($product_ids);
}

if (empty($items)) {
    return;
}

$main_item  = $items[0] ?? [];
$side_items = array_slice($items, 1, 2);

$main_cta_link = !empty($data['main_cta']['link']) ? esc_url($data['main_cta']['link']) : '';
$view_all_link = !empty($data['view_all']['link']) ? esc_url($data['view_all']['link']) : '';

/**
 * Render product badges.
 */
$render_badges = static function (array $item): void {
    if (empty($item)) {
        return;
    }

    if (
            empty($item['is_hot']) &&
            empty($item['is_new']) &&
            empty($item['is_out_of_stock'])
    ) {
        return;
    }

    echo '<div class="product-label">';

    if (!empty($item['is_out_of_stock'])) {
        echo '<span class="label-soldout">' . esc_html__('SOLD OUT', 'extend-site') . '</span>';
    } else {
        if (!empty($item['is_hot'])) {
            echo '<span class="label-hot">' . esc_html__('Hot', 'extend-site') . '</span>';
        }

        if (!empty($item['is_new'])) {
            echo '<span class="label-new">' . esc_html__('Mới', 'extend-site') . '</span>';
        }
    }

    echo '</div>';
};
?>

<section class="section sec-homeSanphamFed">
    <div class="container">
        <?php if (!empty($data['heading'])) : ?>
            <div class="row">
                <div class="col-xl-8 offset-xl-2">
                    <div class="titlebox">
                        <h2 class="titlebox__title wow fadeInUp">
                            <?php echo esc_html($data['heading']); ?>
                        </h2>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="item-spWrap">
            <div class="row">
                <div class="col-md-7 col-xl-8">
                    <?php if (!empty($main_item)) : ?>
                        <div class="product-halfImg wow fadeInUp">
                            <?php $render_badges($main_item); ?>

                            <div class="f-imgGroup">
                                <div class="f-img-1">
                                    <span>
                                        <?php
                                        if (!empty($main_item['thumbnail_id'])) {
                                            echo wp_get_attachment_image(
                                                    $main_item['thumbnail_id'],
                                                    'medium_large',
                                                    false,
                                                    [
                                                        'alt' => esc_attr($main_item['title']),
                                                    ]
                                            );
                                        }
                                        ?>
                                    </span>
                                </div>

                                <div class="f-img-2">
                                    <span>
                                        <?php
                                        if (!empty($main_item['secondary_image'])) {
                                            echo wp_get_attachment_image(
                                                    $main_item['secondary_image'],
                                                    'medium_large',
                                                    false,
                                                    [
                                                        'alt' => esc_attr($main_item['title']),
                                                    ]
                                            );
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>

                            <div class="f-fixGrow"></div>

                            <div class="f-body">
                                <?php if (!empty($main_item['review_count']) && $main_item['average_rating'] > 0) : ?>
                                    <div class="ratingShow">
                                        <div class="r-rate" style="--rating: <?php echo esc_attr($main_item['average_rating']); ?>"></div>
                                        <p class="r-num">
                                            (<?php echo esc_html(number_format_i18n($main_item['review_count'])); ?>)
                                        </p>
                                    </div>
                                <?php endif; ?>

                                <h3 class="f-name">
                                    <a href="<?php echo esc_url($main_item['permalink']); ?>">
                                        <?php echo esc_html($main_item['title']); ?>
                                    </a>
                                </h3>

                                <?php if (!empty($main_item['price_html'])) : ?>
                                    <div class="f-price">
                                        <?php echo wp_kses_post($main_item['price_html']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (!empty($main_item['short_description'])) : ?>
                                    <p class="f-text">
                                        <?php echo esc_html(wp_strip_all_tags($main_item['short_description'])); ?>
                                    </p>
                                <?php endif; ?>

                                <div class="f-btnWrap">
                                    <a href="<?php echo esc_url($main_item['permalink']); ?>" class="btn btn--block btn--secondary btn--sm">
                                        <?php echo esc_html__('TÌM HIỂU THÊM', 'extend-site'); ?>
                                    </a>

                                    <?php if (!empty($main_cta_link)) : ?>
                                        <a href="<?php echo esc_url($main_cta_link); ?>" class="btn btn--block btn--sm">
                                            <?php echo esc_html__('MUA NGAY', 'extend-site'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-md-5 col-xl-4">
                    <div class="item-right">
                        <?php foreach ($side_items as $item) : ?>
                            <div class="product-mini wow fadeInUp">
                                <?php $render_badges($item); ?>

                                <div class="f-img">
                                    <span>
                                        <?php
                                        if (!empty($item['thumbnail_id'])) {
                                            echo wp_get_attachment_image(
                                                    $item['thumbnail_id'],
                                                    'medium_large',
                                                    false,
                                                    [
                                                        'alt' => esc_attr($item['title']),
                                                        'width' => '314',
                                                        'height' => '150',
                                                    ]
                                            );
                                        }
                                        ?>
                                    </span>
                                </div>

                                <h3 class="f-name">
                                    <a href="<?php echo esc_url($item['permalink']); ?>">
                                        <?php echo esc_html($item['title']); ?>
                                    </a>
                                </h3>

                                <?php if (!empty($item['price_html'])) : ?>
                                    <div class="f-price">
                                        <?php echo wp_kses_post($item['price_html']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <?php if (!empty($view_all_link)) : ?>
                <div class="btn-foot wow fadeInUp">
                    <a href="<?php echo esc_url($view_all_link); ?>" class="btn-link btn--link-secondary">
                        <?php echo esc_html__('Xem tất cả', 'extend-site'); ?>
                        <span><i class="ex-caret-right"></i></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>