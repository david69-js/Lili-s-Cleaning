<?php
/**
 * @package Cleaning Specialist
 */

//Return if the first widget area has no widgets
if ( !is_active_sidebar( 'footer-1' ) ) {
	return;
} ?>

<?php //user selected widget columns

	$cleaning_specialist_widget_num = esc_html(get_theme_mod('cleaning_specialist_footer_widgets', '4'));
	
	if ($cleaning_specialist_widget_num == '4') :
		$cleaning_specialist_col1 ='col-md-3';
		$cleaning_specialist_col2 ='col-md-3';
		$cleaning_specialist_col3 ='col-md-3';
		$cleaning_specialist_col4 ='col-md-3';
	elseif ($cleaning_specialist_widget_num == '3') :
		$cleaning_specialist_col1 ='col-md-4';
		$cleaning_specialist_col2 ='col-md-4';
		$cleaning_specialist_col3 ='col-md-4';
		
	elseif ($cleaning_specialist_widget_num == '2') :
		 $cleaning_specialist_col1 ='col-md-6';
		 $cleaning_specialist_col2 ='col-md-6';
	else :
		$cleaning_specialist_col1 ='col-md-12';
	endif;
?>
		
<?php 
	if ( is_active_sidebar( 'footer-1' ) && ( $cleaning_specialist_widget_num == '4' || $cleaning_specialist_widget_num == '3' || $cleaning_specialist_widget_num == '2' || $cleaning_specialist_widget_num == '1')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($cleaning_specialist_col1); ?>">
				<?php dynamic_sidebar( 'footer-1'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-2' ) && ( $cleaning_specialist_widget_num == '4' || $cleaning_specialist_widget_num == '3' || $cleaning_specialist_widget_num == '2')) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($cleaning_specialist_col2); ?>">
				<?php dynamic_sidebar( 'footer-2'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-3' ) && ( $cleaning_specialist_widget_num == '4' || $cleaning_specialist_widget_num == '3' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($cleaning_specialist_col3); ?>">
				<?php dynamic_sidebar( 'footer-3'); ?>
			</div>
		<?php
	endif;
	if ( is_active_sidebar( 'footer-4' ) && ( $cleaning_specialist_widget_num == '4' )) :
		?>
			<div class="widget-column px-3 <?php echo esc_attr($cleaning_specialist_col4); ?>">
				<?php dynamic_sidebar( 'footer-4'); ?>
			</div>
		<?php
	endif;
?>