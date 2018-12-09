<?php
function mercurylite_remove_caption_extra_width($width) {
   return $width - 10;
}
add_filter('img_caption_shortcode_width', 'mercurylite_remove_caption_extra_width');

/*  Content Width Start  */

function mercurylite_content_terms() {

	$content_width = 684;

	$GLOBALS['content_width'] = apply_filters( 'mercurylite_content_terms', $content_width );

	add_theme_support( 'title-tag' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array(
			'image',
			'video',
			'gallery',
		) );
}
add_action( 'after_setup_theme', 'mercurylite_content_terms', 0 );

/*  Content Width End  */

/*  Pingback Start  */

function mercurylite_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'mercurylite_pingback_header' );

/*  Pingback End  */

/*  Navigation Markup Template Start  */

add_filter('navigation_markup_template', 'mercurylite_navigation_template', 10, 2 );
			function mercurylite_navigation_template( $template, $class ){
			return '
			<nav class="navigation %1$s">
				<div class="nav-links">%3$s</div>
			</nav>    
			';
}

/*  Navigation Markup Template End  */

/*  Customize Settings Start  */

function mercurylite_custom_logo_setup() {
    $defaults = array(
        'height'      => 43,
        'width'       => 248,
        'flex-height' => true,
		'flex-width' => false,
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'mercurylite_custom_logo_setup' );

 function mercurylite_categories_select() {
	  $cats = array();
	  $cats[0] = esc_html__( 'All', 'mercurylite' );
	  foreach ( get_categories() as $categories => $category ) {
	    $cats[$category->term_id] = $category->name;
	  }
	  return $cats;
}

function mercurylite_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

function mercurylite_sanitize_select( $input, $setting ) {
	
	// Ensure input is a slug.
	$input = sanitize_key( $input );
	
	// Get list of choices from the control associated with the setting.
	$choices = $setting->manager->get_control( $setting->id )->choices;
	
	// If the input is a valid key, return it; otherwise, return the default.
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function mercurylite_customizer_setting($wp_customize) {

	/*  Mobile Logo  */

    $wp_customize->add_setting('mercurylite_mobile_logo', array(
        'sanitize_callback' => 'esc_url_raw',
        'capability' =>  'edit_theme_options'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'mercurylite_mobile_logo', array(
        'label' => esc_html__( 'Mobile Logo', 'mercurylite' ),
        'section' => 'title_tagline',
        'settings' => 'mercurylite_mobile_logo',
        'priority' => 8
    )));

    /*  Main Color  */

    $wp_customize->add_setting( 'main_color', array(
		'default' => '#ab47bc',
		'sanitize_callback' => 'sanitize_hex_color',
		'capability' =>  'edit_theme_options'
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_color', array(
	    'label'   => esc_html__( 'Main Color', 'mercurylite' ),
	    'section' => 'colors',
	    'settings'   => 'main_color'
	)));

    /*  Boxed layout  */

	$wp_customize->add_setting( 'enable_boxed_layout', array(
		'default' => false,
		'sanitize_callback' => 'mercurylite_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_boxed_layout', array(
		'label' => esc_html__( 'Enable boxed layout', 'mercurylite' ),
	    'section'  => 'title_tagline',
	    'settings' => 'enable_boxed_layout',
	    'type'     => 'checkbox'
	)));

	/*  Homepage Featured Posts  */

	$wp_customize->add_setting( 'enable_featured_posts', array(
		'default' => true,
		'sanitize_callback' => 'mercurylite_sanitize_checkbox',
		'capability' =>  'edit_theme_options'
	 ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_featured_posts', array(
		'label' => esc_html__( 'Enable Featured Posts', 'mercurylite' ),
	    'section'  => 'static_front_page',
	    'settings' => 'enable_featured_posts',
	    'type'     => 'checkbox'
	)));

	$wp_customize->add_setting('featured_posts_category', array(
	    'default' => '',
	    'sanitize_callback' => 'mercurylite_sanitize_select',
	    'capability' =>  'edit_theme_options'
	));

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_posts_category', array(
		'label' => esc_html__( 'Featured Posts Category', 'mercurylite' ),
	    'section'  => 'static_front_page',
	    'settings' => 'featured_posts_category',
	    'type'     => 'select',
    	'choices' => mercurylite_categories_select()
	)));
}

add_action('customize_register', 'mercurylite_customizer_setting');

