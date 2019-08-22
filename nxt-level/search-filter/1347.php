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

  <?php
    if (function_exists('wp_pagenavi')) {
      wp_pagenavi( array( 'query' => $query ) );
    }
  ?>

  <?php
    while ($query->have_posts()) :
      $query->the_post();
  ?>
    <div class="list__item allied-network-content">
      <?php if(get_field('lighting-basics_region')) : ?>
        <span class="list__tag list__tag--right list__tag--dark"><?php echo get_field('lighting-basics_region'); ?></span>
      <?php endif; ?>

      <h3 class="list__item--heading"><?php the_title(); ?></h3>
      <div class="allied-network-company">
        <?php if(get_field('lighting-basics_company')) : ?>
          <?php echo get_field('lighting-basics_company'); ?>
          <?php if(get_field('lighting-basics_trade_ally_type')) : ?> (<?php echo get_field('lighting-basics_trade_ally_type'); ?>)<?php endif; ?>
        <?php endif; ?>
      </div>

      <div class="entry-content allied-network">
        <div class="left">
          <?php if(get_field('lighting-basics_email')) : ?>
            <div class="allied-network-email">
              <a href="mailto:<?php echo get_field('lighting-basics_email'); ?>"><?php echo get_field('lighting-basics_email'); ?></a>
            </div>
          <?php endif; ?>
          <?php if(get_field('lighting-basics_phone_number')) : ?>
            <div class="allied-network-phone">
              <?php echo get_field('lighting-basics_phone_number'); ?>
            </div>
          <?php endif; ?>
          <?php if(get_field('lighting-basics_street_address')) : ?>
            <?php $address = get_field('lighting-basics_street_address') . ' ' . get_field('lighting-basics_city_state') . ' ' . get_field('lighting-basics_zip_code'); ?>
            <div class="allied-network-address">
              <a href="https://maps.google.it/maps?q=<?php echo $address; ?>" target="_blank" title="Open Map">
                <div class="allied-network-address-street"><?php echo get_field('lighting-basics_street_address'); ?></div>
                <div class="allied-network-address-city"><?php echo get_field('lighting-basics_city_state'); ?> <?php echo get_field('lighting-basics_zip_code'); ?></div>
              </a>
              <div class="allied-network-address-map">
                <div class="allied-network-address-iframe-wrapper">
                  <span class="caret"></span>
                  <span class="close" title="Close">&times;</span>
                  <iframe width="250" height="250" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?php echo $address; ?>&output=embed"></iframe>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div>
        <div class="right">
          <?php if(get_field('utilities_serviced')) : ?>
            <div class="allied-network-utilities">
              <span class="allied-network-utilities-title">Utilities Serviced:</span>
              <?php $utilities = get_field('utilities_serviced'); ?>
              <?php if($utilities): ?>
                <ul>
                  <?php foreach($utilities as $utility): ?>
                    <li><?php echo get_the_title($utility->ID); ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          <?php endif; ?>
          <?php
            $content = get_the_content();
            $content = str_replace('Completed training: ', '', $content);
          ?>
          <?php if(!empty($content)) : ?>
            <div class="allied-network-training">
              <div class="allied-network-training-title">Completed training:</div>
              <?php echo $content; ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </div>
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
    <p><a href="/lighting-basics-trade-allies/">View all results</a></p>
  </div>
<?php endif; ?>
