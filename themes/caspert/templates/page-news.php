<?php
/**
 * Template Name: Tin Tức
 * Template Post Type: page
 */

get_header();

get_template_part('template-parts/components/inc', 'breadcrumbs');

get_template_part('template-parts/pages/news/inc', 'hero');
get_template_part('template-parts/pages/news/inc', 'post');

get_footer();