<?php
    $headline_override = get_field('headline_override');
    $hero_bg = get_field('page_hero_background_image');
    $page_headline = ($headline_override) ? $headline_override : get_the_title();
    $hero_subhead = get_field('page_hero_intro_paragraph');
    $primary_btn = get_field('designation_hero_button');
  ?>
  <section class="hero group bg-blue-opacity" style="<?php if($hero_bg){echo 'background-image: url('.$hero_bg.')';} ?>">
    <div class="container">
      <div class="hero-content <?php if(!$hero_bg){echo 'full-title';} ?>">
        <!-- title -->
        <h1 class="nwln-slider__text--heading"><?php echo $page_headline; ?></h1>
        <!-- subtitle -->
        <?php if($hero_subhead): ?>
          <p><?php echo $hero_subhead; ?></p>
        <?php endif; ?>
        
        <?php if($primary_btn): ?>
          <div class="hero-ctas">
              <a href="<?php echo $primary_btn['designation_hero_button_link']; ?>" class="button orange-button"><?php echo $primary_btn['designation_hero_button_text']; ?></a>
          </div>
        <?php endif; ?>
      </div>
      <?php
      if( have_rows('designation_hero_benefits') ):
        echo '<div class="benefits-wrapper flex-col-wrapper">';
        while ( have_rows('designation_hero_benefits') ) : the_row(); 
          $benefit_icon = get_sub_field('designation_benefit_icon');
        ?>
          <div class="benefit-block five-column column text-center">
            <img src="<?php echo $benefit_icon['sizes']['thumbnail']; ?>" />
            <h4><?php the_sub_field('designation_benefit_title'); ?></h4>
            <p><?php the_sub_field('designation_benefit_text'); ?></p>
          </div>
      <?php
        endwhile;
        echo '</div>';
      endif;
      ?>
    </div>
  </section>