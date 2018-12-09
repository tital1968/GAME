<?php
class mercurylite_recent_posts_for_sidebar_2 extends WP_Widget {

/*  mercurylite Recent Posts Sidebar #2 Setup  */

	function __construct() {
		parent::__construct(false, $name = esc_html__('Mercury Lite Recent Posts #2', 'mercurylite' ), array(
			'description' => esc_html__('Widget Recent Posts for Sidebars (only titles)', 'mercurylite' )
		));
	}

/*  Display mercurylite Recent Posts Sidebar #2  */

	public function widget( $args, $instance ) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : esc_html__( 'latest news', 'mercurylite' );

		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 3;
		if ( ! $number )
			$number = 3;
		$categories = isset( $instance['cats_id'] ) ? $instance['cats_id'] : '';

		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'cat'      => $categories,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
		?>
		<?php echo $args['before_widget']; ?>
		<?php if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<div class="space-widget-items">
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
										<div class="space-news-one-item-1">
											<div class="space-news-one-item-1-ins">
												<div class="space-news-one-item-1-title"><a href="<?php the_permalink(); ?>" title="<?php get_the_title() ? the_title() : the_ID(); ?>"><?php esc_html(get_the_title()) ? the_title() : the_ID(); ?></a></div>
												<div class="space-news-one-item-1-meta"><?php the_author_posts_link(); ?> - <?php echo get_the_date(); ?></div>
											</div>
										</div>
		<?php endwhile; ?>
		</div>
		<?php echo $args['after_widget']; ?>
		<?php

		wp_reset_postdata();

		endif;
	}

/*  Update mercurylite Recent Posts Sidebar #2  */

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		$instance['number'] = (int) $new_instance['number'];
		$instance['cats_id'] = (int) $new_instance['cats_id'];
		return $instance;
	}

/*  mercurylite Recent Posts Sidebar #2 Settings Form  */

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 3;
		$cats = get_categories();
		$categories = isset( $instance['cats_id'] ) ? $instance['cats_id'] : '';
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php esc_html_e( 'Title:', 'mercurylite' ); ?></label>
		<input class="widefat" id="<?php echo esc_html($this->get_field_id( 'title' )); ?>" name="<?php echo esc_html($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_html($title); ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of posts to show:', 'mercurylite' ); ?></label>
		<input class="tiny-text" id="<?php echo esc_html($this->get_field_id( 'number' )); ?>" name="<?php echo esc_html($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_html($number); ?>" size="3" /></p>
		
		<p><label for="<?php echo $this->get_field_id( 'cats_id' ); ?>"><?php esc_html_e('Select Category:' , 'mercurylite' );?></label>
		<select id="<?php echo $this->get_field_id( 'cats_id' ); ?>" name="<?php echo $this->get_field_name( 'cats_id' ); ?>">
 		<option value=""><?php esc_html_e('All' , 'mercurylite' );?></option>
			<?php foreach ( $cats as $cat ) {?>
			<option value="<?php echo $cat->term_id ?>"<?php echo selected( $categories, $cat->term_id, false ) ?>> <?php echo esc_html( $cat->name ) ?></option>
			<?php }?>
 		</select></p>
<?php
	}
}

add_action( 'widgets_init', 'mercurylite_recent_posts_for_sidebar_2' );

function mercurylite_recent_posts_for_sidebar_2() {
	register_widget( 'mercurylite_recent_posts_for_sidebar_2' );
}