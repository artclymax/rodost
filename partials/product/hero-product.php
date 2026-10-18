<?php

global $product;

if (!is_a($product, 'WC_Product')) {
	$product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
}

$btn = get_field('hero_product_btn') ?? [];
$note = get_field('hero_product_note') ?? '';

if ($product):
	$product_id = $product->get_id();
	$product_title = $product->get_name();

	$image_ids = $product->get_gallery_image_ids();

	if (empty($image_ids) && $product->get_image_id()) {
		$image_ids = [$product->get_image_id()];
	}

	$descr = get_post_field('post_content', $product_id);

	$attributes = [];

	foreach ($product->get_attributes() as $attribute) {
		if (!$attribute->get_visible())
			continue;

		$attr_label = wc_attribute_label($attribute->get_name());

		if ($attribute->is_taxonomy()) {
			$attr_values = wc_get_product_terms($product_id, $attribute->get_name(), ['fields' => 'names']);
			$attr_value = implode(', ', $attr_values);
		} else {
			$attr_value = implode(', ', $attribute->get_options());
		}

		if (!$attr_label || !$attr_value)
			continue;

		$attributes[] = [
			'label' => $attr_label,
			'value' => $attr_value,
		];
	}

	if (!empty($image_ids) || $descr || !empty($attributes) || (!empty($btn) && !empty($btn['url'])) || $note):
		?>
		<section class="hero-product" id="hero-product">
			<div class="container hero-product__container">
				<div class="hero-product__header hero-product-header">
					<div class="hero-product-header__breadcrumbs page-breadcrumbs">
						<?php if (function_exists('bcn_display')) {
							bcn_display();
						} ?>
					</div>
					<h1 class="hero-product-header__title title-1">
						<?php echo esc_html($product_title); ?>
					</h1>
				</div>
				<div class="hero-product__wrapper">
					<div class="hero-product__gallery-col hero-product-gallery">
						<?php if (!empty($image_ids)): ?>
							<div class="swiper hero-product-gallery__main-slider product-gallery-swiper">
								<div class="swiper-wrapper product-gallery-swiper__wrapper">
									<?php foreach ($image_ids as $image_index => $image_id): ?>
										<div class="swiper-slide product-slide">
											<a class="product-slide__image image-box"
												href="<?= get_the_post_thumbnail_url($product_id, 'full') ?>" data-fancybox target="_blank">
												<?php echo wp_get_attachment_image(
													$image_id,
													'full',
													false,
													[
														'class' => 'img',
														'loading' => $image_index === 0 ? 'eager' : 'lazy',
													]
												); ?>
											</a>
										</div>
									<?php endforeach; ?>
								</div>
							</div>

							<?php if (count($image_ids) > 1): ?>
								<div class="swiper hero-product-gallery__thumbs product-gallery-thumbs">
									<div class="swiper-wrapper product-gallery-thumbs__wrapper">
										<?php foreach ($image_ids as $image_id): ?>
											<div class="swiper-slide product-thumb">
												<div class="product-thumb__image image-box">
													<?php echo wp_get_attachment_image(
														$image_id,
														'full',
														false,
														[
															'class' => 'img',
															'loading' => 'lazy',
														]
													); ?>
												</div>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
							<?php endif; ?>
						<?php endif; ?>
					</div>

					<div class="hero-product__content-col hero-product-content">
						<h2 class="hero-product-content__title title-2">
							<?php echo esc_html($product_title); ?>
						</h2>

						<?php if ($descr): ?>
							<div class="hero-product-content__descr descr">
								<?php echo wp_kses_post(wpautop($descr)); ?>
							</div>
						<?php endif; ?>

						<?php if (!empty($attributes)): ?>
							<dl class="hero-product-content__specs">
								<?php foreach ($attributes as $attr): ?>
									<div class="hero-product-content__spec">
										<dt class="hero-product-content__spec-label">
											<?php echo esc_html($attr['label']); ?>
										</dt>
										<dd class="hero-product-content__spec-value">
											<?php echo esc_html($attr['value']); ?>
										</dd>
									</div>
								<?php endforeach; ?>
							</dl>
						<?php endif; ?>

						<?php if (!empty($btn) && !empty($btn['url'])): ?>
							<a class="hero-product-content__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
								<?php echo esc_html($btn['title']); ?>
							</a>
						<?php endif; ?>

						<?php if ($note): ?>
							<div class="hero-product-content__note icon icon--note descr">
								<?php echo wp_kses_post($note); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
	<?php endif;
endif; ?>