<div id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
		<div class="page-content">
			<?php
				hotelex_get_blog_single_post_thumbnail();
			?>
			<?php
				/**
				* hotelex_before_page_content hook.
				*
				*/
				do_action( 'hotelex_before_page_content' );
			?>
			<?php
				the_content();
			?>
			<?php
				/**
				* hotelex_after_page_content hook.
				*
				*/
				do_action( 'hotelex_after_page_content' );
			?>

			<?php hotelex_get_post_wp_link_pages(); ?>

			<?php
				if( hotelex_get_redux_option( 'page-settings-show-share' ) ) {
					hotelex_get_social_share_links();
				}
			?>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php
	if( $page_show_comments ) {
		hotelex_show_comments();
	}
?>
