<?php
/**
 * Cleaning Specialist Theme Customizer
 *
 * @package Cleaning Specialist
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

if ( ! function_exists( 'cleaning_specialist_customize_register' ) ) :
function cleaning_specialist_customize_register( $wp_customize ) {

    // Add custom controls.
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/info/class-title-info-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/toggle-button/class-login-designer-toggle-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/radio-images/class-radio-image-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/text-radio/class-text-radio-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/slider/class-slider-control.php' );
    require get_parent_theme_file_path( 'inc/customizer/custom-controls/typography/typo-custom-control.php' );

    // Register the custom control type.
    $wp_customize->register_control_type( 'Cleaning_Specialist_Toggle_Control' );


    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    $wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'cleaning-specialist' );

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'cleaning_specialist_site_title_callback',
            'fallback_refresh'    => false,
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'cleaning_specialist_site_description_callback',
            'fallback_refresh'    => false, 
        ) );
    }

    // Display Site Title
        $wp_customize->add_setting( 
            'cleaning_specialist_display_site_title', 
            array(
                'default'           => true,
                'type'              => 'theme_mod',
                'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
            ) 
        );
        $wp_customize->add_control( 
            new Cleaning_Specialist_Toggle_Control( 
                $wp_customize, 
                'cleaning_specialist_display_site_title', 
                array(
                    'label'    => esc_html__( 'Display Site Title', 'cleaning-specialist' ),
                    'section'  => 'title_tagline',
                    'settings' => 'cleaning_specialist_display_site_title',
                ) 
            )
        );

        // Display Site Tagline
        $wp_customize->add_setting( 
            'cleaning_specialist_display_site_tagline', 
            array(
                'default'           => false,
                'type'              => 'theme_mod',
                'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
            ) 
        );
        $wp_customize->add_control( 
            new Cleaning_Specialist_Toggle_Control( 
                $wp_customize, 
                'cleaning_specialist_display_site_tagline', 
                array(
                    'label'    => esc_html__( 'Display Tagline', 'cleaning-specialist' ),
                    'section'  => 'title_tagline',
                    'settings' => 'cleaning_specialist_display_site_tagline',
                ) 
            )
        );
    
    // Add setting
    $wp_customize->add_setting( 'cleaning_specialist_logo_width', array(
        'default'           => 150,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage', // Optional for live preview
    ) );

    // Add control (range slider)
    $wp_customize->add_control( 'cleaning_specialist_logo_width', array(
        'label'       => __( 'Logo Resizer (px)', 'cleaning-specialist' ),
        'section'     => 'title_tagline',
        'type'        => 'range',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 400,
            'step' => 1,
        ),
    ) ); 
}
endif;
add_action( 'customize_register', 'cleaning_specialist_customize_register' );

//General settings
get_template_part( 'inc/customizer/options/section-general' );

//Global Color settings
get_template_part( 'inc/customizer/options/section-global-color' );

//typography settings
get_template_part( 'inc/customizer/options/section-typography' );

//header settings
get_template_part( 'inc/customizer/options/section-header' );

//banner settings
get_template_part( 'inc/customizer/options/section-banner' );

//Home Blog settings
get_template_part( 'inc/customizer/options/section-home-blog' );

//blog settings
get_template_part( 'inc/customizer/options/section-blog' );

//page settings
get_template_part( 'inc/customizer/options/section-page' );

//footer settings
get_template_part( 'inc/customizer/options/section-footer' );

//customizer helper
get_template_part( 'inc/customizer/customizer-helpers' );

//data sanitization
get_template_part( 'inc/customizer/data-sanitization' );

/**
 * Enqueue the customizer stylesheet.
 */
if ( ! function_exists( 'cleaning_specialist_enqueue_customizer_stylesheets' ) ) :
function cleaning_specialist_enqueue_customizer_stylesheets() {
    wp_register_style( 'cleaning-specialist-customizer-css', get_template_directory_uri() . '/inc/customizer/assets/css/customizer.css', array(), '1.0.9', 'all' );
    wp_enqueue_style( 'cleaning-specialist-customizer-css' );
}
endif;
add_action( 'customize_controls_print_styles', 'cleaning_specialist_enqueue_customizer_stylesheets' );