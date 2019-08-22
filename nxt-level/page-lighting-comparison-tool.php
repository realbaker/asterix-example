<?php
/**
 * Template Name: Lighting Comparison Tool
 *
 * @package NWLN
 */

get_header(); ?>

<div class="container" data-iframe-height>

  <?php 
  $intro_content = get_field('intro_content');
  $table_shortcode = get_field('comparison_table_shortcode');
  $after_content = get_field('after-table_content');
  $after_content_image = get_field('after-table_image');
  ?>

  <!-- intro -->
  <section class="intro-content">
    <h1><?php the_title(); ?></h1>
    <?php echo $intro_content; ?>    
  </section>

  <!-- tool grid -->
  <section class="comparison-tool">
    <?php echo do_shortcode($table_shortcode); ?>
  </section>

  <!-- tooltips -->
  <?php
  if (have_rows('comparison_table_tooltips')): 
    while(have_rows('comparison_table_tooltips')) : the_row();
      $tooltip_name = get_sub_field('tooltip_name');
      $tooltip_content = get_sub_field('tooltip_content');
  ?>
    <div id="<?php echo $tooltip_name; ?>" class="modal" style="display: none;">
      <div class="panel-pane">
        <div class="panel-pane__content">
          <?php echo $tooltip_content; ?>
        </div>
      </div>
    </div>
  <?php
    endwhile;
  endif;
  ?>

  <!-- disclaimers -->
  <section class="after-table">
    <div class="after-content<?php echo ($after_content_image) ? '' : ' full'; ?>">
      <?php echo $after_content; ?>
    </div>
    <?php if ($after_content_image) : ?>
      <img src="<?php echo $after_content_image; ?>" alt="Brought to you by Northwest Lighting Network">
    <?php endif; ?>
  </section>
  
</div>

<?php get_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/iframe-resizer/3.5.15/iframeResizer.contentWindow.min.js"></script>

<script type="text/javascript">
  $('.ptsEl a[title*="modal-deploy"]').attr('rel', 'modal:open');
  $('.ptsEl a[title*="question-button"]').attr('question-button', 'true');
  $('.ptsEl a[title*="modal-deploy"]').attr('title', 'click for more information');

  // ** modal positioning ** //
  $(document).ready(function() { 
    $("body").on("click", 'a[rel*="modal:open"]', function(){ 
      // get the link's position
      var vert_position = $(this).offset();
          // vert_position = (vert_position.top - 150);
          vert_position = (vert_position.top - 100);
      // tweak offsets so that no modal overflows the iframe
      if($(window).width() > 619){
        if (vert_position > 850) { vert_position = (vert_position - 220); }
      }
      // get link's href, it will match modal's id
      var modal_id = $(this).attr('href');
      // set matching modal's position relative to it
      $('.modal'+ modal_id).css('top', vert_position);
    });
  });
</script>