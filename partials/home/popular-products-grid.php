<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('pg_title', $page) ?: get_field('popular_products_title', 'option') ?? '';
$descr = get_field('pg_descr', $page) ?: get_field('popular_products_descr', 'option') ?? '';
$btn = get_field('pg_btn', $page) ?: get_field('popular_products_btn', 'option') ?? [];
$btn_text = get_field('pg_btn_text', $page) ?: get_field('popular_products_btn_text', 'option') ?? '';

if (!$btn_text) {
	$btn_text = 'Подробнее';
}

$featured_ids = function_exists('wc_get_featured_product_ids') ? wc_get_featured_product_ids() : [];

if (!empty($featured_ids)) {
	$product_query = new WP_Query([
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => 8,
		'post__in' => $featured_ids,
	]);
} else {
	$product_query = new WP_Query([
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => 8,
		'orderby' => 'date',
		'order' => 'DESC',
	]);
}

$has_products = $product_query->have_posts();

if ($title || $descr || (!empty($btn) && !empty($btn['url'])) || $has_products):
	?>
	<section class="section popular-products-grid" id="popular-products-grid">
		<div class="container popular-products-grid__container section-gap">
			<div class="popular-products-grid__header">
				<?php if ($title): ?>
					<h2 class="popular-products-grid__title title-2"><?php echo esc_html($title); ?></h2>
				<?php endif; ?>
				<?php if ($descr): ?>
					<div class="popular-products-grid__descr descr"><?php echo wp_kses_post($descr); ?></div>
				<?php endif; ?>
				<?php if (!empty($btn) && !empty($btn['url'])): ?>
					<a class="popular-products-grid__btn btn btn--stroke" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>><?php echo esc_html($btn['title']); ?></a>
				<?php endif; ?>
			</div>

			<?php if ($has_products): ?>
				<ul class="popular-products-grid__cards grid">
					<?php while ($product_query->have_posts()):
						$product_query->the_post();
						$product_image_id = get_post_thumbnail_id(get_the_ID());
						$product_url = get_the_permalink();
						?>
						<li class="popular-products-grid__card popular-card">
							<a class="popular-card__link card-box" href="<?php echo esc_url($product_url); ?>">
								<?php if ($product_image_id): ?>
									<div class="popular-card__image image-box">
										<?php echo wp_get_attachment_image(
											$product_image_id,
											'full',
											false,
											[
												'class' => 'img',
												'alt' => get_the_title(),
												'loading' => 'lazy',
											]
										); ?>
									</div>
								<?php endif; ?>
								<h3 class="popular-card__title title-3"><?php echo esc_html(get_the_title()); ?></h3>
								<span class="popular-card__btn btn btn--secondary"><?php echo esc_html($btn_text); ?></span>
							</a>
						</li>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>