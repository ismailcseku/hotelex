<?php
	/**
	 * ReduxFramework Sample Config File
	 * For full documentation, please visit: http://docs.reduxframework.com/
	 */

	if ( ! class_exists( 'Redux' ) ) {
		return;
	}

	// This is your option name where all the Redux data is stored.
	$opt_name = "hotelex_redux_theme_opt";

	// This line is only for altering the demo. Can be easily removed.
	$opt_name = apply_filters( 'hotelex_redux_theme_opt/opt_name', $opt_name );

	$home_url = home_url();

	//custom action hook for this template:
	add_action('redux/options/hotelex_redux_theme_opt/saved', 'hotelex_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/hotelex_redux_theme_opt/saved', 'hotelex_generate_dynamic_css');
	add_action('redux/options/hotelex_redux_theme_opt/reset', 'hotelex_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/hotelex_redux_theme_opt/reset', 'hotelex_generate_dynamic_css');
	add_action('redux/options/hotelex_redux_theme_opt/section/reset', 'hotelex_generate_css_for_custom_theme_color_from_scss');
	add_action('redux/options/hotelex_redux_theme_opt/section/reset', 'hotelex_generate_dynamic_css');

	//required files
	require_once( 'filter-social-links.php' );
	/*
	 *
	 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
	 *
	 */

	// Background Patterns Reader
	$sample_patterns_path = HOTELEX_ADMIN_ASSETS_DIR . '/images/pattern/';
	$sample_patterns_url  = HOTELEX_ADMIN_ASSETS_URI . '/images/pattern/';
	$sample_patterns      = array();

	if ( is_dir( $sample_patterns_path ) ) {

		if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
			$sample_patterns = array();

			while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

				if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
					$name              = explode( '.', $sample_patterns_file );
					$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
					$sample_patterns[ $sample_patterns_url . $sample_patterns_file ] = array(
						'alt' => $name,
						'img' => $sample_patterns_url . $sample_patterns_file
					);
				}
			}
		}
	}


	/*
	 *
	 * ---> START SECTIONS
	 *
	 */

	/*

		As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


	 */


	// -> START General Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'General', 'hotelex' ),
		'id'     => 'general-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-admin-home',
		'fields' => array(
			array(
				'id'       => 'general-settings-favicon',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Favicon', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload a 32px x 32px png/gif image that will represent your website favicon.', 'hotelex' ),
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/favicon.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-144',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 144x144 Icon', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload a 144px x 144px png image that will be your website bookmark on retina iOS devices.', 'hotelex' ),
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/apple-touch-icon-144x144.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-114',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 114x114 Icon', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload a 114px x 114px png image that will be your website bookmark on retina iOS devices.', 'hotelex' ),
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/apple-touch-icon-114x114.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-72',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 72x72 Icon', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload a 72px x 72px Png image that will be your website bookmark on non-retina iOS devices.', 'hotelex' ),
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/apple-touch-icon-72x72.png' ),
			),
			array(
				'id'       => 'general-settings-apple-touch-32',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Apple Touch 32x32 Icon', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => esc_html__( 'Basic media uploader with disabled URL input field.', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload a 32px x 32px png image that will be your website bookmark on non-retina iOS devices.', 'hotelex' ),
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/apple-touch-icon.png' ),
			),
			array(
				'id'       => 'general-settings-enable-responsive',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Responsive', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disable the responsive behaviour of the theme', 'hotelex' ),
				'default'  => true,
			),
			array(
				'id'       => 'general-settings-enable-backtotop',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Back To Top', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable Back to Top button that appears in the bottom right corner of the screen.', 'hotelex' ),
				'default'  => true,
			),


			array(
				'id'       => 'general-settings-enable-gsap-animation-by-default',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable GSap Animation', 'hotelex' ),
				'default'  => false,
			),


			array(
				'id'       => 'general-settings-smooth-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Smooth Page Scrolling (Lenis Scroll)', 'hotelex' ),
				'subtitle' => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices).', 'hotelex' ),
				'default'  => false,
			),

			array(
				'id'       => 'general-settings-enable-element-animation-effect',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Animation Effect on Different Elements', 'hotelex' ),
				'subtitle' => esc_html__( 'Enabling this option will enable animation effect.', 'hotelex' ),
				'default'  => true,
			),
		)
	) );

	$my_wp_get_theme = wp_get_theme();
	// -> START Logo Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Logo', 'hotelex' ),
		'id'     => 'logo-settings',
		'desc'   => sprintf( esc_html__( 'If you want to upload SVG logo then please install this %1$ssvg plugin%2$s', 'hotelex' ), '<a target="_blank" href="' . esc_url( 'https://wordpress.org/plugins/svg-support/' ) . '">', '</a>' ),
		'icon'   => 'dashicons-before dashicons-palmtree',
		'fields' => array(
			array(
				'id'       => 'logo-settings-site-brand',
				'type'     => 'text',
				'title'    => esc_html__( 'Site Brand', 'hotelex' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as logo', 'hotelex' ),
				'desc'     => '',
				'default'  => $my_wp_get_theme->get( 'Name' ),
			),

			array(
				'id'       => 'logo-settings-want-to-use-logo',
				'type'     => 'switch',
				'title'    => esc_html__( 'Use logo in replace of "Site Brand" Text?', 'hotelex' ),
				'subtitle' => esc_html__( 'If you want to use logo then please enable it.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),

			array(
				'id'       => 'logo-settings-switchable-logo',
				'type'     => 'switch',
				'title'    => esc_html__( 'Switchable logo(Light+Dark)?', 'hotelex' ),
				'subtitle' => esc_html__( 'If you want to use switchable logo then please enable it.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-default',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Default)', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '0' ),
			),

			array(
				'id'       => 'logo-settings-logo-default-dark-bg',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (White) For Dark Background', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '0' ),
			),

			array(
				'id'       => 'logo-settings-logo-primary',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Default)', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload a logo for the default mode.', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-on-sticky',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo (Sticky Mode)', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload a logo for the sticky mode.', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'logo-settings-switchable-logo', '=', '1' ),
			),

			array(
				'id'       => 'logo-settings-logo-mobile-version',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Logo for Mobile Version', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload/choose your custom logo image', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/logo-wide-white.png' ),
			),

			array(
				'id'            => 'logo-settings-logo-margin-around',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin(px) Around Logo', 'hotelex' ),
			),

			array(
				'id'            => 'logo-settings-logo-sticky-margin-around',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin(px) Around Logo in Sticky Mode', 'hotelex' ),
			),

			array(
				'id'       => 'logo-settings-admin-login-logo',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'WordPress Admin Login Logo', 'hotelex' ),
				'subtitle' => esc_html__( 'Change the default wordpress login logo. Dimensions should be 250x50 px', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/logo-wide.png' ),
			),

		)
	) );


	// -> START Theme Color Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Theme Color Settings', 'hotelex' ),
		'id'     => 'theme-color-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-art',
		'fields' => array(
			array(
				'id'       => 'theme-color-settings-theme-color-type',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Website Primary Theme Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Select website primary theme color', 'hotelex' ),
				'options' => array(
					'predefined' => esc_html__( 'Predefined Theme Colors', 'hotelex' ),
					'custom'     => esc_html__( 'Custom Theme Color', 'hotelex' )
				),
				'default' => 'predefined',
			),
			array(
				'id'       => 'theme-color-settings-primary-theme-color',
				'type'     => 'select',
				'title'    => esc_html__( 'Predefined Theme Colors', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose one from these predefined theme colors', 'hotelex' ),
				'desc'     => '',
				'options'	=> hotelex_metabox_get_list_of_predefined_theme_color_css_files(),
				'default'  => 'theme-skin-color-set1.css',
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'predefined' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color1',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Primary Theme Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom primary color for the theme.', 'hotelex' ),
				'default'  => '#1296CC',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color2',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Secondary Theme Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom secondary color for the theme.', 'hotelex' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color3',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom 3rd Theme Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom 3rd color for the theme.', 'hotelex' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color4',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom 4th Theme Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom 4th color for the theme.', 'hotelex' ),
				'default'  => '#dd9933',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color1',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 1 (for Custom Primary Theme Color)', 'hotelex' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'hotelex' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color2',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 2 (for Custom Secondary Theme Color)', 'hotelex' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'hotelex' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color3',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 3 (for Custom 3rd Theme Color)', 'hotelex' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'hotelex' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-text-color4',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color 4 (for BG 4th Theme Color)', 'hotelex' ),
				'subtitle' => esc_html__( 'Text color when we will use theme color in the background. Generally text color is white or black according to the theme color', 'hotelex' ),
				'default'  => '#fff',
				'transparent'  => false,
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),
			array(
				'id'       => 'theme-color-settings-custom-theme-color-filename',
				'type'     => 'text',
				'title'    => esc_html__( 'File Name to Save This Color Set (Optional)', 'hotelex' ),
				'subtitle' => esc_html__( 'If you want to save this color set as a css file then give a name of the file. File name must starts with "theme-color-". Same name will override exising one. Leave empty for not to save it as a css file.', 'hotelex' ),
				'desc'     => '',
				'required' => array( 'theme-color-settings-theme-color-type', '=', 'custom' ),
			),



			//Site Category CSS files
			array(
				'id'       	=> 'theme-color-settings-theme-color-custom-site-cssfile-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Attach Premade CSS File to get extra styling throughout the site.', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'theme-color-settings-premade-sitewise-css-file',
				'type'     => 'select',
				'title'    => esc_html__( 'Attach Premade CSS File into the header', 'hotelex' ),
				'subtitle' => esc_html__( 'These files are located in assets/css/sites folder of this theme.', 'hotelex' ),
				'options'	=> hotelex_metabox_get_list_of_premade_sitewise_css_files(),
			),
		)
	) );


	// -> START Dark Mode Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Dark Mode', 'hotelex' ),
		'id'     => 'darkmode-settings',
		'icon'   => 'dashicons-before dashicons-visibility',
		'fields' => array(
			array(
				'id'       => 'general-settings-enable-dark-mode',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Dark Mode', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disable the Dark Mode of the theme', 'hotelex' ),
				'default'  => false,
			),
		)
	) );



	// -> START Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Typography', 'hotelex' ),
		'id'     => 'typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
	) );

	// -> START Body Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Body Typography', 'hotelex' ),
		'id'     => 'primary-body-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'typography-primary-body',
				'type'          => 'typography',
				'title'         => esc_html__( 'Primary Body Typography', 'hotelex' ),
				'subtitle'      => esc_html__( 'Specify the body font properties.', 'hotelex' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'            => 'typography-primary-body-link-color',
				'type'          => 'color',
				'title'         => esc_html__( 'Primary Link Color', 'hotelex' ),
				'subtitle'      => esc_html__( 'Specify link color throughout the body.', 'hotelex' ),
				'transparent'   => false,
			),
		)

	) );

	// -> START Body Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Section Title Typography', 'hotelex' ),
		'id'     => 'section-title-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'typography-section-title',
				'type'          => 'typography',
				'title'         => esc_html__( 'Section Title Typography', 'hotelex' ),
				'subtitle'      => esc_html__( 'Specify the Section Title font properties.', 'hotelex' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'            => 'typography-section-subtitle',
				'type'          => 'typography',
				'title'         => esc_html__( 'Section Sub-Title Typography', 'hotelex' ),
				'subtitle'      => esc_html__( 'Specify the Section Sub-Title font properties.', 'hotelex' ),
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
		)

	) );

	// -> START Headings Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Headings Typography', 'hotelex' ),
		'id'     => 'headings-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			//section H1 Starts
			array(
				'id'       => 'typography-h1-h6-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Common Heading H1 to h6', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for heading H1, H2, H3, H4, H5, H6.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h1-h6',
				'type'          => 'typography',
				'title'         => esc_html__( 'Common Heading(H1 to h6) Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),



			//section H1 Starts
			array(
				'id'       => 'typography-h1-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H1', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for heading H1.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h1',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H1 Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h1-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h1-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H2 Starts
			array(
				'id'       => 'typography-h2-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H2', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for heading H2.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h2',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H2 Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h2-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h2-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H3 Starts
			array(
				'id'       => 'typography-h3-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H3', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for heading H3.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h3',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H3 Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h3-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h3-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H4 Starts
			array(
				'id'       => 'typography-h4-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H4', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for heading H4.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h4',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H4 Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h4-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h4-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H5 Starts
			array(
				'id'       => 'typography-h5-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H5', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for heading H5.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h5',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H5 Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h5-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h5-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section H6 Starts
			array(
				'id'       => 'typography-h6-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Heading H6', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for heading H6.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'            => 'typography-h6',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading H6 Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'typography-h6-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'     => 'typography-h6-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),



		)
	) );

	// -> START Button Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Button Typography', 'hotelex' ),
		'id'     => 'primary-button-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'button-typography-btn-default',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Default', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-default-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Default', 'hotelex' ),
			),
			array(
				'id'            => 'button-typography-btn-lg',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Large', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-lg-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Large', 'hotelex' ),
			),
			array(
				'id'            => 'button-typography-btn-sm',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Small', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-sm-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Small', 'hotelex' ),
			),
			array(
				'id'            => 'button-typography-btn-xs',
				'type'          => 'typography',
				'title'         => esc_html__( 'Typography - Button Extra Small', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'button-typography-btn-xs-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,     // Disable the top
				'right'         => true,     // Disable the right
				'bottom'        => true,     // Disable the bottom
				'left'          => true,     // Disable the left
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Padding - Button Extra Small', 'hotelex' ),
			),
		)

	) );

	// -> START Link Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Post/Page Content Link Typography', 'hotelex' ),
		'id'     => 'content-link-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-textcolor',
		'subsection' => true,
		'fields' => array(
			array(
				'id'            => 'link-typography-link',
				'type'          => 'typography',
				'title'         => esc_html__( 'Link Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'	   => 'link-typography-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Link Hover Color', 'hotelex' ),
				'transparent' => false,
			),
		)
	) );


	// -> START Layout Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Layout Settings', 'hotelex' ),
		'id'     => 'layout-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-table',
		'fields' => array(
			array(
				'id'        => 'layout-settings-page-layout',
				'type'      => 'button_set',
				'compiler'  => true,
				'title'     => esc_html__( 'Page Layout', 'hotelex' ),
				'subtitle'  => esc_html__( 'Select primary page layout of your theme', 'hotelex' ),
				'options'   => array(
					'boxed'        => esc_html__( 'Boxed', 'hotelex' ),
					'stretched'    => esc_html__( 'Stretched', 'hotelex' )
				),
				'default'   => 'stretched',
			),

			array(
				'id'       => 'layout-settings-content-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Content Width', 'hotelex' ),
				'subtitle' => esc_html__( 'Select content width. You can use any width by using custom CSS', 'hotelex' ),
				'options' => array(
					'container-970px'     => esc_html__( '970px', 'hotelex' ),
					'container-default'   => esc_html__( '1170px (Bootstrap Default)', 'hotelex' ),
					'container-elementor-default'    => esc_html__( 'Elementor Default', 'hotelex' ),
					'container-1230px'    => esc_html__( '1230px', 'hotelex' ),
					'container-1300px'    => esc_html__( '1300px', 'hotelex' ),
					'container-1340px'    => esc_html__( '1340px', 'hotelex' ),
					'container-1440px'    => esc_html__( '1440px', 'hotelex' ),
					'container-1500px'    => esc_html__( '1500px', 'hotelex' ),
					'container-1600px'    => esc_html__( '1600px', 'hotelex' ),
					'container-100pr'     => esc_html__( 'Fullwidth 100%', 'hotelex' )
				),
				'default' => 'container-1230px',
			),
			array(
				'id'       => 'layout-settings-stretched-layout-bg-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Solid Color(Stretched Mode)', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom color for background.', 'hotelex' ),
				'transparent' => false,
				'required' => array( 'layout-settings-page-layout', '=', 'stretched' ),
			),


			//section H3 Starts
			array(
				'id'       => 'layout-settings-boxed-layout-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Boxed Layout Settings', 'hotelex' ),
				'subtitle' => esc_html__( 'Define styles for Boxed Layout.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'layout-settings-page-layout', '=', 'boxed' ),
			),
			array(
				'id'             => 'layout-settings-boxed-layout-padding-top-bottom',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				// Have one field that applies to all
				'top'            => true,     // Disable the top
				'right'          => false,     // Disable the right
				'bottom'         => true,     // Disable the bottom
				'left'           => false,     // Disable the left
				'units'          => 'px',
				'units_extended' => 'true',
				'display_units'  => true,   // Set to false to hide the units if the units are specified
				'title'          => esc_html__( 'Padding Top & Bottom(px)', 'hotelex' ),
				'subtitle'       => esc_html__( 'Top and bottom padding in px for boxed layout.', 'hotelex' ),
				'desc'           => esc_html__( 'Controls the top and bottom padding of the boxed layout. Ex: 40px, 40px. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'hotelex' ),
				'default'            => array(
					'padding-top'     => '40',
					'padding-bottom'  => '40',
					'units'          => 'px',
				)
			),
			array(
				'id'       => 'layout-settings-boxed-layout-container-shadow',
				'type'     => 'switch',
				'title'    => esc_html__( 'Container Shadow?', 'hotelex' ),
				'subtitle' => esc_html__( 'Add shadow around the container.', 'hotelex' ),
				'default'  => 0,
				'on'       => 'On',
				'off'      => 'Off',
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type',
				'type'     => 'radio',
				'title'    => esc_html__( 'Background Type', 'hotelex' ),
				'subtitle' => esc_html__( 'You can use patterns, image or solid color as a background.', 'hotelex' ),
				'options'	=> array(
					'bg-color'     => esc_html__( 'Solid Color', 'hotelex' ),
					'bg-patter'    => esc_html__( 'Patterns from Theme Library', 'hotelex' ),
					'bg-image'     => esc_html__( 'Upload Own Image', 'hotelex' ),
				),
				'default'  => 'bg-color',
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Solid Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom color for background (default: #444).', 'hotelex' ),
				'default'  => '#444',
				'transparent' => true,
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-color' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-pattern',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Patterns from Theme Library', 'hotelex' ),
				'subtitle' => esc_html__( 'Select a patterns by clicking on it.', 'hotelex' ),
				'desc'     => '',
				'options'	=> $sample_patterns,
				'default'  => key($sample_patterns),
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-patter' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-bg-type-bgimg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background Image', 'hotelex' ),
				'subtitle' => esc_html__( 'Body background image.', 'hotelex' ),
				'background-color' => false,
				'required' => array( 'layout-settings-boxed-layout-bg-type', '=', 'bg-image' ),
			),
			array(
				'id'       => 'layout-settings-boxed-layout-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Header
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header', 'hotelex' ),
		'id'     => 'header',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
	) );


	// -> START Header Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header', 'hotelex' ),
		'id'     => 'header-layout',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-settings-choose-header-visibility',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Visibility', 'hotelex' ),
				'subtitle' => esc_html__( 'Show or hide header globally', 'hotelex' ),
				'default'  => 1,
				'on'       => 'Show',
				'off'      => 'Hide',
			),



			array(
				'id'        => 'header-settings-choose-header-top-cpt-elementor-info',
				'type'      => 'info',
				'title'     => esc_html__( 'Elementor Headers', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Header (Built with Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('You can create your own Header from %s', 'hotelex'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-transparent',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Floating/Transparent (Built with Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('You can create your own Header from %s', 'hotelex'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-sticky',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Sticky (Built with Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('It will be shown when you scroll down. You can create your own Header from %s', 'hotelex'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
			array(
				'id'       => 'header-settings-choose-header-top-cpt-elementor-mobile',
				'type'     => 'select',
				'title'    => esc_html__( 'Header - Mobile/Tab (Built with Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('It will be visible on Tab & Mobile devices only. You can create your own Header from %s', 'hotelex'), '<a href="'.admin_url('edit.php?post_type=header-top').'" target="_blank">Dashboard > Parts - Header Top</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'header-top' ),
					'posts_per_page' => -1,
				),
			),
		)
	) );

	// -> START Header Navigation Row
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Mobile', 'hotelex' ),
		'id'     => 'header-mobile-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-mobile-settings-mobile-nav-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Mobile Menu Background Color', 'hotelex' ),
			),
			array(
				'id'       => 'header-mobile-settings-hamburger-line-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Hamburger Line Color', 'hotelex' ),
			),
			array(
				'id'       => 'header-mobile-settings-revealed-canvas-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Revealed Mobile Canvas Background Color', 'hotelex' ),
			),
			array(
				'id'       => 'header-mobile-settings-item-indicator-arrow-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Item Indicator Arrow BG Color', 'hotelex' ),
			),
			array(
				'id'       => 'header-mobile-settings-item-indicator-arrow-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Menu Item Indicator Arrow Color', 'hotelex' ),
			),
			array(
				'id'            => 'logo-settings-maximum-logo-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Logo Width(px) in Mobile Memu', 'hotelex' ),
				'subtitle'      => esc_html__( 'Enter logo width in px.', 'hotelex' ),
				'desc'          => '',
				'min'           => 20,
				'step'          => 1,
				'max'           => 500,
				'default'       => 120,
				'display_value' => 'text',
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),
		)
	) );



	// -> START Header Navigation Row
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Sticky', 'hotelex' ),
		'id'     => 'header-sticky-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-sticky-enable-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Fixed/Sticky on Scroll?', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'header-sticky-always-visible-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Always Visible on Scroll?', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'header-sticky-enable-on-scroll', '=', '1' ),
			),


			array(
				'id'        => 'header-sticky-settings-mobile',
				'type'      => 'info',
				'title'     => esc_html__( 'Header Fixed/Sticky For Mobile', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-sticky-mobile-enable-on-scroll',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Fixed/Sticky on Scroll?', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'header-sticky-mobile-always-visible-on-scroll-mobile',
				'type'     => 'switch',
				'title'    => esc_html__( 'Header Always Visible on Scroll?', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'header-sticky-mobile-enable-on-scroll', '=', '1' ),
			),
			array(
				'id'            => 'logo-settings-maximum-logo-width-in-sticky-mode',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Logo Width(px) in Sticky Mode', 'hotelex' ),
				'subtitle'      => esc_html__( 'Enter maximum logo width in px in sticky header mode.', 'hotelex' ),
				'desc'          => '',
				'min'           => 20,
				'step'          => 1,
				'max'           => 250,
				'display_value' => 'text',
				'required' => array( 'logo-settings-want-to-use-logo', '=', '1' ),
			),
		)
	) );

	// -> START Header Navigation Row
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Default Header Navigation Row', 'hotelex' ),
		'id'     => 'header-navigation-layout',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(

			//Header Visibility Important
			array(
				'id'        => 'header-settings-header-navigation-info-field-important',
				'type'      => 'info',
				'title'     => esc_html__( 'Important!', 'hotelex' ),
				'subtitle'  => sprintf( esc_html__( 'As you have chosen %1$sHeader Visibility%2$s to %1$sHide%2$s so there\'s nothing to show here!', 'hotelex' ), '<strong>', '</strong>'),
				'notice'    => false,
				'required' => array( 'header-settings-choose-header-visibility', '!=', '1' ),
			),




			array(
				'id'       => 'header-settings-navigation-show-header-nav-row',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Default Header Navigation Row', 'hotelex' ),
				'subtitle' => esc_html__( 'Enabling/Disabling this option will show/hide Whole Header Navigation Row section.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),































































			array(
				'id'       => 'header-settings-header-layout-type-container',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Header Nav Row Container', 'hotelex' ),
				'subtitle' => esc_html__( 'Put Header nav content boxed or stretched fullwidth.', 'hotelex' ),
				'options'	=> array(
					'container' => esc_html__( 'Container', 'hotelex' ),
					'container-fluid' => esc_html__( 'Container Fluid', 'hotelex' )
				),
				'default' => 'container',
			),


			array(
				'id'       => 'header-settings-header-layout-floating-bg-shadow',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Header Background Shadow (Header Floating)', 'hotelex' ),
				'options'	=> array(
					'header-bg-no-shadow'		=> esc_html__( 'No Shadow', 'hotelex' ),
					'header-bg-dark-shadow'		=> esc_html__( 'Dark Background Shadow', 'hotelex' ),
					'header-bg-light-shadow'	=> esc_html__( 'Light Background Shadow', 'hotelex' ),
				),
				'default' => 'header-bg-no-shadow',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),


			array(
				'id'       => 'header-settings-header-layout-floating-text-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Text Color (Header Floating)', 'hotelex' ),
				'options'	=> array(
					'header-floating-bg-dark-text-white'	=> esc_html__( 'White Text', 'hotelex' ),
					'header-floating-bg-white-text-dark'		=> esc_html__( 'Dark Text', 'hotelex' ),
				),
				'default' => 'header-floating-bg-dark-text-white',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),

			array(
				'id'       => 'header-settings-header-layout-floating-bg-color-sticky',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Color (on Header Floating + Sticky)', 'hotelex' ),
				'options'	=> array(
					'header-floating-sticky-bg-white'	=> esc_html__( 'White BG', 'hotelex' ),
					'header-floating-sticky-bg-dark'		=> esc_html__( 'Dark BG', 'hotelex' ),
				),
				'default' => 'header-floating-sticky-bg-dark',
				'required' => array(
					array( 'header-settings-choose-header-layout-type', 'contains', 'header-floating' )
				)
			),

			array(
				'id'       => 'header-settings-choose-header-layout-type',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Header Layout Type', 'hotelex' ),
				'subtitle' => esc_html__( 'Select the type of header you would like to use', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'header-default' => array(
						'alt' => 'Header Default',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/header-layout/header-default.jpg'
					),

					'header-mobile-nav' => array(
						'alt' => 'Mobile Nav',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/header-layout/header-mobile-nav.jpg'
					),
				),
				'default'  => 'header-default',
			),
































			array(
				'id'       => 'header-settings-navigation-bgcolor-use-themecolor',
				'type'     => 'select',
				'title'    => esc_html__( 'Use Theme Color in Background?', 'hotelex' ),
				'subtitle' => esc_html__( 'Use theme color or custom bg color in Header Navigation Row', 'hotelex' ),
				'desc'     => '',
				'options'  => mascot_core_hotelex_theme_color_list(),
				'default'  => '',
			),
			array(
				'id'       => 'header-settings-navigation-custom-bgcolor',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Background Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom background color for Header Navigation Row.', 'hotelex' ),
				'transparent' => true,
				'required' => array( 'header-settings-navigation-bgcolor-use-themecolor', '=', '' ),
			),



			array(
				'id'        => 'header-settings-navigation-custom-navigation-link-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Cart/Search/Side Push Icons', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-navigation-custom-navigation-link-n-icon-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Navigation Link and Cart/Search/Side Push Icon Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Pick a custom color for link and icons on Header Navigation Row.', 'hotelex' ),
				'transparent' => true,
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-cart-icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Cart Icon', 'hotelex' ),
				'subtitle' => esc_html__( 'Add Cart Icon on the right hand side of the menu. WooCommerce plugin needs to be installed.', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-cart-icon-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Cart Icon in Mobile Device', 'hotelex' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-menu-cart-icon', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-menu-cart-icon-code',
				'type'     => 'text',
				'title'    => esc_html__( 'Cart Icon', 'hotelex' ),
				'subtitle' => sprintf( esc_html__( 'You can change the search icon from here. See full list of icons from %1$shere%2$s', 'hotelex' ), '<a target="_blank" href="' . esc_url( 'http://docs.kodesolution.info/icons/' ) . '">', '</a>' ),
				'desc'     => '',
				'default'  => 'lnr lnr-icon-cart1',
				'required' => array( 'header-settings-navigation-show-menu-cart-icon', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-show-menu-search-icon',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Search Icon', 'hotelex' ),
				'subtitle' => esc_html__( 'Add Search Icon on the right hand side of the menu.', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-menu-search-icon-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Search Icon in Mobile Device', 'hotelex' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-menu-search-icon', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-menu-search-icon-code',
				'type'     => 'text',
				'title'    => esc_html__( 'Search Icon', 'hotelex' ),
				'subtitle' => sprintf( esc_html__( 'You can change the search icon from here. See full list of icons from %1$shere%2$s', 'hotelex' ), '<a target="_blank" href="' . esc_url( 'http://docs.kodesolution.info/icons/' ) . '">', '</a>' ),
				'desc'     => '',
				'default'  => 'fa fa-search',
				'required' => array( 'header-settings-navigation-show-menu-search-icon', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-show-side-push-panel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Side Push Panel', 'hotelex' ),
				'subtitle' => esc_html__( 'Add Side Push Icon on the right hand side of the menu to Enable/Disable Side Push Panel section. You can easily add your widgets to this section from Appearance > Widgets (Side Push Panel Sidebar)', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-side-push-panel-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Side Push Panel Icon in Mobile Device', 'hotelex' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-side-push-panel', '=', '1' ),
			),


			//Header Nav - Custom Button
			array(
				'id'        => 'header-settings-navigation-custom-button-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Custom Button', 'hotelex' ),
				'subtitle'  => esc_html__( 'Add Custom Button on the right hand side of the Header Navigation Row', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'header-settings-navigation-show-custom-button',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Custom Button', 'hotelex' ),
				'subtitle' => esc_html__( 'Add Custom Button on the right hand side of the Header Navigation Row.', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
			),
			array(
				'id'       => 'header-settings-navigation-show-custom-button-reflect-other-pages',
				'type'     => 'switch',
				'title'    => esc_html__( 'Reflect This Settings in Other Pages too?', 'hotelex' ),
				'subtitle' => esc_html__( 'If you enable it then this button will be shown on other header styles chose from Page Settings.', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-info',
				'type'     => 'sortable',
				'title'    => esc_html__( 'Custom Button Info', 'hotelex' ),
				'subtitle' => esc_html__( 'Enter your custom button info.', 'hotelex' ),
				'desc'     => esc_html__( 'Show a custom button in the Header Navigation Row.', 'hotelex' ),
				'label'    => true,
				'options'	=> array(
					'title'  => '',
					'link'   => '',
				),
				'default' => array(
					'title'  => esc_html__( 'Custom Button', 'hotelex' ),
					'link'   => '#',
				),
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-design-style',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Design Style', 'hotelex' ),
				'desc'     => '',
				'options'	=> array_flip( mascot_core_hotelex_get_btn_design_style() ),
				'default'  => 'btn-gray',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Button Size', 'hotelex' ),
				'desc'     => '',
				'options'	=> array_flip( mascot_core_hotelex_get_button_size() ),
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-flat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Flat', 'hotelex' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-outlined',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Outlined', 'hotelex' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-round',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Button Round', 'hotelex' ),
				'default'  => 0,
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-link-open-in-window',
				'type'     => 'select',
				'title'    => esc_html__( 'Open Link in', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'_blank' => esc_html__( 'New Tab', 'hotelex' ),
					'_self'  => esc_html__( 'Same Tab', 'hotelex' ),
				),
				'default'  => '_blank',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-custom-button-show-in-mobile-device',
				'type'     => 'switch',
				'title'    => esc_html__( '|---Show Button in Mobile Device', 'hotelex' ),
				'subtitle' => esc_html__( 'Show/Hide icon in Mobile View', 'hotelex' ),
				'default'  => 0,
				'on'       => 'Yes',
				'off'      => 'No',
				'required' => array( 'header-settings-navigation-show-custom-button', '=', '1' ),
			),


			array(
				'id'        => 'header-settings-navigation-color-scheme-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Navigation Color Scheme', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-color-scheme',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Color Scheme', 'hotelex' ),
				'subtitle' => esc_html__( 'Select the color scheme of main menu', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => esc_html__( 'Default', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/default.jpg '
					),
					'blue' => array(
						'alt' => esc_html__( 'Blue', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/blue.jpg '
					),
					'green' => array(
						'alt' => esc_html__( 'Green', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/green.jpg '
					),
					'orange' => array(
						'alt' => esc_html__( 'Orange', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/orange.jpg '
					),
					'pink' => array(
						'alt' => esc_html__( 'Pink', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/pink.jpg '
					),
					'purple' => array(
						'alt' => esc_html__( 'Purple', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/purple.jpg '
					),
					'red' => array(
						'alt' => esc_html__( 'Red', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/red.jpg '
					),
					'yellow' => array(
						'alt' => esc_html__( 'Yellow', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/colors/yellow.jpg '
					)
				),
				'default'  => 'default',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),

			array(
				'id'       => 'header-settings-navigation-primary-effect',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Primary Effect', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'fade'  => esc_html__( 'Fade', 'hotelex' ),
					'slide' => esc_html__( 'Slide', 'hotelex' )
				),
				'default'  => 'slide',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
			array(
				'id'       => 'header-settings-navigation-css3-animation',
				'type'     => 'button_set',
				'title'    => esc_html__( 'CSS3 Animation', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'none'      => esc_html__( 'None', 'hotelex' ),
					'zoom-in'   => esc_html__( 'Zoom In', 'hotelex' ),
					'zoom-out'  => esc_html__( 'Zoom Out', 'hotelex' ),
					'drop-up'   => esc_html__( 'Drop Up', 'hotelex' ),
					'drop-left' => esc_html__( 'Drop Left', 'hotelex' ),
					'swing'     => esc_html__( 'Swing', 'hotelex' ),
					'flip'      => esc_html__( 'Flip', 'hotelex' ),
					'roll-in'   => esc_html__( 'Roll In', 'hotelex' ),
					'stretch'   => esc_html__( 'Stretch', 'hotelex' ),
				),
				'default'  => 'none',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-skin',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Navigation Skin', 'hotelex' ),
				'subtitle' => esc_html__( 'Select the skin of main menu you would like to use', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => 'default',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/default.jpg'
					),
					'bottom-trace' => array(
						'alt' => 'bottom-trace',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/bottom-trace.jpg'
					),
					'rounded-boxed' => array(
						'alt' => 'rounded-boxed',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/rounded-boxed.jpg'
					),
					'boxed' => array(
						'alt' => 'boxed',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/boxed.jpg'
					),
					'border-boxed' => array(
						'alt' => 'border-boxed',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-boxed.jpg'
					),
					'top-bottom-boxed-border' => array(
						'alt' => 'top-bottom-boxed-border',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/top-bottom-boxed-border.jpg'
					),
					'border-left' => array(
						'alt' => 'border-left',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-left.jpg'
					),
					'border-top' => array(
						'alt' => 'border-top',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-top.jpg'
					),
					'border-bottom' => array(
						'alt' => 'border-bottom',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-bottom.jpg'
					),
					'border-top-bottom' => array(
						'alt' => 'border-top-bottom',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/top-menu-style/skins/border-top-bottom.jpg'
					),
				),
				'default'  => 'default',
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),


		)
	) );


	// -> START Header Navigation Skin Typography
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Header Nav Typography', 'hotelex' ),
		'id'     => 'header-header-navigation-skin-typography',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-up-alt',
		'subsection' => true,
		'fields' => array(


			//Header Nav - Navigation Skin
			array(
				'id'        => 'header-settings-navigation-skin-info-field',
				'type'      => 'info',
				'title'     => esc_html__( 'Navigation Skin', 'hotelex' ),
				'subtitle'  => esc_html__( 'Select the skin of main menu you would like to use', 'hotelex' ),
				'notice'    => false,
				'required'  => array(
					array( 'header-settings-show-header-top', '=', '1' )
				)
			),
			array(
				'id'            => 'header-settings-navigation-item-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Items Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Main Nav Items Hover/Active Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'            => 'header-settings-navigation-item-dropdown-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Dropdown Items Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-dropdown-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Dropdown Items Hover/Active Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
			),


			array(
				'id'            => 'header-settings-navigation-skin-dropdown-menu-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Dropdown Menu Width(px)', 'hotelex' ),
				'subtitle'      => esc_html__( 'Enter width of dropdown menu in px.', 'hotelex' ),
				'desc'          => '',
				'default'       => 260,
				'min'           => 150,
				'step'          => 1,
				'max'           => 400,
				'display_value' => 'text',
			),



			array(
				'id'            => 'header-settings-navigation-item-megamenu-dropdown-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Main Nav Megamenu Items Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'header-settings-navigation-item-megamenu-dropdown-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Megamenu Items Hover/Active Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'            => 'header-settings-navigation-item-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Main Nav Items Padding(px) Around it', 'hotelex' ),
			),
		)
	) );





	// -> START Header Menu Megamenu
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Megamenu', 'hotelex' ),
		'id'     => 'header-menu-megamenu',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-menu',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'header-menu-megamenu-enable-megamenu',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Mega Menu', 'hotelex' ),
				'subtitle' => sprintf( esc_html__( 'Turn on to enable mega menu. After enabling mega menu, you will get a lot of options for mega menu at %1$sAppearance > Menus%2$s', 'hotelex' ), '<strong>', '</strong>'),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'header-settings-choose-header-visibility', '=', '1' ),
			),
		)
	) );




	// -> START Page Title Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Page Title', 'hotelex' ),
		'id'     => 'page-title-settings',
		'desc'   => esc_html__( 'Enable/Disable Page Title Area for posts and pages.', 'hotelex' ),
		'icon'   => 'dashicons-before dashicons-archive',
		'fields' => array(
			array(
				'id'       => 'page-title-settings-enable-page-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Page Title', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'page-title-settings-choose-page-title-cpt-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Page Title (Built with Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('It will be shown at the top of the page under header. You can create your own one from %s', 'hotelex'), '<a href="'.admin_url('edit.php?post_type=page-title').'" target="_blank">Dashboard > Parts - Page Title</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'page-title' ),
					'posts_per_page' => -1,
				),
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-default-page-title-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Or Enable Default Page Title', 'hotelex' ),
				'indent'   => true,
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-default-page-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Default Page Title', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'page-title-settings-enable-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Page Title Layout', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'standard' => array(
						'alt' => 'standard',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/footer/f11.jpg'
					),
					'split' => array(
						'alt' => 'split',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/footer/f7.jpg'
					),
				),
				'default'  => 'standard',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-container',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Title Area Container', 'hotelex' ),
				'subtitle' => esc_html__( 'Put Page Title content into boxed or stretched fullwidth.', 'hotelex' ),
				'options'	=> array(
					'container' => esc_html__( 'Container', 'hotelex' ),
					'container-fluid' => esc_html__( 'Container Fluid', 'hotelex' )
				),
				'default' => 'container',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-enable-custom-padding-top-bottom',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Custom Padding Top & Bottom into Page Title Area', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'             => 'page-title-settings-container-padding-top-bottom',
				'type'           => 'spacing',
				'mode'           => 'padding',
				'all'            => false,
				// Have one field that applies to all
				'top'            => true,     // Disable the top
				'right'          => false,     // Disable the right
				'bottom'         => true,     // Disable the bottom
				'left'           => false,     // Disable the left
				'units'          => 'px',
				'units_extended' => 'true',
				'display_units'  => true,   // Set to false to hide the units if the units are specified
				'title'          => esc_html__( 'Padding Top & Bottom(px)', 'hotelex' ),
				'subtitle'       => esc_html__( 'Top and bottom padding in px of page title container.', 'hotelex' ),
				'desc'           => esc_html__( 'Controls the top and bottom padding of page title. Ex: 80px, 80px. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'hotelex' ),
				'default'            => array(
					'padding-top'     => '80',
					'padding-bottom'  => '80',
					'units'          => 'px',
				),
				'required' => array( 'page-title-settings-enable-custom-padding-top-bottom', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Title', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disable title on Page Title Area. It is possible to disable them individually using page meta settings.', 'hotelex' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-subtitle',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Subtitle', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disable Sub title on Page Title Area. It is possible to disable them individually using page meta settings.', 'hotelex' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-show-breadcrumbs',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Breadcrumbs', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disable breadcrumbs on Page Title. It is possible to disable them individually using page meta settings.', 'hotelex' ),
				'default'  => true,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-height',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Area Height', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'select2' => array( array( 'minimumResultsForSearch' => 'Infinity' ) ),
				'options'	=> array(
					'padding-default'       => esc_html__( 'Default', 'hotelex' ),
					'padding-extra-small'   => esc_html__( 'Extra Small', 'hotelex' ),
					'padding-small'         => esc_html__( 'Small', 'hotelex' ),
					'padding-medium'        => esc_html__( 'Medium', 'hotelex' ),
					'padding-large'         => esc_html__( 'Large', 'hotelex' ),
					'padding-extra-large'   => esc_html__( 'Extra Large', 'hotelex' ),
				),
				'default'  => 'padding-medium',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-text-color',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Default Text Color', 'hotelex' ),
				'desc'     => '',
				'subtitle' => esc_html__( 'Select default text color. Inverted will turn font color to black. Inverted is suitable for white background.', 'hotelex' ),
				'options'	=> array(
					'text-default'   => esc_html__( 'Default (Text White)', 'hotelex' ),
					'text-inverted'  => esc_html__( 'Inverted (Text Black)', 'hotelex' )
				),
				'default' => 'text-default',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Alignment', 'hotelex' ),
				'subtitle' => esc_html__( 'Text Alignment of Page Title', 'hotelex' ),
				'desc'     => '',
				'options'	=> hotelex_redux_text_alignment_list(),
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-top-border-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Title Area Top Border Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-bottom-border-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Title Area Bottom Border Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),


			//Page Title background
			array(
				'id'       => 'page-title-settings-bg-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Title Background', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg',
				'type'     => 'background',
				'title'    => esc_html__( 'Page Title Background', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose background image or color.', 'hotelex' ),
				'default'  => array(
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => '',
					'background-position'   => 'center center',
				),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Page Title Background Overlay', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'hotelex' ),
				'subtitle'      => esc_html__( 'Overlay on background image on Page Title.', 'hotelex' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'hotelex' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'hotelex' ),
					'dark'          => esc_html__( 'Dark', 'hotelex' ),
					'white'         => esc_html__( 'White', 'hotelex' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'hotelex' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'hotelex' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'hotelex' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'hotelex' )
				),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-layer-overlay-status', '=', '1' )
				)
			),

			//background video
			array(
				'id'       => 'page-title-settings-bg-video-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Background Video', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-type',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Video Type', 'hotelex' ),
				'subtitle' => '',
				'options' => array(
					'youtube' => esc_html__( 'Youtube', 'hotelex' ),
					'self-hosted' => esc_html__( 'Self Hosted Video', 'hotelex' )
				),
				'default' => 'youtube',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-youtube-id',
				'type'     => 'text',
				'title'    => esc_html__( 'Youtube Video ID', 'hotelex' ),
				'subtitle'    => esc_html__( 'Only put video ID not the whole URL.', 'hotelex' ),
				'desc'     => '',
				'placeholder'    => esc_html__( 'Example: E5ln4uR4TwQ', 'hotelex' ),
				'default' => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'youtube' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-video-poster',
				'type'     => 'media',
				'title'    => esc_html__( 'Video Poster', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-mp4-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'MP4 Video URL', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'mp4', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-webm-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'WEBM Video URL', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'webm', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-video-self-hosted-ogv-video-url',
				'type'     => 'media',
				'title'    => esc_html__( 'OGV Video URL', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'url'      => true,
				'readonly' => false,
				'mode'     => 'false', // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'  => '',
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
					array( 'page-title-settings-bg-video-status', '=', '1' ),
					array( 'page-title-settings-bg-video-type', '=', 'self-hosted' )
				)
			),
			array(
				'id'       => 'page-title-settings-bg-section-ends',
				'type'     => 'section',
				'title'    => '',
				'subtitle' => '',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' ),
				)
			),



			//animation
			array(
				'id'       => 'page-title-settings-title-animation-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Animation Effect', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),
			array(
				'id'       => 'page-title-settings-title-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Animation Effect', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_hotelex_animate_css_animation_list(),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-animation-duration',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Animation Duration', 'hotelex' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Change the animation duration. Example: 1500ms or 1.5s or 0.5s etc. Default 0.5s.', 'hotelex' ),
				'placeholder' => esc_html__( '1.5s', 'hotelex' ),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-subtitle-animation-effect',
				'type'     => 'select',
				'title'    => esc_html__( 'Sub Title Animation Effect', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_hotelex_animate_css_animation_list(),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-subtitle-animation-duration',
				'type'     => 'text',
				'title'    => esc_html__( 'Sub Title Animation Duration', 'hotelex' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Change the animation duration. Example: 1500ms or 1.5s or 0.5s etc. Default 0.5s.', 'hotelex' ),
				'placeholder' => esc_html__( '1.5s', 'hotelex' ),
				'default'  => '',
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-animation-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( 'page-title-settings-enable-default-page-title', '=', '1' )
				)
			),



			//section Typography Starts
			array(
				'id'       => 'page-title-settings-title-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Typography', 'hotelex' ),
				'subtitle' => esc_html__( 'Define text and styles for Title.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'page-title-settings-enable-default-page-title', '=', '1' ),
			),
			array(
				'id'       => 'page-title-settings-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose title element tag', 'hotelex' ),
				'desc'     => '',
				'options'	=> mascot_core_hotelex_heading_tag_list_all(),
				'default'  => 'h1',
			),
			array(
				'id'            => 'page-title-settings-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Title Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-title-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Title Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'page-title-settings-subtitle-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Subtitle Tag', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose subtitle element tag', 'hotelex' ),
				'desc'     => '',
				'options'	=> mascot_core_hotelex_heading_tag_list_all(),
				'default'  => 'h6',
			),
			array(
				'id'            => 'page-title-settings-subtitle-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Sub Title Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-subtitle-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Sub Title Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'            => 'page-title-settings-breadcrumbs-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Breadcrumbs Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-last-child-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Last Child Text Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-seperator-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Seperator Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-breadcrumbs-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Breadcrumbs Link Hover/Active Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
			),
			array(
				'id'       => 'page-title-settings-title-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Footer
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer', 'hotelex' ),
		'id'     => 'footer',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-down-alt',
	) );

	// -> START Footer Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Footer Settings', 'hotelex' ),
		'id'     => 'footer-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-arrow-down-alt2',
		'subsection' => true,
		'fields' => array(
			array(
				'id'       => 'footer-settings-footer-visibility',
				'type'     => 'switch',
				'title'    => esc_html__( 'Footer Visibility', 'hotelex' ),
				'subtitle' => esc_html__( 'Show or hide footer globally', 'hotelex' ),
				'default'  => 1,
				'on'       => 'Show',
				'off'      => 'Hide',
			),
			array(
				'id'       => 'footer-settings-enable-default-footer',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Default Footer Widgets(Not Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('You can customize footer widgets from here %s', 'hotelex'), '<a href="'.admin_url('widgets.php').'" target="_blank">Appearance > Widgets</a>'),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'footer-settings-choose-footer-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Or Choose Custom Made Footer (Built with Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('You can create your own footer from %s', 'hotelex'), '<a href="'.admin_url('edit.php?post_type=footer').'" target="_blank">Dashboard > Parts - Footer</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'footer' ),
					'posts_per_page' => -1,
				),
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Footer Background Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the background color of Footer.', 'hotelex' ),
				'transparent' => false,
			),





			array(
				'id'        => 'footer-settings-footer-top-typography',
				'type'      => 'info',
				'title'     => esc_html__( 'Typography', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'            => 'footer-settings-footer-top-widget-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Title Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),


			array(
				'id'       => 'footer-settings-footer-widget-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom Under Widget Title', 'hotelex' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'hotelex' ),
				'desc'     => '',
				'default'  => '1',
			),
			array(
				'id'       => 'footer-settings-footer-widget-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'hotelex' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'hotelex' ),
				'desc'     => '',
				'options'  => mascot_core_hotelex_theme_color_list(),
				'default'  => '1',
				'required' => array( 'footer-settings-footer-widget-title-show-line-bottom', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-widget-title-line-bottom-custom-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Line Bottom Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'footer-settings-footer-widget-title-line-bottom-theme-colored', '=', '' ),
			),


			array(
				'id'            => 'footer-settings-footer-top-widget-text-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Text Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'            => 'footer-settings-footer-top-widget-link-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Widget Link Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),
			array(
				'id'       => 'footer-settings-footer-top-widget-link-hover-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Widget Link Hover/Active Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'footer-settings-footer-visibility', '=', '1' ),
			),

		)
	) );




	// -> START Blog Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Blog', 'hotelex' ),
		'id'     => 'blog-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-media-document',
	) );



	// -> START Blog Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Blog Archive Page', 'hotelex' ),
		'id'     => 'blog-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-settings-archive-page-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Blog Post Layout for Archive Pages', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a default layout for archive pages', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'standard-1-col' => 'Standard 1 Column Default',
					'standard-1-col-classic' => 'Standard 1 Column Classic',
					'standard-2-col' => 'Standard 2 Columns',
					'standard-3-col' => 'Standard 3 Columns',
					'standard-4-col' => 'Standard 4 Columns',
					'masonry-2-col'  => 'Masonry 2 Columns',
					'masonry-3-col'  => 'Masonry 3 Columns',
					'masonry-4-col'  => 'Masonry 4 Columns',
				),
				'default'  => 'masonry-2-col',
			),
			array(
				'id'       => 'blog-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'hotelex' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'hotelex' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'hotelex' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'hotelex' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'hotelex' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'hotelex' ),
				),
				'default'  => 'sidebar-right-33',
			),


			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Blog Default Sidebar', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on blog archive pages.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'default-sidebar',
				'required' => array( 'blog-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Blog Sidebar 2', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on blog archive pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'blog-secondary-sidebar',
				'required' => array( 'blog-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'blog-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Blog Sidebar 2 - Position', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'hotelex' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'hotelex' ),
					'right'     => esc_html__( 'Right', 'hotelex' )
				),
				'default'  => 'right',
				'required' => array( 'blog-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),


			array(
				'id'       => 'blog-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'            => 'blog-settings-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'hotelex' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'hotelex' ),
				'desc'          => '',
				'default'       => 22,
				'min'           => 0,
				'step'          => 1,
				'max'           => 500,
				'display_value' => 'text',
			),
			array(
				'id'       => 'blog-settings-show-post-featured-image',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Featured Image', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Featured Image in blog page.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-settings-post-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'hotelex' ),
				'subtitle' => esc_html__( 'Featured image size in blog page.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'hotelex_featured_image',
				'required' => array( 'blog-settings-show-post-featured-image', '=', '1' ),
			),
			array(
				'id'       => 'blog-settings-post-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Post Meta', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide each Post Meta on your page.', 'hotelex' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'hotelex' ),
					'show-post-date'            => esc_html__( 'Show Date', 'hotelex' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'hotelex' ),
					'show-post-category'        => esc_html__( 'Show Category', 'hotelex' ),
					'show-post-comments-count'  => esc_html__( 'Show Comments Count', 'hotelex' ),
					'show-post-tag'             => esc_html__( 'Show Tag', 'hotelex' ),
					'show-post-like-button'     => esc_html__( 'Show Like Button', 'hotelex' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '1',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-comments-count' => '0',
					'show-post-tag' => '0',
					'show-post-like-button' => '0'
				)
			),
			array(
				'id'       => 'blog-settings-show-pagination',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Pagination', 'hotelex' ),
				'subtitle' => esc_html__( 'Enabling this option will show comments on your page.', 'hotelex' ),
				'default'  => true,
			),
		)
	) );



	// -> START Single Post Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Single Post', 'hotelex' ),
		'id'     => 'blog-single-post-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-single-post-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'hotelex' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'hotelex' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'hotelex' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'hotelex' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'hotelex' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'hotelex' ),
				),
				'default'  => 'sidebar-right-33',
			),



			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Sidebar', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on blog single pages.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'default-sidebar',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar 2', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on blog single pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'blog-secondary-sidebar',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'blog-single-post-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar 2 - Position', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'hotelex' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'hotelex' ),
					'right'     => esc_html__( 'Right', 'hotelex' )
				),
				'default'  => 'right',
				'required' => array( 'blog-single-post-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),



			array(
				'id'       => 'blog-single-post-settings-show-post-featured-image',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Featured Image', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Featured Image in blog page.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'            => 'blog-single-post-settings-featured-image-height',
				'type'          => 'slider',
				'title'         => esc_html__( 'Featured Image Height(px)', 'hotelex' ),
				'subtitle'      => esc_html__( 'Set height for featured image displayed on your blog single page.', 'hotelex' ),
				'desc'          => '',
				'default'       => 600,
				'min'           => 0,
				'step'          => 1,
				'max'           => 1200,
				'display_value' => 'text',
			),
			array(
				'id'       => 'blog-single-post-settings-enable-drop-caps',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Drop Caps', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling Drop Caps for the first letter of post content.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-single-post-settings-post-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Post Meta', 'hotelex' ),
				'subtitle'     => esc_html__( 'Enable/Disabling this option will show/hide each Post Meta on your page.', 'hotelex' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'hotelex' ),
					'show-post-date'            => esc_html__( 'Show Date', 'hotelex' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'hotelex' ),
					'show-post-category'        => esc_html__( 'Show Category', 'hotelex' ),
					'show-post-comments-count'  => esc_html__( 'Show Comments Count', 'hotelex' ),
					'show-post-like-button'     => esc_html__( 'Show Like Button', 'hotelex' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '1',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-comments-count' => '1',
					'show-post-like-button' => '0'
				)
			),
			array(
				'id'       => 'blog-single-post-settings-show-tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Tags', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide tags on your page.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),


			//section Next/Previous Navigation Link Starts
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Next/Previous Navigation Link', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Next/Previous Single Post Navigation Link', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link for Next & Previous Posts.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-within-same-cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation Link Within Same Category', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link to the next/previous post within the same category as the current post.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'blog-single-post-settings-show-next-pre-post-link', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-next-pre-post-link-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),


			//section Author Info Box
			array(
				'id'       => 'blog-single-post-settings-author-info-box-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Author Info Box', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author Info Box', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Author Info Box on your page.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-show-social-icons',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Icons', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'blog-single-post-settings-author-info-box', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-show-author-email',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Author Email', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'blog-single-post-settings-author-info-box', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-author-info-box-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Related Posts Starts
			array(
				'id'       => 'blog-single-post-settings-related-posts-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Related Posts', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Posts List/Carousel on your page.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Posts', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts-carousel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Carousel?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make it carousel or grid', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-show-related-posts-count',
				'type'     => 'text',
				'title'    => esc_html__( 'Number of Posts', 'hotelex' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Enter number of posts to display. Default 3', 'hotelex' ),
				'default'  => '3',
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-related-posts-show-excerpt',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Excerpt', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'blog-single-post-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'            => 'blog-single-post-settings-show-related-posts-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'hotelex' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'hotelex' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'blog-single-post-settings-show-related-posts-excerpt', '=', '1' ),
			),
			array(
				'id'       => 'blog-single-post-settings-related-posts-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),



			//section Show Comments Starts
			array(
				'id'       => 'blog-single-post-settings-comments-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Comments', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Comments on your page.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'blog-single-post-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comments', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-single-post-settings-comments-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),

		)
	) );



	// -> START Single Post Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Other Settings', 'hotelex' ),
		'id'     => 'blog-other-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'blog-other-settings-show-blog-title-description',
				'type'     => 'switch',
				'title'    => esc_html__( 'Custom Blog Title & Description', 'hotelex' ),
				'subtitle' => esc_html__( 'Add title and description in title section of blog page', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'blog-other-settings-blog-title-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Blog Title Text', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'News', 'hotelex' ),
				'required' => array( 'blog-other-settings-show-blog-title-description', '=', '1' ),
			),
			array(
				'id'       => 'blog-other-settings-blog-description-text',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Blog Description Text', 'hotelex' ),
				'desc'     => '',
				'default'  => '',
				'required' => array( 'blog-other-settings-show-blog-title-description', '=', '1' ),
			)
		)
	) );




	// -> START Shop Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Woocommerce Shop', 'hotelex' ),
		'id'     => 'shop-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-cart',
	) );



	// -> START Shop Archive Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Shop Archive/Category Layout', 'hotelex' ),
		'id'     => 'shop-archive-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'shop-archive-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make the shop page fullwidth or not.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar Position', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the position of shop sidebar.', 'hotelex' ),
				'options'	=> array(
					'left'          => esc_html__( 'Left', 'hotelex' ),
					'right'         => esc_html__( 'Right', 'hotelex' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'hotelex' )
				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for shop page', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'3'      => esc_html__( 'Sidebar 1/4', 'hotelex' ),
					'4'      => esc_html__( 'Sidebar 1/3', 'hotelex' ),
				),
				'default'  => '4',
				'required' => array( 'shop-archive-settings-sidebar-position', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'shop-archive-settings-sidebar-choose',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Sidebar', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose sidebar that will be displayed on shop page.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'shop_sidebar',
				'required' => array( 'shop-archive-settings-sidebar-position', '!=', 'no-sidebar' ),
			),




			array(
				'id'       => 'shop-layout-settings-select-shop-catalog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Shop Catalog Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Select the type of layout you would like to display.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'default' => array(
						'alt' => 'Default',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/shop/type/default.png'
					),
					'classic' => array(
						'alt' => 'Classic',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/shop/type/classic.png'
					),
				),
				'default'  => 'default'
			),

			array(
				'id'       => 'shop-layout-settings-select-shop-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Shop Layout Mode (FitRows Or Masonry)', 'hotelex' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/shop/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/shop/layout-mode/masonry.png'
					),
				),
				'default'  => 'fitrows'
			),


			array(
				'id'       => 'shop-archive-settings-products-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Products Per Row', 'hotelex' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your shop items.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '4',
			),
			array(
				'id'            => 'shop-archive-settings-products-per-page',
				'type'          => 'slider',
				'title'         => esc_html__( 'Number of Products Per Page', 'hotelex' ),
				'subtitle'      => esc_html__( 'Controls the number of items to display on shop archive pages. Set to -1 to display all. Set to 0 to use the number of posts from Settings > Reading.', 'hotelex' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => -1,
				'step'          => 1,
				'max'           => 100,
				'display_value' => 'text',
			),
			array(
				'id'            => 'shop-archive-settings-products-per-page-dropdown-options',
				'type'          => 'text',
				'title'         => esc_html__( 'WooCommerce Products Per Page Dropdown', 'hotelex' ),
				'subtitle'      => esc_html__( 'List of options products per page to show into the select dropdown menu.', 'hotelex' ),
				'desc'         => esc_html__( 'Seperated by spaces', 'hotelex' ),
				'default'       => '8 16 32 64',
			),
			array(
				'id'            => 'shop-archive-settings-gutter-size',
				'type'          => 'slider',
				'title'         => esc_html__( 'Shop Column Spacing (Gutter Size) px', 'hotelex' ),
				'subtitle'      => esc_html__( 'Controls column spacing or gutter size between items on shop archive pages.', 'hotelex' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 250,
				'display_value' => 'text',
			),
			array(
				'id'       => 'shop-archive-settings-products-thumb-type',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Thumbnail Type', 'hotelex' ),
				'subtitle'    => esc_html__( 'Select your preferred style for your WooCommmerce product thumbnail.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'image-featured'  => 'Featured Image',
					'image-swap'  => 'Image Swap',
					'image-gallery'  => 'Gallery Images',
				),
				'default'  => 'image-swap',
			),
		)
	) );



	// -> START Shop Single Product Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Shop Single Product', 'hotelex' ),
		'id'     => 'shop-single-product-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'shop-single-product-settings-enable-page-title',
				'type'     => 'select',
				'title'    => esc_html__( 'Enable Shop Single Page Title', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'default'     => esc_html__( 'Default', 'hotelex' ),
					'yes'     => esc_html__( 'Yes', 'hotelex' ),
					'no'    => esc_html__( 'No', 'hotelex' ),
				),
				'default'  => 'default',
			),
			array(
				'id'       => 'shop-single-product-settings-custom-page-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Custom Shop Single Page Title', 'hotelex' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as page title of product details page', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'Shop', 'hotelex' ),
			),
			array(
				'id'       => 'shop-single-product-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make the single product page fullwidth or not.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'shop-single-product-settings-sidebar-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar Position', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the sidebar position of shop single product page.', 'hotelex' ),
				'options'	=> array(
					'left'          => esc_html__( 'Left', 'hotelex' ),
					'right'         => esc_html__( 'Right', 'hotelex' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'hotelex' )
				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'shop-single-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for shop page', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'3'      => esc_html__( 'Sidebar 1/4', 'hotelex' ),
					'4'      => esc_html__( 'Sidebar 1/3', 'hotelex' ),
				),
				'default'  => '4',
				'required' => array( 'shop-single-product-settings-sidebar-position', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'shop-single-product-settings-sidebar-choose',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Sidebar', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose sidebar that will be displayed on shop page.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'shop_sidebar',
				'required' => array( 'shop-single-product-settings-sidebar-position', '!=', 'no-sidebar' ),
			),



			array(
				'id'       => 'shop-single-product-settings-select-single-catalog-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Product Details Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Select the type of layout you would like to display.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'image-with-thumb' => array(
						'alt' => 'image-with-thumb',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/shop/single-layout/image-with-thumb.png'
					),
					'plain-image' => array(
						'alt' => 'plain-image',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/shop/single-layout/plain-image.png'
					),
					'sticky-side-text' => array(
						'alt' => 'sticky-side-text',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/shop/single-layout/sticky-side-text.png'
					),
				),
				'default'  => 'image-with-thumb'
			),



			array(
				'id'       => 'shop-single-product-settings-product-images-column-width',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Images Column Width', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'4'     => esc_html__( 'Small - 4/12', 'hotelex' ),
					'5'     => esc_html__( 'Medium - 5/12', 'hotelex' ),
					'6'     => esc_html__( 'Large - 6/12', 'hotelex' ),
					'8'     => esc_html__( 'Extra Large - 8/12', 'hotelex' ),
				),
				'default'  => '6',
			),
			array(
				'id'       => 'shop-single-product-settings-product-images-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Product Images Alignment', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'left'     => esc_html__( 'Left', 'hotelex' ),
					'right'    => esc_html__( 'Right', 'hotelex' ),
				),
				'default'  => 'left',
			),

			array(
				'id'       => 'shop-single-product-settings-enable-gallery-slider',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Slider Feature', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'shop-single-product-settings-select-single-catalog-layout', '=', 'image-with-thumb' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Lightbox Feature', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-gallery-zoom',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Image Gallery Zoom Feature', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),



			array(
				'id'       => 'shop-single-product-settings-show-product-title',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Product Title', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'shop-single-product-settings-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Single Product Title Tag', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_hotelex_heading_tag_list_all(),
				'default'  => 'h3',
			),
			array(
				'id'       => 'shop-single-product-settings-enable-product-meta',
				'type'     => 'switch',
				'title'    => esc_html__( 'Product Meta', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'shop-single-product-settings-enable-sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sharing', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),


			//section Related Posts Starts
			array(
				'id'       => 'shop-single-product-settings-related-products-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Related Products', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Products List/Carousel on your page.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'shop-single-product-settings-related-products-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Related Products Columns', 'hotelex' ),
				'subtitle' => esc_html__( 'Set number of columns for related and upsells products only', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '4',
			),
			array(
				'id'            => 'shop-single-product-settings-related-products-count',
				'type'          => 'text',
				'title'         => esc_html__( 'Related Products Count', 'hotelex' ),
				'subtitle'      => esc_html__( 'Number of related products shown on single product page. Enter "0" to disable.', 'hotelex' ),
				'default'       => '4',
			),

			array(
				'id'       => 'shop-single-product-settings-related-products-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START WooCommerce Styling Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'WooCommerce Styling', 'hotelex' ),
		'id'     => 'woocommerce-styling-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'woocommerce-styling-product-price-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Product Price Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Select your custom color for product price.', 'hotelex' ),
				'transparent' => false,
			),
			array(
				'id'       => 'woocommerce-styling-product-on-sale-tag-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'On Sale Tag Background Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Select your custom background color for on-sale tag.', 'hotelex' ),
				'transparent' => true,
			),
			array(
				'id'       => 'shop-single-product-settings-enable-floating-woocart-sidebar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Floating Cart Sidebar', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
		)
	) );



	// -> START Side Push Panel Sidebar
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Side Push Panel Sidebar', 'hotelex' ),
		'id'     => 'header-side-push-panel-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-menu-alt2',
		'fields' => array(


			array(
				'id'       => 'header-settings-choose-side-push-panel-cpt-widget-area',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Pre Made Side Push Panel Area (Built with Elementor)', 'hotelex' ),
				'subtitle' => sprintf(esc_html__('You can create your own one from %s', 'hotelex'), '<a href="'.admin_url('edit.php?post_type=side-push-panel').'" target="_blank">Dashboard > Parts - Side Push Panel</a>'),
				'desc'     => '',
				'data'     => 'posts',
				'args' => array(
					'post_type' => array( 'side-push-panel' ),
					'posts_per_page' => -1,
				),
			),

			array(
				'id'       		=> 'header-settings-navigation-side-push-panel-width',
				'type'          => 'slider',
				'title'    		=> esc_html__( 'Side Push Panel Width', 'hotelex' ),
				'subtitle' 		=> esc_html__( 'Default: 380px', 'hotelex' ),
				'desc'          => '',
				'default'       => 380,
				'min'           => 100,
				'step'          => 1,
				'max'           => 1000,
				'display_value' => 'text',
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-bgimg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background of Side Push Panel', 'hotelex' ),
				'default'  => array(
					'background-repeat'     => 'no-repeat',
					'background-size'       => 'cover',
					'background-attachment' => '',
					'background-position'   => 'left bottom',
					'background-image'      => '',
				),
			),

			array(
				'id'       => 'header-settings-navigation-side-push-panel-center-content',
				'type'     => 'switch',
				'title'    => esc_html__( 'Center Content', 'hotelex' ),
				'subtitle' => esc_html__( 'Center the content of Side Push Panel area.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),

			array(
				'id'       => 'header-settings-navigation-side-push-panel-widget-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom Under Widget Title', 'hotelex' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'hotelex' ),
				'desc'     => '',
				'default'  => '0',
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-widget-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'hotelex' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'hotelex' ),
				'desc'     => '',
				'options'  => mascot_core_hotelex_theme_color_list(),
				'default'  => '1',
				'required' => array( 'header-settings-navigation-side-push-panel-widget-title-show-line-bottom', '=', '1' ),
			),


			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Background Overlay', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'hotelex' ),
				'subtitle'      => esc_html__( 'Overlay on background image.', 'hotelex' ),
				'desc'          => '',
				'default'       => 8,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( 'header-settings-navigation-side-push-panel-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => 'header-settings-navigation-side-push-panel-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'hotelex' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'hotelex' ),
					'dark'          => esc_html__( 'Dark', 'hotelex' ),
					'white'         => esc_html__( 'White', 'hotelex' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'hotelex' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'hotelex' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'hotelex' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'hotelex' )
				),
				'default' => 'white',
			),



		)
	) );



	// -> START Page Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Page', 'hotelex' ),
		'id'     => 'page-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-media-default',
		'fields' => array(
			array(
				'id'       => 'page-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for pages', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'hotelex' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'hotelex' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'hotelex' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'hotelex' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'hotelex' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'hotelex' ),

				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Default Sidebar', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on pages.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'page-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Page Sidebar 2', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'page-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Page Sidebar 2 - Position', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'hotelex' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'hotelex' ),
					'right'     => esc_html__( 'Right', 'hotelex' )
				),
				'default'  => 'right',
				'required' => array( 'page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'page-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Page Comments', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disable comments on all pages except the post pages. It is possible to disable them individually using page meta settings.', 'hotelex' ),
				'default'  => true,
			),
			array(
				'id'       => 'page-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
		)
	) );



	// -> START Preloader Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Preloader', 'hotelex' ),
		'id'     => 'preloader-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-clock',
		'fields' => array(
			array(
				'id'       => 'general-settings-enable-page-preloader-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Page Preloader Settings', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disable Page Preloader.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'general-settings-enable-page-preloader',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Page Preloader', 'hotelex' ),
				'subtitle' => esc_html__( 'Enabling this option will show page preloader.', 'hotelex' ),
				'default'  => false,
			),
			array(
				'id'        => 'general-settings-page-preloading-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Preloading Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared as Preloader Text.', 'hotelex' ),
				'desc'     => '',
				'default'    => esc_html__( 'Loading', 'hotelex' ),
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'            => 'general-settings-page-preloading-text-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Preloading Text Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-page-preloading-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Preloading Text Color', 'hotelex' ),
				'transparent' => false,
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type',
				'type'      => 'button_set',
				'compiler'  => true,
				'title'     => esc_html__( 'Page Preloader Image Type', 'hotelex' ),
				'subtitle'  => esc_html__( 'Select preloader type', 'hotelex' ),
				'options'   => array(
					'upload-preloader'    => esc_html__( 'Upload Gif', 'hotelex' ),
					'css-preloader'    => esc_html__( 'CSS Preloader', 'hotelex' ),
					'gif-preloader'    => esc_html__( 'Predefined Gif Preloader', 'hotelex' ),
				),
				'default'   => 'css-preloader',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-page-preloading-image',
				'type'     => 'media',
				'url'      => false,
				'title'    => esc_html__( 'Upload Gif Preloading Image', 'hotelex' ),
				'subtitle' => esc_html__( 'Upload/choose preloader image', 'hotelex' ),
				'compiler' => 'true',
				'desc'     => '',
				'default'  => array( 'url' => HOTELEX_ASSETS_URI . '/images/logo/logo-wide.png' ),
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'            => 'general-settings-page-preloading-image-width',
				'type'          => 'slider',
				'title'         => esc_html__( 'Maximum Image Width(px)', 'hotelex' ),
				'subtitle'      => esc_html__( 'Enter maximum image width in px.', 'hotelex' ),
				'desc'          => '',
				'default'       => 100,
				'min'           => 20,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloading-image-animate',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Animate Preloading Image', 'hotelex' ),
				'desc'     => '',
				'default'  => '1',
				'required' => array( 'general-settings-page-preloader-type', '=', 'upload-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type-css',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose CSS Preloader', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose Predefined CSS Preloader.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'preloader-bubblingG'           => esc_html__( 'Bubbling', 'hotelex' ),
					'preloader-circle-loading-wrapper' => esc_html__( 'Circle Loading', 'hotelex' ),
					'preloader-coffee'              => esc_html__( 'Coffee', 'hotelex' ),
					'preloader-battery'             => esc_html__( 'Battery', 'hotelex' ),
					'preloader-dot-circle-rotator'  => esc_html__( 'Dot Circle Rotator', 'hotelex' ),
					'preloader-dot-loading'         => esc_html__( 'Dot Loading', 'hotelex' ),
					'preloader-double-torus'        => esc_html__( 'Double Torus', 'hotelex' ),
					'preloader-equalizer'           => esc_html__( 'Equalizer', 'hotelex' ),
					'preloader-floating-circles'    => esc_html__( 'Floating Circles', 'hotelex' ),
					'preloader-fountainTextG'       => esc_html__( 'Fountain Text', 'hotelex' ),
					'preloader-jackhammer'          => esc_html__( 'Jackhammer', 'hotelex' ),
					'preloader-loading-wrapper'     => esc_html__( 'Loading', 'hotelex' ),
					'preloader-orbit-loading'       => esc_html__( 'Orbit Loading', 'hotelex' ),
					'preloader-speeding-wheel'      => esc_html__( 'Speeding Wheel', 'hotelex' ),
					'preloader-square-swapping'     => esc_html__( 'Square Swapping', 'hotelex' ),
					'preloader-tube-tunnel'         => esc_html__( 'Tube Tunnel', 'hotelex' ),
					'preloader-whirlpool'           => esc_html__( 'Whirlpool', 'hotelex' ),
				),
				'default'  => 'preloader-dot-loading',
				'required' => array( 'general-settings-page-preloader-type', '=', 'css-preloader' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-type-gif',
				'type'     => 'select',
				'title'    => esc_html__( 'Choose Gif Icon Preloader', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose Predefined Gif Icon Preloader.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/1.gif'  =>  'preloader-1',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/2.gif'  =>  'preloader-2',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/3.gif'  =>  'preloader-3',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/4.gif'  =>  'preloader-4',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/5.gif'  =>  'preloader-5',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/6.gif'  =>  'preloader-6',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/7.gif'  =>  'preloader-7',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/8.gif'  =>  'preloader-8',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/9.gif'  =>  'preloader-9',
					HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/10.gif' =>  'preloader-10',
				),
				'default'  => HOTELEX_ADMIN_ASSETS_URI . '/images/preloaders/1.gif',
				'required' => array( 'general-settings-page-preloader-type', '=', 'gif-preloader' ),
			),
			array(
				'id'       => 'general-settings-page-preloader-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Preloader Whole Background Color', 'hotelex' ),
				'transparent' => false,
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-show-disable-button',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Disable Preloader Button', 'hotelex' ),
				'subtitle'    => esc_html__( 'Show Disable Preloader Button at the corner of the screen.', 'hotelex' ),
				'desc'     => '',
				'default'  => '1',
				'required' => array( 'general-settings-enable-page-preloader', '=', '1' ),
			),
			array(
				'id'        => 'general-settings-page-preloader-show-disable-button-text',
				'type'     => 'text',
				'title'    => esc_html__( 'Disable Preloader Button Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Enter the text that will be appeared into the Disable Preloader Button.', 'hotelex' ),
				'desc'     => '',
				'default'    => esc_html__( 'Disable Preloader', 'hotelex' ),
				'required' => array( 'general-settings-page-preloader-show-disable-button', '=', '1' ),
			),
			array(
				'id'       => 'general-settings-enable-page-preloader-ends',
				'type'     => 'section',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START Portfolio Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio', 'hotelex' ),
		'id'     => 'portfolio-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-format-gallery',
	) );



	// -> START Portfolio Layout Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio Archive Layout', 'hotelex' ),
		'id'     => 'portfolio-layout-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'portfolio-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for portfolio pages', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'hotelex' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'hotelex' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'hotelex' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'hotelex' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'hotelex' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'hotelex' ),

				),
				'default'  => 'no-sidebar',
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Default Sidebar', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on portfolio pages.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'portfolio-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Sidebar 2', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on portfolio pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'portfolio-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'portfolio-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Portfolio Sidebar 2 - Position', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'hotelex' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'hotelex' ),
					'right'     => esc_html__( 'Right', 'hotelex' )
				),
				'default'  => 'right',
				'required' => array( 'portfolio-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),




			array(
				'id'       => 'portfolio-layout-settings-select-portfolio-design-style',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Design Style', 'hotelex' ),
				'subtitle' => esc_html__( 'Select the type of portfolio you would like to display.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'portfolio-style2-simple' => array(
						'alt' => 'Default',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio/type/default.png'
					),
				),
				'default'  => 'portfolio-style2-simple'
			),

			array(
				'id'       => 'portfolio-layout-settings-select-portfolio-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Layout Mode (FitRows Or Masonry)', 'hotelex' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry'
			),


			array(
				'id'       => 'portfolio-layout-settings-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Portfolio Items Per Row', 'hotelex' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your portfolio items.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
			),
			array(
				'id'            => 'portfolio-layout-settings-items-per-page',
				'type'          => 'slider',
				'title'         => esc_html__( 'Number of Portfolio Items Per Page', 'hotelex' ),
				'subtitle'      => esc_html__( 'Controls the number of items to display on portfolio archive pages. Set to -1 to display all. Set to 0 to use the number of posts from Settings > Reading.', 'hotelex' ),
				'desc'          => '',
				'default'       => 10,
				'min'           => -1,
				'step'          => 1,
				'max'           => 40,
				'display_value' => 'text',
			),
			array(
				'id'            => 'portfolio-layout-settings-gutter-size',
				'type'     => 'select',
				'title'         => esc_html__( 'Portfolio Column Spacing (Gutter Size) px', 'hotelex' ),
				'subtitle'      => esc_html__( 'Controls column spacing or gutter size between items on portfolio archive pages.', 'hotelex' ),
				'desc'     => '',
				'options'	=> hotelex_isotope_gutter_list_redux(),
				'default'  => 'gutter-15',
			),
			array(
				'id'       => 'portfolio-layout-settings-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'hotelex' ),
				'subtitle' => esc_html__( 'Featured image size in Portfolio Archive page.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'hotelex_square',
			),
			array(
				'id'       => 'portfolio-layout-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Page Fullwidth?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make the portfolio page fullwidth or not.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
		)
	) );



	// -> START Portfolio Single Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Portfolio Single', 'hotelex' ),
		'id'     => 'portfolio-single-page-settings',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'portfolio-single-page-settings-fullwidth',
				'type'     => 'switch',
				'title'    => esc_html__( 'Fullwidth?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make the page fullwidth or not.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for portfolio details pages', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'hotelex' ),
					'both-sidebar-25-50-25' => esc_html__( 'Sidebar Both Side (1/4 + 2/4 + 1/4)', 'hotelex' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'hotelex' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'hotelex' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'hotelex' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'hotelex' ),
				),
				'default'  => 'no-sidebar',
			),



			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-default',
				'type'     => 'select',
				'title'    => esc_html__( 'Default Sidebar', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose default sidebar that will be displayed on portfolio single pages.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '!=', 'no-sidebar' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-two',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar 2', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose sidebar 2 that will be displayed on portfolio single pages. Sidebar 2 will only be used if "Sidebar Both Side" is selected.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'sidebars',
				'default'  => 'page-sidebar-two',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-sidebar-layout-sidebar-two-position',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Sidebar 2 - Position', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the position of sidebar 2. In that case, default sidebar will be shown on opposite side.', 'hotelex' ),
				'options'	=> array(
					'left'      => esc_html__( 'Left', 'hotelex' ),
					'right'     => esc_html__( 'Right', 'hotelex' )
				),
				'default'  => 'right',
				'required' => array( 'portfolio-single-page-settings-sidebar-layout', '=', 'both-sidebar-25-50-25' ),
			),


			array(
				'id'       => 'portfolio-single-page-settings-select-portfolio-details-type',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Portfolio Details Type', 'hotelex' ),
				'subtitle' => esc_html__( 'Select the type of portfolio details you would like to display.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'small-image' => array(
						'alt' => esc_html__( 'Small Image', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image.png'
					),
					'small-image-slider' => array(
						'alt' => esc_html__( 'Small Image Slider', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image-slider.png'
					),
					'small-image-gallery' => array(
						'alt' => esc_html__( 'Small Image Gallery', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio-single/type/small-image-gallery.png'
					),
					'big-image' => array(
						'alt' => esc_html__( 'Big Image', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image.png'
					),
					'big-image-slider' => array(
						'alt' => esc_html__( 'Big Image Slider', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image-slider.png'
					),
					'big-image-gallery' => array(
						'alt' => esc_html__( 'Big Image Gallery', 'hotelex' ),
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio-single/type/big-image-gallery.png'
					),
				),
				'default'  => 'small-image'
			),


			//Small Image
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Settings', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'hotelex' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'hotelex' ),
					'right'  => esc_html__( 'Right Side', 'hotelex' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'hotelex' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'hotelex' ),
					'4'     => esc_html__( 'One Third (1/3)', 'hotelex' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'hotelex' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'hotelex' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image' )
				)
			),




			//Small Image Slider
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Slider Settings', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'hotelex' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'hotelex' ),
					'right'  => esc_html__( 'Right Side', 'hotelex' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'hotelex' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'hotelex' ),
					'4'     => esc_html__( 'One Third (1/3)', 'hotelex' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'hotelex' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-slider-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'hotelex' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-slider' )
				)
			),




			//Small Image Gallery
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Small Image Gallery Settings', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'hotelex' ),
				'options'	=> array(
					'left'   => esc_html__( 'Left Side', 'hotelex' ),
					'right'  => esc_html__( 'Right Side', 'hotelex' )
				),
				'default' => 'left',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-width',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Width', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose width of item description.', 'hotelex' ),
				'options'	=> array(
					'6'     => esc_html__( 'Half (1/2)', 'hotelex' ),
					'4'     => esc_html__( 'One Third (1/3)', 'hotelex' ),
					'3'     => esc_html__( 'One Fourth (1/4)', 'hotelex' )
				),
				'default' => '6',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-description-sticky',
				'type'     => 'switch',
				'title'    => esc_html__( 'Make Description Sticky', 'hotelex' ),
				'subtitle' => esc_html__( 'Make description container sticky when scrolling down the page.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-type-small-image-gallery-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Gallery Layout Mode (FitRows Or Masonry)', 'hotelex' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-small-image-isotope-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Images Per Row', 'hotelex' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your gallery items.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'small-image-gallery' )
				)
			),




			//Big Image
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Settings', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'hotelex' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'hotelex' ),
					'under'  => esc_html__( 'Under the Images', 'hotelex' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image' )
				)
			),




			//Big Image Slider
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-slider-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Slider Settings', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-slider' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-slider-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'hotelex' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'hotelex' ),
					'under'  => esc_html__( 'Under the Images', 'hotelex' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-slider' )
				)
			),




			//Big Image Gallery
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Big Image Gallery Settings', 'hotelex' ),
				'notice'    => false,
				'required' => array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' ),
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-description-placement',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Item Description Placement', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose placement of item description.', 'hotelex' ),
				'options'	=> array(
					'over'   => esc_html__( 'Over the Images', 'hotelex' ),
					'under'  => esc_html__( 'Under the Images', 'hotelex' )
				),
				'default' => 'over',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-type-big-image-gallery-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Gallery Layout Mode (FitRows Or Masonry)', 'hotelex' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/portfolio/layout-mode/masonry.png'
					),
				),
				'default'  => 'masonry',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),
			array(
				'id'        => 'portfolio-single-page-settings-portfolio-type-big-image-isotope-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Images Per Row', 'hotelex' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your gallery items.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'  => '3',
				'required' => array(
					array( 'portfolio-single-page-settings-select-portfolio-details-type', '=', 'big-image-gallery' )
				)
			),






			array(
				'id'        => 'portfolio-single-page-settings-other-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Other Settings', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-portfolio-meta',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Portfolio Meta', 'hotelex' ),
				'subtitle'     => esc_html__( 'Enable/Disabling this option will show/hide each Portfolio Meta on your Portfolio Details Page.', 'hotelex' ),
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-post-by-author'       => esc_html__( 'Show By Author', 'hotelex' ),
					'show-post-date'            => esc_html__( 'Show Date', 'hotelex' ),
					'show-post-date-split'      => esc_html__( 'Show Date Split', 'hotelex' ),
					'show-post-category'        => esc_html__( 'Show Category', 'hotelex' ),
					'show-post-tag'             => esc_html__( 'Show Tag', 'hotelex' ),
					'show-post-checklist-custom-fields'   => esc_html__( 'Show Checklist Custom Fields', 'hotelex' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-post-by-author' => '0',
					'show-post-date' => '1',
					'show-post-date-split' => '0',
					'show-post-category' => '1',
					'show-post-tag' => '1',
					'show-post-checklist-custom-fields' => '1',
				)
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-share',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Share', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide share options on your page.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),


			//section Next/Previous Navigation Link Starts
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Next/Previous Navigation Link', 'hotelex' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Next/Previous Single Post Navigation Link', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link for Next & Previous Posts.', 'hotelex' ),
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-next-pre-post-link-within-same-cat',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Navigation Link Within Same Category', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide link to the next/previous post within the same category as the current post.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'portfolio-single-page-settings-show-next-pre-post-link', '=', '1' ),
			),




			//section Related Posts Starts
			array(
				'id'       => 'portfolio-single-page-settings-related-posts-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Related Posts', 'hotelex' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Related Portfolio Items', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Related Posts List/Carousel on your page.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts-carousel',
				'type'     => 'switch',
				'title'    => esc_html__( 'Carousel?', 'hotelex' ),
				'subtitle' => esc_html__( 'Make it carousel or grid', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-related-posts-count',
				'type'     => 'text',
				'title'    => esc_html__( 'Number of Posts', 'hotelex' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Enter number of posts to display. Default 3', 'hotelex' ),
				'default'  => '3',
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),
			array(
				'id'            => 'portfolio-single-page-settings-show-related-posts-excerpt-length',
				'type'          => 'slider',
				'title'         => esc_html__( 'Excerpt Length', 'hotelex' ),
				'subtitle'      => esc_html__( 'Number of words to display in excerpt.', 'hotelex' ),
				'desc'          => '',
				'default'       => 20,
				'min'           => 0,
				'step'          => 1,
				'max'           => 200,
				'display_value' => 'text',
				'required' => array( 'portfolio-single-page-settings-show-related-posts', '=', '1' ),
			),



			//section Related Posts Starts
			array(
				'id'       => 'portfolio-single-page-settings-comments-section-starts',
				'type'     => 'info',
				'title'    => esc_html__( 'Comments', 'hotelex' ),
				'notice'   => false,
			),
			array(
				'id'       => 'portfolio-single-page-settings-show-comments',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Comments', 'hotelex' ),
				'subtitle' => esc_html__( 'Enable/Disabling this option will show/hide Comments on your page.', 'hotelex' ),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),

		)
	) );



	/* Check for Give */
	if ( class_exists( 'Give' ) ) {
	// -> START Give Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Give - Donation', 'hotelex' ),
		'id'     => 'give-donation-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-heart',
		'fields' => array(
			array(
				'id'       => 'give-form-details-page-style',
				'type'     => 'select',
				'title'    => esc_html__( 'Give Form Details Page Style', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'form-style1' => esc_html__( 'Form Custom Style1', 'hotelex' ),
					'form-style2' => esc_html__( 'Form Custom Style2', 'hotelex' ),

				),
				'default'  => 'sideform-style1',
			),
			array(
				'id'       => 'give-donation-settings-sidebar-layout',
				'type'     => 'select',
				'title'    => esc_html__( 'Give Donation Page Sidebar Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose a sidebar layout for Donation Page', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'no-sidebar'            => esc_html__( 'No Sidebar', 'hotelex' ),
					'sidebar-right-25'      => esc_html__( 'Sidebar Right 1/4', 'hotelex' ),
					'sidebar-right-33'      => esc_html__( 'Sidebar Right 1/3', 'hotelex' ),
					'sidebar-left-25'       => esc_html__( 'Sidebar Left 1/4', 'hotelex' ),
					'sidebar-left-33'       => esc_html__( 'Sidebar Left 1/3', 'hotelex' ),

				),
				'default'  => 'sidebar-right-25',
			),



			array(
				'id'       => 'give-donation-settings-related-posts-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Other Settings', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'give-donation-settings-campaign-creation-date',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Creation Date', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the campaign creation date on or off.', 'hotelex' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-creator',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Campaign Creator', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the campaign donation count on or off.', 'hotelex' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-categories',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Categories', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the campaign categories on or off.', 'hotelex' ),
				'default'  => 0,
			),
			array(
				'id'       => 'give-donation-settings-campaign-tags',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Tags', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the campaign tags on or off.', 'hotelex' ),
				'default'  => 0,
			),
			array(
				'id'       => 'give-donation-settings-campaign-progress-bar',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Progress Bar', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the campaign campaign progress bar on or off.', 'hotelex' ),
				'default'  => 1,
			),
			array(
				'id'       => 'give-donation-settings-campaign-raised-goal',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Donation Stats', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the campaign raised goal on or off.', 'hotelex' ),
				'default'  => 1,
			),
		)
	) );
	}






	// -> START Custom Post Types Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom Post Types', 'hotelex' ),
		'id'     => 'cpt-settings-parent',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-carrot',
	) );




	// -> START Custom Post Types Portfolio Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'CPT - Portfolio', 'hotelex' ),
		'id'     => 'cpt-settings-portfolio',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'cpt-settings-portfolio-enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Portfolio Post Type', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the portfolio custom post type on or off.', 'hotelex' ),
				'default'  => 1,
			),
			array(
				'id'       => 'cpt-settings-portfolio-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Label', 'hotelex' ),
				'subtitle' => esc_html__( 'Rename the Custom Post Type. ', 'hotelex' ),
				'default'  => 'Portfolio',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-admin-dashicon',
				'type'     => 'select',
				'title'    => esc_html__( 'Portfolio Admin Dashboard Icon', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_hotelex_wp_admin_dashicons_list(),
				'default'   => 'dashicons-mascot',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Slug', 'hotelex' ),
				'subtitle' => esc_html__( 'Specify a custom slug for Portfolio Post Type. ', 'hotelex' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'hotelex' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-cat-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Category Slug', 'hotelex' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Category of Portfolio Post Type. ', 'hotelex' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'hotelex' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio-category',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-portfolio-tag-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Portfolio Tag Slug', 'hotelex' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Tag of Portfolio Post Type. ', 'hotelex' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'hotelex' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'portfolio-tag',
				'required' => array( 'cpt-settings-portfolio-enable', '=', '1' ),
			),
		)
	) );


	// -> START Custom Post Types Projects Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'CPT - Projects', 'hotelex' ),
		'id'     => 'cpt-settings-projects',
		'subsection'       => true,
		'desc'   => '',
		'fields' => array(
			array(
				'id'       => 'cpt-settings-projects-enable',
				'type'     => 'switch',
				'title'    => esc_html__( 'Projects Post Type', 'hotelex' ),
				'subtitle' => esc_html__( 'Toggle the projects custom post type on or off.', 'hotelex' ),
				'default'  => 1,
			),
			array(
				'id'       => 'cpt-settings-projects-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Label', 'hotelex' ),
				'subtitle' => esc_html__( 'Rename the Custom Post Type. ', 'hotelex' ),
				'default'  => 'Projects',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-admin-dashicon',
				'type'     => 'select',
				'title'    => esc_html__( 'Projects Admin Dashboard Icon', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_hotelex_wp_admin_dashicons_list(),
				'default'   => 'dashicons-mascot',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Slug', 'hotelex' ),
				'subtitle' => esc_html__( 'Specify a custom slug for Projects Post Type. ', 'hotelex' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'hotelex' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'projects',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),
			array(
				'id'       => 'cpt-settings-projects-cat-slug',
				'type'     => 'text',
				'title'    => esc_html__( 'Projects Category Slug', 'hotelex' ),
				'subtitle' => esc_html__( 'Specify a custom slug for the Category of Projects Post Type. ', 'hotelex' ),
				'desc'     => sprintf( esc_html__( '%1$sNOTE: When you change this setting you need to flush rewrite rules.%2$s %3$s%4$sTo do so, goto Settings > Permalinks and simply click on "Save Changes" button.%2$s', 'hotelex' ), '<strong>', '</strong>', '<br>', '<strong>'),
				'default'  => 'projects-category',
				'required' => array( 'cpt-settings-projects-enable', '=', '1' ),
			),





			array(
				'id'        => 'cpt-settings-projects-archive-settings',
				'type'      => 'info',
				'title'     => esc_html__( 'Project Archive Page Settings', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'cpt-settings-projects-archive-layout-mode',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Project Layout Mode (FitRows Or Masonry)', 'hotelex' ),
				'subtitle' => esc_html__( 'You can position items with different layout modes. Select a layout mode you would like to use.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'fitrows' => array(
						'alt' => 'Fit Rows',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/staff/layout-mode/fitrows.png'
					),
					'masonry' => array(
						'alt' => 'Masonry',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/staff/layout-mode/masonry.png'
					),
				),
				'default'  => 'fitrows'
			),
			array(
				'id'       => 'cpt-settings-projects-archive-items-per-row',
				'type'     => 'select',
				'title'    => esc_html__( 'Number of Projects Per Row', 'hotelex' ),
				'subtitle'    => esc_html__( 'Select your default column structure for your Projects.', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'1'  => '1 Item Per Row',
					'2'  => '2 Items Per Row',
					'3'  => '3 Items Per Row',
					'4'  => '4 Items Per Row',
					'5'  => '5 Items Per Row',
					'6'  => '6 Items Per Row',
					'7'  => '7 Items Per Row',
					'8'  => '8 Items Per Row',
					'9'  => '9 Items Per Row',
					'10' => '10 Items Per Row',
				),
				'default'=> '3',
			),
			array(
				'id'            => 'cpt-settings-projects-archive-gutter-size',
				'type'     => 'select',
				'title'         => esc_html__( 'Column Spacing (Gutter Size) px', 'hotelex' ),
				'desc'     => '',
				'options'	=> hotelex_isotope_gutter_list_redux(),
				'default'  => 'gutter-15',
			),


			array(
				'id'       => 'cpt-settings-projects-archive-featured-image-size',
				'type'     => 'select',
				'title'    => esc_html__( 'Featured Image Size', 'hotelex' ),
				'subtitle' => esc_html__( 'Featured image size in blog page.', 'hotelex' ),
				'desc'     => '',
				'data'     => 'image_sizes',
				'default'  => 'hotelex_featured_image',
			),


			array(
				'id'       => 'cpt-settings-projects-archive-title-tag',
				'type'     => 'select',
				'title'    => esc_html__( 'Title Tag', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> mascot_core_hotelex_heading_tag_list_all(),
				'default'  => 'h4',
			),
		)
	) );



	// -> START Sidebar Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Sidebar Widgets', 'hotelex' ),
		'id'     => 'sidebar-settings',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-align-left',
		'fields' => array(
			array(
				'id'       => 'sidebar-settings-sidebar-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Sidebar Padding(px)', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the sidebar padding. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'hotelex' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Sidebar Background Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar.', 'hotelex' ),
				'transparent' => false,
			),
			array(
				'id'       => 'sidebar-settings-sidebar-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Sidebar Text Alignment', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'left'     => esc_html__( 'Left', 'hotelex' ),
					'center'   => esc_html__( 'Center', 'hotelex' ),
					'right'    => esc_html__( 'Right', 'hotelex' ),
				),
				'default'  => '',
			),


			//section Related Items Starts
			array(
				'id'       => 'sidebar-settings-sidebar-title-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Sidebar Widget Title', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-padding',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'padding',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'           => true,
				'right'         => true,
				'bottom'        => true,
				'left'          => true,
				'units'         => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Widget Title Padding(px)', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the sidebar widget title padding. Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'hotelex' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-bg-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Background Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar widget title box', 'hotelex' ),
				'transparent' => false,
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-text-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Text Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Controls the background color of sidebar widget title box', 'hotelex' ),
				'transparent' => false,
			),
			array(
				'id'            => 'sidebar-settings-sidebar-title-font-size',
				'type'          => 'text',
				'title'         => esc_html__( 'Font Size(px)', 'hotelex' ),
				'subtitle'      => esc_html__( 'Please put only integer value. Because the unit \'px\' will be automatically added to the end of the value.', 'hotelex' ),
				'desc'          => '',
			),


			array(
				'id'       => 'sidebar-settings-sidebar-title-show-line-bottom',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Line Bottom', 'hotelex' ),
				'subtitle' => esc_html__( 'If you enable it then a thin line will be visible below the widget title.', 'hotelex' ),
				'desc'     => '',
				'default'  => '1',
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-line-bottom-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Line Bottom Theme Colored?', 'hotelex' ),
				'subtitle' => esc_html__( 'To make the Line Bottom theme colored, please check it.', 'hotelex' ),
				'desc'     => '',
				'options'  => mascot_core_hotelex_theme_color_list(),
				'default'  => '1',
				'required' => array( 'sidebar-settings-sidebar-title-show-line-bottom', '=', '1' ),
			),
			array(
				'id'       => 'sidebar-settings-sidebar-title-line-bottom-custom-color',
				'type'     => 'color',
				'title'    => esc_html__( 'Custom Line Bottom Color', 'hotelex' ),
				'subtitle' => '',
				'transparent' => false,
				'required' => array( 'sidebar-settings-sidebar-title-line-bottom-theme-colored', '=', '' ),
			),


			array(
				'id'     => 'sidebar-settings-sidebar-title-section-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );



	// -> START 404 Page Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( '404 Page', 'hotelex' ),
		'id'     => '404-page-settings',
		'desc'   => esc_html__( 'Title, content and background settings for 404 Error Page', 'hotelex' ),
		'icon'   => 'dashicons-before dashicons-editor-help',
		'fields' => array(
			array(
				'id'       => '404-page-settings-layout',
				'type'     => 'image_select',
				'title'    => esc_html__( 'Choose Layout', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose one among different layouts.', 'hotelex' ),
				'desc'     => '',
				//Must provide key => value(array:title|img) pairs for radio options
				'options'	=> array(
					'simple' => array(
						'alt' => 'Simple',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/404/simple.jpg'
					),
					'split' => array(
						'alt' => 'Split',
						'img' => HOTELEX_ADMIN_ASSETS_URI . '/images/404/split.jpg'
					),
				),
				'default'  => 'simple',
			),
			array(
				'id'       => '404-page-settings-show-header',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Header', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => '404-page-settings-show-footer',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Footer', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),

			array(
				'id'       => '404-page-settings-text-align',
				'type'     => 'select',
				'title'    => esc_html__( 'Text Alignment', 'hotelex' ),
				'subtitle' => esc_html__( 'Text Alignment of this page', 'hotelex' ),
				'desc'     => '',
				'options'	=> hotelex_redux_text_alignment_list(),
				'default'  => 'text-center',
			),
			array(
				'id'       => '404-page-settings-show-back-to-home-button',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Back to Home Button', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => '404-page-settings-back-to-home-button-label',
				'type'     => 'text',
				'title'    => esc_html__( 'Back to Home Button Label', 'hotelex' ),
				'subtitle' => '',
				'desc'     => esc_html__( 'Default: "Back to Home"', 'hotelex' ),
				'default'  => esc_html__( 'Back to Home', 'hotelex' ),
				'required' => array(
					array( '404-page-settings-show-back-to-home-button', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-show-social-links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Social Links', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),





			//section custom background
			array(
				'id'       => '404-page-settings-custom-background-section-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Custom Background', 'hotelex' ),
				'subtitle' => esc_html__( 'Define background for 404 page.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-custom-background-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Custom Background', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => '404-page-settings-bg',
				'type'     => 'background',
				'title'    => esc_html__( 'Background', 'hotelex' ),
				'subtitle' => esc_html__( 'Choose background image or color.', 'hotelex' ),
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay-status',
				'type'     => 'switch',
				'title'    => esc_html__( 'Add Background Overlay', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay',
				'type'          => 'slider',
				'title'         => esc_html__( 'Background Overlay Opacity', 'hotelex' ),
				'subtitle'      => esc_html__( 'Overlay on background image on footer.', 'hotelex' ),
				'desc'          => '',
				'default'       => 7,
				'min'           => 1,
				'step'          => 1,
				'max'           => 9,
				'display_value' => 'text',
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' ),
					array( '404-page-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-bg-layer-overlay-color',
				'type'     => 'button_set',
				'compiler' =>true,
				'title'    => esc_html__( 'Background Overlay Color', 'hotelex' ),
				'subtitle' => esc_html__( 'Select Dark or White Overlay on background image.', 'hotelex' ),
				'options'	=> array(
					''          	=> esc_html__( 'None', 'hotelex' ),
					'dark'          => esc_html__( 'Dark', 'hotelex' ),
					'white'         => esc_html__( 'White', 'hotelex' ),
					'theme-colored1' => esc_html__( 'Primary Theme Color1', 'hotelex' ),
					'theme-colored2' => esc_html__( 'Primary Theme Color2', 'hotelex' ),
					'theme-colored3' => esc_html__( 'Primary Theme Color3', 'hotelex' ),
					'theme-colored4' => esc_html__( 'Primary Theme Color4', 'hotelex' )
				),
				'default' => 'dark',
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' ),
					array( '404-page-settings-bg-layer-overlay-status', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-custom-background-section-ends',
				'type'     => 'section',
				'title'    => '',
				'subtitle' => '',
				'indent'   => false, // Indent all options below until the next 'section' option is set.
				'required' => array(
					array( '404-page-settings-custom-background-status', '=', '1' )
				)
			),





			//section Title Starts
			array(
				'id'       => '404-page-settings-title-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Title', 'hotelex' ),
				'subtitle' => esc_html__( 'Define text and styles for Title.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-title',
				'type'     => 'text',
				'title'    => esc_html__( 'Title Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Set page title to show', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( '404', 'hotelex' ),
			),
			array(
				'id'       => '404-page-settings-subtitle',
				'type'     => 'text',
				'title'    => esc_html__( 'Sub Title Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Set page sub title to show', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'Oops! Page Not Found!', 'hotelex' ),
			),
			array(
				'id'            => '404-page-settings-title-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Title Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => '404-page-settings-title-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => '404-page-settings-title-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),





			//section Content Starts
			array(
				'id'       => '404-page-settings-content-typography-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Content', 'hotelex' ),
				'subtitle' => esc_html__( 'Define text and styles for Content.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-content',
				'type'     => 'editor',
				'title'    => esc_html__( 'Content Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Enter the content for 404 page which will be showed below title.', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'The page you are looking for does not exist. It might have been moved or deleted.', 'hotelex' ),
			),
			array(
				'id'            => '404-page-settings-content-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Content Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
			),
			array(
				'id'       => '404-page-settings-content-margin-top-bottom',
				'type'     => 'spacing',
				// An array of CSS selectors to apply this font style to
				'mode'     => 'margin',
				// absolute, padding, margin, defaults to padding
				'all'      => false,
				// Have one field that applies to all
				'top'      => true,     // Disable the top
				'right'    => false,     // Disable the right
				'bottom'   => true,     // Disable the bottom
				'left'     => false,     // Disable the left
				'units'    => 'px',      // You can specify a unit value. Possible: px, em, %
				'display_units' => true,   // Set to false to hide the units if the units are specified
				'title'    => esc_html__( 'Margin Top & Bottom', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => '404-page-settings-content-typography-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Helpful Links Starts
			array(
				'id'       => '404-page-settings-helpful-links-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Helpful Links', 'hotelex' ),
				'subtitle' => esc_html__( 'Define text and styles for helpful links.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-show-helpful-links',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Helpful Links', 'hotelex' ),
				'subtitle' => '',
				'desc'     => sprintf( esc_html__( 'Please create a new menu from %1$sAppearance > Menus%2$s and set Theme Location %1$s"Page 404 Helpful Links"%2$s', 'hotelex' ), '<strong>', '</strong>', '<br>'),
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => '404-page-settings-helpful-links-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Heading Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Set heading text to show', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'Helpful Links', 'hotelex' ),
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-helpful-links-heading-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-helpful-links-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Links Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-helpful-links', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-helpful-links-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),




			//section Search Box Starts
			array(
				'id'       => '404-page-settings-search-box-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Search Box', 'hotelex' ),
				'subtitle' => esc_html__( 'Define text and styles for search box.', 'hotelex' ),
				'indent'   => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'       => '404-page-settings-show-search-box',
				'type'     => 'switch',
				'title'    => esc_html__( 'Show Search Box', 'hotelex' ),
				'subtitle' => '',
				'default'  => 0,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),
			array(
				'id'       => '404-page-settings-search-box-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Heading Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Set heading text to show', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'Search Website', 'hotelex' ),
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-search-box-paragraph',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Paragraph Text', 'hotelex' ),
				'subtitle' => esc_html__( 'Set paragraph text to show', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'Please use the search box to find what you are looking for. Perhaps searching can help.', 'hotelex' ),
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-search-box-heading-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Heading Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'            => '404-page-settings-search-box-paragraph-typography',
				'type'          => 'typography',
				'title'         => esc_html__( 'Paragraph Typography', 'hotelex' ),
				'subtitle'      => '',
				'google'        => true,
				// Disable google fonts. Won't work if you haven't defined your google api key
				'font-backup'   => false,
				// Select a backup non-google font in addition to a google font
				'font-style'    => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'font-weight'   => true, // Includes font-style and weight. Can use font-style or font-weight to declare
				'subsets'       => false, // Only appears if google is true and subsets not set to false
				'font-size'     => true,
				'line-height'   => true,
				'word-spacing'  => true,  // Defaults to false
				'letter-spacing'=> true,  // Defaults to false
				'text-transform'=> true,  // Defaults to false
				'color'         => true,
				'preview'       => true, // Disable the previewer
				'all_styles'    => true,
				'units'         => 'px',
				'required' => array(
					array( '404-page-settings-show-search-box', '=', '1' )
				)
			),
			array(
				'id'       => '404-page-settings-search-box-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),
		)
	) );


	if( mascot_core_hotelex_plugin_installed() && function_exists( 'mascot_core_hotelex_redux_opt_maintenance_section' ) ) {
		Redux::setSection( $opt_name, mascot_core_hotelex_redux_opt_maintenance_section() );
	}


	// -> START Social Links Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Social Links', 'hotelex' ),
		'id'     => 'social-links',
		'desc'   => esc_html__( 'This is your official social links. Set the order of social links to be appeared in the header/footer section.', 'hotelex' ),
		'icon'   => 'dashicons-before dashicons-facebook-alt',
		'fields' => $redux_config_social_links_arraylist
	) );



	// -> START Sharing Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Sharing Settings', 'hotelex' ),
		'id'     => 'sharing-settings',
		'desc'   => esc_html__( 'Enable/Disable social sharing buttons for posts, pages and portfolio single pages', 'hotelex' ),
		'icon'   => 'dashicons-before dashicons-share',
		'fields' => array(
			array(
				'id'       => 'sharing-settings-enable-sharing',
				'type'     => 'switch',
				'title'    => esc_html__( 'Enable Sharing', 'hotelex' ),
				'subtitle' => '',
				'default'  => 1,
				'on'       => esc_html__( 'Yes', 'hotelex' ),
				'off'      => esc_html__( 'No', 'hotelex' ),
			),

			array(
				'id'       => 'sharing-settings-heading',
				'type'     => 'text',
				'title'    => esc_html__( 'Sharing Heading', 'hotelex' ),
				'subtitle' => esc_html__( 'Your custom text for the social sharing heading.', 'hotelex' ),
				'desc'     => '',
				'default'  => esc_html__( 'Share On:', 'hotelex' ),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),
			array(
				'id'       => 'sharing-settings-icon-type',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icon Type', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'text'          => 'Text',
					'icon'          => 'Flat Icon',
					'icon-brand'    => 'Icon with Brand Color',
				),
				'default'  => 'icon-brand',
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			//Buttons Type Icon
			array(
				'id'       => 'sharing-settings-social-links-color',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Links - Background Color', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'icon-gray'     => esc_html__( 'Gray', 'hotelex' ),
					'icon-dark'     => esc_html__( 'Dark', 'hotelex' ),
					'icon-white'    => esc_html__( 'White', 'hotelex' ),
					''              => esc_html__( 'Default', 'hotelex' ),
				),
				'default'  => 'icon-gray',
				'required' => array(
					array( 'sharing-settings-icon-type', '=', 'icon' ),
				)
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-style',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icons Style', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'icon-rounded'   => esc_html__( 'Rounded', 'hotelex' ),
					'icon-default'	 => esc_html__( 'Default', 'hotelex' ),
					'icon-circled'   => esc_html__( 'Circled', 'hotelex' ),
				),
				'default'  => 'icon-circled',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-size',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Sharing Icons Size', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					''          => esc_html__( 'Default', 'hotelex' ),
					'icon-xs'   => esc_html__( 'Extra Small', 'hotelex' ),
					'icon-sm'	=> esc_html__( 'Small', 'hotelex' ),
					'icon-md'   => esc_html__( 'Medium', 'hotelex' ),
					'icon-lg'   => esc_html__( 'Large', 'hotelex' ),
					'icon-xl'   => esc_html__( 'Extra Large', 'hotelex' ),
				),
				'default'  => 'icon-md',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-animation-effect',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Icons Animation Effect', 'hotelex' ),
				'desc'     => '',
				'options'	=> array(
					'styled-icons-effect-rollover'   => esc_html__( 'Roll Over', 'hotelex' ),
					''                               => esc_html__( 'Default', 'hotelex' ),
					'styled-icons-effect-rotate'     => esc_html__( 'Rotate', 'hotelex' ),
				),
				'default'  => '',
				'required' => array( 'sharing-settings-icon-type', '!=', 'text' ),
			),
			array(
				'id'       => 'sharing-settings-social-links-icon-border-style',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Make Sharing Icon Area Bordered?', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => '0',
				'required' => array(
					array( 'sharing-settings-social-links-color', '!=', 'brand-color' ),
				)
			),
			array(
				'id'       => 'sharing-settings-social-links-theme-colored',
				'type'     => 'select',
				'title'    => esc_html__( 'Make Sharing Icons Theme Colored?', 'hotelex' ),
				'subtitle' => esc_html__( 'To make the sharing icons theme colored, please check it.', 'hotelex' ),
				'desc'     => '',
				'options'  => mascot_core_hotelex_theme_color_list(),
				'default'  => '',
				'required' => array(
					array( 'sharing-settings-social-links-color', '!=', 'brand-color' ),
				)
			),





			array(
				'id'       => 'sharing-settings-show-social-share-on',
				'type'     => 'checkbox',
				'title'    => esc_html__( 'Show Social Share On', 'hotelex' ),
				'subtitle'     => '',
				'desc' => '',
				//Must provide key => value pairs for multi checkbox options
				'options'	=> array(
					'show-on-posts'     => esc_html__( 'Posts', 'hotelex' ),
					'show-on-pages'     => esc_html__( 'Pages', 'hotelex' ),
					'show-on-tribe-events'     => esc_html__( 'Tribe Events', 'hotelex' ),
					'show-on-portfolio' => esc_html__( 'Portfolio', 'hotelex' ),
				),
				//See how std has changed? you also don't need to specify opts that are 0.
				'default'  => array(
					'show-on-posts' => '1',
					'show-on-pages' => '1',
					'show-on-tribe-events' => '1',
					'show-on-portfolio' => '1',
				),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),
			array(
				'id'       => 'sharing-settings-networks',
				'type'     => 'sorter',
				'title'    => esc_html__( 'Seleted Social Networks', 'hotelex' ),
				'desc'     => '',
				'compiler' => 'true',
				'options'	=> array(
					'Enabled' => array(
						'twitter'    => 'Twitter',
						'facebook'   => 'Facebook',
						'linkedin'   => 'Linkedin',
						'email'      => 'Email',
					),
					'Disabled'  => array(
						'tumblr'     => 'Tumblr',
						'pinterest'  => 'Pinterest',
						'vk'        => 'VK',
						'reddit'    => 'Reddit',
						'print'     => 'Print',
					),
				),
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			//section Social Network URLs Starts
			array(
				'id'       => 'sharing-settings-icon-tooltip-starts',
				'type'     => 'section',
				'title'    => esc_html__( 'Sharing Icon Tooltip', 'hotelex' ),
				'subtitle' => '',
				'indent'   => true, // Indent all options below until the next 'section' option is set.
				'required' => array( 'sharing-settings-enable-sharing', '=', '1' ),
			),

			array(
				'id'       => 'sharing-settings-tooltip-directions',
				'type'     => 'button_set',
				'title'    => esc_html__( 'Tooltip Text Directions', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'options'	=> array(
					'top'    => 'Top',
					'right'  => 'Right',
					'bottom' => 'Bottom',
					'left'   => 'Left',
					'none'   => 'None',
				),
				'default'  => 'top',
			),
			array(
				'id'       => 'sharing-settings-tooltip-twitter',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Twitter', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Twitter', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-facebook',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Facebook', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Facebook', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-linkedin',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for LinkedIn', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on LinkedIn', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-tumblr',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Tumblr', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Tumblr', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-email',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Email', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Email', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-vk',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for VKontakte', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on VKontakte', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-pinterest',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Pinterest', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Pinterest', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-reddit',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Reddit', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Share on Reddit', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-tooltip-print',
				'type'     => 'text',
				'title'    => esc_html__( 'Tooltip text for Print', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
				'default'  => esc_html__( 'Print This Page', 'hotelex' ),
			),
			array(
				'id'       => 'sharing-settings-icon-tooltip-ends',
				'type'   => 'section',
				'indent' => false, // Indent all options below until the next 'section' option is set.
			),

		)
	) );



	// -> START Twitter API Settings
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'API Settings', 'hotelex' ),
		'id'     => 'theme-api-settings',
		'desc'  => esc_html__( 'Fill the following fields if you want to use these features', 'hotelex' ),
		'icon'   => 'dashicons-before dashicons-admin-network',
		'fields' => array(
			array(
				'id'        => 'theme-api-settings-gmaps',
				'type'      => 'info',
				'title'     => esc_html__( 'Google Maps API Settings', 'hotelex' ),
				'subtitle'  => esc_html__( 'Fill the following field if you want to use Google Maps', 'hotelex' ),
				'notice'    => false,
			),
			array(
				'id'       => 'theme-api-settings-gmaps-api-key',
				'type'     => 'text',
				'title'    => esc_html__( 'Google Maps API Key', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),


			array(
				'id'        => 'theme-api-settings-twitter',
				'type'      => 'info',
				'title'     => esc_html__( 'Twitter API Settings', 'hotelex' ),
				'subtitle'  => sprintf( esc_html__('Fill the following fields if you want to use Twitter Feed Widget. You can collect those keys by creating your own Twitter API from here %s%s', 'hotelex'), '<a target="_blank" class="text-white" href="' . esc_url( 'https://dev.twitter.com/apps' ) . '">', '</a>' ),
				'notice'    => false,
			),

			array(
				'id'       => 'theme-api-settings-twitter-api-key',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter API Key', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'theme-api-settings-twitter-api-secret',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter API Secret', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),

			array(
				'id'       => 'theme-api-settings-twitter-api-access-token',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Access Token', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
			array(
				'id'       => 'theme-api-settings-twitter-api-access-token-secret',
				'type'     => 'text',
				'title'    => esc_html__( 'Twitter Access Token Secret', 'hotelex' ),
				'subtitle' => '',
				'desc'     => '',
			),
		)
	) );



	// -> START Custom HTML/JS Codes
	Redux::setSection( $opt_name, array(
		'title'  => esc_html__( 'Custom HTML/JS Codes', 'hotelex' ),
		'id'     => 'custom-codes',
		'desc'   => '',
		'icon'   => 'dashicons-before dashicons-editor-code',
		'fields' => array(
			array(
				'id'       => 'custom-codes-custom-html-script-header',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Custom HTML/JS Code - in Header before &lt;/head&gt; tag', 'hotelex' ),
				'subtitle' => esc_html__( 'If you have any custom HTML or JS Code you would like to add in the header before &lt;/head&gt; tag of the site then please enter it here. Only accepts javascript code wrapped with &lt;script&gt; tags and valid HTML markup.', 'hotelex' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => '',
				'default'     => '',
			),
			array(
				'id'       => 'custom-codes-custom-html-script-footer',
				'type'     => 'ace_editor',
				'title'    => esc_html__( 'Custom HTML/JS Code - in Footer before &lt;/body&gt; tag', 'hotelex' ),
				'subtitle' => esc_html__( 'If you have any custom HTML or JS Code you would like to add in the footer before &lt;/body&gt; tag of the site then please enter it here. Only accepts javascript code wrapped with &lt;script&gt; tags and valid HTML markup.', 'hotelex' ),
				'mode'     => 'javascript',
				'theme'    => 'chrome',
				'desc'     => '',
				'default'     => '',
			)
		)
	) );


	/*
	 * <--- END SECTIONS
	 */

