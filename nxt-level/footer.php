<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package NWLN
 */
?>

    </main>

    <footer class="primary-footer">
      <div class="container">
        <div class="footer__col footer__col--left">
          <div class="site-logo">
            <a href="<?php echo home_url(); ?>">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nxt-level-logo.png">
            </a>
          </div>
          <div class="footer-links">
            <?php wp_nav_menu('Footer Links'); ?>
          </div>
        </div>
        <div class="footer__col footer__col--right">
          <p>&copy; <?php echo date("Y"); ?> NXT Level</p>
        </div>
      </div>
    </footer>
  </div> <!-- /#site-wrapper from header.php -->
</div> <!-- /.ie-fixMinHeight from header.php -->

<?php wp_footer(); ?>

<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/slick.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.flipster.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    var nav = responsiveNav('.nav-collapse',{
      label: '<i class="fas fa-bars"></i>'
    })
    $('.carousel-container').flipster({
      itemContainer: '.testimonials-wrapper',
      itemSelector: '.testimonial',
      style: 'flat',
      spacing: -0.5,
      nav: true,
      scrollwheel: false,
      keyboard: false
    });
    /*$('.testimonials-wrapper').slick({
      arrows: false,
      centerMode: true,
      centerPadding: '20%',
      dots: true,
      slidesToShow: 1,
      responsive: [
        {
          breakpoint: 767,
          settings: {
            centerPadding: '15%'
          }
        },
        {
          breakpoint: 480,
          settings: {
            centerPadding: '0'
          }
        }
      ]
    });*/
    /*
    //when the slick slide initializes we want to set all of our slides to the same height
      $('.testimonials-wrapper').on('setPosition', function () {
        jbResizeSlider();
      });

      //we need to maintain a set height when a resize event occurs.
      //Some events will through a resize trigger: $(window).trigger('resize');
      $(window).on('resize', function(e) {
        jbResizeSlider();
      });

      //since multiple events can trigger a slider adjustment, we will control that adjustment here
      function jbResizeSlider(){
        $slickSlider = $('.testimonials-wrapper');
        $slickSlider.find('.slick-slide').height('auto');

        var slickTrack = $slickSlider.find('.slick-track');
        var slickTrackHeight = $(slickTrack).height();

        $slickSlider.find('.slick-slide').css('height', slickTrackHeight + 'px');
      }*/
  });
</script>

<?php if(is_page(1503)) { ?>
<style type="text/css">
  iframe[name=google_conversion_frame] {    
    height: 0!important;
  }
</style>
<!-- Google Code for Remarketing Tag --> 
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 851333185;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/851333185/?guid=ON&script=0"/>
</div>
</noscript>
<?php } ?>

</body>
</html>