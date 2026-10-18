<?php
if (function_exists('acf_add_local_field_group')) {
	acf_add_local_field_group([
		'key' => 'group_order_steps',
		'title' => 'Секция "Этапы заказа"',
		'fields' => [
			[
				'key' => 'field_order_steps_message',
				'label' => 'Инструкция',
				'name' => '',
				'type' => 'message',
				'message' => '<b>Если не будет заполнена - будет брать данные с Главной страницы</b>',
				'new_lines' => 'wpautop',
				'esc_html' => 0,
			],
			[
				'key' => 'field_os_tab_content',
				'label' => 'Контент',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_os_title',
				'label' => 'Заголовок',
				'name' => 'os_title',
				'type' => 'text',
				'placeholder' => 'От заявки до готового изделия',
			],
			[
				'key' => 'field_os_descr',
				'label' => 'Описание',
				'name' => 'os_descr',
				'type' => 'textarea',
				'rows' => 3,
				'new_lines' => 'wpautop',
				'placeholder' => 'Каждый заказ рассчитывается индивидуально: по размерам, материалу, покрытию, количеству и сложности изготовления.',
			],
			[
				'key' => 'field_os_tab_steps',
				'label' => 'Этапы',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_os_steps',
				'label' => 'Этапы заказа',
				'name' => 'os_steps',
				'type' => 'repeater',
				'layout' => 'block',
				'collapsed' => 'field_os_step_title',
				'button_label' => 'Добавить этап',
				'sub_fields' => [
					[
						'key' => 'field_os_step_icon',
						'label' => 'Иконка',
						'name' => 'icon',
						'type' => 'image',
					],
					[
						'key' => 'field_os_step_title',
						'label' => 'Заголовок',
						'name' => 'title',
						'type' => 'text',
						'placeholder' => 'Вы выбираете изделие',
					],
					[
						'key' => 'field_os_step_descr',
						'label' => 'Описание',
						'name' => 'descr',
						'type' => 'textarea',
						'rows' => 2,
						'new_lines' => 'wpautop',
						'placeholder' => 'Находите нужную категорию в каталоге или описываете задачу.',
					],
				],
			],
			[
				'key' => 'field_os_tab_footer',
				'label' => 'Кнопка',
				'name' => '',
				'type' => 'tab',
				'placement' => 'top',
				'endpoint' => 0,
			],
			[
				'key' => 'field_os_btn',
				'label' => 'Кнопка',
				'name' => 'os_btn',
				'type' => 'link',
			],
			[
				'key' => 'field_os_note',
				'label' => 'Примечание под кнопкой',
				'name' => 'os_note',
				'type' => 'text',
				'placeholder' => '! Свяжемся в течение рабочего дня',
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
			[
				[
					'param' => 'post_template',
					'operator' => '==',
					'value' => 'page-services.php',
				],
			],
		],
	]);
}