<?php
/**
 * Search & Filter Pro
 *
 * Posts Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2014 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() ) : ?>

  <?php
    if (function_exists('wp_pagenavi')) {
      wp_pagenavi( array( 'query' => $query ) );
    }
  ?>

  <?php
    while ($query->have_posts()) :
      $query->the_post();
      $post_author = (get_field('post_author')) ? get_field('post_author') : 'General Contributor';
  ?>
    <div class="list__item">
      <span class="list__item--tag"><?php echo get_the_date(); ?></span>
      <h3 class="list__item--heading"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
      <div class="list__item--author"><?php echo $post_author; ?></div>

      <div class="entry-content">
        <?php the_excerpt(); ?>
      </div><!-- .entry-content -->
    </div><!-- #post-## -->
  <?php endwhile; ?>

  <?php
    if (function_exists('wp_pagenavi')) {
      wp_pagenavi( array( 'query' => $query ) );
    }
  ?>

<?php endif; ?>
