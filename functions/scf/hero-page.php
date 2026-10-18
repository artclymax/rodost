<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_hero_page',
		'title' => 'Секция "Первый экран"',
		'fields' => [
			[
				'key' => 'field_hero_page_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_hero_page_title',
				'label' => 'Заголовок',
				'name' => 'hero_title',
				'type' => 'text',
				'instructions' => 'Если оставить пустым — выведется название страницы, термина или архива автоматически.',
			],
			[
				'key' => 'field_hero_page_descr',
				'label' => 'Описание',
				'name' => 'hero_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_hero_page_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_hero_page_image',
				'label' => 'Изображение (desktop)',
				'name' => 'hero_image',
				'type' => 'image',
			],
			[
				'key' => 'field_hero_page_image_mobile',
				'label' => 'Изображение (mobile)',
				'name' => 'hero_image_mobile',
				'type' => 'image',
				'instructions' => 'Версия для маленьких экранов. Если не заполнено — будет показывается desktop-изображение.',
			],
		],
		'location' => [
			[
				[
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				],
				[
					'param' => 'post_template',
					'operator' => '!=',
					'value' => 'front-page.php',
				],
			],
			[
				[
					'param' => 'taxonomy',
					'operator' => '==',
					'value' => 'product_cat',
				],
			],
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