						<div class="space-left-content-one-item">
						<?php $mercurylite_archive_loop_img_1 = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercurylite-archive-loop-img-1'); if ($mercurylite_archive_loop_img_1) { ?>
							<div class="space-left-content-one-item-pic">
								<div class="space-left-content-one-item-pic-ins">
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
										<div>
											<img src="<?php echo esc_url($mercurylite_archive_loop_img_1[0]); ?>" alt="<?php the_title_attribute(); ?>" />
											<?php if ( has_post_format( 'video' )) { ?>
											<div class="video-post"><i class="fa fa-play" aria-hidden="true"></i></div>
											<?php } ?>
											<?php if ( has_post_format( 'image' )) { ?>
											<div class="picture-post"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
											<?php } ?>
											<?php if ( has_post_format( 'gallery' )) { ?>
											<div class="picture-post"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
											<?php } ?>
										</div>
									</a>
								</div>
							</div>
							<div class="space-left-content-one-item-exc">
							<?php } else { ?>
							<div class="space-left-content-one-item-exc" style="width:100%;">
							<?php } ?>
								<div class="space-left-content-one-item-exc-ins">
									<div class="space-left-content-one-item-category"><?php the_category(', '); ?></div>
									<div class="space-left-content-one-item-title"><?php if ( is_sticky() ) { ?><i class="fa fa-paperclip" aria-hidden="true"></i> <?php } ?><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></div>
									<div class="space-left-content-one-item-meta"><?php echo get_the_date(); ?> - <?php the_author_posts_link(); ?></div>
									<div class="space-left-content-one-item-desc"><?php echo esc_html(wp_trim_words( get_the_excerpt(), 12, ' ...' )); ?></div>
								</div>
							</div>
						</div>