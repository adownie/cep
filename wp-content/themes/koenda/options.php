<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet
	$themename = wp_get_theme();
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'options_framework_theme'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );

	// Pull all the categories into an array
	$options_categories = array();
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
		$options_categories[$category->cat_ID] = $category->cat_name;
	}
	// Pull all tags into an array
	$options_tags = array();
	$options_tags_obj = get_tags();
	foreach ( $options_tags_obj as $tag ) {
		$options_tags[$tag->term_id] = $tag->name;
	}
	// Pull all the pages into an array
	$options_pages = array();
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
		$options_pages[$page->ID] = $page->post_title;
	}
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/inc/images/';
	$set_year = date('Y');
	$options = array();

	/* General Settings */	
	
	$options[] = array(
		'name' => __('General Settings', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Header Logo Text', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_logo_text1',
		'std' => '',
		'class' => 'mini', 
		'type' => 'text');	

	$options[] = array(
		'name' => __('Header Logo Text 2', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_logo_text2',
		'std' => '',
		'class' => 'mini', 
		'type' => 'text');			
		
	$options[] = array(
		'name' => __('Header Logo Image', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'logo_image',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Fav Icon URL', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'fav_icon',
		'type' => 'upload');

	$options[] = array(
		'name' => __('Web Clip Icon URL', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'web_clip',
		'type' => 'upload');
		
	$options[] = array(
		'name' => "Default Layout",
		'desc' => "",
		'id' => "default_layout",
		'std' => "right",
		'type' => "images",
		'options' => array(
			'none' => $imagepath . '1col.png',
			'left' => $imagepath . '2cl.png',
			'right' => $imagepath . '2cr.png')
	);	
	$options[] = array(
		'name' =>  __('Background', 'options_framework_theme'),
		'desc' => __('Change the background CSS.', 'options_framework_theme'),
		'id' => 'background_data',
		'std' => $background_defaults,
		'type' => 'background' );	

	$options[] = array(
		'name' => __('Footer copyright text left', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_text_left',
		'std' => 'Copyright &copy; '.$set_year.' '.get_bloginfo('name'),
		'type' => 'text');
			

	$options[] = array(
		'name' => __('Enter your custom CSS styles.', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'custom_css_styles',
		'std' => '',
		'type' => 'textarea');	

	$options[] = array(
		'name' => __('Home Page', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Top Box 1 Image', 'options_framework_theme'),
		'desc' => __('Recommended image sizes 270X180', 'options_framework_theme'),
		'id' => 'top_box_1_image',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 1 Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_1_title',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Top Box 1 Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_1_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Top Box 1 Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_1_content',
		'type' => 'textarea');
		
	$options[] = array(
		'name' => __('Top Box 2 Image', 'options_framework_theme'),
		'desc' => __('Recommended image sizes 270X180', 'options_framework_theme'),
		'id' => 'top_box_2_image',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 2 Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_2_title',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Top Box 2 Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_2_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Top Box 2 Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_2_content',
		'type' => 'textarea');	

	$options[] = array(
		'name' => __('Top Box 3 Image', 'options_framework_theme'),
		'desc' => __('Recommended image sizes 270X180', 'options_framework_theme'),
		'id' => 'top_box_3_image',
		'type' => 'upload');	
		
	$options[] = array(
		'name' => __('Top Box 3 Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_3_title',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Top Box 3 Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_3_link',
		'type' => 'text');	
		
	$options[] = array(
		'name' => __('Top Box 3 Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_box_3_content',
		'type' => 'textarea');		

	$options[] = array(
		'name' => __('Slogan Home Page', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'slogan_home_page',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Simple Text Home Page', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'simple_text_home_page',
		'type' => 'editor');

	$options[] = array(
		'name' => __('Footer Box 1  Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_1_title',
		'type' => 'text');

	$options[] = array(
		'name' => __('Footer Box 1  Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_1_link',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Footer Box 1  Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_1_content',
		'type' => 'textarea');	

	$options[] = array(
		'name' => __('Footer Box 2  Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_2_title',
		'type' => 'text');

	$options[] = array(
		'name' => __('Footer Box 2  Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_2_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Footer Box 2  Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_2_content',
		'type' => 'textarea');	
		
	$options[] = array(
		'name' => __('Footer Box 3  Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_3_title',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Footer Box 3  Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_3_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Footer Box 3  Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_3_content',
		'type' => 'textarea');	

	$options[] = array(
		'name' => __('Footer Box 4  Title', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_4_title',
		'type' => 'text');
		
	$options[] = array(
		'name' => __('Footer Box 4  Link', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_4_link',
		'type' => 'text');		
		
	$options[] = array(
		'name' => __('Footer Box 4  Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_box_4_content',
		'type' => 'textarea');			

	return $options;
}