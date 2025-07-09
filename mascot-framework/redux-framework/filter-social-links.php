<?php
	$enabled_social_links = array(
		'twitter'     	=> 'Twitter',
		'facebook'    	=> 'Facebook',
		'google-plus' 	=> 'Google+',
		'youtube'     	=> 'Youtube',
		'linkedin'    	=> 'Linkedin',
		'instagram'    	=> 'Instagram',
		'tumblr'     	=> 'Tumblr',
		'vk'     		=> 'VK',
	);
	$enabled_social_links = apply_filters( 'hotelex_redux_config_social_links_enabled', $enabled_social_links );


	$backup_social_links = array(
		'pinterest'     => 'Pinterest',
		'reddit'     	=> 'Reddit',
		'envelope'     	=> 'Email',
		'external-link' => 'Custom Link',
	);
	$backup_social_links = apply_filters( 'hotelex_redux_config_social_links_backup', $backup_social_links );


	//arraylist1
	$redux_config_social_links_arraylist_1 = array(
		array(
			'id'       => 'social-links-ordering',
			'type'     => 'sorter',
			'title'    => esc_html__( 'Social Links Ordering', 'hotelex' ),
			'desc'     => '',
			'compiler' => 'true',
			'options'	=> array(
				'Enabled' => $enabled_social_links,
				'Backup'  => $backup_social_links,
			),
		),
		array(
			'id'       => 'social-links-open-in-window',
			'type'     => 'select',
			'title'    => esc_html__( 'Open links in', 'hotelex' ),
			'subtitle' => '',
			'desc'     => '',
			'options'	=> array(
				'_blank' => esc_html__( 'New Tab', 'hotelex' ),
				'_self'  => esc_html__( 'Same Tab', 'hotelex' ),
			),
			'default'  => '_blank',
		),

		//section Social URLs Starts
		array(
			'id'       => 'social-links-urls-starts',
			'type'     => 'section',
			'title'    => esc_html__( 'Social URLs', 'hotelex' ),
			'subtitle' => '',
			'indent'   => true, // Indent all options below until the next 'section' option is set.
		),
	);


	$redux_config_social_links_arraylist_2_link_urls = array();
	$all_social_links = array_merge( $enabled_social_links, $backup_social_links );
	foreach( $all_social_links as $key => $each_link ) {
		$redux_config_social_links_arraylist_2_link_urls[] = array(
			'id'       => 'social-links-url-' . $key,
			'type'     => 'text',
			'title'    => $each_link,
			'subtitle' => '',
			'desc'     => '',
			'default'  => '',
		);
	}

	//arraylist2
	$redux_config_social_links_arraylist_3 = array(
		array(
			'id'       => 'social-links-urls-ends',
			'type'   => 'section',
			'indent' => false, // Indent all options below until the next 'section' option is set.
		),
	);


	$redux_config_social_links_arraylist = array_merge( $redux_config_social_links_arraylist_1, $redux_config_social_links_arraylist_2_link_urls );
	$redux_config_social_links_arraylist = array_merge( $redux_config_social_links_arraylist, $redux_config_social_links_arraylist_3 );