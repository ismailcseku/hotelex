<?php

if (!function_exists('hotelex_sidebar_padding')) {
	/**
	 * Generate CSS codes for Sidebar Padding
	 */
	function hotelex_sidebar_padding() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $hotelex_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $hotelex_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $hotelex_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $hotelex_redux_theme_opt[$var_name]['padding-left'];
		}
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_padding');
}


if (!function_exists('hotelex_sidebar_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Background Color
	 */
	function hotelex_sidebar_bg_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_bg_color');
}


if (!function_exists('hotelex_sidebar_text_align')) {
	/**
	 * Generate CSS codes for Sidebar Text Alignment
	 */
	function hotelex_sidebar_text_align() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-text-align';
		$declaration = array();
		$selector = array(
			'.sidebar-area'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['text-align'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_text_align');
}





if (!function_exists('hotelex_sidebar_title_padding')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Padding
	 */
	function hotelex_sidebar_title_padding() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-padding';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		//added padding into the container.
		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['padding-top'] != "" ) {
			$declaration['padding-top'] = $hotelex_redux_theme_opt[$var_name]['padding-top'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['padding-right'] != "" ) {
			$declaration['padding-right'] = $hotelex_redux_theme_opt[$var_name]['padding-right'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['padding-bottom'] != "" ) {
			$declaration['padding-bottom'] = $hotelex_redux_theme_opt[$var_name]['padding-bottom'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['padding-left'] != "" ) {
			$declaration['padding-left'] = $hotelex_redux_theme_opt[$var_name]['padding-left'];
		}
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_title_padding');
}


if (!function_exists('hotelex_sidebar_title_bg_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Background Color
	 */
	function hotelex_sidebar_title_bg_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-bg-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_title_bg_color');
}


if (!function_exists('hotelex_sidebar_title_text_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Text Color
	 */
	function hotelex_sidebar_title_text_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-text-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_title_text_color');
}


if (!function_exists('hotelex_sidebar_title_font_size')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Font Size
	 */
	function hotelex_sidebar_title_font_size() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-font-size';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['font-size'] = $hotelex_redux_theme_opt[$var_name] . 'px';
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_title_font_size');
}


if (!function_exists('hotelex_sidebar_title_line_bottom_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Line Bottom Color
	 */
	function hotelex_sidebar_title_line_bottom_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-line-bottom-color';
		$declaration = array();
		$selector = array(
			'.sidebar-area .widget .widget-title.widget-title-line-bottom:after'
		);

		if( !hotelex_get_redux_option( 'sidebar-settings-sidebar-title-show-line-bottom' ) ) {
			return;
		}

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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_title_line_bottom_color');
}