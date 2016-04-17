<?php

vc_remove_element("vc_widget_sidebar");
vc_remove_element("vc_wp_search");
vc_remove_element("vc_wp_meta");
vc_remove_element("vc_wp_recentcomments");
vc_remove_element("vc_wp_calendar");
vc_remove_element("vc_wp_pages");
vc_remove_element("vc_wp_tagcloud");
vc_remove_element("vc_wp_custommenu");
vc_remove_element("vc_wp_text");
vc_remove_element("vc_wp_posts");
vc_remove_element("vc_wp_links");
vc_remove_element("vc_wp_categories");
vc_remove_element("vc_wp_archives");
vc_remove_element("vc_wp_rss");
vc_remove_element("vc_teaser_grid");
vc_remove_element("vc_posts_grid");
vc_remove_element("vc_posts_slider");
vc_remove_element("vc_images_carousel");
vc_remove_element("vc_carousel");


/* vc_remove_element("vc_button");
vc_remove_element("vc_button2");
vc_remove_element("vc_cta_button");
vc_remove_element("vc_cta_button2");
vc_remove_element("vc_message");
vc_remove_element("vc_tour");
vc_remove_element("vc_progress_bar");
vc_remove_element("vc_pie");

vc_remove_element("vc_toggle");

 */

if(function_exists('vc_disable_frontend')){
	vc_disable_frontend();
}

$animations = array(
	"" => "",
	"Elements Shows From Left Side" => "element_from_left",
	"Elements Shows From Right Side" => "element_from_right",
	"Elements Shows From Top Side" => "element_from_top",
	"Elements Shows From Bottom Side" => "element_from_bottom",
	"Elements Shows From Fade" => "element_from_fade"
);

/*** Remove unused parameters ***/
if (function_exists('vc_remove_param')) {

	vc_remove_param('vc_row', 'font_color');
	vc_remove_param('vc_row', 'bg_image');
	vc_remove_param('vc_row', 'bg_color');
	vc_remove_param('vc_row', 'bg_image_repeat');

}


vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"show_settings_on_create"=>true,
	"heading" => "Row Type",
	"param_name" => "row_type",
	"value" => array(
		"Row" => "row",
		"Parallax" => "parallax"
	)
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Type",
	"param_name" => "type",
	"value" => array(
		"In Grid" => "grid",
		"Full Width" => "full_width"		
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
#vc_add_param("vc_row", array(
#	"type" => "textfield",
#	"class" => "",
#	"heading" => "Anchor ID",
#	"param_name" => "anchor",
#	"value" => "",
#	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
#));


vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Text Align",
	"param_name" => "text_align",
	"value" => array(
		"Left" => "left",
		"Center" => "center",
		"Right" => "right"
	),
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax','expandable'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video background",
	"value" => array(
		"No" => "",
		"Yes" => "show_video"
	),
	"param_name" => "video",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Video overlay",
	"value" => array(
		"No" => "",
		"Yes" => "show_video_overlay"
	),
	"param_name" => "video_overlay",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video overlay image (pattern)",
	"value" => "",
	"param_name" => "video_overlay_image",
	"description" => "",
	"dependency" => Array('element' => "video_overlay", 'value' => array('show_video_overlay'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (webm) file url",
	"value" => "",
	"param_name" => "video_webm",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (mp4) file url",
	"value" => "",
	"param_name" => "video_mp4",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Video background (ogv) file url",
	"value" => "",
	"param_name" => "video_ogv",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));
vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Video preview image",
	"value" => "",
	"param_name" => "video_image",
	"description" => "",
	"dependency" => Array('element' => "video", 'value' => array('show_video'))
));



vc_add_param("vc_row", array(
	"type" => "attach_image",
	"class" => "",
	"heading" => "Background Image",
	"value" => "",
	"param_name" => "background_image",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row', 'parallax'))
));


vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Background Color",
	"param_name" => "background_color",
	"value" => '',
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax'))
));

vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Paralex type",
	"param_name" => "parallax_type",
	"value" => array(
		"Top" => "mt-parallax-1",
		"Bottom" => "mt-parallax-2",
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));


vc_add_param("vc_row", array(
    "type" => "dropdown",
    "class" => "",
    "heading" => "Parallax speed",
    "param_name" => "parallax_speed",
    "value" => array(
		"1" => "1",
		"2" => "2",
		"3" => "3",
		"4" => "4",
		"5" => "5",
		"6" => "6",
		"7" => "7",
		"8" => "8",
		"9" => "9",
		
	),
    "dependency" => Array('element' => "row_type", 'value' => array('parallax'))
));
vc_add_param("vc_row", array(
	"type" => "colorpicker",
	"class" => "",
	"heading" => "Image/Video above color",
	"param_name" => "background_color_2",
	"value" => "",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax'))
));
vc_add_param("vc_row", array(
	"type" => "dropdown",
	"class" => "",
	"heading" => "Image/Video above color opacity",
	"param_name" => "opacity",
	"value" => array(
		"0.7" => "0.7",
		"0.6" => "0.6",
		"0.5" => "0.5",
		"0.4" => "0.4",
		"0.3" => "0.3",
		"0.2" => "0.2",
		"0.1" => "0.1",
		"0.8" => "0.8",
		"0.9" => "0.9",
		"1.0" => "1.0",
	),
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax'))
));


vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Top",
	"value" => "40",
	"param_name" => "padding_top",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax'))
));
vc_add_param("vc_row", array(
	"type" => "textfield",
	"class" => "",
	"heading" => "Padding Bottom",
	"value" => "40",
	"param_name" => "padding_bottom",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row','parallax'))
));

vc_add_param("vc_row", array(
	"type" => "textarea",
	"class" => "",
	"heading" => "Custom CSS",
	"value" => "",
	"param_name" => "custom_css",
	"description" => "",
	"dependency" => Array('element' => "row_type", 'value' => array('row'))
));

#vc_add_param("vc_row",  array(
#  "type" => "dropdown",
#  "heading" => "CSS Animation",
#  "param_name" => "css_animation",
#  "admin_label" => true,
#  "value" => $animations,
#  "description" => "",
#  "dependency" => Array('element' => "row_type", 'value' => array('row'))
#  
#));
#vc_add_param("vc_row",  array(
#  "type" => "textfield",
#  "heading" => "Transition delay (ms)",
#  "param_name" => "transition_delay",
#  "admin_label" => true,
#  "value" => "",
#  "description" => "",
#  "dependency" => Array('element' => "row_type", 'value' => array('row'))
  
#));

?>