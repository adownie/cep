<?php
global $post;
$output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = '';
extract(shortcode_atts(array(
	'el_class'        => '',
    'bg_image'        => '',
    'bg_color'        => '',
    'bg_image_repeat' => '',
    'font_color'      => '',
    'padding'         => '',
    'margin_bottom'   => '',
	'row_type' => 'row',
	'use_as_box' => '',
	'type' => 'grid',
	'anchor' => '',
	'in_content_menu'=>'',
	'content_menu_title' => '',
	'content_menu_icon' => '',
	'video' => '',
	'video_overlay' => '',
	'video_overlay_image' => '',
	'video_webm' => '',
	'video_mp4' => '',
	'video_ogv' => '',
	'video_image' => '',
	'background_color' => '',
	'background_color_2' => '',
	'section_height' => '',
    'parallax_speed' => '1',
    'parallax_type' => 'mt-parallax-1',
	'background_image' => '',
	'vc_background-image' => '',
	'vc_image' => '',
	'background_image_as_pattern' => 'without_pattern',
	'border_color' => '',
	'padding_top' => '',
	'padding_bottom' => '',
	'side_padding' => '',
	'text_align' => 'left',
	'more_button_label' =>'More Facts',
	'less_button_label'=>'Less Facts',
	'button_position'=>'center',
	'color'=>'',
	'hover_color'=>'',
	'content_background_color' => '',
	'css_animation'=>'',
	'transition_delay'=>'',
	'custom_css'=>'',
	'opacity' => '0.7',

), $atts));

wp_enqueue_style( 'js_composer_front' );
wp_enqueue_script( 'wpb_composer_front_js' );
wp_enqueue_style('js_composer_custom_css');


$el_class = $this->getExtraClass($el_class);

$style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

if($type == "grid"){
	$css_class_type_inner =  " section_inner";
	
} else {
	$css_class_type_inner =  " full_section_inner";
}

$css_class_video =  "";
if($video == "show_video"){
	$css_class_video =  " video_section";
}



$_image ="";
if($background_image != '' || $background_image != ' ') { 
	$_image = wp_get_attachment_image_src( $background_image, 'full');
}

$overlay_image ="";
if($video_overlay_image != '' && $video_overlay_image != ' ') { 
	$overlay_image = wp_get_attachment_image_src( $video_overlay_image, 'full');
}




if($row_type == 'row') {
	$output .= '<div class="mt_style_row row '.$style.'"';
	
	if($background_color != "" || $padding_top != "" || $padding_bottom != "" || $text_align != "" || $_image != ""){
			$output .= " style='";
			
			$output .= $custom_css. ' ';
				if($background_color != ""){
					$output .="background-color:".$background_color.";";
				}
				if($_image != ""){
					if($background_image_as_pattern != "without_pattern"){
						$output .="background: url(".$_image[0].") repeat 0 0;";
					} else {
						$output .="background-image:url(".$_image[0].");";
					}
				}
				if($border_color != ""){
					if($use_as_box == 'use_row_as_box') {
						$output .=" border: 1px solid ".$border_color.";";
					}else {
						$output .=" border-bottom: 1px solid ".$border_color.";";
					}
				}
				if($padding_top != ""){
					$output .=' padding-top:' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_top ) ? $padding_top : $padding_top . 'px' ) . '; ';
				}
				if($padding_bottom != ""){
					$output .=' padding-bottom:' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_bottom ) ? $padding_bottom : $padding_bottom . 'px' ) . '; ';
				}
				$output .= ' text-align:' . $text_align . ';';
				$output.="'";
		}
	
	$output .= '>';
	
	
	if($video == "show_video"){
		$v_image = wp_get_attachment_url($video_image);
		$v_overlay_image = wp_get_attachment_url($video_overlay_image);
		
		$output .= '<div class="mobile-video-image" style="background-image: url('.$v_image.')"></div><div class="video-overlay';
								if($video_overlay == "show_video_overlay"){
									$output .= ' active';
								}
								$output .= '"';
								$output .= ($overlay_image !== '' && $overlay_image !== ' ') ? " style='background-image:url(" . $overlay_image[0] . ");'" : '';
								$output .= '></div><div class="video-wrap">
									
									<video class="video videobcg" width="1920" height="800" poster="'.$v_image.'" controls="controls" preload="auto" loop autoplay muted>';
											if(!empty($video_webm)) { $output .= '<source type="video/webm" src="'.$video_webm.'">'; }
											if(!empty($video_mp4)) { $output .= '<source type="video/mp4" src="'.$video_mp4.'">'; }
											if(!empty($video_ogv)) { $output .= '<source type="video/ogg" src="'. $video_ogv.'">'; }
										 $output .='<object width="1920" height="800" type="application/x-shockwave-flash" data="'.get_template_directory_uri().'/functions/js/flashmediaelement.swf">
													<param name="movie" value="'.get_template_directory_uri().'/functions/js/flashmediaelement.swf" />
													<param name="flashvars" value="controls=true&file='.$video_mp4.'" />
													<img src="'.$v_image.'" width="1920" height="800" title="No video playback capabilities" alt="Video thumb" />
											</object>
									</video>		
							</div>';
	}
	
	
} else if($row_type == 'parallax'){

  
    $output .='<div data-type="'. $parallax_type .'" data-speed="'. $parallax_speed .'"  class="mt_style_row mt_section_holder row '.$parallax_type.' '.$text_align.' '.$el_class.'" style = "';
    
    
    $output .= ($background_image !== '' || $background_image !== ' ') ? " background-image:url('" . $_image[0] . "');" : "";
    
    if($padding_top != "" || $padding_bottom != ""){
			
				if($padding_top != ""){
					$output .=' padding-top:' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_top ) ? $padding_top : $padding_top . 'px' ) . '; ';
				}
				if($padding_bottom != ""){
					$output .=' padding-bottom:' . ( preg_match( '/(px|em|\%|pt|cm)$/', $padding_bottom ) ? $padding_bottom : $padding_bottom . 'px' ) . '; ';
				}
		}
		
    $output .= '">';
}



//IF BOXED
if($type == 'full_width' or get_post_meta($post->ID, "layout_positions", true)!='full') { 
	$output .= ''; 
} else {
	$output .= '<div class="container mt-madza-container"><div class="row">'; 
}
//CONTENT
$output .= wpb_js_remove_wpautop($content);

//IF BOXED
if($type == 'full_width' or get_post_meta($post->ID, "layout_positions", true)!='full') { 
	$output .= ''; 
} else {
	$output .= '</div></div>'; 
}

//CONTAINTER ABOVE COLOR
if($background_color !="") { 
	$output .= '<div class="mt-frame-color" style="opacity:'.$opacity.'; background-color:'. $background_color_2 .'"></div>'; 
}

$output .= "</div>".$this->endBlockComment('row');

echo $output;