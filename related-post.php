<?php
/**
 * @package sparkling
 */
?>
<h4><?php _e('Tin liên quan'); ?></h4>
<?php 
	// arguments
	$args = array(
		'post_type' => 'post',
		'post_status' => 'publish',
		'orderby' => 'date',
		'posts_per_page' => 5,
		'post__not_in' => array ($post->ID),
	);
$related_items = new WP_Query( $args );
// loop over query
if ($related_items->have_posts()) :
	echo '<ul class="list-group">';
	while ( $related_items->have_posts() ) : $related_items->the_post(); ?>
    <li class="list-group-item"><i class="fa fa-arrow-right"></i><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></li>
<?php
	endwhile;
	echo '</ul>';
	endif;
	// Reset Post Data
	wp_reset_postdata();
?>
 
 
