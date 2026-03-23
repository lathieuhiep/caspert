<?php

use ExtendSite\Admin\Fields\Pages\ProductSeries\ProductSeriesFeatureTab;

$data = caspert_get_field_tab_data(ProductSeriesFeatureTab::class);

if (empty($data['items'])) return;
?>

<section class="section sec-sanphamKnghiem">
    <div class="container">
        <div class="item-listOdd">
            <?php foreach ($data['items'] as $item) : ?>
                <div class="item">
                    <div class="row align-items-center">
                        <div class="col-md-5 col-xl-5">
                            <?php if (!empty($item['image'])) : ?>
                                <div class="item-img wow fadeInUp">
                                    <img src="<?php echo esc_url($item['image']); ?>" alt="">
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-6 col-xl-5">
                            <div class="item-body wow fadeInUp">
                                <?php if (!empty($item['title'])) : ?>
                                    <h2 class="f-title fz-32">
                                        <?php echo esc_html($item['title']); ?>
                                    </h2>
                                <?php endif; ?>

                                <?php if (!empty($item['text'])) : ?>
                                    <div class="f-text">
                                        <?php echo wp_kses_post($item['text']); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>