	<!-- Footer Start -->

	<div class="space-footer-block">
		<div class="space-footer-wrap">
			<div class="space-footer-wrap-ins">
				<div class="space-footer-blocks">

					<?php if ( is_active_sidebar( 'footer-one' ) ) : ?>

					<div class="space-footer-block-item">
						<div class="space-footer-block-item-ins">

								<?php dynamic_sidebar( 'footer-one' ); ?>

						</div>
					</div>

					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-two' ) ) : ?>

					<div class="space-footer-block-item">
						<div class="space-footer-block-item-ins">

							<?php dynamic_sidebar( 'footer-two' ); ?>

						</div>
					</div>

					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-three' ) ) : ?>

					<div class="space-footer-block-item">
						<div class="space-footer-block-item-ins">

							<?php dynamic_sidebar( 'footer-three' ); ?>

						</div>
					</div>

					<?php endif; ?>

				</div>
			</div>
		</div>
	</div>

	<div class="space-copy-block">
		<div class="space-copy-wrap">
			<div class="space-copy-wrap-ins">
				<?php esc_html_e( '&copy; Copyright 2018.', 'mercurylite' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php echo esc_html( get_bloginfo( 'name' ) ) ?></a>. <?php esc_html_e( 'Designed by ', 'mercurylite' ); ?> <a href="<?php echo esc_url( __( 'https://space-themes.com/', 'mercurylite' ) ); ?>" target="_blank" title="<?php esc_attr_e( 'Space-Themes.com', 'mercurylite' ); ?>"><?php esc_html_e( 'Space-Themes.com', 'mercurylite' ); ?></a>.
			</div>
		</div>
	</div>

	<!-- Footer End -->

</div>

	<!-- Mobile Menu Start -->

	<div class="space-mobile-menu-wrap">
		<div class="space-mobile-menu-block">
			<div class="space-mobile-menu-block-ins">
				<div class="space-mobile-menu-logo">

				<?php if(get_theme_mod('mercurylite_mobile_logo') == '') { ?>

						<a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php echo esc_html( get_bloginfo( 'name' ) ) ?><span><?php echo esc_html( get_bloginfo( 'description' ) ) ?></span></a>

					<?php } else { ?>

						<a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><img src="<?php echo esc_url( get_theme_mod( 'mercurylite_mobile_logo' ) ) ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>" /></a>

					<?php } ?>

				</div>

				<?php get_search_form(); ?>

				<div class="space-mobile-menu-links">

					<?php wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'main-menu', 'theme_location' => 'main-menu', 'depth' => 3, 'fallback_cb' => '__return_empty_string' ) ); ?>

				</div>
				<div class="space-mobile-menu-copy">

				<?php esc_html_e( '&copy; Copyright 2018.', 'mercurylite' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php echo esc_html( get_bloginfo( 'name' ) ) ?></a>.<br /><?php esc_html_e( 'Designed by ', 'mercurylite' ); ?> <a href="<?php echo esc_url( __( 'https://space-themes.com/', 'mercurylite' ) ); ?>" target="_blank" title="<?php esc_html_e( 'Space-Themes.com', 'mercurylite' ); ?>"><?php esc_html_e( 'Space-Themes.com', 'mercurylite' ); ?></a>.

				</div>

				<div class="space-mobile-exit">
					<div class="space-mobile-exit-icon">
					<div class="to-right"></div>
					<div class="to-left"></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Mobile Menu End -->

	<!-- Back to Top Start -->

	<div class="space-totop">
		<a href="#" id="scrolltop" title="<?php esc_attr_e( 'Back to Top', 'mercurylite' ); ?>"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
	</div>

	<!-- Back to Top End -->

	<?php wp_footer(); ?>
</body>
</html>