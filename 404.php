<?php
/**
 * The template for displaying 404 pages (not found)
 *
 */
$header_return_true_false = ( hotelex_get_redux_option( '404-page-settings-show-header', true ) == true ) ? 'hotelex_return_true' : 'hotelex_return_false';
add_filter( 'hotelex_filter_show_header', $header_return_true_false );

$footer_return_true_false = ( hotelex_get_redux_option( '404-page-settings-show-footer', true ) == true ) ? 'hotelex_return_true' : 'hotelex_return_false';
add_filter( 'hotelex_filter_show_footer', $footer_return_true_false );

get_header();

hotelex_get_title_area_parts();

hotelex_get_404_parts();

get_footer();
