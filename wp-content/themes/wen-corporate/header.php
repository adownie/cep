<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package WEN_Corporate
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
/**
 * wen_corporate_action_before hook
 */
do_action( 'wen_corporate_action_before' );
?>

<div id="page" class="hfeed site container">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'wen-corporate' ); ?></a>
	<a href="#mob-menu" id="mobile-trigger"><i class="fa fa-th-list"></i></a>

		<?php
	    /**
	     * wen_corporate_action_before_header hook
	     */
	    do_action( 'wen_corporate_action_before_header' ); ?>


	<header id="masthead" class="site-header" role="banner">

			<?php
		    /**
		     * wen_corporate_action_header hook
		     *
		     * @hooked
		     * wen_corporate_implement_header_logo 10
		     */
		    do_action( 'wen_corporate_action_header' ); ?>


	</header><!-- #masthead -->

		<?php
	    /**
	     * wen_corporate_action_after_header hook
	     */
	    do_action( 'wen_corporate_action_after_header' ); ?>


	<div id="content" class="site-content row">
		<?php
	    /**
	     * wen_corporate_action_after_content_start hook
	     */
	    do_action( 'wen_corporate_action_after_content_start' ); ?>
