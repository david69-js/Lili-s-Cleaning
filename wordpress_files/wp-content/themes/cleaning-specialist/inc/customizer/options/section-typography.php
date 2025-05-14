<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */

if ( ! function_exists( 'cleaning_specialist_customizer_typography_setting_register' ) ) :
function cleaning_specialist_customizer_typography_setting_register( $wp_customize ) {

    // Add Typography Panel for Body and Heading
    $wp_customize->add_panel(
        'cleaning_specialist_typography_settings_panel',
        array(
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Typography Settings', 'cleaning-specialist' ),
        )
    );

    // Section Body Typography
    $wp_customize->add_section(
        'cleaning_specialist_body_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Body', 'cleaning-specialist' ),
            'panel'         => 'cleaning_specialist_typography_settings_panel',
        )
    );

    // Body Font Family Setting
    $wp_customize->add_setting(
        'cleaning_specialist_body_font_family',
        array(
            'default'           => 'Montserrat, sans-serif', // Default font
            'sanitize_callback' => 'cleaning_specialist_sanitize_font_family', // Custom sanitize function
        )
    );
    $wp_customize->add_control( new Cleaning_Specialist_Font_Select_Control(
    $wp_customize,
    'cleaning_specialist_body_font_family',
    array(
        'label'   => esc_html__( 'Body Font Family', 'cleaning-specialist' ),
        'section' => 'cleaning_specialist_body_typography_settings',
        'choices' => cleaning_specialist_get_google_fonts(),
    )
    ));

    // Section Heading Typography
    $wp_customize->add_section(
        'cleaning_specialist_heading_typography_settings',
        array(
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Heading', 'cleaning-specialist' ),
            'panel'         => 'cleaning_specialist_typography_settings_panel',
        )
    );

    // Heading Font Family Setting
    $wp_customize->add_setting(
        'cleaning_specialist_heading_font_family',
        array(
            'default'           => 'Montserrat, sans-serif', // Default font
            'sanitize_callback' => 'cleaning_specialist_sanitize_font_family', // Custom sanitize function
        )
    );
    $wp_customize->add_control( new Cleaning_Specialist_Font_Select_Control(
    $wp_customize,
    'cleaning_specialist_heading_font_family',
    array(
        'label'   => esc_html__( 'Heading Font Family', 'cleaning-specialist' ),
        'section' => 'cleaning_specialist_heading_typography_settings',
        'choices' => cleaning_specialist_get_google_fonts(),
    )
    ));
}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_typography_setting_register' );

// Function to fetch Google Fonts
function cleaning_specialist_get_google_fonts() {
    // Add Google Fonts to be available for selection
    return array(
        'Montserrat, sans-serif' => 'Montserrat',
        'Arial, sans-serif'   => 'Arial',
        'Georgia, serif'      => 'Georgia',
        'Verdana, sans-serif' => 'Verdana',
        'Times New Roman, serif' => 'Times New Roman',
        'Roboto, sans-serif'  => 'Roboto',
        'Open Sans, sans-serif' => 'Open Sans',
        'Lora, serif'         => 'Lora',
        'Merriweather, serif' => 'Merriweather',
        // Add more Google fonts as needed
    );
}

// Sanitize Google Fonts input
function cleaning_specialist_sanitize_font_family( $value ) {
    $allowed_fonts = array('Montserrat, sans-serif','Arial, sans-serif', 'Georgia, serif', 'Verdana, sans-serif', 
        'Times New Roman, serif', 'Roboto, sans-serif', 'Open Sans, sans-serif','Lora, serif', 'Merriweather, serif',
        // Add more allowed fonts to this array
    );

    if ( in_array( $value, $allowed_fonts ) ) {
        return $value;
    } else {
        return 'Montserrat, sans-serif'; // Default fallback font
    }
}

function cleaning_specialist_sanitize_title( $value ) {
    return sanitize_text_field( $value );
}
