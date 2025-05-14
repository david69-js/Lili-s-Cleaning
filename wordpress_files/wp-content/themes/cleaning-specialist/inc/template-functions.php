<?php
/**
 * @package Cleaning Specialist
 */

/**
 * Footer
 */
if (! function_exists( 'cleaning_specialist_footer_copyrights' ) ):
    function cleaning_specialist_footer_copyrights() {
        ?>
            <div class="row">
                <div class="copyrights">
                    <p>
                        <?php
                            if("" != esc_html(get_theme_mod( 'cleaning_specialist_footer_copyright_text'))) :
                                echo esc_html(get_theme_mod( 'cleaning_specialist_footer_copyright_text'));
                                if(get_theme_mod('cleaning_specialist_en_footer_credits',true)) :
                                    ?> 
                                    <span class="copyrg-link"><a href="<?php echo esc_url(CLEANING_SPECIALIST_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Cleaning Services WordPress Theme','cleaning-specialist') ?></a><?php esc_html_e(' by Legacy Themes','cleaning-specialist') ?></span>
                                    <?php   
                                endif;
                            else :
                                echo date_i18n(
                                    /* translators: Copyright date format, see https://secure.php.net/date */
                                    _x( 'Y', 'copyright date format', 'cleaning-specialist' )
                                );
                                ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                                    <span class="copyrg-link"><a href="<?php echo esc_url(CLEANING_SPECIALIST_AUT); ?>" target="_blank" rel="nofollow noopener"><?php esc_html_e(' | Cleaning Services WordPress Theme','cleaning-specialist') ?></a><?php esc_html_e(' by Legacy Themes','cleaning-specialist') ?></span>
                                <?php
                            endif;
                        ?>
                    </p>
                </div>
            </div>
        <?php    
    }
endif;
add_action( 'cleaning_specialist_action_footer', 'cleaning_specialist_footer_copyrights' );


/**
 * Page Title Settings
 */
if (!function_exists('cleaning_specialist_show_page_title')):
    function cleaning_specialist_show_page_title( $cleaning_specialist_blogtitle=false,$cleaning_specialist_archivetitle=false,$cleaning_specialist_searchtitle=false,$cleaning_specialist_pagenotfoundtitle=false ) {
        if(!is_front_page()){
            if ('color' === esc_html(get_theme_mod( 'cleaning_specialist_page_bg_radio','color' ))) {
                ?>
                    <div class="page-title" style="background:<?php echo sanitize_hex_color(get_theme_mod( 'cleaning_specialist_page_bg_color','#0e3440' )); ?>;">
                <?php
            }
            else if('image' === esc_html(get_theme_mod( 'cleaning_specialist_page_bg_radio','color' ))){
                $image= esc_url(get_template_directory_uri().'/img/start-bg.jpg');
                ?>
                <?php
                    if ( has_post_thumbnail()) {
                        $cleaning_specialist_featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                        ?>
                            <div class="page-title" style="background:url('<?php echo esc_url($cleaning_specialist_featured_img_url) ?>') no-repeat scroll center center / cover;"> 
                        <?php }
                    else{
                        ?>
                            <div class="page-title"  style="background:url('<?php echo esc_url($image ); ?>') no-repeat scroll center center / cover;">    
                        <?php } ?>                    
                <?php }
            else{ ?>
                <div class="page-title" style="background:#0e3440;"> 
                <?php } ?>
                <div class="content-section img-overlay">
                    <div class="container">
                        <div class="row text-center">
                            <div class="col-md-12">
                                <div class="section-title page-title"> 
                                    <?php
                                        if($cleaning_specialist_blogtitle){
                                            ?><h1 class="main-title"><?php single_post_title(); ?></h1><?php
                                        }
                                        if($cleaning_specialist_archivetitle){
                                            ?><h1 class="main-title"><?php the_archive_title(); ?></h1><?php
                                        }
                                        if($cleaning_specialist_searchtitle){
                                            ?><h1 class="main-title"><?php esc_html_e('SEARCH RESULTS','cleaning-specialist') ?></h1><?php
                                        }
                                        if($cleaning_specialist_pagenotfoundtitle){
                                            ?><h1 class="main-title"><?php esc_html_e('PAGE NOT FOUND','cleaning-specialist') ?></h1><?php
                                        }                                       
                                        
                                        if($cleaning_specialist_blogtitle==false && $cleaning_specialist_archivetitle==false && $cleaning_specialist_searchtitle==false && $cleaning_specialist_pagenotfoundtitle==false){
                                            ?><h1 class="main-title"><?php the_title(); ?></h1><?php
                                        }
                                    ?>                                                       
                                </div>                      
                            </div>
                        </div>
                    </div>  
                </div>
                </div>  <!-- End page-title --> 
            <?php
        }
    }
endif;
add_action('cleaning_specialist_get_page_title', 'cleaning_specialist_show_page_title');


/**
 * Home Banner Section
 */
