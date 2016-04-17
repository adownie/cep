<?php 
/**
 * Template Name: Blog: Left Sidebar
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix left_sidebar">
				<?php get_sidebar(); ?>
				<div class="pagecontent">
		            <?php get_template_part( 'content-post'); ?> 
				</div> <!--  END Page  -->
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>
