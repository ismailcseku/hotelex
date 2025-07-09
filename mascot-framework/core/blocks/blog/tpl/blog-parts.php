<?php
	/**
	* hotelex_before_blog_section hook.
	*
	*/
	do_action( 'hotelex_before_blog_section' );
?>
<section>
	<div class="<?php echo esc_attr( $container_type ); ?>">
		<?php
			/**
			* hotelex_blog_container_start hook.
			*
			*/
			do_action( 'hotelex_blog_container_start' );
		?>

		<div class="blog-posts">
			<?php
				hotelex_get_blog_sidebar_layout();
			?>
		</div>

	<?php
		/**
		* hotelex_blog_container_end hook.
		*
		*/
		do_action( 'hotelex_blog_container_end' );
	?>
	</div>
</section>
<?php
	/**
	* hotelex_after_blog_section hook.
	*
	*/
	do_action( 'hotelex_after_blog_section' );
?>
