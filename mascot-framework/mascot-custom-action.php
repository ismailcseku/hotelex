<?php

// Custom Action for this theme
add_action('after_setup_theme', 'hotelex_custom_action_init', 0);

function hotelex_custom_action_init() {

	do_action('hotelex_before_custom_action');

	do_action('hotelex_custom_action');

	do_action('hotelex_after_custom_action');
}