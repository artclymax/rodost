<?php
// custom-order
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_custom_order',
		'title' => 'Секция "Сделаем по размерам"',
		'fields' => [
		
			[
				'key' => 'field_co_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_co_title',
				'label' => 'Заголовок',
				'name' => 'co_title',
				'type' => 'text',
				'placeholder' => 'Сделаем по размерам, фото или чертежу',
			],
			[
				'key' => 'field_co_descr',
				'label' => 'Описание',
				'name' => 'co_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
			],
			[
				'key' => 'field_co_btn',
				'label' => 'Кнопка',
				'name' => 'co_btn',
				'type' => 'link',
			],
			[
				'key' => 'field_co_tab_feature',
				'label' => 'Преимущество',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_co_feature_icon',
				'label' => 'Иконка',
				'name' => 'co_feature_icon',
				'type' => 'image',
			],
			[
				'key' => 'field_co_feature_descr',
				'label' => 'Текст преимущества',
				'name' => 'co_feature_descr',
				'type' => 'textarea',
				'rows' => 2,
				'new_lines' => 'wpautop',
				'placeholder' => 'Работаем с нержавеющей сталью, оцинкованной сталью и металлом с полимерным покрытием.',
			],
			[
				'key' => 'field_co_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_co_bg_big',
				'label' => 'Фон (desktop)',
				'name' => 'co_bg_big',
				'type' => 'image',
				'instructions' => 'Показывается на экранах шире планшета.',
			],
			[
				'key' => 'field_co_bg_small',
				'label' => 'Фон (tablet/mobile)',
				'name' => 'co_bg_small',
				'type' => 'image',
				'instructions' => 'Показывается на планшетах и телефонах. Если не заполнить — везде будет desktop-версия.',
			],
		],
		'location' => [
			[
				[
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'front-page.php',
				],
			],
		],
	]);
}