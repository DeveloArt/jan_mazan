<header id="masthead" class="site-header">
<div class="header-contact">
  <div class="container">
    <ul class="header-contact-item">
      <li>
        <span class="header-contact-title">
          <span class="desktop-label">TELEFON:</span>
          <span class="mobile-label">TEL:</span>
        </span>
        <a href="tel:<?php echo esc_attr(get_field('phone_number')); ?>" class="nav-contact-text">
          <?php the_field('phone_number'); ?>
        </a>
      </li>
      <li>
        <span class="header-contact-title">
          <span class="desktop-label">KOMÓRKA:</span>
          <span class="mobile-label">KOM:</span>
        </span>
        <a href="tel:<?php echo esc_attr(get_field('mobile_number')); ?>" class="nav-contact-text">
          <?php the_field('mobile_number'); ?>
        </a>
      </li>
      <li>
        <span class="header-contact-title">E-MAIL:</span>
        <a href="mailto:<?php echo esc_attr(get_field('email_address')); ?>" class="nav-contact-text">
          <?php the_field('email_address'); ?>
        </a>
      </li>
    </ul>
  </div>
</div>


  <div class="container">
    <!-- Logo -->
    <div class="site-branding">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo-link">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="<?php bloginfo('name'); ?> logo" class="site-logo">
      </a>
    </div>

    <!-- Desktop Navigation -->
    <nav id="site-navigation" class="main-navigation" aria-label="Primary Menu">
      <?php
      wp_nav_menu(
        array(
          'theme_location' => 'primary-menu',
          'menu_id'        => 'primary-menu',
          'menu_class'     => 'menu',
          'container'      => false,
        )
      );
      ?>
    </nav>

    <!-- Hamburger Icon for Mobile -->
    <div class="hamburger-menu" id="hamburger-menu" aria-label="Toggle mobile menu">
	  <img src="<?php echo get_template_directory_uri(); ?>/assets/hamburger.svg" alt="Hamburger menu icon">
    </div>

    <!-- Mobile Navigation (Initially Hidden) -->
<!-- Mobile Navigation (Initially Hidden) -->
	<nav id="mobile-navigation" class="mobile-navigation" aria-label="Mobile Menu">
	<div class="mobile-header">
		<!-- Logo -->
		<a href="<?php echo esc_url(home_url('/')); ?>" class="mobile-logo">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="<?php bloginfo('name'); ?> logo">
		</a>
		<!-- Xmark Button -->
		<button class="close-menu" id="close-menu" aria-label="Close mobile menu"><img src="<?php echo get_template_directory_uri(); ?>/assets/nav-xmark.svg" alt=""></button>
	</div>
	
	<?php
	wp_nav_menu(
		array(
		'theme_location' => 'primary-menu',
		'menu_id'        => 'primary-menu-mobile',
		'menu_class'     => 'menu',
		'container'      => false,
		)
	);
	?>
	</nav>
  </div>
</header>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const hamburgerMenu = document.getElementById("hamburger-menu");
  const mobileNavigation = document.getElementById("mobile-navigation");
  const menuItems = document.querySelectorAll(".mobile-navigation .menu > li");
  const closeMenuButton = document.getElementById("close-menu");

  hamburgerMenu.addEventListener("click", function () {
    hamburgerMenu.classList.toggle("active");
    mobileNavigation.classList.toggle("active");
  });

  closeMenuButton.addEventListener("click", function () {
    hamburgerMenu.classList.remove("active");
    mobileNavigation.classList.remove("active");
  });

  menuItems.forEach(function (item) {
    item.addEventListener("click", function (e) {
      e.stopPropagation();
      item.classList.toggle("active");
      menuItems.forEach(function (otherItem) {
        if (otherItem !== item) {
          otherItem.classList.remove("active");
        }
      });
    });
  });
});

</script>

