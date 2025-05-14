<?php
/**
 * Theme Customizer Controls
 *
 * @package Cleaning Specialist
 */


if ( ! function_exists( 'cleaning_specialist_customizer_blog_register' ) ) :
function cleaning_specialist_customizer_blog_register( $wp_customize ) {
	
	$wp_customize->add_panel(
        'cleaning_specialist_blog_settings_panel',
        array (
            'priority'      => 30,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Blog Settings', 'cleaning-specialist' ),
        )
    );

	// Section Posts
    $wp_customize->add_section(
        'cleaning_specialist_posts_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Posts', 'cleaning-specialist' ),
            'panel'          => 'cleaning_specialist_blog_settings_panel',
        )
    ); 


	// Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_post_meta_show', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_post_meta_show', 
		array(
		    'label'       => esc_html__( 'Posts Meta', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_posts_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_post_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_posts_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_posts_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_posts_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_posts_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_posts_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_posts_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_posts_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_posts_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_posts_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_posts_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_posts_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_posts_meta_comments',
		) 
	));


	// Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_sidebar_layout', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_posts_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'cleaning_specialist_blog_sidebar_layout',
        array(
            'default'			=> 'right',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'cleaning_specialist_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Cleaning_Specialist_Radio_Image_Control( $wp_customize,'cleaning_specialist_blog_sidebar_layout',
            array(
                'settings'		=> 'cleaning_specialist_blog_sidebar_layout',
                'section'		=> 'cleaning_specialist_posts_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'cleaning-specialist' ),
                'choices'		=> array(
                    'right'	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'three_colm'	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/c3.png',
                    'four_colm'	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/c4.png',
                    'grid_layout'	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/c5.png',
                    'grid_left_sidebar'	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/c6.png',
                    'grid_right_sidebar'	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/c7.png',
                    'no' 	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );

    // Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_blog_excerpt', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_blog_excerpt', 
		array(
		    'label'       => esc_html__( 'Post Excerpt', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_posts_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_blog_excerpt',
		) 
	));

	// add post excerpt textbox
    $wp_customize->add_setting(
        'cleaning_specialist_posts_excerpt_length',
        array(
            'type' => 'theme_mod',
            'default'           => 30,
            'sanitize_callback' => 'cleaning_specialist_sanitize_number',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_posts_excerpt_length',
        array(
            'settings'      => 'cleaning_specialist_posts_excerpt_length',
            'section'       => 'cleaning_specialist_posts_settings',
            'type'          => 'number',
            'label'         => esc_html__( 'Post Excerpt Length', 'cleaning-specialist' ),
        )
    );

    // add readmore textbox
    $wp_customize->add_setting(
        'cleaning_specialist_posts_readmore_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'READ MORE', 'cleaning-specialist' ),
            'sanitize_callback' => 'cleaning_specialist_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_posts_readmore_text',
        array(
            'settings'      => 'cleaning_specialist_posts_readmore_text',
            'section'       => 'cleaning_specialist_posts_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Read More Text', 'cleaning-specialist' ),
        )
    );

    //=========================================================================

	// Section Single Post
    $wp_customize->add_section(
        'cleaning_specialist_single_post_settings',
        array (
            'priority'      => 25,
            'capability'    => 'edit_theme_options',
            'title'         => esc_html__( 'Single Post', 'cleaning-specialist' ),
            'panel'          => 'cleaning_specialist_blog_settings_panel',
        )
    ); 


    // Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_single_post_category_show', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_single_post_category_show', 
		array(
		    'label'       => esc_html__( 'Post Category', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_single_post_category_show',
		) 
	));

	// Add an option to enable the category
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_single_post_cat', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_single_post_cat', 
		array(
		    'label'       => esc_html__( 'Show Category', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_single_post_cat',
		) 
	));

	// add category textbox
    $wp_customize->add_setting(
        'cleaning_specialist_single_post_category_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Category:', 'cleaning-specialist' ),
            'sanitize_callback' => 'cleaning_specialist_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_single_post_category_text',
        array(
            'settings'      => 'cleaning_specialist_single_post_category_text',
            'section'       => 'cleaning_specialist_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Category Text', 'cleaning-specialist' ),
        )
    );

	// Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_single_post_tag_show', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_single_post_tag_show', 
		array(
		    'label'       => esc_html__( 'Post Tags', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_single_post_tag_show',
		) 
	));

	// Add an option to enable the tags
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_single_post_tags', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_single_post_tags', 
		array(
		    'label'       => esc_html__( 'Show Tags', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_single_post_tags',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_single_pos_meta_show', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_single_pos_meta_show', 
		array(
		    'label'       => esc_html__( 'Post Meta', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_single_pos_meta_show',
		) 
	));

	// Add an option to enable the date
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_single_post_meta_date', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_single_post_meta_date', 
		array(
		    'label'       => esc_html__( 'Show Date', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_single_post_meta_date',
		) 
	));

	// Add an option to enable the author
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_single_post_meta_author', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_single_post_meta_author', 
		array(
		    'label'       => esc_html__( 'Show Author', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_single_post_meta_author',
		) 
	));

	// Add an option to enable the comments
	$wp_customize->add_setting( 
		'cleaning_specialist_enable_single_post_meta_comments', 
		array(
		    'default'           => true,
		    'type'              => 'theme_mod',
		    'sanitize_callback' => 'cleaning_specialist_sanitize_checkbox',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Toggle_Control( $wp_customize, 'cleaning_specialist_enable_single_post_meta_comments', 
		array(
		    'label'       => esc_html__( 'Show Comments', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-toggle',
		    'settings'    => 'cleaning_specialist_enable_single_post_meta_comments',
		) 
	));

	// Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_single_pos_nav_show', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_single_pos_nav_show', 
		array(
		    'label'       => esc_html__( 'Post Navigation', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_single_pos_nav_show',
		) 
	));

    // add next article textbox
    $wp_customize->add_setting(
        'cleaning_specialist_single_post_next_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Next Article', 'cleaning-specialist' ),
            'sanitize_callback' => 'cleaning_specialist_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_single_post_next_article_text',
        array(
            'settings'      => 'cleaning_specialist_single_post_next_article_text',
            'section'       => 'cleaning_specialist_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Next Article Text', 'cleaning-specialist' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'cleaning-specialist' ),
        )
    );

    // add previous article textbox
    $wp_customize->add_setting(
        'cleaning_specialist_single_post_previous_article_text',
        array(
            'type' => 'theme_mod',
            'default'           => esc_html__( 'Previous Article', 'cleaning-specialist' ),
            'sanitize_callback' => 'cleaning_specialist_sanitize_text_field',
        )
    );

    $wp_customize->add_control(
        'cleaning_specialist_single_post_previous_article_text',
        array(
            'settings'      => 'cleaning_specialist_single_post_previous_article_text',
            'section'       => 'cleaning_specialist_single_post_settings',
            'type'          => 'textbox',
            'label'         => esc_html__( 'Previous Article Text', 'cleaning-specialist' ),
            'description'         => esc_html__( 'You can change the text displayed in the single post navigation', 'cleaning-specialist' ),
        )
    );


	// Title label
	$wp_customize->add_setting( 
		'cleaning_specialist_label_single_sidebar_layout', 
		array(
		    'sanitize_callback' => 'cleaning_specialist_sanitize_title',
		) 
	);

	$wp_customize->add_control( 
		new Cleaning_Specialist_Title_Info_Control( $wp_customize, 'cleaning_specialist_label_single_sidebar_layout', 
		array(
		    'label'       => esc_html__( 'Sidebar', 'cleaning-specialist' ),
		    'section'     => 'cleaning_specialist_single_post_settings',
		    'type'        => 'cleaning-specialist-title',
		    'settings'    => 'cleaning_specialist_label_single_sidebar_layout',
		) 
	));

	// Sidebar layout
    $wp_customize->add_setting(
        'cleaning_specialist_blog_single_sidebar_layout',
        array(
            'default'			=> 'no',
            'type'				=> 'theme_mod',
            'capability'		=> 'edit_theme_options',
            'sanitize_callback'	=> 'cleaning_specialist_sanitize_select'
        )
    );
    $wp_customize->add_control(
        new Cleaning_Specialist_Radio_Image_Control( $wp_customize,'cleaning_specialist_blog_single_sidebar_layout',
            array(
                'settings'		=> 'cleaning_specialist_blog_single_sidebar_layout',
                'section'		=> 'cleaning_specialist_single_post_settings',
                'label'			=> esc_html__( 'Sidebar Layout', 'cleaning-specialist' ),
                'choices'		=> array(
                    'right'	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/cr.png',
                    'left' 	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/cl.png',
                    'no' 	        => CLEANING_SPECIALIST_DIR_URI . '/inc/customizer/assets/images/cn.png',
                )
            )
        )
    );
}
endif;

add_action( 'customize_register', 'cleaning_specialist_customizer_blog_register' );