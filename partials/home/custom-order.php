<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('co_title', $page) ?? '';
$descr = get_field('co_descr', $page) ?? '';
$btn = get_field('co_btn', $page) ?? [];
$feature_icon = get_field('co_feature_icon', $page) ?? null;
$feature_descr = get_field('co_feature_descr', $page) ?? '';
$bg_big = get_field('co_bg_big', $page) ?? null;
$bg_small = get_field('co_bg_small', $page) ?? null;

$has_feature = ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID'])) || $feature_descr;
$has_bg = ($bg_big && is_array($bg_big) && !empty($bg_big['ID'])) || ($bg_small && is_array($bg_small) && !empty($bg_small['ID']));

if ($title || $descr || (!empty($btn) && !empty($btn['url'])) || $has_feature || $has_bg):
	?>
	<section class="custom-order" id="custom-order">
		<div class="container custom-order__container">
			<div class="custom-order__body">
				<?php if ($title): ?>
					<h2 class="custom-order__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($descr): ?>
					<div class="custom-order__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>

				<?php if (!empty($btn) && !empty($btn['url'])): ?>
					<a class="custom-order__btn btn btn--secondary" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>"
						<?php endif; ?>>
						<?php echo esc_html($btn['title']); ?>
					</a>
				<?php endif; ?>

				<?php if ($has_feature): ?>
					<div class="custom-order__feature custom-order-feature">
						<?php if ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID'])): ?>
							<div class="custom-order-feature__icon">
								<?php echo wp_get_attachment_image(
									$feature_icon['ID'],
									'full',
									false,
									[
										'class' => 'img',
										'alt' => $feature_icon['alt'] ?: $title,
										'loading' => 'lazy',
									]
								); ?>
							</div>
						<?php endif; ?>
						<?php if ($feature_descr): ?>
							<div class="custom-order-feature__descr descr">
								<?php echo wp_kses_post($feature_descr); ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ($has_bg): ?>
			<div class="custom-order__bg-box image-box">
				<?php if ($bg_big && is_array($bg_big) && !empty($bg_big['ID'])): ?>
					<?php echo wp_get_attachment_image(
						$bg_big['ID'],
						'full',
						false,
						[
							'class' => 'custom-order__bg-big' . (!empty($bg_small['ID']) ? ' hidden-tablet' : ''),
							'alt' => $bg_big['alt'] ?: $title,
							'loading' => 'lazy',
						]
					); ?>
				<?php endif; ?>
				<?php if ($bg_small && is_array($bg_small) && !empty($bg_small['ID'])): ?>
					<?php echo wp_get_attachment_image(
						$bg_small['ID'],
						'full',
						false,
						[
							'class' => 'custom-order__bg-small visible-tablet',
							'alt' => $bg_small['alt'] ?: $title,
							'loading' => 'lazy',
						]
					); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>