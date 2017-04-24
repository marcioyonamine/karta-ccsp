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
                      <?php if ( dynamic_sidebar('slider_widgets') )  :  else : endif; ?>
					<div class="row">
                    <?php wdp_slider(1); ?> <br /><br />
						<div class="col-xs-12"></div>
						<div class="masonry-grid">
						<div class="masonry-grid__sizer"></div>
						<div class="masonry-grid__gutter-sizer"></div>

			<?php

			global $post;
			global $post_counter;
			$post_counter = 0;
			$categorias_evento = array(2050);
			$categorias = array();
			
			$args_cat=array(
				'orderby' => 'name',
				'order' => 'ASC'
				);
			$categories=get_categories($args_cat);
			
			foreach($categories as $category) {
				array_push($categorias,$category->term_id);
			}
			
			
			$args = array(
			'posts_per_page' => 24, 
			'orderby' => 'modified', 
			'order' => 'DESC',
			'post_type' =>  array('post','event'), 
			'tax_query' =>
				 array(
				 'relation' => 'OR',
					 array(
						'taxonomy' => 'event-category',
						'field' => 'term_id',
						'terms' => $categorias_evento,
						'operator' => 'NOT IN'	
					),
					 array(
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $categorias,
						
					),
					
				)
			); // Exclui a categoria 3
			

			//$custom_posts = get_posts($args);
			$custom_posts = query_posts($args);
			$title_repeat = array();
			$idpost = 0;
			foreach($custom_posts as $post) : setup_postdata($post); ?>
            			<?php
						//echo "<pre>"; 
						//var_dump($post); 
						//echo "</pre>"; 

						?>	
            		
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

    <?php //karta_pagination(); ?>



<?php get_footer();

