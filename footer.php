<div class="footer-wrapper">
	<footer class="footer">
		<div class="footer-container">
			<h2 class="footer-title"><?php the_field('footer_section_title'); ?></h2>
			<ul class="footer-contact">
				<?php if (get_field('phone_number')) : ?>
					<li class="footer-contact-item">
						<span class="footer-label">TELEFON:</span> <?php the_field('phone_number'); ?>
					</li>
				<?php endif; ?>
				<?php if (get_field('mobile_number')) : ?>
					<li class="footer-contact-item">
						<span class="footer-label">KOMÓRKA:</span> <?php the_field('mobile_number'); ?>
					</li>
				<?php endif; ?>
				<?php if (get_field('email_address')) : ?>
					<li class="footer-contact-item">
						<span class="footer-label">E-MAIL:</span>
						<a href="mailto:<?php the_field('email_address'); ?>"><?php the_field('email_address'); ?></a>
					</li>
				<?php endif; ?>
				<?php if (get_field('address')) : ?>
					<li class="footer-contact-item">
						<span class="footer-label">ADRES:</span> <?php the_field('address'); ?>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<div class="footer-copyright">
			<p>Copyright © 2024 Jan maria Mazan</p>
			<p><a href="/polityka-prywatnosci">Polityka prywatności</a></p>
		</div>
	</footer>
</div>
