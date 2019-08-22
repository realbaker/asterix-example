<?php
/**
 * Template Name: Full Page Template
 *
 * @package NWLN
 */

get_header(); ?>

<div id="content" class="content-area">
  <div class="container">

    <?php
    // check if the post has a Post Thumbnail assigned to it.
    if ( has_post_thumbnail() ) : ?>
      <div class="featured-image">
        <?php the_post_thumbnail(); ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php
            $header_text = get_field('header_text');
            $link_1_title = get_field('link_1_title');
            $link_1 = get_field('link_1');
            $link_2_title = get_field('link_2_title');
            $link_2 = get_field('link_2');
          ?>
          <div class="header-info-wrap">
            <div class="header-info-body">
              <?php if($header_text): ?>
                <div class="header-text">
                  <?php print $header_text; ?>
                </div>
              <?php endif; ?>
              <?php if($link_1 || $link_2): ?>
                <div class="header-links">
                  <?php if($link_1): ?>
                    <a href="<?php print $link_1; ?>">
                      <?php if($link_1_title): ?>
                        <?php print $link_1_title; ?>
                      <?php else: ?>
                        <?php print $link_1; ?>
                      <?php endif; ?>
                    </a>
                  <?php endif; ?>
                  <?php if($link_1): ?>
                    <a href="<?php print $link_2; ?>">
                      <?php if($link_2_title): ?>
                        <?php print $link_2_title; ?>
                      <?php else: ?>
                        <?php print $link_2; ?>
                      <?php endif; ?>
                    </a>
                  <?php endif; ?>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; // end of the loop. ?>
      </div>
    <?php endif; ?>

    <div class="main-container">
      <div class="main main--full">
        <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', 'page' ); ?>
          <?php get_template_part( 'template-parts/content', 'blocks' ); ?>
        <?php endwhile; // end of the loop. ?>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>
