<?php

/**
 *
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 *
 */

?>

<script type="text/html" id="tribe_tmpl_tooltip">
<a class="url" href="[[=permalink]]" title="[[=title]]" rel="bookmark">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		<h4 class="entry-title summary">[[=raw title]]</h4>

		<div class="tribe-events-event-body">
			<div class="tribe-event-duration">
				<abbr class="tribe-events-abbr tribe-event-date-start">[[=dateDisplay]] </abbr>
			</div>
			[[ if(imageTooltipSrc.length) { ]]
			<div class="tribe-events-event-thumb">
				<img src="[[=imageTooltipSrc]]" alt="[[=title]]" />
			</div>
			[[ } ]]
			[[ if(excerpt.length) { ]]
			<div class="tribe-event-description">[[=raw excerpt]]</div>
			[[ } ]]
			<a href="[[=permalink]]" class="read-more">Read More</a>

			[[ if(event_website.length) { ]]
				<a href="[[=event_website]]" class="register register-link" target="_blank">Register Now</a>
			[[ } ]]

			<!-- <?php if(tribe_get_event_meta( $post->ID, '_EventURL', true )) : ?>
				<a href="<?php echo tribe_get_event_meta( $post->ID, '_EventURL', true ); ?>" class="register register-link" target="_blank">Register Now</a>
			<?php endif; ?> -->

			<!-- <?php if (get_field('registration_url')): ?>
				<a href="<?php the_field('registration_url') ?>" class="register register-link">Register Now</a>
			<?php endif ?> -->
		</div>
	</div>
</a>
</script>

<?php wp_reset_postdata(); ?>
