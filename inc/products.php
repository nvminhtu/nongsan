

<?php 
	$args = array( 'orderby' => 'menu-order', 'order' => 'DESC', 'hide_empty' => true);
	$terms = get_terms("danh-muc",$args);
	
	$count = count($terms);
	 if ( $count > 0 ){
		foreach ( $terms as $term ) {
			$term->slug;
			$term_link = get_term_link( $term );
?>
	<div class="row">
		<h4 class="intro-text"><?php echo $term->name; ?><span><a href="<?php echo $term_link; ?>">Xem thêm</a></span></h4>
		<div class="col-sm-12 col-md-12">
<?php
		global $wp_rewrite;
		global $paged;
		if ( get_query_var('paged') ) $paged = get_query_var('paged');  
		if ( get_query_var('page') ) $paged = get_query_var('page');
		$posts_per_page = get_option("posts_per_page"); 
			$the_query = new WP_Query( 
			array( 'post_type' => 'san-pham',
				    'danh-muc' => $term->slug,
				 	'posts_per_page'=> -1
				) );
		$num_posts = $the_query->post_count;
		if ( $the_query->have_posts() ) : $i = 0; ?>
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<?php if( $i%3 == 0 || $i== 0) {  echo '<div class="row">'; } ?>
				<?php   
					$img_news = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_sanpham_list');
		            $img_news_src = $img_news[0];
		        ?>
				<div class="product col-sm-4 col-md-4">
					<a href="<?php echo get_permalink($post->ID); ?>">
						<?php if(has_post_thumbnail()) { ?>
							<img src="<?php echo $img_news_src;  ?>">
						<?php } else { ?>
							<img src="http://nongsannhietdoi.com/wp-content/uploads/2017/02/img-xoai.png">
						<?php } ?>
						<h4><?php echo get_the_title(); ?></h4>
					</a>
				</div>
				<?php if( ($i+1)%3 == 0 && $i!=0) {  echo '</div>'; } ?>
			<?php $i++; endwhile; ?>
			<?php wp_reset_postdata(); ?>
			<!-- show pagination here -->
		<?php else : ?>
			<!-- show 404 error here -->
		<?php endif; ?>

		</div>
	</div>
<?php  }
	}
?>