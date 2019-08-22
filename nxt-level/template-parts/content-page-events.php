<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package NWLN
 */
?>
<?php if(is_singular('tribe_events')) {echo '<div class="main">';} ?>
<div class="page-content">
  <div class="content-wrapper">
    <!-- intro content -->
    <script>
    // $(function() {
    //   $('.page-template-page-calendar-php  .select-dropdown').chosen({
    //     placeholder_text_single: "– Choose Host Organization –",
    //     disable_search_threshold: 10,
    //   });
    // });
    </script>

    <?php if (!is_singular( 'tribe_events' )): ?>
      <a class="anchor" id="training-top"></a>
      <div class="content-info">
        <?php
        $heading = get_field('intro_heading', '2537');
        $copy = get_field('intro_subtitle', '2537');
        ?>
        <h2><?php echo $heading; ?></h2>
        <?php echo $copy; ?>
      </div>
    <?php endif ?>

    <!-- calendar -->
    <?php the_content(); ?>

    <!-- lower blocks -->
    <?php if (!is_singular( 'tribe_events' )): ?>
      <hr/>
      <a class="anchor" id="training-bottom"></a>
      <div class="content-blocks" id="ondemand-block">

        <div class="header">
          <h2><?php echo get_field('lower_heading', '2537'); ?></h2>
          <p><?php echo get_field('lower_subtitle', '2537'); ?></p>
        </div>

        <?php if(have_rows('training_boxes', '2537')) : ?>
          <div class="training-boxes">
            <?php while(have_rows('training_boxes', '2537')) : the_row(); ?>
              <div class="training-topic">
                <div class="training-topic-icon">
                  <img src="<?php the_sub_field('box_icon') ?>" alt="<?php the_sub_field('box_headline') ?>">
                </div>
                <div class="training-topic-content">
                  <h5 class="panel-pane__heading"><?php the_sub_field('box_headline') ?></h5>
                  <p class="panel-pane__content"><?php the_sub_field('box_content') ?></p>
                  <a href="<?php the_sub_field('box_link_url') ?>"><?php the_sub_field('box_link_text') ?></a>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  
    <div class="content-footer-wrapper">
    </div>

    <!-- intro content -->
    <script>
      $(function() {
        $('.page-template-page-calendar-php  .select-dropdown').chosen({
          placeholder_text_single: "– Choose Host Organization –",
          disable_search_threshold: 10,
        });
      });
    </script>

  
  </div>
</div>
<?php if(is_singular('tribe_events')) {echo '</div>';} ?>
<?php if(is_singular('tribe_events')) : ?>
  <aside class="training-single-sidebar">
    <div class="sidebar-box sidebar-box-1">
      <div class="training-topic-head">
        <h5 class="panel-pane__heading">RECENT NEWS</h5>
      </div>
      <?php
      global $post;
      $args = array( 'posts_per_page' => 3 );
      $postslist = get_posts( $args );
      foreach ( $postslist as $post ) :
        setup_postdata( $post ); ?> 
        <div class="recent-post">
          <?php
          $thumb = get_the_post_thumbnail_url(get_the_ID(),'full');
          ?>
          <div class="custom resource-icon" style="background-image: url(<?php echo $thumb ?>);"></div>
          <div class="titles">
            <h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
            <h4><?php echo get_the_date(); ?></h4>
          </div>
        </div>
      <?php
      endforeach; 
      wp_reset_postdata();
      ?>
    </div>
    <section class="home-search-blocks">
      <?php 
      $search_rows = get_field('search_box', 5);
      $first_search_row = $search_rows[0];
      $first_search_bg = $first_search_row['search_box_background_image'];

      ?>
      <div class="search-box" style="background-image: url('<?php echo $first_search_bg['url']; ?>')">
        <div class="search-box-copy">
          <h5 class="panel-pane__heading"><?php echo $first_search_row['search_box_title'] ?></h5>
          <div class="panel-pane__content"><?php echo $first_search_row['search_box_description'] ?></div>
        </div>
        <div class="search-box-form">
          <label><?php echo $first_search_row['search_box_field_label']; ?></label>
          <div class="search-box-form-row">
            <?php echo $first_search_row['search_box_form_code']; ?>
            <?php echo $first_search_row['search_box_link_markup']; ?>
          </div>
        </div>
      </div>
    </section>
  </aside>
<?php endif; ?>

<!-- .entry-content -->