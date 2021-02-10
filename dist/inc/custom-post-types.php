<?php
// Awards
function cpt_awards () {
	$labels = array(
		'singular_name'         => __('Award', 'solid'),
		'all_items'             => __('All Awards', 'solid'),
	);
	$rewrite = array(
		'slug'                  => 'awards',
		'with_front'            => true,
		'feeds'                 => false,
		'pages'                 => true
	);
	$args = array(
		'label'                 => __('Awards', 'solid'),
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
		'singular_name'         => __('Service', 'solid'),
		'all_items'             => __('All Services', 'solid'),
	);
	$rewrite = array(
		'slug'                  => 'services',
		'with_front'            => true,
		'feeds'                 => false,
		'pages'                 => true
	);
	$args = array(
		'label'                 => __('Services', 'solid'),
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

// Members
function cpt_members () {
	$labels = array(
		'singular_name'         => __('Member', 'solid'),
		'all_items'             => __('All Members', 'solid'),
	);
	$rewrite = array(
		'slug'                  => 'team',
		'with_front'            => true,
		'feeds'                 => false,
		'pages'                 => true
	);
	$args = array(
		'label'                 => __('Team', 'solid'),
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
		'menu_icon'             => 'dashicons-groups',
		'capability_type'       => 'post',
		'supports'              => array('title', 'editor', 'thumbnail', 'revisions', 'page-attributes'),
		'taxonomies'            => array(),
		'has_archive'           => false,
		'can_export'            => true,
		'rewrite'               => $rewrite
	);
	register_post_type('member', $args);
}
add_action('init', 'cpt_members', 0);