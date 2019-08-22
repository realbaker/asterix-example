<?php
/**
 * Search & Filter Pro
 *
 * Conduit Feed Template
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
  ?>
    <div class="list__item">
      <h3 class="list__item--heading"><a href="<?php echo get_field('article_url'); ?>" target="_blank"><?php the_title(); ?></a></h3>

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

<?php else: ?>
  <div class="no-results">
    <h2>No Results</h2>
    <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
  </div>
<?php endif; ?>
