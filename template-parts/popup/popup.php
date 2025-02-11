<?php 
$popup_text = get_option('popup_text');
$popup_active = get_option('popup_active');

if ($popup_active && $popup_text) : ?>
    <div id="popup" class="popup">
        <div class="popup-content">
            <img id="close-popup" class="popup-close" src="<?php echo get_template_directory_uri(); ?>/assets/xmark.svg" alt="Zamknij">
            
            <div class="popup-left">
                <img src="<?php echo get_template_directory_uri() ?>/assets/jan-mazan.png" alt="Zdjęcie">
            </div>
            <div class="popup-right">
                <h2 class="popup-title">Uwaga!</h2>
                <p class="popup-text">
                    Szanowni Państwo,<br>
                    Ze względu na moją nieobecność w dniach 
                    <span class="highlight"><?php echo esc_html($popup_text); ?></span> 
                    kancelaria będzie nieczynna.
                </p>
                <p class="popup-text">
                    Niezależnie od typu sprawy prosimy każdorazowo o wcześniejsze uzgodnienie terminu wizyty. 
                    Z uwagi na prywatność naszych klientów zastrzegamy możliwość odmówienia obsługi klienta niezapowiedzianego.
                </p>
                <p class="popup-signature">Z wyrazami szacunku, <br> <span class="name">Jan Maria Mazan</span></p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('popup');
            const closePopup = document.getElementById('close-popup');

            if (popup) {
                popup.classList.add('popup-show');

                if (closePopup) {
                    closePopup.addEventListener('click', function() {
                        popup.classList.add('popup-hide');
                        popup.addEventListener('animationend', function() {
                            popup.style.display = 'none';
                        }, { once: true });
                    });
                }
            }
        });
    </script>
<?php endif; ?>
