<?php
/**
 * The front-page template file.
 *
 * @package WEN_Corporate
 */

get_header(); ?>

<?php
/**
 * wen_corporate_action_before_primary hook
 */
do_action( 'wen_corporate_action_before_primary' );
?>

	<div id="primary"  <?php wen_corporate_primary_class( 'content-area' ); ?>>
		<?php
		/**
		 * wen_corporate_action_before_main hook
		 */
		do_action( 'wen_corporate_action_before_main' );
		?>
		<main id="main" class="site-main" role="main">
			<?php
			/**
			 * wen_corporate_action_after_main_start hook
			 */
			do_action( 'wen_corporate_action_after_main_start' );
			?>


				<?php
				/**
				 * wen_corporate_action_front_page hook
				 */
				do_action( 'wen_corporate_action_front_page' );
				?>


			<?php
			/**
			 * wen_corporate_action_before_main_end hook
			 */
			do_action( 'wen_corporate_action_before_main_end' );
			?>


		</main><!-- #main -->
		<?php
		/**
		 * wen_corporate_action_after_main hook
		 */
		do_action( 'wen_corporate_action_after_main' );
		?>
	</div><!-- #primary -->

<?php
/**
 * wen_corporate_action_after_primary hook
 */
do_action( 'wen_corporate_action_after_primary' );
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
