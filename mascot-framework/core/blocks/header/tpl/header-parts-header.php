	<!-- Header -->
	<?php
		/**
		* hotelex_before_header hook.
		*
		*/
		do_action( 'hotelex_before_header' );
	?>
	<header id="header" class="header <?php echo esc_attr(implode(' ', $header_classes)); ?>" <?php if( $params['header_layout_type'] == 'header-vertical-nav' ) { ?> style="<?php echo esc_attr( $vertical_nav_bgcolor ); ?> <?php echo esc_attr( $vertical_nav_bgimg ); ?>" <?php } ?>>
		<?php
			/**
			* hotelex_header_start hook.
			*
			*/
			do_action( 'hotelex_header_start' );
		?>
		<?php
			/**
			* hotelex_header_top_area hook.
			*
			* @hooked hotelex_get_header_top
			*/
			do_action( 'hotelex_header_top_area' );
		?>
		<?php
			hotelex_get_header_layout_type();
		?>

		<?php
			/**
			* hotelex_header_end hook.
			*
			*/
			do_action( 'hotelex_header_end' );
		?>
	</header>
	<?php
		/**
		* hotelex_after_header hook.
		*
		*/
		do_action( 'hotelex_after_header' );
	?>