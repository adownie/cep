<?php  $header_style = of_get_option('header_style'); ?>
<?php if($header_style==1) { ?>
		<?php wp_nav_menu( array('container'=> 'ul', 'menu_class' => 'topbarnav',  'theme_location' => 'secondary' ) ); ?>
			<form id="topsearch" action="<?php echo esc_url(home_url('/')); ?>" method="get">
					<label for="search"><?php if(isset($_GET['s'])) { echo $_GET['s']; } else { echo 'Search ...'; } ?></label>
					<input id="search" name="s" type="text" value="" />
					<input id="button" name="submit" type="submit" value=""/>
			</form> <!--  END s  -->
        <?php do_action( 'koenda_social_media_display' ); ?>
<?php } ?>
<?php if($header_style==2) { ?>
		<?php wp_nav_menu( array('container'=> 'ul', 'menu_class' => 'topbarnav',  'theme_location' => 'secondary' ) ); ?>
        <?php do_action( 'koenda_social_media_display' ); ?> 
<?php } ?>
<?php if($header_style==3) { ?>
	    <p class="headerphone"><?php echo of_get_option('header_phone'); ?> <?php if(of_get_option('header_email')<>'') { echo '| '.of_get_option('header_email'); } ?></p>
			<form id="topsearch" action="<?php echo esc_url(home_url('/')); ?>" method="get">
					<label for="search"><?php if(isset($_GET['s'])) { echo $_GET['s']; } else { echo 'Search ...'; } ?></label>
					<input id="search" name="s" type="text" value="" />
					<input id="button" name="submit" type="submit" value=""/>
			</form> <!--  END s  -->
        <?php do_action( 'koenda_social_media_display' ); ?>
<?php } ?>
<?php if($header_style==4) { ?>
		<?php wp_nav_menu( array('container'=> 'ul', 'menu_class' => 'topbarnav',  'theme_location' => 'secondary' ) ); ?>
		 <p class="headerphone right"><?php echo of_get_option('header_phone'); ?> <?php if(of_get_option('header_email')<>'') { echo '| '.of_get_option('header_email'); } ?></p>
<?php } ?>
<?php if($header_style==5) { ?>
		<?php do_action( 'koenda_social_media_display' ); ?>
		<p class="headerphone left"><?php echo of_get_option('header_phone'); ?> <?php if(of_get_option('header_email')<>'') { echo '| '.of_get_option('header_email'); } ?></p>
<?php } ?>
<?php if($header_style==6) { ?>
		<p class="headerphone left"><?php echo of_get_option('header_messages'); ?></p>
		<p class="headerphone right"><?php echo of_get_option('header_phone'); ?> <?php if(of_get_option('header_email')<>'') { echo '| '.of_get_option('header_email'); } ?></p>
<?php } ?>
<?php if($header_style==7) { ?>
	    <p class="headerphone left"><?php echo of_get_option('header_phone'); ?> <?php if(of_get_option('header_email')<>'') { echo '| '.of_get_option('header_email'); } ?></p>
		<p class="headerphone right"><?php echo of_get_option('header_messages'); ?></p>
<?php } ?>
<?php if($header_style==8) { ?>
	    <?php wp_nav_menu( array('container'=> 'ul', 'menu_class' => 'topbarnav',  'theme_location' => 'secondary' ) ); ?>
		<p class="headerphone right"><?php echo of_get_option('header_messages'); ?></p>
<?php } ?>
<?php if($header_style==9) { ?>
		<p class="headerphone left"><?php echo of_get_option('header_messages'); ?></p>
			<form id="topsearch" action="<?php echo esc_url(home_url('/')); ?>" method="get">
					<label for="search"><?php if(isset($_GET['s'])) { echo $_GET['s']; } else { echo 'Search ...'; } ?></label>
					<input id="search" name="s" type="text" value="" />
					<input id="button" name="submit" type="submit" value=""/>
			</form> <!--  END s  -->
        <?php do_action( 'koenda_social_media_display' ); ?>
<?php } ?>
<?php if($header_style==10) { ?>
		<p class="headerphone left"><?php echo of_get_option('header_messages'); ?></p>
        <?php do_action( 'koenda_social_media_display' ); ?> 
<?php } ?>