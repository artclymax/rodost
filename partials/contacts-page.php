<?php
$title = get_field('contacts_title', 'option') ?? '';
$phones = get_field('contacts_phones', 'option') ?? [];
$emails = get_field('contacts_emails', 'option') ?? [];
$address = get_field('contacts_address', 'option') ?? '';
$time = get_field('contacts_time', 'option') ?? '';
$info = get_field('contacts_info', 'option') ?? '';
$map = get_field('contacts_map', 'option') ?? '';
$company = get_field('contacts_company', 'option') ?? '';
$unp = get_field('contacts_unp', 'option') ?? '';
$ur_address = get_field('contacts_ur_address', 'option') ?? '';
$payment = get_field('contacts_payment', 'option') ?? '';
$bank = get_field('contacts_bank', 'option') ?? '';
$payment_image = get_field('contacts_payment_image', 'option') ? get_field('contacts_payment_image', 'option')['url'] : null;

$map_allowed_html = [
	'iframe' => [
		'src' => true,
		'width' => true,
		'height' => true,
		'frameborder' => true,
		'allowfullscreen' => true,
		'loading' => true,
	],
];

$has_req = $company || $unp || $ur_address || $payment || $bank;

if ($title || !empty($phones) || !empty($emails) || $address || $time || $info || $map):
	?>
	<section class="section-full contacts-page" id="contacts-page">
		<div class="container contacts-page__container">
			<div class="contacts-page__card contacts-page-card">
				<?php if ($title): ?>
					<h2 class="contacts-page-card__title title-2">
						<?php echo esc_html($title); ?>
					</h2>
				<?php endif; ?>
				<div class="contacts-page-card__list">
					<?php if (!empty($phones)): ?>
						<div class="contacts-page-card__block icon icon--phone">
							<div class="contacts-page-card__block-box">
								<div class="contacts-page-card__label">Телефоны:</div>
								<?php get_template_part('partials/components/phones', null, ['class' => 'contacts-page__list']); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if (!empty($emails)): ?>
						<div class="contacts-page-card__block icon icon--email">
							<div class="contacts-page-card__block-box">
								<div class="contacts-page-card__label ">E-mail:</div>
								<?php get_template_part('partials/components/emails', null, ['class' => 'contacts-page__list']); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ($address): ?>
						<div class="contacts-page-card__block icon icon--address">
							<div class="contacts-page-card__block-box">
								<div class="contacts-page-card__label">Адрес производства:</div>
								<?php get_template_part('partials/components/address', null, [
									'descr' => $address,
									'is_address' => true,
									'class' => 'contacts-page__address',
								]); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ($time): ?>
						<div class="contacts-page-card__block icon icon--time">
							<div class="contacts-page-card__block-box">
								<div class="contacts-page-card__label">Время работы:</div>
								<?php get_template_part('partials/components/address', null, [
									'descr' => $time,
									'is_address' => false,
									'class' => 'contacts-page__time',
								]); ?>
							</div>
						</div>
					<?php endif; ?>

					<?php if ($info): ?>
						<div class="contacts-page-card__info">
							<?php echo esc_html($info); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<?php if ($map): ?>
				<div class="contacts-page__map">
					<?php echo wp_kses($map, $map_allowed_html); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<?php if ($has_req): ?>
	<section class="section-full contacts-requisites" id="contacts-requisites">
		<div class="container contacts-requisites__container">
			<div class="contacts-requisites__wrapper" style="background-image: url('<?= esc_url($payment_image); ?>');">
				<div class="contacts-requisites__head icon icon--docs">
					<div class="contacts-requisites__head-text">
						<h2 class="contacts-requisites__title title-3">Реквизиты</h2>
						<?php if ($company): ?>
							<div class="contacts-requisites__company">
								<?php echo esc_html($company); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>

				<div class="contacts-requisites__grid">
					<?php if ($unp): ?>
						<div class="contacts-requisites__item">
							<div class="contacts-requisites__label">УНП:</div>
							<div class="contacts-requisites__value">
								<?php echo esc_html($unp); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($ur_address): ?>
						<div class="contacts-requisites__item">
							<div class="contacts-requisites__label">Юридический адрес:</div>
							<div class="contacts-requisites__value descr">
								<?php echo wp_kses_post($ur_address); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($payment): ?>
						<div class="contacts-requisites__item">
							<div class="contacts-requisites__label">Расчётный счёт:</div>
							<div class="contacts-requisites__value">
								<?php echo esc_html($payment); ?>
							</div>
						</div>
					<?php endif; ?>
					<?php if ($bank): ?>
						<div class="contacts-requisites__item">
							<div class="contacts-requisites__label">Банк:</div>
							<div class="contacts-requisites__value">
								<?php echo esc_html($bank); ?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>