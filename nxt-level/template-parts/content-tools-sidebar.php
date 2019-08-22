<?php
/**
 * The template used for displaying sidebar content in single resources posts
 *
 * @package NWLN
 */
?>

<?php $resource_categories = wp_get_object_terms(get_the_ID(), 'resource_type'); ?>

<!-- related resources box -->
<?php if (!empty($resource_categories)) : ?>
	<div class="sidebar-box sidebar-box-1">
		<div class="training-topic-head">
			<h5 class="panel-pane__heading">RELATED RESOURCES</h5>
			<!-- resources list -->
		</div>
		<?php
		  // loop through categories
		  foreach($resource_categories as $resource_category) :
		    // get ID of category(ies)
		    $resource_type_id = $resource_category->term_id;
		  endforeach;

		  //get color for resource type
		  $resource_color = get_field('resource_type_color', 'resource_type_'.$resource_type_id);

			$related_posts = get_posts(array(
				'showposts' => 3,
		    'post_type' => 'resources',
		    'exclude'   => get_the_id(),
		    'tax_query' => array(
	        array (
		        'taxonomy' => 'resource_type',
		        'field' => 'term_id',
		        'terms' => $resource_type_id
	        )
		    )
	    ));

			if (!empty($related_posts)) :
				foreach($related_posts as $related_post) :
	  		?>
	  		<div class="related-post">
			  		<?php
			  		if( has_post_thumbnail($related_post->ID) ) : 
							$thumb = wp_get_attachment_url( get_post_thumbnail_id($related_post->ID), 'full' ); ?>
			  			<div class="custom resource-icon" style="background-image: url(<?php echo $thumb ?>);"></div>
				  	<?php else: ?>
				  		<div class="default resource-icon" style="background-color: <?php echo $resource_color; ?>; background-image: url(<?php the_field('resource_icon', 'term_'.$resource_type_id); ?>);"></div>
				  		<?php
			  		endif;
			  		?>
		  		<div class="titles">
		  			<h3><a href="<?php echo get_the_permalink($related_post->ID); ?>"><?php echo get_the_title($related_post->ID); ?></a></h3>
		  			<h4><?php echo get_the_date(); ?></h4>
		  		</div>
	  		</div>
	    <?php
	  	endforeach;
		endif;
		?>
	</div>
<?php endif; ?>

<!-- local training box -->
<div class="sidebar-box sidebar-box-2">
  <div class="training-topic-head">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/calendar-icon.png" alt="Local Training" />
    <h5 class="panel-pane__heading">LOCAL TRAINING</h5>
  </div>
  <div class="training-topic-content">
    <p class="panel-pane__content">Check the calendar to find in-person trainings in near you.</p>
    <a href="/training">View Calendar</a>
  </div>
</div>