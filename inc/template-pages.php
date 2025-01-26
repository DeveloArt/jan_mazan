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
        'najem okazjonalny' => 'page-text-list-block.php',
        'prawo spolek' => 'page-text-list-block.php',
        'sprawy malzenskie' => 'page-text-list-block.php',
        'pelnomocnictwo' => 'page-text-list-block.php',
        'poswiadczenie' => 'page-text-list-block.php',
        'depozyt notarialny' => 'page-text-list-block.php',
        'sprawy spadkowe' => 'page-text-list-block.php',
        'dokumenty' => 'page-dokumenty.php',
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
