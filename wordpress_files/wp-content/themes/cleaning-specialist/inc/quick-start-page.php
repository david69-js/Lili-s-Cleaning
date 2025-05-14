<?php
/*
 * @package Cleaning Specialist
 */

function cleaning_specialist_admin_enqueue_scripts() {
    wp_enqueue_style( 'cleaning-specialist-admin-style', esc_url( get_template_directory_uri() ).'/inc/quick-start-page.css' );
}
add_action( 'admin_enqueue_scripts', 'cleaning_specialist_admin_enqueue_scripts' );

function cleaning_specialist_theme_info_menu_link() {
    add_theme_page(
        esc_html__( 'Theme Demo Import', 'cleaning-specialist' ),
        esc_html__( 'Theme Demo Import', 'cleaning-specialist' ),
        'edit_theme_options',
        'cleaning-specialist-demo',
        'cleaning_specialist_demo_content_page'
    );

}
add_action( 'admin_menu', 'cleaning_specialist_theme_info_menu_link' );


function cleaning_specialist_demo_content_page() {

    $cleaning_specialist_theme = wp_get_theme();
    ?>
    <div class="demo-box">
        <div class="wrapper-demo">
            <div class="thme-img-box">
            <img src="<?php echo esc_url( get_template_directory_uri().'/screenshot.png' ); ?>" />
            </div>
            <div class="importer-content">
                <h2><?php echo esc_html( 'Welcome to Cleaning Specialist', 'cleaning-specialist' ); ?> <span class="demo-versn"><?php echo $cleaning_specialist_theme->get( 'Version' ); ?></span></h2>
                <h6><?php echo esc_html('Importing Demo Content','cleaning-specialist');?> </h6>
                <p><?php echo esc_html('Click Run Importer to begin the process of configuring your website. This will enable you to easily duplicate the theme\'s sample layout by automatically importing all required demo content, such as pages, settings, and configurations. It is strongly advised that you create a complete backup of your website before launching the importer. This guarantees that your current data is secure and recoverable in the event of an emergency. For best speed and appearance, the suggested Customizer settings are automatically applied by the demo importer, which is designed to work perfectly with Cleaning Specialist. All of the settings and content will be applied after the import is finished. You can, however, freely alter things further to suit your tastes using the WordPress Customizer.','cleaning-specialist'); ?></p>
                <?php require get_parent_theme_file_path( '/inc/quick-start-content.php' ); ?>
            </div>
        </div>
    </div>

<?php
}

?>