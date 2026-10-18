<section class="section-full section-products" id="section-products">
	<div class="container section-products__container section-gap">


		<?php if (have_posts()): ?>
			<ul class="section-products__cards grid">
				<?php while (have_posts()):
					the_post();
					$product_image_id = get_post_thumbnail_id(get_the_ID());
					$product_descr = get_post_field('post_excerpt', get_the_ID());
					?>
					<li class="section-products__card catalog-card">
						<a class="catalog-card__wrapper-link" href="<?php echo esc_url(get_the_permalink()); ?>">
							<?php if ($product_image_id): ?>
								<div class="catalog-card__image image-box">
									<?php echo wp_get_attachment_image(
										$product_image_id,
										'full',
										false,
										[
											'class' => 'img',
											'alt' => get_the_title(),
											'loading' => 'lazy',
										]
									); ?>
								</div>
							<?php endif; ?>
							<div class="catalog-card__content">
								<h3 class="catalog-card__title title-3">
									<?php echo esc_html(get_the_title()); ?>
								</h3>
								<div class="catalog-card__descr descr icon icon--after icon--arrow-right">
									<?php if ($product_descr): ?>
										<?php echo wp_kses_post($product_descr); ?>
									<?php endif; ?>
								</div>
							</div>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		<?php else: ?>
			<div class="section-products__no-found">
				<h2 class="section-products__no-found-title title-3">
					В этой категории пока нет товаров
				</h2>
				<a class="section-products__no-found-btn btn" href="<?= esc_url(home_url('/shop')) ?>">
					Вернуться в каталог
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>