<?php
/**
 * @package WEN_Corporate
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		<div class="entry-meta">
			<?php wen_corporate_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			if ( has_post_thumbnail() ) {
				the_post_thumbnail();
			}
		 ?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'wen-corporate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wen_corporate_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
