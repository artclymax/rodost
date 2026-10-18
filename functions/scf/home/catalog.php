<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_catalog',
		'title' => 'Секция "Каталог"',
		'fields' => [
			[
				'key' => 'field_catalog_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Каталог строится из категорий WooCommerce (product_cat).</b> Фото карточки — изображение категории, заголовок — название, описание — описание категории. Выберите нужные категории или оставьте поле пустым — выведутся все. Чтобы добавить категорию в каталог <a href="' . admin_url('/admin.php?page=product_cat') . '" target="_blank">Перейти</a>',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_catalog_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_catalog_title',
				'label' => 'Заголовок',
				'name' => 'catalog_title',
				'type' => 'text',
			],
			[
				'key' => 'field_catalog_descr',
				'label' => 'Описание',
				'name' => 'catalog_descr',
				'type' => 'wysiwyg',
			],
			[
				'key' => 'field_catalog_btn',
				'label' => 'Кнопка "Смотреть весь каталог"',
				'name' => 'catalog_btn',
				'type' => 'link',
			],
			[
				'key' => 'field_catalog_tab_cats',
				'label' => 'Категории',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_catalog_categories',
				'label' => 'Категории для вывода',
				'name' => 'catalog_categories',
				'type' => 'taxonomy',
				'taxonomy' => 'product_cat',
				'field_type' => 'multi_select',
				'return_format' => 'id',
				'instructions' => 'Выберите категории в нужном порядке. Если ничего не выбрано — выводятся все категории.',
			],
			[
				'key' => 'field_catalog_tab_media',
				'label' => 'Медиа',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_catalog_placeholder',
				'label' => 'Изображение-заглушка',
				'name' => 'catalog_placeholder',
				'type' => 'image',
				'instructions' => 'Показывается у категорий без собственного изображения.',
			],
			[
				'key' => 'field_catalog_tab_settings',
				'label' => 'Настройки',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_catalog_more_btn',
				'label' => 'Текст кнопки "Показать больше"',
				'name' => 'catalog_more_btn',
				'type' => 'text',
				'placeholder' => 'Показать больше',
			],
			[
				'key' => 'field_catalog_less_btn',
				'label' => 'Текст кнопки в раскрытом состоянии',
				'name' => 'catalog_less_btn',
				'type' => 'text',
				'placeholder' => 'Скрыть',
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