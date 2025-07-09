<?php

if ( ! function_exists( 'hotelex_get_isotope_holder_ID' ) ) {
	/**
	 * Returns Portfolio Holder ID
	 *
	 */
	function hotelex_get_isotope_holder_ID( $id_prefix = 'id' ) {
		$random_number = wp_rand( 111111, 999999 );
		$holder_id = $id_prefix . '-holder-' . $random_number;
		return $holder_id;
	}
}

if(!function_exists('hotelex_random_word')) {
	/**
	 * Return Random Word
	 */
	function hotelex_random_word( $len = 5 ) {
		$word = array_merge( range( 'a', 'z' ), range( 'A', 'Z' ));
		shuffle( $word );
		return substr( implode( $word ), 0, $len );
	}
}




if(!function_exists('hotelex_isotope_gutter_list_redux')) {
	/**
	 * Portfolio Gutter list
	 */
	function hotelex_isotope_gutter_list_redux() {
		$gutter_list = array(
			'gutter' 		=>  esc_html__( 'Default', 'hotelex' ),
			'gutter-0'		=>  '0',
			'gutter-2'  	=>  '2px',
			'gutter-5'  	=>  '5px',
			'gutter-10'  	=>  '10px',
			'gutter-15'  	=>  '15px',
			'gutter-20'  	=>  '20px',
			'gutter-30'  	=>  '30px',
		);
		return $gutter_list;
	}
}

if(!function_exists('hotelex_redux_text_alignment_list')) {
	/**
	 * Text Alignment List - Redux
	 */
	function hotelex_redux_text_alignment_list() {
		$alignment_list = array(
			''	 	=> esc_html__( 'Default', 'hotelex' ),
			'text-left'	 	=> esc_html__( 'Left', 'hotelex' ),
			'text-center'   => esc_html__( 'Center', 'hotelex' ),
			'text-right'	=> esc_html__( 'Right', 'hotelex' ),
		);
		return $alignment_list;
	}
}

if(!function_exists('hotelex_redux_text_alignment_single_word_list')) {
	/**
	 * Text Alignment List Only Single Word- Redux
	 */
	function hotelex_redux_text_alignment_single_word_list() {
		$alignment_list = array(
			'left'	 	=> esc_html__( 'Left', 'hotelex' ),
			'center'  	=> esc_html__( 'Center', 'hotelex' ),
			'right'		=> esc_html__( 'Right', 'hotelex' ),
		);
		return $alignment_list;
	}
}

if(!function_exists('hotelex_redux_text_alignment_elementor')) {
	/**
	 * Text Alignment Elementor
	 */
	function hotelex_redux_text_alignment_elementor() {
		$alignment_list = array(
			esc_html__( 'Left', 'hotelex' ) => 'left',
			esc_html__( 'Center', 'hotelex' ) => 'center',
			esc_html__( 'Right', 'hotelex' ) => 'right'
		);
		return $alignment_list;
	}
}



if ( ! function_exists( 'hotelex_metabox_get_list_of_predefined_theme_color_css_files' ) ) {
	/**
	 * Get list of Predefined Theme Color css files
	 */
	function hotelex_metabox_get_list_of_predefined_theme_color_css_files() {
		$predefined_theme_colors = array();

		if( $handle = opendir( HOTELEX_TEMPLATE_DIR . '/assets/css/colors/' ) ) {
			while( false !== ($entry = readdir($handle)) ) {
				if( $entry != "." && $entry != ".."  && substr( $entry, 0, 6 ) === "theme-") {
					$predefined_theme_colors[$entry] = $entry;
				}
			}
			closedir($handle);
		}
		return $predefined_theme_colors;
	}
}

if ( ! function_exists( 'hotelex_metabox_get_list_of_predefined_typography_files' ) ) {
	/**
	 * Get list of Predefined Typography css files
	 */
	function hotelex_metabox_get_list_of_predefined_typography_files() {
		$predefined_theme_colors = array();
		return $predefined_theme_colors;
	}
}