if (! function_exists( 'cleaning_specialist_home_banner_section' ) ):
    function cleaning_specialist_home_banner_section() {
        ?>
        <section id="main-banner-wrap">
            <div class="owl-carousel">
                <?php $cleaning_specialist_banner_count = get_theme_mod("cleaning_specialist_banner_slider_increase");
                    for ($i = 1; $i <= $cleaning_specialist_banner_count; $i++) { ?>
                    <?php
                        $cleaning_specialist_banner_image = get_theme_mod( 'cleaning_specialist_banner_image'.$i, '' );
                        if ( ! empty( $cleaning_specialist_banner_image ) ) { ?>
                    <div class="banner-side-margin position-relative text-center">
                        <div class="main-banner-inner-box">                   
                            <img src="<?php echo esc_url( $cleaning_specialist_banner_image ); ?>">
                        </div>
                        <?php
                        $cleaning_specialist_alignment_class = get_theme_mod( 'cleaning_specialist_slider_content_alignment', 'center' );
                        ?>
                        <div class="main-banner-content-box content-<?php echo esc_attr( $cleaning_specialist_alignment_class ); ?>">                    
                            <?php
                                $cleaning_specialist_banner_heading = get_theme_mod( 'cleaning_specialist_banner_heading'.$i, '' );                        
                                if ( ! empty( $cleaning_specialist_banner_heading ) ) { ?>
                                    <h2 class="bnr-hd1 pt-2 mb-2"><?php echo esc_html( $cleaning_specialist_banner_heading ); ?></h2>
                            <?php } ?>
                            <?php
                                $cleaning_specialist_banner_text = get_theme_mod( 'cleaning_specialist_banner_text'.$i, '' );                        
                                if ( ! empty( $cleaning_specialist_banner_text ) ) { ?>
                                    <p class="bnr-txt"><?php echo esc_html( $cleaning_specialist_banner_text ); ?></p>
                            <?php } ?>
                            <div class="btn-box-slid">
                                <?php
                                $cleaning_specialist_banner_button_link = get_theme_mod( 'cleaning_specialist_banner_button_link'.$i, '' );
                                    if ( ! empty( $cleaning_specialist_banner_button_link ) ) { ?>
                                    <a class="btn-slid btn" href="<?php echo esc_url( $cleaning_specialist_banner_button_link ); ?>"><?php echo esc_html('Explore Services','cleaning-specialist'); ?><i class="bi bi-caret-right ms-1"></i></a>
                                <?php } ?>                                              
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </section>
        <?php
    }
endif;
add_action( 'cleaning_specialist_action_home_banner', 'cleaning_specialist_home_banner_section' );


/**
 * Home Blog Section
 */
if (! function_exists( 'cleaning_specialist_home_blog_section' ) ):
    function cleaning_specialist_home_blog_section() {
        ?>
        <section id="home-blog-wrap" class="py-4">
            <div class="container">
                <div class="inner-wrap py-3">                   
                    <div class="serv-cont-box">
                        <div class="row">
                            <?php
                            $cleaning_specialist_post_category = get_theme_mod('cleaning_specialist_selected_category', '');                               
                            $cleaning_specialist_home_blog_number = get_theme_mod('cleaning_specialist_home_blog_number', 3);  
                                if($cleaning_specialist_post_category){               
                                $args = array(
                                    'post_type'      => 'post',
                                    'posts_per_page' => $cleaning_specialist_home_blog_number,
                                    'order'          => 'ASC',
                                    'category_name' => esc_html($cleaning_specialist_post_category ,'cleaning-specialist'),    
                                );                                
                                $cleaning_specialist_loop = new WP_Query( $args );
                                while ( $cleaning_specialist_loop->have_posts() ) : $cleaning_specialist_loop->the_post();
                            ?>
                                <div class="col-lg-4 col-md-6 col-12">
                                    <div class="lat-news-inn mb-3">
                                        <?php if (has_post_thumbnail()) { ?>
                                            <img src="<?php the_post_thumbnail_url('full'); ?>" class="blog-image">
                                        <?php } ?>
                                        <div class="news-content py-3 px-4 text-center text-lg-start text-md-start">
                                            <div class="blog-cat">
                                                <?php the_category(); ?>
                                            </div>
                                            <h6 class="news-inner-head py-2">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h6>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-12 align-self-center">
                                                    <p class="news-date mb-2">
                                                        <i class="bi bi-calendar date-icon me-1"></i><?php the_time(get_option('date_format')); ?>
                                                    </p>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-12 align-self-center">
                                                    <div class="post-view-box">
                                                        <?php
                                                        $post_views = get_post_meta(get_the_ID(), 'cleaning_specialist_post_views_count', true);
                                                        $post_views = $post_views ? $post_views : 0;
                                                        ?>
                                                        <p class="news-view mb-2">
                                                            <i class="bi bi-eye me-1 view-icon"></i> <?php echo esc_html($post_views); ?>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_postdata(); }?>
                        </div>
                    </div>
                    <div class="serv-butn-box text-center py-2">
                        <?php
                            $cleaning_specialist_homr_blog_otr_button_link = get_theme_mod( 'cleaning_specialist_homr_blog_otr_button_link', '' );
                            if ( ! empty( $cleaning_specialist_homr_blog_otr_button_link ) ) { ?>
                            <a class="btn-outr-blog btn" href="<?php echo esc_url( $cleaning_specialist_homr_blog_otr_button_link ); ?>"><?php echo esc_html('View All','cleaning-specialist'); ?></a>
                        <?php } ?>
                    </div>
                </div>                                
            </div>
        </section>
        <?php    
    }
endif;
add_action( 'cleaning_specialist_action_home_blog', 'cleaning_specialist_home_blog_section' );

/**
 * Home page another adding Section
 */
if (! function_exists( 'cleaning_specialist_home_extra_section' ) ):
    function cleaning_specialist_home_extra_section() {
        ?>
        <div id="custom-home-extra-content" class="py-3">
            <div class="container">
              <?php while ( have_posts() ) : the_post(); ?>
                <?php the_content(); ?>
              <?php endwhile; ?>
            </div>
        </div>
        <?php    
    }
endif;
add_action( 'cleaning_specialist_action_home_extra', 'cleaning_specialist_home_extra_section' );