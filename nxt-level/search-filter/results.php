<?php
/**
 * Search & Filter Pro
 *
 * Sample Results Template
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

if ( $query->have_posts() ) { ?>

<?php
  if (function_exists('wp_pagenavi')) {
    wp_pagenavi( array( 'query' => $query ) );
  }
?>

<ul class="list__container tools-page">
<?php
  while ($query->have_posts()) {
    $query->the_post();
    $category = wp_get_post_terms(get_the_ID(), 'tools-category')[0];
?>
  <li class="list__item">
    <span class="list__item--tag"><?php echo $category->name; ?></span>
    <?php if ( get_field('external_link') != "" ) : ?>
      <h3 class="list__item--heading"><a href="<?php echo get_field('external_link'); ?>" target="_blank" ><?php echo the_title(); ?></a></h3>
    <?php else: ?>
      <h3 class="list__item--heading"><?php echo the_title(); ?></h3>
    <?php endif; ?>
    <?php echo the_content(); ?>
    <?php if ( get_field('download_file') != "" ) : ?>
      <a href="<?php echo get_field('download_file'); ?>" target="_blank" class="list__item--btn">Download</a>
    <?php endif; ?>
    <?php if ( get_field('external_link') != "" ) : ?>
      <a href="<?php echo get_field('external_link'); ?>" target="_blank" class="list__item--btn">Link</a>
    <?php endif; ?>
  </li>
<?php
	}
?>
</ul>

<?php
  if (function_exists('wp_pagenavi')) {
    wp_pagenavi( array( 'query' => $query ) );
  }
?>

<?php
  } else {
    echo "No Results Found";
  }
?>
