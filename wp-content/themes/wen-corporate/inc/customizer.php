<?php
/**
 * WEN Corporate Theme Customizer
 *
 * @package WEN_Corporate
 */

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function wen_corporate_customize_preview_js() {
  wp_enqueue_script( 'wen_corporate_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'wen_corporate_customize_preview_js' );

$our_settings = array(

  'panels' => array(
    'wen_corporate_theme_options_panel' => array(
      'title'          => __( 'Theme Options', 'wen-corporate' ),
      'sections'       => array(
        'wc_general_section' => array(
          'title'       => __( 'General', 'wen-corporate' ),
          'fields'      => array(
            'site_logo' => array(
              'title'             => __( 'Logo', 'wen-corporate' ),
              'type'              => 'image',
              'sanitize_callback' => 'esc_url_raw',
            ),
            'color_scheme' => array(
              'title'   => __( 'Color Scheme', 'wen-corporate' ),
              'type'    => 'select',
              'default' => 'blue',
              'choices' => array(
                'blue'      => __( 'Blue', 'wen-corporate' ),
                'chocolate' => __( 'Chocolate', 'wen-corporate' ),
              ),
            ),
            'global_layout' => array(
              'title'   => __( 'Global Layout', 'wen-corporate' ),
              'type'    => 'select',
              'default' => 'right-sidebar',
              'choices' => array(
                'left-sidebar'  => __( 'Left Sidebar', 'wen-corporate' ),
                'right-sidebar' => __( 'Right Sidebar', 'wen-corporate' ),
                'no-sidebar'    => __( 'No Sidebar', 'wen-corporate' ),
              ),
            ),
            'enable_go_to_top' => array(
              'title'   => __( 'Enable Go To Top', 'wen-corporate' ),
              'type'    => 'checkbox',
              'default' => true,
            ),

          ),
        ),
        'wc_header_section' => array(
          'title'       => __( 'Header', 'wen-corporate' ),
          'fields'      => array(
            'header_layout' => array(
              'title'   => __( 'Header Layout', 'wen-corporate' ),
              'type'    => 'radio-image',
              'default' => 'layout-1',
              'choices' => array(
                'layout-1'=>get_template_directory_uri().'/images/header-layout-1.png',
                'layout-2'=>get_template_directory_uri().'/images/header-layout-2.png'
              ),
            ),
            'show_tagline' => array(
              'title'   => __( 'Show Tagline', 'wen-corporate' ),
              'type'    => 'checkbox',
              'default' => 1,
            ),
            'show_search_in_header' => array(
              'title'    => __( 'Show Search Box', 'wen-corporate' ),
              'type'     => 'checkbox',
              'default'  => '1',
            ),
            'show_social_in_header' => array(
              'title'    => __( 'Show Social Icons', 'wen-corporate' ),
              'type'     => 'checkbox',
            ),
          ),
        ),
        'wc_breadcrumb_section' => array(
          'title'       => __( 'Breadcrumb', 'wen-corporate' ),
          'fields'      => array(
            'breadcrumb_type' => array(
              'title'   => __( 'Breadcrumb Type', 'wen-corporate' ),
              'type'    => 'select',
              'default' => 'disabled',
              'choices' => array(
				'disabled' => __( 'Disabled', 'wen-corporate' ),
				'simple'   => __( 'Simple', 'wen-corporate' ),
				'advanced' => __( 'Advanced', 'wen-corporate' ),
              ),
            ),
          ),
        ),

        'wc_footer_section' => array(
          'title'  => __( 'Footer', 'wen-corporate' ),
          'fields' => array(
            'footer_widgets' => array(
              'title'   => __( 'Footer Widgets', 'wen-corporate' ),
              'type'    => 'select',
              'default' => 0,
              'choices' => array(
                '0' => __( 'No Widget', 'wen-corporate' ),
                '1' => sprintf( __( '%d Widget', 'wen-corporate' ), 1 ),
                '2' => sprintf( __( '%d Widgets', 'wen-corporate' ), 2 ),
                '3' => sprintf( __( '%d Widgets', 'wen-corporate' ), 3 ),
                '4' => sprintf( __( '%d Widgets', 'wen-corporate' ), 4 ),
              ),
            ),
            'copyright_text' => array(
              'title'     => __( 'Copyright Text', 'wen-corporate' ),
              'type'      => 'text',
              'default'   => __( 'Copyright &copy; All Rights Reserved.', 'wen-corporate' ),
            ),
            'enable_powered_by' => array(
              'title'     => __( 'Enable Powered By', 'wen-corporate' ),
              'type'      => 'checkbox',
            ),

          ),
        ),
        'wc_blog_section' => array(
          'title'  => __( 'Blog', 'wen-corporate' ),
          'fields' => array(
            'blog_layout' => array(
              'title'   => __( 'Blog Layout', 'wen-corporate' ),
              'type'    => 'select',
              'default' => 'full-post',
              'choices' => array(
                'full-post'              => __( 'Full Post', 'wen-corporate' ),
                'excerpt'                => __( 'Excerpt', 'wen-corporate' ),
                'excerpt-with-thumbnail' => __( 'Excerpt with Thumbnail', 'wen-corporate' ),
              ),
            ),
            'read_more_text' => array(
              'title'             => __( 'Read more text', 'wen-corporate' ),
              'type'              => 'text',
              'default'           => __( 'Read more', 'wen-corporate' ),
              'sanitize_callback' => 'sanitize_text_field',
            ),
            'excerpt_length' => array(
              'title'             => __( 'Excerpt Length', 'wen-corporate' ),
              'type'              => 'text',
              'default'           => 40,
              'sanitize_callback' => 'wen_corporate_sanitize_positive_integer',
            ),

          ),
        ),
        'wc_slider_section' => array(
          'title'  => __( 'Slider', 'wen-corporate' ),
          'fields' => array(
            'slider_status' => array(
              'title'    => __( 'Slider Status', 'wen-corporate' ),
              'type'     => 'select',
              'default'  => 'disable',
              'priority' => 50,
              'choices'  => array(
                'disable' => __( 'Disable', 'wen-corporate' ),
                'enable'  => __( 'Enable', 'wen-corporate' ),
              ),
            ),
            'slider_display' => array(
							'title'           => __( 'Slider Display', 'wen-corporate' ),
							'type'            => 'select',
							'default'         => 'all-pages',
							'priority'        => 60,
							'active_callback' => 'wen_corporate_customizer_slider_status',
							'choices'         => array(
                'all-pages'      => __( 'All Pages', 'wen-corporate' ),
                'home-page-only' => __( 'Home Page Only', 'wen-corporate' ),
              ),
            ),
            'slider_category' => array(
							'title'           => __( 'Slider Category', 'wen-corporate' ),
							'type'            => 'dropdown-taxonomies',
							'active_callback' => 'wen_corporate_customizer_slider_status',
            ),
            'number_of_slides' => array(
							'title'             => __( 'Number of Slides', 'wen-corporate' ),
							'type'              => 'text',
							'default'           => 3,
							'priority'          => 115,
							'sanitize_callback' => 'wen_corporate_sanitize_positive_integer',
							'active_callback'   => 'wen_corporate_customizer_slider_status',
            ),
            'transition_effect' => array(
							'title'           => __( 'Transition Effect', 'wen-corporate' ),
							'type'            => 'select',
							'default'         => 'fade',
							'priority'        => 120,
							'active_callback' => 'wen_corporate_customizer_slider_status',
							'choices'         => array(
                'fade'       => __( 'Fade', 'wen-corporate' ),
                'fadeout'    => __( 'Fade Out', 'wen-corporate' ),
                'none'       => __( 'None', 'wen-corporate' ),
                'scrollHorz' => __( 'Scroll Horizontal', 'wen-corporate' ),
              ),
            ),
            'show_caption' => array(
							'title'           => __( 'Show Caption', 'wen-corporate' ),
							'type'            => 'checkbox',
							'priority'        => 125,
							'active_callback' => 'wen_corporate_customizer_slider_status',
            ),
            'show_pager' => array(
							'title'           => __( 'Show Pager', 'wen-corporate' ),
							'type'            => 'checkbox',
							'priority'        => 130,
							'active_callback' => 'wen_corporate_customizer_slider_status',
            ),
            'auto_play' => array(
							'title'           => __( 'Enable Autoplay', 'wen-corporate' ),
							'type'            => 'checkbox',
							'default'         => '1',
							'priority'        => 135,
							'active_callback' => 'wen_corporate_customizer_slider_status',
            ),
            'transition_delay' => array(
							'title'             => __( 'Transition Delay', 'wen-corporate' ),
							'type'              => 'text',
							'default'           => '3000',
							'priority'          => 140,
							'sanitize_callback' => 'wen_corporate_sanitize_positive_integer',
							'active_callback'   => 'wen_corporate_customizer_slider_status',
            ),
            'transition_length' => array(
							'title'             => __( 'Transition Length', 'wen-corporate' ),
							'type'              => 'text',
							'default'           => '2000',
							'priority'          => 145,
							'sanitize_callback' => 'wen_corporate_sanitize_positive_integer',
							'active_callback'   => 'wen_corporate_customizer_slider_status',
            ),

          ),
        ),
        'wc_advanced_section' => array(
          'title'  => __( 'Advanced', 'wen-corporate' ),
          'fields' => array(
            'custom_css' => array(
              'title'                => __( 'Custom CSS', 'wen-corporate' ),
              'type'                 => 'textarea',
              'sanitize_callback'    => 'wp_filter_nohtml_kses',
              'sanitize_js_callback' => 'wp_filter_nohtml_kses',
            ),
          ),
        ),

      ),
    ),
  ),

);

$wen_corporate_customizer = new WEN_Customizer( $our_settings );

// Validation functions.
if ( ! function_exists( 'wen_corporate_sanitize_positive_integer' ) ) :

	/**
	 * Sanitize positive integer.
	 *
	 * @since 1.0.0
	 *
	 * @param int                  $input Number to sanitize.
	 * @param WP_Customize_Setting $setting WP_Customize_Setting instance.
	 * @return int Sanitized number; otherwise, the setting default.
	 */
	function wen_corporate_sanitize_positive_integer( $input, $setting ) {

		$input = absint( $input );

		// If the input is an absolute integer, return it.
		// otherwise, return the default.
		return ( $input ? $input : $setting->default );

	}

endif;

if ( ! function_exists( 'wen_corporate_customizer_slider_status' ) ) :

	/**
	 * Check if slider is active.
	 *
	 * @since 1.0.0
	 *
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 *
	 * @return bool Whether the control is active to the current preview.
	 */
	function wen_corporate_customizer_slider_status( $control ) {

		if ( 'enable' === $control->manager->get_setting( 'wen_slider_status' )->value() ) {
			return true;
		} else {
			return false;
		}

	}

endif;

/**
 * Add Upgrade To Pro button.
 *
 * @since 1.5
 */
function wen_corporate_custom_customize_enqueue_scripts() {

	wp_register_script( 'wen_corporate_customizer_button', get_template_directory_uri() . '/js/customizer-button.js', array( 'customize-controls' ), '1.5', true );
	$data = array(
	  'updrade_button_text' => __( 'Buy WEN Corporate Pro', 'wen-corporate' ),
	  'updrade_button_link' => esc_url( 'http://themepalace.com/downloads/wen-corporate-pro/' ),
	);
	wp_localize_script( 'wen_corporate_customizer_button', 'WEN_Corporate_Customizer_Object', $data );
	wp_enqueue_script( 'wen_corporate_customizer_button' );

}

add_action( 'customize_controls_enqueue_scripts', 'wen_corporate_custom_customize_enqueue_scripts' );

/**
 * Load styles for Customizer.
 *
 * @since 1.5
 */
function wen_corporate_load_customizer_styles() {

	global $pagenow;

	if ( 'customize.php' === $pagenow ) {
		wp_register_style( 'wen-corporate-customizer-style', get_template_directory_uri() . '/css/customizer.css', false, '1.5' );
		wp_enqueue_style( 'wen-corporate-customizer-style' );
	}

}

add_action( 'admin_enqueue_scripts', 'wen_corporate_load_customizer_styles' );
