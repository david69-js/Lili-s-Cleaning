<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */

if ( ! function_exists( 'cleaning_specialist_customizer_global_color_setting_register' ) ) :
function cleaning_specialist_customizer_global_color_setting_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'cleaning_specialist_global_color_settings',
        array (
            'priority'      => 40,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Global Color Settings', 'cleaning-specialist' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_theme_color_settings', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_theme_color_settings', 
		array(
		    'label'       => esc_html__( 'Global Color Settings', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_global_color_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_theme_color_settings',
		) 
	));

	$wp_customize->add_setting('cleaning_specialist_global_color1',
        array(
            'type' => 'theme_mod',
            'default'           => '#0e3440',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cleaning_specialist_global_color1',
            array(
                'label'      => esc_html__( 'Global Color1', 'cleaning-specialist' ),
                'section'    => 'cleaning_specialist_global_color_settings',
                'settings'   => 'cleaning_specialist_global_color1',
            )
        )
    ); 

    $wp_customize->add_setting('cleaning_specialist_global_color2',
        array(
            'type' => 'theme_mod',
            'default'           => '#fedb5c',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cleaning_specialist_global_color2',
            array(
                'label'      => esc_html__( 'Global Color2', 'cleaning-specialist' ),
                'section'    => 'cleaning_specialist_global_color_settings',
                'settings'   => 'cleaning_specialist_global_color2',
            )
        )
    );   

}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_global_color_setting_register' );