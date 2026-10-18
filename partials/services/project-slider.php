<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('ps_title', $page) ?: 'Наши работы';
$btn = get_field('ps_btn', $page) ?? [];
$selected_ids = get_field('ps_projects', $page) ?? [];

if (empty($btn['url'])) {
	$btn = [
		'url' => get_post_type_archive_link('projects'),
		'title' => 'Смотреть все работы',
	];
}


if (!empty($selected_ids)) {
	$projects_query = new WP_Query([
		'post_type' => 'projects',
		'post_status' => 'publish',
		'posts_per_page' => -1,
		'post__in' => $selected_ids,
		'orderby' => 'post__in',
	]);
} else {
	$projects_query = new WP_Query([
		'post_type' => 'projects',
		'post_status' => 'publish',
		'posts_per_page' => 3,
		'orderby' => 'date',
		'order' => 'DESC',
	]);
}

$projects = [];

while ($projects_query->have_posts()):
	$projects_query->the_post();
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

if ($title || (!empty($btn) && !empty($btn['url'])) || !empty($projects)):
	?>
	<section class="section project-slider" id="project-slider">
		<div class="container project-slider__container section-gap">
			<div class="project-slider__header">
				<?php if ($title): ?>
					<h2 class="project-slider__title title-2"><?php echo esc_html($title); ?></h2>
				<?php endif; ?>
				<?php if (!empty($btn) && !empty($btn['url'])): ?>
					<a class="project-slider__btn btn btn--stroke hidden-mobile" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>><?php echo esc_html($btn['title']); ?></a>
				<?php endif; ?>
			</div>

			<?php if (!empty($projects)): ?>
				<div class="swiper-slider">
					<div class="swiper project-slider-swiper"
						data-swiper='{ "slidesPerView": 1, "spaceBetween": 20, "rewind": true, "breakpoints": { "640": { "slidesPerView": 2, "spaceBetween": 20 }, "1024": { "slidesPerView": 3, "spaceBetween": 24 } } }'>
						<div class="swiper-wrapper project-slider-swiper__wrapper">
							<?php foreach ($projects as $project): ?>
								<div class="swiper-slide project-slider-swiper__slide">
									<a class="project-slider-card" href="<?php echo esc_url($project['image_url']); ?>"
										data-fancybox="projects" data-caption="<?php echo esc_attr($project['title']); ?>">
										<div class="project-slider-card__image image-box">
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
										</div>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<div class="swiper-pagination project-slider-swiper__pagination"
						data-swiper-pagination=".project-slider-swiper"></div>
				</div>
			<?php endif; ?>

			<?php if (!empty($btn) && !empty($btn['url'])): ?>
				<a class="project-slider__btn btn btn--stroke visible-mobile" href="<?php echo esc_url($btn['url']); ?>" <?php if (!empty($btn['target'])): ?> target="<?php echo esc_attr($btn['target']); ?>" <?php endif; ?>><?php echo esc_html($btn['title']); ?></a>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>