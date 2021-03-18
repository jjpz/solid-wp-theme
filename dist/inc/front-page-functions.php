<?php
if ( ! function_exists( 'getSectionPosts' ) ) {
    function getSectionPosts( $query, $post_type ) {
        $posts = [];
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                if ($query->post->post_type === $post_type) {
                    array_push($posts, $query->post);
                }
            }
            wp_reset_postdata();
        }
        return $posts;
    }
}

if ( ! function_exists( 'getHomeSection' ) ) {
	function getHomeSection( $query, $post_type ) {

		$section = strtolower(get_post_type_object($post_type)->label);

		$sectionClasses = [];

		if ($post_type === 'member') {
			array_push($sectionClasses, 'home-section-w-bg');
		}

		$t = '_crb_home_' . $post_type . '_title';
		$p = '_crb_home_' . $post_type . '_paragraph';
		$d = '_crb_home_' . $post_type . '_layout';

		${'title' . crb_lang_slug()} = get_option($t . crb_lang_slug());
		${'paragraph' . crb_lang_slug()} = apply_filters('the_content', get_option($p . crb_lang_slug()));
		$display = get_option($d);

		$posts = getSectionPosts($query, $post_type);

		if ( 
			!empty($posts) || 
			!empty(${'title' . crb_lang_slug()}) || 
			!empty(${'paragraph' . crb_lang_slug()}) 
		) {

			$start  = getSectionStart($section, $sectionClasses);
			$header = getSectionHeader(${'title' . crb_lang_slug()}, ${'paragraph' . crb_lang_slug()});
			$body   = getSectionBody($post_type, $posts, $display);
			$end    = getSectionEnd();

			$html = $start . $header . $body . $end;

			echo $html;

		}

	}
}

if ( ! function_exists( 'getSectionStart' ) ) {
	function getSectionStart( $section, array $sectionClasses = null ) {
		$sectionClass = $sectionClasses ? ' ' . implode(' ', $sectionClasses) . ' ' : ' ';
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
		$h = !empty($title) ? '<h3 class="box-title section-title">' . $title . '</h3>' : '';
		$p = !empty($paragraph) ? $paragraph : '';

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
	function getSectionBody( $post_type, $posts = '', $display) {
		if (is_front_page()) {
			$path = 'templates/front-page/home-' . $post_type;
		}
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
		echo 
		'<section class="section-body">
		<div class="container">
		<div class="row">';
	}
}

if ( ! function_exists( 'getSectionBodyEnd' ) ) {
	function getSectionBodyEnd() {
		echo 
		'</div>
		</div>
		</section>';
	}
}
?>