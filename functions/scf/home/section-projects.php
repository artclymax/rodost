<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_section_projects',
		'title' => 'Секция "Примеры выполненных заказов"',
		'fields' => [
			[
				'key' => 'field_sp_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Примеры выполненных заказов для главной.</b> Если работы не выбраны вручную — выводятся 5 последних проектов. Выбранные работы выводятся в заданном порядке.<br/> Чтобы добавить проекты перейдите по ссылке: <a href="' . admin_url('/edit.php?post_type=projects') . '" target="_blank">Перейти</a>',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_sp_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_sp_title',
				'label' => 'Заголовок',
				'name' => 'sp_title',
				'type' => 'text',
				'placeholder' => 'Примеры выполненных заказов',
			],
			[
				'key' => 'field_sp_descr',
				'label' => 'Описание',
				'name' => 'sp_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
				'placeholder' => 'Показываем изделия, которые изготавливаются для кровли, фасадов, дымоходов, парапетов и водосточных систем.',
			],
			[
				'key' => 'field_sp_btn',
				'label' => 'Кнопка "Смотреть все работы"',
				'name' => 'sp_btn',
				'type' => 'link',
			],
			[
				'key' => 'field_sp_tab_projects',
				'label' => 'Проекты',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_sp_projects',
				'label' => 'Выбрать работы вручную',
				'name' => 'sp_projects',
				'type' => 'relationship',
				'post_type' => ['projects'],
				'multiple' => 0,
				'return_format' => 'id',
				'instructions' => 'Добавьте до 5 работ в нужном порядке. Если оставить пустым — выводятся 5 последних проектов.',
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