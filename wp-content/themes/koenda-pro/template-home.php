<?php 
/**
 * Template Name: Page: Home Page
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix nosidebar">
				<div class="pagecontent">
				     <?php // Here is the set code for the Home page ?>
				     <div class="homepage">
					    <?php if (of_get_option('top_box_1_title')<>'') : ?>
					 	<div class="koenda-chb">
							<?php if (of_get_option('top_box_1_image')<>'') : ?><a href="<?php  echo of_get_option('top_box_1_link'); ?>"><img height="180" width="270" src="<?php  echo of_get_option('top_box_1_image'); ?>" alt="" /></a><?php endif; ?>
							<h5><a href="<?php  echo of_get_option('top_box_1_link'); ?>"><?php  echo of_get_option('top_box_1_title'); ?></a></h5>
							<p><?php  echo of_get_option('top_box_1_content'); ?></p>
							<a class="wpb_button_a" title="Learn More" href="<?php  echo of_get_option('top_box_1_link'); ?>"><span class="wpb_button  wpb_btn-danger wpb_regularsize">Learn More</span></a>
						</div>
						<?php endif; ?>
						<?php if (of_get_option('top_box_2_title')<>'') : ?>
						<div class="koenda-chb">
							<?php if (of_get_option('top_box_2_image')<>'') : ?><a href="<?php  echo of_get_option('top_box_2_link'); ?>"><img height="180" width="270" src="<?php  echo of_get_option('top_box_2_image'); ?>" alt="" /></a><?php endif; ?>
							<h5><a href="<?php  echo of_get_option('top_box_2_link'); ?>"><?php  echo of_get_option('top_box_2_title'); ?></a></h5>
							<p><?php  echo of_get_option('top_box_2_content'); ?></p>
							<a class="wpb_button_a" title="Learn More" href="<?php  echo of_get_option('top_box_2_link'); ?>"><span class="wpb_button  wpb_btn-danger wpb_regularsize">Learn More</span></a>
						</div>
						<?php endif; ?>
						<?php if (of_get_option('top_box_3_title')<>'') : ?>
						<div class="koenda-chb last">
							<?php if (of_get_option('top_box_3_image')<>'') : ?><a href="<?php  echo of_get_option('top_box_3_link'); ?>"><img height="180" width="270" src="<?php  echo of_get_option('top_box_3_image'); ?>" alt="" /></a><?php endif; ?>
							<h5><a href="<?php  echo of_get_option('top_box_3_link'); ?>"><?php  echo of_get_option('top_box_3_title'); ?></a></h5>
							<p><?php  echo of_get_option('top_box_3_content'); ?></p>
							<a class="wpb_button_a" title="Read More" href="<?php  echo of_get_option('top_box_3_link'); ?>"><span class="wpb_button  wpb_btn-danger wpb_regularsize">Read More</span></a>
						</div>
						<?php endif; ?>
						<div class="clear"></div>
						<?php if (of_get_option('slogan_home_page')<>'') : ?><div class="koenda-heading-homepage"><h1><?php  echo of_get_option('slogan_home_page'); ?></h1></div><?php endif; ?>
						<?php if (of_get_option('simple_text_home_page')<>'') : ?><p><?php  echo of_get_option('simple_text_home_page'); ?></p><?php endif; ?>
						<div class="clear"></div>
						<?php if (of_get_option('footer_box_1_title')<>'') : ?>
						<div class="koenda-chb">
							<?php if (of_get_option('footer_box_1_image')<>'') : ?><a href="<?php  echo of_get_option('footer_box_1_link'); ?>"><img height="180" width="270" src="<?php  echo of_get_option('footer_box_1_image'); ?>" alt="" /></a><?php endif; ?>						
							<h5><a href="<?php  echo of_get_option('footer_box_1_link'); ?>"><?php  echo of_get_option('footer_box_1_title'); ?></a></h5>
							<p><?php  echo of_get_option('footer_box_1_content'); ?></p>
							<a class="wpb_button_a" title="Learn More" href="<?php  echo of_get_option('footer_box_1_link'); ?>"><span class="wpb_button  wpb_btn-danger wpb_regularsize">Learn More</span></a>
						</div>
						<?php endif; ?>
						<?php if (of_get_option('footer_box_2_title')<>'') : ?>
						<div class="koenda-chb">
							<?php if (of_get_option('footer_box_2_image')<>'') : ?><a href="<?php  echo of_get_option('footer_box_2_link'); ?>"><img height="180" width="270" src="<?php  echo of_get_option('footer_box_2_image'); ?>" alt="" /></a><?php endif; ?>							
							<h5><a href="<?php  echo of_get_option('footer_box_2_link'); ?>"><?php  echo of_get_option('footer_box_2_title'); ?></a></h5>
							<p><?php  echo of_get_option('footer_box_2_content'); ?></p>
							<a class="wpb_button_a" title="Learn More" href="<?php  echo of_get_option('footer_box_2_link'); ?>"><span class="wpb_button  wpb_btn-danger wpb_regularsize">Learn More</span></a>
						</div>
						<?php endif; ?>
						<?php if (of_get_option('footer_box_3_title')<>'') : ?>
						<div class="koenda-chb last">
							<?php if (of_get_option('footer_box_3_image')<>'') : ?><a href="<?php  echo of_get_option('footer_box_3_link'); ?>"><img height="180" width="270" src="<?php  echo of_get_option('footer_box_3_image'); ?>" alt="" /></a><?php endif; ?>							
							<h5><a href="<?php  echo of_get_option('footer_box_3_link'); ?>"><?php  echo of_get_option('footer_box_3_title'); ?></a></h5>
							<p><?php  echo of_get_option('footer_box_3_content'); ?></p>
							<a class="wpb_button_a" title="Learn More" href="<?php  echo of_get_option('footer_box_3_link'); ?>"><span class="wpb_button  wpb_btn-danger wpb_regularsize">Contact John</span></a>
						</div>
						<?php endif; ?>
                        <div class="clear"></div>						
					</div>	
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