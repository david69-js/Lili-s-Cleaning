<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Cleaning Specialist
 */


?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'primary-sidebar' ); ?>
</aside><!-- #secondary -->

<?php if ( ! is_active_sidebar( 'primary-sidebar' ) ) { ?>

	<aside id="secondary" class="widget-area" role="complementary">
		<!-- Categories -->
		<aside id="categories" class="widget widget_categories" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'cleaning-specialist' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Categories', 'cleaning-specialist'); ?></h2>
		    <ul>
		        <?php
		        $args = array(
		            'title_li' => '',
		        );
		        wp_list_categories($args);
		        ?>
		    </ul>
		</aside>
		<!-- Archive -->
		<aside id="archive" class="widget widget_archive" role="complementary" aria-label="<?php esc_attr_e( 'secondsidebar', 'cleaning-specialist' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Archive List', 'cleaning-specialist'); ?></h2>
		    <ul>
		        <?php wp_get_archives('type=monthly'); ?>
		    </ul>
		</aside>
		<!-- Tag Sidebar -->
		<aside id="tag-sidebar" class="widget widget_tag_cloud" role="complementary" aria-label="<?php esc_attr_e( 'thirdsidebar', 'cleaning-specialist' ); ?>">
		    <h2 class="widget-title"><?php esc_html_e('Popular Tags', 'cleaning-specialist'); ?></h2>
		    <div class="tagcloud">
		        <?php
		        $cleaning_specialist_tags = get_tags(array(
		            'orderby' => 'count',
		            'order'   => 'DESC',
		            'number'  => 20, // You can change the number of tags displayed
		        ));

		        if ($cleaning_specialist_tags) {
		            foreach ($cleaning_specialist_tags as $cleaning_specialist_tag) {
		                $cleaning_specialist_tag_link = get_tag_link($cleaning_specialist_tag->term_id);
		                $cleaning_specialist_tag_name = $cleaning_specialist_tag->name;
		                $cleaning_specialist_tag_count = $cleaning_specialist_tag->count;
		                echo '<a href="' . esc_url($cleaning_specialist_tag_link) . '" class="tag-link" title="' . esc_attr($cleaning_specialist_tag_name) . ' (' . $cleaning_specialist_tag_count . ' posts)">' . esc_html($cleaning_specialist_tag_name) . '</a> ';
		            }
		        } else {
		            echo '<p>' . esc_html__('No tags found.', 'cleaning-specialist') . '</p>';
		        }
		        ?>
		    </div>
		</aside>	
	</aside>

<?php } ?>
