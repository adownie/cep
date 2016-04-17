<?php


add_action( 'wp_head', 'wen_corporate_add_ie_fix_scripts' );

if ( ! function_exists( 'wen_corporate_add_ie_fix_scripts' ) ) :

	/*
	 * Add IE hack scripts
	 */
	function wen_corporate_add_ie_fix_scripts(){

	  ?>
	  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	  <!--[if lt IE 9]>
	    <script src="<?php echo get_template_directory_uri();?>/js/html5shiv.min.js"></script>
	    <script src="<?php echo get_template_directory_uri();?>/js/respond.min.js"></script>
	  <![endif]-->
	  <?php

	}
endif;

/*
 * Add custom CSS
 */

add_action( 'wp_head', 'wen_corporate_add_custom_css', 20 );

if ( ! function_exists( 'wen_corporate_add_custom_css' ) ) :

  function wen_corporate_add_custom_css(){

    $custom_css = wen_corporate_get_option( 'custom_css' );
    if ( ! empty( $custom_css ) ) {
      $wen_corporate_custom_css = '<style type="text/css" media="screen">' . "\n";
      $wen_corporate_custom_css .= esc_textarea( $custom_css ) . "\n";
      $wen_corporate_custom_css .= '</style>' . "\n";
      echo $wen_corporate_custom_css;
    }

  }

endif;

/*
 * Implement Excerpt length
 */
add_filter( 'excerpt_length', 'wen_corporate_custom_excerpt_length', 999 );

if ( ! function_exists( 'wen_corporate_custom_excerpt_length' ) ) :
  function wen_corporate_custom_excerpt_length( $length ){

    $excerpt_length = wen_corporate_get_option( 'excerpt_length' );
    if ( $excerpt_length ) {
      $length = $excerpt_length;
    }
    $length = apply_filters( 'wen_corporate_filter_excerpt_length', esc_attr( $excerpt_length ) );
    return $length;

  }
endif;


/*
 * Implement Read more text
 */
add_filter( 'excerpt_more', 'wen_corporate_excerpt_readmore_text' );

if ( ! function_exists( 'wen_corporate_excerpt_readmore_text' ) ) :
  function wen_corporate_excerpt_readmore_text( $more ){

    global $post;

    $flag_apply_excerpt_readmore = apply_filters('wen_corporate_filter_excerpt_readmore', true );
    if ( true != $flag_apply_excerpt_readmore ) {
      return $more;
    }

    $read_more_text = wen_corporate_get_option( 'read_more_text' );

    if ( ! empty($read_more_text ) ) {
      $wen_corporate_more = '... <a href="'. esc_url( get_permalink($post->ID) ) . '" class="read-more">' . esc_attr( $read_more_text )  . '</a>';

      $more = $wen_corporate_more;
    }
    $more = apply_filters( 'wen_corporate_filter_read_more_content' , $more );

    return $more;

  }
endif;


/*
 * Implement Read more text in content
 */
add_filter( 'the_content_more_link', 'wen_corporate_content_more_link', 10, 2 );

if ( ! function_exists( 'wen_corporate_content_more_link' ) ) :
  function wen_corporate_content_more_link( $more_link, $more_link_text ){

    $flag_apply_excerpt_readmore = apply_filters('wen_corporate_filter_excerpt_readmore', true );
    if ( true != $flag_apply_excerpt_readmore ) {
      return $more_link;
    }

    $read_more_text = wen_corporate_get_option( 'read_more_text' );

    if ( ! empty($read_more_text ) ) {
      $more_link =  str_replace( $more_link_text, $read_more_text, $more_link );
    }
    return $more_link;

  }
endif;

/*
 * Init footer widgets
 */
add_action( 'widgets_init', 'wen_corporate_init_footer_widgets', 100 );

