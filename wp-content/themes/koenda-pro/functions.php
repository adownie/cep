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
?>