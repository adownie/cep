<?php
if ( ! function_exists( 'koenda_main_slider' ) ) :
function koenda_main_slider() {
        global $post;
		$display_slider_on_page = of_get_option('display_slider_on_page');
		if (is_front_page() and $display_slider_on_page[1]==1) { $activate_slider = 1; } 
		if (is_page() and $display_slider_on_page[2]==1) { $activate_slider = 1; } 
		if (is_single() and $display_slider_on_page[3]==1) { $activate_slider = 1; } 
		if (is_category() and $display_slider_on_page[4]==1) { $activate_slider = 1; } 
		if (is_archive() and $display_slider_on_page[5]==1) { $activate_slider = 1; } 
		if (is_search() and $display_slider_on_page[6]==1) { $activate_slider = 1; } 
		if (is_tag() and $display_slider_on_page[7]==1) { $activate_slider = 1; } 			
		if (is_404() and $display_slider_on_page[8]==1) { $activate_slider = 1; } 
		if(isset($activate_slider)){
		if(of_get_option('display_slider')=='yes') { 
		$display_slider = get_post_meta($post->ID, 'display_slider', true);
		if($activate_slider==1 and $display_slider!=1) {	
		?>
		<div class="sliderwrapp">
			<div class="slider">
				<ul>
				<?php 
				if(strlen(of_get_option('category_slider'))>0) { $catslider=of_get_option('category_slider'); } else { $catslider=1; }
				query_posts('cat='.$catslider.'&orderby=date&order=DESC&posts_per_page=-1');
				while (have_posts()) : the_post(); 						
				$thum = get_post_meta($post->ID, '_thumbnail_id', true);						
				?>
					<li>
						<?php if( has_post_thumbnail() ) { ?>
								<?php echo get_the_post_thumbnail( $post->ID, 'large'); ?>
						<?php } ?>
						<div class="slidedata">
							<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
							<p class="postedinfo"><span class="authorname"><?php the_author(); ?></span> <span class="spostdate"><?php the_time('M d, Y'); ?></span></p>
							<p><?php the_excerpt(); ?></p>
							<a class="readmore" href="<?php the_permalink(); ?>"><?php _e( 'Read More', 'koenda' ); ?></a>
						</div> <!--  END slidedata  -->
					</li>
                <?php endwhile;  ?>
                <?php wp_reset_query(); ?>	
				</ul>
			</div> <!--  END slider  -->
			<a id="prevslide" href="#"><?php _e( 'prev slide', 'koenda' ); ?></a>
			<a id="nextslide" href="#"><?php _e( 'next slide', 'koenda' ); ?></a>
		</div> <!--  END sliderwrapp  -->
		<?php }} }
}
endif; 
add_action( 'koenda_main_slider_display', 'koenda_main_slider' );
?>