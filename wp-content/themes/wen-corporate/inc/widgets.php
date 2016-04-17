<?php

if( ! function_exists( 'wen_corporate_load_widgets' ) ) :

  /**
   * Load widgets.
   *
   * @since WEN Corporate 1.0
   */
  function wen_corporate_load_widgets() {

    // Social widget
    load_template(get_template_directory() . "/inc/widgets/social.php");
    register_widget('WEN_Corporate_Social_Widget');

    // Service widget
    load_template(get_template_directory() . "/inc/widgets/service.php");
    register_widget('WEN_Corporate_Service_Widget');

    // Welcome widget
    load_template(get_template_directory() . "/inc/widgets/welcome.php");
    register_widget('WEN_Corporate_Welcome_Widget');

    // Divider widget
    load_template(get_template_directory() . "/inc/widgets/divider.php");
    register_widget('WEN_Corporate_Divider_Widget');

    // Recent Posts Block widget
    load_template(get_template_directory() . "/inc/widgets/recent-posts-block.php");
    register_widget('WEN_Corporate_Recent_Posts_Block_Widget');

    // CTA widget
    load_template(get_template_directory() . "/inc/widgets/cta.php");
    register_widget('WEN_Corporate_CTA_Widget');

  }

endif;

add_action('widgets_init', 'wen_corporate_load_widgets');
