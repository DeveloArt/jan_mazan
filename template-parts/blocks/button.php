<?php if( get_field('button_text') && get_field('button_link')) : ?>
    <a href="<?php the_field('button_link'); ?>" class="btn <?php the_field('button_size'); ?>" style="background-color: <?php the_field('button_color'); ?>;">
        <?php the_field('button_text'); ?>
    </a>
<?php endif; ?>