<?php
/**
 * Template Name: Low Watt T8 Page
 *
 * @package NWLN
 */

get_header('lowwatt'); ?>

<div id="content" class="content-area">
  <div class="container">

    <?php
    // check if the post has a Post Thumbnail assigned to it.
    if ( has_post_thumbnail() ) : ?>
      <div class="featured-image">
        <?php the_post_thumbnail(); ?>
      </div>
    <?php endif; ?>

    <?php
      if(isset($_GET['form_submit']) && $_GET['form_submit'] == 'true') : ?>
        <div class="alert alert--success">Thank you! You are now subscribed to the Light Source newsletter.</div>
      <?php endif; ?>

    <div class="main-container">
      <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', 'page-lowwatt' ); ?>
        <?php endwhile; // end of the loop. ?>
      </div>
      <aside class="primary-sidebar">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', 'blocks-lowwatt' ); ?>
        <?php endwhile; // end of the loop. ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', 'blocks-lowwatt-video' ); ?>
        <?php endwhile; // end of the loop. ?>
        <?php get_template_part( 'template-parts/content', 'blocks' ); ?>
      </aside>
    </div>

  </div>
</div>

<?php get_footer(); ?>
