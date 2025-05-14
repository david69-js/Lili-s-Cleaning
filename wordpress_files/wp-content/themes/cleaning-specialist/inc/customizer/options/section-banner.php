<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */


if ( ! function_exists( 'cleaning_specialist_customizer_home_banner_register' ) ) :
function cleaning_specialist_customizer_home_banner_register( $wp_customize ) {
 	
 	$wp_customize->add_section(
        'cleaning_specialist_home_banner_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Banner Settings', 'cleaning-specialist' )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_banner_settings_title', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_banner_settings_title', 
		array(
		    'label'       => esc_html__( 'Banner Settings', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_home_banner_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_banner_settings_title',
		) 
	));

    $wp_customize->add_setting('cleaning_specialist_banner_slider_increase',array(
        'default' => '',
        'sanitize_callback' => 'cleaning_specialist_sanitize_number',
    ));
    $wp_customize->add_control('cleaning_specialist_banner_slider_increase',array(
        'label' => __('Number of slides to show','cleaning-specialist'),
        'section' => 'cleaning_specialist_home_banner_settings',
        'type'    => 'number'
    ));
      $cleaning_specialist_banner_count =  get_theme_mod('cleaning_specialist_banner_slider_increase');

        for($i=1; $i<=$cleaning_specialist_banner_count; $i++ ) {  

    // Button Image
    $wp_customize->add_setting(
        'cleaning_specialist_banner_image'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'cleaning_specialist_sanitize_image',

        )
    );
    
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize, 'cleaning_specialist_banner_image'.$i, 
            array(
                'label'           => sprintf( esc_html__( 'Banner Image', 'cleaning-specialist' ).$i, ),
                'settings'  => 'cleaning_specialist_banner_image'.$i,
                'section'   => 'cleaning_specialist_home_banner_settings'
            ) 
        )
    );

    // Banner Heading
	$wp_customize->add_setting(
        'cleaning_specialist_banner_heading'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_banner_heading'.$i,
        array(
            'label'           => sprintf( esc_html__( 'Banner Heading', 'cleaning-specialist' ).$i, ),
            'section'         => 'cleaning_specialist_home_banner_settings',
            'settings'        => 'cleaning_specialist_banner_heading'.$i ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'cleaning_specialist_banner_text'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_banner_text'.$i,
        array(
            'label'           => sprintf( esc_html__( 'Banner Text', 'cleaning-specialist' ).$i, ),
            'section'         => 'cleaning_specialist_home_banner_settings',
            'settings'        => 'cleaning_specialist_banner_text'.$i ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'cleaning_specialist_banner_button_link'.$i,
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_banner_button_link'.$i,
        array(
            'label'           => sprintf( esc_html__( 'Banner Button Link', 'cleaning-specialist' ).$i, ),
            'section'         => 'cleaning_specialist_home_banner_settings',
            'settings'        => 'cleaning_specialist_banner_button_link'.$i ,
            'type'            => 'url',
        )
    );
}
// Slider Content Alignment Setting
    $wp_customize->add_setting(
        'cleaning_specialist_slider_content_alignment',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'cleaning_specialist_sanitize_select',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_slider_content_alignment',
        array(
            'label'    => esc_html__( 'Slider Content Alignment', 'cleaning-specialist' ),
            'section'  => 'cleaning_specialist_home_banner_settings',
            'settings' => 'cleaning_specialist_slider_content_alignment',
            'type'     => 'select',
            'choices'  => array(
                'left'   => esc_html__( 'Left', 'cleaning-specialist' ),
                'center' => esc_html__( 'Center', 'cleaning-specialist' ),
                'right'  => esc_html__( 'Right', 'cleaning-specialist' ),
            ),
        )
    );   
}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_home_banner_register' );