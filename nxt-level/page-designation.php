<?php
/**
 * Template Name: Individual Designation
 */

get_header(); ?>

<div id="content" class="content-area">
  <?php get_template_part( 'template-parts/content', 'hero-designation' ); ?>

  <div class="main-container">
    <div class="main">
      <?php while ( have_posts() ) : the_post(); ?>

      <section class="section-1 group">
        <div class="container">
          <div class="section-1-intro">
            <h2><?php the_field('designation_section_1_title'); ?></h2>
            <p><?php the_field('designation_section_1_text'); ?></p>
          </div>
          <?php
          if( have_rows('designation_section_1_columns') ):
            echo '<div class="section-1-columns flex-col-wrapper">';
            while ( have_rows('designation_section_1_columns') ) : the_row(); ?>
              <div class="two-column column box-shadow-radius">
                <div class="column-intro">
                  <h3 class="text-center"><?php the_sub_field('designation_section_1_column_title'); ?></h3>
                  <p class="text-center"><?php the_sub_field('designation_section_1_column_intro_text'); ?></p>
                </div>
                <hr />
                <?php
                if( have_rows('designation_section_1_column_list') ):
                echo '<ul class="checkmark-list">';
                  while ( have_rows('designation_section_1_column_list') ) : the_row(); ?>
                    <li><strong><?php the_sub_field('designation_section_1_list_item_title'); ?></strong><br /><?php the_sub_field('designation_section_1_list_item_description'); ?></li>
                <?php
                  endwhile;
                echo '</ul>';
                endif;
                ?>
                <?php
                $buttons = get_sub_field('designation_section_1_column_button');	
                if( $buttons ): ?>
                  <div class="column-footer">
                    <a class="button orange-button" href="<?php echo $buttons['designation_section_1_button_link']; ?>"><?php echo $buttons['designation_section_1_button_text']; ?></a>
                  </div>
                <?php endif; ?>
              </div>
          <?php   
          endwhile;
          echo '</div>';
        endif;
        ?>
        </div>
      </section>

      <section class="section-2 bg-dark-blue group">
        <div class="container">
          <div class="section-2-intro section-intro">
            <h2 class="text-center"><?php the_field('designation_section_2_title'); ?></h2>
            <p class="text-center"><?php the_field('designation_section_2_text'); ?></p>
          </div>
          <?php
          if( have_rows('designation_section_2_columns') ):
            echo '<div class="section-2-columns flex-col-wrapper">';
            while ( have_rows('designation_section_2_columns') ) : the_row(); ?>
              <div class="three-column column box-shadow-radius">
                <h3 class="text-center"><?php the_sub_field('designation_section_2_column_title'); ?></h3>
                <hr />
                <div><?php the_sub_field('designation_section_2_column_text'); ?></div>
              </div>
          <?php   
          endwhile;
          echo '</div>';
        endif;
        ?>
          <div class="section-2-closing section-closing text-center">
            <p><?php the_field('designation_section_2_closing'); ?></p>
          </div>
        </div>
      </section>
      
      <section class="group">
        <div class="container">
          <div class="section-3">
            <div class="section-intro">
              <h2 class="text-center"><?php the_field('designation_section_3_title'); ?></h2>
              <p class="text-center"><?php the_field('designation_section_3_text'); ?></p>
            </div>
            <div class="section-3-columns flex-col-wrapper">
              <?php
              $columns = get_field('designation_section_3_columns');
              $first_col = $columns[0];
              $second_col = $columns[1];
              ?>
              <div class="three-column column column-large column-full">
                <h3><?php echo $first_col['designation_section_3_column_title']; ?></h3>
                <div><?php echo $first_col['designation_section_3_column_copy']; ?></div>
              </div>
              <div class="three-column column column-small column-full">
                <span class="word-icon">or</span>
              </div>
              <div class="three-column column column-large column-full">
                <h3><?php echo $second_col['designation_section_3_column_title']; ?></h3>
                <div><?php echo $second_col['designation_section_3_column_copy']; ?></div>
              </div>
            </div>
          </div>
          <hr />
          <div class="section-4">
            <div class="flex-col-wrapper">
              <div class="two-column column column-full">
                <h2><?php the_field('designation_section_4_title'); ?></h2>
                <p><?php the_field('designation_section_4_text'); ?></p>
                <h3><?php the_field('designation_section_4_checklist_title'); ?></h3>
                <?php
                if( have_rows('designation_section_4_checklist') ):
                echo '<ul class="checkmark-list">';
                  while ( have_rows('designation_section_4_checklist') ) : the_row(); ?>
                    <li><?php the_sub_field('designation_section_4_checklist_item_text'); ?></li>
                <?php
                  endwhile;
                echo '</ul>';
                endif;
                ?>
              </div>
              <div class="two-column column column-full">
                <?php
                if( have_rows('designation_section_4_timeline') ):
                echo '<ol class="timeline">';
                  while ( have_rows('designation_section_4_timeline') ) : the_row(); ?>
                    <li class="timeline-item">
                      <div class="timeline-marker"></div>
                      <div class="timeline-content">
                        <p><strong><?php the_sub_field('designation_section_4_timeline_item_title'); ?></strong><br /><?php the_sub_field('designation_section_4_timeline_item_text'); ?></p>
                      </div>
                    </li>
                <?php
                  endwhile;
                echo '</ol>';
                endif;
                ?>
              </div>
            </div>
            <?php $section_btn = get_field('designation_section_4_button'); ?>
            <div class="section-closing"><a class="button orange-button" href="<?php echo $section_btn['designation_section_4_button_link']; ?>"><?php echo $section_btn['designation_section_4_button_text']; ?></a></div>
          </div>
        </div>
      </section>
      
      <section class="testimonials group bg-off-white">
        <div class="container">
          <h2 class="text-center">What Our Participants Are Saying</h2>
          <div class="carousel-container">
            <div class="testimonials-wrapper">
              <?php
              global $post;
              $args = array( 'post_type' => 'testimonial','posts_per_page' => -1, 'orderby' => 'rand' );
              $rand_posts = get_posts( $args );
              foreach ( $rand_posts as $post ) : 
                setup_postdata( $post ); ?>
                <div class="testimonial box-shadow-radius">
                  <div><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?></div>
                  <?php the_content(); ?>
                  <p class="credit"><?php the_title(); ?></p>
                </div>
              <?php endforeach; 
              wp_reset_postdata(); ?>
            </div>
          </div>
        </div>
      </section>

      <?php endwhile; // end of the loop. ?>
    </div>
  </div>

</div>

<?php get_footer(); ?>
