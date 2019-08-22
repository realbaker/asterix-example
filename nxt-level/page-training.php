<?php
/**
 * Template Name: Training Page
 */

get_header(); ?>

<div id="content" class="content-area">
  <?php get_template_part( 'template-parts/content', 'hero-training' ); ?>

    <div class="main-container">
      <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php
          if( have_rows('training_page_sections') ):
            while ( have_rows('training_page_sections') ) : the_row();

              if( get_row_layout() == 'training_text_block' ): ?>

                <section class="group text-block">
                  <div class="container text-center">
                    <div class="section-intro">
                      <h2 class="text-center"><?php the_sub_field('training_text_block_title'); ?></h2>
                    </div>
                    <div class="section-copy narrow">
                      <?php the_sub_field('training_text_block_copy'); ?>
                    </div>
                  </div>
                </section>
              <?php
              elseif( get_row_layout() == 'training_three_column_block' ): ?>

                <section class="group bg-<?php the_sub_field('training_3col_background_color'); ?>">
                  <div class="container">
                    <div class="section-intro">
                      <h2 class="text-center"><?php the_sub_field('training_3col_title'); ?></h2>
                    </div>
                    <div class="section-copy narrow text-center">
                      <?php the_sub_field('training_3col_copy'); ?>
                    </div>
                    <?php if (have_rows('training_3col_columns')) : ?>
                      <div class="flex-col-wrapper wrap-rows">
                        <?php while ( have_rows('training_3col_columns') ) : the_row(); ?>
                          <div class="three-column column box-shadow-radius">
                            <h3 class="text-center"><?php the_sub_field('training_3col_column_title'); ?></h3>
                            <hr />
                            <div><?php the_sub_field('training_3col_column_content'); ?>
                            <div style="clear:both;"></div>
                            </div>
                          </div>
                        <?php endwhile; ?>
                      </div>
                    <?php endif; ?>
                  </div>
                </section>
              <?php
              elseif( get_row_layout() == 'training_events' ): 
                $event_cat = get_sub_field('training_event_category');
              ?>
                <div class="container group">
                  <div class="section-intro">
                    <h2 class="text-center"><?php the_sub_field('training_events_title'); ?></h2>
                  </div>
                  
                <!-- EVENTS -->
                <?php
                  date_default_timezone_set("America/Los_Angeles");
                  $today = date('Y-m-d H:i:s');
                  $args = array(
                    'post_type' => 'tribe_events',
                    'posts_per_page' => -1,
                    'tax_query' =>  array(
                      array(
                        'taxonomy'  => 'tribe_events_cat',
                        'field'     => 'term_id',
                        'terms'     => array($event_cat)
                      )
                    ),
                    'meta_key'      => '_EventStartDate',
                    'orderby'       => 'meta_value',
                    'order'         => 'ASC',
                    'meta_query' => array(
                      array(
                        'key' => '_EventStartDate',
                        'meta-value' => 'meta_value',
                        'value' => $today,
                        'compare' => '>='
                      )
                    )
                  );
                $eventslist = get_posts($args);
                  
                if(count($eventslist) == 0) {
                  echo '<p class="text-center">There are no training events currently scheduled. Please check back soon.</p>';
                } else {
                  foreach ($eventslist as $post) :
                    setup_postdata($post); 
                    $venue_details = tribe_get_venue_details($post->ID);
                    $venue_name = '';
                    if (array_key_exists('linked_name', $venue_details)) {
                      $venue_name = $venue_details['linked_name'];
                    }
                  ?>
                    <div class="event-items narrow">
                      <!-- Event Title -->
                      <div class="tribe-events-list-event-title">
                        <a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">
                          <?php the_title(); ?>
                        </a>
                        <?php if(get_the_excerpt() != '') : ?>
                        <p><?php echo get_excerpt(85); ?></p>
                        <a class="read-more" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>" rel="bookmark">Read More</a>
                        <?php endif; ?>
                      </div>
                      <!-- Schedule & Recurrence Details -->
                      <div class="tribe-event-schedule-details">
                        <?php //echo tribe_events_event_schedule_details() ?>
                        <?php echo tribe_get_start_time ( $post->ID, 'D j M Y'); ?> @
                        <br/>
                        <?php echo tribe_get_start_date($post->ID, false, $format = 'g:i a' ) . ' - ' . tribe_get_end_date($post->ID, false, $format = 'g:i a'); ?>
                      </div>
                      <?php /*if ( $venue_name ) : ?>
                      <!-- Venue Display Info -->
                      <div class="tribe-events-venue-details" style="display: inline-block;">
                      <?php
                        //echo $venue_details[0]['linked_name'];
                        echo $venue_name;
                      ?>
                      </div> <!-- .tribe-events-venue-details -->
                      <?php endif;*/ ?>
                      <div class="event-button">
                        <a href="<?php echo esc_url( tribe_get_event_link() ); ?>" class="tribe-events-read-more button orange-button" rel="bookmark"><?php esc_html_e( 'View', 'the-events-calendar' ) ?></a>
                      </div>
                    </div>
                  <?php
                  endforeach;
                }
                  wp_reset_postdata(); ?>
             
                </div>
              <?php  
              elseif(get_row_layout() == 'training_divider_line') :
                echo '<div class="container"><div class="narrow"><hr></div></div>';
              endif;

            endwhile;
          endif;
          ?>
        
          <?php if( have_rows('training_footer_sections') ):
            while ( have_rows('training_footer_sections') ) : the_row();

              if( get_row_layout() == 'training_footer_cta_block' ): 
                $cta_bg = get_sub_field('training_footer_cta_block_bg_color');
                $cta_copy = get_sub_field('training_footer_cta_block_copy');
                $cta_btn = get_sub_field('training_footer_cta_block_button'); ?>
            
                <section class="group footer-cta-block bg-<?php echo $cta_bg; ?>">
                  <div class="container">
                    <div class="text-center <?php if(!$cta_copy){echo 'footer-cta-flex';} ?>">
                      <div class="section-intro">
                        <h2 class="text-center"><?php the_sub_field('training_footer_cta_block_title'); ?></h2>
                      </div>
                      <?php if($cta_copy): ?>
                        <div class="section-copy narrow">
                          <?php echo $cta_copy; ?>
                        </div>
                      <?php endif; ?>

                      <?php if($cta_btn): ?>
                      <div class="ctas">
                          <a href="<?php echo $cta_btn['training_footer_cta_block_button_url']; ?>" class="button <?php if($cta_bg == 'off-white'){echo 'orange-button';} else {echo 'white-outline';} ?>"><?php echo $cta_btn['training_footer_cta_block_button_text']; ?></a>
                      </div>
                    <?php endif; ?>
                    </div>
                  </div>
                </section>
              <?php
              endif;

            endwhile;
          endif;
          ?>
        
        <?php endwhile; // end of the loop. ?>
      </div>
    </div>

</div>

<?php get_footer(); ?>
