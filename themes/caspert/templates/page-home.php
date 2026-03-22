<?php
/**
 * Template Name: Home Page
 * Template Post Type: page
 */

get_header();

get_template_part('template-parts/pages/home/inc', 'hero');
get_template_part('template-parts/pages/home/inc', 'product-highlight');
get_template_part('template-parts/pages/home/inc', 'product-feature');
get_template_part('template-parts/pages/home/inc', 'cta');

get_footer();