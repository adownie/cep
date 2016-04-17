<?php

function themename_customize_register($wp_customize){


	 $wp_customize->add_section('themename_header', array(
        'title'    => 'Header',
        'priority' => 124,
    ));

	class Example_Customize_Textarea_Control extends WP_Customize_Control {
    public $type = 'textarea';
 
    public function render_content() {
	        ?>
	        <label>
	        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
	        </label>
	        <?php
	    }
	}
	
	//	==================================================
    //  =============================
    //  = ==== General Options    
    //  =============================
      
    $wp_customize->add_section('themename_general_mt', array(
        'title'    => 'General Options',
        'priority' => 121,
    ));
    
    
    //  =============================
    //  = Favicon             =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_favicon]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_favicon', array(
        'label'    => __('Upload Favicon (16px x 16px Png/Gif image)', 'themename'),
        'section'  => 'themename_general_mt',
        'settings' => 'themename_theme_options[mt_favicon]',
    )));

	//  =============================
    //  = Responsive   	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[mt_responsive]', array(
        'default'        => 'responsive_yes',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'mt_responsive', array(
        'settings' => 'themename_theme_options[mt_responsive]',
        'label'   => 'Layouts',
        'section' => 'themename_general_mt',
        'type'    => 'select',
        'choices'    => array(
        	'responsive_yes' => 'Responsive',
            'responsive_no' => 'Fixed',
        ),
    ));


	
	//  =============================
    //  = Breadcrumb  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_breadcrumb]', array(
        'capability' => 'edit_theme_options',
        'default'        => "1",
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('mt_breadcrumb', array(
        'settings' => 'themename_theme_options[mt_breadcrumb]',
        'label'    => 'Display Breadcrumb',
        'section'  => 'themename_general_mt',
       'type'    => 'select',
        'choices'    => array(
        	'1' => 'On',
            '2' => 'Off',
        ),
    ));
    
    
    //  =============================
    //  = Custom Css  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_css]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_css', array(
        'label'      => 'Custom CSS',
        'section'    => 'themename_general_mt',
        'settings'   => 'themename_theme_options[mt_css]',
    )));
    




	//	==================================================
    //  =============================
    //  = ==== Logo Options    
    //  =============================
      
    $wp_customize->add_section('themename_logo', array(
        'title'    => 'Logo',
        'priority' => 123,
    ));
    
    
    //  =============================
    //  = Logo             =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'default' => get_template_directory_uri().'/images/medicaldoctor_logo.gif',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_logo', array(
        'label'    => __('Upload Logo', 'themename'),
        'section'  => 'themename_logo',
        'settings' => 'themename_theme_options[mt_logo]',
    )));
    
    //  =============================
    //  = Logo Responsive            =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_r]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
        'default' => get_template_directory_uri().'/images/medicaldoctor_logo.gif',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'mt_logo_r', array(
        'label'    => __('Upload Responsive Logo', 'themename'),
        'section'  => 'themename_logo',
        'settings' => 'themename_theme_options[mt_logo_r]',
    )));
    
    //  =============================
    //  = Logo Widht   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_w]', array(
        'default'        => '230',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_w', array(
        'label'      => 'Logo Width (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_w]',
    ));
    
    //  =============================
    //  = Logo Height   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_h]', array(
        'default'        => '50',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_h', array(
        'label'      => 'Logo Height (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_h]',
    ));
    
    //  =============================
    //  = Logo margin Top   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_t]', array(
        'default'        => '15',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_t', array(
        'label'      => 'Logo Margin Top (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_t]',
    ));
    
    //  =============================
    //  = Logo margin Bottom   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_logo_b]', array(
        'default'        => '15',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_logo_b', array(
        'label'      => 'Logo Margin Bottom (px)',
        'section'    => 'themename_logo',
        'settings'   => 'themename_theme_options[mt_logo_b]',
    ));
    
    
    
    
    
    //	==================================================
    //  =============================
    //  = ==== Header Options    
    //  =============================
      
   
    //  =============================
    //  = Menu fixed 
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_menu_fix]', array(
    	'default'        => "1",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('mt_menu_fix', array(
        'settings' => 'themename_theme_options[mt_menu_fix]',
        'label'    => 'Fixed Menu',
        'section'  => 'themename_header',
        'type'     => 'checkbox',
    ));
    
    
    
    //  =============================
    //  = Header Style  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[mt_header_s]', array(
        'default'        => 'style_1',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'mt_header_s', array(
        'settings' => 'themename_theme_options[mt_header_s]',
        'label'   => 'Header Style',
        'section' => 'themename_header',
        'type'    => 'select',
        'choices'    => array(
        	'style_1' => 'Style 1',
            'style_2' => 'Style 2',
            'style_3' => 'Style 3',
            'style_4' => 'Style 4',
        ),
    ));
    
    //  =============================
    //  = Header Height   
    //  =============================
    #$wp_customize->add_setting('themename_theme_options[mt_header_h]', array(
    #    'default'        => '80',
    #    'capability'     => 'edit_theme_options',
    #    'type'           => 'option',
    #    
 
    #));
 
    #$wp_customize->add_control('mt_header_h', array(
    #    'label'      => 'Header Height (px)',
    #    'section'    => 'themename_header',
    #    'settings'   => 'themename_theme_options[mt_header_h]',
    #));
    
    //  =============================
    //  = Header Right margin Top   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_t]', array(
        'default'        => '20',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_header_t', array(
        'label'      => 'Header Right area Margin Top (px)',
        'section'    => 'themename_header',
        'settings'   => 'themename_theme_options[mt_header_t]',
    ));
    
    //  =============================
    //  = Header Button name   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_bn]', array(
        'default'        => 'Make an Appointment',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_header_bn', array(
        'label'      => 'Button Name',
        'section'    => 'themename_header',
        'settings'   => 'themename_theme_options[mt_header_bn]',
    ));
    
   
 //  =============================
    //  = Header Button url   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_bu]', array(
        'default'        => "http://www.themeforest.net",
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_header_bu', array(
        'label'      => 'Button URL',
        'section'    => 'themename_header',
        'settings'   => 'themename_theme_options[mt_header_bu]',
    ));
    
    

    
    //  =============================
    //  = Phone area  
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_phone]', array(
        'default'        => '<i class="icon-phone"></i>  Call Us: <strong>+371 2 200 055 99</strong>',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_header_phone', array(
        'label'      => 'Phone area',
        'section'    => 'themename_header',
        'settings'   => 'themename_theme_options[mt_header_phone]',
    )));
    
    
    
	//  =============================
    //  = Menu right area   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_ep]', array(
    	'default'        => "1",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('mt_header_ep', array(
        'settings' => 'themename_theme_options[mt_header_ep]',
        'label'    => 'Display Menu Right area',
        'section'  => 'themename_header',
        'type'     => 'checkbox',
    ));
    
    
    
    
        //  =============================
    //  = Header email   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_header_email]', array(
        'default'        => '<i class="icon-envelope"></i> your@domain.com',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_header_email', array(
        'label'      => 'E-mail area',
        'section'    => 'themename_header',
        'settings'   => 'themename_theme_options[mt_header_email]',
    )));
    
    
    
    
    $wp_customize->add_section('themename_color_scheme', array(
        'title'    => __('Style Options', 'themename'),
        'priority' => 125,
    ));
 
 
 
     //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('default_color', array(
        'default'           => '#7DB6D3',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'default_color', array(
        'label'    => __('Default Color', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'default_color',
    )));
    
    
   
 
 
 
    //  =============================
    //  = Radio Input               =
    //  =============================
    $wp_customize->add_setting('layout_style', array(
        'default'        => 'full',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
 
    $wp_customize->add_control('themename_layout_style', array(
        'label'      => __('Layout Style', 'themename'),
        'section'    => 'themename_color_scheme',
        'settings'   => 'layout_style',
        'type'       => 'radio',
        'choices'    => array(
            'full' => 'Full Width',
            'box' => 'Boxed',
        ),
    ));
 
 
 
 
 
 
   //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('bg_default_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bg_default_color', array(
        'label'    => __('Background Color', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'bg_default_color',
    )));
 
 

 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test', array(
        'label'    => __('Upload Background Image', 'themename'),
        'section'  => 'themename_color_scheme',
        'settings' => 'themename_theme_options[image_upload_test]',
    )));
 
    
 
    
    //  =============================
    //  = Background Repeat  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_repeat]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[background_repeat]',
        'label'   => 'Background Repeat:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'full' => 'Full',
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat',
            'repeat-x' => 'Repeat Horizontally',
            'repeat-y' => 'Repeat Vertically',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Attachment  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_attachment]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box2', array(
        'settings' => 'themename_theme_options[background_attachment]',
        'label'   => 'Background Attachment:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'fixed' => 'Fixed',
            'scroll' => 'Scroll',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Position  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_position]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box3', array(
        'settings' => 'themename_theme_options[background_position]',
        'label'   => 'Background Position:',
        'section' => 'themename_color_scheme',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'left top' => 'Left Top',
            'left center' => 'Left Center',
            'left bottom' => 'Left Bottom',
            'center top' => 'Center Top',
            'center center' => 'Center Center',
            'center bottom' => 'Center Bottom',
            'right top' => 'Right Top',
            'right center' => 'Right Center',
            'right bottom' => 'Right Bottom',
        ),
    ));
    
    
     //	==================================================
    //  =============================
    //  = ==== Title    
    //  =============================
      
    $wp_customize->add_section('themename_title', array(
        'title'    => __('Title', 'themename'),
        'priority' => 129,
    ));
	
    
    
     //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('bg_default_color_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bg_default_color_title', array(
        'label'    => __('Title Background Color', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'bg_default_color_title',
    )));
 
 

 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test_title]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test_title', array(
        'label'    => __('Upload Title Background Image', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'themename_theme_options[image_upload_test_title]',
    )));
    
    
    //  =============================
    //  = Background Repeat  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_repeat_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[background_repeat_title]',
        'label'   => 'Background Repeat:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat',
            'repeat-x' => 'Repeat Horizontally',
            'repeat-y' => 'Repeat Vertically',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Attachment  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_attachment_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box2', array(
        'settings' => 'themename_theme_options[background_attachment_title]',
        'label'   => 'Background Attachment:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'fixed' => 'Fixed',
            'scroll' => 'Scroll',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Position  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_position_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box3', array(
        'settings' => 'themename_theme_options[background_position_title]',
        'label'   => 'Background Position:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'left top' => 'Left Top',
            'left center' => 'Left Center',
            'left bottom' => 'Left Bottom',
            'center top' => 'Center Top',
            'center center' => 'Center Center',
            'center bottom' => 'Center Bottom',
            'right top' => 'Right Top',
            'right center' => 'Right Center',
            'right bottom' => 'Right Bottom',
        ),
    ));
 
    
    
    
    //	==================================================
    //  =============================
    //  = ==== Title    
    //  =============================
      
    $wp_customize->add_section('themename_title', array(
        'title'    => __('Title', 'themename'),
        'priority' => 129,
    ));
	
	
	//  =============================
    //  = Title Style 	=
    //  =============================
     $wp_customize->add_setting('themename_theme_options[title_style]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box23', array(
        'settings' => 'themename_theme_options[title_style]',
        'label'   => 'Title Style',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'mt_title_style_1' => 'Style 1',
            'mt_title_style_2' => 'Style 2',
        ),
    ));
    
    //  =============================
    //  = Color Picker              =
    //  =============================
    $wp_customize->add_setting('bg_default_color_title', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_hex_color',
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Color_Control($wp_customize, 'bg_default_color_title', array(
        'label'    => __('Title Background Color', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'bg_default_color_title',
    )));
 
 

 
 
    //  =============================
    //  = Image Upload              =
    //  =============================
    $wp_customize->add_setting('themename_theme_options[image_upload_test_title]', array(
        'capability'        => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'image_upload_test_title', array(
        'label'    => __('Upload Title Background Image', 'themename'),
        'section'  => 'themename_title',
        'settings' => 'themename_theme_options[image_upload_test_title]',
    )));
    
    
    //  =============================
    //  = Background Repeat  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_repeat_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box', array(
        'settings' => 'themename_theme_options[background_repeat_title]',
        'label'   => 'Background Repeat:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'no-repeat' => 'No Repeat',
            'repeat' => 'Repeat',
            'repeat-x' => 'Repeat Horizontally',
            'repeat-y' => 'Repeat Vertically',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Attachment  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_attachment_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box2', array(
        'settings' => 'themename_theme_options[background_attachment_title]',
        'label'   => 'Background Attachment:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'fixed' => 'Fixed',
            'scroll' => 'Scroll',
            'inherit' => 'Inherit',
        ),
    ));
    
    //  =============================
    //  = Background Position  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[background_position_title]', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'example_select_box3', array(
        'settings' => 'themename_theme_options[background_position_title]',
        'label'   => 'Background Position:',
        'section' => 'themename_title',
        'type'    => 'select',
        'choices'    => array(
        	'none' => 'Select',
            'left top' => 'Left Top',
            'left center' => 'Left Center',
            'left bottom' => 'Left Bottom',
            'center top' => 'Center Top',
            'center center' => 'Center Center',
            'center bottom' => 'Center Bottom',
            'right top' => 'Right Top',
            'right center' => 'Right Center',
            'right bottom' => 'Right Bottom',
        ),
    ));
 

  
    //	==================================================
    //  =============================
    //  = ==== Fonts    
    //  =============================
      
    $wp_customize->add_section('themename_fonts', array(
        'title'    => __('Fonts', 'themename'),
        'priority' => 130,
    ));
	
	
	//  =============================
    //  = Google Font name    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[font_name]', array(
        'default'        => 'Open+Sans:300,400,600,700',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control('mt_google_font_name', array(
        'label'      => 'Google Font Name',
        'section'    => 'themename_fonts',
        'settings'   => 'themename_theme_options[font_name]',
    ));
 
    
    //  =============================
    //  = Google Font name    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[font_css]', array(
        'default'        => "font-family: 'Open Sans', sans-serif;",
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
 
    $wp_customize->add_control('mt_google_font_css', array(
        'label'      => 'Google Font CSS',
        'section'    => 'themename_fonts',
        'settings'   => 'themename_theme_options[font_css]',
    ));
    
    
    
    //	==================================================
    //  =============================
    //  = ==== Footer    
    //  =============================
      
    $wp_customize->add_section('themename_footer', array(
        'title'    => 'Footer',
        'priority' => 131,
    ));
	
	//  =============================
    //  = Footer Top   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[footer_top]', array(
    	'default'        => "1",
        'capability' => 'edit_theme_options',
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('mt_footer_top', array(
        'settings' => 'themename_theme_options[footer_top]',
        'label'    => 'Display Top Footer',
        'section'  => 'themename_footer',
        'type'     => 'checkbox',
    ));
    
    
    //  =============================
    //  = Footer Bottom   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[footer_bottom]', array(
        'capability' => 'edit_theme_options',
        'default'        => "1",
        'type'       => 'option',
    ));
 
    $wp_customize->add_control('mt_footer_bottom', array(
        'settings' => 'themename_theme_options[footer_bottom]',
        'label'    => 'Display Bottom Footer',
        'section'  => 'themename_footer',
        'type'     => 'checkbox',
    ));
    
    
    //  =============================
    //  = Footer Top Columns  	    =
    //  =============================
     $wp_customize->add_setting('themename_theme_options[footer_columns]', array(
        'default'        => '2_4',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
 
    ));
    $wp_customize->add_control( 'mt_footer_columns', array(
        'settings' => 'themename_theme_options[footer_columns]',
        'label'   => 'Footer Columns:',
        'section' => 'themename_footer',
        'type'    => 'select',
        'choices'    => array(
       		'1_1' => '1/1',
        	'1_2' => '1/2',
            '1_3' => '1/3',
            '1_4' => '1/4',
            '2_4' => '2/4',
            '4_2' => '4/2',
        ),
    ));
    
	
	//  =============================
    //  = Copyright   
    //  =============================
    $wp_customize->add_setting('themename_theme_options[copyright_text]', array(
        'default'        => 'Copyright 2013. Powered by WordPress Theme. By M.Bitenieks',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        
 
    ));
 
    $wp_customize->add_control( new Example_Customize_Textarea_Control( $wp_customize, 'mt_copyright_text', array(
        'label'      => 'Copyright Text',
        'section'    => 'themename_footer',
        'settings'   => 'themename_theme_options[copyright_text]',
    )));
    
    
    
	//	==================================================
    //  =============================
    //  = ==== Social Icons    
    //  =============================
      
    $wp_customize->add_section('themename_icons', array(
        'title'    => __('Social Icons', 'themename'),
        'priority' => 140,
    ));
	
	
	//  =============================
    //  = Google Font name    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_icon_facebook]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_facebook', array(
        'label'      => 'Facebook icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_facebook]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_twitter]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_twitter', array(
        'label'      => 'Twitter icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_twitter]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_vimeo]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_vimeo', array(
        'label'      => 'Vimeo icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_vimeo]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_youtube]', array(
        'default'        => '#',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_youtube', array(
        'label'      => 'Youtube icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_youtube]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_linkedin]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_linkedin', array(
        'label'      => 'LinkedIn icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_linkedin]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_gplus]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_gplus', array(
        'label'      => 'Google Plus icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_gplus]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_dribble]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_dribble', array(
        'label'      => 'Dribble icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_dribble]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_skype]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_skype', array(
        'label'      => 'Skype icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_skype]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_delicious]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_delicious', array(
        'label'      => 'Delicious icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_delicious]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_amazon]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_amazon', array(
        'label'      => 'Amazon icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_amazon]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_yahoo]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_yahoo', array(
        'label'      => 'Yahoo icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_yahoo]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_pinterest]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_pinterest', array(
        'label'      => 'Pinterest icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_pinterest]',
    ));
    
    $wp_customize->add_setting('themename_theme_options[mt_icon_rss]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_icon_rss', array(
        'label'      => 'Rss icon link',
        'section'    => 'themename_icons',
        'settings'   => 'themename_theme_options[mt_icon_rss]',
    ));
    
    
    
    //	==================================================
    //  =============================
    //  = ==== Rewrite CPT    
    //  =============================
      
    $wp_customize->add_section('themename_rewrite', array(
        'title'    => __('Rewrite CPT', 'themename'),
        'priority' => 141,
    ));
	
	
	//  =============================
    //  = CPT doctor    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_doctor]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_rewrite_doctor', array(
        'label'      => 'Rewrite Doctor CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_doctor]',
    ));
    
    //  =============================
    //  = CPT Services    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_services]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_rewrite_services', array(
        'label'      => 'Rewrite Services CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_services]',
    ));

	//  =============================
    //  = CPT Portfolio    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_portfolio]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_rewrite_portfolio', array(
        'label'      => 'Rewrite Portfolio CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_portfolio]',
    ));
    
    
	//  =============================
    //  = CPT Causes    
    //  =============================
    $wp_customize->add_setting('themename_theme_options[mt_rewrite_causes]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
    ));
	$wp_customize->add_control('mt_rewrite_causes', array(
        'label'      => 'Rewrite Causes CPT slug',
        'section'    => 'themename_rewrite',
        'settings'   => 'themename_theme_options[mt_rewrite_causes]',
    ));


 

   
 
}
 
add_action('customize_register', 'themename_customize_register');

?>