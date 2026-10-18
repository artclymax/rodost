<?php
add_action('acf/init', function () {

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' => 'Шапка',
			'menu_title' => 'Шапка',
			'menu_slug' => 'opt-header',
			'position' => 21,
		));
	}

	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	// HEADER
	acf_add_local_field_group(array(
		'key' => 'group_header_settings',
		'title' => 'Поля шапки',
		'fields' => array(
			array(
				'key' => 'field_header_info_message',
				'name' => 'header_info_message',
				'type' => 'message',
				'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта. <a href="' . admin_url('/admin.php?page=verda-settings&tab=general') . '" target="_blank">Перейти</a><br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки. <a href="' . admin_url('/admin.php?page=verda-settings&tab=menus') . '" target="_blank">Перейти</a><br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные. <a href="' . admin_url('/admin.php?page=opt-contacts') . '" target="_blank">Перейти</a>',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			array(
				'key' => 'field_header_descr',
				'label' => 'Описание',
				'name' => 'header_descr',
				'type' => 'textarea',
				'rows' => '3',
				'new_lines' => 'wpautop',
				'instructions' => 'Если не указывать будут использоваться описание сайта',
			),
			array(
				'key' => 'field_header_phone',
				'label' => 'Телефон в шапке',
				'name' => 'header_phone',
				'type' => 'text',
				'instructions' => 'Если не указывать будут использоваться первый телефон из контактных данных',
			),
			// Кнопка
			array(
				'key' => 'field_header_btn',
				'label' => 'Кнопка в шапке',
				'name' => 'header_btn',
				'type' => 'link',
				'instructions' => 'Ссылка на модальное окно (выберите запись-модалку) или страницу.',
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-header',
				),
			),
		),
	));

});
?>