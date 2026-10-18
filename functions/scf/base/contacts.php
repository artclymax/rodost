<?php
add_action('acf/init', function () {

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' => 'Контактные данные',
			'menu_title' => 'Контактные данные',
			'menu_slug' => 'opt-contacts',
			'position' => 20,
		));
	}

	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	// CONTACTS
	acf_add_local_field_group([
		'key' => 'group_contacts_page',
		'title' => 'Контактные данные',
		'fields' => [
			[
				'key' => 'field_contacts_title',
				'label' => 'Заголовок карточки',
				'name' => 'contacts_title',
				'type' => 'text',
				'default_value' => 'Наши контакты',
			],
			[
				'key' => 'field_contacts_tab_phones',
				'label' => 'Телефон',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],

			[
				'key' => 'field_contacts_phones',
				'label' => 'Телефоны',
				'name' => 'contacts_phones',
				'type' => 'repeater',
				'layout' => 'table',
				'collapsed' => 'field_contact_phone_number',
				'button_label' => 'Добавить телефон',
				'sub_fields' => [
					[
						'key' => 'field_contact_phone_number',
						'label' => 'Номер телефона',
						'name' => 'phone',
						'type' => 'text',
					],
					[
						'key' => 'field_contact_phone_name',
						'label' => 'Контактное лицо (либо описание)',
						'name' => 'title',
						'type' => 'text',
					],
				],
			],

			[
				'key' => 'field_contacts_tab_email',
				'label' => 'Email',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],

			[
				'key' => 'field_contacts_emails',
				'label' => 'Email адреса',
				'name' => 'contacts_emails',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_contact_email_link',
				'button_label' => 'Добавить email',
				'sub_fields' => [
					[
						'key' => 'field_contact_email_link',
						'label' => 'Email',
						'name' => 'email',
						'type' => 'email',
					],
				],
			],

			[
				'key' => 'field_contacts_tab_messengers',
				'label' => 'Cоцсети',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],

			[
				'key' => 'field_contacts_socials',
				'label' => 'Социальные сети',
				'name' => 'contacts_socials',
				'type' => 'repeater',
				'layout' => 'table',
				'collapsed' => 'field_contacts_social_title',
				'button_label' => 'Добавить соцсеть',
				'sub_fields' => [
					[
						'key' => 'field_contacts_social_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_contacts_social_link',
						'label' => 'Ссылка на соцсеть',
						'name' => 'link',
						'type' => 'link',
					],
				],
			],
			[
				'key' => 'field_contacts_tab_address_time',
				'label' => 'Адрес и время работы',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],

			[
				'key' => 'field_contacts_address',
				'label' => 'Адрес',
				'name' => 'contacts_address',
				'type' => 'wysiwyg',
			],

			[
				'key' => 'field_contacts_time',
				'label' => 'Время работы',
				'name' => 'contacts_time',
				'type' => 'wysiwyg',
			],

			[
				'key' => 'field_contacts_info',
				'label' => 'Дополнительная информация',
				'name' => 'contacts_info',
				'type' => 'text',
			],

			[
				'key' => 'field_contacts_tab_payments',
				'label' => 'Реквизиты',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],

			[
				'key' => 'field_contacts_company',
				'label' => 'Название компании',
				'name' => 'contacts_company',
				'type' => 'text',
			],

			[
				'key' => 'field_contacts_unp',
				'label' => 'УНП',
				'name' => 'contacts_unp',
				'type' => 'text',
			],

			[
				'key' => 'field_contacts_ur_address',
				'label' => 'Юридический адрес',
				'name' => 'contacts_ur_address',
				'type' => 'wysiwyg',
			],

			[
				'key' => 'field_contacts_payment',
				'label' => 'Расчётный счёт',
				'name' => 'contacts_payment',
				'type' => 'text',
			],
			[
				'key' => 'field_contacts_bank',
				'label' => 'Банк',
				'name' => 'contacts_bank',
				'type' => 'text',
			],
			
			[
				'key' => 'field_contacts_payment_image',
				'label' => 'Фон секции',
				'name' => 'contacts_payment_image',
				'type' => 'image',
			],

			[
				'key' => 'field_contacts_tab_map',
				'label' => 'Карта',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],

			[
				'key' => 'field_contacts_map',
				'label' => 'Код карты (iframe)',
				'name' => 'contacts_map',
				'type' => 'textarea',
				'rows' => 4,
				'instructions' => 'Вставьте код iframe из Яндекс.Карт или Google Maps (Поделиться → Код карты).',
			],
		],
		'location' => [
			[
				[
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-contacts',
				],
			],
		],
	]);

});
?>