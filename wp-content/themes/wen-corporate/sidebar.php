<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package WEN_Corporate
 */
?>

<?php
  $sidebar_status = apply_filters( 'wen_corporate_filter_sidebar_status', true );
  if ( true !== $sidebar_status ) {
    return;
  }
 ?>

<?php
   /**
    * wen_corporate_action_before_sidebar hook
    */
   do_action( 'wen_corporate_action_before_sidebar' ); ?>

<div id="secondary" <?php wen_corporate_secondary_class( 'widget-area' ); ?> role="complementary">

      <?php
         /**
          * wen_corporate_action_sidebar hook
          *
          * @hooked
          * wen_corporate_implement_sidebar 10
          */
         do_action( 'wen_corporate_action_sidebar' ); ?>

</div><!-- #secondary -->

<?php
   /**
    * wen_corporate_action_after_sidebar hook
    */
   do_action( 'wen_corporate_action_after_sidebar' ); ?>
