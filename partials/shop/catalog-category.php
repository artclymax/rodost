<?php
$page = $args['page'] ?? get_queried_object();

$terms = [];

$all_terms = get_terms([
	'taxonomy' => 'product_cat',
	'hide_empty' => false,
]);

if (!is_wp_error($all_terms)) {
	$terms = $all_terms;
}

$exclude_slugs = ['misc'];

$terms = array_values(array_filter($terms, function ($term) use ($exclude_slugs) {
	return !in_array($term->slug, $exclude_slugs, true);
}));

$visible_limit = 4;
$card_count = 0;

if (!empty($terms)):
	?>
	<section class="section-full catalog catalog-category" id="catalog-category">
		<div class="container catalog__container">
			<?php if (!empty($terms)): ?>
				<ul class="catalog__cards">
					<?php foreach ($terms as $term):
						$term_url = get_term_link($term);
						if (is_wp_error($term_url))
							continue;

						$term_image_id = (int) get_term_meta($term->term_id, 'thumbnail_id', true);

						if (!$term_image_id && $placeholder && is_array($placeholder) && !empty($placeholder['ID'])) {
							$term_image_id = $placeholder['ID'];
						}

						$card_count++;
						?>
						<li class="catalog__card catalog-card">
							<a class="catalog-card__wrapper-link" href="<?php echo esc_url($term_url); ?>">
								<?php if ($term_image_id): ?>
									<div class="catalog-card__image image-box">
										<?php echo wp_get_attachment_image(
											$term_image_id,
											'full',
											false,
											[
												'class' => 'img',
												'alt' => $term->name,
												'loading' => 'lazy',
											]
										); ?>
									</div>
								<?php endif; ?>
								<div class="catalog-card__content">
									<h3 class="catalog-card__title title-3">
										<?php echo esc_html($term->name); ?>
									</h3>
									<?php if ($term->description): ?>
										<div class="catalog-card__descr descr icon icon--after icon--arrow-right">
											<?php echo wp_kses_post($term->description); ?>
										</div>
									<?php endif; ?>
								</div>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>