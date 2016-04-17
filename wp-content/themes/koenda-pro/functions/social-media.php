<?php
if ( ! function_exists( 'koenda_social_media' ) ) :
function koenda_social_media() {
?>
	<ul class="social">
		<?php if(of_get_option('url_rss') <> '') { ?><li><a class="rss_icon" href="<?php echo of_get_option('url_rss'); ?>"  target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/rss.png" alt="" /></a></li><?php } ?>
        <?php if(of_get_option('url_delicious') <> '') { ?><li><a class="delicious_icon" href="<?php echo of_get_option('url_delicious'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/delicious.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_deviantart') <> '') { ?><li><a class="deviantart_icon" href="<?php echo of_get_option('url_deviantart'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/deviantart.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_digg') <> '') { ?><li><a class="digg_icon" href="<?php echo of_get_option('url_digg'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/digg.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_facebook') <> '') { ?><li><a class="facebook_icon" href="<?php echo of_get_option('url_facebook'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/facebook.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_flickr') <> '') { ?><li><a class="flickr_icon" href="<?php echo of_get_option('url_flickr'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/flickr.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_googleplus') <> '') { ?><li><a class="google_icon" href="<?php echo of_get_option('url_googleplus'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/google.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_lastfm') <> '') { ?><li><a class="lastfm_icon" href="<?php echo of_get_option('url_lastfm'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/lastfm.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_linkedin') <> '') { ?><li><a class="linkedin_icon" href="<?php echo of_get_option('url_linkedin'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/linkedin.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_myspace') <> '') { ?><li><a class="myspace_icon" href="<?php echo of_get_option('url_myspace'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/myspace.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_reddit') <> '') { ?><li><a class="reddit_icon" href="<?php echo of_get_option('url_reddit'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/reddit.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_technorati') <> '') { ?><li><a class="technorati_icon" href="<?php echo of_get_option('url_technorati'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/technorati.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_tumblr') <> '') { ?><li><a class="tumblr_icon" href="<?php echo of_get_option('url_tumblr'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/tumbrl.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_twitter') <> '') { ?><li><a class="twitter_icon" href="<?php echo of_get_option('url_twitter'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/twitter.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_vimeo') <> '') { ?><li><a class="vimeo_icon" href="<?php echo of_get_option('url_vimeo'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/vimeo.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_youtube') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_youtube'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/youtube.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_aim') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_aim'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/aim.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_amazon') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_amazon'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/amazon.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_dribbble') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_dribbble'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/dribbble.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_fireeagle') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_fireeagle'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/fireeagle.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_itunes') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_itunes'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/itunes.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_messenger') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_messenger'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/messenger.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_netvibes') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_netvibes'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/netvibes.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_orkut') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_orkut'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/orkut.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_picasa') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_picasa'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/picasa.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_skype') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_skype'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/skype.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_stumbleupon') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_stumbleupon'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/stumbleupon.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_vcard') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_vcard'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/vcard.png" alt="" /></a></li><?php } ?>		
		<?php if(of_get_option('url_wikipedia') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_wikipedia'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/wikipedia.png" alt="" /></a></li><?php } ?>
		<?php if(of_get_option('url_yelp') <> '') { ?><li><a class="youtube_icon" href="<?php echo of_get_option('url_yelp'); ?>" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/icons/yelp.png" alt="" /></a></li><?php } ?>
	</ul> <!--  END social  -->
<?php
}
endif; 
add_action( 'koenda_social_media_display', 'koenda_social_media' );
?>