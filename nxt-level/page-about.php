<?php
/**
 * Template Name: About Page
 */

get_header(); ?>

<div id="content" class="content-area">
  <?php get_template_part( 'template-parts/content', 'hero' ); ?>
  <div class="container">

    <div class="main-container">
      <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php
          if( have_rows('designation_columns') ):
          echo '<div class="flex-col-wrapper group">';
            while ( have_rows('designation_columns') ) : the_row(); ?>
              <div class="two-column column box-shadow-radius">
                <div class="column-intro">
                  <h2 class="text-center"><?php the_sub_field('designation_column_title'); ?></h2>
                  <p class="text-center"><?php the_sub_field('designation_column_intro_text'); ?></p>
                </div>
                <hr />
                <?php
                if( have_rows('designation_list') ):
                echo '<ul class="checkmark-list">';
                  while ( have_rows('designation_list') ) : the_row(); ?>
                    <li><strong><?php the_sub_field('designation_list_item_title'); ?></strong><br /><?php the_sub_field('designation_list_item_description'); ?></li>
                <?php
                  endwhile;
                echo '</ul>';
                
                endif;
                ?>
                <?php
                $buttons = get_sub_field('designation_column_buttons');	

                if( $buttons ): ?>
                  <div class="column-footer flex-col-wrapper">
                    <div class="two-column-button">
                      <a class="button orange-button" href="<?php echo $buttons['designation_primary_button_link']; ?>"><?php echo $buttons['designation_primary_button_text']; ?></a>
                    </div>
                    <div class="two-column-button">
                      <a class="button orange-outline" href="<?php echo $buttons['designation_secondaryary_button_link']; ?>"><?php echo $buttons['designation_secondary_button_text']; ?></a>
                    </div>
                  </div>
                <?php endif; 
                echo '<div style="clear:both;"></div>'; ?>
              </div>
          <?php   
            endwhile;
          echo '</div>';
          endif;
          ?>
        
        <?php endwhile; // end of the loop. ?>
      </div>
    </div>

  </div>
</div>

<?php get_footer(); ?>
