<?php

defined( 'ABSPATH' ) || exit;

/**
 * Implement Theme Customizer additions and adjustments.
 * https://codex.wordpress.org/Theme_Customization_API
 *
 * How do I "output" custom theme modification settings? https://developer.wordpress.org/reference/functions/get_theme_mod
 * echo get_theme_mod( 'copyright_info' );
 * or: echo get_theme_mod( 'copyright_info', 'Default (c) Copyright Info if nothing provided' );
 *
 * "sanitize_callback": https://codex.wordpress.org/Data_Validation
 */
function codeberry_base_theme_customize( $wp_customize ) {
	/**
	 * Initialize sections
	 */
	$wp_customize->add_section(
		'theme_header_section',
		array(
			'title'    => __( 'Header', 'codeberry-base-theme' ),
			'priority' => 1000,
		)
	);

	/**
	 * Section: Page Layout
	 */

	// Predefined Navbar scheme.
	$wp_customize->add_setting(
		'navbar_scheme',
		array(
			'default'           => 'default',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'navbar_scheme',
		array(
			'type'     => 'radio',
			'label'    => __( 'Navbar Scheme', 'codeberry-base-theme' ),
			'section'  => 'theme_header_section',
			'choices'  => array(
				'navbar-light bg-light'  => __( 'Default', 'codeberry-base-theme' ),
				'navbar-dark bg-dark'    => __( 'Dark', 'codeberry-base-theme' ),
				'navbar-dark bg-primary' => __( 'Primary', 'codeberry-base-theme' ),
			),
			'settings' => 'navbar_scheme',
			'priority' => 1,
		)
	);

	// Fixed Header?
	$wp_customize->add_setting(
		'navbar_position',
		array(
			'default'           => 'static',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'navbar_position',
		array(
			'type'     => 'radio',
			'label'    => __( 'Navbar', 'codeberry-base-theme' ),
			'section'  => 'theme_header_section',
			'choices'  => array(
				'static'       => __( 'Static', 'codeberry-base-theme' ),
				'fixed_top'    => __( 'Fixed to top', 'codeberry-base-theme' ),
				'fixed_bottom' => __( 'Fixed to bottom', 'codeberry-base-theme' ),
			),
			'settings' => 'navbar_position',
			'priority' => 2,
		)
	);
}

add_action( 'customize_register', 'codeberry_base_theme_customize' );


/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function codeberry_base_theme_customize_preview_js() {
	wp_enqueue_script( 'customizer', get_template_directory_uri() . '/inc/customizer.js', array( 'jquery' ), null, true );
}
add_action( 'customize_preview_init', 'codeberry_base_theme_customize_preview_js' );
