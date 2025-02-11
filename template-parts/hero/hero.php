<?php
// Pobieramy obrazy i teksty z ACF
$left_image = get_field('left_image');
$right_image = get_field('right_image');
$kancelaria_text = get_field('kancelaria_text'); // Tekst "Kancelaria Notarialna"
$jan_mazan_text = get_field('jan_mazan_text');   // Tekst "Jan Mazan"
?>

<div class="hero-container">
    <div class="image-wrapper left">
        <?php if ($left_image): ?>
            <img src="<?php echo esc_url($left_image['url']); ?>" alt="Left Image" class="image">
        <?php endif; ?>
    </div>
    <div class="text-wrapper">
        <p class="kancelaria"><?php echo esc_html($kancelaria_text); ?></p>
        <p class="jan-mazan"><?php echo esc_html($jan_mazan_text); ?></p>
    </div>
    <div class="image-wrapper right">
        <?php if ($right_image): ?>
            <img src="<?php echo esc_url($right_image['url']); ?>" alt="Right Image" class="image">
        <?php endif; ?>
    </div>
</div>