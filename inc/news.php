<?php 
	$args = array(
		'post_type' => 'post',
		'category__not_in' => 3
	);
	$the_query = new WP_Query($args);
	$count = $the_query->post_count;

if ( $the_query->have_posts() ) : $i = 0; ?>
	
	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post();
		$img_first_news = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_first_news');
		$img_list_news = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_list_news');
	 ?>
		<?php if($i==0) { ?>
		<div class="first_post row">
			<a href="<?php the_permalink(); ?>">
				<div class="col-sm-12 col-md-6 featured">
					<img src="<?php echo $img_first_news[0]; ?>">
				</div>
				<div class="col-sm-12 col-md-6">
					<h5><?php the_title(); ?></h5>
					<p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p>
				</div>
			</a>
		</div>
		<?php } else { ?>
		<?php if($i==1) { ?><ul class="list_posts"><?php } ?>
			<li class="row">
				<a href="<?php the_permalink(); ?>">
					<div class="col-sm-12 col-md-2 featured">
						<img src="<?php echo $img_list_news[0]; ?>">
					</div>
					<div class="col-sm-12 col-md-10">
						<h5><?php the_title(); ?></h5>
					</div>	
				</a>
			</li>
		<?php if($i==$count) { ?></ul><?php } ?>
		<?php } ?>
	<?php $i++; endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<p class="readmore"><a href="<?php bloginfo('siteurl'); ?>/tin-tuc/">Xem thêm</a></p>