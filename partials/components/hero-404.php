<?php
$title = get_field('page_404_title', 'option') ?? '';
$descr = get_field('page_404_descr', 'option') ?? '';
$btn = get_field('page_404_btn', 'option') ?? [];
$image = get_field('page_404_image', 'option') ?? null;
$image_mobile = get_field('page_404_image_mobile', 'option') ?? null;

if (empty($btn['url'])) {
	$btn = [
		'url' => home_url('/'),
		'title' => 'На главную',
	];
}

$has_image = ($image && is_array($image) && !empty($image['ID'])) || ($image_mobile && is_array($image_mobile) && !empty($image_mobile['ID']));
?>
<section class="page-404" id="page-404">
	<div class="container page-404__container section-gap">
		<div class="page-404__content">
			<div class="page-404__number" aria-hidden="true">
				<svg width="229" height="97" viewBox="0 0 229 97" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path
						d="M41.1531 95.06V79.6693H0V65.1193L29.736 1.94H47.4745L17.7384 65.1193H41.1531V40.8693H56.892V65.1193H65.5999V79.6693H56.892V95.06H41.1531Z"
						fill="#383F45" />
					<path
						d="M114.48 97C107.901 97 102.096 95.5989 97.0644 92.7967C92.0332 89.9513 88.0985 86.0067 85.2603 80.9627C82.4652 75.9187 81.0676 70.0987 81.0676 63.5027V33.4973C81.0676 26.9013 82.4652 21.0813 85.2603 16.0373C88.0985 10.9933 92.0332 7.07022 97.0644 4.268C102.096 1.42267 107.901 0 114.48 0C121.06 0 126.843 1.42267 131.832 4.268C136.863 7.07022 140.798 10.9933 143.636 16.0373C146.474 21.0813 147.893 26.9013 147.893 33.4973V63.5027C147.893 70.0987 146.474 75.9187 143.636 80.9627C140.798 86.0067 136.863 89.9513 131.832 92.7967C126.843 95.5989 121.06 97 114.48 97ZM114.48 82.1913C117.749 82.1913 120.716 81.4153 123.382 79.8633C126.048 78.2682 128.155 76.1558 129.703 73.526C131.251 70.8531 132.025 67.8784 132.025 64.602V32.3333C132.025 29.0138 131.251 26.0391 129.703 23.4093C128.155 20.7364 126.048 18.624 123.382 17.072C120.716 15.4769 117.749 14.6793 114.48 14.6793C111.212 14.6793 108.245 15.4769 105.579 17.072C102.913 18.624 100.806 20.7364 99.2576 23.4093C97.7095 26.0391 96.9354 29.0138 96.9354 32.3333V64.602C96.9354 67.8784 97.7095 70.8531 99.2576 73.526C100.806 76.1558 102.913 78.2682 105.579 79.8633C108.245 81.4153 111.212 82.1913 114.48 82.1913Z"
						fill="#383F45" />
					<path
						d="M204.553 95.06V79.6693H163.4V65.1193L193.136 1.94H210.875L181.139 65.1193H204.553V40.8693H220.292V65.1193H229V79.6693H220.292V95.06H204.553Z"
						fill="#383F45" />
				</svg>
			</div>

			<?php if ($title): ?>
				<h1 class="page-404__title title-1"><?php echo esc_html($title); ?></h1>
			<?php endif; ?>

			<?php if ($descr): ?>
				<div class="page-404__descr descr"><?php echo wp_kses_post($descr); ?></div>
			<?php endif; ?>

			<?php if (!empty($btn) && !empty($btn['url'])): ?>
				<a class="page-404__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?>
						target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>><?php echo esc_html($btn['title']); ?></a>
			<?php endif; ?>
		</div>

		<?php if ($has_image): ?>
			<div class="page-404__image image-box">
				<?php if ($image && is_array($image) && !empty($image['ID'])): ?>
					<?php echo wp_get_attachment_image(
						$image['ID'],
						'full',
						false,
						[
							'class' => 'page-404__img-big' . (!empty($image_mobile['ID']) ? ' hidden-mobile' : ''),
							'alt' => $image['alt'] ?: $title,
							'loading' => 'eager',
						]
					); ?>
				<?php endif; ?>
				<?php if ($image_mobile && is_array($image_mobile) && !empty($image_mobile['ID'])): ?>
					<?php echo wp_get_attachment_image(
						$image_mobile['ID'],
						'full',
						false,
						[
							'class' => 'page-404__img-small visible-mobile',
							'alt' => $image_mobile['alt'] ?: $title,
							'loading' => 'eager',
						]
					); ?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</section>