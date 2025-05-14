<?php
/**
 * Custom template hooks for this theme.
 *
 * @package Cleaning Specialist
 */

/**
 * Before title meta hook
 */
if ( ! function_exists( 'cleaning_specialist_before_title' ) ) :
function cleaning_specialist_before_title() {
	do_action('cleaning_specialist_before_title');
}
endif;

/**
 * Before title content hook
 */
if ( ! function_exists( 'cleaning_specialist_before_title_content' ) ) :
	function cleaning_specialist_before_title_content() {
		do_action('cleaning_specialist_before_title_content');
	}
endif;

/**
 * After title content hook
 */
if ( ! function_exists( 'cleaning_specialist_after_title_content' ) ) :
	function cleaning_specialist_after_title_content() {
		do_action('cleaning_specialist_after_title_content');
	}
endif;

/**
 * After title meta hook
 */
if ( ! function_exists( 'cleaning_specialist_after_title' ) ) :
function cleaning_specialist_after_title() {
	do_action('cleaning_specialist_after_title');
}
endif;

/**
 * Single post content after meta hook
 */
if ( ! function_exists( 'cleaning_specialist_single_post_after_content' ) ) :
	function cleaning_specialist_single_post_after_content($postID) {
		do_action('cleaning_specialist_single_post_after_content',$postID);
	}
endif;