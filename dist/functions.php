<?php
// if (file_exists(__DIR__ . '/config')) {
// 	require_once __DIR__ . '/config/admin.php';
// 	require_once __DIR__ . '/config/disable.php';
// 	require_once __DIR__ . '/config/setup.php';
// 	require_once __DIR__ . '/config/scripts.php';
// 	require_once __DIR__ . '/config/carbon-fields.php';
// 	require_once __DIR__ . '/config/custom-post-types.php';
// } else {
// 	echo 'Error: The required directory does not exist, please check functions.php file.';
// }

$inc = get_template_directory() . '/inc/';

require $inc . 'setup.php';
require $inc . 'disable.php';
require $inc . 'admin.php';
require $inc . 'scripts.php';
require $inc . 'carbon-fields.php';
require $inc . 'custom-post-types.php';

require $inc . 'language-functions.php';
require $inc . 'template-tags.php';
require $inc . 'template-functions.php';
require $inc . 'front-page-functions.php';

function arrows_in_menus( $item_output, $item, $depth, $args ) {

	if ( in_array( 'menu-item-has-children', $item->classes ) ) {
		// $arrow = 0 == $depth ? '<i class="icon-angle-down"></i>' : '<i class="icon-angle-right"></i>';
        $arrow = '<svg class="svg-caret" width="5" height="13" viewBox="0 0 192 512"><path fill="currentColor" d="M0 384.662V127.338c0-17.818 21.543-26.741 34.142-14.142l128.662 128.662c7.81 7.81 7.81 20.474 0 28.284L34.142 398.804C21.543 411.404 0 402.48 0 384.662z"></path></svg>';
		$item_output = str_replace( '</a>', '</a><a class="submenu-toggle"><span class="icon-caret icon-caret-down">' . $arrow . '</span></a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'arrows_in_menus', 10, 4 );

// Fetch and print from database
// global $wpdb;

// $cfs = $wpdb->get_results( "SELECT * FROM $wpdb->options WHERE option_name LIKE '_crb_%_pt'" );
// print_r($cfs);

// $alloptions = $wpdb->get_results( "SELECT option_name, option_value FROM $wpdb->options WHERE autoload = 'no'" );
// $options = array();
// foreach ($alloptions as $o) {
//     $options[$o->option_name] = $o->option_value;
// }
// print_r($options);
// foreach ($options as $key => $value) {
//     if (substr($key, -3) === '_pt') {
//         echo '<pre>'; print_r($value); echo '</pre>';
//     }
// }
