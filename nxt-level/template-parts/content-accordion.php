<?php
if( have_rows('accordion_group') ):
  echo '<div id="accordion" class="accordion-group">';
  while ( have_rows('accordion_group') ) : the_row(); ?>
    <h3><?php the_sub_field('accordion_item_title'); ?></h3>
    <div>
      <?php the_sub_field('accordion_item_copy_block'); ?>
    </div>
  <?php
  endwhile;
  echo '</div>';
endif;
?>