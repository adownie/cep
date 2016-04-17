<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WEN_Corporate
 */
?>
    <?php
      /**
       * wen_corporate_action_before_content_end hook
       */
      do_action( 'wen_corporate_action_before_content_end' ); ?>

  </div><!-- #content -->

    <?php
      /**
       * wen_corporate_action_before_footer hook
       */
      do_action( 'wen_corporate_action_before_footer' ); ?>


	<footer id="colophon" class="site-footer" role="contentinfo">

      <?php
        /**
         * wen_corporate_action_footer hook
         *
         * @hooked
         * wen_corporate_implement_footer_widgets 2
         * wen_corporate_implement_footer_navigation_copyright 10
         */
        do_action( 'wen_corporate_action_footer' ); ?>


  </footer><!-- #colophon -->

    <?php
      /**
       * wen_corporate_action_after_footer hook
       */
      do_action( 'wen_corporate_action_after_footer' ); ?>


</div><!-- #page -->


<?php
/**
 * wen_corporate_action_after hook
 */
do_action( 'wen_corporate_action_after' );
?>

<?php wp_footer(); ?>
</body>
</html>
