<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package NWLN
 */
?><!DOCTYPE html>
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-136057992-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-136057992-1');
</script>

<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" sizes="16x16">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Overpass:300,300i,400,600,700,700i,900" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/slick-theme.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.flipster.min.css"/>
<?php wp_head(); ?>



<!-- style native browser elements -->
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jcf.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/jcf.select.js"></script>
<meta name="google-site-verification" content="6GlzwAygruiNVTkq5rmXhxGBIM4-fa-vIHArcWVSgSQ" />
  
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/r-2.2.1/datatables.min.js"></script>
  
</head>

<body <?php body_class(); ?>>

<div class="ie-fixMinHeight">
  <div id="site-wrapper">

    <header class="primary-header">
      <div class="container">
        <div class="site-logo">
          <a href="<?php echo home_url(); ?>">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/nxt-level-logo.png">
          </a>
        </div>
        <div class="primary-menu nav-collapse">
          <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
          <ul class="buttons-nav">
            <li><a href="/support" class="button orange-outline">Support</a></li>
            <li><a href="https://learn.nxtleveltraining.com/" target="_blank" class="button orange-outline">Training Login</a></li>
          </ul>
        </div>
      </div>
    </header>

    <main class="main-content">
