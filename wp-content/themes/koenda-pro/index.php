<?php
/**
 * The main template file.
 *
 * @package Koenda
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix <?php if(of_get_option('default_layout')=='right') { echo 'right_sidebar'; } ?> <?php if(of_get_option('default_layout')=='left') { echo 'left_sidebar'; } ?> <?php if(of_get_option('default_layout')=='none') { echo 'nosidebar'; } ?>">
			    <?php if(of_get_option('default_layout')=='left') { get_sidebar(); } ?>
				<div class="pagecontent">
		        <?php if (have_posts()) : ?>
					<ul class="posts fullwidth singlepost">
					<?php while (have_posts()) : the_post(); ?>
						<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="short">
								<h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time('j M Y');} ?></a></h2>
								<p class="posted">
								<span>Posted By <?php the_author(); ?></span> </p>
								<?php if( has_post_thumbnail() ) { echo get_the_post_thumbnail( $post->ID, 'featured'); }?>
								<?php the_excerpt(); ?>
								<a class="button" href="<?php the_permalink() ?>"><?php _e( 'Read More', 'koenda' ); ?></a>
							</div>
						</li>
					<?php endwhile; ?>
					</ul> 
					<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
						<p class="pagination">
							<span class="prev"><?php next_posts_link(__('Previous Posts', 'koenda')) ?></span>
							<span class="next"><?php previous_posts_link(__('Next posts', 'koenda')) ?></span>
						</p>
					<?php } ?>
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