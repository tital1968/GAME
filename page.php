<?php get_header(); ?>
	<!-- Title Block Start -->

	<?php get_template_part( '/theme-parts/page-title' ); ?>

	<!-- Title Block End -->

	<!-- Right Sidebar Block Start -->

	<div class="space-content-block">
		<div class="space-content-block-ins">
			<div class="space-content-block-wrap">
				<div class="space-left-content">
					<div class="space-left-content-ins">
						<?php if(have_posts()) : ?>
						<?php while(have_posts()) : the_post(); ?>
						<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercurylite-single-post-img'); if ($src) { ?>
						<div class="space-left-content-thumb">
						<img src="<?php echo esc_url($src[0]); ?>" alt="<?php the_title_attribute(); ?>" />
						</div>
						<?php } else { ?>
						<?php } ?>
						<?php the_content();
							wp_link_pages( array(
									'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'mercurylite' ),
									'after'       => '</div>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
							) );
						?>
						<?php endwhile; ?>
						<?php endif; ?>

						<div class="pt-15"></div>

						<!-- Comments Block Start -->

						<?php if (comments_open()) { ?>
						<?php comments_template(); ?>
						<?php } else { ?>
						<?php } ?>

						<!-- Comments Block End -->

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