<?php
// Register Team Post Type
function create_team_post_type() {
    $labels = array(
      'name' => __( 'Team' ),
      'singular_name' => __( 'Team' ),
      'add_new' => __( 'New Member' ),
      'add_new_item' => __( 'Add New Member' ),
      'edit_item' => __( 'Edit Employee' ),
      'new_item' => __( 'New Member' ),
      'view_item' => __( 'View Member' ),
      'search_items' => __( 'Search teammate' ),
      'not_found' =>  __( 'No teammate Found' ),
      'not_found_in_trash' => __( 'No teammate found in Trash' ),
      );
    $args = array(
      'labels' => $labels,
      'has_archive' => true,
      'public' => true,
      'hierarchical' => false,
      'menu_position' => 5,
      'menu_icon' => 'dashicons-cart',
      'show_ui'             => true,
      'show_in_menu'        => true,
      'show_in_nav_menus'   => true,
      'show_in_admin_bar'   => true,
      'menu_icon'           => 'dashicons-groups',
      'can_export'          => true,
      'exclude_from_search' => false,
      'publicly_queryable'  => true,
      'capability_type'     => 'page',
      'supports' => array(
        'title',
        'excerpt',
        'custom-fields',
        'thumbnail',
        'trackbacks',
        'comments',
        'author',
        'page-attributes'
        ),
      );
    register_post_type( 'team', $args );
  }
  add_action( 'init', 'create_team_post_type' );

  function team_register_taxonomy() {
    register_taxonomy( 'team_category', 'team',
      array(
        'labels' => array(
          'name'              => 'Member Locations',
          'singular_name'     => 'Member Location',
          'search_items'      => 'Search Member Locations',
          'all_items'         => 'All Member Locations',
          'edit_item'         => 'Edit Member Locations',
          'update_item'       => 'Update Member Location',
          'add_new_item'      => 'Add New Member Location',
          'new_item_name'     => 'New Member Location Name',
          'menu_name'         => 'Member Location',
          ),
        'hierarchical' => true,
        'sort' => true,
        'args' => array( 'orderby' => 'term_order' ),
        'show_admin_column' => true
        )
      );
  }
  add_action( 'init', 'team_register_taxonomy' );

       /**
     * Post Type: Reviews.
     */

    $labels = [
      'name' => __( 'Customer Reviews' ),
      'singular_name' => __( 'Customer Review' ),
      'add_new' => __( 'New Customer Review' ),
      'add_new_item' => __( 'Add New Customer Review' ),
      'edit_item' => __( 'Edit Customer Review' ),
      'new_item' => __( 'New Customer Review' ),
      'view_item' => __( 'View Customer Review' ),
      'search_items' => __( 'Search customer review' ),
      'not_found' =>  __( 'No customer review Found' ),
      'not_found_in_trash' => __( 'No customer review found in Trash' ),
  ];

  $args = [
      "label" => __( "customer_reviews"),
      "labels" => $labels,
      "description" => "Customer review",
      "public" => true,
      "publicly_queryable" => true,
      "show_ui" => true,
      "show_in_rest" => true,
      "rest_base" => "",
      "rest_controller_class" => "WP_REST_Posts_Controller",
      "has_archive" => false,
      "show_in_menu" => true,
      "show_in_nav_menus" => true,
      "delete_with_user" => false,
      "exclude_from_search" => false,
      "capability_type" => "post",
      "map_meta_cap" => true,
      "hierarchical" => false,
      "rewrite" => [ "slug" => "customer_reviews", "with_front" => true ],
      "query_var" => true,
      "menu_position" => 5,
      "menu_icon" => "dashicons-awards",
      "supports" => [ "title", "thumbnail", "excerpt", "trackbacks", "custom-fields", "author", "page-attributes", "post-formats" ],
      "taxonomies" => [ "category", "post_tag" ],
      "show_in_graphql" => false,
  ];

  register_post_type( "customer_reviews", $args );

// Register Tapahtumat Post Type
function create_tapahtumat_post_type() {
  $labels = array(
    'name' => __( 'Tapahtumat' ),
    'singular_name' => __( 'Tapahtumat' ),
    'add_new' => __( 'New tapahtumat' ),
    'add_new_item' => __( 'Add New Tapahtumat' ),
    'edit_item' => __( 'Edit tapahtumat' ),
    'new_item' => __( 'New Member' ),
    'view_item' => __( 'View Member' ),
    'search_items' => __( 'Search tapahtumat' ),
    'not_found' =>  __( 'No tapahtumat found' ),
    'not_found_in_trash' => __( 'No tapahtumat found in Trash' ),
    );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-location-alt',
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_icon'           => 'dashicons-location-alt',
    'can_export'          => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'supports' => array(
      'title',
      'excerpt',
      'custom-fields',
      'thumbnail',
      'trackbacks',
      'comments',
      'author',
      'page-attributes'
      ),
    );
  register_post_type( 'tapahtumat', $args );
}
add_action( 'init', 'create_tapahtumat_post_type' );

