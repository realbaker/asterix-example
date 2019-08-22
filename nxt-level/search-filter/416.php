<?php
/**
 * Search & Filter Pro
 *
 * Utility Programs Network Template
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

  <div class="results-count">
    <?php 
      echo $query->found_posts.' Results';
    ?>
  </div>

  <ul class="list__container tools-page">
    <?php
      while ($query->have_posts()) :
        $query->the_post();
        global $post;
    ?>
      <li class="list__item">
        
        <?php 
          $utility_image = get_field('featured_image');
        ?>

        <!-- featured image -->
        <?php if ($utility_image) : ?>
          <div class="utility-image" style="background-image: url(<?php echo $utility_image; ?>)">

          </div>
        <?php else : ?>
          <div class="utility-image default">

          </div>
        <?php endif; ?>

        <!-- <?php if(get_field('utility_region')) : ?>
          <span class="list__tag list__tag--right list__tag--dark"><?php echo get_field('utility_region'); ?></span>
        <?php endif; ?> -->

        <div class="content-wrap">
          <h3 class="list__item--heading"><?php the_title(); ?></h3>
          <div class="entry-content">
            <!-- <h3>Contact Information</h3> -->

            <!-- address -->
            <p class="address"><?php echo get_field('utility_address') . " " . get_field('utility_city-state') . " " . get_field('utility_zip-code'); ?></p>

            <!-- phone number -->
            <?php if(get_field('utility_phone-number')) : ?>
              <p class="contacts" href="<?php echo get_field('utility_phone-number'); ?>">
                Phone: <a href="tel:<?php echo get_field('utility_phone-number'); ?>"><?php echo get_field('utility_phone-number'); ?></a>
              </p>
            <?php endif; ?>

            <!-- content -->
            <?php if (get_field('utility_contact_name')) : ?>
              <p>Contact: <b><?php the_field('utility_contact_name'); ?></b></p>
            <?php endif; ?>
          </div><!-- .entry-content -->
          
          <!-- contact button -->
          <?php if(get_field('utility_email_address')) : ?>
            <a class="contact-button utility-contact-button" data-variable="<?php the_title(); ?>" href="/utility-contact-form/?utility=<?php echo $post->post_name; ?>">Contact Us</a>
          <?php endif; ?>


        </div>

        <!-- visit website -->
        <?php if(get_field('utility_website')) : ?>
          <a class="list__item--btn utility-website" data-variable="<?php the_title(); ?>" href="<?php echo get_field('utility_website'); ?>" target="_blank">Visit Website</a>
        <?php endif; ?>

      </li><!-- #post-## -->
    <?php endwhile; ?>
  </ul>

  <?php
    if (function_exists('wp_pagenavi')) {
      wp_pagenavi( array( 'query' => $query ) );
    }
  ?>

<?php else: ?>
  <div class="no-results">
    <h2>No Results</h2>
    <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
    <p><a href="/utility-programs/">View all results</a></p>
  </div>
<?php endif; ?>
