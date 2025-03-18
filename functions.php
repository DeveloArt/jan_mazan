<?php
/**
 * Plik functions.php Twojego motywu WordPress
 * z przykładową integracją Cloudflare Turnstile dla Contact Form 7.
 */


require_once get_template_directory() . '/inc/template-pages.php';
require_once get_template_directory() . '/template-parts/buttons/button.php';
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/shortcodes.php';

function cf7_validate_turnstile($result, $tag) {
    if ($tag->name === 'turnstile-token') {
        $token = isset($_POST['turnstile-token']) ? sanitize_text_field($_POST['turnstile-token']) : '';
        if (empty($token)) {
            $result->invalidate($tag, "Proszę zaznaczyć, że nie jesteś botem.");
            return $result;
        }
        $secret = '0x4AAAAAABBLpmYzkxuJWpVXuYKCbz30e20';
        $response = wp_remote_post(
            'https://challenges.cloudflare.com/turnstile/v0/siteverify',
            [
                'body' => [
                    'secret' => $secret,
                    'response' => $token,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ]
            ]
        );

        if (is_wp_error($response)) {
            $result->invalidate($tag, "Błąd połączenia z usługą CAPTCHA.");
            return $result;
        }
        $body = json_decode(wp_remote_retrieve_body($response), true);
        if (!isset($body['success']) || $body['success'] !== true) {
            $error_message = "Weryfikacja nie powiodła się.";
            if (isset($body['error-codes'])) {
                $error_message .= " Kody błędów: " . implode(', ', $body['error-codes']);
            }
            $result->invalidate($tag, $error_message);
        }
    }
    return $result;
}
add_filter('wpcf7_validate_hidden', 'cf7_validate_turnstile', 20, 2);


add_action('wpcf7_mail_sent', 'cf7_after_submission');
function cf7_after_submission($contact_form) {
    $submission = WPCF7_Submission::get_instance();
    if ($submission) {
        $data = $submission->get_posted_data();
        error_log(print_r($data, true));
    }
}

add_filter('wpcf7_form_elements', 'my_cf7_custom_button');
function my_cf7_custom_button($form_html) {
    ob_start();
    render_custom_button('Wyślij', '', true, false);
    $custom_button_html = ob_get_clean();
    $form_html = str_replace('[submit "Wyślij"]', $custom_button_html, $form_html);

    return $form_html;
}

function mytheme_add_svg_favicon() {
    echo '<link rel="icon" href="' . get_template_directory_uri() . '/assets/favicon.svg" type="image/svg+xml">';
}
add_action('wp_head', 'mytheme_add_svg_favicon');

function my_theme_setup() {
    add_theme_support('editor-styles');
    add_theme_support('wp-block-styles');
    add_theme_support('align-wide');
    add_theme_support('responsive-embeds');
    add_editor_style('style-editor.css');

    register_nav_menus([
        'primary-menu' => __('Primary Menu', 'my-theme'),
    ]);
}
add_action('after_setup_theme', 'my_theme_setup');

if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title'  => 'Global Contact Info',
        'menu_title'  => 'Contact Info',
        'menu_slug'   => 'global-contact-info',
        'capability'  => 'edit_posts',
        'redirect'    => false,
    ]);
    acf_add_options_page([
        'page_title'  => 'Global Button Settings',
        'menu_title'  => 'Button Settings',
        'menu_slug'   => 'global-button-settings',
        'capability'  => 'edit_posts',
        'redirect'    => false,
    ]);
}

function popup_settings_menu() {
    add_menu_page(
        'Okno informacyjne',
        'Okno informacyjne',
        'manage_options',
        'popup-settings',
        'popup_settings_page',
        'dashicons-testimonial',
        20
    );
}
add_action('admin_menu', 'popup_settings_menu');

function allow_svg_uploads($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

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
                    <th><label for="popup_text">Tekst okna informacyjnego:</label></th>
                    <td><textarea id="popup_text" name="popup_text" rows="8" cols="70"><?php echo esc_textarea($popup_text); ?></textarea></td>
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

function my_theme_enqueue_styles() {
    wp_enqueue_style('my-theme-style', get_stylesheet_uri());:
    wp_enqueue_style('about-me-style', get_template_directory_uri() . '/dist/bundle.css');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style/style.css');
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap', [], null);
    wp_enqueue_script('turnstile', 'https://challenges.cloudflare.com/turnstile/v0/api.js', array(), null, false);
    wp_enqueue_script(
        'cf-turnstile',
        'https://challenges.cloudflare.com/turnstile/v0/api.js',
        [],
        null,
        true
    );
    wp_add_inline_script('cf-turnstile', '
        function turnstileCallback(token) {
            document.getElementById("turnstile-token").value = token;
        }

        document.addEventListener("DOMContentLoaded", function() {
            const form = document.querySelector(".wpcf7-form");
            if (form) {
                form.addEventListener("submit", function(event) {
                    const tokenInput = document.getElementById("turnstile-token");
                    if (!tokenInput || !tokenInput.value) {
                        event.preventDefault();
                        alert("Proszę ukończyć weryfikację Turnstile.");
                    }
                });
            }
        });
    ');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');