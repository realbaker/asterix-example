<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package NWLN
 */

get_header(); ?>

<div id="content" class="content-area">
  <?php get_template_part( 'template-parts/content', 'hero' ); ?>
  <div class="container">

    <?php
      if(isset($_GET['form_submit']) && $_GET['form_submit'] == 'true') : ?>
        <div class="alert alert--success">Thank you! You are now subscribed to the Light Source newsletter.</div>
      <?php endif; ?>

    <div class="main-container">
      <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', 'page' ); ?>
        <?php endwhile; // end of the loop. ?>
      </div>
      <?php if ((!is_page(106)) && (!is_page(293)) && (!is_page(413)) && (!is_page(346))) : ?>
        <aside class="primary-sidebar">
          <?php get_template_part( 'template-parts/content', 'blocks' ); ?>
        </aside>
      <?php endif; ?>
    </div>

  </div>
</div>

<?php get_footer(); ?>
