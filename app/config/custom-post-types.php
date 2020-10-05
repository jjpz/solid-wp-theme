<?php
// Awards
function cpt_awards () {
	$labels = array(
		'name'                  => _x('Awards', 'Post Type General Name', 'solid'),
		'singular_name'         => _x('Award', 'Post Type Singular Name', 'solid'),
		'menu_name'             => __('Awards', 'solid'),
		'name_admin_bar'        => __('Award', 'solid'),
		'archives'              => __('Item Archives', 'solid'),
		'attributes'            => __('Item Attributes', 'solid'),
		'parent_item_colon'     => __('Parent Item:', 'solid'),
		'all_items'             => __('All Awards', 'solid'),
		'add_new_item'          => __('Add New Item', 'solid'),
		'add_new'               => __('Add New', 'solid'),
		'new_item'              => __('New Item', 'solid'),
		'edit_item'             => __('Edit Item', 'solid'),
		'update_item'           => __('Update Item', 'solid'),
		'view_item'             => __('View Item', 'solid'),
		'view_items'            => __('View Items', 'solid'),
		'search_items'          => __('Search Item', 'solid'),
		'not_found'             => __('Not found', 'solid'),
		'not_found_in_trash'    => __('Not found in Trash', 'solid'),
		'featured_image'        => __('Featured Image', 'solid'),
		'set_featured_image'    => __('Set featured image', 'solid'),
		'remove_featured_image' => __('Remove featured image', 'solid'),
		'use_featured_image'    => __('Use as featured image', 'solid'),
		'insert_into_item'      => __('Insert into item', 'solid'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'solid'),
		'items_list'            => __('Items list', 'solid'),
		'items_list_navigation' => __('Items list navigation', 'solid'),
		'filter_items_list'     => __('Filter items list', 'solid')
	);
	$rewrite = array(
		'slug'                  => 'awards',
		'with_front'            => true,
		'feeds'                 => false,
		'pages'                 => true
	);
	$args = array(
		'label'                 => __('Award', 'solid'),
		'labels'                => $labels,
		'description'           => __('Awards', 'solid'),
		'public'                => true,
		'hierarchical'          => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_in_admin_bar'     => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-awards',
		'capability_type'       => 'post',
		'supports'              => array('title', 'editor', 'revisions', 'page-attributes'),
		'taxonomies'            => array(),
		'has_archive'           => false,
		'can_export'            => true,
		'rewrite'               => $rewrite
	);
	register_post_type('award', $args);
}
add_action('init', 'cpt_awards', 0);

// Services
function cpt_services () {
	$labels = array(
		'name'                  => _x('Services', 'Post Type General Name', 'solid'),
		'singular_name'         => _x('Service', 'Post Type Singular Name', 'solid'),
		'menu_name'             => __('Services', 'solid'),
		'name_admin_bar'        => __('Service', 'solid'),
		'archives'              => __('Item Archives', 'solid'),
		'attributes'            => __('Item Attributes', 'solid'),
		'parent_item_colon'     => __('Parent Item:', 'solid'),
		'all_items'             => __('All Services', 'solid'),
		'add_new_item'          => __('Add New Item', 'solid'),
		'add_new'               => __('Add New', 'solid'),
		'new_item'              => __('New Item', 'solid'),
		'edit_item'             => __('Edit Item', 'solid'),
		'update_item'           => __('Update Item', 'solid'),
		'view_item'             => __('View Item', 'solid'),
		'view_items'            => __('View Items', 'solid'),
		'search_items'          => __('Search Item', 'solid'),
		'not_found'             => __('Not found', 'solid'),
		'not_found_in_trash'    => __('Not found in Trash', 'solid'),
		'featured_image'        => __('Featured Image', 'solid'),
		'set_featured_image'    => __('Set featured image', 'solid'),
		'remove_featured_image' => __('Remove featured image', 'solid'),
		'use_featured_image'    => __('Use as featured image', 'solid'),
		'insert_into_item'      => __('Insert into item', 'solid'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'solid'),
		'items_list'            => __('Items list', 'solid'),
		'items_list_navigation' => __('Items list navigation', 'solid'),
		'filter_items_list'     => __('Filter items list', 'solid')
	);
	$rewrite = array(
		'slug'                  => 'services',
		'with_front'            => true,
		'feeds'                 => false,
		'pages'                 => true
	);
	$args = array(
		'label'                 => __('Service', 'solid'),
		'labels'                => $labels,
		'description'           => __('Services', 'solid'),
		'public'                => true,
		'hierarchical'          => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_in_admin_bar'     => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'capability_type'       => 'post',
		'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
		'taxonomies'            => array(),
		'has_archive'           => false,
		'can_export'            => true,
		'rewrite'               => $rewrite
	);
	register_post_type('service', $args);
}
add_action('init', 'cpt_services', 0);

// Team Members
function cpt_team () {
	$labels = array(
		'name'                  => _x('Team Members', 'Post Type General Name', 'solid'),
		'singular_name'         => _x('Team Member', 'Post Type Singular Name', 'solid'),
		'menu_name'             => __('Team', 'solid'),
		'name_admin_bar'        => __('Team Member', 'solid'),
		'archives'              => __('Item Archives', 'solid'),
		'attributes'            => __('Item Attributes', 'solid'),
		'parent_item_colon'     => __('Parent Item:', 'solid'),
		'all_items'             => __('All Team Members', 'solid'),
		'add_new_item'          => __('Add New Item', 'solid'),
		'add_new'               => __('Add New', 'solid'),
		'new_item'              => __('New Item', 'solid'),
		'edit_item'             => __('Edit Item', 'solid'),
		'update_item'           => __('Update Item', 'solid'),
		'view_item'             => __('View Item', 'solid'),
		'view_items'            => __('View Items', 'solid'),
		'search_items'          => __('Search Item', 'solid'),
		'not_found'             => __('Not found', 'solid'),
		'not_found_in_trash'    => __('Not found in Trash', 'solid'),
		'featured_image'        => __('Featured Image', 'solid'),
		'set_featured_image'    => __('Set featured image', 'solid'),
		'remove_featured_image' => __('Remove featured image', 'solid'),
		'use_featured_image'    => __('Use as featured image', 'solid'),
		'insert_into_item'      => __('Insert into item', 'solid'),
		'uploaded_to_this_item' => __('Uploaded to this item', 'solid'),
		'items_list'            => __('Items list', 'solid'),
		'items_list_navigation' => __('Items list navigation', 'solid'),
		'filter_items_list'     => __('Filter items list', 'solid')
	);
	$rewrite = array(
		'slug'                  => 'team',
		'with_front'            => true,
		'feeds'                 => false,
		'pages'                 => true
	);
	$args = array(
		'label'                 => __('Team Member', 'solid'),
		'labels'                => $labels,
		'description'           => __('Team Members', 'solid'),
		'public'                => true,
		'hierarchical'          => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'show_in_nav_menus'     => true,
		'show_in_admin_bar'     => true,
		'show_in_rest'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'capability_type'       => 'post',
		'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
		'taxonomies'            => array(),
		'has_archive'           => false,
		'can_export'            => true,
		'rewrite'               => $rewrite
	);
	register_post_type('member', $args);
}
add_action('init', 'cpt_team', 0);