if ( ! function_exists( 'wen_corporate_init_footer_widgets' ) ) :
  function wen_corporate_init_footer_widgets(){

    $flag_apply_footer_widgets = apply_filters( 'wen_corporate_filter_footer_widgets', true );
    if ( true !== $flag_apply_footer_widgets ) {
      return false;
    }

    $footer_widgets = wen_corporate_get_option( 'footer_widgets' );
    $footer_widgets = absint( $footer_widgets );

    if ( $footer_widgets > 0 ) {
      register_sidebars( $footer_widgets, array(
        'name'          => __( 'Footer Column %d', 'wen-corporate' ),
        'id'            => 'footer-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
      ));
    }

  }
endif;

/*
 * Implement sidebar
 */
add_action( 'wen_corporate_action_sidebar', 'wen_corporate_implement_sidebar' );

if ( ! function_exists( 'wen_corporate_implement_sidebar' ) ) :
  function wen_corporate_implement_sidebar(){

    if ( is_active_sidebar( 'sidebar-1' ) ) {
      dynamic_sidebar( 'sidebar-1' );
    }
    else{
      // Display Text Widget
      $args = array(
        'title' => __( 'Sidebar Area', 'wen-corporate' ),
        'text'  => __( 'This is sidebar area. You are viewing this because there is no any widget in Sidebar Widget Area. Go to Appearance->Widgets in admin panel to add widgets.', 'wen-corporate' ),

      );
      $widget_args = array(
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
      );
      the_widget( 'WP_Widget_Text', $args, $widget_args );

    }

  }
endif;


/*
 * Implement header logo
 */
add_action( 'wen_corporate_action_header', 'wen_corporate_implement_header_logo' );

if ( ! function_exists( 'wen_corporate_implement_header_logo' ) ) :
  function wen_corporate_implement_header_logo(){

    $header_layout = wen_corporate_get_option( 'header_layout' );

    if ( ! in_array( $header_layout, array('layout-1','layout-2') )) {
      $header_layout = 'layout-1';
    }
    switch ($header_layout) {
      case 'layout-1':
        $row_class            = 'header-layout-1';
        $branding_class       = 'col-sm-8 site-branding';
        $sidebar_header_class = 'col-sm-4 header-area-right';
        break;
      case 'layout-2':
        $row_class            = 'header-layout-2';
        $branding_class       = 'col-sm-12 site-branding';
        $sidebar_header_class = 'header-area-right';
        break;
      default:
        break;
    }

    ?>
        <div class="row <?php echo esc_attr( $row_class ); ?>">
          <div class="<?php echo esc_attr( $branding_class ); ?>">
            <h1 class="site-title">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
              	<?php
              	$any_logo_available = false;
              	if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
	              	$any_logo_available = true;
              		the_custom_logo();
              	}
              	else {
	              	$site_logo = wen_corporate_get_option( 'site_logo' );
	              	if ( ! empty( $site_logo ) ) {
	              		$any_logo_available = true;
	              		?>
	              		<img src="<?php echo esc_url( $site_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
	              		<?php
	              	}
              	}
              	?>
                 <?php if ( false === $any_logo_available ) : ?>
                 	<?php bloginfo( 'name' ); ?>
                 <?php endif ?>
              </a>
            </h1>
            <?php
              $show_tagline = wen_corporate_get_option( 'show_tagline' );
             ?>
             <?php if ( $show_tagline ): ?>
              <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
             <?php endif ?>
          </div><!-- .site-branding -->
          <div class="<?php echo esc_attr( $sidebar_header_class ); ?>">
            <?php
              do_action( 'wen_corporate_action_header_right_area' );
            ?>
          </div>
        </div>


        <div style="display:none;">
          <div id="mob-menu">
              <?php
                wp_nav_menu( array(
					'theme_location' => 'primary',
					'container'      => '',
					'menu_class'     => 'menu',
					'fallback_cb'    => 'wen_corporate_primary_navigation_fallback',
                ) );
              ?>
          </div><!-- #mob-menu -->
        </div>

       <div id="site-navigation">
        <div class="main-container">
          <nav class="main-navigation">
            <?php
              wp_nav_menu( array(
				'theme_location' => 'primary',
				'container'      => '',
				'menu_class'     => 'menu',
				'fallback_cb'    => 'wen_corporate_primary_navigation_fallback',
              ) );
            ?>
          </nav><!-- .main-navigation -->
        </div>
      </div>

    <?php

  }
