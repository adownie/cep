<?php
if ( ! function_exists( 'koenda_widgets_init' ) ) :
function koenda_widgets_init() {
	register_sidebar(array(
		'name' => __( 'Sidebar Widget Area', "koenda"),
		'id' => 'sidebar-widget-area',
		'description' => __( 'The sidebar widget area', "koenda"),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));		
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 1', "koenda"),
		'id' => 'footer-widget-area-1',
		'description' => __( 'The footer widget area 1', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 2', "koenda"),
		'id' => 'footer-widget-area-2',
		'description' => __( 'The footer widget area 2', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 3', "koenda"),
		'id' => 'footer-widget-area-3',
		'description' => __( 'The footer widget area 3', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));	
	register_sidebar(array(
		'name' => __( 'Footer Widget Area 4', "koenda"),
		'id' => 'footer-widget-area-4',
		'description' => __( 'The footer widget area 4', "koenda"),
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
	$list_pages = koenda_get_list_pages();
	while ( $list_pages->have_posts() ) {
		$list_pages->the_post();
		$new_sidebar = get_post_meta( get_the_ID(), 'new_sidebar', true);
		if($new_sidebar==1) {
			register_sidebar(array(
				'name' => __( 'Sidebar for Page '.get_the_title(), "koenda"),
				'id' => 'widget-area-'.get_the_ID(),
				'description' => __( 'The pages widget area', "koenda"),
				'before_widget' => '<div class="widget">',
				'after_widget' => '</div>',
				'before_title' => '<h3>',
				'after_title' => '</h3>'
			));		
		}
	}
	wp_reset_postdata();	
}
endif;
add_action( 'widgets_init', 'koenda_widgets_init' );
?>