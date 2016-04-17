<?php
/**
 * @package WEN_Corporate
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wen_corporate_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$blog_layout = wen_corporate_get_option( 'blog_layout' );
			if ( 'excerpt' == $blog_layout ) {
				the_excerpt();
			}
			else if( 'full-post' == $blog_layout ) {
				if ( has_post_thumbnail() ) {
          echo '<a href="';
          the_permalink();
          echo '">';
          the_post_thumbnail( 'large', array( 'class'=> 'aligncenter' ) );
          echo '</a>';
				}
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'wen-corporate' ) . ' <span class="meta-nav">&rarr;</span>',
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );
			}
			else{
				if ( has_post_thumbnail() ) {
          echo '<a href="';
          the_permalink();
          echo '">';
          the_post_thumbnail( 'large', array( 'class'=> 'aligncenter' ) );
          echo '</a>';
				}
				the_excerpt();

			}
		 ?>

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
