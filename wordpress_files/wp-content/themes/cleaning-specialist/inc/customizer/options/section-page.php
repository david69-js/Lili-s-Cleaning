<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */

if ( ! function_exists( 'cleaning_specialist_customizer_page_register' ) ) :
function cleaning_specialist_customizer_page_register( $wp_customize ) {
 
 	$wp_customize->add_section(
        'cleaning_specialist_page_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Page Settings', 'cleaning-specialist' )
        )
    );

    // Info label
     $wp_customize->add_setting( 
        'cleaning_specialist_label_page_title_hide_settings', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_page_title_hide_settings', 
        array(
            'label'       => esc_html__( 'Hide Page Title', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_page_settings',
            'type'        => 'cleaning-specialist-title',
            'settings'    => 'cleaning_specialist_label_page_title_hide_settings',
        ) 
    ));  

    // Hide page title section
    $wp_customize->add_setting(
        'cleaning_specialist_enable_page_title',
        array(
            'type' => 'theme_mod',
            'default'           => true,
            'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox'
        )
    );

    $wp_customize->add_control(
        new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_page_title', 
        array(
            'settings'      => 'cleaning_specialist_enable_page_title',
            'section'       => 'cleaning_specialist_page_settings',
            'type'          => 'cleaning-specialist-toggle',
            'label'         => esc_html__( 'Show Page Title Section:', 'cleaning-specialist' ),
            'description'   => '',           
        )
    ));

    // Info label
    $wp_customize->add_setting( 
        'cleaning_specialist_label_page_title_bg_settings', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_page_title_bg_settings', 
        array(
            'label'       => esc_html__( 'Page Title Background', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_page_settings',
            'type'        => 'title',
            'settings'    => 'cleaning_specialist_label_page_title_bg_settings',
            'active_callback' => 'cleaning_specialist_page_title_enable',
        ) 
    ));

    // Background selection
    $wp_customize->add_setting(
        'cleaning_specialist_page_bg_radio',
        array(
            'type' => 'theme_mod',
            'default'           => 'color',
            'sanitize_callback' => 'cleaning_specialist_sanitize_select'
        )
    );

    $wp_customize->add_control(
    	new Cleaning_Specialist_Text_Radio_Control( $wp_customize, 'cleaning_specialist_page_bg_radio',
        array(
            'settings'      => 'cleaning_specialist_page_bg_radio',
            'section'       => 'cleaning_specialist_page_settings',
            'type'          => 'radio',
            'label'         => esc_html__( 'Choose Page Title Background Color or Background Image:', 'cleaning-specialist' ),
            'description'   => esc_html__('This setting will change the background of the page title area.', 'cleaning-specialist'),
            'choices' => array(
                            'color' => esc_html__('Background Color','cleaning-specialist'),
                            'image' => esc_html__('Background Image','cleaning-specialist'),
                            ),
            'active_callback' => 'cleaning_specialist_page_title_enable',
        )
    ));

    // Background color
    $wp_customize->add_setting(
        'cleaning_specialist_page_bg_color',
        array(
            'type' => 'theme_mod',
            'default'           => '#0e3440',
            'sanitize_callback' => 'sanitize_hex_color'
        )
    );

    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'cleaning_specialist_page_bg_color',
            array(
                'label'      => esc_html__( 'Select Background Color', 'cleaning-specialist' ),
                'description'   => esc_html__('This setting will add background color to the page title area if Background Color was selected above.', 'cleaning-specialist'),
                'section'    => 'cleaning_specialist_page_settings',
                'settings'   => 'cleaning_specialist_page_bg_color',
                'active_callback' => 'cleaning_specialist_page_title_color_enable',
            )
        )
    );    
}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_page_register' );