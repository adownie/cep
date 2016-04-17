<?php

/*
 * Get single option value
 */
function wen_corporate_get_option( $key ){

  global $wen_corporate_customizer;

  if ( empty( $key ) ) {
    return;
  }

  $option = $wen_corporate_customizer->get_option( $key );

  return $option;

}
if ( ! function_exists( 'wen_corporate_the_excerpt' ) ) :
  /*
   * WEN Excerpt function
   */
  function wen_corporate_the_excerpt( $length = 40, $post_obj = null ) {

    global $post;
    if ( is_null( $post_obj ) ) {
      $post_obj = $post;
    }
    $length = absint( $length );
    if ( $length < 1 ) {
      $length = 40;
    }
    $source_content = $post_obj->post_content;
    if ( ! empty( $post_obj->post_excerpt ) ) {
      $source_content = $post_obj->post_excerpt;
    }
    $source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
    $trimmed_content = wp_trim_words( $source_content, $length, '...' );
    return $trimmed_content;

  }
endif;

if ( ! function_exists( 'wen_corporate_content_class' ) ) :
  /*
   * Content Class
   */
  function wen_corporate_content_class( $class = '' ){

    $classes = array();
    if ( ! empty( $class ) ) {
      if ( !is_array( $class ) )
        $class = preg_split( '#\s+#', $class );
      $classes = array_merge( $classes, $class );
    } else {
      // Ensure that we always coerce class to being an array.
      $class = array();
    }

    $classes = array_map( 'esc_attr', $classes );
    $classes = apply_filters( 'wen_corporate_filter_content_class', $classes, $class );
    echo 'class="' . join( ' ', $classes ) . '"';

  }
endif;

if ( ! function_exists( 'wen_corporate_primary_class' ) ) :
  /*
   * Primary Class
   */
  function wen_corporate_primary_class( $class = '' ){

    $classes = array();
    if ( ! empty( $class ) ) {
      if ( !is_array( $class ) )
        $class = preg_split( '#\s+#', $class );
      $classes = array_merge( $classes, $class );
    } else {
      // Ensure that we always coerce class to being an array.
      $class = array();
    }

    $classes = array_map( 'esc_attr', $classes );
    $classes = apply_filters( 'wen_corporate_filter_primary_class', $classes, $class );
    echo 'class="' . join( ' ', $classes ) . '"';

  }
endif;

if ( ! function_exists( 'wen_corporate_secondary_class' ) ) :
  /*
   * Secondary Class
   */
  function wen_corporate_secondary_class( $class = '' ){

    $classes = array();
    if ( ! empty( $class ) ) {
      if ( !is_array( $class ) )
        $class = preg_split( '#\s+#', $class );
      $classes = array_merge( $classes, $class );
    } else {
      // Ensure that we always coerce class to being an array.
      $class = array();
    }

    $classes = array_map( 'esc_attr', $classes );
    $classes = apply_filters( 'wen_corporate_filter_secondary_class', $classes, $class );
    echo 'class="' . join( ' ', $classes ) . '"';

  }
endif;

if ( ! function_exists( 'wen_corporate_display_footer_widgets' ) ) :
  /*
   * Display Footer Widgets block
   */
  function wen_corporate_display_footer_widgets( $args = array() ){

    $footer_widgets = wen_corporate_get_option( 'footer_widgets' );
    $footer_widgets = absint( $footer_widgets );

    if (  0 == $footer_widgets  ) {
      return;
    }
    $number_of_footer_widgets = $footer_widgets;
    //Defaults
    $args = wp_parse_args( (array) $args, array(
      'container'       => 'div',
      'container_class' => '',
      'container_id'    => '',
      'wrap_class'      => 'footer-widget-area',
      'before'          => '<div id="footer-widgets" class="site-footer-widgets">',
      'after'           => '</div>',
      ) );
    $args = apply_filters( 'wen_corporate_filter_footer_widgets_args', $args );

    $container_open = '';
    $container_close = '';

    if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
      $container_open = sprintf(
        '<%s %s %s>',
        $args['container'],
        ( $args['container_class'] ) ? 'class="' . $args['container_class'] . '"':'',
        ( $args['container_id'] ) ? 'id="' . $args['container_id'] . '"':''
        );
    }
    if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
      $container_close = sprintf(
        '</%s>',
        $args['container']
        );
    }

    echo $container_open;

    echo $args['before'];

    for($i = 1; $i <= $number_of_footer_widgets ;$i++){
      $item_class = apply_filters( 'wen_corporate_filter_footer_widget_class', '', $number_of_footer_widgets, $i );
      $div_classes = implode(' ', array( $args['wrap_class'], $item_class ) );
      echo '<div class="' . $div_classes .  '">';
      $sidebar_name = ( 1 == $i ) ? "footer-sidebar" : "footer-sidebar-$i" ;
      dynamic_sidebar( $sidebar_name );
      echo '</div><!-- .' . $args['wrap_class'] . ' -->';
    } // end for loop

    echo $args['after'];

    echo $container_close;

  } // end function wen_corporate_display_footer_widgets
endif;

