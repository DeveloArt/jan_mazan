<?php

/**
 * Template Name: dokumenty
 */

get_header();
?>
<div id="primary" class="content-area">
    <main id="main" class="site-main">
    <?php
        // Dane dla pierwszej sekcji
        $tytul1 = get_field('tytul_1');
        $opis1 = get_field('opis_1');
        $kolor_tla1 = get_field('kolor_tla_1');
        $pliki1 = [
            [
                'nazwa_pliku' => get_field('nazwa_pliku_1_1'),
                'ikona_pliku' => get_field('ikona_pliku_1_1'),
                'link_pliku' => get_field('link_pliku_1_1'),
            ],
            [
                'nazwa_pliku' => get_field('nazwa_pliku_1_2'),
                'ikona_pliku' => get_field('ikona_pliku_1_2'),
                'link_pliku' => get_field('link_pliku_1_2'),
            ],
            [
                'nazwa_pliku' => get_field('nazwa_pliku_1_3'),
                'ikona_pliku' => get_field('ikona_pliku_1_3'),
                'link_pliku' => get_field('link_pliku_1_3'),
            ],
        ];

        // Wywołanie komponentu dla pierwszej sekcji
        get_template_part('template-parts/section-with-document/section-with-document', null, [
            'tytul' => $tytul1,
            'opis' => $opis1,
            'kolor_tla' => $kolor_tla1,
            'pliki' => $pliki1,
        ]);

        // Dane dla drugiej sekcji
        $tytul2 = get_field('tytul_2');
        $opis2 = get_field('opis_2');
        $kolor_tla2 = get_field('kolor_tla_2');
        $pliki2 = [
            [
                'nazwa_pliku' => get_field('nazwa_pliku_2_1'),
                'ikona_pliku' => get_field('ikona_pliku_2_1'),
                'link_pliku' => get_field('link_pliku_2_1'),
            ],
            [
                'nazwa_pliku' => get_field('nazwa_pliku_2_2'),
                'ikona_pliku' => get_field('ikona_pliku_2_2'),
                'link_pliku' => get_field('link_pliku_2_2'),
            ],
            [
                'nazwa_pliku' => get_field('nazwa_pliku_2_3'),
                'ikona_pliku' => get_field('ikona_pliku_2_3'),
                'link_pliku' => get_field('link_pliku_2_3'),
            ],
        ];

        // Wywołanie komponentu dla drugiej sekcji
        get_template_part('template-parts/section-with-document/section-with-document', null, [
            'tytul' => $tytul2,
            'opis' => $opis2,
            'kolor_tla' => $kolor_tla2,
            'pliki' => $pliki2,
        ]);
        ?>
        <?php get_template_part('template-parts/section-with-document/grey-one-document', null, []); ?>
        <?php get_template_part('template-parts/contact/contact-section', null, []); ?>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>
