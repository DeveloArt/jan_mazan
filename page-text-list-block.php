<?php

/**
 * Template Name: najem-okazjonalny
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        $title = get_field("tytul_bloku");
        $description = get_field("tresc_bloku");
        $bg_color = get_field("kolor_tla");
        $additional_class = ' first-block';
        get_template_part('template-parts/text-blocks/text-block', null, [
            'tytul' => $title,
            'tresc' => $description,
            'kolor_tla' => $bg_color,
            'additional_class' => $additional_class
        ]);
        ?>
        <?php
        $title = get_field("tytul_bloku_1");
        $description = get_field("tresc_bloku_1");
        $bg_color = get_field("kolor_tla_1");

        get_template_part('template-parts/text-list-blocks/text-list-block', null, [
            'tytul' => $title,
            'tresc' => $description,
            'kolor_tla' => $bg_color,
        ]);
        ?>
        <?php
        if (get_field("tytul_bloku_2") || get_field("tresc_bloku_2") || get_field("kolor_tla_2")) {
            $title_2 = get_field("tytul_bloku_2");
            $description_2 = get_field("tresc_bloku_2");
            $bg_color_2 = get_field("kolor_tla_2");

            get_template_part('template-parts/text-list-blocks/text-list-block', null, [
                'tytul' => $title_2,
                'tresc' => $description_2,
                'kolor_tla' => $bg_color_2,
            ]);
        }
        ?>
        <?php get_template_part('template-parts/contact/contact-section', null, []); ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>