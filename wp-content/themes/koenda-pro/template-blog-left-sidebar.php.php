<?php 
/**
 * Template Name: Blog: Left Sidebar
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix left_sidebar">
				<?php get_sidebar(); ?>
				<div class="pagecontent">
		        <?php if (have_posts()) : ?>
					<ul class="posts fullwidth singlepost">
					<?php 
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
					query_posts(array('post_type' => 'post', 'orderby'=> 'date', 'order'=> 'DESC', 'paged' => $paged));
					while (have_posts()) : the_post(); 
					?>
						<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<div class="short">
								<h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time('j M Y');} ?></a></h2>
								<p class="posted"><span class="date_time"><?php the_time('j M Y'); ?></span> 
								<span class="postedby"><?php the_author(); ?></span> <span class="commentcount">
								<?php comments_popup_link('<span class="icon comments"></span> 0', '<span class="icon comments"></span> 1', '<span class="icon comments"></span> %', 'comment-link'); ?></span></p>
								<?php if( has_post_thumbnail() ) { echo get_the_post_thumbnail( $post->ID, 'featured'); }?>
								<p><?php the_excerpt(); ?></p>
								<a class="readmore" href="<?php the_permalink() ?>"><?php _e( 'More', 'koenda' ); ?></a>
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
						<ul class="posts fullwidth singlepost">
							<li>
								<h2 class="center"><?php _e( 'Not found', 'koenda' ); ?></h2>
								<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'koenda' ); ?></p>
							</li>	
						</ul>
					<?php endif; ?>
				</div> <!--  END Page  -->
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>
