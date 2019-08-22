<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package NWLN
 */
?>

<?php
  $features = get_field('features');
  $stories = get_field('stories');
  $footer_link_title = get_field('footer_link_title');
  $footer_link = '#companies';
?>

<div class="page-content">
  <div class="content-wrapper">
    <div class="left image_1">
      <?php
        if (get_field('left_image')) {
          $image_src = get_field('left_image');
          $image = wp_get_attachment_image_src($image_src['ID'], 'full');
          print '<img src="' . $image[0] . '" alt="' . get_the_title($image_src['ID']) . '" />';
        }
      ?>
    </div>
    <div class="left p_content">
      <h1><?php print get_the_title(); ?></h1>
      <?php the_content(); ?>
    </div>
    <div class="left image_2">
    <?php
      if (get_field('right_image')) {
        $image_src = get_field('right_image');
        $image = wp_get_attachment_image_src($image_src['ID'], 'full');
        print '<img src="' . $image[0] . '" alt="' . get_the_title($image_src['ID']) . '" />';
      }
    ?>
    </div>
  </div>
  
  <div class="features-wrapper">
    <?php if( have_rows('features') ): ?>
      <ul>
        <?php $row = 1; ?>
        <?php while( have_rows('features') ): the_row(); ?>
          <?php
            $li_class = $row % 2 == 0 ? 'left' : 'right';
          ?>
          <li class="<?php print $li_class; ?>">
            <?php
               if (get_sub_field('image')) {
                 $image_src = get_sub_field('image');
                 $image = wp_get_attachment_image_src($image_src['ID'], 'full');
                 print '<img src="' . $image[0] . '" alt="' . get_the_title($image_src['ID']) . '" />';
               }
             ?>
            <h3>
              <?php
                if (get_sub_field('title')) {
                  print get_sub_field('title');
                }
              ?>
            </h3>
            <?php
              if (get_sub_field('body')) {
                print get_sub_field('body');
              }
            ?>
          </li>
          <?php $row++; ?>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </div>
  
  <div class="stories-wrapper">
    <?php if( have_rows('stories') ): ?>
      <ul>
        <?php while( have_rows('stories') ): the_row(); ?>
          <li>
            <h3>
              <?php
                if (get_sub_field('title')) {
                  print get_sub_field('title');
                }
              ?>
            </h3>
            <?php
              if (get_sub_field('image')) {
                $image_src = get_sub_field('image');
                $image = wp_get_attachment_image_src($image_src['ID'], 'full');
                print '<img class="stories-img" src="' . $image[0] . '" alt="' . get_the_title($image_src['ID']) . '" />';
              }
            ?>
            <div class="stories-text">
              <?php
                if (get_sub_field('body')) {
                  print get_sub_field('body');
                }
              ?>
              <div class="stories-link">
                <?php
                  if (get_sub_field('link_title')) {
                    print '<a target="_blank" href="' . get_sub_field('link') . '">' . get_sub_field('link_title') . '</a>';
                  }
                ?>
              </div>
            </div>
          </li>
        <?php endwhile; ?>
      </ul>
    <?php endif; ?>
  </div>
  
  <div class="content-footer-wrapper">
    <?php
      if (get_field('footer_link_title')) {
        print '<a class="btn" href="' . $footer_link . '">' . $footer_link_title . '</a>';
      }
    ?>
  </div>
  
</div>

<!-- .entry-content -->