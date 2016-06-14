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
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<?php wp_head(); ?>

<script type="text/javascript">
	function hideForm() {
		// document.getElementById('hideform').style.display = 'none';	
		// document.getElementsByClassName('hideform')[0].style.display='none';

	var hidden = document.getElementsByClassName('hideform'), i;

	for (var i = 0; i < hidden.length; i ++) {
    hidden[i].style.display = 'none';
		}		
	}

</script>

</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
		<div id="header">
		   <div class="topbar">
			 <?php require_once dirname( __FILE__ ) . '/functions/headers.php'; ?>
			</div> <!--  END topbar  -->
			<?php if ( of_get_option('logo_image') ) { ?>
               <a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo of_get_option('logo_image'); ?>" /></a>
			<?php } else if (of_get_option('header_logo_text1')){  ?>
				<a class="logo" href="<?php echo esc_url(home_url('/')); ?>"><span class="color"><?php echo of_get_option('header_logo_text1'); ?></span><?php echo of_get_option('header_logo_text2'); ?><span class="logotitle"><?php bloginfo('description'); ?></span></a>
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
			<?php
			    if (function_exists('zeno_font_resizer_place')) {
			        zeno_font_resizer_place();
			    }
			?>			
			</div> <!--  END menuwrapp  -->
			<div class="menuwrapp_mobile">
					 <a class="mobilemenu_toggle" href="#" >Menu</a>
					<?php if ( has_nav_menu( 'primary' ) ) { ?>
					   <?php wp_nav_menu( array('container'=> '', 'theme_location' => 'primary', 'items_wrap'  => '<ul class="menu_mobile">%3$s</ul>'  ) ); ?>
					<?php } else { ?>
						<?php wp_nav_menu(  array( 'menu_class'  => 'menu_mobile' ) ); ?>	
					<?php } ?>
			</div> <!--  END menuwrapp  -->
		</div> <!--  END header  -->
		<?php do_action( 'koenda_main_slider_display' ); ?>