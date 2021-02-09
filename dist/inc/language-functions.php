<?php
// add_action('admin_init', 'check_lang');
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
?>