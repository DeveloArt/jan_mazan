<?php
/*
Template Name: Polityka Prywatności
*/
get_header();
?>

<div class="privacy-policy-wrapper">
  <div class="container">
    <h1>Polityka Prywatności</h1>
    <?php 
      $privacy_policy_text = get_field('privacy_policy_text');
      if ( $privacy_policy_text ) {
        echo wp_kses_post( $privacy_policy_text );
      } else {
        echo '<p>Brak treści polityki prywatności. Proszę dodać treść w panelu ACF.</p>';
      }
    ?>
  </div>
</div>

<?php get_footer(); ?>
