<?php

/*
Plugin Name: Custom Widget
Plugin URI: http://downiedigital.com
Description: Custom WordPress Widget for a structured Contact sidebar.
Author: Amanda Downie
Version: 1
Author URI: http://downiedigital.com
*/

add_action( 'widgets_init', 'mfc_init' );

function mfc_init() {
	register_widget( 'mfc_widget' );
}

class mfc_widget extends WP_Widget
{

    public function __construct()
    {
        $widget_details = array(
            'classname' => 'mfc_widget',
            'description' => 'Creates a featured item consisting of a title, image, description and link.'
        );

        parent::__construct( 'mfc_widget', 'Contact Sidebar Widget', $widget_details );

        add_action('admin_enqueue_scripts', array($this, 'mfc_assets'));
    }


public function mfc_assets()
{
    wp_enqueue_script('media-upload');
    wp_enqueue_script('thickbox');
    wp_enqueue_script('mfc-media-upload', plugin_dir_url(__FILE__) . 'upload-media.js', array('jquery'));
    wp_enqueue_style('thickbox');
}


    public function widget( $args, $instance )
    {
		echo $args['before_widget'];
		echo '<div class="contact-widget">';
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ). $args['after_title'];
		}
		?>
		<h3 class='contact-subtitle'>
		<?php echo $instance['subtitle']; ?>
			<!-- <?php echo wpautop( esc_html( $instance['subtitle'] ) ) ?> -->
		</h3>			
		<div class="contact-thumb">
		<img src='<?php echo $instance['image'] ?>'>
		</div>	
		<h4 class='contact-tagline'>
			<?php echo $instance['tagline']; ?>
			<!-- <?php echo wpautop( esc_html( $instance['tagline'] ) ) ?> -->
		</h4>

		<div class='contact-info'>
			<?php echo wpautop( $instance['contact_info'] ); ?>
		</div>

		<div class='mfc-link'>
			<a href='<?php echo esc_url( $instance['link_url'] ) ?>' class="button"><?php echo esc_html( $instance['link_title'] ) ?></a>
		</div>

		<?php

		echo $args['after_widget'];
		echo '</div>';
    }

	public function update( $new_instance, $old_instance ) {  
	    return $new_instance;
	}

    public function form( $instance )
    {

		$title = '';
	    if( !empty( $instance['title'] ) ) {
	        $title = $instance['title'];
	    }
	    $subtitle = '';
	    if( !empty( $instance['subtitle'] ) ) {
	        $subtitle = $instance['subtitle'];
	    }
	    $tagline = '';
	    if( !empty( $instance['tagline'] ) ) {
	        $tagline = $instance['tagline'];
	    }	    
	    $contact_info = '';
	    if( !empty( $instance['contact_info'] ) ) {
	        $contact_info = $instance['contact_info'];
	    }

	    $link_url = '';
	    if( !empty( $instance['link_url'] ) ) {
	        $link_url = $instance['link_url'];
	    }

	    $link_title = '';
	    if( !empty( $instance['link_title'] ) ) {
	        $link_title = $instance['link_title'];
	    }

		$image = '';
		if(isset($instance['image']))
		{
		    $image = $instance['image'];
		}
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'subtitle' ); ?>"><?php _e( 'Subtitle:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'subtitle' ); ?>" name="<?php echo $this->get_field_name( 'subtitle' ); ?>" type="text" value="<?php echo esc_attr( $subtitle ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'image' ); ?>"><?php _e( 'Image:' ); ?></label>
            <input name="<?php echo $this->get_field_name( 'image' ); ?>" id="<?php echo $this->get_field_id( 'image' ); ?>" class="widefat" type="text" size="36"  value="<?php echo esc_url( $image ); ?>" />
            <input class="upload_image_button" type="button" value="Upload Image" />
        </p>        
        <p>
            <label for="<?php echo $this->get_field_name( 'tagline' ); ?>"><?php _e( 'Tagline:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'tagline' ); ?>" name="<?php echo $this->get_field_name( 'tagline' ); ?>" type="text" ><?php echo esc_attr( $tagline ); ?></textarea>
        </p>               
        <p>
            <label for="<?php echo $this->get_field_name( 'contact_info' ); ?>"><?php _e( 'Contact Info:' ); ?></label>
            <textarea class="widefat" id="<?php echo $this->get_field_id( 'contact_info' ); ?>" name="<?php echo $this->get_field_name( 'contact_info' ); ?>" type="text" ><?php echo esc_attr( $contact_info ); ?></textarea>
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link_url' ); ?>"><?php _e( 'Link URL:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_url' ); ?>" name="<?php echo $this->get_field_name( 'link_url' ); ?>" type="text" value="<?php echo esc_attr( $link_url ); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_name( 'link_title' ); ?>"><?php _e( 'Link Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'link_title' ); ?>" name="<?php echo $this->get_field_name( 'link_title' ); ?>" type="text" value="<?php echo esc_attr( $link_title ); ?>" />
        </p>
    <?php
    }
}