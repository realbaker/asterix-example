<?php
/**
 * @package NWLN
 */
?>

<div class="list__item">
	<header class="entry-header">
    <h3 class="list__item--heading"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
    <span class="list__item--tag"><?php echo get_the_date(); ?></span>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
</div><!-- #post-## -->
