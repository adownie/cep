<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Koenda
 */
?>
 <div id="footer" class="clearfix">
			<div class="widget-footer">
					<?php if ( is_active_sidebar('footer-widget-area-1') ) : ?>
						<?php dynamic_sidebar('footer-widget-area-1'); ?>
					<?php else : ?>	
						<div class="widget">
							<h3><?php _e( 'Recent Posts', "koenda" ); ?></h3>
							<ul>
								<?php wp_get_archives('type=postbypost&limit=10'); ?>
							</ul>
						</div>
					<?php endif; ?>
			</div>
			<div class="widget-footer">
					<?php if ( is_active_sidebar('footer-widget-area-2') ) : ?>
						<?php dynamic_sidebar('footer-widget-area-2'); ?>
					<?php else : ?>	
						<div class="widget">
							<h3><?php _e( 'Tag Cloud', "koenda" ); ?></h3>
							<ul>
								<?php wp_tag_cloud(); ?>
							</ul>
						</div>
					<?php endif; ?>
			</div>
			<div class="widget-footer">
					<?php if ( is_active_sidebar('footer-widget-area-3') ) : ?>
						<?php dynamic_sidebar('footer-widget-area-3'); ?>
					<?php else : ?>	
							<div class="widget">
								<h3><?php _e( 'Pages', "koenda" ); ?></h3>
								<ul>
									<?php wp_list_pages('title_li='); ?>
								</ul>
							</div>
					<?php endif; ?>
			</div>
			<div class="widget-footer wflast">
					<?php if ( is_active_sidebar('footer-widget-area-4') ) : ?>
						<?php dynamic_sidebar('footer-widget-area-4'); ?>
					<?php else : ?>	
						<div class="widget">
						<h3><?php _e( 'Search', "koenda" ); ?></h3>
								<?php get_search_form(); ?>
						</div>
					<?php endif; ?>
			</div>		
			<p class="copyright"><span class="ycopy"><?php  echo esc_html(of_get_option('footer_text_left')); ?></span>
			<span><?php do_action( 'koenda_display_credits' ); ?></span></p>
		</div> <!--  END Footer  -->
	</div> <!--  END Wrapper  -->
<?php wp_footer(); ?>		
</body>
</html>