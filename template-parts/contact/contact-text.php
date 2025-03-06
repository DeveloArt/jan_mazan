<?php
if (function_exists('get_field')) :
    $title = get_field('contact_section_title');
    $description = get_field('contact_section_description');
    $button_text = get_field('contact_section_button_text');
    $button_url = get_field('contact_section_button_url');
    $image_url = get_field('contact_section_image');
?>

    <div class="contact-text">
        <h2><?php echo esc_html($title); ?></h2>
        <ul class="header-contact-item">
            <li><span class="header-contact-title">TELEFON:</span> <?php the_field('phone_number'); ?></li>
            <li><span class="header-contact-title">KOMÓRKA:</span> <?php the_field('mobile_number'); ?></li>
            <li><span class="header-contact-title">E-MAIL:</span> <?php the_field('email_address'); ?></li>
        </ul>
        <p><?php echo esc_html($description); ?></p>
        <?php if ($image_url): ?>
            <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
        <?php endif; ?>
        <?php render_custom_button(esc_html($button_text), false, esc_url($button_url), false); ?>
    </div>

<?php endif; ?>