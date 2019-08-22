<?php
    $headline_override = get_field('headline_override');
    $hero_bg = get_field('page_hero_background_image');
    $page_headline = ($headline_override) ? $headline_override : get_the_title();
    $hero_subhead = get_field('page_hero_intro_paragraph');
    $primary_btn = get_field('hero_button_link');
    $secondary_btn = get_field('hero_button_link_secondary');
  ?>
  <section class="hero group <?php if(!$hero_bg){echo 'no-hero-bg';} ?>" style="<?php if($hero_bg){echo 'background-image: url('.$hero_bg.')';} ?>">
    <div class="container">
      <div class="hero-content <?php if(!$hero_bg){echo 'full-title';} ?>">
        <!-- title -->
        <h1 class="nwln-slider__text--heading"><?php echo $page_headline; ?></h1>
        <!-- subtitle -->
        <?php if($hero_subhead): ?>
          <p><?php echo $hero_subhead; ?></p>
        <?php endif; ?>
        <?php if($primary_btn || $secondary_btn): ?>
        <div class="hero-ctas">
        <?php if($primary_btn): ?>
          <a href="<?php echo $primary_btn; ?>" class="button orange-button"><?php the_field('hero_button_text'); ?></a>
        <?php endif; ?>
        <?php if($secondary_btn): ?>
          <a href="<?php echo $secondary_btn; ?>" class="button orange-outline"><?php the_field('hero_button_text_secondary'); ?></a>
        <?php endif; ?>
        </div>
        <?php endif; ?>
      </div>
    </div>
  </section>