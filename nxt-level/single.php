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
  <div class="container">

    <?php
    // check if single tool post
    if ( is_singular( 'resources' ) ) :
      get_template_part( 'template-parts/content', 'single-tool-hero' );
    // check if the post has a Post Thumbnail assigned to it.
    elseif ( has_post_thumbnail(293) ) : ?>
      <div class="featured-image">
        <?php echo get_the_post_thumbnail(293); ?>
      </div>
    <?php endif; ?>

    <div class="main-container">
      <div class="main">
        <?php while ( have_posts() ) : the_post();
          if ( is_singular( 'resources' ) ) :
            if ( get_field('content_type_toggle') == 'true') :
              get_template_part( 'template-parts/content', 'single-tool-flex' );
            else :
              get_template_part( 'template-parts/content', 'single-tool' );
            endif;
          else :
            get_template_part( 'template-parts/content', 'single' );
          endif;
          
          if(get_field('embed_code')) : ?>
            <div class="embed-copy">
              <a class="embed-toggle button">Embed this comparison tool on your site</a>
              <div class="embed-code">
                <textarea readonly rows="10" cols="60" resize><?php the_field('embed_code'); ?></textarea>
              </div>
            </div>
          <?php endif;
        endwhile; // end of the loop. ?>
      </div>

      <!-- sidebar -->
      <!-- check if single resource post  -->
      <?php if( is_singular( 'resources' ) ) : ?>
 
      <!-- if on single resource post -->
      <?php else : ?>
        <aside class="primary-sidebar">
          <?php get_template_part( 'template-parts/content', 'blocks' ); ?>
        </aside>
      <?php endif; ?>
    </div>

  </div>
</div>

<script type="text/javascript">
  $('a.embed-toggle').click(function(event) {
    $('.embed-copy .embed-code').slideToggle(400);
  });
</script>

<?php get_footer(); ?>
