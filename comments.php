<?php
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) : ?>
		<h2>
			<?php
				$comments_number = get_comments_number();
				if ( '1' === $comments_number ) {
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'mercurylite' ), get_the_title() );
				} else {
					printf(
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$comments_number,
							'comments title',
							'mercurylite'
						),
						number_format_i18n( $comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>
		<ul class="comment-list">
			<?php
				wp_list_comments( array(
					'avatar_size' => 77,
					'style'       => 'ul',
					'short_ping'  => true,
					'reply_text'  =>  esc_html__( 'reply', 'mercurylite' ),
				) );
			?>

		</ul>
		<?php the_comments_pagination( array(
			'prev_text' => '' . esc_html__( '&#171;', 'mercurylite' ) . '',
			'next_text' => '' . esc_html__( '&#187;', 'mercurylite' ) . '',
		) );
	endif;
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<?php endif;
	comment_form(); ?>
</div>