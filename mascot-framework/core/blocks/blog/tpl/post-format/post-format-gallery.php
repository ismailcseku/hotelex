<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php do_action( 'hotelex_blog_post_entry_header_start' ); ?>
		<?php hotelex_get_post_thumbnail( $post_format ); ?>
		<?php if ( has_post_thumbnail() ) { ?>
			<?php if( hotelex_get_redux_option( 'blog-settings-post-meta', true, 'show-post-date' ) ) { ?>
			<div class="post-single-meta">
				<?php hotelex_post_shortcode_single_meta( 'show-post-date' ); ?>
			</div>
			<?php } ?>
		<?php } ?>
		<?php do_action( 'hotelex_blog_post_entry_header_end' ); ?>
	</div>
	<div class="entry-content">
		<?php do_action( 'hotelex_blog_post_entry_content_start' ); ?>


		<?php hotelex_post_meta(); ?>
		<?php hotelex_get_post_title(); ?>
		<div class="post-excerpt">
			<?php hotelex_get_excerpt(); ?>
		</div>


		<?php echo hotelex_blog_read_more_link(); ?>

		<?php do_action( 'hotelex_blog_post_entry_content_end' ); ?>
	</div>

	<div class="clearfix"></div>
</article>