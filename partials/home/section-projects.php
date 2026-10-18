<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('sp_title', $page) ?? 'Примеры выполненных заказов';
$descr = get_field('sp_descr', $page) ?? '';
$btn = get_field('sp_btn', $page) ?? [];
$selected_ids = get_field('sp_projects', $page) ?? [];

if (!empty($selected_ids)) {
	$project_query = new WP_Query([
		'post_type' => 'projects',
		'post_status' => 'publish',
		'posts_per_page' => 5,
		'post__in' => $selected_ids,
		'orderby' => 'post__in',
	]);
} else {
	$project_query = new WP_Query([
		'post_type' => 'projects',
		'post_status' => 'publish',
		'posts_per_page' => 5,
		'orderby' => 'date',
		'order' => 'DESC',
	]);
}

$projects = [];

while ($project_query->have_posts()):
	$project_query->the_post();
	$project_image_id = get_post_thumbnail_id(get_the_ID());

	if (!$project_image_id)
		continue;

	$projects[] = [
		'title' => get_the_title(),
		'image_id' => $project_image_id,
		'image_url' => wp_get_attachment_image_url($project_image_id, 'full'),
	];
endwhile;

wp_reset_postdata();

if ($title || $descr || (!empty($btn) && !empty($btn['url'])) || !empty($projects)):
	?>
	<section class="section section-projects" id="section-projects">
		<div class="container section-projects__container section-gap">
			<div class="section-projects__header">
				<?php get_template_part('partials/section-header', null, [
					'title' => $title,
					'descr' => $descr,
				]); ?>
				<?php if (!empty($btn) && !empty($btn['url'])): ?>
					<a class="section-projects__btn btn btn--stroke hidden-mobile" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
				<?php echo esc_attr($btn['target']); ?>"
						<?php endif; ?>>
						<?php echo esc_html($btn['title']); ?>
					</a>
				<?php endif; ?>
			</div>

			<?php if (!empty($projects)): ?>
				<ul class="section-projects__grid grid hidden-mobile">
					<?php foreach ($projects as $project): ?>
						<li class="section-projects__item project-card">
							<a class="project-card__image image-box" href="<?php echo esc_url($project['image_url']); ?>"
								data-fancybox="section-projects">
								<?php echo wp_get_attachment_image(
									$project['image_id'],
									'full',
									false,
									[
										'class' => 'img',
										'alt' => $project['title'],
										'loading' => 'lazy',
									]
								); ?>
							</a>
						</li>
					<?php endforeach; ?>
				</ul>

				<div class="swiper-slider visible-mobile">
					<div class="swiper projects-swiper"
						data-swiper='{ "slidesPerView": 1, "spaceBetween": 20, "rewind": true, "breakpoints": { "640": { "slidesPerView": 1.5, "spaceBetween": 20 }, "768": { "slidesPerView": 2, "spaceBetween": 20 } } }'>
						<div class="swiper-wrapper projects-swiper__wrapper">
							<?php foreach ($projects as $project): ?>
								<div class="swiper-slide projects-swiper__slide">
									<div class="project-card">
										<a class="project-card__image image-box" href="<?php echo esc_url($project['image_url']); ?>"
											data-fancybox="section-projects-mobile">
											<?php echo wp_get_attachment_image(
												$project['image_id'],
												'full',
												false,
												[
													'class' => 'img',
													'alt' => $project['title'],
													'loading' => 'lazy',
												]
											); ?>
										</a>
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="swiper-pagination swiper-slider__pagination" data-swiper-pagination=".projects-swiper"></div>
				</div>
			<?php endif; ?>

			<?php if (!empty($btn) && !empty($btn['url'])): ?>
				<a class="section-projects__btn btn btn--stroke visible-mobile" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="
			<?php echo esc_attr($btn['target']); ?>"
					<?php endif; ?>>
					<?php echo esc_html($btn['title']); ?>
				</a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>