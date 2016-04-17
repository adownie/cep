<?php

class WEN_Corporate_Recent_Posts_Block_Widget extends WP_Widget {

    function __construct() {
        $opts =array(
                    'classname'     => 'wen_corporate_recent_posts_block_widget',
                    'description'   => __( 'Recent Posts Block Widget. Displays posts in carousel slider. Most suitable for Front Page Widget Area.', 'wen-corporate' )
                );

        parent::__construct('wen-corporate-recent-posts', __('Corporate Recent Posts Block', 'wen-corporate'), $opts );
    }


    function widget( $args, $instance ) {

        extract( $args , EXTR_SKIP );

        $title               = apply_filters( 'widget_title', empty($instance['title']) ? '&nbsp;' : $instance['title'], $instance, $this->id_base );
        $recent_category     = ! empty( $instance['recent_category'] ) ? absint( $instance['recent_category'] ) : 0;
        $number_of_posts     = ! empty( $instance['number_of_posts'] ) ? absint( $instance['number_of_posts'] ) : 4;
        $show_post_excerpt   = empty( $instance['show_post_excerpt'] ) ? false : true ;
        $post_excerpt_length = ! empty( $instance['post_excerpt_length'] ) ? absint( $instance['post_excerpt_length'] ) : 20;
        $show_more_button    = empty( $instance['show_more_button'] ) ? false : true ;
        $more_button_text    = ! empty( $instance['more_button_text'] ) ? $instance['more_button_text'] : __( 'Read more' , 'wen-corporate' );

        echo $before_widget;
        echo $before_title . '<span>'.$title .'</span>'. $after_title;
        //
        $recent_args = array(
            'recent_category'     => $recent_category,
            'number_of_posts'     => $number_of_posts,
            'show_post_excerpt'   => $show_post_excerpt,
            'post_excerpt_length' => $post_excerpt_length,
            'show_more_button'    => $show_more_button,
            'more_button_text'    => $more_button_text,
            );

        wen_corporate_render_recent_posts_carousel_block($recent_args);

        //
        echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['title']               = esc_attr( strip_tags($new_instance['title']) );
        $instance['recent_category']    = absint( $new_instance['recent_category'] );
        $instance['number_of_posts']     = absint( $new_instance['number_of_posts'] );
        $instance['show_post_excerpt']   = isset( $new_instance['show_post_excerpt'] ) ? (bool) $new_instance['show_post_excerpt'] : false;
        $instance['post_excerpt_length'] = absint( $new_instance['post_excerpt_length'] );
        if ( $instance['post_excerpt_length'] < 1 ) {
            $instance['post_excerpt_length']     = 20;
        }
        $instance['show_more_button']    = isset( $new_instance['show_more_button'] ) ? (bool) $new_instance['show_more_button'] : false;
        $instance['more_button_text']    = sanitize_text_field( $new_instance['more_button_text'] );
        if ( empty( $instance['more_button_text'] ) ) {
            $instance['more_button_text']     = __( 'Read more' , 'wen-corporate' );
        }

        return $instance;

    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array(
            'title'               =>  '',
            'recent_category'     =>  0,
            'number_of_posts'     =>  4,
            'show_post_excerpt'   =>  1,
            'post_excerpt_length' =>  20,
            'show_more_button'    =>  0,
            'more_button_text'    =>  __( 'Read more' , 'wen-corporate' ),
        ) );
        $title               = htmlspecialchars( $instance['title'] );
        $recent_category     = absint( $instance['recent_category'] );
        $number_of_posts     = absint( $instance['number_of_posts'] );
        $show_post_excerpt   = absint( $instance['show_post_excerpt'] );
        $post_excerpt_length = absint( $instance['post_excerpt_length'] );
        $show_more_button    = absint( $instance['show_more_button'] );
        $more_button_text    = esc_attr( $instance['more_button_text'] );

?>
<p>
    <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'wen-corporate'); ?></label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('recent_category'); ?>"><?php _e('Category', 'wen-corporate' ); ?>
    </label>
    <?php
    $cat_args = array(
        'orderby'         =>  'name',
        'hide_empty'      =>  0,
        'taxonomy'        =>  'category',
        'name'            =>  $this->get_field_name('recent_category'),
        'id'              =>  $this->get_field_id('recent_category'),
        'class'           =>  'nscw-cat-list',
        'selected'        =>  $recent_category,
        'show_option_all' =>  __( 'All Categories','wen-corporate' ),
      );
    wp_dropdown_categories( $cat_args );
    ?>

</p>

<p>
    <label for="<?php echo $this->get_field_id('number_of_posts'); ?>">
    <?php _e('Number of posts', 'wen-corporate'); ?>:
        <select id="<?php echo $this->get_field_id('number_of_posts'); ?>" name="<?php echo $this->get_field_name('number_of_posts'); ?>">
        <option value="3" <?php selected( $number_of_posts, '3' ) ?>>3</option>
        <option value="4" <?php selected( $number_of_posts, '4' ) ?>>4</option>
        </select>
    </label>
</p>

<p>
    <label for="<?php echo $this->get_field_id('show_post_excerpt'); ?>"><?php _e('Show Post Excerpt', 'wen-corporate'); ?>:</label>
    <input id="<?php echo $this->get_field_id('show_post_excerpt'); ?>" name="<?php echo $this->get_field_name('show_post_excerpt'); ?>" type="checkbox" <?php checked(isset($instance['show_post_excerpt']) ? $instance['show_post_excerpt'] : 0); ?> />
</p>
<p>
    <label for="<?php echo $this->get_field_id('post_excerpt_length'); ?>"><?php _e('Excerpt Length', 'wen-corporate'); ?>
    <input type="number" id="<?php echo $this->get_field_id('post_excerpt_length'); ?>" name="<?php echo $this->get_field_name('post_excerpt_length'); ?>"  value="<?php echo esc_attr( $post_excerpt_length ); ?>" min="1" />
    </label>
</p>

<p>
    <label for="<?php echo $this->get_field_id('show_more_button'); ?>"><?php _e('Show More Button', 'wen-corporate'); ?>:</label>
    <input id="<?php echo $this->get_field_id('show_more_button'); ?>" name="<?php echo $this->get_field_name('show_more_button'); ?>" type="checkbox" <?php checked(isset($instance['show_more_button']) ? $instance['show_more_button'] : 0); ?> />
</p>
<p>
    <label for="<?php echo $this->get_field_id('more_button_text'); ?>"><?php _e('More Button Text', 'wen-corporate'); ?>
    <input type="text" id="<?php echo $this->get_field_id('more_button_text'); ?>" name="<?php echo $this->get_field_name('more_button_text'); ?>"  value="<?php echo esc_attr( $more_button_text ); ?>" />
    </label>
</p>

<?php }

} ?>
