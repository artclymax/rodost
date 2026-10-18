<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header() ?>
<?php get_template_part('partials/home/hero'); ?>
<?php get_template_part('partials/home/catalog'); ?>
<?php get_template_part('partials/home/custom-order'); ?>
<?php get_template_part('partials/home/order-steps'); ?>
<?php get_template_part('partials/home/popular-products-grid'); ?>
<?php get_template_part('partials/cta-section', null, ['class' => 'cta-section--home']); ?>
<?php get_template_part('partials/home/section-projects'); ?>
<?php get_template_part('partials/home/section-why-us'); ?>
<?php get_template_part('partials/home/home-cta-form'); ?>
<?php get_footer() ?>
</div>