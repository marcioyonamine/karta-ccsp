<?php
/**
 * Template Name: Projeto
 *
 * @package Karta
 */

get_header(); ?>




	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        		<div class="container">
                      <?php //if ( dynamic_sidebar('slider_widgets') ) : else : endif; ?>
                      <br /><br />
					  <h1><?php $tag = get_post_field('post_content', $post->ID); //echo $tag; ?></h1>
					  <h1><?php the_title(); ?></h1>
					  
					<div class="row">
						<div class="col-xs-12">

					</div>
							<div class="masonry-grid">
      
								<div class="masonry-grid__sizer"></div>
								<div class="masonry-grid__gutter-sizer"></div>
			<?php
			//echo "O conteudo é ";
			//the_content();
			global $post;
			$post_counter = 0;
			//$tag = "_projeto_01";
			//$tag = "_projeto_01";
			
			//$args = array('post_type' => 'any', 'posts_per_page' => 100, 'orderby' => 'ID', 'order' => 'DESC', 'tag' => $tag ); // Exclui a categoria 3
			/*
			$args = array(
				'post_type' => 'any',  
				'taxonomy' => $tag,
				'terms' => $tag
				
			);
*/
		$args = array( 
        'posts_per_page' => 100,
		'post_type' => 'any',
        'tax_query'      => array(
		'relation' => 'OR',
            array(
                'taxonomy'  => 'post_tag',
                'field'     => 'slug',
                'terms'     => array( $tag )
            ),
			array(
                'taxonomy'  => 'event-tag',
                'field'     => 'slug',
                'terms'     => array( $tag )
            )
        )
    );			

			//$custom_posts = get_posts($args);
			$custom_posts = get_posts($args);
			//echo "<pre>";
			//var_dump($custom_posts);
			//echo "</pre>";
			foreach($custom_posts as $post) : setup_postdata($post); ?>
					<?php if($custom_post)	?>
					<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
					<?php  ?>
                
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
