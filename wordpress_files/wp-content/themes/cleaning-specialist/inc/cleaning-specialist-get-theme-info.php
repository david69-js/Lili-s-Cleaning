<?php
/**
 * Theme information Cleaning Specialist
 *
 * @package Cleaning Specialist
 */


 define('CLEANING_SPECIALIST_DEMO_URL','https://www.legacytheme.net/trial/cleaning-specialist/');
 define('CLEANING_SPECIALIST_THEME_PRO_URL','https://www.legacytheme.net/products/cleaning-services-wordpress-theme/');
 define('CLEANING_SPECIALIST_THEME_DOC_URL','https://www.legacytheme.net/tutorial/cleaning-specialist-lite/');
 define('CLEANING_SPECIALIST_THEME_SUPPORT_URL','https://wordpress.org/support/theme/cleaning-specialist/');
 define('CLEANING_SPECIALIST_THEME_RATINGS_URL','https://wordpress.org/support/theme/cleaning-specialist/reviews/');
 define('CLEANING_SPECIALIST_THEME_UPGRADE_URL','https://www.legacytheme.net/products/cleaning-services-wordpress-theme/'); 


if ( ! class_exists( 'Cleaning_Specialist_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Cleaning_Specialist_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Cleaning_Specialist_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Cleaning_Specialist_About_Page
		 *
		 * @var Cleaning_Specialist_About_Page $instance The Cleaning_Specialist_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Cleaning_Specialist_About_Page instance.
		 *
		 * We make sure that only one instance of Cleaning_Specialist_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function cleaning_specialist_init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Cleaning_Specialist_About_Page ) ) {
				self::$instance = new Cleaning_Specialist_About_Page;				
				self::$instance->config = $config;
				self::$instance->cleaning_specialist_setup_config();	
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function cleaning_specialist_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
				
		}	
	}
}


/**
 *  Adding a About page 
 */
add_action('admin_menu', 'cleaning_specialist_add_menu');
function cleaning_specialist_add_menu() {
     add_theme_page(esc_html__('Legacy-themes','cleaning-specialist'), esc_html__('Get Theme Info','cleaning-specialist'),'manage_options', esc_html__('cleaning-specialist-theme-info','cleaning-specialist'), esc_html__('cleaning_specialist_theme_info','cleaning-specialist'));
}

/**
 *  Callback
 */
