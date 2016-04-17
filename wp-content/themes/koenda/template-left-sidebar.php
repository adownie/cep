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
						<?php get_template_part( 'content-page'); ?>
				</div> <!--  END Page  -->
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>