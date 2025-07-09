<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if( $show_post_featured_image ) { ?>
	<div class="entry-header">
		<?php do_action( 'hotelex_blog_post_entry_header_start' ); ?>
		<?php hotelex_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'hotelex_blog_post_entry_header_end' ); ?>
	</div>
	<?php } ?>
	<div class="entry-content">
		<?php do_action( 'hotelex_blog_post_entry_content_start' ); ?>
		<?php hotelex_get_post_title(); ?>
		<?php hotelex_post_meta(); ?>
		<div class="post-excerpt">
			<?php hotelex_get_excerpt(); ?>
		</div>
		<?php echo hotelex_blog_read_more_link(); ?>
		<?php do_action( 'hotelex_blog_post_entry_content_end' ); ?>
		<div class="clearfix"></div>
	</div>
</article>