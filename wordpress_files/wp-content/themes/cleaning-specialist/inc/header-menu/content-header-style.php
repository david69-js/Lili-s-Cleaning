<?php
/**
 * Template part for displaying header menu
 *
 * @package Cleaning Specialist
 */

?>
<?php
    $cleaning_specialist_page_val= is_front_page() ? 'home':'page' ;

?>

<header id="<?php echo esc_attr($cleaning_specialist_page_val);?>-inner" class="elementer-menu-anchor theme-menu-wrapper full-width-menu style1 page" role="banner">
    <?php
        if(true===get_theme_mod('cleaning_specialist_enable_highlighted area',true) && is_front_page()){
            ?><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('skip to content','cleaning-specialist'); ?> </a> <?php
        }
        else{
        ?><a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('skip to content','cleaning-specialist');?></a> <?php
    }
    ?>
    <div id="header-main" class="header-wrapper">
        <div id="topbar">
            <div class="container">
                <div class="row py-2">
                    <div class="col-lg-2 col-md-3 col-12 align-self-center text-lg-start text-md-start text-center">
                        <div class="follow-us">
                            <?php
                                $cleaning_specialist_social_media1_heading = get_theme_mod( 'cleaning_specialist_social_media1_heading', '' );
                                if ( ! empty( $cleaning_specialist_social_media1_heading ) ) { ?>
                                <a href="<?php echo esc_url( $cleaning_specialist_social_media1_heading ); ?>"><i class="bi bi-facebook me-1"></i></a>
                            <?php } ?>
                            <?php
                                $cleaning_specialist_social_media2_heading = get_theme_mod( 'cleaning_specialist_social_media2_heading', '' );
                                if ( ! empty( $cleaning_specialist_social_media2_heading ) ) { ?>
                                <a href="<?php echo esc_url( $cleaning_specialist_social_media2_heading ); ?>"><i class="bi bi-instagram me-1"></i></a>
                            <?php } ?>
                            <?php
                                $cleaning_specialist_social_media3_heading = get_theme_mod( 'cleaning_specialist_social_media3_heading', '' );
                                if ( ! empty( $cleaning_specialist_social_media3_heading ) ) { ?>
                                <a href="<?php echo esc_url( $cleaning_specialist_social_media3_heading ); ?>"><i class="bi bi-twitter-x me-1"></i></a>
                            <?php } ?>
                            <?php
                                $cleaning_specialist_social_media4_heading = get_theme_mod( 'cleaning_specialist_social_media4_heading', '' );
                                if ( ! empty( $cleaning_specialist_social_media4_heading ) ) { ?>
                                <a href="<?php echo esc_url( $cleaning_specialist_social_media4_heading ); ?>"><i class="bi bi-youtube me-1"></i></a>
                            <?php } ?>
                            <?php
                                $cleaning_specialist_social_media5_heading = get_theme_mod( 'cleaning_specialist_social_media5_heading', '' );
                                if ( ! empty( $cleaning_specialist_social_media5_heading ) ) { ?>
                                <a href="<?php echo esc_url( $cleaning_specialist_social_media5_heading ); ?>"><i class="bi bi-pinterest me-1"></i></a>
                            <?php } ?>
                            <?php
                                $cleaning_specialist_social_media6_heading = get_theme_mod( 'cleaning_specialist_social_media6_heading', '' );
                                if ( ! empty( $cleaning_specialist_social_media6_heading ) ) { ?>
                                <a href="<?php echo esc_url( $cleaning_specialist_social_media6_heading ); ?>"><i class="bi bi-linkedin me-1"></i></a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-9 col-12 align-self-center ps-lg-0">
                        <div class="row">
                            <div class="col-lg-9 col-md-8 col-12 align-self-center text-center text-lg-end text-md-center">
                                <?php
                                    $cleaning_specialist_topbar_timer_text = get_theme_mod( 'cleaning_specialist_topbar_timer_text', '' );
                                    if ( ! empty( $cleaning_specialist_topbar_timer_text ) ) { ?>
                                    <p class="topbar-text mb-0"><?php echo esc_html( $cleaning_specialist_topbar_timer_text ); ?></p>
                                <?php } ?> 
                            </div>
                            <div class="col-lg-3 col-md-4 col-12 align-self-center text-center text-lg-end text-md-center">
                                <?php
                                $cleaning_specialist_countdown_datetime = get_theme_mod('cleaning_specialist_countdown_datetime', '');
                                $target_timestamp = !empty($cleaning_specialist_countdown_datetime) ? strtotime($cleaning_specialist_countdown_datetime) : 0;
                                ?>
                                <div id="countdown-timer" data-target="<?php echo esc_attr($target_timestamp); ?>"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-4 col-12 align-self-center ps-0 py-1 text-center">
                        <?php
                            $cleaning_specialist_topbar_ticket_button_link = get_theme_mod( 'cleaning_specialist_topbar_ticket_button_link', '' );
                            if ( ! empty( $cleaning_specialist_topbar_ticket_button_link ) ) { ?>
                            <div class="topbar-tckt">
                                <a href="<?php echo esc_url( $cleaning_specialist_topbar_ticket_button_link ); ?>"><?php echo esc_html('Get ticket','cleaning-specialist'); ?></a>
                            </div> 
                        <?php } ?>
                    </div>
                    <div class="col-lg-3 col-md-8 col-12 align-self-center">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-5 align-self-center text-center text-lg-end text-md-center ri8-call">
                                <?php
                                    $cleaning_specialist_topbar_contact_number = get_theme_mod( 'cleaning_specialist_topbar_contact_number', '' );
                                    if ( ! empty( $cleaning_specialist_topbar_contact_number ) ) { ?>
                                    <p class="topbar-number mb-0"><?php echo esc_html( $cleaning_specialist_topbar_contact_number ); ?></p>
                                <?php } ?>
                            </div>
                            <div class="col-lg-6 col-md-6 col-7 align-self-center">
                                <?php
                                    $cleaning_specialist_topbar_email = get_theme_mod( 'cleaning_specialist_topbar_email', '' );
                                    if ( ! empty( $cleaning_specialist_topbar_email ) ) { ?>
                                    <p class="topbar-email text-center text-lg-end text-md-center mb-0"><?php echo esc_html( $cleaning_specialist_topbar_email ); ?></p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
         <div id="custom-header">
            <?php if ( display_header_text() ) : ?>        
            <div id="content-header">
                <div class="container">
                    <div class="row py-2">
                        <div class="col-lg-2 col-md-2 col-6 align-self-center">
                            <div class="logo <?php echo (has_custom_logo() ? 'has-logo' : 'no-logo'); ?>" itemscope itemtype="https://schema.org/Organization">
                                <?php 
                                    // Display custom logo if available
                                    if ( has_custom_logo() ) {
                                        cleaning_specialist_custom_logo();
                                    }

                                    // Display sticky header logo if enabled
                                    if ( get_theme_mod( 'cleaning_specialist_enable_logo_stickyheader', false ) ) {
                                        $cleaning_specialist_alt_logo = esc_url( get_theme_mod( 'cleaning_specialist_logo_stickyheader' ) );
                                        if ( ! empty( $cleaning_specialist_alt_logo ) ) {
                                            ?>
                                            <a id="logo-alt" class="logo-alt" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                                                <img src="<?php echo esc_url( $cleaning_specialist_alt_logo ); ?>" alt="<?php esc_attr_e( 'logo', 'cleaning-specialist' ); ?>">
                                            </a>
                                            <?php
                                        }
                                    }

                                    // Site title and tagline settings
                                    $show_title   = get_theme_mod( 'cleaning_specialist_display_site_title', true );
                                    $show_tagline = get_theme_mod( 'cleaning_specialist_display_site_tagline', true );
                                    $header_class = $show_title ? 'site-title' : 'screen-reader-text';

                                    // Display site title
                                    if ( $show_title && get_bloginfo( 'name' ) ) {
                                        if ( is_front_page() ) {
                                            ?>
                                            <h1 class="<?php echo esc_attr( $header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                                            </h1>
                                            <?php
                                        } else {
                                            ?>
                                            <p class="<?php echo esc_attr( $header_class ); ?>">
                                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
                                            </p>
                                            <?php
                                        }
                                    }

                                    // Display tagline
                                    if ( $show_tagline ) {
                                        $description = get_bloginfo( 'description', 'display' );
                                        if ( $description || is_customize_preview() ) {
                                            ?>
                                            <p class="site-description"><?php echo esc_html( $description ); ?></p>
                                            <?php
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-2 col-6 align-self-center">
                            <div class="top-menu-wrapper">
                                <div class="navigation_header">
                                    <div class="toggle-nav mobile-menu">
                                        <button onclick="cleaning_specialist_openNav()"><i class="bi bi-list"></i></button>
                                    </div>
                                    <div id="mySidenav" class="nav sidenav">
                                        <nav id="site-navigation" class="main-navigation navbar navbar-expand-xl" aria-label="<?php esc_attr_e( 'Top Menu', 'cleaning-specialist' ); ?>">
                                            <?php {
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location' => 'primary',
                                                        'container_class' => 'navi clearfix navbar-nav' ,
                                                        'menu_class'     => 'menu clearfix', 
                                                        'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                                        'fallback_cb' => 'wp_page_menu',
                                                    )
                                                );
                                            } ?>
                                        </nav>
                                        <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="cleaning_specialist_closeNav()"><i class="bi bi-x"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-12 align-self-center text-lg-end text-center px-lg-0">
                            <?php
                                $cleaning_specialist_header_button_link = get_theme_mod( 'cleaning_specialist_header_button_link', '' );
                                    if ( ! empty( $cleaning_specialist_header_button_link ) ) { ?>
                                    <a class="hdr-clnr-btn btn" href="<?php echo esc_url( $cleaning_specialist_header_button_link ); ?>"><?php echo esc_html('Become a Cleaner','cleaning-specialist'); ?></a>
                            <?php } ?>
                        </div>
                        <div class="col-lg-2 col-md-4 col-12 align-self-center text-lg-end text-center ps-lg-0">
                            <?php
                                $cleaning_specialist_header_call_button_link = get_theme_mod( 'cleaning_specialist_header_call_button_link', '' );
                                    if ( ! empty( $cleaning_specialist_header_call_button_link ) ) { ?>
                                    <a class="hdr-call-btn btn" href="<?php echo esc_url( $cleaning_specialist_header_call_button_link ); ?>"><i class="bi bi-telephone me-2"></i><?php echo esc_html('Request a Call','cleaning-specialist'); ?></a>
                            <?php } ?>
                        </div>
                    </div>                
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>    
</header>

<div class="clearfix"></div>
<div id="content" class="elementor-menu-anchor"></div>

<div class="content-wrap">