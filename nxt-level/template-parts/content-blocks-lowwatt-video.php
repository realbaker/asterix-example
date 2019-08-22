<?php
  $block_heading = get_field('block_side_title');
  $body = get_field('block_side_body');
  $video = get_field('video');
?>

<div class="content-blocks" id="companies-video">
  <?php

    $block_color = 'pane--turquoise';
    $block_background = '';
    $block_css_class = '';

    $block_background_output = ($block_background) ? ' style="background-image:url('.$block_background.');"' : '';
  ?>

  <div class="panel-pane panel-pane__video <?php echo $block_css_class; ?> <?php echo $block_color; ?>"<?php echo $block_background_output; ?>>
    <?php if($block_heading) : ?>
      <div class="panel-pane__heading">
        <?php echo $block_heading; ?>
      </div>
    <?php endif; ?>
    <div class="panel-pane__content">
      <?php if($body) : ?>
        <?php echo $body; ?>
      <?php endif; ?>
    </div>
    <?php if($video) : ?>
      <?php echo $video; ?>
    <?php endif; ?>
  </div>

</div>