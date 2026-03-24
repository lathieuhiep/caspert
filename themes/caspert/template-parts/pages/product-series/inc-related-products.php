<?php

use ExtendSite\Admin\Fields\Pages\ProductSeries\ProductRelatedTab;
use ExtendSite\Admin\Fields\Woo\ProductMeta;

$data = caspert_get_field_tab_data(ProductRelatedTab::class);

if ( empty($data) ) return;

$args = [
    'post_type' => 'product',
    'posts_per_page' => $data['number'],
    'post_status' => 'publish',
    'ignore_sticky_posts' => true,
    'no_found_rows' => true,
];

// filter theo category
if (!empty($data['category_id'])) {
    $args['tax_query'] = [
        [
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => [$data['category_id']],
        ]
    ];
}

// order + orderby
if ($data['order_by'] === 'rand') {
    $args['orderby'] = 'rand';
} else {
    $args['orderby'] = $data['order_by'];
    $args['order']   = $data['order'];
}

$query = new WP_Query($args);
?>

<?php if ($query->have_posts()) : ?>
    <section class="section sec-sanphanRalate">
        <div class="container">
            <?php if (!empty($data['heading'])) : ?>
                <h2 class="titlebox__title wow fadeInUp">
                    <?php echo esc_html($data['heading']); ?>
                </h2>
            <?php endif; ?>

            <div class="sanphanRalate-slideJs">
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php while ($query->have_posts()) : $query->the_post();
                            $product = wc_get_product(get_the_ID());
                            if (!$product) continue;
                            ?>

                            <div class="swiper-slide">
                                <div class="productBox wow fadeInUp">
                                    <div class="productBox__inner">
                                        <?php
                                        // badge reuse logic của bạn
                                        $meta = ProductMeta::get_data(get_the_ID());

                                        if (!empty($meta['is_hot']) || !empty($meta['is_new'])) :
                                            ?>
                                            <div class="product-label">
                                                <?php if (!empty($meta['is_hot'])) : ?>
                                                    <span class="label-hot"><?php esc_html_e('Hot', 'extend-site'); ?></span>
                                                <?php endif; ?>

                                                <?php if (!empty($meta['is_new'])) : ?>
                                                    <span class="label-new"><?php esc_html_e('Mới', 'extend-site'); ?></span>
                                                <?php endif; ?>
                                            </div>
                                        <?php endif; ?>

                                        <!-- image -->
                                        <div class="productBox__img">
                                            <?php echo $product->get_image('medium'); ?>
                                        </div>

                                        <!-- title -->
                                        <div class="productBox__title">
                                            <h3 class="f-tensp">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                        </div>

                                        <!-- desc -->
                                        <?php if ($product->get_short_description()) : ?>
                                            <div class="productBox__info">
                                                <?php the_content(); ?>
                                            </div>
                                        <?php endif; ?>

                                        <!-- price -->
                                        <div class="productBox__price">
                                            <?php echo wp_kses_post($product->get_price_html()); ?>
                                        </div>

                                        <!-- button -->
                                        <div class="productBox__btn">
                                            <a href="<?php the_permalink(); ?>" class="btn btn--block btn--sm">
                                                <?php esc_html_e('Mua ngay', 'extend-site'); ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endwhile; wp_reset_postdata(); ?>
                    </div>

                    <div class="swiper-pagination d-xl-none"></div>

                    <div class="swiper-buttonCustom style-2 d-none d-xl-block">
                        <div class="swiper-buttonCustom-prev">
                            <i class="ex-arrowLong-left"></i>
                        </div>
                        <div class="swiper-buttonCustom-next">
                            <i class="ex-arrowLong-right"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- button bottom -->
            <?php if (!empty($data['button']['text']) && !empty($data['button']['link'])) : ?>
                <div class="item-foot wow fadeInUp">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 col-xl-4 offset-xl-4">
                            <a href="<?php echo esc_url($data['button']['link']); ?>" class="btn btn--sm btn--block">
                                <?php echo esc_html($data['button']['text']); ?>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endif; ?>