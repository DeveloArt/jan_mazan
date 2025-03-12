<?php

$tytul = get_field('tytul_3');
$opis = get_field('opis_3');
$link_pliku = get_field('link_pliku_3');
$nazwa_pliku = get_field('nazwa_pliku_3');

$icon_path = get_template_directory_uri() . '/assets/file.svg';

if ($tytul || $opis || $link_pliku): ?>
<section class="questionnaire-section">
    <div class="container">
        <div class="content">
            <?php if ($tytul): ?>
                <h2 class="section-title"><?php echo esc_html($tytul); ?></h2>
            <?php endif; ?>
            
            <?php if ($opis): ?>
                <p class="section-description"><?php echo esc_html($opis); ?></p>
            <?php endif; ?>
        </div>
        <div class="file-item">
            <img src="<?php echo esc_url($icon_path); ?>" alt="Ikona pliku" class="file-icon">
            
            <?php if ($nazwa_pliku): ?>
                <p class="file-name"><?php echo esc_html($nazwa_pliku); ?></p>
            <?php endif; ?>
            
            <?php
            if ($link_pliku && function_exists('render_custom_button')):
                render_custom_button('POBIERZ', false, $link_pliku, true);
            endif;
            ?>
        </div>
    </div>
</section>
<?php endif; ?>
