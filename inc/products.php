<?php 
	$args = array(
		'post_type' => 'san-pham'
	);
	$the_query = new WP_Query($args);
	$count = $the_query->post_count;

if ( $the_query->have_posts() ) : $i = 0; ?>
	
	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		<?php if( $i%3 == 0 || $i== 0) {  echo '<div class="row">'; } ?>
		<?php   
			$img_news = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
            $img_news_src = $img_news[0];
        ?>
		<div class="col-sm-4 col-md-4">
			<?php if(has_post_thumbnail()) { ?>
				<img src="<?php echo $img_news_src;  ?>">
			<?php } else { ?>
				<img src="http://nongsannhietdoi.com/wp-content/uploads/2015/11/mostly-veggies_2558160.jpg">
			<?php } ?>
		</div>
		<?php if( ($i+1)%3 == 0 && $i!=0) {  echo '</div>'; } ?>
	<?php $i++; endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>