<?php

add_action('init', function () {
	register_post_type('projects', [
		'labels' => [
			'name' => 'Проекты',
			'singular_name' => 'Проект',
			'add_new_item' => 'Добавить проект',
			'edit_item' => 'Редактировать проект',
			'not_found' => 'Проектов нет',
		],
		'public' => true,
		'has_archive' => 'projects',
		'menu_icon' => 'dashicons-format-gallery',
		'supports' => ['title', 'thumbnail'],
		'rewrite' => ['slug' => 'projects'],
		'show_in_rest' => true,
		'menu_position' => 10,
	]);

	register_taxonomy('project_cat', 'projects', [
		'labels' => [
			'name' => 'Категории проектов',
			'singular_name' => 'Категория проектов',
			'menu_name' => 'Категории',
		],
		'hierarchical' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => ['slug' => 'projects-category'],
	]);
});


add_action('init', function () {
	register_post_type('services', [
		'labels' => [
			'name' => 'Услуги',
			'singular_name' => 'Услуга',
			'add_new_item' => 'Добавить услугу',
			'edit_item' => 'Редактировать услугу',
			'not_found' => 'Услуг нет',
		],
		'public' => true,
		'has_archive' => 'services',
		'rewrite' => ['slug' => 'services'],
		'menu_icon' => 'dashicons-star-half',
		'supports' => ['title', 'thumbnail', 'editor', 'excerpt', 'page-attributes', 'page-attributes', 'page-attributes'],
		'show_in_rest' => true,
		'menu_position' => 10,
	]);
});