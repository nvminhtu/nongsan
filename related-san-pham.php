<?php
/**
 * @package sparkling
 */
?>
<h4><?php _e('Sản phẩm liên quan'); ?></h4>
<?php 
 	$custom_taxterms = wp_get_object_terms( $post->ID, 'danh-muc', array('fields' => 'ids') );
	// arguments
	$args = array(
		'post_type' => 'san-pham',
		'post_status' => 'publish',
		'posts_per_page' => 10,
		'orderby' => 'rand',
		'tax_query' => array(
	    array(
	      'taxonomy' => 'danh-muc',
	      'field' => 'id',
	      'terms' => $custom_taxterms
	    )
		),
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
 
 
