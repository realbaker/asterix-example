<?php
/**
 * Filter View Template
 * This contains the hooks to generate a filter sidebar.
 *
 * @package TribeEventsCalendar
 * @since  1.0
 * @author Modern Tribe Inc.
 *
 */

// Don't load directly
if ( ! defined( 'ABSPATH' ) ) { die( '-1' ); }

do_action( 'tribe_events_filter_view_before_template' );
?>
<?php
do_action( 'tribe_events_filter_view_after_template' );

 