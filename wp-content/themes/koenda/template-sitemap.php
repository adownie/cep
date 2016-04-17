<?php 
/**
 * Template Name: Page: Sitemap
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix sitemap">
				<div class="pagecontent">
		        <?php if (have_posts()) : ?>
					<ul class="posts fullwidth singlepostsitemap">
					<?php while (have_posts()) : the_post(); ?>
						<li>
							<div class="short">
								<?php if(get_post_meta($post->ID, 'display_title_page', true)!=1) { ?>
									<h2><?php the_title(); ?></h2>
								<?php } ?>
								<h3><?php _e( 'Pages', "koenda" ); ?></h3>
								<ul><?php wp_list_pages('title_li='); ?></ul>
								<h3><?php _e( 'Posts', "koenda" ); ?></h3>
								<ul>
									<?php
										$lastposts = get_posts('numberposts=-1');
										foreach($lastposts as $post) :
									?>
										<li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>
									<?php endforeach; ?>
								</ul>
								<h3><?php _e( 'Categories', "koenda" ); ?></h3>
								<ul><?php wp_list_categories('title_li='); ?></ul>
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