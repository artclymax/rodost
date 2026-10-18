<?php
/*
Template Name: Страница услуг
*/

get_header();
get_template_part('partials/components/hero-page');
get_template_part('partials/services');
get_template_part('partials/home/order-steps', null, ['class' => 'order-steps--services']);
get_template_part('partials/cta-section');
get_footer();
