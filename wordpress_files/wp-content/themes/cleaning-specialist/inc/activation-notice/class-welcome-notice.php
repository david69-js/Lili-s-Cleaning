<?php

/**
 * Welcome Notice class.
 */
class Cleaning_Specialist_Welcome_Notice {

	/**
	** Constructor.
	*/
	public function __construct() {
		// Render Notice
		add_action( 'admin_notices', [$this, 'cleaning_specialist_render_notice'] );

		// Enque AJAX Script
		add_action( 'admin_enqueue_scripts', [$this, 'cleaning_specialist_admin_enqueue_scripts'], 5 );

		// Dismiss
		add_action( 'admin_enqueue_scripts', [$this, 'cleaning_specialist_notice_enqueue_scripts'], 5 );
		add_action( 'wp_ajax_cleaning_specialist_dismissed_handler', [$this, 'cleaning_specialist_dismissed_handler'] );

		// Reset
		add_action( 'switch_theme', [$this, 'cleaning_specialist_reset_notices'] );
		add_action( 'after_switch_theme', [$this, 'cleaning_specialist_reset_notices'] );

	}

	/**
	** Render Notice
	*/
	public function cleaning_specialist_render_notice() {
	global $pagenow;

	$cleaning_specialist_screen = get_current_screen();

	if (
		$cleaning_specialist_screen &&
		$cleaning_specialist_screen->id !== 'appearance_page_cleaning-specialist-theme-info' &&
		$cleaning_specialist_screen->id !== 'appearance_page_cleaning-specialist-demo'
	) {
		$cleaning_specialist_transient_name = sprintf('%s_activation_notice', get_template());

		if ( ! get_transient($cleaning_specialist_transient_name) ) {
			?>
			<div class="cleaning-specialist-notice notice notice-info is-dismissible" data-notice="<?php echo esc_attr($cleaning_specialist_transient_name); ?>">
				<button type="button" class="notice-dismiss"></button>

				<?php $this->cleaning_specialist_render_notice_content(); ?>
			</div>
			<?php
		}
	}
}

	/**
	** Render Notice Content
	*/
	public function cleaning_specialist_render_notice_content() {
		$cleaning_specialist_action = 'install-activate';
		$cleaning_specialist_redirect_url = 'admin.php?page=cleaning-specialist-theme-info';
		$cleaning_specialist_demo_redirect_url = 'themes.php?page=cleaning-specialist-demo';
		$cleaning_specialist_screen = get_current_screen();

		?>
		<div class="notice-left-icon-box">
			<span class="dashicons dashicons-buddicons-topics notc-theme-icon"></span>
		</div>
		<div class="welcome-message">
			<div class="notc-contnt">
				<h4><?php esc_html_e('Thank you for installing Legacy Themes!', 'cleaning-specialist'); ?></h4>
				<h1><?php esc_html_e('Welcome to Cleaning Specialist WordPress Theme!', 'cleaning-specialist'); ?></h1>
				<p><?php esc_html_e( 'Our WordPress themes are modern, minimalist, fully responsive, SEO-friendly, and packed with features—perfect for designers, bloggers, and creative professionals across various fields.', 'cleaning-specialist' );?>
				</p>			
				<div class="action-buttons">
					<a href="<?php echo esc_url(admin_url($cleaning_specialist_redirect_url)); ?>" class="button notice-btn button-hero" data-action="<?php echo esc_attr($cleaning_specialist_action); ?>">
						<span class="notc-btn-txt"><?php echo esc_html__( 'Get Started with Cleaning Specialist', 'cleaning-specialist' ); ?></span>
					</a>
					<a href="<?php echo esc_url(admin_url($cleaning_specialist_demo_redirect_url)); ?>" class="demo-btn btn" >
						<span class="demo-btn-txt"><?php echo esc_html__( 'Demo Import', 'cleaning-specialist' ); ?></span>
					</a>
				</div>
			</div>			
		</div>
		<div class="notice-right-img-box">
			<img class="notc-right-img" src="<?php echo esc_url( get_template_directory_uri() . '/inc/activation-notice/img/notice-right.png' ); ?>" alt="<?php esc_attr_e( 'notice themes img', 'cleaning-specialist' ); ?>" />
		</div>

		<?php
	}

	/**
	** Reset Notice.
	*/
	public function cleaning_specialist_reset_notices() {
		delete_transient( sprintf( '%s_activation_notice', get_template() ) );
	}

	/**
	** Dismissed handler
	*/
	public function cleaning_specialist_dismissed_handler() {
		wp_verify_nonce( null );

		if ( isset( $_POST['notice'] ) ) {
			set_transient( sanitize_text_field( wp_unslash( $_POST['notice'] ) ), true, 0 );
		}
	}

	/**
	** Notice Enqunue Scripts
	*/
	public function cleaning_specialist_notice_enqueue_scripts( $page ) {
		
		wp_enqueue_script( 'jquery' );

		ob_start();
		?>
		<script>
			jQuery(function($) {
				$( document ).on( 'click', '.cleaning-specialist-notice .notice-dismiss', function () {
					jQuery.post( 'ajax_url', {
						action: 'cleaning_specialist_dismissed_handler',
						notice: $( this ).closest( '.cleaning-specialist-notice' ).data( 'notice' ),
					});
					$( '.cleaning-specialist-notice' ).hide();
				} );
			});
		</script>
		<?php
		$script = str_replace( 'ajax_url', admin_url( 'admin-ajax.php' ), ob_get_clean() );

		wp_add_inline_script( 'jquery', str_replace( ['<script>', '</script>'], '', $script ) );
	}

	/**
	** Register scripts and styles for welcome notice.
	*/
	public function cleaning_specialist_admin_enqueue_scripts( $page ) {
		// Enqueue Styles.
		wp_enqueue_style( 'cleaning-specialist-welcome-notic-css', get_template_directory_uri() . '/inc/activation-notice/css/notice-bar.css' );
	}

}

new Cleaning_Specialist_Welcome_Notice();