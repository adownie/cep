<?php 
/**
 * Template Name: Page: About Template
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix nosidebar about-template fullwidth">
				<div class="pagecontent">
				<div class="about-sidebar vc_col-sm-3 wpb_column vc_column_container singlepost">					
					<img src="<?php the_field('image'); ?>" class=" vc_box_border_grey attachment-medium">
					<a href="<?php the_field('link'); ?>" class="button"><?php the_field('link_title'); ?></a>
				</div>
				<div class="post-content vc_col-sm-9 wpb_column vc_column_container">
		        <?php if (have_posts()) : ?>
					<ul class="posts singlepost">
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
					</div>
					<div class="vc_col-sm-12 wpb_column vc_column_container print-only">
					<div class="vc_separator wpb_content_element vc_el_width_100 vc_sep_color_grey">
						<span class="vc_sep_holder vc_sep_holder_l"><span class="vc_sep_line"></span></span>
					</div>

						<?php the_field('secondary_content'); ?>
					</div>
					<?php if(function_exists('pf_show_link')){echo pf_show_link();} ?>
				</div> <!--  END Page  -->
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>