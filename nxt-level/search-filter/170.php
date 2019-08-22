<?php
/**
 * Search & Filter Pro
 *
 * resources Filter
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

<div class="results-count">
  <?php 
    echo $query->found_posts.' Results';
  ?>
</div>

<ul class="list__container tools-page">
<?php
  while ($query->have_posts()) {
    $query->the_post();
    $resource_categories = wp_get_object_terms(get_the_ID(), 'resource_type');
?>
  <li class="list__item">
    <?php
    // check if assigned to a category
    if($resource_categories) :
      //get primary term
      $primary_term = new WPSEO_Primary_Term('resource_type', get_the_ID());
      $primary_term = $primary_term->get_primary_term();

      // check if has primary term
      if ( $primary_term ) :
        // get term object for primary term
        $primary_term = get_term($primary_term);
        // get primary term id to use elsewhere
        $resource_type_id = $primary_term->term_id;
        // get color field based on term ID
        $resource_color = get_field('resource_type_color', 'term_'.$resource_type_id);

      // if no primary term assigned
      else:
        // get term id(s), if assigned
        // loop through categories
        foreach($resource_categories as $resource_category) :
          $resource_type_id = $resource_category->term_id;
        endforeach;
        // doesn't have primary category, default to last category
        $resource_color = get_field('resource_type_color', 'term_'.$resource_type_id);
      endif;

    // if no categories assigned
    else:
      // default color
      $resource_color = '#4a494a';
    endif;

    // featured image
    if(has_post_thumbnail( get_the_ID() )):
      // get post's thumbnail
      $feat_image = wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>

      <!-- put it all together, thumbnail with color from custom field -->
      <a class="resource-image" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $feat_image; ?>'); border-bottom: 5px solid <?php echo $resource_color; ?>;"></a>

    <!-- if no featured image, but has category -->
    <?php elseif(!has_post_thumbnail( get_the_ID() ) && $resource_categories):
      // defaults per category
      $resource_default_image = get_field('default_resource_type_featured_image', 'term_'.$resource_type_id); ?>
      <!-- thumbnail with category defaults -->
      <a class="resource-image default" href="<?php the_permalink(); ?>" style="background-color: <?php echo $resource_color; ?>; border-bottom: 5px solid <?php echo $resource_color; ?>;"></a>
    
    <!-- if no featured image or category -->
    <?php elseif(!has_post_thumbnail( get_the_ID() ) && !$resource_categories) : ?>
      <!-- thumbnail with category defaults -->
      <a class="resource-image default no-cat" href="<?php the_permalink(); ?>" style="background-color: <?php echo $resource_color; ?>; border-bottom: 5px solid <?php echo $resource_color; ?>;"></a>
    <?php endif; ?>

    <!-- resource tag(s) -->
    <div class="content-tags">
      <?php foreach($resource_categories as $resource_category) : 
      // get term id
      $resource_type_id = $resource_category->term_id;
          // get term slug
      $resource_type_slug = $resource_category->slug;
          // get field based on term ID
      $resource_color = get_field('resource_type_color', 'resource_type_'.$resource_type_id); ?>
      <!-- colored term name -->
      <a class="list__item--tag" href="<?php home_url(); ?>/resources/?_sft_resource_type=<?php echo $resource_type_slug; ?>" style="color: <?php echo $resource_color; ?>;">
        <?php echo $resource_category->name; ?>
      </a>
    <?php endforeach; ?>
    </div>

    <!-- lower content -->
    <div class="content-wrap">
      <!-- resource heading -->
      <h3 class="list__item--heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      <!-- post date -->
      <p class="date">
        <?php echo get_the_date(); ?>
      </p>
      <!-- resource link -->
      <a href="<?php echo get_permalink(); ?>" class="read-more">READ MORE</a>
    </div>
    <?php
    $downloadFile = get_field('download_file');
    if($downloadFile){
      echo '<a class="link-bar" href="'.$downloadFile.'" target="_blank">Download Now</a>';
    }
    ?>
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
