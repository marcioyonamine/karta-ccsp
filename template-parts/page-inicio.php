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
					<div class="row">
						<div class="col-xs-12"></div>
						<div class="masonry-grid">
						<div class="masonry-grid__sizer"></div>
						<div class="masonry-grid__gutter-sizer"></div>

			<?php

			global $post;
			$post_counter = 0;
			$args = array(
			'posts_per_page' => 21, 
			'orderby' => 'modified', 
			'order' => 'DESC',
			'relation' => 'OR',
			'post_type' =>  array('post','event') 
			); // Exclui a categoria 3

			$custom_posts = get_posts($args);
			$title_repeat = array();
			foreach($custom_posts as $post) : setup_postdata($post); ?>
            		
            		<?php if(!in_array(get_the_title(),$title_repeat)){  //impede repetição de títulos (talvez fazer com arrays)
							get_template_part( 'template-parts/content', get_post_format() ); 
							array_push($title_repeat,get_the_title());
						}
					?>
                    
			<?php endforeach;
			
			?>
						</div>
				</div>


		</main><!-- .site-main -->

	</div><!-- .content-area -->

    <?php karta_pagination(); ?>



<?php get_footer();

