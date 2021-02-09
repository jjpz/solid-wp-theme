<?php
if (file_exists(__DIR__ . '/config')) {
	require_once __DIR__ . '/config/admin.php';
	require_once __DIR__ . '/config/disable.php';
	require_once __DIR__ . '/config/setup.php';
	require_once __DIR__ . '/config/scripts.php';
	require_once __DIR__ . '/config/carbon-fields.php';
	require_once __DIR__ . '/config/custom-post-types.php';
} else {
	echo 'Error: The required directory does not exist, please check functions.php file.';
}

require get_template_directory() . '/inc/language-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/front-page-functions.php';

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
