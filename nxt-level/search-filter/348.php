<?php
/**
 * Search & Filter Pro
 *
 * Trade Ally Network Template
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

  <ul class="list__container tools-page">
    <?php
      while ($query->have_posts()) :
        $query->the_post();
    ?>
    <li class="list__item">

      <?php
        $network_image = get_field('featured_image');
      ?>

      <!-- featured image -->
      <?php if ($network_image) : ?>
        <div class="utility-image" style="background-image: url(<?php echo $network_image; ?>)">

        </div>
      <?php else : ?>
        <div class="utility-image default">

        </div>
      <?php endif; ?>

      <div class="content-wrap">
        <span class="list__item--tag"><?php echo get_field('network_city-state'); ?></span>
        <h3 class="list__item--heading"><?php the_title(); ?></h3>

        <div class="entry-content">
          <p>
            <?php echo get_the_content() ?>
          </p>
        </div> <!-- .entry-content -->

        <?php
        // check if the repeater field has rows of data
        // exclude application
        if( have_rows('network_downloads') ):
          echo "<ul class=\"list__item--downloads network-downloads\">";

            // loop through the rows of data
          while ( have_rows('network_downloads') ) : the_row();
            $download_name = get_sub_field('network_download-name');
            $download_file = get_sub_field('network_download-file');
            $download_type = get_sub_field('network_download_type');
            $download_external = get_sub_field('network-external_download_link');
            $download_utility_title = get_the_title();

            if (!$download_type == 'app' && !$download_external) :
              echo "<li><a class=\"network-dl-link\" data-variable=\"$download_utility_title\" href=\"$download_file\" target=\"_blank\">$download_name</a></li>";
            elseif(!$download_type == 'app' && $download_external) :
              echo "<li><a class=\"network-dl-link\" data-variable=\"$download_utility_title\" href=\"$download_external\" target=\"_blank\">$download_name</a></li>";
            endif;

          endwhile;


          echo "</ul>";
        endif; ?>

      <!-- end content wrap -->
      </div>

      <?php
      // get application
      if( have_rows('network_downloads') ):
        echo "<ul class=\"list__item--downloads network-downloads\">";
        while ( have_rows('network_downloads') ) : the_row();
          $download_name = get_sub_field('network_download-name');
          $download_file = get_sub_field('network_download-file');
          $download_type = get_sub_field('network_download_type');
          $download_external = get_sub_field('network-external_download_link');
          $network_name = get_the_title();

          if ($download_type == 'app' && !$download_external) :
            echo "<li class='application'><a class='network-app-link' data-variable='$network_name' href=\"$download_file\" target=\"_blank\">$download_name</a></li>";
          elseif($download_type == 'app' && $download_external) :
            echo "<li class='application'><a class='network-app-link' data-variable='$network_name' href=\"$download_external\" target=\"_blank\">$download_name</a></li>";
          endif;

        endwhile;

        echo "</ul>";
      endif; ?>

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
    <p><a href="/trade-ally-networks/">View all results</a></p>
  </div>
<?php endif; ?>


<!-- js toggle more content -->
<script type="text/javascript">
  $(document).ready(function() {
    var showChar = 150;
    var ellipsestext = "...";
    var moretext = "VIEW MORE <i>+</i>";
    var lesstext = "VIEW LESS <i>-</i>";
    $('.page-id-346 .list__item .content-wrap .entry-content p').each(function() {
      var content = $(this).html();

      if(content.length > showChar) {

        var c = content.substr(0, showChar);
        var h = content.substr(showChar, content.length - showChar);

        var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

        $(this).html(html);
      }

    });

    $(".morelink").click(function(){
      if($(this).hasClass("less")) {
        $(this).removeClass("less");
        $(this).html(moretext);
      } else {
        $(this).addClass("less");
        $(this).html(lesstext);
      }
      $(this).parent().prev().toggle();
      $(this).prev().toggle();
      return false;
    });
  });
</script>
