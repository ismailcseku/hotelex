<?php
/**
 * Template Name: Full Width
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();

hotelex_get_title_area_parts();

hotelex_get_page( 'container-fluid pt-0 pb-0', 'no-sidebar' );

get_footer();
