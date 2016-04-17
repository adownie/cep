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
?>
<?php if ( is_active_sidebar($sidebar_select) ) : ?>
    <?php dynamic_sidebar($sidebar_select); ?>
<?php else : ?>	
	<div class="widget">
		<?php get_search_form(); ?>
	</div>
	<div class="widget">
		<h3><?php _e( 'Recent Posts', "koenda" ); ?></h3>
		<ul>
			<?php wp_get_archives('type=postbypost&limit=10'); ?>
		</ul>
	</div>
	<div class="widget">
		<h3><?php _e( 'Pages', "koenda" ); ?></h3>
		<ul>
			<?php wp_list_pages('title_li='); ?>
		</ul>
	</div>
	<div class="widget">
		<h3><?php _e( 'Tag Cloud', "koenda" ); ?></h3>
		<ul>
			<?php wp_tag_cloud(); ?>
		</ul>
	</div>
<?php endif; ?>
</div> 