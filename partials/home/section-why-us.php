<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('wu_title', $page) ?? '';
$descr = get_field('wu_descr', $page) ?? '';
$features = get_field('wu_features', $page) ?? [];
$exp_number = get_field('wu_exp_number', $page) ?? '';
$exp_title = get_field('wu_exp_title', $page) ?? '';
$exp_descr = get_field('wu_exp_descr', $page) ?? '';
$exp_image = get_field('wu_exp_image', $page) ?? null;

$features = array_values(array_filter($features, function ($feature) {
	$feature_title = $feature['title'] ?? '';
	$feature_descr = $feature['descr'] ?? '';
	$feature_icon = $feature['icon'] ?? null;

	return $feature_title || $feature_descr || ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID']));
}));

$has_features = !empty($features);
$has_experience = $exp_number || $exp_title || $exp_descr || ($exp_image && is_array($exp_image) && !empty($exp_image['ID']));

if ($title || $descr || $has_features || $has_experience):
	?>
	<section class="section section-why-us" id="section-why-us">
		<div class="container section-why-us__container section-gap">
			<?php get_template_part('partials/section-header', null, [
				'title' => $title,
				'descr' => $descr,
			]); ?>

			<div class="section-why-us__wrapper section-grid">
				<?php if ($has_features): ?>
					<div class="section-why-us__features">
						<ul class="section-why-us__grid grid hidden-mobile">
							<?php foreach ($features as $feature):
								$feature_icon = $feature['icon'] ?? null;
								$feature_title = $feature['title'] ?? '';
								$feature_descr = $feature['descr'] ?? '';
								?>
								<li class="section-why-us__item feature-card">
									<?php if ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID'])): ?>
										<div class="feature-card__icon">
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
									<div class="feature-card__content">
										<?php if ($feature_title): ?>
											<h3 class="feature-card__title title-4">
												<?php echo esc_html($feature_title); ?>
											</h3>
										<?php endif; ?>
										<?php if ($feature_descr): ?>
											<div class="feature-card__descr descr">
												<?php echo wp_kses_post($feature_descr); ?>
											</div>
										<?php endif; ?>
									</div>
								</li>
							<?php endforeach; ?>
						</ul>

						<div class="swiper-slider visible-mobile">
							<div class="swiper features-swiper"
								data-swiper='{ "slidesPerView": 2, "spaceBetween": 8, "rewind": true, "breakpoints": { "640": { "slidesPerView": 3, "spaceBetween": 16 } } }'>
								<div class="swiper-wrapper features-swiper__wrapper">
									<?php foreach ($features as $feature):
										$feature_icon = $feature['icon'] ?? null;
										$feature_title = $feature['title'] ?? '';
										$feature_descr = $feature['descr'] ?? '';
										?>
										<div class="swiper-slide features-swiper__slide">
											<div class="feature-card">
												<?php if ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID'])): ?>
													<div class="feature-card__icon">
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
												<div class="feature-card__content">
													<?php if ($feature_title): ?>
														<h3 class="feature-card__title title-4">
															<?php echo esc_html($feature_title); ?>
														</h3>
													<?php endif; ?>
													<?php if ($feature_descr): ?>
														<div class="feature-card__descr descr">
															<?php echo wp_kses_post($feature_descr); ?>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>
									<?php endforeach; ?>
								</div>
							</div>
							<div class="swiper-pagination swiper-slider__pagination" data-swiper-pagination=".features-swiper"></div>
						</div>
					</div>
				<?php endif; ?>

				<?php if ($has_experience): ?>
					<div class="section-why-us__experience experience-card">
						<?php if ($exp_image && is_array($exp_image) && !empty($exp_image['ID'])): ?>
							<div class="experience-card__image image-box">
								<?php echo wp_get_attachment_image(
									$exp_image['ID'],
									'full',
									false,
									[
										'class' => 'img',
										'alt' => $exp_image['alt'] ?: $exp_title,
										'loading' => 'lazy',
									]
								); ?>
							</div>
						<?php endif; ?>
						<div class="experience-card__content">
							<?php if ($exp_number): ?>
								<span class="experience-card__number">
									<?php echo esc_html($exp_number); ?>
								</span>
							<?php endif; ?>
							<?php if ($exp_title): ?>
								<h3 class="experience-card__title title-2">
									<?php echo esc_html($exp_title); ?>
								</h3>
							<?php endif; ?>
							<?php if ($exp_descr): ?>
								<div class="experience-card__descr descr">
									<?php echo wp_kses_post($exp_descr); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>