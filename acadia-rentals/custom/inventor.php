<?php
// add amenities to logding & vacation-rentals
add_action('plugins_loaded','register_taxs');
function register_taxs () {
  $tax = 'property-amenities';
  if (taxonomy_exists( $tax )) {
    register_taxonomy_for_object_type ($tax, array('lodging', 'vacation-homes'));
  }
}


// add the properties metabox for
