<?php
/**
 * Template Name: Bào Hành
 * Template Post Type: page
 */

get_header();

get_template_part('template-parts/components/inc', 'breadcrumbs');

get_template_part('template-parts/pages/warranty/inc', 'hero');
get_template_part('template-parts/pages/warranty/inc', 'guarantee');
get_template_part('template-parts/pages/warranty/inc', 'support');

get_footer();