<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package sparkling
 */
?>
</div>
	<div id="secondary" class="widget-area col-sm-12 col-md-4" role="complementary">
		<div class="well">
			<?php do_action( 'before_sidebar' ); ?>
			<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

				
			<?php endif; // end sidebar widget area ?>
			
		</div>
		
	</div><!-- #secondary -->
