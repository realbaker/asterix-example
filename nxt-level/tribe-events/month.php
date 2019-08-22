<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );

?>

<div id="content" class="content-area">
  <section class="hero group no-hero-bg">
    <div class="container">
      <div class="hero-content full-title">
        <!-- title -->
        <h1 class="nwln-slider__text--heading">Training Events</h1>
      </div>
    </div>
  </section>
  <div class="container">

    <div class="main-container">
      <div class="main">
        <div class="events-filter-bar">
          <?php //tribe_get_template_part( 'modules/bar' ); ?>
        </div>

        <div class="page-content" style="padding-bottom: 50px;">
          <?php

          // Main Events Content
          tribe_get_template_part( 'month/content' );

          do_action( 'tribe_events_after_template' );

          ?>
        </div>
      </div>
    </div>

  </div>
</div>

