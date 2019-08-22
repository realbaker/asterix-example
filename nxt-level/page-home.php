<?php
/**
 * Template Name: Home Page
 *
 * @package NWLN
 */

get_header(); ?>

<div id="content" class="content-area">

  <section class="hero group" style="background-image: url(<?php the_field('hero_background_image'); ?>)">
    <div class="container">
      <div class="hero-content">
        <!-- title -->
        <h1 class="nwln-slider__text--heading"><?php the_field('hero_headline'); ?></h1>
        <!-- subtitle -->
        <?php if(get_field('hero_sub_headline')): ?>
          <p><?php the_field('hero_sub_headline'); ?></p>
        <?php endif; ?>
        <div class="hero-ctas">
        <?php if(get_field('hero_button_link')): ?>
          <a href="<?php the_field('hero_button_link') ?>" class="button orange-button"><?php the_field('hero_button_text'); ?></a>
        <?php endif; ?>
        <?php if(get_field('hero_button_link_secondary')): ?>
          <a href="<?php the_field('hero_button_link_secondary') ?>" class="button orange-outline"><?php the_field('hero_button_text_secondary'); ?></a>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  
  <section class="training group">
    <div class="container text-center">
      <h2><?php the_field('training_section_title'); ?></h2>
      <p><?php the_field('training_section_description'); ?></p>
      <?php if (have_rows('training_topics')) :
      $i = 1; ?>
        <div class="training-boxes flex-col-wrapper">
          <?php while ( have_rows('training_topics') ) : the_row(); 
          $topicIcon = get_sub_field('topic_icon');
          ?>
            <div class="three-column column training-topic box-shadow-radius training-topic-<?php echo $i++; ?>">
              <div class="training-topic-icon text-center">
                <img src="<?php echo $topicIcon['url']; ?>" alt="<?php echo $topicIcon['alt']; ?>" />
              </div>
              <div class="training-topic-content text-center">
                <h3 class="panel-pane__heading"><?php the_sub_field('topic_title') ?></h3>
                <p class="panel-pane__content"><?php the_sub_field('topic_description') ?></p>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; 
      $trainingBtn = get_field('training_section_button');
      ?>
      <a href="<?php echo $trainingBtn['training_section_button_link']; ?>" class="button orange-button"><?php echo $trainingBtn['training_section_button_text']; ?></a>
    </div>
  </section>
  
  <?php if (have_rows('search_box')) : 
  while ( have_rows('search_box') ) : the_row(); 
  $bgImg = get_sub_field('search_box_background_image'); ?>
  <section class="home-search-block group" style="background-image: url('<?php echo $bgImg['url']; ?>')">
    <div class="container">
      <div class="search-box-copy">
        <h2 class="panel-pane__heading"><?php the_sub_field('search_box_title') ?></h2>
        <div class="panel-pane__content"><?php the_sub_field('search_box_description') ?></div>
      </div>
      <div class="search-box-form">
        <div class="search-box-form-row">
          <?php the_sub_field('search_box_form_code'); ?>
          <?php the_sub_field('search_box_link_markup'); ?>
        </div>
      </div>
    </div>
  </section>
  <?php endwhile; ?>
  <?php endif; ?>
  
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

</div>

<?php get_footer(); ?>