if ( ! function_exists( 'wen_corporate_render_social_menu' ) ) :
  /*
   * Render Social Menu
   */
  function wen_corporate_render_social_menu( $menu_id ){

    $menu_id = absint( $menu_id );
    if ( $menu_id < 1 ) {
      return;
    }
    $args = array(
      'class_prefix' => 'fa',
    );
    $args = apply_filters( 'wen_corporate_filter_social_menu_args', $args );

    $menu_items = wp_get_nav_menu_items( $menu_id, $args );
    if ( ! empty( $menu_items ) ) {
      echo '<ul>';
      foreach ( $menu_items as $m_key => $m ) {
        echo '<li>';
        echo '<a href="' . esc_url( $m->url ) . '" target="_blank" title="' . esc_attr( $m->title ) . '" >';
        echo '<span class="title screen-reader-text">' . esc_attr( $m->title ) . '</span>';
        echo '</a>';
        echo '</li>';

      }
      echo '</ul>';
    }

    return;

  }
endif;

if ( ! function_exists( 'wen_corporate_render_service_block' ) ) :
  /*
   * Render Service Block
   */
  function wen_corporate_render_service_block( $args ){

    //Defaults
    $args = wp_parse_args( (array) $args, array(
      'container'       => 'div',
      'container_class' => 'service-block-list row',
      'container_id'    => '',
      'before'          => '',
      'after'           => '',
      ) );
    $args = apply_filters( 'wen_corporate_filter_service_block_args', $args );

    $block_item_class = $args['number_of_columns'];
    switch ( $args['number_of_columns'] ) {
      case 2:
        $block_item_class = 'col-sm-6';
        break;

      case 3:
        $block_item_class = 'col-sm-4';
        break;

      case 4:
        $block_item_class = 'col-sm-3';
        break;

      default:
        $block_item_class = '';
        break;
    }
    $block_item_class = apply_filters( 'wen_corporate_filter_service_block_item_class', $block_item_class, $args['number_of_columns'] );

    $container_open = '';
    $container_close = '';

    if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
      $container_open = sprintf(
        '<%s %s %s>',
        $args['container'],
        ( $args['container_class'] ) ? 'class="' . $args['container_class'] . '"':'',
        ( $args['container_id'] ) ? 'id="' . $args['container_id'] . '"':''
        );
    }
    if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
      $container_close = sprintf(
        '</%s>',
        $args['container']
        );
    }

    $qargs = array(
      'posts_per_page' => $args['number_of_posts'],
      );
    if ( absint( $args['service_category'] ) > 0  ) {
      $qargs['category'] = $args['service_category'];
    }

    $all_posts = get_posts( $qargs );

    if ( ! empty( $all_posts ) ) {

      echo $container_open;

      global $post;

      foreach ($all_posts as $key => $post) {
        setup_postdata( $post );
        ?>

        <div class="service-block-item <?php echo esc_attr($block_item_class); ?>">

          <div class="service-block-inner">

          <?php the_post_thumbnail( 'thumbnail' ); ?>
          <h3 class="service-item-title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
            <?php the_title(); ?>
            </a>
          </h3>

          <?php if ( 1 == $args['show_post_excerpt'] ): ?>

            <div class="service-block-item-excerpt">
              <p>
              <?php
                echo wen_corporate_the_excerpt( $args['post_excerpt_length'] );
               ?>
              </p>
              <?php
              // the_excerpt();
              ?>
            </div><!-- .service-block-item-excerpt -->

          <?php endif ?>

          <?php if ( 1 == $args['show_more_button'] ): ?>

              <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_attr($args['more_button_text']); ?></a>

          <?php endif; ?>

          </div><!-- .service-block-inner -->

        </div> <!-- .service-block-item -->

        <?php
      }
      wp_reset_postdata();

      echo $container_close;

    }

  } // End function
endif;

