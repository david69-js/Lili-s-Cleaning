<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */

if ( ! function_exists( 'cleaning_specialist_customizer_home_blog_register' ) ) :
function cleaning_specialist_customizer_home_blog_register( $wp_customize ) {

    $wp_customize->add_section(
        'cleaning_specialist_home_blog_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Home Blog Settings', 'cleaning-specialist' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'cleaning_specialist_label_home_blog_settings_title', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_home_blog_settings_title', 
        array(
            'label'       => esc_html__( 'Home Blog Settings', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_home_blog_settings',
            'type'        => 'cleaning-specialist-title',
            'settings'    => 'cleaning_specialist_label_home_blog_settings_title',
        ) 
    ));

    $categories = get_categories();
    $cat_post = array();
    $cat_post[]= 'select';
    $i = 0; 
    foreach($categories as $category){
        if($i==0){
            $default = $category->slug;
            $i++;
        }
        $cat_post[$category->slug] = $category->name;
    }

    $wp_customize->add_setting(
        'cleaning_specialist_selected_category',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_selected_category',
        array(
            'label'    => esc_html__( 'Select Post Category', 'cleaning-specialist' ),
            'section'  => 'cleaning_specialist_home_blog_settings',
            'settings' => 'cleaning_specialist_selected_category',
            'type'     => 'select',
            'choices'  => $cat_post,
        )
    );

   $wp_customize->add_setting( 'cleaning_specialist_home_blog_number', array(
        'default'           => 3, 
        'sanitize_callback' => 'absint',
    ));

    // Add control for number of products
    $wp_customize->add_control( 'cleaning_specialist_home_blog_number', array(
        'label'       => __( 'Number of Post to Display', 'cleaning-specialist' ),
        'section'     => 'cleaning_specialist_home_blog_settings', 
        'type'        => 'number',
        'input_attrs' => array(
            'min' => 1,
            'max' => 9,
        ),
    ));

    $wp_customize->add_setting(
        'cleaning_specialist_homr_blog_otr_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_homr_blog_otr_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Blog Outer Button Link ', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_blog_settings',
            'settings'        => 'cleaning_specialist_homr_blog_otr_button_link' ,
            'type'            => 'url',
        )
    );
}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_home_blog_register' );