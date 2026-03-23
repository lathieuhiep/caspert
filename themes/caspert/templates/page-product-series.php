<?php
/**
 * Template Name: Dòng Sản Phẩm
 * Template Post Type: page
 */

get_header();

get_template_part('template-parts/components/inc', 'breadcrumbs');

get_template_part('template-parts/pages/product-series/inc', 'hero');
get_template_part('template-parts/pages/product-series/inc', 'series');
get_template_part('template-parts/pages/product-series/inc', 'experience');
get_template_part('template-parts/pages/product-series/inc', 'related-products');
get_template_part('template-parts/pages/product-series/inc', 'condition');

get_footer();