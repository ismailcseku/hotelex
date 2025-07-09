
	<?php
	/**
	* hotelex_before_top_sliders_container hook.
	*
	*/
	do_action( 'hotelex_before_top_sliders_container' );
	?>
	<div class="top-sliders-container">
		<?php
			/**
			* hotelex_top_sliders_container_start hook.
			*
			*/
			do_action( 'hotelex_top_sliders_container_start' );
		?>

		<?php
			echo hotelex_get_top_main_slider();
		?>

		<?php
			/**
			* hotelex_top_sliders_container_end hook.
			*
			*/
			do_action( 'hotelex_top_sliders_container_end' );
		?>
	</div>
	<?php
	/**
	* hotelex_after_top_sliders_container hook.
	*
	*/
	do_action( 'hotelex_after_top_sliders_container' );
	?>
