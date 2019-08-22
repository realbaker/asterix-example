<?php
    $headline_override = get_field('headline_override');
    $hero_bg = get_field('page_hero_background_image');
    $page_headline = ($headline_override) ? $headline_override : get_the_title();
    $hero_subhead = get_field('page_hero_intro_paragraph');
    $hero_logo = get_field('training_level_logo');
  ?>
  <section class="hero group bg-blue-opacity" style="<?php if($hero_bg){echo 'background-image: url('.$hero_bg.')';} ?>">
    <div class="container">
      <div class="hero-content <?php if(!$hero_bg){echo 'full-title';} ?>">
        <img src="<?php echo $hero_logo['sizes']['thumbnail']; ?>" />
        <!-- title -->
        <h1 class="nwln-slider__text--heading"><?php echo $page_headline; ?></h1>
        <!-- subtitle -->
        <?php if($hero_subhead): ?>
          <p><?php echo $hero_subhead; ?></p>
        <?php endif; ?>
      </div>
      <?php
      if( have_rows('training_hero_benefits') ):
        echo '<div class="benefits-wrapper flex-col-wrapper">';
        while ( have_rows('training_hero_benefits') ) : the_row(); 
          $benefit_icon = get_sub_field('training_benefit_icon');
        ?>
          <div class="benefit-block five-column column text-center">
            <img src="<?php echo $benefit_icon['sizes']['thumbnail']; ?>" />
            <h4><?php the_sub_field('training_benefit_title'); ?></h4>
            <p><?php the_sub_field('training_benefit_text'); ?></p>
          </div>
      <?php
        endwhile;
        echo '</div>';
      endif;
      ?>
    </div>
  </section>