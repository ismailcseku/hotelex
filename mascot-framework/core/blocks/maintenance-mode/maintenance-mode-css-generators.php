<?php

if (!function_exists('hotelex_maintenance_mode_logo_max_width')) {
	/**
	 * Generate CSS codes for Title Margin Top & Bottom
	 */
	function hotelex_maintenance_mode_logo_max_width() {
		global $hotelex_redux_theme_opt;
		$var_name = 'maintenance-mode-settings-logo-max-width';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .logo img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['max-width'] = $hotelex_redux_theme_opt[$var_name].'px';
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_logo_max_width');
}

if (!function_exists('hotelex_maintenance_mode_title_typography')) {
	/**
	 * Generate CSS codes for Title Typography
	 */
	function hotelex_maintenance_mode_title_typography() {
		$var_name = 'maintenance-mode-settings-title-typography';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .title'
		);
		$declaration = hotelex_redux_option_field_typography( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_title_typography');
}


if (!function_exists('hotelex_maintenance_mode_title_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Title Margin Top & Bottom
	 */
	function hotelex_maintenance_mode_title_margin_top_bottom() {
		global $hotelex_redux_theme_opt;
		$var_name = 'maintenance-mode-settings-title-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $hotelex_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $hotelex_redux_theme_opt[$var_name]['margin-bottom'];
		}
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_title_margin_top_bottom');
}


if (!function_exists('hotelex_maintenance_mode_content_typography')) {
	/**
	 * Generate CSS codes for Content Typography
	 */
	function hotelex_maintenance_mode_content_typography() {
		$var_name = 'maintenance-mode-settings-content-typography';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .content, .maintenance-mode .content p'
		);
		$declaration = hotelex_redux_option_field_typography( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_content_typography');
}


if (!function_exists('hotelex_maintenance_mode_content_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Content Margin Top & Bottom
	 */
	function hotelex_maintenance_mode_content_margin_top_bottom() {
		global $hotelex_redux_theme_opt;
		$var_name = 'maintenance-mode-settings-content-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .content'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $hotelex_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $hotelex_redux_theme_opt[$var_name]['margin-bottom'];
		}
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_content_margin_top_bottom');
}


if (!function_exists('hotelex_maintenance_mode_bg')) {
	/**
	 * Generate CSS codes for Widget Footer Background
	 */
	function hotelex_maintenance_mode_bg() {
		$var_name = 'maintenance-mode-settings-bg';
		$declaration = array();
		$selector = array(
			'.maintenance-mode'
		);

		if( hotelex_get_redux_option( 'maintenance-mode-settings-custom-background-status' ) ) {
			$declaration = hotelex_redux_option_field_background( $var_name );
			hotelex_dynamic_css_generator($selector, $declaration);
		}
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_bg');
}


if (!function_exists('hotelex_maintenance_mode_countdown_timer_typography')) {
	/**
	 * Generate CSS codes for Countdown Timer Typography
	 */
	function hotelex_maintenance_mode_countdown_timer_typography() {
		$var_name = 'maintenance-mode-settings-countdown-timer-typography';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .countdown-timer-wrapper .final-countdown-timer'
		);
		$declaration = hotelex_redux_option_field_typography( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_countdown_timer_typography');
}


if (!function_exists('hotelex_maintenance_mode_countdown_timer_span_font_size')) {
	/**
	 * Generate CSS codes for Countdown Timer Span Font Size
	 */
	function hotelex_maintenance_mode_countdown_timer_span_font_size() {
		global $hotelex_redux_theme_opt;
		$var_name = 'maintenance-mode-settings-countdown-timer-typography';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .countdown-timer-wrapper .final-countdown-timer span'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['font-size'] != "" ) {
			$declaration['font-size'] = round( $hotelex_redux_theme_opt[$var_name]['font-size'] / 2 ) . 'px';
		}

		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_countdown_timer_span_font_size');
}


if (!function_exists('hotelex_maintenance_mode_countdown_timer_margin_top_bottom')) {
	/**
	 * Generate CSS codes for Countdown Timer Margin Top & Bottom
	 */
	function hotelex_maintenance_mode_countdown_timer_margin_top_bottom() {
		global $hotelex_redux_theme_opt;
		$var_name = 'maintenance-mode-settings-countdown-timer-margin-top-bottom';
		$declaration = array();
		$selector = array(
			'.maintenance-mode .countdown-timer-wrapper'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $hotelex_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $hotelex_redux_theme_opt[$var_name]['margin-bottom'];
		}
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_maintenance_mode_countdown_timer_margin_top_bottom');
}