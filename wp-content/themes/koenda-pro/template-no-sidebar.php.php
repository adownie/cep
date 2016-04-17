<?php 
/**
 * Template Name: Page: No Sidebar
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix nosidebar">
				<div class="pagecontent">
		        <?php if (have_posts()) : ?>
					<ul class="posts fullwidth singlepost">
					<?php while (have_posts()) : the_post(); ?>
						<li>
							<div class="short">
							<?php if(get_post_meta($post->ID, 'display_title_page', true)!=1) { ?>
								<h2><?php the_title(); ?></h2>
							<?php } ?>
								<p><?php the_content(); ?></p>
							</div>
						</li>
					<?php endwhile; ?>
					</ul> 
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'koenda' ) . '</span>', 'after' => '</div>' ) ); ?>
					<?php else : ?>
					<ul class="posts fullwidth">
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