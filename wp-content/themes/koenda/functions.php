<?php
/**
 * Koenda functions and definitions
 *
 * @package Koenda
 */
if ( ! function_exists( 'koenda_require_files' ) ) :
function koenda_require_files() {
	require( get_template_directory() . '/functions/widgets.php' );
	require( get_template_directory() . '/functions/head-css.php' );
	require( get_template_directory() . '/functions/post-fields.php' );
}	
endif; 
add_action( 'after_setup_theme', 'koenda_require_files' );

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', esc_url(get_template_directory_uri() . '/inc/') );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

if ( ! function_exists( 'koenda_setup' ) ) :
function koenda_setup() {
    global $content_width;
	if ( ! isset( $content_width ) ) { $content_width = 980; }
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
}
endif; 
add_action( 'after_setup_theme', 'koenda_setup' );


if ( ! function_exists( 'koenda_of_register_js' ) ) :
function koenda_of_register_js() {
	wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array('jquery'),'1.0', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
endif; 
add_action('wp_enqueue_scripts', 'koenda_of_register_js');

function koenda_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}
	
	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'koenda' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'koenda_wp_title', 10, 2 );

if ( ! function_exists( 'koenda_credits' ) ) :
function koenda_credits() {
	$text = 'Theme created by <a href="'.esc_url('http://www.pwtthemes.com/').'">PWT</a>. Powered by <a href="'.esc_url('http://wordpress.org/').'">WordPress.org</a>';
	echo apply_filters( 'koenda_credits', $text );
}
endif; 
add_action( 'koenda_display_credits', 'koenda_credits' );

if ( ! function_exists( 'koenda_get_list_posts' ) ) :
function koenda_get_list_posts() {
    global $wp_query;
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 
    $args = array(
        'post_type' => 'post',
        'orderby' => 'date',
		'order' => 'DESC',
		'paged' => $paged
    );
	$wp_query->query( $args );
    return new WP_Query( $args );
}
endif; 

if ( ! function_exists( 'koenda_get_list_pages' ) ) :
function koenda_get_list_pages() {
    global $wp_query;
    $args = array(
        'post_type' => 'page',
        'posts_per_page' => -1
    );
	$wp_query->query( $args );
    return new WP_Query( $args );
}
endif;

if ( ! function_exists( 'koenda_position_sidebar' ) ) :
function koenda_position_sidebar() {
	if(of_get_option('default_layout')=='right') { 
	   $text = 'right_sidebar'; 
	} 
	if(of_get_option('default_layout')=='left') { 
	   $text = 'left_sidebar'; 
	} 
	if(of_get_option('default_layout')=='none') { 
	   $text = 'nosidebar'; 
	}
	echo apply_filters('koenda_position_sidebar', $text);
}
endif; 
add_action( 'koenda_display_ps', 'koenda_position_sidebar' );
?>