<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('ba_title', $page) ?? '';
$text = get_field('ba_text', $page) ?? '';
$image = get_field('ba_image', $page) ?? null;

if ($title || $text || ($image && is_array($image) && !empty($image['ID']))):
	?>
	<section class="section block-about" id="block-about">
		<div class="container block-about__container section-grid">
			<?php if ($image && is_array($image) && !empty($image['ID'])): ?>
				<div class="block-about__image image-box">
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

			<div class="block-about__content">
				<?php if ($title): ?>
					<h2 class="block-about__title title-2"><?php echo esc_html($title); ?></h2>
				<?php endif; ?>

				<?php if ($text): ?>
					<div class="block-about__text descr"><?php echo wp_kses_post($text); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>