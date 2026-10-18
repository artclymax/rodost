<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('sa_title', $page) ?? '';
$descr = get_field('sa_descr', $page) ?? '';
$btn = get_field('sa_btn', $page) ?? [];
$image = get_field('sa_image', $page) ?? null;

if ($title || $descr || (!empty($btn) && !empty($btn['url'])) || ($image && is_array($image) && !empty($image['ID']))):
	?>
	<section class="section-full service-about" id="service-about">
		<div class="container service-about__container">
			<?php if ($image && is_array($image) && !empty($image['ID'])): ?>
				<div class="service-about__image image-box">
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

			<div class="service-about__content">
				<?php if ($title): ?>
					<h2 class="service-about__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>

				<?php if ($descr): ?>
					<div class="service-about__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>

				<?php if (!empty($btn) && !empty($btn['url'])): ?>
					<a class="service-about__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>"
						<?php endif; ?>>
						<?php echo esc_html($btn['title']); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
	</section>
<?php endif; ?>