function mercurylite_custom_background_setup() {
	$defaults = array(
		'default-color'          => '',
		'default-image'          => '',
		'default-repeat'         => '',
		'default-position-x'     => '',
		'default-attachment'     => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_theme_support( 'custom-background', $defaults );
}
add_action( 'after_setup_theme', 'mercurylite_custom_background_setup' );

/*  Customize Settings End  */

/*  Menus, Languages and Thumbnails Start  */

function mercurylite_setup() {
	
	load_theme_textdomain( 'mercurylite', get_template_directory() . '/languages' );
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'mercurylite-mega-menu-img', 327, 184, true );
	add_image_size( 'mercurylite-single-post-img', 935, 526, true );
	add_image_size( 'mercurylite-featured-post-desc-img-1', 260, 364, true );
	add_image_size( 'mercurylite-featured-post-mobi-img-1', 768, 384, true );
	add_image_size( 'mercurylite-featured-post-big-desc-img-2', 693, 390, true );
	add_image_size( 'mercurylite-featured-post-small-desc-img-2', 347, 195, true );
	add_image_size( 'mercurylite-featured-post-mobi-img-2', 768, 216, true );
	add_image_size( 'mercurylite-archive-loop-img-1', 442, 249, true );
	add_image_size( 'mercurylite-single-post-img-style-2', 1040, 520, true );
	add_image_size( 'mercurylite-single-post-img-style-2-mobile', 700, 350, true );
	add_image_size( 'mercurylite-recent-posts-widget', 350, 175, true );
	add_image_size( 'mercurylite-games-sidebar-widget', 164, 92, true );
	add_image_size( 'mercurylite-games-cat-tablet', 710, 399, true );
	
	register_nav_menu( 'main-menu', esc_html__( 'Main Menu', 'mercurylite' ) );
	
}
add_action( 'after_setup_theme', 'mercurylite_setup' );

/*  Menus, Languages and Thumbnails End  */

/*  Widgets Setup Start  */

function mercurylite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mercurylite' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here to appear in your sidebar.', 'mercurylite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="space-widget-title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'mercurylite' ),
		'id'            => 'footer-one',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer.', 'mercurylite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="space-widget-title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'mercurylite' ),
		'id'            => 'footer-two',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer.', 'mercurylite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="space-widget-title">',
		'after_title'   => '</div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'mercurylite' ),
		'id'            => 'footer-three',
		'description'   => esc_html__( 'Add widgets here to appear in your Footer.', 'mercurylite' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<div class="space-widget-title">',
		'after_title'   => '</div>',
	) );

}
add_action( 'widgets_init', 'mercurylite_widgets_init' );

/*  Widgets Setup End  */

/*  Register Fonts Start  */

function mercurylite_google_fonts() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'mercurylite' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Muli:400,700|Open+Sans:300,400,700' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;
}

function mercurylite_fonts() {
    wp_enqueue_style( 'mercurylite-fonts', mercurylite_google_fonts(), array(), '1.1.7' );
}
add_action( 'wp_enqueue_scripts', 'mercurylite_fonts' );

/*  Register Fonts End  */

/*  Register Scripts & Colors Start  */

function mercurylite_scripts() {

	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'mercurylite-global-js', get_theme_file_uri( '/js/scripts.js' ), array( 'jquery' ), '1.1.7', true );
	
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ), array(), '4.7.0');
	wp_enqueue_style( 'mercurylite-style', get_stylesheet_uri(), array(), '1.1.7');
	wp_enqueue_style( 'mercurylite-media', get_theme_file_uri( '/css/media.css' ), array(), '1.1.7');
	
	global $mercurylite_data; 
			
			// First Custom Color
			
			if( !$main_custom_color = get_theme_mod( 'main_color' ) ) {
				$main_custom_color = '#ab47bc';
			} else {
				$main_custom_color = get_theme_mod( 'main_color' );
			}
			
			$custom_css = '

	/* Main Color */

.space-header-menu ul.main-menu li a:hover span {
	border-bottom:1px solid ' . esc_attr ($main_custom_color) . ';
}

a,
.space-header-menu ul.main-menu li ul.sub-menu li a:hover,
.space-left-content-one-item-category a,
.space-left-content-one-item-title a:hover,
.space-left-content-one-item-meta a:hover,
.space-news-one-item-1-title a:hover,
.space-news-one-item-1-meta a:hover,
.space-copy-wrap-ins a:hover,
.textwidget a,
.space-title-block-meta a:hover,
.space-breadcrumbs a:hover,
.space-left-content-tags a:hover,
.comments-area ul.comment-list li div.reply a:hover,
.comments-area a:hover,
.widget_recent_comments span.comment-author-link a:hover,
.widget_recent_comments ul li a:hover,
.widget_recent_entries ul li a:hover,
.widget_rss ul li a:hover,
.widget_rss ul li cite,
.space-widget-title a,
.space-content-block-404 span {
	color:' . esc_attr ($main_custom_color) . ';
}

	/* Label and Button Color */

.picture-post,
.video-post,
.space-featured-item-ins:hover .space-dark-overlay,
blockquote,
.comments-area p.form-submit input,
nav.pagination a,
nav.pagination-post a span.page-number,
nav.comments-pagination a,
.widget_tag_cloud a {
	background-color:' . esc_attr ($main_custom_color) . ';
}';

			$custom_css .= esc_attr($mercurylite_data['custom_css']);

			wp_add_inline_style( 'mercurylite-style', $custom_css );
	
}
add_action( 'wp_enqueue_scripts', 'mercurylite_scripts' );

/*  Register Scripts & Colors End  */

/*  MercuryLite Widgets Start */

require_once( get_template_directory() . '/theme-parts/widgets/recent-posts-for-sidebar-2.php' );

/*  MercuryLite Widgets End */