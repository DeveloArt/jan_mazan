<?php
require_once get_template_directory() . '/inc/template-pages.php';
require_once get_template_directory() . '/template-parts/buttons/button.php';
require get_template_directory() . '/inc/enqueue-scripts.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/shortcodes.php';

function my_theme_setup()
{
	add_theme_support('editor-styles');
	add_theme_support('wp-block-styles');
	add_theme_support('align-wide');
	add_theme_support('responsive-embeds');
	add_editor_style('style-editor.css');
	register_nav_menus(
		array(
			'primary-menu' => __('Primary Menu', 'my-theme'),
		)
	);
}
add_action('after_setup_theme', 'my_theme_setup');

if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title'    => 'Global Contact Info',
		'menu_title'    => 'Contact Info',
		'menu_slug'     => 'global-contact-info',
		'capability'    => 'edit_posts',
		'redirect'      => false,
	));
	acf_add_options_page(array(
		'page_title'    => 'Global Button Settings',
		'menu_title'    => 'Button Settings',
		'menu_slug'     => 'global-button-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false,
	));
}

function popup_settings_menu() {
    add_menu_page(
        'Popup Settings',         
        'Popup Settings',     
        'manage_options',     
        'popup-settings',       
        'popup_settings_page',    
        'dashicons-testimonial',
        20                          
    );
}
add_action('admin_menu', 'popup_settings_menu');

function popup_settings_page() {
    if (!current_user_can('manage_options')) {
        return;
    }
    $popup_text = get_option('popup_text', '');
    $popup_active = get_option('popup_active', 0);

    ?>
    <div class="wrap">
        <h1>Ustawienia Popupa</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('popup_settings_group');
            do_settings_sections('popup-settings');
            ?>

            <table class="form-table">
                <tr>
                    <th><label for="popup_text">Tekst Popupa:</label></th>
                    <td><textarea id="popup_text" name="popup_text" rows="4" cols="50"><?php echo esc_textarea($popup_text); ?></textarea></td>
                </tr>
                <tr>
                    <th><label for="popup_active">Aktywny:</label></th>
                    <td><input type="checkbox" id="popup_active" name="popup_active" value="1" <?php checked(1, $popup_active); ?> /></td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function popup_settings_init() {
    register_setting('popup_settings_group', 'popup_text');
    register_setting('popup_settings_group', 'popup_active');
}
add_action('admin_init', 'popup_settings_init');

function my_theme_enqueue_styles()
{
	wp_enqueue_style('my-theme-style', get_stylesheet_uri());
	wp_enqueue_style('about-me-style', get_template_directory_uri() . '/dist/bundle.css');
	wp_enqueue_style('custom-style', get_template_directory_uri() . '/style/style.css');
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', array(), null);
	wp_enqueue_style(
		'dynamic-style', 
		get_template_directory_uri() . '/style/style.css', 
		[], 
		filemtime(get_template_directory() . '/style/style.css')
	);
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
