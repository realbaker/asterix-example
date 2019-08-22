<?php
/**
 * Template Name: Support Page
 */

get_header(); ?>

<div id="content" class="content-area">
  <?php get_template_part( 'template-parts/content', 'hero' ); ?>
  <div class="main-container">
    <div class="main">
      <?php while ( have_posts() ) : the_post(); ?>

        <div class="group">
          <div class="container">
            <?php the_content(); ?>
          </div>
        </div>
      
        <div class="container">
          <?php get_template_part( 'template-parts/content', 'accordion' ); ?>
        </div>
      
        <div class="group bg-dark-blue">
          <div class="container">
            <div class="section-2-intro section-intro">
              <h2 class="text-center"><?php the_field('form_title'); ?></h2>
            </div>
            <div class="flex-col-wrapper no-col-bg">
              <div class="two-column column">
                <div class="column-text">
                  <?php the_field('form_description'); ?>
                </div>
              </div>
              <div class="two-column column">
                <div class="column-text">
                  <?php $formID = get_field('form_data'); 
                  gravity_form($formID, false, false, false, false, true, 1); ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
