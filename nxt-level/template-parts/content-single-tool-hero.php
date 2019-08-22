<?php
/**
 * The template used for displaying hero content in single resources posts
 *
 * @package NWLN
 */
?>

<?php
  // get which category(ies) post belongs to
  $resource_categories = wp_get_object_terms(get_the_ID(), 'resource_type');

  //get primary term
  $primary_term = new WPSEO_Primary_Term('resource_type', get_the_ID());
  $primary_term = $primary_term->get_primary_term();
  $primary_term = get_term($primary_term);

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
      // get color field based on term ID
      $resource_icon = get_field('resource_icon', 'term_'.$resource_type_id);

    // if no primary term assigned
    else:
      // get term id(s), if assigned
      // loop through categories
      foreach($resource_categories as $resource_category) :
        $resource_type_id = $resource_category->term_id;
      endforeach;
      // doesn't have primary category, default to last category
      $resource_color = get_field('resource_type_color', 'term_'.$resource_type_id);
      // get color field based on term ID
      $resource_icon = get_field('resource_icon', 'term_'.$resource_type_id);
    endif;

  // if no categories assigned
  else:
    // default color
    $resource_color = '#57575c';
  endif;
?>

<!-- get default icon for post's category -->
<?php if(isset($_GET['resource_icon'])) : ?>
  <div class="tool-single-hero" style="background-image: url(<?php echo $resource_icon; ?>); background-color: <?php echo $resource_color; ?>;">
<?php else : ?>
  <div class="tool-single-hero" style="background-color: <?php echo $resource_color; ?>;">
<?php endif; ?>
  <!-- loop through categories -->
  <?php
    $i = 0;
    foreach($resource_categories as $resource_category) :
      // get ID of category(ies)
      $resource_type_id = $resource_category->term_id;
      // get slug of categories
      $resource_type_slug = $resource_category->slug;
      //get resource category names
      $resource_category_name = $resource_category->name;
  ?>

    <!-- loop through category names, display -->
    <a href="<?php home_url(); ?>/resources/?_sft_resource_type=<?php echo $resource_type_slug; ?>"><?php echo $resource_category_name; ?></a>
  <?php
    $i++;
    endforeach;
  ?>

  <!-- display single resource title -->
  <h1><?php the_title(); ?></h1>
</div>