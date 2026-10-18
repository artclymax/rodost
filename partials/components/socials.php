<?php
$class = $args['class'] ?? '';
$socials = get_field('contacts_socials', 'option') ?? [];

if (!empty($socials)):
	?>
	<ul class="socials <?= esc_attr($class) ?>">
		<?php foreach ($socials as $item): ?>
			<li class="socials__item">
				<a class="socials__link link-icon" href="<?= esc_attr($item['link']['url']) ?>" target="_blank"
					aria-label="<?= esc_attr($item['link']['title']) ?>">
					<?php echo wp_get_attachment_image(
						$item['icon']['ID'],
						'large',
						false,
						array(
							'class' => 'img',
							'alt' => $item['icon']['alt'] ?: ''
						)
					); ?>
				</a>
			</li>
		<?php endforeach; ?>
	</ul>
<?php endif; ?>