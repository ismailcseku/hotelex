<?php
add_action( 'rwmb_meta_boxes', 'hotelex_blog_single_register_user_meta_boxes' );
function hotelex_blog_single_register_user_meta_boxes( $meta_boxes ) {
	$meta_boxes[] = array(
		'title' => esc_html__( 'Contact Info', 'hotelex' ),
		'type'  => 'user', // Specifically for user
		'fields' => array(
			array(
				'name' => esc_html__( 'Mobile phone', 'hotelex' ),
				'id'   => 'hotelex_' . 'mobile',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Work phone', 'hotelex' ),
				'id'   => 'hotelex_' . 'work',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Address', 'hotelex' ),
				'id'   => 'hotelex_' . 'address',
				'type' => 'textarea',
			),
		),
	);
	$meta_boxes[] = array(
		'title' => esc_html__( 'Social Networks', 'hotelex' ),
		'type'  => 'user', // Specifically for user
		'fields' => array(
			array(
				'name' => esc_html__( 'Facebook', 'hotelex' ),
				'id'   => 'hotelex_' . 'facebook',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Twitter', 'hotelex' ),
				'id'   => 'hotelex_' . 'twitter',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Linkedin', 'hotelex' ),
				'id'   => 'hotelex_' . 'linkedin',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Youtube', 'hotelex' ),
				'id'   => 'hotelex_' . 'youtube',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Google Plus', 'hotelex' ),
				'id'   => 'hotelex_' . 'googleplus',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Instagram', 'hotelex' ),
				'id'   => 'hotelex_' . 'instagram',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Pinterest', 'hotelex' ),
				'id'   => 'hotelex_' . 'pinterest',
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Tumblr', 'hotelex' ),
				'id'   => 'hotelex_' . 'tumblr',
				'type' => 'text',
			),
		),
	);
	return $meta_boxes;
}

add_action( 'rwmb_meta_boxes', 'hotelex_blog_single_register_meta_boxes' );
function hotelex_blog_single_register_meta_boxes( $meta_boxes ) {
	// Meta Box Settings for this Page
	$meta_boxes[] = array(
		'title'		=> esc_html__( 'Blog Settings', 'hotelex' ),
		'post_types' => 'post',
		'priority'   => 'high',

		// List of tabs, in one of the following formats:
		// 1) key => label
		// 2) key => array( 'label' => Tab label, 'icon' => Tab icon )
		'tabs'		=> array(
			'featured_image_size' => array(
				'label' => esc_html__( 'Featured Image Size', 'hotelex' ),
				'icon'  => 'dashicons-screenoptions', // Dashicon
			),
		),

		// Tab style: 'default', 'box' or 'left'. Optional
		'tab_style' => 'left',

		// Show meta box wrapper around tabs? true (default) or false. Optional
		'tab_wrapper' => true,

		'fields'	=> array(
			array(
				'id'     => 'hotelex_' . 'portfolio_mb_featured_image_size_settings',
				// Group field
				'type'   => 'group',
				// Clone whole group?
				'clone'  => false,
				// Drag and drop clones to reorder them?
				'sort_clone' => false,
				// tab
				'tab'  => 'featured_image_size',
				// Sub-fields
				'fields' => array(
					//featured_image_size tab starts
					array(
						'type' => 'heading',
						'name' => esc_html__( 'Featured Image Size', 'hotelex' ),
						'desc' => esc_html__( 'Changes of the following settings will be effective only for this page.', 'hotelex' ),
						'tab'  => 'featured_image_size',
					),
					array(
						'name'		=> esc_html__( 'Featured Image Size in Masonry Tiles Mode', 'hotelex' ),
						'id'		=> 'masonry_tiles_featured_image_size',
						'type'		=> 'select',
						'options'   => mascot_core_hotelex_masonry_image_sizes(),
						'tab'		=> 'featured_image_size',
					),
					//featured_image_size tab ends
				),
			),
		),
	);

	return $meta_boxes;
}