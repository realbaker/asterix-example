<?php
/**
 * Template Name: Lighting Comparison Embed
 *
 * @package NWLN
 */

get_header(); ?>

<div id="content" class="content-area">
  <div class="container">
    <div class="main-container">
      <div class="main main--full">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', 'page' ); ?>

          <?php if(get_field('embed_code')) : ?>
            <div class="embed-copy">
              <a class="embed-toggle button">Embed this comparison tool on your site</a>
              <div class="embed-code">
                <textarea readonly rows="10" cols="60" resize><?php the_field('embed_code'); ?></textarea>
              </div>
            </div>
          <?php endif; ?>
        <?php endwhile; // end of the loop. ?>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $('a.embed-toggle').click(function(event) {
    $('.embed-copy .embed-code').slideToggle(400);
  });
</script>

<?php get_footer(); ?>