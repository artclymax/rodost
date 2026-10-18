<?php
$term = null;

if (!empty($args['term_id'])) {
	$args_term = get_term($args['term_id'], 'product_cat');

	if ($args_term && !is_wp_error($args_term)) {
		$term = $args_term;
	}
}

if (!$term) {
	$queried = get_queried_object();

	if ($queried instanceof WP_Term && $queried->taxonomy === 'product_cat') {
		$term = $queried;
	}
}

if ($term):
	$tasks_title = get_field('cd_tasks_title', $term) ?? '';
	$tasks = get_field('cd_tasks', $term) ?? [];
	$custom_title = get_field('cd_custom_title', $term) ?? '';
	$custom_descr = get_field('cd_custom_descr', $term) ?? '';
	$custom_list = get_field('cd_custom_list', $term) ?? [];
	$materials_title = get_field('cd_materials_title', $term) ?? '';
	$materials_descr = get_field('cd_materials_descr', $term) ?? '';
	$materials_list = get_field('cd_materials_list', $term) ?? [];
	$decor = get_field('cd_decor', $term) ?? null;

	$has_tasks = $tasks_title || !empty($tasks);
	$has_custom = $custom_title || $custom_descr || !empty($custom_list);
	$has_materials = $materials_title || $materials_descr || !empty($materials_list);

	if ($has_tasks || $has_custom || $has_materials):
		?>
		<section class="section-full category-details" id="category-details">
			<div class="container category-details__container section-gap">
				<div class="category-details__columns">
					<?php if ($has_tasks): ?>
						<div class="category-details__column">
							<?php if ($tasks_title): ?>
								<h2 class="category-details__title title-3">
									<?php echo esc_html($tasks_title); ?>
								</h2>
							<?php endif; ?>
							<?php if (!empty($tasks)): ?>
								<ul class="category-details__tasks">
									<?php foreach ($tasks as $task):
										$task_text = $task['task'] ?? '';
										if (!$task_text)
											continue;
										?>
										<li class="category-details__task">
											<?php echo esc_html($task_text); ?>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ($has_custom): ?>
						<div class="category-details__column">
							<?php if ($custom_title): ?>
								<h2 class="category-details__title title-3">
									<?php echo esc_html($custom_title); ?>
								</h2>
							<?php endif; ?>
							<?php if ($custom_descr): ?>
								<div class="category-details__descr descr">
									<?php echo wp_kses_post($custom_descr); ?>
								</div>
							<?php endif; ?>
							<?php if (!empty($custom_list)): ?>
								<ul class="category-details__custom-list">
									<?php foreach ($custom_list as $custom_item):
										$custom_icon = $custom_item['icon'] ?? null;
										$custom_item_title = $custom_item['title'] ?? '';
										if (!$custom_item_title && !($custom_icon && is_array($custom_icon) && !empty($custom_icon['ID'])))
											continue;
										?>
										<li class="category-details__custom-item">
											<?php if ($custom_icon && is_array($custom_icon) && !empty($custom_icon['ID'])): ?>
												<div class="category-details__custom-icon image-box">
													<?php echo wp_get_attachment_image(
														$custom_icon['ID'],
														'full',
														false,
														[
															'class' => 'img',
															'alt' => $custom_icon['alt'] ?: $custom_item_title,
															'loading' => 'lazy',
														]
													); ?>
												</div>
											<?php endif; ?>
											<?php if ($custom_item_title): ?>
												<div class="category-details__custom-title">
													<?php echo esc_html($custom_item_title); ?>
												</div>
											<?php endif; ?>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ($has_materials): ?>
						<div class="category-details__column">
							<?php if ($materials_title): ?>
								<h2 class="category-details__title title-3">
									<?php echo esc_html($materials_title); ?>
								</h2>
							<?php endif; ?>
							<?php if ($materials_descr): ?>
								<div class="category-details__descr descr">
									<?php echo wp_kses_post($materials_descr); ?>
								</div>
							<?php endif; ?>
							<?php if (!empty($materials_list)): ?>
								<ul class="category-details__materials">
									<?php foreach ($materials_list as $material):
										$material_image = $material['image'] ?? null;
										$material_title = $material['title'] ?? '';
										$material_descr = $material['descr'] ?? '';
										if (!$material_title && !$material_descr && !($material_image && is_array($material_image) && !empty($material_image['ID'])))
											continue;
										?>
										<li class="category-details__material">
											<?php if ($material_image && is_array($material_image) && !empty($material_image['ID'])): ?>
												<div class="category-details__material-image image-box">
													<?php echo wp_get_attachment_image(
														$material_image['ID'],
														'full',
														false,
														[
															'class' => 'img',
															'alt' => $material_image['alt'] ?: $material_title,
															'loading' => 'lazy',
														]
													); ?>
												</div>
											<?php endif; ?>
											<div class="category-details__material-content">
												<?php if ($material_title): ?>
													<h3 class="category-details__material-title">
														<?php echo esc_html($material_title); ?>
													</h3>
												<?php endif; ?>
												<?php if ($material_descr): ?>
													<div class="category-details__material-descr descr">
														<?php echo wp_kses_post($material_descr); ?>
													</div>
												<?php endif; ?>
											</div>
										</li>
									<?php endforeach; ?>
								</ul>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
			<?php if ($decor && is_array($decor) && !empty($decor['ID'])): ?>
				<div class="category-details__image image-box" aria-hidden="true">
					<?php echo wp_get_attachment_image(
						$decor['ID'],
						'full',
						false,
						[
							'class' => 'img',
							'alt' => $decor['alt'] ?: 'Декор',
						]
					); ?>
				</div>
			<?php endif; ?>
		</section>
	<?php endif;
endif; ?>