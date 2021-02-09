<?php
add_filter('get_the_archive_title', 'change_category_title_prefix');
function change_category_title_prefix($title) {
    if (is_category()) {
        $title = single_cat_title( '', false );
    }
    return $title;
}

add_filter('private_title_format', 'change_private_title_prefix');
function change_private_title_prefix() {
    return '%s';
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

// add_action('transition_post_status', 'wpse118970_post_status_new', 10, 3);
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

// add_action('init', 'private_posts_subscribers');
function private_posts_subscribers() {
	$subRole = get_role( 'subscriber' );
	$subRole->add_cap( 'read_private_posts' );
}
?>