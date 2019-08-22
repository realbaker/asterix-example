<?php 
require_once("../../../wp/wp-load.php");

function get_id_by_slug($page_slug) {
	$page = get_page_by_path($page_slug);
	if ($page) {
		return $page->ID;
	} else {
		return null;
	}
}

$url = 'https://utility-db.neea.org/api/utilities?api_key=93f7d293-4a06-4b74-8520-1fa888976e78&paginate=false';
$json = file_get_contents($url, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
$json_data = json_decode($json, true);
foreach ($json_data['data'] as $value) { 
  $slug = $value['slug'];
  if ( $post = get_page_by_path( $slug, OBJECT, 'utilities' ) ) {
    $post_id = $post->ID;    
    $service_areas = implode(', ', $value['serviceAreas']);
    $tag = $service_areas;
    $taxonomy = 'utility-zip-codes';
    wp_set_post_terms( $post_id, $tag, $taxonomy ); 
  }
}
echo 'Zipcode data has synced successfully.'; ?>