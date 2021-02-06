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

// Fetch and print from database
global $wpdb;

$cfs = $wpdb->get_results( "SELECT * FROM $wpdb->options WHERE option_name LIKE '_crb_%_pt'" );
//print_r($cfs);

$alloptions = $wpdb->get_results( "SELECT option_name, option_value FROM $wpdb->options WHERE autoload = 'no'" );
$options = array();
foreach ($alloptions as $o) {
    $options[$o->option_name] = $o->option_value;
}
//print_r($options);
foreach ($options as $key => $value) {
    if (substr($key, -3) === '_pt') {
        //echo '<pre>';
        //print_r($value);
        //echo '</pre>';
    }
}

$post_types = get_post_types(array('_builtin' => false), 'objects', 'and');
// echo '<pre>'; print_r($post_types); echo '</pre>';

global $q;
$q = new WP_Query(array(
    'post_type'      => array('award', 'service', 'member'),
    'post_status'    => 'publish',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC'
));

if ( ! function_exists( 'getItems' ) ) {
    function getItems( $post_type ) {
		global $q;
        $posts = [];
        if ($q->have_posts()) {
            while ($q->have_posts()) {
                $q->the_post();
                if ($q->post->post_type === $post_type) {
                    array_push($posts, $q->post);
                }
            }
            wp_reset_postdata();
        }
        return $posts;
    }
}

if ( ! function_exists( 'getHomeSection' ) ) {
	function getHomeSection( $post_type, $section, array $sectionClasses = null ) {

		$t = '_crb_home_' . $post_type . '_title';
		$p = '_crb_home_' . $post_type . '_paragraph';

		${'title' . crb_lang_slug()}     = get_option($t . crb_lang_slug());
		${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option($p . crb_lang_slug()));

		$posts = getItems($post_type);

		if ( 
			!empty($posts) || 
			!empty(${'title' . crb_lang_slug()}) || 
			!empty(${'paragraph' . crb_lang_slug()}) 
		) {

			$start  = getSectionStart($section, $sectionClasses);
			$header = getSectionHeader(${'title' . crb_lang_slug()}, ${'paragraph' . crb_lang_slug()});
			$body   = getSectionBody($post_type, $posts);
			$end    = getSectionEnd();

			$html = $start . $header . $body . $end;

			echo $html;

		}

	}
}

if ( ! function_exists( 'getSectionStart' ) ) {
	function getSectionStart( $section, array $sectionClasses = null ) {
		if ($sectionClasses) {
			$sectionClass = implode(' ', $sectionClasses);
			$sectionClass = ' ' . $sectionClass . ' ';
		} else {
			$sectionClass = ' ';
		}
		echo '<section id="' . $section . '" class="home-section' . $sectionClass . 'home-' . $section . '">';
	}
}

if ( ! function_exists( 'getSectionEnd' ) ) {
	function getSectionEnd() {
		echo '</section>';
	}
}

if ( ! function_exists( 'getSectionHeader' ) ) {
	function getSectionHeader( $title = '', $paragraph = '' ) {

		if (!empty($title)) {
			$h = '<h3 class="h3 section-title">' . $title . '</h3>';
		} else {
			$h = '';
		}

		if (!empty($paragraph)) {
			$p = '<div class="section-paragraph">' . $paragraph . '</div>';
		} else {
			$p = '';
		}

		if (!empty($title) || !empty($paragraph)) {
			$headerStart = 
			'<header class="section-header">
			<div class="container">
			<div class="row">
			<div class="col-lg-8 offset-lg-2">';
			$title = $h; 
			$paragraph = $p;
			$headerEnd = 
			'</div>
			</div>
			</div>
			</header>';
		}

		$html = $headerStart . $title . $paragraph . $headerEnd;

		echo $html;

	}
}

if ( ! function_exists( 'getSectionBody' ) ) {
	function getSectionBody( $post_type, $posts = '' ) {
		$path = 'templates/front-page/home-' . $post_type;
		if (!empty($posts)) {
			// include(locate_template('templates/front-page/home-service.php'));
			get_template_part($path, null, $posts);
		}
	}
}

// Display optimally sized images with mobile/desktop options
if ( ! function_exists( 'getImage' ) ) {
	function getImage( $mainImgId = '', $mobileImgId = '', array $divClasses = NULL, array $imgClasses = NULL, bool $lazyLoad = false, array $lazyClasses = NULL ) {

		$mobileSrc = '';
		$mobileSrcset = '';
		$mobileType = '';
		$mobileAlt = '';

		if (!empty($mainImgId)) {
			$mainSrc = wp_get_attachment_image_src($mainImgId, 'full')[0];
			$mainSrcset = wp_get_attachment_image_srcset($mainImgId, 'full');
			$mainType = pathinfo($mainSrc)['extension'];
			$mainAlt = get_post_meta( $mainImgId, '_wp_attachment_image_alt', true);
		}

		if (!empty($mobileImgId)) {
			$mobileSrc = wp_get_attachment_image_src($mobileImgId, 'full')[0];
			$mobileSrcset = wp_get_attachment_image_srcset($mobileImgId, 'full');
			$mobileType = pathinfo($mobileSrc)['extension'];
			$mobileAlt = get_post_meta( $mobileImgId, '_wp_attachment_image_alt', true);
		}

		if ($divClasses) {
			$divClass = implode(' ', $divClasses);
			$divClass = ' ' . $divClass;
		} else {
			$divClass = '';
		}

		if ($imgClasses) {
			$imgClass = implode(' ', $imgClasses);
			if ($lazyLoad) {
				$imgClass = $imgClass . ' lazy';
			}
		} else {
			if ($lazyLoad) {
				$imgClass = 'lazy';
			} else {
				$imgClass = '';
			}
		}

		if ($lazyClasses) {
			$lazyClass = implode(' ', $lazyClasses);
			$lazyClass = ' ' . $lazyClass . ' ';
		} else {
			$lazyClass = ' ';
		}
		
		$divStart = '<div class="image' . $divClass . '">';
			$img = '<img 
				class="' . $imgClass . '" 
				src="" 
				srcset="" 
				alt="" 
				data-src="' . $mainSrc . '" 
				data-srcset="' . $mainSrcset . '" 
				data-alt="' . $mainAlt . '" 
				data-type="' . $mainType . '" 
				data-mobile-src="' . $mobileSrc . '" 
				data-mobile-srcset="' . $mobileSrcset . '" 
				data-mobile-alt="' . $mobileAlt . '" 
				data-mobile-type="' . $mobileType . '" 
			/>';
			$lazyOverlay = '<div class="lazy-overlay' . $lazyClass . 'on"></div>';
		$divEnd = '</div>';

		if (!$lazyLoad) { 
			$html = $divStart . $img . $divEnd;
		} else {
			$html = $divStart . $img . $lazyOverlay . $divEnd;
		}

		echo $html;

	}
}

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

//add_action( 'transition_post_status', 'wpse118970_post_status_new', 10, 3 );
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
//add_action( 'init', 'private_posts_subscribers' );

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