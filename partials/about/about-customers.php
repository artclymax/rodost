<?php
$page = $args['page'] ?? get_queried_object();

$title = get_field('ac_title', $page) ?? '';
$customers = get_field('ac_customers', $page) ?? [];

$customers = array_values(array_filter($customers, function ($customer) {
	$customer_title = $customer['title'] ?? '';
	$customer_descr = $customer['descr'] ?? '';
	$customer_icon = $customer['icon'] ?? null;

	return $customer_title || $customer_descr || ($customer_icon && is_array($customer_icon) && !empty($customer_icon['ID']));
}));

if ($title || !empty($customers)):
	?>
	<section class="section about-customers" id="about-customers">
		<div class="container about-customers__container section-gap">
			<?php get_template_part('partials/section-header', null, [
				'title' => $title,
			]); ?>

			<?php if (!empty($customers)): ?>
				<ul class="about-customers__list grid">
					<?php foreach ($customers as $customer):
						$customer_icon = $customer['icon'] ?? null;
						$customer_title = $customer['title'] ?? '';
						$customer_descr = $customer['descr'] ?? '';
						?>
						<li class="about-customers__item customer-card">
							<?php if ($customer_icon && is_array($customer_icon) && !empty($customer_icon['ID'])): ?>
								<div class="customer-card__icon">
									<?php echo wp_get_attachment_image(
										$customer_icon['ID'],
										'full',
										false,
										[
											'class' => 'img',
											'alt' => $customer_icon['alt'] ?: $customer_title,
											'loading' => 'lazy',
										]
									); ?>
								</div>
							<?php endif; ?>
							<div class="customer-card__content">
								<?php if ($customer_title): ?>
									<h3 class="customer-card__title title-4">
										<?php echo esc_html($customer_title); ?>
									</h3>
								<?php endif; ?>
								<?php if ($customer_descr): ?>
									<div class="customer-card__descr descr">
										<?php echo wp_kses_post($customer_descr); ?>
									</div>
								<?php endif; ?>
							</div>
						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>