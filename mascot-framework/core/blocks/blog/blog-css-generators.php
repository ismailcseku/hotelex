<?php

if (!function_exists('hotelex_sidebar_widget_title_line_bottom_color')) {
	/**
	 * Generate CSS codes for Sidebar Widget Title Custom Line Bottom Color
	 */
	function hotelex_sidebar_widget_title_line_bottom_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'sidebar-settings-sidebar-title-line-bottom-custom-color';
		//If Make Line Bottom Theme Colored?
		if( $hotelex_redux_theme_opt['sidebar-settings-sidebar-title-line-bottom-theme-colored'] != '' ) {
			return;
		}

		$declaration = array();
		$selector = array(
			'.widget .widget-title.widget-title-line-bottom:after'
		);

		$declaration['background-color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_sidebar_widget_title_line_bottom_color');
}