<?php
/**
 * Expound functions and definitions
 *
 * @package Koenda
 */
if ( ! function_exists( 'koenda_require_files' ) ) :
function koenda_require_files() {
	require( get_template_directory() . '/functions/widgets.php' );
	require( get_template_directory() . '/functions/head-css.php' );
	require( get_template_directory() . '/functions/post-fields.php' );
	require_once dirname( __FILE__ ) . '/functions/social-media.php';
	require_once dirname( __FILE__ ) . '/functions/sliders.php';		
}	
endif; 
add_action( 'after_setup_theme', 'koenda_require_files' );

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}
if ( ! function_exists( 'koenda_setup' ) ) :
function koenda_setup() {
	register_nav_menu( 'primary', __( 'Header Menu', "koenda" ) );
	register_nav_menu( 'secondary', __( 'Top Menu', "koenda" ) );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );	
	$custom_header_support = array(
		'default-text-color' => '000',
		'flex-height' => true,
	);
	set_post_thumbnail_size( 150, 150, true );
	add_image_size( 'large-feature', 600, 480, true );
	add_image_size( 'small-feature', 500, 300 );
	if ( ! isset( $content_width ) ) $content_width = 900;
}
endif; 
add_action( 'after_setup_theme', 'koenda_setup' );


if ( ! function_exists( 'koenda_of_register_js' ) ) :
function koenda_of_register_js() {
	if (!is_admin()) {
		wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'),'1.0', true);
		wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.js', array('jquery'),'1.0', true);
		wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css',false,'1.1','all');
		wp_enqueue_style( 'stylesheet', get_template_directory_uri() . '/css/custom-styles.css',false,'1.1','all');
	}
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif; 
add_action('wp_enqueue_scripts', 'koenda_of_register_js');

function pwt_of_analytics(){
	$analytics_code= of_get_option('analytics_code');
	echo '<script>'.stripslashes($analytics_code).'</script>';
}
add_action( 'wp_footer', 'pwt_of_analytics' );



/**
 * Custom subnav for Article pages
 */ 
function koenda_article_subnav() { 

	$submenu = '<div class="subnav"><h3><a href="/articles/estate-planning-101">Lessons in Estate Planning 101:</a></h3><ol>' . wp_list_pages("title_li=&child_of=33&echo=0") . '</ol></div>';

	return $submenu;

}

add_shortcode('koenda_subnav', 'koenda_article_subnav');

/**
 * Adding subnav for Articles
 */ 
function wpb_list_child_pages() { 

global $post; 

if ( is_page() && $post->post_parent )

	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->post_parent . '&echo=0' );
else
	$childpages = wp_list_pages( 'sort_column=menu_order&title_li=&child_of=' . $post->ID . '&echo=0' );

if ( $childpages ) {

	$string = '<ol>' . $childpages . '</ol>';
}

return $string;

}

add_shortcode('wpb_childpages', 'wpb_list_child_pages');
?>