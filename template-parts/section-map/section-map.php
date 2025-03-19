<?php
$section_title   = get_field('map_section_title');
$section_content = get_field('map_section_content');

if ($section_title || $section_content) : ?>
    <section class="map-section">
        <div class="map-section__content">
            <?php if ($section_title) : ?>
                <h2><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>

            <?php if ($section_content) : ?>
                <div class="map-section__text">
                    <p>
                        <?php echo wp_kses_post($section_content); ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
            <div class="map-section-map">        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2348.7739513454612!2d20.9806371!3d52.220628999999995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecca298a73673%3A0x4fb81391a02fa58d!2sKaliska%2017%2F38%2C%2002-316%20Warszawa!5e1!3m2!1spl!2spl!4v1742393569568!5m2!1spl!2spl" width="100%" height="100%"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>        </div>

            </div>
    </section>
<?php endif; ?>