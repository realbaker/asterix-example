<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package NWLN
 */
?>

<div class="page-content">
  <?php $hero_subhead = get_field('page_hero_intro_paragraph'); ?>
  <div class="content-wrapper group <?php if(!$hero_subhead){echo 'hero-title-only';} ?>">
    <!-- pull in content -->
    <?php the_content(); ?>
    <!-- style resources page filters -->
    <script type="text/javascript">
      $(function() {
        jcf.replaceAll();
      });
      // call function again when submitting ajax requests
      $(document).ajaxComplete(function() {
        jcf.replaceAll();
      });

      //for gravity view search inputs
      $('input#gv_search_2132').attr("placeholder", "Search for a company, individual or utility");
      $('select#search-box-filter_184 > option:first').text('Utility Territory');
    </script>
  </div>
  
  <!-- news page -->
  <?php 
    if(is_page(293) && (get_field('newsletter_cta_box_title') || get_field('newsletter_cta_box_button_text'))) : 
      $bgImg = get_field('newsletter_cta_box_background_image'); ?>

      <div class="search-box news-cta-box" style="background-image: url(<?php echo $bgImg; ?>)">
        <div class="search-box-copy">
          <h5 class="panel-pane__heading"><?php the_field('newsletter_cta_box_title') ?></h5>
          <div class="panel-pane__content"><?php the_field('newsletter_cta_box_subtitle') ?></div>
        </div>
        <div class="news-cta-button">
        <?php if(get_field('newsletter_sign_up')) : ?>
          <a href="#newsletter-popup" class="button"  rel="modal:open">
            <?php the_field('newsletter_cta_box_button_text'); ?>
          </a>
        <?php else : ?>
          <a href="<?php the_field('newsletter_cta_box_button_link'); ?>" class="button">
            <?php the_field('newsletter_cta_box_button_text'); ?>
          </a>
        <?php endif; ?>
        </div>
      </div>

      <!-- utilities page -->
      <?php elseif((is_page(413) && (get_field('resources_box_title')) || get_field('featured_resources'))) :
        $bgImg = get_field('resources_box_background');
        $featResources = get_field('featured_resources'); ?>

        <div class="search-box news-cta-box" style="background-image: url(<?php echo $bgImg; ?>)">
        <div class="search-box-copy">
          <h5 class="panel-pane__heading"><?php the_field('resources_box_title') ?></h5>
          <div class="panel-pane__content">
            <p><?php the_field('resources_box_subtitle') ?> <a href="<?php the_field('resources_box_link') ?>"><?php the_field('resources_box_link_text') ?></a></p>
          </div>
        </div>
        <div class="featured-resources-list">
<!--           <?php if($featResources) : ?>
            <h3>Featured Resources:</h3>
            <ul>
              <?php foreach ($featResources as $post) :
                setup_postdata($post); ?>
                <li>
                  <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
              <?php endforeach; wp_reset_postdata(); ?>
            </ul>
          <?php endif; ?> -->

          <!-- most recent resources -->
          <?php
            $args = array(
              'post_type' => 'resources',
              'orderby' => 'date',
              'order' => 'DESC',
              'posts_per_page' => 2
            );
            $resources_query = new WP_Query($args);

            if($resources_query->have_posts()) : ?>
              <h3>Featured Resources:</h3>
              <ul>
                <?php while($resources_query->have_posts()) : $resources_query->the_post(); ?>
                  <li>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                  </li>
                <?php endwhile; wp_reset_postdata(); ?>
              </ul>
            <?php endif; ?>

        </div>
      </div>

      <?php elseif ((is_page(346) && get_field('resources_field_group_clone'))) :
      $bgImg = get_field('search_box_background_image'); ?>

      <div class="search-box" style="background-image: url(<?php echo $bgImg['url']; ?>)">
        <div class="search-box-copy">
          <h5 class="panel-pane__heading"><?php the_field('search_box_title') ?></h5>
          <div class="panel-pane__content"><?php the_field('search_box_description') ?></div>
        </div>
        <div class="search-box-form">
          <label><?php the_field('search_box_field_label'); ?></label>
          <div class="search-box-form-row">
            <?php the_field('search_box_form_code'); ?>
            <?php the_field('search_box_link_markup'); ?>
          </div>
        </div>
      </div>

    <?php endif; ?>
</div>

<?php
  $tab_title = get_field('tab_title');
  $tab_title2 = get_field('tab_title2');
  $tab_title3 = get_field('tab_title3');
  $tab_body = get_field('tab_body');
  $tab_body2 = get_field('tab_body2');
  $tab_body3 = get_field('tab_body3');
  $tab_header = get_field('tabbed_title');
?>

<?php if($tab_body || $tab_body2 || $tab_body3): ?>
  <div id="tabs-wrapper">
    <?php if($tab_title): ?>
      <h2><?php print $tab_header; ?></h2>
    <?php endif; ?>
    <div id="tabs">
      <ul id="tab-nav">
      <?php if($tab_title): ?>
        <li><a href="#tabs-1"><?php print $tab_title; ?></a></li>
      <?php else: ?>
        <li><a href="#tabs-1">Tab 1</a></li>
      <?php endif; ?>
      <?php if($tab_title2): ?>
        <li><a href="#tabs-2"><?php print $tab_title2; ?></a></li>
      <?php else: ?>
        <li><a href="#tabs-2">Tab 2</a></li>
      <?php endif; ?>
      <?php if($tab_title3): ?>
        <li><a href="#tabs-3"><?php print $tab_title3; ?></a></li>
      <?php else: ?>
        <li><a href="#tabs-3">Tab 3</a></li>
      <?php endif; ?>
      </ul>
      <?php if($tab_body): ?>
        <div id="tabs-1"><?php print $tab_body; ?></div>
      <?php endif; ?>
      <?php if($tab_body2): ?>
        <div id="tabs-2"><?php print $tab_body2; ?></div>
      <?php endif; ?>
      <?php if($tab_body2): ?>
        <div id="tabs-3"><?php print $tab_body3; ?></div>
      <?php endif; ?>
    </div>
  </div>
<?php endif; ?>
<!-- .entry-content -->