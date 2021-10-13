<?php

add_action( 'init', 'car_post_type', 0 );

function car_post_type() {
// Set UI labels
  $labels = array(
    'name'                => 'Cars',
    'singular_name'       => 'Car',
    'menu_name'           => 'Cars',
    'parent_item_colon'   => 'Parent Car',
    'all_items'           => 'All Cars',
    'view_item'           => 'View Car',
    'add_new_item'        => 'Add New Car',
    'add_new'             => 'Add Car',
    'edit_item'           => 'Edit Car',
    'update_item'         => 'Update Car',
    'search_items'        => 'Search Cars',
    'not_found'           => 'No Cars Found',
    'not_found_in_trash'  => 'No Cars Found in Trash',
  );
  
// Set other options
  $args = array(
    'label'               => 'cars',
    'description'         => 'cars',
    'labels'              => $labels,
    // Features this CPT supports in Post Editor
    'supports'            => array( 'title', 'editor', 'author' ),
    'hierarchical'        => false,
    'public'              => true,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'show_in_nav_menus'   => true,
    'show_in_admin_bar'   => true,
    'menu_position'       => 5,
    'can_export'          => true,
    'has_archive'         => true,
    'exclude_from_search' => false,
    'publicly_queryable'  => true,
    'capability_type'     => 'page',
    'menu_icon'           => 'dashicons-car'
  );
  
//Register the CPT
  register_post_type( 'car', $args );
}

?>