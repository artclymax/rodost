<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('catalog_title', $page) ?? '';
$descr = get_field('catalog_descr', $page) ?? '';
$btn = get_field('catalog_btn', $page) ?? [];
$placeholder = get_field('catalog_placeholder', $page) ?? null;
$cat_ids = get_field('catalog_categories', $page) ?? [];

$more_btn_text = get_field('catalog_more_btn', $page) ?? '';
$less_btn_text = get_field('catalog_less_btn', $page) ?? '';

if (!$more_btn_text) {
	$more_btn_text = 'Показать больше';
}

if (!$less_btn_text) {
	$less_btn_text = 'Скрыть';
}

$terms = [];

if (!empty($cat_ids)) {
	foreach ($cat_ids as $cat_id) {
		$term = get_term($cat_id, 'product_cat');
		if ($term && !is_wp_error($term)) {
			$terms[] = $term;
		}
	}
} else {
	$all_terms = get_terms([
		'taxonomy' => 'product_cat',
		'hide_empty' => false,
	]);

	if (!is_wp_error($all_terms)) {
		$terms = $all_terms;
	}
}

$exclude_slugs = ['misc'];

$terms = array_values(array_filter($terms, function ($term) use ($exclude_slugs) {
	return !in_array($term->slug, $exclude_slugs, true);
}));

$visible_limit = 4;
$card_count = 0;

if ($title || $descr || !empty($terms)):
	?>
	<section class="section-full catalog" id="catalog">
		<div class="container catalog__container section-gap">
			<?php if ($title || $descr || (!empty($btn) && !empty($btn['url']))): ?>
				<div class="catalog__header">
					<div class="catalog__header-info">
						<?php if ($title): ?>
							<h2 class="catalog__title title-2">
								<?php echo esc_html($title); ?>
							</h2>
						<?php endif; ?>
						<?php if ($descr): ?>
							<div class="catalog__descr descr">
								<?php echo wp_kses_post($descr); ?>
							</div>
						<?php endif; ?>
					</div>
					<?php if (!empty($btn) && !empty($btn['url'])): ?>
						<a class="catalog__btn btn btn--secondary hidden-mobile" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($btn['title']); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>

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

						$is_more = $card_count >= $visible_limit;
						$card_count++;
						?>
						<li class="catalog__card catalog-card<?php echo $is_more ? ' catalog-card--more' : ''; ?>">
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

			<?php if ($card_count > $visible_limit || (!empty($btn) && !empty($btn['url']))): ?>
				<div class="catalog__btn-box visible-mobile">
					<?php if ($card_count > $visible_limit): ?>
						<button class="catalog__btn btn btn--stroke" type="button" data-show-more=".catalog__cards"
							data-show-less="<?php echo esc_attr($less_btn_text); ?>"><?php echo esc_html($more_btn_text); ?></button>
					<?php endif; ?>
					<?php if (!empty($btn) && !empty($btn['url'])): ?>
						<a class="catalog__btn btn btn--secondary" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($btn['title']); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>