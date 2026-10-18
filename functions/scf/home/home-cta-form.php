<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_home_cta_form',
		'title' => 'Секция "Рассчитаем изделия"',
		'fields' => [
			[
				'key' => 'field_hcf_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Секция с формой расчёта для главной страницы.</b> Слева — заголовок, описание и преимущества, справа — форма. Шорткод формы берётся в Contact Form 7.<br/> <b>По умолчанию берёт все данные из Главной страницы <a href="' . admin_url('/post.php?post=20&action=edit') . '" target="_blank">Перейти</a>.</b>',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_hcf_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_hcf_title',
				'label' => 'Заголовок',
				'name' => 'hcf_title',
				'type' => 'text',
				'placeholder' => 'Рассчитаем изделия для вашего объекта',
			],
			[
				'key' => 'field_hcf_descr',
				'label' => 'Описание',
				'name' => 'hcf_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
				'placeholder' => 'Опишите задачу, укажите размеры или прикрепите фото/чертёж — мы уточним детали и подготовим расчёт стоимости.',
			],
			[
				'key' => 'field_hcf_tab_features',
				'label' => 'Преимущества',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_hcf_features',
				'label' => 'Преимущества',
				'name' => 'hcf_features',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_hcf_feature_title',
				'button_label' => 'Добавить преимущество',
				'sub_fields' => [
					[
						'key' => 'field_hcf_feature_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_hcf_feature_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
						'placeholder' => 'Можно отправить фото или чертёж',
					],
					[
						'key' => 'field_hcf_feature_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 2,
						'new_lines' => 'wpautop',
					],
				],
			],
			[
				'key' => 'field_hcf_tab_form',
				'label' => 'Форма',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_hcf_form',
				'label' => 'Шорткод формы',
				'name' => 'hcf_form',
				'type' => 'text',
				'placeholder' => '[contact-form-7 id="123" title="Расчёт изделия"]',
			],
			[
				'key' => 'field_hcf_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_hcf_decor',
				'label' => 'Фоновый рисунок',
				'name' => 'hcf_decor',
				'type' => 'image',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'front-page.php',
				],
			],
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services',
				],
			],
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'page-about.php',
				],
			],
		],
	]);
}