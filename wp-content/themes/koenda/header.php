<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Koenda
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<div id="header">
		   <div class="topbar">
			<?php wp_nav_menu( array('container'=> 'ul', 'menu_class' => 'topbarnav',  'theme_location' => 'secondary' ) ); ?>
			<form id="topsearch" action="<?php echo esc_url(home_url('/')); ?>" method="post">
					<input id="search" name="s" type="text" value="<?php the_search_query(); ?>" placeholder="<?php _e( 'Search', 'koenda' );  ?>"/>
					<input id="button" name="submit" type="submit" value=""/>
			</form> <!--  END s  -->
			</div> <!--  END topbar  -->
			<?php if ( of_get_option('logo_image') ) { ?>
               <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(of_get_option('logo_image')); ?>" /></a>
			<?php } else if (of_get_option('header_logo_text1')){  ?>
				<a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><span class="color"><?php echo esc_html(of_get_option('header_logo_text1')); ?></span><?php echo esc_html(of_get_option('header_logo_text2')); ?><span class="logotitle"><?php bloginfo('description'); ?></span></a>
            <?php } else {  ?>
			    <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><span class="color"><?php bloginfo('name'); ?></span><span class="logotitle"><?php bloginfo('description'); ?></span></a>
			<?php } ?>
			<?php dynamic_sidebar('top-widget-area'); ?>
			<div class="menuwrapp">
			<?php if ( has_nav_menu( 'primary' ) ) { ?>
			   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'primary', 'items_wrap'  => '<ul class="menu">%3$s</ul>'  ) ); ?>
			<?php } else { ?>
				<?php wp_nav_menu(  array( 'menu_class'  => 'menu' ) ); ?>	
			<?php } ?>
			</div> <!--  END menuwrapp  -->
			<div class="menuwrapp_mobile">
					 <a class="mobilemenu_toggle" href="#" ><?php _e( 'Menu', 'koenda' ); ?></a>
					<?php if ( has_nav_menu( 'primary' ) ) { ?>
					   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'primary', 'items_wrap'  => '<ul class="menu_mobile">%3$s</ul>'  ) ); ?>
					<?php } else { ?>
						<?php wp_nav_menu(  array( 'menu_class'  => 'menu_mobile' ) ); ?>	
					<?php } ?>
			</div> <!--  END menuwrapp  -->
		</div> <!--  END header  -->