function cleaning_specialist_theme_info() {
	$theme = wp_get_theme();
?>
	<div class="theme-info">
		<div class="container">
			<div class="top-section">
				<div class="title">
					<h1 class="info-theme-name"><?php esc_html_e( 'Cleaning Specialist WordPress Theme', 'cleaning-specialist' ); ?> <span><?php echo $theme->get( 'Version' ); ?></span> </h1>
					<p><?php echo $theme->get( 'Description' ); ?></p>
				</div>
			</div>
			<div class="middle-section">
				<div class="screnshot-wrapper">
					<div class="scrnsht-box">
						<img class="scrnshot-img" src="<?php echo esc_url( $theme->get_screenshot() ); ?>" />
					</div>
					<div class="info-pro-btn">
							<a class="button button-primary button-large" href="<?php echo esc_url(CLEANING_SPECIALIST_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'cleaning-specialist' ); ?></a>
					</div>
				</div>

				<div class="custmzr-settng sidebar-right">
					<div class="quick-links">
						<h2 class="info-qick-hd"><?php esc_html_e( 'Quick Customizer Settings', 'cleaning-specialist' ); ?> </h2>
						<div class="cst-btn">			
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-welcome-view-site"></span>
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=custom_logo')) ?>" target="_blank"> <?php esc_html_e( 'Upload Logo', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-menu-alt2"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=nav_menus')) ?>" target="_blank"> <?php esc_html_e( 'Menu Settings', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-admin-tools"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=cleaning_specialist_home_header_settings')) ?>" target="_blank"> <?php esc_html_e( 'Header Settings', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-format-image"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=cleaning_specialist_home_banner_settings')) ?>" target="_blank"> <?php esc_html_e( 'Banner Settings', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-image-filter"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=cleaning_specialist_home_blog_settings')) ?>" target="_blank"> <?php esc_html_e( 'Home Blog Settings', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-media-default"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[control]=cleaning_specialist_enable_page_title')) ?>" target="_blank"> <?php esc_html_e( 'Page Settings', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-edit-large"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[panel]=cleaning_specialist_blog_settings_panel')) ?>" target="_blank"> <?php esc_html_e( 'Blog Settings', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
							<div class="custm-box">
								<div class="customizer-title">
									<h3>
										<span class="dashicons dashicons-columns"></span> 
										<a href="<?php echo esc_url(admin_url( 'customize.php?autofocus[section]=cleaning_specialist_footer_settings')) ?>" target="_blank"> <?php esc_html_e( 'Footer Settings', 'cleaning-specialist' ); ?> </a>
									</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="buttons-box">
				<div class="info-btns-link">
					<div class="sidebar">
						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-format-aside"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(CLEANING_SPECIALIST_THEME_DOC_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DOCUMENTATION', 'cleaning-specialist' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-visibility"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(CLEANING_SPECIALIST_DEMO_URL); ?>" target="_blank"><?php esc_html_e( 'VIEW DEMOS', 'cleaning-specialist' ); ?></a></h3>
							</div>	
						</div>	

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-admin-generic"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(CLEANING_SPECIALIST_THEME_UPGRADE_URL); ?>" target="_blank"><?php esc_html_e( 'UPGRADE TO PRO', 'cleaning-specialist' ); ?></a></h3>
							</div>						
						</div>

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-star-filled"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(CLEANING_SPECIALIST_THEME_RATINGS_URL); ?>" target="_blank"><?php esc_html_e( 'RATE OUR THEME', 'cleaning-specialist' ); ?></a></h3>
							</div>						
						</div>						

						<div class="section-box">
							<div class="icon">
								<span class="dashicons dashicons-sos"></span>
							</div>
							<div class="heading">
								<h3><a href="<?php echo esc_url(CLEANING_SPECIALIST_THEME_SUPPORT_URL); ?>" target="_blank"><?php esc_html_e( 'ASK FOR SUPPORT', 'cleaning-specialist' ); ?></a></h3>
							</div>						
						</div>							
					</div>
				</div>
			</div>				
			<div class="tick-box">
				<div class="comp-box">
					<h2 class="table-heading"><?php esc_html_e( 'What makes our PRO Version the better option?', 'cleaning-specialist' ); ?></h2>
					<div class="comp-table">
						<table>
							<thead> 
								<tr> 
								 	<th class="thead-column1"><strong><h4><?php esc_html_e( 'Feature', 'cleaning-specialist' ); ?></h4></strong></th>
									<th class="thead-column2"><strong><h4><?php esc_html_e( 'Cleaning Specialist Free', 'cleaning-specialist' ); ?></h4></strong></th>
									<th class="thead-column3"><strong><h4><?php esc_html_e( 'Cleaning Specialist Pro', 'cleaning-specialist' ); ?></h4></strong></th>
								</tr> 
							</thead>
							<tbody>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Customizer Theme Options', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Footer Widget', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Inner Pages Settings', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Blog Sidebar', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Responsive Design (Mobile, Tablets)', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Sidebar Options (Full, Left and Right)', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-yes"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( '1 Click Demo Import', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Preloader', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Contact Form', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Typography', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'WooCommerce Settings', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Extra Customizer Settings', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Sticky Header', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'More Color Options', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Related Posts Section', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Footer Columns Settings', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr>
								<tr> 
				 					<td class="tbody-column1"><?php esc_html_e( 'Priority Support', 'cleaning-specialist' ); ?></td>
				 					<td class="tbody-column2"><span class="dashicons dashicons-no-alt"></span></td>
				 					<td class="tbody-column3"><span class="dashicons dashicons-yes"></span></td>
								</tr> 
								<tr class="last-row"> 
						 					<td class="tbody-column1"></td>
						 					<td class="tbody-column2"></td>
						 					<td class="tbody-column3"><a class="button button-primary button-large" href="<?php echo esc_url(CLEANING_SPECIALIST_THEME_PRO_URL); ?>" target="_blank"><?php esc_html_e( 'Upgrade to PRO', 'cleaning-specialist' ); ?></a></td>
										</tr> 
			   				</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>	
	</div>
<?php
}
