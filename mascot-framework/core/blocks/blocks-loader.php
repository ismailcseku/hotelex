<?php

/* Loads all blocks located in blocks folder
================================================== */
if( !function_exists('hotelex_load_all_template_parts') ) {
	function hotelex_load_all_template_parts() {
		foreach( glob(HOTELEX_FRAMEWORK_DIR.'/core/blocks/*/loader.php') as $each_template_part_loader ) {
			require_once $each_template_part_loader;
		}
	}
	add_action('hotelex_before_custom_action', 'hotelex_load_all_template_parts');
}