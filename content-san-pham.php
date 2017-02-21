<?php
/**
 * @package sparkling-load san-pham
 */
?>
<div class="col-lg-4 col-md-12 col-xs-12 col-sm-12">
	<a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php the_post_thumbnail( 'thepray', array( 'class' => '' )); ?>
		<h4><?php the_title(); ?></h4>
	</a>
	<?php 
		// if ( ! has_excerpt() ) {
	 //    short_content(15);
		// } else { 
		//   the_excerpt();
		// } 
	?>
</div>