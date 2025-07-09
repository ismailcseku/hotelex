<div class="row tm-blog-sidebar-row">
	<div class="col-lg-12">
		<div class="main-content-area">
			<?php do_action( 'hotelex_blog_main_content_area_start' ); ?>

			<?php
				hotelex_get_blog_post_layout();
			?>
			<?php
				hotelex_get_pagination();
			?>

			<?php do_action( 'hotelex_blog_main_content_area_end' ); ?>
		</div>
	</div>
</div>