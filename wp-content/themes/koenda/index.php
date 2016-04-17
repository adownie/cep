<?php
/**
 * The main template file.
 *
 * @package Koenda
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix <?php do_action( 'koenda_display_ps' ); ?>">
			    <?php if(of_get_option('default_layout')=='left') { get_sidebar(); } ?>
				<div class="pagecontent">
						<?php get_template_part( 'content-post'); ?> 
				</div> <!--  END Page  -->
				<?php if(of_get_option('default_layout')=='right') { get_sidebar(); } ?>
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>