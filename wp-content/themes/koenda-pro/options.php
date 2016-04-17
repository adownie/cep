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

	// Test data
	$slider_display = array(
		'yes' => __('Yes', 'options_framework_theme'),
		'no' => __('No', 'options_framework_theme'),
	);
	
	$pattern = array(
		'45degreee_fabric' => __('45 Degreee Fabric', 'options_framework_theme'),
		'60degree_gray' => __('60 Degree Gray', 'options_framework_theme'),
		'always_grey' => __('Always Grey', 'options_framework_theme'),
		'beige_paper' => __('Beige Paper', 'options_framework_theme'),
		'black_denim' => __('Black Denim', 'options_framework_theme'),
		'black_paper' => __('Black Paper', 'options_framework_theme'),
		'black-Linen' => __('Black Linen', 'options_framework_theme'),
		'blackmamba' => __('Black Mamba', 'options_framework_theme'),
		'bright_squares' => __('Bright Squares', 'options_framework_theme'),
		'brushed_alu' => __('Brushed Alu', 'options_framework_theme'),
		'brushed_alu_dark' => __('Brushed Alu Dark', 'options_framework_theme'),
		'carbon_fibre' => __('Carbon Fibre', 'options_framework_theme'),
		'concrete_wall' => __('Concrete Wall', 'options_framework_theme'),
		'concrete_wall_2' => __('Concrete Wall 2', 'options_framework_theme'),
		'concrete_wall_3' => __('Concrete Wall 3', 'options_framework_theme'),
		'cork_1' => __('Cork 1', 'options_framework_theme'),
		'crossed_stripes' => __('Crossed Stripes', 'options_framework_theme'),
		'dark_stripes' => __('Dark Stripes', 'options_framework_theme'),
		'darth_stripe' => __('Darth Stripe', 'options_framework_theme'),
		'double_lined' => __('Double Lined', 'options_framework_theme'),
		'exclusive_paper' => __('Exclusive Paper', 'options_framework_theme'),
		'fabric_1' => __('Fabric 1', 'options_framework_theme'),
		'gray_sand' => __('Gray Sand', 'options_framework_theme'),
		'green_gobbler' => __('Green Gobbler', 'options_framework_theme'),
		'green-fibers' => __('Green Fibers', 'options_framework_theme'),
		'grunge_wall' => __('Grunge Wall', 'options_framework_theme'),
		'handmadepaper' => __('Handmade Paper', 'options_framework_theme'),
		'leather_1' => __('Leather 1', 'options_framework_theme'),
		'light_honeycomb' => __('Light Honeycomb', 'options_framework_theme'),
		'little_pluses' => __('Little Pluses', 'options_framework_theme'),
		'micro_carbon' => __('Micro Carbon', 'options_framework_theme'),
		'noisy' => __('Noisy', 'options_framework_theme'),
		'old_mathematics' => __('Old Mathematics', 'options_framework_theme'),
		'padded' => __('Padded', 'options_framework_theme'),
		'paper_1' => __('Paper 1', 'options_framework_theme'),
		'paper_2' => __('Paper 2', 'options_framework_theme'),
		'paper_3' => __('Paper 3', 'options_framework_theme'),
		'pinstripe' => __('Pinstripe', 'options_framework_theme'),
		'random_grey_variations' => __('Random Grey Variations', 'options_framework_theme'),
		'rockywall' => __('Rockywall', 'options_framework_theme'),
		'smooth_wall' => __('Smooth Wall', 'options_framework_theme'),
		'soft_wallpaper' => __('Soft Wallpaper', 'options_framework_theme'),
		'subtle_freckles' => __('Subtle Freckles', 'options_framework_theme'),
		'subtle_orange_emboss' => __('Subtle Orange Emboss', 'options_framework_theme'),
		'tactile_noise' => __('Tactile Noise', 'options_framework_theme'),
		'vichy' => __('Vichy', 'options_framework_theme'),
		'wavecut' => __('Wavecut', 'options_framework_theme'),
		'white_carbon' => __('White Carbon', 'options_framework_theme'),
		'white_sand' => __('White Sand', 'options_framework_theme'),
		'wood_1' => __('Wood 1', 'options_framework_theme'),
	);

	$choose_layout_style = array(
		'boxed' => __('Boxed', 'options_framework_theme'),
		'wide' => __('Wide', 'options_framework_theme'),
	);	

	$header_style = array(
		'1' => __('Header 1', 'options_framework_theme'),
		'2' => __('Header 2', 'options_framework_theme'),
		'3' => __('Header 3', 'options_framework_theme'),
		'4' => __('Header 4', 'options_framework_theme'),
		'5' => __('Header 5', 'options_framework_theme'),
		'6' => __('Header 6', 'options_framework_theme'),
		'7' => __('Header 7', 'options_framework_theme'),
		'8' => __('Header 8', 'options_framework_theme'),
		'9' => __('Header 9', 'options_framework_theme'),
		'10' => __('Header 10', 'options_framework_theme'),
	);	
	
	
	$transitions = array(
		'none' => __('none', 'options_framework_theme'),
		'fadeout' => __('fadeout', 'options_framework_theme'),
		'scrollUp' => __('scrollUp', 'options_framework_theme'),
		'scrollDown' => __('scrollDown', 'options_framework_theme'),
		'scrollLeft' => __('scrollLeft', 'options_framework_theme'),
		'scrollRight' => __('scrollRight', 'options_framework_theme'),
		'scrollHorz' => __('scrollHorz', 'options_framework_theme'),
		'scrollVert' => __('scrollVert', 'options_framework_theme'),
		'slideX' => __('slideX', 'options_framework_theme'),
		'slideY' => __('slideY', 'options_framework_theme'),
		'shuffle' => __('shuffle', 'options_framework_theme'),	
		'turnUp' => __('turnUp', 'options_framework_theme'),
		'turnDown' => __('turnDown', 'options_framework_theme'),
		'turnLeft' => __('turnLeft', 'options_framework_theme'),
		'turnRight' => __('turnRight', 'options_framework_theme'),
		'zoom' => __('zoom', 'options_framework_theme'),
		'fadeZoom' => __('fadeZoom', 'options_framework_theme'),	
		'blindX' => __('blindX', 'options_framework_theme'),	
		'blindY' => __('blindY', 'options_framework_theme'),	
		'blindZ' => __('blindZ', 'options_framework_theme'),	
		'growX' => __('growX', 'options_framework_theme'),	
		'growY' => __('growY', 'options_framework_theme'),	
		'curtainX' => __('curtainX', 'options_framework_theme'),	
		'curtainY' => __('curtainY', 'options_framework_theme'),	
		'cover' => __('cover', 'options_framework_theme'),	
		'uncover' => __('uncover', 'options_framework_theme'),	
		'toss' => __('toss', 'options_framework_theme'),	
		'wipe' => __('wipe', 'options_framework_theme'),			
	);	
	
	// Multicheck Array
	$multicheck_array = array(
		'1' => __('Front Page', 'options_framework_theme'),
		'2' => __('Page', 'options_framework_theme'),
		'3' => __('Single Page', 'options_framework_theme'),
		'4' => __('Category Page', 'options_framework_theme'),
		'5' => __('Archive Page', 'options_framework_theme'),
		'6' => __('Search Page', 'options_framework_theme'),		
		'7' => __('Tag Page', 'options_framework_theme'),
		'8' => __('404 Page', 'options_framework_theme')
	);
	// Multicheck Defaults
	$multicheck_defaults = array(
		'1' => '1'
	);
	// Background Defaults
	$background_defaults = array(
		'color' => '',
		'image' => '',
		'repeat' => 'repeat',
		'position' => 'top center',
		'attachment'=>'scroll' );
		
	$fontsSeraliazed = file_get_contents(dirname( __FILE__ ) . '/inc/options-fonts.php');
	$fontArray = unserialize($fontsSeraliazed);	
	$faces_options = array();	


	$faces_options["1|font-family: Arial,sans-serif;"] = 'Arial';
	$faces_options["1|font-family: 'BebasNeueRegular',sans-serif;"] = 'Bebas Neue Regular';
	$i=0;
	foreach($fontArray as $v)	{
	$i++;
	   $faces_options[$v['css-name'].'|'.$v['font-family']] = $v['font-name'];
	}
	
	// Typography Options
	$typography_options = array(
		'faces' => $faces_options
	);
	
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
	$imagepath =  get_template_directory_uri() . '/images/';
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
		'std' => 'Koenda',
		'class' => 'mini', 
		'type' => 'text');	

	$options[] = array(
		'name' => __('Header Logo Text 2', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_logo_text2',
		'std' => 'Theme',
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
		'name' => __('Pattern', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'pattern_set',
		'std' => 'concrete_wall_3',
		'type' => 'select',
		'class' => 'mini', 
		'options' => $pattern);
	
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

		
	/* Featured Slider */		
		
	$options[] = array(
		'name' => __('Slider', 'options_framework_theme'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Display Slider', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'display_slider',
		'std' => 'yes',
		'type' => 'select',
		'class' => 'mini', 
		'options' => $slider_display);	

		
	if ( $options_categories ) {
	$options[] = array(
		'name' => __('Select a Category for Slider', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'category_slider',
		'type' => 'select',
		'options' => $options_categories);
	}	
	
	$options[] = array(
		'name' => __('Display Slider on Page', 'options_framework_theme'),
		'desc' => __('Multicheck description.', 'options_framework_theme'),
		'id' => 'display_slider_on_page',
		'std' => $multicheck_defaults, // These items get checked by default
		'type' => 'multicheck',
		'options' => $multicheck_array);
		
	$options[] = array(
		'name' => __('Transition Effect', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'transition_effect',
		'std' => 'fadeout',
		'type' => 'select',
		'options' => $transitions);	


	$options[] = array(
		'name' => __('Transition Delay', 'options_framework_theme'),
		'desc' => __('millisecond(s)', 'options_framework_theme'),
		'id' => 'transition_delay',
		'std' => '',
		'class' => 'mini', 
		'type' => 'text');

	$options[] = array(
		'name' => __('Transition Length', 'options_framework_theme'),
		'desc' => __('millisecond(s)', 'options_framework_theme'),
		'id' => 'transition_length',
		'std' => '',
		'class' => 'mini', 
		'type' => 'text');		


    /* Social Links */		
		
	$options[] = array(
		'name' => __('Social', 'options_framework_theme'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Rss', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_rss',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Delicious', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_delicious',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Deviantart', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_deviantart',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Digg', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_digg',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Facebook', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_facebook',
		'std' => 'http://www.facebook.com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Flickr', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_flickr',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Google', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_googleplus',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Lastfm', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_lastfm',
		'std' => '',
		'type' => 'text');		
	$options[] = array(
		'name' => __('Linkedin', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_linkedin',
		'std' => 'http://www.linkedin.com',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Myspace', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_myspace',
		'std' => '',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Reddit', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_reddit',
		'std' => '',
		'type' => 'text');		
	$options[] = array(
		'name' => __('Technorati', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_technorati',
		'std' => '',
		'type' => 'text');		
	$options[] = array(
		'name' => __('Tumblr', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_tumblr',
		'std' => '',
		'type' => 'text');		
	$options[] = array(
		'name' => __('Twitter', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_twitter',
		'std' => 'http://www.twitter.com',
		'type' => 'text');
	$options[] = array(
		'name' => __('Vimeo', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_vimeo',
		'std' => '',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Youtube', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_youtube',
		'std' => 'http://www.youtube.com',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Aim', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_aim',
		'std' => '',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Amazon', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_amazon',
		'std' => '',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Dribbble', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_dribbble',
		'std' => '',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Itunes', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_itunes',
		'std' => '',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Messenger', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_messenger',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Netvibes', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_netvibes',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Orkut', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_orkut',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Picasa', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_picasa',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Skype', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_skype',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Stumbleupon', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_stumbleupon',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Vcard', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_vcard',
		'std' => '',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Wikipedia', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_wikipedia',
		'std' => '',
		'type' => 'text');	
	$options[] = array(
		'name' => __('Yelp', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'url_yelp',
		'std' => '',
		'type' => 'text');	

    /* Webmaster Tools */	
		
	$options[] = array(
		'name' => __('Webmaster Tools', 'options_framework_theme'),
		'type' => 'heading');		

	$options[] = array(
		'name' => __('Google Site Verification ID', 'options_framework_theme'),
		'desc' => __('Enter your Google ID', 'options_framework_theme'),
		'id' => 'google_site_verification',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Yahoo Site Verification ID', 'options_framework_theme'),
		'desc' => __('Enter your Yahoo ID', 'options_framework_theme'),
		'id' => 'yahoo_site_verification',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Bing Site Verification ID', 'options_framework_theme'),
		'desc' => __('Enter your Bing ID', 'options_framework_theme'),
		'id' => 'bing_site_verification',
		'std' => '',
		'type' => 'text');
	$options[] = array(
		'name' => __('Analytics Code to display on Footer', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'analytics_code',
		'std' => '',
		'type' => 'textarea');

	$options[] = array(
		'name' => __('Fonts', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array( 'name' => __('Top Menu', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "top_menu_font",
		'std' => array('size' => '16px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#A3A3A3' ),
		'type' => 'typography',
		'options' => $typography_options);
		
	$options[] = array( 'name' => __('Main Menu', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "main_menu_font",
		'std' => array('size' => '16px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#FEFEFE' ),
		'type' => 'typography',
		'options' => $typography_options);	

	$options[] = array( 'name' => __('Body Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "body_content",
		'std' => array('size' => '13px', 'face' => "1|font-family: Arial,sans-serif;", 'style' => 'normal', 'color' => '#5A5A5A' ),
		'type' => 'typography',
		'options' => $typography_options);

	$options[] = array( 'name' => __('Title Content', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_content",
		'std' => array('size' => '24px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);

	$options[] = array( 'name' => __('Title Slider', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_slider",
		'std' => array('size' => '21px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#FEFEFE' ),
		'type' => 'typography',
		'options' => $typography_options);			
		
	$options[] = array( 'name' => __('Content Slider', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "content_slider",
		'std' => array('size' => '13px', 'face' => "1|font-family: Arial,sans-serif;", 'style' => 'normal', 'color' => '#999999' ),
		'type' => 'typography',
		'options' => $typography_options);
		
	$options[] = array( 'name' => __('Title Sidebar', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_sidebar",
		'std' => array('size' => '24px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);
		
	$options[] = array( 'name' => __('Title Footer', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "title_footer",
		'std' => array('size' => '22px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#FFFFFF' ),
		'type' => 'typography',
		'options' => $typography_options);

	$options[] = array( 'name' => __('Content Footer', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "content_footer",
		'std' => array('size' => '13px', 'face' => "1|font-family: Arial,sans-serif;", 'style' => 'normal', 'color' => '#686868' ),
		'type' => 'typography',
		'options' => $typography_options);
		
	$options[] = array( 'name' => __('Input Text', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "input_text",
		'std' => array('size' => '12px', 'face' => "1|font-family: Arial,sans-serif;", 'style' => 'normal', 'color' => '#A3A3A3' ),
		'type' => 'typography',
		'options' => $typography_options);
		
	$options[] = array( 'name' => __('H1 Heading', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "heading1",
		'std' => array('size' => '24px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);
	$options[] = array( 'name' => __('H2 Heading', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "heading2",
		'std' => array('size' => '22px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);	
	$options[] = array( 'name' => __('H3 Heading', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "heading3",
		'std' => array('size' => '20px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);	
	$options[] = array( 'name' => __('H4 Heading', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "heading4",
		'std' => array('size' => '18px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);	
	$options[] = array( 'name' => __('H5 Heading', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "heading5",
		'std' => array('size' => '16px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);	
	$options[] = array( 'name' => __('H6 Heading', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => "heading6",
		'std' => array('size' => '14px', 'face' => "1|font-family: 'BebasNeueRegular',sans-serif;", 'style' => 'normal', 'color' => '#343434' ),
		'type' => 'typography',
		'options' => $typography_options);			
		
	$options[] = array(
		'name' => __('Colors', 'options_framework_theme'),
		'type' => 'heading');	

	$options[] = array(
		'name' => __('General Color', 'options_framework_theme'),
		'desc' => __('Selected by default #FF7200.', 'options_framework_theme'),
		'id' => 'general_color',
		'std' => '#FF7200',
		'type' => 'color' );			
		
	$options[] = array(
		'name' => __('Border Top Menu', 'options_framework_theme'),
		'desc' => __('Selected by default #CDCDCD.', 'options_framework_theme'),
		'id' => 'border_top_menu',
		'std' => '#CDCDCD',
		'type' => 'color' );			

	$options[] = array(
		'name' => __('Background Main Menu', 'options_framework_theme'),
		'desc' => __('Selected by default #1B1B1B.', 'options_framework_theme'),
		'id' => 'background_main_menu',
		'std' => '#1B1B1B',
		'type' => 'color' );
		
	$options[] = array(
		'name' => __('Background Slider', 'options_framework_theme'),
		'desc' => __('Selected by default #212121.', 'options_framework_theme'),
		'id' => 'background_slider',
		'std' => '#212121',
		'type' => 'color' );
	
	$options[] = array(
		'name' => __('Buttons Hover', 'options_framework_theme'),
		'desc' => __('Selected by default #424242.', 'options_framework_theme'),
		'id' => 'buttons_hover',
		'std' => '#424242',
		'type' => 'color' );

	$options[] = array(
		'name' => __('Border Bottom Page and Box Paginate', 'options_framework_theme'),
		'desc' => __('Selected by default #E2E2E2.', 'options_framework_theme'),
		'id' => 'border_bottom_page',
		'std' => '#E2E2E2',
		'type' => 'color' );	
		
	$options[] = array(
		'name' => __('Border Bottom Title Footer', 'options_framework_theme'),
		'desc' => __('Selected by default #747474.', 'options_framework_theme'),
		'id' => 'bottom_title_footer',
		'std' => '#747474',
		'type' => 'color' );	
		
	$options[] = array(
		'name' => __('Footer Backgorund', 'options_framework_theme'),
		'desc' => __('Selected by default #212121.', 'options_framework_theme'),
		'id' => 'footer_backgorund',
		'std' => '#212121',
		'type' => 'color' );	

	$options[] = array(
		'name' => __('Header', 'options_framework_theme'),
		'type' => 'heading');
		
	$options[] = array(
		'name' => __('Header Style', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_style',
		'std' => '1',
		'type' => 'select',
		'options' => $header_style);	
		
	$options[] = array(
		'name' => __('Header Phone', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_phone',
		'std' => 'Call Us Free: (000) 777-7777',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Header Email', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_email',
		'std' => 'contact@exemple.com',
		'type' => 'text');		

	$options[] = array(
		'name' => __('Header Messages', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'header_messages',
		'std' => 'This can be your Tagline or something you want',
		'type' => 'text');	

	$options[] = array(
		'name' => __('Top Header Space', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'top_header_space',
		'std' => '0',
		'type' => 'text');	
		
		
	$options[] = array(
		'name' => __('Footer', 'options_framework_theme'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Footer copyright text right', 'options_framework_theme'),
		'desc' => __('', 'options_framework_theme'),
		'id' => 'footer_text_right',
		'std' => 'Theme created by <a href="http://www.pwtthemes.com/">PWT</a>. Powered by <a href="http://wordpress.org/">WordPress.org</a>',
		'type' => 'textarea');			
		
	return $options;
}