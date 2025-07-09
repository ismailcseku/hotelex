<?php


if (!function_exists('hotelex_preloader_bg_color')) {
	/**
	 * Generate CSS codes for BG Color of Preloader
	 */
	function hotelex_preloader_bg_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'general-settings-page-preloader-bg-color';
		$declaration = array();
		$selector = array(
			'#preloader.three-layer-loaderbg .layer .overlay',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['background-color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_preloader_bg_color');
}

if (!function_exists('hotelex_preloading_text_color')) {
	/**
	 * Generate CSS codes for text Color of Preloading text
	 */
	function hotelex_preloading_text_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'general-settings-page-preloading-text-color';
		$declaration = array();
		$selector = array(
			'#preloader .txt-loading .letters-loading',
			'#preloader .txt-loading .letters-loading:before',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_preloading_text_color');
}

if (!function_exists('hotelex_preloading_text_typography')) {
	/**
	 * Generate CSS codes for Title Typography
	 */
	function hotelex_preloading_text_typography() {
		$var_name = 'general-settings-page-preloading-text-typography';
		$declaration = array();
		$selector = array(
			'#preloader .txt-loading .letters-loading',
			'#preloader .txt-loading .letters-loading:before',
		);
		$declaration = hotelex_redux_option_field_typography( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_preloading_text_typography');
}