<?php
require get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';
/**
 * Recommended plugins.
 */
function cleaning_specialist_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Classic Widgets', 'cleaning-specialist' ),
			'slug'             => 'classic-widgets',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'cleaning_specialist_register_recommended_plugins' );