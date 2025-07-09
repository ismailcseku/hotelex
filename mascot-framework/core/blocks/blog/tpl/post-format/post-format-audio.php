<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-header">
		<?php do_action( 'hotelex_blog_post_entry_header_start' ); ?>
		<?php hotelex_get_post_thumbnail( $post_format ); ?>
		<?php do_action( 'hotelex_blog_post_entry_header_end' ); ?>
	</div>
	<div class="entry-content">
		<?php do_action( 'hotelex_blog_post_entry_content_start' ); ?>



		<?php hotelex_post_meta(); ?>
		<?php hotelex_get_post_title(); ?>
		<div class="post-excerpt">
			<?php hotelex_get_excerpt(); ?>
		</div>
		<?php do_action( 'hotelex_blog_post_entry_content_end' ); ?>

		<?php echo hotelex_blog_read_more_link(); ?>
	</div>
	<div class="clearfix"></div>
</article>