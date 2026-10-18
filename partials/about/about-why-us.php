<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('aw_title', $page) ?? '';
$features = get_field('aw_features', $page) ?? [];

$features = array_values(array_filter($features, function ($feature) {
	$feature_title = $feature['title'] ?? '';
	$feature_descr = $feature['descr'] ?? '';
	$feature_icon = $feature['icon'] ?? null;

	return $feature_title || $feature_descr || ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID']));
}));

if ($title || !empty($features)):
	?>
	<section class="section about-why-us" id="about-why-us">
		<div class="container about-why-us__container section-gap">
			<?php get_template_part('partials/section-header', null, [
				'title' => $title,
			]); ?>

			<?php if (!empty($features)): ?>
				<ul class="about-why-us__list grid">
					<?php foreach ($features as $feature):
						$feature_icon = $feature['icon'] ?? null;
						$feature_title = $feature['title'] ?? '';
						$feature_descr = $feature['descr'] ?? '';
						?>
						<li class="about-why-us__item about-why-us-card">
							<?php if ($feature_icon && is_array($feature_icon) && !empty($feature_icon['ID'])): ?>
								<div class="about-why-us-card__icon">
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
							<div class="about-why-us-card__content">
								<?php if ($feature_title): ?>
									<h3 class="about-why-us-card__title title-4">
										<?php echo esc_html($feature_title); ?>
									</h3>
								<?php endif; ?>
								<?php if ($feature_descr): ?>
									<div class="about-why-us-card__descr descr">
										<?php echo wp_kses_post($feature_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>