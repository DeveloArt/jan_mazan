<?php
$section_title   = get_field('map_section_title');
$section_content = get_field('map_section_content');
$section_image   = get_field('map_section_image');

if ($section_title || $section_content || $section_image) : ?>
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

        <?php if (!empty($section_image)) : ?>
            <div class="map-section__image">
                <img 
                  src="<?php echo esc_url($section_image['url']); ?>" 
                  alt="<?php echo esc_attr($section_image['alt']); ?>" 
                />
            </div>
        <?php endif; ?>
    </section>
<?php endif; ?>
