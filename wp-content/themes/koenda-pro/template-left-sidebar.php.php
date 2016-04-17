<?php 
/**
 * Template Name: Page: Left Sidebar
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