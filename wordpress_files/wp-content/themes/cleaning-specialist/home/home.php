<?php
/**
 * Template Name: Home
 */

get_header();
?>

<main id="primary">
        
    <?php
        /**
         * Hook - cleaning_specialist_action_home_banner.
         *
         * @hooked cleaning_specialist_home_banner_section - 10
         */
        do_action( 'cleaning_specialist_action_home_banner' );

        /**
         * Hook - cleaning_specialist_action_home_blog.
         *
         * @hooked cleaning_specialist_home_blog_section - 10
         */
        do_action( 'cleaning_specialist_action_home_blog' );

        /**
         * Hook - cleaning_specialist_action_home_extra.
         *
         * @hooked cleaning_specialist_home_extra_section - 10
         */
        do_action( 'cleaning_specialist_action_home_extra' );
    ?>
    
</main>

<?php
get_footer();