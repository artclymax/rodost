<?php
$title = get_field('popular_products_title', 'option') ?? 'Популярные изделия';
$btn_text = get_field('popular_products_btn_text', 'option') ?? 'Подробнее';

if (!$btn_text) {
	$btn_text = 'Подробнее';
}

$featured_ids = function_exists('wc_get_featured_product_ids') ? wc_get_featured_product_ids() : [];

if (!empty($featured_ids)) {
	$product_query = new WP_Query([
		'post_type' => 'product',
		'post_status' => 'publish',
		'posts_per_page' => 12,
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

if ($title || $has_products):
	?>
	<section class="section popular-products" id="popular-products">
		<div class="container popular-products__container section-gap">
			<div class="popular-products__header">
				<?php if ($title): ?>
					<h2 class="popular-products__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>
				<?php if ($has_products): ?>
					<div class="popular-products__navs swiper-btn-box hidden-mobile">
						<button class="swiper-btn swiper-btn__prev" data-swiper-btn-prev=".popular-products-swiper"
							aria-label="Предыдущий"></button>
						<button class="swiper-btn swiper-btn__next" data-swiper-btn-next=".popular-products-swiper"
							aria-label="Следующий"></button>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($has_products): ?>
				<div class="swiper popular-products-swiper"
					data-swiper='{ "slidesPerView": 2, "spaceBetween": 8, "breakpoints": { "640": { "slidesPerView": 2, "spaceBetween": 8 }, "768": { "slidesPerView": 3, "spaceBetween": 16 }, "1024": { "slidesPerView": 4, "spaceBetween": 24 } } }'>
					<div class="swiper-wrapper popular-products-swiper__wrapper">
						<?php while ($product_query->have_posts()):
							$product_query->the_post();
							$product_image_id = get_post_thumbnail_id(get_the_ID());
							$product_url = get_the_permalink();
							?>
							<div class="swiper-slide popular-products-swiper__slide popular-card">
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
									<h3 class="popular-card__title title-3">
										<?php echo esc_html(get_the_title()); ?>
									</h3>
									<span class="popular-card__btn btn btn--secondary">
										<?php echo esc_html($btn_text); ?>
									</span>
								</a>
							</div>
						<?php endwhile;
						wp_reset_postdata(); ?>
					</div>
					<div class="swiper-pagination popular-products-swiper__pagination visible-mobile" data-swiper-pagination=".popular-products-swiper"></div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>