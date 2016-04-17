<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'wen-corporate' ) ?></span>
  <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder' , 'wen-corporate' ) ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'wen-corporate'  ) ?>" />
  <input type="submit" class="search-submit" value="&#xf002;" />
</form>
