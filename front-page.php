<?php

/**
 * Template for the front page.
 *
 * @package TwojMotyw
 */

get_header(); ?>
<!-- Sekcja Hero -->
<?php get_template_part('template-parts/hero/hero', 'main'); ?>

<!-- Sekcja O nas -->
<?php get_template_part('template-parts/about/about', 'main'); ?>

<!-- Sekcja Opinie -->
<?php get_template_part('template-parts/notarial-actions/notarial-actions', 'main'); ?>
<!-- Sekcja Usługi -->
<?php get_template_part('template-parts/charge/charge', 'main'); ?>

<?php get_template_part('template-parts/section-documents/section-documents', 'main'); ?>
<!-- Sekcja Kontakt -->
<?php get_template_part('template-parts/contact/contact-section', 'main'); ?>

<?php get_template_part('template-parts/popup/popup', 'main'); ?>

<?php get_footer(); ?>