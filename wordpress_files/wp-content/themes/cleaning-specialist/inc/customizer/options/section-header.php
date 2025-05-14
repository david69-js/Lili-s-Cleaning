<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */


if ( ! function_exists( 'cleaning_specialist_customizer_header_register' ) ) :
function cleaning_specialist_customizer_header_register( $wp_customize ) {

    $wp_customize->add_section(
        'cleaning_specialist_home_header_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Header Settings', 'cleaning-specialist' )
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'cleaning_specialist_label_social_meida_settings_title', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_social_meida_settings_title', 
        array(
            'label'       => esc_html__( 'Social Media Links', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_home_header_settings',
            'type'        => 'cleaning-specialist-title',
            'settings'    => 'cleaning_specialist_label_social_meida_settings_title',
        ) 
    ));

    // Facebook Link
    $wp_customize->add_setting(
        'cleaning_specialist_social_media1_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_social_media1_heading',
        array(
            'label'           => sprintf( esc_html__( 'Facebook Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_social_media1_heading' ,
            'type'            => 'url',
        )
    );

    // Instagram Link
    $wp_customize->add_setting(
        'cleaning_specialist_social_media2_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_social_media2_heading',
        array(
            'label'           => sprintf( esc_html__( 'Instagram Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_social_media2_heading' ,
            'type'            => 'url',
        )
    );

    // Twitter Link
    $wp_customize->add_setting(
        'cleaning_specialist_social_media3_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_social_media3_heading',
        array(
            'label'           => sprintf( esc_html__( 'Twitter Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_social_media3_heading' ,
            'type'            => 'url',
        )
    );

    // Youtube Link
    $wp_customize->add_setting(
        'cleaning_specialist_social_media4_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_social_media4_heading',
        array(
            'label'           => sprintf( esc_html__( 'Youtube Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_social_media4_heading' ,
            'type'            => 'url',
        )
    );

    // Pinterest Link
    $wp_customize->add_setting(
        'cleaning_specialist_social_media5_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_social_media5_heading',
        array(
            'label'           => sprintf( esc_html__( 'Pinterest Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_social_media5_heading' ,
            'type'            => 'url',
        )
    );

    // Linkedin Link
    $wp_customize->add_setting(
        'cleaning_specialist_social_media6_heading',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_social_media6_heading',
        array(
            'label'           => sprintf( esc_html__( 'Linkedin Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_social_media6_heading' ,
            'type'            => 'url',
        )
    );
    // timer

    // Title label
    $wp_customize->add_setting( 
        'cleaning_specialist_label_topbar_timer_settings_title', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_topbar_timer_settings_title', 
        array(
            'label'       => esc_html__( 'Topbar Timer Setting', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_home_header_settings',
            'type'        => 'cleaning-specialist-title',
            'settings'    => 'cleaning_specialist_label_topbar_timer_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'cleaning_specialist_topbar_timer_text',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_topbar_timer_text',
        array(
            'label'           => sprintf( esc_html__( 'Timer Text', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_topbar_timer_text' ,
            'type'            => 'text',
        )
    );

     $wp_customize->add_setting('cleaning_specialist_countdown_datetime', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add Control for Countdown Date & Time
    $wp_customize->add_control('cleaning_specialist_countdown_datetime', array(
        'label'    => __('Countdown Date & Time', 'cleaning-specialist'),
        'section'  => 'cleaning_specialist_home_header_settings',
        'settings' => 'cleaning_specialist_countdown_datetime',
        'type'     => 'datetime-local',
    ));
    

    // Title label
    $wp_customize->add_setting( 
        'cleaning_specialist_label_topbar_btn_settings_title', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_topbar_btn_settings_title', 
        array(
            'label'       => esc_html__( 'Topbar Button', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_home_header_settings',
            'type'        => 'cleaning-specialist-title',
            'settings'    => 'cleaning_specialist_label_topbar_btn_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'cleaning_specialist_topbar_ticket_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_topbar_ticket_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Ticket Button Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_topbar_ticket_button_link' ,
            'type'            => 'url',
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'cleaning_specialist_label_topbar_contact_settings_title', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_topbar_contact_settings_title', 
        array(
            'label'       => esc_html__( 'Topbar Contact Detail', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_home_header_settings',
            'type'        => 'cleaning-specialist-title',
            'settings'    => 'cleaning_specialist_label_topbar_contact_settings_title',
        ) 
    ));

    $wp_customize->add_setting(
        'cleaning_specialist_topbar_contact_number',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_topbar_contact_number',
        array(
            'label'           => sprintf( esc_html__( 'Contact Number', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_topbar_contact_number' ,
            'type'            => 'text',
        )
    );

    $wp_customize->add_setting(
        'cleaning_specialist_topbar_email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_topbar_email',
        array(
            'label'           => sprintf( esc_html__( 'Email ID', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_topbar_email' ,
            'type'            => 'text',
        )
    );

    // Title label
    $wp_customize->add_setting( 
        'cleaning_specialist_label_header_settings_title', 
        array(
            'sanitize_callback' => 'cleaning_specialist_sanitize_title',
        ) 
    );

    $wp_customize->add_control( 
        new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_header_settings_title', 
        array(
            'label'       => esc_html__( 'Header Buttons', 'cleaning-specialist' ),
            'section'     => 'cleaning_specialist_home_header_settings',
            'type'        => 'cleaning-specialist-title',
            'settings'    => 'cleaning_specialist_label_header_settings_title',
        ) 
    ));


    $wp_customize->add_setting(
        'cleaning_specialist_header_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_header_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Cleaner Button Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_header_button_link' ,
            'type'            => 'url',
        )
    );

    $wp_customize->add_setting(
        'cleaning_specialist_header_call_button_link',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_header_call_button_link',
        array(
            'label'           => sprintf( esc_html__( 'Contact Button Link', 'cleaning-specialist' ), ),
            'section'         => 'cleaning_specialist_home_header_settings',
            'settings'        => 'cleaning_specialist_header_call_button_link' ,
            'type'            => 'url',
        )
    );

}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_header_register' );