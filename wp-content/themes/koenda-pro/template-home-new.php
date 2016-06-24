<?php 
/**
 * Template Name: New Home Page
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix nosidebar">
				<div class="pagecontent">				     
				     <div class="homepage">
						<?php 
						$posts = get_field('featured_page');
						
						if( $posts ): ?>	
						<div class="post-container">					    
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>
						        <div class="koenda-chb">
						        <div class="thumb-container" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>');">						        
						        </div>	
						            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>            
						            <?php the_excerpt(); ?>
						            <a class="wpb_button_a wpb_button  wpb_btn-danger wpb_regularsize" title="Learn More" href="<?php the_permalink(); ?>">Learn More</a>
						        </div>
						    <?php endforeach; ?>
						    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						    </div>
						<?php endif; ?>		
						<div class="clear"></div>
						<div class="home-content">							
							<?php the_field('home_content'); ?>
						</div>

						<div class="clear"></div>

						<?php 
						$posts = get_field('additional_posts');
						
						if( $posts ): ?>						
						<div class="post-container">					        
						    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
						        <?php setup_postdata($post); ?>
						        <div class="koenda-chb">
						        <div class="thumb-container" style="background-image:url('<?php echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>');">						        
						        </div>						        
						            <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>            
						            <?php the_excerpt(); ?>
						            <a class="wpb_button_a wpb_button  wpb_btn-danger wpb_regularsize" title="Learn More" href="<?php the_permalink(); ?>">Learn More</a>
						        </div>
						    <?php endforeach; ?>
						    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						    </div>
						<?php endif; ?>		



                        <div class="clear"></div>						
					</div>	

				</div> <!--  END Page  -->
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>