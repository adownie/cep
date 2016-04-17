<?php 
/**
 * Template Name: Blog: Right Sidebar
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix right_sidebar">
				<div class="pagecontent">
		            <?php get_template_part( 'content-post'); ?> 
				</div> <!--  END Page  -->
				<?php get_sidebar(); ?>
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>