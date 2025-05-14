<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */

if ( ! function_exists( 'cleaning_specialist_customizer_general_setting_register' ) ) :
function cleaning_specialist_customizer_general_setting_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'cleaning_specialist_general_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'cleaning-specialist' )
        )
    );

 	// Add general Panel for preloader and scrolltop
    $wp_customize->add_panel(
        'cleaning_specialist_general_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'General Settings', 'cleaning-specialist' ),
        )
    );

    // Section preloader
    $wp_customize->add_section(
        'cleaning_specialist_prelodr_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Preloader', 'cleaning-specialist' ),
            'panel'         => 'cleaning_specialist_general_settings_panel',
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_preloader_settings', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_preloader_settings', 
		array(
		    'label'       => esc_html__( 'Preloader Settings', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_prelodr_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_preloader_settings',
		) 
	));

	// Add an option to enable the preloader
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_preloader', 
		array(
		    'default'           => false,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_preloader', 
		array(
		    'label'       => esc_html__( 'Show Preloader', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_prelodr_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_preloader',
		) 
	));


    // Section Body Typography
    $wp_customize->add_section(
        'cleaning_specialist_scrol_settings',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Scroll Top', 'cleaning-specialist' ),
            'panel'         => 'cleaning_specialist_general_settings_panel',
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_scroll_top_settings', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_scroll_top_settings', 
		array(
		    'label'       => esc_html__( 'Scroll Top Settings', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_scrol_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_scroll_top_settings',
		) 
	));

	// Add an option to enable the scrolltop
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_scrolltop', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_scrolltop', 
		array(
		    'label'       => esc_html__( 'Show Scroll Top', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_scrol_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_scrolltop',
		) 
	));

	 $wp_customize->add_section(
        'cleaning_specialist_button_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Buttons', 'cleaning-specialist' ),
            'panel'         => 'cleaning_specialist_general_settings_panel',
        )
    );

	 // Border Radius Setting
	$wp_customize->add_setting(
	    'cleaning_specialist_button_border_radius',
	    array(
	        'default'           => '5px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'cleaning_specialist_button_border_radius',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Border Radius (e.g. 4px, 50%)', 'cleaning-specialist' ),
	        'section'  => 'cleaning_specialist_button_settings',
	    )
	);

	// Button Padding Setting
	$wp_customize->add_setting(
	    'cleaning_specialist_button_padding',
	    array(
	        'default'           => '8px 36px',
	        'sanitize_callback' => 'sanitize_text_field',
	        'transport'         => 'refresh',
	    )
	);

	$wp_customize->add_control(
	    'cleaning_specialist_button_padding',
	    array(
	        'type'     => 'text',
	        'label'    => esc_html__( 'Button Padding (e.g. 10px 20px)', 'cleaning-specialist' ),
	        'section'  => 'cleaning_specialist_button_settings',
	    )
	);


}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_general_setting_register' );