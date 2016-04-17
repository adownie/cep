<?php
if ( ! function_exists( 'koenda_head_css' ) ) :
function koenda_head_css() {
        $meta = '';
		$output = '';
		$options_styles = '';
		$options_styles_import = '';
		$script_head = '';
		
		$fav_icon = of_get_option('fav_icon');
		if ($fav_icon <> '') {
			$meta .= "<link rel=\"shortcut icon\" href=\"".$fav_icon."\" type=\"image/x-icon\" />\n";
		}
		$web_clip = of_get_option('web_clip');
		if ($web_clip <> '') {
			$meta .= "<link rel=\"apple-touch-icon-precomposed\" href=\"".$web_clip."\" />\n";
		}
		$google_site_verification = of_get_option('google_site_verification');
		if ($google_site_verification <> '') {
			$meta .= "<meta name=\"google-site-verification\" content=\"".$google_site_verification."\" />\n";
		}
		$yahoo_site_verification = of_get_option('yahoo_site_verification');
		if ($yahoo_site_verification <> '') {
			$meta .= "<meta name=\"msvalidate.01\" content=\"".$yahoo_site_verification."\" />\n";
		}
		$bing_site_verification = of_get_option('bing_site_verification');
		if ($bing_site_verification <> '') {
			$meta .= "<meta name=\"y_key\" content=\"".$bing_site_verification."\" />\n";
		}		
		$custom_css = of_get_option('custom_css_styles');
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
		}
		
		$pattern_set = esc_attr(of_get_option('pattern_set'));
		if ($pattern_set) {
			$options_styles .= '
			body {  
			    background: url("'.get_bloginfo( 'template_url' ).'/images/patterns/' . $pattern_set . '.png") repeat scroll 0 0 transparent;
			}';	
		}
		
		$background = of_get_option('background_data');
		if ($background) {
				if ($background['image']) {
					$options_styles = '
					body { 
					     background:url('.$background['image']. '); background-color:'.$background['color'].'; background-repeat:'.$background['repeat'].'; background-position:'.$background['position']. '; background-attachment:'.$background['attachment'].'; 
					}';
				} 
				 elseif ($background['color']) {
				   $options_styles = '
				     body { 
					     background:'.$background['color']. '; 
				    }';
				}	
		} 

		$general_color = esc_attr(of_get_option('general_color'));
		if ($general_color) {
			$options_styles .= '
			a, .posted .date_time, .posted .postedby, .posted .commentcount, .widget .menu a, .widget-footer .menu a, .su-divider a, .su-dropcap-style-2, .logo .color{ 
				color: ' . $general_color . '; 
			}';
			$options_styles .= '
			#topsearch #button, .menu .current_page_item a, .readmore, .button, #searchform #searchsubmit, #eemail_txt_Button, .menu .current_page_item a:hover, .menu_mobile{ 
				background-color: ' . $general_color . '; 
			}';
			$options_styles .= '
			.menu, .business .fullwidth h2, .postlist li:first-child, .videoblock, #footer, .mobilemenu_toggle{ 
				border-color: ' . $general_color . '; 
			}';
			$options_styles .= '
			.menu a:hover, .menu a.hover, .sub-menu, #wp-calendar th, .su-tabs-style-1 .su-tabs-nav, .su-tabs-style-3 .su-tabs-nav span, .su-tabs-style-3 .su-tabs-nav .su-tabs-current, .su-spoiler-style-2 .su-spoiler-title, .su-accordion .su-spoiler-title, .su-dropcap-style-1, .wp-pagenavi a:hover, .wp-pagenavi span.current, .social a:hover, .menu .sub-menu, th { 
				background: ' . $general_color . '; 
			}';
			$options_styles .= '
			.widget select, .widget-footer select, #wp-calendar td, #wp-calendar th, th{ 
				border:1px solid ' . $general_color . '; 
			}';
			$options_styles .= '
			.su-heading-style-1 .su-heading-shell{ 
				border-bottom:2px solid ' . $general_color . '; 
				border-top:2px solid ' . $general_color . '; 
			}';			
			$options_styles .= '
			.su-tabs-style-1 .su-tabs-pane{ 
			    border-bottom: 5px solid ' . $general_color . ';
				border-left: 5px solid ' . $general_color . ';
				border-right: 5px solid ' . $general_color . ';
			}';	
			$options_styles .= '
			.su-tabs-style-3{ 
			    border: 5px solid ' . $general_color . ';
			}';	
			$options_styles .= '
			.su-pullquote-style-1{ 
			    border-left: 5px solid ' . $general_color . ';
			}';	
			
			$options_styles .= '
			blockquote{ 
			    border-left: 4px solid ' . $general_color . ';
			}';				
			
		    $options_styles .= '
			.wp-pagenavi a:hover, .wp-pagenavi span.current{ 
			    border: 1px solid ' . $general_color . ';
			}';	
			$options_styles .= '
			.su-table-style-1 .su-even td, .su-table-style-2 .su-even td{ 
			    background:  ' . $general_color . '!important;
			}';	
		}

		$top_header_space = esc_attr(of_get_option('top_header_space'));
		if ($top_header_space) {
			$options_styles .= '
			#wrapper{ 
			    margin-top: ' . $top_header_space . 'px;
			}';				
		}
		
		$border_top_menu = esc_attr(of_get_option('border_top_menu'));
		if ($border_top_menu) {
			$options_styles .= '
			.topbar{ 
			    border-bottom: 1px solid ' . $border_top_menu . ';
			}';	
			$options_styles .= '
			.topbarnav li, #topsearch{ 
			    border-left: 1px solid ' . $border_top_menu . ';
			}';				
		}
		$background_main_menu = esc_attr(of_get_option('background_main_menu'));
		if ($background_main_menu) {
			$options_styles .= '
			.menu{ 
			    background: ' . $background_main_menu . ';
			}';			
		}		
		$background_slider = esc_attr(of_get_option('background_slider'));
		if ($background_slider) {
			$options_styles .= '
			.slider .slidedata{ 
			    background: ' . $background_slider . ';
			}';			
		}	
		$buttons_hover = esc_attr(of_get_option('buttons_hover'));
		if ($buttons_hover) {
			$options_styles .= '
			.posts .readmore:hover, .slider .readmore:hover, #eemail_txt_Button:hover, #topsearch #button:hover{ 
			    background-color: ' . $buttons_hover . ';
			}';			
		}
		$border_bottom_page = esc_attr(of_get_option('border_bottom_page'));
		if ($border_bottom_page) {
			$options_styles .= '
			.posts{ 
			    border-bottom: 1px solid ' . $border_bottom_page . ';
			}';	
			$options_styles .= '
			.wp-pagenavi a, .wp-pagenavi span{ 
			    border: 1px solid ' . $border_bottom_page . ';
			}';			
		}	
		$bottom_title_footer = esc_attr(of_get_option('bottom_title_footer'));
		if ($bottom_title_footer) {
			$options_styles .= '
			#footer h3{ 
			    border-bottom: 1px dashed ' . $bottom_title_footer . ';
			}';			
		}
		$footer_backgorund = esc_attr(of_get_option('footer_backgorund'));
		if ($footer_backgorund) {
			$options_styles .= '
			#footer{ 
			    background:  ' . $footer_backgorund . ';
			}';			
		}	
        $listfontgoogle = array();		
		$top_menu_font = of_get_option('top_menu_font');
		if ($top_menu_font) {
		    $fontfamily = explode('|',$top_menu_font['face']);
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
			$listfontgoogle[] = $fontfamily[0];
		}	
		$main_menu_font = of_get_option('main_menu_font');
		if ($main_menu_font) {
		    $fontfamily = explode('|',$main_menu_font['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}			
		$body_content = of_get_option('body_content');
		if ($body_content) {
		    $fontfamily = explode('|',$body_content['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }		
		}
		$title_content = of_get_option('title_content');
		if ($title_content) {
		    $fontfamily = explode('|',$title_content['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$title_slider = of_get_option('title_slider');
		if ($title_slider) {
		    $fontfamily = explode('|',$title_slider['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }				
		}
		$content_slider = of_get_option('content_slider');
		if ($content_slider) {
		    $fontfamily = explode('|',$content_slider['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$title_sidebar = of_get_option('title_sidebar');
		if ($title_sidebar) {
		    $fontfamily = explode('|',$title_sidebar['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$title_footer = of_get_option('title_footer');
		if ($title_footer) {
		    $fontfamily = explode('|',$title_footer['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$content_footer = of_get_option('content_footer');
		if ($content_footer) {
		    $fontfamily = explode('|',$content_footer['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$input_text = of_get_option('input_text');
		if ($input_text) {
		    $fontfamily = explode('|',$input_text['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$heading1 = of_get_option('heading1');
		if ($heading1) {
		    $fontfamily = explode('|',$heading1['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$heading2 = of_get_option('heading2');
		if ($heading2) {
		    $fontfamily = explode('|',$heading2['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$heading3 = of_get_option('heading3');
		if ($heading3) {
		    $fontfamily = explode('|',$heading3['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$heading4 = of_get_option('heading4');
		if ($heading4) {
		    $fontfamily = explode('|',$heading4['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$heading5 = of_get_option('heading5');
		if ($heading5) {
		    $fontfamily = explode('|',$heading5['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}
		$heading6 = of_get_option('heading6');
		if ($heading6) {
		    $fontfamily = explode('|',$heading6['face']);
			if(!in_array($fontfamily[0], $listfontgoogle)) {
			if($fontfamily[0]!=1) { $options_styles_import .= "<link href='http://fonts.googleapis.com/css?family=".$fontfamily[0]."' rel='stylesheet' type='text/css'>"; }
            $listfontgoogle[] = $fontfamily[0];	
            }			
		}		
		$top_menu_font = of_get_option('top_menu_font');
		if ($top_menu_font) {
		    $fontfamily = explode('|',$top_menu_font['face']);
			$options_styles .= '
			.topbar a{ 
			    '.$fontfamily[1].'
				color:  '.$top_menu_font['color'].';
				font-weight:  '.$top_menu_font['style'].';
				font-size:  '.$top_menu_font['size'].';
			}';		
		}		
		$main_menu_font = of_get_option('main_menu_font');
		if ($main_menu_font) {
		    $fontfamily = explode('|',$main_menu_font['face']);
			$options_styles .= '
			.menu a{ 
			    '.$fontfamily[1].'
				color:  '.$main_menu_font['color'].';
				font-weight:  '.$main_menu_font['style'].';
				font-size:  '.$main_menu_font['size'].';
			}';		
		}
		$body_content = of_get_option('body_content');
		if ($body_content) {
		    $fontfamily = explode('|',$body_content['face']);
			$options_styles .= '
			p, .singlepost p, .posts li, .singlepost li, .post-date, .eemail_caption, .widget li, .wpp-comments, .wp-pagenavi .pages{ 
			    '.$fontfamily[1].'
				color:  '.$body_content['color'].';
				font-weight:  '.$body_content['style'].';
				font-size:  '.$body_content['size'].';
			}';		
		}
		$title_content = of_get_option('title_content');
		if ($title_content) {
		    $fontfamily = explode('|',$title_content['face']);
			$options_styles .= '
			.posts h2 { 
			    '.$fontfamily[1].'
				color:  '.$title_content['color'].';
				font-weight:  '.$title_content['style'].';
				font-size:  '.$title_content['size'].';
			}';		
		}
		$title_slider = of_get_option('title_slider');
		if ($title_slider) {
		    $fontfamily = explode('|',$title_slider['face']);
			$options_styles .= '
			.slidedata h1, .slidedata h1 a { 
			    '.$fontfamily[1].'
				color:  '.$title_slider['color'].';
				font-weight:  '.$title_slider['style'].';
				font-size:  '.$title_slider['size'].';
			}';		
		}		
		$content_slider = of_get_option('content_slider');
		if ($content_slider) {
		    $fontfamily = explode('|',$content_slider['face']);
			$options_styles .= '
			.slider .slidedata p { 
			    '.$fontfamily[1].'
				color:  '.$content_slider['color'].';
				font-weight:  '.$content_slider['style'].';
				font-size:  '.$content_slider['size'].';
			}';		
		}			
		$title_sidebar = of_get_option('title_sidebar');
		if ($title_sidebar) {
		    $fontfamily = explode('|',$title_sidebar['face']);
			$options_styles .= '
			.widget h2 { 
			    '.$fontfamily[1].'
				color:  '.$title_sidebar['color'].';
				font-weight:  '.$title_sidebar['style'].';
				font-size:  '.$title_sidebar['size'].';
			}';		
		}	
		$title_footer = of_get_option('title_footer');
		if ($title_footer) {
		    $fontfamily = explode('|',$title_footer['face']);
			$options_styles .= '
			#footer h3 { 
			    '.$fontfamily[1].'
				color:  '.$title_footer['color'].';
				font-weight:  '.$title_footer['style'].';
				font-size:  '.$title_footer['size'].';
			}';		
		}	
	
		$content_footer = of_get_option('content_footer');
		if ($content_footer) {
		    $fontfamily = explode('|',$content_footer['face']);
			$options_styles .= '
			.widget-footer p, .widget-footer li, .copyright { 
			    '.$fontfamily[1].'
				color:  '.$content_footer['color'].';
				font-weight:  '.$content_footer['style'].';
				font-size:  '.$content_footer['size'].';
			}';		
		}
		$input_text = of_get_option('input_text');
		if ($input_text) {
		    $fontfamily = explode('|',$input_text['face']);
			$options_styles .= '
			#eemail_txt_email, label, input, textarea { 
			    '.$fontfamily[1].'
				color:  '.$input_text['color'].';
				font-weight:  '.$input_text['style'].';
				font-size:  '.$input_text['size'].';
			}';		
		}
		$heading1 = of_get_option('heading1');
		if ($heading1) {
		    $fontfamily = explode('|',$heading1['face']);
			$options_styles .= '
			.singlepost h1 { 
			    '.$fontfamily[1].'
				color:  '.$heading1['color'].';
				font-weight:  '.$heading1['style'].';
				font-size:  '.$heading1['size'].';
			}';		
		}	
		$heading2 = of_get_option('heading2');
		if ($heading2) {
		    $fontfamily = explode('|',$heading2['face']);
			$options_styles .= '
			.singlepost h2 { 
			    '.$fontfamily[1].'
				color:  '.$heading2['color'].';
				font-weight:  '.$heading2['style'].';
				font-size:  '.$heading2['size'].';
			}';		
		}	
		$heading3 = of_get_option('heading3');
		if ($heading3) {
		    $fontfamily = explode('|',$heading3['face']);
			$options_styles .= '
			.singlepost h3 { 
			    '.$fontfamily[1].'
				color:  '.$heading3['color'].';
				font-weight:  '.$heading3['style'].';
				font-size:  '.$heading3['size'].';
			}';		
		}	
		$heading4 = of_get_option('heading4');
		if ($heading4) {
		    $fontfamily = explode('|',$heading4['face']);
			$options_styles .= '
			.singlepost h4 { 
			    '.$fontfamily[1].'
				color:  '.$heading4['color'].';
				font-weight:  '.$heading4['style'].';
				font-size:  '.$heading4['size'].';
			}';		
		}	
		$heading5 = of_get_option('heading5');
		if ($heading5) {
		    $fontfamily = explode('|',$heading5['face']);
			$options_styles .= '
			.singlepost h5 { 
			    '.$fontfamily[1].'
				color:  '.$heading5['color'].';
				font-weight:  '.$heading5['style'].';
				font-size:  '.$heading5['size'].';
			}';		
		}	
		$heading6 = of_get_option('heading6');
		if ($heading6) {
		    $fontfamily = explode('|',$heading6['face']);
			$options_styles .= '
			.singlepost h6 { 
			    '.$fontfamily[1].'
				color:  '.$heading6['color'].';
				font-weight:  '.$heading6['style'].';
				font-size:  '.$heading6['size'].';
			}';		
		}			
		$display_slider = of_get_option('display_slider');
		if ($display_slider == 'yes') {
			$transition_effect = of_get_option('transition_effect');
			if ($transition_effect <> '') {
				$transition_effect_val = $transition_effect;
			} else { $transition_effect_val = 'scrollHorz'; }
			
			$transition_delay = of_get_option('transition_delay');
			if ($transition_delay <> '') {
				$transition_delay_val = $transition_delay;
			} else { $transition_delay_val = 2000; }	
			$transition_length = of_get_option('transition_length');
			if ($transition_length <> '') {
				$transition_length_val = $transition_length;
			} else { $transition_length_val = 6000; }			
			$script_head .= "	
				jQuery('.slider ul').cycle({
				fx : '".$transition_effect_val."',
				height : 290,
				prev : '#prevslide',
				timeout: ".$transition_length_val.", 
				delay:  ".$transition_delay_val.",
				next : '#nextslide'
				});\n";
		    }
		if ($meta <> '') {
			echo $meta;
		}														
		if ($output <> '') {
			$output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
			echo $output;
		}
		if($options_styles_import){
			echo $options_styles_import;

		}
		if($options_styles){
			echo '<style>' 
			. $options_styles . '
			</style>';
		}
		
		if ($script_head <> '') {
			$script_head = "<!-- Custom Script -->\n<script>\n jQuery(document).ready(function(){ \n" . $script_head . " }); \n </script>\n";
			echo $script_head;
		}
}
endif;
add_action('wp_head', 'koenda_head_css');
?>