endif;



/*
 * Implement search box in header
 */
add_action( 'wen_corporate_action_header_right_area', 'wen_corporate_search_box_in_header', 10 );

if ( ! function_exists( 'wen_corporate_search_box_in_header' ) ) :
  function wen_corporate_search_box_in_header(){
    $show_search_in_header = wen_corporate_get_option( 'show_search_in_header' );
    if ( $show_search_in_header ) {
      ?>
      <a href="#" id="btn-search-icon"><i class="fa fa-search"></i></a>
      <div id="header-search-form">
        <?php
          get_search_form();
        ?>
      </div><!-- #header-search-form -->
      <?php
    }
  }
endif;


/*
 * Implement social icons in header
 */
add_action( 'wen_corporate_action_header_right_area', 'wen_corporate_social_icons_in_header', 20 );

if ( ! function_exists( 'wen_corporate_social_icons_in_header' ) ) :
  function wen_corporate_social_icons_in_header(){
    $show_social_in_header = wen_corporate_get_option( 'show_social_in_header' );
    if ( $show_social_in_header ) {
      the_widget( 'WEN_Corporate_Social_Widget' );
    }

  }
endif;

/*
 * Implement footer navigation and copyright
 */
add_action( 'wen_corporate_action_footer', 'wen_corporate_implement_footer_navigation_copyright', 10 );

if ( ! function_exists( 'wen_corporate_implement_footer_navigation_copyright' ) ) :
  function wen_corporate_implement_footer_navigation_copyright(){

    $footer_menu_content = wp_nav_menu( array(
      'theme_location' => 'footer',
      'container'      => 'div',
      'container_id'   => 'footer-navigation',
      'depth'          => 1,
      'fallback_cb'    => false,
      'echo'           => false,
    ) );
    $copyright_text = wen_corporate_get_option( 'copyright_text' );

    $enable_powered_by = wen_corporate_get_option( 'enable_powered_by' );

    if ( ! $footer_menu_content && empty( $copyright_text ) && 1 != $enable_powered_by ) {
      // nothing to show; bail now
      return;
    }

    echo '<div class="footer-copyright-wrap">';
    echo '<div class="row">';

      echo '<div class="footer-left col-sm-6">';

        echo ( $footer_menu_content ) ? $footer_menu_content : '' ;

        if ( ! empty($copyright_text)) {
          $wen_corporate_copyright_text = '<div class="copyright">';
            $wen_corporate_copyright_text .= esc_attr($copyright_text );
          $wen_corporate_copyright_text .= '</div>';

          echo $wen_corporate_copyright_text;
        }

      echo '</div><!-- .footer-left -->';

      echo '<div class="footer-right col-sm-6">';
        if ( 1 == $enable_powered_by ) {
          ?>
          <div class="site-info" id="powered-by">
           <a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wen-corporate' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'wen-corporate' ), 'WordPress' ); ?></a>
           <span class="sep"> | </span>
           <?php printf( __( 'Theme: %1$s by %2$s.', 'wen-corporate' ), 'WEN Corporate', '<a href="' . esc_url( 'http://wenthemes.com/' ) . '" rel="designer">WEN Themes</a>' ); ?>
          </div><!-- .site-info -->
          <?php
        }
      echo '</div><!-- .footer-right -->';

    echo '</div><!-- .footer-copyright-wrap -->';
    echo '</div><!-- .container -->';

  }
endif;


/*
 * Implement footer widgets
 */
add_action( 'wen_corporate_action_footer', 'wen_corporate_implement_footer_widgets', 2 );

if ( ! function_exists( 'wen_corporate_implement_footer_widgets' ) ) :
  function wen_corporate_implement_footer_widgets(){

    $flag_apply_footer_widgets = apply_filters('wen_corporate_filter_footer_widgets', true );
    if ( true !== $flag_apply_footer_widgets ) {
      return false;
    }
    $flag_footer_widgets_status = apply_filters('wen_corporate_filter_footer_widgets_status', true );
    if ( true !== $flag_footer_widgets_status ) {
      return false;
    }

    wen_corporate_display_footer_widgets();

  }
