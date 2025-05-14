<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */


if ( ! function_exists( 'cleaning_specialist_customizer_footer_register' ) ) :
function cleaning_specialist_customizer_footer_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'cleaning_specialist_footer_settings',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Footer Settings', 'cleaning-specialist' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_footer_settings_title', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_footer_settings_title', 
		array(
		    'label'       => esc_html__( 'Footer Settings', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_footer_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_footer_settings_title',
		) 
	));

	// Copyright text
    $wp_customize->add_setting(
        'cleaning_specialist_footer_copyright_text',
        array(
            'type' => 'theme_mod',
            'sanitize_callback' => 'cleaning_specialist_sanitize_textarea_field'
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_footer_copyright_text',
        array(
            'settings'      => 'cleaning_specialist_footer_copyright_text',
            'section'       => 'cleaning_specialist_footer_settings',
            'type'          => 'textarea',
            'label'         => esc_html__( 'Footer Copyright Text', 'cleaning-specialist' )
        )
    );
}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_footer_register' );