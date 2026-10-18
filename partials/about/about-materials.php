<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('am_title', $page) ?? '';
$descr = get_field('am_descr', $page) ?? '';
$materials = get_field('am_materials', $page) ?? [];
$quality_text = get_field('am_quality_text', $page) ?? '';
$image = get_field('am_image', $page) ?? null;

$materials = array_values(array_filter($materials, function ($material) {
	return !empty($material['material']);
}));

$has_image = $image && is_array($image) && !empty($image['ID']);

if ($title || $descr || !empty($materials) || $quality_text || $has_image):
	?>
	<section class="section about-materials" id="about-materials">
		<div class="container about-materials__container">
			<div class="about-materials__content">
				<?php if ($title): ?>
					<h2 class="about-materials__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($descr): ?>
					<div class="about-materials__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>

				<?php if (!empty($materials)): ?>
					<ul class="about-materials__list">
						<?php foreach ($materials as $material): ?>
							<li class="about-materials__item">
								<?php echo esc_html($material['material']); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endif; ?>

				<?php if ($quality_text): ?>
					<div class="about-materials__quality quality-box icon icon--quality"
						style="--icon-bg: url('<?= esc_url(get_template_directory_uri() . '/assets/images/icons/quality.svg') ?>')">
						<div class="quality-box__text descr">
							<?php echo wp_kses_post($quality_text); ?>
						</div>
					</div>
				<?php endif; ?>
			</div>

			<?php if ($has_image): ?>
				<div class="about-materials__image image-box">
					<?php echo wp_get_attachment_image(
						$image['ID'],
						'full',
						false,
						[
							'class' => 'img',
							'alt' => $image['alt'] ?: $title,
							'loading' => 'lazy',
						]
					); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>