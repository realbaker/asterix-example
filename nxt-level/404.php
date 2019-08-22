<?php
/**
 * Template for displaying 404 page
 *
 * @package NWLN
 */

get_header(); ?>

<div id="content" class="content-area">
  <div class="container">
	  <img src="/app/themes/nwln/assets/img/404-icon.png" alt="404 error">
	  <h1>404 Error</h1>
	  <p>Unfortunately, the page you’ve requested could not be found. Use the form below to try a new search, or return to the <a href="<?php echo get_bloginfo('url'); ?>">homepage</a>.</p>
	  <?php get_search_form(); ?>
  </div>
</div>

<?php get_footer(); ?>