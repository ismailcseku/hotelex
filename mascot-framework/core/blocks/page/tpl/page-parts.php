<?php
	/**
	* hotelex_before_page_section hook.
	*
	*/
	do_action( 'hotelex_before_page_section' );
?>
<section class="main-content-section-wrapper">
	<div class="<?php echo esc_attr( $container_type ); ?>">
		<?php
			/**
			* hotelex_page_container_start hook.
			*
			*/
			do_action( 'hotelex_page_container_start' );
		?>

		<?php
			if ( have_posts() ) :
			// Start the Loop.
			while ( have_posts() ) : the_post();
				hotelex_get_page_sidebar_layout( $page_layout );
			endwhile;
			endif;
		?>

		<?php
			/**
			* hotelex_page_container_end hook.
			*
			*/
			do_action( 'hotelex_page_container_end' );
		?>
	</div>
</section>
<?php
	/**
	* hotelex_after_page_section hook.
	*
	*/
	do_action( 'hotelex_after_page_section' );
?>