if ( ! function_exists( 'wen_corporate_render_recent_posts_carousel_block' ) ) :
  function wen_corporate_render_recent_posts_carousel_block( $args ){

    //Defaults
    $args = wp_parse_args( (array) $args, array(
      'recent_category'     => 0,
      'number_of_posts'     => 10,
      'show_post_excerpt'   => 1,
      'post_excerpt_length' => 20,
      'show_more_button'    => 1,
      'more_button_text'    => __( 'Read more' , 'wen-corporate' ),
      ) );
    $args = apply_filters( 'wen_corporate_filter_recent_posts_carousel_block_args', $args );
    ob_start();
    ?>
      <?php
        $qargs = array(
          'posts_per_page' => $args['number_of_posts'],
          );
        if ( absint( $args['recent_category'] ) > 0  ) {
          $qargs['category'] = $args['recent_category'];
        }

        $all_posts = get_posts( $qargs );

        $slider_id = 'recent-posts-carousel-'.uniqid();

       ?>
       <?php if ( ! empty( $all_posts ) ): ?>

        <div id="<?php echo esc_attr( $slider_id ); ?>" class="owl-carousel owl-theme">
        <?php global $post; ?>

        <?php

          foreach ($all_posts as $key => $post) {
            setup_postdata( $post );
            ?>

            <div class="recent-posts-block-item">

              <h3 class="recent-posts-title">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
              </h3>

              <?php if ( has_post_thumbnail() ): ?>
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                  <?php the_post_thumbnail( 'post-thumb' ); ?>
                </a>
              <?php endif ?>

              <?php if ( 1 == $args['show_post_excerpt'] ): ?>

                <div class="recent-posts-block-item-excerpt">
                  <p>
                  <?php
                    echo wen_corporate_the_excerpt( $args['post_excerpt_length'] );
                   ?>
                  </p>
                </div><!-- .recent-posts-block-item-excerpt -->

              <?php endif ?>

              <?php if ( 1 == $args['show_more_button'] ): ?>

                  <a href="<?php the_permalink(); ?>" class="read-more" ><?php echo esc_attr($args['more_button_text']); ?></a>

              <?php endif; ?>

            </div> <!-- .service-block-item -->

            <?php
          }
          wp_reset_postdata();

         ?>

        </div>

       <?php endif ?>


    <script>
    jQuery(document).ready(function($) {

        var owl = $("#<?php echo esc_attr( $slider_id ); ?>");

        owl.owlCarousel({

            itemsCustom : [
              [0, 1],
              [450, 1],
              [600, 2],
              [1000, 3]

            ],
            navigation : true,
            pagination : false,
            navigationText : false

        });

      });
    </script>

    <?php
    $output = ob_get_contents();
    ob_end_clean();
    echo  $output;

  } // End function
endif;

if ( ! function_exists( 'wen_corporate_render_recent_posts_block' ) ) :
  /*
   * Render Recent Posts Block
   */
  function wen_corporate_render_recent_posts_block( $args ){

    //Defaults
    $args = wp_parse_args( (array) $args, array(
      'container'       => 'div',
      'container_class' => 'recent-posts-block-list row',
      'container_id'    => '',
      'before'          => '',
      'after'           => '',
      ) );
    $args = apply_filters( 'wen_corporate_filter_recent_posts_block_args', $args );

    $block_item_class = $args['number_of_posts'];
    switch ( $args['number_of_posts'] ) {
      case 3:
        $block_item_class = 'col-sm-4';
        break;

      case 4:
        $block_item_class = 'col-sm-3';
        break;

      default:
        $block_item_class = '';
        break;
    }
    $block_item_class = apply_filters( 'wen_corporate_filter_recent_posts_block_item_class', $block_item_class, $args['number_of_posts'] );

    $container_open = '';
    $container_close = '';

    if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
      $container_open = sprintf(
        '<%s %s %s>',
        $args['container'],
        ( $args['container_class'] ) ? 'class="' . $args['container_class'] . '"':'',
        ( $args['container_id'] ) ? 'id="' . $args['container_id'] . '"':''
        );
    }
    if ( ! empty( $args['container_class'] ) || ! empty( $args['container_id'] ) ) {
      $container_close = sprintf(
        '</%s>',
        $args['container']
        );
    }

    $qargs = array(
      'posts_per_page' => $args['number_of_posts'],
      );
    if ( absint( $args['recent_category'] ) > 0  ) {
      $qargs['category'] = $args['recent_category'];
    }

    $all_posts = get_posts( $qargs );

    if ( ! empty( $all_posts ) ) {

      echo $container_open;

      global $post;

      foreach ($all_posts as $key => $post) {
        setup_postdata( $post );
        ?>

        <div class="recent-posts-block-item <?php echo esc_attr($block_item_class); ?>">

          <?php the_post_thumbnail( 'thumbnail' ); ?>

          <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title( '<h3 class="recent-posts-title">', '</h3>' ); ?></a>

          <?php if ( 1 == $args['show_post_excerpt'] ): ?>

            <div class="recent-posts-block-item-excerpt">
              <p>
              <?php
                echo wen_corporate_the_excerpt( $args['post_excerpt_length'] );
               ?>
              </p>
            </div><!-- .recent-posts-block-item-excerpt -->

          <?php endif ?>

          <?php if ( 1 == $args['show_more_button'] ): ?>

              <a href="<?php the_permalink(); ?>" class="read-more" ><?php echo esc_attr($args['more_button_text']); ?></a>

          <?php endif; ?>

        </div> <!-- .service-block-item -->

        <?php
      }
      wp_reset_postdata();

      echo $container_close;

    }
  }
endif;

if( ! function_exists( 'wen_corporate_primary_navigation_fallback' ) ) :
	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.4
	 */
	function wen_corporate_primary_navigation_fallback() {
		echo '<ul>';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . __( 'Home', 'wen-corporate' ). '</a></li>';
		wp_list_pages( array(
			'title_li' => '',
			'depth'    => 1,
			'number'   => 6,
		) );
		echo '</ul>';

	}
endif;

if ( ! function_exists( 'wen_corporate_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.5
	 */
	function wen_corporate_simple_breadcrumb() {

		// Load library if not exists.
		if ( ! function_exists( 'breadcrumb_trail' ) ) {
			require get_template_directory() . '/lib/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
			'labels'      => array(
				'home' => get_bloginfo( 'name' , 'display' ),
				),
			);

		breadcrumb_trail( $breadcrumb_args );

	}

endif;
