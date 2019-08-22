<?php
/**
 * The template used for displaying flex content version of single resources post
 *
 * @package NWLN
 */

  $post_author = (get_field('post_author')) ? get_field('post_author') : 'General Contributor';
  $p = get_post();
  $post_type = $p->post_type;
  $id = get_the_ID();

  $download_file = get_field('download_file');
  $external_download_link = get_field('external_link');
  $external_button_text = get_field('external_link_button_text');

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header flex-resource">
    <div class="entry-meta">
      <?php echo get_the_date(); ?> <?php //MIGHT WANT TO PUT CATS HERE ?>
      <?php if ($download_file) { ?>
        <a href="<?php echo $download_file; ?>" class="download download-pdf" target="_blank">Download PDF Guide</a>
      <?php } ?>
      <?php if($external_download_link) { ?>
        <a href="<?php echo $external_download_link; ?>" class="download download-pdf" target="_blank"><?php echo $external_button_text ? $external_button_text : 'Additional Information'; ?></a>
      <?php } ?>
    </div><!-- .entry-meta -->
  </header><!-- .entry-header -->

  <div class="entry-content flex-resource">
    <?php
    if( have_rows('flexible_content_sections') ):
      $flex_rows=0;
      while ( have_rows('flexible_content_sections') ) : the_row();

        if( get_row_layout() == 'image' ): ?>
          <!-- image block -->
          <div class="content-block image-block">
            <img src="<?php the_sub_field('image'); ?>" alt="" class="image-block">
          </div>

        <?php elseif( get_row_layout() == 'image_with_caption' ): ?>
          <!-- image block with caption -->
          <div class="content-block image-block">
            <h2><?php the_sub_field('image_title'); ?></h2>
            <img src="<?php the_sub_field('image'); ?>" alt="">
            <h4 class="caption"><?php the_sub_field('caption'); ?></h4>
          </div>

        <?php elseif( get_row_layout() == 'text_block' ) : ?>
          <!-- text block (wysiwyg) -->
          <div class="content-block text-block">
            <?php the_sub_field('text_block'); ?>
          </div>

        <?php elseif( get_row_layout() == 'table' ): ?>
          <!-- table block -->
          <div class="content-block table-block">
            <?php if( get_sub_field('table_title') ) : ?>
              <h2><?php the_sub_field('table_title'); ?></h2>
            <?php endif; ?>
            <table>
              <!-- if first row, make table header -->
              <?php $i=0; while( have_rows('table_block') ): the_row(); ?>
                <?php if( $i==0 ) : ?>
                  <thead>
                    <tr>
                      <!-- columns -->
                      <?php while( have_rows('rows') ): the_row(); ?>
                        <td><?php the_sub_field('columns'); ?></td>
                      <?php endwhile; ?>
                    </tr>
                  </thead>
                <?php else: ?>
                  <tbody>
                    <tr>
                      <!-- columns -->
                      <?php $x=0; ?>
                      <?php while( have_rows('rows') ): the_row(); ?>
                        <?php
                          // get meta data from db for first db row
                          $meta_key = 'flexible_content_sections_'.$flex_rows.'_table_block_0_rows_'.$x.'_columns';
                          $label_value = get_post_meta($id, $meta_key, true);
                        ?>
                        <td data-label='<?php echo $label_value; ?>'>
                          <?php the_sub_field('columns'); ?>
                        </td>
                        <?php $x++; ?>
                      <?php endwhile; ?>
                    </tr>
                  </tbody>
                <?php endif; ?>
                <?php $i++; ?>
              <?php endwhile; ?>
            </table>
          </div>

        <?php elseif( get_row_layout() == 'callout' ): ?>
          <!-- callout block -->
          <div class="content-block callout-block" <?php if(get_sub_field('background_color')): ?> style="background:<?php the_sub_field('background_color') ?>" <?php endif; ?>>
            <h2><?php the_sub_field('title'); ?></h2>
            <?php the_sub_field('text_body'); ?>
          </div>

        <?php elseif ( get_row_layout() == 'side_by_side' ) : ?>
          <!-- side-by-side -->
          <div class="content-block side-by-side-block">
            <!-- if image left -->
            <?php if(get_sub_field('image_side') == 'left') : ?>
              <!-- image -->
              <div class="left-side-content">
                <img src="<?php the_sub_field('image') ?>" alt="">
              </div>
              <!-- content -->
              <div class="right-side-content">
                <div class="content-wrap">
                  <?php the_sub_field('content') ?>
                </div>
              </div>

            <!-- if image right -->
            <?php elseif(get_sub_field('image_side') == 'right') : ?>
              <!-- image -->
              <div class="left-side-content">
                <div class="content-wrap">
                  <?php the_sub_field('content') ?>
                </div>
              </div>
              <!-- content -->
              <div class="right-side-content">
                <img src="<?php the_sub_field('image') ?>" alt="">
              </div>
            <?php endif; ?>
          </div>

        <?php endif;
        $flex_rows++;
      endwhile;
    endif;
    ?>
    <!-- optional cta button -->
    <?php if(get_field('cta_button')) : ?>
      <a href="<?php the_field('cta_link') ?>" class="button"><?php the_field('cta_button') ?></a>
    <?php endif; ?>
    <!-- download link -->
    <?php if ($download_file) { ?>
      <a href="<?php echo $download_file; ?>" class="download download-pdf" target="_blank">Download PDF Guide</a>
    <?php } ?>
    <?php if($external_download_link) { ?>
      <a href="<?php echo $external_download_link; ?>" class="download download-pdf" target="_blank"><?php echo $external_button_text ? $external_button_text : 'Additional Information'; ?></a>
    <?php } ?>
  </div><!-- .entry-content -->

  
</article><!-- #post-## -->
