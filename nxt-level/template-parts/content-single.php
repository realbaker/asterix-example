<?php
/**
 * @package NWLN
 */

  $post_author = (get_field('post_author')) ? get_field('post_author') : 'General Contributor';
  $p = get_post();
  $post_type = $p->post_type;
?>
<nav class="next-links">
<?php if($post_type == 'post'):?>
  <?php
    // $url = '/from-the-field/light-source/';
    $url = '/news/';
    if (preg_match('/from-the-field\/light-source/', $_SERVER['HTTP_REFERER'])) {
      $url = $_SERVER['HTTP_REFERER'];
    }
  ?>
  <!-- this link used to say 'Back to Light Source' - just in case need to revert back -->
  <!-- <a href="<?php print $url; ?>" rel="prev">« Back to News</a> -->
  <!-- new layout, list categories instead -->
  <div class="category-list">
    <span class="title">Category:</span>
    <?php
    $categories = get_the_category();
    foreach ($categories as $category) : ?>
      <a href="/news/?_sft_category=<?php echo $category->slug; ?>"><?php echo $category->name; ?><i>,</i></a>
    <?php endforeach; ?>
    </div>
<?php else: ?>
  <?php previous_post_link( '%link', '&laquo; Previous', TRUE ); ?>
  <?php next_post_link( '%link', 'Next &raquo;', TRUE ); ?>
<?php endif; ?>
</nav>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
      <?php echo get_the_date(); ?> &nbsp;| &nbsp;by: <?php echo $post_author; ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
