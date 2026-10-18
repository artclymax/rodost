<?php
global $product;

if (!is_a($product, 'WC_Product')) {
	$product = function_exists('wc_get_product') ? wc_get_product(get_the_ID()) : null;
}

if ($product):
	$product_id = $product->get_id();

	$tasks_title = get_field('pd_tasks_title', $product_id) ?? '';
	$tasks = get_field('pd_tasks', $product_id) ?? [];
	$variants_title = get_field('pd_variants_title', $product_id) ?? '';
	$variants_descr = get_field('pd_variants_descr', $product_id) ?? '';
	$variants = get_field('pd_variants', $product_id) ?? [];
	$materials_title = get_field('pd_materials_title', $product_id) ?? '';
	$materials_descr = get_field('pd_materials_descr', $product_id) ?? '';
	$materials_list = get_field('pd_materials_list', $product_id) ?? [];
	$custom_title = get_field('pd_custom_title', $product_id) ?? '';
	$custom_descr = get_field('pd_custom_descr', $product_id) ?? '';
	$custom_list = get_field('pd_custom_list', $product_id) ?? [];
	$form_title = get_field('pd_form_title', $product_id) ?: 'Заказать расчёт изделия';
	$form = get_field('pd_form', $product_id) ?: '[contact-form-7 id="244c2eb" title="Заказать расчёт изделия"]';

	$has_tasks = $tasks_title || !empty($tasks);
	$has_variants = $variants_title || $variants_descr || !empty($variants);
	$has_materials = $materials_title || $materials_descr || !empty($materials_list);
	$has_custom = $custom_title || $custom_descr || !empty($custom_list);
	$has_form = $form_title || $form;

	if ($has_tasks || $has_variants || $has_materials || $has_custom || $has_form):
		?>
		<section class="product-details" id="product-details">
			<div class="container product-details__container">
				<?php if ($has_tasks || $has_variants): ?>
					<div class="product-details__row product-details__row-top">
						<?php if ($has_tasks): ?>
							<div class="product-details__column product-details__tasks">
								<?php if ($tasks_title): ?>
									<h2 class="category-details__title title-3"><?php echo esc_html($tasks_title); ?></h2>
								<?php endif; ?>
								<?php if (!empty($tasks)): ?>
									<ul class="category-details__tasks">
										<?php foreach ($tasks as $task):
											$task_text = $task['task'] ?? '';
											if (!$task_text)
												continue;
											?>
											<li class="category-details__task"><?php echo esc_html($task_text); ?></li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if ($has_variants): ?>
							<div class="product-details__column product-details__column--variants">
								<?php if ($variants_title): ?>
									<h2 class="category-details__title title-3"><?php echo esc_html($variants_title); ?></h2>
								<?php endif; ?>
								<?php if ($variants_descr): ?>
									<div class="category-details__descr descr"><?php echo wp_kses_post($variants_descr); ?></div>
								<?php endif; ?>
								<?php if (!empty($variants)): ?>
									<ul class="product-details__variants grid">
										<?php foreach ($variants as $variant):
											$variant_icon = $variant['icon'] ?? null;
											$variant_title = $variant['title'] ?? '';
											if (!$variant_title && !($variant_icon && is_array($variant_icon) && !empty($variant_icon['ID'])))
												continue;
											?>
											<li class="product-details__variant">
												<?php if ($variant_icon && is_array($variant_icon) && !empty($variant_icon['ID'])): ?>
													<div class="product-details__variant-icon image-box">
														<?php echo wp_get_attachment_image(
															$variant_icon['ID'],
															'full',
															false,
															[
																'class' => 'img',
																'alt' => $variant_icon['alt'] ?: $variant_title,
																'loading' => 'lazy',
															]
														); ?>
													</div>
												<?php endif; ?>
												<?php if ($variant_title): ?>
													<div class="product-details__variant-title"><?php echo esc_html($variant_title); ?></div>
												<?php endif; ?>
											</li>
										<?php endforeach; ?>
									</ul>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>

				<?php if ($has_materials || $has_custom || $has_form): ?>
					<div class="product-details__row product-details__row-bottom">
						<?php if ($has_materials || $has_custom): ?>
							<div class="product-details__column product-details__column--materials">
								<?php if ($has_materials): ?>
									<div class="product-details__block product-details__block--materials">
										<?php if ($materials_title): ?>
											<h2 class="category-details__title title-3"><?php echo esc_html($materials_title); ?></h2>
										<?php endif; ?>
										<?php if ($materials_descr): ?>
											<div class="category-details__descr descr"><?php echo wp_kses_post($materials_descr); ?></div>
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
																<h3 class="category-details__material-title"><?php echo esc_html($material_title); ?></h3>
															<?php endif; ?>
															<?php if ($material_descr): ?>
																<div class="category-details__material-descr descr"><?php echo wp_kses_post($material_descr); ?>
																</div>
															<?php endif; ?>
														</div>
													</li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								<?php endif; ?>

								<?php if ($has_custom): ?>
									<div class="product-details__block product-details__block--custom">
										<?php if ($custom_title): ?>
											<h2 class="category-details__title title-3"><?php echo esc_html($custom_title); ?></h2>
										<?php endif; ?>
										<?php if ($custom_descr): ?>
											<div class="category-details__descr descr"><?php echo wp_kses_post($custom_descr); ?></div>
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
															<div class="category-details__custom-title"><?php echo esc_html($custom_item_title); ?></div>
														<?php endif; ?>
													</li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>

						<?php if ($form): ?>
							<div class="product-details__column product-details__column--form">
								<?php if ($form_title): ?>
									<h2 class="product-details__form-title title-2"><?php echo esc_html($form_title); ?></h2>
								<?php endif; ?>
								<?php if ($form): ?>
									<div class="product-details__form">
										<div class="meta-product-name" style="display:none"><?= get_the_title() ?>
										</div>
										<div class="meta-product-page" style="display:none">
											<?= get_permalink() ?>
										</div>
										<?php echo do_shortcode($form); ?>
									</div>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif;
endif; ?>