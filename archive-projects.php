<?php
/*
Template Name: Архив проектов
*/
defined('ABSPATH') || exit;

get_header();
get_template_part('partials/components/hero-page', '', ['page' => 'projects']);

$filter_terms = get_terms([
	'taxonomy' => 'project_cat',
	'hide_empty' => false,
]);

$current_term = is_tax('project_cat') ? get_queried_object() : null;
$current_label = $current_term ? $current_term->name : 'Все работы';
$archive_url = get_post_type_archive_link('projects');
?>
<section class="section projects" id="projects">
	<div class="container projects__container section-gap">
		<div class="projects__filter projects-filter">
			<button class="projects-filter__tab projects-filter__toggle" type="button" data-filter-toggle aria-expanded="false">
				<span class="projects-filter__toggle-text"><?php echo esc_html($current_label); ?></span>
				<span class="projects-filter__toggle-arrow" aria-hidden="true"></span>
			</button>

			<div class="projects-filter__dropdown">
				<div class="projects-filter__list">
					<a class="projects-filter__tab<?php echo !$current_term ? ' is-active' : ''; ?>"
						href="<?php echo esc_url($archive_url); ?>">Все работы</a>
					<?php if (!is_wp_error($filter_terms) && !empty($filter_terms)): ?>
						<?php foreach ($filter_terms as $filter_term):
							$filter_url = get_term_link($filter_term);
							if (is_wp_error($filter_url))
								continue;
							?>
							<a class="projects-filter__tab<?php echo $current_term && $current_term->term_id === $filter_term->term_id ? ' is-active' : ''; ?>"
								href="<?php echo esc_url($filter_url); ?>"><?php echo esc_html($filter_term->name); ?></a>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<?php if (have_posts()): ?>
			<ul class="projects__grid grid">
				<?php while (have_posts()):
					the_post();
					$project_image_id = get_post_thumbnail_id(get_the_ID());
					$project_image_url = $project_image_id ? wp_get_attachment_image_url($project_image_id, 'full') : '';
					?>
					<li class="projects__card projects-card">
						<?php if ($project_image_id && $project_image_url): ?>
							<a class="projects-card__link" href="<?php echo esc_url($project_image_url); ?>" data-fancybox="projects">
								<div class="projects-card__image image-box">
									<?php echo wp_get_attachment_image(
										$project_image_id,
										'full',
										false,
										[
											'class' => 'img',
											'alt' => get_the_title(),
											'loading' => 'lazy',
										]
									); ?>
								</div>
							</a>
						<?php endif; ?>
					</li>
				<?php endwhile; ?>
			</ul>

			<div class="projects__pagination pagination-page">

				<?php
				echo paginate_links([
					'total' => $wp_query->max_num_pages,
					'mid_size' => 1,
					'end_size' => 0,
					'current' => max(1, get_query_var('paged')),
					'prev_text' => '<span class="page-pagination__next page-pagination__prev">Предыдущая<span>',
					'next_text' => '<span class="page-pagination__btn page-pagination__next">Следующая<span>',
				]);
				?>
			</div>
		<?php else: ?>
			<div class="projects-empty section-gap">
				<div class="projects-empty__descr descr">
					Проекты в данной категории отсутствуют
				</div>
				<a class="projects-empty__btn btn" href="<?= esc_url(home_url('/projects/')); ?>">Все работы</a>
			</div>
		<?php endif; ?>
</section>
<?php
get_template_part('partials/cta-section', null, ['page' => get_page_by_path('projects', OBJECT, 'page')]);
get_footer();

?>