	<div class="space-title-block">
		<div class="space-title-block-wrap">
			<div class="space-title-block-ins">
				<h1><?php if ( have_posts() ) : ?>
					<?php printf( esc_html__( 'search results for: %s', 'mercurylite' ), '' . get_search_query() . '' ); ?>
				<?php else : ?>
					<?php esc_html_e( 'nothing found', 'mercurylite' ); ?>
				<?php endif; ?></h1>
			</div>
		</div>
	</div>