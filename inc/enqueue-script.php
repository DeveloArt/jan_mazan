<?php
 function my_theme_enqueue_scripts()
 {
     wp_enqueue_style('my-theme-style', get_stylesheet_uri());
     wp_enqueue_style('my-theme-custom-style', get_template_directory_uri() . '/style/style.css');
 }
 add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');