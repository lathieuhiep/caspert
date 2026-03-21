<?php

use ExtendSite\Admin\Fields\Pages\Home\HomeCtaTab;

$data = caspert_get_field_tab_data(HomeCtaTab::class);

if (empty($data['items'])) return;

$base_delay = 0.2;
?>

<section class="section sec-homeCta">
    <div class="container">
        <div class="row">
            <?php foreach ($data['items'] as $index => $item) :

                $delay = number_format($index * $base_delay, 1);
                ?>

                <div class="col-md-6">
                    <div class="ctaBox wow fadeInUp"
                         data-wow-delay="<?php echo esc_attr($delay . 's'); ?>">

                        <?php if (!empty($item['image'])) : ?>
                            <div class="ctaBox__bg">
                                <img src="<?php echo esc_url($item['image']); ?>"
                                    alt="<?php echo esc_attr($item['title']); ?>">
                            </div>
                        <?php endif; ?>

                        <div class="ctaBox__inner">
                            <?php if (!empty($item['title'])) : ?>
                                <h3 class="ctaBox__title">
                                    <a href="<?php echo esc_url($item['button']['link']); ?>">
                                        <?php echo esc_html($item['title']); ?>
                                    </a>
                                </h3>
                            <?php endif; ?>

                            <?php if (!empty($item['description'])) : ?>
                                <p class="catBox__text">
                                    <?php echo esc_html($item['description']); ?>
                                </p>
                            <?php endif; ?>

                            <?php if (!empty($item['button']['text']) && !empty($item['button']['link'])) : ?>
                                <div class="ctaBox__btn">
                                    <a href="<?php echo esc_url($item['button']['link']); ?>" class="btn-link">
                                        <?php echo esc_html($item['button']['text']); ?>
                                        <span><i class="ex-arrow-circle-left"></i></span>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>