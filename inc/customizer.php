<?php
/**
 * StanleyWP Theme Customizer
 *
 * @package StanleyWP
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function stanleywp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'stanleywp_customize_register' );


if ( class_exists('Kirki') ) {
	Kirki::add_config( 'stanleywp_theme', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	
	/* Project Settings */
	Kirki::add_section( 'projects_section', array(
		'title'          => esc_attr__( 'Projects Settings', 'stanleywp' ),
		'description'    => esc_attr__( 'Settings for my projects.', 'stanleywp' ),
		'priority'       => 160,
) );

Kirki::add_field( 'stanleywp_theme', array(
	'type'     => 'text',
	'settings' => 'project_title',
	'label'    => __( 'Title', 'stanleywp' ),
	'section'  => 'projects_section',
	'default'  => esc_attr__( 'Projects', 'stanleywp' ),
	'priority' => 10,
) );

Kirki::add_field( 'stanleywp_theme', array(
	'type'        => 'select',
	'settings'    => 'project_items',
	'label'       => __( 'Project Items', 'stanleywp' ),
	'section'     => 'projects_section',
	'default'     => '4',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'6' => esc_attr__( '2 Items', 'stanleywp' ),
		'4' => esc_attr__( '3 Items', 'stanleywp' ),
		'3' => esc_attr__( '4 Items', 'stanleywp' ),
		'2' => esc_attr__( '6 Items', 'stanleywp' ),
	),
) );

Kirki::add_field( 'stanleywp_theme', array(
	'type'        => 'select',
	'settings'    => 'project_rows',
	'label'       => __( 'Project Rows', 'stanleywp' ),
	'section'     => 'projects_row',
	'default'     => '2',
	'priority'    => 10,
	'multiple'    => 1,
	'choices'     => array(
		'6' => esc_attr__( '2 Items', 'stanleywp' ),
		'4' => esc_attr__( '4 Items', 'stanleywp' ),
		'3' => esc_attr__( '6 Items', 'stanleywp' ),
		'2' => esc_attr__( '8 Items', 'stanleywp' ),
	),
) );

Kirki::add_field( 'stanleywp_theme', [
	'type'        => 'typography',
	'settings'    => 'project_typography',
	'label'       => esc_html__( 'Control Label', 'kirki' ),
	'section'     => 'section_id',
	'default'     => [
		'font-family'    => 'Roboto',
		'variant'        => 'regular',
		'font-size'      => '14px',
		'line-height'    => '1.5',
		'letter-spacing' => '0',
		'color'          => '#333333',
		'text-transform' => 'none',
		'text-align'     => 'left',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => 'body',
		],
	],
] );

Kirki::add_field( 'stanleywp_theme', [
	'type'        => 'slider',
	'settings'    => 'my_setting',
	'label'       => esc_html__( 'This is the label', 'kirki' ),
	'section'     => 'stanley_slider',
	'default'     => 50,
	'choices'     => [
		'min'  => 0,
		'max'  => 100,
		'step' => 1,
	],
] );


}