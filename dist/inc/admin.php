<?php
// Admin CSS + JS
add_action('admin_enqueue_scripts', 'solid_admin_scripts');
function solid_admin_scripts() {
    wp_enqueue_style('admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), '1.0.0');
}

// Admin login logo
//add_action('login_enqueue_scripts', 'solid_admin_login_logo');
function solid_admin_login_logo() {
	?><style type="text/css">
    #login h1 a,
    .login h1 a {
        background-image: url(<?php echo get_template_directory_uri();
        ?>/assets/images/admin-login-logo.svg);
        background-size: contain;
        background-position: center top;
        background-repeat: no-repeat;
        width: 100%;
        margin: 0 auto;
    }
</style><?php
}

// Admin login logo URL
add_filter('login_headerurl', function () {
	return home_url();
});

// Admin login logo text
add_filter('login_headertext', function () {
	return get_bloginfo('name');
});

// Admin favicon
//add_filter('admin_head', 'solid_admin_favicon');
function solid_admin_favicon() {
	echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/favicons/favicon.ico">';
}

add_action( 'init', 'cp_change_post_object' );
// Change dashboard Posts to Blog Posts
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'Blog Posts';
        $labels->menu_name = 'Blog Posts';
        $labels->all_items = 'All Blog Posts';
}