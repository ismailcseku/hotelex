<?php
if(is_home()) {
	$show_blog_title_description = hotelex_get_redux_option( 'blog-other-settings-show-blog-title-description', true );
	if( $show_blog_title_description ) {
		$page_title = hotelex_get_redux_option( 'blog-other-settings-blog-title-text', hotelex_redux_fallback_text_collection('blog') );

		//set search room archive page title
		if ( isset( $_GET[ 'search_rooms' ] ) ) {
			$page_title = esc_html__("Lodges");
		}
		$page_title_desc = hotelex_get_redux_option( 'blog-other-settings-blog-description-text' );
	}
}
?>

<?php if( $animation_effect != '' ): ?>
	<<?php echo esc_attr( $title_tag ); ?> class="title" style="<?php echo esc_attr( $title_color ); ?>"><?php echo wp_kses( $page_title, 'post' ); ?></<?php echo esc_attr( $title_tag ); ?>>
<?php else: ?>
	<<?php echo esc_attr( $title_tag ); ?> class="title" style="<?php echo esc_attr( $title_color ); ?>"><?php echo wp_kses( $page_title, 'post' ); ?></<?php echo esc_attr( $title_tag ); ?>>
<?php endif; ?>

<?php
if( is_home() ) {
	if( $show_blog_title_description && !empty($page_title_desc) ) {
	?>
	<p><?php echo esc_html( $page_title_desc ) ?></p>
	<?php
	}
}
?>