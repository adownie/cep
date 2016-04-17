<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 *
 * @package Koenda
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix <?php do_action( 'koenda_display_ps' ); ?>">
			    <?php if(of_get_option('default_layout')=='left') { get_sidebar(); } ?>
				<div class="pagecontent">
					<ul class="posts fullwidth">
						<li>
							<h2 class="center"><?php _e( 'Not found', 'koenda' ); ?></h2>
							<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'koenda' ); ?></p>
						</li>
					</ul> 
				</div> <!--  END Pagecontent  -->
				<?php if(of_get_option('default_layout')=='right') { get_sidebar(); } ?>
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>