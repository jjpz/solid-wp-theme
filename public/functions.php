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

// CUSTOM

function change_category_title_prefix($title) {
    if (is_category()) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter('get_the_archive_title', 'change_category_title_prefix');

function change_private_title_prefix() {
    return '%s';
}
add_filter('private_title_format', 'change_private_title_prefix');

if (!function_exists('solid_posted_on')) {
	function solid_posted_on() {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() )
		);
		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('Posted on %s', 'post date', 'solid'),
			$time_string
		);
		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if (!function_exists('solid_posted_by')) {
	function solid_posted_by() {
		$posted_by = sprintf(
			/* translators: %s: post author. */
			esc_html_x('by %s', 'post author', 'solid'),
			'<span class="entry-author">' . esc_html(get_the_author()) . '</span>'
		);
		echo '<span class="posted-by"> ' . $posted_by . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

add_action('wp', 'private_redirect', 0);
function private_redirect() {
	global $wp_query;
	$status = '';
	$object = $wp_query->queried_object;
	if ($object) {
		$status = $object->post_status;
		if ($status === 'private' && !is_user_logged_in()) {
			wp_redirect(wp_login_url($_SERVER['REQUEST_URI']));
		}
	}
}

add_action( 'transition_post_status', 'wpse118970_post_status_new', 10, 3 );
function wpse118970_post_status_new( $new_status, $old_status, $post ) { 
    if ( $post->post_type == 'post' && $new_status == 'publish' && $old_status != $new_status ) {
        $post->post_status = 'private';
		wp_update_post( $post );
		$subscribers = get_users( array ( 'role' => 'subscriber' ) );
		$emails      = array ();

    foreach ( $subscribers as $subscriber ) {
		$emails[] = $subscriber->user_email;
	}

    $body = sprintf( 'Hey there is a new entry!
        See <%s>',
        get_permalink( $post )
    );

    wp_mail( $emails, 'New entry!', $body );
    }
}

function private_posts_subscribers() {
	$subRole = get_role( 'subscriber' );
	$subRole->add_cap( 'read_private_posts' );
}
add_action( 'init', 'private_posts_subscribers' );

//add_action('admin_init', 'check_lang');
function check_lang () {
	$code = ICL_LANGUAGE_CODE;
	$default = pll_default_language('slug');
	$current = pll_current_language('slug');
	print_r($current);
}

function crb_lang_name() {
	$suffix = '';
	if (function_exists('pll_current_language')) {
		$current = pll_current_language('name');
	}
	if (!defined('ICL_LANGUAGE_CODE')) {
        return $suffix;
    } else {
		if (ICL_LANGUAGE_CODE === 'all') {
			return $suffix;
		} else {
			$suffix = ' - ' . $current;
			return $suffix;
		}
	}
}

function crb_lang_slug() {
	$suffix = '';
	if (function_exists('pll_default_language')) {
		$default = pll_default_language('slug');
	}
    if (!defined('ICL_LANGUAGE_CODE')) {
        return $suffix;
    } else {
		if (ICL_LANGUAGE_CODE === 'all') {
			$suffix = '_' . $default;
			return $suffix;
		} else {
			$suffix = '_' . ICL_LANGUAGE_CODE;
			return $suffix;
		}
	}
}