endif;


/*
 * Check footer widgets status
 */
add_filter( 'wen_corporate_filter_footer_widgets_status', 'wen_corporate_footer_widgets_status' );

if ( ! function_exists( 'wen_corporate_footer_widgets_status' ) ) :
  function wen_corporate_footer_widgets_status(){

    $footer_widgets = wen_corporate_get_option( 'footer_widgets' );
    $footer_widgets = absint( $footer_widgets );
    $status = false;
    if ( $footer_widgets > 0 ) {
      for( $i = 1; $i <= $footer_widgets; $i++ ){
        $sidebar_name = ( 1 == $i ) ? "footer-sidebar" : "footer-sidebar-$i" ;
        if ( is_active_sidebar( $sidebar_name ) ) {
          $status = true;
        }

      }
    }
    return $status;
  }
endif;

/*
 * Change sidebar status according selected theme options
 */
add_action( 'wen_corporate_filter_sidebar_status', 'wen_corporate_custom_sidebar_status' );

if ( ! function_exists( 'wen_corporate_custom_sidebar_status' ) ) :
  function wen_corporate_custom_sidebar_status( $status ){

    // First check global layout option for sidebar status
    $global_layout = wen_corporate_get_option( 'global_layout' );
    if ( 'no-sidebar' == $global_layout ) {
      $status = false;
    }


    // Check page template; Page will have higher priority than global layout
    if ( is_page() ) {
      if ( is_page_template( 'templates/no-sidebar.php' ) ) {
        $status = false;
      }
      if ( is_page_template( 'templates/left-sidebar.php' ) || is_page_template( 'templates/right-sidebar.php' ) ) {
        $status = true;
      }
    }

    // Disable sidebar for front page; conditionally;
    if ( is_front_page() ) {
      if ( 'page' == get_option( 'show_on_front' ) ) {
        $selected_static_page = get_option( 'page_on_front' );
        $current_page_template = get_post_meta( $selected_static_page, '_wp_page_template', true );
        if ( in_array( $current_page_template, array( 'templates/left-sidebar.php', 'templates/right-sidebar.php' ) ) ) {
          $status = true;
        }
        else{
          $status = false;
        }
      }
      else{
        $status = false;
      }
    }

    return $status;

  }
endif;


/*
 * Implement goto top
 */
add_action( 'wen_corporate_action_after', 'wen_corporate_implement_go_to_top' );

if ( ! function_exists( 'wen_corporate_implement_go_to_top' ) ) :
  function wen_corporate_implement_go_to_top(){

    $enable_go_to_top = wen_corporate_get_option( 'enable_go_to_top' );
    if ( 1 != $enable_go_to_top ) {
      return;
    }
    echo '<a href="#" class="scrollup" id="btn-scrollup"><i class="fa fa-chevron-circle-up"></i></a>';
  }
endif;


/*
 * Implement Banner in home page
 */
add_action( 'wen_corporate_action_after_content_start', 'wen_corporate_implement_banner_in_home_page' );

if ( ! function_exists( 'wen_corporate_implement_banner_in_home_page' ) ) :
  function wen_corporate_implement_banner_in_home_page(){

    $flag_apply_banner = apply_filters( 'wen_corporate_filter_apply_banner', false );

    if ( true !== $flag_apply_banner ) {
      return false;
    }

    get_template_part( 'template-parts/banner', 'slider' );

  }
endif;



/*
 * Check whether banner is applicable
 */
add_filter( 'wen_corporate_filter_apply_banner', 'wen_corporate_check_banner_applicable' );

