<?php 
/**
 * Template Name: Page: Article Template
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix right_sidebar article-parent">
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
						<div class="page-navigation">
							<?php
							// $pagelist = get_pages('sort_column=menu_order&sort_order=asc');
							$pagelist = get_pages( array(
								'sort_column' => 'menu_order', 
								'child_of' =>'33') );
							$pages = array();
							foreach ($pagelist as $page) {
							   $pages[] += $page->ID;
							}
							
							$current = array_search(get_the_ID(), $pages);
							$prevID = $pages[$current-1];
							$nextID = $pages[$current+1];
							?>
							
							<div class="navigation">
							<?php if (!empty($prevID)) { ?>
							<div class="alignleft">
							<a href="<?php echo get_permalink($prevID); ?>"
							  title="<?php echo get_the_title($prevID); ?>"><?php echo get_the_title($prevID); ?></a>
							</div>
							<?php }
							if (!empty($nextID)) { ?>
							<div class="alignright">
							<a href="<?php echo get_permalink($nextID); ?>" 
							 title="<?php echo get_the_title($nextID); ?>"><?php echo get_the_title($nextID); ?></a>
							</div>
							<?php } ?>
							</div><!-- .navigation -->	
						</div>							
						<div class="clearfix"></div>
						<hr />
						 <div class="subnav"><?php echo koenda_article_subnav(); ?></div>
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
				<?php get_sidebar(); ?>
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>