<?php


if(!function_exists('hotelex_get_page_preloader')) {
	/**
	 * Function that Renders page preloader HTML Codes
	 * @return HTML
	 */
	function hotelex_get_page_preloader() {
		$params = array();

		$params['page_preloader'] = hotelex_get_redux_option( 'general-settings-enable-page-preloader' );

		if( !$params['page_preloader'] ) {
			return;
		}

		$params['page_show_disable_button'] = hotelex_get_redux_option( 'general-settings-page-preloader-show-disable-button' );
		$params['page_show_disable_button_text'] = hotelex_get_redux_option( 'general-settings-page-preloader-show-disable-button-text' );


		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = hotelex_get_blocks_template_part( 'preloader', null, 'page-preloader/tpl', $params );

		return $html;
	}
}


if(!function_exists('hotelex_get_page_preloader_type')) {
	/**
	 * Function that Renders page preloader Type HTML Codes
	 * @return HTML
	 */
	function hotelex_get_page_preloader_type() {
		$params = array();
		$html = '';

		$params['page_preloader_type'] = hotelex_get_redux_option( 'general-settings-page-preloader-type' );
		$params['page_preloader_type_css'] = hotelex_get_redux_option( 'general-settings-page-preloader-type-css' );
		$params['page_preloader_type_gif'] = hotelex_get_redux_option( 'general-settings-page-preloader-type-gif' );

		if( $params['page_preloader_type'] == 'css-preloader' ) {
			//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
			$html = hotelex_get_blocks_template_part( $params['page_preloader_type_css'], null, 'page-preloader/tpl/'.$params['page_preloader_type'], $params );
		} else if( $params['page_preloader_type'] == 'gif-preloader' ) {
			//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
			$html = hotelex_get_blocks_template_part( 'preloader-gif', null, 'page-preloader/tpl/'.$params['page_preloader_type'], $params );
		} else if( $params['page_preloader_type'] == 'upload-preloader' ) {
			hotelex_get_page_preloading_image();
		}

		return $html;
	}
}


if(!function_exists('hotelex_get_page_preloading_image')) {
	/**
	 * Function that Renders page preloading image
	 * @return HTML
	 */
	function hotelex_get_page_preloading_image() {
		$params = array();
		$html = '';

		//page_preloading_text
		$params['page_preloading_image'] = hotelex_get_redux_option( 'general-settings-page-preloading-image', false, 'url' ) ;
		$params['page_preloading_image_width'] = hotelex_get_redux_option( 'general-settings-page-preloading-image-width' ) ;
		$params['page_preloading_image_animate'] = hotelex_get_redux_option( 'general-settings-page-preloading-image-animate' );
		$html = hotelex_get_blocks_template_part( 'preloader-image', null, 'page-preloader/tpl/text-preloader/', $params );

		return $html;
	}
}


if(!function_exists('hotelex_get_page_preloading_text')) {
	/**
	 * Function that Renders page preloading text Type HTML Codes
	 * @return HTML
	 */
	function hotelex_get_page_preloading_text() {
		$params = array();
		$html = '';

		//page_preloading_text
		$params['page_preloading_text'] = hotelex_get_redux_option( 'general-settings-page-preloading-text' );
		$html = hotelex_get_blocks_template_part( 'preloader-text', null, 'page-preloader/tpl/text-preloader/', $params );

		return $html;
	}
}