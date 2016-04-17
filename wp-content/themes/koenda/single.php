<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Koenda
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix <?php do_action( 'koenda_display_ps' ); ?>">
			    <?php if(of_get_option('default_layout')=='left') { get_sidebar(); } ?>
				<div class="pagecontent">
		        <?php if (have_posts()) : ?>
					<ul class="posts fullwidth singlepost">
					<?php while (have_posts()) : the_post(); ?>
						<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="short">
								<h2><?php if(get_the_title($post->ID)) { the_title(); } else { the_time(get_option( 'date_format' ));} ?></h2>
								<p class="posted"><span class="date_time"><?php the_time(get_option( 'date_format' )); ?></span> 
								<span class="postedby"><?php the_author(); ?></span> <span class="commentcount">
								<?php comments_popup_link('<span class="icon comments"></span> 0', '<span class="icon comments"></span> 1', '<span class="icon comments"></span> %', 'comment-link'); ?></span></p>
								<?php if( has_post_thumbnail() ) { echo get_the_post_thumbnail( $post->ID, 'featured'); }?>
								<p><?php the_content(); ?></p>
								<p class="meta_tags"><?php _e( 'Categories:', 'koenda' ); ?> <?php the_category(', '); ?></p>
								<p class="meta_tags"><?php the_tags(); ?></p>
								<?php 
								 wp_link_pages( array( 
											'before'            => '<div class="wp-pagenavi template_paginated">'.__( 'Pages:', 'koenda' ),
											'after'             => '</div>',
											'link_before'       => '<span class="current">',
											'link_after'        => '</span>',
											'pagelink'          => '%',
											'echo'              => 1 
								   ) );
								?>
							</div>
							<p><?php posts_nav_link(); ?></p>
							<p class="pagination">
								<span class="prev"><?php previous_post_link('%link'); ?></span>
								<span class="next"><?php next_post_link('%link'); ?></span>
							</p>
							<div id="comments">
								<?php comments_template(); ?>
							</div>
						</li>
					<?php endwhile; ?>
					</ul> 
					<?php else : ?>
					<ul class="posts fullwidth">
						<li>
							<h2 class="center"><?php _e( 'Not found', 'koenda' ); ?></h2>
							<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'koenda' ); ?></p>
						</li>	
					</ul>
					<?php endif; ?>
				</div> <!--  END Page  -->
				<?php if(of_get_option('default_layout')=='right') { get_sidebar(); } ?>
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>