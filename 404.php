<?php get_header(); ?>
	<!-- Right Sidebar Block Start -->

	<div class="space-content-block">
		<div class="space-content-block-ins">
			<div class="space-content-block-wrap">
				<div class="space-content-block-404">
					<span><?php esc_html_e( '404', 'mercurylite' ); ?></span>
					<h1><?php esc_html_e( 'Page not Found', 'mercurylite' ); ?></h1>
					<p><a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php esc_html_e( 'Go back to the main page', 'mercurylite' ); ?></a></p>
					<div class="space-content-block-404-search"><?php get_search_form(); ?></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>

	<!-- Right Sidebar Block End -->
<?php get_footer(); ?>