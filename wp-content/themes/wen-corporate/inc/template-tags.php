<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package WEN_Corporate
 */

if ( ! function_exists( 'wen_corporate_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 */
function wen_corporate_paging_nav() {
	// Don't print empty markup if there's only one page.
	if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
		return;
	}
	?>
	<nav class="navigation paging-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Posts navigation', 'wen-corporate' ); ?></h1>
		<div class="nav-links">

			<?php if ( get_next_posts_link() ) : ?>
			<div class="nav-previous"><?php next_posts_link( '<span class="meta-nav">&larr;</span> ' . __( 'Older posts', 'wen-corporate' ) ); ?></div>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts', 'wen-corporate' ) . ' <span class="meta-nav">&rarr;</span>' ); ?></div>
			<?php endif; ?>

		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wen_corporate_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function wen_corporate_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation" role="navigation">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', 'wen-corporate' ); ?></h1>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">&larr;</span>&nbsp;' . '%title' );
				next_post_link( '<div class="nav-next">%link</div>', '%title' . '&nbsp;<span class="meta-nav">&rarr;</span>' );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .navigation -->
	<?php
}
endif;

if ( ! function_exists( 'wen_corporate_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wen_corporate_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		'%s',
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		'%s',
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>';

}
endif;

if ( ! function_exists( 'wen_corporate_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wen_corporate_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'wen-corporate' ) );
		if ( $categories_list && wen_corporate_categorized_blog() ) {
			printf( '<span class="cat-links">' . __( 'Posted in %1$s', 'wen-corporate' ) . '</span>', $categories_list );
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'wen-corporate' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . __( 'Tagged %1$s', 'wen-corporate' ) . '</span>', $tags_list );
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( __( 'Leave a comment', 'wen-corporate' ), __( '1 Comment', 'wen-corporate' ), __( '% Comments', 'wen-corporate' ) );
		echo '</span>';
	}

	edit_post_link( __( 'Edit', 'wen-corporate' ), '<span class="edit-link">', '</span>' );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wen_corporate_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'wen_corporate_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'wen_corporate_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so wen_corporate_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so wen_corporate_categorized_blog should return false.
		return false;
	}
}

/**
 * Flushes out the transients used in wen_corporate_categorized_blog().
 */
function wen_corporate_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'wen_corporate_categories' );
}
add_action( 'edit_category', 'wen_corporate_category_transient_flusher' );
add_action( 'save_post',     'wen_corporate_category_transient_flusher' );