if ( ! function_exists( 'wen_corporate_check_banner_applicable' ) ) :
  function wen_corporate_check_banner_applicable( $input ){

    $slider_status  = wen_corporate_get_option( 'slider_status' );

    if ( 'disable' === $slider_status ) {
      $input = false;
    }
    else{
      // not disabled; now check condition
      $slider_display = wen_corporate_get_option( 'slider_display' );
      if ( 'all-pages' === $slider_display ) {
        $input = true;
      }
      else if ( ( 'home-page-only' === $slider_display ) && ( is_home() || is_front_page() ) ) {
        $input = true;
      }

    }
    return $input;

  }
endif;

/*
 * Message to show in the Featured Image Meta box
 */
add_filter( 'admin_post_thumbnail_html', 'wen_corporate_featured_image_instruction', 10, 2 );

if ( ! function_exists( 'wen_corporate_featured_image_instruction' ) ) :
  function wen_corporate_featured_image_instruction( $content, $post_id ) {

    if ( 'post' === get_post_type( $post_id ) ) {

      $content .= '<strong>' . __( 'Recommended Image Sizes', 'wen-corporate' ) . ':</strong><br/>';
      $content .= __( 'Slider Image', 'wen-corporate' ).' : 1140px X 430px';

    }

    return $content;

  }
endif;



/*
 * Implement front page widget area
 */
add_action( 'wen_corporate_action_front_page', 'wen_corporate_implement_front_page_widget_area');

if ( ! function_exists( 'wen_corporate_implement_front_page_widget_area' ) ) :
  function wen_corporate_implement_front_page_widget_area() {

    echo '<div id="sidebar-front-page-widget-area">';
    if ( is_active_sidebar( 'sidebar-front-page-widget-area' ) ) {
      dynamic_sidebar( 'sidebar-front-page-widget-area' );
    }
    else{

      // Display Welcome widget
      $args = array(
        'title'       => __( 'Welcome', 'wen-corporate' ),
        'description' => __( 'This is Welcome Widget. You are viewing this because there is no any widget in Front Page Widget Area. Go to Appearance->Widgets in admin panel to add widgets.', 'wen-corporate' ),
      );
      $widget_args = array(
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
      );
      the_widget( 'WEN_Corporate_Welcome_Widget', $args, $widget_args );


      // Display CTA widget
      $args = array(
        'description' => __( 'This is Call To Action (CTA) Widget. Following widgets are available for you to display in front page. Welcome Widget, Service Widget, Recent Posts Block Widget, Call To Action (CTA) Widget', 'wen-corporate' ),
        'button_text' => __( 'Add Widgets Now', 'wen-corporate' ),
        'button_url'  => admin_url( 'widgets.php' ),

      );
      if ( current_user_can( 'manage_options' ) ) {
        $args['button_url'] = admin_url( 'widgets.php' );
      }
      else{
        $args['button_url'] = '#';
      }
      $widget_args = array(
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
      );
      the_widget( 'WEN_Corporate_CTA_Widget', $args, $widget_args );

      // Display Recent Posts widget
      $args = array(
        'title'             => __( 'Latest Highlights', 'wen-corporate' ),
        'show_post_excerpt' => true,
        'show_more_button'  => true,

      );
      $widget_args = array(
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
      );
      the_widget( 'WEN_Corporate_Recent_Posts_Block_Widget', $args, $widget_args );

    }
    echo '</div>';

  }
endif;


/*
 * Custom primary class
 */
add_filter( 'wen_corporate_filter_primary_class', 'wen_corporate_implement_primary_class');

if ( ! function_exists( 'wen_corporate_implement_primary_class' ) ) :
  function wen_corporate_implement_primary_class( $input ) {

    $sidebar_status = apply_filters('wen_corporate_filter_sidebar_status',true);

    if ( $sidebar_status ) {
      $input[] = 'col-sm-8';
    }
    else{
      $input[] = 'col-sm-12';
    }

    $global_layout = wen_corporate_get_option( 'global_layout' );

    $pull_class = '';

    switch ( $global_layout ) {
      case 'left-sidebar':
        $pull_class = 'pull-right';
        break;
      case 'right-sidebar':
        $pull_class = 'pull-left';
        break;
      default:
        break;
    }

    if ( is_page() ) {
      if (is_page_template( 'templates/left-sidebar.php' )) {
        $pull_class = 'pull-right';
      }
      else if (is_page_template( 'templates/right-sidebar.php' )) {
        $pull_class = 'pull-left';
      }

    }

    $input[] = $pull_class;

    return $input;

  }
