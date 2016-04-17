<?php
/**
 * The template for displaying 404 pages (not found).
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

	<div id="primary" class="content-area col-sm-12">
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


			<section class="error-404 not-found">
				<header class="page-header">
					<h2 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'wen-corporate' ); ?></h2>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'wen-corporate' ); ?></p>

					<?php get_search_form(); ?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

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
<?php get_footer(); ?>
