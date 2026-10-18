<?php
$services_query = new WP_Query([
	'post_type' => 'services',
	'post_status' => 'publish',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
]);

if ($services_query->have_posts()):
	?>
	<section class="section services" id="services">
		<div class="container services__container">
			<ul class="services__cards grid">
				<?php while ($services_query->have_posts()):
					$services_query->the_post();
					$service_icon = get_field('service_icon', get_the_ID()) ?? null;
					$service_descr = get_the_excerpt() ?? '';
					?>
					<li class="services__card services-card">

						<a class="services-card__wrapper-link" href="<?php the_permalink() ?>">

							<?php if ($service_icon && is_array($service_icon) && !empty($service_icon['ID'])): ?>
								<div class="services-card__icon">
									<?php echo wp_get_attachment_image(
										$service_icon['ID'],
										'full',
										false,
										[
											'class' => 'img',
											'alt' => $service_icon['alt'] ?: get_the_title(),
											'loading' => 'lazy',
										]
									); ?>
								</div>
							<?php endif; ?>

							<h3 class="services-card__title title-3">
								<?php echo esc_html(get_the_title()); ?>
							</h3>

							<?php if ($service_descr): ?>
								<div class="services-card__descr descr icon icon--after icon--arrow-right">
									<?php echo wp_kses_post($service_descr); ?>
								</div>
							<?php endif; ?>
						</a>

					</li>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</ul>
		</div>
	</section>
<?php endif; ?>