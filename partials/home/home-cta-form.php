<?php
$page = $args['page'] ?? get_queried_object();
$home_page = get_page_by_path('home', OBJECT, 'page');

$title = get_field('hcf_title', $page) ?: get_field('hcf_title', $home_page) ?? '';
$descr = get_field('hcf_descr', $page) ?: get_field('hcf_descr', $home_page) ?? '';
$features = get_field('hcf_features', $page) ?: get_field('hcf_features', $home_page) ?? [];
$form = get_field('hcf_form', $page) ?: get_field('hcf_form', $home_page) ?? '';
$decor = get_field('hcf_decor', $page) ?: get_field('hcf_decor', $home_page) ?? null;

$has_features = !empty($features);
$has_decor = $decor && is_array($decor) && !empty($decor['ID']);

if ($title || $descr || $has_features || $form || $has_decor):
	?>
	<section class="section-full home-cta-form" id="home-cta-form">
		<div class="container home-cta-form__container">
			<div class="home-cta-form__content section-gap">
				<div class="home-cta-form__header section-header">
						<?php if ($title): ?>
						<h2 class="home-cta-form__title title-2"><?php echo esc_html($title); ?></h2>
						<?php endif; ?>

						<?php if ($descr): ?>
						<div class="home-cta-form__descr descr"><?php echo wp_kses_post($descr); ?></div>
						<?php endif; ?>
				</div>

				<?php if ($has_features): ?>
					<ul class="home-cta-form__features">
						<?php foreach ($features as $feature):
							$feature_icon = $feature['icon'] ?? null;
							$feature_title = $feature['title'] ?? '';
							$feature_descr = $feature['descr'] ?? '';
							if (!$feature_title && !$feature_descr && !($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID'])))
								continue;
							?>
							<li class="home-cta-form__feature">
								<?php if ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID'])): ?>
									<div class="home-cta-form__feature-icon image-box">
										<?php echo wp_get_attachment_image(
											$feature_icon['ID'],
											'full',
											false,
											[
												'class' => 'img',
												'alt' => $feature_icon['alt'] ?: $feature_title,
												'loading' => 'lazy',
											]
										); ?>
									</div>
								<?php endif; ?>
								<div class="home-cta-form__feature-content">
									<?php if ($feature_title): ?>
										<h3 class="home-cta-form__feature-title"><?php echo esc_html($feature_title); ?></h3>
									<?php endif; ?>
									<?php if ($feature_descr): ?>
										<div class="home-cta-form__feature-descr descr"><?php echo wp_kses_post($feature_descr); ?></div>
									<?php endif; ?>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>
			</div>

			<?php if ($form): ?>
				<div class="home-cta-form__form-box">
					<div class="home-cta-form__form">
						<?php echo do_shortcode($form); ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($has_decor): ?>
			<div class="home-cta-form__image image-box" aria-hidden="true">
				<?php echo wp_get_attachment_image(
					$decor['ID'],
					'full',
					false,
					[
						'class' => 'img',
						'alt' => $decor['alt'] ?: 'Декор',
						'loading' => 'lazy',
					]
				); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>