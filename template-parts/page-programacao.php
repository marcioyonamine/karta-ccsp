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
			$title_repeat = array();
			$post_counter = 0;
			$args = array('post_type' => 'post', 'post_type' => 'event', 'posts_per_page' => 50, 'orderby' => 'ID', 'order' => 'DESC',); // Exclui a categoria 3
			$custom_posts = get_posts($args);
			foreach($custom_posts as $post) : setup_postdata($post); ?>
             <?php 
			 /*
			 echo "<pre>";
			 var_dump($post);
			 echo "</pre>";
			 
			 */
			// echo $post->ID;
			 	if(!in_array(get_the_title($post->ID),$title_repeat)){  //impede repetição de títulos (talvez fazer com arrays)
					get_template_part( 'template-parts/content', get_post_format() ); 
					array_push($title_repeat,get_the_title($post->ID));
				}

					?>
 

                
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
