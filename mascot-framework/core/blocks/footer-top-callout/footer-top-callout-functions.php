<?php


if(!function_exists('hotelex_get_footer_top_callout')) {
	/**
	 * Function that Renders Footer Top Callout HTML Codes
	 * @return HTML
	 */
	function hotelex_get_footer_top_callout() {
		$current_page_id = hotelex_get_page_id();
		$params = array();


		//Footer Top Callout Visibility
		//check if meta value is provided for this page or then get it from theme options
		$temp_meta_value = hotelex_get_rwmb_group( 'hotelex_' . "page_mb_footer_top_callout_settings", 'callout_visibility', $current_page_id );
		if( ! hotelex_metabox_opt_val_is_empty( $temp_meta_value ) && $temp_meta_value != "inherit" ) {
			$params['footer_top_callout_visibility'] = $temp_meta_value;
		} else {
			$params['footer_top_callout_visibility'] = hotelex_get_redux_option( 'footer-top-call-out-area-visibility' );
		}

		if( !$params['footer_top_callout_visibility'] ) {
			return;
		}

		//text
		$params['callout_text'] = hotelex_get_redux_option( 'footer-top-call-out-area-text' );
		$params['callout_text_align'] = hotelex_get_redux_option( 'footer-top-call-out-area-text-align' );

		//left font icon
		$params['left_font_icon'] = hotelex_get_redux_option( 'footer-top-call-out-area-left-font-icon' );
		$params['left_font_icon_position'] = hotelex_get_redux_option( 'footer-top-call-out-area-left-font-icon-position' );
		if( $params['left_font_icon_position'] == '' ) {
			$params['left_font_icon_position'] = 'top';
		}

		//Callout Button
		$params['button_visibility'] = hotelex_get_redux_option( 'footer-top-call-out-area-button-visibility' );
		$params['button_position'] = hotelex_get_redux_option( 'footer-top-call-out-area-button-position' );
		if( $params['button_position'] == '' ) {
			$params['button_position'] = 'bottom';
		}
		$params['button_text'] = hotelex_get_redux_option( 'footer-top-call-out-area-button-text' );
		$params['button_link'] = hotelex_get_redux_option( 'footer-top-call-out-area-button-link' );
		$params['button_target'] = hotelex_get_redux_option( 'footer-top-call-out-area-button-link-open-in-window', '_self' );

		//Produce HTML version by using the parameters (filename, variation, folder name, parameters)
		$html = hotelex_get_blocks_template_part( 'footer-top-callout-parts', null, 'footer-top-callout/tpl', $params );

		return $html;
	}
}