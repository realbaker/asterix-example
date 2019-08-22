<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="content" class="content-area">
  <section class="hero group no-hero-bg">
    <div class="container">
      <div class="hero-content">

        <?php the_title( '<h3 class="tribe-events-single-event-title">', '</h3>' ); ?>
        
      </div>
    </div>
  </section>
  <div class="container">

    <div class="main-container">
      <div class="main">
        <div id="tribe-events-content" class="tribe-events-single">

          <?php
            $cats = tribe_get_event_cat_slugs( $event_id );
            foreach ($cats as $cat) {
              echo '<div class="category cat-' . $cat . '"><strong>' . ucfirst($cat) . '</strong></div>';
            }
          ?>

          <div class="tribe-events-schedule tribe-clearfix">
            <div class="tribe-events-schedule-date">
              <strong><?php echo tribe_events_event_schedule_details( $event_id, '', '' ); ?></strong>
            </div>
            <?php if ( tribe_address_exists($event_id) ) : ?>
                <div class="tribe-events-address">
                  <strong><?php echo tribe_get_venue() ?></strong>
                  <?php /*if ( tribe_get_city($event_id) ) : ?>
                    <?php echo tribe_get_city($event_id); ?>,
                  <?php endif; ?>
                  <?php if ( tribe_get_stateprovince($event_id) ) : ?>
                    <?php echo tribe_get_stateprovince($event_id); ?>
                  <?php endif;*/ ?>
                </div>
            <?php endif; ?>
          </div>

          <!-- Event header -->
          <div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>
            <!-- Navigation -->
            <h3 class="tribe-events-visuallyhidden"><?php printf( esc_html__( '%s Navigation', 'the-events-calendar' ), $events_label_singular ); ?></h3>
            <!-- .tribe-events-sub-nav -->
          </div>
          <!-- #tribe-events-header -->
            <?php while ( have_posts() ) :  the_post(); ?>
              <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="left">
                  <!-- Event content -->
                  <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
                  <div class="tribe-events-single-event-description tribe-events-content">
                    <?php the_content(); ?>
                    <?php $website = tribe_get_event_website_url(); ?>
                    <?php if ($website) : ?>
                      <p><a class="btn register-link" href="<?php print $website; ?>">Register</a></p>
                    <?php endif; ?>
                  </div>
                  <!-- .tribe-events-single-event-description -->
                  <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
                </div>
                <div class="right">
                  <!-- Event meta -->
                  <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
                  <?php tribe_get_template_part( 'modules/meta' ); ?>
                  <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
                </div>
              </div> <!-- #post-x -->
            <?php endwhile; ?>

        </div><!-- #tribe-events-content -->

      </div>
    </div>

  </div>
</div>