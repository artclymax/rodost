<?php
$page = $args['page'] ?? get_queried_object();

$slides_all = get_field('hero_slides', $page) ?? [];

$slides = array_values(array_filter($slides_all, function ($slide) {
	$slide_title = $slide['title'] ?? '';
	$slide_descr = $slide['descr'] ?? '';
	$slide_bg_big = $slide['bg_big'] ?? null;

	return $slide_title || $slide_descr || ($slide_bg_big && is_array($slide_bg_big) && !empty($slide_bg_big['ID']));
}));

$slides_count = count($slides);
$slides_total = $slides_count > 9 ? $slides_count : '0' . $slides_count;

if (!empty($slides)):
	?>
	<section class="hero" id="hero">
		<div class="hero__slider swiper hero-swiper">
			<div class="swiper-wrapper hero-swiper__wrapper">
				<?php foreach ($slides as $slide_index => $slide):
					$slide_title = $slide['title'] ?? '';
					$slide_descr = $slide['descr'] ?? '';
					$slide_btn_primary = $slide['btn_primary'] ?? [];
					$slide_btn_secondary = $slide['btn_secondary'] ?? [];
					$slide_advantages = $slide['advantages'] ?? [];
					$slide_bg_big = $slide['bg_big'] ?? null;
					$slide_bg_mobile = $slide['bg_mobile'] ?? null;
					$slide_loading = $slide_index === 0 ? 'eager' : 'lazy';
					?>
					<div class="swiper-slide hero__slide <?= (empty($slide_bg_mobile)) ? 'big-image' : '' ?>">
						<div class="hero-slide__wrapper">
							<div class="hero-slide__image image-box">

								<?php if ($slide_bg_big && is_array($slide_bg_big) && !empty($slide_bg_big['ID'])): ?>
									<?php
									echo wp_get_attachment_image(
										$slide_bg_big['ID'],
										'full',
										false,
										[
											'class' => !empty($slide_bg_mobile) ? 'hidden-mobile-sm' : '',
											'alt' => $slide_bg_big['alt'] ?: $slide_title,
											'loading' => $slide_loading,
										]
									); ?>
								<?php endif; ?>
								<?php if (!empty($slide_bg_mobile)): ?>
									<?php echo wp_get_attachment_image(
										$slide_bg_mobile['ID'],
										'full',
										false,
										[
											'class' => !empty($slide_bg_big) ? 'visible-mobile-sm' : '',
											'alt' => $slide_bg_mobile['alt'] ?: $slide_title,
											'loading' => $slide_loading,
										]
									); ?>
								<?php endif; ?>
							</div>

							<div class="hero-slide__container container">
								<div class="hero-slide__content">
									<?php if ($slide_title): ?>
										<h1 class="hero-slide__title title-1"><?php echo esc_html($slide_title); ?></h1>
									<?php endif; ?>

									<?php if ($slide_descr): ?>
										<div class="hero-slide__descr descr"><?php echo wp_kses_post($slide_descr); ?></div>
									<?php endif; ?>

									<?php if ((!empty($slide_btn_primary) && !empty($slide_btn_primary['url'])) || (!empty($slide_btn_secondary) && !empty($slide_btn_secondary['url']))): ?>
										<div class="hero-slide__btns">
											<?php if (!empty($slide_btn_primary) && !empty($slide_btn_primary['url'])): ?>
												<a class="btn hero-slide__btn hero-slide__btn--primary"
													href="<?php echo esc_url($slide_btn_primary['url']); ?>" <?php if (!empty($slide_btn_primary['target'])): ?>
														target="<?php echo esc_attr($slide_btn_primary['target']); ?>" <?php endif; ?>><?php echo esc_html($slide_btn_primary['title']); ?></a>
											<?php endif; ?>
											<?php if (!empty($slide_btn_secondary) && !empty($slide_btn_secondary['url'])): ?>
												<a class="btn btn--stroke hero-slide__btn hero-slide__btn--secondary"
													href="<?php echo esc_url($slide_btn_secondary['url']); ?>" <?php if (!empty($slide_btn_secondary['target'])): ?>
														target="<?php echo esc_attr($slide_btn_secondary['target']); ?>" <?php endif; ?>><?php echo esc_html($slide_btn_secondary['title']); ?></a>
											<?php endif; ?>
										</div>
									<?php endif; ?>

									<?php if (!empty($slide_advantages)): ?>
										<ul class="hero-slide__advantages">
											<?php foreach ($slide_advantages as $advantage):
												$advantage_value = $advantage['value'] ?? '';
												$advantage_label = $advantage['label'] ?? '';
												if (!$advantage_value && !$advantage_label)
													continue;
												?>
												<li class="hero-slide__advantage">
													<?php if ($advantage_value): ?>
														<span class="hero-slide__advantage-value"><?php echo esc_html($advantage_value); ?></span>
													<?php endif; ?>
													<?php if ($advantage_label): ?>
														<div class="hero-slide__advantage-label title-3 descr">
															<?php echo wp_kses_post($advantage_label); ?>
														</div>
													<?php endif; ?>
												</li>
											<?php endforeach; ?>
										</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

		<div class="hero__footer">
			<div class="hero__footer-container container">
				<div class="swiper hero-tabs">
					<div class="swiper-wrapper hero-tabs__wrapper">
						<?php foreach ($slides as $tab_index => $slide):
							$tab_label = $slide['tab_label'] ?? '';
							if (!$tab_label)
								$tab_label = $slide['title'] ?? '';
							if (!$tab_label)
								continue;
							?>
							<div class="swiper-slide hero-tabs-slide">
								<div class="hero-tabs-slide__wrapper">
									<button class="hero-tabs-slide__btn" type="button">
										<?php echo esc_html($tab_label); ?>
									</button>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>

				<div class="hero__controls hidden-tablet">
					<div class="hero__pagination">
						<span class="hero__pagination-current" data-swiper-current=".hero-swiper">01</span>
						<span class="hero__pagination-divider">/</span>
						<span class="hero__pagination-total"><?php echo esc_html($slides_total); ?></span>
					</div>

					<div class="hero__navs">

						<button class="swiper-btn hero__navs-btn hero__navs-btn-prev" data-swiper-btn-prev=".hero-swiper"
							aria-label="Предыдущий слайд">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M13.3333 18.3333L4.99992 10L13.3333 1.66667" stroke="currentColor" stroke-width="2" />
							</svg>
						</button>
						<button class="swiper-btn hero__navs-btn hero__navs-btn-next" data-swiper-btn-next=".hero-swiper"
							aria-label="Следующий слайд">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.66675 18.3333L15.0001 10L6.66675 1.66667" stroke="currentColor" stroke-width="2" />
							</svg></button>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>