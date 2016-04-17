<?php

class WEN_Corporate_CTA_Widget extends WP_Widget {

    function __construct() {
        $opts =array(
                    'classname'     => 'wen_corporate_cta_widget',
                    'description'   => __( 'Call To Action Widget. Displays message and button with URL.', 'wen-corporate' )
                );

        parent::__construct('wen-corporate-cta', __( 'Corporate CTA Widget', 'wen-corporate'), $opts );
    }


    function widget( $args, $instance ) {
        extract( $args );

        $description = ! empty( $instance['description'] ) ? $instance['description'] : '';
        $button_text = ! empty( $instance['button_text'] ) ? $instance['button_text'] : __( 'Learn more...', 'wen-corporate' );
        $button_url = ! empty( $instance['button_url'] ) ? esc_url( $instance['button_url'] ) : 'javascript:void(0);';

        echo $before_widget;
        //
        ?>
        <div class="cta-content">

            <div class="cta-description">
                <?php echo $description; ?>
            </div><!-- .cta-left -->
            <div class="cta-button">
                <a href="<?php echo $button_url; ?>" class="btn-cta" title="<?php echo esc_attr( $button_text ); ?>"><?php echo esc_html( $button_text ); ?></a>
            </div><!-- .cta-right -->

        </div><!-- .cta-content -->
        <?php
        //
        echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        if ( current_user_can('unfiltered_html') ){
          $instance['description'] =  $new_instance['description'];
        }
        else{
          $instance['description'] = stripslashes( wp_filter_post_kses( addslashes($new_instance['description']) ) ); // wp_filter_post_kses() expects slashed
        }
        $instance['button_text'] =   esc_attr( strip_tags($new_instance['button_text']) );
        $instance['button_url']  =   esc_url( strip_tags($new_instance['button_url']) );

        return $instance;
    }

    function form( $instance ) {
        $description =   isset($instance['description']) ? esc_attr($instance['description']) : '';
        $button_text =   isset($instance['button_text']) ? esc_attr($instance['button_text']) : __( 'Learn more...', 'wen-corporate' );
        $button_url  =   isset($instance['button_url']) ? esc_attr($instance['button_url']) : '';
?>
    <p>
        <label for="<?php echo $this->get_field_id('description'); ?>"><?php _e('Description:', 'wen-corporate'); ?></label>
        <textarea class="widefat" rows="6" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo $this->get_field_name('description'); ?>"><?php echo $description; ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('button_text'); ?>"><?php _e('Button text:', 'wen-corporate'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('button_text'); ?>" name="<?php echo $this->get_field_name('button_text'); ?>" type="text" value="<?php echo esc_attr( $button_text ); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('button_url'); ?>"><?php _e('Button URL:', 'wen-corporate'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('button_url'); ?>" name="<?php echo $this->get_field_name('button_url'); ?>" type="text" value="<?php echo esc_url( $button_url ); ?>" />
    </p>

<?php }

} ?>
