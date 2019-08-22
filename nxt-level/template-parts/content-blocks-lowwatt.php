<?php
  $block_heading = get_field('side_title');
  $body = get_field('side_body');
  $companies = get_field('companies');
  $footer = get_field('side_footer');
  $footer_link_title = get_field('side_footer_link_title');
  $footer_link = get_field('side_footer_link');
?>

<div class="content-blocks" id="companies">
  <?php

    $block_color = 'pane--turquoise';
    $block_background = '';
    $block_css_class = '';

    $block_background_output = ($block_background) ? ' style="background-image:url('.$block_background.');"' : '';
  ?>

  <div class="panel-pane panel-pane__companies <?php echo $block_css_class; ?> <?php echo $block_color; ?>"<?php echo $block_background_output; ?>>
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
    <div class="panel-pane__content panel-pane__companies_list">
      <?php if( have_rows('companies') ): ?>
        <ul class="companies">
          <?php while( have_rows('companies') ): the_row(); ?>
            <li>
               <div class="companies-link">
                 <?php
                   if (get_sub_field('companies_name')) {
                     if (get_sub_field('companies_name')) {
                       $img = '';
                       if (get_sub_field('companies_logo')) {
                          $image_src = get_sub_field('companies_logo');
                          $image = wp_get_attachment_image_src($image_src['ID'], 'full');
                          $img = '<img src="' . $image[0] . '" alt="' . get_the_title($image_src['ID']) . '" />';
                        }
                        print '<a target="_blank" href="' . get_sub_field('companies_link') . '"><div class="companies-link-img">' . $img . '</div><div class="companies-link-name">' . get_sub_field('companies_name') . '</div></a>';
                     }
                     else {
                       print get_sub_field('companies_name');
                     }
                   }
                 ?>
               </div>
            </li>
          <?php endwhile; ?>
        </ul>
      <?php endif; ?>
    </div>
    <div class="panel-pane__content">
      <?php
         if ($footer_link_title) {
           $p = '';
           if ($footer) {
             $p = '<p>' . $footer . '</p>';
           }
           print '<a class="panel-pane__action" href="' . $footer_link . '">' . $p . $footer_link_title . '</a>';
         }
       ?>
    </div>
  </div>

</div>