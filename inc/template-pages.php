<?php

/**
 * Dynamically assign templates to pages based on their titles.
 */

// Mapowanie tytułów stron do szablonów
function get_template_mapping()
{
    return [
        'Opłaty' => 'page-oplaty.php',
        'Nieruchomości' => 'page-nieruchomosci.php',
        'Najem okazjonalny' => 'page-najem-okaz-block.php',
        'Prawo spółek' => 'page-prawo-spolek.php',
        'Sprawy małżeńskie' => 'page-text-list-block.php',
        'Pełnomocnictwo' => 'page-text-list-block.php',
        'Poświadczenie' => 'page-text-list-block.php',
        'Depozyt notarialny' => 'page-text-list-block.php',
        'Sprawy spadkowe' => 'page-text-list-block.php',
        'Dokumenty' => 'page-dokumenty.php',
        'Kontakt' => 'page-kontakt.php',
        'Polityka prywatności' => 'page-polityka-prywatnosci.php',
    ];
}

function set_default_template_for_pages($post_id, $post, $update)
{
    if ($post->post_type !== 'page') {
        return;
    }

    $template_mapping = get_template_mapping();

    if (isset($template_mapping[$post->post_title])) {
        $template_path = $template_mapping[$post->post_title];
        update_post_meta($post_id, '_wp_page_template', $template_path);
    }
}
add_action('save_post', 'set_default_template_for_pages', 10, 3);
