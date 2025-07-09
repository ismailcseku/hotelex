<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the .main-content div and #wrapper
 *
 */
?>


	<?php hotelex_get_footer_top_callout(); ?>


	<?php
		/**
		 * hotelex_main_content_end hook.
		 *
		 */
		do_action( 'hotelex_main_content_end' );
	?>
	</div>
	<!-- main-content end -->
	<?php
		/**
		 * hotelex_after_main_content hook.
		 *
		 */
		do_action( 'hotelex_after_main_content' );
	?>


	<?php if( apply_filters('hotelex_filter_show_footer', true) ): ?>
	<?php hotelex_get_footer_parts(); ?>
	<?php endif; ?>

	<?php
		/**
		 * hotelex_wrapper_end hook.
		 *
		 */
		do_action( 'hotelex_wrapper_end' );
	?>
</div>
<!-- wrapper end -->
<?php
	/**
	 * hotelex_body_tag_end hook.
	 *
	 */
	do_action( 'hotelex_body_tag_end' );
?>
<?php
	/**
	 * nav_search_icon_popup_html hook.
	 *
	 */
	global $nav_search_holder_id;
	do_action( 'hotelex_nav_search_icon_popup_html', $nav_search_holder_id );
?>
<?php wp_footer(); ?>
</body>
</html>
