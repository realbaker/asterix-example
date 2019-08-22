<?php
/**
 * The template used for displaying content in single resources posts
 *
 * @package NWLN
 */

  $post_author = (get_field('post_author')) ? get_field('post_author') : 'General Contributor';
  $p = get_post();
  $post_type = $p->post_type;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
      <?php echo get_the_date(); ?> <?php //MIGHT WANT TO PUT CATS HERE ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<!-- optional cta button -->
		<?php if(get_field('cta_button')) : ?>
			<a href="<?php the_field('cta_link') ?>" class="button"><?php the_field('cta_button') ?></a>
		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

<!-- download link -->
<?php 
$download_file = get_field('download_file');
$external_download_link = get_field('external_link');
$external_button_text = get_field('external_link_button_text');

if ($download_file) { ?>
  <a href="<?php echo $download_file; ?>" class="download download-pdf" target="_blank">Download PDF Guide</a>
<?php } ?>
<?php if($external_download_link) { ?>
  <a href="<?php echo $external_download_link; ?>" class="download download-pdf" target="_blank"><?php echo $external_button_text ? $external_button_text : 'Additional Information'; ?></a>
<?php } ?>
