<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="wrapper<?php if( get_theme_mod( 'enable_boxed_layout' ) ){ ?> boxed<?php } else { } ?>">

	<!-- Header Start -->
	
	<div class="space-header-block-out">
		<div class="space-header-block">
			<div class="space-header dark">
				<div class="space-header-wrap">
					<div class="space-header-wrap-ins">
						<div class="space-header-blocks">
						<div class="space-header-logo">
							<?php
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
								if ( has_custom_logo() ) {
								echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'"><img src="'. esc_url( $logo[0] ) .'" alt="'. esc_attr( get_bloginfo( 'name' ) ) .'"></a>';
								} else {
								echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'">'. esc_html( get_bloginfo( 'name' ) ) .'<span>'. esc_html( get_bloginfo( 'description' ) ) .'</span></a>';
								}
							?>
						</div>
						<div class="space-header-menu">
						<div class="space-header-search-icon">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
						<div class="space-header-menu-left">
						<?php wp_nav_menu( array( 'container' => 'ul', 'link_before' => '<span>', 'link_after' => '</span>', 'menu_class' => 'main-menu', 'theme_location' => 'main-menu', 'depth' => 3, 'fallback_cb' => '__return_empty_string' ) ); ?>
						</div>
						<div class="clear"></div>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Header End -->

	<?php if( is_home() ){ ?>

	<?php if( get_theme_mod( 'enable_featured_posts' ) ){ ?>

	<!-- Featured Posts Start -->

		<?php get_template_part( '/theme-parts/featured-posts/style-1' ); ?>

	<!-- Featured Posts End -->

	<?php } else { } ?>

	<?php } ?>