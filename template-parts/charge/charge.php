<?php
if (function_exists('get_field')) :
    $title = get_field('charge_title');
    $description = get_field('charge_description');
    $button_text = get_field('charge_button_text');
    $button_url = get_field('charge_button_url');
    $image = get_field('charge_image');
?>

    <div class="charge-section">
        <div class="charge-section-container">
            <div class="charge-section-content">
                <h2><?php echo esc_html($title); ?></h2>
                <p><?php echo esc_html($description); ?></p>
                <div class="button-container">
                    <?php render_custom_button(esc_html($button_text), esc_url($button_url)); ?>
                </div>
            </div>
            <?php if ($image): ?>
                <div class=" charge-section-image">
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>