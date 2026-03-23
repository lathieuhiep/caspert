<?php

use ExtendSite\Admin\Fields\Pages\ProductSeries\ProductSeriesHeroTab;

$data = caspert_get_field_tab_data(ProductSeriesHeroTab::class);

if (empty($data['slides'])) return;
?>

<section class="section sec-hero">
    <div class="item-slide">
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($data['slides'] as $slide) : ?>
                    <div class="swiper-slide">
                        <?php if (!empty($slide['bg'])) : ?>
                            <div class="f-bg"
                                 style="background-image: url('<?php echo esc_url($slide['bg']); ?>');">
                            </div>
                        <?php endif; ?>

                        <div class="container">
                            <div class="row">
                                <div class="col-md-7 offset-md-1 col-xl-5 offset-xl-0">
                                    <div class="item-box <?php echo esc_attr($slide['style']); ?> wow fadeInUp">
                                        <?php if (!empty($slide['sub_title'])) : ?>
                                            <p class="f-sub">
                                                <span></span>
                                                <?php echo esc_html($slide['sub_title']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['title'])) : ?>
                                            <h2 class="f-title">
                                                <?php echo esc_html($slide['title']); ?>
                                            </h2>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['description'])) : ?>
                                            <p class="f-text">
                                                <?php echo esc_html($slide['description']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if (!empty($slide['button']['text']) && !empty($slide['button']['link'])) : ?>
                                            <div class="f-btn">
                                                <a href="<?php echo esc_url($slide['button']['link']); ?>"
                                                   class="btn btn--block btn--white">
                                                    <?php echo esc_html($slide['button']['text']); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-buttonCustom style-2">
                <div class="swiper-buttonCustom-prev"><i class="ex-arrowLong-left"></i></div>
                <div class="swiper-buttonCustom-next"><i class="ex-arrowLong-right"></i></div>
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>