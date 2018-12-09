<?php get_header(); ?>
	<?php if(have_posts()) : while(have_posts()) : the_post(); ?>

	<!-- Title Block Start -->

		<?php get_template_part( '/theme-parts/post-title/style-1' ); ?>

	<!-- Title Block End -->

	<!-- Right Sidebar Block Start -->

	<div class="space-content-block">
		<div class="space-content-block-ins">
			<div class="space-content-block-wrap">
				<div class="space-left-content">
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
					<div class="space-left-content-ins">

						<?php if(has_excerpt()){ ?>
							<div class="space-left-content-exc">
								<?php the_excerpt(); ?>
							</div>
						<?php } else { } ?>
						<?php if ( has_post_format( 'video' )) { ?>
						<?php } else { ?>
						<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercurylite-single-post-img'); if ($src) { ?>
							<div class="space-left-content-thumb">
								<img src="<?php echo esc_url($src[0]); ?>" alt="<?php the_title_attribute(); ?>" />
							</div>
						<?php } else { } ?>
						<?php } ?>

						<?php the_content();
							
							wp_link_pages( array(
									'before'      => '<nav class="navigation pagination-post">' . esc_html__( 'Pages:', 'mercurylite' ),
									'after'       => '</nav>',
									'link_before' => '<span class="page-number">',
									'link_after'  => '</span>',
							) );
						?>
							
						<?php endwhile; ?>
						<?php endif; ?>

						<?php
							the_tags('<div class="space-left-content-tags"><i class="fa fa-tags" aria-hidden="true"></i>', ' ', '</div>');
						?>

						<!-- Comments Block Start -->

						<?php if ( comments_open() || get_comments_number() ) :?>
						<?php comments_template();
						endif; ?>

						<!-- Comments Block End -->

					</div>
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