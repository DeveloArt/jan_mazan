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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2444.252568795751!2d20.978062176515184!3d52.22062897198421!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471ecdb874088aff%3A0x75b7c0bfc9640923!2sKancelaria%20Notarialna%20Jan%20Maria%20Mazan%20-%20Warszawa%20Ochota!5e0!3m2!1spl!2spl!4v1742395681480!5m2!1spl!2spl" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>       </div>

            </div>
    </section>
<?php endif; ?>