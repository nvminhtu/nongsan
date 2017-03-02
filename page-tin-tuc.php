<?php
/**
 * Template Name: Tin tức
 *
 * This is the template that displays full width page without sidebar
 *
 * @package sparkling
 */

get_header(); ?>
<?php get_sidebar(); ?>
<div class="main-content-inner col-sm-12 col-md-12">
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

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
    $img_archive_news = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'img_archive_news');
  ?>
    
    <div class="news-item row">
      <div class="col-sm-12 col-md-4 featured">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo $img_archive_news[0]; ?>"></a>
      </div>
      <div class="col-sm-12 col-md-8">
        <a href="<?php the_permalink(); ?>"><h5><?php the_title(); ?></h5></a>
        <p><?php echo wp_trim_words( get_the_content(), 40, '...' ); ?></p>
      </div>
    </div>
   
    
  <?php endwhile; ?>
  <!-- end of the loop -->

  <!-- pagination here -->

  <?php wp_reset_postdata(); ?>

<?php else : ?>
  <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


    <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
  </div><!-- #primary -->
</div>
<?php get_footer(); ?>