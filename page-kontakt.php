<?php
/**
 * Template Name: Opłaty
 */

get_header();
?>
<div id="primary" class="content-area">
    <div class="contact-content">
        <h1>Kontakt</h1>
        <p>Kancelaria udziela informacji związanych z dokonywanymi czynnościami notarialnymi nieodpłatnie. Zachęcamy do kontaktu telefonicznego lub email w celu uzgodnienia wszystkich formalności związanych z planowaną czynnością. W naszej kancelarii na wszystkie wiadomości odpowiada osobiście Notariusz.</p>
        <ul class="contact-info">
            <?php if (get_field('phone_number')) : ?>
                <li class="contact-info-item">
                    <span class="contact-label">TELEFON:</span> <span class="contact-text"><?php the_field('phone_number'); ?></span>
                </li>
            <?php endif; ?>
            <?php if (get_field('mobile_number')) : ?>
                <li class="contact-info-item">
                    <span class="contact-label">KOMÓRKA:</span> <span class="contact-text"><?php the_field('mobile_number'); ?></span>
                </li>
            <?php endif; ?>
            <?php if (get_field('email_address')) : ?>
                <li class="contact-info-item">
                    <span class="contact-label">E-MAIL:</span>
                    <span class="contact-text"><?php the_field('email_address'); ?></span>
                </li>
            <?php endif; ?>
            <?php if (get_field('address')) : ?>
                <li class="contact-info-item">
                    <span class="contact-label">ADRES:</span> <span class="contact-text"><?php the_field('address'); ?></span>
                </li>
            <?php endif; ?>
        </ul>
    </div>
        <?php get_template_part('template-parts/contact/contact-notice'); ?>
	<div class="map-section-container">
		<?php get_template_part('template-parts/section-map/section-map', 'map'); ?>
	</div>
	<div class="open-hours-container">
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
	</div>
	<div class="contact-form-container contact-page-form">
		<h2>Zapraszam do kontaktu!</h2>
		<?php get_template_part('template-parts/contact/contact-form', null, []); ?>
	</div>
</div><!-- #primary -->
<?php
get_footer();
?>
