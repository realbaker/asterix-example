<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * @package TribeEventsCalendar
 *
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();

$venues_array = '';

global $wpdb;

// get venue IDs associated with published posts
$venue_ids = $wpdb->get_col( $wpdb->prepare( "SELECT DISTINCT m.meta_value FROM {$wpdb->postmeta} m INNER JOIN {$wpdb->posts} p ON p.ID=m.post_id WHERE p.post_type=%s AND p.post_status='publish' AND m.meta_key='_EventOrganizerID' AND m.meta_value > 0", Tribe__Events__Main::POSTTYPE ) );
$venue_ids = array_filter( $venue_ids );
if ( empty( $venue_ids ) ) {
  $venues_array = '';
}
else {
  $venues = get_posts( array(
  	'post_type' => Tribe__Events__Main::ORGANIZER_POST_TYPE,
  	'posts_per_page' => 200, // arbitrary limit
  	'suppress_filters' => false,
  	'post__in' => $venue_ids,
  	'post_status' => 'publish',
  	'orderby' => 'title',
  	'order' => 'ASC',
  ) );

  foreach ( $venues as $venue ) {
    $venues_array .= '<option value="' . $venue->ID . '">' . $venue->post_title . '</option>';
  }
}
?>

<?php do_action( 'tribe_events_bar_before_template' ) ?>
<div id="tribe-events-bar" class="tribe-bar-no-resize">

	<form id="tribe_events_filters_form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">
    
    <div class="form-middle form-bar">

      <!-- keyword -->
      <div class="keyword">
        <?php foreach ( $filters as $filter ) : ?>
          <?php if ( $filter['name'] == 'tribe-bar-search' ) : ?>
            <div class="<?php echo esc_attr( $filter['name'] ) ?>-filter">
              <label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>">Keyword:</label>
              <?php echo $filter['html'] ?>
            </div>
          <?php endif; ?>
        <?php endforeach; ?>
      </div>

      <!-- host -->
      <div class="host">
        <div class="form-venues">
          <label class="label-tribe_venues" for="tribe_organizers">Host:</label>
          <select id="tribe_venues" data-no-results-text="No items match" data-placeholder="– Choose Host Organization –" class="select-dropdown chosen-dropdown" name="tribe_organizers[]">
            <option value="">Select One</option>
            <?php print $venues_array; ?>
          </select>
        </div>
      </div>

      <!-- zipcode -->
      <div class="zip">
        <?php if ( ! empty( $filters ) ) { ?>
			
					<?php foreach ( $filters as $filter ) : ?>
      		  <?php if ( $filter['name'] == 'tribe-bar-geoloc' ) { ?>
        			<div class="<?php echo esc_attr( $filter['name'] ) ?>-filter">
        				<label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>">Zip Code:</label>
        				<?php echo $filter['html'] ?>
        			</div>
        		<?php } ?>
      		<?php endforeach; ?>
    		<?php } // if ( !empty( $filters ) ) ?>

          <div class="zip-miles">
            <span>within</span>
            <select name="tribe_geofence" data-no-results-text="No items match" placeholder="Select One" data-placeholder="Select One" class="select-dropdown chosen-dropdown">
              <option value="5">5 Miles</option>
              <option value="10">10 Miles</option>
              <option selected="selected" value="25">25 Miles</option>
              <option value="50">50 Miles</option>
              <option value="100">100 Miles</option>
              <option value="250">250 Miles</option>
            </select>
          </div>
        </div>
      
    </div>
    <!-- end form middle -->
		
		<div class="form-end form-bar">

      <!-- State -->
      <?php
      global $post;
      $tribe_venue = new WP_Query();
      $tribe_venue->query('posts_per_page=-1&orderby=id&order=asc&post_type=tribe_venue');
      if ( $tribe_venue->have_posts() ) : while ( $tribe_venue->have_posts() ) : $tribe_venue->the_post(); ?>
      <?php $venue_states[] =  get_post_meta( $post->ID, "_VenueState", true ); ?>
      <?php endwhile; endif;  wp_reset_query();  ?>
      <!-- left -->
      <div class="left">
        <label>Select State:</label>
        <ul>
          <?php  
          $unique_states = array_unique($venue_states);
          foreach ($unique_states as $unique_state) { 
            $args = array(
              'nopaging' => true,
              'post_type'=>'tribe_venue', 
              'meta_query' => array(
                array(
                 'key' => '_VenueState',
                 'value' => array( $unique_state),
                 'compare' => 'IN',
               )
              )
            );
            $state_venues = get_posts( $args );
            $venue_ids = wp_list_pluck( $state_venues, 'ID' ); 
            foreach($state_venues as $state_venue){
              $state_id = $state_venue->ID;
              ${"event_array_" . $unique_state}[] = $state_venue->ID;  
            } 
            ${"event_array_list_" . $unique_state} = implode(',', ${"event_array_" . $unique_state} );
            if ($unique_state == 'OR') {
              $unique_state_name = 'Oregon';
            } elseif ($unique_state == 'ID') {
              $unique_state_name = 'Idaho';
            } elseif ($unique_state == 'WA') {
              $unique_state_name = 'Washington';
            } elseif ($unique_state = 'MT') {
              $unique_state_name = 'Montana';
            }
            ?>
            <li>
              <input type="checkbox" value="<?php echo ${"event_array_list_" . $unique_state}; ?>" name="tribe_state[]"><span class="checkbox"></span><span title="<?php echo $unique_state; ?>"><?php echo ($unique_state_name) ? $unique_state_name : $unique_state; ?></span>
              <a href="" class="tribe-toggle-child"></a>
            </li>				
          <?php } ?>
        </ul>
      </div>

      <!-- submit -->
      <div class="right">
       <?php /*?> <input class="list__item--btn tribe-no-param" type="submit" name="submit-bar" value="<?php printf( esc_attr__( 'Search', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>" /><?php */?>
				<input class="list__item--btn tribe-no-param" type="submit" name="submit-bar" value="<?php printf( esc_attr__( 'Search', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>" />
      </div>
    </div>

	</form>
	<!-- #tribe_events_filters_form -->

</div><!-- #tribe-events-bar -->
<?php
do_action( 'tribe_events_bar_after_template' );
