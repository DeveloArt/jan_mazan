<?php 
$popup_text = get_option('popup_text');
$popup_active = get_option('popup_active');

if ($popup_active && $popup_text) : ?>
<div class="contact-notice-container">
        <div class="contact-page-notice-content">
            <div class="contact-page-notice-left">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/jan-mazan.png" alt="Zdjęcie">
            </div>
            <div class="contact-page-notice-right">
                <h2 class="contact-page-notice-title">Uwaga!</h2>
                <p class="contact-page-notice-text">
                    Szanowni Państwo,<br>
                    Ze względu na moją nieobecność w dniach 
                    <span class="contact-page-highlight"><?php echo esc_html($popup_text); ?></span> 
                    kancelaria będzie nieczynna.
                </p>
                <p class="contact-page-notice-text">
                    Niezależnie od typu sprawy prosimy każdorazowo o wcześniejsze uzgodnienie terminu wizyty. 
                    Z uwagi na prywatność naszych klientów zastrzegamy możliwość odmówienia obsługi klienta niezapowiedzianego.
                </p>
                <p class="contact-page-notice-signature">Z wyrazami szacunku, <br> <span class="contact-page-name">Jan Maria Mazan</span></p>
            </div>
        </div>
        </div>
<?php endif; ?>
