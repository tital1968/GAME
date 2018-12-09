	<div class="space-title-block">
		<div class="space-title-block-wrap">
			<div class="space-title-block-ins aligncenter">
				<div class="space-title-block-meta"><?php the_author_posts_link(); ?> <span><?php echo get_the_date(); ?></span> 
				 <i class="fa fa-comments-o" aria-hidden="true"></i> <?php comments_number( '0', '1', '%' ); ?></div>
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	</div>