endif;



/*
 * Custom secondary class
 */
add_filter( 'wen_corporate_filter_secondary_class', 'wen_corporate_implement_secondary_class');

if ( ! function_exists( 'wen_corporate_implement_secondary_class' ) ) :
  function wen_corporate_implement_secondary_class( $input ) {

    $input[] = 'col-sm-4';

    return $input;

  }
endif;



/*
 * Footer widget class
 */
add_filter( 'wen_corporate_filter_footer_widget_class', 'wen_corporate_custom_footer_widget_class', 10, 3 );

if ( ! function_exists( 'wen_corporate_custom_footer_widget_class' ) ) :
  function wen_corporate_custom_footer_widget_class( $class, $number, $count ) {

    switch ( $number ) {
      case 1:
        $class = ' col-sm-12 ';
        break;
      case 2:
        $class = ' col-sm-6 ';
        break;
      case 3:
        $class = ' col-sm-4 ';
        break;
      case 4:
        $class = ' col-sm-3 ';
        break;
      case 6:
        $class = ' col-sm-2 ';
        break;

      default:
        $class = '';
        break;
    }
    return $class;
  }
endif;


/*
 * Footer widget args
 */
add_filter( 'wen_corporate_filter_footer_widgets_args', 'wen_corporate_custom_footer_widget_args' );

if ( ! function_exists( 'wen_corporate_custom_footer_widget_args' ) ) :
  function wen_corporate_custom_footer_widget_args( $args ) {

    $args['before'] = '<div id="footer-widgets" class="site-footer-widgets row">';
    $args['after']  = '</div>';

    return $args;

  }
endif;

if ( ! function_exists( 'wen_corporate_modify_front_page_template' ) ) :
  /**
   * Modify front page template.
   *
   * @since 1.0.9
   */
  function wen_corporate_modify_front_page_template( $template ) {

    if ( 'page' == get_option( 'show_on_front' ) ) {
      $template = locate_template( 'page.php' );
    }
    return $template;

  }
endif;

add_filter( 'frontpage_template', 'wen_corporate_modify_front_page_template' );

if ( ! function_exists( 'wen_corporate_custom_content_width' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.3
	 */
	function wen_corporate_custom_content_width() {

		global $post, $content_width;

	  // Check if single page.
		if ( $post  && is_page() ) {
		  $page_template = get_page_template_slug( $post->ID );
			switch ( $page_template ) {

			  case 'templates/no-sidebar.php':
			    $content_width = 1110;
			    break;

			  case 'templates/left-sidebar.php':
			  case 'templates/right-sidebar.php':
			    $content_width = 730;
			    break;

			  default:
			    break;
			}
		}

	}
endif;

add_filter( 'template_redirect', 'wen_corporate_custom_content_width' );


if ( ! function_exists( 'wen_corporate_add_breadcrumb' ) ) :

	/**
	 * Custom content width.
	 *
	 * @since 1.5
	 */
function wen_corporate_add_breadcrumb() {

	// Bail if Breadcrumb disabled.
	$breadcrumb_type = wen_corporate_get_option( 'breadcrumb_type' );
	if ( 'disabled' === $breadcrumb_type ) {
		return;
	}

	// Bail if Home Page.
	if ( is_front_page() || is_home() ) {
		return;
	}

	echo '<div id="breadcrumb"><div class="container1">';
	switch ( $breadcrumb_type ) {
		case 'simple':
			wen_corporate_simple_breadcrumb();
		break;

		case 'advanced':
			if ( function_exists( 'bcn_display' ) ) {
				bcn_display();
			}
		break;

		default:
		break;
	}
	echo '</div><!-- .container1 --></div><!-- #breadcrumb -->';
	return;

}
endif;

add_action( 'wen_corporate_action_after_header', 'wen_corporate_add_breadcrumb' );
