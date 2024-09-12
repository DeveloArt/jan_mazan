<?php

/**
 * My Theme functions and definitions
 *
 * @package My_Theme
 */

// Dołącz pliki z folderu inc
require get_template_directory() . '/inc/enqueue-scripts.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/customizer.php';

function my_acf_init() {
	if(function_exists('acf_register_block_type')) {
		acf_register_block_type(array(
			'name'              => 'custom-button',
            'title'             => __('Custom Button'),
            'description'       => __('A custom button block.'),
            'render_template'   => 'template-parts/blocks/custom-button.php',
            'category'          => 'formatting',
            'icon'              => 'button',
            'keywords'          => array( 'button', 'link' ),
		));
	}
}
add_action('acf/init', 'my_acf_init');

// Rejestracja menu
function my_theme_setup()
{
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu', 'my-theme'),
		)
	);
}
add_action('after_setup_theme', 'my_theme_setup');
