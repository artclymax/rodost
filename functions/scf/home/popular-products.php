<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_popular_grid',
		'title' => 'Секция "Популярные изделия"',
		'fields' => [
			[
				'key' => 'field_pg_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Популярные изделия на главной (сетка).</b> Если поле оставлено пустым — значение берётся из «Общие секции». Товары подбираются автоматически: избранные, иначе 8 последних.',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_pg_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_pg_title',
				'label' => 'Заголовок',
				'name' => 'pg_title',
				'type' => 'text',
				'placeholder' => 'Популярные изделия',
			],
			[
				'key' => 'field_pg_descr',
				'label' => 'Описание',
				'name' => 'pg_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
				'placeholder' => 'Собрали позиции, которые чаще всего требуются для кровли, фасадов, дымоходов, парапетов и водоотведения.',
			],
			[
				'key' => 'field_pg_btn',
				'label' => 'Кнопка "Перейти в каталог"',
				'name' => 'pg_btn',
				'type' => 'link',
			],
			[
				'key' => 'field_pg_tab_settings',
				'label' => 'Настройки',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_pg_btn_text',
				'label' => 'Текст кнопки карточки',
				'name' => 'pg_btn_text',
				'type' => 'text',
				'placeholder' => 'Подробнее',
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