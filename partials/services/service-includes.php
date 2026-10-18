<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('si_title', $page) ?? '';
$list = get_field('si_list', $page) ?? [];
$bg = get_field('si_bg', $page) ?? null;

if ($list) {

	$list = array_values(array_filter($list, function ($item) {
		$item_title = $item['title'] ?? '';
		$item_descr = $item['descr'] ?? '';
		$item_icon = $item['icon'] ?? null;

		return $item_title || $item_descr || ($item_icon && is_array($item_icon) && !empty($item_icon['ID']));
	}));
}
$has_bg = $bg && is_array($bg) && !empty($bg['ID']);

if ($title || !empty($list) || $has_bg):
	?>
	<section class="section-full service-includes" id="service-includes">
		<div class="container service-includes__container section-gap">
			<?php if ($title): ?>
				<h2 class="service-includes__title title-2">
					<?php echo esc_html($title); ?>
				</h2>
			<?php endif; ?>

			<?php if (!empty($list)): ?>
				<ul class="service-includes__list">
					<?php foreach ($list as $item):
						$item_icon = $item['icon'] ?? null;
						$item_title = $item['title'] ?? '';
						$item_descr = $item['descr'] ?? '';
						?>
						<li class="service-includes__item service-includes-item">
							<?php if ($item_icon && is_array($item_icon) && !empty($item_icon['ID'])): ?>
								<div class="service-includes-item__icon">
									<?php echo wp_get_attachment_image(
										$item_icon['ID'],
										'full',
										false,
										[
											'class' => 'img',
											'alt' => $item_icon['alt'] ?: $item_title,
											'loading' => 'lazy',
										]
									); ?>
								</div>
							<?php endif; ?>
							<?php if ($item_title): ?>
								<h3 class="service-includes-item__title title-3">
									<?php echo esc_html($item_title); ?>
								</h3>
							<?php endif; ?>
							<?php if ($item_descr): ?>
								<div class="service-includes-item__descr descr">
									<?php echo wp_kses_post($item_descr); ?>
								</div>
							<?php endif; ?>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>

		<?php if ($has_bg): ?>
			<div class="service-includes__bg image-box" aria-hidden="true">
				<?php echo wp_get_attachment_image(
					$bg['ID'],
					'full',
					false,
					[
						'class' => 'img',
						'alt' => $bg['alt'] ?: 'Декор',
						'loading' => 'lazy',
					]
				); ?>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>