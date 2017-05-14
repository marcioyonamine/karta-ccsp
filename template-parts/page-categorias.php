<?php

/**

 * Template Name: Categorias Multiplas

 *

 * @package Karta

 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			
			function pegarVariavel($string){
			
			if(preg_match("#\((.*?)\)#", $string, $matches)){ 
				$x['cat'] = $matches[1]; 
			}else{
				$x['cat'] = "";	
			}	
			
			if(preg_match("#\[(.*?)\]#", $string, $matches)){ 
				$x['num'] = $matches[1]; 
			}else{
				$x['num'] = 10;	
			}

			if(preg_match("#\{(.*?)\}#", $string, $matches)){ 
				$x['titulo'] = $matches[1]; 
			}else{
				$x['titulo'] = "";	
			}
			


			return $x;			


			
			}
			
			
			
			$content = get_post();
			$string = $content->post_content;
			
			$x = pegarVariavel($string);
			
			$categorias  = explode(',', $x['cat']);
			$item = $x['num'];
			
			
			?>
            
        <?php 
		if($x['titulo'] != ""){
		?>
      <div class="archive-intro">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h1><?php echo $x['titulo'] ?> </h1>
					</div>
				</div>
			</div>
		</div>
        <?php } ?>
        
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
			$catid = array(1538,1539,1540,1562); //colocar as ids das categorias
			$nocategorias = "";
			$args = 
			array(
				'posts_per_page' => $item, 
				'orderby' => 'modified', 
				'order' => 'DESC',
				'post_type' =>  array('post','event'),
				'tax_query' =>
				 array(
					 'relation' => 'OR',
					 array(
						'taxonomy' => 'event-category',
						'field' => 'term_id',
						'terms' => $categorias
					),
					 array(
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $categorias
					
					),
					 array(
						'taxonomy' => 'event-category',
						'field' => 'term_id',
						'terms' => $nocategorias,
						'operator' => 'NOT IN'
					),
									 array(
						'taxonomy' => 'category',
						'field' => 'term_id',
						'terms' => $nocategorias,
						'operator' => 'NOT IN'	
					)

				 
						
				),
				
					
				
				
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

    <?php wp_link_pages(); ?>


<?php get_footer();

