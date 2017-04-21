<?php
/**
 * Template Name: Inicio
 *
 * @package Karta
 */

get_header(); ?>





	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        		<div class="container">
                      <?php if ( dynamic_sidebar('slider_widgets') ) : else : endif; ?>
                      <br /><br />
					<div class="row">
						<div class="col-xs-12">

					</div>
							<div class="masonry-grid">
      
								<div class="masonry-grid__sizer"></div>
								<div class="masonry-grid__gutter-sizer"></div>
			<?php
			global $post;
			$post_counter = 0;
			$args = array(
			'posts_per_page' => 25, 
			'orderby' => 'ID', 
			'order' => 'DESC',
			'relation' => 'OR',
			
			
			'post_type' => 'any' 
			
			); // Exclui a categoria 3
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
    <?php karta_pagination(); ?>

<?php get_footer();
