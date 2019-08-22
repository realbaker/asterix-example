<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package NWLN
 */

get_header(); ?>

<div id="content" class="content-area">
  <div class="container">

    <?php
    // check if the post has a Post Thumbnail assigned to it.
    if ( has_post_thumbnail(293) ) : ?>
      <div class="featured-image">
        <?php echo get_the_post_thumbnail(293); ?>
      </div>
    <?php endif; ?>

    <div class="main-container">
      <div class="main">
        <h1 class="entry-title"><?php single_cat_title(); ?></h1>
        <?php
          $category_description = category_description();
          if (!empty($category_description)):
            echo "<div class=\"category__description\">";
            echo $category_description;
            echo "</div>";
          endif;
        ?>

        <?php echo do_shortcode('[searchandfilter id="306"]'); ?>
        <?php echo do_shortcode('[searchandfilter id="306" show="results"]'); ?>
      </div>
      <aside class="primary-sidebar">
        <?php get_template_part( 'template-parts/content', 'blocks' ); ?>
      </aside>
    </div>

  </div>
</div>

<?php get_footer(); ?>
