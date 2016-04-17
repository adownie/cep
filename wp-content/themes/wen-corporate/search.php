<?php
/**
 * The template for displaying search results pages.
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

	<section id="primary" <?php wen_corporate_primary_class( 'content-area' ); ?>>
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


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h2 class="page-title"><?php printf( __( 'Search Results for: %s', 'wen-corporate' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php wen_corporate_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

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

	</section><!-- #primary -->
<?php
/**
 * wen_corporate_action_after_primary hook
 */
do_action( 'wen_corporate_action_after_primary' );
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
