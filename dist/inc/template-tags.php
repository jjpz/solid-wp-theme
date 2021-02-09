<?php
// Display optimally sized images with mobile/desktop options
if ( ! function_exists( 'getImage' ) ) {
	function getImage( $mainImgId, $mobileImgId = '', bool $lazyLoad = false, array $divClasses = null, array $imgClasses = null, array $lazyClasses = null ) {

		if (!empty($mainImgId)) {
			$mainSrc = wp_get_attachment_image_src($mainImgId, 'full')[0];
			$mainSrcset = wp_get_attachment_image_srcset($mainImgId, 'full');
			$mainType = pathinfo($mainSrc)['extension'];
			$mainAlt = get_post_meta( $mainImgId, '_wp_attachment_image_alt', true);
		}

		$mobileAttr = '';

		if (!empty($mobileImgId)) {
			$mobileSrc = wp_get_attachment_image_src($mobileImgId, 'full')[0];
			$mobileSrcset = wp_get_attachment_image_srcset($mobileImgId, 'full');
			$mobileType = pathinfo($mobileSrc)['extension'];
			$mobileAlt = get_post_meta( $mobileImgId, '_wp_attachment_image_alt', true);

			$mobileAttr = 
			'data-mobile-src="' . $mobileSrc . '" 
			data-mobile-srcset="' . $mobileSrcset . '" 
			data-mobile-alt="' . $mobileAlt . '" 
			data-mobile-type="' . $mobileType . '"';
		}

		$lazyHtml = '';

		if ($lazyLoad) {
			array_push($imgClasses, 'lazy');
			$lazyClass = $lazyClasses ? ' ' . implode(' ', $lazyClasses) . ' ' : ' ';
			$lazyHtml = '<div class="lazy-overlay' . $lazyClass . 'on"></div>';
		}

		$divClass = $divClasses ? ' ' . implode(' ', $divClasses) : '';
		$imgClass = !empty($imgClasses) ? implode(' ', $imgClasses) : '';

		$divStart = '<div class="image' . $divClass . '">';
			$img = '<img 
				class="' . $imgClass . '" 
				src="" 
				srcset="" 
				alt="" 
				data-src="' . $mainSrc . '" 
				data-srcset="' . $mainSrcset . '" 
				data-alt="' . $mainAlt . '" 
				data-type="' . $mainType . '" '
				. $mobileAttr .
			'/>';
			$lazy = $lazyHtml;
		$divEnd = '</div>';

		$html = $divStart . $img . $lazy . $divEnd;

		echo $html;

	}
}

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
?>