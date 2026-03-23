<?php

use ExtendSite\Admin\Fields\Pages\ProductSeries\ProductSeriesIntroTab;

$data = caspert_get_field_tab_data(ProductSeriesIntroTab::class);

if (empty($data)) return;
?>

<section class="section sec-dieuhoaSeri">
    <div class="container">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xl-8 offset-xl-2">
                <div class="titlebox wow fadeInUp">
                    <?php if (!empty($data['heading'])) : ?>
                        <h2 class="titlebox__title">
                            <?php echo esc_html($data['heading']); ?>
                        </h2>
                    <?php endif; ?>

                    <?php if (!empty($data['description'])) : ?>
                        <div class="titlebox__text">
                            <?php echo wp_kses_post($data['description']); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <?php if (!empty($data['items'])) : ?>
        <div class="dieuhoaBox-list">
            <?php foreach ($data['items'] as $index => $item) : ?>
                <div class="dieuhoaBox wow fadeInUp"
                     data-wow-delay="<?php echo esc_attr($index * 0.2); ?>s">
                    <?php if (!empty($item['image'])) : ?>
                        <div class="dieuhoaBox__img">
                            <img src="<?php echo esc_url($item['image']); ?>" alt="">
                        </div>
                    <?php endif; ?>

                    <div class="dieuhoaBox__content wow fadeInUp">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-10 offset-md-1 col-xl-6 offset-xl-3">

                                    <?php if (!empty($item['title'])) : ?>
                                        <h3 class="dieuhoaBox__title">
                                            <?php if (!empty($item['link'])) : ?>
                                                <a href="<?php echo esc_url($item['link']); ?>">
                                                    <?php echo esc_html($item['title']); ?>
                                                </a>
                                            <?php else : ?>
                                                <?php echo esc_html($item['title']); ?>
                                            <?php endif; ?>
                                        </h3>
                                    <?php endif; ?>

                                    <?php if (!empty($item['text'])) : ?>
                                        <p class="dieuhoaBox__text">
                                            <?php echo esc_html($item['text']); ?>
                                        </p>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>