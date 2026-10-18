<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_services',
		'title' => 'Карточка услуги',
		'fields' => [
			[
				'key' => 'field_service_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Карточка услуги.</b> Название берётся из заголовка записи. Краткое описание - из Отрывка',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_service_icon',
				'label' => 'Иконка',
				'name' => 'service_icon',
				'type' => 'image',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services',
				],
			],
		],
	]);
}

if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_service_about',
		'title' => 'Секция "О услуге"',
		'fields' => [
			[
				'key' => 'field_sa_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_sa_title',
				'label' => 'Заголовок',
				'name' => 'sa_title',
				'type' => 'text',
				'placeholder' => 'Что такое изготовление по размерам',
			],
			[
				'key' => 'field_sa_descr',
				'label' => 'Описание',
				'name' => 'sa_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_sa_btn',
				'label' => 'Кнопка',
				'name' => 'sa_btn',
				'type' => 'link',
			],
			[
				'key' => 'field_sa_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_sa_image',
				'label' => 'Изображение',
				'name' => 'sa_image',
				'type' => 'image',
				'instructions' => 'Фото слева от текста, рекомендуемая ширина от 1000 px.',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services',
				],
			],
		],
	]);
}

if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_service_includes',
		'title' => 'Секция "Что входит в услугу"',
		'fields' => [

			[
				'key' => 'field_si_tab_content',
				'label' => 'Контент и Фон',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_si_title',
				'label' => 'Заголовок',
				'name' => 'si_title',
				'type' => 'text',
				'placeholder' => 'Что входит в услугу',
			],
			[
				'key' => 'field_si_bg',
				'label' => 'Фоновое изображение',
				'name' => 'si_bg',
				'type' => 'image',
				'instructions' => 'Декоративный фон секции, выводится с aria-hidden.',
			],
			[
				'key' => 'field_si_tab_items',
				'label' => 'Элементы',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_si_list',
				'label' => 'Что входит в услугу',
				'name' => 'si_list',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_si_item_title',
				'button_label' => 'Добавить пункт',
				'sub_fields' => [
					[
						'key' => 'field_si_item_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_si_item_title',
						'label' => 'Название',
						'name' => 'title',
						'type' => 'text',
						'placeholder' => 'Подбор формы изделия',
					],
					[
						'key' => 'field_si_item_descr',
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
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services',
				],
			],
		],
	]);
}

if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_project_slider',
		'title' => 'Секция "Наши работы"',
		'fields' => [
			[
				'key' => 'field_ps_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Слайдер "Наши работы" для страницы этой услуги.</b> Проекты можно выбрать, либо подставляются 3 последних. Чтобы добавить проект перейдите <a href="' . admin_url('edit.php?post_type=projects') . '" target="_blank">сюда</a>.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_ps_title',
				'label' => 'Заголовок',
				'name' => 'ps_title',
				'type' => 'text',
				'placeholder' => 'Наши работы',
			],
			[
				'key' => 'field_ps_btn',
				'label' => 'Кнопка "Смотреть все работы"',
				'name' => 'ps_btn',
				'type' => 'link',
				'instructions' => 'Если не заполнять — ведёт на архив проектов с текстом "Смотреть все работы".',
			],
			[
				'key' => 'field_ps_projects',
				'label' => 'Выбрать работы вручную',
				'name' => 'ps_projects',
				'type' => 'relationship',
				'post_type' => ['projects'],
				'return_format' => 'id',
				'instructions' => 'Добавьте до 4 работ в нужном порядке. Если оставить пустым — выводятся 4 последних проекта.',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'services',
				],
			],
		],
	]);
}