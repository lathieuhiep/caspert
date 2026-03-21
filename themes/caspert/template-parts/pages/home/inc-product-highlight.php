<?php

use ExtendSite\Admin\Fields\Pages\Home\HomeHighlightTab;

$data = caspert_get_field_tab_data(HomeHighlightTab::class);

if (empty($data['items'])) return;
?>

<section class="section sec-homeProductQc">
    <div class="item-wrap">
        <div class="item-slideWrap"></div>
        <div class="row">
            <!-- IMAGE -->
            <div class="col-md-6 order-md-2">
                <div class="item-img wow fadeInUp" data-md-wow-delay=".2s">
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($data['items'] as $index => $item) : ?>
                                <div class="swiper-slide" data-index="<?php echo esc_attr($index); ?>">
                                    <div class="f-img"
                                         style="background-image: url('<?php echo esc_url($item['image']); ?>');">
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TEXT -->
            <div class="col-md-6 order-md-1">
                <div class="item-textWrap wow fadeInUp">
                    <div class="item-text">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($data['items'] as $index => $item) : ?>
                                    <div class="swiper-slide" data-index="<?php echo esc_attr($index); ?>">

                                        <h3 class="f-title">
                                            <a href="<?php echo esc_url($item['link']); ?>">
                                                <?php echo esc_html($item['title']); ?>
                                            </a>
                                        </h3>

                                        <p class="f-text">
                                            <?php echo wp_kses_post($item['description']); ?>
                                        </p>

                                        <div class="f-btn">
                                            <a href="<?php echo esc_url($item['link']); ?>" class="btn-link">
                                                <?php echo esc_html($item['button_text']); ?>
                                                <span><i class="ex-arrow-circle-left"></i></span>
                                            </a>
                                        </div>

                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>