<?php
$page = 'option';

$class = $args['class'] ?? '';
$phone = get_field('header_phone', $page) ?: get_field('contacts_phones', $page)[0]['phone'] ?? [];
$logo_descr = get_field('header_descr', $page) ?? [];
$btn = get_field('header_btn', $page) ?? [];
$cart_count = WC()->cart->get_cart_contents_count();
?>

<header class="header <?= esc_attr($class) ?>" data-auto-calc="header, height">
	<div class="container header__container">
		<div class="header__logo-box">
			<div class="header__logo logo">
				<?php mx_logo(); ?>
			</div>
			<div class="header__logo-descr descr">
				<?php echo wp_kses_post($logo_descr) ?>
			</div>
		</div>
		<nav class="header__menu header-menu">
			<div class="header-menu__main-menu">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'container' => false,
					'menu_class' => 'header-menu__list',
					'fallback_cb' => false,
					'depth' => 1
				));
				?>
			</div>
			<div class="header-menu__btn-box">
				<?php if (!empty($phone)): ?>
					<a class="header-menu__phone link" href="tel:+<?php echo esc_attr(correct_phone($phone)) ?>">
						<?php echo esc_html($phone) ?>
					</a>
				<?php endif; ?>
				<?php if (!empty($btn)): ?>
					<a class="header-menu__btn btn" href="<?php echo esc_url($btn['url']) ?>">
						<?php echo esc_html($btn['title']) ?>
					</a>
				<?php endif; ?>
			</div>
		</nav>
		<!-- BURGER -->
		<button class="header__burger-btn burger-btn visible-tablet" type="button" aria-label="Открыть/закрыть меню">
			<span></span>
		</button>

	</div>
</header>