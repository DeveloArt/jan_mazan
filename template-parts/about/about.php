<section id="aboutMe">
    <div class="about-me-section">
        <div class="about-me-text">
            <h2><?php echo esc_html(get_field('about_me_title')); ?></h2>
            <p><?php echo esc_html(get_field('about_me_content')); ?></p>
        </div>
        <div class="about-me-image">
            <?php
            $about_me_image = get_field('about_me_image');
            if ($about_me_image) : ?>
                <img src="<?php echo esc_url($about_me_image['url']); ?>" alt="<?php echo esc_attr($about_me_image['alt']); ?>" />
            <?php endif; ?>
        </div>
    </div>
</section>