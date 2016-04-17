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
		$custom_css = of_get_option('custom_css_styles');
		if ($custom_css <> '') {
			$output .= $custom_css . "\n";
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