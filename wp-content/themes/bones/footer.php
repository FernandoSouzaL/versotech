		<footer class="c-footer">
			<div class="c-footer__btn">
				<a href="#initial" class="o-link--top js-goto">
					<svg width="18.122" height="23.72">
						<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#arrow-top" />
					</svg>
				</a>
			</div>

			<div class="o-wrapper o-wrapper--1280">
				<div class="c-footer__container">

					<div class="c-footer__logo">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/logotipo-white.svg" alt="<?php bloginfo( 'name' ); ?>"/>
					</div>

					<div class="c-footer__menu">
						<?php get_template_part('partials/main-nav-footer'); ?>
	
						<div class="c-menu-redes">
							<p class="c-menu-redes__ttl o-ttl--white o-ttl--bold">Redes Sociais</p>
	
							<ul class="c-menu-redes__list">
								<?php get_template_part('partials/main-redes-menu'); ?>
							</ul>
						</div>
					</div>
	
					<p class="c-footer__copyright o-ttl o-ttl--white o-ttl--center">
						Copyright &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?> 
						<a href="https://ondaweb.com.br" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/ondaweb-ico-white.png" />
						</a>
					</p>
				</div>
			</div>

			<div class="c-footer__chat">
				<a href="#">
					<img src="<?php echo get_template_directory_uri(); ?>/library/images/chat.png">
				</a>
			</div>

		</footer>

		<?php include get_template_directory() . '/partials/svgs.php' ?>

		<?php // all js scripts are loaded in library/bones.php ?>
		<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/countup.js/2.0.7/countUp.js"></script>
		<script type="module" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/noframework.waypoints.min.js"></script>
		<script type="module" src="<?php echo get_template_directory_uri(); ?>/public/js/main.min.js"></script>

		<?php wp_footer(); ?>

	</body>

</html> <!-- end of site. what a ride! -->
