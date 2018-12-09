<?php get_header(); ?>
	<!-- Title Block Start -->

	<?php get_template_part( '/theme-parts/search-title' ); ?>

	<!-- Title Block End -->

	<!-- Right Sidebar Block Start -->

	<div class="space-content-block">
		<div class="space-content-block-ins">
			<div class="space-content-block-wrap">
				<div class="space-left-content">
					<div class="space-left-content-items">

						<?php if ( have_posts() ) :
						while ( have_posts() ) : the_post();
						get_template_part( '/theme-parts/archive-loop-1' );
						endwhile; ?>

						<?php
						the_posts_pagination( array(
						'end_size' => 2,
						'prev_text'    => esc_html__('&#171;', 'mercurylite'),
						'next_text'    => esc_html__('&#187;', 'mercurylite'),
						) );
						?>

						<div class="pb-15 clear"></div>
						
						<!-- Pagination End -->
						
						<?php else : ?>
						
						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Try to refine the search.', 'mercurylite' ); ?></p>
						
						<?php endif; ?>

					</div>
				</div>
				<div class="space-right-sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<!-- Right Sidebar Block End -->

<?php get_footer(); ?>