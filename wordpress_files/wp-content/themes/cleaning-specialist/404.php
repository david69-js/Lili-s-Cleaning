<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package Cleaning Specialist
 */

get_header();
cleaning_specialist_before_title();
if(true===get_theme_mod( 'cleaning_specialist_enable_page_title',true)) :
	do_action('cleaning_specialist_get_page_title',false,false,false,true);
endif;
cleaning_specialist_after_title();

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="content-page">
			<div class="content-inner">
				<div class="container">
					<div class="row">
						<?php
							if('right'===esc_html(get_theme_mod('cleaning_specialist_blog_sidebar','right'))) {
								?>
									<div id="post-wrapper" class="col-md-9">
										<div class="page-content-area">	
											<h1 class="page-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cleaning-specialist' ); ?></h1>
											<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'cleaning-specialist' ); ?></p>
											<?php get_search_form(); ?>
										</div>
									</div>
									<div id="sidebar-wrapper" class="col-md-3">
										<?php get_sidebar('primary-sidebar'); ?>
									</div>
								<?php
							}
							else if('left'===esc_html(get_theme_mod('cleaning_specialist_blog_sidebar','right'))) {
								?>
									<div id="sidebar-wrapper" class="col-md-3">
										<?php get_sidebar('primary-sidebar'); ?>
									</div>
									<div id="post-wrapper" class="col-md-9">
										<div class="page-content-area">	
											<h1 class="page-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cleaning-specialist' ); ?></h1>
											<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'cleaning-specialist' ); ?></p>
											<?php get_search_form(); ?>
										</div>
									</div>
									
								<?php
							}
							else{
								?>
									<div class="col-md-12">
										<div class="page-content-area">	
											<h1 class="page-error"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'cleaning-specialist' ); ?></h1>
											<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links on right or a search?', 'cleaning-specialist' ); ?></p>
											<?php get_search_form(); ?>
										</div>
									</div>
								<?php
							}
						?>			
					</div>
				</div>
			</div>
		</div>
	</main>
</div>

<?php
get_footer();