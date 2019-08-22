<?php
/**
 * Template Name: Two Columns
 */

get_header(); ?>

<div id="content" class="content-area">
  <?php get_template_part( 'template-parts/content', 'hero' ); ?>
  <div class="container">

    <div class="main-container">
      <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
        
          <?php
          if( have_rows('two_col_columns') ):
          echo '<div class="flex-col-wrapper group">';
            while ( have_rows('two_col_columns') ) : the_row(); ?>
              <div class="two-column column box-shadow-radius">
                <h2 class="text-center"><?php the_sub_field('two_col_column_title'); ?></h2>
                <hr />
                <div class="column-text">
                  <?php the_sub_field('two_col_column_text'); ?>
                </div>
                <?php
                $buttons = get_sub_field('two_col_column_button');	

                if( $buttons ): ?>
                  <div class="column-footer">
                    <a class="button orange-button" href="<?php echo $buttons['two_col_button_link']; ?>"><?php echo $buttons['two_col_button_text']; ?></a>
                  </div>
                <?php endif; ?>
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
