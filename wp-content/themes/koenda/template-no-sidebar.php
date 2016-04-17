<?php 
/**
 * Template Name: Page: No Sidebar
 * 
 * @package Koenda 
 */
get_header(); ?>
		<div id="content">
			<div class="clearfix nosidebar">
				<div class="pagecontent">
		           <?php get_template_part( 'content-page'); ?>
				</div> <!--  END Page  -->
			</div> <!--  END Clearfix  -->
		</div> <!--  END Content  -->
<?php get_footer(); ?>