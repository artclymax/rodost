<?php
defined('ABSPATH') || exit;

get_header();
get_template_part('partials/components/hero-page', null, ['page' => 'shop']);
get_template_part('partials/shop/catalog-category');
get_template_part('partials/popular-products');
get_template_part('partials/cta-section');
get_footer();
