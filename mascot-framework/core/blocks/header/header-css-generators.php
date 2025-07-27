<?php


if (!function_exists('hotelex_get_header_mobile_nav_bg_color_adjust')) {
	/**
	 * Generate CSS codes for BG Color of Preloader
	 */
	function hotelex_get_header_mobile_nav_bg_color_adjust() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-mobile-settings-mobile-nav-bg-color';
		$declaration = array();
		$selector = array(
			'#elementor-header-top-mobile',
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_get_header_mobile_nav_bg_color_adjust');
}

if (!function_exists('hotelex_get_header_mobile_hamburger_color_adjust')) {
	/**
	 * Generate CSS codes for BG Color of Preloader
	 */
	function hotelex_get_header_mobile_hamburger_color_adjust() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-mobile-settings-hamburger-line-color';
		$declaration = array();
		$selector = array(
			'.tm-nav-mobile-button:before, .tm-nav-mobile-button:after, .tm-nav-mobile-button span',
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_get_header_mobile_hamburger_color_adjust');
}

if (!function_exists('hotelex_get_header_mobile_revealed_canvas_bg_color_adjust')) {
	/**
	 * Generate CSS codes for BG Color of Preloader
	 */
	function hotelex_get_header_mobile_revealed_canvas_bg_color_adjust() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-mobile-settings-revealed-canvas-bg-color';
		$declaration = array();
		$selector = array(
			'.tm-header-menu',
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_get_header_mobile_revealed_canvas_bg_color_adjust');
}

if (!function_exists('hotelex_get_header_mobile_menu_item_indicator_bg_color_adjust')) {
	/**
	 * Generate CSS codes for BG Color of Preloader
	 */
	function hotelex_get_header_mobile_menu_item_indicator_bg_color_adjust() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-mobile-settings-item-indicator-arrow-bg-color';
		$declaration = array();
		$selector = array(
			'.menuzord-responsive .menuzord-menu li .indicator',
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_get_header_mobile_menu_item_indicator_bg_color_adjust');
}

if (!function_exists('hotelex_get_header_mobile_menu_item_indicator_color_adjust')) {
	/**
	 * Generate CSS codes for BG Color of Preloader
	 */
	function hotelex_get_header_mobile_menu_item_indicator_color_adjust() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-mobile-settings-item-indicator-arrow-color';
		$declaration = array();
		$selector = array(
			'.menuzord-responsive .menuzord-menu li .indicator',
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_get_header_mobile_menu_item_indicator_color_adjust');
}


if (!function_exists('hotelex_get_header_top_cpt_elementor_wpb_shortcodes_custom_css')) {
	/**
	 * Add VC inline css to body
	 */
	function hotelex_get_header_top_cpt_elementor_wpb_shortcodes_custom_css() {
		$current_page_id = hotelex_get_page_id();

		//Footer Widget Area
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = hotelex_get_rwmb_group( 'hotelex_' . "page_mb_header_settings", 'headertop_cpt_elementor', $current_page_id );
		if( ! hotelex_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['header_top_cpt_post'] = $temp_meta_value;
		} else {
			$params['header_top_cpt_post'] = hotelex_get_redux_option( 'header-settings-choose-header-top-cpt-elementor', 'default' );
		}


		//VC Custom CSS
		$shortcodes_custom_css = get_post_meta( $params['header_top_cpt_post'], '_wpb_shortcodes_custom_css', true );
		if ( ! empty( $shortcodes_custom_css ) ) {
			wp_add_inline_style( 'hotelex-dynamic-style', $shortcodes_custom_css );
		}


	}
	add_action( 'wp_enqueue_scripts', 'hotelex_get_header_top_cpt_elementor_wpb_shortcodes_custom_css' );
}


if (!function_exists('hotelex_header_logo_maximum_width')) {
	/**
	 * Generate CSS codes for Maximum logo width
	 */
	function hotelex_header_logo_maximum_width() {
		global $hotelex_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-width';
		$declaration = array();
		$selector = array(
			'header#header .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}


		$declaration['--menuzord-brand-width-responsive'] = $hotelex_redux_theme_opt[$var_name].'px';
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_logo_maximum_width');
}


if (!function_exists('hotelex_header_logo_maximum_height_in_sticky_mode')) {
	/**
	 * Generate CSS codes for Maximum logo height in Sticky Mode
	 */
	function hotelex_header_logo_maximum_height_in_sticky_mode() {
		global $hotelex_redux_theme_opt;
		$var_name = 'logo-settings-maximum-logo-width-in-sticky-mode';
		$declaration = array();
		$selector = array(
			'header#header .header-nav-wrapper.tm-sticky-menu .menuzord-brand img'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}


		$declaration['max-width'] = $hotelex_redux_theme_opt[$var_name].'px';
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_logo_maximum_height_in_sticky_mode');
}




if (!function_exists('hotelex_header_logo_margin_around_it')) {
	/**
	 * Generate CSS codes for logo margin
	 */
	function hotelex_header_logo_margin_around_it() {
		global $hotelex_redux_theme_opt;
		//margin around it
		$var_name = 'logo-settings-logo-margin-around';
		$declaration = array();
		$selector = array(
			'header#header.header-layout-type-header-default .menuzord-brand'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		//added margin into the container.
		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $hotelex_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-right'] != "" ) {
			$declaration['margin-right'] = $hotelex_redux_theme_opt[$var_name]['margin-right'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $hotelex_redux_theme_opt[$var_name]['margin-bottom'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-left'] != "" ) {
			$declaration['margin-left'] = $hotelex_redux_theme_opt[$var_name]['margin-left'];
		}
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_logo_margin_around_it');
}

if (!function_exists('hotelex_header_logo_sticky_margin_around_it')) {
	/**
	 * Generate CSS codes for logo margin in sticky
	 */
	function hotelex_header_logo_sticky_margin_around_it() {
		global $hotelex_redux_theme_opt;
		//margin around it
		$var_name = 'logo-settings-logo-sticky-margin-around';
		$declaration = array();
		$selector = array(
			'header#header .header-nav-wrapper.tm-sticky-menu .menuzord-brand'
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		//added margin into the container.
		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name]['margin-top'] != "" ) {
			$declaration['margin-top'] = $hotelex_redux_theme_opt[$var_name]['margin-top'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-right'] != "" ) {
			$declaration['margin-right'] = $hotelex_redux_theme_opt[$var_name]['margin-right'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-bottom'] != "" ) {
			$declaration['margin-bottom'] = $hotelex_redux_theme_opt[$var_name]['margin-bottom'];
		}
		if( $hotelex_redux_theme_opt[$var_name]['margin-left'] != "" ) {
			$declaration['margin-left'] = $hotelex_redux_theme_opt[$var_name]['margin-left'];
		}
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_logo_sticky_margin_around_it');
}


if (!function_exists('hotelex_header_nav_row_custom_background_color')) {
	/**
	 * Generate CSS codes for Header Navigation Row Custom Background Color
	 */
	function hotelex_header_nav_row_custom_background_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-custom-bgcolor';
		$declaration = array();
		$selector = array(
			'header#header .header-nav .header-nav-container',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$header_layout_type = hotelex_get_redux_option( 'header-settings-choose-header-layout-type' );
		if( $header_layout_type == 'header-vertical-nav' ) {
			$selector = array(
				'body.tm-vertical-nav header#header',
			);
		}

		$declaration['background-color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_nav_row_custom_background_color');
}



if (!function_exists('hotelex_header_nav_row_nav_item_font_size')) {
	/**
	 * Generate CSS codes for Main Nav Item Font Size
	 */
	function hotelex_header_nav_row_nav_item_font_size() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-font-size';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > a'
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
}


if (!function_exists('hotelex_header_nav_row_nav_dropdown_menu_width')) {
	/**
	 * Generate CSS codes for Dropdown Menu Width(px)
	 */
	function hotelex_header_nav_row_nav_dropdown_menu_width() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-skin-dropdown-menu-width';
		$declaration = array();
		$selector = array(
			'.menuzord-menu ul.dropdown',
			'.menuzord-menu ul.dropdown li ul.dropdown',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}


		$declaration['min-width'] = $hotelex_redux_theme_opt[$var_name].'px';
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_nav_row_nav_dropdown_menu_width');
}

if (!function_exists('hotelex_header_nav_row_nav_item_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item Typography
	 */
	function hotelex_header_nav_row_nav_item_typography() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > a'
		);

		$declaration = hotelex_redux_option_field_typography( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);




		//hover color
		$var_name = 'header-settings-navigation-item-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li:hover > a',
			'#top-primary-nav .menuzord-menu > li.active > a'
		);

		if( $hotelex_redux_theme_opt[$var_name] != '' ) {
			$declaration['color'] = $hotelex_redux_theme_opt[$var_name];
			hotelex_dynamic_css_generator($selector, $declaration);
		}



		//padding around it
		$var_name = 'header-settings-navigation-item-padding';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li'
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
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_nav_row_nav_item_typography');
}


if (!function_exists('hotelex_header_nav_row_nav_item_dropdown_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item dropdown Typography
	 */
	function hotelex_header_nav_row_nav_item_dropdown_typography() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-dropdown-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu ul.dropdown li a'
		);

		$declaration = hotelex_redux_option_field_typography( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);

		//hover color
		$var_name = 'header-settings-navigation-item-dropdown-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu ul.dropdown li:hover > .menu-item-link:not(.tm-submenu-title)',
			'#top-primary-nav .menuzord-menu ul.dropdown li.active > .menu-item-link:not(.tm-submenu-title)'
		);

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_nav_row_nav_item_dropdown_typography');
}


if (!function_exists('hotelex_header_nav_row_nav_item_megamenu_dropdown_typography')) {
	/**
	 * Generate CSS codes for Main Nav Item megamenu dropdown Typography
	 */
	function hotelex_header_nav_row_nav_item_megamenu_dropdown_typography() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-item-megamenu-dropdown-typography';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li a.menu-item-link'
		);

		$declaration = hotelex_redux_option_field_typography( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);

		//hover color
		$var_name = 'header-settings-navigation-item-megamenu-dropdown-hover-color';
		$declaration = array();
		$selector = array(
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li:hover > .menu-item-link:not(.tm-submenu-title)',
			'#top-primary-nav .menuzord-menu > li > .megamenu .megamenu-row li.active > .menu-item-link:not(.tm-submenu-title)'
		);

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		$declaration['color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_nav_row_nav_item_megamenu_dropdown_typography');
}



if (!function_exists('hotelex_header_nav_row_custom_nav_link_n_icon_color')) {
	/**
	 * Generate CSS codes for Header Navigation Row Link and Cart/Search/Side Push Icon Color
	 */
	function hotelex_header_nav_row_custom_nav_link_n_icon_color() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-custom-navigation-link-n-icon-color';
		$declaration = array();

		$selector = array(
			'header#header .header-nav .header-nav-container .menuzord-menu > li > a',
			'header#header .header-nav .header-nav-container .search-icon',
			'header#header .header-nav .header-nav-container .mini-cart-icon',
		);

		//if empty then return
		if( !array_key_exists( $var_name, $hotelex_redux_theme_opt ) ) {
			return;
		}

		if( $hotelex_redux_theme_opt[$var_name] == '' ) {
			return;
		}

		echo "@media (min-width: ". HOTELEX_MENUZORD_MEGAMENU_BREAKPOINT_FW ."){";

		$declaration['color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);



		$header_layout_type = hotelex_get_redux_option( 'header-settings-choose-header-layout-type' );
		if( $header_layout_type == 'header-vertical-nav' ) {
			$selector = array(
				'body.tm-vertical-nav header#header .vertical-nav-sidebar-widget-wrapper .widget',
				'body.tm-vertical-nav header#header .vertical-nav-sidebar-widget-wrapper .widget-title',
			);
			$declaration['color'] = $hotelex_redux_theme_opt[$var_name];
			hotelex_dynamic_css_generator($selector, $declaration);
		}


		//background color
		$selector = array(
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner',
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner:before',
			'header#header .header-nav .header-nav-container .hamburger-box .hamburger-inner:after',
		);
		$declaration['background-color'] = $hotelex_redux_theme_opt[$var_name];
		hotelex_dynamic_css_generator($selector, $declaration);

		echo "}";

	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_nav_row_custom_nav_link_n_icon_color');
}





if (!function_exists('hotelex_header_navigation_side_push_panel_width')) {
	/**
	 * Generate CSS codes for Side push panel Bar Width
	 */
	function hotelex_header_navigation_side_push_panel_width() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-side-push-panel-width';
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);

		$navbar_width = $hotelex_redux_theme_opt[$var_name];
		$declaration['width'] = $navbar_width.'px';
		$dynamic_css_width = hotelex_dynamic_css_generator($selector, $declaration, false);

		//right or left
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);
		$declaration['right'] = '-'.$navbar_width.'px';
		$dynamic_css_pos_right = hotelex_dynamic_css_generator($selector, $declaration, false);

		echo "@media (min-width: 1200px){";
		echo esc_attr( $dynamic_css_width );
		echo esc_attr( $dynamic_css_pos_right );
		echo "}";

	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_navigation_side_push_panel_width');
}


if (!function_exists('hotelex_header_navigation_side_push_panel_bgimg')) {
	/**
	 * Generate CSS codes for Background Image for Side push panel
	 */
	function hotelex_header_navigation_side_push_panel_bgimg() {
		global $hotelex_redux_theme_opt;
		$var_name = 'header-settings-navigation-side-push-panel-bgimg';
		$declaration = array();
		$selector = array(
			'.side-panel-container'
		);

		$declaration = hotelex_redux_option_field_background( $var_name );
		hotelex_dynamic_css_generator($selector, $declaration);
	}
	add_action('hotelex_dynamic_css_generator_action', 'hotelex_header_navigation_side_push_panel_bgimg');
}