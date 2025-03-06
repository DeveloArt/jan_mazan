<?php
// Pobierz dane przekazane jako "propsy"
$args = wp_parse_args($args, [
    'tytul' => '',
    'opis' => '',
    'kolor_tla' => 'szary',
    'pliki' => [],
]);

$klasa_tla = ($args['kolor_tla'] === 'niebieski') ? 'blue-background' : 'grey-background';


$icon_path = get_template_directory_uri() . '/assets/file.svg';

get_template_part('template-parts/buttons/button');
?>

<section class="questionnaire-section <?php echo esc_attr($klasa_tla); ?>">
    <div class="questionnaire-container">
        <div class="questionnaire-header">
            <?php if (!empty($args['tytul'])): ?>
                <h2 class="section-title"><?php echo esc_html($args['tytul']); ?></h2>
            <?php endif; ?>
            
            <?php if (!empty($args['opis'])): ?>
                <p class="section-description"><?php echo esc_html($args['opis']); ?></p>
            <?php endif; ?>
        </div>

        <?php if (!empty($args['pliki']) && is_array($args['pliki'])): ?>
            <div class="file-list">
                <?php foreach ($args['pliki'] as $plik): ?>
                    <?php if (is_array($plik)): ?>
                        <div class="file-item">
                            <?php 
                            ?>
                            <img src="<?php echo esc_url($icon_path); ?>" alt="<?php echo !empty($plik['nazwa_pliku']) ? esc_attr($plik['nazwa_pliku']) : 'Ikona pliku'; ?>" class="file-icon">
                            
                            <?php if (!empty($plik['nazwa_pliku'])): ?>
                                <p class="file-name"><?php echo esc_html($plik['nazwa_pliku']); ?></p>
                            <?php endif; ?>
                            
                            <?php
                            if (!empty($plik['link_pliku']) && is_string($plik['link_pliku']) && function_exists('render_custom_button')): 
                                render_custom_button('POBIERZ', false, $plik['link_pliku'], true);
                            endif;
                            ?>
                        </div>
                    <?php else: ?>
                        <p>Błąd: Niewłaściwa struktura danych dla elementu pliku.</p>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>
