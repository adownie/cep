<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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


		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h2 class="page-title">', '</h2>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );
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

	</div><!-- #primary -->

<?php
/**
 * wen_corporate_action_after_primary hook
 */
do_action( 'wen_corporate_action_after_primary' );
?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
