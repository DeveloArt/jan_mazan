<?php
if (function_exists('get_field')) :
    $title = get_field('documents_title');
    $description = get_field('documents_description');
    $button_text = get_field('documents_button_text');
    $button_url = get_field('documents_button_url');
?>

    <div class="documents-section">
        <div class="documents-section-content">
            <h2><?php echo esc_html($title); ?></h2>
            <p><?php echo esc_html($description); ?></p>
            <?php render_custom_button(esc_html($button_text), esc_url($button_url)); ?>
        </div>
    </div>
<?php endif; ?>