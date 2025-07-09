<?php
	/**
	* hotelex_before_blog_single_section hook.
	*
	*/
	do_action( 'hotelex_before_blog_single_section' );
?>
<section>
	<div class="<?php echo esc_attr( $container_type );?>">
		<?php
			/**
			* hotelex_blog_single_container_start hook.
			*
			*/
			do_action( 'hotelex_blog_single_container_start' );
		?>

		<?php
			if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				hotelex_get_blog_single_sidebar_layout();
			endwhile;
			else :
			// If no content, include the "No posts found" template.
			echo esc_html( "No posts found!" );
			endif;
		?>

		<?php
			/**
			* hotelex_blog_single_container_end hook.
			*
			*/
			do_action( 'hotelex_blog_single_container_end' );
		?>
	</div>
</section>
<?php
	/**
	* hotelex_after_blog_single_section hook.
	*
	*/
	do_action( 'hotelex_after_blog_single_section' );
?>