<?php
/**
 * Template Name: Eventos
 *
 * @package Karta
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        		<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="masonry-grid">
								<div class="masonry-grid__sizer"></div>
								<div class="masonry-grid__gutter-sizer"></div>
			<?php
			global $post;
			$post_counter = 0;
			$args = array('post_type' => 'post', 'post_type' => 'event', 'posts_per_page' => 50, 'orderby' => 'ID', 'order' => 'DESC',); // Exclui a categoria 3
			$custom_posts = get_posts($args);
			foreach($custom_posts as $post) : setup_postdata($post); ?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>

                
			<?php endforeach;?>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="masonry-grid">
							<div class="masonry-grid__sizer"></div>
							<div class="masonry-grid__gutter-sizer"></div>
		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer();
