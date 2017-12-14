<?php
// add amenities to logding & vacation-rentals
add_action('plugins_loaded','register_taxs');
function register_taxs () {
  $tax = 'property-amenities';
  if (taxonomy_exists( $tax )) {
    register_taxonomy_for_object_type ($tax, array('lodging', 'vacation-homes'));
  }
}

// limit the number os social buttons
add_filter( 'inventor_metabox_social_networks', 'custom_social_networks', 10, 2 );

function custom_social_networks( $social_networks, $post_type ) {
    return array(
        'facebook'          => 'Facebook',
        'twitter'           => 'Twitter',
        'instagram'         => 'Instagram',
        'youtube'           => 'YouTube',
    );
}


// disable inside view & polygon
add_filter( 'inventor_metabox_field_enabled', 'disable_gmap_views', 10, 4 );
function disable_gmap_views( $enabled, $metabox_id, $field_id, $post_type ) {
    $nope = array('listing_inside_view', 'listing_map_location_polygon');
    if ( in_array($field_id, $nope )  ) {
        return false;
    }

    return $enabled;
}
