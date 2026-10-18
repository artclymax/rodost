<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_why_us',
		'title' => 'Секция "Почему выбирают"',
		'fields' => [
			[
				'key' => 'field_wu_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_wu_title',
				'label' => 'Заголовок',
				'name' => 'wu_title',
				'type' => 'text',
				'placeholder' => 'Почему выбирают Род-ост',
			],
			[
				'key' => 'field_wu_descr',
				'label' => 'Описание',
				'name' => 'wu_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
				'placeholder' => 'Изготавливаем металлические элементы под задачу объекта: помогаем с замером, расчётом, выбором материала.',
			],
			[
				'key' => 'field_wu_tab_features',
				'label' => 'Преимущества',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_wu_features',
				'label' => 'Преимущества',
				'name' => 'wu_features',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_wu_feature_title',
				'button_label' => 'Добавить преимущество',
				'sub_fields' => [
					[
						'key' => 'field_wu_feature_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_wu_feature_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
						'placeholder' => 'Изготовление по размерам',
					],
					[
						'key' => 'field_wu_feature_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 2,
						'new_lines' => 'wpautop',
					],
				],
			],
			[
				'key' => 'field_wu_tab_experience',
				'label' => 'Опыт',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_wu_exp_number',
				'label' => 'Число',
				'name' => 'wu_exp_number',
				'type' => 'text',
				'placeholder' => '10+',
			],
			[
				'key' => 'field_wu_exp_title',
				'label' => 'Подпись числа',
				'name' => 'wu_exp_title',
				'type' => 'text',
				'placeholder' => 'лет на рынке',
			],
			[
				'key' => 'field_wu_exp_descr',
				'label' => 'Описание',
				'name' => 'wu_exp_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
			],
			[
				'key' => 'field_wu_exp_image',
				'label' => 'Фото',
				'name' => 'wu_exp_image',
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
		],
	]);
}