<?php

  $slider_category   = wen_corporate_get_option( 'slider_category' );
  $number_of_slides  = wen_corporate_get_option( 'number_of_slides' );
  $transition_effect = wen_corporate_get_option( 'transition_effect' );
  $show_caption      = wen_corporate_get_option( 'show_caption' );
  $show_pager        = wen_corporate_get_option( 'show_pager' );
  $auto_play         = wen_corporate_get_option( 'auto_play' );
  $transition_delay  = wen_corporate_get_option( 'transition_delay' );
  $transition_length = wen_corporate_get_option( 'transition_length' );

  $qargs = array(
    'posts_per_page' => esc_attr( $number_of_slides ),
    'no_found_rows'  => true,
    'meta_query'     => array(
        array( 'key' => '_thumbnail_id' ), //Show only posts with featured images
      )
    );

  if ( absint( $slider_category ) > 0  ) {
    $qargs['category'] = esc_attr( $slider_category );
  }

  $all_posts = get_posts( $qargs );

 ?>

<?php if ( ! empty( $all_posts ) ): ?>
  <?php
    $slide_data = array(
      'fx'             => esc_attr( $transition_effect ),
      'speed'          => esc_attr( $transition_length ),
      'auto-height'    => 'container',
      'loader'         => 'true',
      'pause-on-hover' => 'true',
      'log'            => 'false',
      );
    if ( $auto_play ) {
      $slide_data['timeout'] = esc_attr( $transition_delay );
    }
    else{
      $slide_data['timeout'] = 0;
    }
    // Slides
    $slide_data['slides'] = 'li';

    if ( $show_caption ) {
      $slide_data['caption-template'] = '<h3><a href="{{url}}">{{title}}</a></h3><p>{{excerpt}}</p>';
    }
    if ( $show_pager ) {
      $slide_data['pager-template'] = '<span class="pager-box"></span>';
    }
    $slide_attributes_text = '';
    foreach ($slide_data as $key => $item) {

      $slide_attributes_text .= ' ';
      $slide_attributes_text .= ' data-cycle-'.esc_attr( $key );
      $slide_attributes_text .= '="'.esc_attr( $item ).'"';

    }

  ?>

  <div class="col-sm-12">


    <ul class="cycle-slideshow" id="main-slider" <?php echo $slide_attributes_text; ?>>

      <?php
       global $post;
       ?>
        <?php $cnt=1; ?>
        <?php foreach ( $all_posts as $key => $post ): ?>
          <?php setup_postdata( $post ); ?>

            <?php $class_text = ( 1 == $cnt ) ? ' class="first" ' : ''; ?>

            <?php if ( has_post_thumbnail()): ?>
              <?php
                $attr = array(
                  'data-cycle-title'   => esc_attr(get_the_title()),
                  'data-cycle-excerpt' => wen_corporate_the_excerpt( 15, $post ),
                  'data-cycle-url'     => esc_url(get_permalink(get_the_ID())),
                  );
                if ( 1 == $cnt ) {
                  $attr['class'] = 'first';
                }
                ?>
                <li <?php echo $class_text; ?> data-cycle-title="<?php echo esc_attr(get_the_title()); ?>" data-cycle-excerpt="<?php echo esc_attr( wen_corporate_the_excerpt( 15, $post ) ); ?>" data-cycle-url="<?php echo esc_url(get_permalink(get_the_ID())); ?>" >

                  <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
                      <?php
                        the_post_thumbnail( 'full' );
                      ?>
                  </a>
                </li>

              <?php $cnt++; ?>

            <?php endif ?>

        <?php endforeach ?>

        <?php if ( $show_caption ): ?>
          <!-- empty element for caption -->
          <div class="cycle-caption"></div>
        <?php endif ?>

        <?php if ( $show_pager ): ?>
          <!-- pager -->
          <div class="cycle-pager"></div>
        <?php endif ?>

    </ul> <!-- #main-slider -->

  </div><!-- .col-sm-12 -->
  <?php wp_reset_postdata(); ?>

<?php endif ?>
