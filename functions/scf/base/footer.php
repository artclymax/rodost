<?php
add_action('acf/init', function () {

	if (function_exists('acf_add_options_page')) {
		acf_add_options_page(array(
			'page_title' => 'Подвал / Футер',
			'menu_title' => 'Подвал / Футер',
			'menu_slug' => 'opt-footer',
			'position' => 22,
		));
	}

	if (!function_exists('acf_add_local_field_group')) {
		return;
	}

	// FOOTER
	acf_add_local_field_group(array(
		'key' => 'group_footer_settings',
		'title' => 'Настройки футера',
		'fields' => array(
			array(
				'key' => 'field_header_info_message',
				'name' => 'header_info_message',
				'type' => 'message',
				'message' => '<b>Логотип</b> - перейдите в Панель управления сайтом > Основные настройки > Логотип сайта. <a href="' . admin_url('/admin.php?page=verda-settings&tab=general') . '" target="_blank">Перейти</a><br/><b>Меню</b> - перейдите в Панель управления сайтом > Меню > Меню шапки. <a href="' . admin_url('/admin.php?page=verda-settings&tab=menus') . '" target="_blank">Перейти</a><br/><b>Контакты</b> - перейдите в Панель управления сайтом > Редактирование контента > Основные секции > Контактные данные. <a href="' . admin_url('/admin.php?page=opt-contacts') . '" target="_blank">Перейти</a>',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			),
			// === ИНФО ===
			array(
				'key' => 'field_footer_tab_info',
				'label' => 'Основная информация',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_footer_company',
				'label' => 'Название компании',
				'name' => 'footer_company',
				'type' => 'text',
				'instructions' => 'Отображается в копирайте. Если пусто — берётся название сайта.',
			),
			array(
				'key' => 'field_footer_descr',
				'label' => 'Описание компании',
				'name' => 'footer_descr',
				'type' => 'textarea',
				'instructions' => 'Краткое описание под логотипом. Если пусто — берётся описание сайта.',
				'rows' => 3,
			),

			// === КОПИРАЙТ ===
			array(
				'key' => 'field_footer_tab_bottom',
				'label' => 'Нижняя часть',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			),
			array(
				'key' => 'field_footer_copy',
				'label' => 'Текст копирайта',
				'name' => 'footer_copy',
				'type' => 'text',
				'instructions' => 'Дополнительный текст после названия компании. Например: Все права защищены.',
				'placeholder' => 'Все права защищены.',
			),
			array(
				'key' => 'field_footer_links',
				'label' => 'Ссылки',
				'name' => 'footer_links',
				'type' => 'repeater',
				'layout' => 'table',
				'button_label' => 'Добавить ссылку',
				'sub_fields' => array(
					array(
						'key' => 'field_footer_links_link',
						'label' => 'Ссылка',
						'name' => 'footer_links_link',
						'type' => 'link',
						'return_format' => 'array',
					),
				),
			),
		),
		'location' => array(
			array(
				array(
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'opt-footer',
				),
			),
		),
	));
});
?>