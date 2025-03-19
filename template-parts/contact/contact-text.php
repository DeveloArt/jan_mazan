<?php
if (function_exists('get_field')) :
    $title = get_field('contact_section_title');
    $description = get_field('contact_section_description');
    $button_text = get_field('contact_section_button_text');
    $button_url = get_field('contact_section_button_url');
    
?>

    <div class="contact-text">
        <h2><?php echo esc_html($title); ?></h2>
        <ul class="header-contact-item">
            <li><span class="header-contact-title">TELEFON:</span> <?php the_field('phone_number'); ?></li>
            <li><span class="header-contact-title">KOMÓRKA:</span> <?php the_field('mobile_number'); ?></li>
            <li><span class="header-contact-title">E-MAIL:</span> <?php the_field('email_address'); ?></li>
        </ul>
        <p><?php echo esc_html($description); ?></p>
 <div class="map-section-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2348.7739513454612!2d20.9806371!3d52.220628999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecca298a73673%3A0x4fb81391a02fa58d!2sKaliska%2017%2F38%2C%2002-316%20Warszawa!5e1!3m2!1spl!2spl!4v1742393569568!5m2!1spl!2spl" width="100%" height="100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>
        <?php render_custom_button(esc_html($button_text), false, esc_url($button_url), false); ?>
    </div>

<?php endif; ?>