<?php
/**
 * The template for displaying post.
 *
 * @package Koenda
 */
?>
<?php if (have_posts()) : ?>
	<ul class="posts fullwidth singlepost">
		<?php 
			$list_posts = koenda_get_list_posts();
			while ( $list_posts->have_posts() ) {
			$list_posts->the_post();
		?>
			<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="short">
					<h2><a href="<?php the_permalink() ?>"><?php if(get_the_title($post->ID)) { the_title(); } else { the_time(get_option( 'date_format' ));} ?></a></h2>
					<p class="posted"><span class="date_time"><?php the_time( get_option( 'date_format' ) ); ?></span> 
					<span class="postedby"><?php the_author(); ?></span> <span class="commentcount">
					<?php comments_popup_link('<span class="icon comments"></span> 0', '<span class="icon comments"></span> 1', '<span class="icon comments"></span> %', 'comment-link'); ?></span></p>
					<?php if( has_post_thumbnail() ) { echo get_the_post_thumbnail( $post->ID, 'featured'); }?>
					<?php the_excerpt(); ?>
					<a class="readmore" href="<?php the_permalink() ?>"><?php _e( 'More', 'koenda' ); ?></a>
				</div>
			</li>
			<?php } wp_reset_postdata(); ?>
	</ul> 
	<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
		<p class="pagination">
			<span class="prev"><?php next_posts_link(__('Previous Posts', 'koenda')) ?></span>
			<span class="next"><?php previous_posts_link(__('Next posts', 'koenda')) ?></span>
		</p>
	<?php } ?>
	<?php else : ?>
		<ul class="posts fullwidth">
			<li>
				<h2 class="center"><?php _e( 'Not found', 'koenda' ); ?></h2>
				<p class="center"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'koenda' ); ?></p>
			</li>	
		</ul>
<?php endif; ?>