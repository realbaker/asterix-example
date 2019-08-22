<?php
/**
 * Template Name: Company List
 */

get_header(); ?>

<div id="content" class="content-area">
  <?php get_template_part( 'template-parts/content', 'hero' ); ?>

    <div class="main-container">
      <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
        
        <div class="page-content">
          <?php $hero_subhead = get_field('page_hero_intro_paragraph'); ?>
          <div class="content-wrapper group <?php if(!$hero_subhead){echo 'hero-title-only';} ?> no-pad-bottom">
            <div class="container">
              <?php the_content(); ?>
            </div>
            <script type="text/javascript">
              $(function() {
                //for gravity view search inputs
                $('input#gv_search_2132').attr("placeholder", "Search for a company or individual");
              });
            </script>
            <div class="group bg-blue-opacity no-pad-bottom">
              <div class="container">
                <h2 class="text-center"><?php the_field('company_list_section_title'); ?></h2>
                <div class="section-content">
                  <?php the_field('company_list_section_copy'); ?>
                </div>
              </div>
            </div>
            <?php $footer_cta = get_field('page_footer_cta'); 
            if($footer_cta) : ?>
            <div class="group footer-cta-block bg-off-white">
              <div class="container text-center">
                <div class="section-intro">
                  <h2 class="text-center"><?php echo $footer_cta['footer_cta_title']; ?></h2>
                </div>
                <div class="section-copy narrow">
                  <?php echo $footer_cta['footer_cta_copy']; ?>
                </div>
                <div class="ctas">
                    <a href="<?php echo $footer_cta['footer_cta_button_link']; ?>" class="button orange-button"><?php echo $footer_cta['footer_cta_button_text']; ?></a>
                </div>
              </div>
            </div>
            <?php endif; ?>
            <?php $extraFooter = get_field('additional_page_footer'); 
            if($extraFooter) : 
              echo '<div class="group">';
                echo '<div class="container">';
                  echo $extraFooter;
                echo '</div>';
              echo '</div>';
            endif; ?>
          </div>
        
        <?php endwhile; // end of the loop. ?>
      </div>
    </div>
  </div>

</div>

<?php get_footer(); ?>
