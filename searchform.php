				<div class="space-search-form">
				<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ) ?>">
					<input type="text" class="custom-search" value="<?php echo get_search_query() ?>" name="s" placeholder="<?php echo esc_attr_x( 'search...', 'placeholder', 'mercurylite' ); ?>""><button class="search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
				</div>