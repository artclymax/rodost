<?php
$page = 'option';

// Основные поля
$descr = get_field('footer_descr', $page) ?: get_bloginfo('description');
$copy = get_field('footer_copy', $page) ?? '';
$company = get_field('footer_company', $page) ?: get_bloginfo('name');

// Контакты
$address = get_field('contacts_address', $page) ?? '';
$time = get_field('contacts_time', $page) ?? '';
$contacts_info = get_field('contacts_info', $page) ?? '';

// Ссылки внизу
$links = get_field('footer_links', $page) ?? [];
?>
<footer class="footer" id="footer">
	<div class="footer__container container">
		<!-- TOP: 4 колонки -->
		<div class="footer__top">

			<!-- INFO -->
			<div class="footer__info">
				<div class="footer__logo logo">
					<?php mx_logo(); ?>
				</div>
				<?php if ($descr): ?>
					<div class="footer__descr descr">
						<?php echo wp_kses_post($descr); ?>
					</div>
				<?php endif; ?>
				<?php get_template_part('partials/components/socials'); ?>
			</div>

			<!-- MENU: Каталог -->
			<nav class="footer__menu footer-col">
				<h3 class="footer-col__title title-4">Каталог изделий</h3>
				<?php
				wp_nav_menu([
					'theme_location' => 'products-menu',
					'container' => false,
					'menu_class' => 'footer-menu footer-menu--grid',
					'depth' => 1,
					'fallback_cb' => false,
				]);
				?>
			</nav>

			<!-- MENU: Компания -->
			<nav class="footer__menu footer-col">
				<h3 class="footer-col__title title-4">Компания</h3>
				<?php
				wp_nav_menu([
					'theme_location' => 'footer-menu',
					'container' => false,
					'menu_class' => 'footer-menu',
					'depth' => 1,
					'fallback_cb' => false,
				]);
				?>
			</nav>

			<!-- CONTACTS -->
			<div class="footer__menu footer-col">
				<h3 class="footer-col__title title-4">Контакты</h3>
				<div class="footer-col__contacts">
					<?php get_template_part('partials/components/phones'); ?>
					<?php get_template_part('partials/components/emails'); ?>

					<?php if ($address): ?>
						<?php get_template_part('partials/components/address', null, [
							'descr' => $address,
							'is_address' => true,
							'class' => 'icon icon--address'
						]); ?>
					<?php endif; ?>

					<?php if ($time): ?>
						<?php get_template_part('partials/components/address', null, [
							'descr' => $time,
							'class' => 'icon icon--time'
						]); ?>
					<?php endif; ?>

					<?php if ($contacts_info): ?>
						<small class="footer-col__contacts-info">
							<?php echo esc_html($contacts_info); ?>
						</small>
					<?php endif; ?>
				</div>
			</div>
		</div>

		<!-- BOTTOM -->
		<div class="footer__bottom">

			<?php if ($copy || $company): ?>
				<div class="footer__copy">
					&copy; <?php echo date('Y') . ' ' . esc_html($company); ?>
					<?php if ($copy): ?>
						<?php echo '. ' . esc_html($copy); ?>
					<?php endif; ?>
				</div>
			<?php endif; ?>

			<?php if (!empty($links)): ?>
				<div class="footer__links">
					<?php foreach ($links as $item): ?>
						<?php
						$link = $item['footer_links_link'] ?? [];
						if (empty($link['url']))
							continue;
						?>
						<a class="footer__link" href="<?php echo esc_url($link['url']); ?>" target="_blank">
							<?php echo esc_html($link['title'] ?? ''); ?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>