<?php
if ( ! function_exists( 'getSectionPosts' ) ) {
    function getSectionPosts( $custom_post_type ) {
		$query = new WP_Query(
			array(
				'update_post_meta_cache' => false,
				'update_post_term_cache' => false,
				'post_type'              => $custom_post_type,
				'post_status'            => 'publish',
				'posts_per_page'         => 24,
				'no_found_rows'          => true,
				'orderby'                => 'menu_order',
				'order'                  => 'ASC'
			)
		);

        return $query->posts;
    }
}

if ( ! function_exists( 'getSectionTitle' ) ) {
	function getSectionTitle( $custom_post_type ) {
		$t = '_crb_home_' . $custom_post_type . '_title';

		${'title' . crb_lang_slug()} = get_option($t . crb_lang_slug());

		$h = !empty(${'title' . crb_lang_slug()}) ? '<h3 class="box-title section-title">' . ${'title' . crb_lang_slug()} . '</h3>' : '';

		return $h;
	}
}

if ( ! function_exists( 'getSectionParagraph' ) ) {
	function getSectionParagraph( $custom_post_type ) {
		$p = '_crb_home_' . $custom_post_type . '_paragraph';

		${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option($p . crb_lang_slug()));

		$p = !empty(${'paragraph' . crb_lang_slug()}) ? ${'paragraph' . crb_lang_slug()} : '';

		return $p;
	}
}

function getSectionContent( $custom_post_type ) {
	$content = array(
		'posts' => getSectionPosts($custom_post_type),
		'title' => getSectionTitle($custom_post_type),
		'paragraph' => getSectionParagraph($custom_post_type)
	);

	if (array_filter($content)) {
		return $content;
	}
}

function renderSection( $content ) {
	getSectionStart($content['custom_post_type']);
	getSectionHeader($content['title'], $content['paragraph']);
	getSectionBody($content['custom_post_type'], $content['posts']);
	getSectionEnd();
}

if ( ! function_exists( 'getHomeSection' ) ) {
	function getHomeSection( $custom_post_type ) {
		$content = getSectionContent($custom_post_type);

		if (!empty($content)) {
			$content['custom_post_type'] = $custom_post_type;
			renderSection($content);
		}
	}
}

if ( ! function_exists( 'getSectionStart' ) ) {
	function getSectionStart( $custom_post_type ) {
		$section = strtolower(get_post_type_object($custom_post_type)->label);

		$sectionClasses = ['home-section', 'home-' . $section];

		if ($custom_post_type === 'member') {
			array_push($sectionClasses, 'home-section-w-bg');
		}

		$html = '<section id="' . $section . '" class="' . implode(' ', $sectionClasses) . '">';

		echo $html;
	}
}

if ( ! function_exists( 'getSectionHeader' ) ) {
	function getSectionHeader( $title, $paragraph ) {
		$headerStart = 
		'<header class="section-header">
		<div class="container">
		<div class="row">
		<div class="col-lg-8 offset-lg-2">';
		$headerEnd = 
		'</div>
		</div>
		</div>
		</header>';

		$html = $headerStart . $title . $paragraph . $headerEnd;

		echo $html;
	}
}

if ( ! function_exists( 'getSectionBody' ) ) {
	function getSectionBody( $custom_post_type, $posts ) {
		$path = 'templates/front-page/home-' . $custom_post_type;
		$display = get_option('_crb_home_' . $custom_post_type . '_layout');

		if (!empty($posts)) {
			$args = array(
				'posts' => $posts,
				'display' => $display
			);

			$bodyStart = getSectionBodyStart();
			$bodyContent = get_template_part($path, null, $args);
			$bodyEnd = getSectionBodyEnd();

			$html = $bodyStart . $bodyContent . $bodyEnd;

			echo $html;
		}
	}
}

if ( ! function_exists( 'getSectionBodyStart' ) ) {
	function getSectionBodyStart() {
		echo '<section class="section-body"><div class="container"><div class="row">';
	}
}

if ( ! function_exists( 'getSectionBodyEnd' ) ) {
	function getSectionBodyEnd() {
		echo '</div></div></section>';
	}
}

if ( ! function_exists( 'getSectionEnd' ) ) {
	function getSectionEnd() {
		echo '</section>';
	}
}
?>