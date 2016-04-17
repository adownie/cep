<?php

class WEN_Corporate_Social_Widget extends WP_Widget {

    function __construct() {
        $opts =array(
                    'classname'     => 'wen_corporate_social_widget',
                    'description'   => __( 'Displays social icons.', 'wen-corporate' )
                );

        parent::__construct('wen-corporate-social', __('Corporate Social Widget', 'wen-corporate'), $opts);
    }


    function widget( $args, $instance ) {
        extract( $args );

        $title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

        echo $before_widget;
        if ($title) echo $before_title . $title . $after_title;
        //
        $nav_menu_locations = get_nav_menu_locations();
        $menu_id = 0;
        if ( isset( $nav_menu_locations['social'] ) && absint( $nav_menu_locations['social'] ) > 0 ) {
          $menu_id = absint( $nav_menu_locations['social'] );
        }
        if ( $menu_id > 0) {

            wen_corporate_render_social_menu( $menu_id );

        }
        //
        echo $after_widget;

    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title']  =   esc_attr( strip_tags($new_instance['title']) );

        return $instance;
    }

    function form( $instance ) {
        $title          =   isset($instance['title']) ? esc_attr($instance['title']) : '';

        $nav_menu_locations = get_nav_menu_locations();
        // nspre($nav_menu_locations,'ss');
        $is_menu_set = false;
        if ( isset( $nav_menu_locations['social'] ) && absint( $nav_menu_locations['social'] ) > 0 ) {
          $is_menu_set = true;
        }
?>
    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'wen-corporate'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>

    <?php if ( $is_menu_set ): ?>
        <?php
            $menu_id = $nav_menu_locations['social'];
            $social_menu_object = get_term( $menu_id, 'nav_menu' );
            $args = array(
                'action' => 'edit',
                'menu'   => $menu_id,
                );
            $menu_edit_url = add_query_arg( $args, admin_url( 'nav-menus.php' ) );
         ?>
        <p>
            <?php echo __( 'Social Menu is currently set to', 'wen-corporate' ) . ': '; ?>
            <strong><a href="<?php echo esc_url( $menu_edit_url );  ?>" ><?php echo $social_menu_object->name; ?></a></strong>
        </p>

    <?php else: ?>
        <?php
            $args = array(
                'action' => 'locations',
                );
            $menu_manage_url = add_query_arg( $args, admin_url( 'nav-menus.php' ) );
            $args = array(
                'action' => 'edit',
                'menu'   => 0,
                );
            $menu_create_url = add_query_arg( $args, admin_url( 'nav-menus.php' ) );
         ?>
        <p>
            <?php echo __( 'Social menu is not set.', 'wen-corporate' ) . ' '; ?><br />
            <strong><a href="<?php echo esc_url( $menu_manage_url );  ?>"><?php echo __( 'Click here to set menu', 'wen-corporate' ); ?></a></strong>
            <?php echo ' '._x( 'or', 'Social Widget', 'wen-corporate' ) . ' '; ?>
            <strong><a href="<?php echo esc_url( $menu_create_url );  ?>"><?php echo __( 'Create menu now', 'wen-corporate' ); ?></a></strong>
        </p>

    <?php endif ?>

<?php }

} ?>
