<div class="content-blocks">
  <?php
  // If is a single post page or category page
  if(is_single() || is_category() || is_home()) :
    $connected_items = '293'; // news page id
  endif;

  // Find connected content blocks
  // IF NOT SINGLE NEWS POST
  if (!is_single()) :
    $connected_items_var = (isset($connected_items)) ? $connected_items : get_queried_object();

    $connected = get_posts(array(
      'connected_type' => 'blocks_to_pages',
      'connected_items' => $connected_items_var,
      'nopaging' => true,
      'suppress_filters' => false
    ));
    
    foreach($connected as $block) :

    $block_heading = get_field('block_heading', $block->ID);
    $block_color = get_field('block_color', $block->ID);
    $block_copy = get_field('block_copy', $block->ID);
    $block_background = get_field('block_background_image', $block->ID);
    $block_link_markup = get_field('block_link_markup', $block->ID);
    $block_css_class = get_field('block_custom_css_class', $block->ID);

    $block_background_output = ($block_background) ? ' style="background-image:url('.$block_background.');"' : '';
    ?>

    <div class="panel-pane panel-pane--<?php echo sizeof($connected) ?> <?php echo $block_css_class; ?> <?php echo $block_color; ?>"<?php echo $block_background_output; ?>>
      <?php if($block_heading) : ?>
        <div class="panel-pane__heading"><?php echo $block_heading; ?></div>
      <?php endif; ?>
      <div class="panel-pane__content"><?php echo $block_copy; ?></div>
      <?php if($block_link_markup) : ?>
        <?php echo $block_link_markup; ?>
      <?php endif; ?>
    </div>

  <?php endforeach; ?>
  <!-- IF SINGLE NEWS POST -->
  <?php else : ?>
    <!-- local training box -->
    <div class="sidebar-box sidebar-box-2">
      <div class="training-topic-head">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calendar-icon.png" alt="Local Training" />
        <h5 class="panel-pane__heading">LOCAL TRAINING</h5>
      </div>
      <div class="training-topic-content">
        <p class="panel-pane__content">Check the calendar to find in-person trainings in near you.</p>
        <a href="/training">View Calendar</a>
      </div>
    </div>
    <!-- find network -->
    <section class="home-search-blocks">
      <?php if (have_rows('search_box', 5)) : ?>
        <div class="search-boxes">
          <?php 
          $i = 1;
          while ( have_rows('search_box', 5) ) : the_row(); 
          $bgImg = get_sub_field('search_box_background_image');
          ?>
            <div class="search-box search-box-<?php echo $i; ?>" style="background-image: url('<?php echo $bgImg['url']; ?>')">
              <div class="search-box-copy">
                <h5 class="panel-pane__heading"><?php the_sub_field('search_box_title') ?></h5>
                <div class="panel-pane__content"><?php the_sub_field('search_box_description') ?></div>
              </div>
              <div class="search-box-form">
                <label><?php the_sub_field('search_box_field_label'); ?></label>
                <div class="search-box-form-row">
                  <?php the_sub_field('search_box_form_code'); ?>
                  <?php the_sub_field('search_box_link_markup'); ?>
                </div>
              </div>
            </div>
          <?php 
          $i++;
          endwhile; ?>
        </div>
      <?php endif; ?>
    </section>
  <?php endif; ?>


</div>
