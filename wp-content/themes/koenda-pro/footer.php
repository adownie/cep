<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Koenda
 */
?>
 <div id="footer" class="clearfix">
			<div class="widget-footer">
					<?php if (!dynamic_sidebar('footer-widget-area-1') ) : endif; ?>
			</div>
			<div class="widget-footer">
				<?php if (!dynamic_sidebar('footer-widget-area-2') ) : endif; ?>
			</div>
			<div class="widget-footer">
				<?php if (!dynamic_sidebar('footer-widget-area-3') ) : endif; ?>
			</div>
			<div class="widget-footer wflast">
				<?php if (!dynamic_sidebar('footer-widget-area-4') ) : endif; ?>
			</div>		
			<p class="copyright"><span class="ycopy"><?php  echo of_get_option('footer_text_left'); ?></span>
			<span><?php  echo of_get_option('footer_text_right'); ?></span></p>
		</div> <!--  END Footer  -->
	</div> <!--  END Wrapper  -->
<?php wp_footer(); ?>		
</body>
</html>