function tapahtumat_register_taxonomy() {
  register_taxonomy( 'events_cat', 'tapahtumat',
    array(
      'labels' => array(
        'name'              => 'Events Category',
        'singular_name'     => 'Event Category',
        'search_items'      => 'Search Events Category',
        'all_items'         => 'All Events Category',
        'edit_item'         => 'Edit Event Category',
        'update_item'       => 'Update Event Category',
        'add_new_item'      => 'Add New Event Category',
        'new_item_name'     => 'New Event Category Name',
        'menu_name'         => 'Events Category',
        ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
      )
    );
}
add_action( 'init', 'tapahtumat_register_taxonomy' );

function city_register_taxonomy() {
  register_taxonomy( 'citys', 'tapahtumat',
    array(
      'labels' => array(
        'name'              => 'City',
        'singular_name'     => 'City',
        'search_items'      => 'Search City',
        'all_items'         => 'All City',
        'edit_item'         => 'Edit City',
        'update_item'       => 'Update City',
        'add_new_item'      => 'Add New City',
        'new_item_name'     => 'New City Name',
        'menu_name'         => 'City',
        ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
      )
    );
}
add_action( 'init', 'city_register_taxonomy' );

// Register Sijainnit Post Type
function create_sijainnit_post_type() {
  $labels = array(
    'name' => __( 'Sijainnit' ),
    'singular_name' => __( 'Sijainnit' ),
    'add_new' => __( 'New Sijainnit Item' ),
    'add_new_item' => __( 'Add New Sijainnit Item' ),
    'edit_item' => __( 'Edit Sijainnit Item' ),
    'new_item' => __( 'New Sijainnit Item' ),
    'view_item' => __( 'View Sijainnit' ),
    'search_items' => __( 'Search Sijainnit' ),
    'not_found' =>  __( 'No Sijainnit Found' ),
    'not_found_in_trash' => __( 'No Sijainnit found in Trash' ),
    );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 5,
    'menu_icon' => 'dashicons-cart',
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_icon'           => 'dashicons-location',
    'can_export'          => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'supports' => array(
      'title',
      'excerpt',
      'custom-fields',
      'thumbnail',
      'trackbacks',
      'author',
      'page-attributes'
      ),
    );
  register_post_type( 'sijainnit', $args );
}
add_action( 'init', 'create_sijainnit_post_type' );

// Register Koulutusohjelmat Post Type
function create_koulutusohjelmat_post_type() {
  $labels = array(
    'name' => __( 'Koulutusohjelmat' ),
    'singular_name' => __( 'Koulutusohjelmat' ),
    'add_new' => __( 'New koulutusohjelmat' ),
    'add_new_item' => __( 'Add New Koulutusohjelmat' ),
    'edit_item' => __( 'Edit koulutusohjelmat' ),
    'new_item' => __( 'New Item' ),
    'view_item' => __( 'View Item' ),
    'search_items' => __( 'Search koulutusohjelmat' ),
    'not_found' =>  __( 'No koulutusohjelmat found' ),
    'not_found_in_trash' => __( 'No koulutusohjelmat found in Trash' ),
    );
  $args = array(
    'labels' => $labels,
    'has_archive' => true,
    'public' => true,
    'hierarchical' => false,
    'menu_position' => 4,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_icon'           => 'dashicons-welcome-learn-more',
    'can_export'          => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'supports' => array(
      'title',
      'excerpt',
      'custom-fields',
      'thumbnail',
      'author'
      ),
    );
  register_post_type( 'koulutusohjelmat', $args );
}
add_action( 'init', 'create_koulutusohjelmat_post_type' );

function koulutusohjelmat_register_taxonomy() {
  register_taxonomy( 'koulutusohjelmat_cat', 'koulutusohjelmat',
    array(
      'labels' => array(
        'name'              => 'Category',
        'singular_name'     => 'Category',
        'search_items'      => 'Search Category',
        'all_items'         => 'All Category',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Category',
        ),
      'hierarchical' => true,
      'sort' => true,
      'args' => array( 'orderby' => 'term_order' ),
      'show_admin_column' => true
      )
    );
}
add_action( 'init', 'koulutusohjelmat_register_taxonomy' );