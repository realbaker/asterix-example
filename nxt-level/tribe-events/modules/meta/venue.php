<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<div class="tribe-venue"> 
    <h2 class="tribe-events-single-section-title">Location</h2>
    <?php echo tribe_get_venue() ?> 
  </div>

	<?php if ( tribe_address_exists() ) : ?>
		<div class="tribe-venue-location">
			<div class="tribe-events-address">
				<?php echo tribe_get_full_address(); ?>
			</div>
		</div>
	<?php endif; ?>
</div>
