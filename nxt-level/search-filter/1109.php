<?php
/**
 * Search & Filter Pro
 *
 * Conduit Feed Template
 *
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      http://www.designsandcode.com/
 * @copyright 2014 Designs & Code
 *
 * Note: these templates are not full page templates, rather
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think
 * of it as a template part
 *
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs
 * and using template tags -
 *
 * http://codex.wordpress.org/Template_Tags
 *
 */

if ( $query->have_posts() ) : ?>

<div class="results-count">
  <?php 
    echo $query->found_posts.' Results';
  ?>
</div>

<!-- <a href="/news" class="button filter-clear">Clear Filters</a> -->

<ul class="list__container tools-page">
  <?php
    while ($query->have_posts()) :
      $query->the_post();
      // $post_url = (get_field('article-url')) ? get_field('article-url') : get_permalink();
      $news_categories = get_the_category(get_the_ID());
  ?>
    <li class="list__item">
      <!-- feat image -->
      <?php if(has_post_thumbnail( get_the_ID() )): ?>
        <!-- thumbnail from post -->
        <a class="post-image" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></a>
      <?php else : ?>
        <!-- default -->
        <a class="post-image default" href="<?php the_permalink(); ?>" style="background-image: url('<?php home_url(); ?>/app/themes/nwln/assets/img/logo-nw-lighting-network.png');"></a>
      <?php endif; ?>

      <!-- check for categories -->
      <?php if($news_categories) : ?>
        <!-- resource tag(s) -->
        <div class="content-tags">
          <!-- list categories -->
          <?php foreach($news_categories as $news_category) :
            $news_cat_slug = $news_category->slug; 
            $news_cat_name = $news_category->name; ?>
            <a class="list__item--tag" href="<?php home_url(); ?>/news/?_sft_category=<?php echo $news_cat_slug; ?>">
              <?php echo $news_cat_name; ?>
            </a>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
      <!-- end category list -->

      <!-- lower content -->
      <div class="content-wrap">
        <!-- resource heading -->
        <h3 class="list__item--heading"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <!-- post date -->
        <p class="date">
          <?php echo get_the_date(); ?>
        </p>
        <!-- excerpt -->
        <?php if(get_the_excerpt()) : ?>
          <div class="excerpt">
            <?php echo get_excerpt(100); ?>
          </div>
        <?php endif; ?>
        <!-- tags -->
        <?php if(wp_get_post_tags(get_the_ID())) : ?>
          <div class="tags-list">
            <?php $tags_list = wp_get_post_tags(get_the_ID()); ?>
            <?php foreach($tags_list as $tag) : ?>
              <a href="<?php home_url(); ?>/news/?_sft_post_tag=<?php echo $tag->slug; ?>"><?php echo $tag->name; ?><span>,</span></a>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
        <!-- resource link -->
        <a href="<?php echo get_permalink(); ?>" class="read-more">READ MORE</a>
      </div>
      <!-- end lower content -->

    </li><!-- #post-## -->
  <?php endwhile; ?>
  </ul>

  <?php
    if (function_exists('wp_pagenavi')) {
      wp_pagenavi( array( 'query' => $query ) );
    }
  ?>

<?php else: ?>
  <div class="no-results">
    <h2>No Results</h2>
    <p>Sorry, but nothing matched your search terms. Please try again with some different keywords.</p>
  </div>
<?php endif; ?>
