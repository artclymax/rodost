<?php
$class = $args['class'] ?? '';
$page = $args['page'] ?? get_queried_object();
$home_page = get_page_by_path('home', OBJECT, 'page');

$title = get_field('os_title', $page) ?: get_field('os_title', $home_page) ?? '';
$descr = get_field('os_descr', $page) ?: get_field('os_descr', $home_page) ?? '';
$steps = get_field('os_steps', $page) ?: get_field('os_steps', $home_page) ?? [];
$btn = get_field('os_btn', $page) ?: get_field('os_btn', $home_page) ?? [];
$note = get_field('os_note', $page) ?: get_field('os_note', $home_page) ?? '';

if ($title || $descr || !empty($steps) || (!empty($btn) && !empty($btn['url'])) || $note):
	?>
	<section class="section order-steps <?= esc_attr($class) ?>" id="order-steps">
		<div class="container order-steps__container section-gap">
			<div class="order-steps__header">
				<?php if ($title): ?>
					<h2 class="order-steps__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>
				<?php if ($descr): ?>
					<div class="order-steps__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>
			</div>

			<?php if (!empty($steps)): ?>
				<ul class="order-steps__list">
					<?php foreach ($steps as $index => $step):
						$step_icon = $step['icon'] ?? null;
						$step_title = $step['title'] ?? '';
						$step_descr = $step['descr'] ?? '';
						if (!$step_title && !$step_descr && !($step_icon && is_array($step_icon) && !empty($step_icon['ID'])))
							continue;
						$number = ++$index > 9 ? $index : '0' . $index;
						?>
						<li class="order-steps__item order-steps-item">
							<div class="order-steps-item__counter">
								<span class="order-steps-item__number">
									<?php echo esc_html($number); ?> /
								</span>
								<?php if ($step_icon && is_array($step_icon) && !empty($step_icon['ID'])): ?>
									<div class="order-steps-item__icon">
										<?php echo wp_get_attachment_image(
											$step_icon['ID'],
											'full',
											false,
											[
												'class' => 'img',
												'alt' => $step_icon['alt'] ?: $step_title,
												'loading' => 'lazy',
											]
										); ?>
									</div>
								<?php endif; ?>
							</div>
							<div class="order-steps-item__info">
								<?php if ($step_title): ?>
									<h3 class="order-steps-item__title title-3">
										<?php echo esc_html($step_title); ?>
									</h3>
								<?php endif; ?>
								<?php if ($step_descr): ?>
									<div class="order-steps-item__descr descr">
										<?php echo wp_kses_post($step_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

			<?php if ((!empty($btn) && !empty($btn['url'])) || $note): ?>
				<div class="order-steps__btn-box">
					<?php if (!empty($btn) && !empty($btn['url'])): ?>
						<a class="order-steps__btn btn" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>>
							<?php echo esc_html($btn['title']); ?>
						</a>
					<?php endif; ?>
					<?php if ($note): ?>
						<p class="order-steps__note">
							<?php echo esc_html($note); ?>
						</p>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>