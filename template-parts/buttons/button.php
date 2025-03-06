<?php
if (!function_exists('render_custom_button')) {
    function render_custom_button($text, $is_submit = false, $url = '', $target_blank = false)
    {
        if ($is_submit) {
            ?>
            <button class="custom-button" type="submit">
                <?php echo esc_html($text); ?>
            </button>
            <?php
        } else {
            // Jeśli chcemy otwierać w nowej karcie:
            if ($target_blank) {
                ?>
                <button
                    class="custom-button"
                    onclick="window.open('<?php echo esc_url($url); ?>', '_blank', 'noopener,noreferrer')"
                >
                    <?php echo esc_html($text); ?>
                </button>
                <?php
            } else {
                // Domyślne zachowanie
                ?>
                <button
                    class="custom-button"
                    onclick="window.location.href='<?php echo esc_url($url); ?>'"
                >
                    <?php echo esc_html($text); ?>
                </button>
                <?php
            }
        }
    }
}
