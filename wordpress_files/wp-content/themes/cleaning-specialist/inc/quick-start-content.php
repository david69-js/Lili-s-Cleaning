<div class="theme-offer">
<?php

    function cleaning_specialist_create_customizer_nav_menu() {
        // ------- Create Nav Menu --------
        $cleaning_specialist_menuname = 'Primary';
        $cleaning_specialist_menulocation = 'primary';
        $cleaning_specialist_menu_exists = wp_get_nav_menu_object($cleaning_specialist_menuname);

        if (!$cleaning_specialist_menu_exists) {
            $cleaning_specialist_menu_id = wp_create_nav_menu($cleaning_specialist_menuname);

            wp_update_nav_menu_item($cleaning_specialist_menu_id, 0, array(
                'menu-item-title' => __('Home', 'cleaning-specialist'),
                'menu-item-url' => home_url('/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($cleaning_specialist_menu_id, 0, array(
                'menu-item-title' => __('About Us', 'cleaning-specialist'),
                'menu-item-url' => home_url('/about-us/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($cleaning_specialist_menu_id, 0, array(
                'menu-item-title' => __('Services', 'cleaning-specialist'),
                'menu-item-url' => home_url('/services/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($cleaning_specialist_menu_id, 0, array(
                'menu-item-title' => __('Pages', 'cleaning-specialist'),
                'menu-item-url' => home_url('/pages/'),
                'menu-item-status' => 'publish',
            ));

            wp_update_nav_menu_item($cleaning_specialist_menu_id, 0, array(
                'menu-item-title' => __('Blog', 'cleaning-specialist'),
                'menu-item-url' => home_url('/blog/'),
                'menu-item-status' => 'publish',
            ));

            // Set menu to location
            $cleaning_specialist_locations = get_theme_mod('nav_menu_locations');
            if (!is_array($cleaning_specialist_locations)) {
                $cleaning_specialist_locations = array();
            }
            $cleaning_specialist_locations[$cleaning_specialist_menulocation] = $cleaning_specialist_menu_id;
            set_theme_mod('nav_menu_locations', $cleaning_specialist_locations);
        }
    }

    // POST and update the customizer and other related data of Cleaning Specialist
    if (isset($_POST['submit'])) {

        // -------- Plugin Installation and Activation (WooCommerce & Classic Widgets) -------- //
        include_once(ABSPATH . 'wp-admin/includes/plugin.php');
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');

        // Plugin list
        $cleaning_specialist_plugins = array(
            array(
                'slug' => 'classic-widgets',
                'file' => 'classic-widgets/classic-widgets.php',
                'download_url' => 'https://downloads.wordpress.org/plugin/classic-widgets.zip'
            )
        );

        foreach ($cleaning_specialist_plugins as $plugin) {
            $installed_plugins = get_plugins();

            // Install the plugin if it's not installed
            if (!isset($installed_plugins[$plugin['file']])) {
                $upgrader = new Plugin_Upgrader();
                $upgrader->install($plugin['download_url']);
            }

            // Activate the plugin if it's not active
            if (file_exists(WP_PLUGIN_DIR . '/' . $plugin['file']) && !is_plugin_active($plugin['file'])) {
                activate_plugin($plugin['file']);
            }
        }

        // ------- Create Menu --------
        cleaning_specialist_create_customizer_nav_menu();

        // ------- Create Pages --------
        function create_demo_page($title, $content = '', $template = '') {
            $page_id = get_page_id_by_title($title);
        
            if (!$page_id) {
                $page_data = array(
                    'post_type'    => 'page',
                    'post_title'   => $title,
                    'post_content' => $content,
                    'post_status'  => 'publish',
                    'post_author'  => 1,
                );
        
                $page_id = wp_insert_post($page_data);
        
                if ($template && !is_wp_error($page_id)) {
                    update_post_meta($page_id, '_wp_page_template', $template);
                }
            }
        
            return $page_id;
        }
        

        $cleaning_specialist_home_id = create_demo_page('Home', '', 'home/home.php');
        update_option('page_on_front', $cleaning_specialist_home_id);
        update_option('show_on_front', 'page');

        create_demo_page('Pages', '<p>Lorem Ipsum ...</p>');
        create_demo_page('About Us', '<p>Lorem Ipsum ...</p>');
        create_demo_page('Services', '<p>Service description...</p>');
        create_demo_page('Blog', '<p>Blog page content here...</p>');

        // ------- Set Theme Mods --------

        set_theme_mod('cleaning_specialist_topbar_timer_text', 'Starts TOMORROW! Our biggest event of the year..');
        set_theme_mod('cleaning_specialist_countdown_datetime', '00:00:00:00');
        set_theme_mod('cleaning_specialist_topbar_ticket_button_link', '#');
        set_theme_mod('cleaning_specialist_topbar_contact_number', '+1234567890');
        set_theme_mod('cleaning_specialist_topbar_email', 'Testing@mail.com');
        set_theme_mod('cleaning_specialist_social_media1_heading', 'www.facebook.com');
        set_theme_mod('cleaning_specialist_social_media2_heading', 'www.instagram.com');
        set_theme_mod('cleaning_specialist_social_media3_heading', 'www.twitter.com');
        set_theme_mod('cleaning_specialist_social_media4_heading', 'www.youtube.com');

        set_theme_mod('cleaning_specialist_header_button_link', '#');
        set_theme_mod('cleaning_specialist_header_call_button_link', '#');

        // ------- Banner Section --------

        $cleaning_specialist_banner_headings = array('Sparkling Clean, Every Time.', 'Perfect Clean,Every Time');
        set_theme_mod('cleaning_specialist_banner_slider_increase', 2);
        for ($i = 1; $i <= 2; $i++) {
            set_theme_mod("cleaning_specialist_banner_image$i", get_template_directory_uri() . "/img/banner$i.png");
            set_theme_mod("cleaning_specialist_banner_heading$i", $cleaning_specialist_banner_headings[$i - 1]);
            set_theme_mod("cleaning_specialist_banner_text$i", 'Get the most dedicated consulation for your life-changing course.');
            set_theme_mod("cleaning_specialist_banner_button_link$i", '#');
        }

        // -------------home-blog-section-----------

    $cleaning_specialist_selected_category = wp_create_category('Business'); 
    set_theme_mod('cleaning_specialist_selected_category', get_cat_name($cleaning_specialist_selected_category));


    set_theme_mod( 'cleaning_specialist_home_blog_number', '3' );

    for($i=1;$i<=3;$i++){

      $title = 'Lorem ipsum is simply dummy text of the printing';
      $content = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do minim eiusmod tempor incididunt ut afds labore et dolore magna aliqua. Ut enim ad quis nostrud exercitation ullamco laboris.';

      // Create post object
      $cleaning_specialist_post = array(
       'post_title'    => wp_strip_all_tags( $title ),
       'post_content'  => $content,
       'post_status'   => 'publish',
       'post_type'     => 'post',
       'post_category' => array($cleaning_specialist_selected_category) 
      );

      $cleaning_specialist_home_blog_post_id = wp_insert_post($cleaning_specialist_post);
      $cleaning_specialist_home_blog_post_image_url = get_template_directory()."/img/blog$i.png"; // file path

      $cleaning_specialist_home_blog_image_name = 'blog'.$i.'.png';
      $cleaning_specialist_home_blog_upload_dir       = wp_upload_dir(); 
      // Set upload folder
      $cleaning_specialist_home_blog_image_data       = file_get_contents($cleaning_specialist_home_blog_post_image_url); 
       
      // Get image data
      $cleaning_specialist_home_blog_unique_file_name = wp_unique_filename( $cleaning_specialist_home_blog_upload_dir['path'], $cleaning_specialist_home_blog_image_name ); 
      // Generate unique name
      $filename= basename( $cleaning_specialist_home_blog_unique_file_name ); 
      // Create image file name
      // Check folder permission and define file location
      if( wp_mkdir_p( $cleaning_specialist_home_blog_upload_dir['path'] ) ) {
          $file = $cleaning_specialist_home_blog_upload_dir['path'] . '/' . $filename;
      } else {
          $file = $cleaning_specialist_home_blog_upload_dir['basedir'] . '/' . $filename;
      }
      file_put_contents( $file, $cleaning_specialist_home_blog_image_data );
      $wp_filetype = wp_check_filetype( $filename, null );
      $cleaning_specialist_home_blog_attachment = array(
          'post_mime_type' => $wp_filetype['type'],
          'post_title'     => sanitize_file_name( $filename ),
          'post_content'   => '',
          'post_status'    => 'inherit'
      );
      $attach_id = wp_insert_attachment( $cleaning_specialist_home_blog_attachment, $file, $cleaning_specialist_home_blog_post_id );
      require_once(ABSPATH . 'wp-admin/includes/image.php');
      $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
          wp_update_attachment_metadata( $attach_id, $attach_data );
          set_post_thumbnail( $cleaning_specialist_home_blog_post_id, $attach_id );

    }
    set_theme_mod( 'cleaning_specialist_homr_blog_otr_button_link', '#' );

        echo '<div class="success">Demo Import Successful</div>';
    }
?>

<ul>
    <li>
        <hr>
        <?php if (!isset($_POST['submit'])) : ?>
            <?php echo esc_html__('Click on the below button to get demo content installed.', 'cleaning-specialist'); ?>
            <br>
            <form id="demo-importer-form" action="" method="POST" onsubmit="return confirm('Do you really want to do this?');">
                <input class="run-btn" type="submit" name="submit" value="<?php echo esc_attr('Run Importer', 'cleaning-specialist'); ?>">
            </form>
        <?php else: ?>
            <div class="visit">
                <a href="<?php echo esc_url(home_url()); ?>" class="button button-primary button-large run-btn" style="margin-top: 10px;" target="_blank">View Site</a>
            </div>
        <?php endif; ?>
        <hr>
    </li>
</ul>
</div>