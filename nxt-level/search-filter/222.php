<?php
/**
 * Search & Filter Pro
 *
 * Field Stories Template
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

<ul class="list__container field-stories">
<?php
  while ($query->have_posts()) {
    $query->the_post();
?>
    <li class="list__item">
      <div class="list__item--img"><?php the_post_thumbnail(); ?></div>
      <h2 class="list__item--heading"><?php echo the_title(); ?></h2>
      <?php echo the_content(); ?>
      <?php if($download_file = get_field('download_file')) : ?>
        <a href="<?php echo $download_file; ?>" target="_blank" class="list__item--btn">Download</a>
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
