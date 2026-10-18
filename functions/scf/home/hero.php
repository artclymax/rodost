<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_hero',
		'title' => 'Секция "Первый экран"',
		'fields' => [
			[
				'key' => 'field_hero_message',
				'label' => 'Инструкция',
				'type' => 'message',
				'message' => '<b>Первый экран — слайдер.</b><br/>Каждый слайд — это одна вкладка внизу (Кровля / Фасады / Вентиляция) со своим заголовком, описанием, кнопками, преимуществами и фото.<br/>Порядок слайдов = порядок вкладок',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_hero_tab_slides',
				'label' => 'Слайды',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_hero_slides',
				'label' => 'Слайды',
				'name' => 'hero_slides',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_hero_slide_tab_label',
				'button_label' => 'Добавить слайд',
				'sub_fields' => [
					[
						'key' => 'field_hero_slide_tab_label',
						'label' => 'Название вкладки',
						'name' => 'tab_label',
						'type' => 'text',
						'placeholder' => 'Кровля',
					],
					[
						'key' => 'field_hero_slide_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'texta',
						'placeholder' => 'Металлические элементы для кровли',
					],
					[
						'key' => 'field_hero_slide_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 3,
						'new_lines' => 'wpautop',
					],
					[
						'key' => 'field_hero_slide_btn_primary',
						'label' => 'Кнопка (основная)',
						'name' => 'btn_primary',
						'type' => 'link',
					],
					[
						'key' => 'field_hero_slide_btn_secondary',
						'label' => 'Кнопка (вторичная)',
						'name' => 'btn_secondary',
						'type' => 'link',
					],
					[
						'key' => 'field_hero_slide_advantages',
						'label' => 'Преимущества',
						'name' => 'advantages',
						'type' => 'repeater',
						'layout' => 'row',
						'button_label' => 'Добавить преимущество',
						'sub_fields' => [
							[
								'key' => 'field_hero_advantage_value',
								'label' => 'Значение (крупный акцент)',
								'name' => 'value',
								'type' => 'text',
								'instructions' => 'Необязательно. Например: 10+',
								'placeholder' => '10+',
							],
							[
								'key' => 'field_hero_advantage_label',
								'label' => 'Текст',
								'name' => 'label',
								'type' => 'textarea',
								'rows' => 2,
								'new_lines' => 'wpautop',
								'placeholder' => 'лет на рынке',
							],
						],
					],
					[
						'key' => 'field_hero_slide_bg_big',
						'label' => 'Фон (desktop)',
						'name' => 'bg_big',
						'type' => 'image',
					],
					[
						'key' => 'field_hero_slide_bg_mobile',
						'label' => 'Фон (мобильный)',
						'name' => 'bg_mobile',
						'type' => 'image',
						'instructions' => 'если не будет, то будет отображаться только большая картинка',
					],
				],
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
		],
	]);
}