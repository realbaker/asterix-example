<?php
/**
 * Template Name: Calendar Page
 *
 * @package NWLN
 */

get_header(); ?>

<div id="content" class="content-area event-calendar">
  <div class="container">

    <div class="hero" style="background-image: url(<?php echo get_field('hero_background', '2537'); ?>)">
      <h1><?php echo get_field('hero_title', '2537'); ?></h1>
      <h2><?php the_field('hero_subtitle', '2537'); ?></h2>
      <!-- cta buttons -->
      <?php if (get_field('hero_cta_1_text', '2537')): ?>
        <a href="<?php echo get_field('hero_cta_1_link', '2537') ?>" class="button"><?php echo get_field('hero_cta_1_text', '2537') ?></a>
      <?php endif ?>
      <?php if (get_field('hero_cta_2_text', '2537')): ?>
        <a href="<?php echo get_field('hero_cta_2_link', '2537') ?>" class="button"><?php echo get_field('hero_cta_2_text', '2537') ?></a>
      <?php endif ?>
    </div>

    <div class="main-container">

      <!-- calendar and filter -->
      <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'template-parts/content', 'page-events' ); ?>
      <?php endwhile; // end of the loop. ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>
