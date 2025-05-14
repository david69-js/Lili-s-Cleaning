<?php
/**
 * Cleaning Specialist Theme Customizer Helper Functions
 *
 * @package Cleaning Specialist
 */

/**
* Render callback for site title
* 
* @return void
*/
function cleaning_specialist_site_title_callback() {
    bloginfo( 'name' );
}

/**
* Render callback for site description
* 
* @return void
*/
function cleaning_specialist_site_description_callback() {
    bloginfo( 'description' );
}

/**
 * Check if the single post no sidebar is enabled or not
 */
function cleaning_specialist_single_post_no_sidebar_enable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_blog_single_sidebar_layout' )->value() == "no" ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the single post no sidebar is enabled & full width disabled
 */
function cleaning_specialist_single_post_no_sidebar_enable_full_width_disable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_blog_single_sidebar_layout' )->value() == "no" && $control->manager->get_setting( 'cleaning_specialist_enable_single_post_full_width' )->value() == false  ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the menu sidebar is enabled or not
 */
function cleaning_specialist_menu_sidebar_enable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_enable_menu_left_sidebar' )->value() == true ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the category archive settigns is enabled or not
 */
function cleaning_specialist_cat_archive_enable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_enable_cat_archive_settings' )->value() == true ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the normal header is selected
 */
function cleaning_specialist_select_header_styles_callback( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_select_header_styles' )->value() == "style1" ) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the page title disabled or not
 */
function cleaning_specialist_page_title_enable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_enable_page_title' )->value() == true) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the color radio enabled or not in page title section
 */
function cleaning_specialist_page_title_color_enable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_page_bg_radio' )->value() == 'color' && $control->manager->get_setting( 'cleaning_specialist_enable_page_title' )->value() == true) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the image radio enabled or not in page title section
 */
function cleaning_specialist_page_title_image_enable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_page_bg_radio' )->value() == 'image' && $control->manager->get_setting( 'cleaning_specialist_enable_page_title' )->value() == true) {
		return true;
	} else {
		return false;
	}
}

/**
 * Check if the footer copyrights links enabled or not
 */
function cleaning_specialist_footer_copyrights_links_enable( $control ) {
	if ( $control->manager->get_setting( 'cleaning_specialist_footer_enable_footer_links' )->value() == true) {
		return true;
	} else {
		return false;
	}
}

// global color
function cleaning_specialist_global_color_custom_css() {
    $cleaning_specialist_whole_color = get_theme_mod('cleaning_specialist_global_color1', '#0e3440');
    $cleaning_specialist_heading_color = get_theme_mod('cleaning_specialist_global_color2', '#fedb5c');

    if (!empty($cleaning_specialist_whole_color) || !empty($cleaning_specialist_heading_color)) {
        ?>
        <style type="text/css">
           #footer,.page-title .content-section,#sidebar-wrapper h3, #sidebar-wrapper label.wp-block-search__label, #sidebar-wrapper .widget_block h3, #sidebar-wrapper h2, #sidebar-wrapper label.wp-block-search__label,.wp-block-file .wp-block-file__button,.wp-block-button .wp-block-button__link,#footer select,a.btntoTop:hover,div#topbar ,a.btn-slid.btn:hover,a.wc-block-components-button.wp-element-button.wc-block-cart__submit-button.contained,#blog-section .read-more a,.post-tags a:hover,.blog .pagination .nav-links .current,.woocommerce .woocommerce-info .button,button.woocommerce-Button.button,.woocommerce span.onsale,.woocommerce div.product form.cart .button,.woocommerce ul.products li.product .button,.wc-block-grid__product-add-to-cart .wp-block-button__link,button,input[type="submit"],aside form #searchsubmit,a.btn-outr-blog.btn,#sidebar-wrapper ul li:not(.recentcomments) a:before{
                background: <?php echo esc_attr($cleaning_specialist_whole_color); ?>;
            }
             textarea,#sidebar-wrapper .widget ul li a, #footer .footer-widgets .widget ul li a,div#sidebar-wrapper .wp-block-latest-comments__comment-author, div#sidebar-wrapper .wp-block-latest-comments__comment-link,.loader-pulse,.main-navigation .menu > li > a:hover,h3.servc-main-hd,i.serv-icon,.woocommerce.widget_shopping_cart .buttons a,#footer .wp-block-button__link,div.footer-widgets-wrapper p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tagcloud a,p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tag-cloud a,#blog-section .meta a,#blog-section .meta span,#blog-section .meta span,#blog-section .meta span a,.nav-previous a .post-title,.nav-next a .post-title,aside #searchform div,.woocommerce ul.products li.product .price,.detail-sidebar ul li a:hover,.inn-sidebar ul li a:hover,.woocommerce-My,#site-navigation .menu ul li a:hover,.page_item_has_children ul li a,.main-navigation .menu .menu-item-has-children ul li a,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a,.woocommerce-MyAccount-content a,.wp-block-file .wp-block-file__button,.wp-block-button.is-style-outline .wp-block-button__link,a.btntoTop,div#sidebar-wrapper .widget ul li a,div#sidebar-wrapper select,div#sidebar-wrapper p.wp-block-tag-cloud a:before,div#sidebar-wrapper .tagcloud a:before,div#sidebar-wrapper p.wp-block-tag-cloud a:before,div#sidebar-wrapper p.wp-block-tag-cloud a,div#sidebar-wrapper .tagcloud a,div#sidebar-wrapper p.wp-block-tag-cloud a,div#sidebar-wrapper .widget ul li,.blog-cat li a:hover,a.btn-slid.btn{
                color: <?php echo esc_attr($cleaning_specialist_whole_color); ?>;
            }

            a.btntoTop,div.footer-widgets-wrapper p.wp-block-tag-cloud a,.tagcloud a,p.wp-block-tag-cloud a,nav.woocommerce-MyAccount-navigation ul li,.wp-block-file .wp-block-file__button,.wp-block-button.is-style-outline .wp-block-button__link,.wp-block-pullquote blockquote,.wp-block-quote:not(.is-large):not(.is-style-large),div.footer-widgets-wrapper p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tagcloud a,p.wp-block-tag-cloud a,div.footer-widgets-wrapper .tag-cloud a{
                border-color: <?php echo esc_attr($cleaning_specialist_whole_color); ?>;
            }

            p.topbar-number,p.topbar-email,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a,.main-navigation .menu > li > a:hover{
                color: <?php echo esc_attr($cleaning_specialist_heading_color); ?>;
            }
            a.hdr-clnr-btn.btn,.topbar-tckt a,a.hdr-call-btn.btn:hover,a.btn-outr-blog.btn:hover,.blog-cat li a:hover,.follow-us i:hover,a.btn-slid.btn{
                background: <?php echo esc_attr($cleaning_specialist_heading_color); ?>;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'cleaning_specialist_global_color_custom_css');
