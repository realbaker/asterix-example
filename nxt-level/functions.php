<?php
/**
 * NWLN functions and definitions
 *
 * @package NWLN
 */

if ( ! function_exists( 'nwln_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function nwln_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on NWLN, use a find and replace
	 * to change 'nwln' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'nwln', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'nxt-level' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'nwln_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // nwln_setup
add_action( 'after_setup_theme', 'nwln_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function nwln_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'nwln_content_width', 640 );
}
add_action( 'after_setup_theme', 'nwln_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function nwln_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'nwln' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'nwln_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function nxtlevel_scripts() {
	//wp_enqueue_style( 'nwln-styles', get_template_directory_uri() .'/assets/css/style.css' );
	//wp_enqueue_style( 'nwln-extra', get_template_directory_uri() .'/assets/css/extra.css' );
	//wp_enqueue_style( 'nwln-forms', get_template_directory_uri() .'/assets/css/forms.css' );
	//wp_enqueue_style( 'nwln-nxt', get_template_directory_uri() .'/assets/css/nxt.css' );
	//wp_enqueue_style( 'lowwatt', get_template_directory_uri() .'/assets/css/lowwatt.css' );
	//wp_enqueue_style( 'events', get_template_directory_uri() .'/assets/css/events.css' );
	//wp_enqueue_style( 'nwln-nxt-level', get_template_directory_uri() .'/assets/css/nxt-level.css' );
	//wp_enqueue_style( 'jquery-modal', get_template_directory_uri() .'/assets/css/jquery.modal.css' );
  //wp_enqueue_style( 'nwln-scss', get_template_directory_uri() .'/assets/css/scss.css' );
  wp_enqueue_style( 'responsive-nav', get_template_directory_uri() .'/assets/css/responsive-nav.css' );
  wp_enqueue_style( 'nxt-level', get_template_directory_uri() .'/assets/css/styles.css' );

	//wp_enqueue_script( 'nwln-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), '20180710', true );
	//wp_enqueue_script( 'nwln-scripts-nxt', get_template_directory_uri() . '/assets/js/nxt.js', array('jquery'), '20180710', true );
	wp_enqueue_script( 'nwln-scripts-nxt-level', get_template_directory_uri() . '/assets/js/nxt-level.js', array('jquery'), '20180710', true );
	//wp_enqueue_script( 'nwln-scripts-forms', get_template_directory_uri() . '/assets/js/forms.js', array('jquery'), '20180710', true );
	//wp_enqueue_script( 'nwln-scripts-leaders-of-the-pack', get_template_directory_uri() . '/assets/js/leaders-of-the-pack.js', array('jquery'), '20160106', true );
	//wp_enqueue_script( 'nwln-scripts-lighting-basics-trade-allies', get_template_directory_uri() . '/assets/js/lighting-basics-trade-allies.js', array('jquery'), '20160106', true );
	//wp_enqueue_script( 'jquery-modal-script', get_template_directory_uri() . '/assets/js/jquery.modal.min.js', array('jquery'), '20180710', true );
  wp_enqueue_script( 'responsive-nav', get_template_directory_uri() . '/assets/js/responsive-nav.js' );
  wp_enqueue_script( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'nxtlevel_scripts' );


function wpse_ie_conditional_scripts() { ?>
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/html5shiv.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/selectivizr.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/js/plugins/respond.min.js"></script>
    <![endif]-->
    <?php
}
add_action( 'wp_head', 'wpse_ie_conditional_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/libs/template-tags.php';

/**
 * Hide WP Admin Bar
 */
add_filter('show_admin_bar', '__return_false');

/**
 * Remove junk from head
 */
remove_action('wp_head', 'rsd_link'); // remove really simple discovery link
remove_action('wp_head', 'wp_generator'); // remove wordpress version
remove_action('wp_head', 'feed_links', 2); // remove rss feed links (make sure you add them in yourself if youre using feedblitz or an rss service)
remove_action('wp_head', 'feed_links_extra', 3); // removes all extra rss feed links
remove_action('wp_head', 'index_rel_link'); // remove link to index page
remove_action('wp_head', 'wlwmanifest_link'); // remove wlwmanifest.xml (needed to support windows live writer)
remove_action('wp_head', 'start_post_rel_link', 10, 0); // remove random post link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // remove parent post link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // remove the next and previous post links
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Clean up WP Menu classes
 */
function custom_wp_nav_menu($var) {
  return is_array($var) ? array_intersect($var, array(
    //List of allowed menu classes
    'current_page_item',
    'current_page_parent',
    'current_page_ancestor',
    'first',
    'last',
    'vertical',
    'horizontal'
    )
  ) : '';
}

//add_filter('nav_menu_css_class', 'custom_wp_nav_menu');
//add_filter('nav_menu_item_id', 'custom_wp_nav_menu');
//add_filter('page_css_class', 'custom_wp_nav_menu');


//Replaces "current-menu-item" with "active"
function current_to_active($text){
  $replace = array(
    //List of menu item classes that should be changed to "active"
    'current_page_item' => 'active',
    'current_page_parent' => 'active',
    'current_page_ancestor' => 'active',
  );
  $text = str_replace(array_keys($replace), $replace, $text);
    return $text;
  }
//add_filter ('wp_nav_menu','current_to_active');

//Deletes empty classes and removes the sub menu class
function strip_empty_classes($menu) {
    $menu = preg_replace('/ class=""| class="sub-menu"/','',$menu);
    return $menu;
}
//add_filter ('wp_nav_menu','strip_empty_classes');

/**
 * Posts 2 Posts Plugin
 */
function my_connection_types() {
    p2p_register_connection_type( array(
        'name' => 'blocks_to_pages',
        'from' => 'content_block',
        'to' => 'page',
        'sortable' => 'any'
    ) );
}
add_action( 'p2p_init', 'my_connection_types' );

/**
 * Custom shortcodes
 */
function courses_custom_shortcode($atts) {
    ob_start();

   // define attributes and their defaults
   extract(shortcode_atts(array(
    'posts' => 4
   ), $atts));

  // define query parameters
  $options = array(
    'post_type' => 'online-course',
    'posts_per_page' => $posts,
    'orderby' => 'menu_order',
    'order' => 'ASC'
  );

  $query = new WP_Query( $options );

  // run the loop based on the query
   if ( $query->have_posts() ) : ?>
    <div id="online-courses" class="listing-container">
      <?php while( $query->have_posts() ) : $query->the_post(); ?>
      <div class="course-listing">
        <div class="course-listing__image">
          <a href="<?php echo get_field('course_link'); ?>" target="_blank"><?php the_post_thumbnail(); ?></a>
        </div>
        <div class="course-listing__content">
          <div class="course-listing--title">
            <a href="<?php echo get_field('course_link'); ?>" target="_blank"><?php echo get_the_title(); ?></a>
          </div>
          <?php echo get_the_content(); ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  <?php
  else:
    echo "<p><strong>There are no online courses at this time.</strong></p>";
  endif;

  return ob_get_clean();
}
add_shortcode("online-courses", "courses_custom_shortcode");

function past_trainings_custom_shortcode($atts) {
    ob_start();

   // define attributes and their defaults
   extract(shortcode_atts(array(
     'posts' => 3
   ), $atts));

  // define query parameters
  $options = array(
    'post_type' => 'training',
    'posts_per_page' => $posts,
    'meta_key' => 'training_date',
    'orderby' => 'meta_value',
    'order' => 'DESC',
    'meta_query' => array(
      array(
        'key' => 'training_date',
        'compare' => '<=',
        'value' => current_time('Ymd')
      ),
      array(
        'key' => 'show_past_training',
        'value' => '1',
        'compare' => '=='
      ),
    )
  );

  $query = new WP_Query( $options );

  // run the loop based on the query
   if ( $query->have_posts() ) : ?>
    <div id="past-trainings" class="listing-container">
      <?php while( $query->have_posts() ) : $query->the_post(); ?>
      <?php
        $listing_date = strtotime(get_field('training_date'));
        $listing_date = date("M. d, Y", $listing_date);
        $training_time = get_field('training_time');
        $time_display = ($training_time) ? " - ". $training_time ."" : "";
        $training_type = strtolower(get_field('training_type'));
        $type_display = ($training_type == 'online') ? ucfirst($training_type) : get_field('location_city') .', ' . get_field('location_state');
        $map_class = (!empty($location_city) && !empty($location_state)) ? " map-split" : "";
      ?>
      <div class="training-listing">
        <div class="training-listing__info">
          <span class="training-listing--date"><?php echo $listing_date . $time_display; ?></span>
        </div>
        <div class="training-listing__wrapper">
          <div class="training-listing__content<?php echo $map_class; ?>">
            <h3 class="training-listing--title"><?php echo get_the_title(); ?></h3>
            <div class="training-listing--link">
              <?php if(get_field('download_file')) : ?>
                 <a href="<?php echo get_field('download_file'); ?>" class="d-block" target="_blank">Download the PDF</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  <?php
  else:
    echo "<p><strong>There are no upcoming trainings at this time.</strong></p>";
  endif;

  return ob_get_clean();
}
add_shortcode("past-trainings", "past_trainings_custom_shortcode");

function upcoming_trainings_custom_shortcode($atts) {
    ob_start();

   // define attributes and their defaults
   extract(shortcode_atts(array(
     'show' => 'upcoming',
     'posts' => 4
   ), $atts));

  // define query parameters
  $options = array(
    'post_type' => 'training',
    'posts_per_page' => $posts,
    'meta_key' => 'training_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(
      array(
        'key' => 'training_date',
        'compare' => '>=',
        'value' => current_time('Ymd')
      )
    )
  );

  $query = new WP_Query( $options );

  // run the loop based on the query
   if ( $query->have_posts() ) : ?>
    <div class="listing-container">
      <?php while( $query->have_posts() ) : $query->the_post(); ?>
      <?php
        $listing_date = strtotime(get_field('training_date'));
        $listing_date = date("M. d, Y", $listing_date);
        $training_time = get_field('training_time');
        $time_display = ($training_time) ? " - ". $training_time ."" : "";
        $training_type = strtolower(get_field('training_type'));
        $type_display = ($training_type == 'online') ? ucfirst($training_type) : get_field('location_city') .', ' . get_field('location_state');
        $location_name = get_field('location_name');
        $location_address = get_field('location_address');
        $location_city = get_field('location_city');
        $location_state  = get_field('location_state');
        $location_zip_code = get_field('location_zip_code');
        $map_url = "https://maps.googleapis.com/maps/api/staticmap?size=200x200&maptype=roadmap\&markers=size:mid%7Ccolor:red%7C".$location_address." ". $location_city.", ". $location_state." " . $location_zip_code."&zoom=13";
        $directions_url = "http://maps.google.com/maps?daddr=".$location_address." ".$location_city.", ".$location_state." ".$location_zip_code;
        $map_class = (!empty($location_city) && !empty($location_state)) ? " map-split" : "";
      ?>
      <div class="training-listing">
        <?php if(has_post_thumbnail()) : ?>
          <div class="training-listing__image"><?php the_post_thumbnail(); ?></div>
      <?php endif; ?>
        <div class="training-listing__info">
          <span class="training-listing--date"><?php echo $listing_date . $time_display; ?></span>
          <?php if(get_field('training_type')) : ?>
            <span class="training-listing--type"><?php echo $type_display; ?></span>
          <?php endif; ?>
        </div>
        <div class="training-listing__wrapper">
          <div class="training-listing__content<?php echo $map_class; ?>">
            <h3 class="training-listing--title"><?php echo get_the_title(); ?></h3>
              <?php echo get_the_content(); ?>
            <div class="training-listing--link">
              <?php if(get_field('download_file')) : ?>
                 <a href="<?php echo get_field('download_file'); ?>" class="d-block" target="_blank">Download the PDF</a>
              <?php endif; ?>
              <?php if(get_field('register_link') && $show == 'upcoming') : ?>
                 <a href="<?php echo get_field('register_link'); ?>" class="btn" target="_blank">Register</a>
              <?php endif; ?>
            </div>
          </div>
          <?php if($location_city && $location_state && $training_type == "location" ) : ?>
            <div class="training-listing__map">
              <a href="<?php echo $directions_url; ?>" target="_blank"><img src="<?php echo $map_url; ?>"></a>
              <p>
              <?php if(!empty($location_name)) { echo "<strong>".$location_name."</strong><br>"; } ?>
              <?php if(!empty($location_address)) { echo $location_address."<br>"; } ?>
              <?php if(!empty($location_city)) { echo $location_city.", "; } ?>
              <?php if(!empty($location_state)) { echo $location_state; } ?>
              <?php if(!empty($location_zip_code)) { echo " ". $location_zip_code; } ?>
              </p>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <?php endwhile; ?>
    </div>

  <?php
  else:
    echo "<p><strong>There are no upcoming trainings at this time.</strong></p>";
  endif;

  return ob_get_clean();
}
add_shortcode("upcoming-trainings", "upcoming_trainings_custom_shortcode");

function team_custom_shortcode($atts) {
    ob_start();

    // define the custom post type
    $post_type = 'team';

    // Get all the taxonomies for this post type
    $taxonomies = get_object_taxonomies( (object) array( 'post_type' => $post_type ) );

    echo "<div class=\"team-wrapper\">";
    foreach ($taxonomies as $taxonomy) :
      // get each category in this taxonomyh to get the respective posts
      $terms = get_terms($taxonomy);

      foreach($terms as $term) :

        echo "<h2>".$term->name."</h2>";
        echo "<div class=\"clearfix\">";

        // define query parameters
        $options = array(
          'taxonomy' => $taxonomy,
          'term' => $term->slug,
          'posts_per_page' => -1
        );

        $query = new WP_Query( $options );
        if( $query->have_posts() ): while( $query->have_posts() ) : $query->the_post(); ?>
          <div class="team-member">
            <div class="team-member__img">
            <?php
            if ( has_post_thumbnail() ) {
              the_post_thumbnail();
            }
            ?>
            </div>
            <div class="team-member__info">
              <div class="team-member__info--name"><?php echo the_title(); ?></div>
              <div class="team-member__info--tagline"><?php echo get_field('team_tagline'); ?></div>
              <div class="team-member__info--phone"><?php echo get_field('team_phone'); ?></div>
              <div class="team-member__info--email">
                <?php $post_slug = 'post_name'; ?>
                <a href="/team-member-contact-form/?team_member=<?php echo( basename(get_permalink()) ); ?>">Contact</a>
                <!-- <a href="mailto:<?php echo get_field('team_email'); ?>">Email</a> -->
              </div>
            </div>
          </div>
        <?php
        endwhile; endif;

        echo "</div>";
        echo "<hr>";
      endforeach;
    endforeach;
    echo "</div>";

  return ob_get_clean();
}
add_shortcode("team", "team_custom_shortcode");

function new_excerpt_more( $more ) {
  return ' ... <p><a class="list__item--btn" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Read More', 'your-text-domain' ) . '</a></p>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// custom excerpt length
function get_excerpt($limit){
  $excerpt = get_the_excerpt();
  $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $limit);
  // $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
  $excerpt = $excerpt.'...';
  return $excerpt;
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );

// Gravity Forms - Disable automatic anchor
add_filter( 'gform_confirmation_anchor', '__return_false' );
add_filter( 'gform_confirmation_anchor_10', '__return_true' );

add_filter('relevanssi_content_to_index', 'include_related_content', 10, 2);
add_filter('relevanssi_excerpt_content', 'include_related_content', 10, 2);

function include_related_content($content, $post) {
    $utilities = get_field_object('utilities_serviced', $post->ID);

    if (!empty($utilities) && is_array($utilities) && array_key_exists('value', $utilities)) {
        foreach ($utilities['value'] as $value) {
            $content = $content . ' ' . $value->post_title;
        }
    }

    // utility zip code
    $utilities_zip = get_field_object('utilities_zip-code', $post->ID);

    if (!empty($utilities_zip) && is_array($utilities_zip) && array_key_exists('value', $utilities_zip)) {
      foreach ($utilities_zip['value'] as $value) {
        $content = $content . ' ' . $value->post_title;
      }
    }

  return $content;
}

/*
Insert this script into functions.php in your WordPress theme (be cognizant of the opening and closing php tags) to allow field groups in Gravity Forms. The script will create two new field types - Open Group and Close Group. Add classes to your Open Group fields to style your groups.

Note that there is a stray (but empty) <li> element created. It is given the class "fieldgroup_extra_li" so that you can hide it in your CSS if needed.
*/
add_filter("gform_add_field_buttons", "add_fieldgroup_fields");
function add_fieldgroup_fields($field_groups){

    foreach($field_groups as &$group){
        if($group["name"] == "standard_fields"){
            $group["fields"][] = array("class"=>"button", "value" => __("Open Group", "gravityforms"), "onclick" => "StartAddField('fieldgroupopen');");
            $group["fields"][] = array("class"=>"button", "value" => __("Close Group", "gravityforms"), "onclick" => "StartAddField('fieldgroupclose');");
            break;
        }
    }
    return $field_groups;
}

// Add title to the Field Group fields
add_filter( 'gform_field_type_title' , 'field_group_titles' );
function field_group_titles( $type ) {
    if ( $type == 'fieldgroupopen' ) {
        return __( 'Open Field Group' , 'gravityforms' );
    } else if ( $type == 'fieldgroupclose' ) {
        return __( 'Close Field Group' , 'gravityforms' );
    }
}

add_filter("gform_field_content", "create_gf_field_group", 10, 5);
function create_gf_field_group($content, $field, $value, $lead_id, $form_id){
    if ( ! is_admin() ) {
        if(rgar($field,"type") == "fieldgroupopen"){
            $content = "<ul class='field_group_close'><li style='display: none;'>";
        }
        else if(rgar($field,"type") == "fieldgroupclose"){
            $content = "</li></ul><!-- close field group --><li style='display: none;'>";
        }
    }
    return $content;
}

// Add a CSS class to the Field Group Close field so we can hide the extra <li> that is created.
add_action("gform_field_css_class", "close_field_group_class", 10, 3);
function close_field_group_class($classes, $field, $form){
    if($field["type"] == "fieldgroupclose"){
        $classes .= " fieldgroup_extra_li";
    }
    return $classes;
}

add_action("gform_editor_js_set_default_values", "field_group_default_labels");
function field_group_default_labels(){
    ?>
    case "fieldgroupopen" :
        field.label = "Field Group Open";
    break;
    case "fieldgroupclose" :
        field.label = "Field Group Close";
    break;
    <?php
}

add_action("gform_editor_js", "allow_fieldgroup_settings");
function allow_fieldgroup_settings(){
    ?>
    <script type='text/javascript'>
        fieldSettings["fieldgroupopen"] = fieldSettings["text"] + ", .cssClass";
        fieldSettings["fieldgroupclose"] = fieldSettings["text"] + ", .cssClass";
    </script>
    <?php
}

/*
Adds in grouping field that will output fields horizontally.
*/
add_filter("gform_add_field_buttons", "add_h_fieldgroup_fields");
function add_h_fieldgroup_fields($field_groups){

    foreach($field_groups as &$group){
        if($group["name"] == "standard_fields"){
            $group["fields"][] = array("class"=>"button", "value" => __("Open Horizontal Group", "gravityforms"), "onclick" => "StartAddField('fieldhgroupopen');");
            $group["fields"][] = array("class"=>"button", "value" => __("Close Horizontal Group", "gravityforms"), "onclick" => "StartAddField('fieldhgroupclose');");
            break;
        }
    }
    return $field_groups;
}

// Add title to the Field Group fields
add_filter( 'gform_field_type_title' , 'field_h_group_titles' );
function field_h_group_titles( $type ) {
    if ( $type == 'fieldhgroupopen' ) {
        return __( 'Open Horizontal Group' , 'gravityforms' );
    } else if ( $type == 'fieldhgroupclose' ) {
        return __( 'Close Horizontal Group' , 'gravityforms' );
    }
}

add_filter("gform_field_content", "create_gf_h_field_group", 10, 5);
function create_gf_h_field_group($content, $field, $value, $lead_id, $form_id){
    if ( ! is_admin() ) {
        if(rgar($field,"type") == "fieldhgroupopen"){
            $content = "<ul class='horizontal_group'><li style='display: none;'>";
        }
        else if(rgar($field,"type") == "fieldhgroupclose"){
            $content = "</li></ul><!-- close horizontal group --><li style='display: none;'>";
        }
    }
    return $content;
}

// Add a CSS class to the Field Group Close field so we can hide the extra <li> that is created.
add_action("gform_field_css_class", "close_field_h_group_class", 10, 3);
function close_field_h_group_class($classes, $field, $form){
    if($field["type"] == "fieldhgroupclose"){
        $classes .= " fieldgroup_extra_li";
    }
    return $classes;
}

add_action("gform_editor_js_set_default_values", "field_h_group_default_labels");
function field_h_group_default_labels(){
    ?>
    case "fieldhgroupopen" :
        field.label = "Field Horizontal Open";
    break;
    case "fieldhgroupclose" :
        field.label = "Field Horizontal Close";
    break;
    <?php
}

add_action("gform_editor_js", "allow_h_fieldgroup_settings");
function allow_h_fieldgroup_settings(){
    ?>
    <script type='text/javascript'>
        fieldSettings["fieldhgroupopen"] = fieldSettings["text"] + ", .cssClass";
        fieldSettings["fieldhgroupclose"] = fieldSettings["text"] + ", .cssClass";
    </script>
    <?php
}

add_filter( 'gform_address_types', 'restricted_us_address', 10, 2 );
function restricted_us_address( $address_types, $form_id ) {
    $address_types['restricted_us'] = array(
        'label'       => 'Restricted United States',
        'country'     => 'United States',
        'zip_label'   => 'Zip Code',
        'state_label' => 'State',
        'states'      => array(
            '', 'Oregon', 'Idaho', 'Washington', 'Montana',
        )
    );

    return $address_types;
}


/*
* The Events Calendar - Yoast SEO - Prevent Yoast from changing Event Title Tags for Event Views (Month, List, Etc,)
* @TEC - 3.11
* @Yoast - 2.3.4
*/
add_action( 'pre_get_posts', 'tribe_remove_wpseo_title_rewrite', 20 );
function tribe_remove_wpseo_title_rewrite() {
	if ( class_exists( 'Tribe__Events__Main' ) && class_exists( 'Tribe__Events__Pro__Main' ) ) {
		if( tribe_is_month() || tribe_is_upcoming() || tribe_is_past() || tribe_is_day() || tribe_is_map() || tribe_is_photo() || tribe_is_week() ) {
			$wpseo_front = WPSEO_Frontend::get_instance();
			remove_filter( 'wp_title', array( $wpseo_front, 'title' ), 15 );
		}
		if( tribe_is_month() ) {
		  add_filter( 'wp_title', 'wp_title_for_month_view', 50 );
		}
	} elseif ( class_exists( 'Tribe__Events__Main' ) && !class_exists( 'Tribe__Events__Pro__Main' ) ) {
		if( tribe_is_month() || tribe_is_upcoming() || tribe_is_past() || tribe_is_day() ) {
			$wpseo_front = WPSEO_Frontend::get_instance();
			remove_filter( 'wp_title', array( $wpseo_front, 'title' ), 15 );
		}
		if( tribe_is_month() ) {
		  add_filter( 'wp_title', 'wp_title_for_month_view', 50 );
		}
	}
};

/**
 * Customize the title for the home page, if one is not set.
 *
 * @param string $title The original title.
 * @return string The title to use.
 */
function wp_title_for_month_view( $title )
{
  return 'Regional Lighting Training | Northwest Lighting Network';
}

add_image_size( 'blog-thumb', 725, 395, true );

/* ====================
   POPULAR POSTS
   ==================== */

function popular_posts($post_id) {
	$count_key = 'post_views_count';
	$count = get_post_meta($post_id, $count_key, true);
	if ($count == '') {
		$count = 0;
		delete_post_meta($post_id, $count_key);
		add_post_meta($post_id, $count_key, '0');
	} else {
		$count++;
		update_post_meta($post_id, $count_key, $count);
	}
}
function track_posts($post_id) {
	if (!is_single()) return;
	if (empty($post_id)) {
		global $post;
		$post_id = $post->ID;
	}
	popular_posts($post_id);
}
add_action('wp_head', 'track_posts');



/* =============================
Populate Utility Email Address
=============================== */
add_filter( 'gform_field_value_utility', 'populate_utility' );
function populate_utility( $value ) {
  wp_reset_query(); 
  wp_reset_postdata(); 
  global $post;
  
  //get 'utility' value passed through to form page (via URL parameter)
  if ( isset ( $_GET["utility"] )) {
    
    //look up post by slug (provided via URL parameter)
    $the_slug = $_GET["utility"];
    
    $args = array(
      'name'        => $the_slug,
      'post_type'   => 'utilities',
      'post_status' => 'publish',
      'numberposts' => 1
    );
    
    $utilities_post = get_posts($args);
    
    if( $utilities_post ) : 
    
      //get custom field that contains utility email address used for sending
      $utility_email_address = get_field('utility_email_address',$utilities_post[0]->ID);
    
      //populate 'utility' field dynamically, using custom field value from above
      return $utility_email_address;
    
    endif; 
    }
}

/* =============================
Populate Team Member Email Address
=============================== */
add_filter( 'gform_field_value_team_member', 'populate_team_member' );
function populate_team_member( $value ) {
  wp_reset_query(); 
  wp_reset_postdata(); 
  global $post;
  
  //get 'team_member' value passed through to form page (via URL parameter)
  if ( isset ( $_GET["team_member"] )) {
    
    //look up post by slug (provided via URL parameter)
    $the_slug = $_GET["team_member"];
    
    $args = array(
      'name'        => $the_slug,
      'post_type'   => 'team',
      'post_status' => 'publish',
      'numberposts' => 1
    );
    
    $team_member_post = get_posts($args);
    
    if( $team_member_post ) : 
    
      //get custom field that contains utility email address used for sending
      $team_member_email_address = get_field('team_email',$team_member_post[0]->ID);
    
      //populate 'team_member' field dynamically, using custom field value from above
      return $team_member_email_address;
    
    endif; 
    }
}

// tooltip event url

function additional_tooltip_fields( $json, $event, $additional ){
    //important to deal with empty values
    $json['event_website'] = '';
     
    // make the magic happen
    $url = tribe_get_event_website_link( $event );
    if ( $url ) {
        $json['event_website'] = tribe_get_event_website_url( $url );
    }
         
    return $json;
}
add_filter( 'tribe_events_template_data_array', 'additional_tooltip_fields', 10, 3 );



 
/**
 * Modify Event Title
 */
function filter_events_title( $title ) {
	if ( tribe_is_month() && !is_tax() ) {
		$title = 'Northwest Lighting Network - Contractor Training';
	}
	return $title;
} 
// add_filter('wpseo_title', 'filter_events_title' ); 


function custom_button_example($wp_admin_bar){
$args = array(
'id' => 'zipcode-sync',
'title' => 'Zipcode Sync',
'href' => '/app/themes/nwln/zipcode.php',
'meta' => array(
'class' => 'zipcode-sync',
  'target' => '_blank'
)
);
$wp_admin_bar->add_node($args);
}

add_action('admin_bar_menu', 'custom_button_example', 99);

add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return get_template_directory_uri()."/assets/img/spinner-icon-0.gif";
}