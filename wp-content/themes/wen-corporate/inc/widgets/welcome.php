<?php

class WEN_Corporate_Welcome_Widget extends WP_Widget {

    function __construct() {
        $opts =array(
                    'classname'     => 'wen_corporate_welcome_widget',
                    'description'   => __( 'Displays welcome box with title and message.', 'wen-corporate' )
                );

        parent::__construct('wen-corporate-welcome', __('Corporate Welcome Widget', 'wen-corporate'), $opts );
    }


    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
        $description    = ! empty( $instance['description'] ) ? $instance['description'] : '';

        echo $before_widget;
        if ($title) echo $before_title . $title . $after_title;
        //
        echo $description;
        //
        echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title']  =   esc_attr( strip_tags($new_instance['title']) );
        if ( current_user_can('unfiltered_html') ){
          $instance['description'] =  $new_instance['description'];
        }
        else{
          $instance['description'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['description']) ) ); // wp_filter_post_kses() expects slashed
        }

        return $instance;
    }

    function form( $instance ) {
        $title       =   isset($instance['title']) ? esc_attr($instance['title']) : '';
        $description =   isset($instance['description']) ? esc_attr($instance['description']) : '';
?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wen-corporate'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'wen-corporate'); ?></label>
        <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea>
    </p>

<?php }

} ?>