if ( ! function_exists( 'hotelex_metabox_get_list_of_premade_sitewise_css_files' ) ) {
	/**
	 * Get list of Premade Sitewise css files
	 */
	function hotelex_metabox_get_list_of_premade_sitewise_css_files() {
		$premade_css_files = array();

		if( $handle = opendir( HOTELEX_TEMPLATE_DIR . '/assets/css/sites/' ) ) {
			while( false !== ($entry = readdir($handle)) ) {
				if( $entry != "." && $entry != ".."  && substr( $entry, 0, 5 ) === "main-") {
					$premade_css_files[$entry] = $entry;
				}
			}
			closedir($handle);
		}
		return $premade_css_files;
	}
}




if ( ! function_exists( 'hotelex_get_dropdown' ) ) {
	/**
	 * Return dropdown
	 */
	function hotelex_get_dropdown( $dropdown ) {
		$choices = array(
			'first' => array(),
			'others' => array()
		);

		if(!empty($dropdown[0]) and !empty($dropdown[0]['label'])) {
			$choices['first'] = $dropdown[0];
		}

		array_shift($dropdown);

		if(!empty($dropdown)) {
			$choices['others'] = $dropdown;
		}

		return $choices;
	}
}



if ( ! function_exists( 'hotelex_enqueue_script_lightgallery' ) ) {
	/**
	 * wp_enqueue_script for lightgallery
	 */
	function hotelex_enqueue_script_lightgallery() {
		wp_enqueue_script( 'lightgallery' );
		wp_enqueue_style( 'lightgallery' );
		wp_enqueue_script( 'jquery-mousewheel' );
		wp_enqueue_script( 'hotelex-custom-lightgallery' );
	}
}



if ( ! function_exists( 'hotelex_enqueue_script_owl_carousel' ) ) {
	/**
	 * wp_enqueue_script for owl_carousel
	 */
	function hotelex_enqueue_script_owl_carousel() {
	}
}



if ( ! function_exists( 'hotelex_enqueue_script_menuzord_navigation_skin' ) ) {
	/**
	 * wp_enqueue_script for menuzord-navigation-skin
	 */
	function hotelex_enqueue_script_menuzord_navigation_skin() {
		wp_enqueue_style( 'hotelex-mascot-menuzord-navigation-skin' );
	}
}


if(!function_exists('hotelex_get_social_share_links')) {
	/**
	 * Function that Renders Social Share Links
	 * @return HTML
	 */
	function hotelex_get_social_share_links() {
		if ( mascot_core_hotelex_plugin_installed() ) {
			mascot_core_hotelex_get_social_share_links();
		}
	}
}


if(!function_exists('hotelex_get_registered_menus')) {
	/**
	 * Function to Get all registered menus
	 * @return HTML
	 */
	function hotelex_get_registered_menus() {
		$menus   = wp_get_nav_menus();
		$options = [];
		$options[''] = esc_html__( 'Default Primary Menu', 'hotelex' );

		if (empty($menus)) {
			return $options;
		}

		foreach ($menus as $menu) {
			$options[$menu->term_id] = $menu->name;
		}

		return $options;
	}
}

if(!function_exists('hotelex_redux_fallback_text_collection')) {
	/**
	 * some text collection
	 */
	function hotelex_redux_fallback_text_collection($index) {
		$array_list = array(
			'blog'	 	=> esc_html__( 'Blog', 'hotelex' ),
			'404'	 	=> esc_html__( '404', 'hotelex' ),
			'404_oops'	 	=> esc_html__( 'Oops! Page Not Found!', 'hotelex' ),
			'404_notexist'	 	=> esc_html__( 'The page you are looking for does not exist. It might have been moved or deleted.', 'hotelex' ),
			'404_btn'	 	=> esc_html__( 'Back to Home', 'hotelex' ),
		);
		return $array_list[$index];
	}
}