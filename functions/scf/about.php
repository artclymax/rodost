<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_block_about',
		'title' => 'Секция "Кто мы и чем полезны"',
		'fields' => [
			[
				'key' => 'field_ba_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_ba_title',
				'label' => 'Заголовок',
				'name' => 'ba_title',
				'type' => 'text',
				'placeholder' => 'Кто мы и чем полезны',
			],
			[
				'key' => 'field_ba_text',
				'label' => 'Текст',
				'name' => 'ba_text',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_ba_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_ba_image',
				'label' => 'Изображение',
				'name' => 'ba_image',
				'type' => 'image',
			],
		],
		'location' => [
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
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_about_why_us',
		'title' => 'Секция "Почему выбирают Род-Ост"',
		'fields' => [
			[
				'key' => 'field_aw_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_aw_title',
				'label' => 'Заголовок',
				'name' => 'aw_title',
				'type' => 'text',
				'placeholder' => 'Почему выбирают Род-Ост',
			],
			[
				'key' => 'field_aw_tab_features',
				'label' => 'Преимущества',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_aw_features',
				'label' => 'Преимущества',
				'name' => 'aw_features',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_aw_feature_title',
				'button_label' => 'Добавить преимущество',
				'sub_fields' => [
					[
						'key' => 'field_aw_feature_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_aw_feature_title',
						'label' => 'Название',
						'name' => 'title',
						'type' => 'text',
						'placeholder' => 'Понимаем задачу',
					],
					[
						'key' => 'field_aw_feature_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 2,
						'new_lines' => 'wpautop',
					],
				],
			],
		],
		'location' => [
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
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_about_materials',
		'title' => 'Секция "Материалы и контроль качества"',
		'fields' => [
			[
				'key' => 'field_am_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_am_title',
				'label' => 'Заголовок',
				'name' => 'am_title',
				'type' => 'text',
				'placeholder' => 'Материалы и контроль качества',
			],
			[
				'key' => 'field_am_descr',
				'label' => 'Описание',
				'name' => 'am_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_am_tab_materials',
				'label' => 'Материалы',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_am_materials',
				'label' => 'Список материалов',
				'name' => 'am_materials',
				'type' => 'repeater',
				'layout' => 'table',
				'collapsed' => 'field_am_material',
				'button_label' => 'Добавить материал',
				'sub_fields' => [
					[
						'key' => 'field_am_material',
						'label' => 'Материал',
						'name' => 'material',
						'type' => 'text',
						'placeholder' => 'Оцинкованная сталь',
					],
				],
			],
			[
				'key' => 'field_am_tab_quality',
				'label' => 'Качество',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_am_quality_text',
				'label' => 'Текст блока качества',
				'name' => 'am_quality_text',
				'type' => 'textarea',
				'rows' => 2,
				'new_lines' => 'wpautop',
				'placeholder' => 'Проверяем размеры, геометрию и соответствие согласованным параметрам перед выдачей изделия.',
			],
			[
				'key' => 'field_am_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_am_image',
				'label' => 'Изображение',
				'name' => 'am_image',
				'type' => 'image',
			],
		],
		'location' => [
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

if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_about_customers',
		'title' => 'Секция "С кем мы работаем"',
		'fields' => [
			[
				'key' => 'field_ac_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_ac_title',
				'label' => 'Заголовок',
				'name' => 'ac_title',
				'type' => 'text',
				'placeholder' => 'С кем мы работаем',
			],
			[
				'key' => 'field_ac_tab_customers',
				'label' => 'Клиенты',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_ac_customers',
				'label' => 'Категории клиентов',
				'name' => 'ac_customers',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_ac_customer_title',
				'button_label' => 'Добавить категорию',
				'sub_fields' => [
					[
						'key' => 'field_ac_customer_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_ac_customer_title',
						'label' => 'Название',
						'name' => 'title',
						'type' => 'text',
						'placeholder' => 'Частные заказчики',
					],
					[
						'key' => 'field_ac_customer_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 2,
						'new_lines' => 'wpautop',
					],
				],
			],
		],
		'location' => [
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