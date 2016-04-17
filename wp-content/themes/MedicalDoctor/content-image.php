
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
				
			<div class="entry-page-image">
				<div class="flexslider mt<?php global $post;  echo get_the_ID(); ?>"> 
					<ul class="slides">
    	
							<?php  
							if ( get_post_meta(get_the_ID(), "mt_portfolio_slider_height3", true)!="") { $height = get_post_meta(get_the_ID(), "mt_portfolio_slider_height3", true); } else { $height = "auto"; }  
							
							if(get_post_meta(get_the_ID(), "mt_portfolio_format_image_url", true)=="" or get_post_meta(get_the_ID(), "mt_portfolio_format_image_url", true)=="http://"){	
							?>
								<li><a href="<?php the_permalink(); ?>"><?php $src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( 999,999 )); 
								echo get_the_post_thumbnail( get_the_ID(), array(960, $height, 'bfi_thumb' => true), $src[0] );
								 ?></a></li>
							<?php
							} else {
							?>		
								<li><a href="<?php echo get_post_meta(get_the_ID(), "mt_portfolio_format_image_url", true); ?>"><?php 
								$src = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), array( 999,999 ) ); 
								echo get_the_post_thumbnail( get_the_ID(), array(640, $height, 'bfi_thumb' => true), $src[0] );?></a></li>						<?php
							} 
							?>													            
					</ul>
				</div>
		
				<script type="text/javascript">
					jQuery(window).load(function() {
			              jQuery('.mt<?php echo get_the_ID(); ?>').flexslider({
			                animation: "slide"
			              });
			            });
				</script>
			</div>
					
			<header class="entry-header">
			<?php global $post; if(get_post_meta(get_the_ID(), "postm_title_on", true)=="on"){	?>		
				<div class="post-format-image-image"></div><h1 class="entry-title"><a href="<?php if(get_post_meta(get_the_ID(), "mt_portfolio_format_image_url", true)=="" or get_post_meta(get_the_ID(), "mt_portfolio_format_image_url", true)=="http://"){ the_permalink(); } else { echo get_post_meta(get_the_ID(), "mt_portfolio_format_image_url", true); }?>"><?php the_title(); ?></a></h1>
			<?php } 
			 ?>
		</header>					
				<?php if (is_single()) { ?>
				<div class="entry-content">
					<?php if(!is_single()) { 
				
				if(ot_get_option("blog_content_type")=="full_content") { the_content( __( '', 'madza_translate' ) ); } else { the_excerpt(); }
				
			} else { 
			
				the_content( __( '', 'madza_translate' ) ); 
				
			} ?>
				</div><!-- .entry-content -->
				<?php } ?>

		<?php global $post; if(get_post_meta(get_the_ID(), "postm_border_on", true)=="on"){	?>
		
		<footer class="entry-meta">
			<?php if(ot_get_option("blog_meta_on")!="off") {  twentytwelve_entry_meta(); } ?>
		</footer><!-- .entry-meta -->
		
		<?php } ?>	
		
	</article><!-- #post -->
