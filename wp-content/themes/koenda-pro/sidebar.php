<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Koenda
 */
?>
<div class="sidebar">
<?php
if (is_page()) { 
	$new_sidebar = get_post_meta( get_the_ID(), 'new_sidebar', true);
	if($new_sidebar==1){ $sidebar_select = 'widget-area-'.get_the_ID(); } else if($new_sidebar=='') { $sidebar_select = 'sidebar-widget-area'; } else { $sidebar_select = $new_sidebar; }
} 
else {
 $sidebar_select = 'sidebar-widget-area';
}
if (!dynamic_sidebar($sidebar_select) ) : ?>
				<div class="widget">
					<h3><?php _e( 'Pages', "koenda" ); ?></h3>
					<ul>
						<?php wp_list_pages('title_li='); ?>
					</ul>
				</div>
				<div class="widget">
					<h3><?php _e( 'Categories', "koenda" ); ?></h3>
						<ul>
						<?php wp_list_categories('title_li='); ?>
					</ul>
				</div>
				<div class="widget">
					<h3><?php _e( 'Archives', "koenda" ); ?></h3>
					<ul>
						<?php wp_get_archives('type=monthly'); ?>
					</ul>
				</div>
	<?php  if ( is_home() || is_page() ) { ?>
	<div class="widget">
					<h3><?php _e( 'Meta', "koenda" ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
	</div>
	<?php } ?>
<?php endif; ?>
</div> 